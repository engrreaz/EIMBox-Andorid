<?php
include 'inc.php';


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

?>

<link rel="stylesheet" href="assets/front.css">


<body>

    <main>
        <div class="containerx" style="width:100%;">

            <div class="card text-center" style="background:var(--dark);  padding:50px 0 10px 0; border-radius:0;">
                <center>
                    <table width="100%" style="color:white;">
                        <tr>
                            <td style="text-align:center;">
                                <img src="<?php echo $pth; ?>" class="pic" /><br>
                                <div class="b"><?php echo $fullname; ?></div>
                                <div class="c"><?php echo $userlevel; ?></div>
                                <div class="d"><?php echo $scname; ?></div>
                            </td>
                        </tr>

                    </table>
                </center>
            </div>





        </div>


        <div style="text-align:center; padding: 10px 15px;">
            <table style=" width:100%; ">
                <tr>
                    <?php if ($userlevel == 'Administrator') {
                        if ($ssx > 0) {
                            $ccx = 'dark';
                        } else {
                            $ccx = 'lighter';
                        }
                        echo '<td class="wd" style="color:var(--' . $ccx . ');"><span class="" onclick="issue();"><i class="bi bi-patch-question-fill"></i></span></td>';
                    }
                    ?>

                    <td class="wd" style="font-size:36px;"><span class="" onclick="act1"><i
                                class="bi bi-node-plus-fill"></i></span></td>
                    <td class="wd"><span class="" style="<?php if ($ccnntt > 0) {
                        echo 'color:var(--dark);';
                    } ?>" onclick="act22();"><i class="bi bi-bell-fill"></i></span></td>
                    <td class="wd"><span class="" style="<?php if ($y + $n > 0 && $perc < 100) {
                        echo 'color:var(--dark);';
                    } ?>" onclick="act3();"><i class="bi bi-check2-circle"></i></span></td>
                    <td class="wd" style="font-size:28px;"><span class="" onclick="act4"><i
                                class="bi bi-chat-square-text-fill"></i></span></td>
                </tr>
                <tr>
                    <td class="lbls"><?php echo ''; ?></td>
                    <td class="lbls"><?php echo ''; ?></td>
                    <td class="lbls"><?php if ($ccnntt > 0) {
                        echo $ccnntt;
                    } ?></td>
                    <td class="lbls"><?php if ($y + $n > 0 && $perc < 100) {
                        $tt = $y + $n;
                        echo $y . '/' . $tt; ?>
                            <div style="width:70%; border:0;   background:var(--lighter); margin:auto;">
                                <div style="width:<?php echo $perc; ?>%; height:2px; background:var(--dark);">&nbsp;</div>
                            </div>
                        <?php } ?>
                    </td>
                    <td class="lbls"><?php echo ''; ?></td>
                </tr>
            </table>
        </div>
        <div class="clearfix"></div>


        <div class="containerx" style="width:100%;">
            <?php
            if ($userlevel == 'Guest') {
                include 'index_guest.php';
                //echo "<br><br>" . $token . "<br><br>" . $query33;
            } else if ($userlevel == 'Student') {
                include 'index_student.php';
            } else if ($userlevel == 'Asstt. Head Teacher' || $userlevel == 'Head Teacher' || $userlevel == 'Administrator') {
                include 'index_teacher.php';

            } else if ($userlevel == 'Visitor') {
                include 'index_visitor.php';

            } else if ($userlevel == 'Guardian') {
                include 'index_guardian.php';
            } else if ($userlevel == 'Teacher' || $userlevel == 'Asstt. Teacher' || $userlevel == 'Class Teacher') {
                include 'index_asstt_teacher.php';
            } else {
                include 'index_undef.php';
            }
            ?>

        </div>



    </main>


    <?php include 'footer.php';?>

</body>


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
        setInterval(oneSecondFunction, 1000);

    });

    function oneSecondFunction() {
        var x = document.getElementById("kk").innerHTML;
        x = parseInt(x) - 1;
        var txt = '';
        var d, h, m, s;
        if (x > 3600 * 24) {
            d = Math.floor(x / (3600 * 24));
            s = x - (d * 3600 * 24);
            h = Math.floor(s / 3600);
            s = s - h * 3600;
            m = Math.floor(s / 60);
            s = s - m * 60;

            txt = txt + d + " Days " + h + " Hours " + m + " Min " + s + " Sec.";
        } else if (x > 3600) {
            h = Math.floor(x / 3600);
            s = x - h * 3600;
            m = Math.floor(s / 60);
            s = s - m * 60;
            txt = txt + h + " Hours " + m + " Min " + s + " Sec.";

        } else if (x > 60) {
            m = Math.floor(x / 60);
            s = x - m * 60;
            txt = txt + m + " Min " + s + " Sec.";
        } else {
            txt = txt + s + " Sec.";
        }


        document.getElementById("kk").innerHTML = x;
        document.getElementById("jj").innerHTML = txt;
    }
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