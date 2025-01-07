<?php
include 'inc.php';
// $classname = $_GET['cls']; $sectionname = $_GET['sec']; 

$notices = array();
$sql0 = "SELECT * FROM notice where sccode = '$sccode'  order by entrytime desc;";
// echo $sql0 ;
$result0rtx_notice = $conn->query($sql0);
if ($result0rtx_notice->num_rows > 0) {
    while ($row0 = $result0rtx_notice->fetch_assoc()) {
        $notices[] = $row0;
    }
}
?>

<main>
    <div class="container-fluidx">
        <div class="card text-left">
            <div class="card-body page-top-box">
                <table width="100%" style="color:white;">
                    <tr>
                        <td>
                            <div class="menu-icon"><i class="bi bi-book-half"></i></div>
                            <div class="menu-text"> E-Library </div>
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


        <div class="card-body " >

            <?php
            $sl = 0;
            foreach ($notices as $notice) {
                if ($notice['color'] == '') {
                    $notice['color'] = 'var(--dark);';
                }
                if ($notice['icon'] == '') {
                    $notice['icon'] = 'bell';
                }

                ?>


                <div class="d-flex mb-1" style="background:var(--lighter); color:<?php echo $notice['color']; ?>"
                    onclick="notice_description_blockx(<?php echo $sl; ?>);">
                    <div class="notice-icon">
                        <i class="bi bi-<?php echo $notice['icon']; ?> " style="color:<?php echo $notice['color']; ?>"></i>
                    </div>
                    <div class="mt-2">
                        <h6 class="stname-ben"><?php echo $notice['title']; ?></h6>
                        <div class="roll-no mt-1 text-secondary" id="descrip<?php echo $sl; ?>"
                            style="line-height:20px; display:block; "><?php echo $notice['descrip']; ?></div>
                        <div class="notice-small-gray"><small>2 Hrs ago <span class="notice-by">by Mr. Aminul
                                    Islam</span></small></div>
                    </div>
                </div>

                <?php $sl++;
            } ?>

            <button class="btn btn-primary text-small" onclick="show_all_notice();">Show All</button>
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