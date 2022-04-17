 var app = angular.module('myApp',['ngMaterial']);
 app.controller('MyController', function($scope,$http,$mdToast) {
  $scope.gioitinh = ["nam", "nữ" ]; 


 	$scope.hienradi = function(lopgiasu){
 		lopgiasu.hienra =!lopgiasu.hienra;
 	};
 	$http.get("http://localhost/csdl/index.php/welcome/laydulieulopgiasu")//lấy dữ liệu
 	.then(function(res) {

    $scope.nhieulopgiasu = res.data;// pun dữ liệu
  });
 	$http.get("http://localhost/csdl/index.php/welcome/laydulieulopgiasuquan")
  .then(function (res1) {
    $scope.nhieuquanlopgiasu = res1.data;
  });
  $http.get("http://localhost/csdl/index.php/welcome/laydulieulopgiasumonhoc")
  .then(function (res2) {
    $scope.nhieumon = res2.data;
  });
  $http.get("http://localhost/csdl/index.php/welcome/laydulieulopgiasulophoc")
  .then(function (res3) {
    $scope.nhieulop = res3.data;
  });
//////////////////////////////////////////////////////////////
 // lưu dũ liệu
 	$scope.luudulieu12 = function(lopgiasu) {
 		lopgiasu.hienra =!lopgiasu.hienra;
  	//du lieu gui di 
  	 var data =  $.param({
  		class_id : lopgiasu.class_id,
      bo_mon  : lopgiasu.bo_mon ,
      gioi_tinh_yeu_cau: lopgiasu.gioi_tinh_yeu_cau,
      quan_phuong : lopgiasu.quan_phuong,
      dia_chi : lopgiasu.dia_chi,
      luong : lopgiasu.luong,
      thoi_gian_hoc : lopgiasu.thoi_gian_hoc,
      yeu_cau : lopgiasu.yeu_cau,
      trinh_do : lopgiasu.trinh_do,
      trang_thai : lopgiasu.trang_thai
  	});

  	var config = {
  		headers : {
  			'content-type':'application/x-www-form-urlencoded;charset=UTF-8'
  		}
  	}
  	//su dung ham post ket noi vs api 
  	$http.post ('http://localhost/csdl/index.php/welcome/luudulieulopgiasu', data,
  		config).then(function(res){
  			if(res.data == "thanhcong")
        {
          $scope.showSimpleToast() ;
        }
  		}, function(res){
  			if(res.data == "thatbai")
        {
          console.log("cap nhap that bai");
        }
  		});
  	}
///////////////////////////////////////////////////////////////
    //hiện thông báo
    var last = {
      bottom: true,
      top: false,
      left: false,
      right: true
    };

    $scope.toastPosition = angular.extend({}, last);

    $scope.getToastPosition = function() {
      sanitizePosition();
      return Object.keys($scope.toastPosition)
      .filter(function(pos) {
        return $scope.toastPosition[pos];
      }).join(' ');
    };

    function sanitizePosition() {
      var current = $scope.toastPosition;

      if (current.bottom && last.top) {
        current.top = false;
      }
      if (current.top && last.bottom) {
        current.bottom = false;
      }
      if (current.right && last.left) {
        current.left = false;
      }
      if (current.left && last.right) {
        current.right = false;
      }

      last = angular.extend({}, current);
    }

    $scope.showSimpleToast = function() {
      var pinTo = $scope.getToastPosition();

      $mdToast.show(
        $mdToast.simple()
        .textContent('cập nhập thành công')
        .position(pinTo)
        .hideDelay(500)
      );  
    };
  })
 
 .controller('ToastCtrl', function ($scope,$mdToast) {
  $scope.closeToast = function () {
    $mdToast.hide();
  };
//////////////////////////////////////////////////////////

//hiện cụ thể


 });
 