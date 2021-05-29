<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
       <ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
			<li class="active">Testimonials</li>
		</ol>
	</section>
<section class="content">
	<!-- get sidebar -->
		<div class="no-margin user-dashboard-container portfolio-cont">
			<div ng-cloak  ng-app="myApp11" ng-controller="myCtrt11" >
  				<div id="content">
						<div class="bg-white box-body">

                            <div  class="content-header serv-price p-2">
                                    <a ng-click="addtestimonial()" class="pull-right btn btn-success"  > Add New </a>

                            </div>
							<!-- <div class="row"> -->
				                  <div class="testimonial-sec table-responsive">
									<table class="table testimonial-table  small">
										<thead>
											<tr>
												<th scope="col">S. No.</th>
												<th scope="col">Client Detail</th>
												<th scope="col">Title</th>
												<th scope="col">Description</th>
												<th class="text-right" scope="col">Action</th>
											</tr>
										</thead>
										<tbody>

											<tr ng-if="testimonials.length != 0" ng-repeat="(key,x) in testimonials" ng-init="testimonials = key">

												<td scope="row">
													{{ $index + 1 }}
												</td>
												<td scope="row">
													<div class="client">
														<div ng-if="x.testimonialLogo" class="d-inline-block align-top mr-1">
															<img ng-if="x.testimonialLogo" src="<?php echo base_url(); ?>assets/testimonial_logo/{{ x.testimonialLogo }}" height="100" width="50" />
															<div class="d-inline-block">
																<p class="mb-0">{{ x.testimonialClientName }}</p>
															</div>
														</div>

													</div>
												</td>
												<td>{{ x.testimonialTitle }}</td>
												<td>{{ x.testimonialDescription | limitTo:100 }}</td>
												<td>
                                    <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a ng-if="x.testimonialDeleted == 0" class="dropdown-item" title="Edit todo" ng-click="testimonial_edit(x.testimonialId)"><i class="fa fa-edit"></i> Edit</a>
                                     <a ng-if="x.testimonialDeleted == 0" class="dropdown-item" ng-click="delete_confirm(key,x.testimonialId)"><i class="fa fa-trash"></i>Delete</a>
                                     <a ng-if="x.testimonialDeleted == 1" class="dropdown-item" ><i class="fa fa-trash"></i>Deleted</a>
                                   </div>
                                    </div>
                                        </td>
                                        </tr>
																				<tr ng-if="testimonials.length == 0">
																				<td colspan="4" class="text-center">No Record Found.</td>
																				</td>
                                        </tbody>
									</table>
									<div  id="pagination"></div>
									<!-- delete confirm modal -->
									<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this ?</p>
                                    </div>
                                    <div class="modal-footer">
																			<button type="button" ng-click="delete_testimonial(dkey,did)" class="btn btn-danger" id="confirm">Delete</button>
																			
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
</div>
									<!-- delete confirm modal -->

									<!-- edit testimonial -->

									<div id="edittestimonial" class="modal fade" role="dialog">
										<div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Edit Testimonial</h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
													<label for="name" class="m-0">Title<span class="red-text">*</span></label>
													<input type="text"  class="form-control form-control-sm" ng-model="title" id="title" placeholder="Title"  />
													 <p ng-show="testsubmit && title == ''" class="text-danger">title is required.</p>
												</div>
												<div class="form-group">
													<label for="position" class="m-0">Client Name<span class="red-text">*</span></label>
													<input type="text" class="form-control form-control-sm" ng-model="clientname" id="clientname" placeholder="clientname" />
													 <p ng-show="testsubmit && clientname == ''" class="text-danger">client name is required.</p>
												</div>
												<div class="form-group">
													<label for="position" class="m-0">YouTube URL, if any</label>
													<input type="text" onkeyup="angular.element(this).scope().youtubecheck(this)" class="form-control form-control-sm rounded-0" ng-model="youtube_url" id="url" placeholder="youtube url"  />
													<p ng-show="youtube_url != '' && youtubeerror" class="text-danger">Please enter valid url.</p>

												</div>

												<div class="form-group">
													<label for="position" class="m-0">Website<span class="red-text">*</span></label>
													<input type="text" onkeyup="angular.element(this).scope().websitecheck(this)" class="form-control form-control-sm rounded-0" ng-model="website" id="website" placeholder="website"  />
													 <p ng-show="testsubmit && website == ''" class="text-danger">website is required.</p>
													 <p ng-show="website != '' && websiterror" class="text-danger">Please enter valid website.</p>

												</div>
												<div class="form-group">
													<label for="position" class="m-0">Description<span class="red-text">*</span></label>
													<textarea type="text" class="form-control form-control-sm rounded-0" ng-model="description" id="description" placeholder="Description"></textarea>
													 <p ng-show="testsubmit && description == ''" class="text-danger"> description is required.</p>
												</div>
												<div class="form-group">
													<p class="m-0">Client image or Logo</p>
													<div class="custom-file">
														<input onchange="angular.element(this).scope().logoupload(this)" type="file"  name="empPic" id="empPic" class="form-control">
														<p ng-show="companylogoerror" class="text-danger">Invalid Image format.</p>

														<img  height="100" width="100" src ="<?php echo base_url(); ?>assets/testimonial_logo/{{ logo }}" class="testimonialview">

													</div>
												</div>
												</div>
												<div class="modal-footer">
													<button type="button" ng-click="testimonial_update()" class="btn btn-success mb-0" >Submit</button>
												</div>
											</div>
										</div>
									</div>
									<!-- edit testimonial -->

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
</section>
</div>
