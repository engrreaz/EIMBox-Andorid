<?php

	include ('incb.php');;
	

	$rootuser = $_POST['rootuser'];;  $id = $_POST['id'];;  
	$cls = $_POST['cls'];;  $sec = $_POST['sec'];;  
	
	
    
   //************************************************************************************************************************************************
   //****************************************************************************************************************************************************************
   
        for($i=1; $i<=8; $i++){
            for($j=1; $j<=5; $j++){
                if($j==1){$day = 'Sunday';} else if($j==2){$day = 'Monday';} else if($j==3){$day = 'Tuesday';} else if($j==4){$day = 'Wednesday';} else if($j==5){$day = 'Thursday';}
                $sql00xgr = "SELECT * FROM clsroutine where sccode='$sccode' and sessionyear='$sy' and classname='$cls' and sectionname='$sec' and period = '$i' and wday='$j' order by period, wday";  
                // echo $sql00xgr;
                $result00xgr = $conn->query($sql00xgr);
                if ($result00xgr->num_rows > 0) {while($row00xgr = $result00xgr->fetch_assoc()) {
                    $id = $row00xgr["id"];  $subcode = $row00xgr["subcode"]; $tidd = $row00xgr["tid"]; 
                }} else {$id = 0; $subcode=0; $tidd = 0;}
                    ?>
                    <div class="card" style="background:var(--lighter); color:var(--darker);" >
                      <img class="card-img-top"  alt="">
                      <div class="card-body" style="overflow-x:scroll;">
                        <table style="widtch:100%;">
                            <tr>
                                <td style="width:50px; vertical-align:top; color:var(--dark);"><i class="material-icons">group</i></td>
                                <td style="width:50px; font-size:24px; font-weight:bold; text-align:center;"><?php if($j==1){echo $i . '<br><span style="font-size:9px;">Period</div>';} ?></td>
                                
                                <td style="display:none;" id="id<?php echo $i.$j;?>"><?php echo $id;?></td>
                                <td style="display:none;">Period : <span id="per<?php echo $i.$j;?>"><?php echo $i;?></span> Day : <span id="wday<?php echo $i.$j;?>"><?php echo $j;?></span><?php echo  $day;?></td>
                                <td style="width:120px;"><?php echo  $day;?></td>
                                
                                <td style="width:120px;  font-size:10px;font-style:italic;"><button class="btn btn-warning" onclick="same(<?php echo $i;?>, <?php echo $j;?>);" id="same<?php echo $i.$j;?>"><i class="bi bi-eye-fill"></i></button></td>
                                <td style="width:50px;"><span id="roll<?php echo $stid;?>"><?php echo $rollno;?></span></td>
                                <td style="font-weight:bold;"><span id="nam<?php echo $stid;?>"><?php echo $stnameeng;?></span></td>
                                <td></td>
                                
                                <td>
                                    <div class="form-group input-group">
                                        <select class="form-control" id="subj<?php echo $i.$j;?>">
                                            
                                            <option value="">Select Subject</option>
                                            <?php
                                            $sql00xgr = "SELECT * FROM subjects order by subcode"; 
                                            $result00xgr4 = $conn->query($sql00xgr);
                                            if ($result00xgr4->num_rows > 0) {while($row00xgr = $result00xgr4->fetch_assoc()) {
                                            $scode=$row00xgr["subcode"];$subj=$row00xgr["subject"];
                                            if($subcode == $scode){$aa = 'selected';} else {$aa = '';}
                                            echo '<option value="' . $scode . '" ' . $aa . ' >' . $subj . '</option>';
                                            }}
                                            ?>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <select class="form-control" id="tid<?php echo $i.$j;?>">
                                            
                                            <option value="">Select Teacher</option>
                                            <?php
                                            $sql00xgr = "SELECT * FROM teacher where sccode='$sccode' order by ranks, tid"; 
                                            $result00xgr4 = $conn->query($sql00xgr);
                                            if ($result00xgr4->num_rows > 0) {while($row00xgr = $result00xgr4->fetch_assoc()) {
                                            $tid=$row00xgr["tid"];$tname=$row00xgr["tname"];
                                            if($tidd == $tid){$bb = 'selected';} else {$bb = '';}
                                            echo '<option value="' . $tid . '" ' . $bb . ' >' . $tname . '</option>';
                                            }}
                                            ?>
                                        </select>
                                    </div>
                                </td>
                                <td style="width:120px;" id="exe<?php echo $i.$j;?>">
                            
                                    <button  class="btn btn-primary" onclick="edit(<?php echo $i.$j;?>);" ><i class="bi bi-arrow-right-circle"></i></button>
                             
                                    
                                </td>
                            </tr>
                        </table>
                      </div>
                    </div>
                    <?php
                    
                   if($j==5){echo '<div style="height:3px; background:var(--darker); "></div>';}
            } 
            
        }
        
        
        
        
                
            
            
            
            $sql00xgr = "SELECT * FROM sessioninfo where sccode='$sccode' and stid='$stid' and sessionyear='$sy'";  
            // echo $sql00xgr;
            $result00xgrt2 = $conn->query($sql00xgr);
            if ($result00xgrt2->num_rows > 0) {while($row00xgr = $result00xgrt2->fetch_assoc()) {
                $found=1; }} 
        ?>
        
                
        
        
        <?php  ?>
        
        
        
        
        
        <script>
            function same(i,j){
                var subj = document.getElementById("subj"+i+'1').value;
                var tid = document.getElementById("tid"+i+'1').value;
                if(j==1){
                    var k;
                    for(k=1; k<=5;k++){
                        document.getElementById("tid"+i+k).value = tid;
                        document.getElementById("subj"+i+k).value = subj;
                    }
                } else {
                    document.getElementById("tid"+i+j).value = tid;
                    document.getElementById("subj"+i+j).value = subj;
                }
                
                
                
                
            }
        </script>
