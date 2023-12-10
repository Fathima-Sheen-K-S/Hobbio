<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Largest And Smallest</title>
<?php
$a=$b=$c=$big=$small="";
if(isset($_POST["btnfind"])){
	$a=$_POST["txtfnum"];
	$b=$_POST["txtsnum"];
	$c=$_POST["txttnum"];
	$small=$big=$a;
	if($b>$big)
	$big=$b;
	if($c>$big)
	$big=$c;
	if($b<$small)
	$small=$b;
	if($c<$small)
	$small=$c;
}
?>
</head>
<body>
<center>
<h4>Largest and Smallest</h4>
<form method="post">
<table border="1" rules="none">
<tr>
<td>First Number:</td>
<td><input type="text" name="txtfnum" /></td>
</tr>
<tr>
<td>Second Number:</td>
<td><input type="text" name="txtsnum" /></td>
</tr>
<tr>
<td>Third Number:</td>
<td><input type="text" name="txttnum" /></td>
</tr>
<tr>
<td colspan="2">
<center>
<input type="submit" name="btnfind" value="Find" />
</center>
</td>
</tr>
</table>
<?php
echo "<br>";
echo "First Number=",$a,"<br>";
	echo "Second Number=",$b,"<br>";
	echo "Third Number=",$c,"<br>","<br>";
	
	echo "Largest number=",$big,"<br>";
	echo "Smallest number=",$small;
?>
</form>
</center>
</body>
</html>