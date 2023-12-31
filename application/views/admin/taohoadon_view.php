<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1"/>
    <meta name="msapplication-tap-highlight" content="no">
    
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Milestone">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Milestone">

    <meta name="theme-color" content="#4C7FF0">
    
    <title>Milestone - Bootstrap 4 Dashboard Template</title>

    <!-- page stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/milestone/vendor/bower-jvectormap/jquery-jvectormap-1.2.2.css"/>
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/pace/themes/blue/pace-theme-minimal.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/styles/app.css" id="load_styles_before"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>milestone/styles/app.skins.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/angular-material.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
    <!-- endbuild -->
  </head>
  <body  ng-app="myApp">

    <div class="app">
      <!--sidebar panel-->
      <div class="off-canvas-overlay" data-toggle="sidebar"></div>
      <?php require('C:\xampp\htdocs\trasua\application\views\pages\sidebar_view.php') ?>
      <!-- content panel -->
      <div class="main-panel">
        <?php require('C:\xampp\htdocs\trasua\application\views\pages\header_view.php') ?>

        <!-- main area -->
        <div class="content-view">
          <div ng-controller="AppCtrl" layout="column" ng-cloak>
            <div class="card m-b-1 m-l-3 m-r-3">
              <div class="card-header no-bg b-a-0">
                Số lượng hóa đơn
              </div>
              <div class="card-block">
                <div class="input-group m-b-1">
                  <input type="text" ng-model="soluong" class="form-control bl0 br0 spinner1"/>
                </div>
                <button type="button" class="btn btn-outline-info m-r-xs m-b-xs form-control" ng-click="themnguyenlieu(soluong)">
                      Chọn
                    </button>
              </div>
            </div>
            <div class="m-l-3 m-r-3">
              <md-content layout-padding style="background-color: #ffff">
                <form name="projectForm" action="" method="POST" ng-init='khachhang=parJson(<?php echo $mangdulieu['khachhang']?>)'>

                    <div layout="row" ng-init="dataset='false'">
                      <md-input-container class="flex-100" >
                        <label>Số điện thoại khách hàng</label>
                        <input type="number" required name="sodienthoai" ng-model="sodienthoai" ng-click="showListkhachhang()">
                        <div ng-messages="projectForm.sodienthoai.$error">
                          <div ng-message="required">Bắt buộc</div>
                        </div>
                      </md-input-container>
                      
                    </div>

                    <div layout="row" ng-init="dataset='false'" ng-show="hienthikhachhang">
                      <md-content class="flex-100">
                        <md-list flex >
                          
                              <table class="table table-hover">
                                <thead class="thead-inverse">
                                  <tr>
                                    <th>
                                      #
                                    </th>
                                    <th>
                                      Ảnh đại diện
                                    </th>
                                    <th>
                                      Họ
                                    </th>
                                    <th>
                                      Tên
                                    </th>
                                    <th>
                                      Số điện thoại
                                    </th>
                                  </tr>
                                </thead>
                                <tbody ng-repeat="item in khachhang | filter:sodienthoai | limitTo : 3 " ng-click="setkhachhang(item)">
                                  <tr >
                                    <th scope="row">
                                      {{$index}}
                                    </th>
                                    <td>
                                      <div class="" >
                                        <img src="{{item.AVATAR}}" style="width: 40px; height: auto;" class="avatar img-circle" alt="user" title="user">
                                      </div>
                                      
                                    </td>
                                    <td>
                                      {{item.HO}}
                                    </td>
                                    <td>
                                      {{item.TEN}}
                                    </td>
                                    <td>
                                      {{item.SDT}}
                                    </td>
                                  </tr>
                                
                                </tbody>
                                
                              </table>

                        </md-list>
                      </md-content>
                    </div>

                    <div style="margin: 36px 0;" layout="row" ng-show="buttonNhapthongtin">
                        <button  class="btn btn-default  form-control" ng-click="formKH(sodienthoai)">Nhập Thông tin khách hàng</button>
                    </div>

                    <!-- nhap thong tin khach hang -->

                    <div layout="row" ng-show="hienthiFormKH">
                      <md-input-container flex="50">
                        <label>Họ</label>
                        <input type="text" required name="hokh" ng-model="hokh">
                        <div ng-messages="projectForm.hokh.$error">
                          <div ng-message="required">Bắt buộc</div>
                        </div>
                      </md-input-container>
                      <md-input-container flex="50">
                        <label>Tên</label>
                        <input type="text" required name="tenkh" ng-model="tenkh">
                        <div ng-messages="projectForm.tenkh.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Đơn giá phải nhỏ hơn 10 kí tự</div>
                        </div>
                      </md-input-container>
                    </div>

                    <div layout="row" ng-show="hienthiFormKH" ng-init='listtrasua=parJson(<?php echo $mangdulieu['loaitrasua']?>)'>
                      <md-input-container flex="50">
                        <label>Loại trà sữa</label>
                        <input type="text" required name="tenloai" ng-model="tenloai" ng-click="showListTrasua()">
                        <input type="hidden" name="matenloai" ng-model="matenloai" >
                        <div ng-messages="projectForm.tenloai.$error">
                          <div ng-message="required">Bắt buộc</div>
                        </div>
                      </md-input-container>
                      <md-input-container flex="50">
                        <label>Số lượng</label>
                        <input type="text" required name="soluongmua" ng-model="soluongmua">
                        <div ng-messages="projectForm.soluongmua.$error">
                          <div ng-message="required">Bắt buộc</div>
                          <div ng-message="md-maxlength">Đơn giá phải nhỏ hơn 10 kí tự</div>
                        </div>
                      </md-input-container>
                    </div>

                    <!-- list loai tra sua -->
                    <div layout="row"  ng-show="hienthiListTenloai">
                      <md-content class="flex-50">
                        <md-list flex >
                          <md-list-item class="md-3-line" ng-repeat="item in listtrasua | filter:tenloai | limitTo : 3 " ng-click="setLoaitrasua(item)">
                            <div class="md-list-item-text" layout="column" >
                              <h3>{{item.TENLOAI}}</h3> 
                            </div>
                          </md-list-item>
                        </md-list>
                      </md-content>
                    </div>

                    <div layout="row" ng-show="thongtinKH">
                      <md-content class="flex-100" style="margin-bottom: 36px">
                        <md-list flex >
                              <table class="table ">
                                <thead class="thead-default">
                                  <tr>
                                    <th>
                                      Ảnh đại diện
                                    </th>
                                    <th>
                                      Họ
                                    </th>
                                    <th>
                                      Tên
                                    </th>
                                    <th>
                                      Số điện thoại
                                    </th>
                                  </tr>
                                </thead>
                                <tbody ng-repeat="KH in thongtinKH">
                                  <tr >
                                    <td>
                                      <div >
                                        <img src="{{KH.AVATAR}}" style="width: 40px; height: auto;" class="avatar img-circle" alt="user" title="user">
                                      </div>
                                    </td>
                                    <td>
                                      {{KH.HO}}
                                    </td>
                                    <td>
                                      {{KH.TEN}}
                                    </td>
                                    <td>
                                      {{KH.SDT}}
                                      <input type="hidden" name="makh" value="{{KH.MAKH}}">
                                    </td>
                                  </tr>

                                </tbody>
                                  
                              </table>
                        
                         
                        </md-list>
                      </md-content>
                    </div>

                    
                    <div layout="row">
                      <md-input-container flex="50">
                        <label>Nguyên liệu bổ sung </label>
                        <input type="number" ng-model="soluongnlbosung" >
                      </md-input-container>
                      <md-input-container flex="50">
                        <button type="button" class="btn btn-default form-control" ng-click="themnguyenlieubosung(soluongnlbosung)">
                                Chọn
                              </button>
                      </md-input-container>
                    </div>  


                    <div ng-show="{{hienthinlbosung}}"  ng-repeat="data in hienthinlbosung">
                      <p class="p-b-0 m-t-2"><b>Nguyên liệu {{data}}</b></p>
                      
                      <div layout="row">
                          <md-input-container flex="33" >
                            <label>Tên nguyên liệu</label>
                            <md-select name="nguyenlieucu[]" ng-model="nguyenlieucu" required ng-disabled="nguyenlieumoi" >
                              <?php foreach ($mangdulieu["nguyenlieu"] as $key ): ?>
                                <md-option value="<?php echo $key["MANGUYENLIEU"] ?>"><?php echo $key["TENNL"] ?></md-option>
                              <?php endforeach ?>
                              <md-option value=""></md-option>
                            </md-select>
                            <div ng-messages="projectForm.nguyenlieucu.$error">
                              <div ng-message="required">Bắt buộc</div>
                            </div>
                          </md-input-container>

                          <md-input-container flex="33">
                            <label>Số lượng</label>
                            <input type="number" required ng-model="soluong" name="soluong[]" >
                            <div ng-messages="projectForm.soluong.$error">
                              <div ng-message="required">Bắt buộc</div>
                            </div>
                          </md-input-container>
                          <md-input-container flex="33">
                            <label>Đơn vị</label>
                            <input type="text" md-maxlength="10" required name="donvi[]" ng-model="donvi">
                            <div ng-messages="projectForm.donvi.$error">
                              <div ng-message="required">Bắt buộc</div>
                              <div ng-message="md-maxlength">Đơn vị phải nhỏ hơn 10 kí tự</div>
                            </div>
                          </md-input-container>
                          

                        </div>
                        
                      </div>  
                    </div>                         

                    <button type="submit" class="btn btn-info m-r-xs m-b-xs form-control">
                      Nhập đơn đặt
                    </button>

                    </div>
                  </div>
                </form>
              </md-content>
            </div>

          </div>
        </div>
        <!-- /main area -->
      </div>
      <!-- /content panel -->

      

    </div>

    <script type="text/javascript">
      window.paceOptions = {
        document: true,
        eventLag: true,
        restartOnPushState: true,
        restartOnRequestAfter: true,
        ajax: {
          trackMethods: [ 'POST','GET']
        }
      };
    </script>

    <!-- build:js({.tmp,app}) scripts/app.min.js -->
    <script src="<?php echo base_url(); ?>/milestone/vendor/jquery/dist/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/pace/pace.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/tether/dist/js/tether.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/scripts/constants.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/scripts/main.js"></script>
    <!-- endbuild -->

    <!-- page scripts -->
    <script src="<?php echo base_url(); ?>/milestone/vendor/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/flot-spline/js/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/data/maps/jquery-jvectormap-us-aea.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="<?php echo base_url(); ?>/milestone/scripts/helpers/noty-defaults.js"></script>
    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <script src="<?php echo base_url(); ?>/milestone/scripts/dashboard/dashboard.js"></script>
    <!-- end initialize page scripts -->
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/jquery-3.5.1.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-1.5.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-route.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-animate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-aria.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-messages.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-material.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>

    
    
  </body>
</html>
