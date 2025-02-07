<?php
include 'inc.php';
include 'datam/datam-stprofile.php';

$extra = 0;
if (isset($_GET['cls']) && isset($_GET['sec'])) {
  $extra = 1;
  $classname = $_GET['cls'];
  $sectionname = $_GET['sec'];
  foreach ($cteacher_data as $ctas) {
    $cx = $ctas['cteachercls'];
    $sx = $ctas['cteachersec'];
    if ($classname == $cx && $sectionname == $sx) {
      $extra = 0;
      break;
    }
  }
  if ($extra == 1) {
    $cteacher_data[] = ['cteachercls' => $classname, 'cteachersec' => $sectionname];
  }
}
// var_dump($cteacher_data);
$count_class = count($cteacher_data);




?>

<main>
  <div class="containerx-fluidx">
    <div class="card text-left">

      <div class="card-body page-top-box" style="border-radius:0;">
        <table width="100%">
          <tr>
            <td colspan="2">
              <div class="menu-icon"><i class="bi bi-slash-circle"></i></div>
              <div class="menu-text"> Absent - Bunk List </div>

              <a href="make-call.php?mobilenumber=01919629672">Call</a>
            </td>
          </tr>
        </table>
      </div>
    </div>



    <?php if ($count_class > 1) { ?>
      <div class="d-flex table-responsive m-0 p-0">
        <?php
        for ($h = 0; $h < $count_class; $h++) {
          $classname = $cteacher_data[$h]['cteachercls'];
          $sectionname = $cteacher_data[$h]['cteachersec'];

          if ($h == 0) {
            $btn = 'primary';
          } else {
            $btn = 'dark';
          }

          ?>
          <button id="btn<?php echo $h; ?>" class="btn btn-<?php echo $btn; ?> flex-fill " style="border-radius:0;"
            onclick="myclass('<?php echo $h; ?>', '<?php echo $count_class; ?>' );">
            <?php echo $classname . ' <i class="bi bi-arrow-right"></i>  ' . $sectionname; ?>
          </button>
          <?php
        }
        ?>
      </div>
    <?php } ?>

    <!-- *************************************************** -->
    <?php for ($h2 = 0; $h2 < $count_class; $h2++) {
      $classname = $cteacher_data[$h2]['cteachercls'];
      $sectionname = $cteacher_data[$h2]['cteachersec'];
      if ($h2 == 0) {
        $ddss = 'block';

      } else {
        $ddss = 'none';

      }

      $datam = array();
      $sql00 = "SELECT * FROM stattnd where  adate = '$td'  and sccode='$sccode' and sessionyear='$sy'  and classname = '$classname' and sectionname='$sectionname' order by rollno";
      // echo $sql00 . '<br><br>';
      $result00gt = $conn->query($sql00);
      if ($result00gt->num_rows > 0) {
        while ($row00 = $result00gt->fetch_assoc()) {
          $datam[] = $row00;
        }
      }
      // var_dump($datam);
    
      ?>

      <div id="clssecblock<?php echo $h2; ?>" style="display:<?php echo $ddss; ?>">

        <div class="card text-left">
          <div class="card-body page-info-box" style="border-radius:0;">

            <div class="row ">
              <div class="col d-flex">
                <div class="menu-text"> <?php echo strtoupper($classname); ?> </div>
                <div class="ps-2 pe-2">:</div>
                <div class="stname-eng fw-bold pt-1"> <?php echo strtoupper($sectionname); ?> </div>
                <div class="stname-eng text-right flex-grow-1"><?php echo date('d/m/Y'); ?></div>
              </div>
            </div>
            <div class="row">
              <div class="col d-flex">
                <div class="st-roll text-small ">Name of Class & Section</div>
                <div class="st-roll text-small text-right flex-grow-1">Date</div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col">
                <div class="menu-text" id="cnt<?php echo $h2; ?>">0</div>
                <div class="st-roll text-small text-center">Total</div>
              </div>

              <div class="col">
                <div class="menu-text" id="cnt_pre<?php echo $h2; ?>">0</div>
                <div class="st-roll text-small text-center">Present</div>
              </div>

              <div class="col">
                <div class="menu-text" id="cnt_bunk<?php echo $h2; ?>">0</div>
                <div class="st-roll text-small text-center">Bunk</div>
              </div>

              <div class="col">
                <div class="menu-text" id="cnt_abs<?php echo $h2; ?>">0</div>
                <div class="st-roll text-small text-center">Absent</div>
              </div>

            </div>
          </div>
        </div>


        <?php
        $cnt = $absent_cnt = $bunk_cnt = 0;
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

            $grname = $row0["groupname"];
            if ($classname == 'Six' || $classname == 'Seven') {
              $grnametxt = " | <b>" . $grname . '</b>';
            } else {
              $grnametxt = '';
            }
            include 'component/student-image-path.php';

            $st_ind = array_search($stid, array_column($datam_st_profile, 'stid'));
            $neng = $datam_st_profile[$st_ind]["stnameeng"];
            $nben = $datam_st_profile[$st_ind]["stnameben"];
            $vill = $datam_st_profile[$st_ind]["previll"];
            $modi = $datam_st_profile[$st_ind]["modify"];
            $guarmobile = $datam_st_profile[$st_ind]["guarmobile"];
            $diff = (strtotime($cur) - strtotime($modi)) / (3600 * 24);

            $status = 0;
            $bunk = 0;
            $st_att_ind = array_search($stid, array_column($datam, 'stid'));
            if ($st_att_ind != '' || $st_att_ind != NULL) {
              $status = $datam[$st_att_ind]["yn"];
              $bunk = $datam[$st_att_ind]["bunk"];
            }



            $sector = '';
            // echo $status . '/' . $bunk;
            if ($status == 0 || $bunk == 1) {
              $bgc = '--lighter';
              $dsbl = '';
              $hidden = '';

              if ($status == 0) {
                $absent_cnt++;
              }
              if ($bunk == 1) {
                $bunk_cnt++;
              }
              if ($bunk == 1) {
                $bgc = '--light';
              }
            } else {
              $bgc = '--light';
              $dsbl = '  hidden';
              $hidden = '  hidden';

            }
            //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}
      

            ?>
            <div class="card text-center " style="background:var(<?php echo $bgc; ?>); color:var(--darker);"
              onclick="show_extra(<?php echo $stid; ?>)" id="block<?php echo $stid; ?>" <?php echo $hidden; ?>>
              <img class="card-img-top" alt="">
              <div class="card-body">
                <table width="100%">
                  <tr>
                    <td style="width:30px;"><span style="font-size:24px; font-weight:700;"><?php echo $rollno; ?></span>

                    </td>
                    <td style="text-align:left; padding-left:5px;">
                      <div class="stname-eng"><?php echo $neng; ?></div>
                      <div class="stname-ben text-dark"><?php echo $nben; ?></div>
                      <div class="st-id" style="font-weight:600; font-style:normal; color:gray;">ID #
                        <?php echo $stid . $grnametxt; ?>
                      </div>
                      <div class="roll-no"><?php echo $vill; ?></div>
                      <div class="roll-no" hidden><b><?php echo $diff; ?></b></div>

                    </td>
                    <td style="text-align:right;"><img src="<?php echo $pth; ?>" class="st-pic-normal" /></td>
                  </tr>
                </table>


              </div>
            </div>

            <div id="extra<?php echo $stid; ?>" class="card text-center" onclick="show_extra(<?php echo $stid; ?>)"
              style="background:var(<?php echo $bgc; ?>); color:var(--normal); display:none;">

              <div class="row pb-2" style="font-size:24px;">
                <div class="col-1"></div>
                <div class="col text-primary"
                  onclick="send_absent_notice(<?php echo $stid; ?>, 0, '<?php echo $guarmobile; ?>');">
                  <i class="bi bi-telephone-fill"></i>
                </div>
                <div class="col text-danger"
                  onclick="send_absent_notice(<?php echo $stid; ?>, 1 '<?php echo $guarmobile; ?>');"><i
                    class="bi bi-chat-left-text-fill"></i></div>

                <div class="col text-warning"
                  onclick="send_absent_notice(<?php echo $stid; ?>, 2, '<?php echo $guarmobile; ?>');"><i
                    class="bi bi-bell-fill"></i></div>

                <div class="col text-info" onclick="send_absent_notice(<?php echo $stid; ?>, 3);"><i
                    class="bi bi-envelope-at-fill"></i>
                </div>
                <div class="col text-success" onclick="send_absent_notice(<?php echo $stid; ?>, 4);"><i
                    class="bi bi-file-text-fill"></i>
                </div>
                <div class="col-1"></div>
              </div>
            </div>

            <div style="height:3px;" <?php echo $hidden; ?>></div>

            <?php
            $cnt++;
          }
        }

        $present = $cnt - $absent_cnt;
        ?>
        <script>
          document.getElementById("cnt" + <?php echo $h2; ?>).innerHTML = "<?php echo $cnt; ?>";
          document.getElementById("cnt_abs" + <?php echo $h2; ?>).innerHTML = "<?php echo $absent_cnt; ?>";
          document.getElementById("cnt_bunk" + <?php echo $h2; ?>).innerHTML = "<?php echo $bunk_cnt; ?>";
          document.getElementById("cnt_pre" + <?php echo $h2; ?>).innerHTML = "<?php echo $present; ?>";
        </script>

      </div>
      <?php

    }
    ?>
    <!-- *********************************************************** -->


  </div>

</main>
<div style="height:52px;"></div>

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
    window.location.href = "student.php?id=" + id;
  }



  function modsector(id, prt) {
    let sector = document.getElementById("sector" + id).value;

    let rate; let infor;
    if (sector == '') { rate = 100; }
    else if (sector == 'Scholarship') { rate = 0; }
    else if (sector == 'Stipend') { rate = 0; }
    else if (sector == 'Poor') { rate = 0; }
    else if (sector == 'On Request') { rate = 50; }
    document.getElementById("rate" + id).value = rate;

    if (prt == 0) {
      infor = "stid=" + id + "&sector=" + sector + "&rate=" + rate + "&prt=" + prt;
    } else {
      let tk = document.getElementById("rng" + id).value;
      document.getElementById("amt" + id).innerHTML = tk;
      infor = "stid=<?php echo $stid; ?>&fid=" + prt + "&tk=" + tk + "&prt=" + 1;
    }

    $("#upd" + id).html("");

    $.ajax({
      type: "POST",
      url: "backend/updfreefin.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $("#upd" + id).html('.....');
      },
      success: function (html) {
        $("#upd" + id).html(html);
      }
    });
  }
</script>


<script>
  function myclass(cur, mot) {
    var i = 0;
    for (i = 0; i < mot; i++) {
      document.getElementById('clssecblock' + i).style.display = 'none';
      document.getElementById('btn' + i).classList.remove("btn-primary");
      document.getElementById('btn' + i).classList.add("btn-dark");
    }
    document.getElementById('clssecblock' + cur).style.display = 'block';
    document.getElementById('btn' + cur).classList.add("btn-primary");
  }




  function show_extra(id) {

    var elem = document.getElementById("extra" + id);
    if (elem.style.display === 'block') {
      elem.style.display = 'none';
    } else {
      elem.style.display = 'block';
    }
  }


  function send_absent_notice(stid, way, mobile) {
    event.stopPropagation();

    var message = 'Dear Guardian,\\nYour child is not in school today.\\nHead Teacher';

    if (way == 0) {

      var lnk = "make-call.php?mobilenumber=" + mobile;
      window.location.href = lnk;

    } else if (way == 1) {

      send_sms(mobile, message);
      $sms_text = "Hi Labib,\\n Tui di school e jasna?";

    } else if (way == 2) {
      alert('Under Construction.');
    } else if (way == 3) {
      alert('Under Construction.');
    } else if (way == 4) {
      alert('Under Construction.');
    }
  }
</script>