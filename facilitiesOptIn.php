<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title> Gym Facilites </title>
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
  <div class="header opt_in_header bg-dark">
  	<h2>Choose facilities</h2>
  </div>
  <form method="post" class = "opt_in_form" action="facilitiesOptIn.php">
    <?php include('errors.php'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Locker_room" id="ck1a">
                <label class="custom-control-label" for="ck1a">
                    <img src="images/locker-room.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Locker room </h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Sauna" id="ck1b">
                <label class="custom-control-label" for="ck1b">
                    <img src="images/sauna.jpeg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Sauna </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Basketball" id="ck1c" >
                <label class="custom-control-label" for="ck1c">
                    <img src="images/basketball.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Basketball </h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Table_tennis" id="ck1d">
                <label class="custom-control-label" for="ck1d">
                    <img src="images/table-tennis.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Table tennis </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Bowling" id="ck1e">
                <label class="custom-control-label" for="ck1e">
                    <img src="images/bowling.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Bowling </h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Climbing" id="ck1f">
                <label class="custom-control-label" for="ck1f">
                    <img src="images/climbing.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Climbing </h4>
            </div>
        </div>
    </div>
    <div class="flex-container">
        <button type="submit" class="btn btn-secondary" name="facilities_opt_in">Opt-In</button>
        <a class='nav-link' href='aboutUs.php'>Not interested</a>
    </div>
  </form>
</body>
</html>