<?php
  session_start();
$db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");

if(!isset($_SESSION['dangnhap'])){
        header('Location: admin');
    } 
    if(isset($_GET['login'])){
    $dangxuat = $_GET['login'];
     }else{
        $dangxuat = '';
     }
     if($dangxuat=='dangxuat'){
        session_destroy();
        header('Location: admin');
     }

?>

<!DOCTYPE html>
<html  lang="en">
<head>
    <title class=" text-xs-center fas fa-graduation-cap">  Danh sách sinh viên  </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="vendor/bootstrap.css">
  <link rel="stylesheet" href="vendor/angular-material.min.css">
  <link rel="stylesheet" href="vendor/font-awesome.css">
  <link rel="stylesheet" href="1.css">

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
  <a class="active" href="admin/dashboard.php"><b>Home</b></a>
<a href="danhsachdangkylop.php">Danh sách đăng ký lớp</a>
<a href="index.php/insert_lopgiasu/savedata">Thêm lớp gia sư</a>
<a href="danhsachsinhvien.php">Quản lý sinh viên</a>
<a href="index.php/caclopgiasu">Quản lý danh sách lớp</a>
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
        <h1  class="text-xs-center"><i class=" text-xs-center fas fa-graduation-cap" style="font-size: 30px"></i>Quản lý tài khoản sinh viên</h1>
        <hr class="md-m-y">
<div align="left">
           <form action="danhsachsinhvien.php" method="get">
                <b>Tìm kiếm theo ID: </b><input type="text" name="search" />
                <input class="btn btn-outline-danger" style= "background:linear-gradient(135deg,#9b59b6, #71b7e6 ); ;color:white; margin-bottom: 10px;
                margin-left: 5px" type="submit" name="ok"  value="search" />
                <a href="?ok = NULL"> <b class="btn btn-outline-danger" style= "background:linear-gradient(135deg,#9b59b6, #71b7e6 );margin-left: 5px ;color:white; margin-bottom: 10px" > Reset </b></a>
            <br>
            </form>

            <form  method="post" action="danhsachsinhvien.php">
              <b>Trạng thái kiểm tra</b>
              <select  style="width: 205px;" name="taskOption">
                <option value=2>Tất cả</option>
                <option value=0>Chưa kiểm tra</option>
                <option value=1>Đã kiểm tra</option>
              </select>
              <input class="btn btn-outline-danger" style= "background:linear-gradient(135deg,#9b59b6, #71b7e6 );margin-left: 5px ;color:white; margin-bottom: 10px" type="submit" name = "dachon" value="Submit " />
            </form>
                        
            <br>
        </div>
        <?php
           if (isset($_REQUEST['ok']) && $_GET['search'] != NULL ) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = ($_GET['search']);
            if($search != NULL){
            $sql_tim_kiem = "SELECT *  FROM sinh_vien WHERE id_tk = $search";
            $result = pg_query($db_connection, $sql_tim_kiem);
            $page = 1;
            $current_page = 1;
         }
       }
       elseif(isset($_POST['dachon']) && $_POST['taskOption'] == 0){
          $sql_tim_kiem = "SELECT *  FROM sinh_vien WHERE da_kiem_tra = 0";
            $result = pg_query($db_connection, $sql_tim_kiem);
            $page = 1;
            $current_page = 1;
       }
       elseif(isset($_POST['dachon']) && $_POST['taskOption'] == 1){
          $sql_tim_kiem = "SELECT *  FROM sinh_vien WHERE da_kiem_tra = 1";
            $result = pg_query($db_connection, $sql_tim_kiem);
            $page = 1;
            $current_page = 1;
       }
      else{
        $sql_so = "SELECT COUNT(id_tk) as number FROM sinh_vien";
         $result_so = pg_query($db_connection, $sql_so);
         $so_sv = pg_fetch_array($result_so);
         $number = 0;
         if($result_so != NULL && count($so_sv) > 0){
            $number = $so_sv[0];
           }
           $page = ceil($number/20);
           $current_page = 1;
         if(isset($_GET['page'])){
            $current_page = $_GET['page'];
           }
           $index = ($current_page-1)*20;
            $result = pg_query($db_connection, "SELECT * FROM sinh_vien OFFSET $index  LIMIT 20");
      }
 
    while($row = pg_fetch_object($result)){
?>
        <div class="card-deck" >
  
            <div class="card " >
             <div class="card-header" style="background: linear-gradient(135deg, #71b7e6, #9b59b6); color:white;">
             <a href="chitietsinhvien.php?idsv=<?php echo "$row->id_tk"; ?>"> <b class="float-xs-right"> <i class="float-xs-right btn btn-outline-danger btn-block"  style= "color:white;">Xem chi tiết</i> </b></a>
              thông tin về sinh viên ID <B><?php echo "$row->id_tk"; ?></B> 
            </div>
            <div class="card-block">
              <b > Email: </b><i><?php echo "$row->email"; ?></i><br>
              <b > Tên tài khoản: </b><i><?php echo "$row->ten_tk"; ?></i><br>
              <b > Số điện thoại: </b><i><?php echo "$row->sdt"; ?></i><br>
              <b > Họ tên: </b><i><?php echo "$row->ho_ten"; ?></i><br>
              <b > Ngày sinh: </b><i><?php echo "$row->ngay_sinh"; ?></i><br>
           

            </div>
  
          </div>

          </div>
        <?php } ?>
      <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php if($current_page==1){
       echo'<li class="page-item disabled">';}
       else{
        echo '<li class="page-item">';
       }
      ?>
    
      <a class="page-link" href="?page=<?php $pre=($current_page - 1); echo"$pre" ?>" tabindex="-1">Previous</a>
    </li>
    <?php 
    for ($i=$current_page; $i <= $current_page+3; $i++) { 
           // echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$i\">$i</a></li>";
      if($i > $page){
        
      }else{
        echo " <li class=\"page-item\"><a class=\"page-link\" href=\"?page=$i\">$i</a></li>";
      }
           

    }

     ?>
     <li class="page-item <?php  $pre=($current_page + 4);if($pre > $page){echo'disabled';}?>">
      <a class="page-link" href="?page=<?php  echo"$pre" ?>">Next</a>
    </li>
  </ul>
</nav>

       
</div>
</div>
</div>
    <script type="text/javascript" src="vendor/bootstrap.js"></script>  
  <script type="text/javascript" src="vendor/angular-1.5.min.js"></script>  
  <script type="text/javascript" src="vendor/angular-animate.min.js"></script>
  <script type="text/javascript" src="vendor/angular-aria.min.js"></script>
  <script type="text/javascript" src="vendor/angular-messages.min.js"></script>
  <script type="text/javascript" src="vendor/angular-material.min.js"></script>  
  <script type="text/javascript" src="bailam2.js"></script>
</body>
</html>
 

