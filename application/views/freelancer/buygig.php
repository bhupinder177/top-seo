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
			<li class="active">Buyer Details</li>
		</ol>
	</section>
	<section class="content portfolio-cont bg-white" ng-app="myApp75" ng-controller="myCtrt75">


		<!-- get sidebar -->
			<div id="content">
				<!-- content -->
				<div ng-cloak class="box box-success" >
					<div class="box-body">



							<div class="table-responsive">
							<table id="rankingTable" class="table">
							<thead>
							<tr>
							<th>S. No.</th>
							<th class="text-center">Client</th>
							<th class="text-center">Plan</th>
							<th class="text-center">Price</th>
							<th class="text-center">Duration</th>
							<th class="text-center">Explanation</th>
							<th class="text-center">Purchased On</th>
							<th class="text-center">Action</th>
							</tr>
							</thead>
							<tbody>
							<tr ng-cloak ng-if="alldata.length != 0" ng-repeat="(key,x) in alldata">
							<td>{{ start + key }} </td>
							<td class="text-center">{{ x.client }} </td>
							<td class="text-center">
								<span ng-if="x.plan == 1">Basic</span>
								<span ng-if="x.plan == 2">Standard</span>
								<span ng-if="x.plan == 3">Premium</span>
							</td>
							<td class="text-center">{{ x.code }} {{ x.symbol }} {{ x.amount }}</td>
							<td class="text-center">{{ x.hours }} Days</td>
							<td class="text-center">{{ x.description | 	limitTo:150  }}...</td>
							<td class="text-center">{{ x.date | date }}</td>
							<td class="text-center"><a target="_blank" href="<?php echo base_url(); ?>freelancer/buygigdetail/{{ x.user_gig_buyId }}" class="btn btn-primary">Details</a></td>

							</tr>
							<tr ng-if="alldata.length == 0"><td colspan="3" class="text-center">No Record Found.</td></tr>
							</tbody>
							</table>

							</div>
							<div class="pagination"></div>



						<!-- content tab -->
						</div>
						<div>
							<!-- ------->

				</div>

		</section>
	</div>
