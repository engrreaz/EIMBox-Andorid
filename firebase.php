<?php
include 'inc.php';
$title = 'Uppers - ' . date('l, F, d, Y H:i:s');
$body = 'Offline Background Message';
$icon = 'https://rose.xeneen.com/images/user/engrreaz.png';
$bt = "............................";





$device_token = $token;
$device_token = 'dyNNzaM0TpWsUtgK6j9MEH:APA91bEkjhXZ_iaUwJ0hdbrSFMcj1xF_cW0ZYB3ty8zajZ_gtUTNuIWaxM3lXwR1J2f-TD8uYmmoW7bdNuVgQVwPgbGNPbuKw4tISpxWaX5SAGeASXRjFcc';
// $apiKey = 'AAAAiSanis8:APA91bGHIRxAjn8YBaf562fukaYy9N9_8LiNIm5XcTZnHEPqIK7Nr38PQhMJrWTpt9g0VI6U9DMvRT58K-D8AwHwwBvG3YqK8hKbxTMNu9qjaAm6KGj09FGyYT3RVUwExfs4IWXSfucp'; 
$apiKey = 'AAAAiSanis8:APA91bGHIRxAjn8YBaf562fukaYy9N9_8LiNIm5XcTZnHEPqIK7Nr38PQhMJrWTpt9g0VI6U9DMvRT58K-D8AwHwwBvG3YqK8hKbxTMNu9qjaAm6KGj09FGyYT3RVUwExfs4IWXSfucp';
// $headers = array('Authorization: key=' . $apiKey, 'Content-Type: application/json');
$headers = array('Authorization: key=' . $apiKey, 'Content-Type: application/json');
$url = 'https://fcm.googleapis.com/fcm/send';
$url = 'https://fcm.googleapis.com/v1/projects/xeneen-48f5d/messages:send';




//----------------------------------------------------------------------------------------------------------------------------------------------------------------


/*
  // FCM API Url
  

  // Put your Server Key here
  //$apiKey = "server-api-key";

  // Compile headers in one variable
  $headers = array (
    'Authorization:key=' . $apiKey,
    'Content-Type:application/json'
  );
*/
// Add notification background
$notifData = [
  'title' => $title . '/2',
  'body' => $body,
  'image' => $icon,
];

$dataPayload = [
  'data1' => 'Sagor Kolas', //-----------------------------on running
  'data2' => 80,
  'data3' => 'This is extra payload',
  'priority' => 'high',
  'content_available' => true
];

// Create the api body
$apiBody = [
  'notification' => $notifData,
  'data' => $dataPayload,
  'time_to_live' => 600,
  'click_action' => 'PendingActivity',
  'to' => $device_token
];


// Initialize curl with the prepared headers and body
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));

// Execute call and save result
$result = curl_exec($ch);
print ($result);
// Close curl after call
curl_close($ch);

echo '<pre>';
print_r($result);
echo '</pre>';


$jd = json_decode($result, true);

echo '<br><br>';
echo $jd['multicast_id'] . '<br>';
echo $jd['success'] . '<br>';
echo $jd['failure'] . '<br>';
echo $jd['canonical_ids'] . '<br>';
echo $jd['results'][0]['message_id'] . '<br>';
/* */