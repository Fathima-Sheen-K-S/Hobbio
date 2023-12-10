<!--
<?php
//session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center>
<h1 align="center">Welcome</h1>
<h2 align="center"><?php/* echo $_SESSION['uname']; */?></h2><br /><br />
<a href="UserMyProfile.php">MyProfile</a><br /><br /><br />
<a href="UserEditProfile.php">Edit Profile</a><br /><br /><br />
<a href="UserChangePassword.php">Change Password</a><br /><br /><br />
<a href="SearchCenters.php">Search Centers</a><br /><br /><br />
<a href="UserComplaint.php">Complaints</a><br /><br /><br />
<a href="UserFeedback.php">Sent Feedbacks</a><br /><br /><br />
<a href="ViewFavorites.php">View Favorites</a><br /><br /><br />
</center>
</body>
</html>
-->


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
      left: 50%;
      transform: translate(-76%, -31%);
      font-size: 37px;
      font-weight: bold;
      color: white; /* Set text color */
    
	  font-family: 'Playfair Display', serif;
	  ">HOBBIO</span>
    <span style=" display: block;
      font-size: 14px;
      
      color: white;
	  transform: translate(-21%, 161%);
	  font-family: 'Playfair Display', serif;">Follow Your Passion</span>
			</p>
			
			<div class="container">
				<ul class="main-menu">
					<li><a href="UserHome.php" class="active" style="font-family:'Playfair Display',serif; ">Home</a></li>
					
					
                    <li><a href="SearchCenters.php" style="font-family:'Playfair Display',serif; " >Search Centers</a></li>
					<li><a href="ViewBookings.php" style="font-family:'Playfair Display',serif; ">View Bookings</a></li>
					<li><a href="UserComplaint.php" style="font-family:'Playfair Display',serif; ">Complaints</a></li> 
                    <li><a href="UserFeedback.php" style="font-family:'Playfair Display',serif; ">Feedbacks</a></li>
                    <li><a href="ViewFavorites.php" style="font-family:'Playfair Display',serif; ">Favorites</a></li>
					<li><a href="UserMyProfile.php" style="font-family:'Playfair Display',serif; ">Profile</a>
						<ul class="sub-menu">
							<li><a href="UserEditProfile.php" style="font-family:'Playfair Display',serif; ">Edit Profile</a></li>
							<li><a href="UserChangePassword.php" style="font-family:'Playfair Display',serif; ">Change Password</a></li>
							<li><a href="../Logout.php" style="font-family:'Playfair Display',serif;"><i class="fa fa-power-off" style="color:orange;"></i>LogOut</a></li>
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
	</div>  -->
	<!-- Infor Model end -->
	                                                                              
	<!-- Hero Section -->
	<section class="hero-section" style="min-height: 15px !important; height:100px">
		
		
	
	</section>
	<!-- Hero Section end -->
<div style="min-width: 900px; padding: 100px;";>