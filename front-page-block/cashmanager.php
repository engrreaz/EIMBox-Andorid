<div class="card gg" style="display:block;">
    <div class="card-header front-card">
        <b>Admission Test</b>
        <div class="float-end">
            <i class="bi bi-person front-icon"></i>
        </div>
    </div>
    <div class="card-body card-back" onclick="goclsp();">
        <table width="100%">
            <tr>
                <td><a class="btn btn-dark" style="border-radius: 7px;" href="admissionassess.php?sec=Joba">JOBA</a>
                </td>
                <td><a class="btn btn-dark" style="border-radius: 7px;" href="admissionassess.php?sec=Beli">BELI</a>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><a class="btn btn-info" style="border-radius: 7px;" href="admissionprocess.php">Process</a></td>
                <td><a class="btn btn-success" style="border-radius: 7px;" href="admissionresult.php">Result</a></td>
            </tr>
        </table>
    </div>
</div>




<?php
$netbalance = 0;
$sql00 = "SELECT * FROM bankinfo where sccode='$sccode' and  status=1 order by id";
$result00 = $conn->query($sql00);
if ($result00->num_rows > 0) {
    while ($row00 = $result00->fetch_assoc()) {
        $id = $row00["id"];
        $sql00 = "SELECT * FROM banktrans where  accid='$id' order by date desc limit 1";
        $result00x = $conn->query($sql00);
        if ($result00x->num_rows > 0) {
            while ($row00 = $result00x->fetch_assoc()) {
                $acctaka = $row00["balance"];
                $netbalance += $acctaka;
            }
        }

    }
}

?>


<div class="card gg">
    <div class="card-header front-card" >
    <div class="float-end">
            <i class="bi bi-coin front-icon"></i>
        </div>
        <b>Total Value (Cash)</b>
    </div>
    <div class="card-body card-back">
        <div style="float:right; position:absolute; right:20px; top:60px;">
            <svg onclick="addnew();" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--dark)"
                class="bi bi-currency-exchange" viewBox="0 0 16 16">
                <path
                    d="M0 5a5 5 0 0 0 4.027 4.905 6.5 6.5 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05q-.001-.07.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.5 3.5 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98q-.004.07-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5m16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0m-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674z" />
            </svg>

            <svg onclick="addnew2();" style="margin-left:10px;" xmlns="http://www.w3.org/2000/svg" width="32"
                height="32" fill="var(--dark)" class="bi bi-bank2" viewBox="0 0 16 16">
                <path
                    d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916zM12.375 6v7h-1.25V6zm-2.5 0v7h-1.25V6zm-2.5 0v7h-1.25V6zm-2.5 0v7h-1.25V6zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2M.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1z" />
            </svg>
        </div>



        <div>
            <table width="100%">
                <tr>
                    <td>
                        <div onclick="gocashbook();" class="nmbr"><small>BDT </small><span
                                id="dues"><?php echo number_format($netbalance, 2, ".", ","); ?></span></div>
                        <small>
                            <span style="font-style:italic; color:gray; font-size:11px;">
                                Institution Net Balance
                            </span>
                        </small>

                    </td>

                </tr>
            </table>
        </div>
    </div>





    <div id="entrybox" style="margin:15px; display:none;">
        <div
            style="z-index:999; border:1px solid var(--darker); border-radius:30px; padding:8px 25px; font-size:13px; font-weight:600; text-align:center; background : var(--darker); color:white; width:70%; margin:0 auto 10px; ">
            Income - Expenditure
        </div>
        <table border="0" style="margin:auto;">
            <tr>
                <td>Income</td>
                <td style="padding:10px 20px 0 15px;">
                    <div class="form-check form-switch">
                        <input class="form-check-input" onclick="box();" onchange="box();" type="checkbox" id="inex"
                            style="border:none;" checked />
                    </div>
                </td>
                <td>Expenditure</td>
            </tr>
        </table>



        <div class="input-group mb-3" id="inbox" style="display:none;">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
            <select class="form-select form-select-md " id="partid1" aria-label=".form-select-lg example"
                style=" background:var(--lighter);">
                <option value="0" selected>Choose Income</option>
                <?php
                $sql0 = "SELECT * FROM financesetup where sccode='$sccode' and inexin=1 order by slno";
                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) {
                    while ($row0 = $result0->fetch_assoc()) {
                        $id1 = $row0["id"];
                        $txt1 = $row0["particulareng"];
                        echo '<option value="' . $id1 . '">' . $txt1 . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <div class="input-group mb-3" id="exbox" style="display:flex">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-dash-circle-fill"></i></span>
            <select class="form-select form-select-md " id="partid2" aria-label=".form-select-lg example"
                style=" background:var(--lighter);">
                <option value="0" selected>Choose Expenditure</option>
                <?php
                $sql0 = "SELECT * FROM financesetup where sccode='$sccode' and inexex=1 order by slno";
                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) {
                    while ($row0 = $result0->fetch_assoc()) {
                        $id2 = $row0["id"];
                        $txt2 = $row0["particulareng"];
                        echo '<option value="' . $id2 . '">' . $txt2 . '</option>';
                    }
                }
                ?>
            </select>
        </div>



        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3"></i></span>
            <input type="date" id="date" class="form-control" placeholder="Description" aria-label="Description"
                aria-describedby="basic-addon1" style=" background:var(--lighter);">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-text-fill"></i></span>
            <input type="text" id="descrip" class="form-control" placeholder="Description" aria-label="Description"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-currency-dollar" viewBox="0 0 16 16">
                    <path
                        d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                </svg>
            </span>
            <input type="text" id="amount" style="text-align:right;" class="form-control" placeholder="Amount"
                aria-label="Description" aria-describedby="basic-addon1">
            <span class="input-group-text" id="basic-addon1">.00</span>
        </div>

        <button type="button" onclick="addadd();" class="btn btn-primary">Submit</button>
        <button type="button" onclick="addhide();" class="btn btn-danger">Cancel</button>
        <div id="status"></div>
    </div>



    <!--BANK TRANSACTION BOX-->
    <div id="entrybox2" style="margin:15px; display:none;">
        <div
            style="z-index:999; border:1px solid var(--darker); border-radius:30px; padding:8px 25px; font-size:13px; font-weight:600; text-align:center; background : var(--darker); color:white; width:70%; margin:0 auto 10px; ">
            Bank Management
        </div>

        <div class="input-group mb-3" id="bank" style="display:flex">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-dash-circle-fill"></i></span>
            <select class="form-select form-select-md " id="bank2" aria-label=".form-select-lg example"
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

        <div class="input-group mb-3" id="exbox">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-dash-circle-fill"></i></span>
            <select class="form-select form-select-md " id="type2" aria-label=".form-select-lg example"
                style=" background:var(--lighter);">
                <option value="0" selected>Choose Type</option>
                <?php
                $sql0 = "SELECT * FROM financesetup where sccode='$sccode' and (inexex=3 or inexex=4) order by slno";
                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) {
                    while ($row0 = $result0->fetch_assoc()) {
                        $id2 = $row0["id"];
                        $txt2 = $row0["particulareng"];
                        echo '<option value="' . $id2 . '">' . $txt2 . '</option>';
                    }
                }
                ?>
            </select>
        </div>



        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3"></i></span>
            <input type="date" id="date2" value="<?php echo date('Y-m-d'); ?>" class="form-control"
                placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"
                style=" background:var(--lighter);">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3"></i></span>
            <input type="text" id="chqno2" value="" class="form-control" placeholder="Cheque/Slip No."
                aria-label="chqno" aria-describedby="basic-addon1" style=" background:var(--lighter);">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-currency-dollar" viewBox="0 0 16 16">
                    <path
                        d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                </svg>
            </span>
            <input type="text" id="amount2" style="text-align:right;" class="form-control" placeholder="Amount"
                aria-label="Description" aria-describedby="basic-addon1">
            <span class="input-group-text" id="basic-addon1">.00</span>
        </div>

        <button type="button" onclick="addadd2();" class="btn btn-primary">Save Statement</button>
        <button type="button" onclick="addhide2();" class="btn btn-danger">Cancel</button>
        <div id="status2"></div>
    </div>




</div>





<script>
    function gocashbook() {
        window.location.href = 'bankbook.php';
    }
</script>


<script>
    function addnew() {
        if (document.getElementById("entrybox").style.display == 'none') {
            document.getElementById("entrybox").style.display = 'block';
            document.getElementById("entrybox2").style.display = 'none';
        } else {
            document.getElementById("entrybox").style.display = 'none';
        }
    }
    function addnew2() {
        if (document.getElementById("entrybox2").style.display == 'none') {
            document.getElementById("entrybox2").style.display = 'block';
            document.getElementById("entrybox").style.display = 'none';
        } else {
            document.getElementById("entrybox2").style.display = 'none';
        }
    }
</script>

<script>
    function addhide() {
        document.getElementById("entrybox").style.display = 'none';
    }
    function addhide2() {
        document.getElementById("entrybox2").style.display = 'none';
    }
</script>

<script>
    function box() {
        var inex = document.getElementById("inex").checked;
        if (inex === true) {
            document.getElementById("inbox").style.display = 'none';
            document.getElementById("exbox").style.display = 'flex';
        } else {
            document.getElementById("inbox").style.display = 'flex';
            document.getElementById("exbox").style.display = 'none';
        }
    }
</script>

<script>
    function addadd() {
        var inex = document.getElementById("inex").checked;
        var partid1 = document.getElementById("partid1").value;
        var partid2 = document.getElementById("partid2").value;
        var date = document.getElementById("date").value;
        var descrip = document.getElementById("descrip").value;
        var amount = document.getElementById("amount").value;
        var memo = 0;
        var infor = "date=" + date + "&inex=" + inex + "&partid1=" + partid1 + "&partid2=" + partid2 + "&descrip=" + descrip + "&amount=" + amount + "&memo=" + memo;

        $("#status").html("");
        $.ajax({
            type: "POST",
            url: "savecashbook.php",
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
<script>
    function addadd2() {
        var bank = document.getElementById("bank2").value;
        var chqno = document.getElementById("chqno2").value;
        var type = document.getElementById("type2").value;
        var date = document.getElementById("date2").value;
        var amount = document.getElementById("amount2").value;
        var memo = 1;
        var infor = "date=" + date + "&bank=" + bank + "&type=" + type + "&amount=" + amount + "&tail=" + memo + "&chqno=" + chqno;
        // alert(infor);
        $("#status2").html("");
        $.ajax({
            type: "POST",
            url: "savebanktrans.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $("#status2").html('<div style="padding-top:5px;"><i class="material-icons" style="font-size:35px;color:black;">save</i></div>');
            },
            success: function (html) {
                $("#status2").html(html);
                window.location.href = 'index.php';
                // document.getElementById("partid1").value = "0";
                // document.getElementById("partid2").value = "0";
                // document.getElementById("date").value = '';
                // document.getElementById("descrip").value = '';
                // document.getElementById("amount").value = '';
                // addhide2();
            }
        });
    }
</script>