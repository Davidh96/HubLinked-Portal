<?php
//require 'pg_config.php';
require 'functions.php';
$username = ($_POST['username']);
$pass = ($_POST['password']);
$uservalid = pg_checkUserExists($username,$pass);
if($uservalid){
    return $uservalid;
}
else{
    //set session using username
    header("Location: index.php");
    exit;
}
?>