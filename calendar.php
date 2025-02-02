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

include 'datam/datam-calendar.php';
// var_dump($datam_calendar_events);
$wday_ind = array_search('Weekends', array_column($ins_all_settings, 'setting_title'));
$wday_text = $ins_all_settings[$wday_ind]['settings_value'];
$count_row = count($datam_calendar_events);

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
    background-color: rgb(138, 136, 130);
    color: #fff;
    text-align: center;
    word-wrap: break-word;
  }

  .calendar .days .day_num .event.green {
    background-color: #51ce57;
  }

  .calendar .days .day_num .event.orange {
    background-color: ;
    rgb(255, 187, 0);
  }

  .calendar .days .day_num .event.blue {
    background-color: rgb(40, 23, 136)
  }

  .calendar .days .day_num .event.red {
    background-color: rgb(224, 6, 6);
  }

  .calendar .days .day_num .event.teal {
    background-color: rgb(18, 134, 105);
  }

  .calendar .days .day_num .event.indigo {
    background-color: rgb(138, 17, 156);
  }

  .calendar .days .day_num .event.lime {
    background-color: rgb(130, 143, 13);
  }

  .calendar .days .day_num .event.gold {
    background-color: rgb(124, 123, 27);
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
    <div class="card text-left">
      <div class="card-body page-top-box">
        <div class="menu-icon"><i class="bi bi-calendar-fill"></i></div>
        <div class="menu-text"> Academic Calendar</div>
        <div id="fetch_data"></div>
      </div>
      <div class="bg-info">

        <?php if ($count_row < 300) {
          ?>
          <div id="import-status">
          <button class="btn btn-info btn-block text-white p-3 " style="border-radius:0;" onclick="import_events();"> Import
            Events </button></div>
          <?php
        } else {
          ?>
          <button class="btn btn-dark btn-block text-white p-3 " style="border-radius:0;" onclick="changeview();">
            Calendar View &nbsp;&nbsp;&nbsp; <i class="bi bi-arrow-left-right"></i> &nbsp;&nbsp;&nbsp; Text View </button>
          <?php
        }
        ?>
      </div>
    </div>



    <!-- ******************************************************************* -->
    <!-- ******************************************************************* -->
    <!-- ******************************************************************* -->
    <!-- ******************************************************************* -->
    <!-- ******************************************************************* -->
    <!-- ******************************************************************* -->


    <div class="card-body" id="table-box" style="display:block;">



      <?php

      include 'component/Calendar.php';

      for ($month = 1; $month <= 12; $month++) {
        $cal_date = date('Y') . '-' . $month . '-01';
        $calendar = new Calendar($cal_date);
        foreach ($datam_calendar_events as $cal_event) {
          $tarikh = $cal_event['date'];
          $count = $cal_event['day_count'];
          $icon = $cal_event['icon'];
          $color = $cal_event['color'];
          if (date('m', strtotime($tarikh)) == $month) {
            $calendar->add_event('<i class="bi bi-' . $icon . '"></i>', $tarikh, $count, $color);
          }
        }
        echo $calendar;
      }

      // // $calendar = new Calendar();
      // $calendar = new Calendar('2025-01-01');
      // $calendar2 = new Calendar('2025-05-01');
      
      // $calendar->add_event('Book', '2024-05-14');
      // $calendar->add_event('Sha', '2025-01-4', 7); // Event will last for 7 days
      // $calendar->add_event('Holiday', '2025-01-14', 1, 'red');
      // $calendar->add_event('Olymp', '2025-01-14', 1, 'green');
      
      // $calendar->add_event('<i class="bi bi-cake"></i>', '2025-01-01', 1, 'green');
      // $calendar2->add_event('d', '2025-05-04', 1, 'red');
      // $calendar2->add_event('s', '2025-05-05', 1);
      
      // echo $calendar;
      // echo $calendar2;
      ?>
    </div>


    <div class="card-body p-2" id="table-text" style="display:none;">
      <table class="table table-condensed text-small">
        <?php
        foreach ($datam_calendar_events as $eventus) {
          $e_date = $eventus['date'];
          $e_day = $eventus['day'];
          $e_descrip = $eventus['descrip'];
          $e_category = $eventus['category'];
          $e_work = $eventus['work'];
          $e_class = $eventus['class'];
          $e_icon = $eventus['icon'];
          $e_color = $eventus['color'];

          $bar = date('l', strtotime($e_date));
          if (str_contains($wday_text, $bar) === true) {
            $e_icon = 'x-square-fill';
            $e_color = 'red';
          }
          ?>
          <tr>
            <td><i class="bi bi-<?php echo $e_icon; ?>" style="color:<?php echo $e_color; ?>"></i></td>
            <td><?php echo date('d/m/Y', strtotime($e_date)); ?></td>
            <td><?php echo $e_descrip; ?></td>
          </tr>
          <?php
        }
        ?>
      </table>
    </div>
  </div>

</main>

<div style="height:52px;"></div>


<script>


  function go() {
    window.location.href = "calendar.php";
  }



  function import_events() {
    var infor = "import=0" ;
    // alert(infor);
    $("#import-status").html("");

    $.ajax({
      type: "POST",
      url: "backend/import-calendar-events.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#import-status').html('Please Wait...');
      },
      success: function (html) {
        $("#import-status").html(html);
        // go();
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

<script>
  function changeview() {
    var elema = document.getElementById("table-box");
    var elemb = document.getElementById("table-text");
    if (elema.style.display === 'block') {
      elema.style.display = 'none';
      elemb.style.display = 'block';
    } else {
      elemb.style.display = 'none';
      elema.style.display = 'block';
    }
  }
</script>