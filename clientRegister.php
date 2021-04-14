<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gym Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="style.css">
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
        <div class="header bg-dark">
            <h2>Client Registration</h2>
        </div>
        <form method="post" action="clientRegister.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label> Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="input-group">
                <label>Date of birth</label>
                <input type="date" name="dob" value="<?php echo $dob; ?>">
            </div>
            <div>
                <input type="radio" id="male" name="gender" value="male" <?php echo ($gender == 'male') ?  "checked" : "" ;  ?>>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" <?php echo ($gender == 'female') ?  "checked" : "" ;  ?>>
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other" <?php echo ($gender == 'other') ?  "checked" : "" ;  ?>>
                <label for="other">Other</label>
            </div>
            <div class="input-group">
                <label>Height(cm)</label>
                <input type="number" name="height" value="<?php echo $height; ?>">
            </div>
            <div class="input-group">
                <label>Weight(kg)</label>
                <input type="number" name="weight" value="<?php echo $weight; ?>">
            </div>
            <div class="input-group">
                <label>Health conditions</label>
                <textarea rows="4" cols="50" name="health_conditions"><?php echo $health_conditions; ?></textarea>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="confirm_password">
            </div>
            <div class="input-group">
                <label>Emergency contact name</label>
                <input type="text" name="emergency_contact_name" value="<?php echo $emergency_contact_name; ?>">
            </div>
            <div class="input-group">
                <label>Emergency contact phone</label>
                <input type="text" name="emergency_contact_phone" value="<?php echo $emergency_contact_phone; ?>">
            </div>
            <div class="input-group">
                <button type="submit" class="btn btn-secondary" name="reg_client">Register</button>
            </div>
            <p>
                Already a member? <a href="clientRegister.php">Sign in</a>
            </p>
            <p>
                <a href="home.php">Back to main menu?</a>
            </p>
        </form>
    </body>
</html>