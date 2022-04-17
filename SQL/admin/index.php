<?php
	session_start();
 include('../db/connect.php'); 
?>
<?php
	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['dangnhap'])) {
		$taikhoan = $_POST['taikhoan'];
		$matkhau = ($_POST['matkhau']);
		if($taikhoan=='' || $matkhau ==''){
			echo '<p>Xin nhập đủ</p>';
		}else{
			$sql_select_admin = pg_query($con,"SELECT * FROM admin_tbl WHERE email='$taikhoan' AND mat_khau='$matkhau' LIMIT 1");
			$count = pg_num_rows($sql_select_admin);
			$row_dangnhap = pg_fetch_array($sql_select_admin);
			if($count>0){
				$_SESSION['dangnhap'] = $row_dangnhap['dinh_danh'];
				$_SESSION['admin_id'] = $row_dangnhap['id_tk'];
				header('Location: dashboard.php');
			}else{
		echo  '<script language="javascript">alert("Sai mật khẩu hoặc tên đăng nhập ")</script>';
				// header('Location: index.php');

	}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="stylemanh.css">
	
</head>
<body style= "background:linear-gradient(135deg,#9b59b6, #71b7e6 );">
    <div class="wrapper">
      <div class="title">Đăng nhập Admin</div>
      <form  action='' class="dangnhap" method='POST'>
        <div class="field">
          <input type="text" name="taikhoan" required>
          <label>Tài khoản</label>
        </div>
        <div class="field">
          <input type="password" name = "matkhau"required>
          <label>Mật khẩu</label>
        </div>
        
        <div class="field">
          <input type="submit"  name ="dangnhap"value="Login">
        </div>
      </form>
    </div>
</body>
</html>

   