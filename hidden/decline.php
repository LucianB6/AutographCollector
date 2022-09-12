<?php
include("header1.php");

if(isset($_GET["id"])) {
    require_once 'databaseH.php';   

    $idRequest = $_GET["id"];
    $sql = "DELETE FROM requests WHERE idRequest = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../pages/profilePg.php?error=stmtError");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$idRequest);
    mysqli_stmt_execute($stmt);
    header("location: ../pages/requests.php?var=requestEliminat");
} else {
    header("location: ../pages/profilePg.php?error=noId");
    exit();
}
