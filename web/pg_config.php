<?php
echo " in pgconfig";
require ("functions.php");
echo " after require";
pg_connect_to_database();
echo "after conn" ;
?>
