

<!--main-container-part-->
<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
			<li class="active">Performance Settings</li>
		</ol>
	</section>
<section class="light-bg user-dashboard no-padding">

	<!-- get sidebar -->
		<div class=" no-margin user-dashboard-container">

			<div ng-cloak  ng-app="myApp79" ng-controller="myCtrt79">
				<div id="content">

					     <div class="box rounded bg-white c-pass-sec">
					<div class="content-box no-border-radius">
							<div class="change-password-area">
                                <div class="row">

								<div class="col-md-12">
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
