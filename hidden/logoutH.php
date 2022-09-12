<?php
include("header1.php");
session_unset();
session_destroy();
header("location: ../index.php");
exit();
