<!DOCTYPE html>
<html  lang="en">
<head>
	<title class=" text-xs-center fas fa-graduation-cap"> xóa lớp gia sư  </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/angular-material.min.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body ng-app="myApp" ng-controller="MyController">
	<?php
	$id = $_GET['id'];
	$db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");
	$result = pg_query($db_connection, "DELETE  FROM lop_gia_su where class_id = $id ");
	if($result){
        echo "<script>alert('Xóa lớp thành công!');</script>";
	}else{
        echo "<script>alert('Xóa lớp không thành công!');</script>";

	}
	?>
	
	<?php  ?>
	<script type="text/javascript" src="vendor/bootstrap.js"></script>  
	<script type="text/javascript" src="vendor/angular-1.5.min.js"></script>  
	<script type="text/javascript" src="vendor/angular-animate.min.js"></script>
	<script type="text/javascript" src="vendor/angular-aria.min.js"></script>
	<script type="text/javascript" src="vendor/angular-messages.min.js"></script>
	<script type="text/javascript" src="vendor/angular-material.min.js"></script>  
	<script type="text/javascript" src="bailam2.js"></script>
</body>
</html>
