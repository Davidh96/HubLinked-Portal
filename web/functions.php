<?php

function logged_in(){
    return false;
}

function pg_changeURL() {
  extract(parse_url($_ENV["postgres://wsktsvaretvdmj:234109bb12c27368ebfbb9fc085679ddd2e1e6ed338f2ccd4737957e970bf43f@ec2-54-75-248-193.eu-west-1.compute.amazonaws.com:5432/d4dfkncd7c1kqj"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1);
}

function pg_connect_to_database(){
    //echo "in the function";
    $pg_conn = pg_connect(pg_changeURL());
    
}

function pg_check_table($thing, $table, $data){
    $conn = pg_connect(changeURL());
    $result = pg_query($pg_conn, "SELECT $thing FROM  $table WHERE $thing = $data");
    
    return $result;
}



function pg_check_for_tables(){
    $conn = pg_connect(changeURL());
    $result = pg_query($pg_conn, "SELECT relname FROM pg_stat_user_tables WHERE schemaname='public'");
print "<pre>\n";

if (!pg_num_rows($result)) {
  echo "Your connection is working, but your database is empty\n";
} else {
  echo "Tables in your database:\n";
  while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}
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