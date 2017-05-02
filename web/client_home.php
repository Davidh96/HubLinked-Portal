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
require "navbar.php";
?>

<div class="container">
	<div class="row">
		<div class="col1 col-sm-8">
			<div class="well">
				<h4>Name</h4>
				Location<br>
				Affiliations: <a href="">DIT</a>,<a href="">Beihang Univ.</a><br><br>
				<a href="" class="btn btn-primary" role="button">Edit Profile</a> <br><br>
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
				
					<p>?? Opportunities advertised</p>
					<p>?? Student Exchanges</p><br>
					
					<h4>Applications</h4>
					Few list of students(hyperlink) who applied<br>
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