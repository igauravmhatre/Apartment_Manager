<!DOCTYPE HTML>
<html>
<head>
<title>Apartment Manager</title>
<link href="../css/bootstrap.css" rel = 'stylesheet' type='text/css' />
<link href="../css/font-awesome.css" rel ='stylesheet' type='text/css' />
<link rel="stylesheet" href = "../css/lightbox.css">
<link href="../css/style.css" rel = 'stylesheet' type='text/css' />

<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="../js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> 
</head>
<body>
<!-- header -->
<div class="banner banner2 admin-panel">
	 <div class="container">
		 <div class="banner_head_top">
			 <div class="banner-head">
				 <div class="logo">
					 <h1><a href="index.php"><span>Admin Panel</span></a></h1>
				 </div>
					<div class="headr-right">
						<div class="details">
							<?php if($_SESSION) {
								$id = $_SESSION['usr_id'];
								$query = "SELECT * FROM admin WHERE id=$id";
								$fire = mysqli_query($con,$query) or die("Cannot fetch the data".mysqli_error($con));
								$row = mysqli_fetch_assoc($fire);
								?>
								<p align="center" class="navbar-text">Welcome, <?php echo $row['name']; 
								}?></p>
						</div>
					</div>
				 <div class="clearfix"></div>
			 </div>
			 <div class="top-menu">	 
			 <div class="content white">
				 <nav class="navbar navbar-default">
					 <div class="navbar-header">
						 <button type="button" class="menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="icon-bar">MENU</span>							
						</button>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>							
						</button>				
					 </div>
					 <!--/navbar header-->		
					 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						 <ul class="nav navbar-nav">
							<!-- <li class=""><a href="index.php">Home</a></li> -->
							 <!-- <li><a href="about.html">About</a></li> -->
							 <li class="dropdown">
								<a href="#" class="scroll dropdown-toggle" data-toggle="dropdown">Admin Panel<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Broadcast message</a></li>
									<li><a href="add_notice.php">Check Notifications</a></li>
									<li><a href="#">Manage Events</a></li>
								</ul>
							 </li>	
							 <?php if($_SESSION){
								 ?>		
							 <li class"dropdown">
							 	<a href="#" class="scroll dropdown-toggle" data-toggle="dropdown">Manage Tenants<b class="caret"></b></a>
								 <ul class="dropdown-menu">
							 		<li><a href="add_tenants.php">Add Tenants</a></li>
									 <li><a href="remove_tenants.php">Remove Tenants</a></li>
								 </ul>
							</li>

							<?php
							}
						?>
							 	
									
							<li class="dropdown">
							<?php if (isset($_SESSION['usr_id'])) { ?>
								<li><a href="logout.php"><img src="../images/logout.png" height="25px"; width="25px">Logout</a></li>
							
									
							 		
									 
								
									<?php } else { ?>
								<li class="nav-link"><a href="login.php" style="font-size:18px;"><img src="../images/signin.png" height="25px" width="25px">&nbsp Login</a>
								</li>
							<!-- <li><a href="register.php">Sign Up</a></li> -->
							<?php } ?></li>
						 </ul>
						</div>
					  <!--/navbar collapse-->
				 </nav>
				  <!--/navbar-->
			 </div>
				 <div class="clearfix"></div>
				<script type="text/javascript" src="../js/bootstrap-3.1.1.min.js"></script>
			  </div>
		  </div>