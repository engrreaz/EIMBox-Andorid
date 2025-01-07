<?php
include 'inc.back.php';
	

	$count = $_POST['count'];;   //$ = $_POST[''];;  
	$stid = $_POST['stid'];  $rollno = $_POST['rollno'];  $cls = $_POST['cls'];  $sec = $_POST['sec'];  $neng = $_POST['neng'];  $nben = $_POST['nben'];  
	$prno = $_POST['prno'];  $prdate = $_POST['prdate']; $mobileno = $_POST['mobileno'];  //$ = $_POST[''];  $ = $_POST[''];  $ = $_POST[''];  $ = $_POST[''];    
	
	

            
	
		$tamt = 0;
		for($lp = 0; $lp<$count; $lp++){
		    $fid = $_POST['fid'.$lp];;  $amt = $_POST['amt'.$lp];;  
		    $sql0r = "SELECT * FROM stfinance where id='$fid' "; 
            $result0r = $conn->query($sql0r); if ($result0r->num_rows > 0) {while($row0r = $result0r->fetch_assoc()) { 
            $pr1=$row0r["pr1"]; $pr2=$row0r["pr2"];  
            }}
            if($pr1>0){$fld = 'pr2';$flddt = 'pr2date';$fldby = 'pr2by'; $fldno = 'pr2no'; } else {$fld = 'pr1';$flddt = 'pr1date';$fldby = 'pr1by';  $fldno = 'pr1no'; }
    		$query3g ="update stfinance set $fld='$amt', $fldno='$prno', $flddt='$prdate', $fldby='$usr', paid=paid+'$amt', dues=dues-'$amt' where id='$fid';";
    		$conn->query($query3g);     
		    $tamt = $tamt + $amt;
		}
		
		
		$smstxt = '';
		$smscnt = 0;
		$st = 0;
		$stval = '';
		
		$query33 ="insert into stpr(id, sessionyear, sccode, classname, sectionname, stid, rollno, prno, prdate, partid, amount, entryby, entrytime, smstxt, smscnt, mobileno, smsstatus, statusvalue)
		VALUES (NULL, '$sy', '$sccode', '$cls', '$sec', '$stid', '$rollno', '$prno', '$prdate', '', '$tamt', '$usr', '$cur', '$smstxt', '$smscnt', '$mobileno', '$st', '$stval' );";
		$conn->query($query33); 
		
		
		$query3x ="update sessioninfo set lastpr='$prno' where stid='$stid' and sessionyear='$sy';";
		$conn->query($query3x);
		
		
		
		
		
		
		
		
		
		echo 'Done';
		
		
		
                            ?>