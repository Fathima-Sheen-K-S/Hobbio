<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
$sel="select *from tbl_admin where admin_id=".$_SESSION['aid'];
$res=$con->query($sel);
$row=$res->fetch_assoc();
$adminname=$row['admin_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Hobbio::Admin Dashboard
    </title>
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
            <img src="../Assets/Template/assets/img/brand/HobbioLogo (2).png"   alt="..." style="    width: 213px !important;
    height: 120px !important;
    object-fit: cover !important;"/>
            <!-- </a> -->
            <!-- User -->
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
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
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder"
                                        src="../Assets/Template/assets/img/theme/team-4-800x800.jpg">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $adminname;?></span>
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
                        <i class="ni ni-badge text-purple" ></i> Verify Centers
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
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder"
                                        src="../Assets/Template/assets/img/theme/team-4-800x800.jpg">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $adminname;?></span>
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
        <div class="header bg-gradient-primary pb-8 ">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    
                </div>
            </div>
        </div>
        <div class="container-fluid ">
           
            <div class="row mt-5">
        <div style=" width :1155px; padding: 7px; min-height:500px;">