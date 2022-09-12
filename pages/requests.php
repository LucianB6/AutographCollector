<?php
include("../hidden/header1.php");
$title = "requests";
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
                            <input type="text" name="search" placeholder="Search Here...">
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
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
<div class="request">
    <h1>REQUESTS</h1>
</div>
<section class="gallery-links">
    <div class="wrapper">

        <div class="gallery-container">
<?php
    include_once '../includes/dbh.inc.php';
    $sql = "SELECT * FROM requests WHERE toUser = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../pages/HTMLPage.php?error=bd");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$_SESSION["uid"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<h2>request #' . $i . '</h2>';
        $i++;
        $idRequest = $row["idRequest"];
        echo '<a href="../hidden/accept.php?id=' . $idRequest . '">' . 'ACCEPT</a><br>';
        echo '<a href="../hidden/decline.php?id=' . $idRequest . '">' . 'DECLINE</a>';
        //echo '<h1>' . $idRequest . '</h1>';
        
        echo '<p>receive:</p>';
        $arr1 = json_decode($row["gives"]);
        $str = "SELECT * FROM uploadautograph WHERE orderGallery = ";
        foreach($arr1 as $value) {
            $str = $str . $value . " OR orderGallery = ";
        }
        $str = $str . "-1;";
        $stmt2 = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt2, $str);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                        echo '
                    <div style="background-image: url(../images/gallery/' . $row2["imageNameAutograph"] . ');"></div>
                    <p>' . $row2["titleAutograph"] . '</p>
                    <h3>' . $row2["descAutograph"] . '</h3>
                    <h3>'. $row2["autographyear"]. '</h3>
                    <button>$ ' . $row2["autographprice"] . '</button>
                </a>';
            }

        echo '<p>and give:</p>';
        $arr2 = json_decode($row["gets"]);
        $str = "SELECT * FROM uploadautograph WHERE orderGallery = ";
        foreach($arr2 as $value) {
            $str = $str . $value . " OR orderGallery = ";
        }
        $str = $str . "-1;";
        $stmt2 = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt2, $str);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                        echo '
                    <a href="#">
                    <div style="background-image: url(../images/gallery/' . $row2["imageNameAutograph"] . ');"></div>
                    <p>' . $row2["titleAutograph"] . '</p>
                    <h3>' . $row2["descAutograph"] . '</h3>
                    <h3>'. $row2["autographyear"]. '</h3>
                    <button>$ ' . $row2["autographprice"] . '</button>
                </a>';
            }
    }
?>
        </div>
    </div>
</section>
<?php
include("../hidden/footer.php");
?>
