<?php
include 'front-page-block/schedule.php';
include 'front-page-block/task-teacher.php';
include 'front-page-block/notice.php';

include 'front-page-block/cashmanager.php';
include 'front-page-block/st-payment-block.php';
include 'front-page-block/clsteacherblock.php';

include 'front-page-block/accountantsblock.php';
// include 'front-page-block/clsteacherblock.php';
include 'front-page-block/admin-st-attnd.php';


//**********************************************************************************************************************************************************************   

echo '<a class="btn btn-dark" style="margin-top:8px;"  href="mypr.php">My Receipts</a>';

// $sql0 = "SELECT sum(amount) as paisi FROM stpr where sessionyear='$sy' and sccode='$sccode' and entryby='$usr'";
// $result01xe = $conn->query($sql0);
// if ($result01xe->num_rows > 0) {
//     while ($row0 = $result01xe->fetch_assoc()) {
//         $paisi = $row0["paisi"];
//     }
// }

?>

<a href="https://www.web.eimbox.com/teachersedit.php?tid=<?php echo $userid; ?>" class="btn btn-info">My Pfofile</a>

<div style="height:52px;"></div>


<script>
    function goclsp() { window.location.href = 'finclssec.php'; }
    function goclsa() { window.location.href = 'finacc.php'; }
    function gor() { alert("OK"); window.location.href = 'resultprocess.php'; }
    function gorx() { window.location.href = 'settings.php'; }
    function sublist() { window.location.href = 'tools_allsubjects.php'; }
    function update() { window.location.href = 'whatsnew.php'; }
    function token() { window.location.href = 'accountsecurity.php'; }

    function goclsa() { window.location.href = 'finacc.php'; }
    function mypr() { window.location.href = 'mypr.php'; }

    function goclsatt(x1, x2) { window.location.href = 'stattnd.php?cls=' + x1 + '&sec=' + x2; }
    function register(x1, x2) { window.location.href = 'stattndregister.php?cls=' + x1 + '&sec=' + x2; }

    function goclsattall() { window.location.href = 'attndclssec.php'; }
</script>