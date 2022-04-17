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
	<title>Welcome Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	 <link rel="stylesheet" href="style.css">
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
<a class="active" href="../admin/dashboard.php"><b>Home</b></a>
<a href="../danhsachdangkylop.php">Danh sách đăng ký lớp</a>
<a href="../index.php/insert_lopgiasu/savedata">Thêm lớp gia sư</a>
<a href="../danhsachsinhvien.php">Quản lý sinh viên</a>
<a href="../index.php/caclopgiasu">Quản lý danh sách lớp</a>
  <div style="float: right">
  <a href="?login=dangxuat">Đăng xuất</a>
   <b><u style="float: right;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;"> Xin chào: <?php echo $_SESSION['dangnhap'] ?></u></b>
  </div>
</div>

<h1 class = "align" style = "margin-top: 20rem">
 <nav class="navigation navigation--inline">
    <ul>
      <li>
        <a href="../danhsachdangkylop.php">
          <span style="font-size: 30px; color: black">Danh sách đăng ký lớp</span>
        </a>
      </li>
      <li>
        <a href="../index.php/insert_lopgiasu/savedata">
          <span  style="font-size: 30px; color: black">Thêm lớp gia sư</span>
        </a>
      </li>
     <!--  <li>
        <a href="#">
          <span  style="font-size: 30px; color: black">Cho đánh giá</span>
        </a>
      </li> -->
      <li>
        <a href="../danhsachsinhvien.php">
          <span  style="font-size: 30px; color: black">Quản lý sinh viên</span>
        </a>
      </li>
      <li>
        <a href="../index.php/caclopgiasu">
          <span  style="font-size: 30px; color: black">Quản lý danh sách lớp</span>
        </a>
      </li>
    </ul>
  </nav>
</h1>

  

</body>
</html>