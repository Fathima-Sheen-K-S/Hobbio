

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	
require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

include("../Assets/Connection/Connection.php");

if(isset($_POST["btnregister"]))
{
    $name = $_POST["txtname"];
    $contact = $_POST["txtcontact"];
    $email = $_POST["txtemail"];
    $gender = $_POST["btngender"];
    $house = $_POST["txthousename"];
    $area = $_POST["txtarea"];
    $districtid = $_POST["sel_district"];
    $placeid = $_POST["sel_place"];
    $dob = $_POST["txtdob"];
    
    $photo = $_FILES["filephoto"]["name"];
    $tempphoto = $_FILES["filephoto"]["tmp_name"];
    move_uploaded_file($tempphoto, '../Assets/File/User/' . $photo);
    $password = $_POST["txtpassword"];

    $selu = "select * from tbl_center where center_email='" . $email . "'";
    $ru = $con->query($selu);
    $sela = "select * from tbl_admin where admin_email='" . $email . "'";
    $rua = $con->query($sela);
    $sel = "select * from tbl_user where user_email='" . $email . "'";
    $r = $con->query($sel);
    ?>
    
    <?php
  
    if ($ru->num_rows>0) {
        ?>
       <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Invalid Email",
      text: "Can't use this email for user registration. Please try using another email.",
      icon: "error"
    }).then(() => {
      window.location = "UserRegistration.php";
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
      text: "Can't use this email for user registration. Please try using another email.",
      icon: "error"
    }).then(() => {
      window.location = "UserRegistration.php";
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
        title: "Account Already Exists",
        text: "An account already exists for this email. Please use a different email.",
        icon: "error"
    }).then(() => {
        window.location = "UserRegistration.php";
    });
});
</script>






        <?php
    } 
    else{
        $insqry = "insert into tbl_user(user_name,user_contact,user_email,user_gender,user_house,user_area,city_id,user_photo,user_password,user_dob,user_doj)
        values('".$name."','".$contact."','".$email."','".$gender."','".$house."','".$area."',".$placeid.",'".$photo."','".$password."','".$dob."',curdate())";
        if ($con->query($insqry)) {
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
          
            $mail->addAddress($email);
          
            $mail->isHTML(true);
          
            $mail->Subject = "Welcome to HOBBIO...Follow your passion";
            $mail->Body = "Hello " .$name.",<br>Thank You for choosing HOBBIO .<br>Always gratefull to receive your profile.<br>You can use our website to learn your favorite extracurricular activity.<br>Follow Your Passion.<br><br>Thank you and HAPPY LEARNING...😊💕 ";
            if ($mail->send()) {
                echo "Sended";
            } else {
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
        } else {
            ?>
             <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>
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


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hobbio::NewUser</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
            max-width: 1000px;
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
        <h1>User Registration</h1>
        <div id="container">
            <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="" 
            onsubmit="return validateForm();">
                <center>
                    <table width="641" rules="none" align="center">
                        <tr>
                            <td width="301" style='font-size: 20px; font-family: "Playfair Display", serif;'>Name:</td>
                            <td width="324" style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtname"></label>
                                <input type="text" name="txtname" id="txtname" required placeholder="Enter Name" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" />
                            </td>
                        </tr>
                        <tr>
                            <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Contact:</td>
                            <td style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtcontact"></label>
                                <input type="text" name="txtcontact" id="txtcontact" required placeholder="Enter Contact Number" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" />
                            </td>
                        </tr>
                        <tr>
                            <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Email:</td>
                            <td style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtemail"></label>
                                <input type="email" name="txtemail" id="txtemail" required placeholder="Enter Email" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" />
                            </td>
                        </tr>
                      
                        <tr>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Gender:</td>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>
        <div style="display: flex; justify-content: space-between;">
            <label style="display: flex; align-items: center;">
                <input type="radio" name="btngender" id="male" required  value="Male" style="margin: 0 5px 0 0;" />
                Male
            </label>
            <label style="display: flex; align-items: center;">
                <input type="radio" name="btngender" id="female"  value="Female" style="margin: 0 5px 0 0;" />
                Female
            </label>
            <label style="display: flex; align-items: center;">
                <input type="radio" name="btngender" id="others" value="Others" style="margin: 0 5px 0 0;" />
                Others
            </label>
        </div>
    </td>
</tr>





    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>House Name:</td>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txthousename"></label>
      <input type="text" name="txthousename" id="txthousename" required placeholder="Enter House Name" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"/>
      </td>
    </tr>
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif ;'>Area:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtarea"></label>
      <input type="text" name="txtarea" id="txtarea" required placeholder="Enter Area" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"/>
      </td>
    </tr>
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>District:</td>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" required  onchange="getPlace(this.value)" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;">
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
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>City</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="sel_place"></label>
        <select name="sel_place" id="sel_place" required  style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;">
        <option value="">---Select---</option>
      </select>
      </td>
    </tr>
    <tr>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Date Of Birth:</td>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>
    <input type="date" name="txtdob" id="txtdob" required style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"/> </td>
    </tr>
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Photo:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtphoto"></label>
      <input type="file" name="filephoto" id="filephoto" required accept=".jpg, .jpeg, .png, .gif" 
      style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" /> </td>
    </tr>
    
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Password:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" required placeholder="Enter Password" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"
      

      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"

      />
      <i id="togglePassword" class="fas fa-eye"></i>
    </tr>

    
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
            url: "../Assets/AjaxPages/AjaxPlace.php?pid=" + did,
            success: function(html){
                $("#sel_place").html(html);
            }
        });
    }
</script>


<script>
function validateForm() {
    var name = document.getElementById("txtname").value;
    var contact = document.getElementById("txtcontact").value;
    var email = document.getElementById("txtemail").value;
    var house = document.getElementById("txthousename").value;
    var area = document.getElementById("txtarea").value;
    
        
       

    var namePattern = /^[A-Za-z\s.]+$/; // Valid characters: A-Z, a-z, spaces, hyphens, and single quotes
    var minNameLength = 2;
    var maxNameLength = 30;
    var housePattern = /^[A-Za-z0-9]+$/;
    var minHouseLength=2;
    var maxHouseLength= 50;
    var areaPattern = /^[A-Za-z\s,.]+$/;
    var minAreaLength=2;
    var maxAreaLength= 50;
    

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

    if (!housePattern.test(house)) {
        alert("House name contains invalid characters. Please use only letters and digits.");
        return false;
    }

    if (house.length < minHouseLength || house.length > maxHouseLength) {
        alert("House Name must be between " + minHouseLength + " and " + maxHouseLength + " characters.");
        return false;
    }

    if (!areaPattern.test(area)) {
        alert("Area name contains invalid characters. Please use only letters and spaces.");
        return false;
    }

    if (area.length < minAreaLength || area.length > maxAreaLength) {
        alert("Area must be between " + minAreaLength + " and " + maxAreaLength + " characters.");
        return false;
    }
   
    

    return true;
}

function validateEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}

// Example usage:
// const email = "example@email.com";
// if (validateEmail(email)) {
//     console.log("Valid email address.");
// } else {
//     console.log("Invalid email address.");
// }


</script>


<script> 
    const dobInput = document.getElementById("txtdob"); 
    dobInput.addEventListener("change", function() { 
      const selectedDate = new Date(dobInput.value); 
      const today = new Date(); 
      const age = today.getFullYear() - selectedDate.getFullYear(); 
 
      // Check if the user is at least 18 years old 
      if (selectedDate > today || age < 18) { 
       alert("You must be at least 18 years old."); 
        dobInput.value = ""; // Clear the input field 
      } else { 
        document.getElementById("dobError").textContent = ""; 
      } 
    }); 
 
    // Function to disable past dates 
    function disablePastDates() { 
      const today = new Date().toISOString().split('T')[0]; 
      dobInput.setAttribute('max', today); 
    } 
 
    disablePastDates(); 
  </script>


  <script> 
document.getElementById("filephoto").addEventListener("change", function() { 
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
