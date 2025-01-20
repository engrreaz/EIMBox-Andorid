<?php
// var_dump($ins_all_settings);
$ind = array_search('Collection', array_column($ins_all_settings, 'settings_value'));
// if ($ind != '' || $ind != null) 
{
    $sett_val = $idn . '///' .$ins_all_settings[$ind]['settings_value'];
    echo $sett_val . $userlevel;
    // if (str_contains($sett_val, $userlevel)) 
    {




        $mon = date('m');
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
                <b>Student's Payment</b>
                <div class="float-end">
                    <i class="bi bi-currency-exchange front-icon"></i>
                </div>
            </div>
            <div class="card-body card-back" onclick="goclsp()">
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

        <?php
    }
}
