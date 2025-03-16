<?php
$speed = "5";
?>
<marquee behavior="scroll" direction="left" scrollamount="<?php echo $speed; ?>">
    <?php
    foreach ($notices as $notice) {
        $txt = htmlspecialchars($notice['descrip']);
        $txt = str_replace('<br>', ', ', $notice['descrip']);
        echo $txt;
        echo ' -- ';
    }

    ?>
</marquee>