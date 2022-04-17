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
$db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");
$result = pg_query($db_connection, "SELECT * FROM admin_tbl, (select id_admin as id FROM sinh_vien Where id_tk = $_SESSION[id_sv]) as i WHERE id_tk = i.id ");
 
       
        if( !$row = pg_fetch_object($result)){
          echo "<script>alert('Admin chưa kiểm tra thông tin của bạn!');</script>";
          echo ' <meta http-equiv="refresh" content="0;url=dangnhap/webchinh.php">';
        }
        else{


?>

<!DOCTYPE html>

<?php 
  
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Thông tin admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="stylethongtinadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body style="background: linear-gradient(135deg, #71b7e6, #9b59b6);">
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
<div style="width: 80%; margin: auto;">
    <br><br><br><br><br><br>
<div class="page-content page-container" id="page-content" style="font-size: 40px ">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-800" style="font-size: 30px"><b><?php  echo"<td>$row->dinh_danh</td>"; ?></b></h6><br>
                                <p ><i style="font-size: 14px">"The future of the world is in your classroom today"</i></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600" style="margin-bottom: 5px">Họ tên</h6>
                                <div class="row">
                                   
                                        <!-- <p class="m-b-10 f-w-600">Họ tên </p> -->
                                        <h6 class="text-muted f-w-400" style="font-size: 25px; margin-bottom: 10px"><?php  echo"<td>$row->ten_tk</td>"; ?></h6>
                                   
                                    
                     
                                   
                                </div>
                                 <h6 class="m-b-20 p-b-5 b-b-default f-w-600" style="margin-top:10px">Liên lạc</h6>
                                <div class="row">
                                   
                                        <p class="m-b-10 f-w-600" style="margin-bottom: 5px">Email</p>
                                        <h6 class="text-muted f-w-400"><?php  echo"<td>$row->email</td>"; ?></h6>
                                   
                                    
                                        <p class="m-b-10 f-w-600" style="margin-bottom: 5px">Phone</p>
                                        <h6 class="text-muted f-w-400"><?php  echo"<td>$row->sdt</td>"; ?>8</h6>
                                   
                                </div>
                                   
                                </div>
                              
                                   <div style="font-size: 14px; color: red"><footer><i>Nếu có bất cứ thắc mắc về việc sai sót khi cho đánh giá hay cần thêm thông tin về lớp gia sư, hãy liên hệ ngay với admin của bạn để được tư vấn!</i></footer>
                                       
                                   </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
</div>
      </body>
</html>
<?php } ?>