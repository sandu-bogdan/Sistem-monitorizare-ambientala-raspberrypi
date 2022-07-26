<?php
require "includes/check-session.php";
include("includes/db.php");


$id = htmlspecialchars($_GET["id"]);

if($id != NULL){ 
    $ref = 'notification_data/'.$id.'/view';
    $pushData = $database->getReference($ref)->set('1');
    header("Location:notification.php?status=success");

}



if(isset($_POST['push'])){

    if($_POST['numberOfValueChart'] >= 10 && $_POST['numberOfValueChart'] <= 1000){
        $numberOfValueChart = $_POST['numberOfValueChart'];
    }
    else
    $numberOfValueChart = '10';
    
    if($_POST['freqValue'] >= 10 && $_POST['freqValue'] <= 300){
        $freqValue = $_POST['freqValue'];
    }
    else
    $freqValue = '10';

    $location = htmlspecialchars($_POST['location']);
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $data = [
        'numberOfValueChart' => $numberOfValueChart,
        'freqValue' => $freqValue,
        'location' => $location,
        'email' => $email,
        'message' => $message
    ];
    $ref = "configuration/";
    $pushData = $database->getReference($ref)->set($data);
    header("Location:configuration.php?status=success");
    die();
}
else if(isset($_POST['push-notification'])){

    //post verification temp value notification
    if(htmlspecialchars($_POST['tempStatusNoti'])=="on" || htmlspecialchars($_POST['tempStatusNoti'])=="off")
        $tempStatusNoti = htmlspecialchars($_POST['tempStatusNoti']);
    else
        $tempStatusNoti="off";

    if(htmlspecialchars($_POST['tempPragNoti']) >= -100 && htmlspecialchars($_POST['tempPragNoti']) <=100)
        $tempPragNoti = htmlspecialchars($_POST['tempPragNoti']);
    else
        $tempPragNoti="0";

    if(htmlspecialchars($_POST['tempIntvNoti'])>=1 && htmlspecialchars($_POST['tempIntvNoti'])<=9999)
        $tempIntvNoti = htmlspecialchars($_POST['tempIntvNoti']);
    else
        $tempIntvNoti = "1";

    //post verification humidity value notification
    if(htmlspecialchars($_POST['humStatusNoti']) =="on" || htmlspecialchars($_POST['humStatusNoti'])=="off")
        $humStatusNoti = htmlspecialchars($_POST['humStatusNoti']);
    else
        $humStatusNoti = "off";

    if(htmlspecialchars($_POST['humPragNoti']) >=0 && htmlspecialchars($_POST['humPragNoti']) <=100)
        $humPragNoti = htmlspecialchars($_POST['humPragNoti']);
    else
        $humPragNoti = "0";
    
    if(htmlspecialchars($_POST['humIntvNoti']) >=1 && htmlspecialchars($_POST['humIntvNoti'])<=9999)
        $humIntvNoti = htmlspecialchars($_POST['humIntvNoti']);
    else
        $humIntvNoti="1";
        
    //post verification light value notification
    if(htmlspecialchars($_POST['lightStatusNoti']) =="on" || htmlspecialchars($_POST['lightStatusNoti']) == "off")
        $lightStatusNoti = htmlspecialchars($_POST['lightStatusNoti']);
    else
        $lightStatusNoti = "off";

    if(htmlspecialchars($_POST['lightPragNoti']) == "1" || htmlspecialchars($_POST['lightPragNoti']) == "0")
        $lightPragNoti = htmlspecialchars($_POST['lightPragNoti']);
    else
        $lightPragNoti = "0";

    if(htmlspecialchars($_POST['lightIntvNoti'])>=1 && htmlspecialchars($_POST['lightIntvNoti'])<=9999)
        $lightIntvNoti = htmlspecialchars($_POST['lightIntvNoti']);
    else
        $lightIntvNoti = "1";

    //post verification gas value notification
    if(htmlspecialchars($_POST['gasStatusNoti']) == "on" || htmlspecialchars($_POST['gasStatusNoti']) == "off")
        $gasStatusNoti = htmlspecialchars($_POST['gasStatusNoti']);
    else
        $gasStatusNoti = "off";
    
    if(htmlspecialchars($_POST['gasPragNoti']) == "1" || htmlspecialchars($_POST['gasPragNoti']) == "0")
        $gasPragNoti = htmlspecialchars($_POST['gasPragNoti']);
    else
        $gasPragNoti = "0";
    
    if(htmlspecialchars($_POST['gasIntvNoti']) >=1 && htmlspecialchars($_POST['gasIntvNoti'])<=9999)
        $gasIntvNoti = htmlspecialchars($_POST['gasIntvNoti']);
    else
        $gasIntvNoti = "1";


    $data = [
        'tempStatusNoti' => $tempStatusNoti,
        'tempPragNoti' => $tempPragNoti,
        'tempIntvNoti' => $tempIntvNoti,
        'humStatusNoti' => $humStatusNoti,
        'humPragNoti' => $humPragNoti,
        'humIntvNoti' => $humIntvNoti,
        'lightStatusNoti' => $lightStatusNoti,
        'lightPragNoti' => $lightPragNoti,
        'lightIntvNoti' => $lightIntvNoti,
        'gasStatusNoti' => $gasStatusNoti,
        'gasPragNoti' => $gasPragNoti,
        'gasIntvNoti' => $gasIntvNoti,
    ];
    $ref = "notification/";
    $pushData = $database->getReference($ref)->set($data);
    header("Location:notification-add.php?status=success");
}



?>