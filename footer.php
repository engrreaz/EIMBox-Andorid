<?php
// $htp = $_SERVER['HTTP_X_REQUESTED_WITH'];
//echo $htp;
$hb = 0;
if ($htp == 'com.xeneen.eimbox' || $htp == 'com.xeneen.kmghs') {
    $hb = 0;
}

if ($usr == '' || $userlevel == 'Guest') {
    ?>
    <meta http-equiv="refresh" content="0; url='login.php'" />
    <?php
}


if ($userlevel == 'Asstt. Head Teacher' || $userlevel == 'Head Teacher' || $userlevel == 'Administrator' || $userlevel == 'Super Administrator') { ?>
    <div class="noprint bottom-bar">
        <table width="100%">
            <tr>
                <td style="width:<?php echo $hb; ?>%"></td>
                <td style="text-align:center;"><a style="color:white;" href="index.php"> <i
                            class="footer-nav-icon bi bi-house-fill"></i></a></td>
                <td style="text-align:center;"><a style="color:white;" href="reporthome.php"><i
                            class="footer-nav-icon bi bi-mortarboard-fill"></i></a></td>
                <td style="text-align:center;"><a style="color:white;" href="tools.php"><i
                            class="footer-nav-icon bi bi-app"></i></a></td>
                <td style="text-align:center;"><a style="color:white;" href="settings_admin.php"><i
                            class="footer-nav-icon bi bi-gear"></i></a></td>
                <td style="text-align:center;"><a style="color:white;" href="build.php"><i
                            class="footer-nav-icon bi bi-person-circle"></i></a></td>
                <td style="width:<?php echo $hb; ?>%"></td>
            </tr>
        </table>
    </div>

<?php } else if ($userlevel == 'Class Teacher' || $userlevel == 'Asstt. Teacher' || $userlevel == 'Teacher') { ?>
        <div class="noprint bottom-bar" id="footer-nav">
            <table width="100%">
                <tr>
                    <td style="width:<?php echo $hb; ?>%"></td>
                    <td style="text-align:center;"><a style="color:white;" href="index.php"><i
                                class="footer-nav-icon bi bi-house-fill"></i></a></td>
                    <td style="text-align:center;"><a style="color:white;" href="reporthome.php"><i
                                class="footer-nav-icon bi bi-mortarboard-fill"></i></a></td>
                    <td style="text-align:center;"><a style="color:white;" href="tools.php"><i
                                class="footer-nav-icon bi bi-circle-square"></i></a></td>
                    <td style="text-align:center;"><a style="color:white;" href="build.php"><i
                                class="footer-nav-icon bi bi-person-circle"></i></a></td>
                    <td style="width:<?php echo $hb; ?>%"></td>
                </tr>
            </table>
        </div>

<?php } else if ($userlevel == "Student") { ?>
            <div class="noprint bottom-bar">
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

                <div class="noprint bottom-bar">
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

                    <div class="noprint bottom-bar">
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


    echo 'No User Type Define....';
} ?>


<div class="noprint" onclick="document.location.reload();"
    style="background:var(--lighter); border:1px solid var(--darker); font-size:32px; width:32px; height:32px; float:right; right:10px; top:10px; position:fixed; z-index:99999; border-radius:50%;  line-height:25px; text-align:center;">
    <!-- <i class="bi bi-arrow-repeat"></i> -->
     <img src="https://eimbox.com/logo/<?php echo $sccode;?>.png" style="height:28px"/>
</div>




<div id="logstatus" hidden></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="assets/post-load.js"></script>

<script>
    // myStopFunction();

    function loger() {
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



    const element = document.getElementById("logstatus");
    if ('<?php echo $curfile; ?>' == 'index.php') {
        setInterval(oneSecondFunction, 1000);
    }


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




</script>