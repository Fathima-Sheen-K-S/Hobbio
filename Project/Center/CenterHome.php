<?php
//session_start();
?>

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center><font size="6" face="Times New Roman, Times, serif" >WELCOME <br /><?php // echo $_SESSION['cname']?></font><br /><br /><br /><br />
<a href="CenterMyProfile.php">My Profile</a><br /><br />
<a href="CenterAddCourse.php">Add Courses</a><br /><br />
<a href="CenterEditProfile.php">Edit Profile</a><br /><br />
<a href="CenterChangePassword.php">Change Password</a><br /><br />
<a href="BookingDetails.php">Booking Details</a><br /><br />
<a href="CenterComplaint.php">Complaints</a><br /><br />
<a href="CenterFeedback.php">Send Feedbacks</a><br />
</center>

</body>
</html>
-->

<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
$centerid=$_SESSION['cid'];
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
				</div> -->
				<!-- <div class="hb-switch" id="infor-switch">
				
				</div> -->
			<!-- </div> -->
			<div class="container">
				<ul class="main-menu">
					<li><a href="CenterHome.php" class="active" style="font-family:'Playfair Display',serif; ">Home</a></li>
					
					
                    <li><a href="CenterAddCourse.php" style="font-family:'Playfair Display',serif; " >Courses</a></li>
                    <li><a href="BookingDetails.php" style="font-family:'Playfair Display',serif; ">Booking Details</a></li>
                   
					<!-- <li><a href="CenterComplaint.php" style="font-family:'Playfair Display',serif; ">Complaints</a></li> -->
                    <li style="font-family:'Playfair Display',serif; font-size: 18px;"><a href="CenterHome.php" style="font-family:'Playfair Display',serif; ">Complaints</a>
						<ul class="sub-menu">
							<li style="font-family:'Playfair Display',serif;"><a href="CenterComplaint.php" style='font-size: 18px;'>Post Website Complaints</a></li>
							<li style="font-family:'Playfair Display',serif;"><a href="ViewUserComplaints.php" style='font-size: 18px;'>View User Complaints</a></li>
						</ul>
					</li>
					<li><a href="CenterFeedback.php" style="font-family:'Playfair Display',serif; ">Feedbacks</a>
					<ul class="sub-menu">
							<li><a href="ViewUserRatings.php" style="font-family:'Playfair Display',serif; ">View Ratings</a></li>
						</ul></li>
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
					<?php
					$sel="select count(*) as booking_count from tbl_booking b inner join tbl_package p 
					on p.package_id=b.package_id inner join tbl_course c on c.course_id=p.course_id
					inner join tbl_center ce on ce.center_id=c.center_id where ce.center_id=".$centerid." and 
					b.booking_status=1";
					$res = $con->query($sel);
					$row = $res->fetch_assoc();
					$notificationCount = $row['booking_count'];
					?>
					<a href="bookingdetails.php" id="notification-link">
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" style="color: white;" class="bi bi-bell-fill" viewBox="0 0 16 16">
        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
    </svg>
    <span id="notification-count" style="color: white;"><?php echo $notificationCount; ?></span>
</a>
                    
					
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
	<section class="hero-section" style="    max-height: 937px !important;
	    min-height: 836px !important;">
		<div class="hero-social-warp">
			<div class="hero-social">
				<a href="https://www.facebook.com/fathima.sheen.7?mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a>
				<a href="https://instagram.com/melting_strell_?igshid=YTQwZjQ0NmI0OA=="><i class="fa fa-instagram"></i></a>
				
				<a href="https://www.linkedin.com/in/fathima-sheen-k-s-541a20291?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fa fa-linkedin"></i></a>
			</div>
		</div>
		<div class="arrow-buttom">
			<img src="../Assets/Template/User/img/icons/arrows-buttom.png" alt="">
		</div>
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="hs-style-1 text-center">
					<img src="../Assets/Template/User/img/hero-slider/bg3.png" alt="" style="margin: -20px;
					margin-left: -50px;">
				</div>
			</div>
			<div class="hs-item">
				<div class="hs-style-1 text-center">
					<img src="../Assets/Template/User/img/hero-slider/f1.png" alt="" style="margin: -20px;
					margin-left: -50px;">
				</div>
			</div>
			<div class="hs-item">
				<div class="hs-style-1 text-center">
					<img src="../Assets/Template/User/img/hero-slider/f6.png" alt="" style="margin: -20px;
					margin-left: -50px;">
				</div>
			</div>
			
			
			
			 
		</div>
	</section>
	<!-- Hero Section end -->

	<!-- About Section -->
	<section class="about-section spad">
		<div class="container">
			<div class="section-title text-center">
			<img src="../Assets/Template/User/img/HobbioLogo (2).png" style="max-width: 300px;">
				<h2>Welcome to Hobbio</h2>
				<p>Follow Your Passion... Take Care Of Your Soul And Enjoy Life More Fully!</p>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="about-img">
						 <!-- <img src="../Assets/Template/User/img/HobbioLogo (2).png" alt=""
						 style="padding-right: 200px;
    padding-bottom: 196px;
    padding-top: 150px;
    max-width: 715px !important;">  -->
	
	<i class="fa fa-child"
	style="font-size: 30em; /* Adjust the size as needed */
            background: linear-gradient(45deg, #f65d5d, #fdb07d); /* Gradient colors */
            -webkit-background-clip: text;
            color: transparent;
            display: inline-block;
            margin: 59px; /* Adjust the margin for positioning */"></i>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-item">
						<div class="ai-icon">
							<img src="../Assets/Template/User/img/icons/about-1.png" alt="">
						</div>
						<div class="ai-text">
							<h4>Stress Relief</h4>
							<p>Hobbies serve as a valuable outlet for stress relief. Engaging in activities you enjoy can help reduce stress, elevate your mood, and provide a mental break from daily responsibilities. Whether it's singing, dancing, or martial arts, hobbies offer a therapeutic escape.</p>
						</div>
					</div>
					<div class="about-item">
						<div class="ai-icon">
							<img src="../Assets/Template/User/img/icons/about-2.png" alt="">
						</div>
						<div class="ai-text">
							<h4>Skill Development</h4>
							<p>Hobbies offer an opportunity for skill development and personal growth. Whether you're learning a new martial arts, honing your singing skills, or mastering swimming, hobbies enable you to acquire new talents and knowledge. This can boost self-esteem and open up new avenues for creativity.</p>
						</div>
					</div>
					<div class="about-item">
						<div class="ai-icon">
							<img src="../Assets/Template/User/img/icons/about-3.png" alt="">
						</div>
						<div class="ai-text">
							<h4>Social Connection</h4>
							<p>Many hobbies are social in nature, fostering connections with like-minded individuals. Participating in group activities such as team sports, book clubs, or volunteering can lead to meaningful friendships and a sense of belonging. Hobbies can also strengthen existing relationships by providing shared interests.</p>
						</div>
					</div>
					<!-- <a href="" class="site-btn sb-gradient mt-5">explore more</a> -->
				</div>
			</div>
		</div>
	</section>
	<!-- About Section end -->

	<!-- Classes Section -->
	<!-- <section class="classes-section spad">
	
		<div class="container">
			<div class="section-title text-center">
			<i class="fa fa-child"
	style="font-size: 5em; /* Adjust the size as needed */
            background: linear-gradient(45deg, #f65d5d, #fdb07d); /* Gradient colors */
            -webkit-background-clip: text;
            color: transparent;
            display: inline-block;
            margin: -45px; /* Adjust the margin for positioning */"></i>
				<h2>Various Centers</h2>
				<p>Follow Your Passion and Be Happy...</p>
			</div>
			

			<div class="classes-slider owl-carousel">
			<?php
			$sel="select *from tbl_center";
			$res=$con->query($sel);
			while($row=$res->fetch_assoc()){
			?>
				<div class="classes-item">
					<div class="ci-img">
						<img src="Assets/File/Center/<?php echo $row['center_logo'];?>" alt="">
					</div>
					<div class="ci-text">
						<h4><a href="classes-details.html"><?php echo $row['center_name'];?></a></h4>
						
						<p><?php echo $row['center_contact']?><br><?php echo $row['center_email']; ?></p>
					</div>
					<div class="ci-bottom">
						<div class="ci-author">
							<img src="Assets/File/Center/<?php echo $row['center_logo'];?>" alt="">
							<div class="author-text">
								<h6><?php echo $row['center_name'];?></h6>
								<p><?php echo $row['center_type'];?></p>
							</div>
						</div>
						<a href="#" class="site-btn sb-gradient">View</a>
					</div>
				</div>
				<?php
			}
			?>
				
			</div>


		</div>
		
	</section>  -->
	<!-- Classes Section end -->

	<!-- Trainer Section -->
	<!-- <section class="trainer-section overflow-hidden spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="../Assets/Template/User/img/icons/logo-icon.png" alt="">
				<h2>Our Trainer Yoga</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			<div class="trainer-slider owl-carousel">
				<div class="ts-item">
					<div class="trainer-item">
						<div class="ti-img">
							<img src="../Assets/Template/User/img/trainer/1.png" alt="">
						</div>
						<div class="ti-text">
							<h4>Lori Kennedy</h4>
							<h6>Yoga Trainer</h6>
							<p>Yoga & Therapy Certificate of Uttarakhand University Sanskrit</p>
							<div class="ti-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="ts-item">
					<div class="trainer-item">
						<div class="ti-img">
							<img src="../Assets/Template/User/img/trainer/2.png" alt="">
						</div>
						<div class="ti-text">
							<h4>Lori Kennedy</h4>
							<h6>Yoga Trainer</h6>
							<p>Yoga & Therapy Certificate of Uttarakhand University Sanskrit</p>
							<div class="ti-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="ts-item">
					<div class="trainer-item">
						<div class="ti-img">
							<img src="../Assets/Template/User/img/trainer/3.png" alt="">
						</div>
						<div class="ti-text">
							<h4>Rebecca James</h4>
							<h6>Yoga Trainer</h6>
							<p>Yoga & Therapy Certificate of Uttarakhand University Sanskrit</p>
							<div class="ti-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- Trainer Section end -->

	<!-- Review Section -->
	<section class="review-section spad set-bg" data-setbg="img/review-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 m-auto">
					<div class="review-slider owl-carousel">
						<div class="review-item">
							<div class="ri-img">
								<img src="../Assets/Template/User/img/classes/author/pic1.jpg" alt="">
							</div>
							<div class="ri-text text-white">
								<p>"We should make some time in between and organize our life, relax ourselves and spend more time with our family, friends, and pursue our own hobbies."</p>
								<h4>Robert Gallagher</h4>
								<h6>Engineer</h6>
							</div>
						</div>
						<div class="review-item">
							<div class="ri-img">
								<img src="../Assets/Template/User/img/classes/author/pic2.jpg" alt="">
							</div>
							<div class="ri-text text-white">
								<p>"Hobbies are apt to run away with us, you know; it doesn’t do to be run away with. We must keep the reins."</p>
								<h4>George Eliot</h4>
								<h6>Novelist</h6>
							</div>
						</div>
						<div class="review-item">
							<div class="ri-img">
								<img src="../Assets/Template/User/img/classes/author/pic3.jpg" alt="">
							</div>
							<div class="ri-text text-white">
								<p>"A hobby is a happy medium between a passion and a monomania."</p>
								<h4>Honoré de Balzac</h4>
								<h6>Novelist</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Review Section end -->

	<!-- Event Section -->
	<!-- <section class="event-section spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="../Assets/Template/User/img/icons/logo-icon.png" alt="">
				<h2>Upcoming Events</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			<div class="row">
				<div class="col-xl-6">
					<div class="event-video">
						<img src="../Assets/Template/User/img/video.jpg" alt="">
						<a href="https://www.youtube.com/watch?v=vgv-hzTl5FA" class="video-popup"><img src="img/icons/play.png" alt=""></a>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="event-item">
						<div class="ei-img">
							<img src="../Assets/Template/User/img/event/1.jpg" alt="">
						</div>
						<div class="ei-text">
							<h4><a href="#">Lole White Yoga Tour</a></h4>
							<ul>
								<li><i class="material-icons">person</i>Kelly Alexander</li>
								<li><i class="material-icons">event_available</i>15 January, 2019</li>
								<li><i class="material-icons">map</i>184 Main Collins Street</li>
							</ul>
						</div>
					</div>
					<div class="event-item">
						<div class="ei-img">
							<img src="../Assets/Template/User/img/event/2.jpg" alt="">
						</div>
						<div class="ei-text">
							<h4>Free Yoga Madrid</h4>
							<ul>
								<li><i class="material-icons">person</i>Kelly Alexander</li>
								<li><i class="material-icons">event_available</i>15 January, 2019</li>
								<li><i class="material-icons">map</i>184 Main Collins Street</li>
							</ul>
						</div>
					</div>
					<div class="event-item">
						<div class="ei-img">
							<img src="../Assets/Template/User/img/event/3.jpg" alt="">
						</div>
						<div class="ei-text">
							<h4>One Love Dallas</h4>
							<ul>
								<li><i class="material-icons">person</i>Kelly Alexander</li>
								<li><i class="material-icons">event_available</i>15 January, 2019</li>
								<li><i class="material-icons">map</i>184 Main Collins Street</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- Event Section end -->


	<!-- Pricing Section -->
	<!-- <section class="pricing-section spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="../Assets/Template/User/img/icons/logo-icon.png" alt="">
				<h2>Pricing plans</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="pricing-item begginer">
						<div class="pi-top">
							<h4>Begginer</h4>
						</div>
						<div class="pi-price">
							<h3>$59</h3>
							<p>Per month</p>
						</div>
						<ul>
							<li>Take Up To 7 Classes</li>
							<li>Available To Anyone</li>
							<li>Towels Included</li>
							<li>Never Expires</li>
						</ul>
						<a href="#" class="site-btn sb-line-gradient">Get started</a>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="pricing-item entermediate">
						<div class="pi-top">
							<h4>Entermediate</h4>
						</div>
						<div class="pi-price">
							<h3>$99</h3>
							<p>Per month</p>
						</div>
						<ul>
							<li>Take Up To 7 Classes</li>
							<li>Available To Anyone</li>
							<li>Towels Included</li>
							<li>Never Expires</li>
						</ul>
						<a href="#" class="site-btn sb-line-gradient">Get started</a>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="pricing-item advanced">
						<div class="pi-top">
							<h4>Advanced</h4>
						</div>
						<div class="pi-price">
							<h3>$159</h3>
							<p>Per month</p>
						</div>
						<ul>
							<li>Take Up To 7 Classes</li>
							<li>Available To Anyone</li>
							<li>Towels Included</li>
							<li>Never Expires</li>
						</ul>
						<a href="#" class="site-btn sb-line-gradient">Get started</a>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="pricing-item professional">
						<div class="pi-top">
							<h4>Professional</h4>
						</div>
						<div class="pi-price">
							<h3>$199</h3>
							<p>Per month</p>
						</div>
						<ul>
							<li>Take Up To 7 Classes</li>
							<li>Available To Anyone</li>
							<li>Towels Included</li>
							<li>Never Expires</li>
						</ul>
						<a href="#" class="site-btn sb-line-gradient">Get started</a>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- Pricing Section end -->

	<!-- Sign up Section -->
	<!-- <section class="signup-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="signup-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d33245.297803635964!2d-73.76987401620775!3d40.704774398815005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1575866843291!5m2!1sen!2sbd" style="border:0;" allowfullscreen=""></iframe></div>
				</div>
				<div class="col-lg-6">
					<div class="singup-text">
						<h3>Sign Up for Our Classes</h3>
						<p>To be invited to the nearest Cali center and get free physical advice to learn more about the program.</p>
					</div>
					<form class="singup-form">
						<div class="row">
							<div class="col-md-6">
								<input type="text" placeholder="First Name">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Last Name">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Your Email">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone Number">
							</div>
							<div class="col-md-12">
								<textarea placeholder="Message"></textarea>
								<a href="#" class="site-btn sb-gradient">Get started</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section> -->
	<!-- Sign up Section end -->

	<!-- Gallery Section -->
	<div class="gallery-section">
		<div class="gallery-slider owl-carousel">
			<div class="gs-item">
				<img src="../Assets/Template/User/img/gallery/hip2.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-child"></i>
					<p>Hobbio...</p>
				</div>
			</div>
			<div class="gs-item">
				<img src="../Assets/Template/User/img/gallery/roller2.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-child"></i>
					<p>Hobbio...</p>
				</div>
			</div>
			<div class="gs-item">
				<img src="../Assets/Template/User/img/gallery/karate1.jpg" alt="" style="height:155px;">
				<div class="gs-hover">
					<i class="fa fa-child"></i>
					<p>Hobbio...</p>
				</div>
			</div>
			<div class="gs-item">
				<img src="../Assets/Template/User/img/gallery/swimwomen1.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-child"></i>
					<p>Hobbio...</p>
				</div>
			</div>
			<div class="gs-item">
				<img src="../Assets/Template/User/img/gallery/western1.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-child"></i>
					<p>Hobbio...</p>
				</div>
			</div>
			<div class="gs-item">
				<img src="../Assets/Template/User/img/gallery/kungfu1.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-child"></i>
					<p>Hobbio...</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Gallery Section end -->

	<!-- Footer Section -->
	<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget">
						<div class="about-widget">
							<img src="../Assets/Template/User/img/HobbioLogo (2).png" alt="" style="margin-bottom: 10px !important;
    
    height: 100px !important;
    object-fit: cover !important;
    width: 210px !important;">
							<p>Follow Your Passion...</p>
							<p>"Passion is energy. Feel the power that comes from focusing on what excites you."

-Oprah Winfrey</p>
							<ul>
								<li><i class="material-icons">phone</i>8606147681</li>
								<li><i class="material-icons">email</i>hobbiomini@gmail.com</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget pl-0 pl-lg-5">
						<h2 class="fw-title">Company</h2>
						<ul>
							<li><a href="../Assets/Extras/Education.html">Online Education</a></li>
							
							<li><a href="../Assets/Extras/ContactUs.html">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-sm-6">
					<div class="footer-widget">
						<h2 class="fw-title">About Us</h2>
						<ul>
							<li><a href="../Assets/Extras/AboutUs.html">Our Vision</a></li>
							<li><a href="../Assets/Extras/AboutUs.html">Our Mission</a></li>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget pl-0 pl-lg-5">
						<h2 class="fw-title">Hobbio</h2>
						<p>Discover Hobbio, your gateway to passion-driven learning. 
							Follow your passion with ease as Hobbio helps you find and select 
							the perfect extracurricular activity centers. Explore your interests,
							 embrace new hobbies, and unleash your potential with Hobbio by your side.</p>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="row">
					<div class="col-md-4">
						<div class="footer-social">
							<a href="https://www.facebook.com/fathima.sheen.7?mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a>
							<a href="https://instagram.com/melting_strell_?igshid=YTQwZjQ0NmI0OA=="><i class="fa fa-instagram"></i></a>
							
							<a href="https://www.linkedin.com/in/fathima-sheen-k-s-541a20291?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
					<div class="col-md-8 text-md-right">
						<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">PCPL</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="Assets/Template/User/img/icons/up-arrow.png" alt=""></div>

	<!-- Search model -->
	<div class="search-model set-bg" data-setbg="img/search-bg.jpg">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch"><i class="material-icons">close</i></div>
			<form class="search-moderl-form">
				<input type="text" id="search-input" placeholder="Search">
				<button><img src="Assets/Template/User/img/icons/search-2.png" alt=""></button>
			</form>
		</div>
	</div>
	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="../Assets/Template/User/js/vendor/jquery-3.2.1.min.js"></script>
	<script src="../Assets/Template/User/js/bootstrap.min.js"></script>
	<script src="../Assets/Template/User/js/jquery.slicknav.min.js"></script>
	<script src="../Assets/Template/User/js/owl.carousel.min.js"></script>
	<script src="../Assets/Template/User/js/jquery.nice-select.min.js"></script>
	<script src="../Assets/Template/User/js/jquery-ui.min.js"></script>
	<script src="../Assets/Template/User/js/jquery.magnific-popup.min.js"></script>
	<script src="../Assets/Template/User/js/main.js"></script>

	</body>

	<script>
    // Simulated function to get the count of new registrations
    function getNewRegistrationCount() {
        // In your actual implementation, you should fetch the count from PHP (e.g., $notificationCount) or your database.
        return <?php echo $notificationCount; ?>;
    }

    // Function to update the notification count
    function updateNotificationCount() {
        const notificationCount = document.getElementById('notification-count');
        const count = getNewRegistrationCount();
        notificationCount.textContent = count;
    }

    // Call the function initially to set the count
    updateNotificationCount();

    
</script>
</html>