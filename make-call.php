<?php
include 'inc.php';
?>
<div class="st-id mt-5 text-center" id="foc"></div>


<script>
    var tx = document.getElementById("foc");
    window.onfocus = function () {
        tx.innerHTML = "Please wait....";
        history.back();
    };

    window.onblur = function () {
        tx.innerHTML = "Calling...";
    }
</script>