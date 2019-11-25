<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/styling.css">
	<link rel="stylesheet" href="../css/navigation.css">	
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
<div id="page-content-wrapper">
	<header class="text-center pt-3 pb-2 ">

		<div class="container">
			<p class="font-weight-light text-white" align="left"><font size = "5">Administration Portal</font></p>
		</div>
	</header>
	
  <div class="container-fluid">
		<div class="tableContainer">
			<table class="adminTable" align="center">
				<tr>
					<td>
						<div>
							  <a href="../src/movieList.php"><img src="https://image.flaticon.com/icons/png/512/92/92365.png" alt="" width="200" height="200"></a>
						</div>
						<hr>
					</td>
					<td>
						<div>
							<a href="../src/ManageMovie.php"> <img src="http://images.clipartpanda.com/light-clip-art-0511-0904-0419-5866_Stage_Lights_clipart_image.jpg" alt="" width="200" height="200"></a>
						</div>
					</td>
					<td>
						<div>
							  <a href="../src/ManageUsers.php"><img src="http://inspiredboy.com/uploads/201704/full/red-cinema-hall-vector-material-1-65614f2955f6048852ecd84e8acc2957.jpg" alt="" width="200" height="200"></a>
						</div>
					</td>
					<td>
						<div>
							  <a href="../src/ManagePromotions.html"><img src="https://cdn3.iconfinder.com/data/icons/discount-and-promotion/500/prices-512.png" alt="" width="200" height="200"></a>
						</div>
					</td>
				</tr>
				
				
			</table>
		</div>
	</div>


		</div> <!--page-content-wrapper-->
</div> <!--wrapper-->




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
