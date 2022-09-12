<?php
include("../hidden/header1.php");
    if(isset($_POST['submit'])){

        $newFileName = $_POST['filename'];
        if(empty($fileName)){
            $newFileName = "autograph";
        }else{
            $newFileName = strtolower(str_replace(" ", "-", $newFileName));
        }
        $imageTitle = $_POST['filetitle'];
        $imageDesc = $_POST['filedesc'];
        $imagePrice = $_POST['fileprice'];
        $imageYear = $_POST['fileyear'];
        $imageEvent = $_POST['fileevent'];

        $file = $_FILES['file'];
        $fileName = $file["name"];
        $fileType = $file["type"];
        $fileTempName = $file["tmp_name"];
        $fileError = $file["error"];
        $fileSize = $file["size"];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array("jpg","jpeg","png");

        if(in_array($fileActualExt, $allowed)){
            if($fileError == 0){
                if($fileSize < 2000000){
                    $imageFullName = $newFileName . "." . uniqid("",true) . "." . $fileActualExt;
                    $fileDestination = "../images/gallery/" . $imageFullName;

                    include_once '../includes/dbh.inc.php';

                    if(empty($imageTitle) || empty($imageDesc)){
                        header("Location: ../HTMLPage.php?upload=empty");
                        exit();
                    }else{
                        $sql = "SELECT * FROM uploadautograph;";

                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            echo "SQL statement failed";
                        }else{
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $rowCount = mysqli_num_rows($result);
                            $setImageOrder = $rowCount + 1;

                            $sql = "INSERT INTO uploadautograph (titleAutograph,descAutograph,imageNameAutograph,autographyear,autographprice,orderGallery,event,userId) VALUES (?,?,?,?,?,?,?,?);";

                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "SQL statement failed";
                            } else{
                                mysqli_stmt_bind_param($stmt, "ssssssss", $imageTitle, $imageDesc, $imageFullName,$imageYear,$imagePrice,$setImageOrder,$imageEvent,$_SESSION['uid']);
                                mysqli_stmt_execute($stmt);

                                move_uploaded_file($fileTempName, $fileDestination);

                                header("Location = ../HTMLPage.php?upload=success");
                                exit();
                            }
                        }
                    }
                }else{
                    echo "You're file size is too big!";
                    exit();
                }
            }else {
                echo "You had an error!";
                exit();
            }
        }else{
            echo "You need to upload a proper file type";
            exit();
        }
    }
