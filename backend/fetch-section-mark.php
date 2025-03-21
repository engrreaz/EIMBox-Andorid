<?php
date_default_timezone_set('Asia/Dhaka');
;
$dt = date('Y-m-d H:i:s');
;
$sy = date('Y');
include('incb.php');
;

$user = $_POST['user'];
;
$cls = $_POST['cls'];
;




?>


<div class="form-group">
  <label class="lblx text-muted mt-3" for="">Section/Group</label>
  <select class="form-control" id="sectionname" onchange="fetchsubject();">
    <option></option>
    <?php
    $sql0 = "SELECT subarea as sec FROM areas where sessionyear LIKE '%$sy%' and user='$user' and areaname='$cls' group by subarea order by idno";
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
      while ($row0 = $result0->fetch_assoc()) {
        $sec = $row0["sec"];
        echo '<option value="' . $sec . '">' . $sec . '</option>';
      }
    } ?>
  </select>
</div>