<?php

$my_app_datam = array();
$sql0 = "SELECT * FROM teacher_leave_app where sccode='$sccode' and ( status=0 or status>=3) order by apply_date desc, id desc";
$result0_head_block = $conn->query($sql0);
if ($result0_head_block->num_rows > 0) {
    while ($row0x = $result0_head_block->fetch_assoc()) {
        $my_app_datam[] = $row0x;
    }
}
$teacher_application_count = count($my_app_datam);

?>


<div class="card gg">

    <div class="card-body card-back">

        <?php if ($teacher_application_count > 0) { ?>
            <div class="d-flex mb-2" style="">
                <div class="page-icon" style="color:orange; font-size:36px; padding-right:8px;"> <i
                        class="bi bi-question-diamond-fill"></i>
                </div>
                <div class="">
                    <div class="notice-text pb-1"><?php echo $teacher_application_count; ?> Applications has been submitted
                        by teachers to waiting for your response.</div>
                    <a class="btn btn-dark text-small" href="leave-application-response.php">Response Now</a>
                </div>

            </div>


            <div class="p-0 m-0" style="background:var(--light); height:1px;"></div>
        <?php } ?>


    </div>
</div>









<script>
    function geoattnd(id) {
        // alert(id);
        window.location.href = 'tattnd.php?id=' + id;
    }


</script>