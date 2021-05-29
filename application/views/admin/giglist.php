<?php require('sidebar.php'); ?>
<!--main-container-part-->
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<ol class="breadcrumb">
			<li>
				<a href="#">
					<i class="fa fa-dashboard"></i> Home
				</a> >
			</li>
			<li class="active">Gig</li>
		</ol>
	</section>
	<section class="content portfolio-cont bg-white">



		<!-- get sidebar -->
			<div id="content">
				<!-- content -->
				<div ng-cloak class="box box-success" ng-app="myApp47" ng-controller="myCtrt47">
					<div class="box-body">


							<!-- preferred location -->
							<div id="askquestions" class="">

							<div class="table-responsive">
							<table id="rankingTable" class="table">
							<thead>
							<tr>
							<th>S.NO</th>
							<th class="text-center">Title</th>
							<!-- <th>Description</th> -->
							<th class="text-center">Services</th>
							<th class="text-center">Industry</th>
							<th class="text-right">Action</th>
							</tr>
							</thead>
							<tbody>
							<tr ng-if="alldata.length != 0" ng-repeat="(key,x) in alldata">
							<td>{{ start + key }} </td>
							<td class="text-center">{{ x.title }}</td>
							<!-- <td>{{ x.description }}</td> -->
							<td class="text-center">{{ x.services }}</td>
							<td class="text-center">{{ x.industry }}</td>
							 <td class="text-center">

							<a  title="View"  ng-click="view(x.gigId)" class="btn bg-blue mr-2" ><i class="fa fa-eye"></i></a>

							</td>
							</tr>
							<tr ng-if="alldata.length == 0"><td colspan="3" class="text-center">No Record Found.</td></tr>
							</tbody>
							</table>

							</div>
							<div class="pagination"></div>





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
													 <h4>Basic Plan </h4>
																 <div ng-repeat="(key,x) in viewdata.basic" class="form-group">
																	 <b>Task {{ key + 1 }}</b>: {{ x.task }}
																 </div>
																 <div class="form-group">
																	 <b>Price</b>: {{ viewdata.basicPrice }}
																 </div>
																 <div class="form-group">
																	 <b>Duration</b>: {{ viewdata.basicDuration }}
																 </div>
																 <div class="form-group">
																	 <b>Additional Information</b>: {{ viewdata.basicDescription }}
																 </div>
															 <div class="form-group">
																	 <b>Explain</b>: {{ viewdata.basicExplain }}
																 </div>
																 <hr>


													<h4>Standard Plan </h4>
													<div ng-repeat="(key,x) in viewdata.standard" class="form-group">
														<b>Task {{ key + 1 }}</b>: {{ x.task }}
													</div>
													<div class="form-group">
														<b>Price</b>: {{ viewdata.standardPrice }}
													</div>
													<div class="form-group">
														<b>Duration</b>: {{ viewdata.standardDuration }}
													</div>
													<div class="form-group">
														<b>Additional Information</b>: {{ viewdata.standardDescription }}
													</div>
												<div class="form-group">
														<b>Explain</b>: {{ viewdata.standardExplain }}
													</div>

												 <h4>Premium Plan </h4>
												 <div ng-repeat="(key,x) in viewdata.premium" class="form-group">
													 <b>Task {{ key + 1 }}</b>: {{ x.task }}
												 </div>
												 <div class="form-group">
													 <b>Price</b>: {{ viewdata.premiumPrice }}
												 </div>
												 <div class="form-group">
													 <b>Duration</b>: {{ viewdata.premiumDuration }}
												 </div>
												 <div class="form-group">
													 <b>Additional Information</b>: {{ viewdata.premiumDescription }}
												 </div>
											 <div class="form-group">
													 <b>Explain</b>: {{ viewdata.premiumExplain }}
												 </div>

												 <h4>Task </h4>
												 <div ng-repeat="(key,x) in viewdata.task" >
													 <div class="form-group">
													 <b>Task {{ key + 1}}</b>: {{ x.task }}
												 </div>
													 <div class="form-group">
													 <b>Duration </b>: {{ x.duration }}
												 </div>
													 <div class="form-group">
													 <b>Price </b>: {{ x.price }}
												 </div>
												 </div>

																 </div>
																 <div class="modal-footer">
																	 <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
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
