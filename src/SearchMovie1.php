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

    $searchQuery = $_POST['searchMovies'];
    $sql1 = "SELECT * FROM movies WHERE title='$searchQuery'";
    $sql2 = "SELECT * FROM movies WHERE category='$searchQuery'";

    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);

     if ($result1->num_rows > 0) {
      // output data of each row
        $titleResults = $result1;
        $isTitle =1;
        // output all of the needed rows

    } else if ($result2 ->num_rows > 0) {
        $categoryResults =$result2;
        $isCategory = 1;
    } 

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
	
                                                <style>
                                                    .button {
                                                        background-color: #1c87c9;
                                                        border: none;
                                                        color: white;
                                                        padding: 5px 5px;
                                                        text-align: center;
                                                        text-decoration: none;
                                                        display: inline-block;
                                                        font-size: 20px;
                                                        margin: 2px 1px;
                                                        cursor: pointer;
                                                    }
													.info {
													margin-left: 25px;
													}
													
                                                </style>	
	
	<div id="page-content-wrapper">
        
	<!-- <div class="container-fluid">-->
		<header class="text-center pt-3 pb-2 ">

			<div class="container">
				<p class="font-weight-light text-white" align="left"><font size = "5"></font></p>
			</div>
		</header>
<div class="container">
    <div class="row">
        <!-- BEGIN SEARCH RESULT -->
        <div class="col-md-12">
            <div class="grid search">
                <div class="grid-body">
                        <!-- BEGIN RESULT -->
                        <div class="col-md-12">
                            <h2><i class="fa fa-file-o"></i> Search Movies</h2>
                            <hr>
                            <!-- BEGIN SEARCH INPUT -->
                            <form action = "../src/SearchMovie1.php" method = "POST">
                            <div class="input-group">
                                
                                <input type="text" class="form-control" name="searchMovies" value="<?php echo $searchQuery; ?>">
                                <span class="input-group-btn">
								<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                              
							</span>
                            </div>
                              </form> 
                            <!-- END SEARCH INPUT -->
                            <p>Showing all results matching "<?php echo $searchQuery;?>"</p>

                            <div class="padding"></div>

                            <!-- BEGIN TABLE RESULT -->
                            
                            <div class="movieResults">
                                 <?php 

                               include './config.php';
                                if ($isTitle == 1) {
                                    forEach($titleResults as $entry) {
                                $pictureLink = $entry['trailerPic'];
                                $category = $entry['category'];
                                $movieName = $entry['title'];
                                $synopsis = $entry['synopsis'];
                                $movieCast = $entry['movieCast'];
                                $director = $entry['director'];
                                $producer = $entry['producer'];
                                $reviews = $entry['reviews'];
                                $trailerLink = $entry['trailerVideo'];
                                $startDate = $entry['startDate'];
                                $endDate = $entry['endDate'];
                                $MPAA = $entry['MPAA'];
                                $movieID = $entry['id'];
                                echo $movieName;

                
                                    ?>
								<div class="row">
									<div class="col-md-3">
										<span class="moviePoster"><img src="<?php echo $pictureLink; ?>" alt="" height="350" width="200"></span>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-6"> <!--MOVIE DESCRIPTION -->
												<p><strong><?php echo $movieName; ?> </strong><br><?php echo $synopsis; ?></p>
												<div class="row">
												<span><strong> Category:</strong> <p class="info"><?php echo $category;?></p></span> &nbsp &nbsp &nbsp &nbsp &nbsp
												<span><strong> Reviews:</strong> <p class="info"><?php echo $reviews; ?></p></span> &nbsp &nbsp &nbsp &nbsp &nbsp
												<span><strong> Rating:</strong> <p class="info"><strong><?php echo $MPAA; ?></strong></p></span> &nbsp &nbsp &nbsp &nbsp &nbsp
												<span><strong> View Trailer:&nbsp &nbsp &nbsp</strong><a href="movieInfo.php?title=<?php echo $movieName; ?>" class="movieLink" ><button class="btn btn-primary" type="button"><i class="fas fa-video"></i></button></a>
											</div>
											</div>
											<div class="col-md-2">
												<li><strong> Movie Cast:</strong> <p class="info"><?php echo $movieCast; ?></p></li>
												<li><strong> Director:</strong> <p class="info"><?php echo $director; ?></p> </li>
												<li><strong> Producer:</strong> <p class="info"><?php echo $producer; ?></p> </li>
											</div>
											<div class="col-md-2">
												<span><strong> Start Date:</strong> <p><?php echo $startDate; ?></p></span>
												<span><strong> End Date:</strong> <p><?php echo $endDate; ?></p></span>
                                                <?php 

                                                $sql5 = "SELECT * FROM shows WHERE movieID = '$movieID'";
                                                $result = $conn->query($sql5);

                                                forEach($result as $entry) {
                                                    $timing = $entry['timeOfMovie'];
                                                    //echo "timing: ". $timing;

                                                    if ($timing == "10:00") {
                                                        ?>
                                                        <input type="radio" name="time" value="10:00AM"> 10:00AM<br>
                                                        <?php
                                                    }
                                                    if ($timing == "12:00") {
                                                        ?>
                                                        <input type="radio" name="time" value="12:00PM"> 12:00PM<br>
                                                        <?php 
                                                    }
                                                    if ($timing == "2:00") {
                                                        ?>
                                                        <input type="radio" name="time" value="2:00PM"> 2:00PM<br>
                                                        <?php
                                                    }
                                                    if($timing == "4:00") {
                                                        ?> 
                                                        <input type="radio" name="time" value="2:00PM"> 4:00PM<br>
                                                        <?php
                                                    }
                                                }

                                                ?>
												
												
												
											

											</div>

											<div class="col-md-2">
                                                <?php 

                                                 $date1 = "2019-11-20"; 
                                                  if ($date1 > $startDate) {
                                                    ?>
												<a href="../src/SeatSelection.html" class="button">Buy Tickets</a>
                                                 <?php 
                                                }
                                                ?>
											</div>
										</div>
									</div>	
								</div>
                            </div>
                            <?php 

                        }//forEach
                    } else if($isCategory == 1) {
                        forEach($categoryResults as $entry) {
                                $pictureLink = $entry['trailerPic'];
                                $category = $entry['category'];
                                $movieName = $entry['title'];
                                $synopsis = $entry['synopsis'];
                                $movieCast = $entry['movieCast'];
                                $director = $entry['director'];
                                $producer = $entry['producer'];
                                $reviews = $entry['reviews'];
                                $trailerLink = $entry['trailerVideo'];
                                $startDate = $entry['startDate'];
                                $endDate = $entry['endDate'];
                                $MPAA = $entry['MPAA'];
                                $movieID = $entry['id'];
                
                                    ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span class="moviePoster"><img src="<?php echo $pictureLink; ?>" alt="" height="350" width="200"></span>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6"> <!--MOVIE DESCRIPTION -->
                                                <p><strong><?php echo $movieName; ?> </strong><br><?php echo $synopsis; ?></p>
                                                <div class="row">
                                                <span><strong> Category:</strong> <p class="info"><?php echo $category;?></p></span> &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <span><strong> Reviews:</strong> <p class="info"><?php echo $reviews; ?></p></span> &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <span><strong> Rating:</strong> <p class="info"><strong><?php echo $MPAA; ?></strong></p></span> &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <span><strong> View Trailer:&nbsp &nbsp &nbsp</strong><a href="movieInfo.php?title=<?php echo $movieName; ?>" class="movieLink" ><button class="btn btn-primary" type="button"><i class="fas fa-video"></i></button></a>
                                            </div>
                                            </div>
                                            <div class="col-md-2">
                                                <li><strong> Movie Cast:</strong> <p class="info"><?php echo $movieCast; ?></p></li>
                                                <li><strong> Director:</strong> <p class="info"><?php echo $director; ?></p> </li>
                                                <li><strong> Producer:</strong> <p class="info"><?php echo $producer; ?></p> </li>
                                            </div>
                                            <div class="col-md-2">
                                                <span><strong> Start Date:</strong> <p><?php echo $startDate; ?></p></span>
                                                <span><strong> End Date:</strong> <p><?php echo $endDate; ?></p></span>
                                                 <?php 

                                                $sql5 = "SELECT * FROM shows WHERE movieID = '$movieID'";
                                                $result = $conn->query($sql5);

                                                forEach($result as $entry) {
                                                    $timing = $entry['timeOfMovie'];
                                                    //echo "timing: ". $timing;

                                                    if ($timing == "10:00") {
                                                        ?>
                                                        <input type="radio" name="time" value="10:00AM"> 10:00AM<br>
                                                        <?php
                                                    }
                                                    if ($timing == "12:00") {
                                                        ?>
                                                        <input type="radio" name="time" value="12:00PM"> 12:00PM<br>
                                                        <?php 
                                                    }
                                                    if ($timing == "2:00") {
                                                        ?>
                                                        <input type="radio" name="time" value="2:00PM"> 2:00PM<br>
                                                        <?php
                                                    }
                                                    if($timing == "4:00") {
                                                        ?> 
                                                        <input type="radio" name="time" value="2:00PM"> 4:00PM<br>
                                                        <?php
                                                    }
                                                }

                                                ?>
                                            </div>
                                            <div class="col-md-2">
                                             <?php 

                                                 $date1 = "2019-11-20"; 
                                                  if ($date1 > $startDate) {
                                                    ?>
                                                <a href="../src/SeatSelection.html" class="button">Buy Tickets</a>
                                                 <?php 
                                                }
                                                ?>
                                            </div>

                                        </div>
                                        
                                    </div>  

                                </div>
                                <hr>
                                <?php 
                                             }

                                     }
                                     else {
                                        echo "0 results found for query.";
                                     }

                                ?>
                            </div>
                           

                            <!-- END TABLE RESULT -->
                        </div>
                        <!-- END RESULT -->

                    </div>

                </div>
            </div>
        </div>
		
<script>
    $(function(){
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    });

</script>