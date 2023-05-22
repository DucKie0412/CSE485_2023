<?php
include_once "../../controllers/attendanceController.php";

$attendanceController = new AttendaceController();

if(isset($_POST["comat"]) || isset($_POST["muon"]) || isset($_POST["vangmat"]) ){
    
    if(isset($_POST["comat"])){
        $status = $_POST["comat"];
    }
    else if(isset($_POST["muon"])){
        $status = $_POST["muon"];
    }
    else{
        $status = $_POST["vangmat"];
    }
    $attendanceController->doAttendance(2,3,2,$status);
    
}


?>