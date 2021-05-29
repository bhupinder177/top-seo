
<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
			<li class="active">Proposal</li>
		</ol>
	</section>
<!--main-container-part-->

<section class="bg-white light-bg user-dashboard no-padding">
<!-- get sidebar -->
				<div id="content">
			   <!-- content -->
			 <div ng-cloak class="box box-success" ng-app="myApp21" ng-controller="myCtrt21">
				 <div class="table-responsive">
					 <table id="rankingTable" class="table">
						 <thead>
							 <tr>
								  <th>Job title</th>
								  <th>Submitted Date</th>
								  <th>Person Name</th>
								  <th>Client Budget</th>
                  <th>Bid Amount</th>
									<!-- <th>View job</th> -->
									<th>Status</th>
									<!-- <th>Detail</th> -->
									<th>Action</th>
								</tr>

						 </thead>

						 <tbody>


								 <tr ng-if="proposal.length != 0" ng-repeat="(key,x) in proposal" ng-init="proposal = key">
									 <td>{{ x.jobTitle }}</td>
									 <td>{{ x.proposalDate | date }}</td>
									 <td>
                   {{ x.name }}
									 </td>
										<td>{{ x.code }} {{ x.symbol }} {{ x.jobBudget }} </td>
										<td>{{ x.code }} {{ x.symbol }} {{  x.proposalBid }} </td>
										<!-- <td><a target="_blank" href="<?php echo base_url(); ?>job/{{ x.jobTitle | lowercase | underscoreless  }}-{{ x.jobId }}" class="btn btn-success">View job</a></td> -->
                                        <td>
                                        <a ng-if="x.proposalStatus  == 0" class="btn btn-primary" >Pending</a>
                                        <a ng-if="x.proposalStatus  == 1" class="btn btn-primary" >Active</a>
                                        <a ng-if="x.proposalStatus  == 2" class="btn btn-primary" >Hired</a>
                                        <a ng-if="x.proposalStatus  == 3" class="btn btn-danger" >Rejected</a>
                                        </td>
										 <!-- <td><a ng-click="proposalDetail(x.proposalId)" class="btn btn-success">View Proposal</a></td> -->
										 <td>
											 <div class="dropdown ac-cstm text-right">
					 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
					 </a>
					 <div class="dropdown-menu fadeIn">
							 <a  class="dropdown-item" target="_blank" href="<?php echo base_url(); ?>job/{{ x.jobTitle | lowercase | underscoreless  }}-{{ x.jobId }}" ><i class="fa fa-eye"></i>View job</a>
							 <a  class="dropdown-item" ng-click="proposalDetail(x.proposalId)" ><i class="fa fa-eye"></i>View Proposal</a>
				 </div>
				</div>
										 </td>
								 </tr>
								 <tr ng-if="proposal.length == 0"><td colspan="8" class="text-center">No Record Found.</td></tr>

						 </tbody>

					 </table>
                        </div>
					 <div id="pagination"></div>


							 <!-- content-->
              <!-- proposal detail -->
							<div id="proposalDetail" class="modal fade" role="dialog">
              <div class="modal-dialog">
							 <div class="modal-content">
								 <div class="modal-header">
									 <button type="button" class="close" data-dismiss="modal">&times;</button>
									 <h4 class="modal-title">Proposal Detail</h4>
								 </div>
								 <div class="modal-body">
									 <h6>Job Title : {{ detail.jobTitle }}</h6>
									 <p>Proposal : <span ng-bind-html="detail.proposalDescription | trustAsHtml"></span></p>
									 <p><b>Bid Amount : {{ detail.symbol }} {{ detail.code }} {{ detail.proposalBid }}</b></p>
									 <h6 ng-if="detail['milestone'].length != 0">Milestone</h6>
									 <div ng-repeat="(key,x) in detail['milestone']">
										<p>#  {{ x.title }} </p>
										<p><b>Milestone Amount :- {{ x.price }}</b></p>
										<h6><b>Task</b></h6>
									 <div ng-repeat="(key2,x2) in x.task"  >
										 <p>#  {{ x2.task }}</p>
										 <p>Task Amount : {{ x2.amount }}</p>
									 </div>
										<hr>
									 </div>
								 </div>
								 <div class="modal-footer">
									 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								 </div>
							 </div>
							</div>
							</div>
							<!-- proposal detail -->
							</div>
					</div>
</section>
</div>
