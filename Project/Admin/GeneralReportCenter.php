<?php

ob_start();
include("Head.php");

include("../Assets/Connection/Connection.php");


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request Report</title>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
</head>

<body>

<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">General Report Of Centers</h2>
</center>
<form id="form1" name="form1" method="post" action="" style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 607px;
            margin: 0 auto;">
  <table  rules="none"  cellpadding="10" align="center" style="width: 100%;
            border: 1px solid #ccc;">
    <tr>
      <td style=" padding: 8px;">From Date</td>
      <td style=" padding: 8px;"><label for="txt_f"></label>
      <input type="date" name="txt_f" id="txt_f" style="width: 100%;
            padding: 5px;
            border: 1px solid #ccc;"/></td>
      <td style=" padding: 8px;">To Date</td>
      <td style=" padding: 8px;"><label for="txt_t"></label>
      <input type="date" name="txt_t" id="txt_t" style="width: 100%;
            padding: 5px;
            border: 1px solid #ccc;"/></td>
    </tr>
    <tr>
      <td style=" padding: 8px;" colspan="4" align="center"><input type="submit" name="btnsave" id="btnsave" value="View Results" 
      style="background-color: #f47d36;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;"/></td>
    </tr>
  </table>
</form>
  <?php
  if(isset($_POST["btnsave"]))
  {
  ?>
<br><br>
  <form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;">
  <div id="pri">
  <table  border="1" cellpadding="10" align="center" style="width: 100%;
            border: 1px solid #ccc;">
    <tr>
      <td width="41" style=" padding: 8px;" align="center">Sl.no</td>
      <td width="46" style=" padding: 8px;" align="center">Name</td>
      <td width="60" style=" padding: 8px;" align="center">Contact</td>
      <td width="97" style=" padding: 8px;" align="center">Email</td>
     
     
     
    </tr>
    <?php
	$sel="SELECT * FROM tbl_booking b inner join tbl_package p on p.package_id=b.package_id inner join tbl_course c on c.course_id=p.course_id inner join tbl_center ce on ce.center_id=c.center_id where b.booking_status='1' and b.booking_date between '".$_POST["txt_f"]."' and '".$_POST["txt_t"]."'";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td style=" padding: 8px;" align="center"><?php echo $i?></td>
      <td style=" padding: 8px;" align="center"><?php echo $data["center_name"];?></td>
      <td style=" padding: 8px;" align="center"><?php echo $data["center_contact"];?></td>
      <td style=" padding: 8px;" align="center"><?php echo $data["center_email"];?></td>
      
          </tr>
          <?php
	}
		  ?>
  </table>
  </div>
<br>
   <center><input type="button" onclick="printDiv('pri')" id="invoice-print"  class="btn btn-success" value="Print" /></center>
   </form>
  <?php
  }
  ?>
 
</form>
</body>

<script> 
    const todate = document.getElementById("txt_t"); 
    
      function disablePastDates() { 
      const today = new Date().toISOString().split('T')[0]; 
      todate.setAttribute('max', today); 
    } 
 
    disablePastDates(); 


      </script>

<script> 
    const fromdate = document.getElementById("txt_f"); 
    
      function disablePastDates() { 
      const today = new Date().toISOString().split('T')[0]; 
      fromdate.setAttribute('max', today); 
    } 
 
    disablePastDates(); 


      </script>
<?php
include("Foot.php");
ob_flush();
?>
</html>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

