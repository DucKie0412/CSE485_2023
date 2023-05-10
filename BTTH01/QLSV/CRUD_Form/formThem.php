<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSE485_2023/BTTH01/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <title>Form thêm</title>



    
</head>
<body>
    
        <div class="container">
        <form class="form-horizontal" method="post" action="formThem.php">

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // lay data tu form
          $id = $_POST['id'];
          $name = $_POST['name'];
          $age = $_POST['age'];
          $grade = $_POST['grade'];
      
          // mo file csv o che do append
          $file = fopen('../Student.csv', 'a');
      
          // them du lieu vao file csv
          fputcsv($file, [$id, $name, $age, $grade]);
      
          // dong file csv
          fclose($file);
      
          // chuyen huong ve trang chu
          header('Location: ../index.php');
          exit;
      }

?>
            <h1>Thêm sinh viên</h1>
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">ID:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id" name="id" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="age">Age:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="age" name="age" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="grade">Grade:</label>
              <div class="col-sm-10">
                <input type= "float" class="form-control" id="grade" name="grade" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button id= "submit_btn" type="submit" value="Submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


   

</body>
</html>


