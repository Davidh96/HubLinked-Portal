<?php
echo " in pgconfig";
require ("fucntions.php");
echo " after require";
pg_connect_to_database();
echo "after conn" ;
?>
