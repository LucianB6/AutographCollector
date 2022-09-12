<?php
include("header1.php");

if(isset($_POST["submit"])) {

    require_once 'databaseH.php';
    require_once 'functionsH.php';

    $email = $_POST["email"];
    $pwd = $_POST["password"];

    if(emptyInputLogin($email,$pwd) === false){
        header("location: ../pages/sign_up.php?error=empty2");
        exit();
    }
    loginUser($conn,$email,$pwd);

} else {
    header("location: ../pages/HTMLPage.php");
    exit();
}
