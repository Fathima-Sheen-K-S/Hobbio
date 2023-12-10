<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calculator</title>
<?php
$sum=0;
if(isset($_POST["btnadd"]))
{
	$a=$_POST["txtfnum"];
	$b=$_POST["txtsnum"];
	$sum=$a+$b;
	echo "SUM=",$sum;
}
$sub=0;
if(isset($_POST["btnsub"]))
{
	$a=$_POST["txtfnum"];
	$b=$_POST["txtsnum"];
	$sub=$a-$b;
	echo "DIFFERENCE=",$sub;
}
$pro=0;
if(isset($_POST["btnmul"]))
{
	$a=$_POST["txtfnum"];
	$b=$_POST["txtsnum"];
	$pro=$a*$b;
	echo "PRODUCT=",$pro;
}
$quo=0;
if(isset($_POST["btndiv"]))
{
	$a=$_POST["txtfnum"];
	$b=$_POST["txtsnum"];
	$div=$a/$b;
	echo "QUOTIENT=",$div;
}
?>
</head>
<body>
<form method="post">
<table border="1">
<tr>
<td>First Number:</td>
<td><input type="text" name="txtfnum" /></td>
</tr>
<tr>
<td>Second Number:</td>
<td><input type="text" name="txtsnum" /></td>
</tr>
<tr>
<td colspan="2">
<center>
<input type="submit" name="btnadd" value="+"/>
<input type="submit" name="btnsub" value="-"/>
<input type="submit" name="btnmul" value="*"/>
<input type="submit" name="btndiv" value="/"/>
</center>
</td>
</tr>
</table>
</form>
</body>
</html>


<!-- style="text-decoration: none; color: #f65d5d; 
      font-weight: bold; background-color: #f2f2f2; 
      padding: 10px 20px; border: 2px solid #f65d5d; 
      border-radius: 5px; text-align: center; display: inline-block; 
      margin: 10px; transition: background-color 0.3s, color 0.3s; font-family: 'Playfair Display', serif;" -->