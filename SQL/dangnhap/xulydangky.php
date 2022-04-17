<?php
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");

// Dùng isset để kiểm tra Form
if(isset($_POST['dangky']))
{
	$usernamedk = trim($_POST['username']);
	$passwordk = trim($_POST['password']);
	$ten_tkdk = trim($_POST['ten_tk']);
	$sdtdk = trim($_POST['sdt']);



// Kiểm tra username hoặc ten_tk có bị trùng hay không
	$query = "SELECT * FROM tai_khoan WHERE ten_tk = '$usernamedk' OR ten_tk = '$ten_tkdk' ";

// Thực thi câu truy vấn
	$result = pg_query($db_connection, $query) ;

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc ten_tk đã tồn tại trong CSDL
	if (pg_num_rows($result) > 0)
	{
		echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';

// Dừng chương trình
		die ();
	}

	else {
		$sql = "INSERT INTO sinh_vien(email, mat_khau, ten_tk, sdt) VALUES ('$usernamedk', '$passwordk', '$ten_tkdk', '$sdtdk')";
		$resultdangky = pg_query($db_connection, $sql) ;
		// var_dump($sql);
		
		echo '<script language="javascript">alert("Đăng ký thành công!");</script>';
          echo ' <meta http-equiv="refresh" content="0;url=index.php">';

	}
}
?>