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



?>

<div class="main-card gg card" style="">
    <div class="card-header front-card">
        <b>Teachers Attendance</b>
        <div class="float-end">
            <i class="bi bi-person-vcard-fill front-icon"></i>
        </div>
    </div>
    <div class="card-body card-back " onclick="goclsattallx();">
        <table width="100%">
            <tr>
                <td>
                    <small>
                        <div
                            style="font-style:normal; color:var(--dark); font-size:14px; font-weight:600; margin-bottom:8px;">
                            <?php echo date('d F, Y', strtotime($td)); ?>
                        </div>
                        <span style="font-style:normal; color:gray;">
                            Today's Attendance
                        </span>
                    </small>

                    <div class="d-flex roll-no">
                        <div id="att-count" class="menu-text me-2"></div>
                        Out of
                        <div id="total-count" class="ms-2 stnama-ben"></div>
                    </div>
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

            <tr>
                <td colspan="2">
                    <div class="d-flex flex-wrap justify-content-between">
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
                            } else {
                                $attnd = 0;
                                $clr = 'red';
                            }
                            $phst = 1;
                            $photo_path = $BASE_PATH_URL . 'teacher/' . $tid . ".jpg";
                            // echo $photo_path;
                            if (!file_exists($photo_path)) {
                                $photo_path = "https://eimbox.com/teacher/no-img.jpg";
                                $phst = 0;
                            } else {
                                $photo_path = $BASE_PATH_URL_FILE . 'teacher/' . $tid . ".jpg";
                                $phst = 0;
                            }
                            echo $phst;
                            ?>
                            <div class="teacher-attnd-pic-box" style="background: <?php echo $clr; ?>;">
                                <img src="<?php echo $photo_path; ?>" class="teacher-attnd-pic" />
                            </div>
                            <?php
                            // echo '<small>' . $tid . '</small>';
                            $ts += $tstu;
                            $as += $astu;

                            $tot_cnt++;
                        }






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
</div>

<script>
    document.getElementById("att-count").innerHTML = <?php echo $att_cnt; ?>;
    document.getElementById("total-count").innerHTML = <?php echo $tot_cnt; ?>;
</script>