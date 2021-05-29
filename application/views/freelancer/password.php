

<!--main-container-part-->
<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
			<li class="active">Basic Information</li>
		</ol>
	</section>
<section class="light-bg user-dashboard no-padding">

	<!-- get sidebar -->
		<div class=" no-margin user-dashboard-container">

			<div ng-cloak  ng-app="myApp15" ng-controller="myCtrt15">
				<div id="content">

					     <div class="box rounded bg-white c-pass-sec">
					<div class="content-box no-border-radius">
							<div class="change-password-area">
                                <div class="row">
								<div class="col-md-6">

								<form method="post" action="">
									<div class="radio-bx">
                  <input type="radio" ng-model="type" name="type" value="1" ng-checked="type == 1">Change Password
                  <input type="radio" ng-model="type" name="type" value="2" ng-checked="type == 2">Change Email
                 </div>
									<div ng-if="type == 1" >
										<div class="form-group">
											<label class="sr-only" for="npass">Current Password</label>
											<input type="password" ng-model="currentpass" id="currentpass" class="form-control rounded-0" placeholder="Current password"  />
											<span ng-cloak ng-show="submitpass && currentpass == ''" class="form-text text-danger">Current password is required.</span>

										</div>
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

									<div ng-if="type == 2" >
										<div class="form-group">
											<label class="sr-only" for="year">Current Email</label>
											<input onkeyup="angular.element(this).scope().ctrl1(this)" type="text" ng-model="oemail" id="oemail" class="form-control rounded-0" placeholder="Current email"  />
											<span ng-cloak ng-show="submitpass1 && oemail == ''" class="form-text text-danger">Current email is required.</span>
											<p ng-cloak ng-show="oemail != '' && emailvalide1" class="text-danger">Please enter valid email address.</p>
									 </div>

										<div class="form-group">
											<label class="sr-only" for="npass">New Email</label>
											<input onkeyup="angular.element(this).scope().ctrl(this)" type="text" ng-model="email" id="email" class="form-control rounded-0" placeholder="New email"  />
											<span ng-cloak ng-show="submitpass1 && email == ''" class="form-text text-danger">New email is required.</span>
											<p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>
                    </div>
										<div class="form-group">
											<label class="sr-only" for="npass">Confirm Email</label>
											<input onkeyup="angular.element(this).scope().ctrl2(this)" type="text" ng-model="cemail" id="cemail" class="form-control rounded-0" placeholder="Confirm Email"  />
											<span ng-cloak ng-show="submitpass1 && cemail == ''" class="form-text text-danger">Confirm email is required.</span>
											<p ng-cloak ng-show="cemail != '' && emailvalide2" class="text-danger">Please enter valid email address.</p>
											<p ng-cloak ng-show="!emailvalide2 && email != '' && cemail != '' && cemail != email" class="text-danger">Confirm email is not matched.</p>
                    </div>


										<div class="form-group">
											<button ng-click="emailupdate()" type="button" class="btn btn-primary rounded-0 pointer">Update Email</button>
										</div>
									</div>
                                    </form>
                                    </div>
             <?php

						 if($this->session->userdata['clientloggedin']['parent'] == 0)
						 {
						 ?>
								<div class="col-md-6">
                    <form>

										<div class="form-group">
										  <label>Bank Detail</label>
											<textarea  type="text" ng-model="account" id="account" class="form-control rounded-0" placeholder="Please enter your bank details"></textarea>

										</div>

										<div class="form-group">
											<label>Paypal Email</label>
											<input type="text" onkeyup="angular.element(this).scope().paypalcheck(this)" ng-model="paypal" id="paypal" class="form-control rounded-0" placeholder="Please enter paypal email"  />
										 <span ng-cloak ng-show="paypal != '' && paypalerror" class="form-text text-danger">Please enter valid email id.</span>
										</div>
										<!-- <div class="form-group">
											<label>Invoice Prefix</label>
											<input type="text" ng-model="invoice" id="invoice" class="form-control rounded-0" placeholder="Please enter invoice"  />
											<span ng-cloak ng-show="submitbank && invoice == ''" class="form-text errorMsg">Please enter invoice.</span>

										</div> -->
										<div class="form-group">
											<label for="state">Local Currency<span class="red-text">*</span></label>
											<select  id="currency" class="form-control" ng-model="currency">
												<option value="">Select Currency</option>
												<option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
											</select>
											<p ng-cloak ng-show="submitbank && currency == ''" class="text-danger">Please select currency.</p>
										</div>
										<div class="form-group">
											<label for="state">Time Zone<span class="red-text">*</span></label>
											<select onchange="angular.element(this).scope().changezone(this)" id="currency" class="form-control" ng-model="countryzone">
												<option value="">Select timezone</option>
												<option ng-if="allzones.length != 0" ng-repeat="(key,x) in allzones" data-id="{{ x.diff_from_GMT }}"   value="{{ x.zone }}">{{ x.zone }} {{ x.diff_from_GMT }} </option>
											</select>
											<p ng-cloak ng-show="submitbank && zone == ''" class="text-danger">Please select timezone.</p>
										</div>
										<div class="form-group">
											<label>Company Short Code</label>
											<input type="text"  ng-model="companyCode" id="companyCode" class="form-control rounded-0" placeholder="Please enter company code"  />
										 <span ng-cloak ng-show="submitbank && companyCode == ''" class="form-text text-danger">Please enter company code.</span>
										</div>
										<div class="form-group">
											<button ng-click="bankdetail()" type="button" class="btn btn-primary rounded-0 pointer">Update</button>
										</div>
									</form>
									</div>
                <?php } ?>

          <!-- performance setting -->
					<?php

					// if($this->session->userdata['clientloggedin']['access'] == 5)
					// {
					?>
								<!-- <div class="col-md-6">
									<h4>Performance Setting</h4>
									<div class="box-body table-responsive">
											<table id="rankingTable" class="table  table-bordered notification">
													<thead>
															<tr>
																	<th>S. NO</th>
																	<th>Employee Name</th>
																	<th>Duration</th>
															</tr>
													</thead>
													<tbody>
														<tr ng-if="allemployee.length != 0" ng-repeat="(key,x) in allemployee">
															<td>{{ key + 1 }}</td>
															<td>{{ x.name }}</td>
															<td>
																<div class="form-group">
															<select  onchange="angular.element(this).scope().performanceUpdate(this)" ng-model="x.duration" class="form-control">
																<option  value="">Select Duration</option>
																<option data-id="{{ x.u_id }}" value="1">1 Month</option>
																<option data-id="{{ x.u_id }}" value="2">3 Month</option>
																<option data-id="{{ x.u_id }}" value="3">6 Month</option>
																<option data-id="{{ x.u_id }}" value="4">12 Month</option>
															</select>
														</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
								</div> -->
								<!-- performance setting -->
							<?php //} ?>




              </div>
							</div>

							</div>
						</div>

                        </div>
				</div>
			</div>
    </section>
		</div>
