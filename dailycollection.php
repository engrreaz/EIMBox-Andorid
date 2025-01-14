<?php
include 'inc.php';
?>

<main>
  <div class="containerx-fluid">
    <div class="card page-top-box">
      <div class="card-body">
        <table width="100%" style="color:white;">
          <tr>
            <td>
              <div class="menu-icon"><i class="bi bi-currency-exchange"></i></div>
              <div class="menu-text"> Daily Collection </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="card page-info-box">
      <div class="card-body">
        <table width="100%" style="color:white;">
          <tr>
            <td>
              <div style="font-size:40px; font-weight:700; text-align:center;">
                <span style="font-size:12px; font-weight:500;">BDT</span> <span id="xxl"></span>
              </div>
              <div class="text-small text-center" style="color:var(--light);">Total Collection</div>
            </td>

          </tr>

        </table>
      </div>
    </div>
    <div style="height:8px;"></div>


    <?php
    $sl = 0;
    $sobar = 0;
    $mot = 0;
    $date1 = date('Y-01-01');
    $date2 = date('Y-12-31');
    $sql0 = "SELECT prdate, sum(amount) as taka FROM stpr where sccode='$sccode' and prdate between '$date1' and '$date2' group by prdate order by prdate desc  ";
    //echo $sql0;
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
      while ($row0 = $result0->fetch_assoc()) {
        $taka = $row0["taka"];
        $prdate = $row0["prdate"];
        $mot += $taka;
        // $ico = 'iimg/' . strtolower(substr($sec,0,5)) . '.png';
        // $lnk = "cls=" . $cls . '&sec=' . $sec;
    

        // $month = date('m');
        // $sql0 = "SELECT userid FROM usersapp where email='$by' and sccode='$sccode'";
        // $result01x = $conn->query($sql0); if ($result01x->num_rows > 0) {while($row0 = $result01x->fetch_assoc()) { $tid=$row0["userid"]; }}
    
        // $sql0 = "SELECT * FROM teacher where tid='$tid' and sccode='$sccode' ";
        // $result01xg = $conn->query($sql0); if ($result01xg->num_rows > 0) {while($row0 = $result01xg->fetch_assoc()) { $tname=$row0["tname"]; }}
    
        // $sql0 = "SELECT * FROM areas where classteacher='$tid' and user='$rootuser' ";
        // $result01xg = $conn->query($sql0); if ($result01xg->num_rows > 0) {while($row0 = $result01xg->fetch_assoc()) 
        // { $ccc=$row0["areaname"];  $sss=$row0["subarea"]; }} else { $ccc='';  $sss=''; }
    
        // $sql0 = "SELECT sum(amount) as taka FROM stpr where sccode='$sccode' group by prdate order by prdate desc ";
        // $result01xgr = $conn->query($sql0); if ($result01xgr->num_rows > 0) {while($row0 = $result01xgr->fetch_assoc()) { $paytaka=$row0["paytaka"]; }}
    
        // $mottaka = $mottaka - $paytaka;
        // $sobar += $mottaka;
    
        ?>
        <div class="card " style="background:var(--lighter); color:seagreen; border-radius:0;"
          onclick="gog('<?php echo $prdate; ?>')">
          <img class="card-img-top" alt="">
          <div class="card-body">
            <div style="font-size:15px; font-weight:700; float:right;">
              <span style="font-size:12px; font-weight:500;">BDT</span> <?php echo number_format($taka, 2, ".", ","); ?>
            </div>
            <div style="font-size:14px; font-weight:600; color:seagreen; font-style:normal;">
              <?php echo date('d-m-Y', strtotime($prdate)); ?>
            </div>
          </div>
        </div>
        <div id="dateclass<?php echo $prdate; ?>"></div>
        <div style="height:2px;"></div>
        <?php $sl++;
      }
    } ?>


  </div>

</main>

<div style="height:52px;"></div>


<script>
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