<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

$userid=$_SESSION['uid'];
if(isset($_GET['bid']))
{
  ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  // Display the SweetAlert confirmation dialog
  Swal.fire({
    title: "Do you want to confirm cancellation?",
    text: "This action cannot be undone.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Do",
    cancelButtonText: "Cancel",
    confirmButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "ViewBookings.php?biid=<?php echo $_GET['bid'];?>";
    } else {
      Swal.fire("Cancellation prevented", "", "info");
    }
  });
</script>
				<?php
			
}
if(isset($_GET['biid']))
{
  $upd="update tbl_booking set booking_status='2' where user_id=".$userid." and booking_id=".$_GET['biid'];
  if($con->query($upd))
  {
    $upd1="update tbl_payment set transaction_status=2 where booking_id=".$_GET['biid'];
  $con->query($upd1);
    ?>
    <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Booking Cancelled",
      text: "Refunding will be done shortly.",
      icon: "info"
    }).then(() => {
      window.location = "ViewBookings.php";
    });
  });
</script>
    <?php
  }
  else
  {
  ?>
 <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Booking Cancellation Failed",
      text: "Failed to cancel the booking. Please try again.",
      icon: "error"
    }).then(() => {
      window.location = "ViewBookings.php";
    });
  });
</script>
    <?php
  }
  
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Hobbio::View Bookings</title>
</head>

<body>
<center>
<h3>Booked Course Details</h3><br>
<form method="post">
<table width="1119" border="1" cellspacing="0" cellpadding="3" style="width: 100%;
    border-collapse: collapse;
    margin-top: 18px;">
  <tr>
   	
       <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Booking Date and Time</th>
    
    <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Center Name</th>
     <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Center Contact</th>
     <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Center Email</th>
     <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Center Address</th>
     
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
    font-size: 18px; font-family: 'Playfair Display', serif;">Package Cost and Duration</th>
    <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Status</th>
    

  </tr>
  <tr>
<?php
$sel="SELECT * FROM `tbl_payment` pay inner join tbl_booking book on pay.booking_id=book.booking_id inner join tbl_package pack on pack.package_id=book.package_id inner join tbl_course co on co.course_id=pack.course_id inner join tbl_center cen on cen.center_id=co.center_id inner join tbl_user u on u.user_id=book.user_id where u.user_id=".$userid."
and book.booking_status=1";
$res=$con->query($sel);
   $i=0;
   while($row=$res->fetch_assoc())
   {
	   $i++;

?>

    
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['booking_date']; ?><br>
    <?php echo $row['booking_time']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['center_name']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['center_contact']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['center_email']; ?></td>

    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['center_area']; ?><br><?php echo $row['center_building']; ?><br>
    <?php echo $row['center_landmark']; ?></td>

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
    border: 1px solid #ddd;"><?php echo $row['package_cost']; ?><br>
   <?php echo $row['package_duration']; ?></td>
    <td align="center"style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;">
      <a href="ViewBookings.php?bid=<?php echo $row['booking_id'];?>" style="color:red;" >Cancel Booking</a>
    </td>
   
  </tr>
  <?php
   }
   ?>
 

</table>

<br /><br>
<table>
    <tr>
    <td align="left">

    
<h5> <a href="UserHome.php" style="
 
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

</form>
</center>







</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>