

<?php
session_start();
if(!isset($_SESSION['uname']) || ($_SESSION['uname']!="admin"))
   header('Location: index.php');

$displayName = $_SESSION['uname'];
$_SESSION['userName'] = $_SESSION['uname'];
// $fName = "";
// $lName = "";
// $dob = "";
// $email = "";
// $phone = "";
// $pass = "";
// $address = "";


$json = file_get_contents("DataBase/Users.json");
$result = json_decode($json);
$users= $result->users;
$items = array();
$passwords = array();
for($idx = 0; $idx < count($users); $idx++){
    array_push($items ,$users[$idx]->UserId);
    array_push($passwords ,$users[$idx]->password);
  }

 ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>
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
        <li><a href='#'>Currency</a></li>
        <li><a href='index.php'>Logout</a></li>
    </ul>
</div>
<div class='container'>
    <div class='panel panel-primary dialog-panel'>

        <div class='panel-heading'>
            <div class="vertical-menu">
                <a href="AccountPage.php" style="color: black; text-decoration: none">Profile &nbsp &nbsp &nbsp</a>
                <a href="UpdateDetails.php" style="color: black; text-decoration: none">Update Personal Details &nbsp &nbsp &nbsp</a>
                <a href="UserOrders.php" style="color: black; text-decoration: none">View Trip Details &nbsp &nbsp &nbsp</a>
                <b><a href= <?php if($_SESSION['uname']=="admin") {echo "AdminInfo.php";}?>  style="color: black; text-decoration: none">
                  <?php
                  if($_SESSION['uname']=="admin"){
                     echo "All users information";
                   }
                  ?>
                </a></b>
            </div>
        </div>
        <table style="width:50%">
          <h3>Users</h3>
          <tr>
            <td>User Id</td>
            <td>Password</td>
          </tr>
          <?php
          for($id = 0; $id < count($items); $id++)
            echo "<tr><td>$items[$id]</td><td>$passwords[$id]</td></tr>";
          ?>
        </table>
        <br>
        <br>
    </div>
</div>
<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422
    <p>
</footer>
</body>
</html>
