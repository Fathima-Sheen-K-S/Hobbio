<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");


$userid = $_SESSION['uid'];

?>


<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Hobbio::Search Centers</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
        <div class="card" style=" background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    text-align: center;
    width:100%;
    height:50%;">
            <div class="card-body">
                <center>
                    <h2 class="card-title">Search Centers</h2>
    <form id="form1" name="form1" method="post" action=""><br>
      <table width="237" rules="none">
      <tr>
  
  <td width="80" colspan="2" style='font-size: 18px; font-family: "Playfair Display", serif;'>
    <label for="sel_district" style="display: block;
            margin-bottom: 5px;"></label>
    <select name="sel_district" id="sel_district" onchange="getPlace(this.value),SearchCenter()" style="width: 144px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 24px;
            background-color: #e6b78feb;
            font-family: 'Playfair Display', serif;
            font-size: 16px;">
      <option value="">---District---</option>
      <?php
      $sel = "select * from tbl_district";
      $resdis = $con->query($sel);
      while ($rowdis = $resdis->fetch_assoc()) {
      ?>
        <option value="<?php echo $rowdis['district_id'] ?>">
          <?php echo $rowdis['district_name'] ?>
        </option>
      <?php
      }
      ?>
    </select>
  </td>
  
  <td width="80" colspan="2" style='font-size: 18px; font-family: "Playfair Display", serif;'>
    <label for="sel_city" style="display: block;
            margin-bottom: 5px;"></label>
    <select name="sel_city" id="sel_city" onchange="SearchCenter()" style="width: 118px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 24px;
            background-color: #e6b78feb;
            font-family: 'Playfair Display', serif;
            font-size: 16px;">
      <option value="">---City---</option>
    </select>
  </td>
</tr>

         </table>
      <br>

      <table width="237" >
        <tr>
          
          <td width="80" colspan="2" style='font-size: 18px; font-family: "Playfair Display", serif;'>
          <label for="sel_category" style="display: block;
            margin-bottom: 5px;"></label>
            <select name="sel_category" id="sel_category" onchange="getSubcat(this.value),SearchCenter()" style="width: 144px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 24px;
            background-color: #e6b78feb;
            font-family: 'Playfair Display', serif;
            font-size: 16px;">
              <option value="">---Category---</option>
              <?php
              $sel = "select *from tbl_category";
              $resdis = $con->query($sel);
              while ($rowdis = $resdis->fetch_assoc()) {
                ?>
                <option value="<?php echo $rowdis['category_id'] ?>">
                  <?php echo $rowdis['category_name'] ?>
                </option>
                <?php
              }
              ?>
            </select>
          </td>
          
          <td width="80" colspan="2" style='font-size: 18px; font-family: "Playfair Display", serif;'>
          <label for="sel_subcat" style="display: block;
            margin-bottom: 5px;"></label>
            <select name="sel_subcat" id="sel_subcat" onchange="SearchCenter()" style="width: 182px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 24px;
            background-color: #e6b78feb;
            font-family: 'Playfair Display', serif;
            font-size: 16px;">
              <option value="">---SubCategory---</option>
            </select>
          </td>
        </tr>
        </table>
    </form>
   



    <br><br>
                    <h2 class="card-title">List Of Centers</h2>
                    <div id="mydiv" class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
       
        <tr>
                                        
                                        <th scope="col" style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Name</th>
                                        <th scope="col" style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Type</th>
                                        <th scope="col" style='font-size: 18px; font-family: "Playfair Display", serif;'>Contact</th>
                                        <th scope="col" style='font-size: 18px; font-family: "Playfair Display", serif;'>Email</th>
                                        <th scope="col" style='font-size: 18px; font-family: "Playfair Display", serif;'>Logo</th>
                                        <th scope="col" style='font-size: 18px; font-family: "Playfair Display", serif;'>Action</th>
                                  
        </tr>
        <tr>

          <?php
          $selQry = "select * from tbl_center where center_status='1'";


          $res = $con->query($selQry);
          $i = 0;
          while ($row = $res->fetch_assoc()) {
            $i++;
            ?>
            
            <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
              <?php echo $row['center_name']; ?>
            </td>
            <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
              <?php echo $row['center_type']; ?>
            </td>
            <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
              <?php echo $row['center_contact']; ?>
            </td>
            <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
              <?php echo $row['center_email']; ?>
            </td>
            <td><img src="../Assets/File/Center/<?php echo $row['center_logo']; ?>" width="100" /></td>
            <td><a href="ViewCenter.php?cid=<?php echo $row['center_id'] ?>" style="background-color: #e6b78feb; 
    border: none;
    color: black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    font-family: 'Playfair Display', serif;">View Center</a></td>
          </tr>
          <?php
          }
          ?>
      </table>
    </div>
    </div>
                </center>
            </div>
        </div>
    </div>
    

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
  background-color: #d35536"
 onmouseover="this.style.backgroundColor='#f0934b'" 
         onmouseout="this.style.backgroundColor='#d35536'">Home</a></h5>

   </td>
    </tr>
</table>

</center>





</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?pid=" + did,
      success: function (html) {
        $("#sel_city").html(html);
      }
    });
  }

  function getSubcat(cid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxCategory.php?sid=" + cid,
      success: function (html) {
        $("#sel_subcat").html(html);
      }
    });
  }

  function SearchCenter() {
    var sid = document.getElementById('sel_subcat').value;
    var cid = document.getElementById('sel_city').value;
    var diid = document.getElementById('sel_district').value;
    var caid = document.getElementById('sel_category').value;
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSearch.php?cid=" + cid + "&sid=" + sid + "&diid=" + diid + "&caid=" + caid,
      success: function (html) {
        $("#mydiv").html(html);
      }
    });
  }
</script>
<?php
include('Foot.php');
ob_end_flush();
?>


</html>