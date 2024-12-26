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
    <link rel="stylesheet" href="css.css?v=a2">
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
                            <div class="logoo"><i class="bi bi-person-circle"></i></div>
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">Teaching Staff Manager
                            </div>
                        </td>
                    </tr>
                
                    
                </table>
            </div>
        </div>
    
    <?php  if($userlevel == 'Administrator' || $userlevel == 'Head Teacher'){ ?>
            
            
            
            <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk1();" >
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <table style="width:100%;">
                    <tr style="text-align:center; height:25px;">
                  <td  style="text-align:center; height:25px;padding-bottom:10px;">
                      <div onclick="shi();" >
                          <i style="font-size:30px;" class="bi bi-person-plus-fill"></i><br> <b>Add a new teacher</b>
                      </div>
                      
                      
                      </td>
                    </tr>
                    <tr id="hide1" style="display:none;">
                        <td>
                            
                            <div style="text-align:left; padding-top:0px; display:block;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">group</i></span>
                                    <input type="text" id="tid" name="tid" class="form-control" placeholder="ID Number"  value="" disabled>
                                </div>
                            </div>
                            
                            <div style="text-align:left; padding-top:0px;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">person</i></span>
                                    <input type="text" id="tname" name="tname" class="form-control" placeholder="Teacher's Name"  value="">
                                </div>
                            </div>
                            
                            <div class="form-group input-group">
                                <span class="input-group-text"><i class="material-icons ico">group</i></span>
                                <select class="form-control sele" id="pos">
                                    
                                    <option value="">Position</option>
                                    <option value="Principal">Principal</option>
                                    <option value="Head Teacher">Head Teacher</option>
                                    <option value="Asstt. Head Teacher">Asstt. Head Teacher</option>
                                    <option value="Seniour Teacher">Seniour Teacher</option>
                                    <option value="Lecturer">Lecturer</option>
                                    <option value="Asstt. Teacher">Asstt. Teacher</option>
                                    <option value="Office Assistant">Office Assistant</option>
                                    <option value="Accountants">Accountants</option>
                                    <option value="Lab Assisstant">Lab Assisstant</option>
                                </select>
                            </div>
                            
                            <div style="margin:0px 0; height:5px; background:var(--lighter);"></div>
                            
                            <div style="text-align:left; padding-top:0px;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">phone</i></span>
                                    <input type="text" id="mno" name="mno" class="form-control" placeholder="Enter Mobile Number"  value="">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr id="hide2"  style="display:none;">
          
                        <td >
                            <div style="margin:0px 0; height:5px; background:var(--lighter); "></div>
                            <button  class="btn btn-success pad60" onclick="submit();">Submit</button>
                        </td>
                    </tr>
                </table>
              </div>
            </div>

            
            
            
            <div class="card" style="background:var(--darker); color:var(--lighter);" >
                  <img class="card-img-top"  alt="">
                  <div class="card-body">
                        <center><b>Our Honourable Teaching Staff</b></center>
                  </div>
                </div>

            
            
            
            
            <div id="block">
                <?php
                $sql00xgr = "SELECT * FROM teacher where sccode='$sccode' order by ranks, tid desc";  
        $result00xgr = $conn->query($sql00xgr);
        if ($result00xgr->num_rows > 0) {while($row00xgr = $result00xgr->fetch_assoc()) {
            $tid2=$row00xgr["tid"]; $tname2=$row00xgr["tname"]; $pos2=$row00xgr["position"];  $mno2=$row00xgr["mobile"]; 
        ?>
        
                <div class="card gg" style="background:var(--lighter); color:var(--darker);" >
                  <img class="card-img-top"  alt="">
                  <div class="card-body">
                    <table style="">
                        <tr>
                            <td style="width:50px; vertical-align:top; color:var(--dark);"><i class="material-icons">group</i></td>
                            <td>
                                <table>
                                    <tr><td><h6 style="line-height:1px;" id="tid<?php echo $tid2;?>"><?php echo $tid2;?></h6></td></tr>
                                    <tr><td style="padding-bottom:15px;"><small>Teacher's ID</small></td></tr>
                                    
                                    <tr><td><h4 style="line-height:1px;" id="tname<?php echo $tid2;?>"><?php echo $tname2;?></h4></td></tr>
                                    <tr><td style="padding-bottom:15px;"><small>Teacher's Name</small></td></tr>
                                    
                                    <tr><td><h6 style="line-height:1px;" id="pos<?php echo $tid2;?>"><?php echo $pos2;?></h6></td></tr>
                                    <tr><td style="padding-bottom:15px;"><small>Designation</small></td></tr>
                                    
                                    <tr><td><h6 style="line-height:1px;" id="mno<?php echo $tid2;?>"><?php echo $mno2;?></h6></td></tr>
                                    <tr><td style="padding-bottom:15px;"><small>Mobile Number</small></td></tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="padding-top:5px;">
                                <button  class="btn btn-primary" onclick="edit(<?php echo $tid2;?>);">Edit</button>
                                <button  class="btn btn-danger" id="delbtn<?php echo $tid2;?>" style="display:none;" onclick="del(<?php echo $tid2;?>);">Confirm Delete</button>
                                <button  class="btn btn-warning" id="confbtn<?php echo $tid2;?>" onclick="confi(<?php echo $tid2;?>);">Delete</button>
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>

        
        
        <?php }} ?>
                
                
            </div>
            
          
            </div>
        <?php } ?>
        
        
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
      function submit() {
		var tid=document.getElementById("tid").value;
		var tname=document.getElementById("tname").value;
		var pos=document.getElementById("pos").value;
		var mno=document.getElementById("mno").value;

		var infor="rootuser=<?php echo $sccode;?>&tname=" + tname + "&pos=" + pos + "&mno=" + mno + "&tid=" + tid + "&action=1";
	$("#block").html( "" );

	 $.ajax({
			type: "POST",
			url: "addeditteacher.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#block').html('<span class=""><center>Processing, Please Wait....</center></span>');
			},
			success: function(html) {    
				$("#block").html( html );
				document.getElementById("tid").value = "";
				document.getElementById("tname").value = "";
				document.getElementById("pos").value = "";
				document.getElementById("mno").value = "";
				
			}
		});
		shi();
    }
    
    
    function edit(id) {
        
        let a = document.getElementById("tid"+id).innerHTML;
        let b = document.getElementById("tname"+id).innerHTML;
        let c = document.getElementById("pos"+id).innerHTML;
        let d = document.getElementById("mno"+id).innerHTML;
        
		document.getElementById("tid").value = a;
		document.getElementById("tname").value = b;
		document.getElementById("pos").value = c;
		document.getElementById("mno").value = d;
		shoo();
		document.getElementById("tname").focus().select();
		
    }
    
    function shi(){
        var a = document.getElementById("hide1");
        var b = document.getElementById("hide2");
        if(a.style.display=='none'){
            a.style.display='block';
            b.style.display='block';
        } else {
            a.style.display='none';
            b.style.display='none';
        }
    }
    function shoo(){
        var a = document.getElementById("hide1");
        var b = document.getElementById("hide2");
         a.style.display='block';
            b.style.display='block';
    }
    
    function del(id) {
		var infor="rootuser=<?php echo $sccode;?>&tid=" + id + "&action=0";
	$("#block").html( "" );

	 $.ajax({
			type: "POST",
			url: "addeditteacher.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#block').html('<span class=""><center>Processing, Please Wait....</center></span>');
			},
			success: function(html) {    
				$("#block").html( html );
			}
		});
    }
    
    
    function confi(id){
        document.getElementById("delbtn"+id).style.display = 'none';
        document.getElementById("confbtn"+id).style.display = 'block';
    }
  </script>
  
  
    
    
  
</body>

</html>