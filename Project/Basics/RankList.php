<?php
$gender=$per=$grade=$total=$name=$dep="";
if(isset($_POST["btnsubmit"])){
	$fname=$_POST["txtfname"];
	$lname=$_POST["txtlname"];
	$gender=$_POST["btngender"];
	$dep=$_POST["ddldepartment"];
	if($gender=="Female")
	$pre="Ms.";
	else
	$pre="Mr.";
	$name=$pre.$fname." ".$lname;
	
	
	
	$total=$_POST["txtm1"]+$_POST["txtm2"]+$_POST["txtm3"];
	
	$per=($total*100)/300;
	
	if($per>=90)
	$grade="A+";
	else if(($per>=85)&&($per<90))
	$grade="A";
	else if(($per>=75)&&($per<80))
	$grade="B+";
	else if(($per>=70)&&($per<75))
	$grade="B";
	else if(($per>=60)&&($per<70))
	$grade="C+";
	else if(($per>=55)&&($per<60))
	$grade="C";
	else
	$grade="FAILED";
}
	
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RankList</title>
 




</head>

<body>
<center>

      <form id="form1" name="form1" method="post" action="">
        <table width="358" border="1">
          <tr>
            <td width="148">First Name:</td>
            <td width="194"><label for="txtfname"></label>
            <input type="text" name="txtfname" id="txtfname" /></td>
          </tr>
          <tr>
            <td>Last Name:</td>
            <td><label for="txtlname"></label>
            <input type="text" name="txtlname" id="txtlname" /></td>
          </tr>
          <tr>
            <td>Gender:</td>
            <td><input type="radio" name="btngender" id="gender" value="Male" />Male
              <label for="gender"></label>
              <input type="radio" name="btngender" id="gender" value="Female" />Female
            <label for="gender"></label></td>
          </tr>
          <tr>
            <td>Department:</td>
            <td><label for="ddldepartment"></label>
              <select name="ddldepartment" id="ddldepartment">
                <option value="bca">BCA</option>
                <option value="bba">BBA</option>
                <option value="bcom">BCOM</option>
                <option value="ba">BA</option>
                <option value="bsc">BSC</option>
            </select></td>
          </tr>
          <tr>
            <td>Mark 1:</td>
            <td><label for="txtm1"></label>
            <input type="text" name="txtm1" id="txtm1" /></td>
          </tr>
          <tr>
            <td>Mark 2:</td>
            <td><label for="txtm2"></label>
            <input type="text" name="txtm2" id="txtm2" /></td>
          </tr>
          <tr>
            <td>Mark 3:</td>
            <td><label for="txtm3"></label>
            <input type="text" name="txtm3" id="txtm3" /></td>
          </tr>
          <tr>
            <td height="31" colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
          </tr>
          <tr>
            <td height="31" colspan="2" align="center"><b>STUDENT DETAILS</b></td>
          </tr>
          
          <tr>
          <td>NAME:</td>
          <td><?php echo $name,"<br>"; ?></td>
          </tr>
          <tr>
          <td>GENDER:</td>
          <td><?php echo $gender,"<br>"; ?></td>
          </tr>
          <tr>
          <td>DEPARTMENT:</td>
          <td><?php echo $dep,"<br>"; ?></td>
          </tr>
          <tr>
          <td>TOTAL MARKS:</td>
          <td><?php echo $total,"<br>"; ?></td>
          </tr>
          <tr>
          <td>PERCENTAGE:</td>
          <td><?php echo $per,"%","<br>"; ?></td>
          </tr> 
          <tr>
          <td>GRADE:</td>
          <td><?php echo $grade; ?></td>
          
    </tr>
             
          
          
          
          </table>
        
        
        
      </form>
      </center>
   
</body>
</html>




<table border="1">
<tr>
<td>SL NO</td>
<td>NAME</td>
<td>CONTACT</td>
<td>EMAIL</td>
<td>GENDER</td>
<td>ADDRESS</td>
<td>DISTRICT</td> 
<td>PLACE</td>
<td>DOB</td>
<td>PHOTO</td>
<td>PROOF</td>
<td>PASSWORD</td>
</tr>
<tr>





<?php
$selqry="select *from tbl_district d inner join tbl_place p on d.district_id=p.district_id inner join tbl_user u on p.place_id=u.place_id";
$res=$con->query($selqry);
$i=0;
while($row=$res->fetch_assoc())
{
	$i++;
	?>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['user_name']; ?></td>
     <td><?php echo $row['user_contact']; ?></td>
      <td><?php echo $row['user_email']; ?></td>
       <td><?php echo $row['user_gender']; ?></td>
        <td><?php echo $row['user_address']; ?></td>
        <td><?php echo $row['district_name']; ?></td>
         <td><?php echo $row['place_name']; ?></td>
         <td><?php echo $row['user_dob'];?></td>
         <td><a href="../Assets/File/User/<?php echo $row['user_photo']; ?>" >Image</a></td>  <!--File display as a link-->
          <td><img src="../Assets/File/User/<?php echo $row['user_proof']; ?>" width="100"/></td>   <!--file display as image -->
           <td><?php echo $row['user_password']; ?></td>
           </tr>
<?php
}
?>
</table>



#7ed321
#333
    
    


