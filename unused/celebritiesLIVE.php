<?php
include("../hidden/header1.php");
$title = "SIGN UP";
$stylesheet = "../css/sign_up.css";
include("../hidden/header2.php");
?>
<script src="../hidden/searchCeleb.js"></script>

    <style>
        body{
            background-color: rgba(109, 167, 193);
        }
    </style>
<h1>SEARCH FOR KNOWN CELEBRITIES - DOMAIN - NUMBER OF AUTOGRAPHS</h1>
<h2><a href="newCelebrity.php">or suggest a new one</a></h2>
<br>
<form action="../hidden/searchCeleb.php" method="POST">
    <input type="text" name="celebrity_name" id="celebritySearchBox" oninput=search(this.value)>
</form>
<ul id="celebrityViewer">
</ul>

<?php
include("../hidden/footer.php");
?>
