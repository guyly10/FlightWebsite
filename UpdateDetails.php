<?php include 'FieldCheckLoginLogicUpdateDetails.php'?>
<?php
if(!isset($_SESSION['uname']) || ($_SESSION['uname']==""))
   header('Location: index.php');
$displayName = $_SESSION['uname'];

$fname = "";
$lName = "";
$dob = "";
$email = "";
$phone = "";
$pass = "";
$address = "";
if (isset($_POST['register'])){
     $fname = $_POST['id_first_name'];
     $lName = $_POST['id_last_name'];
     $dob = $_POST['id_DOB'];
     $email = $_POST['id_email'];
     $phone = $_POST['id_phone'];
     $pass = $_POST['id_pass'];
     $address = $_POST['id_address'];

    if ($fname != "" && $lName != "" && $dob != "" && $email != "" && $phone != "" && $pass != "" && $address != ""){
        header('Location: AccountPage.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/HeadPage.css">
    <link rel="stylesheet/less" type="text/css" href="css/UpdateDetails.less">
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <link href='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet'
          type='text/css'>
    <title>AGflights</title>
</head>
<body>
<div><b>
  <?php echo "Hello, ".$displayName."!"; ?>
</b></div>

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
        <li><a href='Currency.php'>Currency</a></li>
        <li><a href='Reviews.php'>Write Review</a></li>
        <li><a href='UsersReviews.php'>Users Reviews</a></li>
        <li><a href='index.php'>Logout</a></li>
    </ul>
</div>
<div class='container'>
    <div class='panel panel-primary dialog-panel'>

        <div class='panel-heading'>
            <div class="vertical-menu">
                <a href="AccountPage.php" style="color: black; text-decoration: none">Profile &nbsp &nbsp &nbsp</a>
                <b><a href="UpdateDetails.php" style="color: black; text-decoration: none">Update Personal Details &nbsp &nbsp &nbsp</a></b>
                <a href="UserOrders.php" style="color: black; text-decoration: none">View Trip Details &nbsp &nbsp &nbsp</a>
                <a href="ShoppingCart.php" style="color: black; text-decoration: none">Shopping Cart &nbsp &nbsp
                    &nbsp</a>
                <a href= <?php if($_SESSION['uname']=="Admin") {echo "AdminInfo.php";}?>  style="color: black; text-decoration: none">
                  <?php
                  if($_SESSION['uname']=="Admin"){
                     echo "All users information";
                   }
                  ?>
                </a>
            </div>
        </div>
        <div class='panel-body'>
            <form class='form-horizontal' role='form' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_pic'>Profile Picture</label>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <div class='col-md-11'>

                                <input type='file' name="pic" onchange="readURL(this);" />
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
                <button type="submit" id="register" name="register">Submit</button>
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
