<div class="main-card gg card" style="">
    <div class="card-header front-card">
        <b>Student's Attendance (Admin Block)</b>
        <div class="float-end">
            <i class="bi bi-person-vcard front-icon"></i>
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
                        $sql0 = "SELECT * FROM areas where sessionyear  LIKE '%$sy%' and user='$rootuser' order by FIELD(areaname,'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'SSC $SY'), idno, subarea";
                        $result01xe1 = $conn->query($sql0);
                        if ($result01xe1->num_rows > 0) {
                            while ($row0 = $result01xe1->fetch_assoc()) {
                                $cls = $row0["areaname"];
                                $sec = $row0["subarea"];
                                $sql0 = "SELECT * FROM stattndsummery where sessionyear  LIKE '%$sy%' and sccode='$sccode' and classname='$cls' and sectionname='$sec' and date='$td'";
                                //echo $sql0;
                                $result01xe2 = $conn->query($sql0);
                                if ($result01xe2->num_rows > 0) {
                                    while ($row0 = $result01xe2->fetch_assoc()) {
                                        $tstu = $row0["totalstudent"];
                                        $astu = $row0["attndstudent"];
                                        $clr = 'dark';
                                    }
                                } else {
                                    $tstu = 0;
                                    $astu = 0;
                                    $clr = 'light';
                                }

                                echo '<div style="text-align:center; width:20px;"><div style="margin:0 3px 0 0; font-size:8px; text-align:center; padding-top:3px; height:15px; width:15px; border-radius:50%; background:var(--' . $clr . '); color:white;">' . $astu . '</div>
                                    <span style="font-size:9px; color:var(--dark);">' . $astu . '</span></div>';
                                $ts += $tstu;
                                $as += $astu;
                            }
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