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
<title>Hobbio::View Complaints</title>
</head>

<body>
<center>
<h3>Complaints from users</h3><br />
<table width="1119" border="1" cellspacing="0" cellpadding="3" style="width: 100%;
    border-collapse: collapse;
    margin-top: 18px;">
<tr>
<th align="center" width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">SL No</th>
<th align="center" width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">User Name</th>
<th align="center" width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">User Contact</th>
<th align="center" width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">User Email</th>
<th align="center" width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Complaint title</th>
<th align="center" width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Complaint Description</th>
<th align="center" width="175" style="padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 18px; font-family: 'Playfair Display', serif;">Action</th>
</tr>
<?php
$selu="SELECT * FROM tbl_centercomplaint co inner join tbl_user u on co.user_id=u.user_id where co.center_id=".$centerid;
 $resu=$con->query($selu);
   $i=0;
   while($rowu=$resu->fetch_assoc())
   {
	   $i++;
?>
<tr>
       <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $i;?></td>
       <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $rowu['user_name'];?></td>
        <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $rowu['user_contact'];?></td>
         <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $rowu['user_email'];?></td>
         <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $rowu['ccomplaint_title'];?></td>
         <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $rowu['ccomplaint_content'];?></td>
         <?php
		 if($rowu['ccomplaint_status']==0){
			 ?>
         <td style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;" align="center"><a href="ReplyUserComplaints.php?rid=<?php echo $rowu['user_id']?>&coid=<?php echo $rowu['ccomplaint_id'];?>" style="color: #d35536; 
  text-decoration: none;">Reply</a></td>
         <?php
		 }
		 else
		 {
			 ?>
             <td align="center" style="font-size: 15px; font-family: 'Playfair Display', serif;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;"><?php echo $rowu['ccomplaint_reply']?></td>
             <?php
		 }
		 ?>
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