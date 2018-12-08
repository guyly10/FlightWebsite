

<?php
session_start();
$fName = "";
$lName = "";
$dob = "";
$email = "";
$phone = "";
$pass = "";
$address = "";
if(empty($_SESSION['fName']))
  $fName = "First Name";
else {
  $fName = $_SESSION['fName'];
}
if(empty($_SESSION['lName']))
  $lName = "Last Name";
else {
  $lName = $_SESSION['lName'];
}
if(empty($_SESSION['dob']))
  $dob = "dd/mm/yyyy";
else {
  $dob = $_SESSION['dob'];
}
if(empty($_SESSION['email']))
  $email = "abc@gmail.com";
else {
  $email = $_SESSION['email'];
}
if(empty($_SESSION['phone']))
  $phone = "Phone: (xxx) - xxx xxxx";
else {
  $phone = $_SESSION['phone'];
}
if(empty($_SESSION['pass']))
  $pass = "Password";
else {
  $pass = $_SESSION['pass'];
}
if(empty($_SESSION['address']))
  $address = "Address";
else {
  $address = $_SESSION['address'];
}

 ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/HeadPage.css">
    <link rel="stylesheet" href="css/SideBar.css.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <link href='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet'
          type='text/css'>
    <title>AGflights</title>
</head>
<body>
<a href="HeadPage.php">
    <div class="imgcontainer">
        <img src="images/Flight_Logo.png" alt="Logo" class="Logo">
    </div>
</a>
<br>
<br>
<div id='menu'>
    <ul>
        <li><a href='HeadPage.php'>Home</a></li>
        <li class='active'><a href='AccountPage.php'>Account</a></li>
        <li><a href='#'>Currency</a></li>
        <li><a href='index.php'>Logout</a></li>
    </ul>
</div>
<div class='container'>
    <div class='panel panel-primary dialog-panel'>

        <div class='panel-heading'>
            <div class="vertical-menu">
                <b><a href="AccountPage.php" style="color: black; text-decoration: none">Profile &nbsp &nbsp &nbsp</a></b>
                <a href="UpdateDetails.php" style="color: black; text-decoration: none">Update Personal Details &nbsp &nbsp &nbsp</a>
            </div>
        </div>
        <div class='panel-body'>
            <form class='form-horizontal' role='form'>
                <div>
                    <img src="images/Flight_Logo.png" class="profilePic">
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_pic'>Profile Picture</label>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <div class='col-md-11'>

                              <input type='file' onchange="readURL(this);" />
                              <img class="profilePic" id="blah" src="#" alt="your image" />
                              <script>
                              function readURL(input) {
                                      if (input.files && input.files[0]) {
                                          var reader = new FileReader();

                                          reader.onload = function (e) {
                                              $('#blah')
                                                  .attr('src', e.target.result)
                                                  .width(150)
                                                  .height(150);
                                          };

                                          reader.readAsDataURL(input.files[0]);
                                      }
                                  }
                              </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_first_name'>Name</label>
                    <div class='col-md-8'>
                        <div class='col-md-3 indent-small'>
                            <div class='form-group internal'>
                                <input class='form-control' id='id_first_name' placeholder="<?php echo $fName?>" type='text'>
                            </div>
                        </div>
                        <div class='col-md-3 indent-small'>
                            <div class='form-group internal'>
                                <input class='form-control' id='id_last_name' placeholder='<?php echo $lName?>' type='text'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_DOB'>Date Of Birth mm/dd/yyyy</label>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <div class='col-md-11'>
                                <input class='form-control' id='id_DOB' placeholder='<?php echo $dob?>' type='text'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Contact</label>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <div class='col-md-11'>
                                <input class='form-control' id='id_email' placeholder='<?php echo $email?>' type='text'>
                            </div>
                        </div>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id='id_phone' placeholder='<?php echo $phone?>'
                                       type='text'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_pass'>Password</label>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <div class='col-md-11'>
                                <input class='form-control' id='id_pass' placeholder='<?php echo $pass?>' type='text'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_address'>Address</label>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <div class='col-md-11'>
                                <input class='form-control' id='id_address' placeholder='<?php echo $address?>' type='text'>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422
    <p>
</footer>
</body>
</html>
