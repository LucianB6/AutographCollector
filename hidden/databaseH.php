<?php
include("header1.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "galleryautograph";

if(!$conn = mysqli_connect($servername,$username,$password,$dbname))

{
    die("failed to connect");
}
