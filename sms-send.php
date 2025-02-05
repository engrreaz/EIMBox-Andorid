<?php
include 'inc.php';

$disp0 = $disp1 = $disp2 = $disp3 = $disp4 = $disp5 = 'block';
$icol0 = $icol1 = $icol2 = $icol3 = $icol4 = $icol5 = 'var(--dark)';
$pos = 0;
if (isset($_GET['pos'])) {
    $pos = $_GET['pos'];
}
if ($pos > 5) {
    $pos = 0;
}
if ($pos < 0) {
    $pos = 0;
}

switch ($pos) {
    case 0;
        $disp0 = 'block';
        $icol0 = 'white';
        break;
    case 1;
        $disp1 = 'block';
        $icol1 = 'white';
        break;
    case 2;
        $disp2 = 'block';
        $icol2 = 'white';
        break;
    case 3;
        $disp3 = 'block';
        $icol3 = 'white';
        break;
    case 4;
        $disp4 = 'block';
        $icol4 = 'white';
        break;
    case 5;
        $disp5 = 'block';
        $icol5 = 'white';
        break;
    default:
        $disp0 = 'block';
        $icol0 = 'white';
        break;
}
?>

<main>
    <div class="containerx" style="width:100%;">



        <div class="card text-center">
            <div class="card-body page-top-box">
                <div class="menu-icon"><i class="bi bi-send-fill"></i></div>
                <div class="menu-text">Send SMS</div>
            </div>
            <div class="card-body page-info-box  ">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        
                        <div class="row" style="font-size:20px;">
                            <div class="col-2 text-center " style="color:<?php echo $icol0; ?>"><i
                                    class="bi bi-chat-fill"></i></div>
                            <div class="col-2 text-center " style="color:<?php echo $icol1; ?>"><i
                                    class="bi bi-megaphone-fill"></i></div>
                            <div class="col-2 text-center " style="color:<?php echo $icol2; ?>"><i
                                    class="bi bi-chat-right-text-fill"></i></div>
                            <div class="col-2 text-center " style="color:<?php echo $icol3; ?>"><i
                                    class="bi bi-file-post"></i></div>
                            <div class="col-2 text-center " style="color:<?php echo $icol4; ?>"><i
                                    class="bi bi-send-fill"></i></div>
                            <div class="col-2 text-center " style="color:<?php echo $icol5; ?>"><i
                                    class="bi bi-check-circle-fill"></i></div>
                        </div>
                    </div>
                    <div class="col-1"></div>

                </div>

            </div>
        </div>



        <div class="card text-center gg" style="background:var(--lighter);">
            <div class="card-body" id="step-block-0" style="display:<?php echo $disp0; ?>">
                Start
            </div>
            <div class="card-body" id="step-block-0" style="display:<?php echo $disp1; ?>">
                Campaign
            </div>
            <div class="card-body" id="step-block-0" style="display:<?php echo $disp2; ?>">
                Compose / Text / Templete
            </div>
            <div class="card-body" id="step-block-0" style="display:<?php echo $disp3; ?>">
                Audiance
            </div>
            <div class="card-body" id="step-block-0" style="display:<?php echo $disp4; ?>">
                preview Message
            </div>
            <div class="card-body" id="step-block-0" style="display:<?php echo $disp5; ?>">
                Send Message
            </div>


            <div class="card-body mt-1">
                <button class="btn btn-dark text-small ps-3 pe-3" onclick="prev(<?php echo $pos; ?>);">
                    <i class="bi bi-caret-left-fill"></i> </button>
                <button class="btn btn-dark text-small ps-3 pe-3" onclick="next(<?php echo $pos; ?>);"> <i
                        class="bi bi-caret-right-fill"></i> </button>
            </div>

        </div>
    </div>

</main>
<div style="height:52px;"></div>

<script>


    function prev(id) {
        id--;
        window.location.href = 'sms-send.php?pos=' + id;
    }

    function next(id) {
        id++;
        window.location.href = 'sms-send.php?pos=' + id;
    }







    function rel(id) {
        window.location.href = "studentedit.php?id=" + id;
    }

    function edit(id) {
        window.location.href = "studentedit.php?id=" + id;
    }  
</script>

<script>
    function update_institute_info() {
        var scname = encodeURIComponent(document.getElementById("scname").value);
        var add1 = document.getElementById("add1").value;
        var add2 = document.getElementById("add2").value;
        var ps = document.getElementById("ps").value;
        var dist = document.getElementById("dist").value;
        var mno = document.getElementById("mno").value;


        var infor = "sccode=<?php echo $sccode; ?>&scname=" + scname + "&add1=" + add1 + "&add2=" + add2 + "&ps=" + ps + "&dist=" + dist + "&mno=" + mno;
        //alert(infor);
        $("#px").html("");

        $.ajax({
            type: "POST",
            url: "backend/update-sc-info.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#px').html('<span class="">Updating...</span>');
            },
            success: function (html) {
                $("#px").html(html);

                window.location.href = 'index.php';
            }
        });
    }
</script>