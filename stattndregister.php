<?php 
include 'inc.php';
$classname = $_GET['cls']; $sectionname = $_GET['sec'];  
$period = 1;
	
	$sql00 = "SELECT * FROM stattnd where  (adate='$td' and sccode='$sccode' and sessionyear='$sy'  and classname = '$classname' and sectionname='$sectionname') or yn=100 order by rollno"; 
    $result00gt = $conn->query($sql00);
    if ($result00gt->num_rows > 0) 
    {while($row00 = $result00gt->fetch_assoc()) {   
        $datam[]=$row00; 
    }}
    
	$sql00 = "SELECT * FROM stattndsummery where  date='$td' and sccode='$sccode' and sessionyear='$sy' and classname = '$classname' and sectionname='$sectionname'"; 
    $result00gtt = $conn->query($sql00);
    if ($result00gtt->num_rows > 0) 
    {while($row00 = $result00gtt->fetch_assoc()) {   
        $rate = $row00["attndrate"]; $subm = 1; $fun='grpssx0';
    }} else{
        $subm = 0;  $fun='grpssx';
    }
    
    if($period >=2){$fun = 'grpssx2';}
    
// 	echo var_dump($datam);
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css?v=bb">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <style>
        .pic{
            width:40px; height:40px; padding:1px; border-radius:50%; border:1px solid var(--dark); margin:5px;
        }
        
        .a{font-size:18px; font-weight:700; font-style:normal; line-height:22px; color:var(--dark);}
        .b{font-size:16px; font-weight:600; font-style:normal; line-height:22px;}
        .c{font-size:11px; font-weight:400; font-style:italic; line-height:16px;}
        
        .chk{font-size:36px;} .red{color:red;} .green{color:seagreen;} .blue{color:darkcyan;}
    </style>
    
    <script>
        function att(id, roll,  bl, per) {
            if(per>=2){
                var val=document.getElementById("sta2"+id).checked;
            } else {
                var val=document.getElementById("sta"+id).checked;
            }
    		
    		var infor="stid=" + id + "&roll=" + roll + "&val=" + val  + "&opt=2&cls=<?php echo $classname;?>&sec=<?php echo $sectionname;?>&per=" + per;
    	    $("#ut"+id).html( "" );
    
    	    $.ajax({
    			type: "POST",
    			url: "savestattnd.php",
    			data: infor,
    			cache: false,
    			beforeSend: function () {
    				$("#ut"+id).html('<span class="chk blue"><i class="bi bi-server"></i></span>');
    			},
    			success: function(html) {
    				$("#ut"+id).html( html );
    			}
    		});
        }
        
        
    
    
    function grpssx(id, roll){
        var bl = document.getElementById("sta"+id).checked;
        var per = 1;
        var cnt = parseInt(document.getElementById("att").innerHTML)*1;
        if(bl==true){
            document.getElementById("sta"+id).checked = false;
            cnt--;
        } else {
            document.getElementById("sta"+id).checked = true;
            cnt++;
        }
        document.getElementById("att").innerHTML = cnt;
        att(id, roll, bl, per);
    }
    
    function grpssx2(id, roll){
        
        var per = <?php echo $period;?>;
        
        var bl = document.getElementById("sta2"+id).checked;
        var cnt = parseInt(document.getElementById("att").innerHTML)*1;
        if(bl==true){
            document.getElementById("sta2"+id).checked = false;
            cnt--;
        } else {
            document.getElementById("sta2"+id).checked = true;
            cnt++;
        }
        document.getElementById("att").innerHTML = cnt;
        att(id, roll, bl, per);
    }
    </script>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container-fluidx">
        <div class="card text-left" style="background:var(--dark); color:var(--lighter);"  onclick="gol(<?php echo $id;?>)">
          
            <div class="card-body">
                <table width="100%" style="color:white;">
                    <tr>
                        <td colspan="2">
                            <div class="logoo"><i class="bi bi-people-fill"></i></div>
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">Attendance Register
 
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="font-size:20px; font-weight:700; line-height:15px;"><?php echo strtoupper($classname);?> | <?php echo strtoupper($sectionname);?></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name of Class | Section</div>
                            
                        </td>
                        <td style="text-align:right;">
                            <div style="font-size:30px; font-weight:700; line-height:20px;" ><span id="cnt"></span></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No. of Students</div>
                            
                            <br>
                            <div style="font-size:15px; font-weight:600; line-height:15px;" id="dddate"><?php echo date('d F, Y', strtotime($td));?></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">Date</div>
                            
                     
                        </td>
                    </tr>
                    

                    
                </table>
            </div>
        </div>
        <div style="overflow:auto;">
         <table width="100%">
             <tr>
                 <th></th><th></th><th></th>
                 <?php for($h=1; $h<=31; $h++){
                     echo '<th>' . $h . '</th>';
                 }
                 ?>
             </tr>
        <?php
        $cnt = 0; $found =0;
        
        $sql0 = "SELECT * FROM sessioninfo where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname = '$sectionname' order by $stattnd_sort";
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) 
        {while($row0 = $result0->fetch_assoc()) { 
            $stid=$row0["stid"]; $rollno=$row0["rollno"]; $card=$row0["icardst"];  $dtid=$row0["id"];   $status=$row0["status"];   $rel=$row0["religion"];   $four=$row0["fourth_subject"]; 
            
            
            $pth = '../students/' . $stid . '.jpg';
            if(file_exists($pth)){
                $pth = 'https://eimbox.com/students/' . $stid . '.jpg';
            } else {
                $pth = 'https://eimbox.com/students/noimg.jpg';
            }
            
            $sql00 = "SELECT * FROM students where  sccode='$sccode' and stid='$stid' LIMIT 1";
            $result00 = $conn->query($sql00);
            if ($result00->num_rows > 0) 
            {while($row00 = $result00->fetch_assoc()) {   
                $neng=$row00["stnameeng"]; $nben=$row00["stnameben"]; $vill=$row00["previll"];
            }}

            
            //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}
            
            
            
            $key = array_search($stid, array_column($datam, 'stid'));
            if($key != NULL || $key != '' ){  $status  = $datam[$key]['yn']; } else {$status = 0;}
            
            
            if($status ==  0){$bgc = '--light'; $dsbl = ' disabled'; $gip = ''; $found+=0;} else {$bgc = '--lighter'; $dsbl = ''; $gip = 'checked'; $found++;}
            ?>
          
               
                    <tr>
                        <td style="padding-left:10px; width:50px;">
                            <img src="<?php echo $pth;?>" class="pic" />
          
                        </td>
                        <td style="width:30px;"><span style="font-size:24px; font-weight:700;"><?php echo $rollno;?></span>
                            <span style="">
                                <?php echo $qrc;?>
                            </span>
                        </td>
                        <td style="text-align:left; padding-left:5px;">
                            <span class="a"><?php echo $neng;?></span>
                            <span class="b"><?php echo $nben;?></span>
                        </td>
                        
                        <?php for($h=1; $h<=31; $h++){
                             echo '<th>' . '' . '</th>';
                         }
                         ?>
                        
                    </tr>
           

            
            <?php
            $cnt++;
        }}
        
        ?>
             </table>
             </div>
        
          
        
        
    </div>

  </main>
  <div style="height:52px;"></div>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  
  
  
  <script>
  
    function more(){
        let val = document.getElementById("myswitch").checked;
        if(val == true){
            $(".sele").show();
        } else {
            $(".sele").hide();
        }
    }
  
    function grp(id) {
		var val=document.getElementById("sel"+id).value;
		var infor="dtid=" + id + "&val=" + val + "&opt=1";
	    $("#blocksel"+id).html( "" );

	    $.ajax({
			type: "POST",
			url: "grpupd.php",
			data: infor,
			cache: false,
			beforeSend: function () {
				$("#blocksel"+id).html('<span class=""><center>Fetching Section Name....</center></span>');
			},
			success: function(html) {
				$("#blocksel"+id).html( html );
			}
		});
    }
    
    function grpp(id) {
		var val=document.getElementById("sel"+id).value;
		var infor="dtid=" + id + "&val=" + val + "&opt=1";
	    $("#blocksel"+id).html( "" );

	    $.ajax({
			type: "POST",
			url: "fourupd.php",
			data: infor,
			cache: false,
			beforeSend: function () {
				$("#blocksel"+id).html('<span class=""><center>Fetching Section Name....</center></span>');
			},
			success: function(html) {
				$("#blocksel"+id).html( html );
			}
		});
    }
    
    
    
    
    function grpss(id) {
		var val=document.getElementById("sta"+id).checked;
		var infor="dtid=" + id + "&val=" + val  + "&opt=3";
	    $("#blocksel"+id).html( "" );

	    $.ajax({
			type: "POST",
			url: "grpupd.php",
			data: infor,
			cache: false,
			beforeSend: function () {
				$("#blocksel"+id).html('<span class=""><center>Fetching Section Name....</center></span>');
			},
			success: function(html) {
				$("#blocksel"+id).html( html );
			}
		});
    }
    
    function submitfinal() {
    		var fnd = parseInt(document.getElementById("att").innerHTML)*1;
    		var cnt = parseInt(document.getElementById("cnt").innerHTML)*1;
    		var infor= "cnt=" + cnt  + "&fnd=" + fnd  + "&opt=5&cls=<?php echo $classname;?>&sec=<?php echo $sectionname;?>";
    	    $("#sfinal").html( "" );
    	    $.ajax({
    			type: "POST",
    			url: "savestattnd.php",
    			data: infor,
    			cache: false,
    			beforeSend: function () {
    				$("#sfinal").html('<span class="chk blue"><i class="bi bi-server"></i></span>');
    			},
    			success: function(html) {
    				$("#sfinal").html( html );
    			}
    		});
        }
  </script>
    
    <script>
  document.getElementById("cnt").innerHTML = "<?php echo $cnt;?>";
  document.getElementById("att").innerHTML = "<?php echo $found;?>";
  
    function go(id){
        window.location.href="student.php?id=" + id; 
    }  
  </script>
  
</body>

</html>