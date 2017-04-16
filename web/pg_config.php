<?php
//echo " in pgconfig";
require 'functions.php';
//echo " after require";
pg_connect_to_database();
//echo "connected to postgres database" ;


//postresql table creation
$sql =<<<EOF
   CREATE TABLE location
   (loc_id INT PRIMARY KEY NOT NULL,
   loc_name VARCHAR(30) NOT NULL,
   city VARCHAR(30) NOT NULL,
   country VARCHAR(30));
EOF;

$ret = pg_query($db, $sql);
if(!$ret){
   echo pg_last_error($db);
} else {
   echo " location Table created successfully\n";
}

$sql =<<<EOF
   CREATE TABLE company
   (comp_id VARCHAR(11) PRIMARY KEY NOT NULL,
   comp_name VARCHAR(30) NOT NULL,
   industry VARCHAR(50) NOT NULL,
   comp_email VARCHAR(50) NOT NULL,
   comp_pw VARCHAR(50) NOT NULL);
EOF;

$ret = pg_query($db, $sql);
if(!$ret){
   echo pg_last_error($db);
} else {
   echo " company Table created successfully\n";
}


$sql =<<<EOF
   CREATE TABLE institution
   (inst_id VARCHAR(11) PRIMARY KEY NOT NULL,
   inst_name VARCHAR(30) NOT NULL,
   location INT NOT NULL,
   inst_email VARCHAR(50) NOT NULL,
   inst_pw VARCHAR(50) NOT NULL,
   FOREIGN KEY (location) REFERENCES location(loc_id));
EOF;

$ret = pg_query($db, $sql);
if(!$ret){
   echo pg_last_error($db);
} else {
   echo " institution Table created successfully\n";
}

$sql =<<<EOF
   CREATE TABLE student
   (stu_no VARCHAR(11) PRIMARY KEY NOT NULL,
   stu_name VARCHAR(30) NOT NULL,
   stu_inst VARCHAR(11) NOT NULL,
   stu_email VARCHAR(50) NOT NULL,
   stu_pw VARCHAR(50) NOT NULL,
   FOREIGN KEY (stu_inst) REFERENCES institution(inst_id));
EOF;

$ret = pg_query($db, $sql);
if(!$ret){
   echo pg_last_error($db);
} else {
   echo " student Table created successfully\n";
}

echo "ffaswhesrdtyfguihoja";


$sql =<<<EOF
   CREATE TABLE opportunity
   (op_id VARCHAR(11) PRIMARY KEY NOT NULL,
   author_id VARCHAR(30) NOT NULL,
   loc_id INT NOT NULL,
   op_title VARCHAR(50) NOT NULL,
   op_desc VARCHAR(50) NOT NULL,
   op_type VARCHAR(30) NOT NULL,
   FOREIGN KEY (author_id) REFERENCES company(comp_id),
   FOREIGN KEY (loc_id) REFERENCES location(loc_id));
EOF;

$ret = pg_query($db, $sql);
if(!$ret){
   echo pg_last_error($db);
} else {
   echo " opportunity Table created successfully\n";
}

$sql =<<<EOF
   CREATE TABLE application
   (application_id VARCHAR(11) PRIMARY KEY NOT NULL,
   op_id VARCHAR(11) NOT NULL,
   stu_no VARCHAR(11) NOT NULL,
   application_status VARCHAR(11) NOT NULL,
   FOREIGN KEY (op_id) REFERENCES opportunity(op_id),
   FOREIGN KEY (stu_no) REFERENCES student(stu_no));
EOF;

$ret = pg_query($db, $sql);
if(!$ret){
   echo pg_last_error($db);
} else {
   echo " application Table created successfully\n";
}

?>
