<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="applicants_style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php
require "navbar.php";
?>
<div class="container">
	<div class="well">
		<div class="row">
			<div class="col-sm-12">
				<h3>View Applicants</h3>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
			<div class="col-sm-2 sidenav">
				<h4>Opportunities</h4>
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a >#Title1</a></li>
					<li><a >#Title2</a></li>
				</ul>
				
			</div>
			
			
			<div class="col-sm-10 list">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 title" >
							<h4>#Title1</h4>
						</div>
					</div>
				</div></br>
				
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<a class="name">Charles Acquah</a></br>
							<a>Dublin Institute of Technology</a> <br/>
						</div>
						<div class="col-sm-6">
							<button class="btn btn-primary">Accept</button>
							<button class="btn btn-primary">Decline</button> 
						</div>
					</div>
				</div><br>
				
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<a class="name">David Hunt</a></br>
							<a>Beihang University</a> <br/>
						</div>
						<div class="col-sm-6">
							<a href="" class="btn btn-primary" role="button">Accept</a>
							<a href="" class="btn btn-primary" role="button">Decline</a> 
						</div>
					</div>
				</div>
				
			</div>
	</div>
</div>


</body>
</html>