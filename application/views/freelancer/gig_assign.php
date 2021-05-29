<?php require('sidebar.php'); ?>
<!--main-container-part-->
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
					<i class="fa fa-dashboard"></i> Home
				</a> >
			</li>
			<li class="active">Assign Gigs</li>
		</ol>
	</section>
	<section class="content portfolio-cont bg-white" ng-app="myApp84" ng-controller="myCtrt84">

        <div class="row">
					<div class="col-md-2">
                         <div class="form-group mb-0">

                        <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                        </select>
                      </div>
                      </div>

	 </div>
		<!-- get sidebar -->
			<div id="content">
				<!-- content -->
				<div ng-cloak class="box box-success" >
					<div class="box-body">


							<!-- preferred location -->
							<div id="askquestions" class="">

							<div class="table-responsive">
							<table id="rankingTable" class="table">
							<thead>
							<tr>
							<th>S. No.</th>
							<th class="text-center">Title</th>
							<!-- <th>Description</th> -->
							<th class="text-center">Task</th>
							<th class="text-right">Action</th>
							</tr>
							</thead>
							<tbody>
							<tr ng-if="alldata.length != 0" ng-repeat="(key,x) in alldata">
							<td>{{ start + key }} </td>
							<td class="text-center">{{ x.title }}</td>
							<td class="text-center">{{ x.name }}</td>
							 <td class="text-center">

								 <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a target="_blank"  class="dropdown-item" href="<?php echo base_url(); ?>freelancer/gig-assign-detail/{{ x.user_gig_buyId }}"><i class="fa fa-eye"></i>Assignment</a>
                               </div>
                              </div>

							</td>
							</tr>
							<tr ng-if="alldata.length == 0"><td colspan="3" class="text-center">No Record Found.</td></tr>
							</tbody>
							</table>

							</div>
							<div class="pagination"></div>

							<!-- delete confirm modal -->
							<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																		<h4 class="modal-title">Delete</h4>
																</div>
																<div class="modal-body">
																		<p>Are you sure you want to delete this ?</p>
																</div>
																<div class="modal-footer">
																	<button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>

																		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																</div>
														</div>
												</div>
                        </div>
							<!-- delete confirm modal -->



							<!-- view popup -->

													 <div id="view" class="modal fade" role="dialog">
														 <div class="modal-dialog">
															 <!-- Modal content-->
															 <div class="modal-content">
																 <div class="modal-header">
																	 <button type="button" class="close" data-dismiss="modal">&times;</button>
																	 <h4 class="modal-title">View Gig</h4>
																 </div>
																 <div class="modal-body">
																	 <div class="form-group">
																	 <b>Title</b>: {{ viewdata.title }}
																 </div>

																 <div class="form-group">
																 <b>Services</b>: {{ viewdata.services }}
															 </div>

															 <div class="form-group">
															 <b>Industry</b>: {{ viewdata.industry }}
														   </div>

														 <div class="form-group">
			                         <b>Description</b>: <p ng-bind-html="viewdata.description | trustAsHtml"></p>
													 </div>
													 <hr>
													       <div ng-repeat="(key,x) in viewdata.plan">
																	 <div class="form-group">
																		 <b>Plan Name</b>: <span ng-if="x.plan == 1">Basic Plan</span>
																		                   <span ng-if="x.plan == 2">Standard Plan</span>
																		                    <span ng-if="x.plan == 3">Premium Plan</span>
																	 </div>
																 <div ng-repeat="(key1,x1) in x.task" class="form-group">
																	 <b>Task {{ key1 + 1 }}</b>: {{ x1.name }}
																 </div>
																 <div class="form-group">
																		<b>Explanation</b>: {{ x.description }}
																	</div>
																 <div class="form-group">
																	 <b>Price</b>: {{ viewdata.code }} {{ viewdata.symbol }} {{ x.amount }}
																 </div>
																 <div class="form-group">
																	 <b>Duration</b>: {{ x.hours }} Days
																 </div>
																 <hr>
															 </div>

																 </div>
																 <div class="modal-footer">
																	 <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
																 </div>
															 </div>
														 </div>
													 </div>
							<!-- view popup -->



						</div>
						<!-- content tab -->
						</div>
						<div>
							<!-- ------->

				</div>

		</section>
	</div>
