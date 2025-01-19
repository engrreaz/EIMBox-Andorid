<?php
session_start();
date_default_timezone_set('Asia/Dhaka');
$dt = date('Y-m-d H:i:s');
$sy = date('Y');
include('../db.php');

$user = $otp = '';
// POST DATA
if (isset($_POST['email'])) {
    $user = $_POST['email'];
}
if (isset($_POST['password'])) {
    $otp = $_POST['password'];
}

// GET DATA
if (isset($_GET['email'])) {
    $user = $_GET['email'];
}
if (isset($_GET['pass'])) {
    $otp = $_GET['pass'];
}



$token_found = 0;
if (isset($_GET["token"])) {
    $devicetoken = $_GET["token"];
    $token_found = 1;
    $_SESSION["devicetoken"] = $devicetoken;
}


$gps = "";
if (isset($_GET['geolat'])) {
    $glat = $_GET['geolat'];
}
if (isset($_GET['geolon'])) {
    $glon = $_GET['geolon'];
}
$gps = "&geolat=" . $glog . "&geolon=" . $glon;


$otp2 = '10567600';

include 'header.php';
// if (substr($user, 6) > 100000 && strlen($user) >= 10 ) {
//     echo '<script>alert("XXXPP");</script>';
// }
$uuu = [];
$sql0 = "SELECT * from usersapp where email = '$user' and active=1 and (otp = '$otp' || fixedpin='$otp')";
// echo $sql0;
$result0885 = $conn->query($sql0);
if ($result0885->num_rows > 0) {
    while ($row0 = $result0885->fetch_assoc()) {
        $uuu[] = $row0;
    }
}
var_dump($uuu);





echo '<div class="mt-5 text-center">';


// echo 'CRED : ' . $user . '/' . $otp . '///' . $glat . '**' . $glon;

if ($otp == $otp2) {
    $_SESSION["user"] = $user;

    $module = 'Login';
    $action = 'Logged in';
    $notes = 'Logged in with master key';
    // include 'backend/save-track-book.php';
    $_SESSION["user"] = $user;
    if ($token_found == 1 && $devicetoken != '') {
        $query33pxy_device_token = "UPDATE usersapp set token='$devicetoken' where email='$usr';";
        $conn->query($query33pxy_device_token);
    }

    setcookie("user", time() + (3600 * 24 * 365));
    ?>
    <script>
        window.location.href = 'index.php?email=<?php echo $user; ?>&truelogin=1<?php echo $gps; ?>';
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
                setcookie("user", time() + (3600 * 24 * 365));
                if ($token_found == 1 && $devicetoken != '') {
                    $query33pxy_device_token = "UPDATE usersapp set token='$devicetoken' where email='$usr';";
                    $conn->query($query33pxy_device_token);
                }

                ?>
                <script>
                    window.location.href = 'index.php?email=<?php echo $user; ?>&truelogin=1<?php echo $gps; ?>';
                </script>
                <?php

            } else {
                echo "OPT Expired!";
            }
        }
    } else {
        echo "Login credentials are invalid. Please try with right info.";
    }
}


echo '</div>';