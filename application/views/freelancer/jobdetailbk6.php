

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
              <a href="<?php echo base_url(); ?>freelancer/job">Back to job</a>
							<a href="<?php echo base_url(); ?>freelancer/job/post" class="current">Jobs detail</a>

						</div>

					</div>

					<div class="container-fluid">

						<div class="content-box no-border-radius">

							<div class="row">
               <!-- content -->

							 <div class="col-md-12 no-padding-right">

			 <div class="box box-success" ng-app="myApp5" ng-controller="myCtrt5">

				 <div class="box-header with-border">

					 <h3 class="box-title">Job Offer detail</h3>

				 </div>

				 <div ng-if="job.length != 0" class="box-body job-offer-full">



          <!-- {{ job }} -->

									 <h1>{{ job.jobTitle }} </h1>
									 <p><a ng-if="job.offStatus == 0"  ng-click="offerStatus1(job.offId,job.jobId,users,job.offFrom,1)"  data-status="1" data-id="{{ job.offId }}"  class="btn btn-success">Accept</a>
									 <a ng-if="job.offStatus == 0" ng-click="offerStatus1(job.offId,job.jobId,users,job.offFrom,2)" data-status="2" data-id="{{ job.offId }}"  class="btn btn-danger">Reject</a></p>


									  <p ng-bind-html="job.jobDescription|trustAsHtml">{{ job.jobDescription   }}</p>
										<p ng-if="job.jobAttchment && job.jobAttchment != ''">Attachment :<a target="_blank" href="<?php echo base_url(); ?>assets/jobAttachment/{{ job.jobAttchment}}">
											<i class="fa fa-download" aria-hidden="true"></i></a></p>
										<b>Amount :- {{  job.total  }} </b>
										<br>
										<hr>
										<h6>Milestone</h6>
										<div ng-repeat="(key,x) in job['milestone']" ng-init="job = key">
                     <p># {{ x.milestoneTitle }} </p>
										 <p><b>Amount :- {{ x.milestoneAmount }}</b></p>
										 <h6><b>Task</b></h6>
										<div ng-repeat="(key2,x2) in x.task"  >
											<p>#{{ x2.taskTitle }}</p>
										</div>
										 <hr>
										</div>



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
							<textarea type="text"  ng-model="message1" class="message" class="form-control" id="message" name="message"></textarea>
							 <p ng-show="msgSubmit && message1 == ''" class="text-danger">message is required.</p>
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
