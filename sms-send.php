<?php
include 'inc.php';

$disp0 = $disp1 = $disp2 = $disp3 = $disp4 = $disp5 = 'none';
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
        break;
    case 1;
        $disp1 = 'block';
        break;
    case 2;
        $disp2 = 'block';
        break;
    case 3;
        $disp3 = 'block';
        break;
    case 4;
        $disp4 = 'block';
        break;
    case 5;
        $disp5 = 'block';
        break;
    default:
        $disp0 = 'block';
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
                        <div class="row">
                            <div class="col-2 text-center text-white"><i class="bi bi-circle-fill"></i></div>
                            <div class="col-2 text-center text-white"><i class="bi bi-circle-fill"></i></div>
                            <div class="col-2 text-center text-white"><i class="bi bi-circle-fill"></i></div>
                            <div class="col-2 text-center text-white"><i class="bi bi-circle-fill"></i></div>
                            <div class="col-2 text-center text-white"><i class="bi bi-send-fill"></i></div>
                            <div class="col-2 text-center text-white"><i class="bi bi-check-circle-fill"></i></div>
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
                <button class="" onclick="prev(<?php echo $pos; ?>);">
                    < </button>
                        <button class="" onclick="next(<?php echo $pos; ?>);"> > </button>
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