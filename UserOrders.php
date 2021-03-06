<?php include 'DataBaseConn.php' ?>
<?php
session_start();
if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == ""))
    header('Location: index.php');

$displayName = $_SESSION['uname'];
$chosenHotel = '';
$chosenFlight = '';
$chosenCar = '';
$items = array();

$itemsH = array();
$itemsF = array();
$itemsC = array();

if($_SESSION['idH'] != null && $_SESSION['idH'] != ''){
    $itemsH = $_SESSION['idh1'];
}

if($_SESSION['idF'] != null && $_SESSION['idF'] != ''){
    $itemsF = $_SESSION['idf1'];
}

if($_SESSION['idC'] != null && $_SESSION['idC'] != ''){
    $itemsC = $_SESSION['idc1'];
}

if(isset($_POST['confirmBtn']))
{

    $res = $conn->query("SELECT * FROM userhotels WHERE UserId = '$displayName'");
    while($row = $res->fetch_assoc())
    {
        $hotel = $row['hotelId'];
       $conn->query("INSERT INTO orders (UserId, itemId)
                VALUES ('$displayName', '$hotel')");
    }
    $conn->query("DELETE FROM userhotels WHERE UserId = '$displayName'");


    $res = $conn->query("SELECT * FROM userscars WHERE UserId = '$displayName'");
    while($row = $res->fetch_assoc())
    {
        $car = $row['CarId'];
        $conn->query("INSERT INTO orders (UserId, itemId)
                VALUES ('$displayName', '$car')");
    }
    $conn->query("DELETE FROM userscars WHERE UserId = '$displayName'");


    $res = $conn->query("SELECT * FROM usersflights WHERE UserId = '$displayName'");
    while($row = $res->fetch_assoc())
    {
        $flight = $row['flightId'];
        $conn->query("INSERT INTO orders (UserId, itemId)
                VALUES ('$displayName', '$flight')");
    }
    $conn->query("DELETE FROM usersflights WHERE UserId = '$displayName'");


    $res = $conn->query("SELECT * FROM userscommercials WHERE UserId = '$displayName'");
    while($row = $res->fetch_assoc())
    {
        $flightCommercial = $row['commercialId'];
        $conn->query("INSERT INTO orders (UserId, itemId)
                VALUES ('$displayName', '$flightCommercial')");
    }
    $conn->query("DELETE FROM userscommercials WHERE UserId = '$displayName'");


    $conn->query("DELETE FROM cart WHERE UserId = '$displayName'");
}

$sqlOrder = "SELECT * FROM orders;";
$resultOrder = mysqli_query($conn, $sqlOrder);

while ($rowOrder = mysqli_fetch_assoc($resultOrder)){
    if ($rowOrder['UserId'] == $displayName){
        array_push($items, $rowOrder['itemId']);
    }
}

$_SESSION['idH'] = $itemsH ;
$_SESSION['idF'] = $itemsF ;
$_SESSION['idC'] = $itemsC ;


?>
<?php include 'DisplayOrdersLogic.php' ?>

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
                <a href="UpdateDetails.php" style="color: black; text-decoration: none">Update Personal Details &nbsp
                    &nbsp &nbsp</a>
                <b><a href="UserOrders.php" style="color: black; text-decoration: none">View Trip Details &nbsp &nbsp
                        &nbsp</a></b>
                <a href="ShoppingCart.php" style="color: black; text-decoration: none">Shopping Cart &nbsp &nbsp
                    &nbsp</a>
                <a href= <?php if ($_SESSION['uname'] == "Admin") {
                    echo "AdminInfo.php";
                } ?>  style="color: black; text-decoration: none">
                <?php
                if ($_SESSION['uname'] == "Admin") {
                    echo "All users information";
                }
                ?>
                </a>
            </div>
        </div>
        <table style="width:50%">
            <h3>Flight</h3>
            <tr>
                <td><b>Order #</b></td>
                <td><b>origin</b></td>
                <td><b>Destination</b></td>
                <td><b>Date From</b></td>
                <td><b>Date To</b></td>
                <td><b>Cost</b></td>
            </tr>
            <tr>
                <td><?php foreach ($itemIdF as $value){
                        echo $value; echo "<br>";;
                    } ?></td>
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
                <td><b>Order #</b></td>
                <td><b>Destination</b></td>
                <td><b>Date From</b></td>
                <td><b>Date To</b></td>
                <td><b>Cost</b></td>
            </tr>
            <tr>
                <td><?php foreach ($itemIdH as $value){
                        echo $value; echo "<br>";
                    } ?></td>
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
                <td><b>Order #</b></td>
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
                <td><?php foreach ($itemIdC as $value){
                        echo $value; echo "<br>";
                    }?></td>
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
