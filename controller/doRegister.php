<?php
error_reporting(0);
include "./../database/db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['txtUsername'];
    htmlspecialchars($username,ENT_QUOTES,'UTF-8');
    $password = $_POST['txtPassword'];
    htmlspecialchars($password,ENT_QUOTES,'UTF-8');
    $hash_password = sha1($password);

    $sqluser = "SELECT username FROM users WHERE username = '$username'";
    $qresult = mysqli_query($conn,$sqluser);
    $count = mysqli_num_rows($qresult);

    session_start();

    if($count>0){
        $_SESSION['error'] = "Username is already taken";
        header("location: ./../register.php");
    }

    else{
    $sql = mysqli_prepare($conn, "INSERT INTO users(username,password) VALUES(?,?)");
    mysqli_stmt_bind_param($sql,'ss',$username,$hash_password);
    mysqli_stmt_execute($sql);
    mysqli_close($conn);

    header("location: ./../login.php");
    }
}
