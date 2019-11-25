
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="../css/cardStyle.css">	
</head>

<?php 
include './config.php';
   
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 

  $queryString = $_SERVER['QUERY_STRING'];

  parse_str($queryString);


  $sql = "SELECT * FROM movies WHERE id = '$id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0 ) {
  	$row = $result->fetch_assoc();
  	$title = $row['title'];
  $category = $row['category'];
  $synopsis = $row['synopsis'];
  $movieCast = $row['movieCast'];
  $director = $row['director'];
  $producer = $row['producer'];
  $reviews = $row['reviews'];
  $trailerPic = $row['trailerPic'];
  $trailerVideo = $row['trailerVideo'];
  $MPAA = $row['MPAA'];
  $startDate1 = $row['startDate'];
  $endDate1 = $row['endDate'];

  }


?>
<?php 
    session_start();
    if (isset($_SESSION["userID"]) == true && $_SESSION["userID"] ==6)
    {
        //echo "Please login before viewing this page.";
        //echo "<meta http-equiv=\"refresh\" content=\"2;url=login.html\">";
        $session = $_SESSION['userID'];
        include './config.php';
           $sql = "SELECT * FROM users WHERE uid='$session'";
           $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                    $row = $result->fetch_assoc();
                    $firstName = $row['fname'];
                    $lastName = $row['lname'];
                    
                    echo "<h10 style='color:whitesmoke'> Welcome $firstName $lastName</h10>";
                
            } else {
            	echo "Please login before viewing this page.";
        		echo "<meta http-equiv=\"refresh\" content=\"2;url=login.html\">";
                //echo "0 results";
            }

    }else {
            	echo "Please login before viewing this page.";
        		echo "<meta http-equiv=\"refresh\" content=\"2;url=login.html\">";
                //echo "0 results";
            }


?>
 <?php
        $session=$_SESSION["userID"];
    ?>


	<?php include './adminNavBar.php'; ?>
	
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="bg-dark border-right border-dark">
        <ul class="sidebar-nav navbar-dark bg-dark">
            <li> <a href="../src/SearchMovie.html"> Search Movies </a> </li>
            <li> <a href="#">Dashboard</a> </li>
            <li> <a href="#">Book Movie</a> </li>
            <li> <a href="#">User Profile</a> </li>
            <li> <a href="#">New Movies</a> </li>
            <li> <a href="#">Upcoming promotions</a> </li>
            <li> <a href="#">Movie Theatres</a> </li>
            <li> <a href="#">Contact</a> </li>
        </ul>
    </div> <!-- /#sidebar-wrapper -->

		
		<header class="text-center pt-3 pb-2 ">

			<div class="container">
				<p class="font-weight-light text-white" align="left"><font size = "5"></font></p>
			</div>
		</header>
				
	<div class="container-fluid">  

		<div class="header">
		<h3>Edit Movie</h3>

		</div>
		<div class = "AddMovieArea">
			<form action = "editMovie.php?id=<?php echo $id; ?>" id = "AddMovie" method = "POST">
				  Movie Name:<br>
				  <input type="text" name="title" value = "<?php echo $title; ?>"><br>
				  
				  Category:<br>
				  <input type="text" name="category" value = "<?php echo $category; ?>"><br>
				  
				  Synopsis:<br>
				  <input type="text" name="synopsis" value = "<?php echo $synopsis; ?>"><br>
				  
				  Cast:<br>
				  <input type="text" name="movieCast" value = "<?php echo $movieCast; ?>"><br>
				  
				  Director:<br>
				  <input type="text" name="director" value = "<?php echo $director; ?>"><br>
				  
				  Producer:<br>
				  <input type="text" name="producer" value = "<?php echo $producer; ?>"><br>
				  
				  Reviews:<br>
				  <input type="text" name="reviews" value = "<?php echo $reviews; ?>"><br>
				  
				  Trailer Picture:<br>
				  <input type="text" name="trailerPic" value = "<?php echo $trailerPic; ?>"><br>
				  
				  Trailer Video:<br>
				  <input type="text" name="trailerVideo" value = "<?php echo $trailerVideo; ?>"><br>
				  
				  MPAA-US Film Rating Code:<br>
				  <input type="text" name="MPAA" value = "<?php echo $MPAA; ?>"><br>
				  
				  Film Start Date:<br>
				  <input type="text" name="startDay" placeholder="2019-11-17" value = "<?php echo $startDate1; ?>"><br>
				  
				  Film End Date:<br>
				 <input type="text" name="endDay" placeholder="2020-11-17" value = "<?php echo $endDate1; ?>"><br>
				 
				  
				<div id="ChangeStatus"> <a><button type="submit" value = "submit">Edit Movie</button></a></div>	
				<div id="DeleteMovie"> <a>DeleteMovie</a> </div>		 
			</form>
		</div>

	  
	</div>
</div>

<script>
    $(function(){
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
/*
        $(window).resize(function(e) {
            if($(window).width()<=768){
                $("#wrapper").removeClass("toggled");
            }else{
                $("#wrapper").addClass("toggled");
            }
        });*/
    });
</script>

