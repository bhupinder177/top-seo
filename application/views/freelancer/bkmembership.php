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
			<li class="active">Membership</li>
		</ol>
	</section>
	<section class="content portfolio-cont bg-white">
		<!-- get sidebar -->
			<div id="content">
				<!-- content -->
				<div ng-cloak class="box box-success" ng-app="myApp69" ng-controller="myCtrt69">
					<div class="box-body">

						<div class="group-chat">
		        <div class="">
						<ul class="nav nav-pills">

		        <li ng-class="{ 'active' : 1 == type }" ng-click="tabchange('1')">
		        <a data-toggle="tab" href="#membership">Membership</a>
		        </li>
						<li ng-class="{ 'active' : 2 == type }" ng-click="tabchange('2')">
					 <a>Preferred Location</a>
					 </li>

		        </ul>
						<div ng-if="type == 1" class="membership-table">
							<h4 class="p-2">Our Membership and Plans</h4>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Package Detail</th>
											<?php
															if(!empty($packages))
															{
																foreach($packages as $p)
																{
																	?>
											<th>
												<?php echo $p->packageName; ?>
											</th>
											<?php } } ?>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Price in USD</td>
											<?php if(!empty($packages))
																{
																	foreach($packages as $p)
																	{
																		?>
											<td>
												<?php echo $p->packagePrice; ?>
											</td>
											<?php } } ?>
										</tr>
										<tr>
											<td>Duration</td>
											<?php if(!empty($packages))
																{
																	foreach($packages as $p)
																	{
																		?>
											<td>
												<?php if($p->packageDuration == 1){ echo "Monthly"; } else if($p->packageDuration == 2) { echo "Yearly"; } ?>
											</td>
											<?php } } ?>
										</tr>
										<tr>
											<td>Company Profile</td>
											<?php if(!empty($packages))
																	{
																		foreach($packages as $p)
																		{
																			?>
											<td>
												<?php if($p->packageProfile == 1){ echo "Yes"; } else if($p->packageProfile == 0){ echo "No"; } ?>
											</td>
											<?php } } ?>
										</tr>
										<tr>
											<td>Number of Industries</td>
											<?php if(!empty($packages))
																		{
																			foreach($packages as $p)
																			{
																				?>
											<td>
												<?php echo $p->packageIndustry; ?>
											</td>
											<?php } } ?>
										</tr>
										<tr>
											<td>Number of Services</td>
											<?php if(!empty($packages))
																			{
																				foreach($packages as $p)
																				{
																					?>
											<td>
												<?php echo $p->packageService; ?>
											</td>
											<?php } } ?>
										</tr>
										<tr>
											<td>Removal of Negative Reviews</td>
											<?php if(!empty($packages))
																				{
																					foreach($packages as $p)
																					{
																						?>
											<td>
												<?php echo $p->packageRemovalReview; ?>
											</td>
											<?php } } ?>
										</tr>
										<tr>
											<td>Chat Option</td>
											<?php if(!empty($packages))
																					{
																						foreach($packages as $p)
																						{
																							?>
											<td>
												<?php if($p->packageChat  == 1){ echo "Yes"; } else if($p->packageChat  == 0){ echo "No"; } ?>
											</td>
											<?php } } ?>
										</tr>
										<tr>
											<td>Request A Quote</td>
											<?php if(!empty($packages))
																						{
																							foreach($packages as $p)
																							{
																								?>
											<td>
												<?php if($p->packageRequestQuote  == 1){ echo "Yes"; } else if($p->packageRequestQuote  == 0){ echo "No"; } ?>
											</td>
											<?php } } ?>
										</tr>
										<tr>
											<td>Consideration for Rankings</td>
											<?php if(!empty($packages))
																							{
																								foreach($packages as $p)
																								{
																									?>
											<td>
												<?php if($p->packageRanking   == 1){ echo "Yes"; } else if($p->packageRanking   == 0){ echo "No"; } ?>
											</td>
											<?php } } ?>
										</tr>
										<tr>
											<td>Preferred Location</td>
											<?php if(!empty($packages))
																								{
																									foreach($packages as $p)
																									{
																										?>
											<td>
												<?php if($p->packagePreferredLocation == 1) { echo "Yes"; } else{ echo "No"; } ?>
											</td>
											<?php } } ?>
										</tr>
										<tr>
											<td></td>
											<?php if(!empty($packages))
																									{
																										foreach($packages as $p)
																										{
																											if($p->packageId == $select->packageId)
																											{
																												?>
											<td>
												<i class="fa fa-check" aria-hidden="true"></i>
											</td>
											<?php
																											}
																											else
																											{
																												if($p->packagePrice == "FREE")
																												{
																													?>
											<td>
												<a class="btn signup-btn" href="
													<?php echo base_url(); ?>freelancer/membership-upgrade/
													<?php echo $this->session->userdata['clientloggedin']['id']; ?>/
													<?php echo $p->packageId;  ?>">Upgrade
												</a>
											</td>
											<?php
																													}
																												else
																												{

																													?>
											<td>
												<a class="btn signup-btn" href="
													<?php echo base_url(); ?>freelancer/upgrade-membership-payment/
													<?php echo $this->session->userdata['clientloggedin']['id']; ?>/
													<?php echo $p->packageId;  ?>">Upgrade
												</a>
											</td>
											<?php
																											      }
																											   }
																										  }
																									 }
																									?>
										</tr>
										 </tbody>
									</table>
								</div>
							</div>
							<!-- membership-->

							<!-- preferred location -->
							<div ng-if="type == 2" class="preferred-location">
								<div class="row">
									<div class="col-md-2">
								      <div class="form-group">

								                        <select ng-model="perpage" onchange="angular.element(this).scope().changePerPage(this)"   class="form-control">
								                          <option value="20">20</option>
								                          <option value="40">40</option>
								                          <option value="60">60</option>
								                          <option value="80">80</option>
								                          <option value="100">100</option>
								                        </select>
								                      </div>
								  </div>
								  <div class="col-md-4">
								    <div class="form-group">
								    <input type="text" id="searchtext" ng-model="searchtext" ng-value="searchtext" ng-keyup="search()" placeholder="Seach" class="form-control">
								     </div>
								  </div>
								</div>
							<div class="table-responsive">
							<table id="rankingTable" class="table">
							<thead>
							<tr>
							<th>S.NO</th>
							<th class="text-center">Country</th>
							<th class="text-center">State</th>
							<th class="text-center">City</th>
							<th class="text-center">Price</th>
							<th class="text-right">Buy</th>
							</tr>
							</thead>
							<tbody>
							<tr ng-if="alldata.length != 0" ng-repeat="(key,x) in alldata">
							<td>{{ start + key }} </td>
							<td class="text-center">
							  <span ng-if="x.country">{{ x.country }}</span>
							  <span ng-if="!x.country">All</span>
							</td>
							<td class="text-center">{{ x.state }}</td>
							<td class="text-center">{{ x.city }}</td>
							<td class="text-center">$ {{ x.price }}</td>
							<td>
							<div class="d-flex pull-right">
							<a ng-if="x.buy == 0" title="pay" href="<?php echo base_url(); ?>freelancer/paidranking_payment/{{ x.rankingPriceId }}"  class="btn bg-blue mr-2" ><i class="fa fa-paypal"></i>
							<a ng-if="x.buy == 1" title="Selected"   class="btn bg-blue mr-2" ><i class="fa fa-check" aria-hidden="true"></i></a>

							</a>
							</div>
							</td>
							</tr>
							<tr ng-if="alldata.length == 0"><td colspan="3" class="text-center">No Record Found.</td></tr>
							</tbody>
							</table>

							</div>
							<div class="pagination"></div>

						   </div>
							<!-- preferred location -->
						</div>
						<div>
							<!-- ------->
						</div>
					</div>
				</div>

		</section>
	</div>
