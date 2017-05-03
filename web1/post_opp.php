<?php
require 'init.php';
require 'functions.php';
$title = $_GET["title"];
$desc = $_GET["desc"];
$type = $_GET["type"];
$location = $_GET["location"];
$email = $_SESSION["user"];


get_table_data("location");

if($_SESSION["usertype"] == "INST"){
   add_opportunity(true,$email,$type,$desc,$title,$location);
    
}
else{
    add_opportunity(false,$email,$type,$desc,$title,$location);
}

get_table_data("opportunity");



?>