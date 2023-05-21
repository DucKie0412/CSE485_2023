<?php
include_once '../models/sql_connect.php';
class AttendaceController{
    public function doAttendance($id_Class,$id_Student,$status){
    if(isset($_POST["comat"]) && isset($_POST["muon"]) && isset($_POST["vangmat"])){
        $status = $_POST["comat"];
        $status = $_POST["muon"];
        $status = $_POST["vangmat"];
        $pdo = new Database();
        $conn = $pdo->getConnection();
        $attendace_Date = date('Y-m-d');
        $sql = ("INSERT INTO attendace ($attendace_Date,$id_Class,$id_Student,$status) VALUES (':attendace_Date,:id_Class,:id_Student,:status')");
        $stmt = $conn->prepare($sql);
        $stmt->execute([$attendace_Date,$id_Class,$id_Student,$status]);
    }
    }
}
?>