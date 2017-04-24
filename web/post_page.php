<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="post_page.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require 'init.php';
require "navbar.php";
require "functions.php";
    if ($_SESSION["usertype"] = "INST")
    {
        $mtype = "exchange";
    }
    else{
        $mtype = "internship";
    }
    
    
    
    
echo "
<div class='container'>
<div class='jumbotron'>
<form action ='post_opp.php' method='get'>
	<div class='form-group'>
		<label for='mob_type'>Mobility Type:</label>
		<select class='form-control' id='m_type'>
			<option>$mtype</option>
			<!--<option>Student Exchange</option>-->
		</select>
        </div>
        <div class='form-group'>
        <label for='mob_type'>location:</label>
		<select class='form-control' id='m_type' name ='location'>";
            
        $pdo = pg_connect_to_database();
        $sql = $pdo->query("SELECT * FROM location");
        $i =0;
        while( $row = $sql->fetch()){
                echo "<option>",$row[1],"</option>";
            }
    
			//<option>$mtype</option>
			//<!--<option>Student Exchange</option>-->
		echo "</select>
        
	</div>
	
	<div class='form-group'>
		<label for='mob_name'>Mobility Name:</label>
		<input type='text' class='form-control' id='title' name='title'>
	</div>
	
    
	<div class='form-group'>
		<label for='dur'>Field:</label>
		<input type='text' class='form-control' id='duration' name='type'>
	</div>
    
	<div class='form-group'>
	  <label for='comment'>Mobility Description:</label>
	  <textarea class='form-control' rows='5' id='comment' name ='desc'></textarea>
	</div>

	<button type='submit' class='btn btn-default'>Submit</button>
	
</form>
</div>
</div>"
?>

</body>
</html>
