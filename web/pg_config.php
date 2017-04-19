<?php
//echo " in pgconfig";
require 'functions.php';
//echo " after require";
pg_connect_to_database();
//echo "connected to postgres database" ;
/*
function create_tables(){
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
}

function createData(){
  pg_query($db, "INSERT INTO location VALUES (1,'Dublin','Dublin','Ireland');");
  pg_query($db, "INSERT INTO location VALUES (2,'Galway','Galway','Ireland');");
  pg_query($db, "INSERT INTO location VALUES (3,'HaiDian District','Beijing','China');");
  pg_query($db, "INSERT INTO location VALUES (4,'Buk-gu','Daegu','South Korea');");
  pg_query($db, "INSERT INTO location VALUES (5,'Darmstadt','Darmstadt','Germany');");

  pg_query($db, "INSERT INTO company VALUES ('Intel','Intel Corporation','Semiconductor Manufacturing','opportunities@intel.com','inTel');");
  pg_query($db, "INSERT INTO company VALUES ('Microsoft','Microsoft Corporation','Technology Company','opportunities@microsoft.com','microSoft');");
  pg_query($db, "INSERT INTO company VALUES ('Google','Google Inc','Technology Company','opportunities@google.com','gooGle');");
  pg_query($db, "INSERT INTO company VALUES ('RedHat','Red Hat Software','Software Company','opportunities@redhat.com','redHat');");

  pg_query($db, "INSERT INTO institution VALUES ('DIT','Dublin Institute of Technology',1,'exchange@dit.ie','dIt');");
  pg_query($db, "INSERT INTO institution VALUES ('BUAA','Beihang University',2,'exchange@buaa.cn','buAa');");
  pg_query($db, "INSERT INTO institution VALUES ('KNU','Kyungpook National University',3,'exchange@knu.com','kNu');");
  pg_query($db, "INSERT INTO institution VALUES ('TUDarmstadt','Technische Universität Darmstadt',4,'exchange@tud.de','tUd');");

  pg_query($db, "INSERT INTO student VALUES ('C14464428','David Hunt','DIT','c14464428@mydit.ie','c14464428');");
  pg_query($db, "INSERT INTO student VALUES ('C111222','James MacArthur','DIT','c111222@mydit.ie','c111222');");
  pg_query($db, "INSERT INTO student VALUES ('C123456','Mary MacArthur','DIT','c123456@mydit.ie','c123456');");

  pg_query($db, "INSERT INTO opportunity VALUES (1,'Intel',1,'Intel Artificial Intelligence Academy','The Intel® Nervana™ AI Academy was created to increase accessibility to data, tools, training, and intelligent machines for a broad community of developers, academics, and start-ups.','Computing');");
  pg_query($db, "INSERT INTO opportunity VALUES (2,'Microsoft',1,'Software Engineer','Are you passionate about writing shared systems and services which are used across the company to deliver applications and online content every day? Do you have a passion for enabling our company to deliver our products to an ever-evolving worldwide landscape of languages, cultures, and local markets?','Computing');");
  pg_query($db, "INSERT INTO opportunity VALUES (3,'Microsoft',1,'Software Engineer','Are you passionate about writing shared systems and services which are used across the company to deliver applications and online content every day? Do you have a passion for enabling our company to deliver our products to an ever-evolving worldwide landscape of languages, cultures, and local markets?','Computing');");

  pg_query($db, "INSERT INTO application VALUES (1,1,'C123456','Approved');");
  pg_query($db, "INSERT INTO application VALUES (2,1,'C123456','Denied');");
  pg_query($db, "INSERT INTO application VALUES (3,3,'C123456','Pending');");
  pg_query($db, "INSERT INTO application VALUES (4,3,'C111222','Approved');");

}
*/
?>
