<?php 
    include 'inc.php'; 
    
    if($_GET['id']){
        $stid=$_GET['id'];
    } else {
        $stid = 0;
    }
    
    
    
    $pth = '../students/' . $stid . '.jpg';
    if(file_exists($pth)){
        $pth = 'https://eimbox.com/students/' . $stid . '.jpg';
    } else {
        $pth = 'https://eimbox.com/students/noimg.jpg';
    }
    //echo $pth;
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
    <link rel="stylesheet" href="css.css?v=a3">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <style>
        .pic{
            width:150px; height:150px; padding:1px; border-radius:50%; border:3px solid var(--light);  position:absolute; top:75px; z-index:99; margin:auto; margin-left:-75px;
        }
        
        .a{font-size:24px; font-weight:700; font-style:normal; line-height:18px; color:var(--dark);}
        .b{font-size:20px; font-weight:500; font-style:normal; line-height:22px; margin-top:5px;}
        .c{font-size:11px; font-weight:500; font-style:normal; line-height:12px;}
        .d{font-size:20px; font-weight:500; font-style:normal; line-height:22px; color:var(--darker);}
        
        
        .e{font-size:11px; font-weight:500; font-style:italic; line-height:11px; color:gray;}
        .ico{font-size:24px; color:var(--dark); }
    </style>
    
    
    
    
    
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="containerx" style="width:100%;" >
        
            <div class="card text-center" style="background:var(--dark); color:white; "  >
              <div class="card-body" style="height:150px;">
                    <center><img src="<?php echo $pth;?>" class="pic" /></center>
              </div>
            </div>
            
            
        <?php
        $sql0 = "SELECT * FROM admission where stid='$stid' LIMIT 1";
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) 
        {while($row0 = $result0->fetch_assoc()) { 
            $stnameeng = $row0["stnameeng"];  $stnameben = $row0["stnameben"];
            //$  = $row0[" "];  $  = $row0[" "];
            $fname  = $row0["fname"];  $mname  = $row0["mname"];
            $guarmobile  = $row0["guarmobile"];
            $tel = substr( $guarmobile, 0, 3 ).' '.substr( $guarmobile, 3, 2 ).' '.substr( $guarmobile, 5, 3 ).' '.substr( $guarmobile, -3 ); 
            $previll  = $row0["previll"];  $prepo  = $row0["prepo"];  $preps  = $row0["preps"];  $predist  = $row0["predist"];
              $religion  = $row0["religion"];   $gender  = $row0["gender"];   $admclass  = $row0["admclass"];   $taka  = $row0["openingfee"];  $preins  = $row0["preins"];
            
            
            $sql0x = "SELECT * FROM sessioninfo where stid='$stid' and sessionyear LIKE '%$sy%'  and sccode='$sccode' LIMIT 1";
            $result0x = $conn->query($sql0x);
            if ($result0x->num_rows > 0) 
            {while($row0x = $result0x->fetch_assoc()) { 
                $roll = $row0x["rollno"];$cls = $row0x["classname"];$sec = $row0x["sectionname"];
            }}
            ?>
            <div class="card text-center" style="background:var(--lighter);" >

              <div class="card-body">
                  <div style="height:35px;"></div>
               
                <div style="text-align:left; padding-top:32px;">
                <table width="100%">
                    <tr>
                        <td style="width:30px;" valign="top"></td>
                        <td>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="b" onclick="rel(<?php echo $stid;?>);"><?php echo $stid;?></div><div class="e">Identity Number</div><div style="height:5px;"></div>
                                        <div class="b" style="font-size:16px;"><?php echo $cls;?> / <?php echo $sec;?></div><div class="e">Student's of Class / Section | Group</div><div style="height:25px;"></div>
                                    </td>
                                    <td style="text-align:right; padding-top:15px;" valign="top">
                                        <div class="a" ><?php echo $roll;?></div><div class="e">Roll No</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    

                </table>
                </div>
              </div>
            </div>
            <div style="height:1px;"></div>
            
            
            
            <datalist id="ttx">
                <option value="Banchharampur">
                <option value="Homna">
                <option value="Muradnagor">
            </datalist>
            
            
            
            
            <div class="card text-center" style="background:var(--lighter);" >
              <div class="card-body">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">local_library</i></span>
                                    <select class="form-control" id="admcls" >
                                        <option value="">Select Admission Class</option>
                                        <option value="Six" <?php if($admcls=='Six'){ echo 'selected';}?>>Six</option>
                                        <option value="Seven" <?php if($admcls=='Seven'){ echo 'selected';}?>>Seven</option>
                                        <option value="Eight" <?php if($admcls=='Eight'){ echo 'selected';}?>>Eight</option>
                                        <option value="Nine" <?php if($admcls=='Nine'){ echo 'selected';}?>>Nine</option>
                                        <option value="XI" <?php if($admcls=='XI'){ echo 'selected';}?>>XI (Eleven)</option>
                                    </select> 
                                </div>
                                
                                
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">person</i></span>
                                    <input type="text" id="nameeng" name="nameeng" class="form-control" placeholder="Student's Name (in English)" value="<?php echo $stnameeng;?>">
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico" style="color:#dfecef;">person</i></span>
                                    <input type="text" id="nameben" name="nameben" class="form-control" placeholder="ছাত্র/ছাত্রীর নাম (বাংলায়)"  value="<?php echo $stnameben;?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">wc</i></span>
                                    <input type="text" id="fname" name="fname" class="form-control" placeholder="Father's Name" value="<?php echo $fname;?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico" style="color:#dfecef;">person</i></span>
                                    <input type="text" id="mname" name="mname" class="form-control" placeholder="Mother's Name" value="<?php echo $mname;?>">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text"><i style="color:#dfecef;" class="material-icons ico">open_with</i></span>
                                    <select class="form-control" id="vill" >
                                        <option value="">Select Village</option>
                                        <?php
                                        $sql0x = "SELECT previll FROM students where sccode='$sccode' group by previll order by previll ";
                                        $result0x = $conn->query($sql0x);
                                        if ($result0x->num_rows > 0) 
                                        {while($row0x = $result0x->fetch_assoc()) { 
                                            $previll = $row0x["previll"];
                                        ?>
                                        <option value="<?php echo $previll;?>" ><?php echo $previll;?></option>
                                        <?php }}  ?>
                                    </select> 
                                </div>
                                
                                
                                
                                <div class="input-group">
                                    <span class="input-group-text"><i style="color:#dfecef;" class="material-icons ico">open_with</i></span>
                                    <select class="form-control" id="po" >
                                        <option value="">Select Post Office</option>
                                        <?php
                                        $sql0x = "SELECT prepo FROM students where sccode='$sccode' group by prepo order by prepo ";
                                        $result0xp = $conn->query($sql0x);
                                        if ($result0xp->num_rows > 0) 
                                        {while($row0x = $result0xp->fetch_assoc()) { 
                                            $prepo = $row0x["prepo"];
                                        ?>
                                        <option value="<?php echo $prepo;?>" ><?php echo $prepo;?></option>
                                        <?php }}  ?>
                                    </select> 
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-text"><i style="color:#dfecef;" class="material-icons ico">open_with</i></span>
                                    <select class="form-control" id="ps" >
                                        <option value="">Select Upazilla</option>
                                        <?php
                                        $sql0x = "SELECT preps FROM students where sccode='$sccode' group by preps order by preps ";
                                        $result0xs = $conn->query($sql0x);
                                        if ($result0xs->num_rows > 0) 
                                        {while($row0x = $result0xs->fetch_assoc()) { 
                                            $preps = $row0x["preps"];
                                        ?>
                                        <option value="<?php echo $preps;?>" ><?php echo $preps;?></option>
                                        <?php }}  ?>
                                    </select> 
                                </div>
                                
                                <div class="input-group">
                                    <span class="input-group-text"><i style="color:#dfecef;" class="material-icons ico">open_with</i></span>
                                    <select class="form-control" id="dist" >
                                        <option value="">Select District</option>
                                        <?php
                                        $sql0x = "SELECT predist FROM students where sccode='$sccode' group by predist order by predist ";
                                        $result0xd = $conn->query($sql0x);
                                        if ($result0xd->num_rows > 0) 
                                        {while($row0x = $result0xd->fetch_assoc()) { 
                                            $predist = $row0x["predist"];
                                        ?>
                                        <option value="<?php echo $predist;?>" ><?php echo $predist;?></option>
                                        <?php }}  ?>
                                    </select> 
                                </div>
                                
                                
                               
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">open_with</i></span>
                                    <select class="form-control" id="reli" >
                                        <option value="">Select Religion</option>
                                        <option value="Islam" <?php if($religion=='Islam'){ echo 'selected';}?>>Islam</option>
                                        <option value="Hindu" <?php if($religion=='Hindu'){ echo 'selected';}?>>Hindu</option>
                                        <option value="Christian" <?php if($religion=='Christian'){ echo 'selected';}?>>Christian</option>
                                        <option value="Buddist" <?php if($religion=='Buddist'){ echo 'selected';}?>>Buddist</option>
                                    </select> 
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">accessibility</i></span>
                                    <select class="form-control" id="gen" >
                                        <option value="">Select Gender</option>
                                        <option value="Boy" <?php if($gender=='Boy'){ echo 'selected';}?>>Boy</option>
                                        <option value="Girl" <?php if($gender=='Girl'){ echo 'selected';}?>>Girl</option>
                                    </select> 
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">phone</i></span>
                                    <input type="tel" id="mno" name="mno" class="form-control" placeholder="Mobile Number" value="<?php echo $guarmobile;?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">school</i></span>
                                    <input type="text" id="preins" name="preins" class="form-control" placeholder="Previous Institute" value="<?php echo $preins;?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">monetization_on</i></span>
                                    <input type="num" id="taka" name="taka" class="form-control" placeholder="Mobile Number" value="<?php echo $taka;?>">
                                </div>
                                

                                <div style="text-align:left; padding-top :15px;">
                                    <button type="button" class="btn btn-primary" onclick="upd();">Update Info</button>
                                    <span id="px"></span>
                                </div>
                            </div>

                
              </div>
            </div>
            <div style="height:1px;"></div>
            
    
            
            
            <?php
        
        }}
        
        echo '<div style="text-align:center; color: white; background:red; padding:5px; "><b>You may remove wrong entry within an hour.</b></div>';
                echo '<div style="overflow:auto;">';
                echo '<table style="width:100%; margin: 15px;">';
                $ekhon = date('Y-m-d H:i:s');
                $sql0x = "SELECT * FROM admission where sccode='$sccode' order by id desc ";
                $result0x = $conn->query($sql0x);
                if ($result0x->num_rows > 0) 
                {while($row0x = $result0x->fetch_assoc()) { 
                $eng = $row0x["stnameeng"];
                $ben = $row0x["stnameben"];
                $vill = $row0x["previll"];
                $mno = $row0x["guarmobile"];
                $fee = $row0x["openingfee"];
                $by = $row0x["admby"];
                $tm = $row0x["admtime"];
                $sstid = $row0x["stid"];
                
                $txcl = 'purple';
                if($by != $usr){
                    $txcl = 'gray';
                } else {
                    if((strtotime($ekhon)-strtotime($tm)) >= 3600){
                        $txcl = 'red';
                    } else {
                        $txcl = 'seagreen';
                    }
                }
                
                ?>
                    <tr style="color:<?php echo $txcl;?>;">
                        <td>
                            <?php echo $eng.'<br>' . $ben;?>
                        </td>
                        <td><?php echo $vill . '<br>'. $mno;?></td>
                        <td><?php echo $fee;?></td>
                    </tr>
                    <?php
                        if($txcl == 'seagreen'){
                            ?>
                                <tr style="color:<?php echo $txcl;?>;">
                                    <td colspan="3">
                                        <div id="jav<?php echo $sstid;?>" style="margin-bottom:10px;">
                                            <button class="btn btn-danger" onclick="delst(<?php echo $sstid;?>);">Delete <?php echo $eng;?></button>
                                        </div>
                                            
                                    </td>
                                    
                                </tr>
                            <?php
                        }
           
                }}
                                        
                echo '</table></div>';
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
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
      function upd() {
		var nameeng=document.getElementById("nameeng").value;
		var nameben=document.getElementById("nameben").value;
		var fname=document.getElementById("fname").value;
		var mname=document.getElementById("mname").value;
		var vill=document.getElementById("vill").value;
		var po=document.getElementById("po").value;
		var ps=document.getElementById("ps").value;
		var dist=document.getElementById("dist").value;
		var mno=document.getElementById("mno").value;
		var reli=document.getElementById("reli").value;
		var gen=document.getElementById("gen").value; 
		
		var admcls=document.getElementById("admcls").value;
		var preins=document.getElementById("preins").value;
		var taka=document.getElementById("taka").value;

		var infor="stid=<?php echo $stid;?>&nameeng=" + nameeng + "&nameben=" + nameben +  "&fname=" + fname +  "&mname=" + mname +  "&vill=" + vill +  "&po=" + po +  "&ps=" + ps +  "&dist=" + dist +  "&mno=" + mno + "&reli=" + reli + "&gen=" + gen + "&admcls="+ admcls + "&preins=" + preins + "&taka=" + taka; 

	$("#px").html( "" );

	 $.ajax({
			type: "POST",
			url: "saveadmission.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#px').html('<span class="">Updating...</span>');
			},
			success: function(html) {    
				$("#px").html( html );
				alert('Admission Done!');
				window.location.href = 'studentadmission.php';
			}
		});
    }
  </script>
  
  
  <script>
      function delst(id) {

		var infor="stid=" + id;
	$("#jav"+id).html( "" );

	 $.ajax({
			type: "POST",
			url: "deladmission.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#jav'+id).html('<span class="">Deleting...</span>');
			},
			success: function(html) {    
				$("#jav"+id).html( html );
			}
		});
    }
  </script>
    
    
  
</body>

</html>