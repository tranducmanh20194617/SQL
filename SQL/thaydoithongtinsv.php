<?php 
session_start();
if(!isset($_SESSION['dangnhap'])){
        header('Location: ../web/admin');
    } 
    if(isset($_GET['login'])){
    $dangxuat = $_GET['login'];
     }else{
        $dangxuat = '';
     }
     if($dangxuat=='dangxuat'){
        session_destroy();
        header('Location: ../csdl/dangnhap');
     }
if(isset($_GET['id'])){
$idsv = $_GET['id'] ;
}
$db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");
if (isset($_POST['capnhap'])) {
	$ten_tk = $_POST['ten_tk'];
	$hovaten = $_POST['hovaten'];
	$sodienthoai = $_POST['sodienthoai'];
	$ngaysinh = $_POST['ngaysinh'];
	$socmnd = $_POST['socmnd'];
	$khoatruong = $_POST['khoatruong'];
	$anhcancuoc = $_POST['anhcancuoc'];
	$anhthesinhvien = $_POST['anhthesinhvien'];
	$gioitinh = $_POST['gioitinh'];

	$query ="UPDATE sinh_vien SET ten_tk='$ten_tk', sdt='$sodienthoai', ho_ten='$hovaten', gioi_tinh='$gioitinh', ngay_sinh='$ngaysinh', so_cmnd='$socmnd', khoa_truong='$khoatruong', anh_can_cuoc='$anhcancuoc', anh_the_sinh_vien = '$anhthesinhvien' WHERE id_tk = $_SESSION[id_sv]";
    $result1 = pg_query($db_connection, $query);
    $row1 = pg_fetch_object($result1);
	
	header("thaydoithongtinsv.php");
}

$sql = " SELECT * FROM sinh_vien WHERE id_tk = $_SESSION[id_sv]";
$result = pg_query($db_connection, $sql) ;
$row = pg_fetch_object($result);
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Cập nhật thông tin sinh viên</title>
    <link rel="stylesheet" href="stylethongtinsv.css">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   </head>
<body >
   
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

  <div style="float: right;">
  <a href="?login=dangxuat">Đăng xuất</a>
   <b><u style="float: right;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;"> Xin chào: <?php echo $_SESSION['dangnhap'] ?></u></b>
  </div>
</div>
  
  <div style=" background: linear-gradient(135deg, #71b7e6, #9b59b6); height: 120%">
  <div style=" display: grid;
  justify-content: center;
  height: 120%;
  width: 70%;
  align-items: center;
  padding: 40px;
  margin: auto;">


  <div class="container" style=" display: grid;">
   <div style="text-align: center"><a  class="logo"> Cập nhập thông tin sinh viên </a></div>
    <div class="content">
      <form method="post" class="float-xs-center">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Tên tài khoản</span>
            <input type="text" placeholder="nhập tên tài khoản" name = "ten_tk" value="<?php  echo"$row->ten_tk"; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Họ và tên </span>
            <input type="text" placeholder="nhập họ và tên " name ="hovaten" value="<?php  echo"$row->ho_ten"; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Số điện thoại</span>
            <input type="text" placeholder="nhập số điện thoại"name ="sodienthoai" value="<?php  echo"$row->sdt"; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Ngày sinh</span>
            <input type="date" placeholder="nhập địa chỉ cụ thể "name ="ngaysinh" value="<?php  echo"$row->ngay_sinh"; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Số chứng minh nhân dân</span>
            <input type="text" placeholder="nhập số CMND" name = "socmnd" value="<?php  echo"$row->so_cmnd"; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">giới tính</span>
            <input type="text" placeholder="nhập giới tính" name = "gioitinh" value="<?php  echo"$row->gioi_tinh"; ?>" required>
          </div>
                    <div class="input-box">
            <span class="details">Khoa trường</span>
            <input type="text" placeholder="nhập yêu cầu" name ="khoatruong" value="<?php  echo"$row->khoa_truong"; ?>" required>
          </div>
                    <div class="input-box">
            <span class="details">Ảnh căn cước</span>
            <input type="text" placeholder="nhập link ảnh" name = "anhcancuoc"  value="<?php  echo"$row->anh_can_cuoc"; ?>" value="<?php  echo"$row->anh_can_cuoc"; ?>" required>
          </div>
             
                    <div class="input-box">
            <span class="details">Ảnh thẻ sinh viên </span>
            <input type="text" placeholder="nhập link ảnh"  value="<?php  echo"$row->anh_can_cuoc"; ?>" name = "anhthesinhvien" required>
          </div>
             
        </div>
       <div >
        <div  style ="text-align:center"class="button"  >
          <input type="submit" name ="capnhap" value="Cập nhập">
        </div>
        </div>
      </form>
    </div>
  </div></div>  </div>
  <script type="text/javascript" src="123.js"></script>
</body>
</html>

<?php  ?>