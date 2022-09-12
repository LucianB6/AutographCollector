<?php
include("header1.php");
include("databaseH.php");

function pwdCheck($pwd, $pwdRepet){
    if($pwd !== $pwdRepet){
        header("location: ../pages/sign_up.php?error=passwordDoesn'tMatch");
        exit();
    }
}
function checkDB($conn,$name,$uname,$email,$phone) {
    $sql = "SELECT * FROM users WHERE uname = ? OR email = ? OR phone = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../pages/sign_up.php?error=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$uname,$email,$phone);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)) {
        if($row["uname"] == $uname)
            $_SESSION["existsUname"] = "username taken";
        if($row["userEmail"] == $email)
            $_SESSION["existsEmail"] = "used email";
        if($row["phone"] == $phone)
            $_SESSION["existsPhone"] = "used phone number";
        return $row;
    }

    return false;
    mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$uname,$email,$phone,$pwd) {

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_fname = $_POST['name'];
        $user_lname = $_POST['uname'];
        $user_email = $_POST['email'];
        $user_phone = $_POST['phone'];
        $user_pswd = $_POST['pwd'];
        $hashed_pwd = password_hash($user_pswd,PASSWORD_DEFAULT);

        //$query = "INSERT INTO users (name, uname, email, phone, pwd) VALUES('$user_fname','$user_lname','$user_email','$user_phone','$user_pswd')";
        $query = "INSERT INTO users (name, uname, email, phone, pwd) VALUES('$user_fname','$user_lname','$user_email','$user_phone','$hashed_pwd')";
        mysqli_query($conn, $query);

        header("location: ../index.php");
        exit();
    }
}

function emptyInputLogin($email,$pwd) {
    if(empty($email) || empty($pwd))
        return false;
    return true;
}

function userExists($conn,$email) {
    //$sql = "SELECT * FROM users WHERE email = ? OR pwd = ?;";
    $sql = "SELECT * FROM users WHERE email = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    if($row = mysqli_fetch_assoc($resultData))
        return $row;
    else return false;
}

function loginUser($conn,$email,$pwd)
{
    $userExists = userExists($conn, $email);
    if ($userExists === false) {
        header("location: ../index.php?error=wrongLogin");
        exit();
    }
    if (password_verify($pwd, $userExists["pwd"])) {
        session_start();
        $_SESSION["uid"] = $userExists["id"];
        $_SESSION["uname"] = $userExists["uname"];
        $_SESSION["profilePicture"] = $userExists["profilePicture"];
        header("location: ../pages/profilePg.php");
        exit();
    }
    header("location: ../index.php?error=wrongLogin");
    exit();
}
function emptyInputSignup($name, $uname, $email, $phone, $password, $passwordC): bool
{
    if (empty($name) || empty($email) || empty($uname) || empty($phone) || empty($password) || empty($passwordC))
        return false;
           return true;
}
    function passwordCheck($password, $passwordC){
    $result;

    if($password !== $passwordC){
        $result = true;
    }
    $result = false;

    return $result;
}