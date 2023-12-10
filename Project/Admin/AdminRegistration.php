<?php

		$adminid=0;
		$adminname="";
		$admincontact="";
		$adminemail="";
		$adminpassword="";
		include("../Assets/Connection/Connection.php");
		$message="";
		if(isset($_POST["btnsubmit"])){
			$adminid=$_POST["txtid"];
			$adminname=$_POST["txtname"];
			$admincontact=$_POST["txtcontact"];
			$adminemail=$_POST["txtemail"];
			$adminpassword=$_POST["txtpassword"];
			$selu = "select * from tbl_center where center_email='" . $adminemail . "'";
			$ru = $con->query($selu);
			$sela = "select * from tbl_admin where admin_email='" . $adminemail . "'";
			$rua = $con->query($sela);
			$sel = "select * from tbl_user where user_email='" . $adminemail . "'";
			$r = $con->query($sel);
			?>
			<?php
  
    if ($ru->num_rows>0) {
        ?>
       <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Invalid Email",
      text: "Can't use this email for admin registration. Please try using another email.",
      icon: "error"
    }).then(() => {
      window.location = "AdminRegistration.php";
    });
  });
</script>
        <?php
    }
    else if ($rua->num_rows>0) {
        ?>
		 <script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        title: "Account Already Exists",
        text: "An account already exists for this email. Please use a different email.",
        icon: "error"
    }).then(() => {
        window.location = "AdminRegistration.php";
    });
});
</script>
      
        <?php
    }
     else if ($r->num_rows>0) {

        ?>
       
	   <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Invalid Email",
      text: "Can't use this email for admin registration. Please try using another email.",
      icon: "error"
    }).then(() => {
      window.location = "AdminRegistration.php";
    });
  });
</script>






        <?php
    } 
    else{
			
				$insqry="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)
				values('".$adminname."','".$admincontact."','".$adminemail."','".$adminpassword."')";
				if($con->query($insqry))
				{?>
					<script>
					Swal.fire({
					  title: "Successfully registered",
					  icon: "success"
					}).then(() => {
					  window.location = "Login.php";
					});
				  </script>
				  <?php
				}
				else
				{
					?>
           
            <script>
  Swal.fire({
    title: "Registration Failed",
    icon: "error"
  }).then(() => {
    window.location = "AdminRegistration.php";
  });
</script>
            <?php
				}
		}

	}








?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Hobbio::Admin Registration</title>
<style>
        body {
            background: linear-gradient(to right, #f65d5f, #f78a33);
            font-family: 'Playfair Display', serif;
            color: white;
        }

        h1 {
            font-size: 36px;
        }

        #container {
            max-width: 700px;
            background-color: #dab79024;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            margin-top: 20px;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #f0934b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: rgb(98, 36, 31, 75%);
        }
    </style>
</head>

<body>
	<center>
	<h1>Center Registration</h1>
	<div id="container">
		
<form id="form1" name="form1" method="post" action="" onsubmit="return validateForm();">
<center>
<input type="hidden" name="txtid" value="<?php echo $adminid?>" />
  <table width="343" height="190" rules="none">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value="<?php echo $adminname?>" autocomplete="off"
	  required placeholder="Enter Name"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $admincontact?>" autocomplete="off"
	  required placeholder="Enter Contact"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail" value="<?php echo $adminemail?>" autocomplete="off"
	  required placeholder="Enter Email"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" value="<?php echo $adminpassword?>"autocomplete="off"
	  required placeholder="Enter Password"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><?php echo $message ?></td>
    
  </tr>
  </table>
  <a href="index.php" style="text-decoration: none; /* Remove the underline */
    color: white; /* Text color */
    font-weight: bold; /* Bold text */
    font-size: 16px; /* Font size */
    padding: 5px 10px; /* Padding around the text */
    background-color: rgb(244 67 54 / 75%); /* Background color */
    border-radius: 5px; /* Rounded corners */
    transition: background-color 0.3s, color 0.3s; /* Smooth hover transition */">Home</a>
  </center>
</form>
		
	</div>
	</center>

</body>

<script>
function validateForm() {
    var name = document.getElementById("txtname").value;
    var contact = document.getElementById("txtcontact").value;
    var email = document.getElementById("txtemail").value;
   
    var namePattern = /^[A-Za-z\s.]+$/; // Valid characters: A-Z, a-z, spaces, hyphens, and single quotes
    var minNameLength = 2;
    var maxNameLength = 30;
    

    if (!namePattern.test(name)) {
        alert("Name contains invalid characters. Please use only letters, spaces, and dots.");
        return false;
    }

    if (name.length < minNameLength || name.length > maxNameLength) {
        alert("Name must be between " + minNameLength + " and " + maxNameLength + " characters.");
        return false;
    }

    var numericPattern = /^\d{10}$/;
    if (!numericPattern.test(contact)) {
        alert("Contact number should be exactly 10 digits and contain only numbers from 0 to 9.");
        return false;
    }

    if (!validateEmail(email)) {
            alert("Please enter a valid email address.");
            return false;
    }

   
    return true;
}

function validateEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}
</script>

</html>