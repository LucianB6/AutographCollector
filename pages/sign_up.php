<?php
include("../hidden/header1.php");
$title = "SIGN UP";
$stylesheet = "../css/sign_up.css";
include("../hidden/header2.php");
?>
    <style>
        body{
            background-color: rgba(109, 167, 193);
        }
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    <img src="../images/sign-up.jpg"
                    width="400"
                    height="400" alt="" />

                 </div>
                   <div class="form">
                <form action="../hidden/signupH.php" method="POST">
                    <h2>Sign up Here</h2><br>
                    <label for="name">Full name:</label>
                    <input type="text" id="name" name="name" placeholder="First_name Last_name"  required pattern="^(?=.{2,25}$)([A-Za-zŽžÀ-ÿ]{1,}\.?(((\s|-)?[A-Za-zŽžÀ-ÿ](\.)?))+)$"><br>

                    <label for="uname">Username:</label>
                    <input type="text" id="uname" name="uname"  placeholder="exampleusername49" required pattern="^(\w|\d){5,}$"><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="example@something.xyz" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$"><br>

                    <label for="phone">Phone number:</label>


                    <input type="tel" id="phone" name="phone" placeholder="07********" required pattern="^(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$"><br>


                    <label for="password">Password:</label>
                    <input type="password" id="password" name="pwd" placeholder="Password"><br>

                    <label for="confirmPassword">Confirm password:</label>
                    <input type="password" id="confirmPassword" name="pwdRepet" placeholder="Confirm Password Here">

                    <label for="captcha">Please Enter the Captcha Text</label>
                    <img id="captchaimg" src="../hidden/captcha.php" alt="CAPTCHA">
                    <input type="text" id="captcha" name="captcha"  placeholder="" pattern="^.{5}$" required><br>
                    <button type='button' id='rcaptcha'>Refresh now</button>

                    <button class="btnn" type="submit" name="submit">Sign Up</button>

                    <script>
                    var refreshButton = document.getElementById("rcaptcha");
                    refreshButton.onclick = function() {
                    document.getElementById("captchaimg").src = '../hidden/captcha.php?' + Date.now();
                    }
                    </script>

                </form>
                 </div>
                    <div class="login-succes">
                        <img src="../images/login-shield.png"
                        width="400"
                        height="400" alt="" />
                    </div>
            </header>
         </div>
    </div>
<?php
include("../hidden/footer.php");
if(isset($_GET["error"])) {
    if($_GET["error"] == "emptyInputSignup") {
        echo "<p>fill in all fields</p>";
    }
}
?>
