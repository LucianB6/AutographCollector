<?php
include("header1.php");

if($_POST) {
if(isset($_POST['captcha']) && (strtoupper($_POST['captcha']) == $_SESSION['captcha_text']))
    {
        $name = $_POST["name"];
        $uname = $_POST["uname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["pwd"];
        $passwordC = $_POST["pwdRepet"];

        require_once '../includes/dbh.inc.php';
        require_once '../hidden/functionsH.php';

        if(emptyInputSignup($name, $uname,$email,$phone,$password,$passwordC) !== false){
            header("location: ../pages/sign_up.php?error=empty2");
            exit();
        }

        if(passwordCheck($password, $passwordC) !== false){
            header("location: ../pages/sign_up.php?error=notMatching");
            exit();
        }
        if(userExists($conn, $uname, $email) !== false){
            header("location: ../pages/sign_up.php?error=usernameAlreadyExists");
            exit();
        }
        createUser($conn, $name, $uname, $email, $phone, $password);

    }else{
        header("location: ../pages/sign_up.php?error=wrongCaptcha");
        exit();
    }
}
?>
