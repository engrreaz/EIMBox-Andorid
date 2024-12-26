
<?php  if($perc<100){ include 'sttracking.php'; }    // tracking is not complete
    $pname = 'https://eimbox.com/students/' . $userid . '.jpg';
    if(!file_exists($pname)){
        $pname = $pth;;
    } 

?>
<style>
    .wd {
        width: 45px;
    }
 
    .nmbr {
        font-size: 30px;
        font-weight: bold;
    }

    .nmbr small {  
        font-size: 14px;
        font-weight: 500;
    }

  

    .time {
        font-size: 24px;
        font-weight: bold;
    }

    .date {
        font-weight: 500;
        color: var(--darker);
    }

    .lable {font-size:11px;}

  

    .right {
        float: right;
    }

    .attnd {
        font-size: 24px;
        font-weight: 500;
        color: var(--darker);
        margin: 0;
        position: relative;
    }

    a,
    a:hover,
    a:link,
    a:visited {
        text-decoration: none;
        font-size: 16px;
        font-weight: 500;
        color: var(--dark);
    }

    .lnk-text {
        display: inline-block;
        padding: 7px 7px;
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
    }
</style>


<div class="clearfix"></div>



<?php
include 'timing-block.php';
include 'notice.php';


?>


<style>
    .steng {
        font-size: 16px;
        font-weight: 700;
        color: var(--darker);
    }

    .stben {
        font-size: 16px;
        font-weight: 500;
        color: gray;
    }

    .stid {
        font-size: 11px;
        font-weight: 500;
        color: black;
    }

    .cls {
        font-size: 11px;
        font-weight: 500;
        color: var(--dark);
    }

    .lebel {
        font-size: 12px;
        font-weight: 500;
        color: black;
        padding-top: 8px;
    }

    .fix {
        margin-bottom: 8px;
    }
</style>


<div class="main-card gb card">

    <table style="margin-left:30px; margin-top:20px;">
        <tr>
            <td style="width:75px;"><img src="<?php echo $pname; ?>"
                    style="width:64px; height:64px; border-radius:50%;" /></td>
            <td>
                <div class="steng">
                    <?php echo $stnameeng; ?>
                </div>
                <div class="stben">
                    <?php echo $stnameben; ?>
                </div>
                <div class="stid">STID #
                    <?php echo $stid; ?>
                </div>
                <div class="cls">Class :
                    <b><?php echo $cls; ?></b> | Section : 
                    <b><?php echo $sec; ?></b>
                </div>
            </td>
        </tr>
    </table>

    <table style="margin: 20px 60px 10px 30px;">
        <tr>
            <td style="text-align:center;">
                <div class="" onclick="result(<?php echo $userid;?>);">
                    <svg class="fix" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                        <path
                            d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                    </svg><br><span class="lebel">Results</span>
                </div>
            </td>

            <td style="text-align:center;">
                <div class="" onclick="attnd(<?php echo $userid;?>);">
                    <svg class="fix" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                        <path
                            d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                    </svg><br><span class="lebel">Attendance</span>
                </div>
            </td>

            <td style="text-align:center;">
                <div class="" onclick="more(<?php echo $userid;?>);">
                    <svg class="fix" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-three-dots" viewBox="0 0 16 16">
                        <path
                            d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                    </svg><br><span class="lebel">More</span>
                </div>
            </td>
        </tr>
    </table>
</div>




<div style="height:50px;">

</div>






<script>
    function result(){
        
    }
    
    function attnd(){
        
    }
    
    function more(id){
        window.location.href = 'stguarmore.php?stid=' + id;
    }
</script>






<?php include 'footer.php'; ?>