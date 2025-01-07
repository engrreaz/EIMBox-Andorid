<?php
include 'inc.php';
$td = '2024-01-01';
for ($j = 0; $j <= 365; $j++) {
  $trk = strtotime($td) + $j * 3600 * 24;
  $trk = date('Y-m-d', $trk);
  $bar = date('l', strtotime($trk));


  // $query3x ="insert into calendar values(NULL, '$trk', '$bar', 0, NULL, NULL, 0,  0, NULL);";
  //  $conn->query($query3x);
}



?>

<style>
  .calendar {
    display: flex;
    flex-flow: column;
  }

  .calendar .header .month-year {
    font-size: 20px;
    font-weight: bold;
    color: #636e73;
    padding: 20px 0;
  }

  .calendar .days {
    display: flex;
    flex-flow: wrap;
  }

  .calendar .days .day_name {
    width: calc(100% / 7);
    /* border-right: 1px solid var(--darker); */
    padding: 20px;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    color: #818589;
    color: #fff;
    background-color: var(--darker);
  }

  .calendar .days .day_name:nth-child(7) {
    border: none;
  }

  .calendar .days .day_num {
    display: flex;
    flex-flow: column;
    width: calc(100% / 7);
    border-right: 1px solid #e6e9ea;
    border-bottom: 1px solid #e6e9ea;
    padding: 15px;
    font-weight: bold;
    color: #7c878d;
    cursor: pointer;
    min-height: 10px;
  }

  .calendar .days .day_num span {
    display: inline-flex;
    width: 30px;
    font-size: 14px;
  }

  .calendar .days .day_num .event {
    margin-top: 10px;
    font-weight: 500;
    font-size: 11px;
    padding: 3px 6px;
    border-radius: 4px;
    background-color: #f7c30d;
    color: #fff;
    text-align:center;
    word-wrap: break-word;
  }

  .calendar .days .day_num .event.green {
    background-color: #51ce57;
  }

  .calendar .days .day_num .event.blue {
    background-color: #518fce;
  }

  .calendar .days .day_num .event.red {
    background-color: #ce5151;
  }

  .calendar .days .day_num:nth-child(7n+1) {
    border-left: 1px solid #e6e9ea;
  }

  .calendar .days .day_num:hover {
    background-color: #fdfdfd;
  }

  .calendar .days .day_num.ignore {
    background-color: #fdfdfd;
    color: #ced2d4;
    cursor: inherit;
  }

  .calendar .days .day_num.selected {
    background-color: #f1f2f3;
    cursor: inherit;
  }
</style>



<main>
  <div class="containerx-fluid">
    <div class="card text-left" style="background:var(--darker); color:var(--lighter); border-radius:0;">
      <div class="card-body">
        <table width="100%" style="color:white;">
          <tr>
            <td colspan="2">
              <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                Collection Details
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div style="font-size:40px; font-weight:700; text-align:center; margin-top:15px;">
                <span style="font-size:12px; font-weight:500;">BDT</span> <span id="xxl"></span>
              </div>
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
    $dd1 = date('Y') . '-01-01';
    $dd2 = date('Y') . '-12-31';
    $sql0 = "SELECT * FROM calendar where (sccode = 0 or sccode='$sccode') and date between '$dd1' and '$dd2' order by date  ";
    // echo $sql0;
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
      while ($row0 = $result0->fetch_assoc()) {
        $date = $row0["date"];
        $day = $row0["day"];


        ?>
        <div class="card " style="background:var(--lighter); color:seagreen; border-radius:0;"
          onclick="gog('<?php echo $prdate; ?>')">
          <img class="card-img-top" alt="">
          <div class="card-body">
            <div style="font-size:15px; font-weight:700; float:right;">
              <span style="font-size:12px; font-weight:500;">BDT</span> <?php echo number_format($taka, 2, ".", ","); ?>
            </div>
            <div style="font-size:14px; font-weight:600; color:seagreen; font-style:normal;">
              <?php echo $day . date('d-m-Y', strtotime($date)); ?></div>
          </div>
        </div>
        <div id="dateclass<?php echo $prdate; ?>"></div>
        <div style="height:2px;"></div>
        <?php $sl++;
      }
    } ?>

<!-- ******************************************************************* -->
<!-- ******************************************************************* -->
<!-- ******************************************************************* -->
<!-- ******************************************************************* -->
<!-- ******************************************************************* -->
<!-- ******************************************************************* -->




<?php 

include 'component/Calendar.php';
// $calendar = new Calendar();
$calendar = new Calendar('2025-01-01');
$calendar2 = new Calendar('2025-05-01');

$calendar->add_event('Book', '2024-05-14');
$calendar->add_event('Sha', '2025-01-4', 7); // Event will last for 7 days
$calendar->add_event('Holiday', '2025-01-14',1 , 'red');
$calendar->add_event('Olymp', '2025-01-14',1 , 'green');

$calendar->add_event('<i class="bi bi-cake"></i>', '2025-01-01', 1, 'green');
$calendar2->add_event('d', '2025-05-04', 1, 'red');
$calendar2->add_event('s', '2025-05-05', 1);

echo $calendar;
echo $calendar2;
?>
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