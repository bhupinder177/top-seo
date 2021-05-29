
          <div class="how-it-work-sec">
          <div class="container">
          <!-- <h1 class="text-center">How it Works</h1> -->
          <!-- <div class="work-circle"> -->
          <div ng-cloak class="col-md-12 col-sm-12 col-xs-12 forms"  ng-app="myApp14" ng-controller="myCtrt14">

          <!--  Form -->
    <div class=" login-form login-sec">
          <div class="form-grid loginpage">
            <?php if ($this->session->flashdata('success_message')) { ?>
        <div class="col-md-12">
        <div class="alert alert-success">
        <?php echo $this->session->flashdata('success_message') ?>
       </div>
       </div>

       <?php } ?>
       <?php if ($this->session->flashdata('failure_message')) { ?>
        <div class="col-md-12">
       <div class="alert alert-danger">
      <?php echo $this->session->flashdata('failure_message') ?>
      </div>
       </div>

       <?php } ?>

       <ul class="nav nav-tabs">
         <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
         <li><a data-toggle="tab" href="#register">Register</a></li>
       </ul>
       <div class="tab-content">
         <!-- login -->
          <div id="login" class="tab-pane fade in active">
          <h2 class="clearfix lh-1">
            <!-- <center><span class="float-sm-left">Login</span></center> -->
          </h2>
          <form id="clientlogin">
          <div class="form-group">
          <label for="loginEmail1">Email address</label>
          <input ng-enter="login()" onkeyup="angular.element(this).scope().loginctrl(this)" type="text" name="email" class="form-control rounded-0" ng-model="email" ng-value="email" id="loginEmail"  placeholder="Your Email address"  >
          <!-- <input type="hidden" name="url" value="<?php if(!empty($url)){ echo $url;  } ?>"> -->
          <p ng-cloak ng-show="loginSubmit && email == ''" class="text-danger">Email is required.</p>
          <p ng-cloak ng-show="email != '' && loginemailvalide" class="text-danger">Please enter valid email address.</p>

          </div>

          <div class="form-group">

          <label for="loginPassword">Password</label>

          <input ng-enter="login()"  type="password" name="pass" class="form-control rounded-0" ng-model="password" ng-value="password" id="loginPassword" placeholder="Your Password">
          <p ng-cloak ng-show="loginSubmit && password == ''" class="text-danger">Password is required.</p>

          </div>

          <button type="button" ng-click="login()" name="login" value="true" class="mt-4 btn btn-theme mw-100 btn-block pointer rounded-0 btn-success">Login</button>
          <div class="forgot"><a class="forgot-pass" href="<?php echo base_url(); ?>forgot-password">Forgot password ?</a></div>
          </form>

        </div>
        <!-- login -->

        <!-- register -->
        <div id="register" class="tab-pane fade">
          <h2 class="clearfix lh-1">
          <!-- <center><span class="float-sm-left">Register</span></center> -->
          </h2>

          <form id="clientregister" name="registerForm" novalidate >

          <div class="form-group">

          <label for="loginEmail1">Email address</label>

          <input ng-enter="register()" onkeyup="angular.element(this).scope().ctrl(this)"  type="email" ng-model="remail"  name="remail" class="form-control rounded-0" id="email"  placeholder="Enter Email Address"  >
           <p ng-cloak ng-show="registerSubmit && remail == ''" class="text-danger">Email is required.</p>
           <p ng-cloak ng-show="remail != '' && emailvalide" class="text-danger">Please enter valid email address.</p>
           <p ng-cloak ng-show="remail != '' && !emailvalide && emailalready" class="text-danger">Email is already registered.</p>
            <!-- registerForm.email.$error.pattern -->
         </div>

          <div class="form-group">

          <label for="loginPassword">Password</label>

          <input ng-enter="register()" type="password" ng-model="rpassword" name="pass" class="form-control rounded-0" id="password" placeholder="Password">
           <p ng-cloak ng-show="registerSubmit && rpassword == ''" class="text-danger">Password is required.</p>
           <p ng-cloak ng-show="registerSubmit && rpassword && rpassword.length < 6 " class="text-danger">Password length must be 6.</p>
          </div>

          <div class="form-group">

          <label for="loginPassword">Confirm Password</label>

          <input ng-enter="register()" type="password" ng-model="rcpass" name="rcpass" class="form-control rounded-0" id="cpass" placeholder="Confirm Password">
          <p ng-cloak ng-show="registerSubmit && rcpass == ''" class="text-danger"> Confirm password is required.</p>
          <p ng-cloak ng-show="rcpass && rpassword && rcpass != rpassword" class="text-danger">Confirm password is not matched.</p>
          </div>

          <div class="form-group">

          <label for="loginEmail1">Type</label>

          <select ng-enter="register()" ng-model="type" id="type" class="form-control rounded-0"  >
            <option value="">Please select account type</option>
            <option ng-repeat="(key,x) in types" ng-if="x.id != 3" ng-init="types = key" value="{{ x.id }}">{{ x.type | capitalize }}</option>
          </select>
          <p ng-cloak ng-show="registerSubmit && type == ''" class="text-danger">Please select type.</p>
          </div>

          <div ng-if="type == 2 || type == 3 || type == 4" class="form-group">

          <label for="loginEmail1">Full name</label>

          <input ng-enter="register()" type="text" ng-model="name" name="name" class="form-control rounded-0 characteronly" id="name"   placeholder="Enter person name"  >
          <p ng-cloak ng-show="registerSubmit && name == ''" class="text-danger">Name is required.</p>
          </div>

          <div ng-if="type == 3 || type == 4" class="form-group">

          <label for="loginEmail1">Enter business name</label>

          <input ng-enter="register()" type="text" ng-model="url" name="name" class="form-control rounded-0" id="url"   placeholder="Enter business name"  >
          <p ng-cloak ng-show="registerSubmit && url == ''" class="text-danger">Business name is required.</p>
          <p class="registernote">(Please choose a short Business name. This will add in URL of the website. We are happy with long business name but it will make your website URL longer.)</p>
          </div>

          <div ng-if="type == 2" class="form-group">
          <label for="loginEmail1">Company name</label>
          <input ng-enter="register()" type="text" ng-model="cname" name="cname" class="form-control rounded-0" id="cname"   placeholder="Enter company name"  >
          <p ng-cloak ng-show="registerSubmit && cname == ''" class="text-danger">Company Name is required.</p>
          </div>

          <div ng-if="type == 2" class="form-group">
          <label for="loginEmail1">Short Company Name for URL</label>
          <input ng-enter="register()" type="text" ng-model="url" name="url" class="form-control rounded-0" id="url"   placeholder="Enter company name"  >
          <p ng-cloak ng-show="registerSubmit && url == ''" class="text-danger">Short Company name is required.</p>
          <p class="registernote">(Please choose a short name for the company. This will add in URL of the website. We are happy with long company name but it will make your website URL longer.)</p>
          </div>



          <input type="button" name="login" value="Register" ng-click="register()" class="mt-4 btn btn-theme mw-100 btn-block pointer rounded-0 btn-success">

          </form>
        </div>
        <!-- register -->


          </div>

          </div>
 </div>
          <!-- Form -->

          </div>

          <!-- </div> -->
          </div>
          </div>
