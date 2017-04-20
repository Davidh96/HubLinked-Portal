<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
		<a href="home.php">
			<img class="img-responsive" src="logo.png" alt="Logo" width="100" height="100">
		</a>
    </div>
	<div class="nav navbar-nav navbar-left"> <p class="navbar-text">HubLinked</p> </div>
	<form class="navbar-form navbar-left">
		<div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
		</div>
		<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
	</form>
	<ul class="nav navbar-nav navbar-right">
		<li><a href=""><span class="glyphicon glyphicon-home"></span></br> Home</a></li>
        <li><a href="notification.php"><span class="glyphicon glyphicon-bell"></span></br>Notification</a></li>
		<li><a href=""><span class="glyphicon glyphicon-envelope"></span></br> Messages</a></li>
		<li><a href=""><span class="glyphicon glyphicon-pencil"></span></br> Post</a></li>
		<li><a href=""><span class="glyphicon glyphicon-education"></span></br> Students</a></li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li> <a href="">Edit Profile</a></li>
				<li> <a href="index.html">Logout</a></li>
			</ul>
		</li>
    </ul>
  </div>
</nav>
</body>
</html>
