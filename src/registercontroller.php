<?php
    
 include './config.php';
  //echo "works";

    // bind values and insert them.
  $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, pwd, state, createAt, isSubscribed, securityAns, userType) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssisisi", $firstname, $lastname, $email, $password, $status, $createAt, $isSubscribed, $securityAnswer, $userType);
  $stmt2 = $conn->prepare("INSERT INTO addresses (street, city, state, zip) VALUES (?, ?, ?, ?)");
  $stmt2->bind_param("ssss", $street, $city, $state, $zip);

  $stmt3 = $conn->prepare("INSERT INTO creditCards (cardNumber, expDate, lastFourOne) VALUES (?, ?, ?)");
  $stmt3->bind_param("ssi", $creditCardNum2, $expDate, $creditCardDisplay);

 // $stmt->close();
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
//status of one means active, status of 0 means inactive.
$status = 1;
$street = $_POST["street"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$creditCardNum = $_POST["creditCardNum"];
$creditCardDisplay = substr($creditCardNum, -4);
$creditCardNum2 = md5($creditCardNum);

//echo "Last four digits : ". $creditCardDisplay . "<br>";
$expDate = $_POST["exp"];
// NEED TO ADD SUBSCRIBE BUTTON
if ($_POST["checkbox"] == "yes") {
  $isSubscribed = 1;

}
else {
  $isSubscribed = 0;
}
// NEED TO ADD SECURITY QUESTION TO REGISTRATION FORM
$securityAnswer = $_POST["security"];
// NEED TO ADD DATE TO REGISTRATION FORM
//$createAt = $_POST["curdate"];
$createAt = date("Y-m-d");
// user is 0, admin is 1
$userType = 0;

//$newpass = md5($password);




$stmt->execute();
$stmt2->execute();
$stmt3->execute();

$msg = "You have successfully signed up for the Cinema E-booking movie system! Wow!";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($email,"Registration Confirmation",$msg);

echo "sent a confirmation email to " . $email . "<br>";



  // $addUserStmt = $conn->prepare("INSERT INTO users (fname,lname,email,pwd) VALUES ('john', 'Doe', 'j@example.com', 'passwrd')");
   //

  /*
   $sql = "INSERT INTO users (fname,lname,email,pwd) VALUES ('john', 'Doe', 'j@example.com', 'passwrd')";
   if ($conn->query($sql) === TRUE) {
        echo "New record created successfuly";
   } else {
        echo "Error: " 
   }
   $conn->close();
   */

   /*
   $fname = $_POST["fname"];
   $addUserStmt->bindValue(':fname', $fname);
   $lname = $_POST["lname"];
   $addUserStmt->bindValue(':lname', $lname);
   $email = $_POST["email"];
   $addUserStmt->bindValue(':email', $email);
   $pwd = $_POST["pwd"];
   $addUserStmt->bindValue(':pwd', md5($pwd));
*/
   
   //$addUserStmt->execute();
   //$addUserStmt->closeCursor();

   echo "<meta http-equiv=\"refresh\" content=\"0;url=RegistrationConfirmation.html\">";
?>