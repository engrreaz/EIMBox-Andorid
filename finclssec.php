<?php
include 'inc.php';
?>

<main>
    <div class="containerx-fluid">
        <div class="card text-left" style="background:var(--darker); color:var(--lighter); border-radius:0;">
            <div class="card-body page-top-box">
                <div class="page-icon"><i class="bi bi-coin"></i></div>
                <div class="page-title">Class/Section for Dues List</div>

            </div>
        </div>
        <div style="height:8px;"></div>


        <?php
        $sql0 = "SELECT * FROM areas where sessionyear = '$sy' and user='$rootuser' order by FIELD(areaname,'Six', 'Seven', 'Eight', 'Nine', 'Ten'), idno, subarea";

        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) {
            while ($row0 = $result0->fetch_assoc()) {
                $cls = $row0["areaname"];
                $sec = $row0["subarea"];
                $ico = 'iimg/' . strtolower(substr($sec, 0, 5)) . '.png';
                $lnk = "cls=" . $cls . '&sec=' . $sec;


                $month = date('m');
                $sql0 = "SELECT sum(payableamt) as dues, sum(payableamt) as paya, sum(paid) as paid FROM stfinance where sessionyear='$sy' and sccode='$sccode' and classname='$cls' and sectionname='$sec' and month<='$month'";

                $result01x = $conn->query($sql0);
                if ($result01x->num_rows > 0) {
                    while ($row0 = $result01x->fetch_assoc()) {
                        $totaldues = $row0["dues"];
                        $tpaid = $row0["paid"];
                    }
                }

                $sql0 = "SELECT sum(amount) as coll FROM stpr where sessionyear='$sy' and sccode='$sccode' and classname='$cls' and sectionname='$sec' and prdate='$td'";
                $result01xg = $conn->query($sql0);
                if ($result01xg->num_rows > 0) {
                    while ($row0 = $result01xg->fetch_assoc()) {
                        $coll = $row0["coll"];
                    }
                }
                if ($tpaid == 0) {
                    $rate = 0;
                } else {
                    $rate = ceil($tpaid * 100 / $totaldues);
                }
                // 
                ?>
                <div class="card " style="background:var(--lighter); color:var(--dark); border-radius:0;"
                    onclick="go('<?php echo $lnk; ?>')">
                    <img class="card-img-top" alt="">
                    <div class="card-body">
                        <div style="font-size:30px; font-weight:700; ">
                            <span style="font-size:12px; font-weight:500;">BDT</span>
                            <?php echo number_format($coll, 2, ".", ","); ?>
                        </div>

                        <div style="float:right; position:relative; top:-20px; font-size:12px;"><?php echo $rate; ?>%</div>
                        <div style="background:var(--light); margin-bottom:5px;">
                            <div style="position: relative; height:5px; background:var(--dark); width:<?php echo $rate; ?>%;">
                            </div>
                        </div>

                        <div style="font-size:11px; font-style:italic; color:gray; line-height:15px;">
                            Today's Collection out of Total Dues <span
                                style="font-size:16px; font-style:normal; font-weight:bold;"><?php echo number_format($totaldues, 2, ".", ","); ?></span>
                            till Today.
                            <br>Total Collection <b><?php echo number_format($tpaid, 2, ".", ","); ?></b> out of Total Dues
                            <b><?php echo number_format($totaldues, 2, ".", ","); ?></b>.
                        </div>
                        <div style="font-size:16px; font-style:normal; color:gray; font-weight:bold;">
                            for Class <?php echo $cls . ' (' . $sec . ')'; ?>
                        </div>
                    </div>
                </div>
                <div style="height:2px;"></div>
            <?php }
        } ?>

    </div>

</main>

<div style="height:52px;"></div>


<script>

    function go(id) {
        window.location.href = "finstudents.php?" + id;
    }  
</script>