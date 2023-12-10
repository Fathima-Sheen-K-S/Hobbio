<?php

include("../Assets/Connection/Connection.php");
ob_start();

include("Head.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Hobbio::Report1</title>
  </head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<center>
    <h2 style="font-family: 'Times New Roman', serif; font-size: 35px;">SubCategory Report</h2>
</center>
  <form style="background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            
            margin: 0 auto;
            height: 400px;
    max-width: 700px;">
<div id="tab" align="center">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_subcategory";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["subcategory_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_subcategory";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select count(booking_id) as id from tbl_booking bo inner join  tbl_package pa  on bo.package_id=pa.package_id inner join tbl_course co on co.course_id=pa.course_id inner join tbl_subcategory sub on sub.subcategory_id=co.subcategory_id 
     inner join tbl_user u on u.user_id=bo.user_id 
     
      WHERE sub.subcategory_id='".$data["subcategory_id"]."'";
	  
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
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      label: '# of subcategories',
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "SubCategory Report"
    }
  }
});
</script>

</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>
