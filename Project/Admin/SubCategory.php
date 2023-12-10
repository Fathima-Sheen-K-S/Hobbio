<?php
ob_start();
include('Head.php');
		$subcategoryname="";
		$subcategoryid=0;
    $categoryid=0;
		include("../Assets/Connection/Connection.php");
		
	
		if(isset($_POST["btnsave"]))
		{
			$subcategoryname=$_POST["txtsubname"];
			$subcategoryid=$_POST["txtid"];
			$categoryid=$_POST["sel_category"];
			if($subcategoryid==0)
			{
				$selQ="select *from tbl_subcategory where subcategory_name='".$subcategoryname."'";
				$r=$con->query($selQ);
				if($row=$r->fetch_assoc())
				{
					?>
        			<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "This record already exists",
    icon: "info"
  }).then(() => {
    window.location = "SubCategory.php";
  });
});
</script>

        			<?php
				}
				else
				{
			
				$insqry="insert into tbl_subcategory(subcategory_name,category_id)values('".$subcategoryname."',".$categoryid.")";
				if($con->query($insqry))
				{
					?>
					<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Subcategory Added",
    icon: "success"
  }).then(() => {
    window.location = "SubCategory.php";
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
    window.location = "SubCategory.php";
  });
});
</script>
						<?php
				}
			}
						
		    }
			else
			{	
				$upqry="update tbl_subcategory set subcategory_name='".$subcategoryname."',category_id=".$categoryid." where subcategory_id=".$subcategoryid;
				if($con->query($upqry))
			 	{
					?>
        			<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Updated",
    icon: "success"
  }).then(() => {
    window.location = "SubCategory.php";
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


		if(isset($_GET['cid']))
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
      window.location = "SubCategory.php?subcatid=<?php echo $_GET['cid'];?>";
    } else {
      Swal.fire("Deletion Prevented", "", "info");
    }
  });
});
</script>

				<?php
			
		}
		if(isset($_GET['subcatid'])){
			$delqry="delete from tbl_subcategory where subcategory_id=".$_GET['subcatid'];
			if($con->query($delqry))
			{ 
				?>
        		<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Deleted",
    icon: "success"
  }).then(() => {
    window.location = "SubCategory.php";
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
			
			$sel="select *from tbl_subcategory  where subcategory_id=".$_GET['eid'];
		    $editres=$con->query($sel);
			$rowedit=$editres->fetch_assoc();
			$subcategoryid=$rowedit['subcategory_id'];
			$subcategoryname=$rowedit['subcategory_name'];
			$categoryid=$rowedit['category_id'];
			
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Hobbio::SubCategory</title>
</head>

<body>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">SubCategory</h2>
</center>
<form id="form1" name="form1" method="post" action="" style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 427px;
            margin: 0 auto;"
			onsubmit="return validateForm();">
<input type="hidden" name="txtid" value="<?php echo $subcategoryid?>" />

  <table width="478"  style="width: 100%;
            border: 1px solid #ccc;">
  <tr>
  <td style=" padding: 8px;">Category Name:</td>
   <td style=" padding: 8px;"><select name="sel_category" style="width: 100%;
            padding: 5px;
            border: 1px solid #ccc;" required>
   
  <option value="">---Select---</option>
  
  <?php
    
   $selcategory="select *from tbl_category";
   $resdis=$con->query($selcategory);
   while($rowdis=$resdis->fetch_assoc())
   {
	   ?>
  <option <?php if($rowdis['category_id']==$categoryid)
  {?>
  selected <?php
  }?>
  
  value="<?php echo $rowdis['category_id'] ?>"><?php echo $rowdis['category_name'] ?> </option>
   
  <?php
   }
   ?>
    </select>
   </td>
    </tr>
    <tr>
      <td width="161" style=" padding: 8px;">Sub Category Name:</td>
      <td width="156" style=" padding: 8px;"><label for="txtsubname"></label>
      <input type="text" name="txtsubname" id="txtsubname"  value="<?php echo $subcategoryname?>" style="width: 100%;
            padding: 5px;
            border: 1px solid #ccc;" required placeholder="Enter Subcategory" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center" style=" padding: 8px;"><input type="submit" name="btnsave" id="btnsave" value="Save" style="background-color: #f47d36;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;"/>
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" style="background-color: #f47d36;
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
    <h2 style="font-family: 'Times New Roman', serif; font-size: 25px;">List Of SubCategories</h2>
</center>
<form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 427px;
            margin: 0 auto;">
<table width="431" height="85" border="1" style="width: 100%;
            border: 1px solid #ccc;">
  <tr>
    <td align="center" style=" padding: 8px;">SL NO</td>
     <td align="center" style=" padding: 8px;">SUBCATEGORY NAME</td>
    <td align="center" style=" padding: 8px;">CATEGORY NAME</td>
    <td align="center" style=" padding: 8px;">ACTION</td>
  </tr>
  <?php
  $selqry="select *from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id";
  $res=$con->query($selqry);
  $i=0;
  while($row=$res->fetch_assoc())
  {
	  $i++;
	  ?>
	  
   <tr>
    <td align="center" style=" padding: 8px;"><?php echo $i ?></td>
    <td align="center" style=" padding: 8px;"><?php echo $row['subcategory_name']; ?></td>
     <td align="center" style=" padding: 8px;"><?php echo $row['category_name']; ?></td>
    <td align="center" style=" padding: 8px;"><a href="SubCategory.php?cid=<?php echo $row['subcategory_id']?>" style="color:red;">DELETE</a><br />
    <a href="SubCategory.php?eid=<?php echo $row['subcategory_id']?>" style="color:orange;">EDIT</a></td>
  </tr>
  <?php
  }
  ?>
 
</table>
</form>
</body>
<script>
function validateForm() {
    var subcat = document.getElementById("txtsubname").value;
     var minNameLength = 2;
    var maxNameLength = 70;
	var namePattern = /^[A-Za-z\s]+$/;
    
    

    if (!namePattern.test(subcat)) {
        alert("Subcategory Name contains invalid characters. Please use only letters and spaces.");
        return false;
    }

    if (subcat.length < minNameLength || name.length > maxNameLength) {
        alert("Subcategory name must be between " + minNameLength + " and " + maxNameLength + " characters.");
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