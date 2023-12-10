<?php   
 session_start();  
include("../Assets/Connection/Connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	
require'../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';


if(isset($_POST['btnotp']))
{

   $email=$_POST['txtemail'];

$selqry="select *from tbl_center where center_email='".$email."'";
	$res=$con->query($selqry);
	$cusqry="select *from tbl_user where user_email='".$email."'";
	$cusres=$con->query($cusqry);
	if(!($row=$res->fetch_assoc()||$cusrow=$cusres->fetch_assoc()))
	{ 
	   ?>
			<script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "Account Not Found",
      text: "There is no account associated with the provided email address.",
      icon: "error"
    });
  });
</script>
		  <?php
	 }
	 else
	 {
  
				$ran=rand(100000,999999);
				$_SESSION["otp"]=$ran;
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
		  
			$mail->Subject = "Hobbio password Recovery";
			$mail->Body = "Hello...<br> This is your one time password to recover your Hobbio account enter the given OTP to set a new Password <b>".$ran.".</b> <br>Thank you😊 ";
		  if($mail->send())
		  {
?>
				<script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: "OTP Sent",
      text: "Your OTP has been sent to your Email",
      icon: "success"
    }).then(() => {
      window.location = "OTP.php?eid=<?php echo $email ?>";
    });
  });
</script>
		<?php
		  }
		  else
		  {
			echo "Failed";
		  }
}
}//Email Code End
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::Forgot Password</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
  
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(to right, #f65d5f, #f78a33);
            font-family: 'Playfair Display', serif;
            color: #fff;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
			height:50%;
        }

        h1 {
            color: #fff;
            margin-bottom: 20px;
			
			
        }

        form {
            text-align: left;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        #btnnotp {
            background: linear-gradient(to right, #f78a33,#f65d5f);
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
        }

        #btnnotp:hover {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>


<body>

<div class="card">
        <h1 align="center" >Reset Your Password</h1>
<form id="form1" name="form1" method="post" action="">
<table width="285"  rules="none" cellpadding="10px">
  <tr>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'>E-mail</td>
    <td  style='font-size: 20px; font-family: "Playfair Display", serif;'><label for="txtemail"></label>
    <input type="email" name="txtemail" id="txtemail"  style='font-size: 18px; font-family: "Playfair Display", serif;'/></td>
  </tr>
   <tr>
    <td colspan="2"  align="center" style='font-size: 20px; font-family: "Playfair Display", serif;'><input type="submit" name="btnotp" id="btnotp" value="Send OTP" style="background: linear-gradient(to right, #f78a33,#f65d5f);
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;"/></td>
  </tr>
</table>
</form>


</body>
</html>