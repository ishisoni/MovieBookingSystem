<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top border-bottom border-dark"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
		<div class="collapse navbar-collapse" id="navbarsExample02">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"> <a class="nav-link" href="AdminPortal.php">Home <span class="sr-only">(current)</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href=
					<?php 
					if (isset($_SESSION["userID"]) == true) {
						echo "";
					}
					else {
						echo "../src/Registration.html";
					}
					?>
					>Register</a> </li>
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
    			<li class = 'nav-item'> <a class = 'nav-link' href='../src/homepageTemp.php'>Test User HomePage</a> </li>
				<a class="navbar-brand text-light navbar-center"> Movie Booking System </a>
			</ul>
			<ul class="navbar-nav ml-auto">

				<form class="searchForm" >
					<input class="inputBar" type="text" placeholder="Search" name="searchMovies">
					<button class="magGlass" type="submit"><i class="searchIcon fa fa-search"></i></button>
				</form> 
			</ul>
		</div>
	</nav>