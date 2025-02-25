<?php
include 'inc.php';
include 'datam/datam-teacher.php';
?>

<main>
    <div class="container-fluidx">
        <div class="card text-left" style="background:var(--dark); color:var(--lighter); ">
            <div class="card-body page-top-box" style="border-radius:0;">
                <div class="menu-icon"><i class="bi bi-tools"></i></div>
                <div class="menu-text"> Subjects List </div>

            </div>
        </div>



        <?php
        $sql0 = "SELECT * FROM areas where sessionyear  LIKE '%$sy%'  and user='$rootuser' order by FIELD(areaname,'Six', 'Seven', 'Eight', 'Nine', 'Ten'), subarea, idno";
        //echo $sql0;
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) {
            while ($row0 = $result0->fetch_assoc()) {
                $cls = $row0["areaname"];
                $sec = $row0["subarea"];
                $clstid = $row0["classteacher"];
                $id = $row0["id"];
                $ico = 'iimg/' . strtolower(substr($sec, 0, 5)) . '.png';
                $lnk = "cls=" . $cls . '&sec=' . $sec;


                $photo_path = $BASE_PATH_URL . 'class-icons/' . strtolower($cls) . ".png";
                if (!file_exists($photo_path)) {
                    $photo_path = "https://eimbox.com/teacher/no-img.jpg";
                } else {
                    $photo_path = $BASE_PATH_URL_FILE . 'class-icons/' . strtolower($cls) . ".png";
                }

                ?>
                <div class="card text-center mb-1" style="background:var(--lighter); color:var(--darker);">
                    <div class="card-body">
                        <table width="100%">
                            <tr onclick="sublist(<?php echo $id; ?>);">
                                <td style="width:10px;"><span style="font-size:24px; font-weight:700;"></span></td>
                                <td style="width:60px;;"><img src="<?php echo $photo_path; ?>" class="st-pic-small" /></td>
                                <td style="text-align:left; padding-left:5px;">
                                    <span class="stname-eng"><?php echo strtoupper($cls); ?></span> |
                                    <span class="stname-ben fw-bold"><?php echo $sec; ?></span>
                                    <div class="st-roll">
                                        <?php 
                                    $ind = array_search($clstid, array_column($datam_teacher_profile, 'tid'));
                                    echo $datam_teacher_profile[$ind]['tname']; 
                                    ?>
                                    </div>
                                    
                                </td>
                                <td style="text-align:right; padding:15px;">
                                    <button class="btn btn-white"
                                        style=""
                                        onclick="sublist(<?php echo $id; ?>);"><i class="bi bi-arrow-right"></i></button>
                                </td>

                            </tr>

                        </table>

                        <div class="text-start" id="tailbox<?php echo $id; ?>"></div>



                    </div>
                </div>

            <?php }
        } ?>


    </div>

</main>

<div style="height:52px;"></div>


<script>



    function go(id) {
        window.location.href = "students.php?" + id;
    }




    function sublist(id) {
        var infor = "sccode=<?php echo $sccode; ?>&id=" + id;
        $("#tailbox" + id).html("");

        $.ajax({
            url: "backend/fetch-sub-list.php", type: "POST", data: infor, cache: false,
            beforeSend: function () {
                $("#tailbox" + id).html('<span class=""><center><small>Please wait, fetching list...</small></center></span>');
            },
            success: function (html) {
                $("#tailbox" + id).html(html);
            }
        });
    }
</script>