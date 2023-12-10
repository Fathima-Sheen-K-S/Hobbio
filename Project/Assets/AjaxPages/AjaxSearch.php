<?php

include("../Connection/Connection.php");

session_start();

if($_GET['diid'] != "" && $_GET['cid']=="" && $_GET['caid']=="" && $_GET['sid']=="")
{
    $selQry="SELECT * FROM tbl_center ce inner join tbl_city ci on ce.city_id=ci.city_id inner join tbl_district di on ci.district_id=di.district_id where di.district_id=".$_GET['diid'];
    $res = $con->query($selQry);
    $i = 0;
    ?>
    <div id="mydiv" class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
        <tr>
            <th align="center" style='font-size: 18px; font-family: "Playfair Display", serif;'>SL no</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Name</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Type</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Contact</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Email</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Logo</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Action</th>

        </tr>
        <tr>
            <?php
            while ($row = $res->fetch_assoc()) {
                $i++;
                ?>
                <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
                    <?php echo $i; ?>
                </td>
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
                <td><a href="ViewCenter.php?cid=<?php echo $row['center_id'] ?>" 
                style="background-color: #e6b78feb; 
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
    <?php

}
if( $_GET['sid'] != "" && $_GET['caid']!="" && $_GET['cid']=="" && $_GET['diid']=="") {
     
  $selQry = "select * from tbl_center c inner join tbl_course cu on c.center_id = cu.center_id  where  subcategory_id=" . $_GET['sid'];

    $res = $con->query($selQry);
    $i = 0;
    ?>
    <div id="mydiv" class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
        <tr>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>SL no</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Name</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Type</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Contact</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Email</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Logo</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Action</th>

        </tr>
        <tr>
            <?php
            while ($row = $res->fetch_assoc()) {
                $i++;
                ?>
                <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
                    <?php echo $i; ?>
                </td>
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
    <?php

}

if($_GET['cid'] != "" && $_GET['sid'] != "" && $_GET['diid'] != "" && $_GET['caid'] != "") {
    $selQry = "select * from tbl_center c inner join tbl_course cu on c.center_id = cu.center_id  where  subcategory_id=" . $_GET['sid'] ." and city_id=" . $_GET['cid'];

    $res = $con->query($selQry);
    $i = 0;
    ?>
   <div id="mydiv" class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
        <tr>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>SL no</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Name</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Type</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Contact</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Email</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Logo</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Action</th>

        </tr>
        <tr>
            <?php
            while ($row = $res->fetch_assoc()) {
                $i++;
                ?>
                <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
                    <?php echo $i; ?>
                </td>
                <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
                    <?php echo $row['center_name']; ?>
                </td>
                <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
                    <?php echo $row['center_type']; ?>
                </td>
                <td>
                    <?php echo $row['center_contact']; ?>
                </td>
                <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
                    <?php echo $row['center_email']; ?>
                </td>
                <td><img src="../Assets/File/Center/<?php echo $row['center_logo']; ?>" width="100" /></td>
                <td><a href="ViewCenter.php?cid=<?php echo $row['center_id'] ?>"
                style="background-color: #e6b78feb; 
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
    <?php

}

if($_GET['cid'] != "" && $_GET['diid'] != "" && $_GET['caid']=="" && $_GET['sid']=="") {
    $selQry = "select * from tbl_center where  city_id=" . $_GET['cid'];

    $res = $con->query($selQry);
    $i = 0;
    ?>
    <div id="mydiv" class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
        <tr>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>SL no</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Name</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Type</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Contact</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Email</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Logo</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Action</th>

        </tr>
        <tr>
            <?php
            while ($row = $res->fetch_assoc()) {
                $i++;
                ?>
                <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
                    <?php echo $i; ?>
                </td>
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
    <?php

}

if($_GET['caid']!="" && $_GET['sid']=="" && $_GET['diid']=="" && $_GET['cid']=="")
{
    $selQry="SELECT * FROM tbl_center ce inner join tbl_course co on co.center_id=ce.center_id inner join tbl_subcategory sub on sub.subcategory_id=co.subcategory_id inner join tbl_category cat on cat.category_id=sub.category_id where cat.category_id=".$_GET['caid']." and ce.city_id=".$_GET['cid'];
    $res = $con->query($selQry);
    $i = 0;
    ?>
    <div id="mydiv" class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
        <tr>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>SL no</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Name</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Type</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Contact</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Email</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Logo</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Action</th>

        </tr>
        <tr>
            <?php
            while ($row = $res->fetch_assoc()) {
                $i++;
                ?>
                <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
                    <?php echo $i; ?>
                </td>
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
    <?php

}

if($_GET['caid']!="" && $_GET['diid']!="" && $_GET['cid']=="" && $_GET['sid']=="")
{
    $selQry="SELECT * FROM tbl_center ce inner join tbl_city ci on ce.city_id=ci.city_id inner join tbl_district di on ci.district_id=di.district_id inner join tbl_course co on co.center_id=ce.center_id inner join tbl_subcategory sub on sub.subcategory_id=co.subcategory_id inner join tbl_category cat on cat.category_id=sub.category_id  where cat.category_id=".$_GET['caid']." and di.district_id=".$_GET['diid'];
    $res = $con->query($selQry);
    $i = 0;
    ?>
   <div id="mydiv" class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
        <tr>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>SL no</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Name</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Type</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Contact</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Email</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Logo</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Action</th>

        </tr>
        <tr>
            <?php
            while ($row = $res->fetch_assoc()) {
                $i++;
                ?>
                <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
                    <?php echo $i; ?>
                </td>
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
    <?php

}

if($_GET['caid']!="" && $_GET['diid']!="" && $_GET['cid']!="" && $_GET['sid']=="")
{
    $selQry="SELECT * FROM tbl_center ce inner join tbl_city ci on ce.city_id=ci.city_id inner join tbl_district di on ci.district_id=di.district_id inner join tbl_course co on co.center_id=ce.center_id inner join tbl_subcategory sub on sub.subcategory_id=co.subcategory_id inner join tbl_category cat on cat.category_id=sub.category_id  where cat.category_id=".$_GET['caid']." and di.district_id=".$_GET['diid'];
    $res = $con->query($selQry);
    $i = 0;
    ?>
   <div id="mydiv" class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
        <tr>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>SL no</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Name</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Center Type</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Contact</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Email</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Logo</th>
            <th style='font-size: 18px; font-family: "Playfair Display", serif;'>Action</th>

        </tr>
        <tr>
            <?php
            while ($row = $res->fetch_assoc()) {
                $i++;
                ?>
                <td style='font-size: 18px; font-family: "Playfair Display", serif;'>
                    <?php echo $i; ?>
                </td>
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
    <?php

}


?>