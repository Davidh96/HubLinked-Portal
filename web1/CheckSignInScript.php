<?php
  //check user is logged in
  session_start();

  //if no user is logged in, return to index page
  //username is temporary variable name, subject to change
  if(empty($_SESSION['username'])){
    header('Location:index.php');
  }
?>
