<?php 
ob_start();
include('Head.php');

include("../Assets/Connection/Connection.php");


$centerid=$_SESSION['cid'];


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<title>Hobbio::View User Ratings</title>
</head>

<body>

<center>
<h3>User Ratings</h3><br>


<table width="1119" border="1" cellspacing="0" cellpadding="3" style="width: 100%;
    border-collapse: collapse;
    margin-top: 18px;">
  <tr>
   	<th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">SL No</th>
    <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">User Name</th>
     <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Rating Value</th>
     <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Comment</th>
    <th width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Rated On</th>

  </tr>
  <tr>
<?php
$sel="SELECT * FROM tbl_rating r inner join tbl_user u on r.user_id=u.user_id where r.center_id=".$centerid;
$res=$con->query($sel);
   $i=0;
   while($row=$res->fetch_assoc())
   {
	   $i++;

?>

    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $i; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['user_name']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['rating_value_no']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['rating_comment']; ?></td>
    <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $row['rating_date']; ?></td>
   
   
  </tr>
  <?php
   }
   ?>
 

</table>
<br /><br>
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
    </tr>
</table>


</center>



</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>