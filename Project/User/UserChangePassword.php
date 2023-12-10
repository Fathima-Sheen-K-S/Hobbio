<?php 
ob_start();
include('Head.php');

include("../Assets/Connection/Connection.php");


$userid=$_SESSION['uid'];


if(isset($_POST["btnchangepass"]))
{
	$oldpass=$_POST["txtoldpass"];
	$selpassqry="select *from tbl_user where user_id=".$userid;
	$result=$con->query($selpassqry);
	$row=$result->fetch_assoc();
	$oldpass1=$row['user_password'];
	$newpass=$_POST["txtnewpass"];
	$renewpass=$_POST["txtconnewpass"];
	if($oldpass==$oldpass1)
	{
		if($newpass==$renewpass)
		{
			$updqry="update tbl_user set user_password='".$newpass."' where user_id=".$userid;
			if($con->query($updqry))
			{
				?>
                <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Password Changed Successfully",
      text: "Your password has been changed successfully.",
      icon: "success"
    }).then(() => {
      window.location = "UserHome.php";
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
      title: "Password Mismatch",
      text: "Please re-enter the new password correctly.",
      icon: "error"
    }).then(() => {
      window.location = "UserChangePassword.php";
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
      title: "Incorrect Old Password",
      text: "Please enter the old password correctly.",
      icon: "error"
    }).then(() => {
      window.location = "UserChangePassword.php";
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Hobbio::User Change Password</title>
</head>





<body>
<center><h3>Change Your Password</h3></center><br>
  <center  style="display: flex;
    align-items: center;
    justify-content: center;
    min-height: 30vh;">
   
<form id="form1" name="form1" method="post" action="" style="background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;">
<?php
$selqry="select tbl_user.user_password from tbl_user";
$res=$con->query($selqry);
$row=$res->fetch_assoc();
$upass=$row['user_password'];



?>
<table style=" width: 500px;
    border-collapse: collapse;
    margin-top: 20px;">
 <tr>
                    <td width="200" style="padding: 15px;
    border: 1px solid #ddd;
    text-align: left; font-size: 20px; font-family: 'Playfair Display', serif;">Old Password:</td>
                    <td width="80" style="padding: 15px;
    border: 1px solid #ddd;
    text-align: left; font-size: 20px; font-family: 'Playfair Display', serif;"><label for="txtoldpass"></label>
                        <input type="password" name="txtoldpass" id="txtoldpass" style=" padding: 10px;
    width: 300px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;" required placeholder="Enter Old Password"/><i id="togglePassword" class="fas fa-eye" style="position: relative;
    top: -50px;
    left: 266px;"></i>
                    </td>
                </tr>
                <tr>
                    <td width="200"  style="padding: 15px;
    border: 1px solid #ddd;
    text-align: left; font-size: 20px; font-family: 'Playfair Display', serif;">New Password:</td>
                    <td width="80" style="padding: 15px;
    border: 1px solid #ddd;
    text-align: left; font-size: 20px; font-family: 'Playfair Display', serif;"><label for="txtnewpass"></label>
                        <input type="password" name="txtnewpass" id="txtnewpass" style=" padding: 10px;
    width: 300px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;" required placeholder="Enter New Password"
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}" 
    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
    <i id="togglePassword2" class="fas fa-eye" style="position: relative;
    top: -50px;
    left: 266px;"></i>
                    </td>
                </tr>
                <tr>
                    <td width="200" style="padding: 15px;
    border: 1px solid #ddd;
    text-align: left; font-size: 20px; font-family: 'Playfair Display', serif;">Confirm New Password:</td>
                    <td width="80" style="padding: 15px;
    border: 1px solid #ddd;
    text-align: left; font-size: 20px; font-family: 'Playfair Display', serif;"><label for="txtconnewpass"></label>
                        <input type="password" name="txtconnewpass" id="txtconnewpass" style=" padding: 10px;
    width: 300px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;" required placeholder="Reenter New Password"/>
    <i id="togglePassword3" class="fas fa-eye"
    style="position: relative;
    top: -50px;
    left: 266px;"></i>
                    </td>
                </tr>
                
               
</table>
<br>
<center>
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
      <td align="right">

<input type="submit" name="btnchangepass" value="Change"style="background-color: #f0934b;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;" 
     onmouseover="this.style.backgroundColor='#d35536'" 
            onmouseout="this.style.backgroundColor='#f0934b'"/>
      </td>
      
    </tr>
   </table>
</center>
</form>
  </center>
</body>

    <script>
  const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("txtoldpass");

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

<script>
  const togglePassword2 = document.getElementById("togglePassword2");
  const passwordInput2 = document.getElementById("txtnewpass");

  togglePassword2.addEventListener("click", function () {
    if (passwordInput2.type === "password") {
      passwordInput2.type = "text";
      togglePassword2.classList.remove("fa-eye");
      togglePassword2.classList.add("fa-eye-slash");
    } else {
      passwordInput2.type = "password";
      togglePassword2.classList.remove("fa-eye-slash");
      togglePassword2.classList.add("fa-eye");
    }
  });
</script>

<script>
  const togglePassword3 = document.getElementById("togglePassword3");
  const passwordInput3 = document.getElementById("txtconnewpass");

  togglePassword3.addEventListener("click", function () {
    if (passwordInput3.type === "password") {
      passwordInput3.type = "text";
      togglePassword3.classList.remove("fa-eye");
      togglePassword3.classList.add("fa-eye-slash");
    } else {
      passwordInput3.type = "password";
      togglePassword3.classList.remove("fa-eye-slash");
      togglePassword3.classList.add("fa-eye");
    }
  });
</script>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>