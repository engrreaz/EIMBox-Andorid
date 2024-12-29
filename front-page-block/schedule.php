<?php
// date_default_timezone_set('Asia/Dhaka');
// include('incb.php');


$today_st_attnd = 0;
$today_t_attnd = 0;
$total_user = 0;
$user_active = 0;
$expense_month = 0;



// Count Students
$sql0 = "SELECT count(*) as stcnt FROM sessioninfo where sccode = '$sccode' and sessionyear='$sy' ;";
$result0rt = $conn->query($sql0);
if ($result0rt->num_rows > 0) {
    while ($row0 = $result0rt->fetch_assoc()) {
        $total_students = $row0["stcnt"];
    }
}
$sql0 = "SELECT count(*) as attndcnt FROM stattnd where sccode = '$sccode' and adate='$td' and yn=1 ;";
$result0rtt = $conn->query($sql0);
if ($result0rtt->num_rows > 0) {
    while ($row0 = $result0rtt->fetch_assoc()) {
        $today_st_attnd = $row0["attndcnt"];
    }
}



$tlist = array();
$sql0 = "SELECT tid, tname FROM teacher where sccode = '$sccode' order by tid ;";
$result0rttft = $conn->query($sql0);
if ($result0rttft->num_rows > 0) {
    while ($row0 = $result0rttft->fetch_assoc()) {
        $tlist[] = $row0;
    }
}


// Check Exam ?
$examrun = 0;
$examtxt = array();
$sql0 = "SELECT * FROM examroutine where sccode = '$sccode' and date='$td' order by time ;";
$result0rttfte = $conn->query($sql0);
if ($result0rttfte->num_rows > 0) {
    $examrun = 1;
    while ($row0 = $result0rttfte->fetch_assoc()) {
        $examtxt[] = $row0;
    }
}

// Check Event ?
$eventrun = array();
$sql0 = "SELECT * FROM calendar where sccode = '$sccode' order by id ;";
$result0rttftev = $conn->query($sql0);
if ($result0rttftev->num_rows > 0) {
    while ($row0 = $result0rttftev->fetch_assoc()) {
        $eventrun[] = $row0;
    }
}


$sublist = array();
$sql0 = "SELECT subcode, subject FROM subjects where (sccode = '$sccode' || sccode = 0) and sccategory = '$sctype' order by subcode ;";
$result0rttfts = $conn->query($sql0);
if ($result0rttfts->num_rows > 0) {
    while ($row0 = $result0rttfts->fetch_assoc()) {
        $sublist[] = $row0;
    }
}

// var_dump($sublist);


$ccur = date('H:i:s');
$sql0 = "SELECT * FROM classschedule where sccode = '$sccode' and sessionyear='$sy' and timestart<='$ccur' and timeend>='$ccur';";
// echo $sql0 ;
$result0rtx = $conn->query($sql0);
if ($result0rtx->num_rows > 0) {
    while ($row0 = $result0rtx->fetch_assoc()) {
        $period = $row0["period"];
        $ts = $row0["timestart"];
        $te = $row0["timeend"];
        $dur = $row0["duration"];
    }
} else {
    $period = '';
    $ts = 0;
    $te = 0;
    $dur = 0;
}


$dur_sec = strtotime($te) - strtotime($cur);
?>

<div >
    <div id="total_students"><?php echo $total_students; ?></div>
    <div id="st_attnd"><?php echo $today_st_attnd; ?></div>
    <div id="t_attnd"><?php echo $today_t_attnd; ?></div>
    <div id="main-29"><?php echo $period; ?></div>
    <div id="main-30"><?php echo $ts; ?></div>
    <div id="main-31"><?php echo $te; ?></div>
    <div id="class-dur"><?php echo $dur; ?></div>
</div>


<div class="card gg">
    <div class="card-body" style="background:var(--lighter);">
        <div id="kk"><?php echo $dur_sec; ?></div>
        <div id="jj">0</div>

        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" id="class-progress-bar" aria-valuemin="0"
                aria-valuemax="100" style="width:70%">
                <span class="sr-only" id="class-bar-val">70% Complete</span>
            </div>
        </div>
        <div class="text-small" id="time-slot">
            
        </div>


        <div id="sche" class="table-responsive mt-2 ">
            <?php
            if ($examrun == 0) {
                ?>
                <div class="table-responsive table-borderless m-0">
                    <table class="table table-condensed ">
                        <?php
                        $day = date('l', strtotime($td));
                        if ($day == 'Sunday') {
                            $wday = 1;
                        } else if ($day == 'Monday') {
                            $wday = 2;
                        } else if ($day == 'Tuesday') {
                            $wday = 3;
                        } else if ($day == 'Wednesday') {
                            $wday = 4;
                        } else if ($day == 'Thursday') {
                            $wday = 5;
                        } else if ($day == 'Friday') {
                            $wday = 5;
                        } else if ($day == 'Saturday') {
                            $wday = 5;
                        }
                        // echo $userlevel;
                        // echo $userid;
                    
                        if ($userlevel == 'Teacher' || $userlevel == 'Asstt. Teacher' || $userlevel == 'Class Teacher') {
                            $sql0 = "SELECT * FROM clsroutine where sccode='$sccode' and sessionyear='$sy' and period>='$period' and wday='$wday' and tid='$userid' order by classname, sectionname;";
                        } else {
                            $sql0 = "SELECT * FROM clsroutine where sccode='$sccode' and sessionyear='$sy' and period='$period' and wday='$wday' order by classname, sectionname;";
                        }
                        // echo $sql0;
                        $result0a = $conn->query($sql0);
                        if ($result0a->num_rows > 0) {
                            while ($row0 = $result0a->fetch_assoc()) {
                                $cls = $row0["classname"];
                                $sec = $row0["sectionname"];
                                $tid = $row0["tid"];
                                $subj = $row0["subcode"];
                                $peri = $row0["period"];
                                $tname = $subname = '';
                                $ind1 = array_search($tid, array_column($tlist, 'tid'));
                                if ($ind1 != '') {
                                    $tname = $tlist[$ind1]['tname'];
                                }
                                $ind2 = array_search($subj, array_column($sublist, 'subcode'));
                                if ($ind2 != '') {
                                    $subname = $sublist[$ind2]['subject'];
                                }
                                ?>
                                <tr>
                                    <td><?php echo $cls; ?></td>
                                    <td><?php echo $sec; ?></td>
                                    <td><?php echo $subname; ?></td>

                                    <?php
                                    if ($userlevel == 'Teacher' || $userlevel == 'Asstt. Teacher' || $userlevel == 'Class Teacher') {
                                        echo '<td>Period : ' . $peri . '</td>';
                                    } else {
                                        echo '<td>' . $tname . '</td>';
                                    }
                                    ?>

                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>


                <?php
            } else {
                ?>
                <h6 class="font-weight-bold pt-3 text-warning">Examination Schedule</h6>
                <div class="table-responsive ">
                    <table class="table table-condensed " style="width:100%;">
                        <?php


                        foreach ($examtxt as $exx) {
                            $tmm = $exx["time"];
                            $cls = $exx["clsname"];
                            $sec = $exx["secname"];
                            $subj = $exx["subj"];
                            ?>
                            <tr>
                                <td><?php echo $tmm; ?></td>
                                <td><?php echo $cls; ?></td>
                                <td><?php echo $sec; ?></td>
                                <td><?php echo $subj; ?></td>
                            </tr>
                            <?php

                        }
                        ?>
                    </table>
                </div>

                <?php

            }
            ?>

        </div>



    </div>
</div>