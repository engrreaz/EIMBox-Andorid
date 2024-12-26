<?php 
include 'inc.php';
$diff = strtotime($cur) - strtotime($otptime);
if($diff > 120){
    $otp = '';
} 

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
                            <div class="logoo"><i class="bi bi-lock-fill"></i></div>
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                                Web Login Security
                            </div>
                        </td>
                    </tr>
                
                    
                </table>
            </div>
        </div>
    
           
            <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk1();" >
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <table style="">
                    <tr>
                        <td style="width:50px; font-size:30px; color:var(--dark);"><i class="bi bi-lock-fill"></i></td>
                        <td>
                            <h4>Web Login Token</h4>
                            <small>Generate a one time web login token</small>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div id="keykey">
                                <?php if($otp !=''){?><small><br>Your Generated Web Login Toke is </small>
                                <div style="font-size:30px; color:gray; letter-spacing:10px; font-weight:bold;"><?php echo $otp;?></div><?php } ?>
                            </div>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
            
            
            <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnkf1();" >
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <table style="width:100%">
                    <tr>
                        <td style="width:50px; font-size:30px; color:var(--dark);"><i class="bi bi-key-fill"></i></td>
                        <td>
                            <h4>Fixed Pin</h4>
                            <small>Generate a lifetime fixed pin</small>
                        </td>
                        <td style="style="text-align:right;"">
                            <div class="form-check form-switch" >
                              <input class="form-check-input" style="" type="checkbox" id="mySwitch"  value="yes" checked>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td><td>
                            
                        </td>
                    </tr>
                </table>
              </div>
            </div>
            
            
            <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk1d();" >
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <table style="width:100%">
                    <tr>
                        <td style="width:50px; font-size:30px; color:var(--dark);"><i class="bi bi-google"></i></td>
                        <td>
                            <h4>Login With Google</h4>
                            <small>Login with your gmail account</small>
                        </td>
                        <td style="style="text-align:right;"">
                            <div class="form-check form-switch" >
                              <input class="form-check-input" style="" type="checkbox" id="mySwitch"  value="yes" checked>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td><td>
                            
                        </td>
                    </tr>
                </table>
              </div>
            </div>
            
            <style>

            </style>
            
            <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk11();" >
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <table style="width:100%">
                    <tr>
                        <td style="width:50px; font-size:30px; color:var(--dark);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16">
                              <path d="M2 2h2v2H2V2Z"/>
                              <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"/>
                              <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"/>
                              <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"/>
                              <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"/>
                            </svg>
                            
                        </td>
                        <td>
                            <h4>Login With QR Code</h4>
                            <small>Login with a auto generated QR Code</small>
                        </td>
                        <td style="style="text-align:right;"">
                            <div class="form-check form-switch" >
                              <input class="form-check-input" style="" type="checkbox" id="mySwitch"  value="yes" checked>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            
                        </td>
                    </tr>
                </table>
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
  

        
  </script>
  
  
  <script>
      function lnk1() {
		infor = "user=<?php echo $usr;?>";
	$("#keykey").html( "" );

	 $.ajax({
			type: "POST",
			url: "genotp.php",
			data: infor,
			cache: false,
			beforeSend: function () { 
				$('#keykey').html('<i class="material-icons">key</i> <br><small>Token is generating now. Please wait....</small>');
			},
			success: function(html) {    
				$("#keykey").html( html );
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