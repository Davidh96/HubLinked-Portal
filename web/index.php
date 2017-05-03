<html>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="jquery.js"></script>
</html>
    <?php
    //session_start();
    require 'init.php';
    require 'functions.php';
    // echo $_SESSION["user"];
    // echo $_SESSION["usertype"];
    //global $PDO;
    //$myPDO = pg_connect_to_database();
    //get_table_data("company");
    if(logged_in()){
        require 'Homepage.php';
    }
    else{
        require'loginpage.php';
    }

    ?>
