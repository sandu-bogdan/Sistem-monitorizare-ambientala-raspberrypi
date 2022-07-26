<?php
require "includes/check-session.php";
include("includes/db.php");

$value = htmlspecialchars($_GET["value"]);
$type = htmlspecialchars($_GET["type"]);
$frequency = htmlspecialchars($_GET["frequency"]);
$date = htmlspecialchars($_GET["date"]);


function notificationData() {
    global $value;
    global $database;
    $ref = 'notification_data/'.$value;
    $data = $database->getReference($ref)->getValue();
    return json_encode($data);
}


function notificationReadAll(){
    global $database;
    $ref = "notification_data";
    $result = $database->getReference($ref)->orderByChild('view')->equalTo('0')->getValue();
    foreach($result as $row){
        $data[] = $row;
        $ref_id = 'notification_data/'.$row["id"].'/view';
        $pushData = $database->getReference($ref_id)->set('1');

    }
    header("Location:notification.php?status=success-read-all");
}


function notificationCount(){
    global $database;
    $ref = "notification_data";
    $result = $database->getReference($ref)->orderByChild('view')->equalTo('0')->getValue();
    return count($result);
}


function notification(){
    global $value;
    global $database;
    $ref = "notification_data/Temperature";

    if($value != "all"){
        #$result = $database->getReference($ref)->orderByChild('date')->limitToLast(10)->equalTo("2021-10-17")->getValue();
        $result = $database->getReference($ref)->orderByChild('time')->limitToLast($value)->getValue();
    }
    else 
        $result = $database->getReference($ref)->getValue();

    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }
        return json_encode($data);
    
}


function lastCheck(){
    global $value;
    global $database;
    $ref = "sensor/Temperature";
    $result = $database->getReference($ref)->orderByChild('date')->limitToLast(1)->getValue();
    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }
    $dataEncode = json_encode($data);
    $dataDecode = json_decode($dataEncode);
    return ' Data: ' . $dataDecode[0]->date . ' Ora: ' . $dataDecode[0]->time;
        
}


function location(){
    global $database;
    $ref = "configuration/location";
    $locationDb = $database->getReference($ref)->getValue();
    if (!$locationDb) {
        throw new Exception('Nu exista date');
    }
    return $locationDb;
}

function freqValue(){
    global $database;
    $ref = "configuration/freqValue";
    $result= $database->getReference($ref)->getValue();
    if (!$result) {
        throw new Exception('Nu exista date');
    }
    return $result;
}




function numberOfValueChart(){
    global $database;
    $ref = "configuration/numberOfValueChart";
    $result = $database->getReference($ref)->getValue();
    if (!$result) {
        throw new Exception('Nu exista date');
    }
    return $result;
}




function returnHistory($sensorType){
    global $value;
    global $database;
    $ref = "sensor/".$sensorType;
    if($value != "all"){
        $result = $database->getReference($ref)->orderByKey('time')->limitToLast($value)->getValue();
    }
    else 
        $result = $database->getReference($ref)->getValue();

    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }
        return json_encode($data);
}


function returnCustomDate($sensorType){
    global $value;
    global $database;
    global $date;
    global $sensorType;
    
    //get value of sensorType from database
    $result = $database->getReference('sensor/'.$sensorType)->orderByChild('date')->equalTo($date)->getValue();

    //compare function for sort
    function cmp($a, $b)
    {
        return strcmp($a["time"], $b["time"]);
    }

    //save result in data array
    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }
    usort($data, "cmp");
    if($value != "all") {
        $reverseData = [];
        $reverseData = array_reverse($data);
        $truncatedData = [];
        for($i = 0; $i < count($reverseData); $i++){
            $truncatedData[$i] = $reverseData[$i];
            if($i == $value)
            break;
        }
        return json_encode(array_reverse($truncatedData));
    } else {
        return json_encode($data);
    }
}


function returnCurrent($sensorType){
    global $database;
    switch($sensorType) {
        case "temp":
            $current = round($database->getReference($sensorType)->getValue(), 1);
            if (!$current)
                throw new Exception('Nu exista date');
            else
                return $current;
            break;
        case "hum":
            $current = round($database->getReference($sensorType)->getValue(), 1);
            if (!$current)
                throw new Exception('Nu exista date');
            else
                return $current;
            break;
        case "light":
            $current = $database->getReference($sensorType)->getValue();
            switch($current) {
                case '': 
                    throw new Exception('Nu exista date');
                case 0: return "Nedetectata";
                case 1: return "Detectata";
            }
            break;
        case "gas":
                $current = $database->getReference($sensorType)->getValue();
                switch($current) {
                    case '': 
                        throw new Exception('Nu exista date');
                    case 0: return "Nedetectat";
                    case 1: return "Detectat";
                }
                break;
            }
        }



//return current value for index page
if($type == "current-temp"){
    echo returnCurrent($sensorType="temp");
}

if($type == "current-hum"){
    echo returnCurrent($sensorType="hum");
}

if($type == "current-light"){
    echo returnCurrent($sensorType="light");
}

if($type == "current-gas"){
    echo returnCurrent($sensorType="gas");
}


// return environment variable
if($type == "last-check"){
    echo lastCheck();
}

if($type == "location"){
    echo location();
}

if($type == "freq-value"){
    echo freqValue();
}

if($type == "number-of-value-chart"){
    echo numberOfValueChart();
}


//return for notification services
if($type == "notification"){
    echo notification();
}

if($type == "notification-count"){
    echo notificationCount();
}

if($type == "notification-read-all"){
    echo notificationReadAll();
}

if($type == "notification-data"){
    echo notificationData();
}


//return history data for index chart
if ($type == "history-hum"){
    echo returnHistory($sensorType="Humidity");
}

if ($type == "history-light"){
    echo returnHistory($sensorType="Light");
}

if ($type == "history-gas"){
    echo returnHistory($sensorType="Gas");
}

if ($type == "history-temp"){
    echo returnHistory($sensorType="Temperature");
}



//return custom date for history page
if ($type == "custom-date-temp"){
    echo returnCustomDate($sensorType="Temperature");
}

if ($type == "custom-date-hum"){
    echo returnCustomDate($sensorType="Humidity");
}

if ($type == "custom-date-light"){
    echo returnCustomDate($sensorType="Light");
}

if ($type == "custom-date-gas"){
    echo returnCustomDate($sensorType="Gas");
}


?>


