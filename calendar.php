<?php 
include 'inc.php';
        $td = '2024-01-01';
        for($j=0; $j<=365; $j++){
            $trk = strtotime($td) + $j * 3600*24;
            $trk = date('Y-m-d', $trk);
            $bar = date('l', strtotime($trk));

            
            $query3x ="insert into calendar values(NULL, '$trk', '$bar', 0, NULL, NULL, 0,  0, NULL);";
		  //  $conn->query($query3x);
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
    </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="containerx-fluid">
        <div class="card text-left" style="background:var(--darker); color:var(--lighter); border-radius:0;" >
            <div class="card-body">
                <table width="100%" style="color:white;">
                    <tr>
                        <td colspan="2">
                            <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                                Collection Details
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <div style="font-size:40px; font-weight:700; text-align:center; margin-top:15px;">
                                <span style="font-size:12px; font-weight:500;">BDT</span> <span id="xxl"></span>
                            </div>
                        </td>
                   
                    </tr>
                    
                </table>
            </div>
        </div>
        <div style="height:8px;"></div>
            
            
            <?php 
            $sl = 0; $sobar=0; $mot = 0;
            $dd1 = date('Y') . '-01-01';$dd2 = date('Y') . '-12-31';
            $sql0 = "SELECT * FROM calendar where (sccode = 0 or sccode='$sccode') and date between '$dd1' and '$dd2' order by date  ";
            // echo $sql0;
                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) 
                {while($row0 = $result0->fetch_assoc()) { 
                    $date = $row0["date"];  $day = $row0["day"];  
                  
        
                ?>
            <div class="card " style="background:var(--lighter); color:seagreen; border-radius:0;"  onclick="gog('<?php echo $prdate;?>')">
              <img class="card-img-top"  alt="">
              <div class="card-body">
                <div style="font-size:15px; font-weight:700; float:right;">
                    <span style="font-size:12px; font-weight:500;">BDT</span> <?php echo number_format($taka,2,".",",");?>
                </div>
                <div style="font-size:14px; font-weight:600; color:seagreen; font-style:normal;"><?php echo $day .  date('d-m-Y', strtotime($date));?></div>
              </div>
            </div>
            <div id="dateclass<?php echo $prdate;?>"></div>
            <div style="height:2px;"></div>
            <?php  $sl++; }} ?>
        
        
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
  document.getElementById("xxl").innerHTML = "<?php echo number_format($mot,2,".",",");?>";
  
  
    function go(id){
        window.location.href="finstudents.php?" + id; 
    }  
    
    
    
      function gog(dat) {
		var infor="prdate=" + dat;
		//alert(infor);
	$("#dateclass"+dat).html( "" );

	 $.ajax({
			type: "POST",
			url: "daily_class_collection.php",
			data: infor,
			cache: false,
			beforeSend: function () {
				$('#dateclass'+dat).html('Please Wait...');
			},
			success: function(html) {
				$("#dateclass"+dat).html( html );
			}
		});
    }
  </script>
  
  <script>
      function gogx(cn,sec,dat) {
          var sec2 = sec;
          var sec2 = sec2.replace(" ", "-");
		var infor="cn=" + cn + "&sec=" + sec + "&prdate=" + dat;
// 		alert(infor);
	$("#p"+cn+sec2+dat).html( "" );

	 $.ajax({
			type: "POST",
			url: "daily_st_collection.php",
			data: infor,
			cache: false,
			beforeSend: function () {
				$('#p'+cn+sec2+dat).html('Please Wait...');
			},
			success: function(html) {
				$("#p"+cn+sec2+dat).html( html );
			}
		});
    }
  </script>
    
    
  
</body>

</html>