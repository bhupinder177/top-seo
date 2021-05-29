<?php include('sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
        <li class="active">Services</li>
      </ol>
    </section>

<section class="content services-area container-fluid">
			<div ng-cloak  ng-app="myApp10" id="servicecontroller" ng-controller="myCtrt10">
                        <div class="row bg-white">
                            <div class="col-sm-12">
								<form method="post" action="">
									<div class="select-container py-3">
										<div class="form-group col-md-7">
											<label for="prac_areas block"><b>Choose Industry</b></label>
                        <p >you can select up to {{ plan.industry }} industry as per your current package. Want to add more, <a target="_blank" href="<?php echo base_url(); ?>membership/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">Click here</a></p>

										<input id="unn"  onkeyup="angular.element(this).scope().industrykeyup(this)"   class="form-control chosen-search-input industry"  type="text" autocomplete="off" placeholder="Search and select industry" style="width:100%;">
                    <p ng-show="submitIndSer && selectedIndustry.length == 0" class="text-danger">Industry is required.</p>


                    <div class="chosen-drop11">
 	                <ul ng-if="industry.length != 0" class="chosen-results1" id="chosenresults11">
 			            <li ng-if="industry.length != 0" ng-click="selectIndustry(key)" ng-repeat="(key,x) in industry" ng-init="industry = key" class="active-result" style="" data-id="{{ x.id }}">{{ x.name }}</li>
                </ul>
                <ul ng-if="industry.length == 0 && industrynorecord">
 			            <li ng-if="industry.length == 0 && industrynorecord" class="active-result" style="" >No record found</li>
                   </ul>
 	                 </div>
                    <div class="chosen-choices tags">
										<a  ng-repeat="(key,x) in selectedIndustry" ng-init="selectedIndustry = key" class="search-choice">{{ x.name }}
										<span class="search-choice-close" ng-click="removeIndustry(key)" >×</span></a>
                  </div>



								 </div>
									</div>
									<div class="form-group col-md-7 ">
									 <label for="prac_areas block"><b>Choose Service</b></label>
                   <p >you can select up to {{ plan.services }} Services as per your current package. Want to add more, <a target="_blank" href="<?php echo base_url(); ?>membership/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">Click here</a></p>
									<div>

								<!-- <div id="ser_chosen" ng-click="serviceclick(this)" class="form-group chosen-container chosen-container-multi" title=""  > -->

	            <input id="unn" onkeyup="angular.element(this).scope().servicekeyup(this)" class="chosen-search-input services form-control"  type="text" autocomplete="off" placeholder="Search and select service" style="width:100%;">
              <p ng-show="submitIndSer && selectedService.length == 0" class="text-danger">Service is required.</p>

              <div class="chosen-drop">
            	  <ul ng-if="services.length != 0" class="chosen-results" id="chosenresults11">
            	  <li ng-if="services.length != 0" ng-click="selectService(key)" ng-repeat="(key,x) in services" ng-init="services = key" class="active-result" >{{ x.name }}</li>
                </ul>
                <ul ng-if="services.length == 0 && servicesnorecord">
            	  <li ng-if="services.length == 0 && servicesnorecord" >No record found.</li>
               </ul>
            	</div>

              <div class="tags" >

             <a ng-repeat="(key,x) in selectedService" ng-init="selectedService = key" class="search-choice">
           {{ x.name }}<span class="search-choice-close" ng-click="removeService(key)" >×</span></a>
            </div>


              </div>
								  </div>
								 </div>
                 <div class="col-lg-12">
                 <div class="form-group">
							     <input ng-click="saveIndustryService()" type="button" value="Save" class="btn btn-primary">
               </div>
              </div>
                 <div class="col-md-12 unable_sec">
							<span class="mt-2 text-secondary d-block small">Unable to find your preferred industry and technology,</span><span class="font-weight-bold pointer text-red-theme" data-target="#reqSerModal" data-toggle="modal" id="request-services-form">Click here</span></h4>
                 </div>

                </div>
						 </form>
                               <div class="table-responsive">
							<table id="example" class="table">
								<thead>
									<tr>
										<th>Name</th>
                                        <th class="text-center">Type</th>
										<th class="text-right">Status</th>
										<!-- <th>ID</th> -->
									</tr>
								</thead>

								<tbody>
                                    <tr ng-if="suggestion.length != 0" ng-repeat="(key,x) in suggestion" class="service_tr">

											<td>{{ x.name }}</td>
                                            <td class="text-center">{{ x.logSubType }}</td>
											<td class="text-right" ng-if="x.logStatus == 1"><a  class="btn btn-success">Approved</a></td>
											<td class="text-right" ng-if="x.logStatus == 0"><a  class="btn btn-danger">Pending</a></td>
                                    </tr>
										<tr ng-if="suggestion.length == 0">
											<td colspan="3">Sorry, no record found.</td>
										</tr>
								</tbody>
						     </table>
								 <div id="pagination"></div>
						    </div>

                <!-- add service modal-->
                <div class="modal fade" id="reqSerModal" tabindex="-1" role="dialog" aria-labelledby="reqSerModalLabel" >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-0">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                  <h4 class="modal-title" id="exampleModalLabel"><b>Fill the Request for Industry and Services.</b></h2>
                </div>
                <div class="modal-body">
                  <div id="request-form-div" class="request-form-div">
                      <form id="request-form" method="post" action="">
                        <div class="select-container">
                          <div class="form-group">
                            <label for="request_ind block">Request Industry</label>
                            <input type="text" ng-model="reqIndustry" class="form-control form-control-sm rounded-0" name="request_ind" id="request_ind" placeholder="Request Industry">
                          </div>
                        </div>
                        <div class="form-group seconday">

                          <label for="request_ser block">Request Technology Services</label>

                          <input type="text" ng-model="reqservice" class="form-control form-control-sm rounded-0" name="request_ser" id="request_ser" placeholder="Request Services/Technology Name">

                        </div>

                        <p class="text-danger" ng-if="submitr && reqservice == '' && reqIndustry == '' ">Unable to process empty form</p>
                        <button type="button" ng-click="requestserviceSave()" class="btn btn-success rounded-0">Request Services</button>
                      </form>
                  </div>
                </div>
                <div class="modal-footer"></div>
                  </div>

                  </div>
                </div>
                <!-- add service modal-->


					</div>
				</div>



</div>
</section>
</div>
