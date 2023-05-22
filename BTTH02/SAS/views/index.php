
<!DOCTYPE html>
<html>
<head>
  <title>Trang chủ Điểm danh</title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <h1>Hệ thống điểm danh cây nhà lá vườn</h1>
  <p>Chào mừng đến với trang điểm danh</p>
    <p>Vui lòng chọn khóa học để tiếp tục!!</p>

    <!-- <div class="card-group">
    <div class="card">
        <img class="card-img-top" src="https://www.gettyimages.in/gi-resources/images/Homepage/Hero/UK/CMS_Creative_164657191_Kingfisher.jpg" alt="">
        <div class="card-body">
            <h5 class="card-title">Môn 1</h5>
            <h6 class="card-subtitle mb-1 text-muted">Ví dụ mẫu sử dụng Card</h6>
            <p class="card-text">Nội dung văn bản trong <code>.card-body</code> này sử dụng <code>.card-text</code>.</p>
            <a href="#" class="btn btn-primary">Nút bấm</a>
        </div>
        <div class="card-footer text-muted">
            Footer của Card
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="https://www.gettyimages.in/gi-resources/images/Homepage/Hero/UK/CMS_Creative_164657191_Kingfisher.jpg" alt="">
        <div class="card-body">
            <h5 class="card-title">Môn 2</h5>
            <h6 class="card-subtitle mb-1 text-muted">Ví dụ mẫu sử dụng Card</h6>
            <p class="card-text">Nội dung văn bản trong <code>.card-body</code> này sử dụng <code>.card-text</code>.</p>
            <a href="#" class="btn btn-primary">Nút bấm</a>
        </div>
        <div class="card-footer text-muted">
            Footer của Card
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="https://www.gettyimages.in/gi-resources/images/Homepage/Hero/UK/CMS_Creative_164657191_Kingfisher.jpg" alt="">
        <div class="card-body">
            <h5 class="card-title">Môn 3</h5>
            <h6 class="card-subtitle mb-1 text-muted">Ví dụ mẫu sử dụng Card</h6>
            <p class="card-text">Nội dung văn bản trong <code>.card-body</code> này sử dụng <code>.card-text</code>.</p>
            <a href="#" class="btn btn-primary">Nút bấm</a>
        </div>
        <div class="card-footer text-muted">
            Footer của Card
        </div>
    </div>
</div> -->

<?php
require_once '/CSE485_2023/BTTH02/SAS/models/sql_connect.php';
class UserModel {
  public function authenticate($username, $password) {
      $db = Database::getInstance();
      $conn = $db->getConnection();
      
      // Truy vấn để kiểm tra thông tin đăng nhập
      $query = "SELECT * FROM user WHERE user_Name = :username AND password = :password";
      $stmt = $conn->prepare($query);
      // $stmt->bindParam(':username', $username);
      // $stmt->bindParam(':password', $password);
      $stmt->execute();
      
      // Trả về kết quả xác thực
      return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}

?>

</body>
</html>