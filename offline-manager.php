<?php
include 'inc.php';
include 'datam/datam-stprofile.php';


if (isset($_GET['cls']) && isset($_GET['sec'])) {
  $classname = $_GET['cls'];
  $sectionname = $_GET['sec'];
  $cteacher_data[] = ['cteachercls' => $classname, 'cteachersec' => $sectionname];
}

$data_store = 0;
if (isset($_GET['store'])) {
  $data_store = $_GET['store'];
}
$data_sync = 0;
if (isset($_GET['sync'])) {
  $data_sync = $_GET['sync'];
}

// var_dump($cteacher_data);
$count_class = count($cteacher_data);
$totaldues = 0;

$collection_by = -1;
$collection_ind = array_search('Collection', array_column($ins_all_settings, 'setting_title'));
if ($collection_ind != '' || $collection_ind != null) {
  $collection_by = $ins_all_settings[$collection_ind]['settings_value'];
}


if (strpos($collection_by, $userlevel) != null) {
  $collection_permission = 1;
} else {
  $collection_permission = 0;
}


$profile_entry = '';
$profile_ind = array_search('Profile Entry', array_column($ins_all_settings, 'setting_title'));
if ($profile_ind != '' || $profile_ind != null) {
  $profile_entry = $ins_all_settings[$profile_ind]['settings_value'];
}
if (strpos($profile_entry, $userlevel) != null) {
  $profile_entry_permission = 1;
} else {
  $profile_entry_permission = 0;
}




?>


<script>
  function epos() {
    let lastpr = document.getElementById("mylastpr").value;
    infor = "prno=" + lastpr;
    $("#eposlink").html("");

    $.ajax({
      type: "POST",
      url: "getprinfo.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $("#eposlink").html('.....');
      },
      success: function (html) {
        $("#eposlink").html(html);
      }
    });
  }


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
    //window.location.href="stfinancedetails.php?id=" + id; 
    // window.location.href="stfinancedetails.php?id=" + id + "&edit=1";
    window.location.href = "stfinancedetails.php?id=" + id;
  }
  function pr(id) {
    let ln = "stprdetails.php?id=" + id;
    alert(ln);
    window.location.href = ln;
  }  
</script>




<main>
  <div class="containerx-fluid">
    <div class="card text-left">
      <div class="card-body page-top-box" style="border-radius:0;">
        <table width="100%" style="color:white;">
          <tr>
            <td colspan="2">
              <div class="menu-icon"> <i class="bi bi-wifi-off"></i> </div>
              <div class="menu-text"> Offline Data Tool </div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <?php if ($count_class > 1) { ?>
      <div class="d-flex">
        <?php
        for ($h = 0; $h < $count_class; $h++) {
          $classname = $cteacher_data[$h]['cteachercls'];
          $sectionname = $cteacher_data[$h]['cteachersec'];



          if ($h == 0) {
            $btn = 'primary';
          } else {
            $btn = 'dark';
          }

          ?>
          <button id="btn<?php echo $h; ?>" class="btn btn-<?php echo $btn; ?> flex-fill " style="border-radius:0;"
            onclick="myclass('<?php echo $h; ?>', '<?php echo $count_class; ?>' );">
            <?php echo $classname . ' <i class="bi bi-arrow-right"></i>  ' . $sectionname; ?>
          </button>
          <?php
        }
        ?>
      </div>
    <?php } ?>

    <!-- *************************************************** -->
    <?php for ($h2 = 0; $h2 < $count_class; $h2++) {
      $classname = $cteacher_data[$h2]['cteachercls'];
      $sectionname = $cteacher_data[$h2]['cteachersec'];
      if ($h2 == 0) {
        $ddss = 'block';

      } else {
        $ddss = 'none';

      }


      $datamg = array();
      $sql00 = "SELECT * FROM stattnd where  (adate='$td' and sccode='$sccode' and sessionyear LIKE '%$sy%'  and classname = '$classname' and sectionname='$sectionname') or yn=100 order by rollno";
      // echo $sql00 ;
      $result00gt = $conn->query($sql00);
      if ($result00gt->num_rows > 0) {
        while ($row00 = $result00gt->fetch_assoc()) {
          $datamg[] = $row00;
        }
      }


      ?>
      <div id="clssecblock<?php echo $h2; ?>" style="display:<?php echo $ddss; ?>">
        <div class="card text-left">
          <div class="card-body page-info-box" style="border-radius:0;">
            <table width="100%">
              <tr>
                <td>
                  <div style="font-size:16px; font-weight:700; line-height:15px;">
                    <?php echo strtoupper($classname); ?>
                    <i class="bi bi-circle-fill ms-1 me-1"></i>
                    <?php echo strtoupper($sectionname); ?>
                  </div>
                  <div style="font-size:12px; color:var(--dark); font-weight:400; font-style:italic; line-height:18px;">
                    Name of Class &
                    Section</div>
                </td>
                <td style="text-align:right;">
                  <div style="font-size:30px; font-weight:700; line-height:20px;" id="cnt<?php echo $h2; ?>">...</div>
                  <div style="font-size:12px;  color:var(--dark); font-weight:400; font-style:italic; line-height:24px;">
                    No. of Students</div>
                </td>
              </tr>
            </table>
          </div>



          <div class="card-body page-top-box bg-dark" style="border-radius:0; ">

            <div class="row">

              <div class="col">
                <button class="btn btn-primary btn-block" onclick="data_get();">
                  <i class="bi bi-database"></i>
                  <div class="text-small">Get Data</div>
                </button>
              </div>

             

              <div class="col">
                <button class="btn btn-success btn-block" onclick="data_sync();">
                  <i class="bi bi-cloud-arrow-up-fill"></i>
                  <div class="text-small">Sync Data</div>
                </button>
              </div>


              <div class="col">
                <button class="btn btn-danger btn-block" onclick="data_store();">
                  <i class="bi bi-cloud-arrow-down-fill"></i>
                  <div class="text-small">Reset List</div>
                </button>
              </div>



            </div>
          </div>
        </div>
        <!-- <div style="height:8px;"></div> -->

        <div id="jsondatablock" hidden></div>
        <!-- <div style="height:8px;"></div> -->


        <?php
        $month = date('m');
        $data_dues = array();
        $sql0 = "SELECT stid, sum(dues) as dues, sum(payableamt) as paya, sum(paid) as paid FROM stfinance where sessionyear LIKE '%$sy%' and sccode='$sccode' and classname='$classname' and sectionname='$sectionname' and month<='$month' group by stid ";
        $result01x = $conn->query($sql0);
        if ($result01x->num_rows > 0) {
          while ($row0 = $result01x->fetch_assoc()) {
            $data_dues[] = $row0;
          }
        }

        $cnt = 0;
        $cntamt = 0;
        $sql0 = "SELECT * FROM sessioninfo where sessionyear LIKE '%$sy%'  and sccode='$sccode' and classname='$classname' and sectionname = '$sectionname' order by rollno";
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


            $st_arr = array_search($stid, array_column($datam_st_profile, 'stid'));
            $neng = $datam_st_profile[$st_arr]["stnameeng"];
            $nben = $datam_st_profile[$st_arr]["stnameben"];
            $vill = $datam_st_profile[$st_arr]["previll"];

            if ($totaldues < 100) {
              $bgc = '--var(dark)';
            }
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
      


            $key = array_search($stid, array_column($datamg, 'stid'));
            if ($key != NULL || $key != '') {
              $status = $datamg[$key]['yn'];
            } else {
              $status = 0;
            }

            if ($status == 0) {
              $kkk = 'gray';
            } else {
              $kkk = 'forestgreen';
            }












            $indues = array_search($stid, array_column($data_dues, 'stid'));
            $totaldues = $data_dues[$indues]["dues"];
            $tpaya = $data_dues[$indues]["paya"];
            $tpaid = $data_dues[$indues]["paid"];

            if ($totaldues < 100) {
              $bgc = 'white';
              $btn = 'success';
            } else {
              $btn = 'warning';
            }
            ?>
            <div class="card text-center" style="background:var(<?php echo $bgc; ?>); color:var(--darker);border-radius:0;"
              id="block<?php echo $cnt + 1; ?>" <?php echo $dsbl; ?>>
              <div class="card-body" style="border-radius:0;">
                <table width="100%">
                  <tr>
                    <td style="width:30px;">
                      <span style="font-size:24px; font-weight:700;"
                        id="rollno<?php echo $cnt + 1; ?>"><?php echo $rollno; ?></span>
                    </td>
                    <td style="text-align:left; padding-left:5px;">
                      <div class="stname-eng" id="stname<?php echo $cnt + 1; ?>"><?php echo $neng; ?></div>
                      <div class="stname-ben text-dark"><?php echo $nben; ?></div>
                      <div class="c" style="font-weight:500; font-style:normal; color:gray;">ID #
                        <?php echo $stid . ' [<b>' . $vill . '</b>]'; ?>
                      </div>
                      <div id="stid<?php echo $cnt + 1; ?>" hidden><?php echo $stid; ?></div>

                    </td>
                    <td rowspan="2" style="text-align:right; font-size:20px; font-weight:600; vertical-align:top;">
                      <?php
                      $photo_path = $BASE_PATH_URL . 'students/' . $stid . ".jpg";
                      if (!file_exists($photo_path)) {
                        $photo_path = "https://eimbox.com/teacher/no-img.jpg";
                      } else {
                        $photo_path = $BASE_PATH_URL_FILE . 'students/' . $stid . ".jpg";
                      }
                      ?>
                      <img src="<?php echo $photo_path; ?>" class="st-pic-small" />

                      <br>
                      <span id="on<?php echo $cnt + 1; ?>" class=" " style="font-size: 14px; color:<?php echo $kkk; ?>;">
                        <i class="bi bi-fingerprint "></i>
                      </span>
                      <span id="off<?php echo $cnt + 1; ?>" class=" " style="font-size: 14px;">
                        <i class="bi bi-wifi-off "></i>
                      </span>




                    </td>
                  </tr>


                </table>


              </div>
            </div>


            <div style="height:3px;"></div>
            <?php
            $cnt++;
            $cntamt = $cntamt + $totaldues;
          }
        }

        ?>
        <script>
          document.getElementById("cnt" + <?php echo $h2; ?>).innerHTML = "<?php echo $cnt; ?>";
          // document.getElementById("cntamt" + <?php echo $h2; ?>).innerHTML = "<?php echo number_format($cntamt, 2, ".", ","); ?>";
        </script>

      </div>
      <?php

    }
    ?>
    <!-- *********************************************************** -->


  </div>

</main>
<div style="height:52px;"></div>
<footer>
  <!-- place footer here -->
</footer>
<!-- Bootstrap JavaScript Libraries -->


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

<script>
  function data_get() {
    window.location.href = 'offline-manager.php';
  }
  function data_store() {
    window.location.href = '?store=1';
  }

  function data_sync() {
    window.location.href = '?sync=1';
  }
</script>

<script>

  let email = '<?php echo $usr; ?>';
  email = email.split('@')[0];
  var cls = '<?php echo $cteacher_data[0]['cteachercls']; ?>';
  var sec = '<?php echo $cteacher_data[0]['cteachersec']; ?>';

  var datam = {
    [email]: {
      classname: cls,
      sectionname: sec,
      stcount: <?php echo $cnt; ?>,
      attnddate: '<?php echo $td; ?>',
      lastsync: '<?php echo $cur; ?>',
      [cls]: {
        [sec]: {}

      }
    },
  };

  // document.getElementById("jsondatablock").innerHTML = JSON.stringify(datam);



  var full_str = '[';

  for (var i = 1; i <= <?php echo $cnt; ?>; i++) {
    var rollno = document.getElementById('rollno' + i).innerHTML;
    var stid = document.getElementById('stid' + i).innerHTML;
    var stname = document.getElementById('stname' + i).innerHTML;
    var coma = '';
    if (i != <?php echo $cnt; ?>) {
      coma = ', ';
    }

    var str = `{ "rollno": ${rollno} , "stid": ${stid} , "stname": "${stname}", "yn": 0 }${coma} `;
    // 
    //  var strstr = JSON.stringify(str);
    full_str += str;
    if (i == 55) {
      // alert(str);
      // alert(full_str);
    }
    // v
  }
  // full_str += `{"roll":100, "stid":1056432025, "stname":"Jacson Height"}`;
  /*
 
   var str = '';
   str += `{"roll":1, "stid":1056732025, "stname":"Jacson Height"},`;
   str += `{"roll":2, "stid":1056732026, "stname":"London Bridge"},`;
   str += `{"roll":3, "stid":1056732027, "stname":"Sydney Lodge"},`;
   str += `{"roll":4, "stid":1056732028, "stname":"Hawra Station"}`;
 */
  full_str += ']';
  // document.getElementById("jsondatablock").innerHTML = full_str;

  // full_str = JSON.stringify(full_str);
  var stx = JSON.parse(full_str);


  // document.getElementById("jsondatablock").innerHTML = JSON.stringify(datam);

  // var str_arr = JSON.parse(full_str);




  datam[email][cls][sec] = stx;
  // alert('Stringify' + stx);
  // document.getElementById("jsondatablock").innerHTML = JSON.stringify(datam);


  // লোকাল স্টোরেজে ডাটা সংরক্ষণ
  localStorage.setItem("webData", JSON.stringify(datam));

  if (window.Android && <?php echo $data_store; ?> == 1) {
    window.Android.saveToSharedPreferences("webData", JSON.stringify(datam));
    // alert('Action Taken');
  }

  // **********************************************************************
  // **********************************************************************
  // **********************************************************************
  // **********************************************************************
  // **********************************************************************
  // **********************************************************************
  let storedData = JSON.parse(localStorage.getItem("webData"));
  // alert(storedData ? `Saved Data: ${storedData.message} at ${storedData.timestamp}` : "No Data Found!");

  let storageData = {};
  for (let i = 0; i < localStorage.length; i++) {
    let key = localStorage.key(i);
    let value = localStorage.getItem(key);
    storageData[key] = value;
  }

  // Convert JSON object to string
  let jsonData = JSON.stringify(storageData);
  // document.getElementById("jsondatablock").innerHTML = jsonData;


  // if (window.Android) {
  storedData = window.Android.getFromSharedPreferences("webData");

  let jsonPata = JSON.parse(storedData);
  jsonData = JSON.stringify(jsonPata);
  // alert("Action" + cls + "/" + sec + "/" + jsonData);

  var stc = jsonPata[email]["stcount"];
  var tarikh = jsonPata[email]["attnddate"];


  var yy = ''; var datah = 'count=' + stc;
  for (var d = 0; d < stc; d++) {
    var k = d + 1;
    var stid = docuemnt.getElementById("stid" + k).innerHTML;

    var singa = JSON.stringify(jsonPata[email][cls][sec][d]["yn"]).replaceAll('"', '');;
    yy += singa;
    if (singa == 1) {
      document.getElementById('off' + k).style.color = "red";
    } else {
      document.getElementById('off' + k).style.color = "gray";
    }

    datah += '&stid' + d + "=" + stid + "&yn=" + singa;


  }



  // alert(yy);

  // alert('OK' + sing);

  // sing = JSON.parse(sing);
  // alert("POKE" + JSON.stringify(sing[0]));
  // }


  // if (window.Android && <?php echo $data_sync; ?> == 1) {
  if (<?php echo $data_sync; ?> == 1) {

    datah += "&cls=" + cls + "&sec=" + sec + "&adate=" + tarikh + '&eby=' + email;
    alert(datah);
  }

  // ***************************************************************************************
  // ***************************************************************************************
  // ***************************************************************************************
  // ***************************************************************************************
  // ***************************************************************************************
</script>