<?php
session_start();
$fName = "";
$lName = "";
$dob = "";
$email = "";
$phone = "";
$pass = "";
$repeatPass = "";
$address = "";
$equalPass = "";
$successLogin = "";
$count = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //check id_first_name
    if (preg_match('/^\s*$/', $_POST["id_first_name"])){
        $fName = "Field can't be empty";
    }
    else if (!preg_match('/[^a-zA-Z]/', $_POST["id_first_name"])){
        $fName = "";
        $_SESSION['fName'] = $_POST["id_first_name"];
        $_SESSION['uname'] = $_POST["id_first_name"];
        $count++;
    }
    else{
        $fName = "String must contain only letters";
    }

    //check id_last_name
    if (preg_match('/^\s*$/', $_POST["id_last_name"])){
        $lName = "Field can't be empty";
    }
    else if (!preg_match('/[^a-zA-Z]/', $_POST["id_last_name"])){
        $lName = "";
        $_SESSION['lName'] = $_POST["id_last_name"];
        $count++;
    }
    else{
        $lName = "String must contain only letters";
    }

    //check email
    if (preg_match('/^\s*$/', $_POST["id_email"])){
        $email = "Field can't be empty";
    }
    else if (preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/', $_POST["id_email"])){
        $email = "";
        $_SESSION['email'] = $_POST["id_email"];
        $count++;
    }
    else{
        $email = "String must contain @ and .com";
    }

    //check password
    if (preg_match('/^\s*$/', $_POST["id_pass"])){
        $pass = "Field can't be empty";
    }
    else if (!preg_match('/[^A-Za-z0-9]+/', $_POST["id_pass"])){
        $pass = "";
        $_SESSION['pass'] = $_POST["id_pass"];
        $count++;
    }
    else{
        $pass = "String must contain letters and numbers only";
    }

    //check repeat password
    if (preg_match('/^\s*$/', $_POST["id_repass"])){
        $repeatPass = "Field can't be empty";
    }
    else if (!preg_match('/[^A-Za-z0-9]+/', $_POST["id_repass"])){
        $repeatPass = "";
        $count++;
    }
    else{
        $repeatPass = "String must contain letters and numbers only";
    }

    //check phone
    if (preg_match('/^\s*$/', $_POST["id_phone"])){
        $phone = "Field can't be empty";
    }
    else if (!preg_match('/\D/', $_POST["id_phone"])){
        $phone = "";
        $_SESSION['phone'] = $_POST["id_phone"];
        $count++;
    }
    else{
        $phone = "String must contain numbers only";
    }

    //check address
    if (preg_match('/^\s*$/', $_POST["id_address"])){
        $address = "Field can't be empty";
    }
    else{
        $address = "";
        $_SESSION['address'] = $_POST["id_address"];
        $count++;
    }

    //check DOB
    if (empty($_POST["id_DOB"])){
      $dob = "Field can't be empty";
    }
    else if (strtotime($_POST['id_DOB']) > strtotime('now')){
        $dob = "Birthday has to be before today";
    }
    else{
        $dob = "";
        $_SESSION['dob'] = $_POST["id_DOB"];
        $count++;
    }
    
    //check password and repeat password are equal
    if ($_POST["id_pass"] == $_POST["id_repass"]){
        $equalPass = "";
        $_SESSION['pass'] = $_POST["id_pass"];
        $count++;
    }
    else{
        $equalPass = "Passwords are not equal";
    }
    if($count == 9)
    {
      $successLogin = "User signed up Successfully! please go back to login Page and log in";
    }

}
?>
