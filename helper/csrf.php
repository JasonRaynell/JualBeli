<?php
if(empty($_SESSION['key'])){
    $_SESSION['key'] = bin2hex(random_bytes(64));
}

$csrf = hash_hmac('sha256','this is the csrf token',$_SESSION['key']);