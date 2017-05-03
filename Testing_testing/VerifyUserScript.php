<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="stylesheet.css" rel="stylesheet" type="text/css"/>

      <?php
      //connect to database
      require "conn.php";
      //hide error message after an amount of time
      require "animateError.js";

        //if a username has been entered
        if(isset($_POST["Name"]) && !empty($_POST["Name"])){
          //if a password has been entered
          if(isset($_POST["Password"]) && !empty($_POST["Password"])){
            //if a confirmation password has been entered
            if(isset($_POST["Password-Confirm"]) && !empty($_POST["Password-Confirm"])){

              //place posted variables into variables
              $username = $_POST["Name"];
              $password = $_POST["Password"];
              $n_password = $_POST["Password-Confirm"];

              //check if the password and confirmation password are the same
              //if not the same
              if(strcmp($password, $n_password)  !== 0)
              {
                $msg = "Passwords do not match";
              }
              //if the same
              else{

                //need to check if username already exists
                //prepare select statement
                $stmt=$conn->prepare("select * from foodlerecipe.userdetails where Username = ?");
                //bind username
                $stmt->bind_param("s",$username);
                //execute prepared statement
                $stmt->execute();
                //get result of select statement
                $result=$stmt->get_result();
                //get first result
                $row=$result->fetch_assoc();

                //if the username exists
                if(mysqli_num_rows($result) > 0){
                  $msg = "Username already in use";
                }
                //if username does not exist
                else{

                  //checks if the user has only entered letters and numbers for their username
                  if(preg_match("/^[a-zA-Z0-9]{4,}$/",$username)){

                  //if(preg_match("/^[a-zA-Z0-9]*$/",$password))
                    //checks if the user has only entered letters and numbers for their password
                    if (preg_match("/^[a-zA-Z0-9]{6,}$/", $password))
                    {

                      //hash password with whirlpool
                      $password= hash("whirlpool",$password);
                      //hash confirmation password with whirlpool
                      $n_password=hash("whirlpool",$n_password);

                      //prepare insertion statement for user details
                      $stmt = $conn->prepare("INSERT INTO foodlerecipe.userdetails (Username, Password) VALUES (?, ?)");
                      //bind username and password to statement
                      $stmt->bind_param("ss",$username,$password);

                      //execute prepared statement
                      $stmt->execute();

                      //set message to display that user has been registered
                      $msg = "You are now registered";
                      header('location: index.php?msg=' . $msg);

                    }//end password preg_match
                    else{
                      $msg = "Password must be at least 6 characters long and contain only a-z, A-Z and 0-9";
                    }
                  }//end username preg_match
                  else{
                    $msg = "Username must be at least 4 characters long and contain only a-z, A-Z and 0-9";
                  }
                }//end else
              }
            }//end confirmation of password
          }//end password
        }//end name


      ?>
</head>


<body class="image">

  <div class="container">
    <div class = "jumbotron">
      <a href="index.php" id="noDecLink"><h2 class="title-text main-header" >Foodle Recipes</h2></a>
    </div>

    <div class = "Jumbotron">
    <h2 class="header-text">Register</h2>
    <hr>

    <!-- form for registering a new user-->
    <form  method="post" action="" enctype="multipart/form-data">
      <!--insert a username-->
      <div class="form-group">
        <label for="Name">Username: *</label>
        <input type="text" class="form-control" name="Name" required>
      </div>

      <!-- insert a paswword-->
      <div class="form-group">
        <label for="password">Password: *</label>
        <input type="password" class="form-control" name="Password" required>
      </div>

      <!--confirm password-->
      <div class="form-group">
        <label for="confpassword">Confirm Password: *</label>
        <input type="password" class="form-control" name="Password-Confirm" required>
      </div>

      <button type="submit" class="btn btn-default">Submit</button>
      <button type="reset" class="btn btn-default">Reset</button>
    </form>

    <?php
      //display any error messages
      if(isset($msg))
      {
        echo '<h5 style="color:red" id="errorMsg">' . $msg . '</h5>';
      }
    ?>
    </div>
  </div>

</body>
