<?php
ob_start();
include('Head.php');

include("../Assets/Connection/Connection.php");

if(isset($_GET['iid'])){
$_SESSION['courid']=$_GET['iid'];
header('location:CenterGallery.php');
}

if(isset($_POST["btnsubmit"])){

	$img=$_FILES["fileimage"]["name"];
	$tempimg=$_FILES["fileimage"]["tmp_name"];
	move_uploaded_file($tempimg,'../Assets/File/Center/'.$img);
	$insqry="insert into tbl_gallery(gallery_image,course_id) values('".$img."',".$_SESSION['courid'].")";
	if($con->query($insqry))
	{
		?>
        <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Image Added",
      icon: "success"
    }).then(() => {
      window.location = "CenterGallery.php";
    });
  });
</script>
            <?php
		
		
		
	 }
	else
	{
        ?>
       <script>
  Swal.fire({
    title: "Image Added",
    icon: "success"
  }).then(() => {
    window.location = "CenterGallery.php";
  });
</script>
        <?php
	}
        
		
}


if(isset($_GET['gid']))
		{
			$delqry="delete from tbl_gallery where gallery_id=".$_GET['gid'];
			if($con->query($delqry))
			{ 
				?>
        		<script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Image Deleted",
      icon: "success"
    }).then(() => {
      window.location = "CenterGallery.php";
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
      title: "Failed",
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Hobbio::Center Gallery</title>
</head>

<body>
<center>
<div style="max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fdb07d;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;"><br>
<h3 style="color: white; font-size: 35px;">Add Images</h3><br>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" rules="none" style="  width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;">
    <tr>
      <th style=" padding: 10px;
        text-align: left; font-family: 'Playfair Display', serif; font-size:18px; color:black">Images</th>
      <td><label for="fileimage"></label>
        <input type="file" name="fileimage" id="fileimage" style="width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px; font-family: 'Playfair Display', serif; font-size:18px;"
        required accept=".jpg, .jpeg, .png, .gif"/></td>
    </tr><br>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" style="
 
 color: white;
 border:none;
 border-radius: 5px;
 padding: 10px 20px; 
 cursor: pointer;
  background-color: #d35536"
 onmouseover="this.style.backgroundColor='#f0934b'" 
         onmouseout="this.style.backgroundColor='#d35536'"/></td>
      </tr>
  </table>
</form>
<br><br>
<div style="width: 80%;
    margin: 20px auto;
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
			background-color: #d35536;
            padding: 20px;">
<table style=" width: 100%;
    border-collapse: collapse;
	padding: 10px;
    text-align: center;">
<tr style="background-color: #d35536;
    color: white;
	padding: 10px;
    text-align: center;">
<td style="padding: 10px;padding: 10px;
    text-align: center;font-size: 14px; font-family: 'Playfair Display', serif; font-size:25px;">Images</td>
<td style="padding: 10px;padding: 10px;
    text-align: center;font-size: 14px; font-family: 'Playfair Display', serif; font-size:25px;">Action</td>
</tr>
<tr style="background-color: #d35536;
    color: white;padding: 10px;
    text-align: center;">
<?php
$selqry="select *from tbl_gallery where course_id=".$_SESSION['courid'];
$res=$con->query($selqry);
while($row=$res->fetch_assoc())
{
	?>
	 <td style="background-color:#d35536;
    color: #d35536;padding: 10px;
    text-align: center;"><img src="../Assets/File/Center/<?php echo $row['gallery_image']; ?>" width="100" style="max-width: 100px;
    height: auto;
    border: 1px solid #ddd;
    border-radius: 8px;"/></td> 
      <td align="center" style="background-color: #d35536;
    color: #d35536;padding: 10px;
    text-align: center;"><a href="CenterGallery.php?gid=<?php echo $row['gallery_id']?>" style="color: white; /* Change 'red' to your desired color */
  text-decoration: none;font-family: 'Playfair Display', serif; font-size:18px;">DELETE</a><br />
     </tr>
     <?php
}
	 
?>
</table>
</div>
<br><br><br>
<center>
	<table>
	<tr>
		<td>
		<a href="CenterHome.php" style="
 
 color: white;
 border:none;
 border-radius: 5px;
 padding: 10px 20px; 
 cursor: pointer;
  background-color: #d35536"
 onmouseover="this.style.backgroundColor='#f0934b'" 
         onmouseout="this.style.backgroundColor='#d35536'">Home</a><br /><br />
		</td>
</tr>
	</table>
</center>
</div>
</center>
<script> 
document.getElementById("fileimage").addEventListener("change", function() { 
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
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>