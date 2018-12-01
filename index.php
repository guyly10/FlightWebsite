<?php
$error = "";
if (isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $pass = $_POST['psw'];

    if ($uname == "admin" && $pass == "admin"){
        header('Location: HeadPage.html');
    }
    else{
        $error = "Incorrect User name or Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexLogin.css">
    <meta charset="UTF-8">
    <title>AGflights</title>
</head>
<body>

<form method="post">
    <div class="imgcontainer">
        <img src="images/Flight_Logo.png" alt="Logo" class="Logo">
    </div>

    <div class="container">
        <b><p class="error" style="color: red"><?php echo $error?></p></b>
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" id="uname" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" id="psw" name="psw" required>

        <button type="submit" id="submit" name="submit">Login</button>
    </div>
</form>
<a href="SignUp.php" <button type="signup" id="signup" style="background-color: #ff8300">Sign Up</button></a>
<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422 <p>
</footer>
</body>
</html>
