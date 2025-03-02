<?php
$notices = array();
$sql0 = "SELECT * FROM notice where sccode = '$sccode' and (expdate = NULL || expdate = '0000-00-00' || expdate >= '$td') order by entrytime desc;";
// echo $sql0 ;
$result0rtx_notice = $conn->query($sql0);
if ($result0rtx_notice->num_rows > 0) {
    while ($row0 = $result0rtx_notice->fetch_assoc()) {
        $notices[] = $row0;
    }
}
// var_dump($notices);

$today_iftar = strtotime(date('Y-m-d') . ' 18:02:00') + date('d') * 20;
$today_iftar = date('Y-m-d H:i:s', ($today_iftar));
$today_sehri = strtotime(date('Y-m-d') . ' 05:06:00') - date('d') * 60;
$today_sehri = date('Y-m-d H:i:s', ($today_sehri));


if (strtotime($cur) >= strtotime($today_iftar)) {
    if (date('H') <= 5) {
        $last_time = $today_iftar;
        $last_name = 'Iftar';
        $next_time = $today_sehri;
        $next_name = 'Sehri';
    } else {
        $last_time = $today_iftar;
        $last_name = 'Iftar';
        $next_time = date('Y-m-d H:i:s',strtotime($today_sehri) + 3600 * 24);
        $next_name = 'Sehri';
    }

} else if (strtotime($cur) >= strtotime($today_sehri)) {
    $last_time = $today_sehri;
    $last_name = 'Sehri';
    $next_time = $today_iftar;
    $next_name = 'Iftar';
} else {
    $last_time = date('Y-m-d H:i:s', strtotime($today_iftar) - 1439 * 60);
    $last_name = 'Iftar';
    $next_time = $today_sehri;
    $next_name = 'Sehri';
}

// echo $last_time . '/' . $last_name . '//' . $next_time . '/' . $next_name;

$f_time = strtotime($today_sehri);
$z_time = strtotime(date('Y-m-d') . ' 12:11:00') - date('d') * 15;
$a_time = strtotime(date('Y-m-d') . ' 16:22:00') + date('d') * 15;
$m_time = strtotime($today_iftar);
$i_time = strtotime(date('Y-m-d') . ' 19:18:00') - date('d') * 10;

$f_clr = $z_clr = $a_clr = $m_clr = $i_clr = 'dark';
if (strtotime($cur) > $f_time)
    $f_clr = 'muted';
if (strtotime($cur) > $z_time)
    $z_clr = 'muted';
if (strtotime($cur) > $a_time)
    $a_clr = 'muted';
if (strtotime($cur) > $m_time)
    $m_clr = 'muted';
if (strtotime($cur) > $i_time)
    $i_clr = 'muted';
?>

<div class="main-card gg card">
    <div class="card-header front-card" hidden>
        <b>Notice Board</b>
        <div class="float-end">
            <i class="bi bi-megaphone-fill front-icon"></i>
        </div>
    </div>
    <div class="card-body" style="background:var(--lighter); ">
        <h6 class="text-center pb-3">Holy Ramadan</h6>
        <div hidden>
            <div id="last-event"><?php echo $last_time; ?></div>
            <div id="last-name"><?php echo $last_name; ?></div>
            <div id="next-event"><?php echo $next_time; ?></div>
            <div id="next-name"><?php echo $next_name; ?></div>
            <div id="cur-time">-----</div>
            <div id="ramadan-dur">-----</div>
            <div id="ramadan-rate">-----</div>
        </div>



        <div class="text-small">
            waiting to <b><?php echo $next_name; ?></b> @ <?php echo $next_time; ?>
        </div>
        <div id="time-line" class="d-block" style="background:red;">
            <div id="waiting-line" style="width:47%; height:2px; background:seagreen;"></div>
        </div>
        <div class="text-small" id="wait-time"></div>

        <div class="d-flex mt-2">
            <div class="col text-<?php echo $f_clr; ?>">
                <div class="pra-time"><?php echo date('H:i:s', $f_time); ?></div>
                <div class="pra-name">Fajr</div>
            </div>
            <div class="col text-<?php echo $z_clr; ?>">
                <div class="pra-time"><?php echo date('H:i:s', $z_time); ?></div>
                <div class="pra-name">Zuhr</div>
            </div>
            <div class="col text-<?php echo $a_clr; ?>">
                <div class="pra-time"><?php echo date('H:i:s', $a_time); ?></div>
                <div class="pra-name">Asr</div>
            </div>
            <div class="col text-<?php echo $m_clr; ?>">
                <div class="pra-time"><?php echo date('H:i:s', $m_time); ?></div>
                <div class="pra-name">Magrib</div>
            </div>
            <div class="col text-<?php echo $i_clr; ?>">
                <div class="pra-time"><?php echo date('H:i:s', $i_time); ?></div>
                <div class="pra-name">Isha</div>
            </div>
        </div>

    </div>
</div>
<div class="menu-separator"></div>

<script>
    function notice_description_blockx(sl) {
        var elem = document.getElementById("descrip" + sl);
        // alert(sl);
        if (elem.style.display == "block") {
            elem.style.display = "none";
        } else {
            elem.style.display = "block";
        }
    }
</script>