<?php
require('inc.php');
require('firebase/FcmApi.php');

$FcmApi = new \FcmApi(
    [
        'path' => 'firebase.json',
        'project_id' => 'eimbox-4c743'
    ]
);

$firebase_datam = array(
    'title' => 'Hello Sir',
    'body' => 'Your next class at Nine (Rajanigandha) on ICT after 10 minutes.',
    'image' => 'https://eimbox.com/logo/105673.png',
    'data1' => '',
    'data2' => '',
    'data3' => '',
);
// $token = 'c9HHrCdfT12-QfT8-BYG1m:APA91bF_SE4Pp1hHAE8Dztmb1kilTlvROvar55TeXzcJ_fUhBbaqk2Kglnur7AD4qTc-AAVtTOQwjnp0X7OYeoS-OJ4Hiplpy4rKxP9h3PAss6s_CVS_rds';
echo $token;

if (
    $result = $FcmApi->setMessage(
        [
            'title' => $firebase_datam['title'],
            'body' => $firebase_datam['body'],
            'image' => $firebase_datam['image'],
            'data1' => $firebase_datam['data1'], //-----------------------------on running
            'data2' => $firebase_datam['data2'],
            'data3' => $firebase_datam['data3'],
            'priority' => 'high',
            'content_available' => true
        ]
    )->send($token)
) {
    echo 'Message sent successfully. Message ID: ' . $result['name'];
} else {
    echo $FcmApi->getError();
}