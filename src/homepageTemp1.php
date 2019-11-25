<html>
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
<link rel="stylesheet" href="../css/carousel.css">



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




<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top border-bottom border-dark"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
<div class="collapse navbar-collapse" id="navbarsExample02">
<ul class="navbar-nav mr-auto">
<li class="nav-item active"> <a class="nav-link" href="homepageTemp.php">Home <span class="sr-only">(current)</span></a> </li>
<li class="nav-item"> <a class="nav-link" href="../src/Registration.html">Register</a> </li>
<?php
    if (isset($_SESSION["userID"]) == true) {
        $linkAddr = "../src/logout.php";
        $linkAddr2 = "../src/Login.html";
        
        ?><li class = 'nav-item'> <a class = 'nav-link' href='../src/logout.php'>Log Out</a> </li>
<?php
    } else {
        ?>
<li class = 'nav-item'> <a class = 'nav-link' href='../src/Login.html'>Login</a> </li>
<?php
    }
    ?>

<a class="navbar-brand text-light navbar-center"> Movie Booking System </a>
</ul>
<ul class="navbar-nav ml-auto">

<form action = "../src/SearchMovie1.php" class="searchForm" method = "POST">
<input class="inputBar" type="text" placeholder="Search" name="searchMovies">
<button class="magGlass" type="submit"><i class="searchIcon fa fa-search"></i></button>
</form>
</ul>
</div>
</nav>


<div id="wrapper">
<!-- Sidebar -->
<div id="sidebar-wrapper" class="bg-dark border-right border-dark">
<ul class="sidebar-nav navbar-dark bg-dark">
<li> <a href="../src/SearchMovie.html"> Search Movies </a> </li>
<li> <a href="#">Dashboard</a> </li>
<li> <a href="#">Book Movie</a> </li>
<li> <a href="../src/profiletemp.php">User Profile</a> </li>
<li> <a href="#">New Movies</a> </li>
<li> <a href="#">Upcoming promotions</a> </li>
<li> <a href="#">Movie Theatres</a> </li>
<li> <a href="#">Contact</a> </li>
</ul>
</div> <!-- /#sidebar-wrapper -->
<!-- Page Content -->
<div id="page-content-wrapper">

<div class="container-fluid">

<header class="text-center pt-3 pb-2 ">

<div class="container">
<p class="font-weight-light text-white" align="center"><font size = "5">Homepage</font></p>
<p class="font-weight-light text-white" align="left"><font size = "5">Now Playing</font></p>
</div>
</header>

<!-- Page Content -->
<div class="top-content">
<div class="container-fluid">
<div id="carousel" class="carousel slide" data-ride="carousel">
<div class="carousel-inner row w-100 mx-auto" role="listbox">
<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active" id="slide1">
<div class="item">
<div class="movie-Poster">
<img src="https://amc-theatres-res.cloudinary.com/image/upload/f_auto,fl_lossy,h_465,q_auto,w_310/v1571433255/amc-cdn/production/2/movies/59000/59009/PosterDynamic/94016.jpg" class="img-responsive" alt="a" />
</div>
<div class="slide-info">
<div class="slide-detail">
<div class="product-detail-1">
<h5 class="movieName">Arctic Dogs</h5>

</div>
</div>
<div class="product-detail-2">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 review">
<i class="fa fa-star" aria-hidden="true"></i>
<i class="fa fa-star" aria-hidden="true"></i>
<i class="fa fa-star" aria-hidden="true"></i>
<i class="fas fa-star-half-alt" aria-hidden="true"></i>
<i class="far fa-star" aria-hidden="true"></i>
</div>
</div>
<a href="#" class="AddCart btn btn-block btn-dark"><i class="ticketPic fas fa-ticket-alt" aria-hidden="true"></i>&nbsp Book Ticket</a>
</div>
</div>
</div>
</div>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "cinemaDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM movies";
    $result = $conn->query($sql);
    
    
    
    forEach($result as $entry) {
        $pictureLink = $entry['trailerPic'];
        $movieName = $entry['title'];
        
        ?><div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
<div class="item">
<div class="movie-Poster">
<img src= "<?php echo $pictureLink; ?> "  class="img-responsive" alt="a" />
</div>
<div class="slide-info">
<div class="slide-detail">
<div class="product-detail-1">
<h5 class="movieName"><?php echo $movieName; ?></h5>

</div>
</div>
<div class="product-detail-2">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 review">
<i class="fa fa-star" aria-hidden="true"></i>
<i class="fa fa-star" aria-hidden="true"></i>
<i class="fa fa-star" aria-hidden="true"></i>
<i class="fas fa-star-half-alt" aria-hidden="true"></i>
<i class="far fa-star" aria-hidden="true"></i>
</div>
</div>
<a href="#" class="AddCart btn btn-block btn-dark"><i class="ticketPic fas fa-ticket-alt" aria-hidden="true"></i>&nbsp View Movie</a>
</div>
</div>
</div>
</div>
<?php
    }
    ?>


</div>


<a class="carousel-control-prev" href="#carousel" role="button" id="prev" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel" role="button" id = "next" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>





</div>
</div>
<br>
<!-- /.container -->

</div>
</div> <!-- /#page-content-wrapper -->
</div> <!-- /#wrapper -->
<!-- Bootstrap core JavaScript -->
<!-- Menu Toggle Script -->
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
<script>
$('#carousel').on('slide.bs.carousel', function (e) {
                  var $e = $(e.relatedTarget);
                  var index = $e.index();
                  var numItems = 5;
                  var totalItems = $('.carousel-item').length;
                  var sub = 1;
                  
                  if (index >= totalItems-(numItems-sub)) {
                  var vt = numItems - (totalItems - index);
                  for (var i=0; i<vt; i++) {
                  if (e.direction=="left") {
                  $('.carousel-item').eq(i).appendTo('.carousel-inner');
                  }
                  else {
                  $('.carousel-item').eq(0).appendTo('.carousel-inner');
                  }
                  }
                  }
                  });
</script>


</html>

