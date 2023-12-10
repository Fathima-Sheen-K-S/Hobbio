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
            ?>
            <script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Verification Pending",
    text: "You are not verified by the admin. Please wait for approval.",
    icon: "info"
  }).then(() => {
    window.location = "Login.php";
  });
});
</script>
                <?php
		}
	}
	else
	{
		?>
       <script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Login Failed",
    text: "No user found. Please enter a valid email and password.",
    icon: "error"
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Hobbio::Login</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(to right, #f65d5f, #f78a33);
            font-family: 'Playfair Display', serif;
            color: #fff;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
			height:70%;
        }

        h1 {
            color: #fff;
            margin-bottom: 20px;
			
			
        }

        form {
            text-align: left;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        #btnlogin {
            background: linear-gradient(to right, #f78a33,#f65d5f);
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
        }

        #btnlogin:hover {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<div class="card">
        <h1 align="center" >Login</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Email</td>
                    <td ><input type="text" name="txtemail" id="txtemail" style='font-size: 18px; font-family: "Playfair Display", serif;' autocomplete="off"/></td>
                </tr>
                <tr>
                    <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Password</td>
                    <td><input type="password" name="txtpassword" id="txtpassword" style='font-size: 18px; font-family: "Playfair Display", serif;' />
                    <i id="togglePassword" class="fas fa-eye" 
                    style="color: orange;
    position: relative;
    top: -32px;
    right: -216px;"></i></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btnlogin" id="btnlogin" value="Login" /></td>
                </tr>
            </table>
            <div>
				
                <p align="center">New User..? <a href="UserRegistration.php">Sign in</a></p>
                <p align="center">New Center..? <a href="CenterRegistration.php">Sign in</a></p>
				
                <p align="center"><a href="ForgotPassword.php">Forgot Password..?</a></p>
                <p align="center"><a href="../index.php">Home</a></p>
            </div>
        </form>
    </div>
</body>
<script>
  const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("txtpassword");

  togglePassword.addEventListener("click", function () {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      togglePassword.classList.remove("fa-eye");
      togglePassword.classList.add("fa-eye-slash");
    } else {
      passwordInput.type = "password";
      togglePassword.classList.remove("fa-eye-slash");
      togglePassword.classList.add("fa-eye");
    }
  });
</script>
</html>