<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$msg="";
$astatus=1;
 $rstatus=2;
if(isset($_GET['aid']))
 {
	
 	$updqry="update tbl_center set center_status=".$astatus." where center_id=".$_GET['aid'];
 	if($con->query($updqry))
 	{
 		$msg="status updated to 1(accepted)";
		
 		?>
         <script>
         window.location="CenterVerification.php"
 		</script>
         <?php
 	}
 	else
 	{
		
 		$msg="accept updation failed";
 		?>
         <script>
 		 window.location="CenterVerification.php"
 		</script>
         <?php
		
 	}
 }
 if(isset($_GET['rid']))
 {
	
 	$updqry="update tbl_center set center_status=".$rstatus." where center_id=".$_GET['rid'];
 	if($con->query($updqry))
 	{
 		$msg="status updated to 2(rejected)";
 		?>
           <script>
 		 window.location="CenterVerification.php"
 		</script>
      <?php  
 	}
 	else
 	{
 		$msg="reject updation failed";
 		?>
           <script>
 		 window.location="CenterVerification.php"
		</script>
         <?php
 	}
 }


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::Center Verification</title>
</head>

<body>
  <div>
  <center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">List Of Centers</h2>
</center>
<form id="form1" name="form1" method="post" action="" style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;">

  <center>
  <table width="200" border="1" style="width: 100%;
            border: 1px solid #ccc;">
    <tr>
      <td align="center" style=" padding: 8px;">SL.No</td>
      <td align="center" style=" padding: 8px;">Center Name</td>
      <!-- <td>Email:</td>
      <td>Contact:</td>
      <td>Type Of Center:</td>
      <td>District:</td>
      <td>City:</td>
      <td>Area:</td>
      <td>Building:</td>
      <td>Landmark:</td>
      <td>Logo:</td>
      <td>Proof:</td>
      <td>Date Of Join:</td> -->
      <td align="center" style=" padding: 8px;">Status</td>
      <td align="center" style=" padding: 8px;">More</td>
      
    </tr>
   <?php
   $selqry="SELECT * FROM tbl_center c inner join tbl_city p on c.city_id=p.city_id inner join tbl_district d on     d.district_id=p.district_id where center_status !=".$astatus." and center_status !=".$rstatus."" ;
   $res=$con->query($selqry);
   $i=0;
   while($row=$res->fetch_assoc())
   {
	   $i++;
	   ?>
       <tr>
       <td align="center" style=" padding: 8px;"><?php echo $i;?></td>
       <td align="center" style=" padding: 8px;"><?php echo $row['center_name'];?></td>
        <!-- <td><?php //echo $row['center_email'];?></td>
         <td><?php //echo $row['center_contact'];?></td>
          <td><?php //echo $row['center_type'];?></td>
           <td><?php //echo $row['district_name'];?></td>
            <td><?php //echo $row['city_name'];?></td>
             <td><?php //echo $row['center_area'];?></td>
             <td><?php //echo $row['center_building'];?></td>
             <td><?php //echo $row['center_landmark'];?></td>
              <td><img src="..\Assets\File\Center\<?php //echo $row['center_logo'];?>" width="100" /></td>
               <td><a href="..\Assets\File\Center\<?php //echo $row['center_proof'];?>" />Proof</a></td>
                <td><?php //echo $row['center_doj'];?></td> -->
                <td align="center" style=" padding: 8px;"><a href="CenterVerification.php?aid=<?php echo $row['center_id']?>" style="color:green">Accept</a><br>
                <a href="CenterVerification.php?rid=<?php echo $row['center_id']?>" style="color:red">Reject</a></td> 
                <td align="center" style=" padding: 8px;"><a href="ViewMore.php?cenid=<?php echo $row['center_id']?>" style="color:orange">View More</a></td>
                                </tr>
                <?php
   }
   ?>
   
       
       
  </table>
  </center>
</form>
  
  <h4><?php echo $msg?></h4>
  
  <br>
 
  <center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Accepted Centers</h2>
</center>
     <center>
      <form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;">
     <table border="1" style="width: 100%;
            border: 1px solid #ccc;">
     <tr>
      <td align="center" style=" padding: 8px;">SL.No</td>
      <td align="center" style=" padding: 8px;">Center Name</td>
      <!-- <td>Email:</td>
      <td>Contact:</td>
      <td>Type Of Center:</td>
      <td>District:</td>
      <td>City:</td>
      <td>Area:</td>
      <td>Building:</td>
      <td>Landmark:</td>
      <td>Logo:</td>
      <td>Proof:</td>
      <td>Date Of Join:</td> -->
      <td align="center" style=" padding: 8px;">Status</td>
      <td align="center" style=" padding: 8px;">More</td>

    </tr>
   <?php
   $selqry="SELECT * FROM tbl_center c inner join tbl_city p on c.city_id=p.city_id inner join tbl_district d on     d.district_id=p.district_id where center_status=".$astatus ;
   $res=$con->query($selqry);
   $i=0;
   while($row=$res->fetch_assoc())
   {
	   $i++;
	   ?>
       <tr>
       <td align="center" style=" padding: 8px;"><?php echo $i;?></td>
       <td align="center" style=" padding: 8px;"><?php echo $row['center_name'];?></td>
        <!-- <td><?php //echo $row['center_email'];?></td>
         <td><?php //echo $row['center_contact'];?></td>
          <td><?php //echo $row['center_type'];?></td>
           <td><?php //echo $row['district_name'];?></td>
            <td><?php //echo $row['city_name'];?></td>
            <td><?php //echo $row['center_area'];?></td>
             <td><?php //echo $row['center_building'];?></td>
             <td><?php //echo $row['center_landmark'];?></td>
              <td><img src="..\Assets\File\Center\<?php //echo $row['center_logo'];?>" width="100" /></td>
               <td><a href="..\Assets\File\Center\<?php //echo $row['center_proof'];?>" />Proof</a></td>
                <td><?php //echo $row['center_doj'];?></td> -->
                <td align="center" style=" padding: 8px;"><a href="CenterVerification.php?rid=<?php echo $row['center_id']?>" style="color:red">Reject</a></td>
                <td align="center" style=" padding: 8px;"><a href="ViewMore.php?cenid=<?php echo $row['center_id']?>" style="color:orange">View More</a></td></tr>
                <?php
   }
   ?>
  
   </table>
      </form>
     </center>
   
 
<br>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Rejected Centers</h2>
</center>
    <center>
      <form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;">
    <table border="1" style="width: 100%;
            border: 1px solid #ccc;">
     <tr>
      <td align="center" style=" padding: 8px;">SL.No</td>
      <td align="center" style=" padding: 8px;">Center Name</td>
      <!-- <td>Email:</td>
      <td>Contact:</td>
      <td>Type Of Center:</td>
      <td>District:</td>
      <td>City:</td>
      <td>Area:</td>
      <td>Building:</td>
      <td>Landmark:</td>
      <td>Logo:</td>
      <td>Proof:</td>
      <td>Date Of Join:</td> -->
      <td align="center" style=" padding: 8px;">Status</td>
    </tr>
   <?php
   $selqry="SELECT * FROM tbl_center c inner join tbl_city p on c.city_id=p.city_id inner join tbl_district d on     d.district_id=p.district_id where center_status=".$rstatus ;
   $res=$con->query($selqry);
   $i=0;
   while($row=$res->fetch_assoc())
   {
	   $i++;
	   ?>
       <tr>
       <td align="center" style=" padding: 8px;"><?php echo $i;?></td>
       <td align="center" style=" padding: 8px;"><?php echo $row['center_name'];?></td>
        <!-- <td><?php //echo $row['center_email'];?></td>
         <td><?php //echo $row['center_contact'];?></td>
          <td><?php //echo $row['center_type'];?></td>
           <td><?php //echo $row['district_name'];?></td>
            <td><?php //echo $row['city_name'];?></td>
            <td><?php //echo $row['center_area'];?></td>
             <td><?php //echo $row['center_building'];?></td>
             <td><?php //echo $row['center_landmark'];?></td>
              <td><img src="..\Assets\File\Center\<?php //echo $row['center_logo'];?>" width="100" /></td>
               <td><a href="..\Assets\File\Center\<?php //echo $row['center_proof'];?>" />Proof</a></td>
                <td><?php //echo $row['center_doj'];?></td> -->
                 <td align="center" style=" padding: 8px;"> <a href="CenterVerification.php?aid=<?php echo $row['center_id']?>" style="color:green">Accept</a></td></tr>
                <?php
   }
   ?>
  
   </table>
      </form>
    </center>
   
 
</form>
  </div>

</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>

</html>