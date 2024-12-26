<?php
date_default_timezone_set('Asia/Dhaka');;
$cur = date('Y-m-d H:i:s');; $sy = date('Y');
	include ('../db.php');;
	

	$sccode = $_POST['sccode'];; $rootuser = $_POST['rootuser'];;   $id = $_POST['id'];;  
	
    $sql00xgr = "SELECT * FROM areas where id='$id'";  
    $result00xgr = $conn->query($sql00xgr);
    if ($result00xgr->num_rows > 0) {while($row00xgr = $result00xgr->fetch_assoc()) {
    $clsf=$row00xgr["areaname"]; $secf=$row00xgr["subarea"];}}
    
    /*
    $sql00xgrf = "SELECT * FROM sessioninfo where sccode='$sccode' order by stid desc LIMIT 1";  
    $result00xgrf = $conn->query($sql00xgrf);
    if ($result00xgrf->num_rows > 0) {while($row00xgrf = $result00xgrf->fetch_assoc()) {
    $lastid=$row00xgrf["stid"]; }} else {$lastid = $sccode * 10000 ;} $lastid = $lastid + 1;
    */
    
        $sql242 = "SELECT * FROM subsetup where classname='$clsf' and sectionname = '$secf' and sccode='$sccode'and sessionyear='$sy'";
        $result242 = $conn->query($sql242); if ($result242->num_rows > 0) {while($row242 = $result242->fetch_assoc()) {
        $subcode=$row242['subject']; $id=$row242['id']; 
        
        $ss=$row242['subj'];  $oo=$row242['obj'];  $pp=$row242['pra'];  $fm=$row242['fullmarks'];  
        
                $sql242f = "SELECT * FROM subjects where subcode='$subcode' "; 
                $result242f = $conn->query($sql242f); if ($result242f->num_rows > 0) {while($row242f = $result242f->fetch_assoc()) {
                $subname=$row242f['subject']; $subben=$row242f['subben'];  $fourth=$row242f['fourth']; }}
        
        ?>
        
                    <div class="card gg" style="background:var(--lighter); color:var(--darker);" >
                      <img class="card-img-top"  alt="">
                      <div class="card-body">
                        <table style="width:100%">
                            <tr>
                                <td style="width:50px; vertical-align:top; color:var(--dark);"><i class="material-icons">book</i></td>
                                <td>
                                    <div><?php echo $subname . '<br>'. $subben;;?></div>
                                    <div style="font-size:10px; font-style:italic;">
                                        <?php if($clsf=='Six' || $clsf == 'Seven') {  } else {echo 'Sub : <b>' . $ss . '</b> | Obj : <b>' . $oo . '</b> | Pra : <b>' . $pp . '</b> | Total : <b>' . $fm . '</b>';} ?>
                                    </div>
                                </td>
                                <td style="text-align:right;">
                                    <button class="btn btn-danger" onclick="adddels(<?php echo $id;?>, 0);" disabled ><i class="material-icons">delete</i></button>
                                    <button class="btn btn-primary" onclick="adddels(<?php echo $id;?>, 1);" disabled ><i class="material-icons">edit</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">
                                    <?php if($fourth == 1){ ?>
                                        <div id="fff<?php echo $subcode;?>">
                                        <button class="btn btn-success" onclick="fourth(<?php echo $subcode;?>);" >Set Fourth Subject</button>
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                      </div>
                    </div>
                    
        
        
        
        
        <?php
        
        }} else {
             ?>
                <div class="card" style="background:var(--darker); color:var(--lighter);" id="dosso" >
                  <img class="card-img-top"  alt="">
                  <div class="card-body">
                    <table style="">
                        <tr>
                            <td style="width:50px; vertical-align:top; color:var(--lighter);"><i class="material-icons">book</i></td>
                            <td style="color:white;">
                                <h6>No Subject Found Binding With <br><b><?php echo $clsf . '(' . $secf . ')';?></b></h6>
                                Click the <b>Set Default Subject</b> below to Set Default.
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="padding-top:5px;">
                                <button  class="btn btn-warning" onclick="defaults(<?php echo $id;?>);">Set Default Subjects</button>
                                
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
                <div style="height:8px;"></div>
                
                
                <div id="defdef">
                     
                </div>
                
             <?php
        }
    
    //////////////////////////////////////

	?>