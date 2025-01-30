<?php
include 'inc.php';
$cls2 = $sec2 = $clssel = $secsel = '';
if (isset($_GET['cls'])) {
    $cls2 = $_GET['cls'];
}

if (isset($_GET['sec'])) {
    $sec2 = $_GET['sec'];
}
?>

<main>
    <div class="container-fluidx">
        <div class="card text-left" style="background:var(--dark); color:var(--lighter);">

            <div class="card-body page-top-box">
                <div class="menu-icon"><i class="bi bi-square-half"></i></div>
                <div class="menu-text"> Setup Class Routine </div>
            </div>
        </div>


        <?php if ($userlevel == 'Administrator' || $userlevel == 'Head Teacher') { ?>
            <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk1();">
                <img class="card-img-top" alt="">
                <div class="card-body">
                    <table style="width:100%;">
                        <tr>
                            <td>
                                <div style="text-align:left; padding-top:0px; display:none;">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="material-icons ico">group</i></span>
                                        <input type="text" id="id" name="id" class="form-control"
                                            placeholder="Enter Section/Group Name" value="">
                                    </div>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text"><i class="bi bi-diagram-3 text-box-icon"></i></span>
                                    <select class="form-control " id="cls" onchange="goo();">

                                        <option value="">Choose a Class</option>
                                        <?php
                                        $sql00xgr = "SELECT * FROM areas where user='$rootuser' and sessionyear='$sy' group by areaname order by idno, id ";
                                        $result00xgr11 = $conn->query($sql00xgr);
                                        if ($result00xgr11->num_rows > 0) {
                                            while ($row00xgr = $result00xgr11->fetch_assoc()) {
                                                $ccc = $row00xgr["areaname"];
                                                if ($ccc == $cls2) {
                                                    $clssel = 'selected';
                                                } else {
                                                    $clssel = '';
                                                }
                                                echo '<option value="' . $ccc . '" ' . $clssel . '>' . $ccc . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group input-group">
                                    <span class="input-group-text"><i class="bi bi-diagram-3-fill text-box-icon"></i></span>
                                    <select class="form-control " id="sec" onchange="goo();">

                                        <option value="">Choose a Section</option>
                                        <?php
                                        $sql00xgr = "SELECT * FROM areas where user='$rootuser' and sessionyear='$sy' and areaname='$cls2'  group by subarea order by idno, id";
                                        $result00xgr = $conn->query($sql00xgr);
                                        if ($result00xgr->num_rows > 0) {
                                            while ($row00xgr = $result00xgr->fetch_assoc()) {
                                                $sec = $row00xgr["subarea"];
                                                if ($sec == $sec2) {
                                                    $secsel = 'selected';
                                                } else {
                                                    $secsel = '';
                                                }
                                                echo '<option value="' . $sec . '"' . $secsel . '>' . $sec . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>


                            </td>
                        </tr>


                        <tr>
                            <td>
                                <button class="btn btn-primary btn-block text-small" onclick="submit();">Search/View
                                    List</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>




            <div class="card" style="background:var(--darker); color:var(--lighter);">
                <div class="card-body text-center">
                    <b> Class Routine </b>
                </div>
            </div>







            <div id="block">



            </div>


        </div>
    <?php } ?>


    </div>

</main>
<div style="height:52px;"></div>


<script>


    function goo() {
        var cls = document.getElementById("cls").value;
        var sec = document.getElementById("sec").value;
        window.location.href = 'clsroutine-setup.php?cls=' + cls + '&sec=' + sec;
    }
</script>
<script>
    function go() {
        var cls = document.getElementById("classname").value;
        var sec = document.getElementById("sectionname").value;
        var sub = document.getElementById("subject").value;
        var assess = document.getElementById("assessment").value;
        var exam = document.getElementById("exam").value;
        let tail = '?exam=' + exam + '&cls=' + cls + '&sec=' + sec + '&sub=' + sub + '&assess=' + assess;
        if (cls == 'Six' || cls == 'Seven') {
            window.location.href = "markpibi.php" + tail;
        } else {
            window.location.href = "markentry.php" + tail;
        }
    }

    function lnk7() { window.location.href = "settingsinstituteinfo.php"; }
    function lnk6() { window.location.href = "settingsclass.php"; }

</script>


<script>
    function submit() {
        var id = 0;//document.getElementById("id").value;
        var cls = document.getElementById("cls").value;
        var sec = document.getElementById("sec").value;

        var infor = "rootuser=<?php echo $rootuser; ?>&cls=" + cls + "&sec=" + sec + "&id=" + id + "&action=1";
        $("#block").html("");

        $.ajax({
            type: "POST",
            url: "backend/show-routine.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#block').html('<span class=""><center>Processing, Please Wait....</center></span>');
            },
            success: function (html) {
                $("#block").html(html);
            }
        });
    }


    function edit(id) {
        var sub = document.getElementById("subj" + id).value;
        var tid = document.getElementById("tid" + id).value;
        var iid = parseInt(document.getElementById("id" + id).innerHTML) * 1;

        var period = parseInt(document.getElementById("per" + id).innerHTML) * 1;
        var wday = parseInt(document.getElementById("wday" + id).innerHTML) * 1;

        var cls = document.getElementById("cls").value;
        var sec = document.getElementById("sec").value;

        var infor = "cls=" + cls + "&sec=" + sec + "&sub=" + sub + "&tid=" + tid + "&id=" + iid + "&period=" + period + "&wday=" + wday;

        $("#exe" + id).html("");

        $.ajax({
            type: "POST",
            url: "backend/save-routine.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#exe' + id).html('<i class="bi bi-arrow-repeat"></i>');
            },
            success: function (html) {
                $("#exe" + id).html(html);
            }
        });
    }

    if ('<?php echo $cls2; ?>' != '' && '<?php echo $sec2; ?>' != '') {
        submit();
    }
</script>