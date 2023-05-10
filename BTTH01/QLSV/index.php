<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÍ SINH VIÊN</title>
<link rel="stylesheet" href="css/index.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>


<table class="table table-striped">
<h1>DANH SÁCH SINH VIÊN</h1>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Grade</th>
    </tr>
  </thead>

<?php

$filename = 'Student.csv';
if (($handle = fopen($filename, 'r')) !== false) {
    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        // Process each row of data here
    }

    fclose($handle);
} else {
    // Error handling if the file cannot be opened
    echo "Error";
}

  if (($handle = fopen($filename, 'r')) !== false) {
    while (($data = fgetcsv($handle, 1000, ',')) !== false) {

      echo '<tr>';
      echo '<td>' . $data[0] . '</td>';
      echo '<td>' . $data[1] . '</td>';
      echo '<td>' . $data[2] . '</td>';
      echo '<td>' . $data[3] . '</td>';
      echo '<td>' . '<a href="CRUD_Form/formSua.php"> <i class="fa-regular fa-pen-to-square"></i> </a>' .
                    '<i class="fa-sharp fa-solid fa-trash" id="icon_xoa"></i>'.
          '</td>';
      echo '</tr>';
  }

  fclose($handle);
} else {
  // Error handling if the file cannot be opened
}
  ?>

  <a href="./CRUD_Form/formThem.php"><input type="submit" value="Thêm sinh viên"></a>
</table>




<script src="https://kit.fontawesome.com/c320c16def.js" crossorigin="anonymous"></script>
</body>
</html>