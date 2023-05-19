<!DOCTYPE html>
<html>
<head>
  <title>Trang chủ Điểm danh</title>
  <link rel="stylesheet" type="text/css" href="homepage.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <h1>Hệ thống điểm danh cây nhà lá vườn</h1>
  <p>Chào mừng đến với trang điểm danh</p>
    <p>Vui lòng chọn khóa học để tiếp tục!!</p>
    <div class="grid-container">
      <a href="../loginpage/loginPage.php">
      <?php
        require_once '../../models/CourseModel.php';

        $courseModel = new CourseModel();

        // Lấy danh sách tất cả các khóa học
        $courses = $courseModel->getAllCourses();

        // Hiển thị tên khóa học
        foreach ($courses as $course) {
     
          $courseId = $course['id_Course'];
          $csd = $course['name'];

          echo '<h2>' . $courseId . '</h2>';
          echo '<p>' . $csd . '</p>';
        }
      ?>
    </a>
    </div>
    
    
  </div>
</body>
</html> 

