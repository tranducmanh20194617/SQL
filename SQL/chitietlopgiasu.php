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
if (isset($_GET['search'])) {
     $id = $_GET['search'];
}

if(isset($_POST['thay_doi'])){
    $bo_mon_capnhat = $_POST['bo_mon'];
    $quan_capnhat = $_POST['quan_phuong'];
    $dia_chi_capnhat = $_POST['dia_chi'];
    $luong_capnhat = $_POST['luong'];
    $thoi_gian_capnhat = $_POST['thoi_gian_hoc'];
    $yeu_cau_capnhat = $_POST['yeu_cau'];
    $admin_capnhat = $_POST['id_admin'];
    $gioi_tinh_capnhat = $_POST['gioi_tinh_yeu_cau'];
    $trinh_do_capnhat = $_POST['trinh_do'];
    
    if(pg_query($db_connection, "UPDATE lop_gia_su SET bo_mon='$bo_mon_capnhat', gioi_tinh_yeu_cau='$gioi_tinh_capnhat', quan_phuong='$quan_capnhat', dia_chi='$dia_chi_capnhat', luong='$luong_capnhat', thoi_gian_hoc='$thoi_gian_capnhat', yeu_cau='$yeu_cau_capnhat', trinh_do='$trinh_do_capnhat', id_admin='$admin_capnhat' WHERE class_id = $id")){
  echo "<script>alert('cập nhập thành công');</script>";

   }else{
  echo "<script>alert('có lỗi xảy ra');</script>";

   }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>  Chi tiết lớp gia sư </title>
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


<?php 

     $result = pg_query($db_connection, "SELECT * FROM lop_gia_su where class_id = $id");
     $row_lopgiasu = pg_fetch_object($result);
     if(!$row_lopgiasu ){
    header('Location: index.php/caclopgiasu');
     }
     else{
          
     $result_admin = pg_query($db_connection, "SELECT * FROM admin_tbl where id_tk = ($row_lopgiasu->id_admin)");
      $row_admin = pg_fetch_object($result_admin);
     }

 ?>

    <div class="container" style="width: 80%">
      <div class="jumbotron" style="text-align: center;">
        <h1 class="text-xs-center" style="margin-top: 20px; margin-bottom: 2px">Chi tiết lớp gia sư</h1>
        <hr class="m-y-md">

  <div class="container rounded bg-white mt-5 mb-6" style="margin-top: 2px; width: 80%">
    <div class="row" style="padding-right: 2px; padding-bottom: 15px">
        <div class="col-md-3 border-right">
          <div style="margin-top: 20px; font-size: 25px"><b>Thông tin admin</b><img class=" mt-5" width="150px" src="anh.png">  </div>
            <div class="flex-column " style="font-size: 20px">  <br><b><?php echo "$row_admin->dinh_danh"; ?></b></div>
             <div style="margin-top: 2px"><br>email: <?php echo "$row_admin->email"; ?></div>
             <div ><br>sdt: <?php echo "$row_admin->sdt"; ?></div>

        </div>
       
        <div class="col-md-8" style="margin-top: 0px ; margin-left: 10px; padding-right: 0px; display: flex;" >
                 <form  action=''  method='POST'>
                  <div style="font-size: 20px; margin-top: 20px"><b>ID lớp: <?php echo "$row_lopgiasu->class_id"; ?></b></div><br>
                  <div class="row" style="margin: auto;">
                  <div class="col-md-6 border-right">
                  <div style="text-align: left; font-size: 17px; margin-top: 10px"><b>bộ môn: </b><input style="padding-right: 30px; width: 100%" type="text" name="bo_mon" value="<?php echo "$row_lopgiasu->bo_mon"; ?>"></div>
                   <div style="text-align: left; font-size: 17px; margin-top: 10px"><b>quận phường: </b><input style="padding-right: 30px; width: 100%" type="text" name="quan_phuong" value="<?php echo "$row_lopgiasu->quan_phuong"; ?>"></div>
                    <div style="text-align: left; font-size: 17px; margin-top: 10px"><b>lương: </b><input style="padding-right: 30px; width: 100%" type="text" name="luong" value="<?php echo "$row_lopgiasu->luong"; ?>"></div>
                     <div style="text-align: left; font-size: 17px; margin-top: 10px"><b>yêu cầu: </b><input style="padding-right: 30px; width: 100%" type="text" name="yeu_cau" value="<?php echo "$row_lopgiasu->yeu_cau"; ?>"></div>
                      
                    </div>

                     <div class="col-md-6 border-right">
                  <div style="text-align: left; font-size: 17px; margin-top: 10px"><b>giới tính yêu cầu: </b><input style="padding: auto; width: 100%" type="text" name="gioi_tinh_yeu_cau" value="<?php echo "$row_lopgiasu->gioi_tinh_yeu_cau"; ?>"></div>
                   <div style="text-align: left; font-size: 17px; margin-top: 10px"><b>địa chỉ: </b><input style="padding-right: 30px; width: 100%" type="text" name="dia_chi" value="<?php echo "$row_lopgiasu->dia_chi"; ?>"></div>
                    <div style="text-align: left; font-size: 17px; margin-top: 10px"><b>thời gian học: </b><input style="padding-right: 30px; width: 100%" type="text" name="thoi_gian_hoc" value="<?php echo "$row_lopgiasu->thoi_gian_hoc"; ?>"></div>
                     <div style="text-align: left; font-size: 17px; margin-top: 10px"><b>trình độ: </b><input style="padding-right: 30px; width: 100%" type="text" name="trinh_do" value="<?php echo "$row_lopgiasu->trinh_do"; ?>"></div>
                    </div>
                    </div>
                    <br>
                    <div style="text-align: left; font-size: 17px; margin-top: 10px"><b>Trạng thái: </b><input disabled style="padding: auto; width: 100%" type="text" value="<?php echo "$row_lopgiasu->trang_thai"; ?>"></div>
                     <div style="text-align: left; font-size: 17px; margin-top: 10px"><b>ID admin: </b><input style="padding: auto; width: 100%" type="text" name="id_admin" value="<?php echo "$row_lopgiasu->id_admin"; ?>"></div>
                   <br><br><input type="submit" name ="thay_doi" value="cập nhật">
                </form>
         
        </div>


    </div>
</div>
</div>
</div>
</body>
</html>