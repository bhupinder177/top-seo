
<!--main-container-part-->

<section class="container-fluid light-bg user-reviews user-dashboard no-padding">

	<div class="container1">

	<!-- get sidebar -->

		<div class="row no-margin user-reviews-container">

			<div class="col-2 no-padding">

					<?php require('sidebar.php'); ?>

			</div>

			<div class="col-10 no-padding" ng-app="myApp12" ng-controller="myCtrt12">

				<div id="content">

					<div id="content-header">

						<div id="breadcrumb">

							<a href="" class="tip-bottom" data-original-title="Go to Home"><i class="fa fa-home"></i> Home</a>

							<a href="" class="current">Case study</a>

						</div>

					</div>

					<div class="container-fluid">

						<div class="content-box no-border-radius">

							<div class="row">



								<div class="mb-3 col-sm-12">

									<div class="content-header">

										<h1 id="toggleForm" class="pointer text-info d-inline-block">Add Case Study</h1>

									</div>

									<hr class="mt-0"/>

									<?php ?>

									<div class="form-div" id="form-div" style="">

										<span class="text-info small mb-3 d-block">Note: All fields are compulsory</span>

										<form class=""  method="post">



											<div class="row">

												<div class="col-sm-4">

													<div class="form-group">

														<label for="parea" class="mb-0">Choose Industry <span class="red-text">*</span></label>

														<select ng-model="ind" class="custom-select w-100 rounded-0" id="industry" >

															<option value="">Select Industry</option>
														<option ng-repeat="(key,x) in industry" ng-init="industry = key" value="{{ x.id }}">{{ x.name }} </option>
                         	</select>
													<p ng-show="submitcasestudy && ind == ''" class="text-danger">Industry is required.</p>

													</div>

													<div class="form-group">

														<label for="service" class="mb-0">Choose Service <span class="red-text">*</span></label>

														<select ng-model="ser" class="custom-select w-100 rounded-0" id="service" >

															<option value="">Select Service</option>
															<option ng-repeat="(key,x) in services" ng-init="services = key" value="{{ x.id }}">{{ x.name }} </option>

														</select>
                             	<p ng-show="submitcasestudy && ser == ''" class="text-danger">Service is required.</p>
													</div>

												</div>

												<div class="col-sm-4">

													<div class="form-group">

														<label for="case_title" class="mb-0">Case Study Title <span class="red-text">*</span></label>

														<input type="text" ng-model="case_title" class="form-control rounded-0" id="case_title" placeholder="Please enter title"  />
                            	<p ng-show="submitcasestudy && case_title == ''" class="text-danger">Case study title is required.</p>
													</div>

													<div class="form-group">

														<p class="m-0">Upload Case Study <span class="red-text">*</span></p>

														<div class="custom-file w-100">

														  <input onchange="angular.element(this).scope().documentupload(this)" type="file" class="custom-file-input customUpload" name="caseStudyFile" id="caseStudyFile" />

														  <label class="document custom-file-label customUploadLabel m-0" for="caseStudyFile" id="customUploadLabel">Choose file</label>
                              <p ng-show="submitcasestudy && case_document == ''" class="text-danger">Document is required.</p>
														</div>


														<!-- <span class="small form-text">Note : Only PDF with maximum size 2MB</span> -->

													</div>

												</div>

												<div class="col-sm-4">



													<div class="form-group">

														<label for="case_info" class="mb-0">Case Info</label>

														<textarea placeholder="Please enter case info" class="form-control form-control-sm rounded-0" ng-model="case_info" id="case_info"  ></textarea>
														<p ng-show="submitcasestudy && case_document == ''" class="text-danger">Case info is required.</p>

													</div>

												</div>

												<div class="col-sm-12">



                     <input ng-click="savecasestudy()" class="btn btn-primary rounded-0 pointer" name="submit" type="button" value="Add Case Study" id="submit" />

												</div>

											</div>



												<!-- <a href="add-services.php" title="Add Services" class="ml-2 btn btn-primary rounded-0">Add Services</a> -->



										</form>

										<hr/>

									</div>



								</div>



								<div class="col-sm-12">

									<div class="content-header">

										<h1>List of Case Studies</h1>

									</div>

									<hr class="mt-0"/>

									<div class="row">

										<div class="box col-12">

											<div class="box box-success">
                                                 <div class="box-body">

													<table id="pricingTable" class="table small  mw-100 table-sm">

														<thead>

															<tr>

																<th>Industry</th>

																<th width="10%">Service</th>

																<th width="15%">Title</th>

																<th width="30%">Case Info</th>

																<th>Document</th>

																<th>Action</th>

															</tr>

														</thead>

														<tbody>
                            <tr ng-repeat="(key,x) in casestudys" ng-init="casestudys = key">
                            <td>{{ x.industry }}</td>
														<td>{{ x.service }}</td>
														<td>{{ x.casestudyTitle }}</td>
														<td>{{ x.casestudyInfo }}</td>
														<td><a target="_blank" href="<?php echo base_url(); ?>assets/case_study/{{ x.casestudyDocument }}">Download</a></td>
                            <td><a ng-click="delete_confirm(key,x.casestudyId)" class="btn btn-danger btn-sm rounded-0 pointer delme" title="Delete"><i class="fa fa-times mr-0"></i></a></td>
														</tr>


														</tbody>

													</table>
													<div id="pagination"></div>

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
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
														<button type="button" ng-click="delete_casestudy(dkey,did)" class="btn btn-danger" id="confirm">Delete</button>
														</div>
														</div>
														</div>
														</div>
													<!-- delete confirm modal -->

												</div>

											</div>

										</div>

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



<style>

 	.modal-header .close {

    padding: 15px !important;

    margin: -15px 15px -15px auto !important;

    color: #333 !important;

}

.service_lists {
    padding-left: 3px;
    padding-left: 10px;
    max-height: 100px;
    overflow: auto;
}

.small_list {
    font-size: 95%;
    margin-top: 0;
    margin-bottom: 14px;
}
.smal_list_scroll {
    max-height: 72px;
    overflow: auto;
    display: block;
}


 </style>
