<div class="how-it-work-sec">
    <div ng-cloak class="container" ng-app="myApp4" ng-controller="myCtrt4">
        <!-- <h1 class="text-center">How it Works</h1> -->
        <!-- <div class="work-circle"> -->
        <div class="col-md-12 col-sm-12 col-xs-12 forms ">

            <!--  Form -->
            <div class="login-form">
                <div class="form-grid">
                    <h2 class="clearfix lh-1">
                        <span class="float-sm-left">Forgot Password</span>
                    </h2>
                    <form id="clientlogin">
                        <div class="form-group">

                            <label for="loginEmail1">Email address</label>

                            <input type="text" ng-model="email" onkeyup="angular.element(this).scope().ctrl(this)" class="form-control rounded-0" id="email" placeholder="Your Email address">
                            <p ng-show="passwordSubmit && email == ''" class="text-danger">Email is required.</p>
                            <p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>

                        </div>


                        <button ng-click="submitemail()" type="button" name="login" value="true" class="mt-4 btn btn-theme mw-100 btn-block pointer rounded-0 btn-success">Submit</button>
                        <div class="forgot"><a class="forgot-pass" href="<?php echo base_url(); ?>login">Back to Login</a></div>

                    </form>

                </div>

            </div>
        </div>

        <!-- Form -->

    </div>

    <!-- </div> -->
</div>
