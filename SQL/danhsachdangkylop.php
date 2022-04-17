<?php
  session_start();
  $db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");
  if(!isset($_SESSION['dangnhap'])){
    header('Location: admin/index.php');
  } 
  if(isset($_GET['login'])){
  $dangxuat = $_GET['login'];
   }else{
    $dangxuat = '';
   }
   if($dangxuat=='dangxuat'){
    session_destroy();
    header('Location: admin/index.php');
   }

   if(isset($_GET['type'])){
    if($_GET['type'] == 'tu_choi'){
      $id_sv_doi = $_GET['doi_idsv'];
      $class_id_doi = $_GET['doi_class_id'];
      if(pg_query($db_connection, "SELECT tu_choi_sinh_vien($class_id_doi, $id_sv_doi)")){
       // echo '<script language="javascript">alert("từ chối thành công!");</script>';
      }
      else{
        // echo "<script>alert('Cập nhập thất bại!');</script>";
      }
    }
    else if($_GET['type'] == 'giao_lop'){
      $id_sv_doi = $_GET['doi_idsv'];
      $class_id_doi = $_GET['doi_class_id'];
      if(pg_query($db_connection, "SELECT giao_lop($class_id_doi, $id_sv_doi)")){
        // echo "<script>alert('Cập nhập thành công!');</script>";
      }
      else{
        // echo "<script>alert('Cập nhập thất bại!');</script>";
      }
    }
   }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="danhsachdangkylop.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

  <title>
    Danh sách đăng ký lớp
  </title>

   <meta charset="utf-8">
  <link rel="stylesheet" href="vendor/bootstrap.css">
  <link rel="stylesheet" href="vendor/angular-material.min.css">
  <link rel="stylesheet" href="vendor/font-awesome.css">
  <link rel="stylesheet" href="1.css">
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
<div class="topnav" id="navbar">
  <a class="active" href="admin/dashboard.php"><b>Home</b></a>
<a href="danhsachdangkylop.php">Danh sách đăng ký lớp</a>
<a href="index.php/insert_lopgiasu/savedata">Thêm lớp gia sư</a>
<a href="danhsachsinhvien.php">Quản lý sinh viên</a>
<a href="index.php/caclopgiasu">Quản lý danh sách lớp</a>
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
 <body>
    <div class="inra" style="height: 100%">
    <div class="container">
      <div class="jumbotron" style="text-align: center;">
        <h1  class="text-xs-center" ><i class=" text-xs-center " style="font-size: 30px"></i>Danh sách đăng ký lớp</h1>
        <hr class="md-m-y">
        <div align="left">
           <form action="danhsachdangkylop.php" method="get">
                <b>ID lớp: </b><input type="text" name="search_class" />
               
                 <b>ID sinh viên: </b><input type="text" name="search_sv" />
                <input class="btn btn-outline-danger" style= "background:linear-gradient(135deg,#9b59b6, #71b7e6 ); ;color:white; margin-bottom: 10px;
                margin-left: 5px" type="submit" name="ok"  value="search" />

                <a href="?ok = NULL"> <b class="btn btn-outline-danger" style= "background:linear-gradient(135deg,#9b59b6, #71b7e6 );margin-left: 5px ;color:white; margin-bottom: 10px" > Reset </b></a>
            <br>
            </form>
                        
            <br>
        </div>
 <div id="wrapper" style="width: 100%">
 
  
  <table id="keywords" cellspacing="0" cellpadding="0" style="width: 100%; height: 100%;border-collapse: collapse;" >
    <thead>
      <tr>
        <th style="text-align: center;"><span style="text-align: left;">ID lớp</span></th>
        <th style="text-align: center;"><span style="text-align: left;">ID sinh viên</span></th>
        <th style="text-align: center;"><span style="text-align: left;">Ngày phản hồi</span></th>
        <th style="text-align: center;"><span style="text-align: left;">Trạng thái</span></th>
        <th style="text-align: center;"><span style="text-align: left;"></span></th>
        <th style="text-align: center;"><span style="text-align: left;"></span></th>


      </tr>
    </thead>
    <tbody >
<?php 
   if (isset($_REQUEST['ok'])) 
        {
          if($_GET['search_class'] != NULL && $_GET['search_sv'] != NULL ){
              $class = ($_GET['search_class']);
              $sv = $_GET['search_sv'];
            $sql_tim_kiem = "SELECT *  FROM dang_ky_lop WHERE id_tk = $sv AND class_id = $class";
            $result = pg_query($db_connection, $sql_tim_kiem);
          }
          else if($_GET['search_class'] == NULL && $_GET['search_sv'] != NULL ){
            $sv = $_GET['search_sv'];
            $sql_tim_kiem = "SELECT *  FROM dang_ky_lop WHERE id_tk = $sv ";
            $result = pg_query($db_connection, $sql_tim_kiem);
          }
          else if($_GET['search_class'] != NULL && $_GET['search_sv'] == NULL ){
            $class = ($_GET['search_class']);
            $sql_tim_kiem = "SELECT *  FROM dang_ky_lop WHERE class_id = $class";
            $result = pg_query($db_connection, $sql_tim_kiem);
          }
          else{
            $sql_tim_kiem = "SELECT *  FROM dang_ky_lop";
            $result = pg_query($db_connection, $sql_tim_kiem);
          }
          
         }
    else{
      $sql_tim_kiem = "SELECT *  FROM dang_ky_lop";
            $result = pg_query($db_connection, $sql_tim_kiem);
    }
    while($row = pg_fetch_object($result)){
 ?>

  <tr>
        <td style="text-align: center;" ><a href="chitietlopgiasu.php?search=<?php echo "$row->class_id"; ?>"><?php echo "$row->class_id"; ?></a></td>
        <td style="text-align: center;"><a href="chitietsinhvien.php?idsv=<?php echo "$row->id_tk"; ?>"><?php echo "$row->id_tk"; ?></a></td>
        <td ><?php echo "$row->ngay_phan_hoi"; ?></td>
        <td style="text-align: center;"><?php if($row->da_huy == 0){echo "đang nhận lớp";} else if($row->da_huy == 1){echo " bị từ chối";} else if($row->da_huy == 2){echo "đã giao";}?></td>
        <td style="text-align: center;"><a  href="danhsachdangkylop.php?type=tu_choi&doi_idsv=<?php echo "$row->id_tk"; ?>&doi_class_id=<?php echo "$row->class_id"; ?>" <?php if($row->da_huy == 2){echo 'style = " pointer-events: none; 
    cursor: default; color: red "';}?> >Từ chối</a></td>
        <td style="text-align: center;"><a 
         <?php if($row->da_huy == 1){echo 'style = " pointer-events: none; 
    cursor: default; color: red; "';}?> href="danhsachdangkylop.php?type=giao_lop&doi_idsv=<?php echo "$row->id_tk"; ?>&doi_class_id=<?php echo "$row->class_id"; ?>" >Giao lớp</a></td>

      </tr>
<?php } ?>
    
     
    </tbody>
  </table>
 </div> 
  </div>  </div>  </div>    
</body>
</body>
</html>