<?php
include 'inc.php';

// $id = $_GET['id'];
$id = $userid;


if( $in_time_user!= '00:00:00'  ){
    $in_time = $in_time_user;
}
if( $out_time_user!= '00:00:00'  ){
    $out_time = $out_time_user;
}
$reqin = $in_time;
$reqout = $out_time;

echo $reqin . '/' . $reqout . '/' . $distance;
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

}

// header('location:index.php');
$datam = array();
$sql0 = "SELECT * FROM teacherattnd where user='$usr' and adate='$td' and sccode='$sccode'";
$result0ghq_show = $conn->query($sql0);
if ($result0ghq_show->num_rows > 0) {
    while ($row0 = $result0ghq_show->fetch_assoc()) {
        $datam[] = $row0;
    }}

echo '<pre>';
print_r($datam);
echo '</pre>';