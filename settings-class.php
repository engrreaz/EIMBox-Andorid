<?php
include 'inc.php';
?>

<main>
    <div class="container-fluidx">
        <div class="card text-left" style="background:var(--dark); color:var(--lighter);">

            <div class="card-body">
                <div class="card-body page-top-box">
                    <div class="menu-icon"><i class="bi bi-square-half"></i></div>
                    <div class="menu-text">Classes & Sections</div>
                </div>
            </div>
        </div>


        <?php if ($userlevel == 'Administrator' || $userlevel == 'Head Teacher') { ?>



            <div class="card" id="newblock" style="background:var(--lighter); color:var(--darker); display:none;">
                <div class="card-body">
                    <table style="width:100%;">
                        <tr>
                            <td><b>Add a new class</b></td>
                        </tr>
                        <tr>
                            <td>

                                <div style="text-align:left; padding-top:0px; display:none;">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-diagram-3-fill"></i></span>
                                        <input type="text" id="id" name="id" class="form-control"
                                            placeholder="Enter Section/Group Name" value="">
                                    </div>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text p-0 ps-2 pe-2"><i class="bi bi-diagram-3-fill"></i></span>
                                    <input type="text" id="cls" name="cls" class="form-control"
                                        placeholder="Enter Class Name" value="">

                                    <!-- <select class="form-control" id="cls">

                                        <option value="">Choose a Class</option>
                                        <option value="Six">Six</option>
                                        <option value="Seven">Seven</option>
                                        <option value="Eight">Eight</option>
                                        <option value="Nine">Nine</option>
                                        <option value="Ten">Ten</option>
                                    </select> -->
                                </div>

                                <div style="margin:0px 0; height:5px; background:var(--lighter);"></div>

                                <div style="text-align:left; padding-top:0px;">
                                    <div class="input-group">
                                        <span class="input-group-text p-0 ps-2 pe-2"><i
                                                class="bi bi-diagram-3-fill"></i></span>
                                        <input type="text" id="sec" name="sec" class="form-control"
                                            placeholder="Enter Section/Group Name" value="">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td class="text-right pt-2">
                                <div style="margin:0px 0; height:5px; background:var(--lighter);"></div>
                                <button class="btn btn-outline-success text-small  ps-5 pe-5"
                                    onclick="submit();">Submit</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>




            <div class="card" style="background:var(--darker); color:var(--lighter);">
                <img class="card-img-top" alt="">
                <div class="card-body">
                    <div class="float-end">
                        <button class="btn btn-dark btn-rounded text-white" onclick="showaddnew();">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <div class="mt-2">Class & Section List</div>
                </div>
            </div>







            <div id="block">
                <?php include 'backend/settings-class-class-list.php'; ?>
            </div>


        </div>
    <?php } ?>


    </div>
    <div style="height:52px;"></div>
</main>


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

    function showaddnew() {
        document.getElementById("newblock").style.display = 'block';
    }

</script>


<script>
    function submit() {
        var id = document.getElementById("id").value;
        var cls = document.getElementById("cls").value;
        var sec = document.getElementById("sec").value;

        var infor = "rootuser=<?php echo $rootuser; ?>&cls=" + cls + "&sec=" + sec + "&id=" + id + "&action=1";
        $("#block").html("");

        $.ajax({
            type: "POST",
            url: "backend/add-edit-class.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#block').html('<span class=""><center>Processing, Please Wait....</center></span>');
            },
            success: function (html) {
                $("#block").html(html);
                document.getElementById("id").value = "";
                document.getElementById("cls").value = "";
                document.getElementById("sec").value = "";
                document.getElementById("newblock").style.display = 'none';

            }
        });
    }


    function edit(id) {
        document.getElementById("newblock").style.display = 'block';
        let a = document.getElementById("cls" + id).innerHTML;
        let b = document.getElementById("sec" + id).innerHTML;
        document.getElementById("cls").value = a;
        document.getElementById("sec").value = b;
        document.getElementById("id").value = id;
    }

    function del(id) {
        var infor = "rootuser=<?php echo $rootuser; ?>&id=" + id + "&action=0";
        $("#block").html("");

        $.ajax({
            type: "POST",
            url: "addeditclass.php",
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
</script>