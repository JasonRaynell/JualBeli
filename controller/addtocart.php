<?php
session_start();
include './../database/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $quantity = $_POST['quantity'];
    htmlspecialchars($quantity,ENT_QUOTES,'UTF-8');
    $username = $_SESSION['username'];
    $price = $_SESSION['price'];
    $type = $_SESSION['type'];
    $image_name = $_SESSION['image'];
    $brand = $_SESSION['brand'];

    $sql = "INSERT INTO cart VALUES
        (
            null,'$username','$type','$brand',$price,'$image_name','$quantity'
        )";

        $conn->query($sql);
        header("location: ./../index.php");
}
