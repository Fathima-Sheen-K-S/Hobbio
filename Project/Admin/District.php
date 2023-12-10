<?php 
ob_start();
include('Head.php');
		$districtname="";
		$districtid=0;
		include("../Assets/Connection/Connection.php");
		
		
		if(isset($_POST["btnsave"]))
		{
			$districtname=$_POST["txtdname"];
			$districtid=$_POST["txtid"];
			
			if($districtid==0)
			{
				$selQ="select *from tbl_district where district_name='".$districtname."'";
				$r=$con->query($selQ);
				if($row=$r->fetch_assoc())
				{
					?>
        			<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Record Already Exists",
    icon: "warning"
  }).then(() => {
    window.location = "District.php";
  });
});
</script>
        			<?php
				}
				else
				{
					$insqry="insert into tbl_district(district_name)values('".$districtname."')";
					if($con->query($insqry))
			 		{
						?>
						<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "District Added",
    icon: "success"
  }).then(() => {
    window.location = "District.php";
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
    window.location = "District.php";
  });
});
</script>
							<?php
			 		}
				}		
		 	}
			else
			{	
				$upqry="update tbl_district set district_name='".$districtname."'where district_id=".$districtid;
				if($con->query($upqry))
			 	{
					?>
        			<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "District Updated",
    icon: "success"
  }).then(() => {
    window.location = "District.php";
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
    title: "Confirm Delete",
    text: "Do you want to confirm delete?",
    icon: "question",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "District.php?disid=<?php echo $_GET['did'];?>";
    } else {
      Swal.fire("Deletion Prevented", "", "info");
    }
  });
});
</script>
				<?php
			
		}
		
		if(isset($_GET['disid'])){
			$delcity="delete from tbl_city where district_id=".$_GET['disid'];
			$con->query($delcity);
			$delqry="delete from tbl_district where district_id=".$_GET['disid'];
			if($con->query($delqry))
			{ 
		?>
        <script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Deleted",
    icon: "success"
  }).then(() => {
    window.location = "District.php";
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
		
		if(isset($_GET['eid'])){
			
			$sel="select *from tbl_district where district_id=".$_GET['eid'];
		    $editres=$con->query($sel);
			$rowedit=$editres->fetch_assoc();
			$districtid=$rowedit['district_id'];
			$districtname=$rowedit['district_name'];
		}
?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Hobbio::District</title>
</head>

<body>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Districts</h2>
</center>
<form id="form1" name="form1" method="post" action="" style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 427px;
            margin: 0 auto;"
			onsubmit="return validateForm();">
<input type="hidden" name="txtid" value="<?php echo $districtid?>" />
<table width="808" rules="none" style="width: 100%;
            border: 1px solid #ccc;">
  <tr>
    <td  style=" padding: 8px;">District Name:</td>
    <td  style=" padding: 8px;">
      <label for="txtdistrict"></label>
      <input type="text" name="txtdname" id="txtdname" value="<?php echo $districtname?>" style="width: 100%;
            padding: 5px;
            border: 1px solid #ccc;" required placeholder="Enter District" autocomplete="off"/>
   </td>
  </tr>
      <td colspan="2" align="center" style=" padding: 8px;">
      <input type="submit" name="btnsave" id="btnsave" value="Save" 
	  style="background-color: #f47d36;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;"/>
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" 
	  style="background-color: #f47d36;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;"/>
   </td>
  </tr>
  <tr>
   
    
  </tr>
  
</table>
</form>
<br><br>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 25px;">List Of Districts</h2>
</center>
<form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 427px;
            margin: 0 auto;">
<table width="546" height="68" border="1" style="width: 100%;
            border: 1px solid #ccc;">
  <tr>
    <td width="138" align="center" style=" padding: 8px;">Sl.NO</td>
    <td width="225" align="center" style=" padding: 8px;">DISTRICT NAME</td>
    <td width="161" align="center" style=" padding: 8px;">ACTION</td>
  </tr>
  <?php
  $selqry="select *from tbl_district";
  $res=$con->query($selqry);
  $i=0;
  while($row=$res->fetch_assoc())
  {
	  $i++;
	  ?>
	  
   <tr>
    <td align="center" style=" padding: 8px;"><?php echo $i ?></td>
    <td align="center" style=" padding: 8px;"><?php echo $row['district_name']; ?></td>
    <td align="center" style=" padding: 8px;"><a href="District.php?did=<?php echo $row['district_id']?>"
	style="color:red;">DELETE</a><br />
    <a href="District.php?eid=<?php echo $row['district_id']?>"
	style="color:orange;">EDIT</a></td>
  </tr>
  <?php
  }
  ?>
</table>
</form>
</body>
<script>
function validateForm() {
    var district = document.getElementById("txtdname").value;
     var minNameLength = 2;
    var maxNameLength = 70;
	var namePattern = /^[A-Za-z\s]+$/;
    
    

    if (!namePattern.test(district)) {
        alert("District contains invalid characters. Please use only letters and spaces.");
        return false;
    }

    if (district.length < minNameLength || name.length > maxNameLength) {
        alert("District must be between " + minNameLength + " and " + maxNameLength + " characters.");
        return false;
    }
	
    
       

    return true;
}


</script>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>