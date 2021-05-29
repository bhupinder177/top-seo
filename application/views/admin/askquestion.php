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
			<li class="active">Ask Questions</li>
		</ol>
	</section>
	<section class="content portfolio-cont bg-white">
		<!-- get sidebar -->
			<div id="content">
				<!-- content -->
				<div ng-cloak class="box box-success" ng-app="myApp44" ng-controller="myCtrt44">
					<div class="box-body">


							<!-- preferred location -->
							<div id="askquestions" class="">

							<div class="table-responsive">
							<table id="rankingTable" class="table">
							<thead>
							<tr>
							<th>S.NO</th>

							<th class="text-center">Name</th>
							<th	>Email/Skype/Phone</th>

							<th class="text-center">Website</th>
							<th class="text-center">Question</th>
							<th class="text-right">Answer</th>
							</tr>
							</thead>
							<tbody>
							<tr ng-if="alldata.length != 0" ng-repeat="(key,x) in alldata">
							<td>{{ start + key }} </td>
							<td class="text-center">{{ x.name }}</td>
							<td>
								 <div class="d-flex">
										<a ng-if="x.email" class="btn bg-orange mr-1" title="Email - {{ x.email }}">
										<i class="fa fa-envelope m-0"></i></a>
										<a ng-if="x.skype" class="btn bg-yellow mr-1" title="Skype - {{ x.skype }}">
										<i class="fa fa-skype m-0"></i></a>
										<a ng-if="x.phone" class="btn bg-blue" href="tel:{{ x.phone  }}" title="Phone - {{ x.rep_ph_num }}">
										<i class="fa fa-phone m-0"></i></a>
								 </div>
							</td>

							<td class="text-center">{{ x.website }}</td>
							<td class="text-center">{{ x.question }}</td>
							<td class="text-center">{{ x.answer }}</td>
							<!-- <td>
							<div class="d-flex pull-right">
							<a ng-if="x.buy == 0" title="pay" href="<?php echo base_url(); ?>freelancer/paidranking_payment/{{ x.rankingPriceId }}"  class="btn bg-blue mr-2" ><i class="fa fa-paypal"></i>
							<a ng-if="x.buy == 1" title="Selected"   class="btn bg-blue mr-2" ><i class="fa fa-check" aria-hidden="true"></i></a>

							</a>
							</div>
							</td> -->
							</tr>
							<tr ng-if="alldata.length == 0"><td colspan="3" class="text-center">No Record Found.</td></tr>
							</tbody>
							</table>

							</div>
							<div id="pagination"></div>


						</div>
						<!-- content tab -->
						</div>
						<div>
							<!-- ------->

				</div>

		</section>
	</div>
