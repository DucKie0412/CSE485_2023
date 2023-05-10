<?php

    class StudentDAO {
        private $filename;

        public function __construct($filename) {
            $this->filename = $filename;
        }

        public function readAll() {
            // Đọc toàn bộ dữ liệu từ file CSV
            $data = array_map('str_getcsv', file($this->filename));
            // Loại bỏ phần tử đầu tiên trong mảng (tên cột)
            array_shift($data);

            // Tạo danh sách sinh viên
            $students = array();
            foreach ($data as $row) {
                if ($row[0] !== null) {
                    $student = new Student($row[0], $row[1], $row[2], $row[3]);
                    array_push($students, $student);
                }
        }

        return $students;
    }
    public function add(Student $student) {
        $handle = fopen($this->filename, 'a');
        $row = array($student->get_ID(), $student->get_Name(), $student->get_Age(), $student->get_Grade());
        fputcsv($handle, $row);
        fclose($handle);
    }
}

// Add student form
echo '<form method="POST">';
echo '<label>ID:</label><input type="text" name="id">';
echo '<label>Name:</label><input type="text" name="name">';
echo '<label>Age:</label><input type="text" name="age">';
echo '<label>Grade:</label><input type="text" name="grade">';
echo '<input type="submit" name="add" value="Add">';
echo '</form>';

// Bind add button click event
if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];

    $student = new Student($id, $name, $age, $grade);
    $dao = new StudentDAO('../data/Student.csv');
    $dao->add($student);
    
    }

    

?>