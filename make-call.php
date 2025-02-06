<?php
include 'inc.php';
?>
<div class="st-id mt-5 text-center" id="foc"></div>


<script>
    if (document.hasFocus()){
         var elem = document.getElementById("foc");
   if(elem.innerHTML==''){
    elem.innerHTML="Calling...";
   } else {
    history.back();
   }
    }
  
</script>