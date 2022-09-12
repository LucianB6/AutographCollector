<?php

include("hidden/header1.php");
$title = "AUCO";
$stylesheet = "../css/homepage.css";
$index = true;
include("hidden/header2.php");
?>
    <style>
        body{
            background-color: rgba(109, 167, 193);
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="nav-container">
        <div class="wrapper">
            <nav>
                <div class="logo">
                    <img src="../images/logo.png" alt="" width="75px" id="logo">
                </div>
                <ul class="nav-items">
                    <h1>Welcome to Autograph Collection</h1>
                </ul>
            </nav>
        </div>
    </div>
    <div class="header-container">
        <div class="wrapper">
            <header>
                <div class="hero-image">
                    <img src="images/illustration1.png"
                    width="800"
                    height="500" alt="" />

                </div>
<?php if(!isset($_SESSION["uid"])) {?>
    
                <div class="form">
                <form action="hidden/loginH.php" method="post">
                    <h2>Log in</h2>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="email" required><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="password" required><br>

                    <button class="btnn" type="submit" name="submit">Log in</button>
                    <p class="link">No account? </p><br>
                    <button class="btnn"><a href="pages/sign_up.php">Sign up here</a></button><br>
                    <br>
                </form>
                </div>

<?php } else { ?>

                <button class="bttn"><a href="hidden/logoutH.php">LOGOUT</a></button><br>
<?php } ?>

<?php
/*
echo "<input type="button" name="test" id="test" value="RUN" /><br/>";
function testfun()
{
$to = 'receiver@mail.com';
$subject = 'test_subject';
$message = '<h1>verif</h1><p>altverif</p>';
$headers = "From DELACINE <sender@sursaverif.com>\r\n";
$headers .= "Reply-To: replyto@sursaverif.com\r\n";
$headers .= "Content-type: text/html\r\n";
mail($to,$subject,$message,$headers);
}
if(array_key_exists('test',$_POST)){
   testfun();
}
*/
?>

            </header>
            <div class="hero-content">
                <h2>ORIGINS</h2>
                <p class="par">    <br>Go back a few thousand years and the world was unimaginably different.<br>

                    In Europe this was a time of city states and empires.
                             A handful of very powerful people ruled over an illiterate population.<br>

                    Signatures were the preserve of the ruling classes and as such were fundamentally powerful symbols.
                    They had the power to send armies into battle, sentence (or pardon) <br>
                    a dissenter and to completely alter the way a society functioned.
                    Autographs came back in fashion with the rise of the Renaissance (1300-1600).<br>
                            Times may have changed, but the reason we collect autographs remains the same.
                     They offer an unparalleled connection to some of the most fascinating characters in history.</p>
        </div>
    </div>
<?php
include("hidden/footer.php");
?>