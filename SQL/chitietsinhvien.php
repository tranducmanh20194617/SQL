<?php
  session_start();
$db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");
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
        header('Location: ../csdl/admin');
     }
if(isset($_GET['idsv'])){
        $id = $_GET['idsv'];
        // echo "$id";
    }

if(isset($_POST['thay_doi'])){
    $diem_capnhat = $_POST['diem'];
    $note_capnhat = $_POST['note'];
    $id_admin = $_SESSION['admin_id'];
    if(pg_query($db_connection, "SELECT cho_danh_gia($id_admin, $id, $diem_capnhat, '$note_capnhat')")){
        echo "<script>alert('thành công');</script>";
    }else{
        echo "<script>alert('có lỗi xảy ra');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>  Chi tiết sinh viên </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <!-- <link rel="stylesheet" href="1.css"> -->
  
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body style = "background:linear-gradient(135deg,#9b59b6, #71b7e6 ); color: black">
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
    <a class="active" href="admin/dashboard.php"><b>Home</b></a>
<a href="danhsachdangkylop.php">Danh sách đăng ký lớp</a>
<a href="index.php/insert_lopgiasu/savedata">Thêm lớp gia sư</a>
<a href="danhsachsinhvien.php">Quản lý sinh viên</a>
<a href="index.php/caclopgiasu">Quản lý danh sách lớp</a>
  <div class="float-xs-right" style="float: right;">
  <a href="?login=dangxuat">Đăng xuất</a>
   <b><u style="float: right;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;"> Xin chào:  <?php echo $_SESSION['dangnhap'] ?></u></b>
  </div>
</div>
  <div class="inra">
    <div class="container">
      <div class="jumbotron">
        <h1 class="text-xs-center" style="margin-top: 10px; margin-top: 2px"><i class=" text-xs-center fas fa-graduation-cap"></i> Chi tiết sinh viên </h1>
        <hr class="m-y-md">
</head>

<?php 
     $id = $_GET['idsv'];
     $result = pg_query($db_connection, "SELECT * FROM sinh_vien where id_tk = $id");
    $row_sinhvien = pg_fetch_object($result);
 ?>

<body>
  <div class="container rounded bg-white mt-5 mb-5" style="margin-top: 2px">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class=" mt-5" width="150px" src="<?php echo"$row_sinhvien->anh_the_sinh_vien"; ?>"><br>ảnh thẻ sinh viên</span><span> </span></div>

             <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class=" mt-5" width="150px" src="https://robohash.org/voluptatumetqui.png?size=50x50&set=set1"><br>ảnh căn cước</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3" >
                    <h4 class="text-right">Thông tin sinh viên ID <?php echo"$row_sinhvien->id_tk"; ?></h4>
                </div>
              
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels" style="margin-top: 6px">Tên tài khoản</label><input  type="tel" disabled class="form-control"  value="<?php echo"$row_sinhvien->ten_tk"; ?>"></div>
                  <div class="col-md-12"><label class="labels" style="margin-top: 6px">Email</label><input type="tel" disabled class="form-control"  value="<?php echo"$row_sinhvien->email"; ?>"></div>
                  <div class="col-md-12"><label class="labels" style="margin-top: 6px">Mật khẩu</label><input type="tel" disabled class="form-control"  value="<?php echo"$row_sinhvien->mat_khau"; ?>"></div>
                  <div class="col-md-12"><label class="labels" style="margin-top: 6px">Họ tên</label><input type="tel" disabled class="form-control"  value="<?php echo"$row_sinhvien->ho_ten"; ?>"></div>
                  <div class="col-md-12"><label class="labels" style="margin-top: 6px">Số điện thoại</label><input type="tel" disabled class="form-control"  value="<?php echo"$row_sinhvien->sdt"; ?>"></div>
                  <div class="col-md-12"><label class="labels" style="margin-top: 6px">Số CMND</label><input type="tel" disabled class="form-control"  value="<?php echo"$row_sinhvien->so_cmnd"; ?>"></div>
                  <div class="row mt-3">
                  <div class="col-md-6"><label class="labels" style="margin-top: 6px">Giới tính</label><input type="tel" disabled class="form-control"  value="<?php echo"$row_sinhvien->gioi_tinh"; ?>"></div>
                  <div class="col-md-6"><label class="labels" style="margin-top: 6px">Ngày sinh</label><input type="tel" disabled class="form-control"  value="<?php echo"$row_sinhvien->ngay_sinh"; ?>"></div>
                   </div>
                  <div class="col-md-12"><label class="labels" style="margin-top: 6px">Khóa trường</label><input type="tel" disabled class="form-control"  value="<?php echo"$row_sinhvien->khoa_truong"; ?>"></div>
                </div>
                <div class="mt-5 text-center"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
               <div class="d-flex justify-content-between align-items-center mb-3" >
                    <h4 class="text-right">Admin nhận xét</h4>
                </div>
                 <form  action='' class="dangnhap" method='POST'>

                    <div class="col-md-4" ><label style="margin-top: 6px" class="labels">Điểm đánh giá</label><input type="text" class="form-control" name="diem" value="<?php echo"$row_sinhvien->diem_danh_gia"; ?>" required></div>
                    <div class="col-md-12"><label style="margin-top: 6px"  class="labels">Nhắc nhở</label><input type="text" class="form-control"  name="note" value="<?php echo"$row_sinhvien->nhac_nho"; ?>" required></div>
                   
                    <div class="field" style="margin-top: 10px">
                      <input type="submit"  name ="thay_doi" value="cập nhật">
                    </div>
                   
                </form>
            </div>
        </div>


    </div>
</div>
</div>
</div>
</body>
</html>