<?php
date_default_timezone_set('Asia/Dhaka');;
$cur = date('Y-m-d H:i:s');; $sy = date('Y'); 
	include ('../db.php');;
	include ('inc.php');;
	

	$id = $_POST['id'];; $sub = $_POST['sub'];;  $sms = $_POST['sms'];; $stname = $_POST['stnamex'];;  $stid = $_POST['stid'];; 
	//echo '<br><br><br>...' . $stname . '.....<br>';
	
	$sql0 = "SELECT * FROM sttracking where id = '$id' "; 
            $result0wwrgg = $conn->query($sql0);
            if ($result0wwrgg->num_rows > 0) 
            {while($row0 = $result0wwrgg->fetch_assoc()) { 
                $ccc = $row0["classname"];
                $sss = $row0["sectionname"];
            }}
	
	
           
    $query33 ="UPDATE sttracking set responsetime = '$cur', distance='$distance' where id = '$id'";
    		$conn->query($query33);
    	
    	
    	////////////////////////////////////////////////////	
        $trp = '';
        $sql0 = "SELECT * FROM sttracking where sessionyear = '$sy' and stid='$stid' and date='$td' order by subject";
        $result0wwrt = $conn->query($sql0);
        if ($result0wwrt->num_rows > 0) 
        {while($row0 = $result0wwrt->fetch_assoc()) { 
            $rt = $row0["responsetime"];
            if($rt == NULL){$trp = $trp . '0'; } else {$trp = $trp . '1'; }
        }}
        
        $query33x ="UPDATE sessioninfo set tracktoday = '$trp' where stid = '$stid' and sessionyear = '$sy'";
    		$conn->query($query33x);
    		
    		/////////////////////////////////////////////////
    		
    	$sql0 = "SELECT * FROM subsetup where sessionyear = '$sy' and sccode='$sccode' and classname='$ccc' and sectionname='$sss' and subject = '$sub'";
        $result0wwr = $conn->query($sql0);
        if ($result0wwr->num_rows > 0) 
        {while($row0 = $result0wwr->fetch_assoc()) { 
            $tid = $row0["tid"];
            $sql0 = "SELECT * FROM usersapp where userid = '$tid' and sccode='$sccode' "; 
            $result0wwrg = $conn->query($sql0);
            if ($result0wwrg->num_rows > 0) 
            {while($row0 = $result0wwrg->fetch_assoc()) { 
                $tmail = $row0["email"];
                $ttoken = $row0["token"];
                
                
                //******************************
                $title = $stname;
                $body = $sms . ' @ ' . $cur;
                $icon = 'https://eimbox.com/students/'. $userid . '.jpg';
                $bt = "............................";

                $device_token = $ttoken;
                $apiKey = 'AAAAiSanis8:APA91bGHIRxAjn8YBaf562fukaYy9N9_8LiNIm5XcTZnHEPqIK7Nr38PQhMJrWTpt9g0VI6U9DMvRT58K-D8AwHwwBvG3YqK8hKbxTMNu9qjaAm6KGj09FGyYT3RVUwExfs4IWXSfucp'; 
                $headers = array('Authorization: key=' . $apiKey, 'Content-Type: application/json');
                $url = 'https://fcm.googleapis.com/fcm/send';
                
                
                  $notifData = [
                    'title' => $title,
                    'body' => $body,
                    'image' => $icon,
                  ];
                
                  $dataPayload = [
                    'data1'=> $sms, 
                    'data2'=>80, 
                    'data3' => 'This is extra payload',
                    'priority' => 'high',
                    'content_available' => true
                  ];
                
                  // Create the api body
                  $apiBody = [
                    'notification' => $notifData,
                    'data' => $dataPayload, 
                    'time_to_live' => 600, 
                    'click_action' =>  'PendingActivity',
                    'to' => $device_token
                  ];
                
                  // Initialize curl with the prepared headers and body
                  $ch = curl_init();
                  curl_setopt ($ch, CURLOPT_URL, $url);
                  curl_setopt ($ch, CURLOPT_POST, true);
                  curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
                  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); 
                  curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));
                
                  // Execute call and save result
                  $result = curl_exec($ch);
                  //print($result);
                  // Close curl after call
                  curl_close($ch);
                  
                  $jd = json_decode($result, true);
                  
                  $castid = $jd['multicast_id'];
                  $success = $jd['success'];
                  $failure = $jd['failure'];
                  $conid = $jd['canonical_ids'];
                  $msgid = $jd['results'][0]['message_id'];
                  $error = $jd['results'][0]['error'];
                 

                //*****************************
                $query33xx ="INSERT INTO notification (id, sccode, sessionyear, datetime, castid, success, failure, conid, msgid, error, frommail, tomail, fromusercat, tousercat, fromuserid, touserid, msgtype, title, smstext) 
                            VALUES (NULL, '$sccode', '$sy', '$cur', '$castid', '$success', '$failure', '$conid', '$msgid', '$error', '$usr', '$tmail', 'Student', 'Teacher', '$userid', '$tid', 'Daily Task', '$title', '$body');";
    	    	//echo $query33xx; 
    	    	$conn->query($query33xx);
                
                
            }}
        }}	

		?>
		
		<div style="font-size:36px; color:var(--dark);"><i class="bi bi-check-circle-fill"></i></div>