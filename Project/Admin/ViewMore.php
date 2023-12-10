<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$cid=$_GET['cenid'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::Center Verification</title>
</head>

<body>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">More Details...</h2>
</center>
<form id="form1" name="form1" method="post" action="" style="background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            margin: 20px auto;">
    <?php
    $sel="SELECT * FROM tbl_center c inner join tbl_city p on c.city_id=p.city_id inner join tbl_district d on     d.district_id=p.district_id where center_id=".$cid;
    $res=$con->query($sel);
    $row=$res->fetch_assoc();
        ?>
    <table  rules="none" style=" width: 100%;
            border-collapse: collapse;">
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Center Name:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><?php echo $row['center_name'];?></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Email:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><?php echo $row['center_email'];?></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Contact:</td>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><?php echo $row['center_contact'];?></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Type:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><?php echo $row['center_type'];?></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">District:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><?php echo $row['district_name'];?></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">City:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><?php echo $row['city_name'];?></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Area:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><?php echo $row['center_area'];?></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Building:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><?php echo $row['center_building'];?></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Landmark:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><?php echo $row['center_landmark'];?></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Logo:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><img src="..\Assets\File\Center\<?php echo $row['center_logo'];?>" width="100" /></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Proof:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><a href="..\Assets\File\Center\<?php echo $row['center_proof'];?>" style="color:green" >Proof</a></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Date Of Join:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><?php echo $row['center_doj'];?></td>
        </tr>
        <tr>
            <th style="padding: 10px; font-family: 'Times New Roman', serif;">Status:</th>
            <td style="padding: 10px; font-family: 'Times New Roman', serif;"><a href="CenterVerification.php" style="color:red">Verify</a>
                <!-- <a href="CenterVerification.php?rid=<?php //echo $row['center_id']?>">Reject</a></td> -->
        </tr>

    </table>
</form>


</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>

</html>