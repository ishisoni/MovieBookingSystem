<?php
	include './config.php';

   //$uname = $_POST["uname"];
   $formPassword = $_POST['password'];
  $uname = mysqli_real_escape_string($conn, $_POST['uname']);
  $sql = "SELECT * FROM users WHERE email='$uname'";
  $result = $conn->query($sql);
  $securePassword = md5($formPassword);

	if ($result->num_rows > 0) {
	    // output data of each row
	        $row = $result->fetch_assoc();
	        echo "password: " . $row['pwd'] . "<br>";
          echo "Form password: " . $formPassword;
	        $dataPassword = $row['pwd'];
	    
	} else {
	    echo "0 results";
	}
   /*

   $getPassStmt = $conn->prepare("SELECT pwd from users where email = '$uname' ");

   $getPassStmt->execute();
   $passDatabsase = $getPassStmt->fetch();

   $securePass = $passDatabase['pwd'];
   */


   /*
   $query = "SELECT * FROM users WHERE email = '$uname'";
   //$row = mysql_fetch_array($query);
   if(mysql_num_rows($query) > 0 ){
 while ($row = mysql_fetch_array ($query)) {
echo "<br /> PWD: " .$row['pwd']. "<br /> First Name: ".$row['fname']. "<br /> Last Name: ".$row['lname']. "<br /> Email: ".$row['email']. "<br />";
 }
}
*/

  // $securePass = $row['pwd'];
  // $newPass = md5($formPass);
   //echo "reached this point!";
   echo "Database Password " . $dataPassword . "<br>";
   //echo "Pass Database " . $passwords . "<br>";
   echo "Form Password Hashed " . $securePassword . "<br>";

   if ($securePassword == $dataPassword) {
   		echo "login successful!";
           // start the session
           session_start();

           $sql2 = "SELECT * FROM users WHERE email='$uname'";
           $result2 = $conn->query($sql2);
		   

			if ($result2->num_rows > 0) {
			    // output data of each row
			        $row2 = $result2->fetch_assoc();
			        echo "User ID " . $row2['uID'] . "<br>";
					$UID = $row2['uID'];
					// set the session variable
					$_SESSION["userID"] = $UID;
					$_SESSION["test"] = "this is a test";
					$message = "Session is " . $_SESSION["userID"] . "UID is" . $UID;
           echo "<script type='text/javascript'>
                        alert('$message');</script>";
			    
			} else {
			    echo "0 results";
			}
		if ($uname == "admin") {
			echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/AdminPortal.php\">";

		}
		else {
			echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/homepageTemp.php\">";
		}
        
    } //if
        else {
           echo "Incorrect Password. Redirecting you back to login page.";
           //echo "<meta http-equiv=\"refresh\" content=\"2;url=login.html\">";
        } //else


?>