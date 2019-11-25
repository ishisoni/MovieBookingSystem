<?php
    
   include './config.php';
    session_start();
    if (isset($_SESSION["userID"]) == false)
    {
        echo "Please login before viewing this page.";
        //echo "<meta http-equiv=\"refresh\" content=\"2;url=login.html\">";
    }

 
       // SESSION VARIABLE
  $session=$_SESSION["userID"];
  echo "Session ID: " . $session. "<br>";

    // bind values and insert them.
  //$stmt = $conn->prepare("INSERT INTO users (fname, lname, email, pwd) VALUES (?, ?, ?, ?)");
  //$stmt->bind_param("ssss", $firstname, $lastname, $email, $newpass);
 // $stmt->close();
  
  
  $cardNum = $_POST['cardNum'];
  $cardNumLast = substr($cardNum, -4);
  $cardNumHashed = md5($cardNum);
  $expDate1 = $_POST['expirationDate'];
  
  
  //$email = mysqli_real_escape_string($conn, $_POST['email']);
  //echo "Email: " . $email . "<br>";
  echo "Card Num: " . $cardNum . "<br>";
 
  $sql = "SELECT * FROM creditCards WHERE id='$session'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
        $row = $result->fetch_assoc();
       
             $sql2 = "UPDATE creditCards SET cardNumber='$cardNumHashed' WHERE id='$session'";

             $result = $conn->query($sql2);
             $sql3 = "UPDATE creditCards SET lastFourOne='$cardNumLast' WHERE id='$session'";
             
             $result = $conn->query($sql3);
             $sql4 = "UPDATE creditCards SET expDate='$expDate1' WHERE id='$session'";
             
             $result = $conn->query($sql4);

            
            echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/profiletemp.php\">";
         
      
  } else {
      echo "User does not exist in our system! Redirecting you back to login page";
      //echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/Login.html\">";
  }