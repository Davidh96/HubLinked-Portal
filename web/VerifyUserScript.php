<?php

  require "DatabaseController.php";

  //check for submitted email
  if(isset($_POST["email"]) && !empty($_POST["email"]) )
  {
      //check for submitted password
      if( isset($_POST['password']) && !empty($_POST['password']) )
      {
          $email = $_POST["email"];
          $password = $_POST["password"];
          $table = $_POST["table"];

          //encrypt password
          //$password= hash("whirlpool",$password);

          $stmt=$conn->prepare("select * from
          student where stu_email = ?");
          $stmt->bind_param("s",$email);
          $stmt->execute();
          $result=$stmt->get_result();
          $row=$result->fetch_assoc();

          //if an account with the matching mail is found
          if(mysqli_num_rows($result) > 0) {
            //if password is correct
            if(strcmp($password, $row["stu_pw"]) == 0)
            {
              //start session
              session_start();
              $_SESSION['email'] = $email;

              echo "Account Found";

              //header('Location: blahblah.php');
            }
            else{
              echo "Password entered Incorrectly";
            }
          }
          else{
              echo "Username does not exist";
          }
      }
  }

  $conn->close();
?>
