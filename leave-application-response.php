<?php
include 'inc.php';
$tidd = $userid;
$appid = 0;
$tid = $tidd = '';
$type = '';
$reason = '';
$date1 = '';
$date2 = '';
$showhide = 'hidden';


if (isset($_GET['appid']) && isset($_GET['tail'])) {
    $appid = $_GET['appid'];
    $resp = $_GET['tail'];
    $query33 = "UPDATE teacher_leave_app set status = '$resp', response_by = '$usr', response_time = '$cur', modifieddate='$cur'  where id = '$appid'";
    $conn->query($query33);
}


$my_app_datam = array();
$sql0 = "SELECT * FROM teacher_leave_app where sccode='$sccode' and ( status=0 or status>=3) order by apply_date desc, id desc";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
    while ($row0x = $result0->fetch_assoc()) {
        $my_app_datam[] = $row0x;
    }
}


?>

<main>
    <div class="containerx" style="width:100%;">



        <div class="card text-center">
            <div class="card-body page-top-box">
                <div class="menu-icon"><i class="bi bi-calendar-x"></i></div>
                <div class="menu-text"> Leave Application </div>
            </div>
        </div>

    </div>







    <div class="card text-center" style="background:var(--lighter);">

        <?php
        foreach ($my_app_datam as $appl) {
            $appl_id = $appl['id'];
            $status = $appl['status'];

            if ($status == 0) {
                $txt_clr = 'cobalt';
                $bg_clr = 'aliceblue';
                $status_text = 'Application Just Submitted';
                $icon = 'send-fill';
            } else if ($status == 1) {
                $txt_clr = 'seagreen';
                $bg_clr = 'lightgreen';
                $status_text = 'Application Granted';
                $icon = 'check-circle-fill';
            } else if ($status == 2) {
                $txt_clr = 'crimson';
                $bg_clr = 'lavendarblush';
                $status_text = 'Application Rejected';
                $icon = 'x-circle-fill';
            } else if ($status == 3) {
                $txt_clr = 'orange';
                $bg_clr = 'oldlace';
                $status_text = 'Application in Under Review';
                $icon = 'circle-fill';
            } else {
                $txt_clr = 'gray';
                $bg_clr = 'whitesmoke';
                $status_text = 'UNDEFINED';
                $icon = 'calendar';
            }
            ?>
            <div class="card-body d-flex leave-app "
                style="background:<?php echo $bg_clr; ?>; color: <?php echo $txt_clr; ?>">
                <div class="">
                    <i class="bi bi-<?php echo $icon; ?> leave-icon me-3"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="leave-type"> <?php echo $appl['leave_type']; ?> </div>
                    <div class="leave-reason"> <?php echo $appl['leave_reason']; ?> </div>
                    <div class="leave-day"> <?php echo $appl['days']; ?> Days.
                        <span class="leave-date">(from <?php echo $appl['date_from']; ?> to
                            <?php echo $appl['date_to']; ?> )</span>
                    </div>
                    <div class="leave-status"> <?php echo $status_text; ?> </div>
                </div>
                <i class="bi bi-check-circle-fill leave-edit" onclick="leave_app_edit(<?php echo $appl_id; ?>, 1);"></i>
                <i class="bi bi-x-circle-fill leave-delete" onclick="leave_app_edit(<?php echo $appl_id; ?>, 2);"></i>
                <i class="bi bi-circle-half leave-delete" style="color:orange; margin-left:12px;" onclick="leave_app_edit(<?php echo $appl_id; ?>, 3);"></i>
            </div>
            <?php
        }
        ?>

    </div>


    </div>

</main>
<div style="height:52px;"></div>

<script>
    function rel(id) {
        window.location.href = "studentedit.php?id=" + id;
    }

    function leave_app_edit(id, tail) {
        window.location.href = "leave-application-response.php?appid=" + id + "&tail=" + tail;
    }

</script>

<script>
    function save_leave_application(id, tail) {
        var tid = document.getElementById("tid").value;
        var types = document.getElementById("types").value;
        var reason = document.getElementById("reason").value;
        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById("date2").value;


        var infor = "tid=" + tid + "&types=" + types + "&reason=" + reason + "&date1=" + date1 + "&date2=" + date2 + "&id=" + id + "&tail=" + tail;
        // alert(infor);
        $("#px").html("");

        $.ajax({
            type: "POST",
            url: "backend/save-leave-application.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#px').html('<span class="">Updating...</span>');
            },
            success: function (html) {
                $("#px").html(html);

                window.location.href = 'leave-application.php';
            }
        });
    }
</script>