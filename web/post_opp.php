<?php
require 'init.php';
require 'functions.php';
$title = $_POST["oppName"];
$desc = $_POST["description"];
$type = $_POST["oppType"];
// $location = $_GET["location"];
$location = "Dublin";

$email = $_SESSION["user"];

// echo $title;
// echo $desc;
// echo $type;
// echo $location;
echo $email;


// get_table_data("location");

if($_SESSION["usertype"] == "INST"){
   add_opportunity(true,$email,$type,$desc,$title,$location);
}
else{
    add_opportunity(false,$email,$type,$desc,$title,$location);
}

echo "</br>";
get_table_data("opportunity");



?>
