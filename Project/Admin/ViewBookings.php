<?php
ob_start();
include('Head.php');

include("../Assets/Connection/Connection.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::View Bookings</title>
</head>

<body>
<center><br />
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Booking Details</h2>
</center>
<form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;">
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;
            border: 1px solid #ccc;">
<tr>
<td align="center" style=" padding: 8px;">SL No</td>
<td align="center" style=" padding: 8px;">User Name and Contact</td>
<td align="center" style=" padding: 8px;">Center Name and Contact</td>
<td align="center" style=" padding: 8px;">Course Name</td>
<td align="center" style=" padding: 8px;">Package Name</td>
<td align="center" style=" padding: 8px;">Package Cost and Duration</td>
<td align="center" style=" padding: 8px;">Booking Date and Time</td>
</tr>
<?php
$selc="SELECT * FROM tbl_booking book inner join tbl_user u on u.user_id=book.user_id 
inner join tbl_package pack on pack.package_id=book.package_id 
inner join tbl_course c on c.course_id=pack.course_id 
inner join tbl_center ce on ce.center_id=c.center_id where book.booking_status=1";
 $resc=$con->query($selc);
   $i=0;
   while($rowc=$resc->fetch_assoc())
   {
	   $i++;
?>
<tr>
       <td align="center" style=" padding: 8px;"><?php echo $i;?></td>
       <td align="center" style=" padding: 8px;"><?php echo $rowc['user_name'];?><br><?php echo $rowc['user_contact'];?></td>
        <td align="center" style=" padding: 8px;"><?php echo $rowc['center_name'];?><?php echo $rowc['center_contact'];?></td>
         <td align="center" style=" padding: 8px;"><?php echo $rowc['course_name'];?></td>
         <td align="center" style=" padding: 8px;"><?php echo $rowc['package_name'];?></td>
         <td align="center" style=" padding: 8px;"><?php echo $rowc['package_cost'];?><?php echo $rowc['package_duration'];?></td>
         <td align="center" style=" padding: 8px;"><?php echo $rowc['booking_date'];?><?php echo $rowc['booking_time'];?></td>
         <?php
   }
   ?>
</table>
</form>
</center>
</body>
<?php
include('Foot.php');
 ob_end_flush();
?>
</html>