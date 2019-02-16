<?php include 'DataBaseConn.php'?>

<?php
session_start();
if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == ""))
    header('Location: index.php');

$displayName = $_SESSION['uname'];
$displayNotification = '';
$sqlNotification = "SELECT * FROM notifications where user='$displayName';";
$resultN = mysqli_query($conn, $sqlNotification);
$rowN = mysqli_fetch_assoc($resultN);
if($rowN['msg']!=null && $rowN['msg']!=''){
  $displayNotification =$rowN['msg'];
  /**DELETE NOTIFICATION**/
  $sqlDeleteN = "DELETE FROM notifications WHERE user='$displayName' AND msg='$displayNotification';";
  mysqli_query($conn, $sqlDeleteN);
}

$sql = "SELECT * FROM commercials;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$toCart = "Add to shopping cart";

for ($idx = 0; $idx < 8; $idx++) {
    $city = $row['city'];
    $goDate = $row['goDate'];
    $goHour = $row['goHour'];
    $returnDate = $row['returnDate'];
    $returnHour = $row['returnHour'];
    $price = $row['price'];
    $img = $row['img'];
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
        <?php echo "Hello, " . $displayName . " ! ".$displayNotification; ?>
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
        <li><a href='Reviews.php'>Write Review</a></li>
        <li><a href='UsersReviews.php'>Users Reviews</a></li>
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
                        <form id="form1" method="post" action="SearchResults.php">
                            <div class="input-group">
                                <label class="label">where:</label>
                                <input id="where" name="where" class="input--style-1" type="text" name="address"
                                       placeholder="City, region or specific hotel" required="required">
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">check-in:</label>
                                        <input id="check_in1" name="check_in1" class="input--style-1" type="text" name="check-in"
                                               placeholder="mm/dd/yyyy" id="input-start">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">check-out:</label>
                                        <input id="check_out1" name="check_out1" class="input--style-1" type="text" name="check-out"
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

                            <button id="submit1" name="submit1" class="btn-submit" type="submit">search</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <form id="form2" method="post" action="SearchResults.php">
                            <div class="input-group">
                                <label class="label">location:</label>
                                <input id="location"name="location" class="input--style-1" type="text" name="location"
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
                                            <select id="car_group" name="car_group">
                                                <option selected="selected">Group S-car</option>
                                                <option value="group 1">Group 1</option>
                                                <option value="group 2">Group 2</option>
                                                <option value="group 3">Group 3</option>
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
                                        <input id="check_in2" name="check_in2" class="input--style-1" type="text"
                                               placeholder="mm/dd/yyyy" id="input-start-2">
                                        <!-- <input id="check_in2" name="check_in2" class="input--style-1 js-single-datepicker" type="text"
                                               placeholder="mm/dd/yyyy" data-drop="1"> -->
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
                                        <input id="check_out2" name="check_out2" class="input--style-1" type="text"
                                               placeholder="mm/dd/yyyy" id="input-start-2">
                                        <!-- <input id="check_out2" name=="check_out2" class="input--style-1 js-single-datepicker" type="text" name="dropoff"
                                               placeholder="mm/dd/yyyy" data-drop="2"> -->
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
                            <button id="submit2" name="submit2" class="btn-submit m-t-0" type="submit">search</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <form id="form3" method="post" action="SearchResults.php">
                            <div class="input-group">
                                <label class="label">origin:</label>
                                <input id="origin" name="origin" class="input--style-1" type="text" name="origin" placeholder="City or airport"
                                       required="required">
                            </div>
                            <div class="input-group">
                                <label class="label">destination:</label>
                                <input id="destination" name="destination" class="input--style-1" type="text" name="destination"
                                       placeholder="City or airport" required="required">
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Departing:</label>
                                        <input id="check_in3" name="check_in3" class="input--style-1" type="text"
                                               placeholder="mm/dd/yyyy" id="input-start-2">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">returning:</label>
                                        <input id="check_out3" name="check_out3" class="input--style-1" type="text" name="check-out"
                                               placeholder="mm/dd/yyyy" id="input-end-2">
                                    </div>
                                </div>
                            </div>
                            <button id="submit3" name="submit3" class="btn-submit" type="submit">search</button>
                        </form>
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
                <li class="tab-list__item">
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
                <li class="tab-list__item">
                    <form action="ShoppingCart.php" method="post">
                        <button name="SugBtn" class="btn-submit"><?php echo $toCart ?></button>
                    </form>
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
