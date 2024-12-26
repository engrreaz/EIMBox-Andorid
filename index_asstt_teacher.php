<?php
// INSERT NECESSARY TO-DO-LIST ***************************************************************************************************************************
$ddd = 0;
$sql0 = "SELECT *  FROM todolist where date='$td' and sccode='$sccode' and user='$usr' and todotype='attendance'";
$result01x = $conn->query($sql0);
if ($result01x->num_rows == 0) {

    $query33pxy = "insert into todolist (id, sccode, date, user, todotype, descrip1, descrip2, status, creationtime, response, responsetxt, responsetime) 
                    values (NULL, '$sccode', '$td', '$usr', 'Attendance', '', '', 0, '$cur', 'geoattnd', 'Submit', NULL);";
    $conn->query($query33pxy);
}


// INSERT NECESSARY TO-DO-LIST ***************************************************************************************************************************
?>


<style>

</style>

<?php include 'task-teacher.php'; ?>
<?php include 'front-page-block/notice.php'; ?>


<div class="card gg">
    <div class="card-body">

        <a class="btn btn-warning" href="admin-sclist.php">Institute List</a>
        <a class="btn btn-danger" href="sout.php">Log Out</a>
        <br>
        <a class="btn btn-danger" href="kbase.php">Knowledge Base</a><br>
        <a class="btn btn-success" href="kbaseadd.php">Knowledge Add</a>
        <a class="btn btn-info" href="receipt.php?cls=Nine&sec=Science&roll=25">EPOS</a>
        <a class="btn btn-warning"
            href="stattnd.php?cls=<?php echo $cteachercls; ?>&sec=<?php echo $cteachersec; ?>">Attendance</a>

    </div>
</div>


<?php
//**********************************************************************************************************************************************************************   


$mon = date('m');
echo '';
echo '<a class="btn btn-dark" style="margin-top:8px;"  href="mypr.php">My Receipts</a>';

include 'front-page-block/cashmanager.php';
include 'front-page-block/st-payment-block.php';

include 'front-page-block/clsteacherblock.php';


$sql0 = "SELECT count(*) as cntt FROM areas where sessionyear='$sy' and user='$rootuser' and halfdone=0";
$result01g = $conn->query($sql0);
if ($result01g->num_rows > 0) {
    while ($row0 = $result01g->fetch_assoc()) {
        $cntt = $row0["cntt"];
    }
}

if ($cntt >= 0) {


    $sql0 = "SELECT sum(half) as req FROM areas where sessionyear='$sy' and user='$rootuser'";
    $result01 = $conn->query($sql0);
    if ($result01->num_rows > 0) {
        while ($row0 = $result01->fetch_assoc()) {
            $req = $row0["req"];
        }
    }
    $sql0 = "SELECT count(*) as doneold FROM pibientry where sessionyear='$sy' and sccode='$sccode' and exam = 'Half Yearly'";
    $result01 = $conn->query($sql0);
    if ($result01->num_rows > 0) {
        while ($row0 = $result01->fetch_assoc()) {
            $doneold = $row0["doneold"];
        }
    }
    $sql0 = "SELECT count(*) as donenew FROM stmark where sessionyear='$sy' and sccode='$sccode' and exam = 'Half Yearly'";
    $result01 = $conn->query($sql0);
    if ($result01->num_rows > 0) {
        while ($row0 = $result01->fetch_assoc()) {
            $donenew = $row0["donenew"];
        }
    }

    $done = $donenew + $doneold;
    if ($req > 0) {
        $rate = ceil($done * 100 / $req);
    } else {
        $rate = 0;
    }

    ?>
    <div class="card " onclick="gov();">
        <div class="card-header" style="color:var(--lighter); background:var(--dark);border-radius:0;"><b>Student
                Assessments</b></div>
        <div class="card-body">
            <h6><b>Marks Entry My Class</b></h6>
            <div style="background:var(--light);">
                <div style="background:var(--darker); width:<?php echo $rate; ?>%; height:10px;"></div>
            </div>
            <small><span style="font-style:normal;">Process : <b><?php echo $doneold; ?> </b> | Found :
                    <b><?php echo $donenew; ?> </b> | Required : <b><?php echo $req; ?> </b> | </span></small><br>
            <small><span style="font-style:italic;">Total Progress : <b><?php echo $rate; ?>%
                    </b>done.</span></small><br>
            <button class="btn btn-danger" style="margin-top:8px;" onclick="token();">Token</button>
        </div>
    </div>

    <?php


    ?>

    <div class="card gg" onclick="gor();">
        <div class="card-body">
            <h4>My Subjects (Marks Entry)</h4>
            <small><span style="font-style:italic;">View Status of Marks Entry (Annual Examination 2024)</span></small>
        </div>
    </div>


    <?php
}


//**********************************************************************************************************************************************************************   

//   echo 'xxx';
$sql0 = "SELECT sum(amount) as paisi FROM stpr where sessionyear='$sy' and sccode='$sccode' and entryby='$usr'";
$result01xe = $conn->query($sql0);
if ($result01xe->num_rows > 0) {
    while ($row0 = $result01xe->fetch_assoc()) {
        $paisi = $row0["paisi"];
    }
}


// include 'front-page-block/accountantsblock.php';





?>




<a href="https://www.web.eimbox.com/teachersedit.php?tid=<?php echo $userid; ?>" class="btn btn-info">My Pfofile</a>


<div style="height:52px;"></div>











<script>
    function goclsp() { window.location.href = 'finclssec.php'; }
    function goclsa() { window.location.href = 'finacc.php'; }
    function goclss() { window.location.href = 'finstudents.php?cls=<?php echo $cteachercls; ?>&sec=<?php echo $cteachersec; ?>'; }

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