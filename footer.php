<?php
// $htp = $_SERVER['HTTP_X_REQUESTED_WITH'];
//echo $htp;
$hb = 15;
if ($htp == 'com.xeneen.eimbox' || $htp == 'com.xeneen.kmghs') {
    $hb = 10;
}

if ($usr == '' || $userlevel == 'Guest') {
    ?>
    <!--<meta http-equiv="refresh" content="0; url='index.php'" />-->
    <?php
}
?>


<style>
    @media print {
        .noprint {
            display: none !important;
        }
    }
</style>

<?php

if ($userlevel == 'Asstt. Head Teacher' || $userlevel == 'Head Teacher' || $userlevel == 'Administrator' || $userlevel == 'Super Administrator') { ?>



    <div class="noprint"
        style="position:fixed; bottom:0; width:100%; background:var(--dark); height:50px; padding-top:10px; z-index:999;">
        <table width="100%">
            <tr>
                <td style="width:10%"></td>
                <td style="text-align:center;"><a style="color:white;" href="index.php"><i
                            class="material-icons">home</i></a></td>
                <td style="text-align:center;"><a style="color:white;" href="reporthome.php"><i
                            class="material-icons">description</i></a></td>
                <td style="text-align:center;"><a style="color:white;" href="tools.php"><i
                            class="material-icons">spa</i></a></td>
                <td style="text-align:center;"><a style="color:white;" href="build.php"><i
                            class="material-icons">build</i></a></td>
                <td style="width:<?php echo $hb; ?>%"></td>
            </tr>
        </table>
    </div>

<?php } else if ($userlevel == 'Class Teacher' || $userlevel == 'Asstt. Teacher' || $userlevel == 'Teacher') { ?>

        <div class="noprint"
            style="position:fixed; bottom:0; width:100%; background:var(--dark); height:50px; padding-top:10px; z-index:999;">
            <table width="100%">
                <tr>
                    <td style="width:15%"></td>
                    <td style="text-align:center;"><a style="color:white;" href="index.php"><i
                                class="material-icons">home</i></a></td>
                    <td style="text-align:center;"><a style="color:white;" href="reporthome.php"><i
                                class="material-icons">description</i></a></td>
                    <td style="text-align:center;"><a style="color:white;" href="tools.php"><i
                                class="material-icons">spa</i></a></td>
                    <td style="text-align:center;"><a style="color:white;" href="build.php"><i
                                class="material-icons">build</i></a></td>
                    <td style="width:<?php echo $hb; ?>%"></td>
                </tr>
            </table>
        </div>

<?php } else if ($userlevel == "Student") { ?>

            <div style="position:fixed; bottom:0; width:100%; background:var(--dark); height:50px; padding-top:10px;">
                <table width="100%">
                    <tr>
                        <td style="width:<?php echo $hb; ?>%"></td>
                        <td style=""><a style="color:white;" href="index.php"><i class="material-icons">home</i></a></td>
                        <td style=""><a style="color:white;" href="#"><i class="material-icons">person</i></a></td>
                        <td style=""><a style="color:white;" href="globalsetting.php"><i class="material-icons">build</i></a></td>
                        <td style="width:<?php echo $hb; ?>%"></td>
                    </tr>
                </table>
            </div>

<?php } else if ($userlevel == "Guardian") { ?>

                <div style="position:fixed; bottom:0; width:100%; background:var(--dark); height:50px; padding-top:10px;">
                    <table width="100%">
                        <tr>
                            <td style="width:8%"></td>
                            <td style=""><a style="color:white;" href="index.php"><i class="material-icons">home</i></a></td>
                            <td style=""><a style="color:white;" href="#"><i class="material-icons">person</i></a></td>
                            <td style=""><a style="color:white;" href="globalsetting.php"><i class="material-icons">build</i></a></td>
                            <td style="width:<?php echo $hb; ?>%"></td>
                        </tr>
                    </table>
                </div>

<?php } else if ($userlevel == "Visitor") { ?>

                    <div style="position:fixed; bottom:0; width:100%; background:var(--dark); height:50px; padding-top:10px;">
                        <table width="100%">
                            <tr>
                                <td style="width:8%"></td>
                                <td style=""><a style="color:white;" href="index.php"><i class="material-icons">home</i></a></td>
                                <td style=""><a style="color:white;" href="#"><i class="material-icons">person</i></a></td>
                                <td style="globalsetting.php"><a style="color:white;" href="globalsetting.php"><i
                                            class="material-icons">build</i></a></td>
                                <td style="width:<?php echo $hb; ?>%"></td>
                            </tr>
                        </table>
                    </div>

<?php } else {
} ?>


<div class="noprint" onclick="document.location.reload();"
    style="width:25px; height:25px; float:right; right:15px; top:13px; position:fixed; z-index:999; border-radius:50%; background:white;">
    <i class="material-icons ico">cached</i>
</div>




<div id="logstatus" hidden></div>



</html>


<!-- Bootstrap JavaScript Libraries -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="assets/post-load.js"></script>

<script>
    // myStopFunction();

    function logerx() {
        var infor = "page=<?php echo $curfile; ?>&size=<?php echo filesize($curfile); ?>";
        $("#logstatus").html("----");
        $.ajax({
            type: "POST",
            url: "save-log.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#logstatus').html('<span>***</span>');
            },
            success: function (html) {
            }
        });
    }
</script>
<script>
    const element = document.getElementById("logstatus");
    /*
    setInterval(function () {
        var infor = "page=<?php echo $curfile; ?>& size=<?php echo filesize($curfile); ?>";

    $("#logstatus").html("----");

    $.ajax({
        type: "POST",
        url: "backend/save-log.php",
        data: infor,
        cache: false,
        beforeSend: function () {
            $('#logstatus').html('<span></span>');
        },
        success: function (html) {
            $('#logstatus').html(html);
        }
    });
    }, 5000);
    */



</script>