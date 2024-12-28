<?php
if ($cteachercls != '' && $cteachersec != '') {
    $x1 = $cteachercls;
    $x2 = $cteachersec;

    $sql0 = "SELECT * FROM stattndsummery where sessionyear = '$sy' and sccode='$sccode' and classname='$x1' and sectionname='$x2' and date='$td'";
    //echo $sql0;
    $result01xe2 = $conn->query($sql0);
    if ($result01xe2->num_rows > 0) {
        while ($row0 = $result01xe2->fetch_assoc()) {
            $tstu = $row0["totalstudent"];
            $astu = $row0["attndstudent"];
        }
    } else {
        $tstu = 0;
        $astu = 0;
    }
    $tperc = 0;
    if ($tstu > 0) {
        $tperc = ceil($astu * 100 / $tstu);
    }

    // $tperc = rand(10,100);
    $tattdeg = $tperc * 3.6;
    ?>
    <div class="card pb-1 shadow">
        <div class="card-header" style="color:var(--darker); background:var(--light);border-radius:0;"><b>Student's
                Attendance</b></div>
        <div class="card-body" style="background:var(--lighter);" onclick="goclsatt('<?php echo $x1; ?>','<?php echo $x2; ?>');">
            <table width="100%">
                <tr>
                    <td>
                        <div class="" style="color:var(--dark); font-size:15px;  font-weight:600;"><small> </small><span
                                id="duess"><?php echo $x1 . ' | ' . $x2; ?></span></div>
                        <small>
                            <span style="font-style:normal; color:gray;">
                                Today's Attendance
                            </span>
                        </small>
                        <br>
                        <a href="stattndregister.php?cls=<?php echo $x1; ?>&sec=<?php echo $x2; ?>"
                            class="btn btn-info mt-3">View Attendance Register</a>

                    </td>
                    <td class="prog">
                        <div
                            style="border:1px solid purple; poisition:relative; margin:auto; text-align:center; border-radius:50%; height:72px; width:72px; background-image: conic-gradient(var(--dark) 0deg, var(--dark) <?php echo $tattdeg; ?>deg, var(--lighter) <?php echo $tattdeg; ?>deg, var(--lighter) 360deg);">
                            <div
                                style="border:1px solid purple; border-radius:50%; left:5px; top:5px; position:relative; background:var(--light); color:purple;;width:60px; height:60px; padding-top:20px;">
                                <?php echo $tperc; ?><small>%</small>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>



        </div>
    </div>
    <?php

}

?>