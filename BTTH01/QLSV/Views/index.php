<?php

use Controllers\StudentDAO; //gọi trong DAO
include_once '../Controllers/StudentDAO.php';
include_once '../Models/Student.php';

$studentDAO = new StudentDAO();
$studentList = $studentDAO->getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QLSV</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
  <div class="container">
    <table class="table table-dark table-hover">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Grade</th>
          <th>change</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($studentList as $student) {
        ?>
          <tr>
            <td>
              <?php echo $student->getId() ?>
            </td>
            <td>
              <?php echo $student->getName() ?>
            </td>
            <td>
              <?php echo $student->getAge() ?>
            </td>
            <td>
              <?php echo $student->getGrade() ?>
            </td>

            <td>
              <form action="Update-student.php" method="POST" style="display: inline-block">
                <input type="hidden" name="id" value="<?php echo $student->getId() ?>">
                <input type="hidden" name="name" value="<?php echo $student->getName() ?>">
                <input type="hidden" name="age" value="<?php echo $student->getAge() ?>">
                <input type="hidden" name="grade" value="<?php echo $student->getGrade() ?>">
                <div><button type="submit" class="btn btn-success">Update</button></div>
              </form>
              
              <form action="delete-student.php" method="POST" style="display: inline-block">
              <input type="hidden" name="id" value="<?php echo $student->getId() ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">
                  Delete
                </button>
                </form>
              
            </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>


    <div><a href="create-student.php" type="submit" class="btn btn-warning">Add</a></div>

  </div>

</body>

</html>