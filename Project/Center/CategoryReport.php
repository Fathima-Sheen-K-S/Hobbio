<?php

include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

$centerid=$_SESSION['cid'];
?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
    <center>
    <center><h3>Report Based On Categories</h3></center><br />
<div id="tab" align="center" style="background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    max-width: 900px;">
    <center>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_category";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["category_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_category";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select count(booking_id) as id from tbl_booking bo inner join  tbl_package pa  on bo.package_id=pa.package_id
   inner join tbl_course co on co.course_id=pa.course_id 
   inner join tbl_center ce on ce.center_id=co.center_id 
   inner join tbl_subcategory sub on sub.subcategory_id=co.subcategory_id 
 
  
  inner join tbl_category c on c.category_id=sub.category_id WHERE c.category_id='".$data["category_id"]."' and ce.center_id=".$centerid;
	  
	  $row1=$con->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All Category Report"
    }
  }
});
</script>
    </center>
</div>
    </center>
</body>
<?php
include("Foot.php");
ob_end_flush();
?>
</html>
