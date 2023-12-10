<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	
require'../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

ob_start();
include('Head.php');

include("../Assets/Connection/Connection.php");

if(isset($_GET["bid"]))
{
    $sel="select *from tbl_booking b inner join tbl_user u on u.user_id=b.user_id where b.booking_id=".$_GET['bid'];
    $row=$con->query($sel);
    $res=$row->fetch_assoc();
    $name=$res['user_name'];
    $email=$res['user_email'];

		//Email Code Start
		$mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hobbiomini@gmail.com'; // Your gmail
    $mail->Password = 'itunzneuztnyzahb'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('hobbiomini@gmail.com'); // Your gmail
  
    $mail->addAddress($email);
  
    $mail->isHTML(true);
  
    $mail->Subject = "HOBBIO...Follow your passion";
    $mail->Body = "Hello " .$name.",<br>
    Your booking cancellation for the course has been Done...and payment has been refunded..<br>
    Thank You 😊<br>
    For any queries or complaints <br>
    Email us on<br>
    hobbiomini@gmail.com";
  if($mail->send())
  {
    echo "Sended";
    $upd="update tbl_booking set booking_status=3 where booking_id=".$_GET['bid'];
    $con->query($upd);
    ?>
    <script>
        window.location="CancelledBookings.php"
        </script>
        <?php
  }
  else
  {
    echo "Failed";
  }
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::Cancelled Bookings</title>
</head>

<body>
<center><br />
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Cancelled Bookings</h2>
</center>
<form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;" method="get">
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;
            border: 1px solid #ccc;">
<tr>
<td align="center" style=" padding: 8px;">SL No</td>
<td align="center" style=" padding: 8px;">User Name and Email</td>

<td align="center" style=" padding: 8px;">Package Name and Cost</td>
<td align="center" style=" padding: 8px;">Course Name</td>
<td align="center" style=" padding: 8px;">Center Name and Email</td>


<td align="center" style=" padding: 8px;">Send Email</td>
</tr>
<?php
$selc="SELECT * FROM tbl_booking book inner join tbl_user u on u.user_id=book.user_id 
inner join tbl_package p on p.package_id=book.package_id inner join tbl_course c on c.course_id=p.course_id 
inner join tbl_center ce on ce.center_id=c.center_id where book.booking_status=2 ";
 $resc=$con->query($selc);
   $i=0;
   while($rowc=$resc->fetch_assoc())
   {
	   $i++;
?>
<tr>
       <td align="center" style=" padding: 8px;"><?php echo $i;?></td>
       <td align="center" style=" padding: 8px;"><?php echo $rowc['user_name'];?>
      <br><?php echo $rowc['user_email'];?></td>
       <td align="center" style=" padding: 8px;"><?php echo $rowc['package_name'];?><br><?php echo $rowc['package_cost'];?></td>
       <td align="center" style=" padding: 8px;"><?php echo $rowc['course_name'];?></td>
       <td align="center" style=" padding: 8px;"><?php echo $rowc['center_name'];?><br><?php echo $rowc['center_email'];?></td>
       <td align="center" style=" padding: 8px;"><a href="CancelledBookings.php?bid=<?php echo $rowc['booking_id'];?>"
       style="color:red">
       Send</a>
    </td>

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