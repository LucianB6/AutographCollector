<?php
include("header1.php");
include("databaseH.php");

if(isset($_GET["otherUser"]) && isset($_GET["giveIds"]) && isset($_GET["getIds"])) {
    $selectedUser = $_GET["otherUser"];
    $giveIds = $_GET["giveIds"];
    $finalGiveIds = json_encode($giveIds);
    $getIds = $_GET["getIds"];
    $finalGetIds = json_encode($getIds);
    //echo "<p>" . $giveIds[0] . "</p>";
    $sql = "INSERT INTO requests (fromUser,toUser,gives,gets) VALUES(?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../pages/profilePg.php?error=problemeStatement");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssss",$_SESSION["uid"],$selectedUser,$finalGiveIds,$finalGetIds);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/profilePg.php");
    exit();
} else {
    echo "<p>nimic</p>";
    header("location: ../pages/profilePg.php?error=probleme");
    exit();
}
