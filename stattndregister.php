<?php
include 'inc.php';
include 'datam/datam-stprofile.php';
$classname = $sectionname = '';
if (isset($_GET['cls']) && isset($_GET['sec'])) {
    $classname = $_GET['cls'];
    $sectionname = $_GET['sec'];
    $cteacher_data = array(['cteachercls' => $classname, 'cteachersec' => $sectionname]);
}
// var_dump($cteacher_data);
$count_class = count($cteacher_data);



$period = 1;
$year = date('Y');
$month = date('m');
if (isset($_GET['month'])) {
    $month = $_GET['month'];
}

$date_start = $year . '-' . $month . '-01';
$date_end = date('Y-' . $month . '-t', strtotime($date_start));
// echo $last_date;
$last_date = date('t', strtotime($date_start));
// echo $date_start . $date_end;

$sql00 = "SELECT * FROM settings where  sccode='$sccode' and setting_title='Weekends' ";
// echo $sql00;
$result00gt = $conn->query($sql00);
if ($result00gt->num_rows > 0) {
    while ($row00 = $result00gt->fetch_assoc()) {
        $holidays = $row00['settings_value'];
    }
}




// 	echo var_dump($datam);
?>
<style>
    .table th,
    .table td {
        border-collapse: collapse;
    }

    .stickyg {
        position: sticky !important;
        top: 0;
        z-index: 10000;
        background: var(--lighter);
    }



    .sticky-x-1 {
        position: sticky;
        left: 0;
        z-index: 9999;
        background-color: #fdfbf4 !important;
    }

    .sticky-x-2 {
        position: sticky;
        left: 36px;
        z-index: 9999;
        background-color: #fdfbf4 !important;
    }

    .sticky-x-3 {
        position: sticky;
        left: 60px;
        z-index: 9999;
        background-color: #fdfbf4 !important;
    }
</style>
<script>
    function att(id, roll, bl, per) {
        if (per >= 2) {
            var val = document.getElementById("sta2" + id).checked;
        } else {
            var val = document.getElementById("sta" + id).checked;
        }

        var infor = "stid=" + id + "&roll=" + roll + "&val=" + val + "&opt=2&cls=<?php echo $classname; ?>&sec=<?php echo $sectionname; ?>&per=" + per;
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


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" hidden>
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" z-index="99999" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select class="form-control" onchange="gomonth(this.value);">
                    <?php
                    for ($mm = 1; $mm <= 12; $mm++) {
                        ?>
                        <option value="<?php echo $mm;?>"><?php echo $mm;?></option>
                    <?php
                    }
                    ?>
                </select>

                <button class="" onclick="gomonth(1);">Month</button>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



<main>
    <div class="container-fluidx">
        <div class="card ">

            <div class="card-body page-top-box">
                <table width="100%" style="color:white;">
                    <tr>
                        <td colspan="2">
                            <div class="menu-icon"><i class="bi bi-fingerprint"></i></div>
                            <div class="menu-text"> Attendance Register </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <?php if ($count_class > 1) { ?>
            <div class="d-flex">
                <?php
                for ($h = 0; $h < $count_class; $h++) {
                    $classname = $cteacher_data[$h]['cteachercls'];
                    $sectionname = $cteacher_data[$h]['cteachersec'];

                    if ($h == 0) {
                        $btn = 'primary';
                    } else {
                        $btn = 'dark';
                    }

                    ?>
                    <button id="btn<?php echo $h; ?>" class="btn btn-<?php echo $btn; ?> flex-fill " style="border-radius:0;"
                        onclick="myclass('<?php echo $h; ?>', '<?php echo $count_class; ?>' );">
                        <?php echo $classname . ' <i class="bi bi-arrow-right"></i>  ' . $sectionname; ?>
                    </button>
                    <?php
                }
                ?>
            </div>
        <?php } ?>

        <?php


        $datam = array();
        $sql00 = "SELECT * FROM stattnd where  adate between '$date_start' and '$date_end' and sccode='$sccode' and sessionyear='$sy'  and classname = '$classname' and sectionname='$sectionname' order by rollno";
        // echo $sql00 . '<br><br>';
        $result00gt = $conn->query($sql00);
        if ($result00gt->num_rows > 0) {
            while ($row00 = $result00gt->fetch_assoc()) {
                $datam[] = $row00;
            }
        }
        // var_dump($datam);
        // *************************************************************
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
        ?>
        <?php for ($h2 = 0; $h2 < $count_class; $h2++) {
            $classname = $cteacher_data[$h2]['cteachercls'];
            $sectionname = $cteacher_data[$h2]['cteachersec'];
            if ($h2 == 0) {
                $ddss = 'block';

            } else {
                $ddss = 'none';

            }

            ?>

            <div id="clssecblock<?php echo $h2; ?>" style="display:<?php echo $ddss; ?>">


                <div class="card ">

                    <div class="card-body page-info-box">
                        <table width="100%" style="color:white;">

                            <tr>
                                <td>
                                    <div style="font-size:20px; font-weight:700; line-height:15px;">
                                        <?php echo strtoupper($classname); ?> | <?php echo strtoupper($sectionname); ?>
                                    </div>
                                    <div
                                        style="color: var(--light); font-size:12px; font-weight:400; font-style:italic; line-height:22px;">
                                        Name of
                                        Class | Section</div>

                                </td>
                                <td style="text-align:right;">
                                    <div style="font-size:30px; font-weight:700; line-height:20px;"><span id="cnt"></span>
                                    </div>
                                    <div
                                        style="color: var(--light); font-size:12px; font-weight:400; font-style:italic; line-height:24px;">
                                        No. of
                                        Students</div>





                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                    <div class="mt-3 "
                                        style="color: var(--lighter); font-size:22px; font-weight:600; line-height:15px;"
                                        id="dddate" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <?php echo date(' F, Y', strtotime($date_start)); ?>
                                    </div>

                                </td>
                                <td class="text-right">
                                    <button class="btn btn-secondary text-small" onclick="go_entry();">Attendance</button>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="" style="overflow:auto; height:calc(100vh - 52px); padding-left:0;">
                    <table class="table table-condensed">
                        <thead class="stickyg sticky-x">
                            <tr class="stickyg sticky-x">
                                <th class="stickyg sticky-x-1"
                                    style="background: var(--lighter) !important; z-index:10001;">
                                    <small>Photo</small>
                                </th>
                                <th class="stickyg sticky-x-2"
                                    style="background: var(--lighter) !important; z-index:10001;">
                                    <small>Roll</small>
                                </th>
                                <th class="stickyg sticky-x-3"
                                    style="background: var(--lighter) !important; z-index:10001;">
                                    <small>Name</small>
                                </th>
                                <?php for ($h = 1; $h <= $last_date; $h++) {
                                    echo '<th class="stickyg">' . $h . '</th>';
                                }
                                ?>
                                <th>Rate</th>
                            </tr>
                        </thead>

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

                                $st_ind = array_search($stid, array_column($datam_st_profile, 'stid'));
                                $neng = $datam_st_profile[$st_ind]["stnameeng"];
                                $nben = $datam_st_profile[$st_ind]["stnameben"];
                                $vill = $datam_st_profile[$st_ind]["previll"];

                                $open_day = $pre_day = 0;
                                // $sql00 = "SELECT * FROM students where  sccode='$sccode' and stid='$stid' LIMIT 1";
                                // $result00 = $conn->query($sql00);
                                // if ($result00->num_rows > 0) 
                                // {while($row00 = $result00->fetch_assoc()) {   
                                //     $neng=$row00["stnameeng"]; $nben=$row00["stnameben"]; $vill=$row00["previll"];
                                // }}
                    
                                // var_dump($datam);
                                //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}
                                $st_att = array("stid" => $stid);
                                $st_att = array();
                                for ($my = 0; $my < count($datam); $my++) {
                                    if ($datam[$my]['stid'] == $stid) {
                                        $st_att[] = $datam[$my];

                                    }
                                }
                                // echo '<hr>';
                                // var_dump($st_att);
                    

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


                                <tr>

                                    <td style="width:36px; text-align:center; vertical-align:middle;" class=" sticky-x-1">
                                        <img src="<?php echo $pth; ?>" class="st-pic-small" />
                                    </td>

                                    <td style="width:36px; text-align:center; vertical-align:middle;" class=" sticky-x-2  bg-red">
                                        <span style="font-size:24px; font-weight:700;"><?php echo $rollno; ?></span>
                                    </td>
                                    <td style="text-align:left; padding-left:5px; min-width:120px; vertical-align:middle;"
                                        class=" sticky-x-3">
                                        <div class="stname-ben"><?php echo $neng; ?></div>
                                        <div class="stname-ben"><?php echo $nben; ?></div>
                                    </td>

                                    <?php
                                    $clr_dot = 'lightgray';
                                    $day = date('d');
                                    for ($h = 1; $h <= $last_date; $h++) {
                                        if ($month < 10) {
                                                $month = '0' . $month*1;
                                            } 

                                        if ($h < 10) {
                                                $h = '0' . $h;
                                            }
                                        $tarikh = $year . '-' . $month . '-' . $h;
                                        // echo $tarikh;
                                        if (strtotime($tarikh) <= strtotime($td)) {
                                            

                                            $bar = date('l', strtotime($tarikh));

                                            $open_day++;
                                            $key = array_search($tarikh, array_column($st_att, 'adate'));
                                            // echo '..............' . $key . '........<br><br>';
                                            if ($key != NULL || $key != '') {
                                                $status = $st_att[0]['yn'];
                                                $bunk = $st_att[$key]['bunk'];

                                                $clr = $status;
                                                //0 - Absent; 1 = Present; 2 = Bunk
                                                if ($status == 0) {
                                                    $clr_dot = 'deeppink';
                                                } else {
                                                    $pre_day++;
                                                    if ($bunk == 1) {
                                                        $clr_dot = 'orange';
                                                    } else {
                                                        $clr_dot = 'green';
                                                    }

                                                }
                                            } else {
                                                $status = 0;
                                                $clr_dot = 'black'; // not found
                                            }

                                        } else {
                                            $status = 0;
                                            $clr_dot = 'lightgray'; // Advance Date (future)
                                        }

                                        if (str_contains($holidays, $bar)) {
                                            $status = 0;
                                            $clr_dot = 'red'; // Holiday
                                            $open_day--;
                                        }



                                        echo '<td style="vertical-align:middle;" class="text-center"><div style="background:' . $clr_dot . ' !important;" class="attnd-dot"></div></td>';
                                    }
                                    ?>
                                    <td class="text-small" style="vertical-align:middle;">
                                        <?php
                                        if ($pre_day > 0) {
                                            echo number_format($pre_day * 100 / $open_day, 2) . '%';
                                        } else {
                                            echo '0.00%';
                                        }
                                        // echo $open_day . '/' . $pre_day;
                                        ?>
                                    </td>
                                </tr>



                                <?php
                                $cnt++;
                            }
                        }

                        ?>
                    </table>
                </div>
            </div>

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
        var infor = "cnt=" + cnt + "&fnd=" + fnd + "&opt=5&cls=<?php echo $classname; ?>&sec=<?php echo $sectionname; ?>";
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

    function go_entry() {
        window.location.href = "stattnd.php?cls=<?php echo $classname; ?>&sec=<?php echo $sectionname; ?>";
    }  
</script>



<script>
    function myclass(cur, mot) {
        var i = 0;
        for (i = 0; i < mot; i++) {
            document.getElementById('clssecblock' + i).style.display = 'none';
            document.getElementById('btn' + i).classList.remove("btn-primary");
            document.getElementById('btn' + i).classList.add("btn-dark");
        }
        document.getElementById('clssecblock' + cur).style.display = 'block';
        document.getElementById('btn' + cur).classList.add("btn-primary");
    }

    function modal() {
        var x = document.getElementById("modaldata").value;
        window.location.href = 'bank-account.php?accno=' + x;
    }
</script>