<?php
require('inc.php');
require('firebase/FcmApi.php');


$FcmApi = new \FcmApi(
    [
        'path' => 'firebase.json',
        'project_id' => 'eimbox-4c743'
    ]
);



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