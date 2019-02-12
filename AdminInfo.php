<?php include 'DataBaseConn.php'?>
<?php
session_start();
if(!isset($_SESSION['uname']) || ($_SESSION['uname']!="Admin"))
   header('Location: index.php');

$displayName = $_SESSION['uname'];
$_SESSION['userName'] = $_SESSION['uname'];
$uploadF = "";

$users = array();
$passwords = array();
$sqlUsers = "SELECT * FROM users;";
$resultUsers = mysqli_query($conn, $sqlUsers);
while ($rowUsers = mysqli_fetch_assoc($resultUsers)){
        if ($rowUsers['UserID']!='' && $rowUsers['password']!=''){
            array_push($users, $rowUsers['UserID']);
            array_push($passwords, $rowUsers['password']);
        }
}

if (isset($_POST['Submit'])){
  $json = file_get_contents("Jsons/newFlights.json");
  $result = json_decode($json);
  $flights= $result->flights;
  for($idx = 0; $idx < count($flights); $idx++){
    $itemId = $flights[$idx]->itemId;
    $origin = $flights[$idx]->origin;
    $destination = $flights[$idx]->destination;
    $DateFrom = $flights[$idx]->DateFrom;
    $DateTo = $flights[$idx]->DateTo;
    $Cost = $flights[$idx]->Cost;

    $sql = "INSERT INTO flights (ItemId, origin, Destination, DateFrom, DateTo, Cost)
        VALUES ('$itemId', '$origin', '$destination', '$DateFrom', '$DateTo', '$Cost');";
    mysqli_query($conn, $sql);
    $uploadF = "Flights Added Successfully";
    }
    foreach ($users as $value) {
        $msg = "New Flights added to the system , please Check it out !";
        $sql = "INSERT INTO notifications (user,msg)
          VALUES ('$value', '$msg');";
        mysqli_query($conn, $sql);
    }

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
                <b><a href= <?php if($_SESSION['uname']=="Admin") {echo "AdminInfo.php";}?>  style="color: black; text-decoration: none">
                  <?php
                  if($_SESSION['uname']=="Admin"){
                     echo "All users information";
                   }
                  ?>
                </a></b>
            </div>
        </div>
        <table style="width:50%">
          <h3>Users</h3>
          <tr>
            <td><b>User Id</b></td>
            <td><b>Password</b></td>
          </tr>
          <td><?php foreach ($users as $value){
                  echo $value; echo "<br>";;
              } ?></td>
          <td><?php foreach ($passwords as $value){
                  echo $value; echo "<br>";;
              } ?></td>
        </table>
        <br>
        <br>
        <div>
          <form method="post" action="">
            <input type="submit" value="Upload Flights" name="Submit">
            <!-- <button id="uploadFligts" name="uploadFligts" type="submit" class="btn-submit">Upload Flights</button> -->
          </form>
          <br>
          <h4><?php echo $uploadF ?></h4>
        </div>
    </div>
</div>
<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422
    <p>
</footer>
</body>
</html>
