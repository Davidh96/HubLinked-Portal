<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="	"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="style.css">
        <script src="jquery-3.1.1.min.js"></script>
        <script src="jquery.js"></script>
	</head>
<body>
<?php
    require 'nav_bar_update.html';
?>

  <div class="container">
<div class="jumbotron">
    
	<?php 
    require 'functions.php';
    
    $email = $_SESSION["user"];
    $result = get_student_details($email);
    
    echo"
	<h2><span class='glyphicon glyphicon-user'></span> Account Details</h2>
	<p>
	<br>
    name : $result[1]
    <p>
	student no : $result[0]
    <p>
    email: $result[3]   
	
	<p>
	college: $result[2]   
	
	<p>
	<a id='infochange'>Request Info Change</a>
	"?>
	
	
	

</div>
</div>



</body>
</html>