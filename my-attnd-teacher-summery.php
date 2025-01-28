<?php
include 'inc.php';
include 'datam/datam-calendar.php';

// profile_menu_my_attendance
$c1 = $c2 = $c3 = $c4 = $c5 = $c6 = 0;
$datam_tattnd = array();
$ds = $sy . '-01-01';
$de = $sy . '-12-31';
$sql0 = "SELECT * FROM teacherattnd where sccode = '$sccode' and adate between '$ds' and '$de' and tid='$userid' ;";
$result0rt_tattnd = $conn->query($sql0);
if ($result0rt_tattnd->num_rows > 0) {
  while ($row0 = $result0rt_tattnd->fetch_assoc()) {
    $datam_tattnd[] = $row0;
  }
}
// var_dump($datam_tattnd);


$my_app_datam = array();
$sql0 = "SELECT * FROM teacher_leave_app where sccode='$sccode' and ( status=0 or status>=3) order by apply_date desc, id desc";
$result0_head_block = $conn->query($sql0);
if ($result0_head_block->num_rows > 0) {
  while ($row0x = $result0_head_block->fetch_assoc()) {
    $my_app_datam[] = $row0x;
  }
}

$my_app_datam = array();
$sql0 = "SELECT date_from, date_to, status FROM teacher_leave_app where sccode='$sccode' and  status=1 and tid='$userid' ";
$result0_head_block = $conn->query($sql0);
if ($result0_head_block->num_rows > 0) {
  while ($row0x = $result0_head_block->fetch_assoc()) {
    $my_app_datam[] = $row0x;
  }
}
$teacher_application_count = count($my_app_datam);






?>

<main>
  <div class="containerx-fluid">
    <div class="card page-top-box">
      <div class="card-body">
        <table width="100%" style="color:white;">
          <tr>
            <td>
              <div class="menu-icon"><i class="bi bi-file-earmark-break-fill"></i></div>
              <div class="menu-text"> My Attendance Register </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="card-body p-2" style="background:black; overflow:hidden;">
      <div class="d-flex  row">
        <div class="col-2 d-block flex-fill text-center" style="color:seagreen;">
          <div class="menu-icon " id="c1"></div>
          <div class="st-id"> Presence </div>
        </div>
        <div class="col-2 d-block flex-fill text-center" style="color:cyan;">
          <div class="menu-icon " id="c2"></div>
          <div class="st-id"> Leave </div>
        </div>
        <div class="col-2 d-block flex-fill text-center" style="color:red;">
          <div class="menu-icon " id="c3"></div>
          <div class="st-id"> Absent </div>
        </div>
        <div class="col-2 d-block flex-fill text-center" style="color:gray;">
          <div class="menu-icon " id="c4"></div>
          <div class="st-id"> Weekends </div>
        </div>
        <div class="col-2 d-block flex-fill text-center" style="color:crimson;">
          <div class="menu-icon " id="c5"></div>
          <div class="st-id"> Holiday </div>
        </div>
        <div class="col-2 d-block flex-fill text-center" style="color:white;">
          <div class="menu-icon " id="c6"></div>
          <div class="st-id"> Total </div>
        </div>



      </div>
      <div class="row" hidden>
        <div class="col-6 st-id text-small text-white text-center">Workdays</div>
        <div class="col-4 st-id text-small text-white text-center">Offdays</div>
      </div>

    </div>

    <div style="height:2px;"></div>


    <?php
    $sl = 0;
    $sobar = 0;
    $mot = 0;
    $date1 = date('Y-01-01');
    $date2 = date('Y-12-31');
    $val_to = strtotime($cur);
    $val_from = strtotime($date1);
    $step = 3600 * 24;
    for ($x = $val_to; $x >= $val_from; $x = $x - $step) {
      $status_in = $detect_in = '';
      $run_date = date('d-m-Y', $x);
      $block_icon = 'clock';


      $workday_flag = 1;
      $wday_ind = array_search('Weekends', array_column($ins_all_settings, 'setting_title'));
      $wday_text = $ins_all_settings[$wday_ind]['settings_value'];

      $bar = date('l', $x);
      if (str_contains($wday_text, $bar) === true) {
        $workday_flag = 0;
        $block_icon = 'h-circle-fill';
        $block_text = 'white';
        $block_color = 'black';
        $real_in = '';
        $real_out = '';
        $c4++;
      } else {

        $count_event = count($datam_calendar_events);
        if ($count_event > 0) {
          foreach ($datam_calendar_events as $eve) {
            $x_date = $eve['date'];
            $x_class = $eve['class'];
            if ($x_date == date('Y-m-d', $x)) {
              $workday_flag *= $x_class;
              // echo $x_class . '/';
            }
          }
        }

        if ($workday_flag == 0) {
          $block_icon = 'h-circle-fill';
          $block_text = 'white';
          $block_color = 'crimson';
          $real_in = '';
          $real_out = '';
          $c5++;
        } else {

          $datam_ind = array_search(date('Y-m-d', $x), array_column($datam_tattnd, 'adate'));
          if ($datam_ind != '' || $datam_ind != null) {
            $my_attnd = 1;
            $status_in = $datam_tattnd[$datam_ind]['statusin'];
            if ($status_in == 'Late') {
              $block_text = 'orange';
              $block_color = 'lightyellow';
              $c1++;
            } else {
              $block_text = 'seagreen';
              $block_color = 'azure';
              $c1++;
            }
            $detect_in = $datam_tattnd[$datam_ind]['detectin'];
            if (strtolower($detect_in) == 'gps') {
              $block_icon = 'geo-fill';
            } else if (strtolower($detect_in) == 'fingerprint') {
              $block_icon = 'fingerprint';
            } else if (strtolower($detect_in) == 'rfid') {
              $block_icon = 'person-vcard-fill';
            } else if (strtolower($detect_in) == 'pin') {
              $block_icon = 'shield-lock-fill';
            } else if (strtolower($detect_in) == 'face') {
              $block_icon = 'person-square';
            }
            $real_in = $datam_tattnd[$datam_ind]['realin'];
            $real_out = $datam_tattnd[$datam_ind]['realout'];


          } else {
            $block_icon = 'x-circle-fill';
            $block_text = 'red';
            $block_color = 'ivory';
            $real_in = '';
            $real_out = '';

            //need check any leave application or not
            $leave_flag = 0;
            foreach ($my_app_datam as $appl) {
              $date_from = $appl['date_from'];
              $date_to = $appl['date_to'];
              $app_status = $appl['status'];
              // echo $run_date . '//' . $date_from.'/'.$date_to . '/'.$app_status;
              $run_datex = date('Y-m-d',$x);
              if ($run_datex >= $date_from && $run_datex <= $date_to && $app_status==1) {
                $leave_flag = 1;
                break;
              }
            }

            if($leave_flag==1){
              $block_icon = 'x-circle-fill';
                $block_text = 'navy';
                $block_color = 'honeydew';
                $real_in = '';
                $real_out = '';
                $c2++;
            } else {
              $block_icon = 'x-circle-fill';
                $block_text = 'red';
                $block_color = 'ivory';
                $real_in = '';
                $real_out = '';
                $c3++;
            }







          }


        }
      }











      ?>
      <div class="card "
        style="background:<?php echo $block_color; ?>; color:<?php echo $block_text; ?>; border-radius:0;"
        onclick="gog('<?php echo $run_date; ?>')">
        <img class="card-img-top" alt="">
        <div class="card-body d-flex">
          <div class="me-3"><i class="bi bi-<?php echo $block_icon; ?>"></i></div>
          <div>
            <?php if ($status_in != '') { ?>
              <div class="st-id"> <?php echo $status_in . ' IN <b>' . strtoupper($detect_in) . '</b> detect'; ?> </div>
            <?php } ?>
            <div style="font-size:12px; font-weight:600;  font-style:normal;">
              <?php echo date('l, d F, Y', strtotime($run_date)); ?>
            </div>
          </div>

          <div class=" flex-grow-1 text-end" style="">
            <div style="font-size:11px; font-weight:400; line-height:15px;">

              <?php if ($real_in != '') {
                echo 'In : ' . $real_in;
              }
              if ($real_out != '') {
                echo '<br>Out : ' . $real_out;
              }
              ?>
            </div>
          </div>

        </div>
      </div>
      <div id="dateclass<?php echo $run_date; ?>"></div>
      <div style="height:2px;"></div>
      <?php $sl++;

    }

    $c6 = $c1 + $c2 + $c3 + $c4 + $c5;


    ?>


  </div>

</main>

<div style="height:52px;"></div>


<script>


  document.getElementById("c1").innerHTML = '<?php echo $c1; ?>';
  document.getElementById("c2").innerHTML = '<?php echo $c2; ?>';
  document.getElementById("c3").innerHTML = '<?php echo $c3; ?>';
  document.getElementById("c4").innerHTML = '<?php echo $c4; ?>';
  document.getElementById("c5").innerHTML = '<?php echo $c5; ?>';
  document.getElementById("c6").innerHTML = '<?php echo $c6; ?>';



  document.getElementById("xxl").innerHTML = "<?php echo number_format($mot, 2, ".", ","); ?>";


  function go(id) {
    window.location.href = "finstudents.php?" + id;
  }



  function gog(dat) {
    var infor = "prdate=" + dat;
    //alert(infor);
    $("#dateclass" + dat).html("");

    $.ajax({
      type: "POST",
      url: "daily_class_collection.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#dateclass' + dat).html('Please Wait...');
      },
      success: function (html) {
        $("#dateclass" + dat).html(html);
      }
    });
  }
</script>

<script>
  function gogx(cn, sec, dat) {
    var sec2 = sec;
    var sec2 = sec2.replace(" ", "-");
    var infor = "cn=" + cn + "&sec=" + sec + "&prdate=" + dat;
    // 		alert(infor);
    $("#p" + cn + sec2 + dat).html("");

    $.ajax({
      type: "POST",
      url: "daily_st_collection.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#p' + cn + sec2 + dat).html('Please Wait...');
      },
      success: function (html) {
        $("#p" + cn + sec2 + dat).html(html);
      }
    });
  }
</script>