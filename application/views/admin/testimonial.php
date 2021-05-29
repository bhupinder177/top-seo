<?php include('sidebar.php');?> 
  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
        <li class="active">Testimonial</li>
      </ol>
    </section>

<section ng-cloak  ng-app="myApp19" ng-controller="myCtrt19"  class="content"> 
	<div class="container1"> 
	<!-- get sidebar -->   
				<div id="content">   
						<div class="box content-box"> 
                                <div class="content-header p-3"> 
                                    <h4 class="mb-0">All Testimonials</h4> 
                                </div>  
				                  <div class="box-success">
                                    <div class="box-body">
                                        <div class="table-responsive">
									   <table class="table"> 
										<thead> 
											<tr> 
												<th scope="col">Client Detail</th> 
												<th scope="col">Title</th> 
												<th scope="col">Description</th> 
											</tr> 
										</thead> 
										<tbody> 
											<tr ng-if="testimonials.length != 0" ng-repeat="(key,x) in testimonials" ng-init="testimonials = key"> 
												<td scope="row"> 
													<div class="client"> 
														<div ng-if="x.testimonialLogo" class="d-inline-block align-top w-100"> 
															<img ng-if="x.testimonialLogo" src="<?php echo base_url(); ?>assets/testimonial_logo/{{ x.testimonialLogo }}" width="50" /> 
														</div> 
														<div class="d-inline-block"> 
															<p class="mb-0">{{ x.testimonialClientName }}</p>  
														</div> 
													</div> 
												</td> 
												<td>{{ x.testimonialTitle }}</td> 
												<td>{{ x.testimonialDescription | limitTo:100 }}</td>  
											</tr>
											<tr ng-if="testimonials.length == 0" colspan="3" class="text-center">
												<td>No record</td>
											</tr> 
                                            </tbody> 
									   </table>
                                        </div>
									<div id="pagination"></div>  
                                </div>
								</div> 
							</div> 
						</div>  
			</div> 
</section>
</div>
