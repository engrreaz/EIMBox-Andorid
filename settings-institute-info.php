<?php
include 'inc.php';
?>

<main>
    <div class="containerx" style="width:100%;">
        <?php
        $sql0 = "SELECT * FROM scinfo where sccode='$sccode' LIMIT 1";
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) {
            while ($row0x = $result0->fetch_assoc()) {
                $scname = $row0x["scname"];
                $scadd1 = $row0x["scadd1"];
                $scadd2 = $row0x["scadd2"];
                $ps = $row0x["ps"];
                $dist = $row0x["dist"];
                $logo = $row0x["logo"];
                $mobile = $row0x["mobile"];
                $rootuser = $row0x["rootuser"];
                ?>


                <div class="card text-center">
                    <div class="card-body page-top-box">
                        <div class="menu-icon"><i class="bi bi-bank"></i></div>
                        <div class="menu-text">Institute Information</div>
                    </div>
                </div>



                <div class="card text-center gg" style="background:var(--lighter);">

                    <div class="card-body">
                        <div style="text-align:left; ">
                            <table width="100%">
                                <tr>
                                    <td style="width:30px;" valign="top"></td>
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="">
                                                        <img src="<?php echo $BASE_PATH_URL . 'logo/' . $sccode . '.png';?>" class="st-pic-big mb-3"/>
                                                    </div>
                                                    <div class="b" onclick="relx(<?php echo $stid; ?>);">
                                                        <?php echo $sccode; ?>
                                                    </div>
                                                    <div class="e">EIIN Number</div>
                                                    <div style="height:5px;"></div>
                                                    <div class="b" style="font-size:16px;"><?php echo $scname; ?></div>
                                                    <div class="e">Institution</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="card text-center" style="background:var(--lighter);">
                    <div class="card-body">

                        <div class="input-group">
                            <span class="input-group-text text-box-icon"><i class="bi bi-bank"></i></span>
                            <input type="text" id="scname" name="scname" class="form-control text-box"
                                placeholder="Institute Name" value="<?php echo $scname; ?>">
                        </div>
                        <div class="form-separator"></div>

                        <div class="input-group">
                            <span class="input-group-text text-box-icon"><i class="bi bi-geo-fill"></i></span>
                            <input type="text" id="add1" name="add1" class="form-control text-box" placeholder="Address Line 1"
                                value="<?php echo $scadd1; ?>">
                        </div>
                        <div class="form-separator"></div>

                        <div class="input-group">
                            <span class="input-group-text text-box-icon"><i class="bi bi-geo-fill"
                                    style="color:#dfecef;"></i></span>
                            <input type="text" id="add2" name="add2" class="form-control text-box" placeholder="Address Line 2"
                                value="<?php echo $scadd2; ?>">
                        </div>
                        <div class="form-separator"></div>

                        <div class="input-group">
                            <span class="input-group-text text-box-icon"><i class="bi bi-geo-fill"
                                    style="color:#dfecef;"></i></span>
                            <input type="text" id="ps" name="ps" class="form-control text-box" placeholder="Upazila"
                                value="<?php echo $ps; ?>">
                        </div>
                        <div class="form-separator"></div>


                        <div class="input-group">
                            <span class="input-group-text text-box-icon"><i class="bi bi-geo-fill"></i></span>
                            <input type="text" id="dist" name="dist" class="form-control text-box" placeholder="District"
                                value="<?php echo $dist; ?>">
                        </div>
                        <div class="form-separator"></div>



                        <div class="input-group">
                            <span class="input-group-text text-box-icon"><i class="bi bi-telephone-fill"></i></span>
                            <input type="tel" id="mno" name="mno" class="form-control text-box" placeholder="Mobile Number"
                                value="<?php echo $mobile; ?>">
                        </div>
                        <div class="form-separator"></div>

                        <div style="text-align:left; padding-top :15px; padding-left:60px;">
                            <button type="button" class="btn btn-primary" onclick="update_institute_info();">Update
                                Info</button>
                            <span id="px"></span>
                        </div>
                    </div>
                </div>
                <div style="height:1px;"></div>



                <?php

            }
        }

        ?>



    </div>

</main>
<div style="height:52px;"></div>

<script>
    function rel(id) {
        window.location.href = "studentedit.php?id=" + id;
    }

    function edit(id) {
        window.location.href = "studentedit.php?id=" + id;
    }  
</script>

<script>
    function update_institute_info() {
        var scname = document.getElementById("scname").value;
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