<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="	"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="style.css">
	</head>
<body>
<?php
    require 'nav_bar_update.html';
?>

  <div class="container">
<div class="jumbotron">

<form method="post" action="" enctype="multipart/form-data" id = "layout">
	
	<h2><span class="glyphicon glyphicon-user"></span> Account Details</h2>
	<p>
	<br>
	
	Edit college name:  <input type = "text" placeholder="College name" >  
	
	<p>
	Edit college email:  <input type = "text" placeholder="College name" >  
	
	<p>
	Enter New Password:  <input type = "text" placeholder="College name" >  
	
	<p>
	To save type in password:  <input type = "text" placeholder="College name" >  
	<p>
	<button type="submit" class="btn btn-default"> Save Details</button>
	<p>
	
	
</form>
</div>
</div>



</body>
</html>