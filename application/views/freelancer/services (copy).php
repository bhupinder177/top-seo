<section class="container-fluid light-bg user-dashboard no-padding">

	<div class="container1">

	<!-- get sidebar -->

		<div class="row no-margin user-dashboard-container">

			<div class="col-2 no-padding">

				<?php require('sidebar.php'); ?>

			</div>

			<div class="col-10 no-padding" ng-app="myApp10" ng-controller="myCtrt10">

				<div id="content">

					<div id="content-header">

						<div id="breadcrumb">

							<a href="" class="tip-bottom" data-original-title="Go to Home"><i class="fa fa-home"></i> Home</a>

							<a href="" class="">Profile</a>

							<a href="" class="current">Service</a>

						</div>

					</div>

					<div class="container-fluid">

						<div class="content-box no-border-radius">

							<div class="content-header">

								<h1>Services</h1>

							</div>

							<hr/>

							<div class="row">

							<div class="services-area col-sm-6">

								<form method="post" action="">

									<div class="select-container">

										<div class="form-group">

											<label for="prac_areas block">Select Industry</label>

											<div>
                         <!-- chosen-with-drop chosen-container-active -->
										<div ng-click="industryclick(this)"   class="chosen-container chosen-container-multi "   title="" id="prac_areas_chosen" style="width: 493px;">
										<ul class="chosen-choices">

										<li ng-repeat="(key,x) in selectedIndustry" ng-init="selectedIndustry = key" class="search-choice">
										<span>{{ x.name }}</span>
										<a class="search-choice-close" ng-click="removeIndustry(key)" ></a></li>

										<li class="search-field">
										<input id="unn"  class="chosen-search-input industry"  type="text" autocomplete="off" placeholder="Industry..." style="width:100%;">
										</li>
										</ul>
	                 <div class="chosen-drop">
	                <ul class="chosen-results" id="chosenresults">
			            <li ng-click="selectIndustry(key)" ng-repeat="(key,x) in industry" ng-init="industry = key" class="active-result" style="" data-id="{{ x.id }}">{{ x.name }}</li>
                  </ul>
	                 </div>
								 </div>
											</div>

										</div>
									</div>
									<div class="form-group seconday">
									 <label for="ser block">Choose Technology Services</label>
									<div>
									<!-- <select data-placeholder="Secondary Service Area..."  id="ser" class="custom-select w-100 rounded-0 chosen-select ser" multiple="" required="" style="display: none;">
									<option value="4">Link Building</option>
									<option value="42">Mobile SEO</option>
								</select> -->
								<div id="ser_chosen" ng-click="serviceclick(this)" class="chosen-container chosen-container-multi" title=""  style="width: 493px;">
							<ul class="chosen-choices" >
	             <li ng-repeat="(key,x) in selectedService" ng-init="selectedService = key" class="search-choice">
						 <span>{{ x.name }}</span><a class="search-choice-close" ng-click="removeService(key)" ></a></li>
						 <li class="search-field">
	            <input id="unns" class="chosen-search-input services"  type="text" autocomplete="off" placeholder="Service..." style="width:100%;">
	          </li>
	          </ul>

	<div class="chosen-drop">
	  <ul class="chosen-results" id="chosenresults1">
	 <li ng-click="selectService(key)" ng-repeat="(key,x) in services" ng-init="services = key" class="active-result" >{{ x.name }}</li>
   </ul>
	</div>
</div>
								  </div>
								 </div>
							<button ng-click="saveIndustryService()" type="button" class="btn btn-primary rounded-0">Add Service</button>

							<span class="mt-2 text-secondary d-block small">Unable to find your preferred industry and technology,<br/>
							<!-- <span class="font-weight-bold pointer text-red-theme" data-target="#reqSerModal" data-toggle="modal" id="request-services-form">Please click here</span> -->
						 </form>
    					</div>
                       <div class="col-md-12">
			             <div class="box box-success">
	                       <div class="box-body">
							<table id="example" class="display" style="width:100%">

								<thead>

									<tr>

										<th>User</th>

										<th>Requested Industry</th>

										<th>Requested Service</th>

										<th>Status</th>

										<!-- <th>ID</th> -->

									</tr>

								</thead>

								<tbody>





										<tr class="service_tr">

											<td></td>

											<td></td>

											<td></td>

											<td></td>

											</tr>





										<tr>

											<td colspan="4">Sorry, no record found.</td>

										</tr>



								</tbody>
						     </table>
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
