<?php
include 'inc.php';
include 'datam/datam-stprofile.php';

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

    <div class="card " style="background:var(--dark); color:var(--lighter);">
      <div class="card-body">
        <table width="100%" style="color:white;">
          <tr>
            <td colspan="2">
              <div class="menu-icon"><i class="bi bi-coin"></i></div>
              <div class="menu-text"> My Collections </div>
            </td>
          </tr>
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
    $sql0 = "SELECT * FROM stpr where sessionyear='$sy' and sccode='$sccode' and entryby='$usr' and entrytime >= '2024-11-27' order by entrytime desc";
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
      while ($row0 = $result0->fetch_assoc()) {
        $stid = $row0["stid"];
        $rollno = $row0["rollno"];
        $prno = $row0["prno"];
        $prdate = $row0["prdate"];
        $amount = $row0["amount"];
        $entrytime = $row0["entrytime"];
        $clsp = $row0["classname"];
        $secp = $row0["sectionname"];

        $stind = array_search($stid, array_column($datam_st_profile, 'stid'));
        $neng = $datam_st_profile[$stind]["stnameeng"];
        $nben = $datam_st_profile[$stind]["stnameben"];
        $vill = $datam_st_profile[$stind]["previll"];

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
                <td style="width:30px;">
                  <span style="font-size:24px; font-weight:700;"><?php echo $rollno; ?></span>
                </td>
                <td style="text-align:left; padding-left:5px;">
                  <div class="stname-eng"><?php echo $neng; ?></div>
                  <div class="stname-ben"><?php echo $nben; ?></div>
                  <div class="c" style="font-weight:600; font-style:normal; color:gray;">ID # <?php echo $stid; ?></div>
                  <div class="c"><b><?php echo $clsp . ' / ' . $secp; ?></b></div>
                  <div class="c">Date : <b><?php echo date('d/m/Y', $prdate) . ' No. ' . $prno; ?></b></div>
                </td>
                <td style="text-align:right; font-size:20px; font-weight:600;">
                  <?php echo number_format($amount, 2, ".", ",");

                  if (strtotime($cur) - strtotime($entrytime) > $mini) {
                    $ddd = 'disabled';
                  } else {
                    $ddd = '';
                  }

                  ?>
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