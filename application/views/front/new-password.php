
          <div class="how-it-work-sec">
          <div ng-cloak class="container" ng-app="myApp4" ng-controller="myCtrt4">
          <!-- <h1 class="text-center">How it Works</h1> -->
          <!-- <div class="work-circle"> -->
          <div class="col-md-12 col-sm-12 col-xs-12 forms ">

          <!--  Form -->

          <div class="form-grid login-form">

          <h2 class="clearfix lh-1">

          <span class="float-sm-left">Password</span>



          </h2>

          <form id="clientlogin">

          <div class="form-group">

          <label for="loginEmail1">New password</label>

          <input type="password" ng-model="password" class="form-control rounded-0" id="password"  placeholder="Enter New Password" >
          <input type="hidden" ng-model="email" id="email" value="<?php echo $email; ?>" >
          <p ng-show="passSubmit && password == ''" class="text-danger">Password is required.</p>
          </div>


          <button ng-click="updatepassword()" type="button" name="login" value="true" class="mt-4 btn btn-theme mw-100 btn-block pointer rounded-0 btn-success">Submit</button>
          </form>

          </div>

          </div>

          <!-- Form -->

          </div>

          <!-- </div> -->
          </div>
          </div>
