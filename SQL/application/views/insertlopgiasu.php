<!DOCTYPE html>
<?php session_start(); 
// session_start();
  if(!isset($_SESSION['dangnhap'])){
    header('Location: ../../admin/index.php');
  } 
  if(isset($_GET['login'])){
  $dangxuat = $_GET['login'];
   }else{
    $dangxuat = '';
   }
   if($dangxuat=='dangxuat'){
    session_destroy();
    header('Location: ../../admin/index.php');
   }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Mở thêm lớp gia sư </title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>style_molopgiasu.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   </head>
<body>
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
<div class="topnav" id="navbar" style="margin-top: 0px">
 <a class="active" href="../../admin/dashboard.php"><b>Home</b></a>
<a href="../../danhsachdangkylop.php">Danh sách đăng ký lớp</a>
<a href="../../index.php/insert_lopgiasu/savedata">Thêm lớp gia sư</a>
<a href="../../danhsachsinhvien.php">Quản lý sinh viên</a>
<a href="../../index.php/caclopgiasu">Quản lý danh sách lớp</a>
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
</body>
<body>
  <div style="margin: 0 auto;">
  <div class="container" style="width: 50%; margin: 0 auto;">
    <div style="text-align: center;">
      <a  class="logo"><i class="fas fa-graduation-cap"></i> MỞ THÊM LỚP GIA SƯ </a>
    </div>
   
       <br><br><br>

    <div class="content">
      <form method="post">
        <div class="user-details" style="margin-bottom: 0px">
          <div class="input-box">
            <span class="details">Bộ môn</span>
            <input type="text" placeholder="nhập bộ môn" name = "bo_mon" required>
          </div>
          <div class="input-box">
            <span class="details">Giới tính yêu cầu</span>
            <input type="text" placeholder="nhập giới tính yêu cầu" name ="gioi_tinh_yeu_cau"required>
          </div>
         
          <div class="input-box">
            <span class="details">Quận</span>
            <input type="text" placeholder="nhập quận"name ="quan_phuong" required>
          </div>
          <div class="input-box">
            <span class="details">Địa chỉ cụ thể</span>
            <input type="text" placeholder="nhập địa chỉ cụ thể "name ="dia_chi" required>
          </div>
          <div class="input-box">
            <span class="details">Lương</span>
            <input type="text" placeholder="nhập lương" name = "luong" required>
          </div>
          <div class="input-box">
            <span class="details">thời gian học</span>
            <input type="text" placeholder="nhập thời gian học" name = "thoi_gian_hoc" required>
          </div>
                    <div class="input-box">
            <span class="details">yêu cầu</span>
            <input type="text" placeholder="nhập yêu cầu" name ="yeu_cau" >
          </div>
                    <div class="input-box">
            <span class="details">trình độ</span>
            <input type="text" placeholder="nhập trình độ" name = "trinh_do" required>
          </div>
              <div class="input-box">
            <span class="details">id_admin</span>
            <input  value="<?php echo"$_SESSION[admin_id]"; ?>" name = "id_admin" readonly >
          </div>
        </div>

         <br><br><br><br>
        <div style="text-align: center; margin-top: 20px" class="button">
          <input type="submit" name ="dangky" value="Đăng Ký">
        </div>
      
      </form>
    </div>
  </div>
</div>
</body>
</html>
