<?php
require 'pg_config.php';
require 'functions.php';
$username = test_input($_POST['login_username']);
$pass = test_input($_POST['login_password']);
$uservalid = pg_checkStudentExists($username,$pass);
return $uservalid;
?>