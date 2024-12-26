<?php 
include 'inc.php';


$sql0 = "SELECT * FROM areas where sessionyear = '$sy' and user='$rootuser' order by idno, id";
            $clsname="class";
                $result0345 = $conn->query($sql0);
                if ($result0345->num_rows > 0) 
                {while($row0 = $result0345->fetch_assoc()) { 
                    $clsname .= $row0["areaname"]; }} 
                    
                    
                    
                    
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
        .amt{text-align:right; vertical-align:middle;}
    </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container-fluid">
        <div style="height:8px;"></div>
        <div class="card text-left" style="background:var(--dark); color:var(--lighter); position:fixed; z-index:998; left:0; top:0; width:100%; border-radius:0;" >
            <div class="card-body" style="border-radius:0;">
                <table width="100%" style="color:white;">
                    <tr>
                        <td colspan="2">
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">Finance Setting
                            <center>
                            <div style="width:75%; height:1px; background:gray; margin-top:5px;"></div></center>
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
                        <td style="text-align:right;">
                            <div style="font-size:30px; font-weight:700; line-height:20px;" id="cnt">697</div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No. of Students</div>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div style="height:150px;"></div>
        
            <div class="card" style="background:var(--lighter); color:var(--darker);"  onclick="govv('<?php echo $lnk;?>')">
                <img class="card-img-top"  alt="">
                <div class="card-body">
                    <button class="btn btn-dark" data-bs-toggle="collapse" data-bs-target="#demo">Finance Particulars Manager</button>
                    <br><br>
                    <div id="demo" class="collapse">
                        <?php
                            $sql0 = "SELECT * FROM financeitem order by slno";
                            //echo $sql0;
                            $result0rr = $conn->query($sql0);
                            if ($result0rr->num_rows > 0) 
                            {while($row0 = $result0rr->fetch_assoc()) { 
                                
                            $id = $row0["id"]; 
                            $engs = $row0["particulareng"]; 
                            $bens = $row0["particularben"];
                            
                            
                                $sql0 = "SELECT * FROM financesetup where sessionyear = '$sy' and sccode='$sccode' and particulareng='$engs' LIMIT 1";
                                $result0cd = $conn->query($sql0);
                                if ($result0cd->num_rows > 0) 
                                {while($row0 = $result0cd->fetch_assoc()) { 
                                    $chk = 1;
                                }} else {$chk =0;}
                            
                            ?>
                                <input type="checkbox" style="margin-left:10px;" onclick="ccsave(<?php echo $id;?>);" id="cc<?php echo $id;?>" <?php if($chk==1){echo 'checked';}?>  /> &nbsp;&nbsp;<?php echo $engs;?>
                                <hr style="margin:5px;" />
                            <?php
                                
                            }}
                        ?>
                        <br>
                        <button class="btn btn-success" onclick="submxx();" >Submit Setup</button>
                    </div>
                    
                    
                </div>
            </div>
            
            
            
            <div style="overflow-x:auto;">
            <table class="table table-zebra">
                <tr style="font-weight:700; color:var(--dark);">
                    <td>Particular</td>
                    <td></td><td></td>
                    <?php if(strpos(strtolower($clsname),'play') != ''){ echo '<td class="amt">PLAY</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'nursery') != ''){ echo '<td class="amt">NURSERY</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'one') != ''){ echo '<td class="amt">ONE</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'two') != ''){ echo '<td class="amt">TWO</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'three') != ''){ echo '<td class="amt">THREE</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'four') != ''){ echo '<td class="amt">FOUR</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'five') != ''){ echo '<td class="amt">FIVE</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'six') != ''){ echo '<td class="amt">SIX</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'seven') != ''){ echo '<td class="amt">SEVEN</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'eight') != ''){ echo '<td class="amt">EIGHT</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'nine') != ''){ echo '<td class="amt">NINE</td>';} ?>
                    <?php if(strpos(strtolower($clsname),'ten') != ''){ echo '<td class="amt">TEN</td>';} ?>

                </tr>
            <?php 
            $sql0 = "SELECT * FROM financesetup where sessionyear = '$sy' and sccode='$sccode' order by slno";
            //echo $sql0;
                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) 
                {while($row0 = $result0->fetch_assoc()) { 
                    $eng = $row0["particulareng"];  $ben = $row0["particularben"];  $id = $row0["id"];   
                    $play = $row0["play"];   $nursery = $row0["nursery"];  
                    $one = $row0["one"];   $two = $row0["two"];       $three = $row0["three"];   $four = $row0["four"];   $five = $row0["five"]; 
                    $six = $row0["six"];   $seven = $row0["seven"];   $eight = $row0["eight"];   $nine = $row0["nine"];   $ten = $row0["ten"]; 
                    if($seven == 0){
                        $query33 ="update financesetup set seven='$six',  eight='$six',  nine='$six',  ten='$six' where id='$id'"; 
						//$conn->query($query33);
                    }
                    
                ?>
                <tr>
                    <td><span class="eng"><?php echo $id . '. '. $eng;?></span><br><span class="eng"><?php echo $ben;?></span></td>
                    <td id="ssx<?php echo $id;?>"></td>
                    <td id="ss<?php echo $id;?>"><button  class="btn btn-info" onclick="setvalfinsingle(<?php echo $id;?>, 1);">Set TK</button></td>
                    <?php 
                    
                    if(strpos(strtolower($clsname),'play') != ''){ echo '<td class="amt">' . $play . '</td>';} 
                    if(strpos(strtolower($clsname),'nursery') != ''){ echo '<td class="amt">' . $nursery . '</td>';} 
                    if(strpos(strtolower($clsname),'one') != ''){ echo '<td class="amt">' . $one . '</td>';} 
                    if(strpos(strtolower($clsname),'two') != ''){ echo '<td class="amt">' . $two . '</td>';} 
                    if(strpos(strtolower($clsname),'three') != ''){ echo '<td class="amt">' . $three . '</td>';} 
                    if(strpos(strtolower($clsname),'four') != ''){ echo '<td class="amt">' . $four . '</td>';} 
                    if(strpos(strtolower($clsname),'five') != ''){ echo '<td class="amt">' . $five . '</td>';} 
                    if(strpos(strtolower($clsname),'six') != ''){ echo '<td class="amt">' . $six . '</td>';} 
                    if(strpos(strtolower($clsname),'seven') != ''){ echo '<td class="amt">' . $seven . '</td>';} 
                    if(strpos(strtolower($clsname),'eight') != ''){ echo '<td class="amt">' . $eight . '</td>';} 
                    if(strpos(strtolower($clsname),'nine') != ''){ echo '<td class="amt">' . $nine . '</td>';} 
                    if(strpos(strtolower($clsname),'ten') != ''){ echo '<td class="amt">' . $ten . '</td>';} 
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    ?>

                </tr>
            
            <?php }} ?>
        </table>
        </div>
        <div style="height:8px;"></div>
        
        <button class="btn btn-primary" onclick="setvalfin();">Set Fee to Students</button> 
        <div id="setvalx"></div>
        <div id="setval"></div>
        <div style="height:8px;"></div>
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
    
    function setvalfinsingle(id, push) { //--------------------------------------- need modify
        var infor="sccode=<?php echo $sccode;?>&id=" + id + "&pp=" + push; 
        $("#ss"+id).html( "" );
    
        $.ajax({
            url: "setfinancevalsingle.php", type: "POST", data: infor, cache: false,
            beforeSend: function () {
                $("#ss"+id).html('<span class=""><center><small>Please wait, fetching list...</small></center></span>');
            },
            success: function(html) {
                $("#ss"+id).html( html );
                let k = document.getElementById('ss'+id).innerHTML;
                if(k != 'Done !'){
                    document.getElementById('ssx'+id).innerHTML = k;
                    document.getElementById('ss'+id).innerHTML = '';
                     setvalfinsingle(id, 0);
                }
            }
        });
    }
    
    
    function setvalfin() { //alert("ok");
        var infor="sccode=<?php echo $sccode;?>";
        $("#setval").html( "" );
    
        $.ajax({
            url: "setfinanceval.php", type: "POST", data: infor, cache: false,
            beforeSend: function () {
                $("#setval").html('<span class=""><center><small>Please wait, fetching list...</small></center></span>');
            },
            success: function(html) {
                $("#setval").html( html );
                let k = document.getElementById('setval').innerHTML;
                if(k != 'Done !'){
                    document.getElementById('setvalx').innerHTML = k;
                     setvalfin();
                }
            }
        });
    }
    
    
    function ccsave(id) { //alert("ok");
        var infor="sccode=<?php echo $sccode;?>";
        $("#setval").html( "" );
    
        $.ajax({
            url: "setfinanssceval.php", type: "POST", data: infor, cache: false,
            beforeSend: function () {
                $("#setval").html('<span class=""><center><small>Please wait, fetching list...</small></center></span>');
            },
            success: function(html) {
                $("#setval").html( html );
                let k = document.getElementById('setval').innerHTML;
                if(k != 'Done !'){
                    document.getElementById('setvalx').innerHTML = k;
                     setvalfin();
                }
            }
        });
    }
    
    
    function submxx(){
        window.location.href = 'financesetup.php';
    }
  </script>
    
    
  
</body>

</html>