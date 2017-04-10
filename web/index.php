<html>
<head>
    <?php
    require ("pg_config.php");
    ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
    require "navigationbar.html"
   ?>
  <div class = "Jumbotron">
            <div  class="container">
              <h2 class="header-text">Login</h2>
              <hr>

              <!-- form for registering a new user-->
              <form  method="post" action="" enctype="multipart/form-data">
                <!--insert a username-->
                <div class="form-group">
                  <label for="Name">Username:</label>
                  <input type="text" class="form-control" name="username" required>
                </div>

                <!-- insert a paswword-->
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
                <a href ="register.php"  class="btn btn-default">Register</a>
              </form>
            </div>
        </div></body>
</html>
