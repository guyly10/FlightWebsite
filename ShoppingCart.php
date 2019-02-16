<?php include 'DataBaseConn.php' ?>
<?php
session_start();
if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == ""))
    header('Location: index.php');

$displayName = $_SESSION['uname'];
$Confirm = "Confirm";
$chosenHotel = '';
$chosenFlight = '';
$chosenCar = '';
$items = array();

$itemsH = $_SESSION['idH'];
$itemsF = $_SESSION['idF'];
$itemsC = $_SESSION['idC'];

for ($idH = 0; $idH < count($itemsH); $idH++) {
    if (isset($_POST[$idH])) {
        $chosenHotel = $itemsH[$idH];

        if ($displayName != "" && $chosenHotel != "") {
            $sql = "INSERT INTO cart (UserId, itemId)
                VALUES ('$displayName', '$chosenHotel');";
            mysqli_query($conn, $sql);
            $conn->query("INSERT INTO userhotels (UserId, hotelId) VALUES ('$displayName', '$chosenHotel')");
        }
    }
}

for ($idF = 0; $idF < count($itemsF); $idF++) {
    if (isset($_POST[$idF])) {
        $chosenFlight = $itemsF[$idF];

            $sql = "INSERT INTO cart (UserId, itemId)
                VALUES ('$displayName', '$chosenFlight');";
            mysqli_query($conn, $sql);
            $conn->query("INSERT INTO usersflights (UserId, flightId) VALUES ('$displayName','$chosenFlight')");
    }
}

for ($idC = 0; $idC < count($itemsC); $idC++) {
    if (isset($_POST[$idC])) {
        $chosenCar = $itemsC[$idC];

        if ($displayName != "" && $chosenCar != "") {
            $sql = "INSERT INTO cart (UserId, itemId)
                VALUES ('$displayName', '$chosenCar');";
            mysqli_query($conn, $sql);
            $conn->query("INSERT INTO userscars (UserId, CarId) VALUES ('$displayName','$chosenCar')");
        }
    }
}

if (isset($_POST['SugBtn'])){

    if ($displayName != "") {
        $sql = "INSERT INTO cart (UserId, itemId)
                VALUES ('$displayName', '100');";
        mysqli_query($conn, $sql);
        $conn->query("INSERT INTO userscommercials (UserId, commercialId) VALUES ('$displayName','100')");
    }
}

$sqlCart = "SELECT * FROM cart;";
$resultCart = mysqli_query($conn, $sqlCart);

while ($rowCart = mysqli_fetch_assoc($resultCart)) {
    if ($rowCart['UserId'] == $displayName) {
        array_push($items, $rowCart['itemId']);
    }
}





$_SESSION['idh1'] = $itemsH;
$_SESSION['idf1'] = $itemsF;
$_SESSION['idc1'] = $itemsC;

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
        <?php echo "Hello, " . $displayName . " !"; ?>
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
                <a href="UserOrders.php" style="color: black; text-decoration: none">View Trip Details &nbsp &nbsp
                    &nbsp</a>
                <b><a href="ShoppingCart.php" style="color: black; text-decoration: none">Shopping Cart &nbsp &nbsp
                        &nbsp</a></b>
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
                <td><b>origin</b></td>
                <td><b>Destination</b></td>
                <td><b>Date From</b></td>
                <td><b>Date To</b></td>
                <td><b>Cost</b></td>
            </tr>
            <tr>
                <?php
                for ($id = 0; $id < count($itemIdF); $id++)
                    echo "<tr>
                                  <td>$originF[$id]</td>
                                  <td>$DestinationF[$id]</td>
                                  <td>$DateFromF[$id]</td>
                                  <td>$DateToF[$id]</td>
                                  <td>$CostF[$id]</td></tr>";
                ?>
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
                <?php
                for ($id = 0; $id < count($itemIdH); $id++)
                    echo "<tr>
                                 <td>$destinationH[$id]</td>
                                 <td>$DateFromH[$id]</td>
                                 <td>$DateToH[$id]</td>
                                 <td>$CostH[$id]</td></tr>";
                ?>
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
                <?php
                for ($id = 0; $id < count($itemIdC); $id++)
                    echo "<tr>
                                  <td>$destinationC[$id]</td>
                                  <td>$DateFromC[$id]</td>
                                  <td>$pickupHourC[$id]</td>
                                  <td>$DateToC[$id]</td>
                                  <td>$dropOffC[$id]</td>
                                  <td>$carGroupC[$id]</td>
                                  <td>$driverAgeC[$id]</td>
                                  <td>$CostC[$id]</td></tr>";
                ?>
            </tr>
        </table>
    </div>
    <form action="UserOrders.php" method="post">
     <button class="btn btn-primary float-right" name="confirmBtn">Confirm</button>
    </form>
</div>
<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422
    <p>
</footer>
</body>
</html>
