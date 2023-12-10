<?php
ob_start();
include('Head.php');
	$cityid=0;
	$cityname="";
	$pincode="";
  $districtid=0;
	include("../Assets/Connection/Connection.php");
	
	if(isset($_POST["btnsubmit"]))
	{
		$cityid=$_POST["txtid"];
		$cityname=$_POST["txtpname"];
		$pincode=$_POST["txtpincode"];
		$districtid=$_POST["sel_district"];
		if($cityid==0)
		{
			$selQ="select *from tbl_city where city_name='".$cityname."'";
				$r=$con->query($selQ);
				if($row=$r->fetch_assoc())
				{
					?>
        			<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Record Already Exists",
    icon: "error"
  }).then(() => {
    window.location = "City.php";
  });
});
</script>
        			<?php
				}
				else
				{
			$insqry="insert into tbl_city(city_name,city_pincode,district_id)values('".$cityname."','".$pincode."',".$districtid.")";
			if($con->query($insqry))
			{
				?>
                <script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "City Added",
    icon: "success"
  }).then(() => {
    window.location = "City.php";
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
    window.location = "City.php";
  });
});
</script>
                    <?php
			}
		}
		}
		else
		{
			$upqry="update tbl_city set city_name='".$cityname."',city_pincode='".$pincode."'
			,district_id=".$districtid." where city_id=".$cityid;
				if($con->query($upqry))
			 	{
					?>
        			<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Updated",
    icon: "success"
  }).then(() => {
    window.location = "City.php";
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
	
	if(isset($_GET['pid']))
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
      window.location = "City.php?plid=<?php echo $_GET['pid'];?>";
    } else {
      Swal.fire("Deletion Prevented", "", "info");
    }
  });
});
</script>
				<?php
			
		}
	if(isset($_GET['plid'])){
			$delqry="delete from tbl_city where city_id=".$_GET['plid'];
			if($con->query($delqry))
			{ 
		?>
       <script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Deleted",
    icon: "success"
  }).then(() => {
    window.location = "City.php";
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
			
			$sel="select *from tbl_city  where city_id=".$_GET['eid'];
		    $editres=$con->query($sel);
			$rowedit=$editres->fetch_assoc();
			$cityid=$rowedit['city_id'];
			$cityname=$rowedit['city_name'];
			$pincode=$rowedit['city_pincode'];
      $districtid=$rowedit['district_id'];
			
		}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Hobbio::City</title>
</head>

<body>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Cities</h2>
</center>
<form id="form1" name="form1" method="post" action="" style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 427px;
            margin: 0 auto;" onsubmit="return validateForm();">
<input type="hidden" name="txtid" value="<?php echo $cityid?>" />
  <table width="384" rules="none" style="width: 100%;
            border: 1px solid #ccc;">
  <tr>
  <td style=" padding: 8px;">District Name:</td>
  <td style=" padding: 8px;"><select name="sel_district" style="width: 100%;
            padding: 5px;
            border: 1px solid #ccc;" required>
    
    
   
  <option value="" >---Select---</option>
  
  <?php 
    
   $seldistrict="select *from tbl_district";
   $resdis=$con->query($seldistrict);
   while($rowdis=$resdis->fetch_assoc())
   {
	   ?>
     <option 
     <?php 
     if($rowdis['district_id']==$districtid)
     {?>
     selected <?php
     }?>
   value="<?php echo $rowdis['district_id'] ?>">
														<?php echo $rowdis['district_name'] ?>
													</option>
   
  <?php
   }
    
   ?>
    </select>
   </td>
    </tr>

 
    <tr>
      <td width="131" style=" padding: 8px;">City Name:</td>
      <td width="237" style=" padding: 8px;"><label for="txtpname"></label>
      <input type="text" name="txtpname" id="txtpname" value="<?php echo $cityname?>" style="width: 100%;
            padding: 5px;
            border: 1px solid #ccc;" required placeholder="Enter City Name" autocomplete="off"/></td>
    </tr>
    <tr>
      <td style=" padding: 8px;">Pincode:</td>
      <td style=" padding: 8px;"><label for="txtpincode"></label>
      <input type="number" name="txtpincode" id="txtpincode" value="<?php echo $pincode?>" style="width: 100%;
            padding: 5px;
            border: 1px solid #ccc;"required placeholder="Enter Pincode" autocomplete="off"
			/></td>
    </tr>
    <tr>
      <td style=" padding: 8px;" colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" 
	  value="Submit" style="background-color: #f47d36;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;"/>
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" style="background-color: #f47d36;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;"/></td>
    </tr>
    <tr>
    
    </tr>
  </table>
</form>
<br><br>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 25px;">List Of Cities</h2>
</center>
<form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 700px;
            margin: 0 auto;">
<table width="555" height="94" border="1" style="width: 100%;
            border: 1px solid #ccc;">
  <tr>
    <td style=" padding: 8px;" width="113" height="48" align="center">SL NO</td>
    <td style=" padding: 8px;" width="145" align="center">CITY NAME</td>
    <td style=" padding: 8px;" width="116" align="center">PINCODE</td>
    <td style=" padding: 8px;" width="116" align="center">DISTRICT NAME</td>
    <td style=" padding: 8px;" width="153" align="center">ACTION</td>
  </tr>
  <tr>
   <?php
  $selqry="select *from tbl_city p inner join tbl_district d on d.district_id=p.district_id";
  $res=$con->query($selqry);
  $i=0;
  while($row=$res->fetch_assoc())
  {
	  $i++;
	  ?>
	  
   <tr>
    <td style=" padding: 8px;" align="center"><?php echo $i ?></td>
    <td style=" padding: 8px;" align="center"><?php echo $row['city_name']; ?></td>
    <td style=" padding: 8px;" align="center"><?php echo $row['city_pincode']; ?></td>
    <td style=" padding: 8px;" align="center"><?php echo $row['district_name']; ?></td>
    <td style=" padding: 8px;" align="center"><a href="City.php?pid=<?php echo $row['city_id']?>" style="color:red;">DELETE</a><br />
    <a href="City.php?eid=<?php echo $row['city_id']?>" style="color:orange;">EDIT</a>
    </td>
  </tr>
  <?php
  }
  ?>
    
</table>
</form>
</body>

<script>
function validateForm() {
    var name = document.getElementById("txtpname").value;
    var pin = document.getElementById("txtpincode").value;
    
        
       

    var namePattern = /^[A-Za-z\s]+$/; // Valid characters: A-Z, a-z, spaces, hyphens, and single quotes
    var minNameLength = 2;
    var maxNameLength = 30;
    
    

    if (!namePattern.test(name)) {
        alert("City name contains invalid characters. Please use only letters and spaces.");
        return false;
    }

    if (name.length < minNameLength || name.length > maxNameLength) {
        alert("City name must be between " + minNameLength + " and " + maxNameLength + " characters.");
        return false;
    }
	var numericPattern = /^\d{6}$/;
    if (!numericPattern.test(pin)) {
        alert("Pincode should be exactly 6 digits and contain only numbers from 0 to 9.");
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