<?php
include 'inc.php';
include 'header.php';
if (isset($_GET['cls'])) {
  $classname = $_GET['cls'];
} else {
  $classname = $cteachercls;
}
if (isset($_GET['sec'])) {
  $sectionname = $_GET['sec'];
} else {
  $sectionname = $cteachersec;
}
$totaldues = 0;

include 'datam/datam-stprofile.php';

$month = date('m');
$data_dues = array();
$sql0 = "SELECT stid, sum(dues) as dues, sum(payableamt) as paya, sum(paid) as paid FROM stfinance where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname='$sectionname' and month<='$month' group by stid ";
$result01x = $conn->query($sql0);
if ($result01x->num_rows > 0) {
  while ($row0 = $result01x->fetch_assoc()) {
    $data_dues[] = $row0;
  }
}
?>


<script>
  function epos() {
    let lastpr = document.getElementById("mylastpr").value;
    infor = "prno=" + lastpr;
    $("#eposlink").html("");

    $.ajax({
      type: "POST",
      url: "getprinfo.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $("#eposlink").html('.....');
      },
      success: function (html) {
        $("#eposlink").html(html);
      }
    });
  }


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
    <div class="card text-left" style="background:var(--dark); color:var(--lighter);border-radius:0; " onclick="">

      <div class="card-body" style="border-radius:0;">
        <table width="100%" style="color:white;">
          <tr>
            <td colspan="2">
              <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                Student's Dues

              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div style="font-size:20px; font-weight:700; line-height:15px;"><?php echo strtoupper($classname); ?>
              </div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name of Class</div>
              <br>
              <div style="font-size:16px; font-weight:700; line-height:15px;"><?php echo strtoupper($sectionname); ?>
              </div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name of Section</div>
              <div hidden>
                <input type="text" id="mylastpr" value="23272003" />
                <button onclick="epos();">ESC-POS</button>
                <div id="eposlink">***</div>
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
    <div style="height:8px;"></div>


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


        $st_arr = array_search($stid, array_column($datam_st_profile, 'stid'));
        $neng = $datam_st_profile[$st_arr]["stnameeng"];
        $nben = $datam_st_profile[$st_arr]["stnameben"];
        $vill = $datam_st_profile[$st_arr]["previll"];

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
    
        $indues = array_search($stid, array_column($data_dues, 'stid'));
        $totaldues = $data_dues[$indues]["dues"];
        $tpaya = $data_dues[$indues]["paya"];
        $tpaid = $data_dues[$indues]["paid"];

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
                <td style="width:30px;">
                  <span style="font-size:24px; font-weight:700;"><?php echo $rollno; ?></span>
                </td>
                <td style="text-align:left; padding-left:5px;">
                  <div class="stname-eng"><?php echo $neng; ?></div>
                  <div class="stname-ben"><?php echo $nben; ?></div>
                  <div class="c" style="font-weight:500; font-style:normal; color:gray;">ID #
                    <?php echo $stid . ' [<b>' . $vill . '</b>]'; ?>
                  </div>

                </td>
                <td rowspan="2" style="text-align:right; font-size:20px; font-weight:600;">
                  <img src="https://eimbox.com/students/<?php echo $stid; ?>.jpg" class="st-list-photo" />
                </td>
              </tr>
              <tr>

                <td></td>
                <td>
                  <div class="d-flex">
                    <div class="mr-2">
                      <a class="btn btn-<?php echo $btn; ?>" style="font-size:10px;"
                        href="stprdetails.php?id=<?php echo $stid; ?>" disabled>Attendance</a>
                    </div>
                    <div class="d-block">
                      <div>
                        <?php echo number_format($totaldues, 2, ".", ","); ?>
                      </div>
                      <div>
                        <a class="btn btn-<?php echo $btn; ?>" style="font-size:10px;"
                          href="stprdetails.php?id=<?php echo $stid; ?>">Payment History</a>
                      </div>
                    </div>
                  </div>
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