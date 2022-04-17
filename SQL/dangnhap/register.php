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
      <div class="title">Đăng ký</div>
      <form  action='' class="form" method='POST'>
        
         <div class="field">
          <input type="text" name = "ten_tk" required>
          <label>Tên tài khoản</label>
        </div><div class="field">
          <input type="email" name="username" required>
          <label>Email</label>
        </div>
        <div class="field">
          <input type="password" name = "password"required>
          <label>Password</label>
        </div>
         <div class="field">
          <input type="text" name = "sdt"required>
          <label>Số điện thoại</label>
        </div>
          <br><br>
        <div class="field">
          <input type="submit"  name ="dangky"value="Register">
        </div>
     <div class="signup-link"><a href="index.php">Quay lại trang đăng nhập</a></div>
        <?php require 'xulydangky.php';?> 
      </form>
    </div>
  </body>
</html>