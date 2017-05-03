<?php
  //sign user out of website
  session_start();

  session_unset();

  // destroy the session
  session_destroy();

  //return to index page
  header('Location: index.php');
 ?>
