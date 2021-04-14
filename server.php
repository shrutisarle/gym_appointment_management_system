<?php
    session_start();
    define("DB_SERVER", "127.0.0.1");
    define("DB_USER", "root");
    define("DB_PASSWORD", "root");
    define("DB_DATABASE", "GymAppointmentMgmt");
    // initializing variables
    $name = "";
    $email = "";
    $phone = "";
    $gender = "";
    $health_conditions = "";
    $emergency_contact_name = "";
    $emergency_contact_phone = "";
    $errors = array();
    $RANDOM_ID_MIN = 1000;
    $RANDOM_ID_MAX = 9999;
    $facilities = array();

    $trainer_name = "";
    $trainer_email = "";
    $trainer_phone = "";
    $specializations = array();

    // connect to the database
    $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

    



    //Client Registration
    if (isset($_POST['reg_client'])) {
        // receive all input values from the form
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $dob = mysqli_real_escape_string($db, $_POST['dob']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $height = mysqli_real_escape_string($db, $_POST['height']);
        $weight = mysqli_real_escape_string($db, $_POST['weight']);
        $health_conditions = mysqli_real_escape_string($db, $_POST['health_conditions']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
        $emergency_contact_name = mysqli_real_escape_string($db, $_POST['emergency_contact_name']);
        $emergency_contact_phone = mysqli_real_escape_string($db, $_POST['emergency_contact_phone']);
        // form validation: ensure that the form is correctly filled 
        // by adding (array_push()) corresponding error into $errors array
        if (empty($name)) { array_push($errors, "Name is required"); }
        if (empty($email)) { 
            array_push($errors, "Email is required"); 
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid email"); 
        }
        if (empty($phone)) { array_push($errors, "Phone is required"); }
        else {
            if(((int)$phone < 0)) {
                array_push($errors, "Invalid phone number");
            }
            elseif(strlen($phone) != 10) {
                array_push($errors, "Phone should have 10 digits");
            }
        }
        if (empty($dob)) { array_push($errors, "Date of birth is required"); }
        if (empty($gender)) { array_push($errors, "Gender is required"); }
        if (empty($height)) { array_push($errors, "Height is required"); }
        else {
            if(((int)$height <= 0)) {
                array_push($errors, "Invalid height");
            }
            else {
                $height = (int)$height;
            }
        }
        if (empty($weight)) { array_push($errors, "Weight is required"); }
        else {
            if(((int)$weight <= 0)) {
                array_push($errors, "Invalid weight");
            }
            else {
                $weight = (int)$weight;
            }
        }
        if (empty($password)) { array_push($errors, "Password is required"); }
        if ($password != $confirm_password) {
            array_push($errors, "The two passwords do not match");
        }
        if (empty($emergency_contact_name)) { array_push($errors, "Emergency contact name is required"); }
        if (empty($emergency_contact_phone)) { array_push($errors, "Emergency contact phone is required"); }
        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        if($email!="" &&  $phone!=""){
        $user_check_query = "SELECT * FROM Client WHERE email='$email' OR phone='$phone' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        if ($result != null) { // if user exists
            $user = mysqli_fetch_assoc($result);
            if ($user['email'] === $email) {
                array_push($errors, "Email already exists");
            }
            if ($user['phone'] === $phone) {
                array_push($errors, "Phone number already exists");
            }
        }
      }
        if (count($errors) == 0) {
            $encrypt_password = md5($password);//encrypt the password before saving in the database
            $client_id = random_int($RANDOM_ID_MIN, $RANDOM_ID_MAX);
            $formatted_dob = implode("/",explode("-", $dob));
            $query = "INSERT INTO Client VALUES($client_id, '$name','$email','$encrypt_password', $phone, '$formatted_dob', '$gender', $weight, $height, '$health_conditions', '$emergency_contact_name', $emergency_contact_phone)";
            mysqli_query($db, $query);
            $_SESSION['client_name'] = $name;
            $_SESSION['client_id'] = $client_id;
            $_SESSION['success'] = "You are now Registered";
            $_SESSION['who_is'] = "client";
            header('location: facilitiesOptIn.php');
        }
    }

    if (isset($_POST['login_client'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT cid,name,email FROM client WHERE email='$email' AND password='$password'";
            $result = mysqli_query($db, $query);
            $row_cnt = mysqli_num_rows($result);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['client_name'] = $row['name'];
                    $_SESSION['client_id'] = $row['cid'];
                    $_SESSION['client_email'] = $row['email'];
                    // echo "You are now logged in";
                    $_SESSION['who_is'] = "client";
                    $_SESSION['success'] = "You are now logged in";
                    header('location: aboutUs.php');
                    
                }
            } else {
                array_push($errors, "Wrong Username/Password combination");
            }
        }
    }
    if (isset($_POST['facilities_opt_in'])) {
        $query = "SELECT fid,type FROM Facilities";
        $result = mysqli_query($db, $query);
        $row_cnt = mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $facilities[$row['type']] = FALSE;
                $facility = $row['type'];
                $facility_id = $row['fid'];
                $client_id = $_SESSION['client_id'];
                $form_formatted_facility = implode("_",explode(" ", $facility));
                if(isset($_POST[$form_formatted_facility])) {
                    $facilities[$facility] = TRUE;
                    $query = "INSERT INTO OptedFor VALUES($client_id, $facility_id)";
                    mysqli_query($db, $query);
                    header('location: aboutUs.php');
                }
            }
        }
    }
    if (isset($_POST['reg_trainer'])) {
        $trainer_name = mysqli_real_escape_string($db, $_POST['name']);
        $trainer_email = mysqli_real_escape_string($db, $_POST['email']);
        $trainer_phone = mysqli_real_escape_string($db, $_POST['phone']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

        if (empty($trainer_name)) { array_push($errors, "Name is required"); }
        if (empty($trainer_email)) { 
            array_push($errors, "Email is required"); 
        }
        elseif (!filter_var($trainer_email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid email"); 
        }
        if (empty($trainer_phone)) { array_push($errors, "Phone is required"); }
        else {
            if(((int)$trainer_phone < 0)) {
                array_push($errors, "Invalid phone number");
            }
            elseif(strlen($trainer_phone) != 10) {
                array_push($errors, "Phone should have 10 digits");
            }
        }
        if (empty($password)) { array_push($errors, "Password is required"); }
        if ($password != $confirm_password) {
            array_push($errors, "The two passwords do not match");
        }

        $user_check_query = "SELECT * FROM Trainer WHERE email='$trainer_email' OR phone='$trainer_phone' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        if ($result) { // if trainer exists
            $user = mysqli_fetch_assoc($result);
            if ($user['email'] === $trainer_email) {
                array_push($errors, "Email already exists");
            }
            if ($user['phone'] === $trainer_phone) {
                array_push($errors, "Phone number already exists");
            }
        }

        if (count($errors) == 0) {
            $encrypt_password = md5($password);//encrypt the password before saving in the database
            $trainer_id = random_int($RANDOM_ID_MIN, $RANDOM_ID_MAX);
            $query = "INSERT INTO Trainer VALUES($trainer_id, '$trainer_name','$trainer_email','$encrypt_password', $trainer_phone)";
            mysqli_query($db, $query);
            $_SESSION['trainer_name'] = $trainer_name;
            $_SESSION['trainer_id'] = $trainer_id;
            $_SESSION['success'] = "You are now Registered";
            $_SESSION['who_is'] = "trainer";
            header('location: trainerSpecializations.php');
        }
    }

    if (isset($_POST['login_trainer'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT tid,name,email FROM Trainer WHERE email='$email' AND password='$password'";
            $result = mysqli_query($db, $query);
            $row_cnt = mysqli_num_rows($result);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['trainer_name'] = $row['name'];
                    $_SESSION['trainer_id'] = $row['tid'];
                    $_SESSION['trainer_email'] = $row['email'];
                    // echo "You are now logged in";
                    $_SESSION['success'] = "You are now logged in";
                    $_SESSION['who_is'] = "trainer";
                    header('location: aboutUs.php');
                }
            } else {
                array_push($errors, "Wrong Username/Password combination");
            }
        }
    }

    if (isset($_POST['trainer_specializations'])) {
        $query = "SELECT sid,type FROM Specialization";
        $result = mysqli_query($db, $query);
        $row_cnt = mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $specializations[$row['type']] = FALSE;
                $specialization = $row['type'];
                $specialization_id = $row['sid'];
                $trainer_id = $_SESSION['trainer_id'];
                $form_formatted_specialization = implode("_",explode(" ", $specialization));
                if(isset($_POST[$form_formatted_specialization])) {
                    $specializations[$specialization] = TRUE;
                    $query = "INSERT INTO SpecializesIn VALUES($trainer_id, $specialization_id)";
                    mysqli_query($db, $query);
                    header('location: aboutUs.php');
                }
            }
        }
    }


    // Update Appointment
    if (isset($_POST['update_appointment'])) {
        // receive all input values from the form
        $client_name = mysqli_real_escape_string($db, $_POST['client_name']);
        // echo $client_name;
        $trainer_name = mysqli_real_escape_string($db, $_POST['trainer_name']);
        $client_id = mysqli_real_escape_string($db, $_POST['client_id']);
        $trainer_id = mysqli_real_escape_string($db, $_POST['trainer_id']);
        $date = mysqli_real_escape_string($db, date("Y-m-d H:i:s",strtotime( $_POST['aptDate'])));
        $time  = mysqli_real_escape_string($db,  date("H:i:s",strtotime( $_POST['aptTime'])) );
        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($trainer_name)) { array_push($errors, "Trainer Name is required"); }
        if (empty($client_name)) { array_push($errors, "Client Name is required"); }
        if (empty($date)) { array_push($errors, "Date is required"); }
        if (empty($time)) { array_push($errors, "Time is required"); }	
        $query = "UPDATE appointments SET date='$date' WHERE client_id=$client_id AND trainer_id=$trainer_id";
        mysqli_query($db, $query);
        $query = "UPDATE appointments SET time='$time' WHERE client_id=$client_id AND trainer_id=$trainer_id";
        mysqli_query($db, $query);
        header("location: viewAppointments.php?client_id=$client_id&trainer_id=$trainer_id");
        exit;
    }



//MyProfileClient
if (isset($_SESSION['client_id']))
{
$clientid=$_SESSION['client_id'];
$profile_client_query = "SELECT * FROM client WHERE cid='".$clientid."'";
$result_client = mysqli_query($db, $profile_client_query);
$row_count = mysqli_num_rows($result_client);
if($row_count>0)
{
    while($row_count = $result_client->fetch_assoc()) 
    {
        $client_id= $row_count["cid"];
        $client_name= $row_count["name"];
       $client_email= $row_count["email"];
       $client_phone= $row_count["phone"];
       $client_dob= $row_count["birthdate"];
       $client_gender= $row_count["gender"];
       $client_height= $row_count["height"];
       $client_weight= $row_count["weight"];
       $client_health= $row_count["health_conditions"];
       $client_econtactname= $row_count["emergency_name"];
       $client_econtact= $row_count["emergency_phone"];
    }
}
}

//MyProfileTrainer
if (isset($_SESSION['trainer_id']))
{
    $trainerid=$_SESSION['trainer_id'];
    $profile_trainer_query = "SELECT * FROM trainer WHERE tid='".$trainerid."'";
    $result_trainer = mysqli_query($db, $profile_trainer_query);
    $row_count = mysqli_num_rows($result_trainer);
    $specialize_query="SELECT s.type from specialization s , specializesin sn where s.sid=sn.specialization_id and sn.trainer_id='".$trainerid."'";
    $result_specialize = mysqli_query($db, $specialize_query);
    $row_count_specialize = mysqli_num_rows($result_specialize);

    if($row_count>0)
    {
        while($row_count = $result_trainer->fetch_assoc()) 
        {
        $trainer_id= $row_count["tid"];
        $trainer_name= $row_count["name"];
        $trainer_email= $row_count["email"];
        $trainer_phone= $row_count["phone"];   
        }
    }
}



//Book Appointment
if (isset($_POST['book_appointment'])) {
$client_id = $_SESSION['client_id'];
$tid = $_POST['trainerid'];
$aptDate = $_POST['aptDate'];
$apttime = $_POST['aptTime'];
$query = "INSERT INTO appointments (client_id,trainer_id, date, time) VALUES($client_id, $tid, '$aptDate', '$apttime')";
mysqli_query($db, $query);
header("location: viewAppointments.php");

} 

//change password
if (isset($_POST['changepwd'])) {
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $user_check_query = "SELECT * FROM client WHERE email='$email' LIMIT 1";
    $result_fpw = mysqli_query($db, $user_check_query);
    $user_pw = mysqli_fetch_assoc($result_fpw);

    if (empty($password_1)) {
        array_push($errors, "Please enter new password");
    }

    if (empty($password_2)) {
        array_push($errors, "Please confirm your new password");
    }

    if (!empty($password_2) && !empty($password_1) && !strcmp($password_1, $password_2) == 0) {
        array_push($errors, "Provided password did not match. Please try again.");
    }

    // Finally, update lient if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "UPDATE client SET password='$password' WHERE email='$email'";
        mysqli_query($db, $query);
        header("location: passwordUpdateSuccess.php");
    }
}