<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="../css/cardStyle.css">	
	<link rel="stylesheet" href="../css/styling.css">
</head>
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
		<h3>Add Movie</h3>
		</div>
		<div class = "AddMovieArea">
			<form action = "addMovie.php" id = "AddMovie" method = "POST">
				  Movie Name:<br>
				  <input required type="text" name="title"><br>
				  
				  Category:<br>
				  <input required type="text" name="category"><br>
				  
				  Synopsis:<br>
				  <input required type="text" name="synopsis"><br>
				  
				  Cast:<br>
				  <input required type="text" name="movieCast"><br>
				  
				  Director:<br>
				  <input required type="text" name="director"><br>
				  
				  Producer:<br>
				  <input required type="text" name="producer"><br>
				  
				  Reviews:<br>
				  <input required type="text" name="reviews"><br>
				  
				  Trailer Picture:<br>
				  <input required type="text" name="trailerPic"><br>
				  
				  Trailer Video:<br>
				  <input required type="text" name="trailerVideo"><br>
				  
				  MPAA-US Film Rating Code:<br>
				  <input required type="text" name="MPAA"><br>
				  
				  Film Start Date:<br>
				  <input required type="text" name="startDay" placeholder="2019-11-17"><br>
				  
				  Film End Date:<br>
				 <input required type="text" name="endDay" placeholder="2020-11-17"><br>
				 
				  
				<div id="ChangeStatus"> <button type="submit" value = "submit">Add Movie</button> </div>			 
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
