        
        <style>
            .tit {font-size:13px; font-weight:600;}
            
            .descrip {font-size:11px; font-weight:400; color:var(--darker);}
            .comm {font-size:11px; font-weight:400; color:gray; font-style:italic;}
        </style>
        
        
        
        <div class="card gg" >
            <div class="card-body">
                <b>To-Do List</b>
                
               
               
               <table class="table">
                   
                   <?php
                   
                        $sql0 = "SELECT *  FROM todolist where date='$td' and sccode='$sccode' and user='$usr'";
                            $result0rt = $conn->query($sql0);
                            if ($result0rt->num_rows > 0) 
                            {while($row0 = $result0rt->fetch_assoc()) { 
                            $id = $row0["id"]; $todotype = $row0["todotype"];  $descrip1 = $row0["descrip1"];  
                            
                            $status = $row0["status"]; $response = $row0["response"]; $responsetxt = $row0["responsetxt"]; 
                            
                                        if($status == 1){
                                            $txtclr = 'seagreen';
                                            $ico = '<i style="color:seagreen;" class="bi bi-check2-circle"></i>';
                                        } else {
                                            $txtclr = 'red';
                                            $ico = '<i style="color:red;" class="bi bi-question-circle-fill"></i>';
                                        }
                                        
                                        
                                        if($todotype=='Attendance'){
                                            if($status == 0){
                                                if($geolat =='' || $geolon == ''){
                                                    $comm = 'We did not recognize you location. Please make sure you have on your GPS and restart the app.';
                                                    $action = 0;
                                                } else {
                                                    if($distance<$tattndradius){
                                                        $comm = 'We detect you in the institute area. You may submit your attendance.';
                                                        $action = 1;
                                                    } else {
                                                        $comm = 'We detect you are now ' . $distance . ' meter away from institute ground. Please stay around ' . $tattndradius . ' meter radius on institute ground. <br>If you already stay in the valid area please restart you app and try again. If you face the problem again, contact with your Head Teacher/Principal';
                                                        $action = 0;
                                                    }
                                                }
                                            } else {
                                                $comm = 'You have already submit your attendance.'; 
                                                $action = 0;
                                            }
                                        }
                            ?>
                                <tr style="color:<?php echo $txtclr;?>">
                                   <td style="width:24px;">
                                       <?php echo $ico;?>
                                   </td>
                                   <td>
                                       <span class="tit"><?php echo $todotype;?></span>
                                       <?php if($descrip1 !=''){?>
                                       <br>
                                       <span class="descrip"><?php echo $descrip1;?></span>
                                       <?php } ?>
                                       <br>
                                       <span class="comm"><?php echo $comm;?></span>
                                   </td>
                                   <td style="width:36px; text-align:right;">
                                       <?php if($action==1){ ?>
                                       <button style="background:var(--dark); color:white; padding:3px 6px; font-size:11px; border-radius:3px;" class="" onclick="<?php echo $response;?>(<?php echo $id;?>)"><?php echo $responsetxt;?></button>
                                       <?php } ?>
                                   </td>
                               </tr>
                            <?php
                        }}
                   ?>
                               
               </table>
                
            </div>
        </div>
        <div style="background:var(--light); height:1px;"></div>
        
        
        
        
        
        
        
        
        <script>
            function geoattnd(id){
                // alert(id);
                window.location.href = 'tattnd.php?id=' + id;
            }
            
            
        </script>