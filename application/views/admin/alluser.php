
<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
        Dashboard
      </h1>
		<ol class="breadcrumb">
			<li>
				<a href="#">
					<i class="fa fa-dashboard"></i> Home
				</a> >
			</li>
			<li class="active">Users</li>
		</ol>
	</section>
	<!--main-container-part-->
	<section class="content">
		<div id="content">
			<div ng-cloak class="box box-success" ng-app="myApp3" ng-controller="myCtrt3">
				<div class="box-header with-border p-3">
					<h3 class="box-title">Job Offer</h3>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table ng-if="jobs.length != 0" id="rankingTable" class="table  table-condensed">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Title</th>
									<th>Attachment</th>
									<th>Description</th>
									<th>Amount</th>
									<th>Detail</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-if="jobs.length != 0" ng-repeat="(key,x) in jobs" ng-init="jobs = key">
									<td>#</td>
									<td>{{ x.jobTitle }}</td>
									<td>
										<a target="_blank" href="
											<?php echo base_url(); ?>assets/jobAttachment/{{ x.jobAttchment}}">
											<i class="fa fa-download" aria-hidden="true"></i>
										</a>
									</td>
									<td>{{ x.jobDescription | limitTo:100  }}</td>
									<td>{{  x.jobAmount  }} </td>
									<td>
										<a class="btn btn-primary" href="
											<?php echo base_url(); ?>freelancer/job/{{ x.jobId }}">Detail
										</a>
									</td>
									<!-- <td ng-if="x.offStatus == 0"><a class="btn btn-default">Pending</a></td> -->
									<td>
										<a ng-if="x.offStatus == 0"  ng-click="offerStatus(x.offId,x.jobId,user,x.offFrom,1)"  data-status="1" data-id="{{ x.offId }}"  class="btn btn-success">Accept</a>
									</td>
									<td>
										<a ng-if="x.offStatus == 0" ng-click="offerStatus(x.offId,x.jobId,user,x.offFrom,2)" data-status="2" data-id="{{ x.offId }}"  class="btn btn-warning">Reject</a>
									</td>
									<!-- data-toggle="modal" data-target="#accept" -->
									<!-- data-toggle="modal" data-target="#reject" -->
								</tr>
								<tr ng-if="jobs.length == 0">
									<td colspan="2">No Record Found.</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div ng-if="jobs.length != 0" id="pagination"></div>
					<!-- modal accept -->
					<div id="accept" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title jtitle"></h4>
								</div>
								<div class="modal-body">
									<div>
										<input type="hidden" name="jobId" value="" class="jobId" >
											<input type="hidden" name="offerId" value="" class="offerId" >
												<input type="hidden" name="userId" value="" class="userId" >
													<input type="hidden" name="from" value="" class="from" >
														<input type="hidden" name="status" value="" class="status" >
															<label for="mobile">Message*</label>
															<textarea type="text"  ng-model="message" class="message" class="form-control" id="message" name="message"></textarea>
															<p ng-show="msgSubmit && message == ''" class="text-danger">message is required.</p>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" ng-click="offermessage()" class="btn btn-success">submit</button>
													</div>
												</div>
											</div>
										</div>
										<!-- modal accept -->
										<!-- content-->
									</div>
								</div>
							</div>
						</section>
					</div>
