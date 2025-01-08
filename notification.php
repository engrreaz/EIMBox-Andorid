<?php
include 'inc.php';

// $classname = $_GET['cls']; $sectionname = $_GET['sec']; 
?>

<main>
    <div class="container-fluidx">
        <div class="card text-left">
            <div class="card-body page-top-box">
                <table width="100%" style="color:white;">
                    <tr>
                        <td>
                            <div class="menu-icon"><i class="bi bi-bell-fill"></i></div>
                            <div class="menu-text"> Notifications </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!--<div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk3();" >-->
        <!--  <img class="card-img-top"  alt="">-->
        <!--  <div class="card-body">-->
        <!--    <table style="">-->
        <!--        <tr>-->
        <!--            <td style="width:50px;color:var(--dark);"><i class="material-icons">group</i></td>-->
        <!--            <td>-->
        <!--                <h4>Administrative Setup</h4>-->
        <!--                <small>Class & Sections, Subjects, Teachers, Users etc.</small>-->
        <!--            </td>-->
        <!--        </tr>-->
        <!--    </table>-->
        <!--  </div>-->
        <!--</div>-->


        <div class="card-body">
            <?php
            $sql0 = "SELECT * FROM notification where tomail = '$usr' order by datetime desc";
            $result0wwrt = $conn->query($sql0);
            if ($result0wwrt->num_rows > 0) {
                while ($row0 = $result0wwrt->fetch_assoc()) {
                    $title = $row0["title"];
                    $smstext = $row0["smstext"];
                    $datetime = $row0["datetime"];
                    $rws = $row0["rwstatus"];

                    $icon = $row0["icon"];
                    $color = $row0["color"];
                    $value = $row0["value"];
$stid = $row0["fromuserid"];
                    include 'component/student-image-path.php';
                    ?>
                    <div class="card mb-1" style="background:var(--lighter); color:var(--darker);" onclick="lnk30();"
                        draggable="true">
                        <div class=" d-flex p-2 ">
                            <div class="box-icon me-2">
                                <img class="st-pic-small" src="<?php echo $pth;?>" />
                            </div>
                            <div class="box-text">
                                <div class="stname-ben fw-bold" style="<?php if ($rws == 1) {
                                    echo 'color:gray;';
                                } ?>">
                                    <?php echo $title; ?>
                                </div>
                                <div class="stname-ben text-secondary" style="<?php if ($rws == 1) {
                                    echo 'color:gray;';
                                } ?>">
                                    <?php echo $smstext; ?>
                                </div>
                            </div>
                            <div class="box-prog ">
<?php if($icon != 'progress-bar'){ ?>
<div class="menu-icon me-3"><i class="bi bi-<?php echo $icon;?>" style="color: <?php echo $color;?>;"></i></div>
    <?php } else { ?>

                                <?php $perc = $value; ?>
                                <div class="pie animate no-round me-3"  style="margin:0, 0; --p:<?php echo $perc; ?>;--c:var(--dark);--b:3px;"> <?php echo $perc; ?>% </div>
<?php } ?>

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }



            $query33x = "UPDATE notification set rwstatus = '1' where tomail = '$usr'";
            // $conn->query($query33x);
            ?>



        </div>








    </div>

</main>
<div style="height:52px;"></div>

<script>
    document.getElementById("cnt").innerHTML = "<?php echo $cnt; ?>";

    function go() {
        var cls = document.getElementById("classname").value;
        var sec = document.getElementById("sectionname").value;
        var sub = document.getElementById("subject").value;
        var assess = document.getElementById("assessment").value;
        var exam = document.getElementById("exam").value;
        let tail = '?exam=' + exam + '&cls=' + cls + '&sec=' + sec + '&sub=' + sub + '&assess=' + assess;
        if (cls == 'Six' || cls == 'Seven') {
            window.location.href = "markpibi.php" + tail;
        } else {
            window.location.href = "markentry.php" + tail;
        }
    }

    function lnk1() { window.location.href = "tools_allsubjects.php"; }
    function lnk2() { window.location.href = "pibiprocess.php"; }
    function lnk3() { window.location.href = "settings.php"; }
    function lnk4() { window.location.href = "transcriptselect.php"; }
    function lnk5() { window.location.href = "userlist.php"; }
    function lnk6() { window.location.href = "classes.php"; }
    function lnk7() { window.location.href = "transcriptselect.php"; }
    function lnk8() { window.location.href = "transcriptselect.php"; }
    function lnk30() { window.location.href = "accountservices.php"; }
    function lnk31() { window.location.href = "accountsecurity.php"; }


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
    function fetchsubject() {
        var cls = document.getElementById("classname").value;
        var sec = document.getElementById("sectionname").value;

        var infor = "sccode=<?php echo $sccode; ?>&cls=" + cls + "&sec=" + sec;
        $("#subblock").html("");

        $.ajax({
            type: "POST",
            url: "fetchsubject.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#subblock').html('<span class="">Retriving Subjects...</span>');
            },
            success: function (html) {
                $("#subblock").html(html);
            }
        });
    }
</script>