<?php
//echo " in pgconfig";
require 'functions.php';
session_start();
//echo " after require";
pg_connect_to_database();
//echo "connected to postgres database" ;

//create tables
create_tables();
//create dummy data
createData();

?>
