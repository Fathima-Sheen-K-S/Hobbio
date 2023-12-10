<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");


$userid = $_SESSION['uid'];
$courseid = $_GET['coid'];
$sel = "select *from tbl_course where course_id=" . $courseid;
$res = $con->query($sel);
$row = $res->fetch_assoc();
$coursename = $row['course_name'];



?>




<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <title>Hobbio::View Packages</title>
        <style>
                td {
                        margin: 20px;
                }
                .package-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    margin-top: 20px;
}

.package-card {
    border-radius: 39px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 10px;
    background-color: #f5d3ae;
    width: 300px;
    margin-bottom: 20px;
    margin-right: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.package-info {
    color: black;
    font-size: 18px;
    font-family: 'Playfair Display', serif;
}

.book-button {
    text-decoration: none;
    color: #f65d5d;
    font-weight: bold;
    background-color: #f2f2f2;
    padding: 10px 20px;
    border: 2px solid #f65d5d;
    border-radius: 5px;
    text-align: center;
    display: inline-block;
    margin: 10px;
    transition: background-color 0.3s, color 0.3s;
    font-family: 'Playfair Display', serif;
}

        </style>
</head>

<body>

        <center><br />
                <div style=" border: 1px solid #ccc;
        border-radius: 35px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 20px;
        padding: 20px;
        background-color: #fdb07d;
        text-align: center;">
                        <h3 style="font-size: 40px;
        color: white;
        margin-bottom: 20px;">
                                <?php echo $coursename ?>
                        </h3><br />


                        <?php
                        $selqry = "select *from tbl_package where course_id=" . $courseid;
                        $result = $con->query($selqry);
                        $i = 0;
                        $n = 0;
                        ?>
                        <div class="package-container">
    <?php
    while ($rowc = $result->fetch_assoc()) {
        $i++;
    ?>
        <div class="package-card">
                
            <p class="package-info">
                <strong>SL No: <?php echo $i; ?></strong><br>
                <strong>Package Name: <?php echo $rowc['package_name']; ?></strong><br>
                <strong>Package Duration: <?php echo $rowc['package_duration']; ?></strong><br>
                <strong>Package Cost: <?php echo $rowc['package_cost']; ?></strong><br>
                <strong>Package Details: <?php echo $rowc['package_details']; ?></strong><br>
            </p>
            <div>
                <center>
                    <button onclick="coFunction(<?php echo $rowc['package_id'] ?>)" class="book-button">Book Package</button>
                </center>
            </div>
        </div>
    <?php
    }
    ?>
</div>


        </center>
        <br><br>
        <center>
                <table>
                        <tr>
                                <td align="left">


                                        <h5> <a href="UserHome.php" style="
 
 color: white;
 border:none;
 border-radius: 5px;
 padding: 10px 20px; 
 cursor: pointer;
  background-color: #d35536" onmouseover="this.style.backgroundColor='#f0934b'"
                                                        onmouseout="this.style.backgroundColor='#d35536'">Home</a></h5>

                                </td>
                        </tr>
                </table>

        </center>
</body>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function coFunction(id) {
    Swal.fire({
      title: "Book Course",
      text: "Do you want to book this course?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Yes",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "../Assets/AjaxPages/AjaxBooking.php?pid=" + id,
          success: function(result) {
            var result = result.trim();
            console.log(result);
            if (result == "1") {
              Swal.fire("Already Booked", "You are already booked for the course", "info");
            } else {
              window.location = "PackagePayment.php?pid=" + id;
            }
          }
        });
      }
    });
  }
</script>
<?php
include('Foot.php');
ob_end_flush();
?>

</html>