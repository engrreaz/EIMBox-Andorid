<?php
// var_dump($cteacher_data);
if (count($cteacher_data) > 0) {
    foreach ($cteacher_data as $cteacher) {
        $x1 = $cteacher['cteachercls'];
        $x2 = $cteacher['cteachersec'];

        $found_attnd = $found_bunk = 0;
        $sql0 = "SELECT sum(yn) as yn, sum(bunk) as bunk FROM stattnd where sessionyear LIKE '%$sy%' and sccode='$sccode' and classname='$x1' and sectionname='$x2' and adate='$td'";
        //echo $sql0;
        $result01xe2_found = $conn->query($sql0);
        if ($result01xe2_found->num_rows > 0) {
            while ($row0 = $result01xe2_found->fetch_assoc()) {
                $found_attnd = $row0["yn"];
                $found_bunk = $row0["bunk"];
            }
        }

        $found_stu = 0;
        $sql0 = "SELECT count(*) as cnt FROM sessioninfo where sessionyear LIKE '%$sy%' and sccode='$sccode' and classname='$x1' and sectionname='$x2'";
        $result01xe2_found_stu = $conn->query($sql0);
        if ($result01xe2_found_stu->num_rows > 0) {
            while ($row0 = $result01xe2_found_stu->fetch_assoc()) {
                $found_stu = $row0["cnt"];
            }
        }


        $sql0 = "SELECT * FROM stattndsummery where sessionyear LIKE '%$sy%' and sccode='$sccode' and classname='$x1' and sectionname='$x2' and date='$td'";
        //echo $sql0;
        $result01xe2 = $conn->query($sql0);
        if ($result01xe2->num_rows > 0) {
            while ($row0 = $result01xe2->fetch_assoc()) {
                $tstu = $row0["totalstudent"];
                $astu = $row0["attndstudent"];
            }
            $stat_color = 'var(--dark)';
        } else {
            if ($found_attnd > 0) {
                $tstu = $found_stu;
                $astu = $found_attnd;
                $stat_color = 'gray';
            } else {
                $tstu = $found_stu;
                $astu = 0;
                $stat_color = 'var(--light)';
            }
        }

        $tperc = $bperc = $dispperc =  0;
        if ($tstu > 0) {
            $tperc = $dispperc = ceil($astu * 100 / $tstu);
            $bperc = ceil($found_bunk * 100 / $tstu);

            $tperc -= $bperc;
        }

        // $tperc = rand(10,100);
        $tattdeg = $tperc * 3.6;
        $tbunkdeg = $bperc * 3.6;
        // echo $tattdeg . '/' . $tbunkdeg;
        ?>
        <div class="card box-shadow">
            <div class="card-header" style="color:var(--darker); background:var(--light);border-radius:0;"><b>Student's
                    Attendance</b>
                <div class="float-end">
                    <i class="bi bi-fingerprint front-icon"></i>
                </div>
            </div>
            <div class="card-body" style="background:var(--lighter);"
                onclick="home_goclsatt('<?php echo $x1; ?>','<?php echo $x2; ?>');">
                <table width="100%">
                    <tr>
                        <td>
                            <div style="color:<?php echo $stat_color; ?>">
                                <div style=" font-weight:700; font-size:36px; line-height:24px;">
                                    <?php echo $astu; ?> <span style="font-size:18px; font-weight:400;" class=""><small> Out of
                                        </small> <span
                                            style="font-size:22px; font-weight:600;"><?php echo $tstu; ?></span></span>
                                </div>
                                <div style="font-style:normal; margin-top:5px; line-height:10px; font-weight:bold;">
                                    Bunk : <?php echo $found_bunk; ?> out of <?php echo $found_attnd; ?>
                                </div>
                            </div>
                            <br>
                            <small>
                                <span style="font-style:normal; color:gray; line-height:10px;">
                                    Today's Attendance
                                </span>
                            </small>
                            <div class="" style="color:var(--dark); font-size:15px;  font-weight:600;"><small> </small><span
                                    id="duess"><?php echo $x1 . ' | ' . $x2; ?></span></div>
                        </td>
                        <td class="prog">

                            <div
                                style="border:1px solid var(--lighter); poisition:relative; margin:auto; text-align:center; border-radius:50%; height:72px; width:72px; background-image: conic-gradient(seagreen 0deg, seagreen <?php echo $tattdeg; ?>deg, orange <?php echo $tattdeg; ?>deg, orange <?php echo $tbunkdeg; ?>deg, red <?php echo $tbunkdeg; ?>deg, red 360deg);">
                                <div
                                    style="border:1px solid  var(--light); border-radius:50%; left:5px; top:5px; position:relative; background:var(--light); color:purple;;width:60px; height:60px; padding-top:20px;">
                                    <?php echo $dispperc; ?><small>%</small>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <a href="st-attnd-register.php?cls=<?php echo $x1; ?>&sec=<?php echo $x2; ?>"
                                class="btn btn-info btn-block mt-3">View Attendance Register</a>
                        </td>
                    </tr>
                </table>



            </div>
        </div>
        <?php
    }
}

?>