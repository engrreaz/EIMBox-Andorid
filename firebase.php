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
$token = 'cNKSR8i8QLacoJcB3szsEl:APA91bEfsujRG7BR0sO9nqiBymu5b9LR9W1pU8pIyOQWxqjAbGGWFCnVu6sCc7h-aVlc5N0RkvM7US4RlZzxj4z5FfdPRu4KI7GmsZsk6dXB4ye-dOATdSU';
echo $token . '<br><br>';

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