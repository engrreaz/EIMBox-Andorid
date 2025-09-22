<?php
if ($rank == 'Accountants' || $rank == 'Principal' || $rank == 'Head Teacher' || $reallevel == 'Super Administrator' || $rank == 'Office Assistant' || $userlevel=='Administrator') {
    $mon = date('m');

    $cimh = $money = $money1 = $money2 = $money3 = $money4 = 0;
    $sql0 = "SELECT sum(amount) as money  FROM transaction where sessionyear LIKE '%$sy%' and sccode='$sccode' and receivedby='$usr'";
    $result01x2 = $conn->query($sql0);
    if ($result01x2->num_rows > 0) {
        while ($row0 = $result01x2->fetch_assoc()) {
            $money = $row0["money"];
        }
    }
    $sql0 = "SELECT sum(amount) as money1  FROM transaction where sessionyear LIKE '%$sy%' and sccode='$sccode' and receivedfrom='$usr'";
    $result01x2 = $conn->query($sql0);
    if ($result01x2->num_rows > 0) {
        while ($row0 = $result01x2->fetch_assoc()) {
            $money1 = $row0["money1"];
        }
    }

    $sql0 = "SELECT sum(amount) as money2  FROM banktrans where transtype='Deposit' and entryby='$usr' and sccode='$sccode' ";
    $result01x3 = $conn->query($sql0);
    if ($result01x3->num_rows > 0) {
        while ($row0 = $result01x3->fetch_assoc()) {
            $money2 = $row0["money2"];
        }
    }

    $sql0 = "SELECT sum(amount) as money3  FROM banktrans where transtype='Withdraw' and entryby='$usr' and sccode='$sccode' ";
    $result01x4 = $conn->query($sql0);
    if ($result01x4->num_rows > 0) {
        while ($row0 = $result01x4->fetch_assoc()) {
            $money3 = $row0["money3"];
        }
    }

    $sql0 = "SELECT sum(income) as inco, sum(expenditure) as expe  FROM cashbook where  entryby='$usr' and sccode='$sccode' ";
    $result01x4 = $conn->query($sql0);
    if ($result01x4->num_rows > 0) {
        while ($row0 = $result01x4->fetch_assoc()) {
            $inco = $row0["inco"];
            $expe = $row0["expe"];
        }
    }
    $money4 = $inco - $expe;

    $cimh = ($paisi + $money + $money3 - $money1 - $money2 + $money4) * 1;

    $sql0 = "SELECT sum(dues) as dues, sum(payableamt) as paya, sum(paid) as paid  FROM stfinance where sessionyear LIKE '%$sy%' and sccode='$sccode' and month<='$mon'";
    $result01x = $conn->query($sql0);
    if ($result01x->num_rows > 0) {
        while ($row0 = $result01x->fetch_assoc()) {
            $totaldues = $row0["dues"];
            $tpaya = $row0["paya"];
            $tpaid = $row0["paid"];
        }
    }
    if ($tpaya > 0) {
        $perc = ceil($tpaid * 100 / $tpaya);
        $deg = ceil($tpaid * 360 / $tpaya);
    } else {
        $perc = 0;
        $deg = 0;
    }



    ?>
    <div class="card gg">
        <div class="card-header front-card">
            <b>Accounts33</b>
            <div class="float-end">
                <i class="bi bi-cash-coin front-icon"></i>
            </div>
        </div>
        <div class="card-body card-back" onclick="goclsa();">
            <table width="100%">
                <tr>
                    <td>
                        <div class="nmbr" onclick="goclsa();"><small>BDT </small><span
                                id="dues"><?php echo number_format($cimh, 2, ".", ","); ?></span></div>
                        <small>
                            <span style="font-style:normal; color:gray;">
                                Cash-in my hand.
                            </span>
                        </small>
                        <div style="font-size:11px; padding-top:8px; color:purple;">
                            Total Collection <b><?php echo number_format($tpaid, 2, ".", ","); ?></b> <br>out of Total Dues
                            <b><?php echo number_format($tpaya, 2, ".", ","); ?></b>.
                        </div>
                    </td>
                    <td>
                        <div onclick="goclsa(); "
                            style="border:1px solid purple; poisition:relative; margin:auto; text-align:center; border-radius:50%; height:72px; width:72px; background-image: conic-gradient(var(--dark) 0deg, var(--dark) <?php echo $deg; ?>deg, var(--lighter) <?php echo $deg; ?>deg, var(--lighter) 360deg);">
                            <div
                                style="border:1px solid purple; border-radius:50%; left:5px; top:5px; position:relative; background:var(--light); color:purple;;width:60px; height:60px; padding-top:20px;">
                                <?php echo $perc; ?><small>%</small>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
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
                            Total Collection <b><?php echo number_format($tpaid, 2, ".", ","); ?></b> <br>out of Total Dues
                            <b><?php echo number_format($tpaya, 2, ".", ","); ?></b>.
                        </div>
                    </td>
                    <td>
                        <div onclick="goclsa(); "
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
    <?php
}


?>



<script>
    function goclsp() { window.location.href = 'finclssec.php'; }
    function goclsa() { window.location.href = 'finacc.php'; }
</script>