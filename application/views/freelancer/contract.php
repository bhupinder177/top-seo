<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
			<li class="active">Contracts</li>
		</ol>
	</section>

<section class="bg-white user-dashboard">
	<div class="row">
               <!-- content -->
							 <div class="col-md-12">

			 <div ng-cloak class="box" ng-app="myApp6" ng-controller="myCtrt6">
				 <div class="box-body table-responsive">
					 <table id="rankingTable" class="table table-bordered">
						 <thead>
                            <tr>
                            <th>Project</th>
                            <!-- <th>Milestone</th> -->
                            <th>Amount</th>
                            <th>Client</th>
                            <!-- <th>Progress</th> -->
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
						 </thead>
						 <tbody>
								 <tr ng-if="contracts.length != 0" ng-repeat="(key,x) in contracts" ng-init="contracts = key">

									 <td>{{ x.jobTitle }}<br>
                   Hired Date: {{ x.contractDate | date }}
									 </td>
									  <!-- <td>{{ x.milestone }}<br>
										Amount:	{{ x.code }} {{ x.symbol }} {{ x.milestoneAmount }}
										</td> -->
										<td>{{ x.code }} {{ x.symbol }} {{  x.contractAmount  }}</td>
										<td>{{ x.clientname }}</td>
										<!-- <td>
									<div class="progress progress-xs">
                  <div class="progress-bar l-slategray" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;"></div>
                  </div>
                    <small>Completion with: 29%</small>

									</td> -->
                     <td><a ng-if="x.contractStatus == 1" class="btn btn-success" >Active</a>
                         <a ng-if="x.contractStatus == 2" class="btn btn-danger" >End</a>
										 </td>
										 <td><a class="btn btn-primary" href="<?php echo base_url(); ?>freelancer/contract-detail/{{ x.contractId }}">Details</a></td>
								 </tr>
								 <tr ng-if="contracts.length == 0"><td colspan="7" class="text-center">No Record Found.</td></tr>

						 </tbody>

					 </table>

					 <div id="pagination"></div>


							 <!-- content-->


							</div>

						</div>

					</div>

				</div>
</section>
</div>
