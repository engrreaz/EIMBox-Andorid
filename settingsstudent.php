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
        h4{font-size:20px; color:var(--darker); line-height:12px; font-weight:700;}
        h5{font-size:16px; color:var(--dark); line-height:12px; font-weight:500;}
        small{font-size:10px; color:gray; line-height:10px; margin:3px 0 8px;}
    </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container-fluidx">
        <div class="card text-left" style="background:var(--dark); color:var(--lighter);"  >
          
            <div class="card-body">
                <table width="100%" style="color:white;">
                    <tr>
                        <td>
                            <div class="logoo"><i class="bi bi-people-fill"></i></div>
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">Student's ID Generator
                            </div>
                        </td>
                    </tr>
                
                    
                </table>
            </div>
        </div>
    
    <?php  if($userlevel == 'Administrator' || $userlevel == 'Head Teacher'){ ?>
            
            
            
            <div class="card" style="background:var(--lighter); color:var(--darker); display:none;" onclick="lnk1();" >
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <table style="">
                    <tr>
                        <td></td><td><b>Add a new class</b></td>
                    </tr>
                    <tr>
                        <td style="width:50px;color:var(--dark);"><i class="material-icons">note_add</i></td>
                        <td>
                            
                            <div style="text-align:left; padding-top:0px; display:none;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">group</i></span>
                                    <input type="text" id="id" name="id" class="form-control" placeholder="Enter Section/Group Name"  value="">
                                </div>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-text"><i class="material-icons ico">group</i></span>
                                <select class="form-control" id="cls">
                                    
                                    <option value="">Choose a Class</option>
                                    <option value="Six">Six</option>
                                    <option value="Seven">Seven</option>
                                    <option value="Eight">Eight</option>
                                    <option value="Nine">Nine</option>
                                    <option value="Ten">Ten</option>
                                </select>
                            </div>
                            
                            <div style="margin:0px 0; height:5px; background:var(--lighter);"></div>
                            
                            <div style="text-align:left; padding-top:0px;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">view_week</i></span>
                                    <input type="text" id="sec" name="sec" class="form-control" placeholder="Enter Section/Group Name"  value="">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td >
                            <div style="margin:0px 0; height:5px; background:var(--lighter);"></div>
                            <button  class="btn btn-success" onclick="submit();">Submit</button>
                        </td>
                    </tr>
                </table>
              </div>
            </div>

            
            <div id="block">
                <?php
                $sql00xgr = "SELECT * FROM areas where user='$rootuser' and sessionyear='$sy' order by idno, id"; 
                $result00xgr = $conn->query($sql00xgr);
        if ($result00xgr->num_rows > 0) {while($row00xgr = $result00xgr->fetch_assoc()) {
            $id=$row00xgr["id"]; $cls2=$row00xgr["areaname"]; $sec2=$row00xgr["subarea"];  $from2=$row00xgr["rollfrom"];  $to2=$row00xgr["rollto"]; 
        ?>
        
                <div class="card" style="background:var(--lighter); color:var(--darker);" >
                  <img class="card-img-top"  alt="">
                  <div class="card-body">
                    <table style="">
                        <tr>
                            <td style="width:50px; vertical-align:top; color:var(--dark);"><i class="material-icons">group</i></td>
                            <td>
                                <h4 id="cls<?php echo $id;?>"><?php echo $cls2;?></h4><small>Class Name</small><br><br>
                                <h5 id="sec<?php echo $id;?>"><?php echo $sec2;?></h5><small>Section / group Name</small>
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td style="">Enter Student Roll/ID Range :</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="padding-top:5px;">
                                <table>
                                    <tr>
                                        <td>
                                            <div style="text-align:left; padding-top:0px;">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="material-icons ico">label_outline</i></span>
                                                    <input type="number" id="from<?php echo $id;?>" name="id2" class="form-control" placeholder="From"  value="<?php echo $from2;?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="width:10px;"></td>
                                        <td>
                                            <div style="text-align:left; padding-top:0px;">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="material-icons ico">label</i></span>
                                                    <input type="number" id="to<?php echo $id;?>" name="id1" class="form-control" placeholder="To"  value="<?php echo $to2;?>">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr><td><small class="pad60">Start From :</small></td><td></td><td><small class="pad60">End To :</small></td></tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="padding-top:15px;">
                                <button  class="btn btn-primary" onclick="genid(<?php echo $id;?>);">Generate Student's ID</button>
                                <div id="gen<?php echo $id;?>"></div>
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
        
        
        <?php }} ?>
                
                
            </div>
            
          
            </div>
        <?php } else {echo 'Login Again Please...';} ?>
        
        
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
    
    function genid(id) {
        let a = document.getElementById("from"+id).value;
        let b = document.getElementById("to"+id).value;
        if(a>0 && b>0){
		var infor="rootuser=<?php echo $rootuser;?>&id=" + id + "&sccode=<?php echo $sccode;?>&from="+a+"&to="+b;
	$("#gen"+id).html( "" );

	 $.ajax({
			type: "POST",
			url: "generatestid.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#gen'+id).html('<span class=""><center>Processing, Please Wait....</center></span>');
			},
			success: function(html) {    
				$("#gen"+id).html( html );
			}
		});
    } else {
        alert('Please Enter Valid Roll Range');
    }
        
        
    }
  </script>
  
  
    
    
  
</body>

</html>