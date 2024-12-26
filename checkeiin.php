<?php
date_default_timezone_set('Asia/Dhaka');;
$dt = date('Y-m-d H:i:s');; $sy=date('Y');
	include ('../db.php');;
	
	$user = $_POST['user'];;  $eiin = $_POST['eiin'];;  
	

            $sql0t = "SELECT * from users where eiin = '$eiin'  and user_level = 100";
            $result0t = $conn->query($sql0t);
            if ($result0t->num_rows > 0) {while($row0t = $result0t->fetch_assoc()) { 
                $ruser = $row0t["user_name"];
            }} else {
                $ruser = $user;
            }
		    
		
		
		
		//*************************************************************************************************************************************************
                            $sql0 = "SELECT * from scinfo where sccode = '$eiin'";
                            $result0 = $conn->query($sql0);
                            if ($result0->num_rows > 0) 
                            {while($row0 = $result0->fetch_assoc()) { 
                                $scname=$row0["scname"];
                                echo "We've found your institution in our database recorded as <b>" . $scname . "</b>.<br>You're binding with the EIIN # <b>" . $eiin . "</b>.<br>Please contact with your Head Teacher or any one of Administrator of EIMBox.";
                                $query33 ="UPDATE usersapp set sccode = '$eiin'  where email = '$user'";
		                        $conn->query($query33);
                            }} else {
                                
                                $uid = $eiin . '9999';
                                $query33 ="UPDATE usersapp set sccode = '$eiin',  userlevel = 'Administrator', userid='$uid'  where email = '$user'";
		                        $conn->query($query33);
		                        
		                        $query3 ="INSERT into scinfo (id, sccode, rootuser, modifieddate) VALUES (NULL, '$eiin', '$ruser', '$dt')";
		                        $conn->query($query3);
		                        
                                echo "We didn't find anything with EIIN # <b>" . $eiin . "</b>. We've set you as an Administrator of your institution. <br>Please follow the instruction and proceed on....";
                                
                            }
                            echo '<br><br>';
                                echo '<button type="button" class="btn btn-success" onclick="proceed();">Proceed</button>';
                            ?>
                   