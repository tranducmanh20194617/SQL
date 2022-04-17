<?php 
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: dangnhap/index.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: dangnhap/index.php');
	 }
 ?>

<!DOCTYPE html>
<html lang="en"  >
<head>
	<title class=" text-xs-center fas fa-graduation-cap"> Danh sách lớp đã đăng ký  </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 	
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/angular-material.min.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="1.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body ng-app="myApp" ng-controller="MyController" style="background: linear-gradient(135deg, #71b7e6, #9b59b6)">
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
  <a class="active" href="dangnhap/webchinh.php"><b>Home</b></a>
<a href="index.php/svxemcaclopgiasu">Danh sách lớp gia sư</a>
<a href="thaydoithongtinsv.php">Cập nhật thông tin cá nhân</a>
<a href="lopdadangky.php">Danh sách lớp đã đăng ký</a>
<a href="thongtinadmin.php">Thông tin admin</a>

  <div class="float-xs-right">
  <a href="?login=dangxuat">Đăng xuất</a>
   <b><u style="float: right;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;"> Xin chào: <?php echo $_SESSION['dangnhap'] ?></u></b>
  </div>
</div>
<div class="inra">
		<div class="container">
			<div class="jumbotron" style="text-align: center;">
			<h1><i class="fas fa-graduation-cap"></i> Danh sách lớp gia sư</h1>
		</div>

<?php 
	$db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");
	$result_num = pg_query($db_connection, "SELECT count(class_id) as num FROM dang_ky_lop WHERE id_tk = $_SESSION[id_sv]");
	if(pg_fetch_object($result_num)->num == 0){
		echo ' <div style="color: orange; text-align: center; font-size: 30px; align: center; margin-top: 100px"><h1><b>Bạn chưa đăng ký lớp nào!</b></h1></div>';
	}
	else{
		$sql = "SELECT * FROM lop_gia_su AS lop, (SELECT class_id FROM dang_ky_lop WHERE id_tk = $_SESSION[id_sv]) AS cl WHERE lop.class_id IN (cl.class_id)";
	// echo "$sql";
	$result = pg_query($db_connection, $sql);
	// var_dump($result);
	while($row = pg_fetch_object($result)){
	
 ?>

	<div class="card"  ng-show="!motlop.hienra">
					<div class="card-header" style=" background: linear-gradient(135deg,#9b59b6, #71b7e6 );color: white">
						<b>Mã lớp số <?php echo "$row->class_id"; ?></b>
					</div>
					<div class="card-block">
						<b> bộ môn  : </b><i><?php echo "$row->bo_mon"; ?></i><br>
						<b> giới tính yêu cầu : </b><i><?php echo "$row->gioi_tinh_yeu_cau"; ?></i><br>
						<b> quận : </b><i><?php echo "$row->quan_phuong"; ?></i><br>
						<b> địa chỉ : </b><i><?php echo "$row->dia_chi"; ?></i><br>
						<b> lương : </b><i><?php echo "$row->luong"; ?></i><br>
						<b> thời gian học : </b><i><?php echo "$row->thoi_gian_hoc"; ?></i><br>
						<b> trình độ : </b><i><?php echo "$row->trinh_do"; ?></i><br>
						<b> yêu cầu : </b><i><?php echo "$row->yeu_cau"; ?></i><br>	
					<div><b style="color: orange "> trạng thái : <i><?php echo "$row->trang_thai"; ?></i></b><br></div>

					</div>
				</div>	
	<?php }} ?>
	</div>
				</div>	
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/bootstrap.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/angular-1.5.min.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/angular-animate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/angular-aria.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/angular-messages.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/angular-material.min.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>/bailam2.js"></script>
</body>
</html>