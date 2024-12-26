<?php 
include 'inc.php';
$classname = $_GET['cls']; $sectionname = $_GET['sec']; 
$exam = $_GET['exam']; $sub = $_GET['sub']; $assess = $_GET['assess']; 
$rs = 1; $re = 1;



                        
                        
                    if($assess == 'Behavioural Assessment'){
                        $hd = 'Behavioural Indicator / আরচণিক সুচক';
                        $hd2 = "Student's Behavioural Level / শিক্ষার্থীর আচরণিক মাত্রা";
                    } else {
                        $hd = 'Performance Indicator / পারদর্শিতার সুচক ';
                        $hd2 = "Level / মাত্রা";
                        
                    }
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
            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
    
    <style>
        .pic{
            width:45px; height:45px; padding:1px; border-radius:50%; border:1px solid var(--dark); margin:5px;
        }
        
        @media print
            {    
                .noprint
                {
                    display: none !important;
                }
                
                body{
                    width:267mm !important;
                }
            }
        
        
        .a{font-size:18px; font-weight:700; font-style:normal; line-height:22px; color:var(--dark);}
        .b{font-size:16px; font-weight:600; font-style:normal; line-height:22px;}
        .c{font-size:11px; font-weight:400; font-style:italic; line-height:16px;}
        .top{font-size:16x; width:70px; text-align:center; font-weight:700;}
        .gen{font-size:16px;  text-align:center; font-weight:400; padding:5px 0;}
        #boxtbl tr,#boxtbl td{border:1px solid gray;}
        thead {display: table-header-group;}
        .gap {vertical-align:top; padding:2px 5px 2px 2px;}
        .gap small{font-size:10px;}
        .rndbox{border:1px solid gray; border-radius:4px; height:62px; padding:8px; margin:0 5px;}
        .rndbox table{width:100%;;}
        .sh {height:62px;} .sh2 {height:40px; text-align:center;}
        .topic tr, .topic td {border:1px solid gray; text-align:justify; padding:0 0 0 5px ; vertical-align:top;}
        .ttl{font-size:1.1rem; text-align:center;}
        .sct{ text-align:center;}
    </style>
</head>

<body style="background:white; width:524pt; margin:auto; font-family: Segoe UI, SutonnyOMJ ;">
  <header>
    <!-- place navbar here -->
  </header>
  <main>
                
                
                <div style="position:fixed; right:50px;">
                    <div style="float:right; font-size:10px; margin:10px; color:red;" class="noprint">
                        <span onclick="prnt(0);">Minimum</span> | <span onclick="prnt(1);">Standard</span> | <span onclick="prnt(2);">Details</span>
                    </div>
        
                </div>
                
                
                
                    <?php 
                    // all students in class
                    $sql0 = "SELECT * from sessioninfo where sessionyear='$sy' and classname='$classname' and sectionname='$sectionname' and sccode = '$sccode' order by rollno";
                    // selected range in class
                    $sql0 = "SELECT * from sessioninfo where sessionyear='$sy' and classname='$classname' and sectionname='$sectionname' and sccode = '$sccode' and rollno between '$rs' and '$re' order by rollno";
                    $result0 = $conn->query($sql0);
                    if ($result0->num_rows > 0) 
                    {while($row0 = $result0->fetch_assoc()) { 
                        $rollno=$row0["rollno"]; $stid=$row0["stid"];
                        
                        $sql0x = "SELECT * from students where stid='$stid'";
                        $result0x = $conn->query($sql0x);
                        if ($result0x->num_rows > 0) 
                        {while($row0x = $result0x->fetch_assoc()) { 
                            $eng=$row0x["stnameeng"];$ben=$row0x["stnameben"];}}
                        
                        
                        
                    ?>
                
                
                <table style="width:100%" >
                    <tr>
                        <td colspan="3" style="">
                            <div class="rndboxs" style="text-align:center; margin-top:10px;">
                                <center><table>
                                    <tr>
                                        <td  style="vertical-align:top;"><img src="https://eimbox.com/logo/<?php echo $sccode;?>.png" height="60" /></td>
                                        <td style="width:10px;"></td>
                                        <td  style="vertical-align:top;">
                                            <h4 style="line-height:18px;"><b><?php echo $scname;?></b></h4>
                                            <small style="line-height:13px; font-style:italic; "><?php echo $scaddress ;?></small>
                                            <br><small style="line-height:16px; padding-top:5px;">EIIN # <?php echo $sccode ;?></small>
                                        </td>
                                    </tr>
                                </table></center>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:center;">
                            <h3 style="display:inline-block; font-weight:bold; line-height:24px; margin-top:10px; border:1px solid black; border-radius:8px; padding:5px 20px;;">T R A N S C R I P T</h3>
                            <h5 style="font-weight:bold; line-height:15px;"><b>Half Yearly Total Assessment</b> / ষান্মাষিক চুড়ান্ত মূল্যায়ন</h5>
                        </td>
        
                    </tr>
                    
                    
                    <tr><td colspan="2" style="height:10px;"></td></tr>
                    
                    <tr>
                        <td colspan="3" style="text-align:center;">
                            <table width="100%">
                                <tr>
                                    <td colspan="4">
                                        <div class="rndbox">
                                            <table>
                                                <tr>
                                                    <td  style="vertical-align:top;">Name of Student :</td>
                                                    <td  style="vertical-align:top;">
                                                        <h5><b><?php echo $eng . '<br>' . $ben;?></b></h5>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    
                                    
                                    <td rowspan = "3" style="text-align:center;">
                                        <div style="border:0px solid gray; text-align:center:">
                                            <img src="https://eimbox.com/students/<?php echo $stid;?>.jpg" style="height:110px; border:3px solid gray; border-radius:5xp;" />
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr><td colsapn="4" style="height:7px;"></td></tr>
                                <tr>
                                    <td>
                                        <div class="rndbox sh2">
                                            Class : <b><?php echo $classname ;;?></b>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rndbox sh2">
                                            Section : <b><?php echo $sectionname;;?></b>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rndbox sh2">
                                            Roll # <b><?php echo $rollno;;?></b>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rndbox sh2">
                                            ID # <b><?php echo $stid;;?></b>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                
                <?php for($sub = 901; $sub <= 911; $sub++){ ?>

                <!-- TRANSCRIPT HEADER  **********************************************************************************************************************************************************-->
                <div style="height:10px;"></div>
                <table width="100%">
                    <tr>
                        <?php 
                        $sql00v = "SELECT * from subjects where subcode='$sub' ";
                        $result00v = $conn->query($sql00v);
                        if ($result00v->num_rows > 0) 
                        {while($row00v = $result00v->fetch_assoc()) { 
                            $subname=$row00v["subject"]; $subben=$row00v["subben"];}}?>
                        <td>
                            <div class="" style="border:1px solid gray; border-radius:4px; height:62px; padding:4px 8px; margin:0 5px; height:35px;">
                                <table>
                                    <tr>
                                        <td  style="vertical-align:top; width:70px;">Subject : </td>
                                        <td  style="vertical-align:top;">
                                            <b><?php echo $subname . ' / ' . $subben;;?></b>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>    
                </table>
                
                <div style="height:2px;"></div>
                <!------------------------------------------- TRANSCRIPT BODY ------------------------------------------------------------------------>            
                <table id="topic" class="topic" border="1"  style="margin:0 10px 0 5px; width:99%">
                    <tr>
                        <td colspan="2" style="text-align:center;"><b><?php echo $hd;?></b></td><td  style="text-align:center; vertical-align:middle;" colspan="3"><b><?php echo $hd2;?></b></td>
                        <td id="td<?php echo $sub;?>" rowspan="10" style="width:180px; vertical-align:bottom; font-size:9px; text-align:center;">
                            (Teacher's Name)</span></b><br>Teacher's Name & Signature
                        </td>
                    </tr>
                    <?php 
                    $toprow = ''; $cntpibi = 0; $genrow = '';  $rw = 0;
                    if($assess == 'Behavioural Assessment'){
                        $sql00 = "SELECT * FROM pibitopics where sessionyear = '$sy' and exam='$exam' and behave=1  order by topiccode";
                    } else { 
                        $sql00 = "SELECT * FROM pibitopics where sessionyear = '$sy' and class='$classname' and subcode='$sub' and exam='$exam'  and behave=0 order by topiccode";
                    }
                    //$sql00 = "SELECT * from pibitopics where sessionyear='$sy' and subcode= '$sub'  and class='$classname' and exam = '$exam' order by topiccode";
                    $result00 = $conn->query($sql00);
                    if ($result00->num_rows > 0) 
                    {while($row00 = $result00->fetch_assoc()) { 
                        $tid=$row00["id"];
                        $code=$row00["topiccode"];
                        $title=$row00["topictitle"]; $l1=$row00["level1"]; $l2=$row00["level2"]; $l3=$row00["level3"]; $rw++;
                         
                       
                                    $sql0xr = "SELECT * from pibientry where sessionyear='$sy' and exam='$exam' and subcode='$sub' and sccode='$sccode' and classname='$classname' and sectionname='$sectionname' and stid='$stid' and roll='$rollno' and assesstype='$assess' and topicid='$tid'";
                                    //echo $sql0xr; 
                                    $result0xr = $conn->query($sql0xr);
                                    if ($result0xr->num_rows > 0) 
                                    {while($row0xr = $result0xr->fetch_assoc()) { 
                                        $fol=$row0xr["assessment"];}} else {$fol = 0;}
                                        if($fol == 3){
                                            $sf = '#fff'; $sb = 1; $cf = '#fff'; $cb = 1; $tf = '#000'; $tb = 0; 
                                        } else if($fol == 2){
                                            $sf = '#fff'; $sb = 1; $cf = '#000'; $cb = 0; $tf = '#fff'; $tb = 1; 
                                        } else if($fol == 1){
                                            $sf = '#000'; $sb = 0; $cf = '#fff'; $cb = 1; $tf = '#fff'; $tb = 1; 
                                        } else {
                                            $sf = '#fff'; $sb = 1; $cf = '#fff'; $cb = 1; $tf = '#fff'; $tb = 1; 
                                        }
                                ?>
                                
                        
                 
                        <tr>
                            <td class="ttl"style="width:60px;  font-size:14px;"><?php echo $code ;?></td>
                            <td><?php echo $title;?></td>
                            <td class="sct" style="text-align:center; width:30px; padding-top:3px;">
                                <svg width="16" height="16" >
                                    <rect width="16" height="16" style="fill:<?php echo $sf;?>;stroke-width:<?php echo $sb;?>;stroke:#000" />
                                </svg>
                            </td>
                            <td class="sct"  style="text-align:center; width:30px; padding-top:3px;">
                                <svg height="16" width="18">
                                    <circle cx="9" cy="8" r="8" stroke="#000" stroke-width="<?php echo $cb;?>" fill="<?php echo $cf;?>" />
                                </svg>
                            </td>
                            <td class="sct"  style="text-align:center; width:30px; padding-top:3px;">
                                <svg height="16" width="16" >
                                    <polygon points="8,0,0,16,16,16" style="fill:<?php echo $tf;?>;stroke:#000;stroke-width:<?php echo $tb;?>" />
                                </svg>
                            </td>
                            
                        </tr>
                   
                        
                        <?php
                    }}
                    
                  
                ?>
                
                </table>  
                
                
                <!------------------------------------------- END OF TRANSCRIPT BODY ------------------------------------------------------------------------>  
                <!----- ######################################################################################################################################################################-->
                            
                            
                            <?php 
                } // End of Subject Loop
                             echo $grow;
                            ?>
            
                        
                        
                        <div style="height:10px;"></div>
                    <?php }} ?>
                    
                
                
                
                
                
                

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
  document.getElementById("cnt").innerHTML = "<?php echo $cnt;?>";
  
    function go(){
        var cls=document.getElementById("classname").value; 
        var sec=document.getElementById("sectionname").value; 
        var sub=document.getElementById("subject").value; 
        var assess=document.getElementById("assessment").value; 
        var exam=document.getElementById("exam").value; 
        let tail = '?exam=' + exam + '&cls=' + cls + '&sec=' + sec + '&sub=' + sub + '&assess=' + assess; 
        if(cls=='Six'|| cls == 'Seven'){
            window.location.href="pibiprint.php" + tail; 
        } else {
            alert("Select Class Six/Seven Only");
        }
    }  
  </script>
  
  <script>
      function prnt(id){
          if(id==0){
              $('.level').hide();
              $('.topic').hide();
          } else if(id==1){
              $('.level').hide();
              $('.topic').show();
          } else if(id==2){
              $('.level').show();
              $('.topic').show();
          }
      }
  </script>
  
  <script>
      function fetchsection() {
		var cls=document.getElementById("classname").value;

		var infor="user=<?php echo $rootuser;?>&cls=" + cls;
	$("#sectionblock").html( "" );

	 $.ajax({
			type: "POST",
			url: "fetchsection.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#sectionblock').html('<span class=""><center>Fetching Section Name....</center></span>');
			},
			success: function(html) {    
				$("#sectionblock").html( html );
			}
		});
    }
  </script>
  
  <script>
      function fetchsubject() {
		var cls=document.getElementById("classname").value;
		var sec=document.getElementById("sectionname").value;

		var infor="sccode=<?php echo $sccode;?>&cls=" + cls + "&sec=" + sec;
	$("#subblock").html( "" );

	 $.ajax({
			type: "POST",
			url: "fetchsubject.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#subblock').html('<span class="">Retriving Subjects...</span>');
			},
			success: function(html) {    
				$("#subblock").html( html );
			}
		});
    }
    
    function print(){
        window.print();
    }
  </script>
    
    
  
</body>

</html>