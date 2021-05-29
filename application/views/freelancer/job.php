<!--main-container-part-->

<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
			<li class="active">Job offers</li>
		</ol>
	</section>

<section class="content">
							<div class="row">
               <!-- content -->

							 <div class="col-md-12 no-padding-right">

			 <div ng-cloak class="box box-success" ng-app="myApp3" ng-controller="myCtrt3">
                 <div class="box-body bg-white">
                     <div class="table-responsive">
	 <table  id="rankingTable" class="table  table-condensed">
						 <thead>
							 <tr>
                                <th>S. No.</th>
                                <th>Title</th>
                                <th>Attachment</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Action</th>
							 </tr>
						 </thead>
						 <tbody>
								 <tr ng-if="jobs.length != 0" ng-repeat="(key,x) in jobs" ng-init="jobs = key">
                  <td>{{ start + key }}</td>
									 <td>{{ x.jobTitle }}</td>
									 <td><a ng-if="x.jobAttchment" target="_blank" href="<?php echo base_url(); ?>assets/jobAttachment/{{ x.jobAttchment}}"><i class="fa fa-download" aria-hidden="true"></i>
</a></td>
									  <td ng-bind-html="x.jobDescription | limitTo:100 |trustAsHtml"></td>
										<td>{{ x.code }} {{ x.symbol }} {{  x.offAmount  }} </td>
                     <td>

											 <div class="dropdown ac-cstm text-right">
													<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
														 <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
													</a>
													<div class="dropdown-menu fadeIn">
															<a class="dropdown-item" href="<?php echo base_url(); ?>freelancer/job/{{ x.jobId }}"><i class="fa fa-info-circle" aria-hidden="true"></i>Details</a>
												</div>
											 </div>

										 <!-- <td ng-if="x.offStatus == 0"><a class="btn btn-default">Pending</a> </td> -->
										 <!-- <td><a ng-if="x.offStatus == 0"  ng-click="offerStatus(x.offId,x.jobId,user,x.offFrom,1,x.offAmount,x.proposalBid)"  data-status="1" data-id="{{ x.offId }}"  class="btn btn-success">Accept</a></td>
										 <td><a ng-if="x.offStatus == 0" ng-click="offerStatus(x.offId,x.jobId,user,x.offFrom,2,x.offAmount,x.proposalBid)" data-status="2" data-id="{{ x.offId }}"  class="btn btn-danger">Reject</a></td> -->
                      <!-- data-toggle="modal" data-target="#accept" -->
											<!-- data-toggle="modal" data-target="#reject" -->
								 </tr>
								 <tr ng-if="jobs.length == 0"><td colspan="7" class="text-center">No Record Found.</td></tr>
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
							<div class="form-group">
							<input type="hidden" name="jobId" value="" class="jobId" >
							<input type="hidden" name="offerId" value="" class="offerId" >
							<input type="hidden" name="userId" value="" class="userId" >
							<input type="hidden" name="from" value="" class="from" >
							<input type="hidden" name="status" value="" class="status" >
							<label for="mobile">Message<span class="red-text">*</span></label>
							<textarea placeholder="Please enter message" type="text"  ng-model="message" class="message form-control"  id="message" name="message"></textarea>
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

</section>
</div>
