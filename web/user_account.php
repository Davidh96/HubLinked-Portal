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
    require'init.php';
		require 'navigationbar.php';
?>

  <div class="container">
<div class="jumbotron">

	<?php
    require 'init.php';
    require 'functions.php';

    $email = $_SESSION["user"];
    if($_SESSION["usertype"] == "STUDENT"){
        $result = get_student_details($email);
        $two = "student no";
    }
    else if($_SESSION["usertype"] == "COMPANY"){
        $result = get_company_details($email);
        $two = "industry";
    }
    else{
        $result = get_inst_details($email);
        $two = "location";
    }
    echo"
	<h2><span class='glyphicon glyphicon-user'></span> Account Details</h2>
	<p>
	<br>
    name : $result[1]
    <p>
	$two : $result[0]
    <p>
    email : $result[3]
    <p>";
	
    if($_SESSION["usertype"] == "STUDENT"){
    echo "
	college: $result[2]

	<p>
	<a id='infochange'>Request Info Change</a>
	";}
    ?>




</div>
</div>



</body>
</html>
