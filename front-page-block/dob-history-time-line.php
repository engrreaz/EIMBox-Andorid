<?php
$datam_session_year = array();
$sql0 = "SELECT stid, classname, sectionname FROM sessioninfo where  sccode='$sccode' and sessionyear LIKE '%$sy%'   ";
$result0datam_session_year = $conn->query($sql0);
if ($result0datam_session_year->num_rows > 0) {
    while ($row0 = $result0datam_session_year->fetch_assoc()) {
        $datam_session_year[] = $row0;
    }
}
// var_dump($datam_calendar_events);

$like_date = date('-m-d');
$datam_dob_profile = array();
$sql0 = "SELECT stid, stnameeng FROM students where  sccode='$sccode' and dob LIKE '%$like_date%'   ";
$res_datam_dob_profile = $conn->query($sql0);
if ($res_datam_dob_profile->num_rows > 0) {
    while ($row0 = $res_datam_dob_profile->fetch_assoc()) {
        $datam_dob_profile[] = $row0;
    }
}

$final_array = array();
$sl = 0;
foreach ($datam_dob_profile as $dob_student) {
    $stid = $dob_student['stid'];
    $ind = array_search($stid, array_column($datam_session_year, 'stid'));
    if ($ind != '' || $ind != null) {
        $cls = $datam_session_year[$ind]['classname'];
        $sec = $datam_session_year[$ind]['sectionname'];

        $stname = $dob_student['stnameeng'];
        $final_array[$sl]['stid'] = $stid;
        $final_array[$sl]['stname'] = $stname;
        $final_array[$sl]['cls'] = $cls;
        $final_array[$sl]['sec'] = $sec;
        $sl++;

    }
}

// var_dump($final_array);
if (count($final_array) > 0) {
    ?>
    <div class="card-body p-3 mt-1 " style="background:var(--lighter); ">
        <div class="row  align-items-center">
            <!-- <div class="col-1"></div> -->
            <div class="col-1 m-0 p-0 text-small">
                <div class="text-small dob-title" style="transform: rotate(90deg);">BIRTHDAY</div>
            </div>
            <?php
            foreach ($final_array as $dob) {
                $stname = $dob['stname'];
                $stid = $dob['stid'];

                $photo_path = $BASE_PATH_URL . 'students/' . $stid . ".jpg";
                if (!file_exists($photo_path)) {
                    $photo_path = "https://eimbox.com/teacher/no-img.jpg";
                } else {
                    $photo_path = $BASE_PATH_URL_FILE . 'students/' . $stid . ".jpg";
                }
                ?>
                <div class="col-2 text-center" onclick="stname('<?php echo $stname; ?>', '<?php echo $sstid; ?>');">
                    <img src="<?php echo $photo_path; ?>" class="st-pic-small" />
                    <div class="event-text text-center text-small" hidden><?php echo $stname; ?></div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
    <?php

}


?>

<script>
    function stname(st, stid) {
        Swal.fire({
            title: st + stid,
            draggable: true
        });
    }

</script>