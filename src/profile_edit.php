<?php
    
  include './config.php';
   
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  echo "works";
    session_start();
    if (isset($_SESSION["userID"]) == false)
    {
        echo "Please login before viewing this page.";
        //echo "<meta http-equiv=\"refresh\" content=\"2;url=login.html\">";
    }

 
       // SESSION VARIABLE
  $session=$_SESSION["userID"];
  echo "Subscribed: " . $session. "<br>";

    // bind values and insert them.
  //$stmt = $conn->prepare("INSERT INTO users (fname, lname, email, pwd) VALUES (?, ?, ?, ?)");
  //$stmt->bind_param("ssss", $firstname, $lastname, $email, $newpass);
 // $stmt->close();
  
  if ($_POST['subscribe'] == "yes") {
    $isSubscribed = 1;
  } else {
    $isSubscribed = 0;
  }
  echo "Subscribed: " . $isSubscribed. "<br>";
  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $currentPass = $_POST['password'];
  $newPass = $_POST['passwordConfirm'];
  
  //$email = mysqli_real_escape_string($conn, $_POST['email']);
  //echo "Email: " . $email . "<br>";
  echo "First Name: " . $fname . "<br>";
  $sql = "SELECT * FROM users WHERE uID='$session'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
        $row = $result->fetch_assoc();
        $currentPassDB = $row['pwd'];
        $email = $row['email'];
        if ($currentPass == $currentPassDB) {
            $sql5 = "UPDATE users SET pwd='$newPass' WHERE uID='$session'";
            $result = $conn->query($sql5);

        }


       
             $sql2 = "UPDATE users SET fname='$fname' WHERE uID='$session'";
             $result = $conn->query($sql2);
             $sql3 = "UPDATE users SET lname='$lname' WHERE uID='$session'";
             $result = $conn->query($sql3);
             $sql4 = "UPDATE users SET isSubscribed='$isSubscribed' WHERE uID='$session'";
             $result = $conn->query($sql4);
             if ($isSubscribed ==1 ) {
              $subscribed = "Subscribed";
             }
            else {
              $subscribed = "Not subscribed";
             
            }
            $msg = "You have edited your profile. Your subscription status is : ". $subscribed . "<br>";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($email,"Profile Changed",$msg);

            echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/profiletemp.php\">";
         
      
  } else {
      echo "User does not exist in our system! Redirecting you back to login page";
      //echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/Login.html\">";
  }