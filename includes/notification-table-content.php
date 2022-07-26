<?php
function notificationTableContent(){
    global $value;
    global $database;
    $ref = "notification_data";
    $result = $database->getReference($ref)->orderByKey('id')->getValue();
    $data = array();
    function lightStatus($status){
        if($status == "1")
            return "A fost detectata";
        else
            return "Nu a fost detactata";
    }
    function gasStatus($status){
        if($status == "1")
            return "Au fost detectate";
        else
            return "Nu au fost detactate";
    }

    foreach($result as $row){
        $data[] = $row;
        if($row["type"] == "T")
        $type = 'Temperatura <i class="fas fa-temperature-high fa"></i>';
        if($row["type"] == "H")
        $type = 'Umiditate <i class="fas fa-circle fa"></i>';
        if($row["type"] == "L")
        $type = 'Detectie lumina <i class="fas fa-lightbulb fa"></i>';
        if($row["type"] == "G")
        $type = 'Detectie gaze <i class="fas fa-burn fa"></i>';
        if($row["view"] == '0')
        $iconView = '<i class="fa fa-eye" aria-hidden="true"></i>';
        else
        $iconView = '<font color="black"><i class="fa fa-eye" aria-hidden="true"></font></i>';
        if($row != 0 && $row["type"] == "T") 
        echo "<tr>"."<td>". $row["id"] .'<td> <a href="notification-page.php?notification-id='.$row["id"].'">A fost depasit pragul de <strong>'. $row["prag"] . "&#176;C,</strong> respectiv <strong>". round($row["temp"],2)."&#176;C </a></strong></td>"."<td>".$row["timedate"]."</td>"."<td>". $type."</td>"."<td>".'<a href="storing_data.php?id='.$row["id"].'">'.$iconView.'</a></td>'."</tr>";
        if($row != 0 && $row["type"] == "H") 
        echo "<tr>"."<td>". $row["id"] .'<td> <a href="notification-page.php?notification-id='.$row["id"].'">A fost depasit pragul de <strong>'. $row["prag"] . "% umiditate,</strong> respectiv <strong>". round($row["hum"],2)."% umiditate </a></strong></td>"."<td>".$row["timedate"]."</td>"."<td>". $type."</td>"."<td>".'<a href="storing_data.php?id='.$row["id"].'">'.$iconView.'</a></td>'."</tr>";
        if($row != 0 && $row["type"] == "L") 
        echo "<tr>"."<td>". $row["id"] .'<td> <a href="notification-page.php?notification-id='.$row["id"].'">'.lightStatus($status=$row["prag"])." lumina!</a></td>"."<td>".$row["timedate"]."</td>"."<td>". $type."</td>"."<td>".'<a href="storing_data.php?id='.$row["id"].'">'.$iconView.'</a></td>'."</tr>";
        if($row != 0 && $row["type"] == "G") 
        echo "<tr>"."<td>". $row["id"] .'<td> <a href="notification-page.php?notification-id='.$row["id"].'">'.gasStatus($status=$row["prag"])." gaze!</a></td>"."<td>".$row["timedate"]."</td>"."<td>". $type."</td>"."<td>".'<a href="storing_data.php?id='.$row["id"].'">'.$iconView.'</a></td>'."</tr>";

    }
}

?>