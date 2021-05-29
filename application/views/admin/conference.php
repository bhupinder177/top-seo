<?php include( 'sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
			<li class="active">Conference</li>
		</ol>
	</section>
	<!--main-container-part-->
	<section class="content">
		<div ng-cloak class="box box-success" ng-app="myApp25" ng-controller="myCtrt25">
			<div class="box-header p-3">
				<h3 class="box-title mb-0">Conference</h3> 
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table id="rankingTable" class="table">
						<thead>
							<tr>
								<th style="min-width: 100px;">Title</th>
								<th style="min-width: 100px;">Person name</th>
								<th  style="min-width: 150px;">location</th>
								<th>About</th>
								<th>View</th>
								<th style="width: 200px;">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-if="conference.length != 0" ng-repeat="(key,x) in conference">
								<td>{{ x.title }}</td>
								<td>{{ x.contactPerson }}</td>
								<td>{{ x.location }}</td>
								<td ng-bind-html="x.about | limitTo:50 | trustAsHtml"></td>
								<td><a class="btn bg-yellow" ng-click="viewConference(x.id)">View</a>
								</td>
								<td class="d-flex mt-3"> <a ng-click="statusmodal(x.id,'1')" class="btn btn-danger mr-1" ng-if="x.status == 0">Inactive</a>
									<a ng-click="statusmodal(x.id,'0')" class="btn bg-green mr-1" ng-if="x.status == 1">Active</a>
									<a ng-click="confirm(x.id)" class="btn btn-danger mr-1">Delete</a>
								</td>
							</tr>
							<tr ng-if="conference.length == 0">
								<td colspan="6" class="text-center">No Record Found.</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div id="pagination"></div>
				<!-- view modal-->
				<div id="viewConference" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">{{ viewc.title }}</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<p> <b>Start Date</b> : {{ viewc.startDate }}</p>
								</div>
								<div class="form-group">
									<p> <b>End Date</b> : {{ viewc.endDate }}</p>
								</div>
								<div class="form-group">
									<p>	<b>Url</b> : {{ viewc.url }}</p>
								</div>
								<div class="form-group">
									<p><b>Location</b> : {{ viewc.location }}</p>
								</div>
								<div class="form-group">
									<p><b>Organizers</b> : {{ viewc.organizers }}</p>
								</div>
								<div class="form-group">
									<p><b>Contact Person</b> : {{ viewc.contactPerson }}</p>
								</div>
								<div class="form-group">
									<p><b>Phone </b> : {{ viewc.phone }}</p>
								</div>
								<div class="form-group">
									<p><b>website </b> : {{ viewc.website }}</p>
								</div>
								<div class="form-group">
									<p><b>About </b> :
										<p ng-bind-html="viewc.about | limitTo:50 | trustAsHtml"></p>
									</p>
								</div>
								<div class="modal-footer"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- view -->
				<!-- content-->
				<!-- Status modal-->
				<div class="modal fade" id="Status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Are you sure you want to Change Status ?</h4>
							</div>
							<div class="modal-footer">	<a ng-click="conferenceStatus()" class="btn btn-danger" id="yes">Yes</a>
								<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Status modal -->
				<!-- Delete modal -->
				<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this record ?</h4>
							</div>
							<div class="modal-footer"> <a ng-click="delete()" class="btn btn-danger" id="yes">Delete</a>
								<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Delete modal -->
			</div>
	</section>
	</div>