<?php
include("header1.php");
include("functionsH.php");

$file = fopen("../pages/celebrities.php","w") or die();
fwrite($file,"<?php\n\$title = 'CELEBRITIES';\n\$stylesheet = '../css/sign_up.css';\ninclude('../hidden/header.php');\n?>\n");
fwrite($file,"<h1>SEARCH KNOWN CELEBRITY</h1>\n");
fwrite($file,"<h2><a href='newCelebrity.php'>OR SUGGEST OTHER CELEBRITY</a></h2>\n");
fwrite($file,"<ul>\n");
$result = getCelebs($conn);
while($row = mysqli_fetch_assoc($result))
{
    fwrite($file,"<li>" . $row['celebrity_name'] . " - " . $row['domain_name'] . "</li>\n");
}
fwrite($file,"<br>\n");
fclose($file);

$file = fopen("../hidden/celebritiesL.php","w") or die();
$result = getCelebs($conn);
while($row = mysqli_fetch_assoc($result))
{
    fwrite($file,"<div class=\"option\">\n<input type=\"radio\" class=\"radio\" id=\"" . $row['id'] . "\" name=\"celebrity\" />\n");
    fwrite($file,"<label for=\"" . $row['id'] . "\">" . $row['celebrity_name'] . "</label>\n</div>\n");
}
fclose($file);

header("location: ../pages/celebrities.php");
