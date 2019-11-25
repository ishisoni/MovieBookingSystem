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
    if (isset($_SESSION["userID"]) == false)
    {
        echo "Please login before viewing this page.";
        //echo "<meta http-equiv=\"refresh\" content=\"2;url=login.html\">";
    }
?>
 <?php
       // SESSION VARIABLE
                   $session=$_SESSION["userID"];
    ?>

    <?php
          include './config.php';
           $sql = "SELECT * FROM users WHERE uid='$session'";
           $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                    $row = $result->fetch_assoc();
                    $firstName = $row['fname'];
                    $lastName = $row['lname'];
                    $email = $row['email'];
                    $state = $row['state'];
                    $createDate = $row['createAt'];
                    $isSubscribed = $row['isSubscribed'];
                    
                    //echo "<h10 style='color:whitesmoke'> Welcome $firstName</h10>";
                
            } else {
                echo "0 results";
            }

            $sql2 = "SELECT * FROM creditCards WHERE id='$session'";
           $result = $conn->query($sql2);
            if ($result->num_rows > 0) {
                // output data of each row
                    $row2 = $result->fetch_assoc();
                    $cardNumber1 = $row2['lastFourOne'];
                    $expDate1 = $row2['expDate'];
                    $cardNumber2 = $row2['lastFourTwo'];
                    $expDate2 = $row2['expDate2'];
                    $cardNumber3 = $row2['lastFourThree'];
                    $expDate3 = $row2['expDate3'];
                    
                    //echo "<h10 style='color:whitesmoke'> Welcome $firstName</h10>";
                
            } else {
                echo "0 results";
            }
            $sql3 = "SELECT * FROM addresses WHERE id='$session'";
           $result = $conn->query($sql3);
            if ($result->num_rows > 0) {
                // output data of each row
                    $row3 = $result->fetch_assoc();
                    $street = $row3['street'];
                    $city = $row3['city'];
                    $state2 = $row3['state'];
                    $zip = $row3['zip'];
                    
                    //echo "<h10 style='color:whitesmoke'> Welcome $firstName</h10>";
                
            } else {
                echo "0 results";
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
<div id="page-content-wrapper">
        
	<!-- <div class="container-fluid">-->
		<header class="text-center pt-3 pb-2 ">

			<div class="container">
				<p class="font-weight-light text-white" align="left"><font size = "5">Profile Page</font></p>
			</div>
		</header>
		
	<div class="profileContainer emp-profile"style="margin-bottom:30px;">

			<div class="row">
				<div class="col-md-4">
					<div class="profile-img">
						<img src="https://middle.pngfans.com/20190810/x/profile-icons-png-computer-icons-user-profile-clip-273d4b984777b62e.jpg" alt=""/>
						<div class="file btn btn-lg btn-primary">
							Change Photo
							<input type="file" name="file"/>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="profile-head">
						<h5>
							<?php echo $firstName . " ". $lastName; ?>
						</h5>
						<h6>
							Cinema E-booking System Member
						</h6>
						<p class="joined-date">JOINED : <span><?php echo $createDate ?></span></p>
						<p class="profile-status">ACCOUNT STATUS : <span>Active</span></p>
						<p class="subscription-status">SUBSCRIPTION STATUS : <span>

						<?php 
                            if ($isSubscribed == 1) {
                                echo "Subscribed";
                            }
                            else {
                                echo "Not Subscribed";
                            }

                     ?>
                         
					</span></p>
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<button id="profTab" class="tablinks" onclick="switchTab(event, 'profileTab')">About</button>
							</li>
							<li class="nav-item">
								<button id="addTab" ="tablinks" onclick="switchTab(event, 'addressTab')">Address</button>
							</li>
							<li class="nav-item">
								<button id="ccTab" class="tablinks" onclick="switchTab(event, 'cardTab')">Credit Cards</button>
							</li>
							<li class="nav-item">
								<button id="hisTab" class="tablinks" onclick="switchTab(event, 'historyTab')">Ticket History</button>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-2">
				  <!--  <input type="submit" id="editProfile" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
					<button id="editButton" onclick="edit()">Edit Profile</button>
					<script>
						var editing = false;
						function edit() {
							if(editing){
							 editing=false;
																			
							  if (document.getElementById("confPass").style.display === "none") {
								document.getElementById("confPassLabel").style.display = "block";
								document.getElementById("confPass").style.display = "block";
							  } else {
								document.getElementById("confPassLabel").style.display = "none";
								document.getElementById("confPass").style.display = "none";
							  }
							  document.getElementById("profTab").disabled = false;
							  document.getElementById("addTab").disabled = false;
							  document.getElementById("hisTab").disabled = false;
							  document.getElementById("ccTab").disabled = false;
							  document.getElementById("subscribeToggle").disabled = false;
							  document.getElementById("fuName").disabled = true;
							  document.getElementById("pwd").disabled = true;
							  document.getElementById("confPass").disabled = true;
							  document.getElementById("streetID").disabled = true;
							  document.getElementById("cityID").disabled = true;
							  document.getElementById("stateID").disabled = true;	
							  document.getElementById("zipID").disabled = true;
							  document.getElementById("cardNumID").disabled = true;
							  document.getElementById("expId").disabled = true;	
							  document.getElementById("selectedCard").disabled = false;						  
							  document.getElementById("editButton").innerHTML = "Edit Profile";
							  editing=false;
							
							}else{
													
							  if (document.getElementById("confPass").style.display === "none") {
								document.getElementById("confPassLabel").style.display = "block";
								document.getElementById("confPass").style.display = "block";
							  } else {
								document.getElementById("confPassLabel").style.display = "none";
								document.getElementById("confPass").style.display = "none";
							  }
							  document.getElementById("profTab").disabled = true;
							  document.getElementById("addTab").disabled = true;
							  document.getElementById("hisTab").disabled = true;
							  document.getElementById("ccTab").disabled = true;
							  document.getElementById("subscribeToggle").disabled = false;
							  document.getElementById("fuName").disabled = false;
							  document.getElementById("pwd").disabled = false;
							  document.getElementById("confPass").disabled = false;
							  document.getElementById("streetID").disabled = false;
							  document.getElementById("cityID").disabled = false;
							  document.getElementById("stateID").disabled = false;	
							  document.getElementById("zipID").disabled = false;
							  
							  if(document.getElementById("selectedCard").value == "selecting"){
							  document.getElementById("cardNumID").disabled = true;
							  document.getElementById("expId").disabled = true;	
							  }else{
							  document.getElementById("cardNumID").disabled = false;
							  document.getElementById("expId").disabled = false;	
							  }	
							  document.getElementById("selectedCard").disabled = true;
							  document.getElementById("editButton").innerHTML = "Submit Changes";
							  editing=true;
							}
						}
					</script>

				</div>
			</div>
		<div id="contentTab" class="displayedContent">
			<form action = "profile_edit.php" method = "POST">
			<div id="profileTab" class="tabcontent">
				   <div class="row">
						<div class="col-md-4">
							<div class="profile-work">
								<p>QUICK LINKS</p>
								<a href="">Credit Card</a><br/>
								<a href="">Giftcards/Promotions</a><br/>
								<a href="">Change email</a><br/>
								<a href="">Change password </a><br/>
								<a href="">See previously purchased movies</a><br/>

							</div>
						</div>
						<div class="col-md-8">
							<div class="tab-content profile-tab" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<div class="row">
										<div class="col-md-6">
											<label>Subscribed:</label>
										</div>
										<div class="col-md-6" method = "post">
											<input type="text" value="<?php if ($isSubscribed == 1) {

                                            echo "yes";

                                        }
                                        else {
                                            echo "no";
                                        }
                                        ?>" id="subscribeToggle" name="subscribe" disabled="disabled">
                                         
										</div>
									</div>
									<div class="row">
										<div class="col-md-6" method = "post">
											<label>User Id:</label>
										</div>
										<div class="col-md-6">
											<?php echo $session?>
										</div>
									</div>
									 <div class="row">
                                    <div class="col-md-6" method = "post">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $firstName?>" id="fName" name="firstName" disabled="disabled">
                                    </div>
                                </div>
									 <div class="row">
                                    <div class="col-md-6" method = "post">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $lastName; ?>" id="lName" name="lastName" disabled="disabled">
                                    </div>
                                </div>
									<div class="row">
                                    <div class="col-md-6" method = "post">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo $email?>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Enter current password" name="password" id="pwd" disabled="disabled">
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                        <label id="confPassLabel" style="display:none">New Password</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Enter new password" name="passwordConfirm" id="confPass" disabled = "disabled" style="display:none">
                                    </div>
                                </div>
								</div>
							</div>
						</div>
					</div>
			</div>
			 <button type="submit" class="btn btn-success" id="profileSubmit" style="display:none">Submit</button>
        </form>
        <form action="address_edit.php" method="POST">
			<div id="addressTab" class="tabcontent" style="display:none">
			   <div class="row">
					<div class="col-md-4">
						<div class="profile-work">
							<p>QUICK LINKS</p>
							<a href="">Credit Card</a><br/>
							<a href="">Giftcards/Promotions</a><br/>
							<a href="">Change email</a><br/>
							<a href="">Change password </a><br/>
							<a href="">See previously purchased movies</a><br/>

						</div>
					</div>
					<div class="col-md-8">
						<div class="tab-content profile-tab" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="row">
                                <div class="col-md-6">
                                    <label>Street:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" value="<?php echo $street?>" id="streetID" name="street" disabled="disabled">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>City:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" value="<?php echo $city?>" id="cityID" name="city" disabled="disabled">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Zip Code:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" value="<?php echo $zip?>" id="zipID" name="zip" disabled="disabled">
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-6">
                                    <label>State:</label>
                                </div>
                                <div class="col-md-6">
                                   
                                <input type="text" value="<?php echo $state2?>" id="stateID" name="state" disabled="disabled">
                                </div>
                            </div>  						
							</div>
						</div>
					</div>
				</div>
			</div>	
			<button type="submit" class="btn btn-success" id="addSubmit" style="display:none">Submit2 </button>
        </form>
			
			<div id="cardTab" class="tabcontent" style="display:none">
			   <div class="row">
					<div class="col-md-4">
						<div class="profile-work">
							<p>QUICK LINKS</p>
							<a href="">Credit Card</a><br/>
							<a href="">Giftcards/Promotions</a><br/>
							<a href="">Change email</a><br/>
							<a href="">Change password </a><br/>
							<a href="">See previously purchased movies</a><br/>

						</div>
					</div>
					<div class="col-md-8">
						<div class="tab-content profile-tab" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								 <div class="row">
                                <div class="col-md-12">
                                    <select id="selectedCard" onchange="selectCard()">
                                    <option value="selecting">Select Your Card</option>
                                    <option value="card1">Card 1</option>
                                    <option value="card2">Card 2</option>
                                    <option value="card3">Card 3</option>
                                    </select>
                                </div>
                            </div>

								<div class="row">
									<div class="col-md-6">
										<label>Card Number:</label>
									</div>
									<div class="col-md-6">
										<input type="text" value="" id="cardNumID" name="cardNum" disabled="disabled">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Expiration Date:</label>
									</div>
									<div class="col-md-6">
										<input type="text" value="" id="expId" name="expirationDate" disabled="disabled">
									</div>
								</div>			
							</div>
						</div>
					</div>
				</div>
			</div>	
			 <button type="submit" class="btn btn-success" id="cardSubmit" style="display:none">Submit3 </button>
			</form>
			
			<div id="historyTab" class="tabcontent" style="display:none">
			   <div class="row">
					<div class="col-md-4">
						<div class="profile-work">
							<p>QUICK LINKS</p>
							<a href="">Credit Card</a><br/>
							<a href="">Giftcards/Promotions</a><br/>
							<a href="">Change email</a><br/>
							<a href="">Change password </a><br/>
							<a href="">See previously purchased movies</a><br/>
						</div>
					</div>
					
					<p> You are in the HISTORY tab! </p>
				</div>
			
			</div>
		</div>
	</div>		


	<!-- </div> <!-- container-fluid -->
</div> <!-- page-content-wrapper -->

</div>
	<script>
	function switchTab(e, tabID) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(tabID).style.display = "block";
	  e.currentTarget.className += " active";
	  if(tabID == "historyTab"){
	  	 document.getElementById("profileSubmit").style.display = "none";
        document.getElementById("addSubmit").style.display = "none";
        document.getElementById("cardSubmit").style.display = "none";
	  document.getElementById("editButton").disabled = true;	
	  }else{

	  document.getElementById("editButton").disabled = false;
	  }
	  if(tabID == "cardTab") {
        document.getElementById("profileSubmit").style.display = "none";
        document.getElementById("cardSubmit").style.display = "block";
        document.getElementById("addSubmit").style.display = "none";
      }
      if (tabID == "addressTab") {
        document.getElementById("profileSubmit").style.display = "none";
        document.getElementById("cardSubmit").style.display = "none";
        document.getElementById("addSubmit").style.display = "block";
      }
      if (tabID == "profileTab") {
        document.getElementById("addSubmit").style.display = "none";
        document.getElementById("cardSubmit").style.display = "none";
        document.getElementById("profileSubmit").style.display = "block";
      }
      
	}
	</script>
	
	<script>
    function selectCard() {
      var x = document.getElementById("selectedCard").value;
      if(x == "selecting"){
        document.getElementById("cardNumID").value = "";
        document.getElementById("expId").value = "";
      }
      if(x == "card1"){
        document.getElementById("cardNumID").value = "<?php echo "****-****-****-" . $cardNumber1?>";
        document.getElementById("expId").value = "<?php echo $expDate1?>";
      }
      if(x == "card2"){
        document.getElementById("cardNumID").value = "<?php echo "****-****-****-" . $cardNumber2?>";
        document.getElementById("expId").value = "<?php echo $expDate2?>";
      }
      if(x == "card3"){
        document.getElementById("cardNumID").value = "<?php echo "****-****-****-" . $cardNumber3?>";
        document.getElementById("expId").value = "<?php echo $expDate3?>";
      }
    }
    </script>
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
