<?php
include 'inc.php';
$classname = $_GET['cls'];
$sectionname = $_GET['sec'];
if (isset($_GET['dt'])) {
    $td = $_GET['dt'];
}

$period = 1;

$sql00 = "SELECT * FROM stattnd where  (adate='$td' and sccode='$sccode' and sessionyear='$sy'  and classname = '$classname' and sectionname='$sectionname') or yn=100 order by rollno";
$result00gt = $conn->query($sql00);
if ($result00gt->num_rows > 0) {
    while ($row00 = $result00gt->fetch_assoc()) {
        $datam[] = $row00;
    }
}

$sql00 = "SELECT * FROM stattndsummery where  date='$td' and sccode='$sccode' and sessionyear='$sy' and classname = '$classname' and sectionname='$sectionname'";
$result00gtt = $conn->query($sql00);
if ($result00gtt->num_rows > 0) {
    while ($row00 = $result00gtt->fetch_assoc()) {
        $rate = $row00["attndrate"];
        $subm = 1;
        $fun = 'grpssx0';
    }
} else {
    $subm = 0;
    $fun = 'grpssx';
}

if ($period >= 2) {
    $fun = 'grpssx2';
}

// 	echo var_dump($datam);
?>

<style>
    .pic {
        width: 60px;
        height: 60px;
        padding: 1px;
        border-radius: 50%;
        border: 1px solid var(--dark);
        margin: 5px;
    }

    .a {
        font-size: 18px;
        font-weight: 700;
        font-style: normal;
        line-height: 22px;
        color: var(--dark);
    }

    .b {
        font-size: 16px;
        font-weight: 600;
        font-style: normal;
        line-height: 22px;
    }

    .c {
        font-size: 11px;
        font-weight: 400;
        font-style: italic;
        line-height: 16px;
    }

    .chk {
        font-size: 36px;
    }

    .red {
        color: red;
    }

    .green {
        color: seagreen;
    }

    .blue {
        color: darkcyan;
    }
</style>


</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container-fluidx">
            <div class="card text-left"
                style="background:<?php if ($subm == 1) {
                    echo 'red';
                } else {
                    echo 'var(--dark)';
                } ?>; color:var(--lighter);"
                onclick="gol(<?php echo $id; ?>)">

                <div class="card-body">
                    <table width="100%" style="color:white;">
                        <tr>
                            <td colspan="2">
                                <div class="logoo"><i class="bi bi-people-fill"></i></div>
                                <div
                                    style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                                    Attendance

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size:20px; font-weight:700; line-height:15px;">
                                    <?php echo strtoupper($classname); ?> | <?php echo strtoupper($sectionname); ?></div>
                                <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name
                                    of Class | Section</div>
                                <br>
                                <div style="font-size:16px; font-weight:700; line-height:15px;">
                                    <?php echo strtoupper($period); ?></div>
                                <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Name
                                    of Section</div>
                            </td>
                            <td style="text-align:right;">
                                <div style="font-size:30px; font-weight:700; line-height:20px;"><span
                                        id="att"></span>/<span id="cnt"></span></div>
                                <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">No.
                                    of Students</div>

                                <br>
                                <div style="font-size:15px; font-weight:600; line-height:15px;" id="dddate">
                                    <input style="text-align:right;" onchange="dtcng();" id="xp" class="form-control"
                                        type="date" value="<?php echo $td; ?>" />

                                </div>
                                <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">Date
                                </div>



                                <div class="form-check form-switch" style="float:right; display:none;">
                                    <input class="form-check-input" type="checkbox" id="myswitch" name="darkmode"
                                        value="no" onclick="more();"> <small> More</small>
                                </div>
                            </td>
                        </tr>

                        <?php if ($subm == 1) { ?>
                            <tr>
                                <td colspan="2">
                                    <div
                                        style="text-align:center; font-size:14px; font-weight:400; font-style:italic; padding: 5px 10px; background:red; color:white; border-radius:15px;; border:1px solid white; ">
                                        Attendance already submitted.</div>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>


            <?php
            $cnt = 0;
            $found = 0;

            $sql0 = "SELECT * FROM sessioninfo where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname = '$sectionname' order by $stattnd_sort";
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


                    $pth = '../students/' . $stid . '.jpg';
                    if (file_exists($pth)) {
                        $pth = 'https://eimbox.com/students/' . $stid . '.jpg';
                    } else {
                        $pth = 'https://eimbox.com/students/noimg.jpg';
                    }

                    $sql00 = "SELECT * FROM students where  sccode='$sccode' and stid='$stid' LIMIT 1";
                    $result00 = $conn->query($sql00);
                    if ($result00->num_rows > 0) {
                        while ($row00 = $result00->fetch_assoc()) {
                            $neng = $row00["stnameeng"];
                            $nben = $row00["stnameben"];
                            $vill = $row00["previll"];
                            $grnametxt = '';
                        }
                    }


                    //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}
            


                    $key = array_search($stid, array_column($datam, 'stid'));
                    if ($key != NULL || $key != '') {
                        $status = $datam[$key]['yn'];
                    } else {
                        $status = 0;
                    }


                    if ($status == 0) {
                        $bgc = '--light';
                        $dsbl = ' disabled';
                        $gip = '';
                        $found += 0;
                    } else {
                        $bgc = '--lighter';
                        $dsbl = '';
                        $gip = 'checked';
                        $found++;
                    }
                    ?>
                    <div class="card text-center" style="background:var(<?php echo $bgc; ?>); color:var(--darker);"
                        onclick="<?php echo $fun; ?>(<?php echo $stid; ?>, <?php echo $rollno; ?>)" id="block<?php echo $stid; ?>"
                        <?php echo $dsbl; ?>>
                        <img class="card-img-top" alt="">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td style="padding-left:10px; width:50px;">

                                        <?php if ($period < 2) { ?>
                                            <input style="scale:1.5; border:1px solid var(--dark); " class="form-check-input"
                                                type="checkbox" name="darkmode" id="sta<?php echo $stid; ?>"
                                                onchange="grpssx(<?php echo $stid; ?>, <?php echo $rollno; ?>);" <?php echo $gip; ?>>
                                        <?php } else { ?>
                                            <input style="scale:1.5; border:1px solid black; " class="form-check-input"
                                                type="checkbox" name="darkmodes" id="sta2<?php echo $stid; ?>"
                                                onchange="grpssx2(<?php echo $stid; ?>, <?php echo $rollno; ?>);" <?php echo $gip; ?>>
                                        <?php } ?>
                                        <!--<label for="sta<?php echo $stid; ?>">&nbsp;&nbsp;&nbsp;Present</label>-->
                                    </td>
                                    <td style="width:40px;"><span
                                            style="font-size:24px; font-weight:700;"><?php echo $rollno; ?></span>
                                        <span style="">
                                            <?php $qrc = ''; echo $qrc; ?>
                                        </span>
                                    </td>
                                    <td style="text-align:left; padding-left:5px;">
                                        <div class="a"><?php echo $neng; ?></div>
                                        <div class="b"><?php echo $nben; ?></div>
                                        <div class="c" style="font-weight:600; font-style:normal; color:gray;">ID #
                                            <?php echo $stid . $grnametxt; ?></div>
                                        <div class="c"><?php echo $vill;
                                        ; ?></div>
                                    </td>
                                    <td style="text-align:right;" id="ut<?php echo $stid; ?>"><img src="<?php echo $pth; ?>"
                                            class="pic" /></td>
                                </tr>
                            </table>


                        </div>
                    </div>
                    <div class="card text-center sele gg"
                        style="background:var(<?php echo $bgc; ?>); display:none; color:var(--darker);"
                        id="blocksel<?php echo $dtid; ?>">

                    </div>

                    <?php
                    $cnt++;
                }
            }

            ?>


            <?php if ($subm == 0) { ?>
                <div class="card text-center" id="sfinal" style="padding:8px;"><button
                        style="padding15px; border-radius:5px;" class="btn btn-danger" onclick="submitfinal();">Submit
                        Attendance</button></div>
            <?php } ?>




        </div>

    </main>
    <div style="height:52px;"></div>


    <script>

        function more() {
            let val = document.getElementById("myswitch").checked;
            if (val == true) {
                $(".sele").show();
            } else {
                $(".sele").hide();
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




        function grpss(id) {
            var val = document.getElementById("sta" + id).checked;
            var infor = "dtid=" + id + "&val=" + val + "&opt=3";
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

        function submitfinal() {
            var fnd = parseInt(document.getElementById("att").innerHTML) * 1;
            var cnt = parseInt(document.getElementById("cnt").innerHTML) * 1;
            var infor = "cnt=" + cnt + "&fnd=" + fnd + "&opt=5&cls=<?php echo $classname; ?>&sec=<?php echo $sectionname; ?>&adate=<?php echo $td; ?>";
            $("#sfinal").html("");
            $.ajax({
                type: "POST",
                url: "savestattnd.php",
                data: infor,
                cache: false,
                beforeSend: function () {
                    $("#sfinal").html('<span class="chk blue"><i class="bi bi-server"></i></span>');
                },
                success: function (html) {
                    $("#sfinal").html(html);
                }
            });
        }
    </script>

    <script>
        document.getElementById("cnt").innerHTML = "<?php echo $cnt; ?>";
        document.getElementById("att").innerHTML = "<?php echo $found; ?>";

        function go(id) {
            window.location.href = "student.php?id=" + id;
        }  
    </script>

    <script>
        function att(id, roll, bl, per) {
            if (per >= 2) {
                var val = document.getElementById("sta2" + id).checked;
            } else {
                var val = document.getElementById("sta" + id).checked;
            }

            var infor = "stid=" + id + "&roll=" + roll + "&val=" + val + "&opt=2&cls=<?php echo $classname; ?>&sec=<?php echo $sectionname; ?>&per=" + per + "&adate=<?php echo $td; ?>";
            $("#ut" + id).html("");

            $.ajax({
                type: "POST",
                url: "savestattnd.php",
                data: infor,
                cache: false,
                beforeSend: function () {
                    $("#ut" + id).html('<span class="chk blue"><i class="bi bi-server"></i></span>');
                },
                success: function (html) {
                    $("#ut" + id).html(html);
                }
            });
        }


        function dtcng() {
            var ddd = document.getElementById("xp").value;
            window.location.href = 'stattnd.php?cls=<?php echo $classname; ?>&sec=<?php echo $sectionname; ?>&dt=' + ddd;
        }


        function grpssx(id, roll) {
            var bl = document.getElementById("sta" + id).checked;
            var per = 1;
            var cnt = parseInt(document.getElementById("att").innerHTML) * 1;
            if (bl == true) {
                document.getElementById("sta" + id).checked = false;
                cnt--;
            } else {
                document.getElementById("sta" + id).checked = true;
                cnt++;
            }
            document.getElementById("att").innerHTML = cnt;
            att(id, roll, bl, per);
        }

        function grpssx2(id, roll) {

            var per = <?php echo $period; ?>;

            var bl = document.getElementById("sta2" + id).checked;
            var cnt = parseInt(document.getElementById("att").innerHTML) * 1;
            if (bl == true) {
                document.getElementById("sta2" + id).checked = false;
                cnt--;
            } else {
                document.getElementById("sta2" + id).checked = true;
                cnt++;
            }
            document.getElementById("att").innerHTML = cnt;
            att(id, roll, bl, per);
        }
    </script>
</body>