<?php
require_once 'sql_connect.php';

class UserModel {
    public function authenticate($username, $password) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        
        // Truy vấn để kiểm tra thông tin đăng nhập
        $query = "SELECT * FROM user WHERE user_Name = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        // Trả về kết quả xác thực
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
