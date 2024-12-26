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
    <div class="container-fluidx">
        <div class="card text-left" style="background:var(--dark); color:var(--lighter); " >
            <div class="card-body" style="border-radius:0;">
                <table width="100%" style="color:white;">
                    <tr>
                        <td colspan="2">
                            <div class="logoo"><i class="bi bi-tools"></i></div>
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">Subjects Monitoring Tools
                            
                            </div>
                        </td>
                    </tr>
           
                    
                </table>
            </div>
        </div>

            
            
            <?php 
            $sql0 = "SELECT * FROM areas where sessionyear = '$sy' and user='$rootuser' order by FIELD(areaname,'Six', 'Seven', 'Eight', 'Nine', 'Ten'), subarea, idno";
            //echo $sql0;
                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) 
                {while($row0 = $result0->fetch_assoc()) { 
                    $cls = $row0["areaname"];  $sec = $row0["subarea"];   $clstid = $row0["classteacher"];     $id = $row0["id"];  
                    $ico = 'iimg/' . strtolower(substr($sec,0,5)) . '.png';
                    $lnk = "cls=" . $cls . '&sec=' . $sec;
                ?>
            <div class="card text-center gg" style="background:var(--lighter); color:var(--darker);"  onclick="govv('<?php echo $lnk;?>')">
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <table width="100%">
                    <tr>
                        <td style="width:10px;"><span style="font-size:24px; font-weight:700;"></span></td>
                        <td style="width:60px;;"><img src="<?php echo $ico;?>" class="pic" /></td>
                        <td style="text-align:left; padding-left:5px;">
                            <span class="a"><?php echo strtoupper($cls);?></span> |
                            <span class="b"><?php echo $sec;?></span>
                            <br>
                            <?php echo $clstid;?>
                        </td>
                        <td style="text-align:right; padding:15px;">
                            <button class="btn btn-primary" style="border-radius:50%; font-size:24px; height:40px; width:40px; padding:0; text-align:center;" onclick="sublist(<?php echo $id;?>);"><i class="bi bi-eye-fill"></i></button>
                        </td>
                        
                    </tr>

                </table>
                
                <div id="tailbox<?php echo $id;?>"></div>
                
                
                
              </div>
            </div>

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
        window.location.href="students.php?" + id; 
    }  
    
    
    
    
    function sublist(id) {
        var infor="sccode=<?php echo $sccode;?>&id=" + id;
        $("#tailbox"+id).html( "" );
    
        $.ajax({
            url: "fetchsublist.php", type: "POST", data: infor, cache: false,
            beforeSend: function () {
                $("#tailbox"+id).html('<span class=""><center><small>Please wait, fetching list...</small></center></span>');
            },
            success: function(html) {
                $("#tailbox"+id).html( html );
            }
        });
    }
  </script>
    
    
  
</body>

</html>