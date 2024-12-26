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
        <div class="card text-left" style="background:var(--dark); color:var(--lighter); border-radius:0;" >
            <div class="card-body">
                <table width="100%" style="color:white;">
                    <tr>
                        <td colspan="2">
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">Class & Section wise Attendance
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <div style="font-size:16px; font-weight:700; line-height:15px;"><?php echo date('d F, Y', strtotime($td));?></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Date</div>
                        </td>
                        
                    </tr>
                    
                </table>
            </div>
        </div>
        <div style="height:0px;"></div>
            
            
            <?php 
            $sql0 = "SELECT * FROM areas where sessionyear = '$sy' and user='$rootuser' order by FIELD(areaname,'Six', 'Seven', 'Eight', 'Nine', 'Ten'), idno, subarea";
            //echo $sql0;
                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) 
                {while($row0 = $result0->fetch_assoc()) { 
                    $cls = $row0["areaname"];  $sec = $row0["subarea"];  
                    $ico = 'iimg/' . strtolower(substr($sec,0,5)) . '.png';
                    $lnk = "cls=" . $cls . '&sec=' . $sec;
                    
                    
                    $month = date('m');
                    $sql0 = "SELECT * FROM stattndsummery where sessionyear='$sy' and sccode='$sccode' and classname='$cls' and sectionname='$sec' and date='$td'";
                    // echo $sql0;
                    $result01x = $conn->query($sql0); if ($result01x->num_rows > 0) {while($row0 = $result01x->fetch_assoc()) { 
                        $rate=$row0["attndrate"];  $fnd=$row0["attndstudent"];  $cnt=$row0["totalstudent"];  
                        
                    }} else {
                        $rate = 0; $fnd = 0; $cnt = 0;
                    }
                    
              
                    
                ?>
            <div class="card " style="background:var(--lighter); color:var(--dark); border-radius:0;"  onclick="go('<?php echo $lnk;?>')">
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <div style="font-size:30px; font-weight:700; ">
                    <?php echo $fnd;?><span style="font-size:12px; font-weight:400;"> out of <b><?php echo $cnt;?></b></span> 
                </div>
                
                <div style="float:right; position:relative; top:-20px; font-size:12px;"><?php echo number_format($rate,1,".",",");?>%</div>
                <div style="background:var(--light); margin-bottom:5px;">
                    <div style="position: relative; height:5px; background:var(--dark); width:<?php echo $rate;?>%;"></div>
                </div>
                
                <div style="font-size:16px; font-style:normal; color:gray; font-weight:bold;">
                    <?php echo $cls . ' | ' . $sec ;?>
                </div>
                
                <div style="font-size:11px; font-style:italic; color:gray; line-height:15px; display:none;">
                    ............. <span style="font-size:16px; font-style:normal; font-weight:bold;"><?php echo number_format($totaldues,2,".",",");?></span> till Today.
                    <br>Total ....... <b><?php echo number_format($tpaid,2,".",",");?></b> out of Total ......... <b><?php echo number_format($totaldues,2,".",",");?></b>.
                </div>
                
                
              </div>
            </div>
            <div style="height:0px;"></div>
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
        window.location.href="stattnd.php?" + id; 
    }  
  </script>
    
    
  
</body>

</html>