<!DOCTYPE html>
<html lang="en">
<head>
<?php
if(isset($index))
    echo '<link rel="icon" type="image/x-icon" href="images/favicon.ico">';
else
    echo '<link rel="icon" type="image/x-icon" href="../images/favicon.ico">';
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo $stylesheet; ?>"/>
</head>
<body>