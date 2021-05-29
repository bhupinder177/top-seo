<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Top-Seo Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/lib/font-awesome/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/lib/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/main.css">
</head>
<body class="hold-transition login-page">
  <div class="login_panel" ng-app="myApp" ng-controller="myCtrt">
    	<div class="login_bx">
        	<div class="login_logo">
          	<img src="<?php echo base_url(); ?>assets/dashboard/images/logo.png" alt=""/>
            </div>
        	<h3>Login</h3>

          <div class="form-group">
              <input type="text" ng-enter="login()" ng-model="email" ng-value="email"  id="loginEmail"  class="form-control" placeholder="Username">
               <p ng-show="loginSubmit && email == ''" class="text-danger">Username is required.</p>


          </div>
           <div class="form-group">
              <input ng-model="password" ng-enter="login()" ng-value="password"   id="loginPassword" type="password" class="form-control" placeholder="Password">
                  <p ng-show="loginSubmit && password == ''" class="text-danger">Password is required.</p>
          </div>

          <button type="submit" ng-click="login()" class="btn btn-primary">
              Login
          </button>


    </div>
  </div>


<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/admin/js/lib/jquery/jquery-3.2.1.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/admin/js/lib/popper/popper.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/admin/js/lib/tether/tether.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/admin/js/lib/bootstrap/bootstrap.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/admin/js/plugins.js"></script>
   <script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/lib/jqueryui/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notify.js" type="text/javascript" charset="utf-8"></script>
<script>
var app = angular.module('myApp', [])

app.directive('ngEnter', function () {
        return function (scope, element, attrs) {
            element.bind("keydown keypress", function (event) {
                if (event.which === 13) {
                    scope.$apply(function () {
                        scope.$eval(attrs.ngEnter);
                    });

                    event.preventDefault();
                }
            });
        };
     });
app.controller('myCtrt', function($scope,$window,$http,$interval) {
    $scope.email ='';
    $scope.password ='';

	$scope.login = function()
    {
      $scope.loginSubmit = true;
	    var error = false;

      if($scope.email == '' || $scope.password == '')
      {
        error = true;
      }

      if(error == true)
      {
       return false;
      }

      var m = JSON.stringify({ email : $scope.email ,password : $scope.password });
      angular.element(".preloader").show();
       $http({
       url: '<?php echo base_url(); ?>admin/login',
       method: "POST",
       data: m,
       headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {

         angular.element(".preloader").hide();

         if(response.data.message == "1")
          {
            $.notify("Login Successfully", "success");
            angular.element("#email").val('');
            angular.element("#password").val('');
             $interval(callAtInterval, 2000);

						 function callAtInterval()
						 {
            $window.location.href = '<?php echo base_url(); ?>admin/dashboard';
            }

          }
         else if(response.data.message == "2")
         {
           $.notify("Email and Password  Invalid.", "error");
         }
          });

			  }
});
</script>

</body>
</html>
