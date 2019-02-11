<?php include 'DataBaseConn.php'?>
<?php

session_start();
if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == ""))
    header('Location: index.php');
$displayName = $_SESSION['uname'];

$searchc = "display:none";
$searchh = "display:none";
$searchf = "display:none";

$destinationH = array();
$DateFromH = array();
$DateToH = array();
$CostH = array();
if (isset($_POST['submit1'])){
  $searchh ="";
  if($_POST['where']!=null && $_POST['where']!= ''){
    $where = $_POST['where'];
    $check_in1 = $_POST['check_in1'];
    $check_out1 = $_POST['check_out1'];

    $sql = "SELECT * FROM hotels WHERE destination LIKE '%$where%' AND DateFrom = '$check_in1' And DateTo = '$check_out1';";
    $resultHotels = mysqli_query($conn, $sql);
    while ($rowHotels = mysqli_fetch_assoc($resultHotels)){
                array_push($destinationH, $rowHotels['destination']);
                array_push($DateFromH, $rowHotels['DateFrom']);
                array_push($DateToH, $rowHotels['DateTo']);
                array_push($CostH, $rowHotels['Cost']);
    }
  }
}

$destinationC = array();
$carGroupC = array();
$DateFromC = array();
$pickupHourC = array();
$DateToC = array();
$dropOffC = array();
$driverAgeC = array();
$CostC = array();
if (isset($_POST['submit2'])){
  $searchc ="";
  if($_POST['location']!=null && $_POST['location']!= ''){
    $location = $_POST['location'];
    $car_group = $_POST['car_group'];
    $check_in = $_POST['check_in2'];
    $check_out = $_POST['check_out2'];

    $sql = "SELECT * FROM cars WHERE destination LIKE '%$location%' AND carGroup = '$car_group' AND DateFrom = '$check_in' And DateTo = '$check_out';";
    $resultCars = mysqli_query($conn, $sql);
    while ($rowCars = mysqli_fetch_assoc($resultCars)){
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
$originF = array();
$DestinationF = array();
$DateFromF = array();
$DateToF = array();
$CostF = array();

if (isset($_POST['submit3'])){
  $searchf ="";
  if($_POST['origin']!=null && $_POST['origin']!= ''){
    $origin = $_POST['origin'];
    $destination_flight = $_POST['destination'];
    $check_in = $_POST['check_in3'];
    $check_out = $_POST['check_out3'];

    $sql = "SELECT * FROM flights WHERE origin LIKE '%$origin%' AND Destination LIKE '%$destination_flight%' AND DateFrom = '$check_in' And DateTo = '$check_out';";
    $resultFlight = mysqli_query($conn, $sql);
    while ($rowFlight = mysqli_fetch_assoc($resultFlight)){
            array_push($originF, $rowFlight['origin']);
            array_push($DestinationF, $rowFlight['Destination']);
            array_push($DateFromF, $rowFlight['DateFrom']);
            array_push($DateToF, $rowFlight['DateTo']);
            array_push($CostF, $rowFlight['Cost']);
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/HeadPage.css">
    <link rel="stylesheet" href="css/StarCSS.css">
    <link rel="stylesheet" href="css/uploadPic.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
    <script src="js/uploadPic.js"></script>
    <title>AGflights</title>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colrolib Templates">
    <meta name="author" content="Colrolib">
    <meta name="keywords" content="Colrolib Templates">
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<body>
<div><b>
        <?php echo "Hello, " . $displayName . " !";?>
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
        <li class='active'><a href='HeadPage.php'>Home</a></li>
        <li><a href='AccountPage.php'>Account</a></li>
        <li><a href='#'>Currency</a></li>
        <li><a href='Logout.php'>Logout</a></li>
    </ul>
</div>

    <div class="wrapper wrapper--w680">
        <div class="card card-2">

          <div class='container'>
              <div class='panel panel-primary dialog-panel'>
                <h2>Search Results</h2>
                <br>
                <div style='<?php echo $searchf ?>'>
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
                </div>
                  <br>
                  <br>
                  <div style='<?php echo $searchh ?>'>
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
                  </div>
                  <br>
                  <br>
                  <div style='<?php echo $searchc ?>'>
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
          </div>

        </div>
    </div>




<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/jquery-validate/jquery.validate.min.js"></script>
<script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
<script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="vendor/datepicker/moment.min.js"></script>
<script src="vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="js/global.js"></script>


</body>
<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422
    <p>
</footer>
</html>
