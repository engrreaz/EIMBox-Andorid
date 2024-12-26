<?php
include 'inc.php';
$title = 'Uppers - ' . date('l, F, d, Y H:i:s');
$body = 'Offline Background Message'; 
$icon = 'https://rose.xeneen.com/images/user/engrreaz.png';
$bt = "............................";




echo $usr;


$device_token = $token;
$device_token = 'drj6GzRaSISFqHbqXdCnc0:APA91bEFFVeDaH86Qikvso6eDkLhOB9XU2mfar9ACvUAOtyfvGJca5GmjKXeWRsFinEET18s99L63mgeBGaSYU4qRwEN6_ziVml2WB4CGA2-WM9tayycOg8';
// $apiKey = 'AAAAiSanis8:APA91bGHIRxAjn8YBaf562fukaYy9N9_8LiNIm5XcTZnHEPqIK7Nr38PQhMJrWTpt9g0VI6U9DMvRT58K-D8AwHwwBvG3YqK8hKbxTMNu9qjaAm6KGj09FGyYT3RVUwExfs4IWXSfucp'; 
$apiKey = 'AAAAiSanis8:APA91bGHIRxAjn8YBaf562fukaYy9N9_8LiNIm5XcTZnHEPqIK7Nr38PQhMJrWTpt9g0VI6U9DMvRT58K-D8AwHwwBvG3YqK8hKbxTMNu9qjaAm6KGj09FGyYT3RVUwExfs4IWXSfucp'; 
$headers = array('Authorization: key=' . $apiKey, 'Content-Type: application/json');
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
    'title' => $title.'/2',
    'body' => $body,
    'image' => $icon,
  ];

  $dataPayload = [
    'data1'=> 'Sagor Kolas', //-----------------------------on running
    'data2'=>80, 
    'data3' => 'This is extra payload',
    'priority' => 'high',
    'content_available' => true
  ];

  // Create the api body
  $apiBody = [
    'notification' => $notifData,
    'data' => $dataPayload, 
    'time_to_live' => 600, 
    'click_action' =>  'PendingActivity',
    'to' => $device_token
  ];


  // Initialize curl with the prepared headers and body
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_POST, true);
  curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); 
  curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));

  // Execute call and save result
  $result = curl_exec($ch);
  print($result);
  // Close curl after call
  curl_close($ch);
  
  $jd = json_decode($result, true);
  var_dump($jd);
  echo '<br><br>';
  echo $jd['multicast_id'].'<br>';
  echo $jd['success'].'<br>';
  echo $jd['failure'].'<br>';
  echo $jd['canonical_ids'].'<br>';
  echo $jd['results'][0]['message_id'].'<br>';
 /* */


