<?php
include("../hidden/header1.php");
require '../includes/dbh.inc.php';
include("../hidden/header2.php");
$title = "WebDesgni";
$stylesheet = "../css/profilePg.css";

// $_SESSION["id"] = 1; // User's session
$sessionId = $_SESSION["uid"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $sessionId"));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <title>Update Image Profile</title>
    <link rel="stylesheet" href="../css/profilePg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

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
        <div class="form">
      <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
      <div class="upload">
        <?php
         $id = $user["id"];
         $name = $user["name"];
         $uname = $user["uname"];
        // $image = $user["image"];
        $image = $user["profilePicture"];
        ?>
           

        <img src="../images/profile/<?php echo $image; ?>" width = 125 height = 125 title="<?php echo $image; ?>">
        <div class="round">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
    </form>   
    <script type="text/javascript">
      document.getElementById("image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>
    <h5> style="text-align: center"> Username:  <?php echo $uname; ?> </h5>
            <h2 style="text-align: center">My Collection</h2>

    <?php
    if(isset($_FILES["image"]["name"])){
      $id = $_POST["id"];
      $name = $_POST["name"];

      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = '../pages/profilePg.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = '../pages/profilePg.php';
        </script>
        ";
      }
      else{
        // $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName = $imageName;
        // $newImageName .= '.' . $imageExtension;
        $query = "UPDATE users SET profilePicture = '$newImageName' WHERE id = $id";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, '../images/profile/' . $newImageName);
        echo
     
        "
      <script>
      document.location.href = '../pages/profilePg.php';
      </script>
      
      ";
        }
    } ?> 


    
    <?php
    if(isset($_FILES["image"]["name"])){
      $id = $_POST["id"];
      $name = $_POST["name"];

      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = '../pages/profilePg.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = '../pages/profilePg.php';
        </script>
        ";
      }
      else{
        // $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName = $imageName;
        // $newImageName .= '.' . $imageExtension;
        $query = "UPDATE users SET profilePicture = '$newImageName' WHERE id = $id";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, '../images/profile/' . $newImageName);
        echo
     
        "
      <script>
      document.location.href = '../pages/profilePg.php';
      </script>
      
      ";
        }
    } ?> 

   
    

    <?php
    if(isset($_FILES["profilePicture"]["name"])){
      $id = $_POST["id"];
      $name = $_POST["name"];

      $imageName = $_FILES["profilePicture"]["name"];
      $imageSize = $_FILES["profilePicture"]["size"];
      $tmpName = $_FILES["profilePicture"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = '../updateimageprofile';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = '../updateimageprofile';
        </script>
        ";
      }
      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE users SET profilePicture = '$newImageName' WHERE id = $id";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, 'img/' . $newImageName);
        echo
        "
        <script>
        document.location.href = '../updateimageprofile';
        </script>
        ";
      }
    }
    ?> 
  
  <section class="gallery-links">
        <div class="wrapper">

            <div class="gallery-container">

    <?php

include_once '../includes/dbh.inc.php';
$id = $user["id"];
$sql = "SELECT imageNameAutograph, titleAutograph, descAutograph, autographyear, autographprice, userId FROM uploadautograph  WHERE userId=$id ORDER BY orderGallery DESC;";
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
     <a href="#">
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
 
  </body>
</html>

 <script src="main.js"></script>
<?php
include("../hidden/footer.php");
?>
