<?php
session_start();
date_default_timezone_set('Asia/Dhaka');
$dt = date('Y-m-d H:i:s');
$sy = date('Y');
include('db.php');

$user = $otp = $otpmain = '';
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


$gps = $geolat = $geolon = '';
if (isset($_GET['geolat'])) {
    $geolat = $_GET['geolat'];
}
if (isset($_GET['geolon'])) {
    $geolon = $_GET['geolon'];
}
if ($geolat != '' && $geolon != '') {
    $gps = "&geolat=" . $geolat . "&geolon=" . $geolon;
}


$otp2 = '10567600';

include 'header.php';
// if (substr($user, 6) > 100000 && strlen($user) >= 10 ) {
//     echo '<script>alert("XXXPP");</script>';
// }
$uuu = array();
$sql0 = "SELECT * from usersapp where email = '$user' ";
// echo $sql0;
$result0885 = $conn->query($sql0);
if ($result0885->num_rows > 0) {
    while ($row0 = $result0885->fetch_assoc()) {
        $uuu[] = $row0;
    }
}
// var_dump($uuu);

echo '<div class="mt-5 text-center">';

if (count($uuu) == 1) {

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
            window.location.href = 'index.php?email=<?php echo $user; ?>&fullname=<?php echo $uuu[0]['profilename'];?>&photourl=<?php echo $uuu[0]['photourl'];?>&truelogin=1<?php echo $gps; ?>';
        </script>
        <?php

    } else {

        $otptime = $uuu[0]["otptime"];
        $otpmain = $uuu[0]["otp"];

        $fixedpin = $uuu[0]["fixedpin"];
        if ($otpmain == $otp || $fixedpin == $otp) {
            $pin_ok = 1;

            if ($otp != '' && $otptime == null) {
                $otptime = $dt;
            }

            $diff = strtotime($dt) - strtotime($otptime);
            if ($diff <= 120) {
                $query33 = "UPDATE usersapp set otp = null, otptime = null  where email = '$user'";

                $conn->query($query33);

                $query333 = "INSERT INTO otp(id, username, userid, otp, otptime, login) VALUES (null, '$user', '0', '$otp', '$dt', 1);";
                $conn->query($query333);
                $_SESSION["user"] = $user;
                setcookie("user", $user, time() + (3600 * 24 * 365), '/');
                if ($token_found == 1 && $devicetoken != '') {
                    $query33pxy_device_token = "UPDATE usersapp set token='$devicetoken' where email='$usr';";
                    $conn->query($query33pxy_device_token);
                }

                ?>

                <script>
                    window.location.href = 'index.php?email=<?php echo $user; ?>&fullname=<?php echo $uuu[0]['profilename'];?>&photourl=<?php echo $uuu[0]['photourl'];?>&truelogin=1<?php echo $gps; ?>';
                </script>
                
                <?php

            } else if ($fixedpin == $otp) {
                $query33 = "UPDATE usersapp set otp = null, otptime = null  where email = '$user'";

                $conn->query($query33);
                ?>
                    <script>
                        window.location.href = 'index.php?email=<?php echo $user; ?>&truelogin=1<?php echo $gps; ?>';
                    </script><?php
            } else {
                echo "OPT Expired!";
                $pin_ok = 0;
            }
        } else {
            $pin_ok = 0;
            echo "Login credentials are invalid. Please try with right info.";
        }
    }
} else {
    $pin_ok = 0;
    echo "Login credentials are invalid. Please try with right info.";
}

echo '</div>';


if ($pin_ok == 0) {
    ?>

    <script>
        window.location.href = 'index.php';
    </script>
    <?php
}
?>