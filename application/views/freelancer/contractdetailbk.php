

<!--main-container-part-->

<section class="container-fluid light-bg user-dashboard no-padding">

	<div class="container1">

	<!-- get sidebar -->

		<div class="row no-margin user-dashboard-container">

			<div class="col-2 no-padding">

				<?php require('sidebar.php'); ?>

			</div>

			<div class="col-10 no-padding">

				<div id="content">

					<div id="content-header">

						<div id="breadcrumb">

							<a href="<?php echo base_url(); ?>" class="tip-bottom" data-original-title="Go to Home"><i class="fa fa-home"></i> Home</a>
              <a href="<?php echo base_url(); ?>freelancer/contract">contract</a>


						</div>

					</div>

					<div class="container-fluid">

						<div class="content-box no-border-radius">

							<div class="row" ng-app="myApp7" ng-controller="myCtrt7">
               <!-- content -->

							 <div class="col-md-12 box box-success">
       <div class="row">
				<div class="col-md-8">
			 <div class="" >

				 <div class="box-header with-border">

					 <h3 class="box-title">Contract detail</h3>

				 </div>

				 <div ng-if="contracts.length != 0" class="box-body job-offer-full">



          <!-- {{ job }} -->

									 <h1>{{ contracts.jobTitle }} <a ng-if="contracts.contractStatus == 1 && contracts.milestone.length == end.length" ng-click="endcontract(contracts.contractId,contracts.clientId)" class="btn btn-info">End Contract</a> </h1>



									  <p ng-bind-html="contracts.jobDescription |trustAsHtml"></p>
										<p ng-if="contracts.jobAttchment && contracts.jobAttchment != ''">Attachment :<a target="_blank" href="<?php echo base_url(); ?>assets/jobAttachment/{{ contracts.jobAttchment}}">
											<i class="fa fa-download" aria-hidden="true"></i></a></p>
										<b>Amount :- {{  contracts.jobAmount  }} </b>

										<br>
										<hr>
										<h6>Milestone</h6>

										<div ng-repeat="(key,x) in contracts['milestone']" >
                     <p># <a ng-click="getlog(contracts.jobId,x.milestoneId)"> {{ x.milestoneTitle }}</a>
										 <a class="btn btn-info" ng-if="x.milestoneStatus == 1">Milestone is 	in Progress</a>
										 <a class="btn btn-primary" ng-if="x.milestoneStatus == 0">Yet To Start</a>
										 <a class="btn btn-success" ng-if="x.milestoneStatus == 2">Request Pending</a>
										 <a class="btn btn-success" ng-if="x.milestoneStatus == 3">complete</a>
										 <a ng-click="milestoneRequest(key,x.milestoneId,contracts.offFrom)" class="btn btn-info" ng-if="x.milestoneStatus == 1">Request </a>
									   </p>

										 <p><b>Amount :- {{ x.milestoneAmount }}</b></p>
                      <h6><b>Task</b></h6>
											<div ng-if="x.task.length != 0" ng-repeat="(key2,x2) in x.task"  >
												<p>#   {{ x2.taskTitle }} <input ng-if="x.milestoneStatus == 1" ng-checked="x2.log ? true : null" ng-model="x2.log" type="checkbox" name="taskcheck" ng-click="taskcheck($event,x2.taskId)"   ></p>
												<p>Task Amount : {{ x2.taskPrice }}</p>
											</div>

										 <hr>
										</div>

										<!-- review -->
										<div class="givereview" ng-if="contracts.contractStatus == 2 && userreview.length == 0">
                       <div>
                       Client waiting for review   <a ng-click="endcontract(contracts.contractId,contracts.clientId)" class="btn btn-info">review</a>
										   </div>
                   </div>
                     <!-- review -->


            <!-- modal accept -->
							<div id="request" class="modal fade" role="dialog">
							<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Request Message</h4>
							</div>
							<div class="modal-body">
							<div>
							<label for="mobile">Message*</label>
							<textarea type="text"  ng-model="message"  class="form-control" id="message" name="message"></textarea>
							 <p ng-show="msgSubmit && message == ''" class="text-danger">message is required.</p>
							</div>

							</div>
							<div class="modal-footer">
							<button type="button" ng-click="requestsend()" class="btn btn-success">submit</button>
							</div>
							</div>

							</div>
							</div>

						<!-- modal accept -->

						<!-- contract end modal -->

						<div id="contractend" class="modal fade" role="dialog">
						<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">End Contract</h4>

						</div>
						<div class="modal-body">
							<h6>Contract Title</h6>
							<h4>{{ contracts.jobTitle  }}</h4>
						<div>
							<h2>Private Feedback</h2>
							<p>This feedback will be kept anonymonus and never shared directly with the client.</p>
						<label for="mobile">Reason* For Ending Contract</label>
						<select class="form-control" id="reason" ng-model="reason">
						<option value="">Select a reason</option>
						<option value="1">Job completed successfully</option>
						<option value="1">Client not responsive</option>
						<option value="1">Job was completed unsuccessfully</option>
						<option value="1">Another Reason</option>

						</select>
						 <p ng-show="msgSubmit && reason == ''" class="text-danger">reason is required.</p>
						</div>



						<div ng-if="reason == 1"></br>
						<p><b>How likely are you to recommend this client to a friend or a colleague?</b></p></br>
					 <label for="mobile">Private Rating*</label>
					 <p><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="0" >0
							<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="1" >1
							<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="2" >2
							<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="3" >3
							<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="4" >4
							<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="5" >5
							<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="6" >6
							<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="7" >7
							<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="8" >8
							<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="9" >9
							<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="10" >10</p>
						<p ng-show="msgSubmit && rating == ''" class="text-danger">rating is required.</p>
					 </div>

					 <div ng-if="reason == 1">
					 </br><h2>Public Feedback</h2></br>
						 <p><b>This feedback will be shared on your client's profile only after they've left feedback for you.</b></p></br>
						 <div class="star-rating">
 					 <label class="reviewlabel">Skill</label>
 					 <span ng-class="{ 'fa-star' :  skill >= 1 , 'fa-star-o' : skill < 1 }" ng-click="starrating('skill','1')" class="fa" ></span>
 					 <span ng-class="{ 'fa-star' :  skill >= 2 , 'fa-star-o' : skill < 2 }" ng-click="starrating('skill','2')" class="fa" ></span>
 					 <span ng-class="{ 'fa-star' :  skill >= 3 , 'fa-star-o' : skill < 3 }" ng-click="starrating('skill','3')" class="fa" ></span>
 					 <span ng-class="{ 'fa-star' :  skill >= 4 , 'fa-star-o' : skill < 4 }" ng-click="starrating('skill','4')" class="fa" ></span>
 					 <span ng-class="{ 'fa-star' :  skill >= 5 , 'fa-star-o' : skill < 5 }" ng-click="starrating('skill','5')" class="fa" ></span>
 						</div>

 					 <div class="star-rating">
 					 <label class="reviewlabel">Quality</label>
 					 <span ng-class="{ 'fa-star' :  quality >= 1 , 'fa-star-o' : quality < 1 }" ng-click="starrating('quality','1')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  quality >= 2 , 'fa-star-o' : quality < 2 }" ng-click="starrating('quality','2')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  quality >= 3 , 'fa-star-o' : quality < 3 }" ng-click="starrating('quality','3')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  quality >= 4 , 'fa-star-o' : quality < 4 }" ng-click="starrating('quality','4')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  quality >= 5 , 'fa-star-o' : quality < 5 }" ng-click="starrating('quality','5')" class="fa"></span>

 					 </div>

 					 <div class="star-rating">
 					 <label class="reviewlabel">willing to rehire</label>
 					 <span ng-class="{ 'fa-star' :  rehire >= 1 , 'fa-star-o' : rehire < 1 }" ng-click="starrating('rehire','1')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  rehire >= 2 , 'fa-star-o' : rehire < 2 }" ng-click="starrating('rehire','2')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  rehire >= 3 , 'fa-star-o' : rehire < 3 }" ng-click="starrating('rehire','3')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  rehire >= 4 , 'fa-star-o' : rehire < 4 }" ng-click="starrating('rehire','4')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  rehire >= 5 , 'fa-star-o' : rehire < 5 }" ng-click="starrating('rehire','5')" class="fa"></span>

 					 </div>

 					 <div class="star-rating">
 					 <label class="reviewlabel">Availability</label>
 					 <span ng-class="{ 'fa-star' :  availability >= 1 , 'fa-star-o' : availability < 1 }" ng-click="starrating('availability','1')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  availability >= 2 , 'fa-star-o' : availability < 2 }" ng-click="starrating('availability','2')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  availability >= 3 , 'fa-star-o' : availability < 3 }" ng-click="starrating('availability','3')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  availability >= 4 , 'fa-star-o' : availability < 4 }" ng-click="starrating('availability','4')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  availability >= 5 , 'fa-star-o' : availability < 5 }" ng-click="starrating('availability','5')" class="fa"></span>

 					 </div>

 					 <div class="star-rating">
 					 <label class="reviewlabel">Deadlines</label>
 					 <span ng-class="{ 'fa-star' :  deadline >= 1 , 'fa-star-o' : deadline < 1 }" ng-click="starrating('deadline','1')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  deadline >= 2 , 'fa-star-o' : deadline < 2 }" ng-click="starrating('deadline','2')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  deadline >= 3 , 'fa-star-o' : deadline < 3 }" ng-click="starrating('deadline','3')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  deadline >= 4 , 'fa-star-o' : deadline < 4 }" ng-click="starrating('deadline','4')" class="fa"></span>
 					 <span ng-class="{ 'fa-star' :  deadline >= 5 , 'fa-star-o' : deadline < 5 }" ng-click="starrating('deadline','5')" class="fa"></span>

 					 </div>


 						 <div class="star-rating">
 						 <label class="reviewlabel">Communication</label>
 						 <span ng-class="{ 'fa-star' :  communication >= 1 , 'fa-star-o' :  communication < 1}" ng-click="starrating('comm','1')" class="fa" ></span>
 						 <span ng-class="{ 'fa-star' :  communication >= 2 , 'fa-star-o' :  communication < 2}" ng-click="starrating('comm','2')" class="fa" ></span>
 						 <span ng-class="{ 'fa-star' :  communication >= 3 , 'fa-star-o' :  communication < 3}" ng-click="starrating('comm','3')" class="fa" ></span>
 						 <span ng-class="{ 'fa-star' :  communication >= 4 , 'fa-star-o' :  communication < 4}" ng-click="starrating('comm','4')" class="fa" ></span>
 						 <span ng-class="{ 'fa-star' :  communication >= 5 , 'fa-star-o' :  communication < 5}" ng-click="starrating('comm','5')" class="fa" ></span>

 						 </div>



 						 <div class="star-rating">
 						 <label class="reviewlabel">Cooperation</label>
 						 <span ng-class="{ 'fa-star' :  cooperation >= 1 , 'fa-star-o' : cooperation < 1 }" ng-click="starrating('cooperation','1')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  cooperation >= 2 , 'fa-star-o' : cooperation < 2 }" ng-click="starrating('cooperation','2')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  cooperation >= 3 , 'fa-star-o' : cooperation < 3 }" ng-click="starrating('cooperation','3')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  cooperation >= 4 , 'fa-star-o' : cooperation < 4 }" ng-click="starrating('cooperation','4')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  cooperation >= 5 , 'fa-star-o' : cooperation < 5 }" ng-click="starrating('cooperation','5')" class="fa"></span>

 						 </div>

 						 <!-- <div class="star-rating">
 						 <label class="reviewlabel">Schedule</label>
 						 <span ng-class="{ 'fa-star' :  schedule >= 1 , 'fa-star-o' : schedule < 1 }" ng-click="starrating('schedule','1')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  schedule >= 2 , 'fa-star-o' : schedule < 2 }" ng-click="starrating('schedule','2')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  schedule >= 3 , 'fa-star-o' : schedule < 3 }" ng-click="starrating('schedule','3')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  schedule >= 4 , 'fa-star-o' : schedule < 4 }" ng-click="starrating('schedule','4')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  schedule >= 5 , 'fa-star-o' : schedule < 5 }" ng-click="starrating('schedule','5')" class="fa"></span>

 						 </div> -->




 						 <div class="star-rating">
 						 <label class="reviewlabel">Cost</label>
 						 <span ng-class="{ 'fa-star' :  cost >= 1 , 'fa-star-o' : cost < 1 }" ng-click="starrating('cost','1')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  cost >= 2 , 'fa-star-o' : cost < 2 }" ng-click="starrating('cost','2')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  cost >= 3 , 'fa-star-o' : cost < 3 }" ng-click="starrating('cost','3')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  cost >= 4 , 'fa-star-o' : cost < 4 }" ng-click="starrating('cost','4')" class="fa"></span>
 						 <span ng-class="{ 'fa-star' :  cost >= 5 , 'fa-star-o' : cost < 5 }" ng-click="starrating('cost','5')" class="fa"></span>

 						 </div>


 						 <div ng-if="reason == 1">
 						<label >Overall : {{ overall | number : 2 }}</label>
 						<span ng-class="{ 'fa-star' :  overall >= 2 ,'fa-star-half-o' :  overall > 1 && overall < 2 , 'fa-star-o' : overall < 2 }"  class="fa"></span>
 						<span ng-class="{ 'fa-star' :  overall >= 4 ,'fa-star-half-o' :  overall > 3 && overall < 4 , 'fa-star-o' : overall < 4 }"  class="fa"></span>
 						<span ng-class="{ 'fa-star' :  overall >= 6 ,'fa-star-half-o' :  overall > 5 && overall < 6 , 'fa-star-o' : overall < 6 }"  class="fa"></span>
 						<span ng-class="{ 'fa-star' :  overall >= 8 ,'fa-star-half-o' :  overall > 7 && overall < 8 , 'fa-star-o' : overall < 8 }"  class="fa"></span>
 						<span ng-class="{ 'fa-star' :  overall >= 10 ,'fa-star-half-o' :  overall > 9 && overall < 10 , 'fa-star-o' : overall < 10 }"  class="fa"></span>
 						 </div>


						 <div ng-if="reason == 1">
						 <label for="mobile">Share your experience with this client on this Portal</label>
						 <textarea type="text"  ng-model="review"  class="form-control" id="review" name="message"></textarea>
               	<p ng-show="msgSubmit && review == ''" class="text-danger">feedback is required.</p>
						 </div>

					 </div>


						</div>
						<div class="modal-footer">
						<button type="button" ng-click="submitContractReview()" class="btn btn-success">End Contract</button>
						</div>
						</div>

						</div>
						</div>
							<!-- contract end modal-->



							 <!-- content-->


							</div>

						</div>

</div>

					<div  class="col-md-4">
						<h1>Activity Board</h1>
           <div   class="activitytask">
						 <div scroll-glue-bottom="glued">
				   <div ng-repeat="(key,x) in activity" class="Activity">
						 <b>{{ x.name  }}</b>
						 <p><h6 ng-bind-html="x.logText|trustAsHtml" >{{ x.logText }}</h6> <a ng-click="comment(x.logId)"><i class="far fa-comment"></i></a></p>
						 <p>{{ x.logDate | date  }} {{ x.logDate | time }}</p>

						 <p class="commentdisplay" ng-repeat="(key,x2) in x['comment']">

							 <span>{{ x2.logText | htmlToPlaintext }}</span><br>
							 <em class="comment-time">from :{{ x2.name }} {{ x2.logDate | date }} {{ x.logDate | time }}</em>
							 <hr>
						 </p>
						 <div style="display:none;height:50px;" class="comment comment{{ x.logId }}" ></div>
						 <div style="display:none" class="cbt cbtn{{ x.logId }}"><button ng-click="submitcomment(x.logId,x.logReference)" class="btn btn-success">submit</button></div>
						 <hr>
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
