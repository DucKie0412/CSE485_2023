<?php

namespace Controllers; //gọi sudentDAO ra

use Exception;
use Models\Student;
use http\Env\Request;
// use Student;

// require "../model/Student.php";

class StudentDAO
{
   public function create(array $request)
   {
      $file_path = 'C:\xampp\htdocs\TH-WEB\CSE485_2023\BTTH01\QLSV\Datas\datasv.txt';

      if (!file_exists($file_path)) {
         throw new Exception("File does not exist");
      }

      $id = 1;
      $name = '';
      $age = '';
      $grade = '';

      if (isset($request['name'])) {
         $name = $request['name'];
      } else {
         throw new Exception("Name is required");
      }

      if (isset($request['age'])) {
         $age = $request['age'];
      } else {
         throw new Exception("Age is required");
      }

      if (isset($request['grade'])) {
         $grade = $request['grade'];
      } else {
         throw new Exception("Grade is required");
      }

      $lines = file($file_path);

      if (!empty($lines)) {
         $last_line = $lines[count($lines) - 1];
         $row = explode(",", $last_line);
         $id = intval($row[0]) + 1;
      }

      $data = "$id,$name,$age,$grade\n";
      file_put_contents($file_path, $data, FILE_APPEND);
   }

   public function read()
   {
      $file_path = 'C:\xampp\htdocs\TH-WEB\CSE485_2023\BTTH01\QLSV\Datas\datasv.txt';
      $file = fopen($file_path, 'r');
      if ($file) {
         while (($line = fgets($file)) != false) {
            echo $line . '<br/>';
         }
      }
      fclose($file);
   }

   public function getAll()
   {
      $file_path = 'C:\xampp\htdocs\TH-WEB\CSE485_2023\BTTH01\QLSV\Datas\datasv.txt';
      $file = fopen($file_path, 'r');
      $students = [];
      if ($file) {
         fgets($file);
         while (($line = fgets($file)) !== false) {
            $data = explode(',', $line);
            $id = $data[0];
            $name = $data[1];
            $age = $data[2];
            $grade = $data[3];
            $student = new Student();
            $student->setId($id);
            $student->setName($name);
            $student->setAge($age);
            $student->setGrade($grade);
            array_push($students, $student);
         }
         fclose($file); //đóng file sau khi đọc xong

      }
      return $students;
   }

   public function getById($id)
   {
      $file_path = '../Datas/datasv.txt';
      $file = fopen($file_path, 'r');
      if ($file) {
         fgets($file);
         while (($line = fgets($file)) !== false) {
            $data = explode('.', $line);
            if ($data[0] == $id) {
               $student = new Student();
               $student->setId($data[0]);
               $student->setName($data[1]);
               $student->setAge($data[2]);
               $student->setGrade($data[3]);
               fclose($file);
               return $student;
            }
         }
         fclose($file);
      }
      return null;
   }

   public function update($id, $data)
{
    $file_path = 'C:\xampp\htdocs\TH-WEB\CSE485_2023\BTTH01\QLSV\Datas\datasv.txt';

    if (!file_exists($file_path)) {
        throw new Exception("File does not exist");
    }

    $lines = file($file_path);

    $found = false;

    $new_lines = array_map(function ($line) use ($id, $data, &$found) {
        $row = explode(",", $line);
        if (intval($row[0]) == $id) {
            $found = true;
            $row[1] = $data['name'];
            $row[2] = $data['age'];
            $row[3] = $data['grade'];
        }
        return implode(",", $row);
    }, $lines);

    if (!$found) {
        throw new Exception("Student not found");
    }

    $new_data = implode("", $new_lines);

    file_put_contents($file_path, $new_data);

    return true;
}

public function delete($id)
{
    $file_path = 'C:\xampp\htdocs\TH-WEB\CSE485_2023\BTTH01\QLSV\Datas\datasv.txt';

    // Check if file exists
    if (!file_exists($file_path)) {
        throw new Exception("File does not exist");
    }

    // Read file and remove student with matching ID
    $lines = file($file_path);
    $updated_lines = array();
    foreach ($lines as $line) {
        $row = explode(",", $line);
        if ($row[0] != $id) {
            $updated_lines[] = $line;
        }
    }

    // Rewrite file with updated data
    file_put_contents($file_path, implode("", $updated_lines));

    return true;
}


}
