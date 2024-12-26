<?php 
include 'inc.php';
$cls = $_GET['cls']; $sec = $_GET['sec'];

$sql0b2x = "SELECT * FROM areas where sessionyear='$sy' and user='$rootuser' and areaname='$cls' and subarea='$sec'";
$result0b2x = $conn->query($sql0b2x);
if ($result0b2x->num_rows > 0) 
{while($row02x = $result0b2x->fetch_assoc()) { 
$clstid = $row02x["classteacher"];$zzid = $row02x["id"]; }}

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
            width:45px; height:45px; padding:1px; border-radius:50%; border:1px solid var(--dark); margin:5px;
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
    <div class="container-fluid">
        <div style="height:8px;"></div>
        <div class="card text-left" style="background:var(--dark); color:var(--lighter);" >
            <div class="card-body">
                <table width="100%" style="color:white;">
                    <tr>
                        <td colspan="2">
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">Settings [Class/Section]
                            <center>
                            <div style="width:75%; height:1px; background:gray; margin-top:5px;"></div></center>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="font-size:20px; font-weight:700; line-height:15px;"><?php echo $cls;?></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Class</div>
                            <br>
                            <div style="font-size:16px; font-weight:700; line-height:15px;"><?php echo strtoupper($sec);?></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Section</div>
                        </td>
                        <td style="text-align:right;">
                            <div style="font-size:30px; font-weight:700; line-height:20px;" id="cnt">697</div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No. of Students</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br><b>Class Teacher :</b>
                            <select class="form-select" id = "subb" onchange="settidcls(<?php echo $zzid;?>);">
                                <option></option>
                                <?php
                                $sql0b2 = "SELECT * FROM teacher where sccode = '$sccode' and status=1 order by ranks, tid desc";
                                $result0b2 = $conn->query($sql0b2);
                                if ($result0b2->num_rows > 0) 
                                {while($row02 = $result0b2->fetch_assoc()) { 
                                $tid = $row02["tid"]; $tname = $row02["tname"]; 
                                ?><option value="<?php echo $tid;?>" <?php if($tid == $clstid){echo 'selected';}?>   ><?php echo $tname;?></option><?php }} ?>
                            </select>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div style="height:8px;"></div>
            
            
            <?php 
            $sql0 = "SELECT * FROM subsetup where sccode = '$sccode' and classname='$cls' and sectionname = '$sec' and sessionyear='$sy' order by subject";
            //echo $sql0;
                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) 
                {while($row0 = $result0->fetch_assoc()) { 
                    $subcode = $row0["subject"];  $zid = $row0["id"];  $subtid = $row0["tid"]; 
                    
                    $sql0b = "SELECT * FROM subjects where subcode = '$subcode' and sccategory='$sctype' ";
                    $result0b = $conn->query($sql0b);
                    if ($result0b->num_rows > 0) 
                    {while($row0 = $result0b->fetch_assoc()) { 
                    $subnameeng = $row0["subject"];$subnameben = $row0["subben"]; }}
                ?>
            <div class="card text-center" style="background:var(--lighter); color:var(--darker);"  onclick="gox('<?php echo $lnk;?>')">
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <table width="100%">
                    <tr>
                        <td style="width:10px;"><span style="font-size:24px; font-weight:700;"><?php echo $rollno;?></span></td>
                        <td style="text-align:left; padding-left:5px;">
                            <div class="a"><?php echo $subnameben;?></div>
                            <div class="b"><?php echo $subnameeng;?></div>
                        </td>
                        <td style="text-align:right;"><img src="<?php echo $ico;?>" class="pic" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">
                            <select class="form-select" id = "sub<?php echo $zid;?>" onchange="settid(<?php echo $zid;?>);">
                                <option></option>
                                <?php
                                $sql0b1 = "SELECT * FROM teacher where sccode = '$sccode' and status=1 order by ranks, tid desc";
                                $result0b1 = $conn->query($sql0b1);
                                if ($result0b1->num_rows > 0) 
                                {while($row01 = $result0b1->fetch_assoc()) { 
                                $tid = $row01["tid"];$tname = $row01["tname"]; 
                                ?><option value="<?php echo $tid;?>" <?php if($tid == $subtid){echo 'selected';}?>   ><?php echo $tname;?></option><?php }} ?>
                            </select>
                                
                        </td>
                    </tr>
                </table>
              </div>
            </div>
            <div style="height:8px;"></div>
            <?php }} ?>
        
        
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
 // document.getElementById("cnt").innerHTML = "<?php echo $cnt;?>";
  
  
    function go(id){
        window.location.href="clssettings.php?" + id; 
    }  
  </script>
  
  
  <script>
      function settid(id) {
		var tea=document.getElementById("sub"+id).value;
		var infor="id=" + id + "&tea=" + tea + "&s=0"; //alert(infor); 
	//$("#sectionblock").html( "" );

	 $.ajax({
			type: "POST",
			url: "settid.php",
			data: infor,
			cache: false,
			beforeSend: function () {
				//$('#sectionblock').html('<span class=""><center>Fetching Section Name....</center></span>');
			},
			success: function(html) {
				//$("#sectionblock").html( html );
				$("#sub"+id).css("color","red");
			}
		});
    }
    
    
    function settidcls(id) {
		var tea=document.getElementById("subb").value;
		var infor="id=" + id + "&tea=" + tea + "&s=1"; //alert(infor); 
	//$("#sectionblock").html( "" );

	 $.ajax({
			type: "POST",
			url: "settid.php",
			data: infor,
			cache: false,
			beforeSend: function () {
				//$('#sectionblock').html('<span class=""><center>Fetching Section Name....</center></span>');
			},
			success: function(html) {
				//$("#sectionblock").html( html );
				$("#subb").css({"color":"green", "font-weight":"700"});
			}
		});
    }
  </script>  
    
  
</body>

</html>