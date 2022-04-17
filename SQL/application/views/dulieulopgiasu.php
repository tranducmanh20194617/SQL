<?php session_start(); 
// session_start();
  if(!isset($_SESSION['dangnhap'])){
    header('Location: ../admin/index.php');
  } 
  if(isset($_GET['login'])){
  $dangxuat = $_GET['login'];
   }else{
    $dangxuat = '';
   }
   if($dangxuat=='dangxuat'){
    session_destroy();
    header('Location: ../admin/index.php');
   }

   if (isset($_REQUEST['ok']) && $_GET['search'] != NULL ) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = ($_GET['search']);
            if($search != NULL){
            $sql_tim_kiem = "SELECT *  FROM lop_gia_su WHERE class_id = $search";
            $result = pg_query($db_connection, $sql_tim_kiem);
            $page = 1;
            $current_page = 1;
            $row = pg_fetch_object($result);
         }
       }
       if(isset($_GET['id'])){
		$db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");
       	
       	       $id_xoa = $_GET['id'];
       	       $result = pg_query($db_connection, "DELETE  FROM lop_gia_su where class_id = $id_xoa ");
	if($result){
        echo "<script>alert('Xóa lớp thành công!');</script>";
	}else{
        echo "<script>alert('Xóa lớp không thành công!');</script>";

	}
       }

	
?>

<!DOCTYPE html>
<html lang="en"  >
<head>
	<title> Danh sách lớp gia sư </title>
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
</div>

	<div class="inra">
		<div class="container">
			<div class="jumbotron">
				<h1><i class="fas fa-graduation-cap"></i> Danh sách lớp gia sư</h1>
				<hr class="m-y-md">
				<!-- các nút -->

				<form action="" class="search-form text-xs-left " style="margin-bottom: -30px">
					<!-- 	<input type="search"  id= "search-box" placeholder="tìm kiếm..."ng-model="tukhoa"> -->
					
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
					<a href="caclopgiasu"><b class="btn btn-outline-danger" style= "background:linear-gradient(135deg,#9b59b6, #71b7e6 );  padding-top: 3px; padding-bottom: 3px ;color:white;" > Reset </b></a>
					
				</form>
					<br><br>
				<form action="../chitietlopgiasu.php" method="GET">
					<b>Tìm kiếm theo ID: </b><input type="text" name="search" />
					<input class="btn btn-outline-danger" style= "background:linear-gradient(135deg,#9b59b6, #71b7e6 ); padding-top: 3px; padding-bottom: 3px ;color:white; " type="submit" name="ok"  value="search" />

				</form>
			</div>
			<div class="mau" ng-repeat="motlop in nhieulopgiasu | filter:theophuong |filter:gioitinhcan| filter:monhoc|filter:theotrinhdo" ng-init="motlop.hienra=false">
				<div class="card sua " ng-show="motlop.hienra">
					<div class="card-header">
						<b>Class ID: </b> <input disabled type="text" class="form-control" ng-model="motlop.class_id">
					</div>
					<div class="card-block">
						<input type="hidden" class = "form-control" ng-model = "motlop.class_id">
						<b> bộ môn : </b><input type="text" class="form-control" ng-model="motlop.bo_mon"><br>
						<b> giới tính yêu cầu : </b><input type="text" class="form-control" ng-model="motlop.gioi_tinh_yeu_cau"><br>
						<b> quận : </b><input type="text" class="form-control" ng-model="motlop.quan_phuong"><br>
						<b> địa chỉ: </b><input type="text" class="form-control" ng-model="motlop.dia_chi"><br>
						<b> lương : </b><input type="text" class="form-control" ng-model="motlop.luong"><br>
						<b> thời gian học : </b><input type="text" class="form-control" ng-model="motlop.thoi_gian_hoc"><br>
						<b> trình độ : </b><input type="text" class="form-control" ng-model="motlop.trinh_do"><br>
						<b> trạng thái : </b><input disabled type="text" class="form-control" ng-model="motlop.trang_thai"><br>
						<b> yêu cầu : </b><input type="text" class="form-control" ng-model="motlop.yeu_cau"><br>
						<b class="float-xs-right btn btn-outline-danger btn-block"ng-click="luudulieu12(motlop)"> Lưu </b>
						<a href="?id={{motlop.class_id}}"><b style="margin-top: 5px;" class="float-xs-right btn btn-outline-danger btn-block"> Xóa dữ liệu </b></a>
					</div>
				</div>
				
				<div class="card"  ng-show="!motlop.hienra">
					<div class="card-header" style=" background: linear-gradient(135deg,#9b59b6, #71b7e6 );color: white">
						<b class="float-xs-right"> <i class="float-xs-right btn btn-outline-danger btn-block" ng-click="hienradi(motlop)">sửa</i> </b>
						Mã lớp số {{motlop.class_id}}
					</div>
					<div class="card-block">
						<b> bộ môn  : </b><i>{{motlop.bo_mon}}</i><br>
						<b> giới tính yêu cầu : </b><i>{{motlop.gioi_tinh_yeu_cau}}</i><br>
						<b> quận : </b><i>{{motlop.quan_phuong}}</i><br>
						<b> địa chỉ : </b><i>{{motlop.dia_chi}}</i><br>
						<b> lương : </b><i>{{motlop.luong}}</i><br>
						<b> thời gian học : </b><i>{{motlop.thoi_gian_hoc}}</i><br>
						<b> trình độ : </b><i>{{motlop.trinh_do}}</i><br>
						<b> trạng thái : </b><i>{{motlop.trang_thai}}</i><br>
						<b> yêu cầu : </b><i>{{motlop.yeu_cau}}</i><br>	
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
<script type="text/javascript" src="<?php echo base_url(); ?>/bailam2.js"></script>
</body>
</html>