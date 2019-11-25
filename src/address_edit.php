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
  
  
  $street = $_POST['street'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];
  $state = $_POST['state'];
  
  //$email = mysqli_real_escape_string($conn, $_POST['email']);
  //echo "Email: " . $email . "<br>";
  echo "Street: " . $street . "<br>";
  echo "City: " . $city . "<br>";
  echo "Zip: " . $zip . "<br>";
  echo "State: " . $state . "<br>";
  $sql = "SELECT * FROM addresses WHERE id='$session'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
        $row = $result->fetch_assoc();
       
             $sql2 = "UPDATE addresses SET street='$street' WHERE id='$session'";
             $result = $conn->query($sql2);
             $sql3 = "UPDATE addresses SET city='$city' WHERE id='$session'";
             $result = $conn->query($sql3);
             $sql4 = "UPDATE addresses SET zip='$zip' WHERE id='$session'";
             $result = $conn->query($sql4);
             $sql4 = "UPDATE addresses SET state='$state' WHERE id='$session'";
             $result = $conn->query($sql4);
            echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/profiletemp.php\">";
         
      
  } else {
      echo "User does not exist in our system! Redirecting you back to login page";
      //echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/Login.html\">";
  }