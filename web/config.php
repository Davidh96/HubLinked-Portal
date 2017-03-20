<?php
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "HubLinked";

	session_start();

	$conn = mysqli_connect($host, $user, $pwd);

	$dbConn = array($conn, $host, $user, $pwd, $db);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

?>