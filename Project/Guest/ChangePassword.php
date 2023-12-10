<?php
 session_start();  
 include("../Assets/Connection/Connection.php");
 $email=$_GET['eid'];
 if(isset($_POST["btnsubmit"]))
{
    $pass=$_POST["txtnewpwd"];
    $conpass=$_POST["txtconpwd"];	
	
	if($pass!=$conpass)
    {?>
	<script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Password Mismatch",
      text: "The new password and confirm password do not match.",
      icon: "error"
    });
  });
</script>
    <?php
    }
   else
    {  
     $cusqry="select *from tbl_user where user_email='".$email."'";
	 $cusres=$con->query($cusqry);
	 if($cusrow=$cusres->fetch_assoc())
     {
	  $upqry="update tbl_user set user_password='".$pass."' where user_email='".$email."'";
	  $con->query($upqry);
	 }
    $selqry="select *from tbl_center where center_email='".$email."' ";
	$res=$con->query($selqry);
	if($row=$res->fetch_assoc())
	   {
		$upqry="update tbl_center set center_password='".$pass."' where center_email='".$email."'";
        $con->query($upqry);
	   }
	   ?><script>
     document.addEventListener("DOMContentLoaded", function() {
       Swal.fire({
         title: "Password Updated",
         icon: "success"
       }).then(() => {
         window.location = "Login.php";
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
<title>Hobbio::Change Password</title>
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
			height:60%;
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

        #btnnotp {
            background: linear-gradient(to right, #f78a33,#f65d5f);
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
        }

        #btnnotp:hover {
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
<form id="form1" name="form1" method="post" action="">
<table width="285" b rules="none" cellpadding="10px">
   <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>New Password:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>
      <input type="password" name="txtnewpwd" id="txtnewpwd" 
      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}"
       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
       <i id="togglePassword" class="fas fa-eye" style="color:orange;
       left: 133px;
    top: -32px;
    position: relative;"></i></td></td>
    </tr>
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Confirm New Password:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>
      <input type="password" name="txtconpwd" id="txtconpwd" />
      <i id="togglePassword2" class="fas fa-eye" style="color:orange;
      left: 133px;
    top: -32px;
    position: relative;"></i></td>
    </tr>
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;' colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Update" 
      style="background: linear-gradient(to right, #f78a33,#f65d5f);
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;"/></td>
    </tr>
</table>
</form>
</div>

</body>

<script>
  const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("txtnewpwd");

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
  const passwordInput2 = document.getElementById("txtconpwd");

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
</html>