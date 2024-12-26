<?php 
include 'inc.php';
$prno = $_GET['prno'];
$prdate = $_GET['prdate']; $stname=$_GET['stname'];  $collname=$_GET['collname'];  $cls = $_GET['cls'];  $sec = $_GET['sec'];  $roll = $_GET['roll'];  $stid = $_GET['stid'];  $cnt = $_GET['cnt'];  $total = $_GET['total'];  //$ = $_GET[''];  $ = $_GET[''];  
?>

<!doctype html>
<html lang="en">

<head>
  <title>-</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css?v=a">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <style>
        .right{
            float:right; font-size:11px;
        }
        .left{
            font-size:11px;
        }
        .title{
            font-weight:bold;
        }
    </style>
</head>

<body>


    <div class="container-fluids">
        <div class="card text-left" style="background:var(--dark); color:var(--lighter);" >
          
            <div class="card-body">
                <table width="100%" style="color:white;">
                    <tr>
                        <td>
                            <div class="logoo"><i class="bi bi-ui-checks-grid"></i></div>
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">......
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            
        </div>
        
        
        
        <div class="card text-left" style="background:var(--lighter); color:var(--darker);"  >
            <div class="card-body">
                <div class="right"><b><?php echo $prno;?></b></div>
                <div class="left">Reciept No. </div>
                
                <div class="right"><?php echo $prdate;?></div>
                <div class="left">Date :</div>
            </div>
        </div>
        
        <div class="card text-left" style="background:var(--lighter); color:var(--darker);"  >
            <div class="card-body">
                <div class="left"><b><?php echo $stname;?></b></div>
                <div class="left">Class : <?php echo $cls . ' (' . $sec . ') - ' . $roll;?></div>
                <div class="left">ID : <?php echo $stid;?></div>
            </div>
        </div>
        
        <div class="card text-left" style="background:var(--lighter); color:var(--darker);"  >
            <div class="card-body">
                <?php
                    for($a=1; $a<=$cnt; $a++){
                        ?>
                            <div class="right"><?php echo  $_GET['item'.$a.'taka'].'.00';;?></div>
                            <div class="left"><?php echo  $_GET['item'.$a.'txt'];;?></div>
                        <?php
                    }
                ?>
                            
            </div>
        </div>
        
        <div class="card text-left" style="background:var(--lighter); color:var(--darker);"  >
            <div class="card-body">
                <div class="right"><b><?php echo $total.'.00';?></b></div>
                <div class="left">Total Amount : </div>
            </div>
        </div>
        
        <div class="card text-left" style="background:var(--lighter); color:var(--darker);"  >
            <div class="card-body">
                <div class="right"><b><?php echo $collname;?></b></div>
                <div class="left">Collected By : </div>
            </div>
        </div>

        <div style="padding:8px;text-align:center;">
            <button class="btn btn-danger" onclick="history.go(-1);">Back </button>
        </div>
        
        
    </div>

  
  
  
  
  
  <div style="height:52px;"></div>

  
</body>

</html>