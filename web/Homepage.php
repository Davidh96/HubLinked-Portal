<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="clientPages.css">
	<link rel="stylesheet" href="stylesheets/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php
require "navigationbar.php";

$email = $_SESSION["user"];
if($_SESSION["usertype"] == "STUDENT"){
		$result = get_student_details($email);
}
else if($_SESSION["usertype"] == "COMPANY"){
		$result = get_company_details($email);
}
else{
		$result = get_inst_details($email);
}


?>

<div class="container">
	<div class="row">
		<div class="col1 col-sm-8">
			<div class="well">
				<h2>Welcome <?php echo $result[1]?></h2>
				<?php echo $result[2]?><br>
				<?php echo $result[3]?><br>
				<a href="user_account.php" class="btn btn-primary" role="button">View Profile</a> <br><br>
			</div>


			<div class="well">
				<div class="row">
					<div class="col-sm-12">
						<h4><small>Summary</small></h4>
						<p></p>
					</div>
				</div>
			</div>
		</div>


			<div class="row content">
				<div class="col-sm-4 sidenav ">


					<h4>Colleges</h4>
					<?php
					$sql = $myPDO->query("SELECT * FROM institution limit 3");
					while($row = $sql->fetch()){
									$id = $row[1];
									echo $id, '</br>';
					}
					?>
				<br>
					<a href="view_applicants.php">View Applicants</a><hr>

          <h4>Posted Opportunities</h4>
					Few lists of posted opportunities<br>
					<a href="view_opptnity.php">Manage</a>

				</div>
			</div>
		</div>
</div>
</body>
</html>
