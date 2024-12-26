<?php
date_default_timezone_set('Asia/Dhaka');;
$dt = date('Y-m-d H:i:s');; $sy=date('Y');
	include ('../db.php');;
	
	$user = $_POST['user'];; 
	$otp = rand(10000000, 99999999);
    $query33p ="UPDATE usersapp set otp = '$otp', otptime = '$dt' where email = '$user'";
            $conn->query($query33p) ;
		
?>
<br><i class="material-icons">done_all</i> <b> Your Token is :</b>
<div style="font-size:40px; color: gray; font-weight:700; letter-spacing:10px;"><?php echo $otp;?></div>
