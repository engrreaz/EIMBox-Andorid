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
              <div class="menu-icon"><i class="bi bi-chat-right-text-fill"></i></div>
              <div class="menu-text"> SMS Manager </div>
            </td>
          </tr>
        </table>
      </div>
    </div>



    <div class="card menu-item-block" onclick="sms_manager_send();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-send-fill"></i></td>
            <td>
              <h4> Send Message </h4>
              <div class="menu-item-sub-text"> Send SMS now to audiance you like </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="sms_manager_campaign();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-vr"></i></td>
            <td>
              <h4> Campaign </h4>
              <div class="menu-item-sub-text"> SMS campaign on sending messages </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="sms_manager_history();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-clock-history"></i></td>
            <td>
              <h4> SMS History </h4>
              <div class="menu-item-sub-text"> SMS history </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="sms_manager_templetes();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-file-post-fill"></i></td>
            <td>
              <h4> Templetes </h4>
              <div class="menu-item-sub-text"> SMS templete for rapid compose a message
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>
   



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