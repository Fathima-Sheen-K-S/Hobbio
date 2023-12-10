<?php

ob_start();
include('Head.php');


include("../Assets/Connection/Connection.php");



	

	$userid=$_SESSION['uid'];
	$packid=$_GET['pid'];
	
	$selu="select *from tbl_user where user_id=".$userid;
	$resu=$con->query($selu);
	$rowu=$resu->fetch_assoc();
	$uemail=$rowu['user_email'];
	$uname=$rowu['user_name'];



$selqry="select max(booking_id) as bookingid from tbl_booking where user_id=".$userid;
$res=$con->query($selqry);
$row=$res->fetch_assoc();
$bookid=$row['bookingid'];




	

if(isset($_POST["btnpay"]))
{
	$sel="SELECT * FROM tbl_booking b INNER join tbl_package p on b.package_id=p.package_id inner join tbl_course c on c.course_id=p.course_id inner join tbl_center ce on ce.center_id=c.center_id where b.booking_id=".$bookid;
$res=$con->query($sel);
$row=$res->fetch_assoc();
$amount=$row['package_cost'];
$packname=$row['package_name'];
$centername=$row['center_name'];
$coursename=$row['course_name'];
	$insqry="insert into tbl_payment(payment_amount,payment_date,payment_time,booking_id,transaction_status) values(".$amount.",curdate(),curtime(),".$bookid.",1)";
	if($con->query($insqry))
	{
		
		?>
		<script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Confirm Payment",
      text: "Please confirm your payment...",
      icon: "info"
    }).then(() => {
      window.location = "Process.php?paid=<?php echo $packid ?>";
    });
  });
</script>
		<?php
		$upd="update tbl_booking set booking_status=1 where booking_id=".$bookid;
	    $con->query($upd);
	}
	else
	{
		?>
        <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Payment Failed",
      text: "Your payment has failed. Please try again.",
      icon: "error"
    });
  });
</script>
        <?php
	}
	
}
	
/*if(isset($_GET['pid'])){
	$insqry="insert into tbl_booking(booking_date,booking_time,user_id,package_id,booking_status) values(curdate(),curtime(),".$userid.","		.$_GET['pid'].",0)";
	$con->query($insqry);
	}*/
	


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		/* *{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body{
			background-color: #f5f5f5;
			font-family: Arial, Helvetica, sans-serif;
		} */
		.wrapper{
			background-color: #f5f5f5;
			width: 600px;
			padding: 25px;
			margin: 25px auto 0;
			box-shadow: 0px 0px 20px rgba(0,0,0,0.5);
		}
		.wrapper h2{
			background-color: #fcfcfc;
			color: #f65d5d;
			font-size: 24px;
			padding: 10px;
			margin-bottom: 20px;
			text-align: center;
			border: 1px dotted  #F9FBDC;
		}
		h4{
			padding-bottom: 5px;
			color: #f65d5d;
		}
		.input-group{
			margin-bottom: 8px;
			width: 100%;
			position: relative;
			display: flex;
			flex-direction: row;
			padding: 5px 0;
		}
		.input-box{
			width: 100%;
			margin-right: 12px;
			position: relative; 
		}
		.input-box:last-child{
			margin-right: 0;
		}
		.name{
			padding: 14px 10px 14px 50px;
			width: 100%;
			background-color: #fcfcfc;
			border: 1px solid #00000033;
			outline: none;
			letter-spacing: 1px;
			transition: 0.3s;
			border-radius: 3px;
			color:  #020202;
		}
		.name:focus, .dob:focus{
			-webkit-box-shadow:0 0 2px 1px #f65d5d;
			-moz-box-shadow:0 0 2px 1px #f65d5d;
			box-shadow: 0 0 2px 1px #f65d5d;
			border: 1px solid #f65d5d;
		}
		.input-box .icon{
			width: 48px;
			display: flex;
			justify-content: center;
			position: absolute;
			padding: 15px;
			top: 0px;
			left: 0px;
			bottom: 0px;
			color: #f65d5d;
			background-color: #f1f1f1;	
			border-radius: 2px 0 0 2px;
			transition: 0.3s;
			font-size: 20px;
			pointer-events: none;
			border: 1px solid #000000033;
			border-right: none;
		}
		
		
		.name:focus + .icon{
			background-color: #f65d5d;
			color: #fff;
			border-right: 1px solid #f65d5d;
			border-right: none;
			transition: 1s;
		}
		.radio:checked + label {
			background: linear-gradient(45deg, #f65d5d, #ff9147);
			color: #fcfcfc	;
			border-right: 1px solid #f65d5d;
			border-right: none;
			transition: 1s;
		}
		.dob{
			width: 30%;
			padding: 14px;
			text-align: center;
			background-color: #fcfcfc;
			transition: 0.3s;
			outline: none;
			border: 1px solid #c0bfbf;
			border-radius: 3px;
		}
		.radio{
			display: none;
		}
		.input-box label{
			width: 50%;
			padding: 13px;
			background-color: #fcfcfc;
			display: inline-block;
			float: left;
			text-align: center;
			border: 1px solid #c0bfbf; 
		}
		.input-box label:first-of-type{
			border-top-left-radius: 3px;
			border-bottom-left-radius: 3px;
			border-right: none;
		}
		.input-box label:last-of-type{
			border-top-left-radius: 3px;
			border-bottom-left-radius: 3px;
		}
		
		.radio:checked{
			background-color:green;
			color: #06B2F8;
		}
		
		input[type=submit]{
			width: 100%;
			background: linear-gradient(45deg, #f65d5d, #ff9147);
			border: none;
			
			color: white;
			padding: 15px;
			border-radius: 4px;
			font-size: 16px;
			transition: all 0.35s ease;
		}
		input[type=submit]:hover{
			cursor: pointer;
			background: #fdb07d;
		}

	</style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
  
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<title>Hobbio::Payment Gateway</title>
</head>
<body>
    
   
	<div class="wrapper">
	<h2 style="color: #f65d5d; font-size: 35px; font-weight: bold;">Payment Gateway</h2>
		<form method="POST">
			<h4 style="color:#f65d5d; font-size: 24px; font-family: 'Playfair Display', serif;">Account</h4>
			<div class="input-group">
				<div class="input-box">
					<input class="name" type="text" name="txtname" id="txtname" placeholder="First Name" style="font-size: 18px; font-family: 'Playfair Display', serif;" required>
					<i class="fa fa-user icon" aria-hidden="true"></i>
				</div>
				<div class="input-box">
					<input class="name" type="text" name="txtnname" id="txtnname" style="font-size: 18px; font-family: 'Playfair Display', serif;" placeholder="Last Name" required>
					<i class="fa fa-user icon" aria-hidden="true"></i>
				</div>
			</div>
			<div class="input-group">
				<div class="input-box">
					<input class="name" type="email" name="txtemail" id="txtemail" style="font-size: 18px; font-family: 'Playfair Display', serif;" placeholder="Email Address" required>
					<i class="fa fa-envelope icon" aria-hidden="true"></i>
				</div>
			</div>	
			<div class="input-group">
				<div class="input-box">
					<?php
					$sel="select *from tbl_user where user_id=".$userid;
					$res=$con->query($sel);
					$row=$res->fetch_assoc();
					$dob=$row['user_dob'];
					?>
					<h4 style="font-size: 24px; font-family: 'Playfair Display', serif;">Date of Birth</h4>
					<input class="dob" type="text"  name="txtdate" style="font-size: 18px; font-family: 'Playfair Display', serif;     width: 550px;" id="txtdate" placeholder="DD" value="<?php echo $dob;?>">
					<!-- <input class="dob" type="text" data-mask="00" name="txtmonth" style="font-size: 18px; font-family: 'Playfair Display', serif;" id="txtmonth" placeholder="MM">
					<input class="dob" type="text" data-mask="0000" name="txtyear" style="font-size: 18px; font-family: 'Playfair Display', serif;" id="txtyear" placeholder="YYYY"> -->
				</div>
				<div class="input-box">
					<h4 style="font-size: 24px; font-family: 'Playfair Display', serif;">Gender</h4>
					<input type="radio" name="rdbgender" style="font-size: 18px; font-family: 'Playfair Display', serif;" id="male" checked  class="radio">
					<label style="font-size: 18px; font-family: 'Playfair Display', serif;" for="male">Male</label>
					<input type="radio" name="rdbgender" style="font-size: 18px; font-family: 'Playfair Display', serif;" id="female" class="radio">
					<label style="font-size: 18px; font-family: 'Playfair Display', serif;" for="female">Female</label>
				</div>
			</div>
			<div class="input-group">
				<div class="input-box">
					<h4 style="font-size: 24px; font-family: 'Playfair Display', serif;" >Payment Details</h4>
					<input type="radio" name="rdbpay" style="font-size: 18px; font-family: 'Playfair Display', serif;" id="cc" checked class="radio">
					<label for="cc" style="font-size: 18px; font-family: 'Playfair Display', serif;">
						<span style="font-size: 18px; font-family: 'Playfair Display', serif;"><i class="fa fa-cc-visa" aria-hidden="true"></i>Credit Card</span>
					</label>
					<input type="radio" name="rdbpay" id="dc" style="font-size: 18px; font-family: 'Playfair Display', serif;" class="radio">
					<label for="dc" style="font-size: 18px; font-family: 'Playfair Display', serif;">
						<span style="font-size: 18px; font-family: 'Playfair Display', serif;"> <i class="fa fa-cc-visa" aria-hidden="true"></i>Debit Card</span>
					</label>
				</div>
			</div>
			<div class="input-group">
				<div class="input-box">
					<input class="name" type="tel" id="txtcardno" name="txtcardno" style="font-size: 18px; font-family: 'Playfair Display', serif;" required data-mask="0000 0000 0000 0000" placeholder="Card Number">
					<i class="fa fa-credit-card icon" aria-hidden="true"></i>
				</div>
			</div>
			<div class="input-group">
				<div class="input-box">
					<input class="name" style="font-size: 18px; font-family: 'Playfair Display', serif;" type="text" name="txtcvc" id="txtcvc" data-mask="000" placeholder="CVC" required>
					<i class="fa fa-user icon" aria-hidden="true"></i>
				</div>
				<div class="input-box">
					<input class="name" style="font-size: 18px; font-family: 'Playfair Display', serif;" type="text" name="txtdate" id="txtdate" data-mask="00 / 00" placeholder="EXP DATE" required>
					<i class="fa fa-calendar icon" aria-hidden="true"></i>
				</div>
			</div>
			
			<div class="input-group">
				<div class="input-box">
                                    <input type="submit" name="btnpay" style="font-size: 18px; font-family: 'Playfair Display', serif;" value="PAY NOW">
				</div>
			</div>
		</form>
	</div>
</body>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>
