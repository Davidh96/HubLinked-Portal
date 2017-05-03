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
//making global PDO connected to the database
global $myPDO;
$myPDO = pg_connect_to_database();

function get_student_details($semail){
    //$conn = pg_connect_to_database();
    global $myPDO;
    $stmt = $myPDO->prepare("SELECT * from student where stu_email = :se");
    $stmt->bindParam(':se',$semail);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
}

function get_inst_details($semail){
    //$conn = pg_connect_to_database();
    global $myPDO;
    $stmt = $myPDO->prepare("SELECT loc_name, inst_name,inst_id, inst_email from institution join location on location = loc_id
    where inst_email = :se");
    $stmt->bindParam(':se',$semail);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
}

function get_company_details($semail){
    //$conn = pg_connect_to_database();
    global $myPDO;
    $stmt = $myPDO->prepare("SELECT industry,comp_name,comp_id,comp_email from company where comp_email = :se");
    $stmt->bindParam(':se',$semail);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
}

function pg_check_for_tables(){
    global $myPDO;
  //$db = pg_connect_to_database();
    //echo "2";
    $result = $myPDO->query("SELECT
    table_schema || '.' || table_name
FROM
    information_schema.tables
WHERE
    table_type = 'BASE TABLE'
AND
    table_schema NOT IN ('pg_catalog', 'information_schema');");
    //echo "2";
    try{
        //echo "3";
        while ($row = $result->fetch()) {
        //echo "4";
            echo "</br>";
        echo $row[0];
        echo "</br>";
    }
    }catch(PDOexception $e){
        echo $e->getMessage();
    }
}

function pg_CheckUserExists($username,$pass){
    try{
    //checking entered email with student email and password
    global $myPDO;
    //$myPDO = pg_connect_to_database();
    $stmt = $myPDO->prepare("SELECT * from student where stu_email = :e AND stu_pw = :p");
    $stmtc = $myPDO->prepare("SELECT * FROM company WHERE comp_email = :e AND comp_pw = :p");
    $stmti = $myPDO->prepare("SELECT * FROM institution WHERE inst_email = :e AND inst_pw = :p");
    $stmt->bindParam(':e',$username);
    $stmti->bindParam(':e',$username);
    $stmtc->bindParam(':e',$username);
    $stmt->bindParam(':p',$pass);
    $stmti->bindParam(':p',$pass);
    $stmtc->bindParam(':p',$pass);
    $stmt->execute();
    $stmtc->execute();
    $stmti->execute();

    if($stmti->rowCount() > 0){
        //setting session user and type
        $_SESSION["user"] = "$username";
        $_SESSION["usertype"] = "INST";
        return 0;
    }

    else if($stmt->rowCount() > 0){
        //setting session user and type
        $_SESSION["user"] = "$username";
        $_SESSION["usertype"] = "STUDENT";
        return 0;
    }

    else if($stmtc->rowCount() > 0){
        //setting session user and type
        $_SESSION["user"] = "$username";
        $_SESSION["usertype"] = "COMPANY";
        return 0;
    }
        else{   //returning to show wrong email/password
        return 1;
    }
    }  catch(PDOException $e){
    echo $e->getMessage();}
}

function get_table_data($table){
    try{
    global $myPDO;
    //$myPDO = pg_connect_to_database();
    $sql = $myPDO->query("SELECT * FROM $table");
        //echo "query done";
           // echo "data: ";
        while( $row = $sql->fetch()){
                echo "** ", $row[0], " --";
                echo "** ", $row[1], " --";
                echo "** ", $row[2], " --";
                echo "** ", $row[3], " --";
                echo "** ", $row[4], " --";
                echo "** ", $row[5], " --";
                echo "</br>";
            }
        echo "</br>";
        //else{
          //  echo " its empty";
        //}
        //echo "a";
        return $sql;
    }  catch(PDOException $e){
    echo $e->getMessage();
}
}

function get_col_names($table){
    global $myPDO;
    //$db = pg_connect_to_database();
    //echo " select column_name from information_schema.columns where table_name='$table'';";
    $result = $myPDO->query("select column_name from information_schema.columns where
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

function add_data_location($id,$n,$ci,$co){
    $myPDO = pg_connect_to_database();
    echo " 1 ";

    $stmt = $myPDO->prepare("INSERT INTO public.location(loc_id, loc_name, city,country) VALUES (:id,:n,:ci,:co)");
    echo " 2 ";
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':n',$n);
    $stmt->bindParam(':ci',$ci);
    $stmt->bindParam(':co',$co);
    echo "3 ";
    if(!($stmt->execute()))
    {
        echo "f",$stmt->error;
    }
}

function add_data_company($id,$cn,$ci,$ce,$cp){
    $myPDO = pg_connect_to_database();
    $stmt = $myPDO->prepare("INSERT INTO company(comp_id, comp_name, industry,comp_email,comp_pw) VALUES (:id,:cn,:ci,:ce,:cp)");
    //$stmt->bindParam(':t',$tab);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':cn',$cn);
    $stmt->bindParam(':ci',$ci);
    $stmt->bindParam(':ce',$ce);
    $stmt->bindParam(':cp',$cp);
    $stmt->execute();
}

function add_data_inst($id,$in,$il,$ie,$ip){
    $myPDO = pg_connect_to_database();
    $stmt = $myPDO->prepare("INSERT INTO institution(inst_id, inst_name, location,inst_email,inst_pw) VALUES (:id,:in,:il,:ie,:ip)");
    //$stmt->bindParam(':t',$tab);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':in',$in);
    $stmt->bindParam(':il',$il);
    $stmt->bindParam(':ie',$ie);
    $stmt->bindParam(':ip',$ip);
    $stmt->execute();
}

function add_data_student($sno,$sna,$si,$se,$sp){
    $myPDO = pg_connect_to_database();
    $stmt = $myPDO->prepare("INSERT INTO student(stu_no, stu_name, stu_inst,stu_email,stu_pw) VALUES (:sno,:sna,:si,:se,:sp)");
    //$stmt->bindParam(':t',$tab);
    $stmt->bindParam(':sno',$sno);
    $stmt->bindParam(':sna',$sna);
    $stmt->bindParam(':si',$si);
    $stmt->bindParam(':se',$se);
    $stmt->bindParam(':sp',$sp);
    $stmt->execute();
}

function add_data_opp($oi,$ai,$li,$ot,$od,$oty){
    global $myPDO;
    //$myPDO = pg_connect_to_database();
    //$myPDO->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    echo "<br></br>";
    echo "  ",$oi,"=opid  ";
    echo $ai, "=authid  ";
    echo $li, "=locid ";
    echo $ot, "=title ";
    echo $od, "=desc ";
    echo $oty, "=type ";

    $stmt = $myPDO->prepare("INSERT INTO opportunity(op_id, author_id, loc_id,op_title,op_desc,op_type) VALUES (:oi,:ai,:li,:ot,:od,:oty)");
    //$stmt->bindParam(':t',$tab);
    //echo "4.2";
    $stmt->bindParam(':oi',$oi);
    $stmt->bindParam(':ai',$ai);
    $stmt->bindParam(':li',$li);
    $stmt->bindParam(':ot',$ot);
    $stmt->bindParam(':od',$od);
    $stmt->bindParam(':oty',$oty);
    //echo "4.3";
    $stmt->execute();
    //echo "4.4";
    // echo $stmt->errorInfo(), "</br>";
}

function add_data_app($id,$oid,$sn,$as){
    $myPDO = pg_connect_to_database();
    $stmt = $myPDO->prepare("INSERT INTO application(application_id, op_id, stu_no, application_status) VALUES (:id,:oid,:sn,:as)");
    //$stmt->bindParam(':t',$tab);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':oid',$oid);
    $stmt->bindParam(':sn',$sn);
    $stmt->bindParam(':as',$as);
    $stmt->execute();
}

function create_tables(){
    pg_check_for_tables();
    echo "--------";
    $pdo = pg_connect_to_database();
    $sql = $pdo->query(" CREATE TABLE institution
      (inst_id VARCHAR(11) PRIMARY KEY NOT NULL,
      inst_name VARCHAR(30) NOT NULL,
      location INT NOT NULL,
      inst_email VARCHAR(50) NOT NULL,
      inst_pw VARCHAR(50) NOT NULL,
      FOREIGN KEY (location) REFERENCES location(loc_id))");
    $sql = $pdo->query("CREATE TABLE student
      (stu_no VARCHAR(11) PRIMARY KEY NOT NULL,
      stu_name VARCHAR(30) NOT NULL,
      stu_inst VARCHAR(11) NOT NULL,
      stu_email VARCHAR(50) NOT NULL,
      stu_pw VARCHAR(50) NOT NULL,
      FOREIGN KEY (stu_inst) REFERENCES institution(inst_id))");
    $sql = $pdo->query("CREATE TABLE opportunity
      (op_id VARCHAR(11) PRIMARY KEY NOT NULL,
      author_id VARCHAR(30) NOT NULL,
      loc_id INT NOT NULL,
      op_title VARCHAR(50) NOT NULL,
      op_desc VARCHAR(50) NOT NULL,
      op_type VARCHAR(30) NOT NULL,
      FOREIGN KEY (author_id) REFERENCES company(comp_id),
      FOREIGN KEY (loc_id) REFERENCES location(loc_id))");
    $sql = $pdo->query("CREATE TABLE application
      (application_id VARCHAR(11) PRIMARY KEY NOT NULL,
      op_id VARCHAR(11) NOT NULL,
      stu_no VARCHAR(11) NOT NULL,
      application_status VARCHAR(11) NOT NULL,
      FOREIGN KEY (op_id) REFERENCES opportunity(op_id),
      FOREIGN KEY (stu_no) REFERENCES student(stu_no))");
    pg_check_for_tables();
}

function add_dummy_data(){
    add_data_location(2,"Galway","Galway","Ireland");
    add_data_location(3,"HaiDian District","Beijin","China");
    add_data_location(4,"Bukgu","Daegu","South Korea");
    add_data_location(5,"Darmstadt","Darmstadt","Germany");
    get_table_data("location");

    add_data_company("Intel","Intel Corp","Semiconductor manufacturing","opportunities@intel.com","intel");
    add_data_company("Microsoft","Microsoft Corp","Technology Comp","opportunities@microsoft.com","Microsoft");
    add_data_company("Google","Google Inc","Technology COmpany","opportunities@google.com","Google");
    add_data_company("RedHat","Red Hat Software","opportunites@redhat.com","Redhat");
    get_table_data("company");

    echo "--------";

    add_data_inst("DIT","Dublin Institute of Technology",1,"exchange@dit.ie","Dit");
    add_data_inst("BUAA","Beihang University",3,"exchange@buaa.cn","Buaa");
    add_data_inst("KNU","Kyungpook National University",4,"exchange@knu.com","Knu");
    add_data_inst("H-da","Hochschule Darmstadt",5,"exchange@h-da.com","Hda");
    get_table_data("institution");

    echo "-------";

    add_data_student("C14464428","David Hunt","DIT","c14464428@dit.ie","C14464428");
    add_data_student("D14122804","Vardaan Sharma","DIT","d14122804@dir.ie","D14122804");
    add_data_student("Jon Doe","C1111","DIT","c1111@dit.ie","C1111");
    get_table_data("student");

    echo "--------";

    add_data_opp(1,"Intel",3,"Intel AI Academy","The Intel® Nervana™ AI Academy was created to increase accessibility to data, tools, training, and intelligent machines for a broad community of developers, academics, and start-ups.","Computing");
    add_data_opp(2,"Microsoft",1,"Software Engineer","Are you passionate about writing shared systems and services which are used across the company to deliver applications and online content every day? Do you have a passion for enabling our company to deliver our products to an ever-evolving worldwide landscape of languages, cultures, and local markets?","Computing");
    get_table_data("opportunity");

    echo "--------";

    add_data_app(1,1,"D14122804","Pending");
    add_data_app(2,1,"D14122804","Pending");
    add_data_app(3,1,"D14122804","Denied");
    get_table_data("application");

}

function jobsearch(){

}

function collegesearch(){

}

function get_opps(){
    global $myPDO;
    $email = $_SESSION["user"];
    if($_SESSION["usertype"] == "COMPANY"){
    $sql = $myPDO->query("SELECT op_title FROM opportunity JOIN company ON author_id = comp_id WHERE comp_email = '$email'");
    return $sql;
    }
}

function add_opportunity($t, $email, $type, $desc, $title, $loc){

    global $myPDO;
    //getting the id of the college/company
    //echo "1";
    if($t){
        //echo "1.1";
        $sql = $myPDO->query("SELECT * FROM institution WHERE inst_email='$email'");
        echo " $email";
        while( $row = $sql->fetch()){
            $id = $row[0];
            }
    }
    else{
        $sql = $myPDO->query("SELECT * FROM company WHERE comp_email = '$email'");
        while( $row = $sql->fetch()){
                $id = $row[0];
                echo $id;
        }

    }
    //echo "2";
    //getting location id from location name
    $sql = $myPDO->query("SELECT * FROM location WHERE loc_name = '$loc'");
        while( $row = $sql->fetch()){
                $loc_id = $row[0];
                echo $loc_id;
        }

  // $sql = $myPDO->query("SELECT * FROM location WHERE comp_email = '$email'");
  //     while( $row = $sql->fetch()){
  //             $loc_id = $row[2];
  //             echo $loc_id;
  //     }
    //echo "3";
    //checking lsat opportunity id
    $sql = $myPDO->query("SELECT * FROM opportunity");
        while( $row = $sql->fetch()){
                $opp_id = $row[0];
                echo $opp_id;
        }
    echo "4  ";
    $opp_id+=1;
    echo $opp_id;

    add_data_opp($opp_id,$id,$loc_id,$title,$desc,$type);
    //echo "5";
    //return true;
}
?>
