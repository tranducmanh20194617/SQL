<?php
//Khai báo sử dụng session
session_start();
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['dangnhap']))
{
//Kết nối tới database
$db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");

//Lấy dữ liệu nhập vào
	$username = addslashes($_POST['username']);
	$password = addslashes($_POST['password']);

//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
	if (!$username || !$password) {
		echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
		exit;
	}

	$query = "SELECT * FROM sinh_vien WHERE email ='$username' ";

	$result = pg_query($db_connection, $query) ;

	if (pg_num_rows($result) == 0)
	{
		echo "sai tên đăng nhập hoặc mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";

// Dừng chương trình
		die ();
	}

	else {
		$row = pg_fetch_object($result)  ;
		if ($password != "$row->mat_khau" ) {
			echo "<div class=\"signup-link\"><b style = \"color: red\">Mật khẩu không đúng ! <a href='javascript: history.go(-1)'>Trở lại</a></b></div>";
		}

		else{
			$id = "$row->id_tk";
			$_SESSION['dangnhap'] = $row->ten_tk;
				$_SESSION['id_sv'] = $row->id_tk;
				$_SESSION['danh_gia'] = $row->diem_danh_gia;

				// header('Location: dashboard.php');
			header("location:webchinh.php");
		}
	}  
//Lấy mật khẩu trong database ra

	die();
	$connect->close();
}
?>