// mặc định muốn dùng angular sẽ có những dòng này 
var app = angular.module('myApp',['ngMaterial', 'ngMessages', 'ngRoute']);
app.controller('AppCtrl',  function($scope){
	$scope.project = {
    description: 'Nuclear Missile Defense System',
    rate: 500,
    special: true

    
  };

  $scope.themnguyenlieu = function (soluong) {
  	datas = [];
  	for(i = 0; i < soluong; i++) {
  		datas[i] = i + 1
  	}

  	$scope.dataset = datas
  }

  $scope.themnguyenlieubosung = function (soluong) {
    datas = [];
    for(i = 0; i < soluong; i++) {
      datas[i] = i + 1
    }

    $scope.hienthinlbosung = datas
  }

  $scope.parJson = function (json) {
     return angular.fromJson(json);
  }

  $scope.findNcc = function (json, mancc) {
    newArray = [];
    for (arr of json) {
      if (arr.MANHACUNGCAP == mancc) {
        newArray.push(arr);
      }
    }

    $scope.items = newArray;
    $scope.hienthidondathang = false
  }


  $scope.findKhachhang = function (json, mancc) {
    newArray = [];
    for (arr of json) {
      if (arr.MANHACUNGCAP == mancc) {
        newArray.push(arr);
      }
    }

    $scope.items = newArray;
    $scope.hienthidondathang = false
  }

  $scope.setDondh = function (madondh) {
    $scope.dondathang = madondh
    $scope.hienthidondathang = false;
  }

  $scope.showListMadondh = function () {
    $scope.hienthidondathang = true;
  }


  $scope.showListkhachhang = function () {
    $scope.hienthikhachhang = true
    $scope.buttonNhapthongtin = true
    $scope.hienthiFormKH = false
    $scope.thongtinKH = false
  }

   $scope.setkhachhang = function (thongtin) {
    array = [thongtin]
    $scope.thongtinKH = array
    $scope.sodienthoai = parseInt(thongtin.SDT)
    $scope.hienthiFormKH = false
    $scope.buttonNhapthongtin = false
    $scope.hienthikhachhang = false;
   }

   $scope.formKH = function (sodienthoai) {
    $scope.hienthiFormKH = true
    $scope.buttonNhapthongtin = false
    $scope.hienthikhachhang = false
   }


   $scope.setLoaitrasua = function(item) {
    $scope.tenloai = item.TENLOAI
    $scope.matenloai = item.MALOAITRASUA
    $scope.hienthiListTenloai = false
   }

   $scope.showListTrasua = function () {
    $scope.hienthiListTenloai = true;
   }
}) 


