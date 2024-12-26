<?php
date_default_timezone_set('Asia/Dhaka');;
$cur = date('Y-m-d H:i:s');; $sy = date('Y');
	include ('../db.php');;
	

	$sccode = $_POST['sccode'];; $rootuser = $_POST['rootuser'];;   $subcode = $_POST['id'];;    $cls = $_POST['cls'];;  
	
    $sql00xgr = "SELECT * FROM areas where id='$cls'";  
    $result00xgr = $conn->query($sql00xgr);
    if ($result00xgr->num_rows > 0) {while($row00xgr = $result00xgr->fetch_assoc()) {
    $clsf=$row00xgr["areaname"]; $secf=$row00xgr["subarea"];}}
    
    
    $query33 ="update sessioninfo set fourth_subject='$subcode' where sessionyear = '$sy' and classname='$clsf' and sectionname = '$secf' and sccode = '$sccode'";
	$conn->query($query33);
   
   
   ?>
   
   <button class="btn btn-success" onclick="fourth(<?php echo $subcode;?>);" >Set Fourth Subject</button>