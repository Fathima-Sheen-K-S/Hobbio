<?php
include("../Connection/Connection.php");

?>
 <option value="">Select City</option>
        <?php
		$selplace="select *from tbl_city where district_id=".$_GET['pid'];
		$resplace=$con->query($selplace);
		while($rowplace=$resplace->fetch_assoc())
		{
		?>
        
        <option value="<?php echo $rowplace['city_id'] ?>"> <?php echo $rowplace['city_name']?></option>
        <?php
		}
		?>