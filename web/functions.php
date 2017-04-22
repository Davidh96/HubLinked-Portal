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