<?php include( 'sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
			<li class="active">Industry</li>
		</ol>
	</section>
	<!--main-container-part-->
	<section ng-cloak class="content" ng-app="myApp5" ng-controller="myCtrt5">
		<div class="row">
			<div class="col-xl-8 col-md-12">
				<div class="box-body box">
					<div class="box-header p-3 form-group mb-0">
						<h3 class="box-title">All industries</h3>
						<div class="row">
							<div class="col-md-6">
								<input ng-model="searchtext" ng-model="searchtext" type="text" name="search" ng-keyup="search($event)" placeholder="Search" class="form-control">
							</div>
							<div class="col-md-6"></div>
						</div>
					</div>
					<div class="table-responsive">
						<table id="rankingTable" class="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-if="industries.length != 0" ng-repeat="(key,x) in industries" ng-init="industries = key">
									<td>{{ x.name }}</td>
									<td ng-if="x.status == 1">Active</td>
									<td ng-if="x.status == 0">inactive</td>
									<td class="d-flex"> <a title="Service linked" class="btn bg-blue mr-1" ng-click="getlinkedservice(x.id)"><i class="fa fa-list"></i></a>
										<a title="Edit industry" class="btn bg-yellow mr-1" ng-click="editindustry(x.id)"><i class="fa fa-edit"></i></a>
										<a ng-click="deletemodal(key,x.id)" class="btn btn-default" title="Delete Industries"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<tr ng-if="industries.length == 0">
									<td colspan="3" class="text-center">No Record Found.</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div id="pagination"></div>
					<!-- edit modal -->
					<div id="industryLinked" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Industry and Service Linked</h4>
								</div>
								<div class="cstm-indu p-3">
									<h6>Linked Services</h6>
									<div id="tags"> <a ng-repeat="(key,x) in linkeddata" ng-init="linkeddata = key"> {{ x.name }}<span hand ng-click="deleteservice(key,x.id,x.name)" > &times; </span></a>
									</div>
								</div>
								<hr>
								<div class="modal-body">
									<p class="service" ng-repeat="(key,x) in services">
										<input type="checkbox" ng-click="linkedto(key,x.id,x.name)" ng-model="selectService">{{ x.name }}</p>
								</div>
								<div class="modal-footer">
									<button type="button" ng-click="savelinkedIndustry()" class="btn btn-success">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- add industry -->
			<div ng-if="update == 0" class="col-xl-4 col-md-12">
				<div class="box-success box">
					<div class="box-header with-border p-3">
						<h3 class="box-title mb-0">Add Industries</h3>
					</div>
					<form method="post" class="form-horizontal">
						<div class="box-body">
							<div class="form-group">
								<div class="col-sm-12">
									<label>Name <span class="red-text">*</span>
									</label>
									<input type="text" ng-model="name" id="name" class="form-control " placeholder=" ">
									<p ng-show="submitind && name == ''" class="text-danger">Industry is required.</p>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<label>Status <span class="red-text">*</span>
									</label>
									<select type="text" ng-model="status" id="status" class="form-control">
										<option value="">Select status</option>
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
									<p ng-show="submitind && status == ''" class="text-danger">Status is required.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="box-footer pb-3">
								<button type="button" ng-click="industriesSave()" name="add_P_area" value="true" class="btn btn-primary submit">Add</button>
							</div>
						</div>
					</form>
				</div>
			</div>
            <!-- edit industry -->
		<div ng-if="update == 1" class="col-xl-4 col-md-12">
			<div class="box box-success p-3">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Industries</h3>
				</div>
				<form method="post" class="form-horizontal">
					<div class="box-body">
						<div class="form-group"> 
								<label>Name <span class="red-text">*</span>
								</label>
								<input type="text" ng-model="editname" id="editname" class="form-control " placeholder=" ">
								<p ng-show="submitind && editname == ''" class="text-danger">Industry is required.</p> 
						</div>
						<div class="form-group"> 
								<label>Status <span class="red-text">*</span>
								</label>
								<select type="text" ng-model="editstatus" id="editstatus" class="form-control">
									<option value="">Select status</option>
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
								<p ng-show="submitind && editstatus == ''" class="text-danger">Status is required.</p>
							</div> 
					</div>
					<div class="box-footer mb-2">
						<button type="button" ng-click="industriesUpdate()" name="add_P_area" value="true" class="btn btn-primary submit">Add</button>
					</div>
				</form>
			</div>
		</div>
		<!-- edit industry -->
		</div>
		<!-- add industry -->
		
		<!-- delete modal-->
		<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Are you sure you want to delete it?</h4> 
					</div>
					<div class="modal-footer">	<a ng-click="deleteIndustries()" class="btn btn-danger" id="yes">Yes</a> 
						<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
					</div>
				</div>
			</div>
		</div>
		<!-- delete modal -->
	</section>
</div>