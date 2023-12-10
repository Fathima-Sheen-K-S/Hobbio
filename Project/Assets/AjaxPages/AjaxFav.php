<?php
include("../Connection/Connection.php");
session_start();

	$userid=$_SESSION['uid'];
    $centerid=$_GET['cenid'];
    $courseid=$_GET['courid'];
    $checkLike="";
    $sel="select *from tbl_favorites where course_id=".$courseid." and user_id=".$userid."";
	$resf=$con->query($sel);
	if($rowf=$resf->fetch_assoc())
		{
			$del="delete from tbl_favorites where course_id=".$courseid;
			if($con->query($del))
			{
                $seld="select *from tbl_favorites where course_id=".$courseid." and user_id=".$userid."";
                $resd=$con->query($seld);
                if($rowd=$resd->fetch_assoc())
                    $checkLike=true;
                else
                $checkLike=false;
			}
		}
		else
		{
			$ins="insert into tbl_favorites(user_id,course_id) values(".$userid.",".$courseid.")";
			if($con->query($ins))
			{
				$seld="select *from tbl_favorites where course_id=".$courseid." and user_id=".$userid."";
                $resd=$con->query($seld);
                if($rowd=$resd->fetch_assoc())
                    $checkLike=true;
                else
                $checkLike=false;
			}
        	
		
		
		}

        $response=array('checkLike'=>$checkLike);  
        $jsonResponse = json_encode($response);
        echo $jsonResponse;   
        ?>