

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

							<a href="<?php echo base_url(); ?>freelancer/job" class="current">Post Jobs</a>

						</div>

					</div>

					<div class="container-fluid">

						<div class="content-box no-border-radius">

							<div class="row">
               <!-- content -->

							 <div class="col-md-12 no-padding-right">

			 <div class="box box-success" ng-app="myApp3" ng-controller="myCtrt3">

				 <div class="box-header with-border">

					 <h3 class="box-title">Job Offer</h3>

				 </div>

				 <div class="box-body">

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
									 <td><a target="_blank" href="<?php echo base_url(); ?>assets/jobAttachment/{{ x.jobAttchment}}"><i class="fa fa-download" aria-hidden="true"></i>
</a></td>
									  <td ng-bind-html="x.jobDescription | limitTo:100 |trustAsHtml"></td>
										<td>{{  x.total  }} </td>
                     <td><a class="btn btn-primary" href="<?php echo base_url(); ?>freelancer/job/{{ x.jobId }}">Detail</a></td>
										 <!-- <td ng-if="x.offStatus == 0"><a class="btn btn-default">Pending</a> </td> -->
										 <td><a ng-if="x.offStatus == 0"  ng-click="offerStatus(x.offId,x.jobId,user,x.offFrom,1)"  data-status="1" data-id="{{ x.offId }}"  class="btn btn-success">Accept</a></td>
										 <td><a ng-if="x.offStatus == 0" ng-click="offerStatus(x.offId,x.jobId,user,x.offFrom,2)" data-status="2" data-id="{{ x.offId }}"  class="btn btn-danger">Reject</a></td>
                      <!-- data-toggle="modal" data-target="#accept" -->
											<!-- data-toggle="modal" data-target="#reject" -->
								 </tr>
								 <tr ng-if="jobs.length == 0"><td colspan="2">No Record Found.</td></tr>

						 </tbody>

					 </table>
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

				</div>

			</div>

		</div>

	</div>

</section>
