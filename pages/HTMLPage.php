<?php
include("../hidden/header1.php");
$title = "WebDesign";
$stylesheet = "../css/CSSPage.css";
include("../hidden/header2.php");
include '../hidden/header3.php';
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <div class="nav-container">
            <div class="wrapper">
                <nav>
                    <ul class="nav-items">
                        <li> <img src="../images/logo.png" alt="" height="75px" id = logo> </li>

                        <li>
                            <a href="../pages/requests.php">Requests</a>
                        </li>

                        <li>
                            <a href="../hidden/logoutH.php">Logout</a>
                        </li>

                        <li>
                            <a href="../pages/profilePg.php">Profile</a>
                        </li>
                        <li> <img src="../images/PopOut.png" onclick="myFunction()" alt="" height="25px" id ="popup-btn"> </li>
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
                        <li>
                            <form action="../pages/searchpage.php" method="post">
                            <input type="text" name="search" placeholder="Search Here...">
                            </form>
                        </li>
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
                           <a href="uploadAutograph.php">Upload</a>
                       </li>
                    </ul>
            </header>
        </div>
</div>
</div>
    <section class="gallery-links">
        <div class="wrapper">

            <div class="gallery-container">
                <?php

                include_once '../includes/dbh.inc.php';
                $sql = "SELECT imageNameAutograph,titleAutograph,descAutograph,autographyear,autographprice,id,uname FROM uploadautograph a JOIN users u ON u.id=a.userId ORDER BY orderGallery DESC;";
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
                        echo '
                     <a href="tradePg.php?selectedUser=' . $row["id"] . '">
                    <div style="background-image: url(../images/gallery/' . $row["imageNameAutograph"] . ');"></div>
                    <p>' . $row["titleAutograph"] . '</p>
                    <p>' . $row["uname"] . '</p>
                    <h3>' . $row["descAutograph"] . '</h3>
                    <h3>'. $row["autographyear"]. '</h3>
                    <button>$ ' . $row["autographprice"] . '</button>
                </a>';
                }
                ?>
            </div>
        </div>
    </section>
<?php
include("../hidden/footer.php");
?>
