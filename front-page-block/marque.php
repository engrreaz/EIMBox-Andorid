<?php
$speed = "5";
?>
<marquee behavior="scroll" direction="left" scrollamount="<?php echo $speed; ?>">
    <?php
    foreach ($notices as $notice) {
        echo htmlspecialchars($notice['descrip']);
        echo ' -- ';
    }

    ?>
</marquee>