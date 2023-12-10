<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

$cenid=$_SESSION['cid'];
$msg="";
$courseid=0;
$coursename="";
$coursedes="";
$catid=0;
$catname="";
$subcatid=0;
$subcatname="";
	
if(isset($_POST["btninsert"]))
{
	$courseid=$_POST["txtid"];
	$coursename=$_POST["txtcoursename"];
	$coursedes=$_POST["txtcoursedes"];
	$catid=$_POST["selcategory"];
	$subcatid=$_POST["selsubcategory"];
	if($courseid==0)
	{
		$insqry="insert into tbl_course(course_name,course_des,subcategory_id,center_id) values('".$coursename."','".$coursedes."',".$subcatid.",".$cenid.")";
		if($con->query($insqry))
		{
			
            ?>
           <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Course Added",
      icon: "success"
    }).then(() => {
      window.location = "CenterAddCourse.php";
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
      text: "Failed to add the course. Please try again.",
      icon: "error"
    }).then(() => {
      window.location = "CenterAddCourse.php";
    });
  });
</script>
            <?php
		}
}
	else
	{
		$upqry="update tbl_course set course_name='".$coursename."',course_des='".$coursedes."',subcategory_id=".$subcatid." where course_id=".$courseid;
				if($con->query($upqry))
			 	{
					?>
        			<script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Updated",
      icon: "success"
    }).then(() => {
      window.location = "CenterAddCourse.php";
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
      text: "Failed to update. Please try again.",
      icon: "error"
    });
  });
</script>

           			<?php
				}
			
			
		}
		

}
if(isset($_GET['diid']))
{
    ?>
			<script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Remove Course",
      text: "Do you want to remove this course?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Yes",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "CenterAddCourse.php?did=<?php echo $_GET['diid'];?>";
      } else {
        Swal.fire("Deletion Prevented", "", "info");
      }
    });
  });
</script>
				<?php
}

if(isset($_GET['did']))
{
	$delqry="delete from tbl_course where course_id=".$_GET['did'];
	if($con->query($delqry))
	{ 
		?>
       <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Deleted",
      icon: "success"
    }).then(() => {
      window.location = "CenterAddCourse.php";
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
			$sel="SELECT * FROM tbl_course co inner join tbl_subcategory ca on co.subcategory_id=ca.subcategory_id inner join tbl_category sub on ca.category_id=sub.category_id where course_id=".$_GET['eid'];
			//$sel="select *from tbl_course where course_id=".$_GET['eid'];
		    $editres=$con->query($sel);
			$rowedit=$editres->fetch_assoc();
			$courseid=$rowedit['course_id'];
			$catid=$rowedit['category_id'];
			$catname=$rowedit['category_name'];
			$subcatid=$rowedit['subcategory_id'];
			$subcatname=$rowedit['subcategory_name'];
			$coursename=$rowedit['course_name'];
			$coursedes=$rowedit['course_des'];
			
		}
			
			
?>










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Hobbio::Center Add Course</title>
</head>

<body>
<center>
<div style="max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fdb07d;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;"><br>
<h2 style="color:white;">Add Courses</h2>
<form id="form1" name="form1" method="post" action="" style="margin-top: 20px;">
    <input type="hidden" name="txtid" value="<?php echo $courseid?>" />

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
            text-align: left; font-family: 'Playfair Display', serif; font-size:18px;">Category</th>
            <td><label for="selcategory"></label>
                <select name="selcategory" id="selcategory" onChange="getSubcat(this.value)" style="width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 14px; font-family: 'Playfair Display', serif; font-size:18px;" required>
                <?php
                if(isset($_GET['eid']))
                {
                  ?>
                  <option value="<?php echo $catid;?>"><?php echo $catname;?></option>
                  <?php
                }
                else
                {
                  ?>
                <option value="" disabled selected style="font-family: 'Playfair Display', serif; font-size:18px;">--Select Category--</option>
                <!-- <option selected disabled value="<?php //echo $catid?>"><?php //echo $catname?></option> -->
                <?php
                }
                $selcat="select *from tbl_category  ";
                $rescat=$con->query($selcat);
                while($rowcat=$rescat->fetch_assoc())
                {
                    ?>
                    <option value="<?php echo $rowcat['category_id']?>"><?php echo $rowcat['category_name']?></option>
                    <?php
                }
                ?>
                
                </select></td>
        </tr>
        <tr>
            <th style=" padding: 10px;
            text-align: left; font-family: 'Playfair Display', serif; font-size:18px;">SubCategory</th>
            <td><label for="selsubcategory"></label>
                <select name="selsubcategory" id="selsubcategory" style="width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 14px;font-family: 'Playfair Display', serif; font-size:18px;" required>
                <?php
                if(isset($_GET['eid']))
                {

                ?>
                <option value="<?php echo $subcatid;?>"><?php echo $subcatname;?></option>
                <?php
                }
                else
                {
                ?>
                <option value="" disabled selected style="font-family: 'Playfair Display', serif; font-size:18px;">--Select SubCategory--</option>
                <?php
                }
                ?>
                <!-- <option selected disabled value="<?php //echo $subcatid?>"><?php //echo $subcatname?></option> -->
                </select></td>
        </tr>
        <tr>
            <th style=" padding: 10px;
            text-align: left;font-family: 'Playfair Display', serif; font-size:18px;">Course Name</th>
            <td><label for="txtcoursename"></label>
            <input type="text" name="txtcoursename" id="txtcoursename" value="<?php echo $coursename?>" style="width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px; font-family: 'Playfair Display', serif; font-size:18px;" required 
            placeholder="Enter Course Name" autocomplete="off"/></td>
        </tr>
        <tr>
            <th style=" padding: 10px;
            text-align: left; font-family: 'Playfair Display', serif; font-size:18px;">Course Description</th>
            <td><label for="txtcoursedes"></label>
            <textarea name="txtcoursedes" id="txtcoursedes" cols="45" row="6" style="width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px; font-family: 'Playfair Display', serif; font-size:18px;"
            required placeholder="Enter Course Description"><?php echo $coursedes?></textarea></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btninsert" id="btninsert" value="Submit" style="
                color: white;
                border:none;
                border-radius: 5px;
                padding: 10px 20px; 
                cursor: pointer;
                background-color: #d35536"
                onmouseover="this.style.backgroundColor='#f0934b'" 
                onmouseout="this.style.backgroundColor='#d35536'"/>
            </td>
        </tr>
    </table>
</form>

<h4><?php echo $msg?></h4><br /><br>

<h2 style="color:white;">List Of Courses</h2><br>
<div style="background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 20px;
  margin: 10px;">
<table border="1" style="width: 100%;
  border-collapse: collapse;border: 1px solid #ccc;">
<tr>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">SL.No</th>


<th style="font-family: 'Playfair Display', serif; font-size:18px;">Category</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">SubCategory</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Course Name</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Course Description</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Action</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Package Details</th>
<th style="font-family: 'Playfair Display', serif; font-size:18px;">Images</th>
</tr>
<tr>

<?php
$selqry="SELECT * FROM tbl_course c inner join tbl_subcategory s on c.subcategory_id=s.subcategory_id inner join tbl_category cat on cat.category_id=s.category_id inner join tbl_center cen on c.center_id=cen.center_id where cen.center_id=".$cenid;
$result=$con->query($selqry);
$i=0;
while($row=$result->fetch_assoc())
{
	$i++;
	?>
    
    <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $i;?></td>
    

    <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['category_name'];?></td>
     <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['subcategory_name'];?></td>
     <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['course_name'];?></td>
     <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><?php echo $row['course_des'];?></td>
     <td align="center" style=" font-family: 'Playfair Display', serif; font-size:18px;"><a href="CenterAddCourse.php?diid=<?php echo $row['course_id']?>" 
	 style="color: red; /* Change 'red' to your desired color */
  text-decoration: none;">DELETE</a><br />
     <a href="CenterAddCourse.php?eid=<?php echo $row['course_id']?>" style="color: orange; /* Change 'red' to your desired color */
  text-decoration: none;">EDIT</a></td>
     <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><a href="CenterPackageAdd.php?coid=<?php echo $row['course_id']?>" style="color: #009688; /* Change 'red' to your desired color */
  text-decoration: none;">Add Package</a></td>
     <td style=" font-family: 'Playfair Display', serif; font-size:18px;"><a href="CenterGallery.php?iid=<?php echo $row['course_id']?>" style="color: #009688; /* Change 'red' to your desired color */
  text-decoration: none;">Add Images</a></td>
     </tr>
     <?php
}
?>
</table>
</div>
   <br><br> 
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
    







</div>

</center>

</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getSubcat(cid)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxCategory.php?sid="+cid,
		success: function(html){
			$("#selsubcategory").html(html);
		}
	});
}
</script>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>

</html>