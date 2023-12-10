<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

if(isset($_GET['coid']))
{
	$_SESSION['couid']=$_GET['coid'];
	header('location:CenterPackageAdd.php');
}

$packid=0;
$packname="";
$packduration="";
$packcost="";
$packdet="";


if(isset($_POST["btninsert"]))
{ 
	$packid=$_POST["txtid"];
	$packname=$_POST["txtpname"];
	$packduration=$_POST["txtpduration"];
	$packcost=$_POST["txtpcost"];
	$packdet=$_POST["txtpdetails"];
	
	if($packid==0)
	{
	$insqry="insert into tbl_package(package_name,package_duration,package_cost,package_details,course_id) values('".$packname."','".$packduration."',".$packcost.",'".$packdet."',".$_SESSION['couid'].")";
	
	
	if($con->query($insqry))
		{
			?>
     <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Package Added",
      icon: "success"
    }).then(() => {
      window.location.href = "CenterPackageAdd.php";
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
      title: "Insertion Failed",
      icon: "error"
    }).then(() => {
      window.location.href = "CenterPackageAdd.php";
    });
  });
</script>
        <?php
		
        
		}
    }
else
{
	$updqry="update tbl_package set package_name='".$packname."',package_cost=".$packcost.",package_duration='".$packduration."',package_details='".$packdet."' where package_id=".$packid;
	if($con->query($updqry))
			 	{
					?>
        			<script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Updated",
      icon: "success"
    }).then(() => {
      window.location.href = "CenterPackageAdd.php";
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
      title: "Update Failed",
      icon: "error"
    });
  });
</script>
           			<?php
				}
	
	
	
}
}
if(isset($_GET['did']))
{
    ?>
			<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Remove Package",
    text: "Do you want to remove this package?",
    icon: "question",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "CenterPackageAdd.php?diid=<?php echo $_GET['did'];?>";
    } else {
      Swal.fire("Deletion Prevented", "", "info");
    }
  });
});
</script>
				<?php
}

if(isset($_GET['diid']))
{
	
	$delqry="delete from tbl_package where package_id=".$_GET['diid'];
	if($con->query($delqry))
	{ 
		?>
       <script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Package Deleted",
    icon: "success"
  }).then(() => {
    window.location = "CenterPackageAdd.php";
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











if(isset($_GET['eid']))
		{
			
			$sel="select *from tbl_package where package_id=".$_GET['eid'];
		    $editres=$con->query($sel);
			$rowedit=$editres->fetch_assoc();
			$packid=$rowedit['package_id'];
			$packname=$rowedit['package_name'];
			$packduration=$rowedit['package_duration'];
			$packcost=$rowedit['package_cost'];
			$packdet=$rowedit['package_details'];
			
		}








?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Hobbio::Center Add Package</title>
</head>



<body>
<center>
<div style="max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fdb07d;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;"><br>
<h2 style="color:white;">Add Your Packages</h2>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="txtid" value="<?php echo $packid?>" />
<table width="450" height="197" rules="none" style="  width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                border-radius: 8px;
                border-spacing: 10px; /* Add spacing between table cells */
                border-collapse: separate; /* Separate border for each cell */
            ">
  <tr>
    <th style=" padding: 10px;
        text-align: left; font-family: 'Playfair Display', serif; font-size:18px;">Package Name</th>
    <td ><label for="txtpname"></label>
    <input type="text" name="txtpname" id="txtpname" value="<?php echo $packname?>"  style="width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px; font-family: 'Playfair Display', serif; font-size:18px;"
        required placeholder="Enter Package Name" autocomplete="off"/></td>
  </tr><br>
  <tr>
    <th style=" padding: 10px;
        text-align: left; font-family: 'Playfair Display', serif; font-size:18px;">Package Duration</th>
    <td><label for="txtpduration"></label>
      <input type="text" name="txtpduration" id="txtpduration" value="<?php echo $packduration?>"  style="width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px; font-family: 'Playfair Display', serif; font-size:18px;"
        required placeholder="Enter Package Duration" autocomplete="off"/></td>
  </tr>
  <tr>
    <th style=" padding: 10px;
        text-align: left; font-family: 'Playfair Display', serif; font-size:18px;">Package Cost</th>
    <td><label for="txtpcost"></label>
      <input type="number" name="txtpcost" id="txtpcost" value="<?php echo $packcost?>"  style="width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px; font-family: 'Playfair Display', serif; font-size:18px;"
        required placeholder="Enter Package Cost" autocomplete="off"/></td>
  </tr>
  <tr>
    <th style=" padding: 10px;
        text-align: left; font-family: 'Playfair Display', serif; font-size:18px;">Package Details</th>
    <td><label for="txtpdetails"></label>
      <textarea name="txtpdetails" id="txtpdetails" cols="25" rows="3"  style="width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px; font-family: 'Playfair Display', serif; font-size:18px;"
        required placeholder="Enter Package Details"><?php echo $packdet?></textarea></td>
  </tr><br>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btninsert" id="btninsert" value="Insert"  style="
 
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


<br />



</form><br><br>
<h2 style="color:white;">List Of Courses</h2><br>
<div style="background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 20px;
  margin: 10px;">

<table border="1"  style="width: 100%;
  border-collapse: collapse;border: 1px solid #ccc;">
<tr>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">SL.No</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Course Name</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Package Name</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Package Duration</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Package Cost</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Package Details</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Action</th>
</tr>
<tr>

<?php

$selqry=" SELECT * FROM tbl_package p inner join tbl_course c on p.course_id=c.course_id where p.course_id=".$_SESSION['couid'];
$result=$con->query($selqry);
$i=0;
while($row=$result->fetch_assoc())
{
	$i++;
	?>
    
    <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $i;?></td>
    <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['course_name'];?></td>
     <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['package_name'];?></td>
     <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['package_duration'];?></td>
     <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['package_cost'];?></td>
       <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['package_details'];?></td>
       <?php
	   $pid=$row['package_id'];
	   ?>
       <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><a href="CenterPackageAdd.php?did=<?php echo $pid?>" style="color: red; /* Change 'red' to your desired color */
  text-decoration: none;">DELETE</a><br>
       <a href="CenterPackageAdd.php?eid=<?php echo $pid?>" style="color: orange; /* Change 'red' to your desired color */
  text-decoration: none;">EDIT</a>
       </td>
      
       </tr>
       <?php
}
?>
</table>
</div><br><br>
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
         onmouseout="this.style.backgroundColor='#d35536'">Home</a><br /><br /><br />
		</td>
</tr>
	</table>
</center>
</center>
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>


