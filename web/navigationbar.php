<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="style.css">
	</head>
<body>
<?php require 'init.php'; ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src = "images/logo.png" style="width:70px;height:50px" id = "logo"></a>
    </div>

    <ul class="nav navbar-nav navbar-right">
	    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<?php
				if($_SESSION["usertype"] != "STUDENT"){
					echo '<li><a href="view_applicants.php"><span class="glyphicon glyphicon-bell"></span> Opportunities</a></li>';
				}

        if($_SESSION["usertype"] == "STUDENT"){
         echo '<li><a href="notifications.php"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
				 <li><a href="job_search.php"><span class="glyphicon glyphicon-lock"></span> Jobs</a></li>
				 <li><a href="college_search.php"><span class="glyphicon glyphicon-book"></span> Colleges</a></li>';
        }
        ?>
			<li><a href="user_account.php"><span class="glyphicon glyphicon-user"></span> Me</a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log out</a></li>
    </ul>
    </div>
</nav>
</body>
</html>
