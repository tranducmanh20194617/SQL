 var app = angular.module('myApp',['ngMaterial']);
 app.controller('MyController', function($scope,$http,$mdToast) {
 


 	$scope.hienradi = function(lopgiasu){
 		lopgiasu.hienra =!lopgiasu.hienra;
 	};
 	/////////////////////////////////////////////////////
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
        .textContent('đăng ký nhận lớp thành công')
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
 