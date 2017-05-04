<?php
require 'functions.php';
$title = $_GET["name"];

$myPDO = pg_connect_to_database();
$sql = $myPDO->query("SELECT stu_name, inst_name FROM student JOIN institution ON stu_inst = inst_id JOIN application using(stu_no) JOIN opportunity using(op_id) WHERE op_title = '$title'");

//$returnstring = "";

//echo "SELECT stu_name, inst_name FROM student JOIN institution ON stu_inst = inst_id JOIN application using(stu_no) JOIN opportunity using(op_id) WHERE op_title = '$title'";

//while($row = $sql->fetch()){
//echo $row[0];
//}

while($row = $sql->fetch()){
       $r = "<div class='container'>
					<div class='row'>
						<div class='col-sm-6'>
							<a class='name'>$row[0]</a><br>
							<a>$row[1]</a> <br/>
						</div>
						<div class='col-sm-6'>
							<a href='' class='btn btn-primary' role='button'>Accept</a>
							<a href='' class='btn btn-primary' role='button'>Decline</a> 
						</div>
					</div><br><hr>

				</div>";
    
    $returnstring.=$r;
}


//$row = $sql->fetch();


echo $returnstring;

?>