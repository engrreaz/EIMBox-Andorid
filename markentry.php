<?php
include 'inc.php';
$id = $fulldone = $subj_full = $obj_full = $pra_full = $ca_full = $fullmark = 0;
$sname = '';
$classname = $_GET['cls'];
$sectionname = $_GET['sec'];

$exam = $_GET['exam'];
$subj = $_GET['sub'];
$assess = $_GET['assess'];
if(isset($_GET['id'])){
    $id = $_GET['id'];
}


$sql00 = "SELECT * FROM areas where areaname='$classname' and subarea = '$sectionname' and user='$rootuser' ";
$result00r = $conn->query($sql00);
if ($result00r->num_rows > 0) {
    while ($row00 = $result00r->fetch_assoc()) {
        $halfdone = $row00["halfdone"];
        $fulldone = $row00["fulldone"];
    }
}
if ($exam == 'Half Yearly') {
    $lock = $halfdone;
} else {
    $lock = $fulldone;
}


$sql00 = "SELECT subject FROM subjects where subcode='$subj' and sccategory = '$sctype' ";
$result00 = $conn->query($sql00);
if ($result00->num_rows > 0) {
    while ($row00 = $result00->fetch_assoc()) {
        $sname = $row00["subject"];
    }
}

$sql0 = "SELECT * FROM pibitopics where id = '$id'";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
    while ($row0 = $result0->fetch_assoc()) {
        $code = $row0["topiccode"];
        $title = $row0["topictitle"];
        $id = $row0["id"];
        $level1 = $row0["level1"];
        $level2 = $row0["level2"];
        $level3 = $row0["level3"];
    }
}
?>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>

        <?php
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql22v = "SELECT * FROM subsetup where classname ='$classname'  and sectionname='$sectionname' and subject ='$subj' and sccode = '$sccode' ";
        $result22v = $conn->query($sql22v);
        if ($result22v->num_rows > 0) {
            while ($row22v = $result22v->fetch_assoc()) {
                $fullmark = $row22v["fullmarks"];
                $careal = $row22v["ca"];
                $checkcamanual = $row22v["camanual"];
                $pass_algorithm = $row22v["pass_algorithm"];
                $subj_full = $row22v["subj"];
                $obj_full = $row22v["obj"];
                $pra_full = $row22v["pra"];
                $ca_full = $row22v["ca"];
            }
        }


        if ($subj_full == 0) {
            $sd = 'disabled';
        } else {
            $sd = '';
        }
        if ($obj_full == 0) {
            $od = 'disabled';
        } else {
            $od = '';
        }
        if ($pra_full == 0) {
            $pd = 'disabled';
        } else {
            $pd = '';
        }
        if ($ca_full == 0) {
            $cd = 'disabled';
        } else {
            $cd = '';
        }



        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ?>
        <div class="container-fluidx">
            <div class="card text-left" style="background:var(--darker); color:var(--lighter);">

                <div class="card-body">
                    <table width="100%" style="color:white;">
                        <tr>
                            <td colspan="2">
                                <div class="logoo"><i class="bi bi-grip-horizontal"></i></div>
                                <div
                                    style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                                    Assessment Entry

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size:16px; font-weight:700; line-height:15px;">
                                    <?php echo strtoupper($exam); ?></div>
                                <div
                                    style="font-size:12px; font-weight:400; font-style:italic; line-height:18px; color:gray;">
                                    Name of Examination</div>
                                <div style="height:5px;"></div>
                                <div style="font-size:16px; font-weight:700; line-height:15px;">
                                    <?php echo strtoupper($classname) . ' : ' . strtoupper($sectionname); ?></div>
                                <div
                                    style="font-size:12px; font-weight:400; font-style:italic; line-height:12px; color:gray;">
                                    Class & Section/Group</div>
                            </td>
                            <td style="text-align:right; vertical-align:top;">
                                <?php if ($lock == 1) { ?>
                                    <div
                                        style="font-weight:bold; display:inline; font-size:40px; color:white; padding:4px 8px; border-radius:5px;">
                                        <i class="bi bi-file-earmark-lock2-fill"></i></div>

                                <?php } ?>
                                <div onclick="hhhsss();"
                                    style="font-weight:bold; display:inline; font-size:40px; color:white; padding:4px 4px; border-radius:5px;">
                                    <i class="bi bi-arrow-down-square-fill"></i></div>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align:left;">
                                <br>
                                <div style="font-size:16px; font-weight:700; line-height:15px;">
                                    <?php echo strtoupper($sname); ?></div>
                                <div
                                    style="font-size:12px; font-weight:400; font-style:italic; line-height:18px; color:gray;">
                                    Subject</div>
                                <div style="height:5px;"></div>
                                <div style="font-size:16px; font-weight:700; line-height:15px;">
                                    <?php echo $ca_full . ' + ' . $subj_full . ' + ' . $obj_full . ' + ' . $pra_full . ' =  ' . $fullmark;
                                    ; ?>
                                </div>
                                <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">
                                    <b>CA(%) + Sub + Obj + Pra = Full Marks</b></div>
                                <div
                                    style="font-size:12px; font-weight:400; font-style:italic; line-height:18px; color:gray;">
                                    Marks Distribution</div>
                            </td>
                        </tr>
                    </table>


                </div>
            </div>

            <div id="wait">
                <h4 class="pt-4 pb-5 text-center">Please wait....</h4>
                <h6 class="text-center text-danger">Process in background. Fetching Marks.......<br>It may take few
                    seconds to complete.</h6>
            </div>

            <div id="whowho" style="display:none;">

                <?php

$profile = array();
$sql00 = "SELECT stid, stnameeng, stnameben, previll, religion FROM students where  sccode='$sccode'";
                        $result00 = $conn->query($sql00);
                        if ($result00->num_rows > 0) {
                            while ($row00 = $result00->fetch_assoc()) {
                                $profile[] = $row00;
                            }
                        }

                        // $sy = date('Y');
                                                $ex = $exam;
                                                $stmark = array();
                                                $sql00x = "SELECT * FROM stmark where  sccode='$sccode' and exam = '$ex' and classname='$classname' and sectionname='$sectionname' and sessionyear LIKE '%$sy%'  and subject ='$subj' ";
                                                // echo $sql00x;
                                                $result00x = $conn->query($sql00x);
                                                if ($result00x->num_rows > 0) {
                                                    while ($row00x = $result00x->fetch_assoc()) {
                                                        $stmark[] = $row00x;
                                                    }}
                //**********************************************************************************************************************
                $cnt = 0;
                $sql0 = "SELECT * FROM sessioninfo where sessionyear LIKE '%$sy%'  and sccode='$sccode' and classname='$classname' and sectionname = '$sectionname' order by rollno";
                $result0 = $conn->query($sql0);
                if ($result0->num_rows > 0) {
                    while ($row0 = $result0->fetch_assoc()) {
                        $stid = $row0["stid"];
                        $rollno = $row0["rollno"];
                        $card = $row0["icardst"];
                        $ggg = $row0["groupname"];
                        $sta = $row0["status"];
                        if ($subj_full == 0) {
                            $sd = 'disabled';
                            $sdh = 'hidden';
                        } else {
                            $sd = '';
                            $sdh = '';
                        }
                        if ($obj_full == 0) {
                            $od = 'disabled';
                            $odh = 'hidden';
                        } else {
                            $od = '';
                            $odh = '';
                        }
                        if ($pra_full == 0) {
                            $pd = 'disabled';
                            $pdh = 'hidden';
                        } else {
                            $pd = '';
                            $pdh = '';
                        }
                        if ($ca_full == 0) {
                            $cd = 'disabled';
                            $cdh = 'hidden';
                        } else {
                            $cd = '';
                            $cdh = '';
                        }
      $ind = array_search($stid, array_column($profile, 'stid'));
                        if($ind != NULL || $ind != ''){
                            $neng = $profile[$ind]['stnameeng'];
                            $nben = $profile[$ind]['stnameben'];
                            $ggg = $profile[$ind]['previll'];
                        }
                 
if($profile[$ind]['religion'] == 'Islam' && $subj == 112){
    $sta = 0;
}
if($profile[$ind]['religion'] == 'Hindu' && $subj == 111){
    $sta = 0;
}

                        if ($sta == 0) {
                            $dsbl = 'disabled';
                            $bgc = 'light';
                            $sd = 'disabled';
                            $od = 'disabled';
                            $pd = 'disabled';
                            $cd = 'disabled';
                        } else {
                            $dsbl = '';
                            $bgc = 'lighter';
                        }



                        $pth = '../students/' . $stid . '.jpg';
                        if (file_exists($pth)) {
                            $pth = 'https://eimbox.com/students/' . $stid . '.jpg';
                        } else {
                            $pth = 'https://eimbox.com/students/noimg.jpg';
                        }

                    

                        //if($card == 'x'){$bgc = '--light';} else {$bgc = '--lighter';}
                        //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}
                

                        ?>
                        <div class="card text-center stbox" style="background:var(--<?php echo $bgc; ?>); color:var(--darker);"
                            id="block<?php echo $stid; ?>" <?php echo $dsbl; ?>>
                            <img class="card-img-top" alt="">
                            <div class="card-body">
                                <table width="100%">
                                    <tr>
                                        <td style="width:30px;">
                                            <span style="">
                                                <img src="<?php echo $pth; ?>" class="st-pic-small" />
                                            </span>
                                        </td>
                                        <td style="text-align:left; padding-left:5px;">
                                            <div class="a"><?php echo $neng; ?></div>
                                            <div class="b"><?php echo $nben; ?></div>
                                            <div class="c" style="font-weight:600; font-style:normal; color:gray;">ID #
                                                <?php echo $stid . ' | <b>' . $ggg . '</b>'; ?></div>
                                        </td>
                                        <td style="text-align:right;"><span
                                                style="float:right; font-size:24px; font-weight:700; text-align:center;"><?php echo $rollno; ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td colspan="2">
                                            <table width="100%" id="table<?php echo $stid; ?>">

                                                <?php
                                                $ind2 = array_search($stid, array_column($stmark, 'stid'));
                                                if($ind2 != NULL || $ind2 != ''){
                                                    $subje = $stmark[$ind2]["subj"];
                                                    $obj = $stmark[$ind2]["obj"];
                                                    $pra = $stmark[$ind2]["pra"];
                                                    $ca = $stmark[$ind2]["ca"];
                                                    $obt = $stmark[$ind2]["markobt"];
                                                    $gp = $stmark[$ind2]["gp"];
                                                    $gl = $stmark[$ind2]["gl"];
                                                } else {
                                                    $subje = '';
                                                    $obj = '';
                                                    $pra = '';
                                                    $ca = '';
                                                    $obt = '';
                                                    $gp = '';
                                                    $gl = '';
                                                }

                                                             //   include 'pibiblock.php';
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" value="<?php echo $ca; ?>"  id="ca<?php echo $stid; ?>"  onfocus="focu(<?php echo $stid; ?>,0);"  onblur="blurs(<?php echo $stid; ?>,0);" <?php echo $cd; ?>  <?php echo $cdh; ?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" value="<?php echo $subje; ?>" id="sub<?php echo $stid; ?>" onfocus="focu(<?php echo $stid; ?>,1);" onblur="blurs(<?php echo $stid; ?>,1);" <?php echo $sd; ?> <?php echo $sdh; ?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" value="<?php echo $obj; ?>"
                                                                id="obj<?php echo $stid; ?>"
                                                                onfocus="focu(<?php echo $stid; ?>,2);"
                                                                onblur="blurs(<?php echo $stid; ?>,2);" <?php echo $od; ?>         <?php echo $odh; ?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" value="<?php echo $pra; ?>" id="pra<?php echo $stid; ?>" onfocus="focu(<?php echo $stid; ?>,3);" onblur="blurs(<?php echo $stid; ?>,3);" <?php echo $pd; ?> <?php echo $pdh; ?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" value="<?php echo $obt; ?>"
                                                                id="obt<?php echo $stid; ?>"
                                                                onfocus="focu(<?php echo $stid; ?>,3);"
                                                                onblur="blurs(<?php echo $stid; ?>,3);" disabled>
                                                        </div>
                                                    </td>
                                                    <td style="width:20%;">
                                                        <div style="padding:7px 3px; margin-left:2px; text-align:center; border:1px solid gray; border-radius:4px;  font-size:16px; font-weight:600;"
                                                            id="gg<?php echo $stid; ?>"><?php echo $gp . ' / ' . $gl; ?></div>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td
                                                        style="font-size:10px; font-style:italic; color:gray; text-align:center;">
                                                        <?php if ($cdh == '') {
                                                            echo 'CA';
                                                        } ?></td>
                                                    <td
                                                        style="font-size:10px; font-style:italic; color:gray; text-align:center;">
                                                        <?php if ($sdh == '') {
                                                            echo 'Sub';
                                                        } ?></td>
                                                    <td
                                                        style="font-size:10px; font-style:italic; color:gray; text-align:center;">
                                                        <?php if ($odh == '') {
                                                            echo 'Obj';
                                                        } ?></td>
                                                    <td
                                                        style="font-size:10px; font-style:italic; color:gray; text-align:center;">
                                                        <?php if ($pdh == '') {
                                                            echo 'Pra';
                                                        } ?></td>
                                                    <td
                                                        style="font-size:10px; font-style:italic; color:gray; text-align:center;">
                                                        Total</td>
                                                    <td
                                                        style="font-size:10px; font-style:italic; color:gray; text-align:center;">
                                                        Status</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="stbox" style="height:0px;"></div>
                        <?php
                        $cnt++;
                    }
                }
                //*****************************************************************************
                ?>



            </div>





        </div>

    </main>
    <div style="height:52px;"></div>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        //   document.getElementById("cnt").innerHTML = "<?php echo $cnt; ?>";
        function go(id) {
            let tail = '?exam=<?php echo $exam; ?>&cls=<?php echo $classname; ?>&sec=<?php echo $sectionname; ?>&sub=<?php echo $subj; ?>&assess=<?php echo $assess; ?>&id=' + id;
            window.location.href = "markpibientry.php" + tail;
        }
    </script>


    <script>
        function focu(id, port) {
            if (port == 1) {
                $('#sub' + id).css({ "font-size": "30px", "color": "var(--dark)" }); $('#sub' + id).select();
            } else if (port == 2) {
                $('#obj' + id).css({ "font-size": "30px", "color": "var(--dark)" }); $('#obj' + id).select();
            } else if (port == 3) {
                $('#pra' + id).css({ "font-size": "30px", "color": "var(--dark)" }); $('#pra' + id).select();
            } else if (port == 0) {
                $('#ca' + id).css({ "font-size": "30px", "color": "var(--dark)" }); $('#ca' + id).select();
            }

        }

    </script>
    <script>

        function blurs(id, port) {
            let lock = <?php echo $lock * 1; ?>;
            if (lock == 0) {
                let a = '<?php echo $sd; ?>';
                let b = '<?php echo $od; ?>';
                let c = '<?php echo $pd; ?>';

                let sub = document.getElementById("sub" + id).value;
                let obj = document.getElementById("obj" + id).value;
                let pra = document.getElementById("pra" + id).value;
                let ca = document.getElementById("ca" + id).value;

                if (port == 1) {
                    if (sub <= <?php echo $subj_full; ?>) {
                        $('#sub' + id).css({ "font-size": "16px", "color": "black" });
                    } else {
                        alert('Invalid Marks'); document.getElementById("sub" + id).focus().select();
                    }


                    if (b == 'disabled') { markcall(id); }
                } else if (port == 2) {
                    if (obj <= <?php echo $obj_full; ?>) {
                        $('#obj' + id).css({ "font-size": "16px", "color": "black" });
                    } else {
                        alert('Invalid Marks'); document.getElementById("obj" + id).focus().select();
                    }


                    if (c == 'disabled') { markcall(id); }
                } else if (port == 3) {
                    if (pra <= <?php echo $pra_full; ?>) {
                        $('#pra' + id).css({ "font-size": "16px", "color": "black" });
                    } else {
                        alert('Invalid Marks'); document.getElementById("pra" + id).focus().select();
                    }

                    markcall(id);
                } else if (port == 0) {
                    if (ca <= <?php echo $ca_full; ?>) {
                        $('#ca' + id).css({ "font-size": "16px", "color": "black" });
                    } else {
                        alert('Invalid Marks'); document.getElementById("ca" + id).focus().select();
                    }


                    // if(c=='disabled'){markcall(id);}
                }
            }
            else {
                alert('Entry/Modify has been locked.');
            }


        }


    </script>
    <script>
        function markcall(id) {
            let fm = 100;
            let sub = parseInt(document.getElementById("sub" + id).value) * 1;
            let obj = parseInt(document.getElementById("obj" + id).value) * 1;
            let pra = parseInt(document.getElementById("pra" + id).value) * 1;
            let ca = parseInt(document.getElementById("ca" + id).value) * 1;
            if (isNaN(sub)) sub = 0;
            if (isNaN(obj)) obj = 0;
            if (isNaN(pra)) pra = 0;
            if (isNaN(ca)) ca = 0;

            var calc = (100 - <?php echo $ca_full; ?>) / 100;
            // alert(calc);

            var subx = sub * calc;
            var objx = obj * calc;
            var prax = pra * calc;

            document.getElementById("obt" + id).value = Math.round(subx + objx + prax + ca);

            var infor = "sccode=<?php echo $sccode; ?>&cls=<?php echo $classname; ?>&sec=<?php echo $sectionname; ?>&exam=<?php echo $exam; ?>&sub=<?php echo $subj; ?>&usr=<?php echo $usr; ?>&stid=" + id + "&fm=" + fm + "&subj=" + sub + "&obj=" + obj + "&pra=" + pra + "&ca=" + ca;
            console.log(infor);
            $("#gg" + id).html("");
            $.ajax({
                type: "POST",
                url: "backend/save-st-mark.php",
                data: infor,
                cache: false,
                beforeSend: function () {
                    $("#gg" + id).html('<div style="padding-top:5px;"><i class="material-icons" style="font-size:35px;color:black;">save</i></div>');
                },
                success: function (html) {
                    $("#gg" + id).html(html);
                }
            });
        }    
    </script>
    <script>
        function fetchsection() {
            var cls = document.getElementById("classname").value;

            var infor = "user=<?php echo $rootuser; ?>&cls=" + cls;
            $("#sectionblock").html("");

            $.ajax({
                type: "POST",
                url: "fetchsection.php",
                data: infor,
                cache: false,
                beforeSend: function () {
                    $('#sectionblock').html('<span class=""><center>Fetching Section Name....</center></span>');
                },
                success: function (html) {
                    $("#sectionblock").html(html);
                }
            });
        }
    </script>

    <script>
        function mentry(id, pi, roll) {
            //alert(id + '/' + pi + '/' + roll);
            var infor = "sccode=<?php echo $sccode; ?>&cls=<?php echo $classname; ?>&sec=<?php echo $sectionname; ?>&exam=<?php echo $exam; ?>&sub=<?php echo $subj; ?>&assess=<?php echo $assess; ?>&topic=<?php echo $id; ?>&usr=<?php echo $usr; ?>&roll=" + roll + "&stid=" + id + "&pi=" + pi;
            // alert(infor);
            if (pi == 1) {
                var k = 's' + id;
            } else if (pi == 2) {
                var k = 'c' + id;
            } else {
                var k = 't' + id;
            }


            $("#" + k).html("");

            $.ajax({
                type: "POST",
                url: "backend/save-st-mark.php",
                data: infor,
                cache: false,
                beforeSend: function () {
                    $("#" + k).html('<div style="padding-top:5px;"><i class="material-icons" style="font-size:35px;color:black;">save</i></div>');
                },
                success: function (html) {
                    $("#table" + id).html(html);

                }
            });
        }
    </script>

    <script>
        function grp() {
            let chk = document.getElementById("grp").checked;
            if (chk == true) {
                $('.stbox').hide(); $('.grpbox').show();
            } else {
                $('.stbox').show(); $('.grpbox').hide();
            }
        }


        document.getElementById("whowho").style.display = 'block';
        document.getElementById("wait").style.display = 'none';
    </script>

</body>
