<?php

function logged_in(){
    return false;
}

function pg_changeURL() {
  extract(parse_url($_ENV["postgres://wsktsvaretvdmj:234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f@ec2-54-75-248-193.eu-west-1.compute.amazonaws.com:5432/d4dfkncd7c1kqj"]));
  return "host=ec2-54-75-248-193.eu-west-1.compute.amazonaws.com Port=5432 dbname=d4dfkncd7c1kqj user=wsktsvaretvdmj password=234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f";
}

function pg_connect_to_database(){
    //echo "in the function";
/*    $pg_conn = pg_connect("host=ec2-54-75-248-193.eu-west-1.compute.amazonaws.com Port=5432 dbname=d4dfkncd7c1kqj user=wsktsvaretvdmj password=234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f sslmode=require");
    if($pg_conn) {
       echo 'connected';
    } else {
        echo 'there has been an error connecting';
    }
  */
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
}

function pg_check_table($thing, $table, $data){
    $conn = pg_connect(changeURL());
    $result = pg_query($pg_conn, "SELECT $thing FROM  $table WHERE $thing = $data");
    
    return $result;
}



function pg_check_for_tables(){
    //$conn = pg_connect(changeURL());
    $result = $myPDO->query("SELECT * FROM pg_catalog.pg_tables");
print "<pre>\n";

echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
print "\n";
}

function get_company_details($cid){
    include ("config.php");
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
    include ("config.php");
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
    include ("config.php");
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
    $conn = pg_connect(changeURL());
    $result = pg_query($pg_conn, "SELECT username FROM  WHERE username = $username and password = $pass");
    
    
}

?> 