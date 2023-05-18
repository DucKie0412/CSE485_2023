<!DOCTYPE html>
<html>
<head>
  <title>Trang chủ Điểm danh</title>
  <link rel="stylesheet" type="text/css" href="loginPage.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>

  <section>
    <h1>Đăng nhập để tiếp tục</h1>

  <?php if (isset($error)) { echo '<p>'.$error.'</p>'; } ?>
  <form method="POST" action="../../controllers/validate_login/validate_login.php">
    
    <label for="username">Tên đăng nhập:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Mật khẩu:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" name="login" value="Đăng nhập">
  </form>
  </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>