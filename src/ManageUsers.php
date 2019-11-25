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
<div id="page-content-wrapper">
        
	<!-- <div class="container-fluid">-->
		<header class="text-center pt-3 pb-2 ">

			<div class="container">
				<p class="font-weight-light text-white" align="left"><font size = "5">Manage Users</font></p>
			</div>
		</header>
		
 <div class="container-fluid">
  
	<div class="header">
		<h3>Manage Users</h3>
	</div>

		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

		<ul id="ManageList">
		  <li><a href="#">Timmy Turner</a></li>
		  <li><a href="#">Kirtana Nidamarti</a></li>

		  <li><a href="#">Billy Bob</a></li>
		  <li><a href="#">Bob Bobby</a></li>

		  <li><a href="#">Calvin Klein</a></li>
		  <li><a href="#">Obama</a></li>
		  <li><a href="#">Post Malone</a></li>
		</ul>
		
		<div class="right" style="background-color:#aaa;">
			<div id="FirstName"><p>FIRST NAME: Timmy</p></div>
			<div id="LastName"><p>LAST NAME: Turner</p></div>
			<div id="UserID"><p>USER ID#: 03302001</p></div>
			<div id="email"><p>EMAIL: twerp@nickelodeon.org</p></div>
			<div id="Address"><p>ADDRESS: 420 Fairy Rd. Dimmsdale, CA </p></div>
			<div id="Status"><p>STATUS: UNSUSPENDED</p></div>
			
			<div id="ChangeStatus"> <button type="button">SUSPEND!</button> </div>

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