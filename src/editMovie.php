<?php
    
  include './config.php';

	$id = $_GET['id'];
	echo $id;
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
 
  $endDate1 = $_POST['endDay'];


  $sql = "SELECT * FROM movies WHERE id='$id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
        $row = $result->fetch_assoc();
               
             $sql2 = "UPDATE movies SET title='$title' WHERE id='$id'";
             $result = $conn->query($sql2);

             $sql3 = "UPDATE movies SET category='$category' WHERE id='$id'";
             $result = $conn->query($sql3);

             $sql4 = "UPDATE movies SET synopsis='$synopsis' WHERE id='$id'";
             $result = $conn->query($sql4);

             $sql5 = "UPDATE movies SET movieCast='$movieCast' WHERE id='$id'";
             $result = $conn->query($sql5);

             $sql6 = "UPDATE movies SET director='$director' WHERE id='$id'";
             $result = $conn->query($sql6);

             $sql7 = "UPDATE movies SET producer='$producer' WHERE id='$id'";
             $result = $conn->query($sql7);

             $sql8 = "UPDATE movies SET reviews='$reviews' WHERE id='$id'";
             $result = $conn->query($sql8);

             $sql9 = "UPDATE movies SET trailerPic='$trailerPic' WHERE id='$id'";
             $result = $conn->query($sql9);

             $sql10 = "UPDATE movies SET trailerVideo='$trailerVideo' WHERE id='$id'";
             $result = $conn->query($sql10);

             $sql11 = "UPDATE movies SET MPAA='$MPAA' WHERE id='$id'";
             $result = $conn->query($sql11);

             $sql12 = "UPDATE movies SET startDate='$startDate1' WHERE id='$id'";
             $result = $conn->query($sql12);

             $sql13 = "UPDATE movies SET endDate='$endDate1' WHERE id='$id	'";
             $result = $conn->query($sql13);

            }
           
?>


