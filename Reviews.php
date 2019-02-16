<?php include 'DataBaseConn.php'?>

<?php
session_start();
if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == ""))
    header('Location: index.php');

$displayName = $_SESSION['uname'];
$Topic="";
$rate="";
$textReview="";
$pic = "";
if (isset($_POST['submit'])){
  $Topic = $_POST['hotelName'];
  $textReview = $_POST['textReview'];
  $rate = $_POST['rate'];
  $pic = $_POST['pic'];
  $sql = "INSERT INTO reviews (UserId,Topic, TextR, Rate, Photo)
      VALUES ('$displayName','$Topic', '$textReview' , '$rate', '$pic');";
  mysqli_query($conn, $sql);
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
        <?php echo "Hello, " . $displayName .$Topic.$rate.$textReview.$pic. " ! "; ?>
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
        <li><a href='AccountPage.php'>Account</a></li>
        <li><a href='#'>Currency</a></li>
        <li class='active' ><a href='#'>Write Review</a></li>
        <li><a href='UsersReviews.php'>Users Reviews</a></li>
        <li><a href='Logout.php'>Logout</a></li>
    </ul>
</div>


<div class="wrapper wrapper--w680">
    <div class="card card-2">
        <div class="card-body">
          <form id='rForm' method="post" action="">
            <ul class="tab-list">

                <li class="tab-list__item active">
                    <a class="tab-list__link" data-toggle="tab">Topic:</a>
                </li>
                <li class="tab-list__item">
                    <input class='form-control' id='hotelName' name='hotelName' placeholder='Topic' type='text'>
                </li>
                <br><br>
                <li class="tab-list__item active">
                    <a class="tab-list__link" data-toggle="tab">Write a Review:</a>
                </li>
                <li class="tab-list__item">
                    <!-- <input class='form-control' id='review' placeholder='Write Review' type='textarea'> -->
                    <textarea id='textReview' name="textReview" cols="40" rows="3" style="color: #767676;">Write Review</textarea>
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
                                    <input id='pic' type='file' name='pic' onchange="readURL(this);"/>
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
            <button id='submit' name='submit' tupe='submit' class="btn-submit">submit</button>
          </form>
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
