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
<style>
	.movie{
		max-width: 100% !important;
	}
	.movieLink {
		width: 23% !important;
	}
	.title{
		color: white !important;
	}
</style>
<body>
	<?php include './adminNavBar.php'; ?>
	
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="bg-dark border-right border-dark">
        <ul class="sidebar-nav navbar-dark bg-dark">
            <li> <a href="../.idea/SearchMovie.html"> Search Movies </a> </li>
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
	<div id="movieList">

		<?php
						include './config.php';
							$sql = "SELECT * FROM movies";
							$result = $conn->query($sql);

							

							forEach($result as $entry) {
								$pictureLink = $entry['trailerPic'];
								$movieName = $entry['title'];
								$id = $entry['id'];
								
								?><a href="firstEditMovie.php?id=<?php echo $id; ?>" class="movieLink" ><img class = "movie" src = "<?php echo $pictureLink; ?> "></a>
					<?php
							}
                    ?>

	</div>
	
	</div>
</div>
<!--<script type="text/javascript">
	function addMovies(numMovies){ 
		var i;
		for(i = 0; i < numMovies; i++){
			var nodeA = document.createElement("a");
			var nodeImg = document.createElement("img");
			var par = document.createElement("p");
			par.setAttribute("class","title");
			par.innerHTML = "TITLE";
			nodeImg.setAttribute("src", "http://place-puppy.com/420x696");
			nodeImg.setAttribute("class", "movie");
			nodeA.setAttribute("class","movieLink");
			nodeA.appendChild(nodeImg);
			nodeA.appendChild(par);
			var myDiv = document.getElementById("movieList");

			myDiv.appendChild(nodeA);	
		}
	}
		window.onload = addMovies(10);
</script>-->
</body>
<script>
    $(function(){
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    });
</script>
