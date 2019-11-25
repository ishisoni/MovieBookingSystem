
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/searchMovie.css">	
	<link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="../css/cardStyle.css">		
</head>
<?php 
    session_start();
    if (isset($_SESSION["userID"]) == true)
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
                echo "0 results";
            }

    }

?>
<?php
       // SESSION VARIABLE

                   $session=$_SESSION["userID"];
    ?>
    <?php 
    include './config.php';

    $queryString = $_SERVER['QUERY_STRING'];

    parse_str($queryString);

    $sql1 = "SELECT * FROM movies WHERE title='$title'";

    $result1 = $conn->query($sql1);

     if ($result1->num_rows > 0) {
      // output data of each row
      $row = $result1->fetch_assoc();
      $movieTrailer = $row['trailerVideo'];

    }
        // output all of the needed rows
    ?>

	<?php include './userNavBar.php'; ?>


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
	<style>
		.movieArea {
		width: 100%;
        margin: 0 auto;
        padding: 20px;
        background: #222;
		}
		.return {
  display: flex;
  align-items: center;
  justify-content: center;
		}
	</style>
	<div class="container">
		<div class="container-fluid">
			<div class="return"><a href = "../src/SearchMovie1.php"><button type="button">Return</button></div>
			<div><iframe class="movieArea" width="420" height="420" src="<?php echo $movieTrailer; ?>"> </div>
			</iframe>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../../Downloads/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../../Downloads/bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../../Downloads/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
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