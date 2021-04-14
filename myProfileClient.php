<?php include('server.php') ?>
<?php include 'header.php'?>

<?php 
$facity_query="SELECT f.type from facilities f , optedfor o where f.fid=o.facility_id and o.client_id=$client_id";
$result_facility = mysqli_query($db, $facity_query);
$row_count_facility = mysqli_num_rows($result_facility);
$facilities = [];
while($row_count_facility = $result_facility->fetch_assoc()) {
  array_push($facilities, $row_count_facility['type']);
}
?> 

<!DOCTYPE html>
<html>
<head>
  <title> My Profile </title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/product/">

    <!-- Bootstrap core CSS -->
<!-- <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
</head>
<body>
  <div class="header opt_in_header" style="background:#3B3E41;">
  	<h2>My Profile</h2>
  </div>
  
  <!-- <form method="post" class = "opt_in_form" action="trainerSpecializations.php"> -->
    <?php include('errors.php'); ?>

  <div class="header opt_in_header" style="background:#00000000;"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td> <b>Personal Information: </b></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Name:</td>
                        <td><?php echo $client_name ?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $client_email ?></td>
                      </tr>
                      <tr>      
                        <td>Phone:</td>
                        <td><?php echo $client_phone ?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth:</td>
                        <td><?php echo $client_dob ?></td>
                      </tr>
                      <tr>
                        <td>Gender:</td>
                        <td><?php echo $client_gender ?></td>
                      </tr>
                      <tr>
                        <td>Height:</td>
                        <td><?php echo $client_height ." ". "cm"; ?></td>
                      </tr>
                      <tr>
                        <td>Weight:</td>
                        <td><?php echo $client_weight ." ". "kg";  ?></td>    
                      </tr>      
                      <tr>
                        <td>Health Conditions:</td>
                        <td><?php echo $client_health ?></td>             
                      </tr>     
                      <tr>
                        <td>Emergency Contact Name:</td>
                        <td><?php echo $client_econtactname ?></td>     
                      </tr>
                      <tr>
                        <td>Emergency Contact Phone:</td>
                        <td><?php echo $client_econtact ?></td>                         
                      </tr>
                      <tr>
                        <td> <b>Facilities </b></td>
                        <td></td>
                      </tr>       
                      <tr>
                        <td>Facilities Opted For:</td>
                        <td><?php echo implode(',', count($facilities) > 0 ? $facilities : ['N/A']);?>                         
                      </tr>                                        
                    </tbody>
                  </table>
                 <a href="aboutus.php" class="btn btn-secondary" style="width:140px; background:#3B3E41"> OK </a>
               </div>
            
               <?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"  crossorigin="anonymous"></script>
</body>
</html>
