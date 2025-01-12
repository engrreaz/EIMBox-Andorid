<?php
include 'datam/datam-teacher.php';

$teacher_attendance = array();
$sql0 = "SELECT * FROM teacherattnd where sccode='$sccode' and adate='$td' ";
$result01xe1_t_attnd = $conn->query($sql0);
if ($result01xe1_t_attnd->num_rows > 0) {
    while ($row0 = $result01xe1_t_attnd->fetch_assoc()) {
        $teacher_attendance[] = $row0;
    }
}

$teacher_leave = array();
$sql0 = "SELECT * FROM teacher_leave_app where sccode='$sccode' and date_from<='$td' and date_to>='$td' ";
$result01xe1_t_leave = $conn->query($sql0);
if ($result01xe1_t_leave->num_rows > 0) {
    while ($row0 = $result01xe1_t_leave->fetch_assoc()) {
        $teacher_leave[] = $row0;
    }
}


$absent_teacher = array();

?>

<div class="main-card gg card" style="">
    <div class="card-header front-card">
        <b>Teachers Attendance</b>
        <div class="float-end">
            <i class="bi bi-person-vcard-fill front-icon"></i>
        </div>
    </div>
    <div class="card-body card-back ">
        <table width="100%">
            <tr>
                <td>
                    <small>
                        <div
                            style="font-style:normal; color:var(--dark); font-size:14px; font-weight:600; margin-bottom:8px;">
                            <?php echo date('d F, Y', strtotime($td)); ?>
                        </div>
                        <div class="d-flex roll-no ln-30">
                            <div id="attnd-count" class="text-success me-2 fw-bold ln-30" style="font-size:30px; ">0
                            </div>
                            Out of
                            <div id="total-count" class="ms-2 stnama-ben ln-30">0</div>
                        </div>
                        <span style="font-style:normal; color:gray;">
                            Today's Attendance
                        </span>
                    </small>
                    <!-- <button class="btn btn-primary text-small" onclick="show_all_teacher();">All</button> -->
                    <!-- <button class="btn btn-primary text-small" onclick="show_present_teacher();">Present</button> -->


                </td>
                <td class="prog">
                    <div
                        style="border:1px solid var(--dark); poisition:relative; margin:auto; text-align:center; border-radius:50%; height:72px; width:72px; background-image: conic-gradient(var(--dark) 0deg, var(--dark) <?php echo $deg; ?>deg, var(--lighter) <?php echo $deg; ?>deg, var(--lighter) 360deg);">
                        <div
                            style="border:1px solid var(--dark); border-radius:50%; left:5px; top:5px; position:relative; background:var(--light); color:purple;;width:60px; height:60px; padding-top:20px;">
                            <?php echo $attrate; ?><small>%</small>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <table class="" style="marging:auto;">
            <tr>
                <td class="text-center">
                    <div class="d-flex flex-wrap"
                        style="margin: 15px auto 7px; text-align:center !important; display:inline;">
                        <?php
                        $ts = 0;
                        $as = 0;
                        $att_cnt = 0;
                        $tot_cnt = 0;
                        foreach ($datam_teacher_profile as $teacher) {
                            $tid = $teacher["tid"];

                            $ind_attnd = array_search($tid, array_column($teacher_attendance, 'tid'));
                            if ($ind_attnd != '' || $ind_attnd != NULL) {
                                $status_in = $teacher_attendance[$ind_attnd]['statusin'];
                                $attnd = 1;
                                $clr = 'seagreen';
                                $att_cnt++;
                                $klass = 'all present';
                            } else {
                                $attnd = 0;
                                $clr = 'red';
                                $absent_teacher[] = ['tid' => $tid];
                                $klass = 'all absent';
                            }
                            $phst = 1;
                            $photo_path = $BASE_PATH_URL . 'teacher/' . $tid . ".jpg";
                            // echo $photo_path;
                            if (!file_exists($photo_path)) {
                                $photo_path = "https://eimbox.com/teacher/no-img.jpg";
                                $phst = 0;
                            } else {
                                $photo_path = $BASE_PATH_URL_FILE . 'teacher/' . $tid . ".jpg";
                                $phst = 1;

                                // echo $phst . '/' . $photo_path;
                            }
                            if ($attnd == 1) {
                                ?>
                                <div class="teacher-attnd-pic-box <?php echo $klass; ?>"
                                    style="background: <?php echo $clr; ?>;">
                                    <img src="<?php echo $photo_path; ?>" class="teacher-attnd-pic"
                                        title="<?php echo $tid; ?>" />
                                </div>
                                <?php
                            }

                            // echo '<small>' . $tid . '</small>';
                            $ts += $tstu;
                            $as += $astu;

                            $tot_cnt++;
                        }


                        // echo $att_cnt . '/' . $tot_cnt;
                        


                        if ($ts > 0) {
                            $attrate = ceil($att_cnt * 100 / $tot_cnt);
                        } else {
                            $attrate = 0;
                        }

                        $deg = $attrate * 3.6;


                        ?>

                    </div>
                </td>
            </tr>
        </table>
    </div>
    <?php if (count($absent_teacher) > 0) { ?>

        <div class="card-header front-card" style="background:aa0; color:red;">
            <b>Absent Teachers</b>
            <div class="float-end">
                <i class="bi bi-person-circle " style="font-size:18px; "></i>
            </div>
        </div>
        <div class="card-body card-back ">

            <table class="" style="marging:auto;">
                <tr>
                    <td class="text-center">
                        <div class="d-flex flex-wrap" style=" text-align:center !important; ">
                            <?php
                            foreach ($absent_teacher as $absent) {
                                $tid = $absent["tid"];
                                $back_color = 'red';
                                $ind_leave = array_search($tid, array_column($teacher_leave, 'tid'));
                                if($ind_leave != '' || $ind_leave != NULL) {
                                    $back_color = 'orange';
                                }
                                $photo_path = $BASE_PATH_URL . 'teacher/' . $tid . ".jpg";
                                if (!file_exists($photo_path)) {
                                    $photo_path = "https://eimbox.com/teacher/no-img.jpg";
                                } else {
                                    $photo_path = $BASE_PATH_URL_FILE . 'teacher/' . $tid . ".jpg";
                                }
                                ?>
                                <div class="teacher-attnd-pic-box" style="background: <?php echo $back_color;?>;">
                                    <img src="<?php echo $photo_path; ?>" class="teacher-attnd-pic"
                                        title="<?php echo $tid; ?>" />
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

    <?php } ?>
</div>

<script>
    document.getElementById("attnd-count").innerHTML = <?php echo $att_cnt; ?>;
    document.getElementById("total-count").innerHTML = <?php echo $tot_cnt; ?>;

    function show_all_teacher() {
        document.getElementsByClassName('all').style.display = 'none';
        document.getElementsByClassName('all').style.display = 'block';
    }
    function show_present_teacher() {

        document.querySelectorAll(".all").style.display = "none";
        // document.getElementsByClassName('present').style.display = 'block';
        // alert(777);
    }

</script>