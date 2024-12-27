<div style="text-align:center; padding: 10px 15px;">
    <table style=" width:100%; ">
        <tr>
            <?php if ($userlevel == 'Administrator') {
                if ($ssx > 0) {
                    $ccx = 'dark';
                } else {
                    $ccx = 'lighter';
                }
                echo '<td class="wd" style="color:var(--' . $ccx . ');"><span class="" onclick="issue();"><i class="bi bi-patch-question-fill"></i></span></td>';
            }
            ?>

            <td class="wd" style="font-size:36px;"><span class="" onclick="act1"><i
                        class="bi bi-node-plus-fill"></i></span></td>
            <td class="wd"><span class="" style="<?php if ($ccnntt > 0) {
                echo 'color:var(--dark);';
            } ?>" onclick="act22();"><i class="bi bi-bell-fill"></i></span></td>
            <td class="wd"><span class="" style="<?php if ($y + $n > 0 && $perc < 100) {
                echo 'color:var(--dark);';
            } ?>" onclick="act3();"><i class="bi bi-check2-circle"></i></span></td>
            <td class="wd" style="font-size:28px;"><span class="" onclick="act4"><i
                        class="bi bi-chat-square-text-fill"></i></span></td>
        </tr>
        <tr>
            <td class="lbls"><?php echo ''; ?></td>
            <td class="lbls"><?php echo ''; ?></td>
            <td class="lbls"><?php if ($ccnntt > 0) {
                echo $ccnntt;
            } ?></td>
            <td class="lbls"><?php if ($y + $n > 0 && $perc < 100) {
                $tt = $y + $n;
                echo $y . '/' . $tt; ?>
                    <div style="width:70%; border:0;   background:var(--lighter); margin:auto;">
                        <div style="width:<?php echo $perc; ?>%; height:2px; background:var(--dark);">&nbsp;</div>
                    </div>
                <?php } ?>
            </td>
            <td class="lbls"><?php echo ''; ?></td>
        </tr>
    </table>
</div>