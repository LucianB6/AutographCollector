<?php
include("../hidden/header1.php");
$title = "UPLOAD AUTOGRAPH";
$stylesheet = "../css/uploadAutograph.css";
include("../hidden/header2.php");
?>
    <style>
        body{
            background-color: rgba(109, 167, 193);
        }
    </style>
  <div class="nav-containter">
            <div class="wrapper">
                <nav> 
                    <div class="logo">
                        <img src="../images/logo.png" alt="" width="75px">
                    </div>

                    <ul class="nav-items">
                        <li>
                        <a href="HTMLPage.php">Main Page</a>
                        </li>
                    
                        <li>
                            <a href="../hidden/logoutH.php">Logout</a>
                        </li>

                    </ul>
                </nav>
            </div>
   </div> 
  
   <h3 style="text-align: center">UPLOAD AUTOGRAPH </h3><br>
   <div class="gallery-upload">
        <div class="header-container">
            <div class="wrapper">
                 <header>
                   <div class="form">
                     <form action="../includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data"><br>
                         <label>
                             <input type="text" name="filename" placeholder="File name...">
                         </label><br>
                         <label>
                             <input type="text" name="filetitle" placeholder="Image Author...">
                         </label><br>
                         <label>
                             <input type="text" name="filedesc" placeholder="Image description...">
                         </label><br>
                         <label for="fileyear"></label><input type="number" id="fileyear" name="fileyear" placeholder="Year..." min="1500" max="2022"><br>
                         <label for="fileprice"></label><input type="number" id="fileprice" name="fileprice" placeholder="Price..." min="1"><br>
                         <label>
                             <input type="text" name="fileevent" placeholder="Event type...">
                         </label><br>
                         <input type="file" name="file"><br>
                         <button type="submit" name="submit">UPLOAD</button>
                      </form>
                    </div>
               </header>
            </div>
      </div>
   </div>';

<?php
include("../hidden/footer.php");
?>
