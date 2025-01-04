<?php
include 'inc.php';
include 'datam/datam-stprofile.php';

$classname = $_GET['cls'];
$sectionname = $_GET['sec'];
$totaldues = 0;


$month = date('m');
$st_dues_list = array();
$sql0 = "SELECT stid, sum(dues) as dues, sum(payableamt) as paya, sum(paid) as paid FROM stfinance where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname='$sectionname' and month<='$month' group by stid order by rollno";
$result01x = $conn->query($sql0);
if ($result01x->num_rows > 0) {
  while ($row0 = $result01x->fetch_assoc()) {
    $st_dues_list[] = $row0;
  }
}
?>


<script>

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




  function grpss(id) {
    var val = document.getElementById("sta" + id).checked;
    var infor = "dtid=" + id + "&val=" + val + "&opt=3";
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
</script>

<script>

  function go(id) {
    //window.location.href="stfinancedetails.php?id=" + id; 
    // window.location.href="stfinancedetails.php?id=" + id + "&edit=1";
    window.location.href = "stfinancedetails.php?id=" + id;
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
      <div class="card-body" style="border-radius:0;">
        <table width="100%" style="color:white;">
          <tr>
            <td colspan="2">
              <div class="menu-icon"> <i class="bi bi-cash-coin"></i> </div>
              <div class="menu-text"> Student's Dues </div>
            </td>
          </tr>

        </table>
      </div>
    </div>
    <div class="card page-info-box" >
      <div class="card-body" style="border-radius:0;">
        <table width="100%" style="color:white;">

          <tr>
            <td>
              <div style="font-size:20px; font-weight:700; line-height:15px;"><?php echo strtoupper($classname); ?>
              </div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name of Class</div>

              <div class="mt-3" style="font-size:16px; font-weight:700; line-height:15px;">
                <?php echo strtoupper($sectionname); ?>
              </div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name of Section</div>
              <div>
                <input type="text" id="mylastpr" value="23272003" hidden />
                <button class="btn btn-info text-small mt-2" onclick="epos();">Print Last PR (POS)</button>
                <div id="eposlink"></div>
              </div>
            </td>
            <td style="text-align:right;">
              <div style="font-size:30px; font-weight:700; line-height:20px;" id="cnt">...</div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No. of Students</div>
              <br>
              <div style="font-size:30px; font-weight:700; line-height:20px;" id="cntamt">...</div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">Total Dues</div>
            </td>
          </tr>
        </table>
      </div>
    </div>



    <div style="height:4px;"></div>


    <?php
    $cnt = 0;
    $cntamt = 0;
    $sql0 = "SELECT * FROM sessioninfo where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname = '$sectionname' order by rollno";
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
      while ($row0 = $result0->fetch_assoc()) {
        $stid = $row0["stid"];
        $rollno = $row0["rollno"];
        $card = $row0["icardst"];
        $dtid = $row0["id"];
        $status = $row0["status"];
        $rel = $row0["religion"];
        $four = $row0["fourth_subject"];

        $st_ind = array_search($stid, array_column($datam_st_profile, 'stid'));
        $neng = $datam_st_profile[$st_ind]["stnameeng"];
        $nben = $datam_st_profile[$st_ind]["stnameben"];
        $vill = $datam_st_profile[$st_ind]["previll"];

        $pth = '../students/' . $stid . '.jpg';
        if (file_exists($pth)) {
            $pth = 'https://eimbox.com/students/' . $stid . '.jpg';
        } else {
            $pth = 'https://eimbox.com/students/noimg.jpg';
        }

        // $sql00 = "SELECT * FROM students where  sccode='$sccode' and stid='$stid' LIMIT 1";
        // $result00 = $conn->query($sql00);
        // if ($result00->num_rows > 0) {
        //   while ($row00 = $result00->fetch_assoc()) {
        //     $neng = $datam_st_profile[$st_ind]["stnameeng"];
        //     $nben = $datam_st_profile[$st_ind]["stnameben"];
        //     $vill = $datam_st_profile[$st_ind]["previll"];
        //   }
        // }
    
        if ($totaldues < 100) {
          $bgc = '--var(dark)';
        }
        if ($status == 0) {
          $bgc = '--light';
          $dsbl = ' disabled';
          $gip = '';
        } else {
          $bgc = '--lighter';
          $dsbl = '';
          $gip = 'checked';
        }

        //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}
    
        $dues_ind = array_search($stid, array_column($st_dues_list, 'stid'));
        $totaldues = $st_dues_list[$dues_ind]["dues"];
        $tpaya = $st_dues_list[$dues_ind]["paya"];
        $tpaid = $st_dues_list[$dues_ind]["paid"];


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
    


        if ($totaldues < 100) {
          $bgc = 'white';
          $btn = 'success';
        } else {
          $btn = 'warning';
        }
        ?>
        <div class="card text-center" style="background:var(<?php echo $bgc; ?>); color:var(--darker);border-radius:0;"
          id="block<?php echo $stid; ?>" <?php echo $dsbl; ?>>
          <div class="card-body" style="border-radius:0;" onclick="go(<?php echo $stid; ?>)">
            <table width="100%">
              <tr>
                <td style="width:36px; text-align:center;">
                  <span style="font-size:24px; font-weight:700;"><?php echo $rollno; ?></span>
                  <br>
                  <img class="st-pic-small" src="<?php echo $pth; ?>" />

                </td>
                <td style="text-align:left; padding-left:5px;">
                  <div class="stname-eng"><?php echo $neng; ?></div>
                  <div class="stname-ben"><?php echo $nben; ?></div>
                  <div class="st-id" style="font-weight:600; font-style:normal; color:gray;">ID # <?php echo $stid; ?></div>
                  <div class="st-id"><?php echo $vill; ?></div>
                </td>
                <td style="text-align:right; font-size:20px; font-weight:600;">
                  <?php echo number_format($totaldues, 2, ".", ","); ?>
                  <br><a class="btn btn-<?php echo $btn; ?> " style="font-size:12px;"
                    href="stprdetails.php?id=<?php echo $stid; ?>">Payment History</a>
                </td>
              </tr>
            </table>


          </div>
        </div>


        <div style="height:3px;"></div>
        <?php
        $cnt++;
        $cntamt = $cntamt + $totaldues;
      }
    }

    ?>



  </div>

</main>
<div style="height:52px;"></div>
<footer>
  <!-- place footer here -->
</footer>
<!-- Bootstrap JavaScript Libraries -->
<script>
  document.getElementById("cnt").innerHTML = "<?php echo $cnt; ?>";
  document.getElementById("cntamt").innerHTML = "<?php echo number_format($cntamt, 2, ".", ","); ?>";
</script>