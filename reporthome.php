<?php
include 'inc.php';
?>

<main>
  <div class="container-fluidx">

    <div class="card page-top-box">
      <div class="card-body">
        <table width="100%" style="color:white;">
          <tr>
            <td>
              <div class="menu-icon"><i class="bi bi-mortarboard-fill"></i></div>
              <div class="menu-text"> Reports </div>
            </td>
          </tr>
        </table>
      </div>
    </div>


    <?php $count_class = count($cteacher_data);
    if ($count_class > 0) { ?>

      <div class="card menu-item-block" onclick="report_menu_my_class();">
        <div class="card-body">
          <table style="">
            <tr>
              <td class="menu-item-icon"><i class="bi bi-diagram-2-fill"></i></td>
              <td>
                <h4>My Class</h4>
                <div class="menu-item-sub-text"> All of students list accourding to class/section </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="menu-separator"></div>

    <?php } ?>



    <div class="card menu-item-block" onclick="report_menu_student_list();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-people-fill"></i></td>
            <td>
              <h4>Students List</h4>
              <div class="menu-item-sub-text"> Student's Report <br>(Attendance, Result, Dues, Co-Curricular Activities)
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="report_menu_my_collection();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-coin"></i></td>
            <td>
              <h4>Collection</h4>
              <div class="menu-item-sub-text"> All of my collection recorded in cloud </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <?php if ($userlevel == 'Administrator' || $userlevel == 'Super Administrator' || $userlevel == 'Accountants') { ?>
      <div class="card menu-item-block" onclick="report_menu_daily_collection();">
        <div class="card-body">
          <table style="">
            <tr>
              <td class="menu-item-icon"><i class="bi bi-currency-exchange"></i></td>
              <td>
                <h4>Daily Collection</h4>
                <div class="menu-item-sub-text">Checking/Tracking your daily collection</div>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="menu-separator"></div>
    <?php } ?>

    <div class="card menu-item-block" onclick="report_menu_attnd_register();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-fingerprint"></i></td>
            <td>
              <h4> Attendance </h4>
              <div class="menu-item-sub-text"> View Students Attendance Report </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="report_menu_cls_routine();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-clock-history"></i></td>
            <td>
              <h4> Class Routine </h4>
              <div class="menu-item-sub-text"> Whole routine, based on class and my routine </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="report_menu_my_subjects();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-file-text"></i></td>
            <td>
              <h4> My Subjects </h4>
              <div class="menu-item-sub-text"> All of my subjects that I teaches </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="report_menu_honorable_teachers();" >
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-file-person"></i></td>
            <td>
              <h4> Teachers & Staffs </h4>
              <div class="menu-item-sub-text"> Honourable Teachers & Staffs </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="report_menu_ebooks_x();" >
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-book-half"></i></td>
            <td>
              <h4> E-Library </h4>
              <div class="menu-item-sub-text"> E-books relevant me </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="report_menu_calendar();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-calendar-check"></i></td>
            <td>
              <h4> Our Academic Calendar</h4>
              <div class="menu-item-sub-text"> Schedule / Events of our institutions including holidays, exam schedule
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="report_menu_notices();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-square-fill"></i></td>
            <td>
              <h4> Notices </h4>
              <div class="menu-item-sub-text"> All of notices relevant me </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="report_menu_notification();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-chat-right-fill"></i></td>
            <td>
              <h4> Notifications </h4>
              <div class="menu-item-sub-text"> My notifications </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <!-- **************************************************************************************
    **************************************************************************************
    **************************************************************************************
    **************************************************************************************
    **************************************************************************************
    **************************************************************************************
    ************************************************************************************** -->

    <div class="card menu-item-block" onclick="lnk30();" hidden>
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-door-open-fill"></i></td>
            <td>
              <h4>Tracking Student</h4>
              <div class="menu-item-text">Tracking 10th Grade students daily performance</div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <!-- <div class="menu-separator"></div> -->


  </div>

</main>
<div style="height:52px;"></div>

<script>

  function go() {
    var cls = document.getElementById("classname").value;
    var sec = document.getElementById("sectionname").value;
    var sub = document.getElementById("subject").value;
    var assess = document.getElementById("assessment").value;
    var exam = document.getElementById("exam").value;
    let tail = '?exam=' + exam + '&cls=' + cls + '&sec=' + sec + '&sub=' + sub + '&assess=' + assess;
    if (cls == 'Six' || cls == 'Seven') {
      window.location.href = "markpibi.php" + tail;
    } else {
      window.location.href = "markentry.php" + tail;
    }
  }

</script>


<script>
  function lnk3() { window.location.href = "classsection.php"; }
  function lnk30() { window.location.href = "trackreport.php"; }
</script>


<script>
  function fetchsection() {
    var cls = document.getElementById("classname").value;

    var infor = "user=<?php echo $rootuser; ?>&cls=" + cls;
    $("#sectionblock").html("");

    $.ajax({
      type: "POST",
      url: "fetchsection.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#sectionblock').html('<span class=""><center>Fetching Section Name....</center></span>');
      },
      success: function (html) {
        $("#sectionblock").html(html);
      }
    });
  }
</script>

<script>
  function fetchsubject() {
    var cls = document.getElementById("classname").value;
    var sec = document.getElementById("sectionname").value;

    var infor = "sccode=<?php echo $sccode; ?>&cls=" + cls + "&sec=" + sec;
    $("#subblock").html("");

    $.ajax({
      type: "POST",
      url: "fetchsubject.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#subblock').html('<span class="">Retriving Subjects...</span>');
      },
      success: function (html) {
        $("#subblock").html(html);
      }
    });
  }
</script>