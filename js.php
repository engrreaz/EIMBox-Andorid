<script>
    var user_level = '<?php echo $userlevel; ?>';


    // Front page block
    //Schedule
    function oneSecondFunction() {
        var x = document.getElementById("kk").innerHTML;
        x = parseInt(x) - 1;
        var cd = document.getElementById("class-dur").innerHTML;
        cd = parseInt(cd) * 1;
        if (x < 1) {
            if (cd > 0) {
                window.location.href = 'index.php';
            } else {
                document.getElementById("jj").innerHTML = 'Class Routine & Schedule are missing.';
                document.getElementById("class-progress-bar").style.display = 'none';
                document.getElementById("class-bar-val").innerHTML = '';
                document.getElementById("jj").innerHTML += '<br><a href="clsroutine-setup.php" class="text-small text-danger"><b>Click Here </b></a> to setup class schedule and routine.';
            }
        } else {
            var txt = '';
            var d, h, m, s;
            if (x > 3600 * 24) {
                d = Math.floor(x / (3600 * 24));
                s = x - (d * 3600 * 24);
                h = Math.floor(s / 3600);
                s = s - h * 3600;
                m = Math.floor(s / 60);
                s = s - m * 60;

                txt = txt + d + " Days " + h + " Hours " + m + " Min " + s + " Sec.";
            } else if (x > 3600) {
                h = Math.floor(x / 3600);
                s = x - h * 3600;
                m = Math.floor(s / 60);
                s = s - m * 60;
                txt = txt + h + " Hours " + m + " Min " + s + " Sec.";

            } else if (x > 60) {
                m = Math.floor(x / 60);
                s = x - m * 60;
                txt = txt + m + " Min " + s + " Sec.";
            } else {
                txt = txt + s + " Sec.";
            }

            var class_perc = 0;
            if (cd > 0) {
                class_perc = x * 100 / cd;
            }
            document.getElementById("kk").innerHTML = x;
            document.getElementById("jj").innerHTML = '<b>' + txt + '</b> Remaining';
            document.getElementById("class-progress-bar").style.width = class_perc + '%';
            document.getElementById("class-bar-val").innerHTML = class_perc + '%';


            var period = document.getElementById("main-29").innerHTML;
            var times = document.getElementById("main-30").innerHTML;
            var timee = document.getElementById("main-31").innerHTML;
            // document.getElementById("time-slot").innerHTML =  times + ' - ' + timee;
            document.getElementById("time-frame").innerHTML = 'Period : ' + times + ' - ' + timee;
            document.getElementById("period-icon").innerHTML = '<i class="bi bi-' + period + '-circle-fill period-icon"></i>';

        }
    }






    function kbase() {
        window.location.href = 'kbase.php';
    }




    // INDEX 
    function top_bar_issue() {
        window.location.href = '.php';
    }

    function top_bar_kbase() {
        window.location.href = 'kbase.php';
    }

    function top_bar_notification() {
        window.location.href = 'notification.php';
    }

    function top_bar_todo() {
        window.location.href = '.php';
    }

    function top_bar_message() {
        window.location.href = '.php';
    }


    // NAVIGATION...........
    function report_menu_daily_collection() {
        window.location.href = 'dailycollection.php';
    }
    function report_menu_my_class() {
        window.location.href = 'student-list.php';
    }
    function report_menu_student_list() {
        if (user_level == 'Administrator' || user_level == 'Super Administrator' || user_level == 'Head Teacher' || user_level == 'Principal') {
            window.location.href = 'classsection.php';
        } else {
            window.location.href = 'students.php';
        }
        // window.location.href = 'students.php';
    }
    function class_section_list_for_student_list_edit(id) {
        window.location.href = "students.php?" + id;
    }
    function report_menu_my_collection() {
        window.location.href = 'mypr.php';
    }
    function report_menu_attnd_register() {
        if (user_level == 'Administrator' || user_level == 'Super Administrator' || user_level == 'Head Teacher' || user_level == 'Principal') {
            window.location.href = 'attndclssec.php';
        } else {
            window.location.href = 'stattndregister.php';
        }
    }
    function report_menu_cls_routine() {
        window.location.href = 'clsroutine.php';
    }
    function report_menu_my_subjects() {
        window.location.href = 'my-subject-list.php';
    }
    function report_menu_ebooks() {
        window.location.href = 'e-books.php';
    }
    function report_menu_calendar() {
        window.location.href = 'calendar.php';
    }
    function report_menu_notification() {
        window.location.href = 'notification.php';
    }
    function report_menu_notices() {
        window.location.href = 'notices.php';
    }


    function calendar_event(year, month, day, tail) {
        alert('Year' + year + month + day + tail);
    }


    function my_class_attendance(stid) {
        Swal.fire({
            title: "Attendance",
            icon: "info",
            draggable: true
        });
    }

    function my_class_payment(stid) {
        Swal.fire({
            title: "Payment's Info",
            icon: "info",
            draggable: true
        });
    }
    function my_class_result(stid) {
        Swal.fire({
            title: "Accademic Performance",
            icon: "info",
            draggable: true
        });
    }
    function my_class_profile(stid) {
        Swal.fire({
            title: "Profile",
            icon: "info",
            draggable: true
        });
    }

    // Tools Navigation
    function module_menu_student_attendace(x1, x2) { window.location.href = 'stattnd.php?cls=' + x1 + '&sec=' + x2; }
    function module_menu_leave_app_response() { window.location.href = 'leave-application-response.php' }

    function module_menu_co_curricular_entry() {
        Swal.fire({
            title: "Currently Unavailable",
            icon: "info",
            draggable: true
        });
    }
    function module_menu_class_test() {
        Swal.fire({
            title: "Currently Unavailable",
            icon: "info",
            draggable: true
        });
    }


    function profile_menu_my_attendance() { window.location.href = "tattnd.php"; }
    function profile_menu_leave_application() { window.location.href = "leave-application.php"; }

    // Settings Navigation
    function settings_menu_my_profile() { window.location.href = "globalsetting.php"; }
    function settings_menu_login_method() { window.location.href = "accountsecurity.php"; }
    function settings_menu_logout() { window.location.href = "sout.php"; }



    // SETTINGS --  ADMIN MENU
    function settings_admin_ins_info() { window.location.href = "settings-institute-info.php"; }
    function settings_admin_st_id_generate() { window.location.href = "settings-student.php"; }
    function settings_admin_st_id_payment_indivisula() { window.location.href = "st-payment-setup-indivisual.php"; }








    // Home Page
    function home_goclsatt(x1, x2) { window.location.href = 'stattnd.php?cls=' + x1 + '&sec=' + x2; }
    function home_cteacher_st_payment(x1, x2) { window.location.href = 'finstudents.php?cls=' + x1 + '&sec=' + x2; }











    //*********************************************************************************************** */




    //********************************************************************* */

    function epos() {
        let lastpr = document.getElementById("mylastpr").value;
        infor = "prno=" + lastpr;
        $("#eposlink").html("");

        $.ajax({
            type: "POST",
            url: "backend/getprinfo.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $("#eposlink").html('.....');
            },
            success: function (html) {
                $("#eposlink").html(html);
            }
        });
    }


</script>