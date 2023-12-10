<?php
ob_start();
include('Head.php');
		$categoryname="";
		$categoryid=0;
		include("../Assets/Connection/Connection.php");
		
		$message="";
		if(isset($_POST["btnsave"]))
		{
			$categoryname=$_POST["txtcategory"];
			$categoryid=$_POST["txtid"];
			if($categoryid==0)
			{
				$selQ="select *from tbl_category where category_name='".$categoryname."'";
				$r=$con->query($selQ);
				if($row=$r->fetch_assoc())
				{
					?>
        			<script>
					alert("This record already exists...")
					window.location="Category.php"
					</script>
        			<?php
				}
				else
				{
			
				$insqry="insert into tbl_category(category_name)values('".$categoryname."')";
				if($con->query($insqry))
				{
					echo '<script>var inserted = true;</script>';
				}
				else
				{
					echo '<script>var inserted = false;</script>';
				}
			}		
		    }
			else
			{	
				$upqry = "UPDATE tbl_category SET category_name = '$categoryname' WHERE category_id = $categoryid";
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>
<?php
				if ($con->query($upqry)) {
					// Updated successfully
					echo '<script>
							Swal.fire({
								title: "Updated",
								icon: "success"
							}).then(() => {
								window.location = "Category.php";
							});
						  </script>';
				} else {
					// Updation failed
					echo '<script>
							Swal.fire({
								title: "Updation Failed",
								icon: "error"
							}).then(() => {
								window.location = "Category.php";
							});
						  </script>';
				}

			
			}
			
			
		}


		if(isset($_GET['cid']))
		{
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  // Display the SweetAlert confirmation dialog
  Swal.fire({
    title: "Do you want to confirm delete?",
    text: "This action cannot be undone.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Delete",
    cancelButtonText: "Cancel",
    confirmButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = "Category.php?catid=<?php echo $_GET['cid'];?>";
    } else {
      Swal.fire("Deletion prevented", "", "info");
    }
  });
</script>
				<?php
			
		}
		if(isset($_GET['catid'])){
			$delsub="delete from tbl_subcategory where category_id=".$_GET['catid'];
			$con->query($delsub);
			$delqry="delete from tbl_category where category_id=".$_GET['catid'];
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>
			<?php
			if ($con->query($delqry)) {
				// Deleted successfully
				echo '<script>
						Swal.fire({
							title: "DELETED",
							icon: "success"
						}).then(() => {
							window.location = "Category.php";
						});
					  </script>';
			} else {
				// Deletion failed
				echo '<script>
						Swal.fire({
							title: "FAILED",
							icon: "error"
						});
					  </script>';
			}

		}
		

		
		if(isset($_GET['eid']))
		{
			
			$sel="select *from tbl_category where category_id=".$_GET['eid'];
		    $editres=$con->query($sel);
			$rowedit=$editres->fetch_assoc();
			$categoryid=$rowedit['category_id'];
			$categoryname=$rowedit['category_name'];
		}







?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::Category</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>



</head>

<body>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Category</h2>
</center>
<form id="form1" name="form1" method="post" action="" style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 17px;
            max-width: 427px;
            margin: 0 auto;"
			onsubmit="return validateForm();">
<input type="hidden" name="txtid" value="<?php echo $categoryid?>" />
  <table width="427" rules="none" style="width: 100%;
            border: 1px solid #ccc;">
    <tr>
      <td width="176" style=" padding: 8px;">Category Name:</td>
      <td width="235" style=" padding: 8px;"><label for="txtcategory"></label>
      <input type="text" name="txtcategory" id="txtcategory" value="<?php echo $categoryname?>" style="width: 100%;
            padding: 5px;
            border: 1px solid #ccc;" required placeholder="Enter Category Name" autocomplete="off"/></td>
    </tr>
    <tr>
      <td style=" padding: 8px;" colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" style="background-color: #f47d36;
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
    <td style=" padding: 8px;" colspan="2" align="center"><?php echo $message ?></td>
    
  </tr>
   
  </table>
</form><br><br>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 25px;">List Of Categories</h2>
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
    <td align="center" style=" padding: 8px;">CATEGORY NAME</td>
    <td align="center" style=" padding: 8px;">ACTION</td>
  </tr>
  <?php
  $selqry="select *from tbl_category";
  $res=$con->query($selqry);
  $i=0;
  while($row=$res->fetch_assoc())
  {
	  $i++;
	  ?>
	  
   <tr>
    <td align="center" style=" padding: 8px;"><?php echo $i ?></td>
    <td align="center" style=" padding: 8px;"><?php echo $row['category_name']; ?></td>
    <td align="center" style=" padding: 8px;"><a href="Category.php?cid=<?php echo $row['category_id']?>" style="color:red;">DELETE</a><br />
    <a href="Category.php?eid=<?php echo $row['category_id']?>" style="color:orange">EDIT</a></td>
  </tr>
  <?php
  }
  ?>
 
</table>
</form>

</body>
<script>
function validateForm() {
    var category = document.getElementById("txtcategory").value;
     var minNameLength = 2;
    var maxNameLength = 70;
	var namePattern = /^[A-Za-z\s]+$/;
    
    

    if (!namePattern.test(category)) {
        alert("Category Name contains invalid characters. Please use only letters and spaces.");
        return false;
    }

    if (category.length < minNameLength || name.length > maxNameLength) {
        alert("Category name must be between " + minNameLength + " and " + maxNameLength + " characters.");
        return false;
    }
	
    
       

    return true;
}


</script>
<script>
    if (typeof inserted !== 'undefined') {
        if (inserted) {
            Swal.fire({
                title: "Data Inserted",
                text: "Your data has been successfully inserted into the table.",
                icon: "success",
            });
        } else {
            Swal.fire({
                title: "Error",
                text: "An error occurred while inserting data.",
                icon: "error",
            });
        }
    }
</script>

<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>