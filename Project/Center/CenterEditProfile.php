<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");


$centerid=$_SESSION['cid'];



if(isset($_POST["btnupdate"]))
{
	
	$centername=$_POST["txtname"];
	$centeremail=$_POST["txtemail"];
	$centertype=$_POST["seltype"];
	$centercontact=$_POST["txtcontact"];
	$centerarea=$_POST["txtarea"];
  $centerbuilding=$_POST["txtbuild"];
  $centerland=$_POST["txtland"];
		$cityid=$_POST["sel_place"];
		if(file_exists($_FILES['filelogo']["tmp_name"]))
	{
		$selphoto=$_FILES["filelogo"]["name"];
		$tempphoto=$_FILES["filelogo"]["tmp_name"];
		move_uploaded_file($tempphoto,'../Assets/File/Center/'.$selphoto);
		$photoupd="update tbl_center set center_logo='".$selphoto."' where center_id=".$centerid;
		$con->query($photoupd);
	}
    $updqry="update tbl_center set center_name='".$centername."',center_email='".$centeremail."',center_type='".$centertype."',center_contact='".$centercontact."',center_area='".$centerarea."',center_building='".$centerbuilding."',center_landmark='".$centerland."' where center_id=".$centerid."";
    if($con->query($updqry))
   {
    ?>
   <script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Profile Updated",
    icon: "success"
  }).then(() => {
    window.location = "CenterEditProfile.php";
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
      icon: "error"
    }).then(() => {
      window.location = "CenterEditProfile.php";
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
<title>Hobbio::Center Edit Profile</title>
</head>

<body>
<center><h3>Edit Profile</h3></center><br>
<center>


<div >
    <div style=" max-width: 700px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;">
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style=" display: flex;
    flex-direction: column;" onsubmit="return validateForm();">

<?php
$sel="select *from tbl_center ce inner join tbl_city c on ce.city_id=c.city_id inner join tbl_district d on c.district_id=d.district_id where center_id=".$centerid;
$editres=$con->query($sel);
$editrow=$editres->fetch_assoc();
$clogo=$editrow['center_logo'];
$cname=$editrow['center_name'];
$cemail=$editrow['center_email'];
$ctype=$editrow['center_type'];
$ccontact=$editrow['center_contact'];
$carea=$editrow['center_area'];
$cbuild=$editrow['center_building'];
$cland=$editrow['center_landmark'];
	
?>
  <center>
  <table width="400" rules="none">
      <tr>
      <!-- <td>Logo:</td> -->
      <td  colspan="2" width="90" align="center"><img src="../Assets/File/Center/<?php echo $editrow['center_logo']; ?>"  width="210" height="200" style="border-radius: 10px; padding: 10px;"/>
      <input type="file" name="filelogo" id="filelogo" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;" accept=".jpg, .jpeg, .png, .gif"/></td>
      </tr>
    <tr>
      <td width="167" style='font-size: 20px; font-family: "Playfair Display", serif;'>Name:</td>
      <td width="146"><label for="txtname" style="margin-bottom: 5px;
    color: #555;"></label>
      <input type="text" name="txtname" id="txtname" value="<?php echo $cname?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"/></td>
    </tr>
    
    <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Email:</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail" value="<?php echo $cemail?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"/></td>
    </tr>
    
    <tr>
      <td width="167" style='font-size: 20px; font-family: "Playfair Display", serif;'>Type:</td>
      <td width="146"><label for="seltype"></label>
     <!--<input type="text" name="txttype" id="txttype" value=""/>-->
     <select name="seltype" id="seltype" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;">
    <option value="">---select---</option>
    <option value="Individual" <?php if ($ctype == "Individual") echo 'selected="selected"'; ?>>Individual</option>
    <option value="Group" <?php if ($ctype == "Group") echo 'selected="selected"'; ?>>Group</option>
</select></td>
    </tr>
    <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Contact:</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $ccontact ?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"></td>
    </tr>
    <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Area:</td>
      <td><label for="txtarea"></label>
      <input type="text" name="txtarea" id="txtarea" value="<?php echo $carea ?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"></td>
    </tr>
    <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Building:</td>
      <td><label for="txtbuild"></label>
      <input type="text" name="txtbuild" id="txtbuild" value="<?php echo $cbuild ?>" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;"></td>
    </tr>
    <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Landmark:</td>
      <td><label for="txtland"></label>
      <input type="text" name="txtland" id="txtland" value="<?php echo $cland ?>" style="padding: 10px;
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
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>City:</td>
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
    
    
  </table>
<br>
  <table>
    <tr>
    <td align="left">

    
<h5> <a href="CenterHome.php" style="
 
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
</center>
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
   console.log('hello');
 
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