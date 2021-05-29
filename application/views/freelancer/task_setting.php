

<!--main-container-part-->
<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
			<li class="active">Task Settings</li>
		</ol>
	</section>
<section class="light-bg user-dashboard no-padding">

	<!-- get sidebar -->
		<div class=" no-margin user-dashboard-container tasksetting">

			<div ng-cloak  ng-app="myApp80" ng-controller="myCtrt80">
				<div id="content">

					     <div class="box rounded bg-white c-pass-sec">
					<div class="content-box no-border-radius">
							<div class="change-password-area">
                                <div class="row">
								<div class="col-md-6">
                  <div class="form">
                      <label>Task Inactivity pop up time</label>
                   <div class="form-group row">
                       <div class="col-md-6">
												 <label><b>Min(in minutes)</b></label>
                     <input numbers-only="numbers-only" placeholder="Please enter start time" ng-model="taskinactivitystart" ng-value="taskinactivitystart" type="text" class="form-control hrs numberonly">
                     	<span ng-cloak ng-show="submit && taskinactivitystart == ''" class="form-text text-danger">This is required.</span>
                       </div>
                       <div class="col-md-6">
												 <label><b>Max(in minutes)</b></label>

                     <input numbers-only="numbers-only"  placeholder="Please enter end time" ng-model="taskinactivityend" ng-value="taskinactivityend" type="text" class="form-control hrs numberonly">
                     <span ng-cloak ng-show="submit && taskinactivityend == ''" class="form-text text-danger">This is required.</span>
                     <span ng-cloak ng-show="submit && taskinactivityend != '' && errornumber" class="form-text text-danger">Please enter correct end time.</span>
                   </div>
                   </div>
                 </div>
										<div class="form-group">
											<label>Inactivity pop up duration</label>
											<input type="text" ng-model="questiontime" ng-value="questiontime" id="currentpass" class="form-control rounded-0 numberonly" placeholder="Please enter question timeout duration"  />
											<span ng-cloak ng-show="submit && questiontime == ''" class="form-text text-danger">This is required.</span>

										</div>

										<div class="form-group">
											<label  for="year">Allowed Grace Time (when employee inactivity found)</label>
											<input type="text" ng-model="allowedgrace" id="cpass" class="form-control rounded-0 numberonly" placeholder="Please enter allowed grace time"  />
											<span ng-cloak ng-show="submit && allowedgrace == ''" class="form-text text-danger">This is required.</span>
											<span ng-cloak ng-show="submit && allowedgrace != '' && errorgrace" class="form-text text-danger">Grace time can't be more than Task Inactivity max time.</span>

										</div>
										<div class="form-group">
											<button ng-click="Update()" type="button" class="btn btn-primary rounded-0 pointer">Update</button>
										</div>
									</div>

								</div>

              </div>
							</div>

							</div>
						</div>

              </div>
				</div>
			</div>
    </section>
		</div>
