<?php
//*****************************************************************
$sy = date('Y');
$td = date('Y-m-d');
$cur = date('Y-m-d H:i:s');

$usr = $pass = $token = $pth = '';
$sccode = $geolat = $geolon = 0;
$fullname = '';
$scname = '';
//********************************************************************

// echo $htp;
$sql0x = "SELECT * FROM browser where browsername='$htp' LIMIT 1";  //echo $sql0x;
$result0xrtyv = $conn->query($sql0x);
if ($result0xrtyv->num_rows > 0) {
    while ($row0x = $result0xrtyv->fetch_assoc()) {
        $css = $row0x["css"];
        $eiin = $row0x["eiin"];
        $dflt = 'Visitor';
    }
} else {
    $css = 'default';
    $eiin = 0;
    $dflt = 'Guest';
}

$sccode = $eiin;


//************************************************************************************************************************************************************



if (isset($_GET["email"])) {
    $usr = $_GET["email"];
    $_SESSION["user"] = $usr;
    setcookie("user", $usr, time() + (3600 * 24 * 365), "/");
    // echo 'Cookie SET / ' . $_COOKIE["user"];
    ;
}

$token_found = 0;
if (isset($_GET["token"])) {
    $devicetoken = $_GET["token"];
    $token_found = 1;
    $_SESSION["devicetoken"] = $devicetoken;
}

if (isset($_GET["photo"])) {
    $pth = $_GET["photo"];
}
// echo '~~~~~~~~~' . $usr . '**********';
if (isset($_SESSION["user"])) {
    $usr = $_SESSION["user"];
} else {
    $usr = '';
}
// echo '~~~~~~~~~' . $usr . '**********';
// if session expire

if ($usr == '') {
    //echo 'user session stopped / ' . $_COOKIE["user"];;
    if (isset($_COOKIE["user"])) {
        $usr = $_COOKIE["user"];
        $_SESSION["user"] = $usr;
        setcookie("user", $usr, time() + (3600 * 24 * 365));
    }
}
//---------------------------------------------------------------------------------
$userlevel = 'Guest';
$pxx = '';

if ($token_found == 1 && $devicetoken != '') {
    $query33pxy_device_token = "UPDATE usersapp set token='$devicetoken' where email='$usr';";
    $conn->query($query33pxy_device_token);
}


$sql0 = "SELECT * FROM usersapp where email='$usr' LIMIT 1";
//echo $sql0;
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
    while ($row0 = $result0->fetch_assoc()) {
        $token = $row0["token"];
        $sccode = $row0["sccode"];
        $fullname = $row0["profilename"];
        $usrmobile = $row0["mobile"];
        $userlevel = $row0["userlevel"];
        $userid = $row0["userid"];
        $pth = $row0["photourl"];
        $curexam = $row0["curexam"];
        // $sy = $row0["session"];
        $otp = $row0["otp"];
        $otptime = $row0["otptime"];
    }
} else {
    $query33p = "insert into usersapp (sccode, email, token, firstlogin, lastlogin, photourl, userlevel) values ('$eiin', '$usr', '$token', '$cur', '$cur', '$pth' , '$dflt')";
    //echo $query33p;
    $conn->query($query33p);
    $sccode = $eiin;
    $userlevel = $dflt;
    $userid = 0;
    $curexam = '';
}

$sql0x = "SELECT * FROM scinfo where sccode='$sccode' LIMIT 1";  //echo $sql0x;
$result0xrty = $conn->query($sql0x);
if ($result0xrty->num_rows > 0) {
    while ($row0x = $result0xrty->fetch_assoc()) {
        $latlat = $row0x["geolat"];
        $lonlon = $row0x["geolon"];

        $dista_differ = $row0x["dista_differ"];
        $time_differ = $row0x["time_differ"];

        $in_time = $row0x["intime"];
        $out_time = $row0x["outtime"];
    }
}
//echo $latlat . '/' . $lonlon;
$gps = 0;
if (isset($_GET["geolat"])) {
    $geolat = $_GET["geolat"];
    $geolon = $_GET["geolon"];


    if ($geolat != '' && $geolon != '') {
        $gps = 1;
        // echo $geolat . '///'. $geolon;
        $radius = 6378137;
        $lat1 = $latlat; //23.7273973;
        $lon1 = $lonlon; //90.8447721;
        $lat2 = $geolat;
        $lon2 = $geolon;
        $rad = M_PI / 180;
        $theta = $lon1 - $lon2;
        $dist = sin($lat1 * $rad) * sin($lat2 * $rad) + cos($lat1 * $rad) * cos($lat2 * $rad) * cos($theta * $rad);
        $dista = round(acos($dist) / $rad * 60 * 1853);
        $distance = $dista;
        $query33pxy = "insert into georecord (id, email, posx, posy, recordtime, distance) values (NULL, '$usr', '$geolat', '$geolon', '$cur', '$dista');";
        $conn->query($query33pxy);
    }



} else {
    $ttt = date('Y-m-d H:i:s', strtotime($cur) - $time_differ);

    $sql0 = "SELECT * FROM georecord where email='$usr' and recordtime>='$ttt' order by recordtime desc limit 1";
    //echo $sql0;
    $result0gh = $conn->query($sql0);
    if ($result0gh->num_rows > 0) {
        while ($row0 = $result0gh->fetch_assoc()) {
            $geolat = $row0["posx"];
            $geolon = $row0["posy"];
            $distance = $row0["distance"];
        }
    } else {
        $geolat = '';
        $geolon = '';
        $distance = 0;
    }
}
// echo $distance;

if (isset($_GET['fn'])) {
    if (strlen($fullname) < 1) {
        $gp = $_GET['fn'];
        $query33px = "update usersapp set profilename='$gp' where  email='$usr' LIMIT 1";
        $conn->query($query33px);
        $fullname = $gp;
    }
}


$sql0 = "SELECT * FROM teacher where tid='$userid' ";
$result0bb = $conn->query($sql0);
if ($result0bb->num_rows > 0) {
    while ($row0 = $result0bb->fetch_assoc()) {
        $rank = $row0["position"];
        $in_time_user = $row0["curin"];
        $out_time_user = $row0["curout"];
    }
}

$cteacher_data = [];
$sql0 = "SELECT areaname as cteachercls, subarea as cteachersec FROM areas where classteacher='$userid' and sessionyear='$sy' ";
$result0bbx = $conn->query($sql0);
if ($result0bbx->num_rows > 0) {
    while ($row0 = $result0bbx->fetch_assoc()) {
        $cteacher_data[] = $row0;
    }
}

// $sql0 = "SELECT * FROM areas where classteacher='$userid' and sessionyear='$sy' ";
// $result0bbx = $conn->query($sql0);
// if ($result0bbx->num_rows > 0) {
//     while ($row0 = $result0bbx->fetch_assoc()) {
//         $cteachercls = $row0["areaname"];
//         $cteachersec = $row0["subarea"];
//     }
// } else {
//     $cteachercls = '';
//     $cteachersec = '';
// }




if ($userlevel == 'Super Administrator' || $userlevel == 'Moderator') {
    $reallevel = $userlevel;
    $userlevel = 'Administrator';
} else {
    $reallevel = $userlevel;
}


$ins_all_settings = array();
$sql0x = "SELECT * FROM settings where sccode='$sccode'";  
echo $sql0x;
$result0xrtyv = $conn->query($sql0x);
if ($result0xrtyv->num_rows > 0) {
    while ($row0x = $result0xrtyv->fetch_assoc()) {
        $ins_all_settings = $row0x;
    }
}


if ($sccode > 100) {
    $sql0x = "SELECT * FROM scinfo where sccode='$sccode' LIMIT 1";
    $result0x = $conn->query($sql0x);
    if ($result0x->num_rows > 0) {
        while ($row0x = $result0x->fetch_assoc()) {
            $scname = $row0x["scname"];
            $scadd1 = $row0x["scadd1"];
            $scadd2 = $row0x["scadd2"];
            $ps = $row0x["ps"];
            $dist = $row0x["dist"];
            $logo = $row0x["logo"];
            $mobile = $row0x["mobile"];
            $rootuser = $row0x["rootuser"];
            $pack = $row0x["pack"];
            $expire = $row0x["expire"];
            $short = $row0x["short"];
            $servicefinance = $row0x["servicefinance"];
            $sctype = $row0x["sccategory"];

            $scaddress = $scadd1 . $scadd2 . $ps . $dist;
            $scaddress2 = $scadd1 . ', ' . $ps . ', ' . $dist . '.';
            $contact = $mobile;

            $sql0x = "SELECT * FROM globalsettings where sccode='$sccode' LIMIT 1";
            $result0xgl = $conn->query($sql0x);
            if ($result0xgl->num_rows > 0) {
                while ($row0x = $result0xgl->fetch_assoc()) {
                    $stattnd_sort = $row0x["stattnd_sort"];
                    $stattnd_multi = $row0x["stattnd_multi"];
                    $tattnd = $row0x["tattnd"];
                    $collectionby = $row0x["collection"];
                    $tattndradius = $row0x["tattndradius"];
                    $tattndout = $row0x["tattndout"];
                }
            }


        }
    }

    if ($userlevel == 'Administrator' || $userlevel == 'Head Teacher') {
        if ($scname == '' || $scadd1 == '' || $scadd2 = '' || $ps == '' || $dist == '' || $contact == '' || $logo == '') {
            header("Location: settingsinstituteinfo.php");
        } else if ($pack == 0) {
            header("Location: accountbuypack.php");
        }
    }

    if ($userlevel == 'Guest') {
        $pxx = "We noticed that,<br>You're in under review by you Head Teacher / any Administrator.<br> Contact with your authority. <br><br> <b>OR</b><br>You may change your EIIN information.";
    }
}

// $dista_differ = $tattndradius;

$l = strlen($pth);
if ($l < 5) {
    $pth = "https://eimbox.com/images/no-image.png?v=c";
}



$one = strtotime('2025-01-01');
$oneday = 3600 * 24;
for ($x = 0; $x < 365; $x++) {
    $tar = date('Y-m-d', $one + $oneday * $x);
    $bar = date('l', strtotime($tar));

    $query33pd = "insert into calendar (id, date, day, sccode, descrip, category, work, class ) values (NULL, '$tar' , '$bar', 0, NULL, NULL, 1, 1)";
    //echo $query33p;
    // $conn->query($query33pd);
}



//$query33pd ="insert into userlog (id, date, day, sccode, descrip, category, work, class ) values (NULL, '$tar' , '$bar', 0, NULL, NULL, 1, 1)";
//echo $query33p;
//   $conn->query($query33pd) ;



$exam = $curexam;//'Half Yearly';

$curfile = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
$curfile = basename($_SERVER["SCRIPT_FILENAME"]);

// echo $curfile;

include 'header.php';
?>
    <style>
  #mbox {
  background:red;
  position:absolute;
  top:25%;
  right:0px;
  bottom:25%;
  left:0px;
  z-index:1000;
}
    </style>
  

    <div id="mbox2"></div>
    
    
    <script>
            // $(document).ready(function () {
            //     if(document.readyState === 'ready' || document.readyState === 'complete'){
                    
            //     }
              
            // });
            
//             window.onload(function(){



// });
            
    //   document.getElementById("mbox").style.display = 'none';      
        </script>

        <?php
        include 'footer.php';