<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	
require'../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';


include("../Assets/Connection/Connection.php");
if(isset($_POST["btnregister"])){
$cpassword=$_POST["txtpassword"];
$repassword=$_POST["txtcpassword"];
if($cpassword!=$repassword)
{
		?>
		<script>
		alert("PLEASE ENTER THE CORRECT PASSWORD");
		</script>
        <?php
}
else
{
  

	$cname=$_POST["txtcname"];
	$cemail=$_POST["txtemail"];
	$ccontact=$_POST["txtcontact"];
	$ctype=$_POST["sel_type"];
	$cdistrictid=$_POST["sel_district"];
	$cplaceid=$_POST["sel_place"];
	$carea=$_POST["txtarea"];
  $cbuilding=$_POST["txtbuild"];
  $cland=$_POST["txtland"];
	$logo=$_FILES["filelogo"]["name"];
	$templogo=$_FILES["filelogo"]["tmp_name"];
	move_uploaded_file($templogo,'../Assets/File/Center/'.$logo);
	
	$proof=$_FILES["fileproof"]["name"];
	$tempproof=$_FILES["fileproof"]["tmp_name"];
	move_uploaded_file($tempproof,'../Assets/File/Center/'.$proof);
	
  $password=$_POST["txtpassword"];

  $selu="select *from tbl_user where user_email='".$cemail."'";
  $ru=$con->query($selu);
  $sela = "select * from tbl_admin where admin_email='" . $cemail . "'";
    $rua = $con->query($sela);
    $sel="select *from tbl_center where center_email='".$cemail."'";
	$r=$con->query($sel);

  if($ru->num_rows>0)
  {
    ?>
    <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Invalid Email",
      text: "Can't use this email for center registration. Please try using another email.",
      icon: "error"
    }).then(() => {
      window.location = "CenterRegistration.php";
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
      title: "Invalid Email",
      text: "Can't use this email for center registration. Please try using another email.",
      icon: "error"
    }).then(() => {
      window.location = "CenterRegistration.php";
    });
  });
</script>
        <?php
    }
    
  
  
	
	
	else if($r->num_rows>0)
	{
		?>
        <script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        title: "Account Already Exists",
        text: "An account already exists for this email. Please use a different email.",
        icon: "error"
    }).then(() => {
        window.location = "CenterRegistration.php";
    });
});
</script>
        <?php
	}
	else
	{

	

	$insqry="insert into tbl_center(center_name,center_contact,center_type,center_area,center_building,center_landmark,center_logo,center_proof,center_email,center_password,city_id,center_doj)
	 values('".$cname."','".$ccontact."','".$ctype."','".$carea."','".$cbuilding."','".$cland."','".$logo."','".$proof."','".$cemail."',
	'".$cpassword."',".$cplaceid.",curdate())";
	
	if($con->query($insqry))
	{
		//Email Code Start
		$mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hobbiomini@gmail.com'; // Your gmail
    $mail->Password = 'itunzneuztnyzahb'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('hobbiomini@gmail.com'); // Your gmail
  
    $mail->addAddress($cemail);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Welcome to HOBBIO...Follow your passion";
    $mail->Body = "Hello " .$cname.",<br>Thank You for choosing HOBBIO .<br>Always gratefull to receive your profile.<br>You can use our website to teach the extracurricular activities you provide.<br><br>Thank you and HAPPY TEACHING...😊💕 ";
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
  //Email Code End
  ?>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>
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
		?> <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>
    <script>
Swal.fire({
title: "Registration Failed",
icon: "error"
}).then(() => {
window.location = "UserRegistration.php";
});
</script>
            <?php
	}
}  
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
<title>Hobbio::NewCenter</title>
</head>
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

<body>
  <center>
  <h1>Center Registration</h1>
  <div id="container">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" 
onsubmit="return validateForm();">
<center>
  <table width="462" height="361" rules="none" align="center">
  
    <tr>
      <td width="212"  style='font-size: 20px; font-family: "Playfair Display", serif;'>Center Name:</td>
      <td width="234"  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtcname"></label>
      <input type="text" name="txtcname" id="txtcname" required placeholder="Enter Name" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" autocomplete="off"/></td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><p>Email:</p></td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail" required placeholder="Enter Email" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" autocomplete="off"/></td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Contact:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" required placeholder="Enter Contact Number" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" autocomplete="off" /></td>
    </tr>
    <tr>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Type Of Center:</td>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><select name="sel_type" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;" required >
    <option value="">---select---</option>
    <option value="Individual">Individual</option>
    <option value="Group">Group</option>
    </select>
    </td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>District:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="sel_district"></label>
        <select name="sel_district" id="sel_district"  onchange="getPlace(this.value)" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;" required >
         <option value="">---select---</option> 
       <?php
		$seldistrict="select *from tbl_district";
		$resdis=$con->query($seldistrict);
		while($rowdis=$resdis->fetch_assoc())
		{
		?>
      
        <option value="<?php echo $rowdis['district_id'] ?>"> <?php echo $rowdis['district_name']?></option> 
        <?php
		}
		?> 
      </select></td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><p>City:</p></td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="sel_place"></label>
        <select name="sel_place" id="sel_place" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;" required >
         <option value="">---Select---</option>
      </select></td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Area:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtarea"></label>
      <input type="text" name="txtarea" id="txtarea" required placeholder="Enter Area" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" autocomplete="off"/></td>
    </tr>

    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Building:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtbuild"></label>
      <input type="text" name="txtbuild" id="txtbuild" required placeholder="Enter Building" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" autocomplete="off"/></td>
    </tr>

    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Landmark:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtland"></label>
      <input type="text" name="txtland" id="txtland" required placeholder="Enter Landmark" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" autocomplete="off"/></td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Logo:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="filelogo"></label>
      <input type="file" name="filelogo" id="filelogo"  style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;" required accept=".jpg, .jpeg, .png, .gif" /></td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><p>Proof:</p></td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="fileproof"></label>
      <input type="file" name="fileproof" id="fileproof"  required style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"
    accept=".jpg, .jpeg, .png, .gif, .pdf" /></td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Password:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" required placeholder="Enter Password"
      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}"
       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
       <i id="togglePassword" class="fas fa-eye"></i></td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Confirm Password:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtcpassword"></label>
      <input type="password" name="txtcpassword" id="txtcpassword" required placeholder="Password To Reconfirm"/>
      <i id="togglePassword2" class="fas fa-eye"></i></td>
    </tr>
    
    <!-- <tr>
      <td colspan="2"align="center"  style='font-size: 20px; font-family: "Playfair Display", serif;'><input type="submit" name="btnregister" id="btnregister" value="Register" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr> -->
    
   
  </table>
</center>
<center>
  <table>
  <tr>
    <td align="center">
   <input type="submit" name="btnregister" id="btregister" value="Register" style="background-color: #f0934b;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;" 
     onmouseover="this.style.backgroundColor='rgb(98 36 31 / 75%)'" 
            onmouseout="this.style.backgroundColor='rgb(244 67 54 / 75%)'"/>
      </td>
      <td align="center">
   <input type="reset" name="btncancel" id="btncancel" value="Cancel" style="background-color: #f0934b;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;" 
     onmouseover="this.style.backgroundColor='rgb(98 36 31 / 75%)'" 
            onmouseout="this.style.backgroundColor='rgb(244 67 54 / 75%)'"/>
      </td>
     
      
    </tr>
   </table>
   <a href="../index.php" style="text-decoration: none; /* Remove the underline */
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
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
		}
	});
}
</script>

<script>
function validateForm() {
    var name = document.getElementById("txtcname").value;
    var contact = document.getElementById("txtcontact").value;
    var email = document.getElementById("txtemail").value;
    var building = document.getElementById("txtbuild").value;
    var area = document.getElementById("txtarea").value;
    var landmark=document.getElementById("txtland").value;
    
        
       

    var namePattern = /^[A-Za-z\s.]+$/; // Valid characters: A-Z, a-z, spaces, hyphens, and single quotes
    var minNameLength = 2;
    var maxNameLength = 30;
    var buildPattern = /^[A-Za-z0-9 ]+$/;
    var minBuildLength=2;
    var maxBuildLength= 50;
    var areaPattern = /^[A-Za-z\s,.]+$/;
    var minAreaLength=2;
    var maxAreaLength= 50;
    var landPattern = /^[A-Za-z\s,.]+$/;
    var minLandLength=2;
    var maxLandLength= 50;
    

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

    if (!buildPattern.test(building)) {
        alert("Building name contains invalid characters. Please use only letters and digits.");
        return false;
    }

    if (building.length < minBuildLength || building.length > maxBuildLength) {
        alert("Building Name must be between " + minBuildLength + " and " + maxBuildLength + " characters.");
        return false;
    }

    if (!areaPattern.test(area)) {
        alert("Area name contains invalid characters. Please use only letters,spaces,commas and dots.");
        return false;
    }

    if (area.length < minAreaLength || area.length > maxAreaLength) {
        alert("Area must be between " + minAreaLength + " and " + maxAreaLength + " characters.");
        return false;
    }
   
    if (!landPattern.test(landmark)) {
        alert("Landmark contains invalid characters. Please use only letters,spaces,commas and dots.");
        return false;
    }

    if (landmark.length < minLandLength || landmark.length > maxLandLength) {
        alert("Landmark must be between " + minLandLength + " and " + maxLandLength + " characters.");
        return false;
    }
    

    return true;
}

function validateEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}
</script>

<script> 
document.getElementById("filelogo").addEventListener("change", function() { 
    var fileInput = this; 
   
 
    if (fileInput.files.length > 0) { 
        var file = fileInput.files[0]; 
        var allowedTypes = ["image/jpeg", "image/jpg", "image/png", "image/gif"]; 
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes 
 
        if (allowedTypes.indexOf(file.type) === -1) { 
            alert("Invalid file type. Please select a jpg, jpeg, png, or gif file."); 
            fileInput.value = ""; // Clear the input 
        } else if (file.size > maxSize) { 
            alert("File size exceeds 5 MB. Please select a smaller file."); 
            fileInput.value = ""; // Clear the input 
        } 
    } 
}); 
</script>

<script> 
document.getElementById("fileproof").addEventListener("change", function() { 
    var fileInput = this; 
   
 
    if (fileInput.files.length > 0) { 
        var file = fileInput.files[0]; 
        var allowedTypes = ["image/jpeg", "image/jpg", "image/png", "image/gif","application/pdf"]; 
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes 
 
        if (allowedTypes.indexOf(file.type) === -1) { 
            alert("Invalid file type. Please select a jpg, jpeg, png,gif or pdf file."); 
            fileInput.value = ""; // Clear the input 
        } else if (file.size > maxSize) { 
            alert("File size exceeds 5 MB. Please select a smaller file."); 
            fileInput.value = ""; // Clear the input 
        } 
    } 
}); 
</script>






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

<script>
  const togglePassword2 = document.getElementById("togglePassword2");
  const passwordInput2 = document.getElementById("txtcpassword");

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