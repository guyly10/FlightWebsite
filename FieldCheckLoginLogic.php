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