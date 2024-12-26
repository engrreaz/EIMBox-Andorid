<?php 
include 'inc.php';
$classname = $_GET['cls']; $sectionname = $_GET['sec']; 
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
        h4{font-size:18px; color:var(--darker); line-height:12px; font-weight:700;}
        small{font-size:10px; color:var(--dark); line-height:10px;}
    </style>
    <style>
    .box {
        padding: 5px 25px;
        box-sizing: border-box;
        display: flex;
        border: 1px solid var(--darker);
        border-width: 0;
        
    }
    


    .box-icon {
        font-size: 25px;
        display: inline;
        width: 30px;
        padding-top: 3px;
        margin-right: 5px;
    }
    
    .box-icon::before {
        content: '';
  position: absolute;
  width: 0px;
  background-color: var(--dark);
  top: 0;
  bottom: 0;
  left: 40px;
  margin-left: -1px;
    }


    .box-text {
        display: flex;
        flex-direction: column;
        flex: auto;
        margin-top:1px;
        padding-left:5px;
    }

    .box-title {
        font-size: 12px;
        font-weight: 500;
        margin: 0;
    }


    .box-subtitle {
        font-size: 10px;
        font-weight: 400;
        font-style: italic;
        margin: 0;
        color: var(--normal);
    }

    .box-prog {
        height: 50px;
        width: 50px;
        display: none;
    }
    
    .sender {
        width:30px; height:30px; border-radius:50%; background: white; z-index:999;
        box-shadow: 2px 2px 8px #888888;
    }
</style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container-fluidx">

        <div class="card text-left" style="background:var(--dark); color:var(--lighter);"  onclick="go(<?php echo $id;?>)">
          
            <div class="card-body">
                <table width="100%" style="color:white;">
                    <tr>
                        <td>
                            <div class="logoo"><i class="bi bi-bell-fill"></i></div>
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                                Notifications
                            </div>
                        </td>
                    </tr>
                
                    
                </table>
            </div>
        </div>

    
    
            <!--<div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk3();" >-->
            <!--  <img class="card-img-top"  alt="">-->
            <!--  <div class="card-body">-->
            <!--    <table style="">-->
            <!--        <tr>-->
            <!--            <td style="width:50px;color:var(--dark);"><i class="material-icons">group</i></td>-->
            <!--            <td>-->
            <!--                <h4>Administrative Setup</h4>-->
            <!--                <small>Class & Sections, Subjects, Teachers, Users etc.</small>-->
            <!--            </td>-->
            <!--        </tr>-->
            <!--    </table>-->
            <!--  </div>-->
            <!--</div>-->
            
            
            <div class="card-body">
            <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk30();" >
              <img class="card-img-top"  alt="">
              <?php
                $sql0 = "SELECT * FROM notification where tomail = '$usr' order by datetime desc";
                $result0wwrt = $conn->query($sql0);
                if ($result0wwrt->num_rows > 0) 
                {while($row0 = $result0wwrt->fetch_assoc()) { 
                $title = $row0["title"];
                $smstext = $row0["smstext"];
                $datetime = $row0["datetime"];
                $rws = $row0["rwstatus"];
                
            ?>  
                    <div class="box">
                        <div class="box-icon">
                            <img class="sender" src="https://eimbox.com/images/no-image.png" />
                        </div>
                        <div class="box-text">
                            <div class="box-title" style="<?php if($rws==1){ echo 'color:gray;';}?>">
                                <?php echo $title; ?>
                            </div>
                            <div class="box-subtitle"  style="<?php if($rws==1){ echo 'color:gray;';}?>"><?php echo $smstext;?></div>
                        </div>
                        <div class="box-prog">
                            <?php $perc = 76; ?>
                            <div class="pie animate no-round "
                                style="margin:auto, 0; --p:<?php echo $perc; ?>;--c:var(--dark);--b:3px;">
                                <?php echo $perc; ?>%
                            </div>
                        </div> 
                    </div>
            <?php 
                }}
                
                
                
                $query33x ="UPDATE notification set rwstatus = '1' where tomail = '$usr'";
    		    $conn->query($query33x);
              ?>
              

              </div>
            </div>

            
         

        
        
        
        
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
  document.getElementById("cnt").innerHTML = "<?php echo $cnt;?>";
  
    function go(){
        var cls=document.getElementById("classname").value; 
        var sec=document.getElementById("sectionname").value; 
        var sub=document.getElementById("subject").value; 
        var assess=document.getElementById("assessment").value; 
        var exam=document.getElementById("exam").value; 
        let tail = '?exam=' + exam + '&cls=' + cls + '&sec=' + sec + '&sub=' + sub + '&assess=' + assess; 
        if(cls=='Six'|| cls == 'Seven'){
            window.location.href="markpibi.php" + tail; 
        } else {
            window.location.href="markentry.php" + tail; 
        }
    }  
    
        function lnk1(){ window.location.href="tools_allsubjects.php"; }
        function lnk2(){ window.location.href="pibiprocess.php"; }
        function lnk3(){ window.location.href="settings.php"; }
        function lnk4(){ window.location.href="transcriptselect.php"; }
        function lnk5(){ window.location.href="userlist.php"; }
        function lnk6(){ window.location.href="classes.php"; }
        function lnk7(){ window.location.href="transcriptselect.php"; }
        function lnk8(){ window.location.href="transcriptselect.php"; }
        function lnk30(){ window.location.href="accountservices.php"; }
        function lnk31(){ window.location.href="accountsecurity.php"; }
        
        
  </script>
  
  
  <script>
      function fetchsection() {
		var cls=document.getElementById("classname").value;

		var infor="user=<?php echo $rootuser;?>&cls=" + cls;
	$("#sectionblock").html( "" );

	 $.ajax({
			type: "POST",
			url: "fetchsection.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#sectionblock').html('<span class=""><center>Fetching Section Name....</center></span>');
			},
			success: function(html) {    
				$("#sectionblock").html( html );
			}
		});
    }
  </script>
  
  <script>
      function fetchsubject() {
		var cls=document.getElementById("classname").value;
		var sec=document.getElementById("sectionname").value;

		var infor="sccode=<?php echo $sccode;?>&cls=" + cls + "&sec=" + sec;
	$("#subblock").html( "" );

	 $.ajax({
			type: "POST",
			url: "fetchsubject.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#subblock').html('<span class="">Retriving Subjects...</span>');
			},
			success: function(html) {    
				$("#subblock").html( html );
			}
		});
    }
  </script>
    
    
  
</body>

</html>