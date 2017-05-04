<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="all" href="/Hublink_new/Hublinked-Portal/web/style.css">
	<link rel="stylesheet" href="stylesheets/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php
require "navigationbar.php";
require "functions.php";
$opID = $_GET["id"];


$row=get_app_details($opID);
?>
<div class="container">
	<div class="well">
		<div class="row">
			<div class="col-sm-12">
				<h3><?php echo $row[3];?></h3>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col1 col-sm-4">
			<div class="well">
				<h4>Author: <?php echo $row[3];?></h4>
				<p>Type:  <?php echo $row[5];?></p>
				<p>Email</p>
				<p>Location:</p>
				<p></p>
			</div>
		</div>
<div class="col1 col-sm-7">
			<div class="well">
				<h4><small>Description</small></h4>
				<?php echo $row[4];
				?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
