<?php
    
   include './config.php';


  $stmt = $conn->prepare("INSERT INTO movies (title, category, synopsis, movieCast, director, producer, reviews,trailerPic, trailerVideo, startDate, endDate, MPAA) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssssssss", $title, $category, $synopsis, $movieCast, $director, $producer, $reviews, $trailerPic, $trailerVideo, $startDate, $endDate, $MPAA);
  $title = $_POST['title'];
  $category = $_POST['category'];
  $synopsis = $_POST['synopsis'];
  $movieCast = $_POST['movieCast'];
  $director = $_POST['director'];
  $producer = $_POST['producer'];
  $reviews = $_POST['reviews'];
  $trailerPic = $_POST['trailerPic'];
  $trailerVideo = $_POST['trailerVideo'];
  $MPAA = $_POST['MPAA'];
  $startDate1 = $_POST['startDay'];
  $startDate = date($startDate1);
  $endDate1 = $_POST['endDay'];
  $endDate = date($endDate1);

  $sql2 = "SELECT * FROM movies WHERE title ='$title'";
  $result = $conn->query($sql2);
  if ($result->num_rows == 0) {
    $stmt->execute();

  session_start();

  $_SESSION['movieName'] = $title;



$message = "You have successfully added this movie. Proceeding to enter showtimes for this movie.";
           echo "<script type='text/javascript'>
                        alert('$message');</script>";

   echo "<meta http-equiv=\"refresh\" content=\"0;url=AddShowTime1.php\">";

  } else {

    $message = "This movie already exists. Please add a different movie.";
           echo "<script type='text/javascript'>
                        alert('$message');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=ManageMovie.php\">";
  }
  
?>





