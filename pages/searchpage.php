<?php
include("../hidden/header1.php");
$title = "AUCO - SearchingPage";
$stylesheet = "../css/style.css";
include("../hidden/header2.php");
?>
<div class="nav-containter">
    <div class="wrapper">
        <nav>
            <ul class="nav-items2">
                <li> <img src="../images/logo.png" alt="" height="75px" id = logo> </li>
                <li>
                    <a href="../hidden/logoutH.php">Logout</a>
                </li>
                <!---->
                <li>
                    <a href="profilePg.php">Profile</a>
                </li>
                <!---->                 <li> <img src="../images/PopOut.png" onclick="myFunction()" alt="" height="25px" id ="popup-btn"> </li>
                <script>
                    // When the user clicks on div, open the popup
                    function myFunction() {
                        var btn = document.getElementById("popup-btn")
                        btn.addEventListener('click', () => {
                            var headerList = document.querySelector('.header-list')

                            headerList.style.display = 'inline-table';
                            headerList.style.backgroundColor = '#6DA7C1'
                            headerList.style.alignItems = 'center';
                            headerList.style.textDecoration = 'none';

                            var closed = document.getElementById("close")
                            closed.addEventListener('click', ()=>{
                                headerList.style.display = 'none';
                            })
                        });
                    }
                </script>
            </ul>
        </nav>
    </div>
</div>
<div class="header-container">
    <header>
        <ul class="header-list">
            <li>
                <a href="#" id = close>Close</a>
            </li>

            <li>
                <a href="Autographs.php?domain=Science">Science</a>
            </li>

            <li>
                <a href="Autographs.php?domain=Cultural">Cultural</a>
            </li>

            <li>
                <a href="Autographs.php?domain=Political">Political</a>
            </li>

            <li>
                <a href="Autographs.php?domain=Sport">Sport</a>
            </li>

            <li>
                <a href="HTMLPage.php">Home</a>
            </li>
        </ul>
    </header>
</div>
<div class="title">
    <h3>Search page</h3>
</div>
<section class="gallery-links">
    <div class="wrapper">

        <div class="gallery-container">
            <?php

            include_once '../includes/dbh.inc.php';
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "galleryautograph";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $search = mysqli_real_escape_string($conn, $_POST['search']);

            $sql = "SELECT * FROM uploadautograph WHERE titleAutograph LIKE '%$search%' OR descAutograph LIKE '%$search%' OR autographyear LIKE '%$search%';";

            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#">
                    <div style="background-image: url(../images/gallery/' . $row["imageNameAutograph"] . ');"></div>
                    <p>' . $row["titleAutograph"] . '</p>
                    <h3>' . $row["descAutograph"] . '</h3>
                    <h3>'. $row["autographyear"]. '</h3>
                    <button>$ ' . $row["autographprice"] . '</button>
                </a>';
            }
            ?>
        </div>
    </div>
</section>
