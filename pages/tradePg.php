
<?php
include("../hidden/header1.php");
$title = "tradePg";
$stylesheet = "../css/style.css";
include("../hidden/header2.php");
if($_GET["selectedUser"] == $_SESSION["uid"]) {
    header("location: profilePg.php");
}
$allGive = [];
$selectedGive = [];
$allGet = [];
$selectedGet = [];
$elem = [];
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div class="tradeMenu">

    <h5>offered autographs value:</h5><h5 id="givePrice">0</h5><br>
    <h5>requested autographs value:</h5><h5 id="getPrice">0</h5><br>
    <button id="tryTrade" onclick="tryTrade()">TRADE</button>
</div>
        <div class="request">
            <h1>GIVE</h1>
        </div>
        <section class="gallery-links">
            <div class="wrapper">

                <div class="gallery-container">
    <?php
                    include_once '../includes/dbh.inc.php';
        $sql = "SELECT imageNameAutograph,titleAutograph,descAutograph,autographyear,autographprice,id,uname,orderGallery FROM uploadautograph a JOIN users u ON u.id=a.userId WHERE id = ? ORDER BY orderGallery DESC;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header("location: ../pages/HTMLPage.php?error=bd");
            exit();
        }
        mysqli_stmt_bind_param($stmt,"s",$_SESSION["uid"]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<a href="#">
                     <input type="checkbox" class="buttonrequest" id="' . $row["orderGallery"] . '" name="' . $row["titleAutograph"] . '" value="' . $row["autographprice"] . '" onchange=addOrRemoveGive(this)>

                    <div style="background-image: url(../images/gallery/' . $row["imageNameAutograph"] . ');"></div>
                    <p>' . $row["titleAutograph"] . '</p>
                    <h3>' . $row["descAutograph"] . '</h3>
                    <h3>'. $row["autographyear"]. '</h3>
                    <button>$ ' . $row["autographprice"] . '</button>
                </a>';

                            $elem[0] = $row["orderGallery"];
                            $elem[1] = $row["autographprice"];
                            $allGive[] = $elem;
                    }
        $jsonGive = json_encode($allGive);
        mysqli_stmt_close($stmt);
    ?>
                </div>
            </div>
        </section>
<!--    <div class="column">-->
<div class="request">
    <h1>GET</h1>
</div>
<section class="gallery-links">
    <div class="wrapper">

        <div class="gallery-container">
    <?php
                    include_once '../includes/dbh.inc.php';
                    $sql = "SELECT imageNameAutograph,titleAutograph,descAutograph,autographyear,autographprice,id,uname,orderGallery FROM uploadautograph a JOIN users u ON u.id=a.userId WHERE id = ? ORDER BY orderGallery DESC;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header("location: ../pages/HTMLPage.php?error=bd");
            exit();
        }
        mysqli_stmt_bind_param($stmt,"s",$_GET["selectedUser"]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                      <a href="#">
                     <input type="checkbox" id="' . $row["orderGallery"] . '" name="' . $row["titleAutograph"] . '" value="' . $row["autographprice"] . '" onchange=addOrRemoveGet(this)>

                    <div style="background-image: url(../images/gallery/' . $row["imageNameAutograph"] . ');"></div>
                    <p>' . $row["titleAutograph"] . '</p>
                    <h3>' . $row["descAutograph"] . '</h3>
                    <h3>'. $row["autographyear"]. '</h3>
                    <button>$ ' . $row["autographprice"] . '</button>
                </a>';
                            $elem[0] = $row["orderGallery"];
                            $elem[1] = $row["autographprice"];
                            $allGet[] = $elem;
                    }
        $jsonGet = json_encode($allGet);
        //$jsonUser = json_encode($_GET["selectedUser"]);
        mysqli_stmt_close($stmt);
        /*
        $selectedGet[] = $allGet[1];
        echo '<p>' . $selectedGet[0][0] . '</p>';
        echo '<p>' . $selectedGet[0][1] . '</p>';
        */
    ?>
        </div>
    </div>
</section>

<script type="text/Javascript">
  //<label>Enter your name: <input class="name" type="text" value="World"/></label>
  //<h1>Plain Javascript Example</h1>Hello <span class="jsValue">World</span>

        //var $jsName = document.querySelector('.name');
        //var $jsValue = document.querySelector('.jsValue');
        //
        //$jsName.addEventListener('input', function(event){
        //$jsValue.innerHTML = $jsName.value;
        //}, false);
    let vectorGet = <?php echo $jsonGet;?>;
    let vectorGive = <?php echo $jsonGive;?>;
    let selectedUser = <?php echo $_GET["selectedUser"];?>;
    let getIds = new Array(0);
    let giveIds = new Array(0);
    let priceGet = 0;
    let priceGive = 0;
    let getCounter = document.getElementById('getPrice');
    let giveCounter = document.getElementById('givePrice');

//console.log(vectorGive);

function addOrRemoveGet(checkboxElem) {
  if(checkboxElem.checked) {
    priceGet += parseInt(checkboxElem.value);
    getIds.push(checkboxElem.id);

    getCounter.innerHTML = priceGet;
  } else {
    priceGet -= parseInt(checkboxElem.value);
    getIds = removeElem(getIds,checkboxElem.id);

    getCounter.innerHTML = priceGet;
  }
}

function addOrRemoveGive(checkboxElem) {
  if(checkboxElem.checked) {
    priceGive += parseInt(checkboxElem.value);
    giveIds.push(checkboxElem.id);

    giveCounter.innerHTML = priceGive;
  } else {
    priceGive -= parseInt(checkboxElem.value);
    giveIds = removeElem(giveIds,checkboxElem.id);

    giveCounter.innerHTML = priceGive;
  }
}

function tryTrade() {
    if(priceGive >= priceGet && priceGet != 0) {
        let str = '../hidden/trade.php?otherUser=' + selectedUser;
          str = str + '&getIds[]=' + getIds[0];
        for(i = 1; i < getIds.length; i++) {
          str = str + '&getIds[]=' + getIds[i];
        }
          str = str + '&giveIds[]=' + giveIds[0];
        for(i = 1; i < giveIds.length; i++) {
          str = str + '&giveIds[]=' + giveIds[i];
        }
        window.location.replace(str);
        //window.location.replace("../hidden/trade.php?otherUser=" + selectedUser + "?giveIds=" + encodeURIComponent(JSON.stringify(giveIds)) + "?getIds=" + encodeURIComponent(JSON.stringify(getIds)));
    } else alert("autographs are not valuable enough to start the trade");
}

function removeElem(arr,variabila) {
    var filterArr = arr.filter(function(e) { return e !== variabila; });
    return filterArr;
}

</script>
<?php
include("../hidden/footer.php");
?>
