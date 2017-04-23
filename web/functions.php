<?php
include 'init.php';
function logged_in(){
    return isset($_SESSION['user']);

}

function pg_connect_to_database(){
$dbuser = 'wsktsvaretvdmj';
$dbpass = '234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f';
$host = 'ec2-54-75-248-193.eu-west-1.compute.amazonaws.com';
$dbname='d4dfkncd7c1kqj';
$port='5432';
try{
$myPDO = new PDO('pgsql:host=ec2-54-75-248-193.eu-west-1.compute.amazonaws.com;dbname=d4dfkncd7c1kqj', 'wsktsvaretvdmj', '234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f');
//$connec = new PDO("pgsql:dbname=$dbname;host=$dbhost;user=$dbuser;password=$dbpass;port=$port;sslmode=require");
}catch (PDOException $e) {
echo "Error : " . $e->getMessage() . "<br/>";
die();
}
    return $myPDO;
}

function pg_check_table($thing, $table, $data){
    $conn = pg_connect(changeURL());
    $result = pg_query($pg_conn, "SELECT $thing FROM  $table WHERE $thing = $data");

    return $result;
}

function pg_check_for_tables(){
  $db = pg_connect_to_database();
    $result = $db->query("SELECT
    table_schema || '.' || table_name
FROM
    information_schema.tables
WHERE
    table_type = 'BASE TABLE'
AND
    table_schema NOT IN ('pg_catalog', 'information_schema');");
    try{
        while ($row = $result->fetch()) {
        echo "</br>";
        echo $row[0];
        echo "</br>";
    }
    }catch(PDOexception $e){
        echo $e->getMessage();
    }
}

function get_company_details($cid){
   // include ("config.php");
    mysqli_select_db($conn, $db);
    $stmt = $conn->prepare("SELECT * from company where comp_id = ?");
    $stmt->bind_param("s",$cid);
    $stmt->execute();
    $stmt->bind_result($comp_email,$comp_id,$comp_name, $comp_pw,$comp_ind );
    $result = $stmt->fetch();
    //echo $cname;
    return result;
}

function get_student_details($sid){
 //   include ("config.php");
    mysqli_select_db($conn, $db);
    $stmt = $conn->prepare("SELECT * from stu_name where stu_no = ?");
    $stmt->bind_param("s",$sid);
    $stmt->execute();
    $stmt->bind_result($stu_email,$stu_inst,$stu_name,$stu_no,$stu_pw);
    $result = $stmt->fetch();
    //echo $cname;
    return result;
}

function get_college_details($cid){
//    include ("config.php");
    mysqli_select_db($conn, $db);
    $stmt = $conn->prepare("SELECT * from institution where inst_id = ?");
    $stmt->bind_param("s",$cid);
    $stmt->execute();
    $stmt->bind_result($inst_email,$inst_id,$inst_name, $inst_pw,$ist_loc );
    $result = $stmt->fetch();
    //echo $cname;
    return result;
}

function pg_CheckUserExists($username,$pass){

    //include 'pg_config.php';
    try{
    $myPDO = pg_connect_to_database();
    $sql = $myPDO->query ("SELECT * FROM student");
        echo "query done";
        if($sql->fetch())
        {
    while($row = $sql->fetch()){
        echo "number : " ,$row["stu_no"],"  name: ",$row["stuname"] ,"e: ",$row["stu_email"]    ,"p: ",$row["stu_pw"]  ,"</br>";
    }
        }
        else{
            echo " its empty";
        }
    }  catch(PDOException $e){
    echo $e->getMessage();
}
    $_SESSION["user"] = "temp";
    return 0;
}

function get_table_data($table){
     try{
    $myPDO = pg_connect_to_database();
    $sql = $myPDO->query("SELECT * FROM $table");
        //echo "query done";
            //echo "iNn";
            while( $row = $sql->fetch()){
                //echo "number : " ,$row["stu_no"],"  name: ",$row["stuname"] ,"e: ",$row["stu_email"]    ,"p: ",$row["stu_pw"]  ,"</br>";
                echo " ", $row[0];
            }

        //else{
        //    echo " its empty";
        //}
        //echo "a";
    }  catch(PDOException $e){
    echo $e->getMessage();
}

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
//test
  $ret = pg_query($db, $sql);
  if(!$ret){
     echo pg_last_error($db);
  } else {
     echo " application Table created successfully\n";
  }
}

//creates dummy data
function createData(){
  //insert data for location
  $result=pg_query($db, "INSERT INTO location VALUES (1,'Dublin','Dublin','Ireland');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO location VALUES (2,'Galway','Galway','Ireland');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO location VALUES (3,'HaiDian District','Beijing','China');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO location VALUES (4,'Buk-gu','Daegu','South Korea');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=($db, "INSERT INTO location VALUES (5,'Darmstadt','Darmstadt','Germany');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  //insert data for company
  $result=pg_query($db, "INSERT INTO company VALUES ('Intel','Intel Corporation','Semiconductor Manufacturing','opportunities@intel.com','inTel');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO company VALUES ('Microsoft','Microsoft Corporation','Technology Company','opportunities@microsoft.com','microSoft');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO company VALUES ('Google','Google Inc','Technology Company','opportunities@google.com','gooGle');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO company VALUES ('RedHat','Red Hat Software','Software Company','opportunities@redhat.com','redHat');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  //insert data for institutions
  $result=pg_query($db, "INSERT INTO institution VALUES ('DIT','Dublin Institute of Technology',1,'exchange@dit.ie','dIt');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO institution VALUES ('BUAA','Beihang University',2,'exchange@buaa.cn','buAa');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO institution VALUES ('KNU','Kyungpook National University',3,'exchange@knu.com','kNu');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO institution VALUES ('TUDarmstadt','Technische Universität Darmstadt',4,'exchange@tud.de','tUd');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  //insert data for students
  $result=pg_query($db, "INSERT INTO student VALUES ('C14464428','David Hunt','DIT','c14464428@mydit.ie','c14464428');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO student VALUES ('C111222','James MacArthur','DIT','c111222@mydit.ie','c111222');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO student VALUES ('C123456','Mary MacArthur','DIT','c123456@mydit.ie','c123456');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

   //insert data for opportunity
  $result=pg_query($db, "INSERT INTO opportunity VALUES (1,'Intel',1,'Intel Artificial Intelligence Academy','The Intel® Nervana™ AI Academy was created to increase accessibility to data, tools, training, and intelligent machines for a broad community of developers, academics, and start-ups.','Computing');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO opportunity VALUES (2,'Microsoft',1,'Software Engineer','Are you passionate about writing shared systems and services which are used across the company to deliver applications and online content every day? Do you have a passion for enabling our company to deliver our products to an ever-evolving worldwide landscape of languages, cultures, and local markets?','Computing');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO opportunity VALUES (3,'Microsoft',1,'Software Engineer','Are you passionate about writing shared systems and services which are used across the company to deliver applications and online content every day? Do you have a passion for enabling our company to deliver our products to an ever-evolving worldwide landscape of languages, cultures, and local markets?','Computing');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  //insert data for application
  $result=pg_query($db, "INSERT INTO application VALUES (1,1,'C123456','Approved');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO application VALUES (2,1,'C123456','Denied');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO application VALUES (3,3,'C123456','Pending');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

  $result=pg_query($db, "INSERT INTO application VALUES (4,3,'C111222','Approved');");
  //check if insertion was completed correctly
  if (!$result) {
     $errormessage = pg_last_error();
     echo "Error with query: " . $errormessage;
     exit();
   }
   else{
     echo "Data inserted";
   }

}

function get_col_names($table){
    $db = pg_connect_to_database();
    echo " select column_name from information_schema.columns where
table_name='$table'';";
    $result = $db->query("select column_name from information_schema.columns where
table_name='$table';");
    try{
        while ($row = $result->fetch()) {
        echo "</br>";
        echo $row[0];
        echo "</br>";
    }
    }catch(PDOexception $e){
        echo $e->getMessage();
    }
}

function add_data($tab,$id,$n,$ci,$co){
    $myPDO = pg_connect_to_database();
    $stmt = $myPDO->prepare("INSERT INTO :t(loc_id, name, city,country) VALUES (:id,:n,:ci,:co)");
    $stmt->bindParam(':t',$tab);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':n',$n);
    $stmt->bindParam(':ci',$ci);
    $stmt->bindParam(':co',$co);
    $stmt->execute();
}
?>
