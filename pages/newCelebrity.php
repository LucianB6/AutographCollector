<?php
include("../hidden/header1.php");
$title = "NEW CELEBRITY";
$stylesheet = "../css/sign_up.css";
include("../hidden/header2.php");

?>
    <style>
        body{
            background-color: rgba(109, 167, 193);
        }
    </style>
<h1>SUGGEST NEW CELEBRITY FOR THE DATABASE</h1>

<! email la admin sau ceva de genul>
<form>
    <label for="celebrity">CELEBRITY NAME AND DOMAIN</label>
    <input type="text" name="celebrity"><br>
    <label for="wikiLink">LINK TO THE WIKIPEDIA PAGE FOR THAT CELEBRITY</label>
    <input type="text" name="wikiLink"><br><br>

    <button>SUBMIT</button>
</form>
