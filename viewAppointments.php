<?php include 'server.php'; ?>
<?php include 'header.php'?>
<?php
if($_SESSION['who_is'] == "trainer"){
    $trainer_name = $_SESSION['trainer_name'];
    if(isset($_GET['trainer_id'])){
        $trainer_id = $_GET['trainer_id'];
    }else if($_SESSION['trainer_id'] != ""){
        $trainer_id = $_SESSION['trainer_id'];
    }else{
        $trainer_id = "";
    }
}else{
    $client_name = $_SESSION['client_name'];
    if(isset($_GET['client_id'])){
        $client_id = $_GET['client_id'];
    }else if($_SESSION['client_id'] != ""){
        $client_id = $_SESSION['client_id'];
    }else{
        $client_id = "";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
</br></br>
    <h3 style="text-align:center;">Your Appointments</h3>

        <?php  
        $link= mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);         
        if ($link === false) { 
            die("ERROR: Could not connect. "
                        .mysqli_connect_error()); 
        }  
       
        $sql = "";
        if($_SESSION['who_is'] == "client"){
            $sql = "SELECT * FROM appointments ap inner join client c on ap.client_id = c.cid inner join Trainer t on ap.trainer_id=t.tid AND c.cid = $client_id";
        }else{
            $sql = "SELECT * FROM appointments ap inner join trainer t on ap.trainer_id = t.tid inner join Client c on ap.client_id = c.cid AND t.tid = $trainer_id";
        }        
        if ($res = mysqli_query($link, $sql)) { 
            if (mysqli_num_rows($res) > 0) { 
                echo "<table class='table table table-bordered table table-hover'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>";
                if($_SESSION['who_is'] == "client"){                   
                     //client will see trainer's contact details
                    echo "<th scope='col'>Trainer Name</th>"; 
                    echo "<th scope='col'>Trainer Phone</th>"; 
                }else{ //trainer will see client's contact details
                    echo "<th scope='col'>Client Name</th>"; 
                    echo "<th scope='col'>Client Phone</th>";                     
                }                                 
                echo "<th scope='col'>Apppointment Date</th>"; 
                echo "<th scope='col'>Apppointment Time</th>"; 
                echo "<th scope='col'>Update</th>"; 
                echo "<th scope='col'>Delete</th>"; 
                echo "</tr>"; 
                while ($row = mysqli_fetch_array($res)) {
                    $client_id=$row['client_id'];
                    $trainer_id=$row['trainer_id'];
                    if($_SESSION['who_is'] == "trainer"){
                        $client_name = $row['name'];
                    }else{
                        $trainer_name=$row['name'];                        
                    }                                        
                    $aptdt=$row['date'];
                    $aptime=$row['time'];
                    echo "<tr>"; 
                    echo "<td><strong>".$row['name']."</strong></td>"; 
                    echo "<td><strong>".$row['phone']."</strong></td>"; 
                    echo "<td><strong>".$row['date']."</strong></td>"; 
                    echo "<td><strong>".$row['time']."</strong></td>"; 
					echo "<td>
					
 <!--<button id='myBtn'><strong>Update</strong></button>
  <script>
    var btn = document.getElementById('myBtn');
   btn.addEventListener('click', function() {
     document.location.href = 'updateappointment.php?client_id=$client_id&client_name=$client_name&trainer_id=$trainer_id&trainer_name=$trainer_name&date=".$row['date']."&time=".$row['date']."';
   });
 </script>-->
<a href='updateappointment.php?client_id=$client_id&client_name=$client_name&trainer_id=$trainer_id&trainer_name=$trainer_name&date=$aptdt&time=$aptime'><button><strong>Update</strong></button></a>
  </td>";
  echo "<td>
  <a href='deleteappoinment.php?client_id=$client_id&trainer_id=$trainer_id'><button><strong>Delete</strong></button></a>

  <!--<button id='btnDelete'>Delete</button>
    <script>
      var btn = document.getElementById('btnDelete');
      btn.addEventListener('click', function() {
        document.location.href = 'deleteappointment.php?client_id=$client_id&trainer_id=$trainer_id';

      });
    </script>-->
    </td>";            
    echo "</tr>"; 
                } 
                echo "</table>"; 
                mysqli_free_result($res); 
            } 
            else { 
                echo "<div style='text-align:center'>You have no appointments.</div>"; 
            } 
        } 
        else { 
            echo "ERROR: Could not able to execute $sql. "
                                        .mysqli_error($link); 
        } 
        mysqli_close($link); 
        ?> 
</body>
</html>