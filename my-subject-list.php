<?php
include 'inc.php';
include 'datam/datam-subject-list.php';

// PR Delete Time.....
$mini = 10000; //24 * 3600 * 7;
$classname = '';
$sectionname = '';

$collection = $accountant = 0;
?>


<script>

  function more() {
    let val = document.getElementById("myswitch").checked;
    if (val == true) {
      $(".sele").show();
    } else {
      $(".sele").hide();
    }
  }

  function grp(id) {
    var val = document.getElementById("sel" + id).value;
    var infor = "dtid=" + id + "&val=" + val + "&opt=1";
    $("#blocksel" + id).html("");

    $.ajax({
      type: "POST",
      url: "grpupd.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $("#blocksel" + id).html('<span class=""><center>Fetching Section Name....</center></span>');
      },
      success: function (html) {
        $("#blocksel" + id).html(html);
      }
    });
  }

  function grpp(id) {
    var val = document.getElementById("sel" + id).value;
    var infor = "dtid=" + id + "&val=" + val + "&opt=1";
    $("#blocksel" + id).html("");

    $.ajax({
      type: "POST",
      url: "fourupd.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $("#blocksel" + id).html('<span class=""><center>Fetching Section Name....</center></span>');
      },
      success: function (html) {
        $("#blocksel" + id).html(html);
      }
    });
  }

  function grps(id) {
    var val = document.getElementById("rel" + id).value;
    var infor = "dtid=" + id + "&val=" + val + "&opt=2";
    $("#blocksel" + id).html("");

    $.ajax({
      type: "POST",
      url: "grpupd.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $("#blocksel" + id).html('<span class=""><center>Fetching Section Name....</center></span>');
      },
      success: function (html) {
        $("#blocksel" + id).html(html);
      }
    });
  }




  function delpr(pr) {
    //var val=document.getElementById("sta"+id).checked;
    //alert(pr);
    var infor = "prno=" + pr;
    $("#block" + pr).html("");

    $.ajax({
      type: "POST",
      url: "backend/delmypr.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $("#block" + pr).html('Deleting....');
      },
      success: function (html) {
        $("#block" + pr).html(html);
      }
    });
  }
</script>

<script>

  function go(id) {
    //window.location.href="stfinancedetails.php?id=" + id; 
    window.location.href = "stfinancedetails.php?id=" + id + "&edit=1";
  }

  function pr(id) {
    let ln = "stprdetails.php?id=" + id;
    alert(ln);
    window.location.href = ln;
  }  
</script>


<main>
  <div class="containerx-fluid">

    <div class="card page-top-box" >
      <div class="card-body">
        <table width="100%" style="color:white;">
          <tr>
            <td colspan="2">
              <div class="menu-icon"><i class="bi bi-book-half"></i></div>
              <div class="menu-text"> My Subjects </div>
            </td>
          </tr>
 

        </table>
      </div>
    </div>
    <div class="card page-info-box" >
      <div class="card-body">
        <table width="100%" style="color:white;">

          <tr>
            <td>
              <div style="font-size:36px; font-weight:700; line-height:15px;" id="cntamt"></div>
              <div style="color:var(--light); font-size:12px; font-weight:400; font-style:italic; line-height:40px;">
                Cash-in-hand</div>
            </td>
            <td style="text-align:right;">
              <div style="font-size:24px; font-weight:700; line-height:20px;" id="cnt"></div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No. of Receipt</div>

              <div style="font-size:11px; color:graylight; font-style:italic; ">Total Collections : <span style="font-weight:700;  font-style:normal;"
                  id="collection"></span></div>
              <div style="font-size:11px; color:graylight;  font-style:italic;">To Accountants : <span style="font-weight:700; font-style:normal; "
                  id="accountant"></span></div>

            </td>
          </tr>

        </table>
      </div>
    </div>



    <div style="height:8px;"></div>


    <?php
    /*
    $sql0 = "SELECT * FROM sessioninfo where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname = '$sectionname' order by rollno";
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) 
    {while($row0 = $result0->fetch_assoc()) { 
        $stid=$row0["stid"];
    */

    $cnt = 0;
    $cntamt = 0;
    $sql0 = "SELECT * FROM subsetup where sessionyear LIKE '%$sy%' and sccode='$sccode' and tid='$userid'  order by classname, sectionname, subject desc";
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
      while ($row0 = $result0->fetch_assoc()) {
        $subcode = $row0["subject"];
        $clsname = $row0["classname"];
        $secname = $row0["sectionname"];
        
        $stind = array_search($subcode, array_column($datam_subject_list, 'subcode'));
        $seng = $datam_subject_list[$stind]["subject"];
        $sben = $datam_subject_list[$stind]["subben"];

        // if ($status == 0) {
        $bgc = '--light';
        $dsbl = ' disabled';
        $gip = '';
        // } else {
        $bgc = '--lighter';
        $dsbl = '';
        $gip = 'checked';
        // }
        //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}
    
        // $month = date('m');
        // $sql0 = "SELECT sum(dues) as dues, sum(payableamt) as paya, sum(paid) as paid FROM stfinance where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname='$sectionname' and month<='$month' and stid='$stid'";
        // $result01x = $conn->query($sql0);
        // if ($result01x->num_rows > 0) {
        //   while ($row0 = $result01x->fetch_assoc()) {
        //     $totaldues = $row0["dues"];
        //     $tpaya = $row0["paya"];
        //     $tpaid = $row0["paid"];
        //   }
        // }
    
        ?>
        <div class="card text-center mb-1" style="background:var(<?php echo $bgc; ?>); color:var(--darker);border-radius:0;"
          id="block<?php echo $prno; ?>" <?php echo $dsbl; ?>>
          <div class="card-body" style="border-radius:0;" onclick="go(<?php echo $stid; ?>)">
            <table width="100%">
              <tr>
                <td style="width:40px; text-align:center;">
                  
                </td>
                <td style="text-align:left; padding-left:5px;">
                  <div class="stname-eng"><?php echo $seng; ?></div>
                  <div class="stname-ben"><?php echo $sben; ?></div>
                </td>
                <td style="text-align:right; font-size:20px; font-weight:600;">
                 <book></book>
                  <br>
                  <button class="btn btn-danger" onclick="delpr(<?php echo $prno; ?>)" <?php echo $ddd; ?>>Delete
                    Receipt</button>
                </td>
              </tr>
            </table>


          </div>
        </div>


        <div style="height:3px;"></div>
        <?php
        $cnt++;
        $cntamt = $cntamt + $amount;
      }
    }

    $collection = $cntamt * 1;
    $cash_in_hand = $collection - $accountant;
    ?>



  </div>

</main>
<div style="height:52px;"></div>


<script>
  document.getElementById("cnt").innerHTML = "<?php echo $cnt; ?>";
  document.getElementById("cntamt").innerHTML = "<?php echo number_format($cash_in_hand, 2, ".", ","); ?>";
  document.getElementById("collection").innerHTML = "<?php echo number_format($cntamt, 2, ".", ","); ?>";
  document.getElementById("accountant").innerHTML = "<?php echo number_format($accountant, 2, ".", ","); ?>";
</script>