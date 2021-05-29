<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">

		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
			<li class="active">Add Testimonial</li>
		</ol>
	</section>

<!--main-container-part-->

<section class="light-bg user-dashboard no-padding">
	<div class="container1">
	<!-- get sidebar -->
		<div class="no-margin user-dashboard-container">
			<div ng-cloak   ng-app="myApp11" ng-controller="myCtrt11" >
				<div id="content">
						<div class="p-3 bg-white">
									<div class="testimonial-form">
										<form class="box pd-2">
											<div class="row">
												<div class="col-sm-6">
													<h4>Testimonial Details</h4>
													<div class="form-group">
														<label for="title" class="mb-0">Title <span class="red-text">*</span></label>

														<input class="form-control form-control-sm rounded-0" type="text" ng-model="title" maxlength="30" id="title" placeholder="Please enter title"  />
                                                    <p ng-show="submittestimonial && title == ''" class="text-danger">Title is required.</p>
													</div>
													<div class="form-group">
														<label for="youtube_url" class="mb-0">Youtube Url, if any</label>

														<input type="url" maxlength="150" onkeyup="angular.element(this).scope().youtubecheck(this)" placeholder="Please enter youtube video url" class="form-control form-control-sm rounded-0" ng-model="youtube_url" id="youtube_url"  />
														<p ng-show="youtube_url != '' && youtubeerror" class="text-danger">Please enter valid url.</p>

													</div>

													<div class="form-group">

														<label for="testimonial_text" class="mb-0">Testimonial Text <span class="red-text">*</span></label>

														<textarea placeholder="Please enter testimonial text" class="form-control form-control-sm rounded-0" maxlength="500" name="testimonial_text" id="testimonial" ng-model="testimonial"  ></textarea>
                              <p ng-show="submittestimonial && testimonial == ''" class="text-danger">Testimonial is required.</p>

													</div>
												</div>
												<div class="col-sm-6">

													<h4>Client Details</h4>

													<div class="form-group">

														<label for="name" class="mb-0">Name <span class="red-text">*</span></label>

														<input placeholder="Please enter name"  class="form-control form-control-sm rounded-0" type="text" maxlength="30" ng-model="clientname" id="name"    />
                            <p ng-show="submittestimonial && clientname == ''" class="text-danger">Name is required.</p>
													</div>

													<div class="form-group">

														<label for="url" class="mb-0">Website <span class="red-text">*</span></label>

														<input placeholder="Please enter website" onkeyup="angular.element(this).scope().websitecheck(this)" type="url"  class="form-control form-control-sm rounded-0" ng-model="website" id="website"  />
                            <p ng-show="submittestimonial && website == ''" class="text-danger">Website is required.</p>
                            <p ng-show="website != '' && websiterror" class="text-danger">Please enter valid website.</p>
													</div>

													<div class="form-group">

														<label class="mb-0">Client Image, or logo</label>

														<div class="custom-file form-group">

														  <input class="form-control testimonialimg" onchange="angular.element(this).scope().logoupload(this)" type="file" class="" name="img_logo" >
															<p ng-show="companylogoerror" class="text-danger">Invalid Image format.</p>


                              <img style="display:none" height="100" width="100" src ="" class="testimonialview">
														</div>


													</div>



												</div>

											</div>
                                              <div  ng-if="plan.packageTestimonial != total" class="mt-3">
                                                       <input ng-click="savetestimonial()"  class="btn btn-primary pointer" name="submit" type="button" value="Add Testimonial" id="submit" value="true" />
                                                </div>
										</form>

										<!-- package upgrade modal -->
																					<div class="modal fade" id="packageUpgrade" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
																						 <div class="modal-dialog">
																								<div class="modal-content">
																									 <div class="modal-header">
																											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																											<h4 class="modal-title">Package </h4>
																									 </div>
																									 <div class="modal-body">

																											<p>Sorry!! you seems to be out of your current package limit, please upgrade your package at <a ng-click="clickUpgrade()"  class="btn btn-success" id="confirm">Membership</a>  page.  </p>
																									 </div>
																									 <div class="modal-footer">

																											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																									 </div>
																								</div>
																						 </div>
																					</div>
																					<!-- package upgrade modal -->

									</div>
						</div>

				</div>

			</div>

		</div>

	</div>

</section>


</div>
<!--end-main-container-part-->
