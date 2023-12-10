<?php
ob_start();
include('Head.php');

include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hobbio::View Gallery</title>
</head>

<body>
  <center>
    <h3>Gallery</h3><br>
    <div style="display: flex;
    flex-wrap: wrap;
    justify-content: center;">
      <?php
      $selqry = "select * from tbl_gallery where course_id=" . $_GET['cid'];
      $res = $con->query($selqry);
      while ($row = $res->fetch_assoc()) {
      ?>
        <div style="background: linear-gradient(to bottom, #f65d5d, #fdb07d );
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 10px;
    max-width: 300px;
    text-align: center;">
          <img src="../Assets/File/Center/<?php echo $row['gallery_image']; ?>" alt="Gallery Image" style="max-width: 100%;
    height: auto;
    border-radius: 10px;
    display: block;
    margin: 0 auto;"/>
        </div>
      <?php
      }
      ?>
    </div>
  </center>
</body>

<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>