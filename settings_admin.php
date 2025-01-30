<?php
include 'inc.php';
$count_class = count($cteacher_data);
// $classname = $_GET['cls'];
// $sectionname = $_GET['sec'];
?>


<main>
  <div class="container-fluids">
    <div class="card " style="background:var(--dark); color:var(--lighter);">
      <div class="card-body">
        <table width="100%" style="color:white;">
          <tr>
            <td>
              <div class="menu-icon"><i class="bi bi-gear"></i></div>
              <div class="menu-text"> Settings </div>
            </td>
          </tr>
        </table>
      </div>
    </div>



    <div class="card menu-item-block" onclick="settings_admin_ins_info();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-bank2"></i></td>
            <td>
              <h4> Institution Information </h4>
              <div class="menu-item-sub-text"> Update Institution's Information </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="settings_admin_st_id_generate();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-bank2"></i></td>
            <td>
              <h4> Generate Student's ID </h4>
              <div class="menu-item-sub-text"> Generate student's ID for emergency profile creating </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="settings_admin_st_id_payment_indivisula();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-coin"></i></td>
            <td>
              <h4> Payment Setup (Indivisual) </h4>
              <div class="menu-item-sub-text"> Change Payment Setup for indivisual Student </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="settings_admin_bind_teacher_subject();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-book-half"></i></td>
            <td>
              <h4> Subjects / Teachers Binding </h4>
              <div class="menu-item-sub-text"> Bind Teachers with their related subject according to class/section
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>
    
    <div class="card menu-item-block" onclick="settings_admin_class_routine_setup();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-square-half"></i></td>
            <td>
              <h4> Setup Class Routine </h4>
              <div class="menu-item-sub-text"> Setup you class routine according to period, day with teachers binding
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="settings_admin_user_manager();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-person-lock"></i></td>
            <td>
              <h4> User Manager </h4>
              <div class="menu-item-sub-text"> Manage users </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>



    <?php if ($usr == 'engrreaz@gmail.com') { ?>

      <a class="btn btn-dark m-2" href="settingssubject.php">Subject Setup</a>
      <a class="btn btn-dark m-2" href="settingsteacher.php">Add/Edit Teacher</a>
      <a class="btn btn-dark m-2" href="settingsclass.php">Add/Edit CLS-SEC</a>

      <!-- <a class="btn btn-dark m-2" href="clsroutine-setup.php">Class Routine Setup</a> -->
      <a class="btn btn-dark m-2" href="tools_allsubjects.php">Subject list Class wise</a>
      <!-- <a class="btn btn-dark m-2" href="globalsetup.php">Global Setup XXX</a> -->


      <a class="btn btn-dark m-2" href="cashbookview.php">Cash Book View IN-EX</a>
      <a class="btn btn-dark m-2" href="promotion.php">Promotion</a>
      <a class="btn btn-dark m-2" href="studentadmission.php">Admission</a>
      <!-- <a class="btn btn-dark m-2" href="markentryselect.php">Mark Entry Selection</a> -->
      <a class="btn btn-dark m-2" href="grpview.php">Group NEW</a>
      <a class="btn btn-dark m-2" href="transcriptselect.php">Transcript</a>
      <a class="btn btn-white m-2" href="dailycollection.php">Daily Collection</a>
      <a class="btn btn-dark m-2" href="trackreport.php">Track Student</a>



    <?php } ?>
    <div class="d-block">
      ...............
    </div>




    <!-- 
      ***************************************************************
      ***************************************************************
      ***************************************************************
      ***************************************************************
      ***************************************************************
      *************************************************************** -->








  </div>

</main>
<div style="height:52px;"></div>
<footer>
  <!-- place footer here -->
</footer>
<!-- Bootstrap JavaScript Libraries -->

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
  function lnk1() { window.location.href = "grpview.php"; }
  function lnk2() { window.location.href = "pibisheet.php"; }
  function lnk3() { window.location.href = "markentryselect.php"; }
  function lnk4() { window.location.href = "transcriptselect.php"; }
  function lnk5() { window.location.href = "userlist.php"; }
  function lnk6() { window.location.href = "classes.php"; }
  function lnk7() { window.location.href = "transcriptselect.php"; }
  function lnk8() { window.location.href = "transcriptselect.php"; }
  function lnk40() { window.location.href = "noticemanager.php"; }
  function lnk42() { window.location.href = "calendar.php"; }
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