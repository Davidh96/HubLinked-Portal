<?php
//echo " in pgconfig";
require 'functions.php';
session_start();
//echo " after require";
pg_connect_to_database();
//echo "connected to postgres database" ;

create_tables();
createData();

?>
