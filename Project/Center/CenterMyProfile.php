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
<title>Hobbio::Center Profile</title>
</head>
<body>
<div class="container"> 
                
    <center>
<form method="post" enctype="multipart/form-data">
<h3>Center Profile</h3>

<?php

$selqry="SELECT * FROM  tbl_center c inner join tbl_city p on c.city_id=p.city_id inner join tbl_district d on p.district_id=d.district_id where center_id=".$centerid."";
$res=$con->query($selqry);
while($row=$res->fetch_assoc())
{

?>
<br>
<div style=" background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    text-align: center;
    width:50%;
    height:50%;
    padding-bottom: 30px">
<div style="padding:20px;"><img src="../Assets/File/Center/<?php echo $row['center_logo']?>" style=" width: 40%;
    height: 30%;
    
    border-radius: 15px;" alt="User Photo" /></div>
<div style="padding: 20px;">
                        <h4 style='font-family: "Playfair Display", serif;'><?php echo $row['center_name']; ?></h4><br>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>Email:</strong> <?php echo $row['center_email']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>Type:</strong> <?php echo $row['center_type']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>Contact:</strong> <?php echo $row['center_contact']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>Area:</strong> <?php echo $row['center_area']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>Building:</strong> <?php echo $row['center_building']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>Landmark:</strong> <?php echo $row['center_landmark']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>District</strong> <?php echo $row['district_name']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>City:</strong> <?php echo $row['city_name']; ?></p>
                    </div>
                    <div style=" margin-top: 10px;
                                 margin-bottom: 13px;">
                                 <a href="..\Assets\File\Center\<?php echo $row['center_proof'];?>" style="margin-right: 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
    padding: 10px 20px;background-color: #a99905">Proof</a>
                        <a href="CenterEditProfile.php" style=" margin-right: 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
    padding: 10px 10px;background-color: #f0934b">Edit Your Profile</a>
                        <a href="CenterChangePassword.php" style="margin-right: 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
    padding: 10px 20px;background-color: #753b08">Change Password</a>
                        <a href="CenterHome.php" style="margin-right: 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
    padding: 10px 20px;  background-color: #a99905">Home</a>
                    </div>
               

<?php
}
?>

</form>
</center>
</div>
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>