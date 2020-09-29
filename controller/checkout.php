<?php
session_start();
error_reporting(0);
include_once './../helper/csrf.php';
include "./../database/db.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username = $_SESSION['username'];
      // image in database
      $image_name = $_SESSION['image'];
      htmlspecialchars($image_name,ENT_QUOTES,'UTF-8');
  
      $allowed_extensions=["jpg","jpeg","png"];
      $image_extension = PATHINFO($image_name, PATHINFO_EXTENSION);
  
      if($_FILES['image']["size"] > 10000000)
      {
          $_SESSION['error'] = "size too big";
          header("location: ./../proof.php");
      } elseif (in_array($image_extension,$allowed_extensions) == false) {
          $_SESSION['error'] = "wrong extension";
          header("location: ./../proof.php");
      }else {
          // image in server
  
          $document_root=$_SERVER['DOCUMENT_ROOT'];
          $full_upload_path = "$document_root/JualBeli/public/image/product/$image_name";
  
          move_uploaded_file($_FILES['image']['tmp_name'],$full_upload_path);

    $sql = "INSERT INTO notification VALUES
            (
                null,'$username','$image_name'
            )";
    
    $conn->query($sql);
    $_SESSION['id'] = $_GET['id'];
    header("location: ./../index.php");
    }
}