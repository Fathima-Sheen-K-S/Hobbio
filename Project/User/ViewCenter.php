<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

$userid=$_SESSION['uid'];
$centerid=$_GET['cid'];
$_SESSION['cenid']=$centerid;
$sel="select *from tbl_center where center_id=".$centerid;
$res=$con->query($sel);
$row=$res->fetch_assoc();
$centername=$row['center_name'];




?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::View Center</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

<?php
// echo $sel="SELECT * FROM tbl_favorites fav inner join tbl_course co on co.course_id=fav.course_id inner join tbl_center ce on ce.center_id=co.center_id inner join tbl_user u on u.user_id=fav.user_id where u.user_id=".$userid;
// $resc=$con->query($sel);

$counter=0;

$selqry = "select * from tbl_course where center_id=" . $centerid;
$result = $con->query($selqry);
$n = 0;
?>
<center>
<div style="width: 800px;
    background-color: #fdb07d;
    border: 1px solid #ddd;
    border-radius: 33px;
    padding: 22px;
    margin: 10px;
    text-align: center;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
  <h3 style="font-size: 40px;
    color: white;"><?php echo $centername ?></h3>

  <?php while ($rowc = $result->fetch_assoc()) { 
    $counter++;
    ?>
    <div style=" background-color: #f5d3ae;
    border: 1px solid #ccc;
    border-radius: 33px;
    padding: 22px;
    margin: 5px;
    text-align: center;">
      <h3 style="font-size: 30px;
    color:black;"><?php echo $rowc['course_name']; ?></h3>
      <p style=" font-size: 20px;
    color: #f65d5d;  font-family: 'Playfair Display', serif;'"><?php echo $rowc['course_des']; ?></p>
      <a  href="ViewPackages.php?coid=<?php echo $rowc['course_id'] ?>" style="text-decoration: none; color: #f65d5d; font-weight: bold; background-color: #f2f2f2; padding: 10px 20px; border: 2px solid #f65d5d; border-radius: 5px; text-align: center; display: inline-block; margin: 10px; transition: background-color 0.3s, color 0.3s; font-family: 'Playfair Display', serif;">View Packages</a>
      <br />
      <a  href="ViewGallery.php?cid=<?php echo $rowc['course_id']?>" style="text-decoration: none; color: #f65d5d; font-weight: bold; background-color: #f2f2f2; padding: 10px 20px; border: 2px solid #f65d5d; border-radius: 5px; text-align: center; display: inline-block; margin: 10px; transition: background-color 0.3s, color 0.3s; font-family: 'Playfair Display', serif;"><i class="bi bi-images"></i><sub>View Images</sub></a>
      <br />
     
      

<?php
$check="select * from tbl_favorites where user_id=".$userid." and course_id=".$rowc['course_id'];
    $resCheck=$con->query($check);
?>

<div style="text-align: right;">
  <a onclick="funFav('<?php echo $_GET['cid'];?>','<?php echo $rowc['course_id'];?>','<?php echo $counter;?>')">
    <span id="checkLikeTrue<?php echo $counter;?>">
      <i style="font-size: 30px;" class="
        <?php
        if ($resCheck->fetch_assoc()) {
          echo "bi bi-heart-fill text-danger";
        } else {
          echo "bi bi-heart";
        }
        ?>" style="font-size: 20px;"></i>
    </span>
  </a>
</div>
    
    
  


    </div>
    <?php
    $n++;
    if ($n >= 4) {
    ?>
      <div style="clear:both;"></div>
    <?php
      $n = 0;
    }
  } ?>
</div>

</center>
<?php

?>
<br><br>
<center>
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

     <a href="ComplaintToCenters.php" style="background-color: #f0934b;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;" 
     onmouseover="this.style.backgroundColor='#d35536'" 
            onmouseout="this.style.backgroundColor='#f0934b'">Have Complaints...?</a>
      </td>
      
    </tr>
   </table>
</center>

<!-- <h5><a style=" text-decoration: none;
  color: #ff69b4; /* Pink color - adjust as needed */
  font-weight: bold; /* Make the text bold */
  font-size: 20px; /* Adjust the font size as needed */
  display: block; /* Make the links block-level for center alignment */
  text-align: center; /* Center-align the text */
  padding: 10px 0; /* Add some padding for spacing */
  border: 2px solid #ff69b4; /* Pink border */
  border-radius: 20px; /* Round the corners */
  width: 150px; /* Set a fixed width for the links */
  margin: 0 auto; /* Center-align the links horizontally */
  transition: color 0.3s, background-color 0.3s; /* Add smooth color transitions */" href="UserHome.php">HOME</a></h5>
<h5><a style="text-decoration: none;
  color: #ff69b4; /* Pink color - adjust as needed */
  font-weight: bold; /* Make the text bold */
  font-size: 20px; /* Adjust the font size as needed */
  display: block; /* Make the links block-level for center alignment */
  text-align: center; /* Center-align the text */
  padding: 10px 0; /* Add some padding for spacing */
  border: 2px solid #ff69b4; /* Pink border */
  border-radius: 20px; /* Round the corners */
  width: 150px; /* Set a fixed width for the links */
  margin: 0 auto; /* Center-align the links horizontally */
  transition: color 0.3s, background-color 0.3s; /* Add smooth color transitions */" href="ComplaintToCenters.php">Have Complaints...?</a></h5> -->
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>

		<script src="../Assets/JQ/jQuery.js"></script>
    <script>

function funFav(ceid, coid, postNumber) {
  $.ajax({
    url: "../Assets/AjaxPages/AjaxFav.php?cenid=" + ceid + "&courid=" + coid,
    success: function(response) {
      var data = JSON.parse(response);

      
      var checkLike=data.checkLike;

      if(checkLike === true)
			{
				$("#checkLikeTrue" + postNumber).html('<i class="bi bi-heart-fill text-danger"  style="font-size:30px"></i>');
      }
      else if(checkLike === false)
      {
        $("#checkLikeTrue" + postNumber).html('<i class="bi bi-heart" style="font-size:30px;" ></i>');

			}
      else
      {
        alert("Not able to add to favorites...")
        
      }
      
    }
  });
}

      </script>

</html>