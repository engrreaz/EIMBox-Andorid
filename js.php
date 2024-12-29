<script>



    // Front page block
    //Schedule
    function oneSecondFunction() {
        var x = document.getElementById("kk").innerHTML;
        x = parseInt(x) - 1;
        if (x < 1) {
            window.location.href = 'index.php';
        }
        var cd = document.getElementById("class-dur").innerHTML;
        cd = parseInt(cd) * 1;
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


</script>