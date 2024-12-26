<?php 
    include 'inc.php'; $stid=$_GET['id'];
    
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
        $sql0 = "SELECT * FROM students where stid='$stid' LIMIT 1";
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) 
        {while($row0 = $result0->fetch_assoc()) { 
            $stnameeng = $row0["stnameeng"];  $stnameben = $row0["stnameben"];
            //$  = $row0[" "];  $  = $row0[" "];
            $fname  = $row0["fname"];  $mname  = $row0["mname"];
            $guarmobile  = $row0["guarmobile"];
            $tel = substr( $guarmobile, 0, 3 ).' '.substr( $guarmobile, 3, 2 ).' '.substr( $guarmobile, 5, 3 ).' '.substr( $guarmobile, -3 ); 
            $previll  = $row0["previll"];  $prepo  = $row0["prepo"];  $preps  = $row0["preps"];  $predist  = $row0["predist"];
            
            
            $sql0x = "SELECT * FROM sessioninfo where stid='$stid' and sessionyear='$sy' and sccode='$sccode' LIMIT 1";
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
            
            <datalist id="ttt">
                <option value="Banchharampur">
                <option value="Homna">
                <option value="Muradnagor">
            </datalist>
            <datalist id="ddd">
                <option value="Bhrahmanbaria">
                <option value="Cumilla">
            </datalist>
            <datalist id="ppp">
                <?php
                $sql0x = "SELECT prepo FROM students where sccode='$sccode' group by prepo order by prepo ";
                $result0xp = $conn->query($sql0x);
                if ($result0xp->num_rows > 0) 
                {while($row0x = $result0xp->fetch_assoc()) { 
                    $prepoq = $row0x["prepo"];
                    echo '<option value="' . $prepoq . '">';
                }}
                ?>
            </datalist>
            
            
            <datalist id="vvv">
                <?php
                $sql0x = "SELECT previll FROM students where sccode='$sccode' group by previll order by previll ";
                $result0xv = $conn->query($sql0x);
                if ($result0xv->num_rows > 0) 
                {while($row0x = $result0xv->fetch_assoc()) { 
                    $previllq = $row0x["previll"];
                    echo '<option value="' . $previllq . '">';
                }}
                ?>
            </datalist>
                
            
            
            <div class="card text-center" style="background:var(--lighter);" >
              <div class="card-body">
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons ico">person</i></span>
                        <input type="text" id="nameeng" name="nameeng" class="form-control" placeholder="Student's Name (in English)" value="<?php echo $stnameeng;?>">
                    </div>
                </div>
                <div style="margin:0px 0; height:1px;"></div>
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons ico" style="color:#dfecef;">person</i></span>
                        <input type="text" id="nameben" name="nameben" class="form-control" placeholder="ছাত্র/ছাত্রীর নাম (বাংলায়)"  value="<?php echo $stnameben;?>">
                    </div>
                </div>
                
                <div style="margin:10px 0; height:2px; background:var(--lighter);"></div>
                
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons ico">wc</i></span>
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="Father's Name" value="<?php echo $fname;?>">
                    </div>
                </div>
                <div style="margin:0px 0; height:1px;"></div>
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons ico" style="color:#dfecef;">person</i></span>
                        <input type="text" id="mname" name="mname" class="form-control" placeholder="Mother's Name" value="<?php echo $mname;?>">
                    </div>
                </div>
                
                <div style="margin:10px 0; height:2px; background:var(--lighter);"></div>
                
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons ico">place</i></span>
                        <input type="text" list="vvv" id="vill" name="vill" class="form-control" placeholder="Village" value="<?php echo $previll;?>">
                    </div>
                </div>
                <div style="margin:0px 0; height:1px;"></div>
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons ico" style="color:#dfecef;">person</i></span>
                        <input type="text" list="ppp" id="po" name="po" class="form-control" placeholder="Post Office" value="<?php echo $prepo;?>">
                    </div>
                </div>
                <div style="margin:0px 0; height:1px;"></div>
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons ico" style="color:#dfecef;">person</i></span>
                        <input type="text" list="ttt" id="ps" name="ps" class="form-control" placeholder="Upzila/PS" value="<?php echo $preps;?>">
                    </div>
                </div>
                <div style="margin:0px 0; height:1px;"></div>
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons ico" style="color:#dfecef;">place</i></span>
                        <input type="text" list="ddd" id="dist" name="dist" class="form-control" placeholder="District" value="<?php echo $predist;?>">
                    </div>
                </div>
                <div style="margin:10px 0; height:2px; background:var(--lighter);"></div>
                <div style="margin:2px 0; height:1px;"></div>
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="material-icons ico">phone</i></span>
                        <input type="tel" id="mno" name="mno" class="form-control" placeholder="Mobile Number" value="<?php echo $guarmobile;?>">
                    </div>
                </div>
                
                <div style="text-align:left; padding-top :15px;">
                    <button type="button" class="btn btn-primary" onclick="upd();">Update Info</button>
                    <span id="px"></span>
                </div>
                
                
                
                
                
                
              </div>
            </div>
            <div style="height:1px;"></div>
            
         
         
         
         
         
         
         
         
         
         
       
            
            
            <div style="height:1px;"></div>
            
            
            
            
            <?php
        
        }}
        
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
    function rel(id){
        window.location.href="studentedit.php?id=" + id; 
    }  
    
    function edit(id){
        window.location.href="studentedit.php?id=" + id; 
    }  
  </script>
  
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

		/*
		if (prno==""||cusid==""||prdate=="") 
		{
			if (prno==""){alert("আপনাকে অবশ্যই রশিদ নম্বর দিতে হবে।");} else{}
			if (cusid==""){alert("আপনাকে অবশ্যই গ্রাহকের পরিচিতি নম্বর দিতে হবে।");}else{}
			if (date==""){alert("আপনাকে অবশ্যই রশিদের তারিখ প্রদান করতে  হবে।"); document.getElementById("cusid").focus();}else{}
			
		}
		else*/
		{
		
		
		var infor="stid=<?php echo $stid;?>&nameeng=" + nameeng + "&nameben=" + nameben +  "&fname=" + fname +  "&mname=" + mname +  "&vill=" + vill +  "&po=" + po +  "&ps=" + ps +  "&dist=" + dist +  "&mno=" + mno;
	$("#px").html( "" );

	 $.ajax({
			type: "POST",
			url: "updatest.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#px').html('<span class="">Updating...</span>');
			},
			success: function(html) {    
				$("#px").html( html );
				//alert('students.php?cls=<?php echo $cls;?>&sec=<?php echo $sec;?>#<?php echo $stid;?>');
				window.location.href = 'students.php?cls=<?php echo $cls;?>&sec=<?php echo $sec;?>#block<?php echo $stid;?>';
			}
		});
    }}
  </script>
    
    
  
</body>

</html>