
          <div ng-cloak class="how-it-work-sec" ng-app="myApp2" ng-controller="myCtrt2">
          <div class="container">
          <!-- <h1 class="text-center">How it Works</h1> -->
          <!-- <div class="work-circle"> -->
          <div class="col-md-12 col-sm-12 col-xs-12 forms ">

          <!--  Form -->
<div class="login-form">
          <div class="form-grid">

          <h2 class="clearfix lh-1">
          <center><span class="float-sm-left">Register</span></center>
          </h2>

          <form id="clientregister" name="registerForm" novalidate >

          <div class="form-group">

          <label for="loginEmail1">Email address</label>

          <input ng-enter="register()" onkeyup="angular.element(this).scope().ctrl(this)"  type="email" ng-model="email"  name="email" class="form-control rounded-0" id="email"  placeholder="Enter Email Address"  >
           <p ng-cloak ng-show="registerSubmit && email == ''" class="text-danger">Email is required.</p>
           <p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>
            <!-- registerForm.email.$error.pattern -->
         </div>

          <div class="form-group">

          <label for="loginPassword">Password</label>

          <input ng-enter="register()" type="password" ng-model="password" name="pass" class="form-control rounded-0" id="password" placeholder="Password">
           <p ng-cloak ng-show="registerSubmit && password == ''" class="text-danger">Password is required.</p>
           <p ng-cloak ng-show="registerSubmit && password && password.length < 6 " class="text-danger">Password length must be 6.</p>
          </div>

          <div class="form-group">

          <label for="loginPassword">Confirm Password</label>

          <input ng-enter="register()" type="password" ng-model="cpass" name="cpass" class="form-control rounded-0" id="cpass" placeholder="Confirm Password">
          <p ng-cloak ng-show="registerSubmit && cpass == ''" class="text-danger"> Confirm password is required.</p>
          <p ng-cloak ng-show="cpass && password && cpass != password" class="text-danger">Confirm password is not matched.</p>
          </div>

          <div class="form-group">

          <label for="loginEmail1">Type</label>

          <select ng-enter="register()" ng-model="type" id="type" class="form-control rounded-0"  >
            <option value="">Please select account type</option>
            <option ng-repeat="(key,x) in types" ng-if="x.id != 3" ng-init="types = key" value="{{ x.id }}">{{ x.type | capitalize }}</option>
          </select>
          <p ng-cloak ng-show="registerSubmit && type == ''" class="text-danger">Please select type.</p>
          </div>

          <div ng-if="type == 3 || type == 4" class="form-group">

          <label for="loginEmail1">Full name</label>

          <input ng-enter="register()" type="text" ng-model="name" name="name" class="form-control rounded-0" id="name"   placeholder="Enter person name"  >
          <p ng-cloak ng-show="registerSubmit && name == ''" class="text-danger">Name is required.</p>
          </div>

          <div ng-if="type == 3 || type == 4" class="form-group">

          <label for="loginEmail1">Enter business name</label>

          <input ng-enter="register()" type="text" ng-model="url" name="name" class="form-control rounded-0" id="url"   placeholder="Enter business name"  >
          <p ng-cloak ng-show="registerSubmit && url == ''" class="text-danger">Business name is required.</p>
          <p>(Please choose a short Business name. This would represent your actual business name in the website URL)
            We are happy with long business name but it will make your website url longer.</p>
          </div>

          <div ng-if="type == 2" class="form-group">
          <label for="loginEmail1">Company name</label>
          <input ng-enter="register()" type="text" ng-model="cname" name="cname" class="form-control rounded-0" id="cname"   placeholder="Enter company name"  >
          <p ng-cloak ng-show="registerSubmit && cname == ''" class="text-danger">Company Name is required.</p>
          </div>

          <div ng-if="type == 2" class="form-group">
          <label for="loginEmail1">Short Name for Url</label>
          <input ng-enter="register()" type="text" ng-model="url" name="url" class="form-control rounded-0" id="url"   placeholder="Enter company name"  >
          <p ng-cloak ng-show="registerSubmit && url == ''" class="text-danger">Url is required.</p>
          <p>(Please choose a short company name. This would represent your actual company name in the website URL)
           We are happy with long company name but it will make your website url longer.</p>
          </div>



          <input type="button" name="login" value="Register" ng-click="register()" class="mt-4 btn btn-theme mw-100 btn-block pointer rounded-0 btn-success">

          </form>

          </div>

          </div>

          <!-- Form -->

          </div>
 </div>
          <!-- </div> -->
          </div>
          </div>
