<!-- 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home</title>
</head>

<body>
<h1 align="center">Welcome</h1>
<h2 align="center"></h2>
<p style="background-color:coral">
<span style="padding-left:100px;">
<a href="Category.php">Category</a>
<span style="padding-left:100px;">
<a href="District.php">District</a>
<span style="padding-left:100px;">
<a href="City.php">Place</a>
<span style="padding-left:100px;">
<a href="SubCategory.php">SubCategory</a>
<span style="padding-left:100px;">
<a href="Type.php">Type</a>
<span style="padding-left:100px;">
<a href="ViewComplaints.php">View Complaints</a>
<span style="padding-left:100px;">
<a href="ViewFeedbacks.php">View Feedbacks</a><br />
<span style="padding-left:100px;">
</p>
</body>
</html> -->

<!--

=========================================================
* Argon Dashboard - v1.1.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
$sel = "select *from tbl_admin where admin_id=" . $_SESSION['aid'];
$res = $con->query($sel);
$row = $res->fetch_assoc();
$adminname = $row['admin_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Hobbio Admin Dashboard
    </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- Favicon -->
    <link href="../Assets/Template/assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="../Assets/Template/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="../Assets/Template/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../Assets/Template/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<body class="">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <!-- <a class="navbar-brand pt-0" href="./index.html"> -->
            <img src="../Assets/Template/assets/img/brand/HobbioLogo (2).png" alt="..." style="    width: 213px !important;
    height: 120px !important;
    object-fit: cover !important;">

            <!-- </a> -->
            <!-- User -->
           
            <ul class="nav align-items-center d-md-none">
            
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ni ni-bell-55"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                        aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
                
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="../Assets/Template/assets/img/theme/team-1-800x800.jpg
">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>

                        <div class="dropdown-divider"></div>
                        <a href="../Logout.php" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.html">
                                <img src="../Assets/Template/assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <form class="mt-4 mb-3 d-md-none">
                    <div class="input-group input-group-rounded input-group-merge">
                        <input type="search" class="form-control form-control-rounded form-control-prepended"
                            placeholder="Search" aria-label="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-search"></span>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item  active ">
                        <a class="nav-link  active " href="AdminHome.php">
                            <i class="ni ni-chart-bar-32 text-info"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Category.php">
                            <i class="ni ni-check-bold text-blue"></i> Category
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="SubCategory.php">
                            <i class="ni ni-check-bold text-orange"></i> SubCategory
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="District.php">
                            <i class="ni ni-world text-green"></i> District
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="City.php">
                            <i class="ni ni-building text-info"></i> City
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="CenterVerification.php">
                            <i class="ni ni-badge text-purple"></i> Verify Centers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ViewBookings.php">
                            <i class="ni ni-hat-3 text-yellow" ></i> View Bookings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="CancelledBookings.php">
                            <i class="ni ni-user-run text-red" ></i> Cancelled Bookings
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="GeneralReportCenter.php">
                            <i class="ni ni-tablet-button text-info"></i> General Report(Centers)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="GeneralReportUser.php">
                            <i class="ni ni-tablet-button text-yellow"></i> General Report(Users)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="CategoryReportPie.php">
                            <i class="ni ni-chart-pie-35 text-red"></i> Category Report
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="SubCatReport.php">
                            <i class="ni ni-chart-bar-32 text-green"></i> SubCategory Report
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="CenterLearnersReport.php">
                            <i class="ni ni-paper-diploma text-blue"></i> Learners Report
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="ViewComplaints.php">
                            <i class="ni ni-chat-round text-blue"></i> View Complaints
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="ViewFeedbacks.php">
                            <i class="ni ni-satisfied text-yellow"></i> View Feedbacks
                        </a>
                    </li>


                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->

            </div>
        </div>
    </nav>
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="AdminHome.php">Dashboard</a>
                <!-- Form -->
                <!-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                </form> -->
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <?php
                   $sel = "SELECT COUNT(*) AS center_count FROM tbl_center WHERE center_status = 0;";
                   $res = $con->query($sel);
                   $row = $res->fetch_assoc();
                   $notificationCount = $row['center_count'];
                    ?>
               <a href="CenterVerification.php">
    <div id="notification-container">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" style="color: white;" class="bi bi-bell-fill" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
        </svg>
        <span id="notification-count" style="color: white;"><?php echo $notificationCount; ?></span>
    </div>
</a>

                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder"
                                        src="../Assets/Template/assets/img/theme/team-4-800x800.jpg">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">
                                        <?php echo $adminname; ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>

                            <div class="dropdown-divider"></div>
                            <a href="../Logout.php" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                   
                </div>
            </div>
        </div>

        <div class="container-fluid mt--7">




<div style="display: flex;">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow" style="padding-bottom: 60px;">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">

                                <h2 class="text-black mb-0">Learners Report</h2>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div id="tab" align="center">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                            <script>


                                var xValues = [
                                    <?php

                                    $sel = "select * from tbl_center";
                                    $row = $con->query($sel);
                                    while ($data = $row->fetch_assoc()) {
                                        echo "'" . $data["center_name"] . "',";

                                    }

                                    ?>
                                ];

                                var yValues = [
                                    <?php
                                    $sel = "select * from tbl_center";
                                    $row = $con->query($sel);
                                    while ($data = $row->fetch_assoc()) {

                                        $sel1 = "select count(booking_id) as id from tbl_booking bo inner join  tbl_package pa  on bo.package_id=pa.package_id
   inner join tbl_course co on co.course_id=pa.course_id 
   inner join tbl_center ce on ce.center_id=co.center_id 
    WHERE ce.center_id='" . $data["center_id"] . "'";

                                        $row1 = $con->query($sel1);
                                        while ($data1 = $row1->fetch_assoc()) {
                                            echo $data1["id"] . ",";
                                        }
                                    }

                                    ?>
                                ];



                                var barColors = [
                                    "#b91d47",
                                    "#00aba9",
                                    "#2b5797",
                                    "#e8c3b9",
                                    "#1e7145"
                                ];

                                new Chart("myChart", {
                                    type: "pie",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            backgroundColor: barColors,
                                            data: yValues
                                        }]
                                    },
                                    options: {
                                        title: {
                                            display: true,
                                            text: "Centers with most learners"
                                        }
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow" style="padding-bottom: 60px;">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">

                                <h2 class="text-black mb-0">Category Report</h2>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div id="tab2" align="center">
<canvas id="myChart2" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_category";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["category_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_category";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select count(booking_id) as id from tbl_booking bo inner join  tbl_package pa  on bo.package_id=pa.package_id
   inner join tbl_course co on co.course_id=pa.course_id 
   inner join tbl_center ce on ce.center_id=co.center_id 
   inner join tbl_subcategory sub on sub.subcategory_id=co.subcategory_id 
 
  
  inner join tbl_category c on c.category_id=sub.category_id WHERE c.category_id='".$data["category_id"]."'";
	  
	  $row1=$con->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart2", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All Category Report"
    }
  }
});
</script>

</div>
                    </div>
                </div>
            </div>
</div>
            <br><br>
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent" >
                        <div class="row align-items-center">
                            <div class="col">

                                <h2 class="text-black mb-0">SubCategory Report</h2>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div id="tab3" align="center">
<canvas id="myChart3" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_subcategory";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["subcategory_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_subcategory";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select count(booking_id) as id from tbl_booking bo inner join  tbl_package pa  on bo.package_id=pa.package_id inner join tbl_course co on co.course_id=pa.course_id inner join tbl_subcategory sub on sub.subcategory_id=co.subcategory_id 
     inner join tbl_user u on u.user_id=bo.user_id 
     
      WHERE sub.subcategory_id='".$data["subcategory_id"]."'";
	  
	  $row1=$con->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart3", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      label: '# of subcategories',
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "SubCategory Report"
    }
  }
});
</script>

</div>
                    </div>
                </div>
            </div>


           
                                 


            <!-- Footer -->
            <footer class="footer">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; 2023 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                                target="_blank">Hobbio...Follow Your Passion</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                            <li class="nav-item">
                                <a href="../index.php" class="nav-link" target="_blank">Hobbio</a>
                            </li>
                            <li class="nav-item">
                                <a href="../Assets/Extras/AboutUs.html" class="nav-link" target="_blank">About Us</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </footer>
        </div>



    </div>
    <!--   Core   -->
    <script src="../Assets/Template/assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../Assets/Template/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="../Assets/Template/assets/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="../Assets/Template/assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
    <!--   Argon JS   -->
    <script src="../Assets/Template/assets/js/argon-dashboard.min.js?v=1.1.2"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
    </script>
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