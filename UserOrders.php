<?php include 'DataBaseConn.php' ?>
<?php
session_start();
if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == ""))
    header('Location: index.php');

$displayName = $_SESSION['uname'];
$_SESSION['userName'] = $_SESSION['uname'];


$sqlOrders = "SELECT * FROM orders;";
$resultOrders = mysqli_query($conn, $sqlOrders);
$items = array();

while ($rowOrders = mysqli_fetch_assoc($resultOrders)){
    if ($rowOrders['UserId'] == $displayName){
        array_push($items, $rowOrders['itemId']);
    }
}

$sqlCars = "SELECT * FROM cars;";
$resultCars = mysqli_query($conn, $sqlCars);
$cars = array();

$itemIdC = array();
$destinationC = array();
$carGroupC = array();
$DateFromC = array();
$pickupHourC = array();
$DateToC = array();
$dropOffC = array();
$driverAgeC = array();
$CostC = array();

while ($rowCars = mysqli_fetch_assoc($resultCars)){
    for ($idx = 0; $idx < count($items); $idx++){
        if ($rowCars['itemId'] == $items[$idx]){
            array_push($itemIdC, $rowCars['itemId']);
            array_push($destinationC, $rowCars['destination']);
            array_push($carGroupC, $rowCars['carGroup']);
            array_push($DateFromC, $rowCars['DateFrom']);
            array_push($pickupHourC, $rowCars['pickupHour']);
            array_push($DateToC, $rowCars['DateTo']);
            array_push($dropOffC, $rowCars['dropOff']);
            array_push($driverAgeC, $rowCars['driverAge']);
            array_push($CostC, $rowCars['Cost']);
        }
    }
}

$itemIdF = array();
$originF = array();
$DestinationF = array();
$DateFromF = array();
$DateToF = array();
$CostF = array();

$sqlFlight = "SELECT * FROM flights;";
$resultFlight = mysqli_query($conn, $sqlFlight);
$flights = array();

while ($rowFlight = mysqli_fetch_assoc($resultFlight)){
    for ($idx = 0; $idx < count($items); $idx++){
        if ($rowFlight['itemId'] == $items[$idx]){
            array_push($itemIdF, $rowFlight['itemId']);
            array_push($originF, $rowFlight['origin']);
            array_push($DestinationF, $rowFlight['Destination']);
            array_push($DateFromF, $rowFlight['DateFrom']);
            array_push($DateToF, $rowFlight['DateTo']);
            array_push($CostF, $rowFlight['Cost']);
        }
    }
}

$sqlHotels = "SELECT * FROM hotels;";
$resultHotels = mysqli_query($conn, $sqlHotels);
$hotels = array();

$itemIdH = array();
$destinationH = array();
$DateFromH = array();
$DateToH = array();
$CostH = array();

while ($rowHotels = mysqli_fetch_assoc($resultHotels)){
    for ($idx = 0; $idx < count($items); $idx++){
        if ($rowHotels['itemId'] == $items[$idx]){
            array_push($itemIdH, $rowHotels['itemId']);
            array_push($destinationH, $rowHotels['destination']);
            array_push($DateFromH, $rowHotels['DateFrom']);
            array_push($DateToH, $rowHotels['DateTo']);
            array_push($CostH, $rowHotels['Cost']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
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
        <?php echo "Hello, " . $displayName . "!"; ?>
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
                <a href="UpdateDetails.php" style="color: black; text-decoration: none">Update Personal Details &nbsp
                    &nbsp &nbsp</a>
                <b><a href="UserOrders.php" style="color: black; text-decoration: none">View Trip Details &nbsp &nbsp
                        &nbsp</a></b>
                <a href= <?php if ($_SESSION['uname'] == "admin") {
                    echo "AdminInfo.php";
                } ?>  style="color: black; text-decoration: none">
                <?php
                if ($_SESSION['uname'] == "admin") {
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
                <td><?php foreach ($originF as $value){
                        echo $value; echo "<br>";;
                    } ?></td>
                <td><?php foreach ($DestinationF as $value){
                        echo $value; echo "<br>";;
                    } ?></td>
                <td><?php foreach ($DateFromF as $value){
                        echo $value; echo "<br>";
                    } ?></td>
                <td><?php foreach ($DateToF as $value){
                        echo $value; echo "<br>";
                    }?></td>
                <td><?php foreach ($CostF as $value){
                        echo $value; echo "<br>";
                    }?></td>
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
                <td><?php foreach ($destinationH as $value){
                        echo $value; echo "<br>";
                    } ?></td>
                <td><?php foreach ($DateFromH as $value){
                        echo $value; echo "<br>";
                    } ?></td>
                <td><?php foreach ($DateToH as $value){
                        echo $value; echo "<br>";
                    } ?></td>
                <td><?php foreach ($CostH as $value){
                        echo $value; echo "<br>";
                    } ?></td>
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
                <td><?php foreach ($destinationC as $value){
                    echo $value; echo "<br>";
                    }?></td>
                <td><?php foreach ($DateFromC as $value){
                        echo $value; echo "<br>";
                    } ?></td>
                <td><?php foreach ($pickupHourC as $value){
                        echo $value; echo "<br>";
                    } ?></td>
                <td><?php foreach ($DateToC as $value){
                        echo $value; echo "<br>";
                    } ?></td>
                <td><?php foreach ($dropOffC as $value){
                        echo $value; echo "<br>";
                    } ?></td>
                <td><?php foreach ($carGroupC as $value){
                        echo $value; echo "<br>";
                    } ?></td>
                <td><?php foreach ($driverAgeC as $value){
                        echo $value; echo "<br>";
                    } ?></td>
                <td><?php foreach ($CostC as $value){
                        echo $value; echo "<br>";
                    } ?></td>
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
