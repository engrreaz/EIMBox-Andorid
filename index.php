<?php
include 'inc.php';

if ($usr == 'engrreaz@gmail.com') {
    // echo $token_found;
// echo '<br><br>' . $_SERVER['REQUEST_URI'];
}

//echo $geolat . ', ' . $geolon;

//$urii = 'http://maps.google.com/maps?q=' . $geolat . ', ' . $geolon;
//echo '<a href="'.$urii.'">Map</a>';
$y = 0;
$n = 0;

if ($userlevel == 'Student') {
    $stid = $userid;
    $sql0xffffffffff = "SELECT * FROM students where stid='$stid' LIMIT 1";
    //echo $sql0xffffffffff;
    $result0xffffffffff = $conn->query($sql0xffffffffff);
    if ($result0xffffffffff->num_rows > 0) {
        while ($row0xffffffffff = $result0xffffffffff->fetch_assoc()) {
            $stnameeng = $row0xffffffffff["stnameeng"];
            $stnameben = $row0xffffffffff["stnameben"];
        }
    }

    $sql0xffffffffffw = "SELECT * FROM sessioninfo where stid='$stid' and sessionyear='$sy' LIMIT 1";
    $result0xffffffffffw = $conn->query($sql0xffffffffffw);
    if ($result0xffffffffffw->num_rows > 0) {
        while ($row0xffffffffffw = $result0xffffffffffw->fetch_assoc()) {
            $cls = $row0xffffffffffw["classname"];
            $sec = $row0xffffffffffw["sectionname"];
            $rollno = $row0xffffffffffw["rollno"];
        }
    }


    if ($cls == 'Ten') {
        $sql0xffffffffff = "SELECT * FROM sttracking where stid='$stid' and date='$td'";
        //echo $sql0xffffffffff;
        $result0xffffffffffg = $conn->query($sql0xffffffffff);
        if ($result0xffffffffffg->num_rows > 0) {
            while ($row0xffffffffff = $result0xffffffffffg->fetch_assoc()) {
                $rtm = $row0xffffffffff["responsetime"];
                if ($rtm == NULL) {
                    $n = $n + 1;
                } else {
                    $y = $y + 1;
                }
            }
        }
    }
}


$sql0 = "SELECT count(*) as koy  FROM todolist where date='$td' and sccode='$sccode' and user='$usr' and status=0";
// echo $sql0;
$result0rt = $conn->query($sql0);
if ($result0rt->num_rows > 0) {
    while ($row0 = $result0rt->fetch_assoc()) {
        $n += $row0["koy"];
    }
}

//if($n >0){$perc = 25; }


if ($y + $n > 0) {
    $perc = ceil($y * 100 / ($y + $n));
} else {
    $perc = 0;
}


$sql0 = "SELECT count(*) as ccnntt FROM notification where tomail = '$usr' and rwstatus=0";
$result0wwrt = $conn->query($sql0);
if ($result0wwrt->num_rows > 0) {
    while ($row0 = $result0wwrt->fetch_assoc()) {
        $ccnntt = $row0["ccnntt"];
    }
}

$sql0 = "SELECT count(*) as sex FROM issue where progress<100";
$result0wwrtd = $conn->query($sql0);
if ($result0wwrtd->num_rows > 0) {
    while ($row0 = $result0wwrtd->fetch_assoc()) {
        $ssx = $row0["sex"];
    }
}


$notice_marque = 0;
$notice_block = 0;
$find_app_notice = array_search('App Notice', array_column($ins_all_settings, 'setting_title'));
if ($find_app_notice != '' || $find_app_notice != null) {
    if (strlen(strpos($ins_all_settings[$find_app_notice]['settings_value'], 'Marque')) > 0) {
        $notice_marque = 1;
    }
    if (strlen(strpos($ins_all_settings[$find_app_notice]['settings_value'], 'Block')) > 0) {
        $notice_block = 1;
    }
}

$notices = array();
$sql0 = "SELECT * FROM notice where sccode = '$sccode' and (expdate = NULL || expdate = '0000-00-00' || expdate >= '$td') order by entrytime desc;";
// echo $sql0 ;
$result0rtx_notice = $conn->query($sql0);
if ($result0rtx_notice->num_rows > 0) {
    while ($row0 = $result0rtx_notice->fetch_assoc()) {
        $notices[] = $row0;
    }
}
// var_dump($cteacher_data);
$cteacher_text = '';
if (count($cteacher_data) > 0 && $cteacher_data[0]['cteachercls'] != '' && $cteacher_data[0]['cteachersec'] != '') {
    $cteacher_text = '<span class="text-white"> (' . $cteacher_data[0]['cteachercls'] . ' : ' . $cteacher_data[0]['cteachersec'] . ')</span>';
}

?>

<main>
    <div class="containerx" style="width:100%;">

        <div class="card text-center" style="background:var(--dark);  padding:20px 0 10px 0; border-radius:0;">
            <?php if ($gps == 1) { ?>
                <div class="float-end" style="position:fixed; right:50px; top:15px; color:white;"><i
                        class="bi bi-geo-alt-fill"></i></div><?php } ?>
            <table width="100%" style="color:white;">
                <tr>
                    <td style="text-align:center;">
                        <img src="<?php echo $pth; ?>" class="st-pic-big" /><br>
                        <div class="b"><?php echo $fullname; ?></div>
                        <div class="c"><?php echo $userlevel . $cteacher_text; ?></div>
                        <div class="d"><?php echo $scname; ?></div>
                    </td>
                </tr>
            </table>
            <?php

            $sql0 = "SELECT * from teacher where sccode='$sccode' and tid='$userid'";
            $result0wwrtdtt = $conn->query($sql0);
            if ($result0wwrtdtt->num_rows > 0) {
                while ($row0 = $result0wwrtdtt->fetch_assoc()) {
                    $dobx = $row0["dob"];
                    $jdatex = $row0["jdate"];
                    $dobstamp = strtotime($dobx);
                    $jdatestamp = strtotime($jdatex);

                    $tdstamp = strtotime($cur);

                    $lprstamp = new DateTime($dobx);
                    date_add($lprstamp, date_interval_create_from_date_string("60 years"));
                    date_sub($lprstamp, date_interval_create_from_date_string("1 days"));
                    $lprstamp = strtotime($lprstamp->format("Y-m-d 16:00:00"));

                    $total_career_days = $lprstamp - $jdatestamp;
                    $rest_career_days = $lprstamp - $tdstamp;
                    $dot_pos = 100 - ceil(100 * $rest_career_days / $total_career_days);
                    ?>
                    <div style="height:1px; background: var(--light); margin:10px 0 15px;">
                        <div class="float-end text-small font-weight-bold text-white pe-2 " hidden>
                            <?php echo date('d.m.Y', $lprstamp); ?></div>
                        <div class="float-start text-small font-weight-bold text-white ps-2 " hidden>
                            <?php echo date('d.m.Y', $jdatestamp); ?></div>
                        <div
                            style="height:10px; width:10px; border-radius:50%; background:var(--lighter); position:relative; left:<?php echo $dot_pos; ?>%; top:-5px;">
                        </div>
                        <div id="career_rest_val" hidden><?php echo $rest_career_days; ?></div>
                        <div class="text-center text-small font-weight-bold text-white  " style="position:relative; top:-5px;"
                            id="career_rest">0</div>

                    </div>

                <?php }
            } ?>

        </div>



    </div>

    <?php
    include 'front-page-block/notific-bar.php';

    if ($usr == 'engrreaz@gmail.com') {
        echo '<a href="firebase.php" class="btn btn-danger">Firebase</a>';


        $mobile_number = '014040225570';
        $sms_text = "Hi Labib,\\n Tui di school e jasna?";
        ?>
        <button class="btn btn-dark"
            onclick="send_sms('<?php echo $mobile_number; ?>', '<?php echo $sms_text; ?>')">SMS</button>
        <?Php
    }
    ?>


    <div class="clearfix"></div>


    <div class="containerx" style="width:100%;">
        <?php
        if ($userlevel == 'Guest') {
            include 'index_guest.php';
            //echo "<br><br>" . $token . "<br><br>" . $query33;
        } else if ($userlevel == 'Student') {
            include 'index_student.php';
        } else if ($userlevel == 'Asstt. Head Teacher' || $userlevel == 'Head Teacher' || $userlevel == 'Administrator') {

            if ($notice_marque == 1) {
                include 'front-page-block/marque.php';
            }
            include 'index_teacher.php';
        } else if ($userlevel == 'Visitor') {
            include 'index_visitor.php';

        } else if ($userlevel == 'Guardian') {
            include 'index_guardian.php';
        } else if ($userlevel == 'Teacher' || $userlevel == 'Asstt. Teacher' || $userlevel == 'Class Teacher') {

            if ($notice_marque == 1) {
                include 'front-page-block/marque.php';
            }
            include 'index_asstt_teacher.php';
        } else {
            include 'index_undef.php';
        }
        ?>

    </div>
</main>


<script>
    function go(id) {
        alert(id);
        window.location.href = "friend.php?id=" + id;
    }

    function issue() {
        //alert("Issue");
        window.location.href = "issue.php";
    }
    function act2() {
        window.location.href = "notification.php";
    }

</script>

<script>
    $(document).ready(function () {
        // setInterval(oneSecondFunction, 1000);

    });


</script>



<script>
    function chng() {
        var scc = document.getElementById("scc").value;

        var infor = "scc=" + scc + "&email=<?php echo $usr; ?>";
        $("#scc").html("");

        $.ajax({
            type: "POST",
            url: "chngeiin.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#scc').html('<span class="">Changing...</span>');
            },
            success: function (html) {
                $("#scc").html(html);
                window.location.href = 'index.php';
            }
        });
    }
</script>