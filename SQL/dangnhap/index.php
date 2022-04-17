<?php  
  // session_start();
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <!----<title>Login Form Design | CodeLab</title>---->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body style= "background:linear-gradient(135deg,#9b59b6, #71b7e6 );">
    <div class="wrapper">
      <div class="title">Đăng nhập</div>
      <form  action='' class="dangnhap" method='POST'>
        <div class="field">
          <input type="email" name="username" required>
          <label>Tài khoản</label>
        </div>
        <div class="field">
          <input type="password" name = "password"required>
          <label>Mật khẩu</label>
        </div>
        
        <div class="field">
          <input type="submit"  name ="dangnhap"value="Login">
        </div>
        <div class="signup-link">Chưa có tài khoản? <a href="register.php">Đăng ký</a> ngay</div>
        <?php require 'xulydangnhap.php';?> 
      </form>
    </div>
  </body>
</html>