<?php 
include 'inc.php';
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
    <div class="containerx-fluid">
        <div class="card text-left" style="background:var(--darker); color:var(--lighter); border-radius:0;" >
            <div class="card-body">
                <table width="100%" style="color:white;">
                    <tr>
                        <td colspan="2">
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                                Collection Details
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <div style="font-size:40px; font-weight:700; text-align:center; margin-top:15px;">
                                <span style="font-size:12px; font-weight:500;">BDT</span> <span id="xxl"></span>
                            </div>
                        </td>
                   
                    </tr>
                    
                </table>
            </div>
        </div>
        <div style="height:8px;"></div>
            
            
            <?php 
            $sl = 0; $sobar=0; $mot = 0;
            $sql0 = "SELECT prdate, sum(amount) as taka FROM stpr where sccode='$sccode' group by prdate order by prdate desc  ";
            //echo $sql0;
                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) 
                {while($row0 = $result0->fetch_assoc()) { 
                    $taka = $row0["taka"];  $prdate = $row0["prdate"];  $mot += $taka;
                    // $ico = 'iimg/' . strtolower(substr($sec,0,5)) . '.png';
                    // $lnk = "cls=" . $cls . '&sec=' . $sec;
                    
                    
                    // $month = date('m');
                    // $sql0 = "SELECT userid FROM usersapp where email='$by' and sccode='$sccode'";
                    // $result01x = $conn->query($sql0); if ($result01x->num_rows > 0) {while($row0 = $result01x->fetch_assoc()) { $tid=$row0["userid"]; }}
                    
                    // $sql0 = "SELECT * FROM teacher where tid='$tid' and sccode='$sccode' ";
                    // $result01xg = $conn->query($sql0); if ($result01xg->num_rows > 0) {while($row0 = $result01xg->fetch_assoc()) { $tname=$row0["tname"]; }}
                    
                    // $sql0 = "SELECT * FROM areas where classteacher='$tid' and user='$rootuser' ";
                    // $result01xg = $conn->query($sql0); if ($result01xg->num_rows > 0) {while($row0 = $result01xg->fetch_assoc()) 
                    // { $ccc=$row0["areaname"];  $sss=$row0["subarea"]; }} else { $ccc='';  $sss=''; }
                    
                    // $sql0 = "SELECT sum(amount) as taka FROM stpr where sccode='$sccode' group by prdate order by prdate desc ";
                    // $result01xgr = $conn->query($sql0); if ($result01xgr->num_rows > 0) {while($row0 = $result01xgr->fetch_assoc()) { $paytaka=$row0["paytaka"]; }}
                    
                    // $mottaka = $mottaka - $paytaka;
                    // $sobar += $mottaka;
        
                ?>
            <div class="card " style="background:var(--lighter); color:seagreen; border-radius:0;"  onclick="gog('<?php echo $prdate;?>')">
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <div style="font-size:15px; font-weight:700; float:right;">
                    <span style="font-size:12px; font-weight:500;">BDT</span> <?php echo number_format($taka,2,".",",");?>
                </div>
                <div style="font-size:14px; font-weight:600; color:seagreen; font-style:normal;"><?php echo date('d-m-Y', strtotime($prdate));?></div>
              </div>
            </div>
            <div id="dateclass<?php echo $prdate;?>"></div>
            <div style="height:2px;"></div>
            <?php  $sl++; }} ?>
        
        
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
  document.getElementById("xxl").innerHTML = "<?php echo number_format($mot,2,".",",");?>";
  
  
    function go(id){
        window.location.href="finstudents.php?" + id; 
    }  
    
    
    
      function gog(dat) {
		var infor="prdate=" + dat;
		//alert(infor);
	$("#dateclass"+dat).html( "" );

	 $.ajax({
			type: "POST",
			url: "daily_class_collection.php",
			data: infor,
			cache: false,
			beforeSend: function () {
				$('#dateclass'+dat).html('Please Wait...');
			},
			success: function(html) {
				$("#dateclass"+dat).html( html );
			}
		});
    }
  </script>
  
  <script>
      function gogx(cn,sec,dat) {
          var sec2 = sec;
          var sec2 = sec2.replace(" ", "-");
		var infor="cn=" + cn + "&sec=" + sec + "&prdate=" + dat;
// 		alert(infor);
	$("#p"+cn+sec2+dat).html( "" );

	 $.ajax({
			type: "POST",
			url: "daily_st_collection.php",
			data: infor,
			cache: false,
			beforeSend: function () {
				$('#p'+cn+sec2+dat).html('Please Wait...');
			},
			success: function(html) {
				$("#p"+cn+sec2+dat).html( html );
			}
		});
    }
  </script>
    
    
  
</body>

</html>