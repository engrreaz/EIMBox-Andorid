<?php
$kbase_cnt = 2;
$kbase_clr = 'var(--dark)';

$bell_cnt = 2;
$bell_clr = 'var(--dark)';

$todo_cnt = 2;
$todo_clr = 'var(--dark)';

$sms_cnt = 5;
$sms_clr = 'var(--dark)';


?>

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

            <td class="wd" style="font-size:36px; color:<?php echo $kbase_clr;?>"><span class="" onclick="kbase();"><i
                        class="bi bi-node-plus-fill"></i></span></td>
            <td class="wd"><span class="" style="<?php  echo 'color:' . $bell_clr . ';'; ?>" onclick="act22();"><i class="bi bi-bell-fill"></i></span></td>
            <td class="wd"><span class="" style="<?php if ($y + $n > 0 && $perc < 100) {
                echo 'color:' . $todo_clr . ';';
            } ?>" onclick="act3();"><i class="bi bi-check2-circle"></i></span></td>
            <td class="wd" style="font-size:28px; ">
                <div onclick="act4" style=" position:relative;">
                    <span class="" style="color:<?php echo $sms_clr; ?>"><i class="bi bi-chat-square-fill"></i></span>
                    <div class="d-flex"
                        style="text-align:center; position:absolute; color:var(--lighter); top:1em; left:48%; font-size:11px;">
                        <?php echo $sms_cnt; ?>
                    </div>
                </div>

            </td>
        </tr>

    </table>
</div>