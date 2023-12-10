<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");



//$userid=$_SESSION['uid'];
$packid=$_GET['pacid'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::Center Booking</title>
</head>

<body>

<center>

<div style=" background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width: 80%;
            padding: 20px;
            text-align: center;">
<h3>YOUR BOOKING HAS BEEN CONFIRMED...</h3><br />
<h3>YOUR PAYMENT IS SUCCESSFULL...</h3>
<br /><br />
<h3>Your Package Details</h3><br />
<center>
<table  rules="none" cellpadding="30" cellspacing="20" style=" text-align: center;">
<?php
$sel="select *from tbl_package p inner join tbl_course c on p.course_id=c.course_id inner join tbl_center ce on ce.center_id=c.center_id where p.package_id=".$packid;
$res=$con->query($sel);
$row=$res->fetch_assoc();


?>
<tr>
        <td colspan="2" align="center"><img src="../Assets/File/Center/<?php echo $row['center_logo'] ?>" style=" width: 30%;
            height: 30%;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
            display: block;
            margin: 0 auto;" alt="User Photo"></td>
</tr>
<tr>
<td align="center" style="padding: 10px;font-family: 'Playfair Display', serif; font-size:18px;">Center Name</td>
<td align="center" style="padding: 10px;font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['center_name'];?></td>
</tr>
<tr>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Center Contact</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['center_contact'];?></td>
</tr>
<tr>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Center Type</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['center_type'];?></td>
</tr>
<tr>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Center Email</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['center_email'];?></td>
</tr>
<tr>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Center Area</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['center_area'];?></td>
</tr>
<tr>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Center Building</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['center_building'];?></td>
</tr>
<tr>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Center Landmark</td>
<td  align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['center_landmark'];?></td>
</tr>

<tr>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Course Name</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['course_name'];?></td>
</tr>
<tr>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Course Description</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['course_des'];?></td>
</tr>
<tr>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Package Name</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['package_name'];?></td>
</tr>
<tr>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Package Cost</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['package_cost'];?></td>
</tr>
<tr>

<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Package Duration</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['package_duration'];?></td>
</tr>
<tr>

<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;">Package Details</td>
<td align="center" style="padding: 10px; font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['package_details'];?></td>
</tr>
<?php

?>



</table><br /><br />
</center>
<h6 style="font-family: 'Playfair Display', serif;">For further details...Please check your email...</h6>
<h3><a href="RatingCenters.php?cenid=<?php echo $row['center_id'];?>" style="display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 20px;
            text-decoration: none;">RATE NOW</a></h3>
<h3><a href="UserHome.php" style="display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 20px;
            text-decoration: none;">HOME</a></h3>
</center>
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>