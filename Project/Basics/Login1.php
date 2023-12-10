<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pw=$_POST['txtpassword'];
	$admin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$pw."'";
	$user="select * from tbl_user where user_email='".$email."' and user_password='".$pw."'";
	$center="select *from tbl_center where center_email='".$email."' and center_password='".$pw."'";
	$resAdmin=$con->query($admin);
	$resUser=$con->query($user);
	$resCenter=$con->query($center);
	if($resAdmin->num_rows>0)
	{
		$row=$resAdmin->fetch_assoc();
		$_SESSION['aid']=$row['admin_id'];
		$_SESSION['aname']=$row['admin_name'];
		echo ("Admin LOgged In");
		header("location:../Admin/AdminHome.php");
	}
	else if($resUser->num_rows>0)
	{
		$row=$resUser->fetch_assoc();
		$_SESSION['uid']=$row['user_id'];
		$_SESSION['uname']=$row['user_name'];
		echo ("User Logged In");
		header("location:../User/UserHome.php");
	}
	else if($resCenter->num_rows>0)
	{
		$row=$resCenter->fetch_assoc();
		$_SESSION['cid']=$row['center_id'];
		$_SESSION['cname']=$row['center_name'];
		$_SESSION['cstatus']=$row['center_status'];
		if($_SESSION['cstatus']==1)
		{
			echo "Center Logged in successfully";
		    header("location:../Center/CenterHome.php");
		}
		else
		{
			echo "Center Logged in Failed";
		}
	}
	else
	{
		?>
        <script>
		alert("No User Found..Please enter valid email and password");
		</script>
        <?php
	}
        
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<br><br>
<!--<h2 align="center">Login</h2> -->
<!-- <form id="form1" name="form1" method="post" action=""> -->
  <!-- <table width="200" border="1" align="center"> -->
    <!-- <tr> -->
      <!-- <td>Email</td> -->
      <!-- <td><label for="txtemail"></label> -->
      <!-- <input type="text" name="txtemail" id="txtemail" /></td> -->
    <!-- </tr> -->
    <!-- <tr> -->
      <!-- <td>Password</td> -->
      <!-- <td><label for="txtpassword"></label> -->
      <!-- <input type="password" name="txtpassword" id="txtpassword" /></td> -->
    <!-- </tr> -->
    <!-- <tr> -->
      <!-- <td colspan="2" align="center"><input type="submit" name="btnlogin" id="btnlogin" value="Login" /></td> -->
    <!-- </tr> -->
  <!-- </table> -->
  <!-- <table rules="none" align="center"> -->
	<!-- <tr> -->
		<!-- <td width="200">New User..?</td> -->
		<!-- <td><a href="UserRegistration.php">Sign in</a></td> -->
	<!-- </tr> -->
	<!-- <tr> -->
		<!-- <td width="200">New Center..?</td> -->
		<!-- <td><a href="CenterRegistration.php">Sign in</a></td> -->
	<!-- </tr> -->
	<!-- <tr> -->
		<!-- <td colspan="2" align="center"><a href="ForgotPassword.php">ForgotPassword</a></td> -->
	<!-- </tr> -->
<!-- </table> -->
<!-- </form> -->
<form method="post" action="">
<div class="wrapper">
        <div class="form-wrapper sign-up">
            
                <!-- <h2>Sign Up</h2> -->
                <!-- <div class="input-group"> -->
                    <!-- <input type="text" required> -->
                    <!-- <label for="">Username</label> -->
                <!-- </div> -->
                <!-- <div class="input-group">
                    <input type="email" name="txtemail" required>
                    <label for="">Email</label>
                </div> -->
                <!-- <div class="input-group">
                    <input type="password" name="txtpassword" required>
                    <label for="">Password</label>
                </div> -->
                <!-- <button type="submit" class="btn">Sign Up</button>
                <div class="sign-link">
                    <p>Already have an account? <a href="#" class="signIn-link">Sign In</a></p> -->
                <!-- </div> -->
            </form>
        </div>

        <div class="form-wrapper sign-in">
            <form action="" method="post">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="email"  anme="txtemail" required>
                    <label for="">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="txtpassword" required>
                    <label for="">Password</label>
                </div>
                <div class="forgot-pass">
                    <a href="../Guest/ForgotPassword.php">Forgot Password?</a>
                </div>
                <button type="submit" name="btnlogin" class="btn">Login</button>
                <div class="sign-link">
                    <p>Don't have an account? <a href="../Guest/UserRegistration.php" class="signUp-link">Sign Up</a></p>
                </div>
                <div class="sign-link">
                    <p>Want to sign in as a Center? <a href="../Guest/CenterRegistration.php" class="signUp-link">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>

</body>
<script src="script.js"></script>
</html>