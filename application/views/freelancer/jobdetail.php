
<?php require('sidebar.php'); ?>

<!--main-container-part-->
<div id="wrapper" class="content-wrapper">

	<section class="content-header">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
			<li class="active">Job Details</li>
		</ol>
	</section>

	<section  class="container-fluid light-bg user-dashboard no-padding">

		<div class="container1">

			<!-- get sidebar -->

			<div class="row no-margin user-dashboard-container">



				<div class="col-12 no-padding">

					<div id="content">

						<div class="container-fluid">

							<div class="content-box no-border-radius">

								<div class="row">
									<!-- content -->

									<div class="col-md-12 no-padding-right">

										<div ng-cloak class="box box-success" ng-app="myApp5" ng-controller="myCtrt5">



											<div ng-if="job.length != 0" class="box-body job-offer-full">
												<div class="row">
                        <div class="col-md-6">
												<h3>{{ job.jobTitle }} </h3>
												<p>
													<a ng-if="job.offStatus == 0"  ng-click="offerStatus1(job.offId,job.jobId,users,job.offFrom,1,job.offAmount,job.proposalBid,job.newProposedOffer)"  data-status="1" data-id="{{ job.offId }}"  class="btn btn-success">Accept</a>
													<a ng-if="job.offStatus == 0" ng-click="offerStatus1(job.offId,job.jobId,users,job.offFrom,2,job.offAmount,job.proposalBid,job.newProposedOffer)" data-status="2" data-id="{{ job.offId }}"  class="btn btn-danger">Reject</a>
													<!-- <a  data-toggle="modal" data-target="#message"  class="btn btn-success">Message</a> -->
													<!-- <a  data-toggle="modal" data-target="#milestone"  class="btn btn-success">Create Milestone</a> -->
												</p>

												<p ng-bind-html="job.jobDescription|trustAsHtml">{{ job.jobDescription   }}</p>
												<p ng-if="job.jobAttchment && job.jobAttchment != ''">Attachment :<a target="_blank" href="<?php echo base_url(); ?>assets/jobAttachment/{{ job.jobAttchment}}">
													<i class="fa fa-download" aria-hidden="true"></i></a>
												</p>
													<b>Proposed offer :- {{ job.currency }} {{ job.currencysymbol }} {{  job.proposalBid  }} </b><br>
													<b>Received offer :- {{ job.currency }} {{ job.currencysymbol }} {{  job.offAmount  }} </b><br>
													<b ng-if="job.newProposedOffer != 0">New Proposed offer :- {{ job.currency }} {{ job.currencysymbol }} {{  job.newProposedOffer  }} </b><br>
												</div>

												<!-- chatting -->
												<!-- chat window -->
												<div  class="col-md-6">
														 <div class="activ-propsalchat">
															 <h4>Chat</h4>


													<div  scroll-glue-bottom="glued" class="activitytask1 mb-3">
														<div  ng-repeat="(key,x) in activitys"  class="Activity1">
															 <div class="taskmessage1">

															<div><span class="pro-clientname">{{ x.name  }}</span> <span class=" pro-clientname task-time ">: {{ x.logDate | date  }} {{ x.logDate | time }}</span> </div>
															<div>{{ x.logText }}</div>
														</div>
														</div>
													</div>
													<div class="form-group">
													<textarea placeholder="Please enter message" ng-enter="submitMessage(job.proposalId)" class="message form-control"></textarea>
													</div>
													<div class="form-group clearfix">
													<input type="button" ng-click="submitMessage(job.proposalId)" class="pull-right btn btn-success" name="send" value="Send">
												 </div>
												</div>
															</div>
												<!-- activity -->
												<!-- chatting -->
											</div>

                         <a ng-if="job.proposalBid != job.offAmount" ng-click="milestoneshow()" class="btn btn-success">Ajdustments</a>
													<div ng-if="job.milestone.length != 0" class="box-body">
														<div class="table-responsive">
															<table class="table table-bordered">
																<thead>
																	<tr>
																		<th>Milestone</th>
																		<th>Task Name</th>
																		<th>Hours</th>
																		<th>Hourly Price</th>
																		<th>Amount</th>
																	</tr>
																</thead>
																<tbody ng-repeat="(key,x) in job['milestone']" >
																	<tr  ng-repeat="(key2,x2) in x.task">
																		<td><span ng-if="$index == 0">{{ x.title }}</span></td>
																		<td>{{ x2.task  }}</td>
																		<td>{{ x2.hours  }} </td>
																		<td >{{ x2.hourlyPrice }}  </td>
																		<td >{{ x2.amount }}  </td>
																	</tr>
																</tbody>
															</table>

														</div>
													</div>

													<!-- edit milesone -->
													<!-- offer modal -->
												 <div id="hire" class="modal fade" role="dialog">
													 <div class="modal-dialog">
														 <div class="modal-content">
															 <div class="modal-header">
																 <button type="button" class="close" data-dismiss="modal">&times;</button>
																 <h4 ng-if="milestones.length != 0" class="modal-title">Milestone</h4>
																 <h4 ng-if="milestones.length == 0" class="modal-title">Amount Adjustment</h4>
															 </div>
															 <div class="modal-body">

																 <div ng-if="milestones.length == 0"  class="col-md-12">
		 														 <div class="form-group">
		 															 <label>Total Budget</label>
		 															 <input  type="text"   id="" ng-model="newoffer" ng-value="newoffer" numbers-only="numbers-only" placeholder="Please enter amount" name="budget" class="form-control totalamount" >
		 														 </div>
		 													 </div>
																 <div ng-if="milestones.length != 0"  class="col-md-12">
		 														 <div class="form-group">
		 															 <label>Total Budget</label>
		 															 <input readonly type="text"   id="" ng-model="newoffer" ng-value="newoffer" numbers-only="numbers-only" placeholder="Please enter amount" name="budget" class="form-control totalamount" >
		 														 </div>
		 													 </div>

															 <div ng-if="milestones.length != 0" class="row">
																<div class="col-md-12" style="margin: 10px 0">
																	<a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="fa fa-plus-square"></i></a>
																</div>
																	<br>
															</div>

													<div  class="milestone-main" ng-repeat="(key,x) in milestones" ng-init="proposal = key">
													 <a ng-if="key != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletemilestone(key)" class="fa fa-trash-alt"></i></a>

														<div class="row">
															 <div class="col-sm-6">
														 <div class="form-group">
															 <label>Milestone Title<span class="red-text">*</span></label>
															 <input  type="text"  id="amount"  ng-value="x.title" ng-model="x.title" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
															 <p ng-show="offer && x.title == ''" class="text-danger ng-hide">Milestone Title is required.</p>

														 </div>
													 </div>
														<div class="col-sm-6">
														 <div class="form-group">
															 <label>Milestone Amount</label>
															 <input  type="text" readonly="" ng-value="x.price" ng-model="x.price" id="amount" numbers-only="numbers-only" placeholder="Please enter budget" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
														 </div>
													 </div>
													 <div class="col-sm-12">
													 <a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletemilestone(key)" class="fa fa-trash-alt"></i></a>
													</div>
													 </div>
													 <!-- =====task -->
													 <div class="row" ng-repeat="(key2,x2) in x.task" >
												 <div class="col-sm-6">
											 <div class="form-group">
												 <label>Task<span class="red-text">*</span></label>
												 <input  type="text"  id="amount"  ng-value="x2.task" ng-model="x2.task" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
												 <p ng-show="offer && x2.task == ''" class="text-danger ng-hide">Task is required.</p>

											 </div>
										 </div>
										 <div class="col-sm-6">
											<div class="form-group">
												<label>Hours <span class="red-text">*</span></label>
												<input  type="text" ng-keyup="totalmilestone()" numbers-only="numbers-only" ng-value="x2.hours" ng-model="x2.hours" id="amount" numbers-only="numbers-only" placeholder="Please enter hours" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
												<p ng-show="offer && x2.hours == ''" class="text-danger ng-hide">hours is required.</p>

											</div>
											 </div>

											 <div class="col-sm-6">
												<div class="form-group">
													<label>Hourly price<span class="red-text">*</span></label>
													<input  type="text" ng-keyup="totalmilestone()"  ng-value="x2.hourlyPrice" ng-model="x2.hourlyPrice" id="amount" numbers-only="numbers-only" placeholder="Please enter hourly price" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
													<p ng-show="offer && x2.hourlyPrice == ''" class="text-danger ng-hide">Hourly Price is required.</p>

												</div>
												 </div>
											<div class="col-sm-6">
											 <div class="form-group">
												 <label>Task amount <span class="red-text">*</span></label>
												 <input  type="text" ng-keyup="totalmilestone()"  ng-value="x2.amount" ng-model="x2.amount" id="amount" numbers-only="numbers-only" placeholder="Please enter amount" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
												 <p ng-show="offer && x2.amount == ''" class="text-danger ng-hide">Amount is required.</p>

											 </div>
													</div>
													 <div class="col-sm-12">
													 <a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fa fa-trash-alt"></i></a>
													</div>
										 </div>
										 <div class="col-sm-12">
											 <a hand id="plusicon">Sub Tasks  <i ng-click="taskadd(key)" class="fa fa-plus-square"></i> </a>
										 </div>
								</div>
													 <!-- task -->
															 </div>
															 <div class="modal-footer">
																 <button type="button" ng-click="submitMilestone()" class="btn btn-success">Submit</button>
															 </div>
														 </div>

													 </div>
												 </div>
												 <!-- ====offer -->
													<!-- edit milesone -->


													<!-- message -->
													<div id="message" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Message</h4>
																</div>
																<div class="modal-body">
																	<div class="col-md-12 " >
																		<div class="form-group">
																			<label> Message </label>
																			<textarea id ="messagetext" class="form-control " placeholder="Please enter Message" ng-value="messagetext" ng-model="messagetext"></textarea>
																			<p ng-show="msgSubmit && messagetext == ''" class="text-danger ng-hide">Message is required.</p>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button ng-click="messageSend()" type="button" class="btn btn-success">Submit</button>
																</div>
															</div>

														</div>
													</div>
													<!-- message -->

													<!-- milestone -->
													<div id="milestone" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Milestones</h4>
																</div>
																<div class="modal-body">

																	<!-- {{ milestone }} -->
																	<div ng-if="milestones.length != 0" class="row">
																		<div class="col-md-12" style="margin: 10px 0">
																			<a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="far fa-plus-square"></i></a>
																		</div>
																		<br>
																	</div>

																	<div  class="milestone-main" ng-repeat="(key,x) in milestones" ng-init="proposal = key">
																		<a ng-if="key != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletemilestone(key)" class="fas fa-trash-alt"></i></a>

																		<div class="row">
																			<div class="col-sm-6">
																				<div class="form-group">
																					<label>Milestone Title<span class="red-text">*</span></label>
																					<input type="text"  id="amount"  ng-value="x.title" ng-model="x.title" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
																					<p ng-show="offer && x.title == ''" class="text-danger ng-hide">Milestone Title is required.</p>

																				</div>
																			</div>
																			<div class="col-sm-6">
																				<div class="form-group">
																					<label>Milestone Amount</label>
																					<input type="text" readonly="" ng-value="x.price" ng-model="x.price" id="amount" numbers-only="numbers-only" placeholder="Please enter budget" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
																				</div>
																			</div>
																		</div>
																		<!-- =====task -->
																		<div class="row" ng-repeat="(key2,x2) in x.task" >
																			<div class="col-sm-6">
																				<div class="form-group">
																					<label>Task<span class="red-text">*</span></label>
																					<input type="text"  id="amount"  ng-value="x2.task" ng-model="x2.task" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
																					<p ng-show="offer && x2.task == ''" class="text-danger ng-hide">Task is required.</p>

																				</div>
																			</div>
																			<div class="col-sm-6">
																				<div class="form-group">
																					<label>Task amount <span class="red-text">*</span></label>
																					<input type="text" ng-keyup="totalmilestone()"  ng-value="x2.amount" ng-model="x2.amount" id="amount" numbers-only="numbers-only" placeholder="Please enter budget" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
																					<p ng-show="offer && x2.amount == ''" class="text-danger ng-hide">Amount is required.</p>

																				</div>
																			</div>
																			<div class="col-sm-12">
																				<a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a>
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<a hand id="plusicon">Sub Tasks  <i ng-click="taskadd(key)" class="far fa-plus-square"></i> </a>
																		</div>
																	</div>
																	<!-- task -->
																	<!-- total -->
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Total Amount<span class="red-text">*</span></label>
																				<input type="text" readonly  id="amount"  ng-value="proposal.proposalBid" ng-model="offerTotal"  name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" value="">
																			</div>
																		</div>
																	</div>
																	<!-- total -->
																</div>
																<div class="modal-footer">
																	<button type="button" ng-click="offersend()" class="btn btn-success">Submit</button>
																</div>
															</div>

														</div>
													</div>
													<!-- ====offer -->

													<!-- modal accept -->
														<div id="accept" class="modal fade" role="dialog">
														<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title jtitle"></h4>
														</div>
														<div class="modal-body">
														<div class="form-group">
														<input type="hidden" name="jobId" value="" class="jobId" >
														<input type="hidden" name="offerId" value="" class="offerId" >
														<input type="hidden" name="userId" value="" class="userId" >
														<input type="hidden" name="from" value="" class="from" >
														<input type="hidden" name="status" value="" class="status" >
														<label for="mobile">Message<span class="red-text">*</span></label>
														<textarea placeholder="Please enter message" type="text"  ng-model="message2" ng-value="message2" class="message2 form-control"  id="message" name="message"></textarea>
														 <p ng-show="msgSubmit && message2 == ''" class="text-danger">message is required.</p>
														</div>

														</div>
														<div class="modal-footer">
														<button type="button" ng-click="offermessage1()" class="btn btn-success">submit</button>
														</div>
														</div>

														</div>
														</div>

													<!-- modal accept -->



													<!-- content-->


												</div>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

					</section>
				</div>
