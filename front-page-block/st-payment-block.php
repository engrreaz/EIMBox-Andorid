<?php
$tgot = $tsend = 0;
$sql0 = "SELECT sum(dues) as dues, sum(payableamt) as paya, sum(paid) as paid  FROM stfinance where sessionyear='$sy' and sccode='$sccode' and month<='$mon'";
$result01x = $conn->query($sql0);
if ($result01x->num_rows > 0) {
    while ($row0 = $result01x->fetch_assoc()) {
        $totaldues = $row0["dues"];
        $tpaya = $row0["paya"];
        $tpaid = $row0["paid"];
    }
}
$perc = ceil($tpaid * 100 / $tpaya);
$deg = ceil($tpaid * 360 / $tpaya);
?>
<div class="card gg">
    <div class="card-header" style="color:var(--lighter); background:var(--dark);border-radius:0;"><b>Student's
            Payment</b></div>
    <div class="card-body" onclick="goclsp()">
        <table width="100%">
            <tr>
                <td>
                    <div class="nmbr"><small>BDT </small><span
                            id="dues"><?php echo number_format($totaldues, 2, ".", ","); ?></span></div>
                    <small>
                        <span style="font-style:normal; color:gray;">
                            Total dues till today.
                        </span>
                    </small>
                    <div style="font-size:11px; padding-top:8px; color:purple;">
                        out of Total Dues <b><?php echo number_format($tpaya, 2, ".", ","); ?></b>
                        <br>Total Collection : <b><?php echo number_format($tpaid, 2, ".", ","); ?></b>
                        <br>
                        <br>Total Received : <b><?php echo number_format($tgot, 2, ".", ","); ?></b>
                        <br><span style="color:red;">Pending :
                            <b><?php echo number_format($tpaid - $tgot, 2, ".", ","); ?></b></span>
                        <br>
                        <br>To Bank : <b><?php echo number_format($tsend, 2, ".", ","); ?></b>
                        <br><span style="color:red;">Cash-in-Hand :
                            <b><?php echo number_format($tgot - $tsend, 2, ".", ","); ?></b></span>

                    </div>
                </td>
                <td>
                    <div onclick="goclsp(); "
                        style="border:1px solid purple; poisition:relative; margin:auto; text-align:center; border-radius:50%; height:72px; width:72px; background-image: conic-gradient(var(--dark) 0deg, var(--dark) <?php echo $deg; ?>deg, var(--lighter) <?php echo $deg; ?>deg, var(--lighter) 360deg);">
                        <div
                            style="border:1px solid purple; border-radius:50%; left:5px; top:5px; position:relative; background:var(--light); color:purple;;width:60px; height:60px; padding-top:20px;">
                            <?php echo $perc; ?><small>%</small>
                        </div>
                    </div>
                </td>
            </tr>
        </table>



    </div>
</div>



<script>
    function goclsp() { window.location.href = 'finclssec.php'; }
</script>