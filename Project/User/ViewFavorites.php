<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

$userid=$_SESSION['uid'];
if(isset($_GET['faid']))
{
    ?>
			<script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Remove from Favorites",
      text: "Do you want to remove from favorites?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Yes",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "ViewFavorites.php?fid=<?php echo $_GET['faid'];?>";
      } else {
        Swal.fire("Deletion Prevented", "", "info");
      }
    });
  });
</script>

				<?php
}
if(isset($_GET['fid']))
{
	$del="delete from tbl_favorites where fav_id=".$_GET['fid'];
	if($con->query($del))
	{
		?>
       <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Removed from Favorites",
      icon: "success"
    }).then(() => {
      window.location = "ViewFavorites.php";
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
<title>Hobbio::View Favorites</title>
</head>

<body>
<center margin-top: 50px;><br />
<h2>Your Favorite Courses And Centers</h2><br />
<table border="1" cellspacing="0" cellpadding="3" style="width: 100%;
    border-collapse: collapse;
    margin-top: 18px;">
<tr>

<td align="center"  style="max-width: 100px;
    max-height: 100px;
    border-radius: 5px;
    font-size: 18px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px;">CENTER LOGO</td>
<td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">COURSE NAME</td>
<td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">COURSE DESCRIPTION</td>
<td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">CENTER NAME</td>
<td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">CENTER CONTACT</td>
<td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">CENTER TYPE</td>
<td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">CENTER AREA</td>
<td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">CENTER BUILDING</td>
<td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">CENTER LANDMARK</td>

<td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">CENTER EMAIL</td>
<td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">ACTION</td>
</tr>

<tr>





<?php
$selqry="select *from tbl_favorites f inner join tbl_course c on f.course_id=c.course_id inner join tbl_center ce on ce.center_id=c.center_id where user_id=".$userid;
$res=$con->query($selqry);
$i=0;
while($row=$res->fetch_assoc())
{
	$i++;
	?>
    
    <td align="center" style="max-width: 100px;
    max-height: 100px;
    border-radius: 5px;"><img src="../Assets/File/Center/<?php echo $row['center_logo']; ?>" width="100"/></td>
     <td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 15px; font-family: 'Playfair Display', serif;"><?php echo $row['course_name']; ?></td>
      <td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 15px; font-family: 'Playfair Display', serif;"><?php echo $row['course_des']; ?></td>
       <td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 15px; font-family: 'Playfair Display', serif;"><?php echo $row['center_name']; ?></td>
        <td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd; 
    font-size: 15px; font-family: 'Playfair Display', serif;"><?php echo $row['center_contact']; ?></td>
        <td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 15px; font-family: 'Playfair Display', serif;"><?php echo $row['center_type']; ?></td>
         <td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 15px; font-family: 'Playfair Display', serif;"><?php echo $row['center_area']; ?></td>
         <td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 15px; font-family: 'Playfair Display', serif;"><?php echo $row['center_building']; ?></td>
         <td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 15px; font-family: 'Playfair Display', serif;"><?php echo $row['center_landmark']; ?></td>
         <td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 15px; font-family: 'Playfair Display', serif;"><?php echo $row['center_email'];?></td>
         <td align="center" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 15px; font-family: 'Playfair Display', serif;"><a href="ViewFavorites.php?faid=<?php echo $row['fav_id'];?>">Remove</a>
    <br><a href="ViewCenter.php?cid=<?php echo $row['center_id']?>" style="background-color: rgb(211, 85, 54); /* Set the background color to yellow */
    color: white; /* Set the text color to black */
    font-weight: bold; /* Make the text bold */
    text-decoration: none; /* Remove underline (if there's any) */
    padding: 5px 10px; /* Add some padding for better visual appearance */
    border-radius: 5px; /* Add rounded corners */
    display: inline-block;">View</a></td>
       
           </tr>
<?php
}
?>



</table><br />
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
    </tr>
</table>

</center>

</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>