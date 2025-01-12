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

$my_app_datam = array();
$sql0 = "SELECT * FROM teacher_leave_app where sccode='$sccode' and tid='$userid' order by apply_date desc, id desc";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
    while ($row0x = $result0->fetch_assoc()) {
        $my_app_datam[] = $row0x;
    }
}


if (isset($_GET['appid'])) {
    $appid = $_GET['appid'];
    $showhide = '';
    $sql0 = "SELECT * FROM teacher_leave_app where sccode='$sccode' and id='$appid' LIMIT 1";
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
        while ($row0x = $result0->fetch_assoc()) {

            $tid = $tidd = $row0x["tid"];
            $type = $row0x["leave_type"];
            $reason = $row0x["leave_reason"];
            $date1 = $row0x["date_from"];
            $date2 = $row0x["date_to"];
        }
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
            <div class="card-body page-info-box">
                <div class="menu-icon"><i class="bi bi-calendar-x"></i></div>
                <div class="menu-text"> Leave Application </div>


                <i class="bi bi-x-circle-fill leave-delete" onclick="leave_app_edit(0, 0);"></i>

            </div>
        </div>





        <div class="card text-center" <?php echo $showhide;?>>
            <div class="card-body">

                <div class="input-group" <?php if ($userlevel != 'Administrator')
                    echo 'hidden'; ?>>
                    <span class="input-group-text text-box-icon"><i class="bi bi-person-circle"></i></span>

                    <select class="form-control" id="tid">
                        <option value="">Select Teacher / Staff</option>
                        <?php
                        $sql00xgr = "SELECT * FROM teacher where sccode='$sccode' order by ranks, tid";
                        $result00xgr4 = $conn->query($sql00xgr);
                        if ($result00xgr4->num_rows > 0) {
                            while ($row00xgr = $result00xgr4->fetch_assoc()) {
                                $tid = $row00xgr["tid"];
                                $tname = $row00xgr["tname"];
                                if ($tidd == $tid) {
                                    $bb = 'selected';
                                } else {
                                    $bb = '';
                                }
                                echo '<option value="' . $tid . '" ' . $bb . ' >' . $tname . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-separator"></div>

                <div class=" input-group">
                    <span class="input-group-text text-box-icon"><i class="bi bi-person-circle"></i></span>

                    <select class="form-control" id="types">
                        <option value="">Select Leave Type</option>
                        <option value="Casual"> Casual </option>
                        <option value="Medical"> Medical </option>
                        <option value="Others"> Others </option>
                    </select>
                    <script>document.getElementById("types").value = '<?php echo $type; ?>';</script>
                </div>
                <div class="form-separator"></div>


                <div class="input-group">
                    <span class="input-group-text text-box-icon"><i class="bi bi-bank"></i></span>
                    <input type="text" id="reason" name="reason" class="form-control text-box"
                        placeholder="Reason for Leave" value="<?php echo $reason; ?>">
                </div>
                <div class="form-separator"></div>

                <div class="input-group">
                    <span class="input-group-text text-box-icon"><i class="bi bi-geo-fill"></i></span>
                    <input type="date" id="date1" name="date1" class="form-control text-box" placeholder=""
                        value="<?php echo $date1; ?>">
                </div>
                <div class="form-separator"></div>



                <div class="input-group">
                    <span class="input-group-text text-box-icon"><i class="bi bi-geo-fill"></i></span>
                    <input type="date" id="date2" name="date2" class="form-control text-box"
                        value="<?php echo $date2; ?>">
                </div>
                <div class="form-separator"></div>

                <div style="text-align:left; padding-top :15px; padding-left:60px;">
                    <button type="button" class="btn btn-primary"
                        onclick="save_leave_application(<?php echo $appid; ?>, 0);">
                        Submit My Application
                    </button>
                    <span id="px"></span>
                </div>
            </div>
        </div>
        <div style="height:1px;"></div>


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
                        <i class="bi bi-<?php echo $icon;?> leave-icon me-3"></i>
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
                    <i class="bi bi-pencil-square leave-edit" onclick="leave_app_edit(<?php echo $appl_id ;?>, 0);"></i>
                    <i class="bi bi-x-circle-fill leave-delete" onclick="save_leave_application(<?php echo $appl_id ;?>, 2);"></i>
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
        window.location.href = "leave-application.php?appid=" + id;
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