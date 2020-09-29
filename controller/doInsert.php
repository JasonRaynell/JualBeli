<?php
session_start();
error_reporting(0);
include_once './../helper/csrf.php';
include "./../database/db.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $brand = $_POST['brand'];
    htmlspecialchars($brand,ENT_QUOTES,'UTF-8');
    $type = $_POST['type'];
    htmlspecialchars($type,ENT_QUOTES,'UTF-8');
    $price =$_POST['price'];
    htmlspecialchars($price,ENT_QUOTES,'UTF-8');

    // image in database
    $image_name = $_FILES['image']['name'];
    htmlspecialchars($image_name,ENT_QUOTES,'UTF-8');

    $allowed_extensions=["jpg","jpeg","png"];
    $image_extension = PATHINFO($image_name, PATHINFO_EXTENSION);

    if($_FILES['image']["size"] > 10000000)
    {
        $_SESSION['error'] = "size too big";
        header("location: ./../insert.php");
    } elseif (in_array($image_extension,$allowed_extensions) == false) {
        $_SESSION['error'] = "wrong extension";
        header("location: ./../insert.php");
    }else {
        // image in server

        $document_root=$_SERVER['DOCUMENT_ROOT'];
        $full_upload_path = "$document_root/JualBeli/public/image/product/$image_name";

        move_uploaded_file($_FILES['image']['tmp_name'],$full_upload_path);

        //print_r($_file[])  

        $sql = mysqli_prepare($conn, "INSERT INTO products(type,brand,price,image) VALUES(?,?,?,?)");
        mysqli_stmt_bind_param($sql,'ssis',$type,$brand,$price,$image_name);
        mysqli_stmt_execute($sql);
        mysqli_close($conn);

        header("location: ./../index.php");
    }
    
}