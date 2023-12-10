<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::User Profile</title>
<link rel="stylesheet" href="UserProfile.css">


</head>

<body>
        
        <div class="container"> 
                
    <center>
        <form method="post" enctype="multipart/form-data">
        <h3>My Profile</h3>
            <?php
            $userid = $_SESSION['uid'];
            $selqry = "SELECT * FROM  tbl_user u 
                        INNER JOIN tbl_city p ON u.city_id=p.city_id 
                        INNER JOIN tbl_district d ON p.district_id=d.district_id 
                        WHERE user_id=" . $userid . "";
            $res = $con->query($selqry);
            while ($row = $res->fetch_assoc()) {
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
                    <img src="../Assets/File/User/<?php echo $row['user_photo'] ?>" style=" width: 40%;
    height: 40%;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;" alt="User Photo">
                    <div style="padding: 20px;">
                        <h4 style='font-family: "Playfair Display", serif;'><?php echo $row['user_name']; ?></h4><br>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>Email:</strong> <?php echo $row['user_email']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>Contact:</strong> <?php echo $row['user_contact']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>House Name:</strong> <?php echo $row['user_house']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>Area:</strong> <?php echo $row['user_area']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>District:</strong> <?php echo $row['district_name']; ?></p>
                        <p style='font-size: 18px; font-family: "Playfair Display", serif;'><strong>City:</strong> <?php echo $row['city_name']; ?></p>
                    </div>
                    <div style=" margin-top: 10px;
                                 margin-bottom: 13px;">
                        <a href="UserEditProfile.php" style=" margin-right: 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
    padding: 10px 10px;background-color: #f0934b">Edit Your Profile</a>
                        <a href="UserChangePassword.php" style="margin-right: 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
    padding: 10px 20px;background-color: #753b08">Change Password</a>
                        <a href="UserHome.php" style="margin-right: 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
    padding: 10px 20px;  background-color: #a99905">Home</a>
                    </div>
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