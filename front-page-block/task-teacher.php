<style>

</style>



<div class="card gg">
    <div class="card-header" style="color:var(--darker); background:var(--light);border-radius:0;">
       <b> To-Do List</b>
       <div class="float-end">
        <i class="bi bi-check-square-fill front-icon"></i>
    </div>
    </div>
    <div class="card-body" style="background:var(--lighter);">

        <?php
        $sql0 = "SELECT *  FROM todolist where date='$td' and sccode='$sccode' and user='$usr'";
        $result0rt = $conn->query($sql0);
        if ($result0rt->num_rows > 0) {
            while ($row0 = $result0rt->fetch_assoc()) {
                $id = $row0["id"];
                $todotype = $row0["todotype"];
                $descrip1 = $row0["descrip1"];

                $status = $row0["status"];
                $response = $row0["response"];
                $responsetxt = $row0["responsetxt"];

                if ($status == 1) {
                    $txtclr = 'seagreen';
                    $ico = '<i style="color:seagreen;" class="bi bi-check2-circle"></i>';
                } else {
                    $txtclr = 'red';
                    $ico = '<i style="color:red;" class="bi bi-question-circle-fill"></i>';
                }


                if ($todotype == 'Attendance') {
                    if ($status == 0) {
                        if ($geolat == '' || $geolon == '') {
                            $comm = 'We did not recognize you location. Please make sure you have on your GPS and restart the app.';
                            $action = 0;
                        } else {
                            if ($distance < $tattndradius) {
                                $comm = 'We detect you in the institute area. You may submit your attendance.';
                                $action = 1;
                            } else {
                                $comm = 'We detect you are now ' . $distance . ' meter away from institute ground. Please stay around ' . $tattndradius . ' meter radius on institute ground. <br>If you already stay in the valid area please restart you app and try again. If you face the problem again, contact with your Head Teacher/Principal';
                                $action = 0;
                            }
                        }
                    } else {
                        $comm = 'You have already submit your attendance.';
                        $action = 0;
                    }
                }
                ?>

                <div class="d-flex mb-2" style="color:<?php echo $txtclr; ?>">
                    <div class="notice-icon">
                        <?php echo $ico; ?>
                    </div>
                    <div class="mt-2">
                        <h6 class="notice-text pb-1"><?php echo $todotype; ?></h6>
                        <div class="notice-small-gray">
                            <small>
                                <?php if ($descrip1 != '') { ?>
                                    <span class="descrip">ddd<?php echo $descrip1; ?> <br></span>
                                <?php } ?>

                                <span class="comm"><?php echo $comm; ?></span>
                            </small>
                        </div>



                    </div>
                    <div class="text-dark">
                        <?php if ($action == 1) { ?>
                            <button style="background:var(--dark); color:white; padding:3px 6px; font-size:11px; border-radius:3px;"
                                class="" onclick="<?php echo $response; ?>(<?php echo $id; ?>)"><?php echo $responsetxt; ?></button>
                        <?php } ?>
                    </div>
                </div>



                <?php
            }
        }
        ?>



    </div>
</div>
<div style="background:var(--light); height:1px;"></div>








<script>
    function geoattnd(id) {
        // alert(id);
        window.location.href = 'tattnd.php?id=' + id;
    }


</script>