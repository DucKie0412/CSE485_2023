<?php
use Controllers\StudentDAO; //gọi trong DAO
include_once '../Controllers/StudentDAO.php';
include_once '../Models/Student.php';
// $id = $_POST['id'];
// $studentDAO = new StudentDAO();
// $studentList = $studentDAO->getById($id);


$studentDAO = new StudentDAO();

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['age'])) {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $age = $_POST['age'];
    
    try {
        $studentDAO->update($id, array('name' => $name, 'age' => $age));
        echo "Cập nhật thông tin sinh viên thành công.";
    } catch (Exception $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
    }
} else {
    echo "Vui lòng nhập đầy đủ thông tin.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE-SV</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<body>
<div class="container">
        <h1>UPDATE STUDENTS</h1>
        <form action="Update-student.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input  type="text" id="name" class="form-control" name="name" required></div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" class="form-control" name="age" required></div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="number" id="grade" class="form-control" name="grade" required></div>
            
            <button type="submit" class="btn btn-success">UPDATE</button>
        </form>
</body>

</html>