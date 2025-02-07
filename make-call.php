<?php
include 'inc.php';
?>
<div class="st-id mt-5 text-center" id="foc"></div>


<script>
var isTabActive;
 var tx = document.getElementById("foc");
window.onfocus = function () { 
//   isTabActive = true; 
//   alert('A');
 if(tx.innerHTML == ''){
    tx.innerHTML = "Calling...";
 } else {
    history.back();
 }

}; 

window.onblur = function () { 
    if(tx.innerHTML == ''){
    tx.innerHTML = "Calling...";
 } else {
    history.back();
 }
}

// test
// setInterval(function () { 
//   alert(window.isTabActive ? 'active' : 'inactive'); 
// }, 1000);



    // document.onvisibilitychange = function () {
    //     history.back();
    // }
    // if (document.hasFocus()) {
    //     var elem = document.getElementById("foc");
    //     if (elem.innerHTML == '') {
    //         elem.innerHTML = "Calling...";
    //     }
    // }

</script>