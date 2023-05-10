
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan li sinh vien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


    <?php
    class Student
    {
        private $id;
        private $name;
        private $age;

        public function __construct(string $id, string $name, int $age)
        {
            $this->id = $id; // id la thuoc tinh tren private
            $this->name = $name;
            $this->age = $age;
        }

        public function get_ID(): string
        {
            return $this->id;
        }

        public function get_Name(): string
        {
            return $this->name;
        }
        public function get_Age(): int
        {
            return $this->age;
        }

        public function set_ID(string $id)
        {
            $this->id = $id;
        }

        public function set_Name(string $name)
        {
            $this->name = $name;
        }

        public function set_Age(int $age)
        {
            $this->age = $age;
        }
    }

    class StudentDAO
    {
        private static $students = array();

        public static function addStudent($student)
        {
            self::$students[] = $student;  //Phương thức self được sử dụng để thực hiện các tác vụ như truy cập
            //các thuộc tính và phương thức tĩnh của lớp mà không cần tạo đối tượng của lớp đó.
        }

        public static function getStudents()
        {
            return self::$students;
        }


    }


    ?>


   <!-- require_once 'Student.php';
    StudentDAO::addStudent(new Student('1a', 'nanh', 21));

  $students = StudentDAO::getStudents();

   foreach ($students as $student){
      echo $student->get_ID().' '.$student->get_Name().' '.$student->get_Age();


    } -->





</head>
<body>
    <div class="container" method = 'POST'>
    <h1>Danh sach sinh vien</h1>
    <table class = "table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>

<?php

// Mở file txt để đọc dữ liệu
$file = fopen("student.txt", "r");

// Đọc từng dòng dữ liệu và đưa vào bảng
while (!feof($file)) {
  $data = explode(",", fgets($file));
  echo "<tr>";
  echo "<td>" . $data[0] . "</td>";
  echo "<td>" . $data[1] . "</td>";
  echo "<td>" . $data[2] . "</td>";
  echo "<td>" . $data[3] . "</td>";
  echo "</tr>";
}

// Đóng file
fclose($file);


?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </tbody>
</table>

<button type="submit" id="insert">Them?</button>
<script>
    document.getElementById("insert").addEventListener("click", function(){
        window.location.href = "./CRUD_Form/formThem.php.php";
    });
</script>
</div>
</body>
</html>