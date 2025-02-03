<?php
include 'inc.php';
?>

<main>
    <div class="containerx-fluid">
        <div class="card text-left" style="background:var(--dark); color:var(--lighter); border-radius:0;">
            <div class="card-body page-top-box">
                <div class="menu-icon"><i class="bi bi-diagram-3"></i></div>
                <div class="menu-text">Attendance ( Class & Section )</div>

            </div>
            <div class="card-body page-info-box">
                <table width="100%" style="color:white;">

                    <tr>
                        <td>
                            <div style="font-size:16px; font-weight:700; line-height:15px;">
                                <?php echo date('d F, Y', strtotime($td)); ?></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">Date
                            </div>
                        </td>

                    </tr>

                </table>
            </div>
        </div>
        <div style="height:0px;"></div>


        <?php
        $sql0 = "SELECT * FROM areas where sessionyear = '$sy' and user='$rootuser' order by FIELD(areaname,'Six', 'Seven', 'Eight', 'Nine', 'Ten'), idno, subarea";
        //echo $sql0;
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) {
            while ($row0 = $result0->fetch_assoc()) {
                $cls = $row0["areaname"];
                $sec = $row0["subarea"];
                $ico = 'iimg/' . strtolower(substr($sec, 0, 5)) . '.png';
                $lnk = "cls=" . $cls . '&sec=' . $sec;


                $month = date('m');
                $sql0 = "SELECT * FROM stattndsummery where sessionyear='$sy' and sccode='$sccode' and classname='$cls' and sectionname='$sec' and date='$td'";
                // echo $sql0;
                $result01x = $conn->query($sql0);
                if ($result01x->num_rows > 0) {
                    while ($row0 = $result01x->fetch_assoc()) {
                        $rate = $row0["attndrate"];
                        $fnd = $row0["attndstudent"];
                        $cnt = $row0["totalstudent"];

                    }
                } else {
                    $rate = 0;
                    $fnd = 0;
                    $cnt = 0;
                }



                ?>
                <div class="card  mb-1" style="background:var(--lighter); color:var(--dark); border-radius:0;"
                    onclick="go('<?php echo $lnk; ?>')">
                    <div class="card-body">
                        <div style="font-size:30px; font-weight:700; ">
                            <?php echo $fnd; ?><span style="font-size:12px; font-weight:400;"> out of
                                <b><?php echo $cnt; ?></b></span>
                        </div>

                        <div style="float:right; position:relative; top:-20px; font-size:12px;">
                            <?php echo number_format($rate, 1, ".", ","); ?>%</div>
                        <div style="background:var(--light); margin-bottom:5px;">
                            <div style="position: relative; height:5px; background:var(--dark); width:<?php echo $rate; ?>%;">
                            </div>
                        </div>

                        <div style="font-size:16px; font-style:normal; color:gray; font-weight:bold;">
                            <?php echo $cls . ' | ' . $sec; ?>
                        </div>

                        <div style="font-size:11px; font-style:italic; color:gray; line-height:15px; display:none;">
                            ............. <span
                                style="font-size:16px; font-style:normal; font-weight:bold;"><?php echo number_format($totaldues, 2, ".", ","); ?></span>
                            till Today.
                            <br>Total ....... <b><?php echo number_format($tpaid, 2, ".", ","); ?></b> out of Total .........
                            <b><?php echo number_format($totaldues, 2, ".", ","); ?></b>.
                        </div>


                    </div>
                </div>
                <div style="height:0px;"></div>
            <?php }
        } ?>


    </div>

</main>

<div style="height:52px;"></div>


<script>


    function go(id) {
        window.location.href = "stattndregister.php?" + id;
    }  
</script>



</body>

</html>