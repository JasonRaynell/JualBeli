<?php
include "./../database/db.php";


$id = $_SESSION['id'];
$sql = "DELETE FROM cart WHERE id = $id";
$conn->query($sql);

header("location: ./../index.php");