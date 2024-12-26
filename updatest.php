<?php
date_default_timezone_set('Asia/Dhaka');;
$dt = date('Y-m-d H:i:s');;
	include ('../db.php');;
	
	$nameeng = $_POST['nameeng'];;  $nameben = $_POST['nameben'];;  
	$fname = $_POST['fname'];;  $mname = $_POST['mname'];;  
	$vill = $_POST['vill'];;  $po = $_POST['po'];;  $ps = $_POST['ps'];;  $dist = $_POST['dist'];;  
	$mno = $_POST['mno'];;  $stid = $_POST['stid'];;  

		$query33 ="update students set
		            stnameeng = '$nameeng', stnameben = '$nameben', fname = '$fname', mname = '$mname', previll = '$vill', prepo = '$po', preps = '$ps', predist = '$dist', guarmobile = '$mno' where stid = '$stid';";
						if ($conn->query($query33) === TRUE)
		{

		
					}	
		

		
		
?>
