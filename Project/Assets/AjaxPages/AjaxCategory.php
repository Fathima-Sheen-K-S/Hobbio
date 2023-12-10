<?php
include("../Connection/Connection.php");
?>
<option value="">Select Subcategory</option>
<?php
		$selsubcat="select *from tbl_subcategory where category_id=".$_GET['sid'];
		$ressubcat=$con->query($selsubcat);
		while($rowsubcat=$ressubcat->fetch_assoc())
		{
		?>
        
        <option value="<?php echo $rowsubcat['subcategory_id'] ?>"> <?php echo $rowsubcat['subcategory_name']?></option>
        <?php
		}
		?>
		
        
        
        
       