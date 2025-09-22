<?php
$paisi = $money3 = 0;

// $ind = array_search('Collection', array_column($ins_all_settings, 'setting_title'));
// if ($ind != '' || $ind != null) {
//     $sett_val = $ins_all_settings[$ind]['settings_value'];
//     echo $sett_val . $userlevel;
//     if (str_contains($sett_val, $userlevel)) {

// if (($cteachercls != '' && $cteachersec != '') || $userlevel == 'Administrator' || $userlevel == 'Super Administrator') {
// var_dump($ins_all_settings);
$pospos = -1;

$ind = array_search('Collection', array_column($ins_all_settings, 'setting_title'));
// echo $ind. '<br>................<br>';
if ($ind != '' || $ind != null) {
    $sett_val = $ins_all_settings[$ind]['settings_value'];

    $pospos = strpos($sett_val, $userlevel);
}
if ($pospos == '' || $pospos == null) {
    $pospos = -1;
}

if ($pospos >= 0) {
    if (count($cteacher_data) > 0) {
        foreach ($cteacher_data as $cteacher) {
            $cteachercls = $cteacher['cteachercls'];
            $cteachersec = $cteacher['cteachersec'];

            if ($collectionby == 0) {

                $mon = date('m');
                $sql0 = "SELECT sum(dues) as dues, sum(payableamt) as paya, sum(paid) as paid  FROM stfinance where sessionyear LIKE '%$sy%' and sccode='$sccode' and classname='$cteachercls' and sectionname='$cteachersec' and month<='$mon'";
                // echo $sql0;
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
                }




                $sql0 = "SELECT sum(amount) as disi FROM transaction where sessionyear LIKE '%$sy%' and sccode='$sccode' and receivedfrom='$usr'";
                $result01xe = $conn->query($sql0);
                if ($result01xe->num_rows > 0) {
                    while ($row0 = $result01xe->fetch_assoc()) {
                        $disi = $row0["disi"];
                    }
                }

                $sql0 = "SELECT sum(income) as iii, sum(expenditure) as eee FROM cashbook where sessionyear LIKE '%$sy%' and sccode='$sccode' and entryby='$usr'";
                $result01xe = $conn->query($sql0);
                if ($result01xe->num_rows > 0) {
                    while ($row0 = $result01xe->fetch_assoc()) {
                        $iii = $row0["iii"];
                        $eee = $row0["eee"];
                    }
                } else {
                    $iii = 0;
                    $eee = 0;
                }

                $ase = $paisi - $disi + $iii - $eee + $money3;

                ?>


                <div class="card box-shadow">
                    <div class="card-header" style="color:var(--darker); background:var(--light);border-radius:0;"><b> Student's
                            Payment</b>
                        <div class="float-end">
                            <i class="bi bi-currency-exchange front-icon"></i>
                        </div>
                    </div>
                    <div class="card-body" style="background:var(--lighter);"
                        onclick="home_cteacher_st_payment('<?php echo $cteachercls; ?>','<?php echo $cteachersec; ?>');">


                        <table width="100%">
                            <tr>
                                <td colspan="2">
                                    <div class="nmbr" style="color:var(--dark);"><small>BDT </small><span
                                            id="duess"><?php echo number_format($ase, 2, ".", ","); ?></span></div>
                                    <small>
                                        <span style="font-style:normal; color:gray;">
                                            Cash in my hand.
                                        </span>
                                    </small>

                                    <div class="nmbr"><small>BDT </small><span
                                            id="duess"><?php echo number_format($totaldues, 2, ".", ","); ?></span></div>
                                    <small>
                                        <span style="font-style:normal; color:gray;">
                                            Total dues till today.
                                        </span>
                                    </small>

                                </td>

                                <td class="prog" style="text-align:right;">
                                    <div
                                        style="border:1px solid purple; poisition:relative; margin:auto; text-align:center; border-radius:50%; height:72px; width:72px; background-image: conic-gradient(var(--dark) 0deg, var(--dark) <?php echo $deg; ?>deg, var(--lighter) <?php echo $deg; ?>deg, var(--lighter) 360deg);">
                                        <div
                                            style="border:1px solid purple; border-radius:50%; left:5px; top:5px; position:relative; background:var(--light); color:purple;;width:60px; height:60px; padding-top:20px;">
                                            <?php echo $perc; ?><small>%</small>
                                        </div>
                                    </div>
                                    <div class="text-center mt-2 text-small fw-bold text-success">
                                        <?php echo $cteachercls . ' <i class="bi bi-arrow-right"></i>' . $cteachersec; ?>
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <div style="font-size:11px; padding-top:8px; color:purple;">
                                        Total Collection <b><?php echo number_format($tpaid, 2, ".", ","); ?></b> <br>out of Total Dues
                                        <b><?php echo number_format($tpaya, 2, ".", ","); ?></b>.
                                    </div>
                                </td>

                                <td colspan="2">

                                    <a class="btn btn-dark text-small" style="margin-top:8px;" href="mypr.php">My Receipts</a>
                                </td>
                            </tr>
                        </table>







                    </div>
                </div>


            <?php }
        }
    }
}
?>



<script>
    function goclsp() { window.location.href = 'finclssec.php'; }
    function goclsa() { window.location.href = 'finacc.php'; }
</script>

<?php
//     }
// }