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
        <h1>Thêm sinh viên</h1>
        <form action="Update.php" method="post">
            <div class="form-group">
                <label for="id">Name:</label>
                <input type="text" id="id" class="form-control" name="id"></div>
            <div class="form-group">
                <label for="hoten">Age:</label>
                <input type="text" id="hoten" class="form-control" name="hoten"></div>
            <div class="form-group">
                <label for="age">Grade:</label>
                <input type="text" id="age" class="form-control" name="age"></div>
            
            <button class="btn btn-success">Change</button>
        </form>
    </div>
</body>
</html>