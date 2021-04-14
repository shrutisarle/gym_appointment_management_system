<?php include('server.php') ?>
<?php include 'header.php';?>
<?php
$select_trainer_query = "SELECT * FROM trainer";
$result_trainer = mysqli_query($db, $select_trainer_query);
$row_trainer_count = mysqli_num_rows($result_trainer);

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

  <div 	class="header bg-dark" style="width:80%;margin-left:10%;margin-top:15%;margin-right:10%">
  	<h2>Book Appointment</h2>
  </div>  
  <form method="post" action="#" style="width:80%;margin-left:10%;margin-right:10%">	
  <input type="hidden" name="tid_id"  />
  	<div class="input-group">
      <label>Select Trainer:     </label> 
  	  <select name="trainerid">
            <?php
        if($row_trainer_count>0)
        
{
    while($row_trainer_count = $result_trainer->fetch_assoc()) 
    {
       
       ?> <option type="text"  value="<?php echo $row_trainer_count["tid"];?>"> 
       <?php echo $row_trainer_count["name"];
      $select_s_query = "select tid,name, type from trainer join specializesin ON trainer.tid=specializesin.trainer_id join specialization ON specialization.sid=specializesin.specialization_id where name='". $row_trainer_count["name"]."'";
      $result_s = mysqli_query($db, $select_s_query);
      $row_s_count = mysqli_num_rows($result_s);
      echo "  (";
       while ($row_s_count=$result_s->fetch_assoc())
       {
         echo $row_s_count['type'].",";
       }
       echo ")";
       ?>
 
      </option>
<?php
    }
}
?>
 </select>
  	</div>
    <div class="input-group">
    <label>Date</label>
    <input type="date" name="aptDate" />
</div>
<div class="input-group">
    <label>Time</label>
    <input type="time" name="aptTime">
</div></br>
  	<div class="input-group">
  	  <button type="submit" style="margin-left:50%" class="btn btn-secondary bg-dark" name="book_appointment">Book</button>
  	</div>
  </form>
</body>
</html>