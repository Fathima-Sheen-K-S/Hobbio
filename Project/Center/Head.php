<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Hobbio...Follow Your Passion</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="../Assets/Template/User/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../Assets/Template/User/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../Assets/Template/User/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="../Assets/Template/User/css/nice-select.css"/>
	<link rel="stylesheet" href="../Assets/Template/User/css/magnific-popup.css"/>
	<link rel="stylesheet" href="../Assets/Template/User/css/slicknav.min.css"/>
	<link rel="stylesheet" href="../Assets/Template/User/css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="../Assets/Template/User/css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header Section -->
	<header class="header-section">
		<!-- <div class="header-top">
			<div class="row m-0">
				<div class="col-md-6 d-none d-md-block p-0">
					
					<div class="header-info">
						<i class="material-icons">phone</i>
						<p>86061 47681</p>
					</div>
				</div>
				<div class="col-md-6 text-left text-md-right p-0">
					
					<div class="header-info">
						<i class="material-icons">language</i>
						<select id="language" class="language-select">
							<option data-display="Language">EN</option>
							<option data-display="Language" value="1">ES</option>
							<option data-display="Language" value="2">JA</option>
							<option data-display="Language" value="2">AR</option>
						</select>
					</div>
				</div>
			</div>
		</div> -->
		<div class="header-bottom">
			<p class="site-logo">
			<span style="position: absolute;
      top: 50%;
      left: 35%;
      transform: translate(-68%, -28%);
      font-size: 37px;
      font-weight: bold;
      color: white; /* Set text color */
    
	  font-family: 'Playfair Display', serif;
	  ">HOBBIO</span>
    <span style=" display: block;
      font-size: 14px;
      
      color: white;
	  transform: translate(-22%, 180%);
	  font-family: 'Playfair Display', serif;">Follow Your Passion</span>
			</p>
			<!-- <div class="hb-right">
				<div class="hb-switch" id="search-switch">
					<img src="../Assets/Template/User/img/icons/search.png" alt="">
				</div>
				<div class="hb-switch" id="infor-switch">
				<a href="../Logout.php" style="font-family:'Playfair Display',serif; color:white; font-weight: bold;"><i class="fa fa-power-off"></i>LOGOUT</a>
				</div>
			</div> -->
			<div class="container">
				<ul class="main-menu">
					<li><a href="CenterHome.php" class="active" style="font-family:'Playfair Display',serif; ">Home</a></li>
					
					
                    <li><a href="CenterAddCourse.php" style="font-family:'Playfair Display',serif; ">Courses</a></li>
                    <li><a href="BookingDetails.php" style="font-family:'Playfair Display',serif; ">Booking Details</a></li>
                   
					<li style="font-family:'Playfair Display',serif; font-size: 18px;"><a href="CenterHome.php" style="font-family:'Playfair Display',serif; ">Complaints</a>
						<ul class="sub-menu">
							<li style="font-family:'Playfair Display',serif;"><a href="CenterComplaint.php" style='font-size: 18px;'>Post Website Complaints</a></li>
							<li style="font-family:'Playfair Display',serif;"><a href="ViewUserComplaints.php" style='font-size: 18px;'>View User Complaints</a></li>
						</ul>
					</li>
                    <li><a href="CenterFeedback.php" style="font-family:'Playfair Display',serif; ">Feedbacks</a>
					<ul class="sub-menu">
							<li><a href="ViewUserRatings.php" style="font-family:'Playfair Display',serif; ">View Ratings</a></li>
						</ul>
					</li>
					<li style="font-family:'Playfair Display',serif; font-size: 18px;"><a href="CenterHome.php" style="font-family:'Playfair Display',serif; ">Reports</a>
						<ul class="sub-menu">
							<li style="font-family:'Playfair Display',serif;"><a href="CategoryReport.php" style='font-size: 18px;'>Category Report</a></li>
							<li style="font-family:'Playfair Display',serif;"><a href="SubCategoryReport.php" style='font-size: 18px;'>SubCategory Report</a></li>
						</ul>
					</li>
                    <li><a href="CenterMyProfile.php" style="font-family:'Playfair Display',serif; ">Profile</a>
						<ul class="sub-menu">
							<li><a href="CenterEditProfile.php" style="font-family:'Playfair Display',serif; ">Edit Profile</a></li>
							<li><a href="CenterChangePassword.php" style="font-family:'Playfair Display',serif; ">Change Password</a></li>
							<li><a href="../Logout.php" style="font-family:'Playfair Display',serif; "><i class="fa fa-power-off" style="color:orange;"></i>LogOut</a></li>
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
	</header>
	<!-- Header Section end -->

	<!-- Infor Model -->
	<!-- <div class="infor-model-warp">
		<div class="infor-model d-flex align-items-center">
			<div class="infor-close">
				<i class="material-icons">close</i>
			</div>
			<div class="infor-middle">
				<a href="#" class="infor-logo">
					<img src="../Assets/Template/User/img/logo-2.png" alt="">
				</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
				<div class="insta-imgs">
					<div class="insta-item">
						<div class="insta-img">
							<img src="../Assets/Template/User/img/infor/1.jpg" alt="">
							<div class="insta-hover">
								<i class="fa fa-instagram"></i>
								<p>ahana.yoga</p>
							</div>
						</div>
					</div>
					<div class="insta-item">
						<div class="insta-img">
							<img src="../Assets/Template/User/img/infor/2.jpg" alt="">
							<div class="insta-hover">
								<i class="fa fa-instagram"></i>
								<p>ahana.yoga</p>
							</div>
						</div>
					</div>
					<div class="insta-item">
						<div class="insta-img">
							<img src="../Assets/Template/User/img/infor/3.jpg" alt="">
							<div class="insta-hover">
								<i class="fa fa-instagram"></i>
								<p>ahana.yoga</p>
							</div>
						</div>
					</div>
					<div class="insta-item">
						<div class="insta-img">
							<img src="../Assets/Template/User/img/infor/4.jpg" alt="">
							<div class="insta-hover">
								<i class="fa fa-instagram"></i>
								<p>ahana.yoga</p>
							</div>
						</div>
					</div>
					<div class="insta-item">
						<div class="insta-img">
							<img src="../Assets/Template/User/img/infor/5.jpg" alt="">
							<div class="insta-hover">
								<i class="fa fa-instagram"></i>
								<p>ahana.yoga</p>
							</div>
						</div>
					</div>
					<div class="insta-item">
						<div class="insta-img">
							<img src="../Assets/Template/User/img/infor/6.jpg" alt="">
							<div class="insta-hover">
								<i class="fa fa-instagram"></i>
								<p>ahana.yoga</p>
							</div>
						</div>
					</div>
				</div>
				<form class="infor-form">
					<input type="text" placeholder="Your Email">
					<button><img src="../Assets/Template/User/img/icons/send.png" alt=""></button>
				</form>
				<div class="insta-social">
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-facebook"></i></a>
				</div>
			</div>
		</div>
	</div> -->
	<!-- Infor Model end -->
	                                                                              
	<!-- Hero Section -->
	<section class="hero-section" style="min-height: 15px !important; height:100px">
		
		
	
	</section>
	<!-- Hero Section end -->
<div style="min-width: 900px; padding: 100px;";>