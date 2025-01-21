<?php
include 'inc.php';

// $month = $_GET['m'] ?? 0;
// $year = $_GET['y'] ?? 0;

// $refno = $_GET['ref'] ?? 0;
// $undef = $_GET['undef'] ?? 99;


if (isset($_GET['year'])) {
    $year = $_GET['year'];
} else {
    $year = date('Y');
}

if (isset($_GET['cls'])) {
    $cls2 = $_GET['cls'];
} else {
    $cls2 = '';
}
if (isset($_GET['sec'])) {
    $sec2 = $_GET['sec'];
} else {
    $sec2 = '';
}
if (isset($_GET['roll'])) {
    $roll2 = $_GET['roll'];
} else {
    $roll2 = '';
}

$cls2 = trim($cls2);
$sec2 = trim($sec2);

$sql0x = "SELECT stid  FROM sessioninfo where  sccode='$sccode' and sessionyear LIKE '$year%' and classname='$cls2' and sectionname='$sec2' and rollno='$roll2' order by id desc limit 1 ;";
$result0xxdr = $conn->query($sql0x);
if ($result0xxdr->num_rows > 0) {
    while ($row0x = $result0xxdr->fetch_assoc()) {
        $stid = $row0x['stid'];
    }
} else {
    $stid = '';
}




$status = 0;

if (isset($_GET['addnew'])) {
    $newblock = 'block';
    $exid = $_GET['addnew'];
    if ($exid == '') {
        $exid = 0;
    }
} else {
    $newblock = 'none';
    $exid = 0;
}
// $newblock = 'block';

$classnamelist = ' playnurseryonetwothreefourfivesixseveneightnineten';
$sql0x = "SELECT count(*) as cnt FROM sessioninfo where  sccode='$sccode' and sessionyear LIKE '$year%'  ;";
$result0xxd = $conn->query($sql0x);
if ($result0xxd->num_rows > 0) {
    while ($row0x = $result0xxd->fetch_assoc()) {
        $tsc = $row0x['cnt'];
    }
}

$finsetup = array();
$sql0x = "SELECT * FROM financesetup where sccode='$sccode' and sessionyear LIKE '%$year%' order by slno;";
// echo $sql0x;
$result0x = $conn->query($sql0x);
if ($result0x->num_rows > 0) {
    while ($row0x = $result0x->fetch_assoc()) {
        $finsetup[] = $row0x;
    }
}


$finsetupval = array();
$sql0x = "SELECT * FROM financesetupvalue where sccode='$sccode' and sessionyear LIKE '%$year%' order by slno;";
// echo $sql0x;
$result0xval = $conn->query($sql0x);
if ($result0xval->num_rows > 0) {
    while ($row0x = $result0xval->fetch_assoc()) {
        $finsetupval[] = $row0x;
    }
}
$cntcode = count($finsetupval);


$finsetupind = array();
$sql0x = "SELECT * FROM financesetupind where sccode='$sccode' and sessionyear LIKE '%$year%' and stid='$stid' order by slno;";
// echo $sql0x;
$result0xvalst = $conn->query($sql0x);
if ($result0xvalst->num_rows > 0) {
    while ($row0x = $result0xvalst->fetch_assoc()) {
        $finsetupind[] = $row0x;
    }
}
// var_dump($finsetupind);

$clslist = array();
$sql0x = "SELECT areaname, slot, sessionyear FROM areas where user='$rootuser' and sessionyear like '$year%' group by areaname order by idno ;";
$result0xxt = $conn->query($sql0x);
if ($result0xxt->num_rows > 0) {
    while ($row0x = $result0xxt->fetch_assoc()) {
        $clslist[] = $row0x;
    }
}

$seclist = array();
$sql0x = "SELECT areaname, subarea FROM areas where user='$rootuser' and sessionyear like '$year%' group by areaname, subarea order by idno ;";
$result0xxt = $conn->query($sql0x);
if ($result0xxt->num_rows > 0) {
    while ($row0x = $result0xxt->fetch_assoc()) {
        $seclist[] = $row0x;
    }
}

$frval = array('10', '11', '12', '22', '33', '44', '66', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
$frtxt = array('October', 'November', 'December', 'Two Months Frequency', 'Quarterly', 'Four Months Frequency', 'Half-Yearly', 'Every Month', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September');

?>
<style>
    thead th {
        position: sticky;
        top: 0;
    }

    #prog.fade {
        opacity: 1;
        transition: opacity 2s;
    }

    #prog {
        opacity: 0;
        transition: opacity 3s;
    }

    .pointer {
        cursor: pointer;
    }
</style>


<main>
    <div class="containerx-fluid">

        <div class="card page-top-box">
            <div class="card-body">
                <div class="menu-icon"><i class="bi bi-coin"></i></div>
                <div class="menu-text"> Indivisual Payment Setup </div>
            </div>
        </div>

        <div class="card page-info-box">
            <div class="card-body">
                <table width="100%" style="color:white;">

                    <tr>
                        <td>
                            <div style="font-size:36px; font-weight:700; line-height:15px;" id="cntamt"></div>
                            <div
                                style="color:var(--light); font-size:12px; font-weight:400; font-style:italic; line-height:40px;">
                                Cash-in-hand</div>
                        </td>
                        <td style="text-align:right;">
                            <div style="font-size:24px; font-weight:700; line-height:20px;" id="cnt"></div>
                            <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No. of
                                Receipt</div>

                            <div style="font-size:11px; color:graylight; font-style:italic; ">Total Collections : <span
                                    style="font-weight:700;  font-style:normal;" id="collection"></span></div>
                            <div style="font-size:11px; color:graylight;  font-style:italic;">To Accountants : <span
                                    style="font-weight:700; font-style:normal; " id="accountant"></span></div>

                        </td>
                    </tr>

                </table>

                <button class="btn btn-info" onclick="updatesync();">Update</button>

            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <h6>Select Student to setup Fees and Payments</h6>

                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label text-small">Session</label>

                        <select class="form-control " id="year">
                            <option value="0"></option>
                            <?php
                            for ($y = date('Y'); $y >= 2024; $y--) {
                                $flt2 = '';
                                if ($year == $y) {
                                    $flt2 = 'selected';
                                }
                                echo '<option value="' . $y . '"' . $flt2 . '>' . $y . '</option>';
                            }
                            ?>
                        </select>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label text-small">Class :</label>

                        <select class="form-control" id="cls" onchange="go();">
                            <option value="">---</option>
                            <?php
                            $sql0x = "SELECT areaname FROM areas where user='$rootuser' and sessionyear='$year' group by areaname order by idno;";
                            $result0x = $conn->query($sql0x);
                            if ($result0x->num_rows > 0) {
                                while ($row0x = $result0x->fetch_assoc()) {
                                    $cls = $row0x["areaname"];
                                    if ($cls == $cls2) {
                                        $selcls = 'selected';
                                    } else {
                                        $selcls = '';
                                    }
                                    echo '<option value="' . $cls . '" ' . $selcls . ' >' . $cls . '</option>';
                                }
                            }
                            ?>

                        </select>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label text-small">Section</label>

                        <select class="form-control " id="sec" onchange="go();">
                            <option value="">---</option>
                            <?php
                            $sql0x = "SELECT subarea FROM areas where user='$rootuser' and sessionyear='$year' and areaname='$cls2' group by subarea order by idno;";
                            // echo $sql0x;
                            $result0r = $conn->query($sql0x);
                            if ($result0r->num_rows > 0) {
                                while ($row0x = $result0r->fetch_assoc()) {
                                    $sec = $row0x["subarea"];
                                    if ($sec == $sec2) {
                                        $selsec = 'selected';
                                    } else {
                                        $selsec = '';
                                    }
                                    echo '<option value="' . $sec . '" ' . $selsec . ' >' . $sec . '</option>';
                                }
                            }
                            ?>
                        </select>

                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group row">

                        <label class="col-form-label text-small">Roll No.</label>
                        <input type="text" id="roll" class="form-control " value="<?php echo $roll2; ?>">

                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group row">


                        <button type="button" style="padding:4px 10px 6px; border-radius:5px;"
                            class="btn btn-lg btn-inverse-primary btn-icon-text btn-block pt-2 pb-2" style=""
                            onclick="go();"> Show Payment Items </button>

                    </div>
                </div>

                <div class="col-md-12" hidden>
                    <?php echo $stid; ?>
                </div>




            </div>
        </div>





        <div style="height:8px;"></div>

        <div class="card ">
            <?php


            foreach ($finsetup as $finitem) {
                $itemcode = $finitem['itemcode'];
                $freq = $finitem['month'];
                $slot = $finitem['slot'];
                $idu = $finitem['id'];

                $finvalcode = array();
                $amt = 0;
                $id1 = 0;
                $syear = $sy;
                for ($i = 0; $i < $cntcode; $i++) {
                    if ($finsetupval[$i]['itemcode'] == $itemcode) {
                        $finvalcode[] = $finsetupval[$i];
                        if ($finsetupval[$i]['classname'] == NULL && $finsetupval[$i]['sectionname'] == NULL) {
                            $amt = $finsetupval[$i]['amount'];
                            $id1 = $finsetupval[$i]['id'];
                        }


                        $ind_ind = array_search($itemcode, array_column($finsetupind, 'itemcode'));
                        if ($ind_ind != '' || $ind_ind != NULL) {
                            $amt = $finsetupind[$ind_ind]['amount'];
                            $ind_id = $finsetupind[$ind_ind]['id'];
                        } else {
                            $ind_id = 0;
                        }
                        // echo $ind_id;
                    }
                }
                $arrcnt = count($finvalcode);
                // var_dump($finvalcode);
            
                if ($freq > 0 && $freq < 13) {
                    $txt_color = 'info';
                    if ($freq == 1) {
                        $txt_color = 'muted';
                    }
                } else {
                    $txt_color = 'warning';
                }
                ?>

                <div class="card">
                    <div class="card-header" id="item<?php echo $itemcode; ?>">
                        <div class="row">
                            <div class="col p-0 m-0 d-flex">
                                <div class="pointer">
                                    <i id="chev<?php echo $itemcode; ?>" class="mdi mdi-chevron-right text-success mdi-24px"
                                        onclick="itemsx('<?php echo $itemcode; ?>');"></i>
                                </div>
                                <div class="ml-3 pointer " onclick="itemsx('<?php echo $itemcode; ?>');">
                                    <h6 class="p-0 m-0"><?php echo $finitem['particulareng']; ?></h6>
                                    <div class="text-small text-muted m-0 p-0">
                                        <?php echo $finitem['particularben']; ?> <span
                                            class="text-<?php echo $txt_color; ?>">
                                            <b> (<?php echo str_replace($frval, $frtxt, $freq); ?>)</b></span>
                                    </div>
                                </div>


                            </div>
                            <div class="col p-0">
                                <div class="form-group m-0 p-0 d-flex">
                                    <div id="status<?php echo $itemcode; ?>">
                                        <button class="btn  pt-2  mr-3"><i class="bi bi-check"></i></button>

                                    </div>
                                    <input type="text" id="id<?php echo $itemcode; ?>" value="<?php echo $id1; ?>" hidden />



                                    <div class="input-group">
                                        <input type="text" class="form-control m-0 text-right"
                                            id="amt<?php echo $itemcode; ?>" value="<?php echo $amt; ?>" onclick="no();"
                                            onblur="upddata('<?php echo $slot; ?>','<?php echo $syear; ?>', '<?php echo $itemcode; ?>','','', <?php echo $ind_id; ?>);;" />

                                        <div class="input-group-apend ">
                                            <button class="btn btn-inverse-success  p-2" type="button"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                onclick="upddata('<?php echo $slot; ?>','<?php echo $syear; ?>', '<?php echo $itemcode; ?>','','', <?php echo $ind_id; ?>);;"
                                                aria-expanded="false"><i class="mdi mdi-content-save"></i></button>

                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <?php

            }
            ?>



        </div>






    </div>
</main>
<div style="height:52px;"></div>


</div>

<script>


    function go() {
        var year = document.getElementById('year').value;
        var sec = document.getElementById('sec').value;
        var cls = document.getElementById('cls').value;
        var roll = document.getElementById('roll').value;
        window.location.href = 'st-payment-setup-indivisual.php?sec=' + sec + '&cls=' + cls + '&year=' + year + '&roll=' + roll;
    }



    function edits(idn) {
        window.location.href = 'st-payment-setup-2.php?&addnew=' + idn;
    }



</script>
<script>
    function push(idfin, id, cls, tail) {
        var taka = document.getElementById(tail).value;
        var infor = "idfin=" + idfin + "&id=" + id + "&cls=" + cls + "&taka=" + taka;
        // alert(id + '/' + tail);
        $("#div" + tail).html("");

        $.ajax({
            url: "backend/set-finance.php", type: "POST", data: infor, cache: false,
            beforeSend: function () {
                $("#div" + tail).html('<span class=""><small></small></span>');
            },
            success: function (html) {
                $("#div" + tail).html(html);
                if (document.getElementById("div" + tail).innerHTML == 'insert') {
                    window.location.href = 'st-payment-setup.php';
                }
                document.getElementById(tail).style.borderColor = 'green';
            }
        });
    }
</script>
<script>
    function upddata(slot, sy, item, cls, sec, indid) {


        ind = item + cls + sec;
        // alert(ind);
        var amt = document.getElementById('amt' + ind).value;
        var id = document.getElementById('id' + ind).value;
        var stid = <?php echo $stid; ?>;
        // alert(indid);
        var infor = "id=" + id + "&slot=" + slot + "&sy=" + sy + "&item=" + item + "&cls=" + cls + "&sec=" + sec + "&amt=" + amt + "&stid=" + stid + "&indid=" + indid;
        alert(infor);
        $("#status" + ind).html("");

        $.ajax({
            url: "backend/crud-set-financed-ind.php", type: "POST", data: infor, cache: false,
            beforeSend: function () {
                $("#status" + ind).html('<span class=""><small></small></span>');
            },
            success: function (html) {
                $("#status" + ind).html(html);
                // window.location.href = 'st-payment-setup.php';
                // if (document.getElementById("div" + tail).innerHTML == 'insert') {
                //     window.location.href = 'st-payment-setup.php';
                // }
                document.getElementById('amt' + ind).disabled = true;

            }
        });
    }
</script>

<script>
    function preloads(type, part, icode, stid, cls, sec, tail) {
        ind = icode + cls + sec;
        var infor = "type=" + type + "&part=" + part + "&icode=" + icode + "&stid=" + stid + "&cls=" + cls + "&sec=" + sec + "&tail=" + tail;
        // alert(infor);
        $("#status" + ind).html("");
        $.ajax({
            type: "POST",
            url: "backend/check-student-finance-pre.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $("#status" + ind).html('<i class="mdi mdi-autorenew"></i>');
            },
            success: function (html) {
                $("#status" + ind).html(html);
                // alert(type);
                window.location.href = 'sync-payment.php?' + infor;
            }
        });
    }
</script>

<script>
    function del(id, tail) {
        var x = confirm("Are you sure to delete?");
        if (x === true) {
            crud(id, tail);
        }
    }

    function crud(id, tail) {
        var eng = document.getElementById('peng').value;
        var ben = document.getElementById('pben').value;
        var month = document.getElementById('monmon').value;
        var inin = document.getElementById('inin').checked;
        var exex = document.getElementById('exex').checked;
        var infor = "id=" + id + "&tail=" + tail + "&eng=" + eng + "&ben=" + ben + "&month=" + month + "&inin=" + inin + "&exex=" + exex;
        // alert(infor);

        $("#gex").html("");

        $.ajax({
            url: "backend/crud-set-finance-add.php", type: "POST", data: infor, cache: false,
            beforeSend: function () {
                $("#gex").html('<span class=""><small></small></span>');
            },
            success: function (html) {
                $("#gex").html(html);

                window.location.href = 'st-payment-setup-2.php';

                // if (document.getElementById("div" + tail).innerHTML == 'insert') {
                //     window.location.href = 'st-payment-setup.php';
                // }
                // document.getElementById(tail).style.borderColor = 'green';
            }
        });
    }
</script>


<script>
    function myg() {
        document.getElementById("prog").classList.toggle('fade');
        document.getElementById("prog").style.display = 'none';
        document.getElementById("more").innerHTML = '';
        document.getElementById("gexx").innerHTML = '';
    }
    function done() {
        setTimeout(myg, 2000);
    }
</script>

<script>
    function syncfinance(id, tail) {
        document.getElementById("more").innerHTML = "";
        document.getElementById("prog").style.display = 'flex';
        document.getElementById("progbar").style.width = '0%';
        var tsc = parseInt(<?php echo $tsc; ?>);
        var freq = parseInt(document.getElementById("freq" + id).innerHTML);
        if (freq == 0) {
            // document.getElementById("tsc").innerHTML = tsc * 12;
        }
        document.getElementById("progx").focus();
        // document.getElementById("prog").style.opacity = "1";
        document.getElementById("prog").classList.add('fade');
        syncfinance2(id, tail);
    }

    function syncfinancech(id, tail) {
        document.getElementById("more").innerHTML = "";
        document.getElementById("prog").style.display = 'flex';
        document.getElementById("progbar").style.width = '0%';
        var tsc = parseInt(<?php echo $tsc; ?>);
        var freq = parseInt(document.getElementById("freq" + id).innerHTML);
        if (freq == 0) {
            // document.getElementById("tsc").innerHTML = tsc * 12;
        }
        document.getElementById("progx").focus();
        // document.getElementById("prog").style.opacity = "1";
        document.getElementById("prog").classList.add('fade');
        syncfinancech2(id, tail);
    }

    function syncfinance2(id, tail) {
        var mor = document.getElementById("more").innerHTML;
        var txt = document.getElementById("tags" + id).innerHTML;
        // alert("repeta" + mor);
        if (mor == '') { document.getElementById("more").innerHTML = 0; }
        var infor = "id=" + id + "&tail=" + tail + "&vcl=<?php echo $valid_class_list; ?>";
        // alert(infor);
        $("#gexx").html("----------");

        // setInterval(function () {
        //     var object = document.getElementById('spn' + id);
        //     object.style.transform += "rotate(10deg)";
        // }, 10);

        $.ajax({
            url: "backend/sync-finance-amount-slow.php", type: "POST", data: infor, cache: false,
            beforeSend: function () {
                $("#gexx").html('<span class=""><small>Please wait, data syncing continue. It may take some time...</small> <br><span class="text-success">' + txt + '</span> </span>');
            },
            success: function (html) {
                $("#gexx").html(txt + '<br>' + html);
                var more = document.getElementById("more").innerHTML;
                let position = more.search("Done");
                if (position < 0) {
                    var curval = parseInt(more);
                    var totval = parseInt(document.getElementById("tsc").innerHTML);
                    var perc = curval * 100 / totval;
                    document.getElementById("progbar").style.width = perc + '%';
                    syncfinance2(id, tail);
                } else {
                    document.getElementById("progbar").style.width = '100%';
                    document.getElementById("gexx").innerHTML = txt;
                    document.getElementById("more").innerHTML = 'Payment Updated Successfully.';
                    document.getElementById("prog").classList.toggle('fade');
                    done();
                }
                // window.location.href = 'st-payment-setup.php';
                // if (document.getElementById("div" + tail).innerHTML == 'insert') {
                //     window.location.href = 'st-payment-setup.php';
                // }
                // document.getElementById(tail).style.borderColor = 'green';
            }
        });
    }

    function syncfinancech2(id, tail) {
        var mor = document.getElementById("more").innerHTML;
        var txt = document.getElementById("tags" + id).innerHTML;
        alert("repeta" + mor);
        if (mor == '') { document.getElementById("more").innerHTML = 0; }
        var infor = "id=" + id + "&tail=" + tail + "&vcl=<?php echo $valid_class_list; ?>";
        alert(infor);
        $("#gexx").html("----------");

        // setInterval(function () {
        //     var object = document.getElementById('spn' + id);
        //     object.style.transform += "rotate(10deg)";
        // }, 10);

        $.ajax({
            url: "backend/sync-finance-check.php", type: "POST", data: infor, cache: false,
            beforeSend: function () {
                $("#gexx").html('<span class=""><small>Please wait, data syncing continue. It may take some time...</small> <br><span class="text-success">' + txt + '</span> </span>');
            },
            success: function (html) {
                $("#gexx").html(txt + '<br>' + html);
                var more = document.getElementById("more").innerHTML;
                let position = more.search("Done");
                if (position < 0) {
                    var curval = parseInt(more);
                    var totval = parseInt(document.getElementById("tsc").innerHTML);
                    var perc = curval * 100 / totval;
                    document.getElementById("progbar").style.width = perc + '%';
                    syncfinance2(id, tail);
                } else {
                    document.getElementById("progbar").style.width = '100%';
                    document.getElementById("gexx").innerHTML = txt;
                    // document.getElementById("more").innerHTML = 'Payment Checked Successfully.';
                    document.getElementById("prog").classList.toggle('fade');
                    // done();
                }
                // window.location.href = 'st-payment-setup.php';
                // if (document.getElementById("div" + tail).innerHTML == 'insert') {
                //     window.location.href = 'st-payment-setup.php';
                // }
                // document.getElementById(tail).style.borderColor = 'green';
            }
        });
    }
</script>


<script>
    function no() {
        event.stopPropagation();
    }

    function items(code) {
        event.stopPropagation();
        var els = document.getElementById("itemex" + code);
        var chev = document.getElementById("chev" + code);
        if (els.style.display === 'block') {
            els.style.display = 'none';
            chev.classlist.remove("mdi-chevron-right");
            chev.classlist.add("mdi-chevron-down");
        } else {
            els.style.display = 'block';
            chev.classlist.remove("mdi-chevron-down");
            chev.classlist.add("mdi-chevron-right");
        }
    }


    function cls(code) {
        event.stopPropagation();
        var els = document.getElementById("clsex" + code);
        if (els.style.display === 'block') {
            els.style.display = 'none';
        } else {
            els.style.display = 'block';
        }
    }
    function sec(code) {
        event.stopPropagation();
        var els = document.getElementById("secex" + code);
        if (els.style.display === 'block') {
            els.style.display = 'none';
        } else {
            els.style.display = 'block';
        }
    }



</script>
<script>
    function defitem() {
        // event.stopPropagation();
        // alert(1);
        // doucment.getElementById("newblock").style.display = "block";
        // alert(1);
        crud(0, 5);
    }


    function updatesync() {
       window.location.href = "https://dashboard.eimbox.com/sync-payment.php?type=stid&part=&icode=&stid=<?php echo $stid;?>&cls=&sec=&tail=10"
    }
</script>