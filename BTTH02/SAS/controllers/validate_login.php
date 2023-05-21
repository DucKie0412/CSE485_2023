<?php
require_once '../../models/UserModel.php';

// Kiểm tra xem người dùng đã gửi yêu cầu đăng nhập chưa
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Gọi phương thức xác thực người dùng từ UserModel
    $userModel = new UserModel();
    $user = $userModel->authenticate($username, $password);
    
    // Kiểm tra kết quả xác thực và chuyển hướng tới trang tương ứng
    if ($user['role'] === 0) {
        header('Location: ../../views/admin/admin.php');
        exit;
    } elseif ($user['role'] === 1) {
        header('Location: ../../views/student/student.php');
        exit;
    } else {
        $error = 'Tên người dùng hoặc mật khẩu không chính xác';
    }
}

// Hiển thị giao diện đăng nhập
require_once '../../views/loginpage/loginPage.php';
?>
