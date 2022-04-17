<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: index.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: index.php');
	 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome Sinh viên</title>
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
   <link rel="stylesheet" href="css/stylewebchinh.css">
  <link rel="stylesheet" href="vendor/bootstrap.css">
   
</head>
<body style = "background:linear-gradient(135deg,#9b59b6, #71b7e6 ); color: white">

<style type="text/css"> 
<!-- 
 /* Add a black background color to the top navigation */
.topnav {
position: sticky;
   top: 0;
   z-index: 100;
   /*background:linear-gradient(135deg, #71b7e6, #9b59b6);*/
  background-color: #71b7e6;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: white;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: white;
  color: #71b7e6;
  /*background:linear-gradient(135deg,#9b59b6, #71b7e6 )*/
}
--> 
</style> 
<div class="topnav" id="navbar">
  <a class="active" href="../dangnhap/webchinh.php"><b>Home</b></a>
<a href="../index.php/svxemcaclopgiasu">Danh sách lớp gia sư</a>
<a href="../thaydoithongtinsv.php">Cập nhật thông tin cá nhân</a>
<a href="../lopdadangky.php">Danh sách lớp đã đăng ký</a>
<a href="../thongtinadmin.php">Thông tin admin</a>
  <div class="float-xs-right">
  <a href="?login=dangxuat">Đăng xuất</a>
   <b><u style="float: right;
  color: <?php if($_SESSION['danh_gia']<=2){echo 'orange';}else{echo"white";} ?>;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  margin-right: 5px;
  font-size: 18px;">Xin chào: <?php echo $_SESSION['dangnhap'] ?></u></b>
  </div>
</div>
<div style="color: orange; text-align: center; font-size: 30px;"><?php if($_SESSION['danh_gia']<=2){echo 'Không thể nhận lớp nếu điểm đánh giá của bạn không đủ!!!';} ?></div>
<h1 class = "align" style = "margin-top: 20rem">
 <nav class="navigation navigation--inline">
    <ul>
      <li>
        <a  href="../index.php/svxemcaclopgiasu?id_tk=<?php echo $_SESSION['id_sv'] ?>" <?php if($_SESSION['danh_gia']<=2){echo 'style="pointer-events: none;cursor: default;background-color: gray;"';} ?>>
          <span style="font-size: 30px; color: black">Danh sách lớp gia sư</span>
        </a>
      </li>
     
      <li>
        <a href="../thaydoithongtinsv.php">
          <span  style="font-size: 30px; color: black">Cập nhật thông tin cá nhân</span>
        </a>
      </li>

      <li>
        <a href="../lopdadangky.php" >
          <span  style="font-size: 30px; color: black">Danh sách lớp đã đăng ký</span>
        </a>
      </li>
      <li>
        <a href="../thongtinadmin.php">
          <span  style="font-size: 30px; color: black">Thông tin admin</span>
        </a>
      </li>
    </ul>
  </nav>
</h1>

  

</body>
</html>