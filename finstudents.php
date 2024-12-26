<?php 
include 'inc.php';
$classname = $_GET['cls']; $sectionname = $_GET['sec']; 
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
            width:45px; height:45px; padding:1px; border-radius:50%; border:1px solid var(--dark); margin:5px;
        }
        
        .a{font-size:18px; font-weight:700; font-style:normal; line-height:22px; color:var(--dark);}
        .b{font-size:16px; font-weight:600; font-style:normal; line-height:22px;}
        .c{font-size:11px; font-weight:400; font-style:italic; line-height:16px;}
    </style>
    
    
    
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  
  
  
  <script>
    function epos() {
		let lastpr = document.getElementById("mylastpr").value;
		infor="prno=" + lastpr;
	    $("#eposlink").html( "" );

	    $.ajax({
			type: "POST",
			url: "getprinfo.php",
			data: infor,
			cache: false,
			beforeSend: function () {
				$("#eposlink").html('.....');
			},
			success: function(html) {
				$("#eposlink").html( html );
			}
		});
    }
    
    
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
    
    function grps(id) {
		var val=document.getElementById("rel"+id).value;
		var infor="dtid=" + id + "&val=" + val  + "&opt=2";
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
  </script>
    
    <script>

    function go(id){
        //window.location.href="stfinancedetails.php?id=" + id; 
        // window.location.href="stfinancedetails.php?id=" + id + "&edit=1";
        window.location.href="stfinancedetails.php?id=" + id;
    }  
    function pr(id){
        let ln = "stprdetails.php?id=" + id;
        alert(ln);
        window.location.href = ln; 
    }  
  </script>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="containerx-fluid">
        <div class="card text-left" style="background:var(--dark); color:var(--lighter);border-radius:0; "  onclick="gol(<?php echo $id;?>)">
          
            <div class="card-body" style="border-radius:0;">
                <table width="100%" style="color:white;">
                    <tr>
                        <td colspan="2">
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">Student's Dues List
                            
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="font-size:20px; font-weight:700; line-height:15px;"><?php echo strtoupper($classname);?></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name of Class</div>
                            <br>
                            <div style="font-size:16px; font-weight:700; line-height:15px;"><?php echo strtoupper($sectionname);?></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name of Section</div>
                            <div >
                                <input type="text" id="mylastpr" value="23272003" />
                                <button onclick="epos();">ESC-POS</button>
                                <div id="eposlink">***</div>
                            </div>
                        </td>
                        <td style="text-align:right;">
                            <div style="font-size:30px; font-weight:700; line-height:20px;" id="cnt">...</div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No. of Students</div>
                            <br>
                            <div style="font-size:30px; font-weight:700; line-height:20px;" id="cntamt">...</div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">Total Dues</div>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div style="height:8px;"></div>
    
        
        <?php
        $cnt = 0; $cntamt = 0;
        $sql0 = "SELECT * FROM sessioninfo where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname = '$sectionname' order by rollno";
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) 
        {while($row0 = $result0->fetch_assoc()) { 
            $stid=$row0["stid"]; $rollno=$row0["rollno"]; $card=$row0["icardst"];  $dtid=$row0["id"];   $status=$row0["status"];   $rel=$row0["religion"];   $four=$row0["fourth_subject"]; 
            
            
            $sql00 = "SELECT * FROM students where  sccode='$sccode' and stid='$stid' LIMIT 1";
            $result00 = $conn->query($sql00);
            if ($result00->num_rows > 0) 
            {while($row00 = $result00->fetch_assoc()) { 
                $neng=$row00["stnameeng"]; $nben=$row00["stnameben"]; $vill=$row00["previll"];
            }}
            
            if($totaldues<100){$bgc = '--var(dark)';}
            if($status ==  0){$bgc = '--light'; $dsbl = ' disabled'; $gip = '';} else {$bgc = '--lighter'; $dsbl = ''; $gip = 'checked';}
            
            //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}
            
            $month = date('m');
                    $sql0 = "SELECT sum(dues) as dues, sum(payableamt) as paya, sum(paid) as paid FROM stfinance where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname='$sectionname' and month<='$month' and stid='$stid'";
                    $result01x = $conn->query($sql0); if ($result01x->num_rows > 0) {while($row0 = $result01x->fetch_assoc()) { $totaldues=$row0["dues"];  $tpaya=$row0["paya"];  $tpaid=$row0["paid"]; }}
if($totaldues<100){$bgc = 'white'; $btn = 'success';} else { $btn = 'warning';}
            ?>
            <div class="card text-center" style="background:var(<?php echo $bgc;?>); color:var(--darker);border-radius:0;" id="block<?php echo $stid;?>"  <?php echo $dsbl;?> >
              <div class="card-body" style="border-radius:0;"  onclick="go(<?php echo $stid;?>)"  >
                <table width="100%">
                    <tr>
                        <td style="width:30px;">
                            <span style="font-size:24px; font-weight:700;"><?php echo $rollno;?></span>
                        </td>
                        <td style="text-align:left; padding-left:5px;">
                            <div class="a"><?php echo $neng;?></div>
                            <div class="b"><?php echo $nben;?></div>
                            <div class="c" style="font-weight:600; font-style:normal; color:gray;">ID # <?php echo $stid ;?></div>
                            <div class="c"><?php echo $vill;?></div>
                        </td>
                        <td style="text-align:right; font-size:20px; font-weight:600;">
                            <?php echo number_format($totaldues,2,".", ",");?>
                            <br><a class="btn btn-<?php echo $btn;?>" style="font-size:10px;" href="stprdetails.php?id=<?php echo $stid;?>" >Payment History</a>
                        </td>
                    </tr>
                </table>
                
                
              </div>
            </div>

            
            <div style="height:3px;"></div>
            <?php
            $cnt++; $cntamt = $cntamt + $totaldues;
        }}
        
        ?>
        
        
        
    </div>

  </main>
  <div style="height:52px;"></div>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
    <script>
          document.getElementById("cnt").innerHTML = "<?php echo $cnt;?>";
          document.getElementById("cntamt").innerHTML = "<?php echo number_format($cntamt,2,".",",");?>";
    </script>
  
</body>

</html>