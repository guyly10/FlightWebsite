<?php include 'DataBaseConn.php'?>
<?php
// if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == ""))
//     header('Location: index.php');

// $displayName = "hjbyyg";
// $validation = "";
// if (isset($_POST['submit'])){
//   $validation= "!!@#@#@!#@!#!@#!@#!@!#!@#!#!";
//   if($_POST['where']!=null || $_POST['where']!= ''){
//     $validation = "in 1";
//     $where = $_POST['where'];
//     $check_in = $_POST['check_in1'];
//     $check_out = $_POST['check_out1'];
//
//     $sql = "SELECT * FROM hotels WHERE destination LIKE '%$where%' AND DateFrom = '$check_in' And DateTo = '$check_out';";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_assoc($result);
//
//     // for loop to get all hotels in the destination
//     if ($where == $row['destination'] ){
//         $_SESSION ['where'] = $row['destination'];
//         $_SESSION ['check_in'] = $row['DateFrom'];
//         $_SESSION ['check_out'] = $row['DateTo'];
//         $_SESSION ['cost'] = $row['Cost'];
//         header('Location: index.php');
//         exit();
//     }
//     else {
//       header('Location: AccountPage.php');
//       exit();
//     }
//   }
//   else if($_POST['location']!=null || $_POST['location']!= ''){
//     $validation = "in 2";
//     $location = $_POST['location'];
//     $car_group = $_POST['car_group'];
//     $check_in = $_POST['check_in2'];
//     $check_out = $_POST['check_out2'];
//
//     $sql = "SELECT * FROM cars WHERE destination LIKE '%$location%' AND carGroup = '$car_group' AND DateFrom = '$check_in' And DateTo = '$check_out';";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_assoc($result);
//     if ($location == $row['destination'] ){
//       $_SESSION ['location'] = $row['destination'];
//       $_SESSION ['car_group'] = $row['carGroup'];
//       $_SESSION ['driver_age'] = $row['driverAge'];
//       $_SESSION ['dropoff'] = $row['dropOff'];
//       $_SESSION ['pickup'] = $row['pickupHour'];
//       $_SESSION ['check_in'] = $row['DateFrom'];
//       $_SESSION ['check_out'] = $row['DateTo'];
//       $_SESSION ['cost'] = $row['Cost'];
//         header('Location: index.php');
//         exit();
//     }
//     else {
//       header('Location: AccountPage.php');
//       exit();
//     }
//   }
//   else if($_POST['origin']!=null || $_POST['origin']!= ''){
//     $validation = "in 3";
//     $origin = $_POST['origin'];
//     $destination_flight = $_POST['destination'];
//     $check_in = $_POST['check_in3'];
//     $check_out = $_POST['check_out3'];
//
//     $sql = "SELECT * FROM flights WHERE destination LIKE '%$origin%' AND DateFrom = '$check_in' And DateTo = '$check_out';";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_assoc($result);
//     if ($origin == $row['$origin'] ){
//       $_SESSION ['origin'] = $row['origin'];
//       $_SESSION ['destination_flight'] = $row['destination'];
//       $_SESSION ['check_in'] = $row['DateFrom'];
//       $_SESSION ['check_out'] = $row['DateTo'];
//       $_SESSION ['cost'] = $row['Cost'];
//         header('Location: index.php');
//         exit();
//     }
//     else {
//       header('Location: AccountPage.php');
//       exit();
//     }
//   }
//
// }
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
        <?php echo "Hello, " . $displayName . " !".$validation; ?>
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
        <li class='active'><a href='#'>Home</a></li>
        <li><a href='AccountPage.php'>Account</a></li>
        <li><a href='#'>Currency</a></li>
        <li><a href='Logout.php'>Logout</a></li>
    </ul>
</div>

<div>
    <div class="wrapper wrapper--w680">
        <div class="card card-2">
            <div class="card-body">
                <ul class="tab-list">
                    <li class="tab-list__item active">
                        <a class="tab-list__link" href="#tab1" data-toggle="tab">hotels</a>
                    </li>
                    <li class="tab-list__item">
                        <a class="tab-list__link" href="#tab2" data-toggle="tab">car</a>
                    </li>
                    <li class="tab-list__item">
                        <a class="tab-list__link" href="#tab3" data-toggle="tab">flight</a>
                    </li>
                </ul>

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

<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422
    <p>
</footer>
</body>
</html>
