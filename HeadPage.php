<?php include 'DataBaseConn.php'?>

<?php
session_start();
if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == ""))
    header('Location: index.php');

$displayName = $_SESSION['uname'];
$validation = "";
$sql = "SELECT * FROM commercials;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// $sql = "SELECT * FROM cars WHERE destination LIKE '%Rome%' AND carGroup = 'group 1' AND DateFrom = '10/10/2019' And DateTo = '15/10/2019';";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
// if ("Rome" == $row['destination'] ){
//     header('Location: index.php');
//     exit();
// }
//need to change to show more than one commercial

for ($idx = 0; $idx < 8; $idx++) {
    $city = $row['city'];
    $goDate = $row['goDate'];
    $goHour = $row['goHour'];
    $returnDate = $row['returnDate'];
    $returnHour = $row['returnHour'];
    $price = $row['price'];
    $img = $row['img'];
}

// if (isset($_POST['submit1'])){
//   header('Location: AccountPage.php');
//   exit();
//   // $validation= "!!@#@#@!#@!#!@#!@#!@!#!@#!#!";
//   // if($_POST['where']!=null || $_POST['where']!= ''){
//   //   $validation = "in 1";
//   //   $where = $_POST['where'];
//   //   $check_in = $_POST['check_in1'];
//   //   $check_out = $_POST['check_out1'];
//   //
//   //   $sql = "SELECT * FROM hotels WHERE destination LIKE '%$where%' AND DateFrom = '$check_in' And DateTo = '$check_out';";
//   //   $result = mysqli_query($conn, $sql);
//   //   $row = mysqli_fetch_assoc($result);
//   //
//   //   // for loop to get all hotels in the destination
//   //   if ($where == $row['destination'] ){
//   //       $_SESSION ['where'] = $row['destination'];
//   //       $_SESSION ['check_in'] = $row['DateFrom'];
//   //       $_SESSION ['check_out'] = $row['DateTo'];
//   //       $_SESSION ['cost'] = $row['Cost'];
//   //       header('Location: index.php');
//   //       exit();
//   //   }
//   //   else {
//   //     header('Location: AccountPage.php');
//   //     exit();
//   //   }
//   // }
// }
if (isset($_POST['submit2'])){
  if($_POST['location']!=null || $_POST['location']!= ''){
    $validation = "in 2";
    $location = $_POST['location'];
    $car_group = $_POST['car_group'];
    $check_in = $_POST['check_in2'];
    $check_out = $_POST['check_out2'];

    $sql = "SELECT * FROM cars WHERE destination LIKE '%$location%' AND carGroup = '$car_group' AND DateFrom = '$check_in' And DateTo = '$check_out';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($location == $row['destination'] ){
      $_SESSION ['location'] = $row['destination'];
      $_SESSION ['car_group'] = $row['carGroup'];
      $_SESSION ['driver_age'] = $row['driverAge'];
      $_SESSION ['dropoff'] = $row['dropOff'];
      $_SESSION ['pickup'] = $row['pickupHour'];
      $_SESSION ['check_in'] = $row['DateFrom'];
      $_SESSION ['check_out'] = $row['DateTo'];
      $_SESSION ['cost'] = $row['Cost'];
        header('Location: index.php');
        exit();
    }
    else {
      header('Location: AccountPage.php');
      exit();
    }
  }
}
if (isset($_POST['submit3'])){
  if($_POST['origin']!=null || $_POST['origin']!= ''){
    $validation = "in 3";
    $origin = $_POST['origin'];
    $destination_flight = $_POST['destination'];
    $check_in = $_POST['check_in3'];
    $check_out = $_POST['check_out3'];

    $sql = "SELECT * FROM flights WHERE destination LIKE '%$origin%' AND DateFrom = '$check_in' And DateTo = '$check_out';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($origin == $row['$origin'] ){
      $_SESSION ['origin'] = $row['origin'];
      $_SESSION ['destination_flight'] = $row['destination'];
      $_SESSION ['check_in'] = $row['DateFrom'];
      $_SESSION ['check_out'] = $row['DateTo'];
      $_SESSION ['cost'] = $row['Cost'];
        header('Location: index.php');
        exit();
    }
    else {
      header('Location: AccountPage.php');
      exit();
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
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <form id="form1" method="post" action="HeadPage.php">
                            <div class="input-group">
                                <label class="label">where:</label>
                                <input id="where" class="input--style-1" type="text" name="address"
                                       placeholder="City, region or specific hotel" required="required">
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">check-in:</label>
                                        <input id="chek_in1" class="input--style-1" type="text" name="check-in"
                                               placeholder="mm/dd/yyyy" id="input-start">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">check-out:</label>
                                        <input id="chek_out1" class="input--style-1" type="text" name="check-out"
                                               placeholder="mm/dd/yyyy" id="input-end">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="label">travellers:</label>
                                <div class="input-group-icon" id="js-select-special">
                                    <input class="input--style-1" type="text" name="traveller"
                                           value="1 Adult, 0 Children, 1 Room" disabled="disabled" id="info">
                                    <i class="zmdi zmdi-chevron-down input-icon"></i>
                                </div>
                                <div class="dropdown-select">
                                    <ul class="list-room">
                                        <li class="list-room__item">
                                            <span class="list-room__name">Room 1</span>
                                            <ul class="list-person">
                                                <li class="list-person__item">
                                                    <span class="name">Adults</span>
                                                    <div class="quantity quantity1">
                                                        <span class="minus">-</span>
                                                        <input class="inputQty" type="number" min="0" value="1">
                                                        <span class="plus">+</span>
                                                    </div>
                                                </li>
                                                <li class="list-person__item">
                                                    <span class="name">Children</span>
                                                    <div class="quantity quantity2">
                                                        <span class="minus">-</span>
                                                        <input class="inputQty" type="number" min="0" value="0">
                                                        <span class="plus">+</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="list-room__footer">
                                        <a href="#" id="btn-add-room">Add room</a>
                                    </div>
                                </div>
                            </div>

                            <button id="submit1" class="btn-submit" type="submit">search</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <form id="form2" method="post" action="">
                            <div class="input-group">
                                <label class="label">location:</label>
                                <input id="location" class="input--style-1" type="text" name="location"
                                       placeholder="Destination, hotel name" required="required">
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">driver age:</label>
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="driver-age">
                                                <option>23</option>
                                                <option>24</option>
                                                <option selected="selected">25</option>
                                                <option>26</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">car group:</label>
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select id="car_group"name="car-group">
                                                <option selected="selected">Group S-car</option>
                                                <option>Group 1</option>
                                                <option>Group 2</option>
                                                <option>Group 3</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">pick up:</label>
                                        <input id="check_in2" class="input--style-1 js-single-datepicker" type="text" name="pickup"
                                               placeholder="mm/dd/yyyy" data-drop="1">
                                        <div class="dropdown-datepicker" id="dropdown-datepicker1"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">time:</label>
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="time-pickup">
                                                <option selected="selected">10:00 AM</option>
                                                <option>5:00 AM</option>
                                                <option>6:00 AM</option>
                                                <option>7:00 AM</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">drop off:</label>
                                        <input id="check_out2" class="input--style-1 js-single-datepicker" type="text" name="dropoff"
                                               placeholder="mm/dd/yyyy" data-drop="2">
                                        <div class="dropdown-datepicker" id="dropdown-datepicker2"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">time:</label>
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="time-dropoff">
                                                <option selected="selected">10:00 AM</option>
                                                <option>5:00 AM</option>
                                                <option>6:00 AM</option>
                                                <option>7:00 AM</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="submit2" class="btn-submit m-t-0" type="submit">search</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <form id="form3" method="post" action="">
                            <div class="input-group">
                                <label class="label">origin:</label>
                                <input id="origin" class="input--style-1" type="text" name="origin" placeholder="City or airport"
                                       required="required">
                            </div>
                            <div class="input-group">
                                <label class="label">destination:</label>
                                <input id="destination" class="input--style-1" type="text" name="destination"
                                       placeholder="City or airport" required="required">
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Departing:</label>
                                        <input id="check_in3" class="input--style-1" type="text" name="check-in"
                                               placeholder="mm/dd/yyyy" id="input-start-2">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">returning:</label>
                                        <input id="check_out3" class="input--style-1" type="text" name="check-out"
                                               placeholder="mm/dd/yyyy" id="input-end-2">
                                    </div>
                                </div>
                            </div>
                            <button id="submit3" class="btn-submit" type="submit">search</button>
                        </form>
                        <?php
                        if (isset($_POST['submit1'])){
                          header('Location: AccountPage.php');
                          exit();
                          // $validation= "!!@#@#@!#@!#!@#!@#!@!#!@#!#!";
                          // if($_POST['where']!=null || $_POST['where']!= ''){
                          //   $validation = "in 1";
                          //   $where = $_POST['where'];
                          //   $check_in = $_POST['check_in1'];
                          //   $check_out = $_POST['check_out1'];
                          //
                          //   $sql = "SELECT * FROM hotels WHERE destination LIKE '%$where%' AND DateFrom = '$check_in' And DateTo = '$check_out';";
                          //   $result = mysqli_query($conn, $sql);
                          //   $row = mysqli_fetch_assoc($result);
                          //
                          //   // for loop to get all hotels in the destination
                          //   if ($where == $row['destination'] ){
                          //       $_SESSION ['where'] = $row['destination'];
                          //       $_SESSION ['check_in'] = $row['DateFrom'];
                          //       $_SESSION ['check_out'] = $row['DateTo'];
                          //       $_SESSION ['cost'] = $row['Cost'];
                          //       header('Location: index.php');
                          //       exit();
                          //   }
                          //   else {
                          //     header('Location: AccountPage.php');
                          //     exit();
                          //   }
                          // }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper--w680">
    <div class="card card-2">
        <div class="card-body">
            <ul class="tab-list">
                <li class="tab-list__item active">
                    <a class="tab-list__link" data-toggle="tab"><?php echo $city ?></a>
                </li>
                <li class="tab-list__item">
                    <img src=<?php echo $img ?> height="60" width="60">
                </li>
                <li class="tab-list__item">
                    <a class="tab-list__link" data-toggle="tab"><?php echo $goDate ?><br><?php echo $goHour ?></a>
                </li>
                <li class="tab-list__item">
                    <a class="tab-list__link" data-toggle="tab"><?php echo $returnDate ?><br><?php echo $returnHour ?></a>
                </li>
                <li class="tab-list__item">
                    <a class="tab-list__link" data-toggle="tab"><?php echo $price ?></a>
                </li>
            </ul>

        </div>
    </div>
</div>

<div class="wrapper wrapper--w680">
    <div class="card card-2">
        <div class="card-body">
            <ul class="tab-list">

                <li class="tab-list__item active">
                    <a class="tab-list__link" data-toggle="tab">Hotel Name:</a>
                </li>
                <li class="tab-list__item">
                    <input class='form-control' id='hotelName' placeholder='Hotel Name' type='text'>
                </li>
                <br><br>
                <li class="tab-list__item active">
                    <a class="tab-list__link" data-toggle="tab">Write a Review:</a>
                </li>
                <li class="tab-list__item">
                    <!-- <input class='form-control' id='review' placeholder='Write Review' type='textarea'> -->
                    <textarea name="Text1" cols="40" rows="3" style="color: #767676;">Write Review</textarea>
                </li>
                <br><br>
                <li class="tab-list__item">
                    <a class="tab-list__link" data-toggle="tab">Rate:</a>
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5"/>
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4"/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3"/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2"/>
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1"/>
                        <label for="star1" title="text">1 star</label>
                    </div>
                </li>
            </ul>
            <ul class="tab-list">
                <li class="tab-list__item active">
                    <a class="tab-list__link" data-toggle="tab">Add photo:</a>
                </li>
                <li class="tab-list__item active">
                    <div class='form-group'>
                        <div class='col-md-6'>
                            <div class='form-group'>
                                <div class='col-md-11'>
                                    <input type='file' onchange="readURL(this);"/>
                                    <img class="profilePic" id="blah" src="#" alt="your image"/>
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
                </li>
            </ul>
        </div>
    </div>
</div>
<form class='form-horizontal' role='form'>
    <div class="wrapper wrapper--w680">
        <div class="card card-2">
            <div class="card-body">
                <ul class="tab-list">
                    <br>
                </ul>
            </div>
        </div>
    </div>
</form>


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
