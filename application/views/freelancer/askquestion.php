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
			<li class="active">Ask A Question</li>
		</ol>
	</section>
	<section class="content portfolio-cont bg-white" ng-app="myApp70" ng-controller="myCtrt70">
		<div class="box-header with-border pb-3">
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
									<div class="col-md-10"></div>
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
							<table id="rankingTable" class="table askquestiontable">
							<thead>
							<tr>
							<th>S. No.</th>
							<th class="text-center">Name</th>
							<!-- <th>Email/Skype/Phone</th> -->
							<!-- <th class="text-center">Website</th> -->
							 <th class="text-center">Question</th>
							 <th class="text-center">Answer</th>
							 <th class="text-center">Status</th>
							<th class="text-right">Action</th>
							</tr>
							</thead>
							<tbody>
							<tr ng-if="alldata.length != 0" ng-repeat="(key,x) in alldata">
							<td>{{ start + key }} </td>
							<td class="text-center">{{ x.name }}</td>
							<!-- <td>
								 <div class="d-flex">
										<a ng-if="x.email" class="btn bg-orange mr-1" title="Email - {{ x.email }}">
										<i class="fa fa-envelope m-0"></i></a>
										<a ng-if="x.skype" class="btn bg-yellow mr-1" title="Skype - {{ x.skype }}">
										<i class="fa fa-skype m-0"></i></a>
										<a ng-if="x.phone" class="btn bg-blue" href="tel:{{ x.phone  }}" title="Phone - {{ x.rep_ph_num }}">
										<i class="fa fa-phone m-0"></i></a>
								 </div>
							</td> -->

							<td class="text-center">{{ x.question | limitTo:200 }}</td>
							<td class="text-center"><span ng-bind-html="x.answer | limitTo:200  |trustAsHtml"></span></td>
              <td>
								<div class="form-group">
								<select onchange="angular.element(this).scope().changeStatus(this)" ng-model="x.status" class="form-control">
									<option data-id="{{ x.askQuestionId }}" value="0">Inactive</option>
									<option data-id="{{ x.askQuestionId }}" value="1">Active</option>
								</select>
							</div>
							</td>
							 <td>
								 <div class="dropdown ac-cstm text-right">
															<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
																 <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
															</a>
															<div class="dropdown-menu fadeIn">
																	 <a class="dropdown-item" ng-click="view(x.askQuestionId)" ><i class="fa fa-eye"></i>View</a>
																	<!-- <a class="dropdown-item" ng-click="edit(x.askQuestionId)" ><i class="fa fa-edit"></i> Edit</a> -->
																	<a class="dropdown-item" ng-click="confirm(x.askQuestionId)"><i class="fa fa-trash"></i>Delete</a>
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

							<!-- edit testimonial -->

							<div id="editaskquestion" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Edit Ask Question</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
											<label for="name" class="m-0">Name*</label>
											<input type="text"  class="form-control form-control-sm" ng-model="name" ng-value="name" id="name" placeholder="Name"  />
											 <p ng-show="submitq && name == ''" class="text-danger">Name is required.</p>
										</div>

										<div class="form-group">
										<label for="name" class="m-0">Phone*</label>
										<input type="text"  class="form-control form-control-sm" ng-model="phone" ng-value="phone" id="name" placeholder="Phone"  />
										 <p ng-show="submitq && phone == ''" class="text-danger">Phone is required.</p>
									</div>

									<div class="form-group">
									<label for="name" class="m-0">Skype*</label>
									<input type="text"  class="form-control form-control-sm" ng-model="skype" ng-value="skype" id="name" placeholder="Skype"  />
									 <p ng-show="submitq && skype == ''" class="text-danger">Skype is required.</p>
								</div>

								<div class="form-group">
								<label for="name" class="m-0">Email*</label>
								<input type="text"  class="form-control form-control-sm" ng-model="email" ng-value="email" id="name" placeholder="Email"  />
								 <p ng-show="submitq && email == ''" class="text-danger">Email is required.</p>
							</div>

										<div class="form-group">
											<label for="position" class="m-0">Website*</label>
											<input type="text" class="form-control form-control-sm rounded-0" ng-model="website" ng-value="website" id="website" placeholder="website"  />
											 <p ng-show="submitq && website == ''" class="text-danger">Website is required.</p>
										</div>

										<div class="form-group">
											<label for="position" class="m-0">Question*</label>
											<input type="text" class="form-control form-control-sm rounded-0" ng-model="question" ng-value="question" id="website" placeholder="Question"  />
											 <p ng-show="submitq && question == ''" class="text-danger">Website is required.</p>
										</div>


										<div class="form-group">
											<label for="position" class="m-0">Answer*</label>
											<textarea type="text" name="answer" class="form-control form-control-sm rounded-0 ckeditor" ng-model="answer" ng-value="answer" id="answer" placeholder="answer"></textarea>
											 <p ng-show="submitq && answer == ''" class="text-danger">Answer is required.</p>
										</div>

										</div>
										<div class="modal-footer">
											<button type="button" ng-click="update()" class="btn btn-success mb-0" >Update</button>
										</div>
									</div>
								</div>
							</div>
							<!-- edit testimonial -->

							<!-- view popup -->

													 <div id="viewaskquestion" class="modal fade" role="dialog">
														 <div class="modal-dialog">
															 <!-- Modal content-->
															 <div class="modal-content">
																 <div class="modal-header">
																	 <button type="button" class="close" data-dismiss="modal">&times;</button>
																	 <h4 class="modal-title">View Query</h4>
																 </div>
																 <div class="modal-body">
																	 <div class="form-group">
																	 <b>Name</b>: {{ viewdata.name }}
																 </div>

																 <div class="form-group">
																 <b>Email</b>: {{ viewdata.email }}
															 </div>

															 <div class="form-group">
															 <b>Phone</b>: {{ viewdata.phone }}
														   </div>

														 <div class="form-group">
			                         <b>Skype Id</b>: {{ viewdata.skype }}
													 </div>

																 <div class="form-group">
																	 <b>Website</b>: {{ viewdata.website }}
																 </div>

																 <div class="form-group">
																	 <b>Query</b>: {{ viewdata.question }}
																 </div>
																 <div class="form-group">
																	 <b>Date</b>: <span>{{ viewdata.questionSubmittedDate | date }}</span> at <span>{{ viewdata.questionSubmittedDate | time }}</span>
																 </div>


																 <div class="form-group">
																	 <label for="position" class="m-0"><b>Answer <span class="red-text">*</span></b></label>
																	 <textarea type="text" name="answer" class="form-control form-control-sm rounded-0 ckeditor" ng-model="answer" ng-value="answer" id="answer" placeholder="Please enter answer"></textarea>
																		<p ng-show="submitqq && answer == ''" class="text-danger">Answer is required.</p>
																 </div>
																 <div ng-if="viewdata.answerDate" class="form-group">
																	 <b>Date</b>: <span>{{ viewdata.answerDate | date }}</span> at <span>{{ viewdata.answerDate | time }}</span>
																 </div>

																 </div>
																 <div class="modal-footer">
																	 <button type="button" ng-click="update()" class="btn btn-success"  >Send</button>
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
