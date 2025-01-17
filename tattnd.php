<?php
include 'inc.php';

// $id = $_GET['id'];
$id = $userid;


if ($in_time_user != '00:00:00') {
    $in_time = $in_time_user;
}
if ($out_time_user != '00:00:00') {
    $out_time = $out_time_user;
}
$reqin = $in_time;
$reqout = $out_time;


// $distance = 10;
// echo $dista_differ;

$sql0 = "SELECT * FROM teacherattnd where user='$usr' and adate='$td' and sccode='$sccode'";
$result0ghq = $conn->query($sql0);
if ($result0ghq->num_rows > 0) {
    while ($row0 = $result0ghq->fetch_assoc()) {
        $id2 = $row0["id"];
        $reqout = $td . ' ' . $reqout;
        $diff = strtotime($cur) - strtotime($reqout);
        if ($diff < 0) {
            $stout = 'Fast';
        } else {
            $stout = 'Late';
        }
        $diff = abs($diff);
        $h = floor($diff / 3600);
        $m = floor(($diff % 3600) / 60);
        $s = ($diff % 3600) % 60;
        $balout = $h . ':' . $m . ':' . $s;

        $query33pxy = "UPDATE teacherattnd set realout='$cur', balout='$balout', statusout='$stout', detectout='GPS', disout='$distance' where id='$id2' ";
        $conn->query($query33pxy);
        $query33pxz = "UPDATE todolist set status=1, responsetime='$cur' where id = '$id'";
        $conn->query($query33pxz);

        $inout = 'out';
    }
} else {
    $reqin = $td . ' ' . $reqin;
    $diff = strtotime($cur) - strtotime($reqin);
    if ($diff < 0) {
        $stin = 'Fast';
    } else {
        $stin = 'Late';
    }
    $diff = abs($diff);
    $h = floor($diff / 3600);
    $m = floor(($diff % 3600) / 60);
    $s = ($diff % 3600) % 60;
    $balin = $h . ':' . $m . ':' . $s;


    $query33pxy = "insert into teacherattnd (id, user, tid, adate, reqin, reqout, realin, realout, balin, balout, statusin, statusout, detectin, detectout, disin, disout, dutytime, entryby, sccode, st, entrycode, entrytime) 
                                        values (NULL, '$usr', '$userid', '$td', '$reqin', '$reqout', '$cur', NULL, '$balin', NULL, '$stin', NULL, 'GPS', NULL, '$distance', 0,  NULL, '$usr', '$sccode', NULL, NULL, '$cur' );";
    // echo $query33pxy . $diff;
    $conn->query($query33pxy);
    $query33pxz = "UPDATE todolist set status=1, responsetime='$cur' where id = '$id'";
    $conn->query($query33pxz);

    if ($tattndout == 1) {
        $query33pxy0 = "insert into todolist (id, sccode, date, user, todotype, descrip1, descrip2, status, creationtime, response, responsetxt, responsetime) 
                    values (NULL, '$sccode', '$td', '$usr', 'Attendance', 'Attendance Out', '', 0, '$cur', 'geoattnd', 'Submit', NULL);";
        $conn->query($query33pxy0);
    }
    $inout = 'in';
}

// header('location:index.php');
$datam = array();
$sql0 = "SELECT * FROM teacherattnd where user='$usr' and adate='$td' and sccode='$sccode'";
$result0ghq_show = $conn->query($sql0);
if ($result0ghq_show->num_rows > 0) {
    while ($row0 = $result0ghq_show->fetch_assoc()) {
        $datam[] = $row0;
    }
}

$stst = '';
if ($inout == 'out') {
    $stst = $stout;
} else {
    $stst = $stin;
}

$holiday = 0;
if ($holiday == 1) {

}
if ($distance == 0) {
    $bgclr = 'crimson';
    $msg = 'Location did not detect';
    $icon = 'shield-slash-fill';
} else if ($distance > 0 && $distance <= $dista_differ) {
    if ($inout == 'in') {
        if ($stst = 'Fast') {
            $bgclr = 'seagreen';
        } else {
            $bgclr = 'orange';
        }
    } else {
        if ($stst = 'Fast') {
            $bgclr = 'DarkOrange';
        } else {
            $bgclr = 'seagreen';
        }
    }

    $msg = 'You are now out of area';
    $icon = 'shield-fill-check';
} else {
    $bgclr = 'crimson';
    $msg = 'You are now out of area';
    $icon = 'shield-fill-x';
}

// echo '<pre>';
// print_r($datam);
// echo '</pre>';


?>


<main>
    <div class="page-top-box text-center" style="height:100vh; background: <?php echo $bgclr; ?>;">
        <?php if ($gps == 1) { ?>
            <div class="float-end" style="position:fixed; right:50px; top:15px; color:white;"><i
                    class="bi bi-geo-alt-fill"></i></div><?php } ?>
        <div class="center-screen">
            <i class="bi bi-fingerprint " style="font-size:36px;"></i>
            <div class="menu-text text-small" style="margin-bottom:100px;">
                GPS Based Attendance
            </div>

            <div class="">
                <?php echo $in_time . '/' . $out_time . '/' . $distance . '//' . $dista_differ . '<br><br>'; ?>
                <?php echo $inout . '/' . $diff . '/' . $stst . '/ ' . $distance; ?>
                <?php echo '.....' . $diff . '....'; ?>
            </div>
            <div class="attnd-message"><?php echo $msg; ?></div>
            <div style="margin: 15px 0 50px">
                <i class="bi bi-<?php echo $icon; ?>" style="font-size:72px;"></i>
            </div>
            <button class="btn btn-dark" style="border-radius:20px; width: 50%;">Back</button>
        </div>


    </div>
</main>