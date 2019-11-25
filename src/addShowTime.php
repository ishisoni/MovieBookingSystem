<?php
	include './config.php';

   session_start();

   

    $movieTitle = $_SESSION['movieName'];
     echo "Movie title " . $movieTitle . "<br>";
   $sql2 = "SELECT * FROM movies WHERE title='$movieTitle'";
           $result2 = $conn->query($sql2);
		   

			if ($result2->num_rows > 0) {
			    // output data of each row
			        $row2 = $result2->fetch_assoc();
			        $movieID = $row2['id'];
			        echo "Movie ID " . $movieID . "<br>";
			    } 

			    else {
			    	echo " 0 results";
			    }
   



  $stmt = $conn->prepare("INSERT INTO shows (showroomID, timeOfMovie, movieID) VALUES (?, ?, ?)");
  $stmt->bind_param("isi", $showroomID, $movieTime, $movieID2);
 
  $showroomID = $_POST['showroom'];
  echo "showroom ID " . $showroomID . "<br>";

  $timeOfMovie = $_POST["times"];
  if ($timeOfMovie == "10:00") {
  	$movieTime = "10:00";
  } else if ($timeOfMovie == "12:00"){
	$movieTime = "12:00";
  } else if ($timeOfMovie == "2:00") {
  	$movieTime = "2:00";
  } else {
  	$movieTime = "4:00";
  }

  $sql = "SELECT * FROM shows WHERE movieID = $movieID";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    forEach($result as $entry) {
      $movieTimes = $entry['timeOfMovie'];
      $showroomID2 = $entry['showroomID'];
      if(($movieTime == $movieTimes) && ($showroomID == $showroomID2)) {

        $message = "This showtime already exists for this given movie at this showroom. Please add a different showtime.";
           echo "<script type='text/javascript'>
                        alert('$message');</script>";
  echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/AddShowTime1.php\">";


      }
    }

  }
else {
  echo "time of movie :  " . $movieTime . "<br>";
  $movieID2 = $movieID;


  $stmt->execute();

$message = "You have successfully added a showtime for this movie. Returning to add showtime so you can add more movies";
           echo "<script type='text/javascript'>
                        alert('$message');</script>";
  echo "<meta http-equiv=\"refresh\" content=\"0;url=../src/AddShowTime1.php\">";


}

  


   ?>