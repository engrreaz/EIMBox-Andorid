<?php
require('inc.php');
require('firebase/FcmApi.php');

$FcmApi = new \FcmApi(
    [
        'path' => 'firebase.json',
        'project_id' => 'eimbox-2ca37'
    ]
);


$firebase_datam = array(
    'title' => 'Hello Sir',
    'body' => 'Your next class at ' . $cur ,
    'image' => 'https://eimbox.com/students/1031872003.jpg',
    'data1' => 'First Line',
    'data2' => '2nd Line',
    'data3' => 'Third LINE',
);

$token = 'dBn2jB7SR9m0704sk0xdsD:APA91bHeSFi6PEkOhKbjNxMRC8gZ1UJxIbOeQPxJUDDk9b1dtwkTXEDUyFVBerAChZ0yIcRDWzE_paCj7s-53jPwrz_J-4DymJXo0KW0YTbZMEY1rPiIyTM';
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
            
            
            // "priority" => "high",
            // "time_to_live" => 86400,
            // "notification" => [
            //     "title" => "Hello Sir",
            //     "body"  => "Your next class at Nine (Bangla) on ICT after 10 minutes."
            // ],
            // "data" => [
            //     "data1" => "value1",
            //     "data2" => "value2"
            // ]
            
            
        ]
    )->send($token)
) {
    echo 'Message sent successfully. Message ID: ' . $result['name'];
} else {
    echo $FcmApi->getError();
}