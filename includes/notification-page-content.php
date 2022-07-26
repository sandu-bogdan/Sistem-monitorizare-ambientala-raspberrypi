<?php
$notificationId = htmlspecialchars($_GET["notification-id"]);
$ref = 'notification_data/'.$notificationId;
$data = array();
$data = $database->getReference($ref)->getValue();
$timedate = $data['timedate'];
$temp = $data['temp'];
$view = $data['view'];

$sensorType = $data['type'];

if($sensorType == "T"){
    $icon = '<i class="fas fa-temperature-high fa"></i>';
    $textSensorType = 'Temperatura inregistrata';
    $value = round($data['temp'],2).'C&#176 ';
    $difference = 'Diferenta de '.($data['temp'] - round($data['prag'],2)).'&#176 fata de pragul setat';
    $cardTitle = 'A fost inregistrata o depasire a pragului de temperatura!';
    $prag = 'Pragul de temperatura pentru aceasta notificare este setat la '.$data['prag'].'&#176';
}


if($sensorType == "H"){
    $icon = '<i class="fas fa-circle fa"></i>';
    $textSensorType = 'Umiditate inregistrata';
    $value = round($data['hum'],2).'% ';
    $difference = 'Diferenta de '.($data['hum'] - round($data['prag'],2)).'% fata de pragul setat';
    $cardTitle = 'A fost inregistrata o depasire a pragului de umiditate!';
    $prag = 'Pragul de umiditate pentru aceasta notificare este setat la '.$data['prag'].'%';
}


if($sensorType == "L"){
    $icon = '<i class="fas fa-lightbulb fa"></i>';
    if($data['light'] == 1){
        $textSensorType = 'Lumina detectata';
        $cardTitle = 'A fost detectata lumina!';
    }
    else{
        $textSensorType = 'Lumina nedetectata';
        $cardTitle = 'Nu a fost detectata lumina!';
    }

}

if($sensorType == "G"){
    $icon = '<i class="fas fa-burn fa"></i>';
    if($data['light'] == 1){
        $textSensorType = 'Gaz detectat';
        $cardTitle = 'Au fost detectate gaze!';
    }
    else{
        $textSensorType = 'Gaze nedetectate';
        $cardTitle = 'Nu a fost detectate gaze!';
    }

}



if($view == '0')
    $iconView = 'nu a fost marcata ca vizualizata <i class="fa fa-eye" aria-hidden="true"></i>';
else
    $iconView = 'a fost marcata ca vizualizata <font color="black"><i class="fa fa-eye" aria-hidden="true"></font></i>';
?>