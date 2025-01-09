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
    <div class="card-body card-back " onclick="goclsattall();">
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

                    <div class="d-flex flex-wrap">
                        <?php
                        $ts = 0;
                        $as = 0;

                        foreach ($datam_teacher_profile as $teacher) {
                            $tid = $teacher["tid"];

                            $ind_attnd = array_search($tid, array_column($teacher_attendance, 'tid'));
                            if ($ind_attnd != '' || $ind_attnd != NULL) {
                                $status_in = $teacher_attendance[$ind_attnd]['statusin'];
                                $attnd = 1;
                                $clr = 'seagreen';
                            } else {
                                $attnd = 0;
                                $clr = 'red';
                            }

                            $photo_path = "../teacher/" . $tid . ".jpg";
                            if (!(file_exists($photo_path))) {
                                $photo_path = "../teacher/no-img.jpg";
                            }
                            ?>
                            <div class="teacher-attnd-pic-box" style="background: <?php echo $clr;?>;">
                                <img src="<?php echo $photo_path; ?>" class="teacher-attnd-pic" />
                            </div>
                            <?php

                            $ts += $tstu;
                            $as += $astu;
                        }






                        if ($ts > 0) {
                            $attrate = ceil($as * 100 / $ts);
                        } else {
                            $attrate = 0;
                        }

                        $deg = $attrate * 3.6;
                        ?>
                    </div>


                    <div style="font-size:24px; color:var(--dark); font-weight:700;">
                        <?php echo $as; ?><span style="font-size:12px; font-weight:400;"> out of
                            <b><?php echo $ts; ?></b></span>
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
        </table>
    </div>
</div>