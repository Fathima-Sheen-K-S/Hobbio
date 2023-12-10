<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");


$centerid=$_SESSION['cid'];
if(isset($_POST["btnsubmit"])){
	$comtitle=$_POST["txtcomtitle"];
	$comcontent=$_POST["txtcomcontent"];
	$insqry="insert into tbl_complaint(complaint_title,complaint_content,center_id) values('".$comtitle."','".$comcontent."',".$centerid.")";
	if($con->query($insqry))
	{
    ?>
    <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Complaint Submitted",
      icon: "success"
    }).then(() => {
      window.location = "CenterComplaint.php";
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
      title: "Complaint Submission Failed",
      icon: "error"
    }).then(() => {
      window.location = "CenterComplaint.php";
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
<title>Hobbio::Center Complaint</title>
</head>

<body>
<center><h3>Report Your Complaints Here..</h3></center><br />
<center style="display: flex;
    align-items: center;
    justify-content: center;
    min-height: 30vh;"><br /><br />

<form id="form1" name="form1" method="post" action="" style="background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;">
  <table  rules="none" cellspacing="30" cellpadding="30" style=" width: 600px;
    border-collapse: collapse;
    margin-top: 20px;">
    <tr>
      <td width="207"  style='font-size: 20px; font-family: "Playfair Display", serif;'>Complaint Title:</td>
      <td width="186"  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtcomtitle"></label>
        <input type="text" name="txtcomtitle" id="txtcomtitle" style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;" required placeholder="Enter Complaint Title" autocomplete="off"/></td>
    </tr>
    <tr>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>Complaint Content:</td>
      <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>
        <textarea name="txtcomcontent" id="txtcomcontent" row="50" col="30"  style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;" required placeholder="Enter Complaint Content"></textarea></td>
    </tr>
    
  </table><br />

  <center>
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
      <td align="right">

<input type="submit" name="btnsubmit" value="Submit" style="background-color: #f0934b;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;" 
     onmouseover="this.style.backgroundColor='#d35536'" 
            onmouseout="this.style.backgroundColor='#f0934b'"/>
      </td>
      
    </tr>
   </table>
</center>
</center>
</form>

<br><br>
<center><h3>Your previous complaints</h3></center><br />
<center style="display: flex;
    align-items: center;
    justify-content: center;
    min-height: 5vh;">
    <form id="form1" name="form1" method="post" action="" style="background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;">
<table border="1" cellpadding="10" cellspacing="0">
<tr>
<tr>
<td align="center" style='font-size: 20px; font-family: "Playfair Display", serif;'>SL No:</td>
<td align="center" style='font-size: 20px; font-family: "Playfair Display", serif;'>Complaint Title:</td>
<td align="center" style='font-size: 20px; font-family: "Playfair Display", serif;'>Complaint Content:</td>
<td align="center" style='font-size: 20px; font-family: "Playfair Display", serif;'>Admin Reply:</td>
</tr>
<?php
$selc="SELECT * FROM tbl_complaint where center_id=".$centerid;
 $resc=$con->query($selc);
   $i=0;
   while($rowc=$resc->fetch_assoc())
   {
	   $i++;
?>
<tr>
       <td align="center" style='font-size: 20px; font-family: "Playfair Display", serif;'><?php echo $i;?></td>
       <td align="center" style='font-size: 20px; font-family: "Playfair Display", serif;'><?php echo $rowc['complaint_title'];?></td>
        <td align="center" style='font-size: 20px; font-family: "Playfair Display", serif;'><?php echo $rowc['complaint_content'];?></td>
        <?php
		if($rowc['complaint_status']==1)
		{
			?>
            <td align="center" style='font-size: 20px; font-family: "Playfair Display", serif;'><?php echo $rowc['complaint_reply'];?></td>
            <?php
		}
		else
		{
			?>
            <td align="center" style='font-size: 20px; font-family: "Playfair Display", serif;'>Waiting...</td>
            <?php
		}
		?>
         </tr>
<?php
   }
   ?>


</table>


<br /><br />
    </form>
</center>
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>