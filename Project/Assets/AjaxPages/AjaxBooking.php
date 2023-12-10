<?php
include("../Connection/Connection.php");
session_start();

	$userid=$_SESSION['uid'];
$selb="select * from tbl_booking where user_id=".$userid." and package_id=".$_GET['pid']." and booking_status=1" ;
	$resb=$con->query($selb);
	
	
		if($rowb=$resb->fetch_assoc())
		{
			echo "1";
			
		}
		else
		{
	
			$insqry="insert into tbl_booking(booking_date,booking_time,user_id,package_id,booking_status) values(curdate(),curtime(),".$userid.",".$_GET['pid'].",0)";
	$con->query($insqry);
		}

?>