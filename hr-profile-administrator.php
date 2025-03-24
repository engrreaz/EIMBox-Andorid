<div class="card text-center" style="background:var(--lighter);">

    <div class="card-body">
        <div style="text-align:left; padding-top:2px;">
            <table width="100%">
                <tr>
                    <td style="width:30px;" valign="top"></td>
                    <td>
                        <table width="100%">
                            <tr>
                                <td>
                                    <div class="b" onclick="rel(<?php echo $teacher_pfofile_data[0]['tid']; ?>);"><?php echo $teacher_pfofile_data[0]['tid']; ?></div>
                                    <div class="e">Identity Number</div>
                                    <div style="height:5px;"></div>
                                    <div class="b" style="font-size:16px;"><?php echo $cls; ?> / <?php echo $sec; ?>
                                    </div>
                                    <div class="e">Student's of Class / Section | Group</div>
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
        <div style="text-align:left; padding-top:10px;">
            <table width="100%">
                <tr>
                    <td style="width:30px; padding-right:10px;" valign="top"><i
                            class="bi bi-person-circle menu-item-icon "></i></td>
                    <td class="">
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="height:10px;"></td>
                </tr>
            </table>
        </div>
    </div>
</div>



<div class="card text-center" style="background:var(--lighter);">
    <div class="card-body">
        <div style="text-align:left; padding-top:10px;">
            <table width="100%">
                <tr>
                    <td style="width:30px; padding-right:10px;" valign="top"><i
                            class="bi bi-people-fill menu-item-icon"></i>
                    </td>
                    <td>
                        <div class="d"><?php echo $fname; ?></div>
                        <div class="e">Father's Name</div>

                        <div class="d" style="padding-top:8px;"><?php echo $mname; ?></div>
                        <div class="e">Mother's Name</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="height:10px;"></td>
                </tr>
            </table>
        </div>
    </div>
</div>



<div class="card text-center" style="background:var(--lighter);">

    <div class="card-body">

        <div style="text-align:left; padding-top:5px;">
            <table width="100%">

                <tr>
                    <td style="width:30px; padding-right:10px;" valign="top"><i
                            class="bi bi-telephone-fill menu-item-icon"></i></td>
                    <td>
                        <div style="float:right;"><a href="tel://<?php echo $guarmobile; ?>"
                                class="btn btn-primary">Call
                                Now</a>
                        </div>
                        <div class="d"><?php echo $tel; ?></div>
                        <div class="e">Guardian's Mobile Number</div>
                    </td>
                </tr>


            </table>
        </div>
    </div>
</div>


<div class="card text-center" style="background:var(--lighter);">
    <div class="card-body">
        <div style="text-align:left; padding-top:1px;">
            <table width="100%">
                <tr>
                    <td style="width:30px;  padding-right:10px;" valign="top"><i
                            class="bi bi-geo-alt-fill menu-item-icon"></i></td>
                    <td>
                        <div class="b" style="font-size:16px;">
                            <?php echo $previll . ', ' . $prepo . ',<br>' . $preps . ', ' . $predist; ?>.
                        </div>
                        <div class="e">Present Address</div>
                        <div style="height:25px;"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="height:1px;"></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
if ($userlevel == 'Super Administrator') {
    ?>

    <div class="card text-center" style="background:var(--lighter);">
        <div class="card-body">
            <div style="text-align:left; padding-top:1px;">
                <div style="border-bottom:1px solid gray;">
                    <b>Transfer Certificate</b>
                    <br>
                    <span style="font-size:11px; font-style:italic;">Issue a transfer certificate against the student</span>
                    <br>

                    <div style="text-align:left; padding-top:0px;">
                        <div class="input-group">
                            <span class="input-group-text"><i class="material-icons ico">report</i></span>
                            <select class="form-control" id="cause"
                                style="border:0; background:var(--lighter); border-bottom:1px solid lightgray;">
                                <option>Select a Cuase</option>
                                <option value="Willing of the guardian">Willing of the guardian</option>
                                <option value="End of the education to school">End of the education to school</option>
                                <option value="Change of residence">Change of residence</option>
                            </select>
                        </div>
                    </div>

                    <div style="text-align:left; padding-top:0px;">
                        <div class="input-group">
                            <span class="input-group-text"><i class="material-icons ico">monetization_on</i></span>
                            <input type="text" id="taka" name="taka" class="form-control" placeholder="Amount on Issue"
                                value="">
                        </div>
                    </div>

                    <div style="padding:5px 60px;">
                        <button class="btn btn-info" onclick="tcamount();;"><b>Issue a TC</b></button>
                        <span id="settc"></span>
                    </div>



                </div>
                <div style="text-align:center; padding:50px 10px;">
                    <button class="btn btn-danger" onclick="remove(0);" <?php echo $dtk; ?>>Remove The Student</button>

                    <span id="deldel"></span>
                </div>

            </div>
        </div>
    </div>
    <?php
}