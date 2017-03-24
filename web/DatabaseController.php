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
		$location = "CREATE TABLE IF NOT EXISTS location (
							loc_id INT(11) unsigned auto_increment not null,
							name VARCHAR(30) not null,
							street varchar(30),
							city varchar(30),
							zipcode INT(15),
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
							comp_name VARCHAR(30),
							industry VARCHAR(30),
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
							s_name VARCHAR(31) not null,
							s_inst VARCHAR(11) not null,
							primary key (stu_no),
							foreign key (s_inst) references institution(inst_id)
							)";

		if (mysqli_query($conn, $student_table)) {
			echo "Location Table created successfully" . "<br>";
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

	}

?>
