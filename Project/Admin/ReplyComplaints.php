<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsend"])){
	$reply=$_POST["txtreplycom"];
	$idid=$_GET['iid'];
	$id=$_GET['rid'];
	$comid=$_GET['coid'];
	
	
	if($idid==1)
	{
		
		$insqry="update tbl_complaint set complaint_reply='".$reply."',complaint_status=1 where center_id=".$id." and complaint_id=".$comid;
		if($con->query($insqry)){
		
		?>
		<script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Complaint reply is saved",
    icon: "success"
  }).then(() => {
    window.location = "ViewComplaints.php";
  });
});
</script>

	<?php	
		}
	}
	else
	{
		
		$ins="update tbl_complaint set complaint_reply='".$reply."',complaint_status=1 where user_id=".$id." and complaint_id=".$comid;
		if($con->query($ins)){
		
		?>
        <script>
document.addEventListener("DOMContentLoaded", function() {
  Swal.fire({
    title: "Complaint reply is saved",
    icon: "success"
  }).then(() => {
    window.location = "ViewComplaints.php";
  });
});
</script>

    
    <?php
		}
	}
}
	
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Hobbio::Reply complaints</title>
</head>

<body>
<center>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Reply To Complaints</h2>
</center>
<form method="post" style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 700px;
            margin: 0 auto;">
<table rules="none"  cellpadding="10" cellspacing="10" style="width: 100%;
            ;">
<tr>
<td style=" padding: 8px;">Enter your reply:</td>
<td style=" padding: 8px;"><textarea name="txtreplycom" rows="5" cols="30" style="width: 100%;
            padding: 5px;
            border: 1px solid #ccc;"></textarea></td>
</tr>
<tr>
<td colspan="2" align="right" style=" padding: 8px;"><input type="submit" name="btnsend" value="Send Reply"
style="background-color: #f47d36;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;" /></td>
</tr>
</table>
<br />

</form>
</center>
</body>
<?php
include('Foot.php');
 ob_end_flush();
?>
</html>