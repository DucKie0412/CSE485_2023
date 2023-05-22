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

      <?php
        require_once '../../models/CourseModel.php';

        $courseModel = new CourseModel();

        // Lấy danh sách tất cả các khóa học
        $courses = $courseModel->getAllCourses();

        // Hiển thị tên khóa học
        foreach ($courses as $course) {
          $csd = $course['name'];
        }
      ?>
  
  <div class="grid-container">
    <div class="course-card">
      <a href="../loginpage/loginPage.php">
        <img src="./jpg/course.jpg" alt="Khóa học 1" class="course-image">
        <h2 class="course-title"> <?php echo $csd; ?></h2>
      </a>
    </div>

    <div class="course-card">
      <a href="../loginpage/loginPage.php">
        <img src="./jpg/course.jpg" alt="Khóa học 2" class="course-image">
        <h2 class="course-title"> <?php echo $csd; ?></h2>
      </a>
    </div>

    <div class="course-card">
      <a href="../loginpage/loginPage.php">
        <img src="./jpg/course.jpg" alt="Khóa học 3" class="course-image">
        <h2 class="course-title"> <?php echo $csd; ?></h2>
      </a>
    </div>


    
    
  </div>
</body>
</html> 

