<?php

include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Password</li>
      </ol>
    </section>

<section class="content">
	<div class="container1">
	<!-- get sidebar -->
		<div class="row no-margin user-dashboard-container">
			<div ng-cloak class="col-sm-12 no-padding" ng-app="myApp5" ng-controller="myCtrt5">
				<div id="content">
						<div class="content-box box">
								<h3 class="box-title mb-0 p-3">Change password</h3>
							<div class="change-password-area">
							  <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="sr-only" for="npass">New Password</label>
											<input type="password" ng-model="pass" id="pass" class="form-control rounded-0" placeholder="New Password"  />
											<span ng-cloak ng-show="submitpass && pass == ''" class="form-text text-danger">Password is required.</span>
											<span ng-cloak ng-show="submitpass && pass && pass.length < 6 " class="form-text text-danger">Password length must be 6.</span>

										</div>
										<div class="form-group">
											<label class="sr-only" for="year">Confirm Password</label>
											<input type="password" ng-model="cpass" id="cpass" class="form-control rounded-0" placeholder="Confirm New Password"  />
											<span ng-cloak ng-show="submitpass && cpass == ''" class="form-text text-danger">Confirm password is required.</span>
											<span ng-cloak ng-show="pass && cpass && cpass != pass" class="form-text text-danger">Confirm password is not matched.</span>
										</div>
										<div class="form-group">
											<button ng-click="passupdate()" type="button" class="btn btn-primary rounded-0 pointer">Update Password</button>
										</div>
									</div>
                                    <div class="col-md-6">

                      										<div class="form-group">
                      											<label for="state">Local Currency<span class="red-text">*</span></label>
                      											<select  id="currency" class="form-control" ng-model="currency">
                      												<option value="">Select Currency</option>
                      												<option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                      											</select>
                      											<p ng-cloak ng-show="submitbank && currency == ''" class="text-danger">Please select currency.</p>
                      										</div>
                      										
                      										<div class="form-group">
                      											<button ng-click="bankdetail()" type="button" class="btn btn-primary rounded-0 pointer">Update</button>
                      										</div>

                                    </div>
                                  </div>
								</form>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</section>

</div>
