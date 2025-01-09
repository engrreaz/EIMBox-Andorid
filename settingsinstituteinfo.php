<?php
include 'inc.php';
?>

<body>
    <header>
        <!-- place navbar here -->
    </header>
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


                    <div class="card text-center" style="background:var(--dark); color:white; ">
                        <div class="card-body" style="height:100px;">
                            <center><b>Institute Information</b></center>
                            <center><img src="<?php echo $logo; ?>" class="pic" /></center>
                        </div>
                    </div>



                    <div class="card text-center gg" style="background:var(--lighter);">

                        <div class="card-body">
                            <div style="height:35px;"></div>

                            <div style="text-align:left; padding-top:32px;">

                                <table width="100%">
                                    <tr>
                                        <td style="width:30px;" valign="top"></td>
                                        <td>
                                            <table width="100%">
                                                <tr>
                                                    <td>
                                                        <div class="b" onclick="relx(<?php echo $stid; ?>);">
                                                            <?php echo $sccode; ?></div>
                                                        <div class="e">EIIN Number</div>
                                                        <div style="height:5px;"></div>
                                                        <div class="b" style="font-size:16px;"><?php echo $scname; ?></div>
                                                        <div class="e">Institution</div>
                                                        <div style="height:25px;"></div>
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
                            <div style="text-align:left; padding-top:0px;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">person</i></span>
                                    <input type="text" id="scname" name="scname" style="" class="form-control"
                                        placeholder="Institute Name" value="<?php echo $scname; ?>">
                                </div>
                            </div>

                            <div style="margin:10px 0; height:2px; background:var(--lighter);"></div>

                            <div style="margin:0px 0; height:1px;"></div>
                            <div style="text-align:left; padding-top:0px;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">place</i></span>
                                    <input type="text" id="add1" name="add1" class="form-control" placeholder="Address Line 1"
                                        value="<?php echo $scadd1; ?>">
                                </div>
                            </div>


                            <div style="text-align:left; padding-top:0px;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico"
                                            style="color:#dfecef;">group</i></span>
                                    <input type="text" id="add2" name="add2" class="form-control" placeholder="Address Line 2"
                                        value="<?php echo $scadd2; ?>">
                                </div>
                            </div>
                            <div style="margin:0px 0; height:1px;"></div>
                            <div style="text-align:left; padding-top:0px;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico"
                                            style="color:#dfecef;">group</i></span>
                                    <input type="text" id="ps" name="ps" class="form-control" placeholder="Upazila"
                                        value="<?php echo $ps; ?>">
                                </div>
                            </div>


                            <div style="text-align:left; padding-top:0px;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">map</i></span>
                                    <input type="text" id="dist" name="dist" class="form-control" placeholder="District"
                                        value="<?php echo $dist; ?>">
                                </div>
                            </div>

                            <div style="margin:10px 0; height:2px; background:var(--lighter);"></div>


                            <div style="margin:0px 0; height:1px;"></div>
                            <div style="text-align:left; padding-top:0px;">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons ico">phone</i></span>
                                    <input type="tel" id="mno" name="mno" class="form-control" placeholder="Mobile Number"
                                        value="<?php echo $mobile; ?>">
                                </div>
                            </div>


                            <div style="text-align:left; padding-top :15px; padding-left:60px;">
                                <button type="button" class="btn btn-primary" onclick="upd();">Update Info</button>
                                <span id="px"></span>
                            </div>






                        </div>
                    </div>
                    <div style="height:1px;"></div>














                    <div style="height:1px;"></div>




                    <?php

                }
            }

            ?>



        </div>

    </main>
    <div style="height:52px;"></div>
    <footer>
        <!-- place footer here -->
    </footer>

    <script>
        function rel(id) {
            window.location.href = "studentedit.php?id=" + id;
        }

        function edit(id) {
            window.location.href = "studentedit.php?id=" + id;
        }  
    </script>

    <script>
        function upd() {
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
                url: "updatescinfo.php",
                data: infor,
                cache: false,
                beforeSend: function () {
                    $('#px').html('<span class="">Updating...</span>');
                },
                success: function (html) {
                    $("#px").html(html);
                    //alert('students.php?cls=<?php echo $cls; ?>&sec=<?php echo $sec; ?>#<?php echo $stid; ?>');
                    window.location.href = 'index.php';
                }
            });
        }
    </script>



</body>