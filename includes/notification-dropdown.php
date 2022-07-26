<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


include("includes/db.php");

//Notification row
function notification_row(){
    global $value;
    global $database;
    $ref = "notification_data";
    $result = $database->getReference($ref)->orderByKey('id')->limitToLast(3)->getValue();
    $data = array();

    function lightStatusNotification($statusNotification){
        if($statusNotification == "1")
            return "A fost detectata";
        else
            return "Nu a fost detactata";
    }

    function gasStatusNotification($statusNotification){
        if($statusNotification == "1")
            return "Au fost detectate";
        else
            return "Nu au fost detactate";
    }

    $reverseResult = array_reverse($result);
    foreach($reverseResult as $row){
        $data[] = $row;
        if($row["type"] == "T")
            $type = '<i class="fas fa-temperature-high text-white"></i>';
        if($row["type"] == "H")
            $type = '<i class="fas fa-circle text-white"></i>';
        if($row["type"] == "L")
            $type = '<i class="fas fa-lightbulb text-white"></i>';
        if($row["type"] == "G")
            $type = '<i class="fas fa-burn text-white"></i>';
        if($row["view"] == '0')
            $iconView = '<font color="#4e73df"><i class="fa fa-eye" aria-hidden="true"></font></i>';
        else
            $iconView = '<font color="black"><i class="fa fa-eye" aria-hidden="true"></font></i>';
        if($row != 0) {
    ?>
    <a class="dropdown-item d-flex align-items-center" href="notification-page.php?notification-id=<?php echo $row["id"];?>">
    <div class="mr-3">
        <div class="icon-circle bg-primary">
            <?php echo $type; ?>
        </div>
    </div>
    <div>
        <div class="small text-gray-500">
            <?php echo $row["timedate"];?>
        </div>
        <?php 
        if($row["type"]=="T")
            echo '<span class="font-weight-bold"> A fost depasit pragul de '.round($row["prag"],2).'&#176;C, respectiv '.round($row["temp"],2).'&#176;C';
        if($row["type"]=="H")
            echo '<span class="font-weight-bold"> A fost depasit pragul de '.round($row["prag"],2).'% umiditate, respectiv '.round($row["hum"],2).'% umiditate';
        if($row["type"]=="L")
            echo '<span class="font-weight-bold">'.lightStatusNotification($statusNotification=$row["prag"]).' lumina.';
        if($row["type"]=="G")
            echo '<span class="font-weight-bold">'.gasStatusNotification($gasNotification=$row["prag"]).' gaze.';

        ?>
        </div>
        <?php echo $iconView; ?>
    </a>
    <?php
    }
}
}
?>