<?php
include 'inc.php';
include 'datam/datam-teacher.php';


?>

<main>
  <div class="containerx-fluidx">
    <div class="card text-left">

      <div class="card-body page-top-box" style="border-radius:0;">
        <table width="100%">
          <tr>
            <td colspan="2">
              <div class="menu-icon"><i class="bi bi-file-person"></i></div>
              <div class="menu-text"> Honourable Teachers & Staffs </div>
            </td>
          </tr>
        </table>
      </div>
    </div>



    <!-- *************************************************** -->


    <div id="clssecblock" style="display:<?php echo $ddss; ?>">

      <div class="card text-left">
        <div class="card-body page-info-box" style="border-radius:0;">
          <table width="100%" style="color:white;">
            <tr>

              <td style="text-align:center;">
                <div style="text-align:center;font-size:30px; font-weight:700; line-height:20px;" id="cnt"></div>
                <div style="text-align:center;font-size:12px; font-weight:400; font-style:italic; line-height:24px;">
                  Total </div>
              </td>
            </tr>

          </table>
        </div>
      </div>


      <?php
      $cnt = 0;
      $status = 1;
      foreach ($datam_teacher_profile as $teacher) {
        $tid = $teacher["tid"];

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
        <div class="card  mb-1" style="background:var(<?php echo $bgc; ?>); color:var(--darker);"
          onclick="go(<?php echo $stid; ?>)" id="block<?php echo $stid; ?>" <?php echo $dsbl; ?>>
          <div class="card-body">
            <div class="row">
              <div class="col-3">
                <img src="<?php echo $pth; ?>" class="st-pic-normal" />
              </div>
              <div class="col-9">
                <div class="st-id">ID : <b><?php echo $tid; ?></b></div>
                <div class="stname-eng text-dark"><?php echo $teacher['tname']; ?></div>
                <div class="stname-ben text-primary"><?php echo $teacher['tnameb']; ?></div>
              </div>
            </div>





          </div>
        </div>


        <?php
        $cnt++;
      }


      ?>
      <script>
        document.getElementById("cnt").innerHTML = "<?php echo $cnt; ?>";
      </script>

    </div>

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
</script>