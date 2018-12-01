<?php
$fName = "";
$lName = "";
$dob = "";
$email = "";
$phone = "";
$pass = "";
$repeatPass = "";
$address = "";
$equalPass = "";
$now = date("d/m/Y");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //check id_first_name
    if (preg_match('/^\s*$/', $_POST["id_first_name"])){
        $fName = "Field can't be empty";
    }
    else if (!preg_match('/[^a-zA-Z]/', $_POST["id_first_name"])){
        $fName = "String is ok";
    }
    else{
        $fName = "String must contain only letters";
    }

    //check id_last_name
    if (preg_match('/^\s*$/', $_POST["id_last_name"])){
        $lName = "Field can't be empty";
    }
    else if (!preg_match('/[^a-zA-Z]/', $_POST["id_last_name"])){
        $lName = "String is ok";
    }
    else{
        $lName = "String must contain only letters";
    }

    //check email
    if (preg_match('/^\s*$/', $_POST["id_email"])){
        $email = "Field can't be empty";
    }
    else if (preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/', $_POST["id_email"])){
        $email = "String is ok";
    }
    else{
        $email = "String must contain @ and .com";
    }

    //check password
    if (preg_match('/^\s*$/', $_POST["id_pass"])){
        $pass = "Field can't be empty";
    }
    else if (!preg_match('/[^A-Za-z0-9]+/', $_POST["id_pass"])){
        $pass = "String is ok";
    }
    else{
        $pass = "String must contain letters and numbers only";
    }

    //check repeat password
    if (preg_match('/^\s*$/', $_POST["id_repass"])){
        $repeatPass = "Field can't be empty";
    }
    else if (!preg_match('/[^A-Za-z0-9]+/', $_POST["id_repass"])){
        $repeatPass = "String is ok";
    }
    else{
        $repeatPass = "String must contain letters and numbers only";
    }

    //check phone
    if (preg_match('/^\s*$/', $_POST["id_phone"])){
        $phone = "Field can't be empty";
    }
    else if (!preg_match('/\D/', $_POST["id_phone"])){
        $phone = "String is ok";
    }
    else{
        $phone = "String must contain numbers only";
    }

    //check address
    if (preg_match('/^\s*$/', $_POST["id_address"])){
        $address = "Field can't be empty";
    }
    else{
        $address = "String is ok";
    }

    //check DOB
    if (preg_match('/^\s*$/', $_POST["id_DOB"])){
        $dob = "Field can't be empty";
    }
    else if (!preg_match('/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/', $_POST["id_DOB"])){
        $dob = "Birthday must be in the following format dd/mm/yyyy";
    }
    else if (strtotime($_POST['id_DOB']) > $now){
        $dob = "Birthday has to be before today";
    }
    else{
        $dob = "String is ok";
    }

    //check password and repeat password are equal
    if ($_POST["id_pass"] == $_POST["id_repass"]){
        $equalPass = "Passwords are equal";
    }
    else{
        $equalPass = "Passwords are not equal";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/HeadPage.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <link href='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet'
          type='text/css'>
    <title>AGflights</title>
</head>
<body>
<div class='panel-body'>
    <form class='form-horizontal' role='form' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_first_name'>First name</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_first_name' name="id_first_name" placeholder='First Name' type='text'>
                        <span class="error"><?php echo $fName?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_last_name'>Last name</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_last_name' name="id_last_name" placeholder='Last Name' type='text'>
                        <span class="error"><?php echo $lName?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_DOB'>Date Of Birth</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_DOB' name="id_DOB" placeholder='Date Of Birth' type='text'>
                        <span class="error"><?php echo $dob?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Contact</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_email' name="id_email" placeholder='E-mail' type='text'>
                        <span class="error"><?php echo $email?></span>
                    </div>
                </div>
                <div class='form-group internal'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_phone' name="id_phone" placeholder='Phone: (xxx) - xxx xxxx' type='text'>
                        <span class="error"><?php echo $phone?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_pass'>Password</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_pass' name="id_pass" placeholder='Password' type='password'>
                        <span class="error"><?php echo $pass?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_repass'>Repeat Password</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_repass' name="id_repass" placeholder='Password' type='password'>
                        <span class="error"><?php echo $repeatPass?></span>
                        <span class="error"><?php echo $equalPass?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_address'>Address</label>
            <div class='col-md-6'>
                <div class='form-group'>
                    <div class='col-md-11'>
                        <input class='form-control' id='id_address' name="id_address" placeholder='Address' type='text'>
                        <span class="error"><?php echo $address?></span>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" id="register" name="register">Register</button>
    </form>
</div>
</div>
</div>
<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422
    <p>
</footer>
</body>
</html>

