<?php
session_start();
error_reporting (0);
include_once './../helper/csrf.php';
include "./../database/db.php";

if($_SERVER["REQUEST_METHOD"]=='POST')
{

    //csrf
    if(hash_equals($csrf,$_POST['csrf'])){
    $username = $_POST['txtUsername'];
    htmlspecialchars($username,ENT_QUOTES,'UTF-8');
    $password = $_POST['txtPassword'];
    htmlspecialchars($password,ENT_QUOTES,'UTF-8');
    $hash_password = sha1($password);

    $sql = mysqli_prepare($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$hash_password' ");
    mysqli_stmt_bind_param($sql,'ss', $username, $hash_password);
    mysqli_stmt_execute($sql);
    $result = mysqli_stmt_get_result($sql);
    if($result->num_rows > 0)
    {
        // login success
        session_regenerate_id();
        $_SESSION['username'] = $username; 
        header("location: ./../index.php");
    }
    else {
        // login failed
        $_SESSION['error'] = "Wrong username or password";
        header("location:./../login.php");
    }
 }
    else{
        $_SESSION['error'] = "You are not validated";
        header("location:./../login.php");
    }

}