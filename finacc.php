<?php
include 'inc.php';
?>

<main>
    <div class="containerx-fluid">
        <div class="card text-left" style="background:var(--darker); color:var(--lighter); border-radius:0;">
            <div class="card-body page-top-box">

                <div class="menu-icon"><i class="bi bi-coin"></i></div>
                <div class="menu-text">Cash Receivable</div>


            </div>
            <div class="card-body page-sub-box">

                <div style="font-size:40px; font-weight:700; text-align:center; ">
                    <span style="font-size:12px; font-weight:500;">BDT</span> <span id="xxl"></span>
                </div>

            </div>

        </div>

        <?php
        $cimh = 0;
        $sql0 = "SELECT sum(amount) as money  FROM transaction where sessionyear='$sy' and sccode='$sccode' and receivedby='$usr'";
        $result01x2 = $conn->query($sql0);
        if ($result01x2->num_rows > 0) {
            while ($row0 = $result01x2->fetch_assoc()) {
                $money = $row0["money"];
            }
        }

        $sql0 = "SELECT sum(amount) as money2  FROM banktrans where transtype='Deposit' and entryby='$usr'";
        $result01x3 = $conn->query($sql0);
        if ($result01x3->num_rows > 0) {
            while ($row0 = $result01x3->fetch_assoc()) {
                $money2 = $row0["money2"];
            }
        }

        $sql0 = "SELECT sum(amount) as money3  FROM banktrans where transtype='Withdraw' and entryby='$usr'";
        $result01x4 = $conn->query($sql0);
        if ($result01x4->num_rows > 0) {
            while ($row0 = $result01x4->fetch_assoc()) {
                $money3 = $row0["money3"];
            }
        }

        $cimh = ($money + $money3 - $money2) * 1 - 4832462.5;
        ?>


        <div class="card " style="background:var(--light); color:var(--dark); border-radius:0;"
            onclick="gog('<?php echo $lnk; ?>')">
            <img class="card-img-top" alt="">
            <div class="card-body">
                <div style="font-size:30px; font-weight:700; ">
                    <span style="font-size:12px; font-weight:500;">BDT</span>
                    <?php echo number_format($cimh, 2, ".", ","); ?>
                    <br><span style="font-size:11px; font-weight:400; font-style:italic;">Cash-in my hand</span>
                </div>

                <div class="input-group mb-3" id="exbox" style="display:flex">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-dash-circle-fill"></i></span>
                    <select class="form-select form-select-md " id="partid2" aria-label=".form-select-lg example"
                        style=" background:var(--lighter);">
                        <?php
                        $sql0 = "SELECT * FROM bankinfo where sccode='$sccode' and status=1 order by id";
                        $result0r = $conn->query($sql0);
                        if ($result0r->num_rows > 0) {
                            while ($row0 = $result0r->fetch_assoc()) {
                                $accid = $row0["id"];
                                $bn = $row0["bankname"];
                                $type = $row0["acctype"];
                                echo '<option value="' . $accid . '">' . $bn . ' (' . $type . ')</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3"></i></span>
                    <input type="date" id="date" class="form-control text-box" value="<?php echo date('Y-m-d'); ?>"
                        placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"
                        style=" background:var(--lighter);">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path
                                d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                        </svg>
                    </span>
                    <input type="number" id="amount" style="text-align:left;" class="form-control"
                        value="<?php echo $cimh; ?>" placeholder="Amount" aria-label="Description"
                        aria-describedby="basic-addon1">
                </div>

                <div style="text-align:right;">
                    <button id="subm" type="button" onclick="addadd();" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="addhide();" class="btn btn-danger">Cancel</button>
                    <div id="status"></div>
                </div>



            </div>
        </div>









        <?php
        $sl = 0;
        $sobar = 0;
        $sql0 = "SELECT entryby, classname, sectionname, sum(amount) as mottaka FROM stpr where sccode='$sccode' and sessionyear='$sy'  group by entryby order by entryby ";
        //echo $sql0;
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) {
            while ($row0 = $result0->fetch_assoc()) {
                $by = $row0["entryby"];
                $mottaka = $row0["mottaka"];
                $cls = $row0["classname"];
                $sec = $row0["sectionname"];
                $ico = 'iimg/' . strtolower(substr($sec, 0, 5)) . '.png';
                $lnk = "cls=" . $cls . '&sec=' . $sec;


                $month = date('m');
                $sql0 = "SELECT userid FROM usersapp where email='$by' and sccode='$sccode'";
                $result01x = $conn->query($sql0);
                if ($result01x->num_rows > 0) {
                    while ($row0 = $result01x->fetch_assoc()) {
                        $tid = $row0["userid"];
                    }
                }

                $sql0 = "SELECT * FROM teacher where tid='$tid' and sccode='$sccode' ";
                $result01xg = $conn->query($sql0);
                if ($result01xg->num_rows > 0) {
                    while ($row0 = $result01xg->fetch_assoc()) {
                        $tname = $row0["tname"];
                    }
                }

                $sql0 = "SELECT * FROM areas where classteacher='$tid' and user='$rootuser' ";
                $result01xg = $conn->query($sql0);
                if ($result01xg->num_rows > 0) {
                    while ($row0 = $result01xg->fetch_assoc()) {
                        $ccc = $row0["areaname"];
                        $sss = $row0["subarea"];
                    }
                } else {
                    $ccc = '';
                    $sss = '';
                }

                $sql0 = "SELECT sum(amount) as paytaka FROM transaction where receivedfrom='$by' and sccode='$sccode' and classname !='Cashbook' ";
                $result01xgr = $conn->query($sql0);
                if ($result01xgr->num_rows > 0) {
                    while ($row0 = $result01xgr->fetch_assoc()) {
                        $paytaka = $row0["paytaka"];
                    }
                }







                $mottaka = $mottaka - $paytaka;
                $sobar += $mottaka;
                if ($mottaka > 0) {
                    ?>
                    <div class="card " style="background:var(--lighter); color:var(--dark); border-radius:0;"
                        onclick="gog('<?php echo $lnk; ?>')">
                        <img class="card-img-top" alt="">
                        <div class="card-body">
                            <div style="font-size:30px; font-weight:700; ">
                                <span style="font-size:12px; font-weight:500;">BDT</span>
                                <?php echo number_format($mottaka, 2, ".", ","); ?>
                            </div>
                            <div style="font-size:11px; font-style:italic; color:gray; line-height:15px;">
                                <div id="from<?php echo $sl; ?>"><?php echo $by; ?></div>
                                <div style="font-size:14px; font-weight:600; color:var(--dark); font-style:normal;">
                                    <?php echo $tname; ?>
                                </div>
                            </div>

                            <input id="cls<?php echo $sl; ?>" value="<?php echo $ccc; ?>"
                                style="border:1px solid gray; border-radius: 4px; padding:5px; width:100px; margin-top:5px;"
                                disabled />
                            <input id="sec<?php echo $sl; ?>" value="<?php echo $sss; ?>"
                                style="border:1px solid gray; border-radius: 4px; padding:5px; width:150px; margin-top:5px;;"
                                disabled />

                            <table style="width:100%; margin-top:5px;">
                                <tr>
                                    <td style="width:50%">
                                        <input style="text-align:left; font-size:20px;" id="amt<?php echo $sl; ?>" type="text"
                                            class="input form-control" id="taka" value="<?php echo $mottaka; ?>" />
                                    </td>

                                </tr>
                                <tr>
                                    <td style="font-size:11px; font-style:italic;">Amount Receive</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="btnbox<?php echo $sl; ?>" class="mt-2"><button class="btn btn-warning btn-block"
                                                onclick="pay(<?php echo $sl; ?>)"> Received by Me</button></div>
                                    </td>
                                </tr>
                            </table>


                        </div>
                    </div>
                    <div style="height:2px;"></div>
                <?php }
                $sl++;
            }
        }




        $num = 1;
        $sql0 = "SELECT entryby, sum(income) as iii, sum(expenditure) as eee FROM cashbook where sessionyear='$sy' and sccode='$sccode' and entryby!='System-Auto' group by entryby";
        $result01xe = $conn->query($sql0);
        if ($result01xe->num_rows > 0) {
            while ($row0 = $result01xe->fetch_assoc()) {
                $eby = $row0["entryby"];
                $iii = $row0["iii"];
                $eee = $row0["eee"];

                $sql0 = "SELECT sum(amount) as paytaka FROM transaction where receivedfrom='$eby' and sccode='$sccode' and classname='Cashbook' ";
                $result01xgrl = $conn->query($sql0);
                if ($result01xgrl->num_rows > 0) {
                    while ($row0 = $result01xgrl->fetch_assoc()) {
                        $paytakas = $row0["paytaka"];
                    }
                }



                $bbb = $iii - $eee - $paytakas;
                if ($bbb > 0) { //$sobar += $bbb;
                    ?>

                    <div class="card " style="background:var(--lighter); color:var(--dark); border-radius:0;"
                        onclick="gog('<?php echo $lnk; ?>')">
                        <img class="card-img-top" alt="">
                        <div class="card-body">
                            <div style="font-size:30px; font-weight:700; ">
                                <span style="font-size:12px; font-weight:500;">BDT</span>
                                <?php echo number_format($bbb, 2, ".", ","); ?>
                            </div>
                            <div style="font-size:11px; font-style:italic; color:gray; line-height:15px;">
                                <div id="from<?php echo $num; ?>"><?php echo $eby; ?></div>
                            </div>

                            <table style="width:100%; margin-top:5px;">
                                <tr>
                                    <td style="width:50%">
                                        <input style="text-align:left; onchange=" db(<?php echo $num; ?>);" font-size:20px;"
                                            id="amtt<?php echo $num; ?>" type="text" class="input form-control" id="taka"
                                            value="<?php echo $bbb; ?>" />
                                    </td>

                                </tr>
                                <tr>
                                    <td style="font-size:11px; font-style:italic;">Amount Receive</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="btnbox2<?php echo $num; ?>" class="mt-2"><button class="btn btn-info btn-block"
                                                onclick="pay2('<?php echo $num; ?>')"> Received by Me</button></div>
                                    </td>
                                </tr>
                            </table>


                        </div>
                    </div>
                    <div style="height:2px;"></div>

                    <?php

                }

            }
        }


        ?>


    </div>

</main>

<div style="height:52px;"></div>


<script>
    document.getElementById("xxl").innerHTML = "<?php echo number_format($sobar, 2, ".", ","); ?>";


    function go(id) {
        window.location.href = "finstudents.php?" + id;
    }

    function db(sl) {
        amt = document.getElementById("amtt" + sl).value;
        alert(amt);
        if (amt > 0) {
            document.getElementById("btnbox2" + sl).style.display = 'block';
        } else {
            document.getElementById("btnbox2" + sl).style.display = 'none';
        }
    }


    function pay(sl) {
        var cls = document.getElementById("cls" + sl).value;
        var sec = document.getElementById("sec" + sl).value;
        var from = document.getElementById("from" + sl).innerHTML;
        var amt = document.getElementById("amt" + sl).value;
        var id = sl;

        var infor = "user=<?php echo $usr; ?>&sccode=<?php echo $sccode; ?>&sy=<?php echo $sy; ?>&cls=" + cls + "&sec=" + sec + "&from=" + from + "&amt=" + amt + "&tail=0";
        //	alert(infor);
        $("#btnbox" + id).html("");

        $.ajax({
            type: "POST",
            url: "paymentreceived.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#btnbox' + id).html('Please Wait...');
            },
            success: function (html) {
                $("#btnbox" + id).html(html);
            }
        });
    }




    function pay2(sl) {
        var from = document.getElementById("from" + sl).innerHTML;
        var amt = document.getElementById("amtt" + sl).value;

        var infor = "user=<?php echo $usr; ?>&sccode=<?php echo $sccode; ?>&sy=<?php echo $sy; ?>&cls=Cashbook&sec=&from=" + from + "&amt=" + amt + "&tail=1";
        //  alert(infor);		
        $("#btnbox2" + sl).html("-----------------------");
        // alert(infor);
        $.ajax({
            type: "POST",
            url: "paymentreceived.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#btnbox2' + sl).html('Please Wait...');
            },
            success: function (html) {
                $("#btnbox2" + sl).html(html);
            }
        });
    }
</script>

<script>
    function addadd() {
        document.getElementById("subm").disabled = true;
        var partid2 = document.getElementById("partid2").value;
        var date = document.getElementById("date").value;
        var amount = document.getElementById("amount").value;
        var infor = "date=" + date + "&partid2=" + partid2 + "&amount=" + amount + "&tail=0";
        // alert(infor);

        $("#status").html("");
        $.ajax({
            type: "POST",
            url: "savebanktrans.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $("#status").html('<div style="padding-top:5px;"><i class="material-icons" style="font-size:35px;color:black;">save</i></div>');
            },
            success: function (html) {
                $("#status").html(html);
                //window.location.href='index.php';
                document.getElementById("partid1").value = "0";
                document.getElementById("partid2").value = "0";
                document.getElementById("date").value = '';
                document.getElementById("descrip").value = '';
                document.getElementById("amount").value = '';
                addhide();
            }
        });
    }
</script>

</body>

</html>