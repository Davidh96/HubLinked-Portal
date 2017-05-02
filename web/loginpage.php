<html>
	<head>
    <link rel="stylesheet" href="style.css" type="text/css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><img class="logo-img" src="images/full_logo.png" style="width:125px;height:85px;margin-top:-30" id="full_logo"></a>
    </div>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
      </form>

     <form class="navbar-form navbar-right" id="login_form">
        <input type = "text" placeholder ="Email"class="form-control" name="email" id="login_email"><t> </t>
        <input type = "password" placeholder= "Password" class="form-control" name="password" id="login_password">
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Login</button>
        <div id="login_error" class="error" style="display:none"><p class="error">error message</p></div>
    	</form>
    </div>
</nav>

  <div class="container">
<div class="jumbotron">

<form method="post" action="" enctype="multipart/form-data" id = "layout">

	<H2>Don't have an account? </H2>
	<p>
	<H2>Sign up below - its free.</H2><p><p>
	<H3>Are you a <p><p></h3>
	<button class = "btn-primary" style = "font-size: 25px;padding: 10px 60px;">Student</button ><p><h3>or</H3> <p><p>
	<button class = "btn-primary" style = "font-size: 25px;padding: 10px 26px;">College/Client</button>


</form>
</div>
</div>





</body>
</html>
