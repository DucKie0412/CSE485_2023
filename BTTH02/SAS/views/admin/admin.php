<!DOCTYPE html>
<html>
<head>
  <title>Trang quản lí Điểm danh</title>
  <link rel="stylesheet" type="text/css" href="admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="admin.css">

</head>
<body>
  <h1>Hệ thống quản lí điểm danh cây nhà lá vườn</h1>
  <p>Chào mừng đến với trang quản lí điểm danh</p>
  <p>Vui lòng chọn khóa học để tiếp tục!!</p>

  <?php
    require_once '../../models/CourseModel.php';

    $courseModel = new CourseModel();

    // Lấy danh sách tất cả các khóa học
    $courses = $courseModel->getAllCourses();

    // Hiển thị tên khóa học
    foreach ($courses as $course) {
      $courseId = $course['id_Course'];
      $courseName = $course['name'];
  ?>
      <div class="course-card">
        <a href="attendance.php?course=<?php echo $courseId; ?>">
          <img src="./jpg/course.jpg" alt="Khóa học <?php echo $courseId; ?>" class="course-image">
          <h2 class="course-title"><?php echo $courseId; ?></h2>
          <p class="course-description"><?php echo $courseName; ?></p>
        </a>
      </div>
  <?php
    }
  ?>

</body>
</html>
