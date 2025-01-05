<?php
include 'inc.php';
include 'datam/datam-stprofile.php';
$classname = $_GET['cls'];
$sectionname = $_GET['sec'];
$period = 1;
$year = date('Y');
$month = date('m');


$sql00 = "SELECT * FROM stattnd where  adate='$td' and sccode='$sccode' and sessionyear='$sy'  and classname = '$classname' and sectionname='$sectionname' order by rollno";
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
        background: white;
    }

    .sticky-x-2 {
        position: sticky;
        left: 36px;
        z-index: 9999;
        background: white;
    }

    .sticky-x-3 {
        position: sticky;
        left: 72px;
        z-index: 9999;
        background: black;
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
                            <div style="font-size:30px; font-weight:700; line-height:20px;"><span id="cnt"></span></div>
                            <div
                                style="color: var(--light); font-size:12px; font-weight:400; font-style:italic; line-height:24px;">
                                No. of
                                Students</div>





                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="mt-3"
                                style="color: var(--lighter); font-size:22px; text-align:center; font-weight:600; line-height:15px;"
                                id="dddate">
                                <?php echo date(' F, Y', strtotime($td)); ?>
                            </div>

                        </td>
                    </tr>



                </table>
            </div>



        </div>
        <div class="" style="overflow:auto; height:90vh; padding-left:10px;">
            <table class="table table-condensed">
                <thead class="stickyg sticky-x">
                    <tr class="stickyg sticky-x">
                        <th class="stickyg sticky-x" style=""></th>
                        <th class="stickyg sticky-x"></th>
                        <th class="stickyg sticky-x"></th>
                        <?php for ($h = 1; $h <= 31; $h++) {
                            echo '<th class="stickyg">' . $h . '</th>';
                        }
                        ?>
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

                        // $sql00 = "SELECT * FROM students where  sccode='$sccode' and stid='$stid' LIMIT 1";
                        // $result00 = $conn->query($sql00);
                        // if ($result00->num_rows > 0) 
                        // {while($row00 = $result00->fetch_assoc()) {   
                        //     $neng=$row00["stnameeng"]; $nben=$row00["stnameben"]; $vill=$row00["previll"];
                        // }}
                

                        //if($card == '1'){$qrc = '<img src="https://chart.googleapis.com/chart?chs=20x20&cht=qr&chl=http://www.students.eimbox.com/myinfo.php?id=5000&choe=UTF-8&chld=L|0" />';} else {$qrc = '';}
                        $st_att = array();
                        for ($my = 0; $my < count($datam); $my++) {
                            if ($datam[$my]['stid'] == $stid) {
                                $st_attnd[] = $datam[$my];
                            }
                        }
echo '<hr>';
var_dump($st_att);


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

                            <td style="width:36px; text-align:center;" class=" sticky-x-1">
                                <img src="<?php echo $pth; ?>" class="st-pic-small" />
                            </td>

                            <td style="width:36px; text-align:center;" class=" sticky-x-2  bg-red"><span
                                    style="font-size:24px; font-weight:700;"><?php echo $rollno; ?></span></td>
                            <td style="text-align:left; padding-left:5px; min-width:120px;" class=" sticky-x-3">
                                <div class="stname-ben"><?php echo $neng; ?></div>
                                <div class="stname-ben"><?php echo $nben; ?></div>
                            </td>

                            <?php for ($h = 1; $h <= 31; $h++) {
                                $tarikh = $year . '-' . $month . '-' . $h;

                                $key = array_search($tarikh, array_column($st_attnd, 'adate'));
                                if ($key != NULL || $key != '') {
                                    $status = $datam[$key]['yn'];
                                    $clr = $status;
                                } else {
                                    $status = 0;
                                    $clr = 5;
                                }


                                echo '<td style="vertical-align:middle;" class="text-center">' . $clr . '</td>';
                            }
                            ?>

                        </tr>



                        <?php
                        $cnt++;
                    }
                }

                ?>
            </table>
        </div>




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
    document.getElementById("att").innerHTML = "<?php echo $found; ?>";

    function go(id) {
        window.location.href = "student.php?id=" + id;
    }  
</script>