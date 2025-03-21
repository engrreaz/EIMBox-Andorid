<?php
include 'inc.php';
?>

<main>
  <div class="container-fluidx">
    <div class="card text-left" style="background:var(--dark); color:var(--lighter);" onclick="gox()">

      <div class="card-body page-top-box">
        <div class="menu-icon"><i class="bi bi-pencil-fill"></i></div>
        <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
          Marks Entry
        </div>
        <div class="roll-no text-center">
          To start your entry fill out the form below
        </div>
      </div>
    </div>

    <div class="card" style="background:var(--lighter); color:var(--darker);">
      <div class="card-body">
        <div class="form-group">
          <label class="text-small" for="">Examination</label>
          <select class="form-control  " id="exam">
            <?php
            $exn = 'Annual';
            $selex = '';
            $sql0 = "SELECT * FROM examlist where sccode='$sccode' and sessionyear like '%$sy%'  order by id";

            $result0vf = $conn->query($sql0);
            if ($result0vf->num_rows > 0) {
              while ($row0 = $result0vf->fetch_assoc()) {
                $exname = $exdisp = $row0["examtitle"];

                // $exdisp = $row0["examdisplayname"];
                echo $exname . $exdisp;
                if ($exname == $exn) {
                  $selex = 'selected';
                }
                echo '<option value="' . $exname . '" ' . $selex . '>' . $exdisp . '</option>';
              }
            } ?>


          </select>
        </div>


        <div class="form-group">
          <label class="text-small" for="">Classes</label>
          <select class="form-control" id="classname" onchange="fetchsection();">
            <option></option>
            <?php
            $sql0 = "SELECT areaname as aname FROM areas where sessionyear LIKE '%$sy%' and user='$rootuser'  group by areaname order by idno";

            $result0 = $conn->query($sql0);
            if ($result0->num_rows > 0) {
              while ($row0 = $result0->fetch_assoc()) {
                $aname = $row0["aname"];
                echo '<option value="' . $aname . '">' . $aname . '</option>';
              }
            } ?>
          </select>
        </div>



        <div class="" id="sectionblock">
          <div class="form-group">
            <label class="text-small" for="">Section/Group</label>

            <select class="form-control " id="sectionname" onchange="fetchsubject();">
              <option></option>
              <?php
              $sql0 = "SELECT subarea as sec FROM areas where sessionyear='$sy' and user='$rootuser' and areaname='$cls' group by areaname order by idno";
              $result0 = $conn->query($sql0);
              if ($result0->num_rows > 0) {
                while ($row0 = $result0->fetch_assoc()) {
                  $sec = $row0["sec"];
                  echo '<option value="' . $sec . '">' . $sec . '</option>';
                }
              } ?>
            </select>
          </div>

        </div>

        <div class="" id="subblock">
          <div class="form-group">
            <label class="text-small" for="">My Subjects*</label>

            <select class="form-control " id="subject">
              <option></option>
              <?php

              if ($userlevel == 'Administrator' || $userlevel == 'Super Administrator') {
                $sql0 = "SELECT subject FROM subsetup where sccode='$sccode' and classname='$cls' and sectionname='$sec' and sessionyear LIKE '%$sy%'  order by subject";

              } else {
                $sql0 = "SELECT subject FROM subsetup where sccode='$sccode' and classname='$cls' and sectionname='$sec' and sessionyear LIKE '%$sy%' and tid='$userid' order by subject";
              }

              $result0 = $conn->query($sql0);
              if ($result0->num_rows > 0) {
                while ($row0 = $result0->fetch_assoc()) {
                  $scode = $row0["subject"];

                  $sql00 = "SELECT subject FROM subjects where subcode='$scode' and sccategory='$sctype' ";
                  echo $sql00;
                  $result00 = $conn->query($sql00);
                  if ($result00->num_rows > 0) {
                    while ($row00 = $result00->fetch_assoc()) {
                      $sname = $row00["subject"];
                    }
                  }
                  echo '<option value="' . $scode . '">' . $sname . '</option>';
                }
              } ?>
            </select>

          </div>
        </div>

        <div class="card-bodyx" hidden>
          <div class="form-group">
            <select class="form-control sele" id="assessment">
              <option value="Continious Assessment">Continious Assessment (PI)</option>
              <option value="Total Assessment" selected>Total Assessment (PI)</option>
              <option value="Behavioural Assessment">Behavioural Assessment (BI)</option>
            </select>
          </div>
          <label class="lblx" for="">Examination</label>
        </div>

        <div style="height:8px;"></div>
        <div class="">
          <button class="btn btn-primary text-white" onclick="gob();">Proceed to Marks Entry</button>


          <button class="btn btn-danger" style="margin:0 0 10px 0; color:white;" onclick="gox();" hidden>Proceed with
            Block Entry</button>

          <button class="btn btn-danger" style="margin:0 0 10px 0; color:white;" onclick="print();"
            hidden>Print</button>
          <div style="height:80px;">-</div>
        </div>
      </div>
    </div>
</main>
<div style="height:52px;"></div>



<script>
  // document.getElementById("cnt").innerHTML = "";

  function gob() {

    var cls = document.getElementById("classname").value;
    var sec = document.getElementById("sectionname").value;
    var sub = document.getElementById("subject").value;
    var assess = 'n/a';// document.getElementById("assessment").value;
    var exam = document.getElementById("exam").value;
    let tail = '?exam=' + exam + '&cls=' + cls + '&sec=' + sec + '&sub=' + sub + '&assess=' + assess;
    // // if(cls=='Six'|| cls == 'Seven'){
    // // window.location.href="markpibi.php" + tail; 
    // // } else {
    window.location.href = "markentry.php" + tail;
    // }
  }

</script>


<script>

  function gox() {
    var cls = document.getElementById("classname").value;
    var sec = document.getElementById("sectionname").value;
    var sub = document.getElementById("subject").value;
    var assess = 'n/a';//document.getElementById("assessment").value;
    var exam = document.getElementById("exam").value;
    let tail = '?exam=' + exam + '&cls=' + cls + '&sec=' + sec + '&sub=' + sub + '&assess=' + assess + "&block=1";
    if (cls == 'Six' || cls == 'Seven') {
      window.location.href = "markpibi.php" + tail;
    }
  }  
</script>


<script>
  function fetchsection() {
    var cls = document.getElementById("classname").value;

    var infor = "user=<?php echo $rootuser; ?>&cls=" + cls;
    $("#sectionblock").html("");

    $.ajax({
      type: "POST",
      url: "backend/fetch-section-mark.php",
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

    var infor = "sccode=<?php echo $sccode; ?>&tid=<?php echo $userid; ?>&cls=" + cls + "&sec=" + sec; //alert(infor);
    $("#subblock").html("");

    $.ajax({
      type: "POST",
      url: "backend/fetch-subject-marks.php",
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

  function print() {
    window.print();
  }
</script>



</body>