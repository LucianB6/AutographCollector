<?php
include("../hidden/header1.php");
$title = "AUCO - FilteringPage";
$stylesheet = "../css/style.css";
include("../hidden/header2.php");
?>
    <div class="topside">
        <div class="nav-containter">
            <div class="wrapper">
                <nav> 
                    <div class="logo">
                        <li> <img src="../images/logo.png" alt="" height="75px" id = logo> </li>
                    </div>

                    <ul class="nav-items">
                        <li>
                        <a href="../hidden/logoutH.php">Logout</a>
                        </li>
                    
                        <li>
                            <a href="profilePg.php">Profile</a>
                        </li>

                        <li> <img src="../images/PopOut.png" onclick="myFunction()" alt="" height="25px" id ="popup-btn2"> </li>
                        <script>
                            // When the user clicks on div, open the popup
                            function myFunction() {
                                var btn = document.getElementById("popup-btn2")
                                btn.addEventListener('click', () => {
                                    var headerList = document.querySelector('.header-list')
                                    var sideNav = document.querySelector('.leftside')
                                    headerList.style.display = 'inline-table';
                                    headerList.style.backgroundColor = '#6DA7C1'
                                    headerList.style.alignItems = 'center';
                                    headerList.style.textDecoration = 'none';

                                    var closed = document.getElementById("close")
                                    closed.addEventListener('click', ()=>{
                                        headerList.style.display = 'none';
                                    })

                                    var filtered = document.getElementById("filter")
                                    filtered.addEventListener('click', ()=>{
                                        sideNav.style.display = 'inline-table';
                                    })
                                    var closedd = document.getElementById("close")
                                    closedd.addEventListener('click', ()=>{
                                        sideNav.style.display = 'none';
                                    })
                                })
                                // var popup = document.getElementById("myPopup");
                                // popup.classList.toggle("show");
                            }
                        </script>

                        <li>
                            <form action="../pages/searchpage.php" method="post">
                                <label>
                                    <input type="text" name="search" placeholder="Search Here...">
                                </label>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div> 
    </div>
        <div class="leftside">
            <div class="sidenav">
                <p>Sport</p>
                <br>
                <p>location</p>
                <form action="SportPg.php" method="post">
                <ul style="list-style-type:none;">
                    <li>
                        <input type="checkbox" id="loc1" name="loc1" value="Romania">
                        <label for="loc1">Romania</label><br>
                    </li>
                    <li>
                        <input type="checkbox" id="loc2" name="loc2" value="USA">
                        <label for="loc2">USA</label><br>
                    </li>
                </ul>
                <p>celebrity</p>
                <ul style="list-style-type:none;">
                    <li>
                        <input type="checkbox" id="name1" name="name1" value="Einstein">
                        <label for="name1">Einstein</label><br>
                    </li>
                    <li>
                        <input type="checkbox" id="name2" name="name2" value="Hagi">
                        <label for="name2">Hagi</label><br>
                    </li>
                </ul style="list-style-type:none;">
                <p>year</p>
                <ul style="list-style-type:none;">
                    <li>
                        <input type="number" id="fromYear" name="fromYear" min="1900" max="2022">
                        <label for="fromYear">from</label>
                    </li>
                    <li>
                        <input type="number" id="toYear" name="toYear" min="1900" max="2022">
                        <label for="toYear">to</label>
                    </li>
                </ul>
                    <button class="btnn" type="submit" name="submit">Filter</button>
                </form>
            </div>
        </div>
            <div class="header-container">
                <header>
                       <ul class="header-list">
                           <li>
                               <a href="#" id = close>Close</a>
                           </li>
                           <li>
                               <a href="#" id = filter>Filter</a>
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
<section class="gallery-links">
    <div class="wrapper">

        <div class="gallery-container">
            <?php

            include_once '../includes/dbh.inc.php';
            $sql = "SELECT * FROM uploadautograph WHERE event = '" . $_GET["domain"] . "'ORDER BY orderGallery DESC;";
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "galleryautograph";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

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
        <div class="logo-bottom">
            <img src="../images/AutographLogo 1.png" alt="">
        </div>
         <script src="main.js"></script>
<?php
include("../hidden/footer.php");
?>
