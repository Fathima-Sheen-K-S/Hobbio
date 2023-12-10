<?php
 session_start();  
 include("../Assets/Connection/Connection.php");

 
if(isset($_POST["btnsubmit"]))
{
	
	if($_SESSION["otp"]==$_POST["txtotp"])
	{
      $email=$_GET['eid'];
	  
	 ?>
			<script>
			window.location="ChangePassword.php?eid=<?php echo $email ?>";	
			</script>
		  <?php
	
	}
	else
	{
		?>
		<script>
		alert("Invalid OTP");
		</script>
		<?php
		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
  <head>
  	<title>Hobbio::OTP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
			height:100%;
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
	
		
			<form method="post">
		    <input type="text" name="txtotp" id="txtotp" placeholder="6 digit code" class="form-control rounded-left" autocomplete="off" required
            style='font-size: 20px; font-family: "Playfair Display", serif;'>
             <button id="resendButton" style="display: none;" onClick="resend()" style='font-size: 20px; font-family: "Playfair Display", serif;'>Resend</button>
                 <p id="timer" style='font-size: 20px; font-family: "Playfair Display", serif;'>resend in: 60 seconds</p>
                 
	         <input type="submit" name="btnsubmit" value="submit" style="background: linear-gradient(to right, #f78a33,#f65d5f);
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;"/>
	            
	          </form>
   <script>
        // Function to start the timer
        function startTimer(duration, display) {
            let timer = duration;
            let intervalId = setInterval(function () {
                const minutes = Math.floor(timer / 60);
                const seconds = timer % 60;

                display.textContent = `resend : ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

                if (--timer < 0) {
                    clearInterval(intervalId);
                    display.textContent = "click resent to sent the OTP again!";
                    document.getElementById('resendButton').style.display = 'block';
                }
            }, 1000);
        }

        // Function to initialize the timer
        function initializeTimer() {
            const timerset = 60; // Set the timer duration in seconds
            const display = document.getElementById('timer');
            startTimer(timerset, display);
        }

        // Call the initializeTimer function when the page loads
        window.onload = initializeTimer;
    </script>


<script>
function resend()
     {
	window.location="ForgotPassword.php";
	}
</script>
    </div>
</body>
</html>