<?php

include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">Learners Report</h2>
</center>
  <form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            
            margin: 0 auto;
            height: 400px;
    max-width: 621px;">
<div id="tab" align="center">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_center";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["center_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_center";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select count(booking_id) as id from tbl_booking bo inner join  tbl_package pa  on bo.package_id=pa.package_id
   inner join tbl_course co on co.course_id=pa.course_id 
   inner join tbl_center ce on ce.center_id=co.center_id 
    WHERE ce.center_id='".$data["center_id"]."'";
	  
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
      text: "Centers with most learners"
    }
  }
});
</script>

</div>
  </form>
</body>
<?php
include("Foot.php");
ob_end_flush();
?>
</html>
