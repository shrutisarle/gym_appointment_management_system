<?php include 'server.php'?>
<?php include 'header.php'?>
<?php

if(isset($_GET['client_name'])){
	$client_name = $_GET['client_name'];
}else { 
	$client_name = "";
}
if(isset($_GET['client_id'])){
	$client_id = $_GET['client_id'];
}else { 
	$client_id = "";
}

if(isset($_GET['trainer_name'])){
	$trainer_name = $_GET['trainer_name'];
}else { 
	$trainer_name = "";
}
if(isset($_GET['trainer_id'])){
	$trainer_id = $_GET['trainer_id'];
}else { 
	$trainer_id = "";
}

if(isset($_GET['date'])){
    $date = $_GET['date'];
}else{
    $date = "";
}
if(isset($_GET['time'])){
    $time = $_GET['time'];
}else{
    $time = "";
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Appointment</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/product/">
    

</head>
<body>
  <div class="header bg-dark">
  	<h2>Update Appointment</h2>
  </div>  
  <form method="post" action="server.php">	
  <input type="hidden" name="trainer_id" value="<?php echo $trainer_id; ?>" />
  	<div class="input-group">
  	  <label>Client</label>
  	  <input type="text" name="client_name" value="<?php echo $client_name;?>">
      <!--
	  <input type="hidden" name="client_id" value=$client_id />
	  -->
  	  <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
	  
  	</div>
  	<div class="input-group">
  	  <label>Trainer</label>
  	  <input type="text" name="doc_name" value="<?php echo $trainer_name;?>">
  	</div>
    <div class="input-group">
    <label>Date</label>
    <input type="date" name="aptDate" value="<?php echo $date ?>" />
</div>
<div class="input-group">
    <label>Time</label>
    <input type="time" name="aptTime" value="<?php echo $time ?>">
</div>
</br>
  	<div class="input-group">
  	  <button type="submit" class="btn btn-secondary" name="update_appointment">Update</button>
  	</div>
  </form>
</body>
</html>