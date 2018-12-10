<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <link href='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="css/indexLogin.css">
    <link rel="stylesheet" href="css/HeadPage.css">
    <?php include 'FieldCheckLoginLogic.php'?>
    <title>AGflights</title>
</head>
<body>

<div class='panel-body'>
    <form class='form-horizontal' role='form' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <a href="index.php">
          <div class="imgcontainer">
              <img src="images/Flight_Logo.png" alt="Logo" class="Logo">
          </div>
      </a>
      <br><br>
      <div align="center"><span style="color:#003300"><?php echo $successLogin?></span></div>
      <br><br>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_first_name'>First name</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_first_name' name="id_first_name" placeholder='First Name' type='text'>
                        <span class="error"><?php echo $fName?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_last_name'>Last name</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_last_name' name="id_last_name" placeholder='Last Name' type='text'>
                        <span class="error"><?php echo $lName?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_DOB'>Date Of Birth mm/dd/yyyy</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' type="date" id='id_DOB' name="id_DOB">
                        <span class="error"><?php echo $dob?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Contact</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_email' name="id_email" placeholder='E-mail' type='text'>
                        <span class="error"><?php echo $email?></span>
                    </div>
                </div>
                <div class='form-group internal'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_phone' name="id_phone" placeholder='Phone: (xxx) - xxx xxxx' type='text'>
                        <span class="error"><?php echo $phone?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_pass'>Password</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_pass' name="id_pass" placeholder='Password' type='password'>
                        <span class="error"><?php echo $pass?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_repass'>Repeat Password</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_repass' name="id_repass" placeholder='Password' type='password'>
                        <span class="error"><?php echo $repeatPass?></span>
                        <span class="error"><?php echo $equalPass?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_address'>Address</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_address' name="id_address" placeholder='Address' type='text'>
                        <span class="error"><?php echo $address?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container"><button type="submit" id="register" name="register">Submit</button></div>
    </form>
    <div class="container">
        <a href="index.php"><button type="Back" id="Back" style="background-color:#4da6ff">Back to Login</button></div></a>
</div>
</div>
</div>
<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422
    <p>
</footer>
</body>
</html>
