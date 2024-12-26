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
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">Class & Section wise Dues List
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="font-size:20px; font-weight:700; line-height:15px;">12</div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">No. of Class & Section</div>
                            <br>
                            <div style="font-size:16px; font-weight:700; line-height:15px;"><?php echo strtoupper($sectionname);?></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name of Section</div>
                        </td>
                        <td style="text-align:right; display:none;">
                            <div style="font-size:30px; font-weight:700; line-height:20px;" id="cnt">697</div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No. of Students</div>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div style="height:8px;"></div>
            
            
            <?php 
            $sql0 = "SELECT * FROM areas where sessionyear = '$sy' and user='$rootuser' order by FIELD(areaname,'Six', 'Seven', 'Eight', 'Nine', 'Ten'), idno, subarea";

                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) 
                {while($row0 = $result0->fetch_assoc()) { 
                    $cls = $row0["areaname"];  $sec = $row0["subarea"];  
                    $ico = 'iimg/' . strtolower(substr($sec,0,5)) . '.png';
                    $lnk = "cls=" . $cls . '&sec=' . $sec;
                    
                    
                    $month = date('m');
                    $sql0 = "SELECT sum(payableamt) as dues, sum(payableamt) as paya, sum(paid) as paid FROM stfinance where sessionyear='$sy' and sccode='$sccode' and classname='$cls' and sectionname='$sec' and month<='$month'";
  
                    $result01x = $conn->query($sql0); if ($result01x->num_rows > 0) {while($row0 = $result01x->fetch_assoc()) { $totaldues=$row0["dues"]; $tpaid=$row0["paid"]; }}
                    
                    $sql0 = "SELECT sum(amount) as coll FROM stpr where sessionyear='$sy' and sccode='$sccode' and classname='$cls' and sectionname='$sec' and prdate='$td'";
                    $result01xg = $conn->query($sql0); if ($result01xg->num_rows > 0) {while($row0 = $result01xg->fetch_assoc()) { $coll=$row0["coll"]; }}
                    if($tpaid==0){
                        $rate = 0;
                    } else {
                        $rate = ceil($tpaid * 100 / $totaldues);
                    }
                    // 
                ?>
            <div class="card " style="background:var(--lighter); color:var(--dark); border-radius:0;"  onclick="go('<?php echo $lnk;?>')">
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <div style="font-size:30px; font-weight:700; ">
                    <span style="font-size:12px; font-weight:500;">BDT</span> <?php echo number_format($coll,2,".",",");?>
                </div>
                
                <div style="float:right; position:relative; top:-20px; font-size:12px;"><?php echo $rate;?>%</div>
                <div style="background:var(--light); margin-bottom:5px;">
                    <div style="position: relative; height:5px; background:var(--dark); width:<?php echo $rate;?>%;"></div>
                </div>
                
                
                <div style="font-size:11px; font-style:italic; color:gray; line-height:15px;">
                    Today's Collection out of Total Dues <span style="font-size:16px; font-style:normal; font-weight:bold;"><?php echo number_format($totaldues,2,".",",");?></span> till Today.
                    <br>Total Collection <b><?php echo number_format($tpaid,2,".",",");?></b> out of Total Dues <b><?php echo number_format($totaldues,2,".",",");?></b>.
                </div>
                <div style="font-size:16px; font-style:normal; color:gray; font-weight:bold;">
                    for Class <?php echo $cls . ' (' . $sec . ')';?>
                </div>
              </div>
            </div>
            <div style="height:2px;"></div>
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
        window.location.href="finstudents.php?" + id; 
    }  
  </script>
    
    
  
</body>

</html>