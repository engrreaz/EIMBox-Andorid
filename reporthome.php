<?php
include 'inc.php';
?>

<main>
  <div class="container-fluidx">

    <div class="card text-left" style="background:var(--dark); color:var(--lighter);" >
      <div class="card-body">
        <table width="100%" style="color:white;">
          <tr>
            <td>
              <div class="menu-icon"><i class="bi bi-file-earmark-fill"></i></div>
              <div class="menu-text"> Reports </div>
            </td>
          </tr>
        </table>
      </div>
    </div>



    <div class="card menu-item-block" onclick="lnk3();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-people-fill"></i></td>
            <td>
              <h4>Student's List</h4>
              <div class="menu-item-sub-text"> All of students list accourding to class/section </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="lnk3();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-diagram-2-fill"></i></td>
            <td>
              <h4>My Class</h4>
              <div class="menu-item-sub-text"> Student's Report <br>(Attendance, Result, Dues, Co-Curricular Activities) </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="lnk3();">
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

    <div class="card menu-item-block" onclick="lnk3();">
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

    <div class="card menu-item-block" onclick="lnk3();">
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

    <div class="card menu-item-block" onclick="lnk3();">
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

    <div class="card menu-item-block" onclick="lnk3();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-book-half"></i></td>
            <td>
              <h4> E-Books </h4>
              <div class="menu-item-sub-text"> E-books relevant me </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="lnk3();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-calendar-check"></i></td>
            <td>
              <h4> Our Academic Calendar</h4>
              <div class="menu-item-sub-text"> Schedule / Events of our institutions including holidays, exam schedule </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="lnk3();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-bell-fill"></i></td>
            <td>
              <h4> Notices </h4>
              <div class="menu-item-sub-text"> All of notices relevant me </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="lnk3();">
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

    <div class="card menu-item-block" onclick="lnk30();">
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

    <div class="menu-separator"></div>

    <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk37();">
      <img class="card-img-top" alt="">
      <div class="card-body">
        <table style="">
          <tr>
            <td style="width:50px;color:var(--dark);"><i class="bi bi-door-open-fill"></i></td>
            <td>
              <h4>Daily Collection</h4>
              <small>Checking/Tracking your daily collection</small>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="menu-separator"></div>
    <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="academic_calendar();">
      <img class="card-img-top" alt="">
      <div class="card-body">
        <table style="">
          <tr>
            <td style="width:50px;font-size:20px; color:var(--dark);"><i class="bi bi-megaphone-fill"></i></td>
            <td>
              <h4> Academic Calendar </h4>
              <small> Academic Calendar for this Institution (Events and Holidays) </small>
            </td>
          </tr>
        </table>
      </div>
    </div>


    <div class="menu-separator"></div>






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
  document.getElementById("cnt").innerHTML = "<?php echo $cnt; ?>";

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

  function lnk3() { window.location.href = "classsection.php"; }
  function lnk30() { window.location.href = "trackreport.php"; }
  function lnk37() { window.location.href = "dailycollection.php"; }



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