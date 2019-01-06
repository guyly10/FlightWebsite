

<?php
session_start();
if(!isset($_SESSION['uname']) || ($_SESSION['uname']==""))
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


$json = file_get_contents("DataBase/Orders.json");
$result = json_decode($json);
$orders= $result->orders;
$items = array();
for($idx = 0; $idx < count($orders); $idx++){
    $obj = $orders[$idx]->UserId;
    if($obj==$_SESSION['uname']){
      array_push($items ,$orders[$idx]->itemId);
    }
}
$jsonC = file_get_contents("DataBase/Cars.json");
$jsonF = file_get_contents("DataBase/Flights.json");
$jsonH = file_get_contents("DataBase/Hotels.json");
$resultC = json_decode($jsonC);
$resultF = json_decode($jsonF);
$resultH = json_decode($jsonH);
$cars= $resultC->cars;
$flights = $resultF->flights;
$hotels = $resultH->hotels;

$itemIdC = "";
$destinationC = "";
$carGroupC = "";
$DateFromC = "" ;
$pickupHourC = "";
$DateToC = "";
$dropOffC = "";
$driverAgeC = "";
$CostC = "";

for($idx = 0; $idx < count($cars); $idx++){
  $obj = $cars[$idx]->itemId;
  for($id = 0; $id < count($items); $id++){
    if($items[$id] == $obj){
      $itemIdC = $cars[$idx]->itemId;
      $destinationC = $cars[$idx]->destination;
      $carGroupC = $cars[$idx]->carGroup;
      $DateFromC = $cars[$idx]->DateFrom ;
      $pickupHourC = $cars[$idx]->pickupHour;
      $DateToC = $cars[$idx]->DateTo;
      $dropOffC = $cars[$idx]->dropOff;
      $driverAgeC = $cars[$idx]->driverAge;
      $CostC = $cars[$idx]->Cost;
    }
  }
}

$itemIdF = "";
$originF = "";
$DestinationF = "";
$DateFromF = "";
$DateToF = "";
$CostF = "";

for($idx = 0; $idx < count($flights); $idx++){
  $obj = $flights[$idx]->itemId;
  for($id = 0; $id < count($items); $id++){
    if($items[$id] == $obj){
      $itemIdF = $flights[$idx]->itemId;
      $originF = $flights[$idx]->origin;
      $DestinationF = $flights[$idx]->Destination;
      $DateFromF = $flights[$idx]->DateFrom;
      $DateToF = $flights[$idx]->DateTo;
      $CostF = $flights[$idx]->Cost;
    }
  }
}

$itemIdH = "";
$destinationH = "";
$DateFromH = "";
$DateToH = "";
$CostH = "";

for($idx = 0; $idx < count($hotels); $idx++){
  $obj = $hotels[$idx]->itemId;
  for($id = 0; $id < count($items); $id++){
    if($items[$id] == $obj){
      $itemIdH = $hotels[$idx]->itemId;
      $destinationH = $hotels[$idx]->destination;
      $DateFromH = $hotels[$idx]->DateFrom;
      $DateToH = $hotels[$idx]->DateTo;
      $CostH = $hotels[$idx]->Cost;
    }
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
                <b><a href="UserOrders.php" style="color: black; text-decoration: none">View Trip Details &nbsp &nbsp &nbsp</a></b>
                <a href= <?php if($_SESSION['uname']=="admin") {echo "AdminInfo.php";}?>  style="color: black; text-decoration: none">
                  <?php
                  if($_SESSION['uname']=="admin"){
                     echo "All users information";
                   }
                  ?>
                </a>
            </div>
        </div>
        <table style="width:50%">
          <h3>Flight</h3>
          <tr>
            <td><b>origin</b></td>
            <td><b>Destination</b></td>
            <td><b>Date From</b></td>
            <td><b>Date To</b></td>
            <td><b>Cost</b></td>
          </tr>
          <tr>
            <td><?php echo $originF?></td>
            <td><?php echo $DestinationF?></td>
            <td><?php echo $DateFromF?></td>
            <td><?php echo $DateToF?></td>
            <td><?php echo $CostF?></td>
          </tr>
        </table>
        <br>
        <br>
        <table style="width:40%">
          <h3>Hotels</h3>
          <tr>
            <td><b>Destination</b></td>
            <td><b>Date From</b></td>
            <td><b>Date To</b></td>
            <td><b>Cost</b></td>
          </tr>
          <tr>
            <td><?php echo $destinationH?></td>
            <td><?php echo $DateFromH?></td>
            <td><?php echo $DateToH?></td>
            <td><?php echo $CostH?></td>
          </tr>
        </table>
        <br>
        <br>
        <table style="width:70%">
          <h3>Cars</h3>
          <tr>
            <td><b>Destination</b></td>
            <td><b>Date From</b></td>
            <td><b>Pickup Hour</b></td>
            <td><b>Date To</b></td>
            <td><b>Drop Off</b></td>
            <td><b>Car Group</b></td>
            <td><b>Driver Age</b></td>
            <td><b>Cost</b></td>
          </tr>
          <tr>
            <td><?php echo $destinationC?></td>
            <td><?php echo $DateFromC?></td>
            <td><?php echo $pickupHourC?></td>
            <td><?php echo $DateToC?></td>
            <td><?php echo $dropOffC?></td>
            <td><?php echo $carGroupC?></td>
            <td><?php echo $driverAgeC?></td>
            <td><?php echo $CostC?></td>
          </tr>
        </table>
    </div>
</div>
<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422
    <p>
</footer>
</body>
</html>
