<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");


$userid=$_SESSION['uid'];
if(isset($_POST["btnsubmit"])){
	$fcontent=$_POST["txtfeedcontent"];
	$insqry="insert into tbl_feedback(feedback_content,feedback_time,user_id) values('".$fcontent."',curtime(),".$userid.")";
	if($con->query($insqry))
	{
		?>
    <script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Feedback Received",
      text: "Thank you 😊 for your valuable feedback.",
      icon: "success"
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
      title: "Feedback Recording Failed",
      text: "Failed to record your feedback. Please try again.",
      icon: "error"
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
<title>Hobbio::User Feedback</title>
</head>

<body>

<center><h3>Send Your Feedbacks</h3></center><br /><br />
<center style="display: flex;
    align-items: center;
    justify-content: center;
    min-height: 30vh;"><br /><br />
<br /><br />
<form id="form1" name="form1" method="post" action="" style="background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;">
  <table  rules="none" cellspacing="30" cellpadding="30" style=" width: 600px;
    border-collapse: collapse;
    margin-top: 20px;">
    
    <tr>
      <td style='font-size: 20px; font-family: "Playfair Display", serif;'>Feedback Content:</td>
      <td style='font-size: 15px; font-family: "Playfair Display", serif;'>
      <textarea name="txtfeedcontent" id="txtfeedcontent" row="150" col="30"  style="padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;" required placeholder="Enter Feedback Content"></textarea></td>
    </tr>
   
  </table><br />
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
  
  
  </form>
 
</center>

</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>