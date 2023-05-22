<?php
include_once '../models/sql_connect.php';
class AttendaceController
{
    public function doAttendance($id_Course,$id_Class,$id_Student,$status)
    {
            $pdo = new Database();
            $conn = $pdo->getConnection();
            $attendance_Date = date('Y-m-d');
            // $sql = "INSERT INTO attendance (attendance_Date,id_Course,id_Class,id_Student,status) VALUES ($attendance_Date,:id_Course,:id_Class,:id_Student,:status)";
            // $stmt = $conn->prepare($sql);
            // $stmt->bindParam(":id_Course", $id_Course);
            // $stmt->bindParam(":id_Class", $id_Class);
            // $stmt->bindParam(":status", $status);
            // $stmt->bindParam(":id_Student", $id_Student);
            $sql="INSERT INTO attendance (attendance_Date,id_Course,id_Class,id_Student,status) VALUES (?,?,?,?,?)";
            $stmt=$conn->prepare($sql);

            $stmt->execute([$attendance_Date,$id_Course,$id_Class,$id_Student,$status]);
        
    }
}
?>
