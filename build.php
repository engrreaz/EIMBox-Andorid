<?php
include 'inc.php';
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="css.css?v=a">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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

    small {
      font-size: 10px;
      color: var(--dark);
      line-height: 10px;
    }
  </style>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script>



    function lnk1() { window.location.href = "tools_allsubjects.php"; }
    function lnk2() { window.location.href = "pibiprocess2.php"; }
    function lnk3() { window.location.href = "settings.php"; }
    function lnk4() { window.location.href = "transcriptselect.php"; }
    function lnk5() { window.location.href = "userlist.php"; }
    function lnk6() { window.location.href = "classes.php"; }
    function lnk7() { window.location.href = "transcriptselect.php"; }
    function lnk8() { window.location.href = "transcriptselect.php"; }
    function lnk30() { window.location.href = "accountservices.php"; }
    function lnk31() { window.location.href = "accountsecurity.php"; }
    function lnk32() { window.location.href = "globalsetup.php"; }


  </script>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container-fluidx">

      <div class="card text-left" style="background:var(--dark); color:var(--lighter);" onclick="go(<?php echo $id; ?>)">

        <div class="card-body">
          <table width="100%" style="color:white;">
            <tr>
              <td>
                <div class="logoo"><i class="bi bi-x-diamond-fill"></i></div>
                <div
                  style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                  cPanel Tools
                </div>
              </td>
            </tr>


          </table>
        </div>
      </div>



      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk3();">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <div class="row">
            <div class="col-1 d-flex">
            <i class="bi bi-alt menu-icon text-center"></i>
            </div>
            <div class="col-11">
              <h4 class="p-0 m-0 menu-text">Administrative Setup</h4>
              <div class="menu-sub-title"><small>Class & Sections, Subjects, Teachers, Users etc.</small></div>

            </div>
          </div>



        </div>
      </div>


      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk32();">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <table style="">
            <tr>
              <td style="width:50px;color:var(--dark);"><i class="material-icons">group</i></td>
              <td>
                <h4>Global Setup</h4>
                <small>All kinds of Academic & Managerial setup here</small>
              </td>
            </tr>
          </table>
        </div>
      </div>


      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk30();">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <table style="">
            <tr>
              <td style="width:50px;color:var(--dark);"><i class="bi bi-door-open-fill"></i></td>
              <td>
                <h4>Management</h4>
                <small>Services for managing class, user, student, exam and so so...</small>
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
                <h4>Subjects List</h4>
                <small>Class & Sections list to view subject, marks, assessent entry</small>
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
              <td style="width:50px;color:var(--dark);"><i class="material-icons">bug_report</i></td>
              <td>
                <h4>Mark Entry Scanner</h4>
                <small>Check, analysis and scanning marks & assessment</small>
              </td>
            </tr>
          </table>
        </div>
      </div>




      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk31();">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <table style="">
            <tr>
              <td style="width:50px;color:var(--dark);"><i class="material-icons">key</i></td>
              <td>
                <h4>Security</h4>
                <small>My Password, Token, SHA1-1 Record, Security etc.</small>
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








</body>

</html>