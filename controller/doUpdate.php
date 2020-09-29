<?php
session_start();
error_reporting(0);
include_once './../helper/csrf.php';
include "./../database/db.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $brand = $_POST['brand'];
    htmlspecialchars($brand,ENT_QUOTES);
    $type = $_POST['type'];
    htmlspecialchars($type,ENT_QUOTES);
    $price =$_POST['price'];
    htmlspecialchars($price,ENT_QUOTES);
    $id = $_GET['id'];
    htmlspecialchars($id,ENT_QUOTES);

    // image in database
    $image_name = $_FILES['image']['name'];

    $allowed_extensions=["jpg","jpeg","png"];
    $image_extension = PATHINFO($image_name, PATHINFO_EXTENSION);

    if($_FILES['imgae']["size"] > 10000000)
    {
        $_SESSION['error'] = "size to big";
        header("location: ./../update.php?id=$id");
    } elseif (in_array($image_extension,$allowed_extensions) == false) {
        $_SESSION['error'] = "wrong extension";
        header("location: ./../update.php?id=$id");
    }else {
        // image in server

        $document_root=$_SERVER['DOCUMENT_ROOT'];
        $full_upload_path = "$document_root/NIM/public/image/product/$image_name";

        move_uploaded_file($_FILES['image']['tmp_name'],$full_upload_path);

        //print_r($_file[])  

        $sql = "UPDATE products
        SET type = '$type',
        brand = '$brand',
        price = $price,
        image = '$image_name'
        WHERE id = $id
        ";

        $conn->query($sql);
        header("location: ./../index.php");
    }
    
}