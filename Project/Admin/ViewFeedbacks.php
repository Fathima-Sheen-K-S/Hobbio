<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::View Feedbacks</title>
</head>

<body>

<center><br /><br />
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Feedbacks From Centers</h2>
</center>
<form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;">
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;
            border: 1px solid #ccc;">
<tr>
<td align="center" style=" padding: 8px;">SL No</td>
<td align="center" style=" padding: 8px;">Center Name</td>
<td align="center" style=" padding: 8px;">Center Contact</td>
<td align="center" style=" padding: 8px;">Center Email</td>
<td align="center" style=" padding: 8px;">Feedback Content</td>
<td align="center" style=" padding: 8px;">Feedback Time</td>

</tr>
<?php
$selc="SELECT * FROM tbl_feedback f inner join tbl_center c on f.center_id=c.center_id";
 $resc=$con->query($selc);
   $i=0;
   while($rowc=$resc->fetch_assoc())
   {
	   $i++;
?>
<tr>
       <td align="center" style=" padding: 8px;"><?php echo $i;?></td>
       <td align="center" style=" padding: 8px;"><?php echo $rowc['center_name'];?></td>
        <td align="center" style=" padding: 8px;"><?php echo $rowc['center_contact'];?></td>
         <td align="center" style=" padding: 8px;"><?php echo $rowc['center_email'];?></td>
         <td align="center" style=" padding: 8px;"><?php echo $rowc['feedback_content'];?></td>
         <td align="center" style=" padding: 8px;"><?php echo $rowc['feedback_time'];?></td>
        </tr>
<?php
   }
   ?>
</table>
</form>
<br /><br />
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Feedbacks From Users</h2>
</center>
<form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;">

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;
            border: 1px solid #ccc;" >
<tr>
<td align="center" style=" padding: 8px;">SL No</td>
<td align="center" style=" padding: 8px;">User Name</td>
<td align="center" style=" padding: 8px;">User Contact</td>
<td align="center" style=" padding: 8px;">User Email</td>
<td align="center" style=" padding: 8px;">Feedback Content</td>
<td align="center" style=" padding: 8px;">Feedback Time</td>


</tr>
<?php
$selu="SELECT * FROM tbl_feedback f inner join tbl_user u on f.user_id=u.user_id";
 $resu=$con->query($selu);
   $i=0;
   while($rowu=$resu->fetch_assoc())
   {
	   $i++;
?>
<tr>
       <td align="center" style=" padding: 8px;"><?php echo $i;?></td>
       <td align="center" style=" padding: 8px;"><?php echo $rowu['user_name'];?></td>
        <td align="center" style=" padding: 8px;"><?php echo $rowu['user_contact'];?></td>
         <td align="center" style=" padding: 8px;"><?php echo $rowu['user_email'];?></td>
          <td align="center" style=" padding: 8px;"><?php echo $rowu['feedback_content'];?></td>
         <td align="center" style=" padding: 8px;"><?php echo $rowu['feedback_time'];?></td>
       
         </tr>
<?php
   }
   ?>
</table>
</form>

</center>
</body>
<?php
include('Foot.php');
 ob_end_flush();
?>
</html>