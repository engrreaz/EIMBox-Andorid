<b>Under Constuction</b>

<div class="card text-center" style="background:var(--lighter);">
    <div class="card-body">
        <div style="text-align:left; padding-top:10px;">
            <table width="100%">
                <tr>
                    <td style="width:30px; padding-right:10px;"><i class="bi bi-person-circle menu-item-icon "></i></td>
                    <td colspan="2" class="text-small font-weight-bold ">
                        <?php echo '<b>' . $teacher_pfofile_data[0]['position'] . ' </b>(' . $teacher_pfofile_data[0]['slots'] . ')'; ?>
                        <br>
                        <?php echo $teacher_pfofile_data[0]['subjects']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="datam"><i class="bi bi-telephone-fill"></i></td>
                    <td class="datam-2"><?php echo $teacher_pfofile_data[0]['mobile']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="datam"><i class="bi bi-envelope-fill"></i></td>
                    <td class="datam-2"><?php echo $teacher_pfofile_data[0]['email']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="datam"><i class="bi bi-phone-fill"></i></td>
                    <td class="datam-2"><?php echo $teacher_pfofile_data[0]['emergency']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="datam"><i class="bi bi-droplet-fill"></i></td>
                    <td class="datam-2"><?php echo $teacher_pfofile_data[0]['bgroup']; ?></td>
                </tr>


                <tr>
                    <td colspan="3">
                        <hr style="margin:10px 0 ; padding:0; width:100%; height:1px;" />
                    </td>
                </tr>

                <tr>
                    <td style="width:30px; padding-right:10px;"><i
                            class="bi bi-people-fill menu-item-icon "></i></td>
                    <td colspan="2" class="text-small font-weight-bold ">
                        <div class="float-end text-small text-muted">Father</div>
                        <div>
                            <?php echo $teacher_pfofile_data[0]['fname']; ?>
                        </div>
                        <div class="float-end text-small text-muted">Mother</div>
                        <div>
                            <?php echo $teacher_pfofile_data[0]['mname']; ?>
                        </div>
                        <div class="float-end text-small text-muted">Spouse</div>
                        <div>
                            <?php echo $teacher_pfofile_data[0]['spouse']; ?>
                        </div>

                    </td>
                </tr>







                <tr>
                    <td colspan="3" >
                        <hr style="margin:10px 0 ; padding:0; width:100%; height:1px;" />
                    </td>
                </tr>

                <tr>
                    <td rowspan="7" style="width:30px; padding-right:10px; vertical-align: top; padding-top:5px;"><i
                            class="bi bi-calendar-week-fill menu-item-icon "></i></td>
                            <td colspan="2">
                    <div class="float-end text-small text-muted">First join</div>
                    <div class="text-small text-dark">
                            <?php echo date("l, d F, Y", strtotime($teacher_pfofile_data[0]['jdate'])); ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <hr class="hr-line" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <div class="float-end text-small text-muted">Join (This Institute)</div>
                    <div class="text-small text-dark">
                            <?php echo date("l, d F, Y", strtotime($teacher_pfofile_data[0]['fjdate'])); ?>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <hr class="hr-line" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <div class="float-end text-small text-muted">Date of Birth</div>
                    <div class="text-small text-dark">
                            <?php echo date("l, d F, Y", strtotime($teacher_pfofile_data[0]['dob'])); ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr class="hr-line" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="float-end text-small text-muted">Retirement</div>
                        <div class="text-small text-dark">
                            <?php
                            $lpr = date_create($teacher_pfofile_data[0]['dob']);
                            date_add($lpr, date_interval_create_from_date_string("60 years"));
                            date_sub($lpr, date_interval_create_from_date_string("1 days"));
                            echo date_format($lpr, "l, j F, Y");

                            ?>
                        </div>
                    </td>
                </tr>











                

                <tr>
                    <td colspan="3" >
                        <hr style="margin:10px 0 ; padding:0; width:100%; height:1px;" />
                    </td>
                </tr>

                <tr>
                    <td rowspan="7" style="width:30px; padding-right:10px; vertical-align: top; padding-top:5px;"><i
                            class="bi bi-calendar-week-fill menu-item-icon "></i></td>
                            <td colspan="2">
                    <div class="float-end text-small text-muted">First join</div>
                    <div class="text-small text-dark">
                            <?php echo date("l, d F, Y", strtotime($teacher_pfofile_data[0]['jdate'])); ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <hr class="hr-line" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <div class="float-end text-small text-muted">Join (This Institute)</div>
                    <div class="text-small text-dark">
                            <?php echo date("l, d F, Y", strtotime($teacher_pfofile_data[0]['fjdate'])); ?>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <hr class="hr-line" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <div class="float-end text-small text-muted">Date of Birth</div>
                    <div class="text-small text-dark">
                            <?php echo date("l, d F, Y", strtotime($teacher_pfofile_data[0]['dob'])); ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr class="hr-line" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="float-end text-small text-muted">Retirement</div>
                        <div class="text-small text-dark">
                            <?php
                            $lpr = date_create($teacher_pfofile_data[0]['dob']);
                            date_add($lpr, date_interval_create_from_date_string("60 years"));
                            date_sub($lpr, date_interval_create_from_date_string("1 days"));
                            echo date_format($lpr, "l, j F, Y");

                            ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>