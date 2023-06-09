<?php
require_once 'Student.php';
require_once 'StudentDAO.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>


    <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Age</th>
                    <th scope="col" class="text-center">Grade</th>
                    <th scope="col" colspan="2" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $studentDAO = new StudentDAO('../data/Student.csv');
                $students = $studentDAO->readAll();
                foreach ($students as $student) { ?>
                    <tr>
                        <td class="text-center"><?php echo $student->get_ID(); ?></td>
                        <td class="text-center"><?php echo $student->get_Name(); ?></td>
                        <td class="text-center"><?php echo $student->get_Age(); ?></td>
                        <td class="text-center"><?php echo $student->get_Grade(); ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-link"><i class="bi bi-trash3"></i></button>
                            <button type="button" class="btn btn-link"><i class="bi bi-wrench"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
      </table>
      <button type="button" class="btn btn-primary">Thêm</button>
</body>
</html>