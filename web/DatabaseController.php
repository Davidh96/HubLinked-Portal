<?php

	include ("config.php");

	setupDatabase($conn,$db);
	makeTables($conn);

	function setupDatabase($conn,$db) {
			//create database
			$sql = "Create Database HubLinked";

			//attempt to create database
			if($conn->query($sql)==true){
			  echo "Database Created<br>";
			}
			else {
			  //display if error occurs
			 echo "Error Creating Database: " . $conn->error . "<br>";
			}

			mysqli_select_db($conn, $db);
	}

	//preload database with tables
	function makeTables($conn) {
		$location = "CREATE TABLE IF NOT EXISTS
		location (
							loc_id INT(11) unsigned auto_increment not null,
							loc_name VARCHAR(30) not null,
							city varchar(30),
							country varchar(30),
							primary key (loc_id)
							)";
		if (mysqli_query($conn, $location)) {
			echo "Location Table created successfully" . "<br>";
		} else {
			echo "Error creating table: " . mysqli_error($conn) . "<br>";
		}

		$company = "CREATE TABLE IF NOT EXISTS company (
							comp_id VARCHAR(11) not null,
							comp_name VARCHAR(30) not null,
							industry VARCHAR(50),
							comp_email VARCHAR(50) not null,
							comp_pw VARCHAR (50) not null,
							primary key (comp_id)
						);";

		if (mysqli_query($conn, $company)) {
			echo "company Table created successfully" . "<br>";
		} else {
			echo "Error creating table: " . mysqli_error($conn) . "<br>";
		}

		$institution = "CREATE TABLE IF NOT EXISTS institution (
							inst_id VARCHAR(11) not null,
							inst_name VARCHAR(30),
							location int(11) unsigned,
							inst_email VARCHAR(50) not null,
							inst_pw VARCHAR(50) not null,
							primary key (inst_id),
							FOREIGN KEY (location) REFERENCES location(loc_id)
						);";

		if (mysqli_query($conn, $institution)) {
			echo "institution Table created successfully" . "<br>";
		} else {
			echo "Error creating table: " . mysqli_error($conn) . "<br>";
		}

		$student_table = "CREATE TABLE IF NOT EXISTS student (
							stu_no VARCHAR(11) NOT NULL,
							stu_name VARCHAR(31) not null,
							stu_inst VARCHAR(11) not null,
							stu_email VARCHAR(50) not null,
							stu_pw VARCHAR(50) not null,
							primary key (stu_no),
							foreign key (stu_inst) references institution(inst_id)
							)";

		if (mysqli_query($conn, $student_table)) {
			echo "Student Table created successfully" . "<br>";
		} else {
			echo "Error creating table: " . mysqli_error($conn) . "<br>";
		}

		$opportunity = "CREATE TABLE IF NOT EXISTS opportunity (
							op_id INT(11) unsigned auto_increment not null,
							author_id VARCHAR(11),
							loc_id INT(11) unsigned,
							op_title VARCHAR(30),
							op_desc VARCHAR(255),
							op_type VARCHAR(30),
							primary key (op_id),
							foreign key (author_id) references company(comp_id),
							foreign key (loc_id) references location(loc_id)
						);";

		if (mysqli_query($conn, $opportunity)) {
			echo "opportunity Table created successfully" . "<br>";
		} else {
			echo "Error creating table: " . mysqli_error($conn) . "<br>";
		}

		$application = "CREATE TABLE IF NOT EXISTS application (
							application_id INT(11) unsigned auto_increment not null,
							op_id INT(11) unsigned,
							stu_no VARCHAR(11),
							application_status VARCHAR(11),
							primary key (application_id),
							foreign key (op_id) references opportunity(op_id),
							foreign key (stu_no) references student(stu_no)
						);";

		if (mysqli_query($conn, $application)) {
			echo "application Table created successfully" . "<br>";
		} else {
			echo "Error creating table: " . mysqli_error($conn) . "<br>";
		}


		//prepare insertion statement for Location details
		$stmt = $conn->prepare("INSERT INTO
		location (loc_id,loc_name,city,country) VALUES (?,?,?,?)");

		//insert location info
		$loc_id=1;
		$locname="Dublin";
		$city="Dublin";
		$country="Ireland";

		//bind variables from above
		$stmt->bind_param("isss",$loc_id,$locname,$city,$country);
		//execute prepared statement
		$stmt->execute();

		//insert location info
		$loc_id=2;
		$locname="Galway";
		$city="Galway";
		$country="Ireland";

		//bind variables from above
		$stmt->bind_param("isss",$loc_id,$locname,$city,$country);
		//execute prepared statement
		$stmt->execute();

		//insert location info
		$loc_id=3;
		$locname="HaiDian District";
		$city="Beijing";
		$country="China";

		//bind variables from above
		$stmt->bind_param("isss",$loc_id,$locname,$city,$country);
		//execute prepared statement
		$stmt->execute();

		//insert location info
		$loc_id=4;
		$locname="Buk-gu";
		$city="Daegu";
		$country="South Korea";

		//bind variables from above
		$stmt->bind_param("isss",$loc_id,$locname,$city,$country);
		//execute prepared statement
		$stmt->execute();

		//insert location info
		$loc_id=5;
		$locname="Darmstadt";
		$city="Darmstadt";
		$country="Germany";

		//bind variables from above
		$stmt->bind_param("isss",$loc_id,$locname,$city,$country);
		//execute prepared statement
		$stmt->execute();

		//prepare insertion statement for company details
		$stmt = $conn->prepare("INSERT INTO
		company (comp_id,comp_name, industry,comp_email,comp_pw)
		VALUES (?,?,?,?,?)");

		//insert company info
		$comp_id="Intel";
		$comp_name="Intel Corporation";
		$industry="Semiconductor Manufacturing";
		$comp_email="opportunities@intel.com";
		$comp_pw="inTel";

		//bind variables from above
		$stmt->bind_param("sssss",$comp_id,$comp_name,$industry,$comp_email,$comp_pw);
		//execute prepared statement
		$stmt->execute();

		//insert company info
		$comp_id="Microsoft";
		$comp_name="Microsoft Corporation";
		$industry="Technology Company";
		$comp_email="opportunities@microsoft.com";
		$comp_pw="microSoft";

		//bind variables from above
		$stmt->bind_param("sssss",$comp_id,$comp_name,$industry,$comp_email,$comp_pw);
		//execute prepared statement
		$stmt->execute();

		//insert company info
		$comp_id="Google";
		$comp_name="Google Inc";
		$industry="Technology Company";
		$comp_email="opportunities@google.com";
		$comp_pw="gooGle";

		//bind variables from above
		$stmt->bind_param("sssss",$comp_id,$comp_name,$industry,$comp_email,$comp_pw);
		//execute prepared statement
		$stmt->execute();

		//insert company info
		$comp_id="RedHat";
		$comp_name="Red Hat Software";
		$industry="Software Company";
		$comp_email="opportunities@redhat.com";
		$comp_pw="redHat";

		//bind variables from above
		$stmt->bind_param("sssss",$comp_id,$comp_name,$industry,$comp_email,$comp_pw);
		//execute prepared statement
		$stmt->execute();

		//prepare insertion statement for institution details
		$stmt = $conn->prepare("INSERT INTO
		institution (inst_id,inst_name, location,inst_email,inst_pw)
		VALUES (?,?,?,?,?)");

		//insert college details
		$inst_id="DIT";
		$inst_name="Dublin Institute of Technology";
		$location=1;
		$inst_email="exchange@dit.ie";
		$inst_pw="dIt";

		//bind variables from above
		$stmt->bind_param("sssss",$inst_id,$inst_name,$location,$inst_email,$inst_pw);
		//execute prepared statement
		$stmt->execute();

		//insert college details
		$inst_id="BUAA";
		$inst_name="Beihang University";
		$location=3;
		$inst_email="exchange@buaa.cn";
		$inst_pw="buAa";

		//bind variables from above
		$stmt->bind_param("sssss",$inst_id,$inst_name,$location,$inst_email,$inst_pw);
		//execute prepared statement
		$stmt->execute();

		//insert college details
		$inst_id="KNU";
		$inst_name="Kyungpook National University";
		$location=4;
		$inst_email="exchange@knu.com";
		$inst_pw="kNu";

		//bind variables from above
		$stmt->bind_param("sssss",$inst_id,$inst_name,$location,$inst_email,$inst_pw);
		//execute prepared statement
		$stmt->execute();

		//insert college details
		$inst_id="TUDarmstadt";
		$inst_name="Technische Universität Darmstadt";
		$location=5;
		$inst_email="exchange@tud.de";
		$inst_pw="tUd";

		//bind variables from above
		$stmt->bind_param("sssss",$inst_id,$inst_name,$location,$inst_email,$inst_pw);
		//execute prepared statement
		$stmt->execute();

		//prepare insertion statement for student details
		$stmt = $conn->prepare("INSERT INTO
		student (stu_no,stu_name, stu_inst,stu_email,stu_pw)
		VALUES (?,?,?,?,?)");

		//insert student info
		$stu_no="C14464428";
		$stu_name="David Hunt";
		$stu_inst="DIT";
		$stu_email="c14464428@mydit.ie";
		$stu_pw="c14464428";

		//bind variables from above
		$stmt->bind_param("sssss",$stu_no,$stu_name,$stu_inst,$stu_email,$stu_pw);
		//execute prepared statement
		$stmt->execute();

		//insert student info
		$stu_no="C111222";
		$stu_name="James MacArthur";
		$stu_inst="DIT";
		$stu_email="c111222@mydit.ie";
		$stu_pw="c111222";

		//bind variables from above
		$stmt->bind_param("sssss",$stu_no,$stu_name,$stu_inst,$stu_email,$stu_pw);
		//execute prepared statement
		$stmt->execute();

		//insert student info
		$stu_no="C123456";
		$stu_name="Mary MacArthur";
		$stu_inst="DIT";
		$stu_email="c123456@mydit.ie";
		$stu_pw="c123456";

		//bind variables from above
		$stmt->bind_param("sssss",$stu_no,$stu_name,$stu_inst,$stu_email,$stu_pw);
		//execute prepared statement
		$stmt->execute();

		//prepare insertion statement for company details
		$stmt = $conn->prepare("INSERT INTO
		opportunity (op_id,author_id,loc_id,op_title,op_desc,op_type)
		VALUES (?,?,?,?,?,?)");

		//insert company info
		$op_id="1";
		$author_id="Intel";
		$loc_id=1;
		$op_title="Intel Artificial Intelligence Academy";
		$op_desc="The Intel® Nervana™ AI Academy was created to increase accessibility to data, tools, training, and intelligent machines for a broad community of developers, academics, and start-ups.";
		$op_type="Computing";

		//bind variables from above
		$stmt->bind_param("isssss",$op_id,$author_id,$loc_id,$op_title,$op_desc,$op_type);
		//execute prepared statement
		$stmt->execute();

		//insert company info
		$op_id="2";
		$author_id="Microsoft";
		$loc_id="1";
		$op_title="Software Engineer";
		$op_desc="Are you passionate about writing shared systems and services which are used across the company to deliver applications and online content every day? Do you have a passion for enabling our company to deliver our products to an ever-evolving worldwide landscape of languages, cultures, and local markets? ";
		$op_type="Computing";

		//bind variables from above
		$stmt->bind_param("isssss",$op_id,$author_id,$loc_id,$op_title,$op_desc,$op_type);
		//execute prepared statement
		$stmt->execute();

		//insert company info
		$op_id="3";
		$author_id="Microsoft";
		$loc_id="1";
		$op_title="Software Engineer";
		$op_desc="Are you passionate about writing shared systems and services which are used across the company to deliver applications and online content every day? Do you have a passion for enabling our company to deliver our products to an ever-evolving worldwide landscape of languages, cultures, and local markets? ";
		$op_type="Computing";

		//bind variables from above
		$stmt->bind_param("isssss",$op_id,$author_id,$loc_id,$op_title,$op_desc,$op_type);
		//execute prepared statement
		$stmt->execute();

		//prepare insertion statement for company details
		$stmt = $conn->prepare("INSERT INTO
		application (application_id,op_id, stu_no,application_status)
		VALUES (?,?,?,?)");

		//insert application info
		$op_id="1";
		$stu_no="C123456";
		$application_status="Approved";

		//bind variables from above
		$stmt->bind_param("ssss",$application_id,$op_id,$stu_no,$application_status);
		//execute prepared statement
		$stmt->execute();

		//insert company info
		$op_id="2";
		$stu_no="C123456";
		$application_status="Denied";

		//bind variables from above
		$stmt->bind_param("ssss",$application_id,$op_id,$stu_no,$application_status);
		//execute prepared statement
		$stmt->execute();

		//bind variables from above
		$stmt->bind_param("ssss",$application_id,$op_id,$stu_no,$application_status);
		//execute prepared statement
		$stmt->execute();

		//insert company info
		$op_id="3";
		$stu_no="C123456";
		$application_status="Pending";

		//bind variables from above
		$stmt->bind_param("ssss",$application_id,$op_id,$stu_no,$application_status);
		//execute prepared statement
		$stmt->execute();

		//insert company info
		$op_id="3";
		$stu_no="C111222";
		$application_status="Approved";

		//bind variables from above
		$stmt->bind_param("ssss",$application_id,$op_id,$stu_no,$application_status);
		//execute prepared statement
		$stmt->execute();


	}



?>
