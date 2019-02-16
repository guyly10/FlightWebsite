<?php include 'DataBaseConn.php'?>

<?php
session_start();
if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == ""))
    header('Location: index.php');

$displayName = $_SESSION['uname'];

$reviewers = array();
$Topics = array();
$TextsR = array();
$Rates = array();
$Photos = array();
$sql = "SELECT * FROM reviews;";
$resultReviews = mysqli_query($conn, $sql);
while ($rowR = mysqli_fetch_assoc($resultReviews)) {
    array_push($reviewers, $rowR['UserId']);
    array_push($Topics, $rowR['Topic']);
    array_push($TextsR, $rowR['TextR']);
    array_push($Rates, $rowR['Rate']);
    array_push($Photos, $rowR['Photo']);
}

$page = $_SERVER['PHP_SELF'];
$sec = "20";

for($i=0;$i<count($Topics);$i++){
  if(isset($_POST[$i])){
    if($_POST['Comment']!=""){
      $CommenterU = $displayName;
      $comment = $_POST['Comment'];
      $reviewer=$reviewers[$i];
      $Topic = $Topics[$i];
      $sql = "INSERT INTO comments (UserId,Topic, CommenterU, Comment)
          VALUES ('$reviewer','$Topic', '$displayName' , '$comment');";
        mysqli_query($conn, $sql);

        $msg = "You Have a new comment on Your review !";
        $sqlN = "INSERT INTO notifications (user,msg)
          VALUES ('$reviewer', '$msg');";
        mysqli_query($conn, $sqlN);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
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
        <?php echo "Hello, " . $displayName . " ! "; ?>
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
        <li><a href='Reviews.php'>Write Review</a></li>
        <li class='active'><a href='#'>Users Reviews</a></li>
        <li><a href='Logout.php'>Logout</a></li>
    </ul>
</div>


<div class="wrapper wrapper--w680">
    <div class="card card-2">
        <div class="card-body">
          <?php
            for($index=0;$index<count($Topics);$index++){
              echo '<div class="row">
                      <div class="col-md-8">
                        <p>
                          <strong><u>author: '.$reviewers[$index].'</u></strong>
                          <br><u>Topic :</u>
                          '.$Topics[$index].'
                          <br><u>Review :</u>
                          '.$TextsR[$index].'
                          <br>
                          <u>Rate :</u> '.$Rates[$index].'
                          <div class="col-md-4"><u>Photo :</u>
                            <img src="IMAGES/'.$Photos[$index].'" style="max-width: 200px; max-height: 200px;" class="profilePic">
                          </div>
                        </p><br><br>
                      </div>
                      <p><strong><u> Comments </u></strong>
                      <br>
                      <div class="form-group internal">';

                      $CurrnetReviewer=$reviewers[$index];
                      $CurrentTopic = $Topics[$index];
                      $sql = "SELECT * FROM comments WHERE UserID = '$CurrnetReviewer' AND Topic = '$CurrentTopic';";
                      $resultReviews = mysqli_query($conn, $sql);
                      while ($rowR = mysqli_fetch_assoc($resultReviews)) {
                          echo '<div class="col-md-8">
                              <br>
															<div class="col-md" style="border-left:0.5px solid #ffffff;">
																<strong>'.$rowR['CommenterU'].'</strong>
															commented :	'.$rowR['Comment'].'
                              <br>
															</div>
														</div>
														<hr style="border-top: width:90%;">';
                      }

                      echo '</div>
                      </p>

                    </div>
                    <div class="form-group internal">
                      <form id="CForm" method="post" action="">
                        <input class="form-control" id="Comment" name="Comment" placeholder="Comment here" type="text">
                        <button id="submit" name='.$index.' tupe="submit" class="btn-submit" style="max-width: 100px; max-height: 40px;">submit</button>
                      </form>
                    </div>
                    <br><br>';
            }

          ?>
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
