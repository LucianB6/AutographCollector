<?php
include("header1.php");

if(isset($_GET["id"])) {
    require_once 'databaseH.php';   

    $idRequest = $_GET["id"];
    $sql = "SELECT * FROM requests WHERE idRequest = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../pages/profilePg.php?error=stmtError");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$idRequest);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $otherUser = $row["fromUser"];
    $thisUser = $_SESSION["uid"];
    $arr1 = json_decode($row["gives"]);
    $arr2 = json_decode($row["gets"]);

    $sql2 = "UPDATE uploadautograph SET userId = ? WHERE orderGallery = ";
    foreach($arr2 as $value) {
        $sql2 = $sql2 . $value . " OR orderGallery = ";
    }
    $sql2 = $sql2 . "-1;";
    $stmt2 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt2,$sql2)) {
        header("location: ../pages/profilePg.php?error=stmtError");
        exit();
    }
    mysqli_stmt_bind_param($stmt2,"s",$otherUser);
    mysqli_stmt_execute($stmt2);

    $sql4 = "UPDATE uploadautograph SET userId = ? WHERE orderGallery = ";
    foreach($arr1 as $value) {
        $sql4 = $sql4 . $value . " OR orderGallery = ";
    }
    $sql4 = $sql4 . "-1;";
    $stmt4 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt4,$sql4)) {
        header("location: ../pages/profilePg.php?error=stmtError");
        exit();
    }
    mysqli_stmt_bind_param($stmt4,"s",$thisUser);
    mysqli_stmt_execute($stmt4);

    $sql3 = "DELETE FROM requests WHERE fromUser = ? OR toUser = ? OR fromUser = ? OR toUser = ?;";
    $stmt3 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt3,$sql3)) {
        header("location: ../pages/profilePg.php?error=stmtError");
        exit();
    }
    mysqli_stmt_bind_param($stmt3,"ssss",$thisUser,$thisUser,$otherUser,$otherUser);
    mysqli_stmt_execute($stmt3);

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt3);
    mysqli_stmt_close($stmt4);
    header("location: ../pages/requests.php?id=" . $idRequest);
} else {
    header("location: ../pages/profilePg.php?error=noId");
    exit();
}
