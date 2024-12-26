<?php 
include 'inc.php';
$prno = $_GET['prno'];

    $sql0r = "SELECT * FROM stpr where prno='$prno' "; 
    $result0r = $conn->query($sql0r); if ($result0r->num_rows > 0) {while($row0r = $result0r->fetch_assoc()) { 
        $cls=$row0r["classname"]; 
        $sec=$row0r["sectionname"]; 
        $roll=$row0r["rollno"]; 
        $stid=$row0r["stid"]; 
        $prno=$row0r["prno"]; 
        $prdate=date('d-m-Y', strtotime($row0r["prdate"])); 
        $total=$row0r["amount"]; 
        $eby=$row0r["entryby"]; 
    }}
    
    $sec = str_replace("Studies","", $sec);
    
    $sql0r = "SELECT * FROM students where stid='$stid' "; 
    $result0b = $conn->query($sql0r); if ($result0b->num_rows > 0) {while($row0r = $result0b->fetch_assoc()) { 
        $stname=$row0r["stnameeng"]; 
    }}
	
	$sql0r = "SELECT count(*) as cnt FROM stfinance where pr1no='$prno' || pr2no='$prno' "; 
    $result0bt = $conn->query($sql0r); if ($result0bt->num_rows > 0) {while($row0r = $result0bt->fetch_assoc()) { 
        $cnt=$row0r["cnt"]; 
    }}
    
    $sql0r = "SELECT * FROM usersapp where email='$eby' "; 
    $result0bx = $conn->query($sql0r); if ($result0bx->num_rows > 0) {while($row0r = $result0bx->fetch_assoc()) { 
        $collname=$row0r["profilename"]; $uid=$row0r["userid"]; 
    }}
    if($collname == ''){
        $sql0r = "SELECT * FROM teacher where tid='$uid' "; 
        $result0bxg = $conn->query($sql0r); if ($result0bxg->num_rows > 0) {while($row0r = $result0bxg->fetch_assoc()) { 
            $collname=$row0r["tname"]; 
        }}
    }
        
	
	
//	$lnk = 'https://android.eimbox.com/receipt.php?prno='.$prno.'&prdate='.$prdate.'&stname='.$stname.'&cls='.$cls.'&sec='.$sec.'&roll='.$roll.'&total='.$total.'&stid='.$stid.'&collname='.$collname.'&cnt='.$cnt.$loop;
//	echo $lnk;

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
                    $loop = ''; $item=1;
                	$sql0r = "SELECT * FROM stfinance where pr1no='$prno' || pr2no='$prno' "; 
                    $result0bg = $conn->query($sql0r); if ($result0bg->num_rows > 0) {while($row0r = $result0bg->fetch_assoc()) { 
                        $item = $item;
                        $partid=$row0r["partid"]; 
                        $de=$row0r["particulareng"]; 
                        $de = str_replace("Tution Fee : ","", $de);
                        $de = str_replace("Exam Fee : ","", $de);
                        $de = str_replace("/","-", $de);
                        $tk=$row0r["amount"]; 
                        $loop = $loop . '&item' . $item . 'id=' . $partid .  '&item' . $item . 'txt=' . $de .  '&item' . $item . 'taka=' . $tk ;
                        $item++;
                        ?>
                            <div class="right"  style="color:black;"><?php echo  $tk.'.00';;?></div>
                            <div class="left"  style="color:black;"><?php echo  $de;;?></div>
                        <?php
                    }}
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