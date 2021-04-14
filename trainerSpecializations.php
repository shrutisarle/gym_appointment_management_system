<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title> Gym Trainer Specialization </title>
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
  	<h2>Choose specialization</h2>
  </div>
  <form method="post" class = "opt_in_form" action="trainerSpecializations.php">
    <?php include('errors.php'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Strength_training" id="ck1a" >
                <label class="custom-control-label" for="ck1a">
                    <img src="images/strength_training.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Strength training </h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Calisthenics" id="ck1b" >
                <label class="custom-control-label" for="ck1b">
                    <img src="images/Calisthenics.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Calisthenics </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Cardio" id="ck1c">
                <label class="custom-control-label" for="ck1c">
                    <img src="images/cardio.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Cardio </h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Swimming" id="ck1d">
                <label class="custom-control-label" for="ck1d">
                    <img src="images/swimming.jpeg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Swimming </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Yoga" id="ck1e" >
                <label class="custom-control-label" for="ck1e">
                    <img src="images/yoga.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Meditation </h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Zumba" id="ck1f">
                <label class="custom-control-label" for="ck1f">
                    <img src="images/zumba.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Zumba </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Tennis" id="ck1g">
                <label class="custom-control-label" for="ck1g">
                    <img src="images/tennis.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Tennis </h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-control custom-checkbox image-checkbox">
                <input type="checkbox" class="custom-control-input" name="Boxing" id="ck1h">
                <label class="custom-control-label" for="ck1h">
                    <img src="images/boxing.jpg" width="300" height="300" alt="#" class="img-fluid">
                </label>
                <h4> Boxing </h4>
            </div>
        </div>
    </div>
    <div class="flex-container">
        <button type="submit" class="btn btn-secondary" name="trainer_specializations">Add to my specializations</button>
        <a class='nav-link' href='aboutUs.php'>Not now</a>
    </div>
  </form>
</body>
</html>