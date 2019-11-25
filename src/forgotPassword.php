<?php
    
   include './config.php';

    // bind values and insert them.
  //$stmt = $conn->prepare("INSERT INTO users (fname, lname, email, pwd) VALUES (?, ?, ?, ?)");
  //$stmt->bind_param("ssss", $firstname, $lastname, $email, $newpass);
 // $stmt->close();
  $emailAddress = $_POST["uname"];
  $securityAnswer = $_POST["security"];
  //echo "Security Answer: " . $securityAnswer . "<br>";
  $newPass = $_POST["newPass"];
  $confirmPass = $_POST["passConfirm"];
  $uname = mysqli_real_escape_string($conn, $_POST['uname']);
  $sql = "SELECT * FROM users WHERE email='$uname'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
        $row = $result->fetch_assoc();
        $dataPassword = $row['pwd'];
        $securityAnswerDB = $row['securityAns'];
        //echo "Security Answer DB: " . $row['securityAns'] . "<br>";
        if ($securityAnswer == $securityAnswerDB) {
          if($newPass == $confirmPass) {
            $newPassHash = md5($newPass);

             $sql2 = "UPDATE users SET pwd='$newPassHash' WHERE email='$uname'";
             $result = $conn->query($sql2);
             //echo "Your password has been reset";
             //$_SESSION["test"] = "this is a test";
          $message = "Your password has been reset. Redirecting you back to the login page";
           echo "<script type='text/javascript'>
                        alert('$message');</script>";
                        echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/Login.html\">";

          } else {
            echo "Your passwords do not match. Please resubmit this form";
          }

         
        } else {
          echo "Incorrect security answer. Please resubmit this form";
        }

         
      
  } else {
      echo "User does not exist in our system! Redirecting you back to login page";
      echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/Login.html\">";
  }


