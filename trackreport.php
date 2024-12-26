<?php 
include 'inc.php';
$classname = $_GET['cls']; $sectionname = $_GET['sec']; 
$classname = 'Ten'; $sectionname = 'Humanities'; 

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
    <link rel="stylesheet" href="css.css?v=a">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <style>
        .pic{
            width:60px; height:60px; padding:0px; border-radius:50%; border:3px solid lightgray; margin:5px; box-shadow: 2px 2px 5px gray;
        }
        
        .a{font-size:18px; font-weight:700; font-style:normal; line-height:22px; color:var(--dark);}
        .b{font-size:16px; font-weight:600; font-style:normal; line-height:22px;}
        .c{font-size:11px; font-weight:400; font-style:italic; line-height:16px;}
    </style>
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
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">Track Report
 
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
                        </td>
                        <td style="text-align:right;">
                            <div style="font-size:30px; font-weight:700; line-height:20px;" id="cnt"></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No. of Students</div>
                            
                            <br>
                                <div class="form-check form-switch" style="float:right;">
                                <!--<input class="form-check-input" type="checkbox" id="myswitch" name="darkmode" value="no" onclick="more();" > <small> More</small>-->
                                <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">Yesterday : <span id="yd"></span></div>
                                <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">Today : <span id="td"></span></div>
                                
                                </div>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
    
        
        <?php
        $cnt = 0; $restd = 0; $resyes = 0;
        $sql0 = "SELECT * FROM sessioninfo where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname = '$sectionname' order by rollno";
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) 
        {while($row0 = $result0->fetch_assoc()) { 
            $stid=$row0["stid"]; $rollno=$row0["rollno"]; $card=$row0["icardst"];  $dtid=$row0["id"];   $status=$row0["status"];   $rel=$row0["religion"];   $four=$row0["fourth_subject"]; 
            $tracktoday=$row0["tracktoday"]; 
            if($tracktoday != NULL) {$restd = $restd + 1;}
            $trackyesterday=$row0["trackyesterday"]; 
            if($trackyesterday != NULL) {$resyes = $resyes + 1;}
            
            $grname=$row0["groupname"];
            if($classname == 'Six' || $classname == 'Seven'){$grnametxt = " | <b>" . $grname . '</b>';} else {$grnametxt = '';}
            
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

            if($status ==  0){$bgc = '--light'; $dsbl = ' disabled'; $gip = '';} else {$bgc = '--lighter'; $dsbl = ''; $gip = 'checked';}
            //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}


            ?>
            <div class="card text-center" style="background:var(<?php echo $bgc;?>); color:var(--darker);"  onclick="goga(<?php echo $stid;?>)" id="block<?php echo $stid;?>"  <?php echo $dsbl;?> >
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <table width="100%">
                    <tr>
                        <td style="width:30px; <?php if($tracktoday==NULL){echo 'color:gray';} ?>"><span style="font-size:24px; font-weight:700;"><?php echo $rollno;?></span>
                            <span style="">
                                <?php echo $qrc;?>
                            </span>
                        </td>
                        <td style="text-align:left; padding-left:5px; <?php if($tracktoday==NULL){echo 'color:gray';} ?>">
                            <div style=" <?php if($tracktoday==NULL){echo 'color:gray';} ?>" class="a"><?php echo $neng;?></div>
                            <div class="b"><?php echo $nben;?></div>
                            <div class="c" style="font-weight:600; font-style:normal; display:none; color:gray;  <?php if($tracktoday==NULL){echo 'color:gray';} ?>" >ID # <?php echo $stid . $grnametxt ;?></div>
                            <div class="c"><?php echo $vill;?></div>
                        </td>
                        <td style="text-align:right;"><img src="<?php echo $pth;?>" class="pic" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">
                            <div onclick="golmal(<?php echo $stid;?>);">
                            <style>
                                .dotdot {width:10px; height:10px; margin:0 3px; border-radius:50%;}
                                .red {background:deeppink;}
                                .green {background:seagreen;}
                                .gray {background:lightgray;}
                            </style>
                            <div style="display:flex; ">
                                <?php 
                                 for($jj=0; $jj<14; $jj++){
                                    $l = substr($trackyesterday, $jj, 1);
                                    if($l == '' || $l == NULL) {$cc = 'gray';}
                                    else if($l == '0' ) {$cc = 'red';}
                                    else {$cc = 'green';}
                                    
                                    echo '<div class="dotdot ' . $cc . '" ></div>';
                                }
                                ?>
                                 <span style="font-size:9px; color:gray;"> &nbsp;&nbsp;(Yesterday)</span>
                            </div>
                            <div style="height:5px;"></div>
                            <div style="display:flex;">
                                <?php for($jj=0; $jj<14; $jj++){
                                    $l = substr($tracktoday, $jj, 1);
                                    if($l == '' || $l == NULL) {$ins = ''; $cc = 'gray';}
                                    else if($l == '0' ) {$ins = ''; $cc = 'red';}
                                    else {$cc = 'green'; $ins = ''; }
                                    
                                    echo '<div class="dotdot ' . $cc . '" >'. $ins . '</div>';
                                }
                                   
                                ?>
                                <span style="font-size:9px; color:gray;"> &nbsp;&nbsp;(Today)</span>
                            </div>
                            </div>
                        </td>
                        
                    </tr>
                </table>
                <div id="pompom<?php echo $stid;?>"  onclick="golmal(<?php echo $stid;?>);" style="display:none; font-size:10px; text-align:left; padding-left:60px;">
                  <?php
                    $sql00 = "SELECT * FROM sttracking where  sccode='$sccode' and stid='$stid' and date='$td' and sessionyear='$sy' order by subject";
                    $result001 = $conn->query($sql00);
                    if ($result001->num_rows > 0) 
                    {while($row00 = $result001->fetch_assoc()) { 
                        $subcode=$row00["subject"]; 
                        echo $subcode; echo '<br>';
                    }}
                    ?>
              </div>
                
              </div>
              
              
              
            </div>

            
            <?php
            if($status == 1){
            $cnt++;
            }
        }}
        
        ?>
        
        
        
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
  document.getElementById("cnt").innerHTML = "<?php echo $cnt;?>";
  document.getElementById("yd").innerHTML = "<?php echo $resyes;?>";
  document.getElementById("td").innerHTML = "<?php echo $restd;?>";
    function golm(id){
        window.location.href="student.php?id=" + id; 
    }  
    function golmal(id){
        if(document.getElementById("pompom"+id).style.display == 'none'){
            document.getElementById("pompom"+id).style.display = 'block';
        } else {
            document.getElementById("pompom"+id).style.display = 'none';
        }
        
    }  
  </script>
  
</body>

</html>