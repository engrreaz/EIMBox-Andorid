<?php
include 'inc.php';
include 'datam/datam-stprofile.php';
$stid = $_GET['id'];
if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
} else {
    $edit = 0;
}
$tamt = 0;
?>

<main>

    <?php
    $cnt = 0;
    $sql0 = "SELECT * FROM sessioninfo where sessionyear='$sy' and sccode='$sccode' and stid='$stid'";
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
        while ($row0 = $result0->fetch_assoc()) {
            $stid = $row0["stid"];
            $rollno = $row0["rollno"];
            $card = $row0["icardst"];
            $dtid = $row0["id"];
            $status = $row0["status"];
            $rel = $row0["religion"];
            $four = $row0["fourth_subject"];
            $ccc = $row0["classname"];
            $sss = $row0["sectionname"];
            $lastpr = $row0["lastpr"];

            $sector = $row0["sector"];
            $rate = $row0["rate"];


            $pth = '../students/' . $stid . '.jpg';
            if (file_exists($pth)) {
                $pth = 'https://eimbox.com/students/' . $stid . '.jpg';
            } else {
                $pth = 'https://eimbox.com/students/noimg.jpg';
            }

            $st_ind = array_search($stid, array_column($datam_st_profile, 'stid'));
            $neng = $datam_st_profile[$st_ind]["stnameeng"];
            $nben = $datam_st_profile[$st_ind]["stnameben"];
            $vill = $datam_st_profile[$st_ind]["previll"];
            $mobileno = $datam_st_profile[$st_ind]["guarmobile"];

        }
    }
    if ($lastpr > 0) {
        $prno = $lastpr + 1;
    } else {
        $prno = ($sy % 100) * 1000000 + ($stid % 10000) * 100 + 1;
    }

    ?>

    <div class="containerx-fluid" >
        <div style="position:relative; z-index:99; width:100%;">
            <div class="card text-start page-top-box ">
                <div class="card-body">
                    <table width="100%" style="color:white;">
                        <tr>
                            <td>
                                <div class="menu-icon"> <i class="bi bi-clock-history"></i> </div>
                                <div class="menu-text"> Student's Payment History </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card text-start page-info-box ">
                <div class="card-body">
                    <table width="100%" style="color:white;">
                        <tr>
                            <td colspan="2">
                                <div class="d-flex pt-2 pb-2">
                                    <img class="st-pic-normal" src="<?php echo $pth; ?>" />

                                    <div class="ms-3 ">
                                        <div class="stname-eng"><?php echo $neng; ?></div>
                                        <div class="stname-ben"><?php echo $nben; ?></div>
                                        <div class="st-id">Id # <?php echo $stid; ?></div>
                                        <div class="roll-no">Roll #<?php echo $rollno; ?></div>
                                        <div class="roll-no">class : <b><?php echo strtoupper($ccc);
                                        ; ?></b> <i class="bi bi-arrow-right-circle-fill"></i>
                                            <b><?php echo strtoupper($sss); ?></b>
                                        </div>

                                        <div class="mt-3">
                                            <div style="font-size:36px; font-weight:700; line-height:20px;" id="cnt">
                                                0.00
                                            </div>
                                            <div
                                                style="color: var(--light); font-size:12px; font-weight:400; font-style:italic; line-height:30px;">
                                                Total
                                                Paid</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


            <div style="height:8px;"></div>

            <!--
            <div style="height:400px;"></div>
            <?php if ($edit == 1) {
                echo '<div style="height:120px;"></div>';
            } ?>
            -->


            <?php

            $sql00 = "SELECT * FROM stpr where  sccode='$sccode' and sessionyear = '$sy' and stid='$stid' order by prdate";
            $result00t = $conn->query($sql00);
            if ($result00t->num_rows > 0) {
                while ($row00 = $result00t->fetch_assoc()) {
                    $prno = $row00["prno"];
                    $prdate = $row00["prdate"];
                    $prtaka = $row00["amount"];
                    $eby = $row00["entryby"];
                    $etime = $row00["entrytime"];






                    if ($status == 0) {
                        $bgc = '--light';
                        $dsbl = ' disabled';
                        $gip = '';
                    } else {
                        $bgc = '--lighter';
                        $dsbl = '';
                        $gip = 'checked';
                    }
                    //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}
            

                    ?>
                    <div class="card text-center"
                        style="background:var(<?php echo $bgc; ?>); color:var(--darker); border-radius:0;"
                        onclick="shide(<?php echo $prno; ?>);" id="block<?php echo $stid; ?>" <?php echo $dsbl; ?>>
                        <div class="card-body">

                            <table width="100%" style="font-size:13px;">
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="text-align:right; padding-right:7px;">PR No :</td>
                                                <td><b><?php echo $prno; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right; padding-right:7px;">Date :</td>
                                                <td><b><?php echo date('d/m/Y', strtotime($prdate)); ?></b></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <button type="button"
    class="btn btn-sm btn-primary"
    onclick="epos('<?php echo $prno; ?>', event)">
    Edit
</button>
                                    </td>
                                    <td rowspan="2" style="text-align:right; font-size:20px; color:seagreen;">
                                        <b><?php echo number_format($prtaka, "2", ".", ","); ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color:#aaa; font-size:13px; text-align:left; line-height:15px; padding-left:50px;">
                                        <small><?php echo $eby . '<br>@ <b>' . date('d/m/Y H:i:s', strtotime($etime)); ?></b></small>
                                    </td>
                                </tr>
                            </table>

                            <div id="hde<?php echo $prno; ?>" style="display:none;">

                                <hr>

                                <table width="100%">
                                    <?php
                                    $cnt = 0;

                                    $month = date('m');
                                    $sql0 = "SELECT * FROM stfinance where sessionyear='$sy' and sccode='$sccode' and stid='$stid' and (pr1no='$prno' || pr2no = '$prno') order by id";
                                    $result0 = $conn->query($sql0);
                                    if ($result0->num_rows > 0) {
                                        while ($row0 = $result0->fetch_assoc()) {
                                            $fid = $row0["id"];
                                            $stid = $row0["stid"];
                                            $peng = $row0["particulareng"];
                                            $pben = $row0["particularben"];
                                            $amount = $row0["amount"];
                                            $payable = $row0["payableamt"];
                                            $paid = $row0["paid"];
                                            $dues = $row0["dues"];
                                            $amtval = $row0["pr1"] + $row0["pr2"];

                                            $tamt = $tamt + $amtval;



                                            $cnt++;
                                            ?>



                                            <tr>
                                                <td style="text-align:left; padding-left:5px;" onclick="sell(<?php echo $cnt; ?>);">
                                                    <div style="display:none;" class="a" id="fid<?php echo $cnt; ?>"><?php echo $fid; ?>
                                                    </div>
                                                    <div class="text-small fw-bold text-dark" id="peng<?php echo $cnt; ?>"><?php echo $peng; ?></div>
                                                    <div class=" text-small text-secondary" id="pben<?php echo $cnt; ?>"><?php echo $pben; ?></div>
                                                </td>
                                                <td style="text-align:right; font-size:15px; font-weight:700; color:var(--darker);"
                                                    id="amt<?php echo $cnt; ?>"><?php echo $amtval; ?>.00</td>
                                            </tr>
                                        <?php }
                                    } ?>

                                </table>
                            </div>


                        </div>
                    </div>


                    <div style="height:5px;"></div>
                    <?php







                }
            } else {
                ?>
                <div class="card">
                    <div class="card-body bg-danger text-white text-center">
                        No Receipt Found.
                    </div>
                </div>
                <?php
            }



            ?>

            <input type="number" id="cntp" value="<?php echo $cnt; ?>" hidden />
            <input type="number" id="chk" value="0" hidden />

        </div>

</main>
<div style="height:52px;"></div>
<footer>
    <!-- place footer here -->
</footer>
<!-- Bootstrap JavaScript Libraries -->


<script>

    function more() {
        let val = document.getElementById("myswitch").checked;
        if (val == true) {
            $(".sele").show();
        } else {
            $(".sele").hide();
        }
    }


    function shide(id) {
        let vals = document.getElementById("hde" + id);
        if (vals.style.display == 'none') {
            vals.style.display = 'block';
        } else {
            vals.style.display = 'none';
        }
    }

    function grp(id) {
        var val = document.getElementById("sel" + id).value;
        var infor = "dtid=" + id + "&val=" + val + "&opt=1";
        $("#blocksel" + id).html("");

        $.ajax({
            type: "POST",
            url: "grpupd.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $("#blocksel" + id).html('<span class=""><center>Fetching Section Name....</center></span>');
            },
            success: function (html) {
                $("#blocksel" + id).html(html);
            }
        });
    }

    function grpp(id) {
        var val = document.getElementById("sel" + id).value;
        var infor = "dtid=" + id + "&val=" + val + "&opt=1";
        $("#blocksel" + id).html("");

        $.ajax({
            type: "POST",
            url: "fourupd.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $("#blocksel" + id).html('<span class=""><center>Fetching Section Name....</center></span>');
            },
            success: function (html) {
                $("#blocksel" + id).html(html);
            }
        });
    }

    function modsector(id, prt) {
        let sector = document.getElementById("sector").value;

        let rate; let infor;
        if (sector == '') { rate = 100; }
        else if (sector == 'Scholarship') { rate = 0; }
        else if (sector == 'Stipend') { rate = 0; }
        else if (sector == 'Poor') { rate = 0; }
        else if (sector == 'On Request') { rate = 50; }
        document.getElementById("rate").value = rate;

        if (prt == 0) {
            infor = "stid=" + id + "&sector=" + sector + "&rate=" + rate + "&prt=" + prt;
        } else {
            let tk = document.getElementById("rng" + id).value;
            document.getElementById("amt" + id).innerHTML = tk;
            infor = "stid=<?php echo $stid; ?>&fid=" + prt + "&tk=" + tk + "&prt=" + 1;
        }

        $("#upd").html("");

        $.ajax({
            type: "POST",
            url: "updfreefin.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $("#upd").html('.....');
            },
            success: function (html) {
                $("#upd").html(html);
            }
        });
    }




    function save() {

        let cnto = document.getElementById("cntp").value;
        cnto = parseInt(cnto) * 1;
        let chk = document.getElementById("chk").value;
        let prno = document.getElementById("prno").value;
        let prdate = document.getElementById("prdate").value;
        let aaa = document.getElementById("amt").value;
        if (aaa > 0) {
            let tail = "count=" + chk + "&stid=<?php echo $stid; ?>&rollno=<?php echo $rollno; ?>&cls=<?php echo $ccc; ?>&sec=<?php echo $sss; ?>&neng=<?php echo $neng; ?>&nben=<?php echo $nben; ?>&prno=" + prno + "&prdate=" + prdate + "&mobileno=<?php echo $mobileno; ?>";
            let run = 0;
            for (let x = 0; x < cnto; x++) {
                let ch = document.getElementById("rex" + x).checked;
                if (ch === true) {
                    let fid = document.getElementById("fid" + x).innerHTML;
                    let peng = document.getElementById("peng" + x).innerHTML;
                    let pben = document.getElementById("pben" + x).innerHTML;
                    let amt = document.getElementById("amt" + x).innerHTML;
                    tail = tail + "&fid" + run + "=" + fid + "&peng" + run + "=" + peng + "&pben" + run + "=" + pben + "&amt" + run + "=" + amt;
                    run++;
                }
            }

            var infor = tail;
            alert(tail);

            $("#btnblock").html("");

            $.ajax({
                type: "POST",
                url: "savepr.php",
                data: infor,
                cache: false,
                beforeSend: function () {
                    $("#btnblock").html('<span class=""><center></span>');
                },
                success: function (html) {
                    $("#btnblock").html(html);
                    document.location.href = "finstudents.php?cls=<?php echo $ccc; ?>&sec=<?php echo $sss; ?>";
                }
            });
        }

    }
</script>

<script>
    document.getElementById("cnt").innerHTML = "<?php echo $tamt; ?>.00";
    function go(id) {
        window.location.href = "stfinancedetails.php?id=" + id;
    }
    function edit(id) {
        window.location.href = "stfinancedetails.php?id=" + id + "&edit=1";
    }
    function editn(id) {
        window.location.href = "stfinancedetails.php?id=" + id;
    }

    function sell(id) {
        let ch = document.getElementById("rex" + id).checked;
        if (ch === true) {
            document.getElementById("rex" + id).checked = false;
        } else {
            document.getElementById("rex" + id).checked = true;
        }
        sel(id);

    }


    function sel(id) {
        let ch = document.getElementById("rex" + id).checked;

        let amt = document.getElementById("amt" + id).innerHTML;
        amt = parseInt(amt) * 1;
        let amtt = document.getElementById("amt").value * 1;
        let chk = document.getElementById("chk").value * 1;

        if (ch === true) {
            //document.getElementById("rex"+id).checked = true;
            amtt = amtt + amt;
            chk++;
        } else {
            //document.getElementById("rex"+id).checked = false;
            amtt = amtt - amt;
            chk--
        }
        document.getElementById("amt").value = amtt;
        document.getElementById("chk").value = chk;
    }



    function hazar() {

        let cnt = document.getElementById("cntp").value;
        for (let x = 0; x < cnt; x++) {
            let tx = document.getElementById("peng" + x).innerHTML;
            if (tx.includes('Admission') || tx.includes('Science') || tx.includes('Scout') ||
                tx.includes('Poor') || tx.includes('Electricity') || tx.includes('Sport') ||
                tx.includes('Develop') || tx.includes('Library') || tx.includes('Milad') ||
                tx.includes('PF') || tx.includes('Red') || tx.includes('Clean')) {
                sell(x);
            }
        }
    }

    hazar();
</script>