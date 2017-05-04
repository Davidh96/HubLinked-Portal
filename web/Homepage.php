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
						<h3><small>Latest Opportunities</small></h3>
						<table width="200" class="table table-condensed">
						<tr>
										<td> company</td>
										<td>title</td>
										<td>location</td>
										<td> Click here for informaton </td>
						</tr>
						<?php
						$stmt = $myPDO->query("SELECT op_id, op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id JOIN location using(loc_id) ORDER BY op_id DESC limit 10");

						while ($row = $stmt->fetch()){
						echo "<tr>
								<td> $row[2]</td>
								<td>$row[1]</td>
								<td>$row[3]</td>

  						";
								echo "<td><a href='job_search_details.php?id=" . $row[0] . "'> Click here </a> </td>
						</tr>";
								}
							?>

						</table>
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
					<?php
					if($_SESSION["usertype"] != "STUDENT"){

						echo'<h4>Posted Opportunities</h4>
						<a href="view_opptnity.php">Manage</a>';


						echo '<table width="200" class="table table-condensed">';


						$stmt = $myPDO->prepare("SELECT op_id, op_title from opportunity JOIN company ON author_id = comp_id where comp_email = :se limit 5");
						$stmt->bindParam(':se',$email);
						$stmt->execute();

						while ($row = $stmt->fetch()){
						echo "<tr>
								<td> $row[1]</td>";
								echo "<td><a href='job_search_details.php?id=" . $row[0] . "'> Click here </a> </tr>";
								}
						}
						?>

					</table>


				</div>
			</div>
		</div>
</div>
</body>
</html>
