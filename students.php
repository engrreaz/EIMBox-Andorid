<?php
include 'inc.php';
include 'datam/datam-stprofile.php';


$classname = $cteachercls;
$sectionname = $cteachersec;

if (isset($_GET['cls'])) {
  $classname = $_GET['cls'];
}
if (isset($_GET['sec'])) {
  $sectionname = $_GET['sec'];
}
?>

<main>
  <div class="containerx-fluidx">
    <div class="card text-left" style="background:var(--dark); color:var(--lighter);">

      <div class="card-body page-top-box" style="border-radius:0;">
        <table width="100%">
          <tr>
            <td colspan="2">
              <div class="menu-icon"><i class="bi bi-people-fill"></i></div>
              <div class="menu-text"> Student's List </div>
            </td>
          </tr>
        </table>
      </div>

      <div class="card-body page-info-box" style="border-radius:0;">
        <table width="100%" style="color:white;">
          <tr>
            <td>
              <div style="font-size:20px; font-weight:700; line-height:15px;"><?php echo strtoupper($classname); ?></div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name of Class</div>
              <br>
              <div style="font-size:16px; font-weight:700; line-height:15px;"><?php echo strtoupper($sectionname); ?>
              </div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name of Section</div>
            </td>
            <td style="text-align:right;">
              <div style="font-size:30px; font-weight:700; line-height:20px;" id="cnt"></div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No. of Students</div>

              <br>
              <div class="form-check form-switch" style="float:right;">
                <input class="form-check-input" type="checkbox" id="myswitch" name="darkmode" value="no"
                  onclick="more();"> <small style="font-size:10px; padding: 2px 0;"> More</small>
              </div>
            </td>
          </tr>

        </table>
      </div>
    </div>


    <?php
    $cnt = 0;
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

        $st_ind = array_search($stid, array_column($datam_st_profile , 'stid'));
        $neng = $datam_st_profile[$st_ind]["stnameeng"];
        $nben = $datam_st_profile[$st_ind]["stnameben"];
        $vill = $datam_st_profile[$st_ind]["previll"];
        $modi = $datam_st_profile[$st_ind]["modify"];
        $diff = (strtotime($cur) - strtotime($modi)) / (3600 * 24);

        $sql00 = "SELECT * FROM students where  sccode='$sccode' and stid='$stid' LIMIT 1";
        $result00 = $conn->query($sql00);
        if ($result00->num_rows > 0) {
          while ($row00 = $result00->fetch_assoc()) {
            $neng = $row00["stnameeng"];
            $nben = $row00["stnameben"];
            $vill = $row00["previll"];
            $modi = $row00["modify"];
            $diff = (strtotime($cur) - strtotime($modi)) / (3600 * 24);
          }
        }
$sector = '';

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
    

        ?>
        <div class="card text-center mb-1" style="background:var(<?php echo $bgc; ?>); color:var(--darker);"
          onclick="go(<?php echo $stid; ?>)" id="block<?php echo $stid; ?>" <?php echo $dsbl; ?>>
          <img class="card-img-top" alt="">
          <div class="card-body">
            <table width="100%">
              <tr>
                <td style="width:30px;"><span style="font-size:24px; font-weight:700;"><?php echo $rollno; ?></span>
                 
                </td>
                <td style="text-align:left; padding-left:5px;">
                  <div class="stname-eng"><?php echo $neng; ?></div>
                  <div class="stname-ben"><?php echo $nben; ?></div>
                  <div class="st-id" style="font-weight:600; font-style:normal; color:gray;">ID #
                    <?php echo $stid . $grnametxt; ?></div>
                  <div class="roll-no"><?php echo $vill; ?></div>
                  <div class="roll-no" hidden><b><?php echo $diff; ?></b></div>

                </td>
                <td style="text-align:right;"><img src="<?php echo $pth; ?>" class="st-pic-normal" /></td>
              </tr>
            </table>


          </div>
        </div>
        <div class="card text-center sele gg" style="background:var(<?php echo $bgc; ?>); display:none; color:var(--darker);"
          id="blocksel<?php echo $dtid; ?>">
          <div class="card-body">


            <table style="width:100%;">
              <tr>

                <td>
                  <?php if ($classname == 'Six' || $classname == 'Seven' || $classname == 'Eight' || $classname == 'Nine') { ?>
                    <div class="form-group">
                      <label for="sel<?php echo $stid; ?>"><small><b>Group/Team</b></small></label>
                      <select class="form-control" id="sel<?php echo $dtid; ?>" onchange="grp(<?php echo $dtid; ?>);">
                        <option="" selected></option>
                        <?php
                        $sql00g = "SELECT * FROM pibigroup where  sccode='$sccode' and classname='$classname' and sectionname = '$sectionname' order by id";
                        $result00g = $conn->query($sql00g);
                        if ($result00g->num_rows > 0) {
                          while ($row00g = $result00g->fetch_assoc()) {
                            $ggg = $row00g["groupname"];
                            if ($ggg == $grname) {
                              $chk = " selected";
                            } else {
                              $chk = '';
                            }
                            echo '<option value="' . $ggg . '" ' . $chk . '>' . $ggg . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                  <?php } else { ?>
                    <div class="form-group">
                      <label for="sel<?php echo $stid; ?>"><small>4th Sub</small></label>
                      <select class="form-control" id="sel<?php echo $dtid; ?>" onchange="grpp(<?php echo $dtid; ?>);">
                        <option="" selected></option>
                        <?php
                        $sql00g = "SELECT * FROM subjects where  fourth=1 order by subcode";
                        $result00g = $conn->query($sql00g);
                        if ($result00g->num_rows > 0) {
                          while ($row00g = $result00g->fetch_assoc()) {
                            $ggg = $row00g["subcode"];
                            $gggx = $row00g["subject"];
                            if ($ggg == $four) {
                              $chk = " selected";
                            } else {
                              $chk = '';
                            }
                            echo '<option value="' . $ggg . '" ' . $chk . '>' . $gggx . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                  <?php } ?>
                </td>
                <td style="width:10px;"></td>
                <td style="">
                  <div class="form-group">
                    <label for="rel<?php echo $stid; ?>"><small>Religion</small></label>
                    <select class="form-control" id="rel<?php echo $stid; ?>" onchange="grps(<?php echo $stid; ?>);">
                      <option="" <?php if ($rel == '') {
                        echo 'selected';
                      } ?>></option>
                      <option="Islam" <?php if ($rel == 'Islam') {
                        echo 'selected';
                      } ?>>Islam</option>
                      <option="Hindu" <?php if ($rel == 'Hindu') {
                        echo 'selected';
                      } ?>>Hindu</option>
                      <option="Christian" <?php if ($rel == 'Christian') {
                        echo 'selected';
                      } ?>>Christian</option>
                      <option="Buddist" <?php if ($rel == 'Buddist') {
                        echo 'selected';
                      } ?>>Buddist</option>
                    </select>
                  </div>
                </td>
                <td style="width:10px;"></td>
                <td style="padding:8px 0 0 15px;">

                  <input style="scale:1.5;" class="form-check-input" type="checkbox" name="darkmode" value="no"
                    id="sta<?php echo $stid; ?>" onchange="grpss(<?php echo $stid; ?>);" <?php echo $gip; ?>>
                  &nbsp;&nbsp;&nbsp;
                  <label for="sta<?php echo $stid; ?>">Present</label>
                  <small> </small>
                </td>

              </tr>



              <tr>
                <td colspan="3" class="lbl"><small>Category</small></td>
                <td></td>
                <td class="lbl"><small>Applying Rate (%)</small></td>
              </tr>
              <tr>
                <td colspan="3">
                  <div class="input-group">
                    <select class="form-control" id="sector<?php echo $stid; ?>"
                      onchange="modsector(<?php echo $stid; ?>,0);">
                      <option value="" <?php if ($sector == '') {
                        echo 'selected';
                      } ?>></option>
                      <option value="Scholarship" <?php if ($sector == 'Scholarship') {
                        echo 'selected';
                      } ?>>Scholarship</option>
                      <option value="Stipend" <?php if ($sector == 'Stipend') {
                        echo 'selected';
                      } ?>>Stipend</option>
                      <option value="Poor" <?php if ($sector == 'Poor') {
                        echo 'selected';
                      } ?>>Poor</option>
                      <option value="On Request" <?php if ($sector == 'On Request') {
                        echo 'selected';
                      } ?>>On Request</option>
                    </select>
                  </div>
                </td>
                <td style="width:10px;"></td>
                <td>
                  <input type="number" id="rate<?php echo $stid; ?>" class="input form-control text-right"
                    value="<?php echo $rate; ?>"
                    style=" font-size:16px; color:var(--dark); font-weight:700; text-align:right;" disabled />
                </td>
              </tr>

            </table>
            <div id="upd<?php echo $stid; ?>"></div>
          </div>
        </div>

        <?php
        $cnt++;
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



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
  document.getElementById("cnt").innerHTML = "<?php echo $cnt; ?>";
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