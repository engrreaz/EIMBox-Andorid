<?php
date_default_timezone_set('Asia/Dhaka');;
$cur = date('Y-m-d H:i:s');; $sy = date('Y');
	include ('../db.php');;
	

	$rootuser = $_POST['rootuser'];;  $id = $_POST['id'];;  $action = $_POST['action'];;  
	$cls = $_POST['cls'];;  $sec = $_POST['sec'];;  
	
	if($action == 1){
	    if($id == ''){
	        $query33 ="INSERT INTO areas (id, idno, user, areaname, subarea, sessionyear, yesno) VALUES (null, 0, '$rootuser', '$cls', '$sec', '$sy', 1);";
	    } else {
	        $query33 ="UPDATE areas set areaname = '$cls', subarea = '$sec' where id='$id';";
	    }
	} else {
	    $query33 ="DELETE from areas  where id='$id';";
	}
	$conn->query($query33);
	
    
   //************************************************************************************************************************************************
   //****************************************************************************************************************************************************************
   
    
        $sql00xgr = "SELECT * FROM areas where user='$rootuser' order by idno, id";  
        $result00xgr = $conn->query($sql00xgr);
        if ($result00xgr->num_rows > 0) {while($row00xgr = $result00xgr->fetch_assoc()) {
            $id=$row00xgr["id"]; $cls2=$row00xgr["areaname"]; $sec2=$row00xgr["subarea"]; 
        ?>
        
                <div class="card" style="background:var(--lighter); color:var(--darker);" >
                  <img class="card-img-top"  alt="">
                  <div class="card-body">
                    <table style="">
                        <tr>
                            <td style="width:50px; vertical-align:top; color:var(--dark);"><i class="material-icons">group</i></td>
                            <td>
                                <h4 id="cls<?php echo $id;?>"><?php echo $cls2;?></h4><small>Class Name</small><br><br>
                                <h5 id="sec<?php echo $id;?>"><?php echo $sec2;?></h5><small>Section / group Name</small>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="padding-top:5px;">
                                <button  class="btn btn-primary" onclick="edit(<?php echo $id;?>);">Edit</button>
                                <button  class="btn btn-danger" onclick="del(<?php echo $id;?>);">Delete</button>
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
                <div style="height:8px;"></div>
        
        
        <?php }} ?>
        
