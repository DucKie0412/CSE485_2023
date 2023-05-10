<?php
use Controllers\StudentDAO;
include_once '../Models/Student.php';
include_once '../Controllers/StudentDAO.php';

$studentDAO = new StudentDAO();

if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['grade'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    
    try {
        $studentDAO->create(array('name' => $name, 'age' => $age, 'grade'=> $grade));
        echo "Sinh viên đã được thêm thành công.";
    } catch (Exception $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
    }
} else {
    echo "Vui lòng nhập đầy đủ thông tin.";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Thêm sinh viên</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>ADD STUDENT</h2>
		<form method="post" action="create-student.php">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" placeholder="Nhập tên" name="name">
			</div>
			<div class="form-group">
				<label for="age">Age:</label>
				<input type="number" class="form-control" id="age" placeholder="Nhập tuổi" name="age">
			</div>
            <div class="form-group">
				<label for="grade">Grade:</label>
				<input type="number" class="form-control" id="grade" placeholder="Nhập lớp" name="grade">
			</div>
			<button type="submit" class="btn btn-default">ADD</button>
		</form>
	</div>
</body>
</html>
