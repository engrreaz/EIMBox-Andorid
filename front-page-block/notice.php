<?php
$notices = array();
$sql0 = "SELECT * FROM notice where sccode = '$sccode' and (expdate = NULL || expdate = '0000-00-00' || expdate >= '$td') order by entrytime desc;";
// echo $sql0 ;
$result0rtx_notice = $conn->query($sql0);
if ($result0rtx_notice->num_rows > 0) {
    while ($row0 = $result0rtx_notice->fetch_assoc()) {
        $notices[] = $row0;
    }
}
// var_dump($notices);
?>

<div class="main-card gg card" style="border-radius:0; border:0;">
    <div class="card-header" style="background:var(--light); border-radius:0; border:0; color:var(--darker);;">
        <b>Notice  Board</b>
    <div class="float-end">
        <i class="bi bi-bell-fill front-icon"></i>
    </div>
    </div>
    <div class="card-body" style="background:var(--lighter); ">

        <?php
        $sl = 0;
        foreach ($notices as $notice) {
            if($notice['color'] == '') {
                $notice['color'] = 'var(--dark);';
            }
            if($notice['icon'] == '') {
                $notice['icon'] = 'bell';
            }

            ?>


            <div class="d-flex mb-2" style="color:<?php echo $notice['color'];?>" onclick="notice_description_blockx(<?php echo $sl;?>);">
                <div class="notice-icon">
                    <i class="bi bi-<?php echo $notice['icon'];?> "  style="color:<?php echo $notice['color'];?>"></i>
                </div>
                <div class="mt-2">
                    <h6 class="stname-ben"><?php echo $notice['title'];?></h6>
                    <div class="roll-no mt-1 text-secondary"  id="descrip<?php echo $sl;?>" style="line-height:20px; display:none; "><?php echo $notice['descrip'];?></div>
                    <div class="notice-small-gray"><small>2 Hrs ago <span class="notice-by">by Mr. Aminul
                                Islam</span></small></div>
                </div>
            </div>

        <?php $sl++; } ?>

        <button class="btn btn-primary text-small" onclick="show_all_notice();">Show All</button>
    </div>
</div>


<script>
    function notice_description_blockx(sl) {
        var elem = document.getElementById("descrip" + sl);
        // alert(sl);
        if(elem.style.display == "block"){
            elem.style.display = "none";
        } else {
            elem.style.display = "block";
        }
    }
</script>