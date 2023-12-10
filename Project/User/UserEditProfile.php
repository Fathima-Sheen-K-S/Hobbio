<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");


$userid=$_SESSION['uid'];
$msg="";


if(isset($_POST["btnupdate"]))
{
	
	$usrname=$_POST["txtname"];
	$usremail=$_POST["txtemail"];
	$usrcontact=$_POST["txtcontact"];
	$usrhouse=$_POST["txthousename"];
  $usrarea=$_POST["txtarea"];
	$usrdob=$_POST["txtdob"];
	$cityid=$_POST["sel_place"];
	if(file_exists($_FILES['filephoto']["tmp_name"]))
	{
		$selphoto=$_FILES["filephoto"]["name"];
		$tempphoto=$_FILES["filephoto"]["tmp_name"];
		move_uploaded_file($tempphoto,'../Assets/File/User/'.$selphoto);
		$photoupd="update tbl_user set user_photo='".$selphoto."' where user_id=".$userid;
		$con->query($photoupd);
	}
    $updqry="update tbl_user set user_name='".$usrname."',user_email='".$usremail."',user_dob='".$usrdob."',user_contact='".$usrcontact."',user_house='".$usrhouse."',user_area='".$usrarea."',city_id='".$cityid."' where user_id=".$userid."";
    if($con->query($updqry))
   {
	 ?>
   <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Profile Updated",
      text: "Your profile has been updated successfully.",
      icon: "success"
    }).then(() => {
      window.location = "UserEditProfile.php";
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
      title: "Profile Updation Failed",
      text: "Failed to update your profile. Please try again.",
      icon: "error"
    }).then(() => {
      window location = "UserEditProfile.php";
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
<title>Hobbio::User Edit profile</title>
<link rel="stylesheet" href="UserEditProfile.css">
</head>

<body>
<center>
<h3>Edit Your Profile</h3><br>
<div >
    <div style=" max-width: 700px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;">
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style=" display: flex;
    flex-direction: column;" onsubmit="return validateForm();">


<?php

$sel="select *from tbl_user u inner join tbl_city c on u.city_id=c.city_id inner join tbl_district d on c.district_id=d.district_id where user_id=".$userid;
$editres=$con->query($sel);
$editrow=$editres->fetch_assoc();
$uphoto=$editrow['user_photo'];
$uname=$editrow['user_name'];
$uemail=$editrow['user_email'];
$ucontact=$editrow['user_contact'];
$uhouse=$editrow['user_house'];
$uarea=$editrow['user_area'];
$udob=$editrow['user_dob'];
	
?>
  <center>
  <table width="400" rule="none">
      <tr>
      <!-- <td>Photo:</td> -->
      <td colspan="2" width="90" align="center">
      <img src="../Assets/File/User/<?php echo $uphoto; ?>" width="200" height="200"/>
      <input type="file" name="filephoto"  id="filephoto" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;" accept=".jpg, .jpeg, .png, .gif" /></td>
      </tr>
    <tr>
      <td width="167" style='font-size: 20px; font-family: "Playfair Display", serif;'>Name:</td>
      <td width="146"><label for="txtname" style="margin-bottom: 5px;
    color: #555;"></label>
      <input type="text" name="txtname" id="txtname" value="<?php echo $uname?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"/></td>
    </tr>
    <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Email:</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" value="<?php echo $uemail?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"/></td>
    </tr>
    <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Contact:</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $ucontact ?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"></td>
    </tr>
     <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Date Of Birth:</td>
      <td><label for="txtdob"></label>
      <input type="date" name="txtdob" id="txtdob" value="<?php echo $udob ?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;">
    </td>
    </tr>
    
    <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>House Name:</td>
      <td><label for="txthousename"></label>
      <input type="text" name="txthousename" id="txthousename" value="<?php echo $uhouse ?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"></td>
    </tr>

    <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Area:</td>
      <td><label for="txtarea"></label>
      <input type="text" name="txtarea" id="txtarea" value="<?php echo $uarea ?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"></td>
    </tr>
    
    <tr>
    <td style='font-size: 20px; font-family: "Playfair Display", serif;'>District:</td>
    <td>
    <select name="ddldistrict" id="ddldistrict" onChange="getPlace(this.value)" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;">
    <option selected disabled value="<?php echo $editrow['district_id'];?>"><?php echo $editrow['district_name'];?></option>
    <?php
	$dselqry="select *from tbl_district";
	$dresult=$con->query($dselqry);
	while($drow=$dresult->fetch_assoc())
	{?>
    <option value="<?php echo $drow['district_id']?>"><?php echo $drow['district_name']?></option>
    <?php
	}
	?>
    </select>
    </td>
    </tr>
     <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>City :</td>
      <td>
        <select name="sel_place" id="sel_place" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;">
       <option value="<?php echo $editrow['city_id']; ?>"><?php echo $editrow['city_name']; ?></option>
        <?php 
	   $cselqry="SELECT *FROM tbl_city where district_id=".$editrow['district_id']."";
	   $creslt=$con->query($cselqry);
	   while($crow=$creslt->fetch_assoc())
	   {?>
       <option value= "<?php echo $crow['city_id']?>"> <?php echo $crow['city_name']?></option>
       <?php }?>
       </select>
      </td>
    </tr>
   <tr>&nbsp;</tr>
   </table>
   <br>
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
   <input type="submit" name="btnupdate" id="btnupdate" value="Update" style="background-color: #f0934b;
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
</div>
</div>

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

<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>