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
    'image' => '',
    'data1' => '',
    'data2' => '',
    'data3' => '',
);

$token = 'dZBoSACOTt-D8Q0sg9QiIT:APA91bGbstCz-SvInpXyG4LbL6DQ9oOudmpsQIhNytONGdcl_Soc3xRzucGJhQw5qSkumkHlfw7lcL6ieC6dRmcP7p3vvIrfO_6ezVGr-4qP36aLgFA9SnY';
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