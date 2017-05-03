<?php
//require 'pg_config.php';
require 'functions.php';
$username = ($_POST['email']);
$pass = ($_POST['password']);
$uservalid = pg_checkUserExists($username,$pass);
return $uservalid;
?>