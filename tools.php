<?php
include 'inc.php';
// $classname = $_GET['cls'];
// $sectionname = $_GET['sec'];
?>

<style>
  .pic {
    width: 45px;
    height: 45px;
    padding: 1px;
    border-radius: 50%;
    border: 1px solid var(--dark);
    margin: 5px;
  }

  .a {
    font-size: 18px;
    font-weight: 700;
    font-style: normal;
    line-height: 22px;
    color: var(--dark);
  }

  .b {
    font-size: 16px;
    font-weight: 600;
    font-style: normal;
    line-height: 22px;
  }

  .c {
    font-size: 11px;
    font-weight: 400;
    font-style: italic;
    line-height: 16px;
  }

  h4 {
    font-size: 18px;
    color: var(--darker);
    line-height: 12px;
    font-weight: 700;
  }

  small {
    font-size: 10px;
    color: var(--dark);
    line-height: 10px;
  }
</style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container-fluids">
      <div class="card text-left" style="background:var(--dark); color:var(--lighter);"
        onclick="go(<?php echo $id; ?>)">

        <div class="card-body">
          <table width="100%" style="color:white;">
            <tr>
              <td>
                <div class="logoo"><i class="bi bi-ui-checks-grid"></i></div>
                <div
                  style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                  Modules
                </div>
              </td>
            </tr>


          </table>
        </div>
      </div>


      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk3();">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <table style="">
            <tr>
              <td style="width:50px;color:var(--dark);"><i class="material-icons">report</i></td>
              <td>
                <h4>Marks Entry</h4>
                <small>Entry Marks for the student of class SIX - TEN</small>
              </td>
            </tr>
          </table>
        </div>
      </div>


      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk1();">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <table style="">
            <tr>
              <td style="width:50px;color:var(--dark);"><i class="material-icons">group</i></td>
              <td>
                <h4>Group Management</h4>
                <small>Create/View Group for Curriculum 2023</small>
              </td>
            </tr>
          </table>
        </div>
      </div>



      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk2();">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <table style="">
            <tr>
              <td style="width:50px;color:var(--dark);"><i class="material-icons">receipt</i></td>
              <td>
                <h4>PI/BI Sheet</h4>
                <small>Create/View PI/BI Entry Sheet | Result Sheet</small>
              </td>
            </tr>
          </table>
        </div>
      </div>


      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk4();">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <table style="">
            <tr>
              <td style="width:50px;color:var(--dark);"><i class="material-icons">description</i></td>
              <td>
                <h4>Transcript</h4>
                <small>Process Transcript for Students</small>
              </td>
            </tr>
          </table>
        </div>
      </div>

      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk40();">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <table style="">
            <tr>
              <td style="width:50px;font-size:20px; color:var(--dark);"><i class="bi bi-megaphone-fill"></i></td>
              <td>
                <h4>Notice Manager</h4>
                <small>Manage your institute's notice for users</small>
              </td>
            </tr>
          </table>
        </div>
      </div>


      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk42();">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <table style="">
            <tr>
              <td style="width:50px;font-size:20px; color:var(--dark);"><i class="bi bi-megaphone-fill"></i></td>
              <td>
                <h4>Academic Calendar</h4>
                <small>Academic Calendar for this Institution</small>
              </td>
            </tr>
          </table>
        </div>
      </div>






    </div>

  </main>
  <div style="height:52px;"></div>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->

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



</body>