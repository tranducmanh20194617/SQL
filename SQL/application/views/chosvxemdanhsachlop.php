<?php 
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: ../dangnhap/index.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: ../dangnhap/index.php');
	 }
 ?>

<!DOCTYPE html>
<html lang="en"  >
<head>
	<title class=" text-xs-center fas fa-graduation-cap"> Danh sách lớp gia sư  </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 	
	<link rel="stylesheet" href="<?php echo base_url(); ?>/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/vendor/angular-material.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/vendor/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/1.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body ng-app="myApp" ng-controller="MyController">
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
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;"> Xin chào: <?php echo $_SESSION['dangnhap'] ?></u></b>
  </div>
</div>

	<div class="inra">
		<div class="container">
			<div class="jumbotron">
				<h1 class="text-xs-center"><i class=" text-xs-center fas fa-graduation-cap"></i> Danh sách lớp gia sư</h1>
				<hr class="m-y-md">

				<form  class="search-form text-xs-left mb-1">
				<b>Bộ môn: </b>
						<select  id="agileinfo-nav_search" name="agileinfo_search" class="border" required=""ng-model="monhoc"style="margin-right: 20px;">
						<option ng-repeat="motmon in nhieumon">{{motmon.bo_mon}}</option>
					</select>
					
					<b>Quận phường: </b>
					<select  id="agileinfo-nav_search" name="agileinfo_search" class="border" required=""ng-model="theophuong" style="margin-right: 20px;">
						<option ng-repeat=" nhieuquan in nhieuquanlopgiasu ">{{nhieuquan.quan_phuong}}</option>
					</select>

					<b>Giới tính </b>
					<select  id="agileinfo-nav_search" name="agileinfo_search" class="border" required=""ng-model="gioitinhcan"style="margin-right: 20px;">
						<option ng-repeat="mot in gioitinh ">{{mot}}</option>
					</select>

					<b>Trình độ: </b>
					<select  id="agileinfo-nav_search" name="agileinfo_search" class="border" required=""ng-model="theotrinhdo" style="margin-right: 20px;">
						<option ng-repeat="motlophoc in nhieulop ">{{motlophoc.trinh_do}}</option>
					</select>
					<a href="javascript:window.location.reload(true)"><b class="btn btn-outline-danger" style= "background:linear-gradient(135deg,#9b59b6, #71b7e6 ); ;color:white;" > Reset </b></a>
				</form>
				<div class="card-deck" style="margin-left: 4rem">
				<div  ng-repeat="motlop in nhieulopgiasu | filter:monhoc| filter:theophuong | filter: theotrinhdo|filter:gioitinhcan"  ng-init="motlop.hienra=false">
						<div class="card " style="width: 20rem;margin-bottom: 15px;"ng-show="!motlop.hienra">
						<div class="card-header" style="background: linear-gradient(135deg, #71b7e6, #9b59b6); color:white;">
							thông tin về lớp  {{motlop.class_id}}
						</div>
						<div class="card-block">
							<b> class_id  : </b><i>{{motlop.class_id}}</i><br>
							<b> bộ môn  : </b><i>{{motlop.bo_mon}}</i><br>
							<b> giới tính yêu cầu : </b><i>{{motlop.gioi_tinh_yeu_cau}}</i><br>
							<b> quận : </b><i>{{motlop.quan_phuong}}</i><br>
							<b> địa chỉ : </b><i>{{motlop.dia_chi}}</i><br>
							<b> lương : </b><i>{{motlop.luong}}</i><br>
							<b> thời gian học : </b><i>{{motlop.thoi_gian_hoc}}</i><br>
							<b> trình độ : </b><i>{{motlop.trinh_do}}</i><br>
							<b> trạng thái : </b><i>{{motlop.trang_thai}}</i><br>
							<b> yêu cầu : </b><i>{{motlop.yeu_cau}}</i><br>
							<div class="dk" style="margin-top: 10px">
							<a href="../dangnhap/classlophoc.php?class_id={{motlop.class_id}}"><b class="float-xs-right btn btn-outline-danger btn-block"> Nhận Lớp nhanh</b></a>
							</div>
						</div>
					</div>
					</div>
				</div>
				

			</div>
			
		</div>
	</div>


	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/bootstrap.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/angular-1.5.min.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/angular-animate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/angular-aria.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/angular-messages.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/angular-material.min.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>/bailam1.js"></script>
</body>
</html>