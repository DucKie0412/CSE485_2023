<?php
// Kiểm tra xác thực và vai trò của người dùng
session_start();

// Kiểm tra xác thực
if (!isset($_SESSION['username'])) {
    header("Location: loginPage.php");
    exit();
}

// Kiểm tra vai trò
if ($_SESSION['role'] != 'admin') {
    echo "Bạn không có quyền truy cập trang này.";
    exit();
}

// Kết nối CSDL
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

// Lấy danh sách sinh viên
function getStudents($conn)
{
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
    
    $students = array();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }
    
    return $students;
}

// Hiển thị danh sách sinh viên
$students = getStudents($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lí điểm danh</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Quản lí điểm danh</h1>
    
    <table>
        <tr>
            <th>ID Sinh viên</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Email</th>
            <th>Thông tin liên hệ</th>
            <th>Điểm danh</th>
        </tr>
        
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student['student_id']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['date_of_birth']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td><?php echo $student['contact_info']; ?></td>
            <td><a href="mark_attendance.php?student_id=<?php echo $student['student_id']; ?>">Điểm danh</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <br>
    <a href="logout.php">Đăng xuất</a>
</body>
</html>
