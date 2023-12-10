<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

$centerid=$_SESSION['cid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::Booking Details</title>
</head>

<body>
<center>
<h3>Booking Details</h3><br>


<table width="1119" border="1" cellspacing="0" cellpadding="3" style="width: 100%;
    border-collapse: collapse;
    margin-top: 18px;">
  <tr>
   	<th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">SL No</th>
    <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">User Name</th>
     <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">User Contact</th>
     <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">User Email</th>
    <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Course Name</th>
    <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Package Name</th>
    <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Booking Date</th>
    <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Booking Time</th>

  </tr>
  <tr>
<?php
$sel="SELECT * FROM tbl_payment pay inner join tbl_booking b on pay.booking_id=b.booking_id INNER JOIN tbl_user u on b.user_id=u.user_id INNER JOIN tbl_package p on b.package_id=p.package_id inner join tbl_course c on c.course_id=p.course_id where c.center_id=".$centerid." and b.booking_status=1";
$res=$con->query($sel);
   $i=0;
   while($row=$res->fetch_assoc())
   {
	   $i++;

?>

    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $i; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['user_name']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['user_contact']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['user_email']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['course_name']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['package_name']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['booking_date']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['booking_time']; ?></td>
   
  </tr>
  <?php
   }
   ?>
 

</table>
<br /><br>
<table>
    <tr>
    <td align="left">

    
<h5> <a href="CenterHome.php" style="
 
 color: white;
 border:none;
 border-radius: 5px;
 padding: 10px 20px; 
 cursor: pointer;
  background-color: #d35536"
 onmouseover="this.style.backgroundColor='#f0934b'" 
         onmouseout="this.style.backgroundColor='#d35536'">Home</a></h5>

   </td>
    </tr>
</table>


</center>
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>