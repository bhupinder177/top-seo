<?php require('sidebar.php'); ?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
        <h1>Add Employee Details</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Team</li>
		</ol>
	</section>


<section class="content">
	<div ng-cloak  ng-app="myApp14" ng-controller="myCtrt14">
	<div id="content">
				<div class="content-box box no-border-radius">
	<div class="social-links-area">

								<p class="text-info">

									Staff Information Form:-

									<!--button type="button" id="addEmp" class="d-block mt-3 rounded-0 pointer btn btn-sm btn-warning text-dark"><i class="fa fa-plus mr-1"></i>Add More Employee</button-->

								</p>

								<div class="top-rated-emp-container">

									<form method="post" >

										<div class="row">

												 <div class="col-sm-6">
												<div class="form-group d-inline-block mr-2">

													<label for="name" class="m-0">Employee Name*</label>

													<input type="text" class="form-control rounded-0" ng-model="name" id="name" placeholder="Employee Name"  />
                          <p ng-cloak ng-show="submitteam && name == ''" class="text-danger">Name is required.</p>
												</div>
											</div>

													 <div class="col-sm-6">
													<div class="form-group d-inline-block mr-2">

													<label for="name" class="m-0">Employee Email*</label>

													<input onkeyup="angular.element(this).scope().ctrl(this)" type="text" class="form-control rounded-0" ng-model="email" id="email" placeholder="Employee email"  />
                          <p ng-cloak ng-show="submitteam && email == ''" class="text-danger">Email is required.</p>
													<p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>

												</div>
											</div>


							<div class="col-sm-6">
 	            <div class="form-group d-inline-block mr-5">
           	  <label for="position" class="m-0">Phone no*</label>
              <input type="text" class="form-control phonenumber" ng-model="phone" id="phone" placeholder="Phone no"  />
              <p ng-cloak ng-show="submitteam && phone == ''" class="text-danger">Phone is required.</p>
							<span id="valid-msg" class="hide">✓ Valid</span>
							<span id="error-msg" class="hide"></span>
												</div>
											</div>
												<div class="col-sm-6">

												<div class="form-group d-inline-block mr-5">

												 <label for="position" class="m-0">Skype*</label>

												 <input type="text" class="form-control rounded-0" ng-model="skype" id="skype" placeholder="Skype"  />
												 <p ng-cloak ng-show="submitteam && skype == ''" class="text-danger">Skype is required.</p>
											 </div>
										 </div>

											<!-- <div class="col-sm-6">
             		<div class="form-group d-inline-block mr-5">
                 <label for="position" class="m-0">Address*</label>
                  <input type="text" class="form-control rounded-0" ng-model="address" id="address" placeholder="Address"  />
                    <p ng-cloak ng-show="submitteam && address == ''" class="text-danger">Address is required.</p>
										</div>
									</div> -->


								          <div class="col-sm-6">
												<div class="form-group d-inline-block mr-2">
                       	<label for="position" class="m-0">Designation*</label>

													<input type="text" class="form-control rounded-0" ng-model="designation" id="designation" placeholder="Designation" />
													<p ng-cloak ng-show="submitteam && designation == ''" class="text-danger">Designation is required.</p>
												</div>
											</div>



												<!-- <div class="form-group d-inline-block mr-2">

													<label for="position" class="m-0">Hourly Price*</label>

													<input type="text" class="form-control rounded-0" ng-model="hourly" id="hourly" placeholder="Hourly Price"  />
													<p ng-cloak ng-show="submitteam && hourly == ''" class="text-danger">Hourly price is required.</p>
												</div> -->
												<div class="col-sm-6">
												<div class="form-group d-inline-block mr-2">

													<label for="name" class="m-0">Skill*</label>

													<select  class="form-control rounded-0" ng-model="skill" id="skill">
													<option value="">Select skill</option>
													<option ng-repeat="(key,x) in services" ng-init="services = key" value="{{ x.id }}">{{ x.name }}</option>

													</select>
													 <p ng-cloak ng-show="submitteam && skill == ''" class="text-danger">Please select Skill.</p>
													 <p ng-cloak ng-show="submitteam && services.length == 0" class="text-danger">Firstly, please add skills from services page </p>
												</div>
											</div>




											<div class="col-sm-6">
												<div class="form-group d-inline-block mr-2">
												 <label for="position" class="m-0">Salary*</label>

													<input type="text" onkeyup="angular.element(this).scope().salaryCount(this)" class="form-control rounded-0" ng-model="salary" id="salary" placeholder="Salary" />
													<p ng-cloak ng-show="submitteam && salary == ''" class="text-danger">Salary is required.</p>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group d-inline-block mr-2">
												<label for="position" class="m-0">Per day*</label>
										<input readonly  type="text" class="form-control rounded-0" ng-model="perday" id="perday" placeholder="Per day"  />
													<p ng-cloak ng-show="submitteam && perday == ''" class="text-danger">Per day is required.</p>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
											 <label for="state">Currency<span class="red-text">*</span></label>
											 <select  id="currency" class="form-control" ng-model="currency">
												 <option value="">Select Currency</option>
												 <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
											 </select>
											 <p ng-cloak ng-show="submitteam && currency == ''" class="text-danger">Currency is required.</p>

										 </div>
									 </div>


							 <div class="col-sm-4">
							 <div class="form-group d-inline-block mr-2">
                  <label for="position" class="m-0">Per hour*</label>
                  <input  type="text"  class="form-control rounded-0" ng-model="perhour" id="perhour" placeholder="Per day"  />
								 <p ng-cloak ng-show="submitteam && perhour == ''" class="text-danger">Per hour is required.</p>
							 </div>
						 </div>

											<div class="col-sm-6">
                      <div class="form-group d-inline-block mr-2">
                        <label for="name" class="m-0">Access*</label>
                        	<select onchange="angular.element(this).scope().accesschange(this)"  class="form-control rounded-0" ng-model="access" id="access"   >
													<option value="">Select Access</option>
													<option value="6">Project Manager</option>
													<option value="5">HR</option>
													<option value="2">Sales Team</option>
													<option value="3">Employees</option>
													<option value="4">No access</option>
                           </select>
                          <p ng-cloak ng-show="submitteam && access == ''" class="text-danger">Please select access.</p>
												</div>
											</div>

											<div ng-if="access == 3" class="col-sm-6">
												<div ng-if="access == 3"  class="form-group d-inline-block mr-2">
                        	<label for="name" class="m-0">Project*</label>
                         	<select  class="form-control rounded-0" ng-model="project" id="project"   >
													<option value="">Select project</option>
													<option  ng-repeat="(key,x) in allproject" ng-init="allproject = key" value="{{ x.contractId }}">{{ x.jobTitle }}</option>
													</select>
												</div>
											</div>

												 <div class="col-sm-6">
												<div class="form-group d-inline-block">
													<label for="name" class="m-0">Status*</label>
                           <select  class="form-control rounded-0" ng-model="status" id="status">
													<option value="">Select Status</option>
													<option value="1">Active</option>
													<option value="2">Inactive</option>
												  </select>
                          <p ng-cloak ng-show="submitteam && status == ''" class="text-danger">Please select status.</p>
												</div>
											</div>

											<div class="col-sm-6">
										 <div class="form-group d-inline-block">
											 <label for="name" class="m-0">Department*</label>
												<select  class="form-control rounded-0" ng-model="department" id="department">
											 <option value="">Select Department</option>
                       <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>
											 </select>
											 <p ng-cloak ng-show="submitteam && department == ''" class="text-danger">Please select department.</p>
										 </div>
									 </div>


													 <div class="col-sm-6">
												<div class="form-group d-inline-block mr-2">
                          <p class="m-0">Choose Profile Image</p>
                           <div class="custom-file w-100">
                           <input onchange="angular.element(this).scope().imageupload(this)" type="file"  name="empPic" id="empPic">
                             <p ng-cloak ng-show="submitteam && image == ''" class="text-danger">Image is required.</p>
													</div>
												</div>
											</div>


                        <div class="col-sm-12">
												<div class="form-group d-inline-block">
<!-- form-control bg-primary border border-primary text-white pointer rounded-0 -->
													<input ng-click="saveteam()" type="button" id="submit" value="Add Employees" name="addEmp" class="btn btn-success">

												</div>

											</div>
										</div>



									</form>
</div>

</div>
							<!-- Main content -->

								<div class="row">
									<div class="col-md-12">
										<div class="box box-success">

								<!-- 	<div class="emp-details mt-4"> -->
                                     <div class="with-border">
										<h3 class="box-title">Employees List</h3>
									</div>



						         <table id="empTable" class="display table-bordered" style="width:100%">
                      <thead>
											 <tr>

													<th></th>
													<th>Employee Name</th>
													<th>Email</th>
													<th>Designation</th>
													<th>Hrly Rate</th>
													<th>Access</th>

													<th>Status</th>
													<th>Action</th>
												</tr>
                      </thead>
                        <tbody>
            <tr ng-if="teams.length != 0" ng-repeat="(key,x) in teams" ng-init="teams = key">
              <td><img src="<?php echo base_url(); ?>assets/client_images/{{ x.logo }}" class="img-fluid" alt="" height="50px" width="50px" /></td>
              <td>{{ x.name  }}</td>
							<td>{{ x.email }}</td>
              <td>{{ x.desig }}</td>
							<td>{{ x.code }} {{ x.symbol }} {{ x.maxPrice  }}</td>
							<td ng-if="x.access == 2">Full access</td>
							<td ng-if="x.access == 3">Limited access</td>
							<td ng-if="x.access == 4">No access</td>
							<td ng-if="x.access == 5">HR</td>
							<td ng-if="x.access == 6">Project manager</td>

							<td>
							<a ng-click="teamStatus(1,key,x.u_id)" ng-if="x.is_active == 0" class="btn btn-danger">Inactive</a>
						  <a ng-click="teamStatus(0,key,x.u_id)" ng-if="x.is_active == 1" class="btn btn btn-success">Active</a>
						 </td>
							<td>
					     <a ng-click="resendEmail(x.u_id)"><i class="fa fa-envelope" title="This Will Send Login Details" aria-hidden="true"></i></a>
							 <a ng-click="edit_team(x.u_id)" class="openDialog no-border-radius" title="Edit"  ><i class="fa fa-pencil-square-o"></i></a>
               <a ng-click="delete_confirm(key,x.u_id)" class="trigger-btn" data-toggle="modal" class="pointer delme_case" title="Delete" ><i class="fa fa-times mr-0"></i></a>
              </td>
						</tr>

      	<tr ng-if="teams.length == 0">
						<td ng-if="teams.length == 0" colspan="3"> Sorry no record found. </td>
       	</tr>


                        </tbody>
											</table>
                       <div id="pagination"></div>

													<!-- 	 edit team -->

													<div id="editTeam" class="modal fade" role="dialog">
													  <div class="modal-dialog">

													    <!-- Modal content-->
													    <div class="modal-content">
													      <div class="modal-header">
													        <button type="button" class="close" data-dismiss="modal">&times;</button>
													        <h4 class="modal-title">Edit Team</h4>
													      </div>
													      <div class="modal-body">

																	<div class="form-group">
                             <label for="name" class="m-0">Employee Name*</label>
                             <input type="text"  class="form-control rounded-0" ng-model="name1" id="name" placeholder="Employee Name"  />
 				                      <p ng-show="updatesubmit && name1 == ''" class="text-danger">name is required.</p>
 				 										</div>


 				 												<div class="form-group">

 				 													<label for="position" class="m-0">Job Responsibilities*</label>

 				 													<input type="text" class="form-control rounded-0" ng-model="designation1" id="designation" placeholder="Designation" />
 				                           <p ng-show="updatesubmit && designation1 == ''" class="text-danger">Designation is required.</p>
 				 												</div>


 				 												<div class="form-group">

 				 													<label for="position" class="m-0">Phone no*</label>

 				 													<input type="tel" id="phone1" class="form-control phone" ng-model="phone1"  placeholder="Phone no"  />
 				                           <p ng-show="updatesubmit && phone1 == ''" class="text-danger">Phone is required.</p>
																	 <span id="valid-msg" class="hide">✓ Valid</span>
																	 <span id="error-msg" class="hide"></span>
 				 												</div>



 				 												<div class="form-group">

 				 													<label for="position" class="m-0">Address*</label>

 				 													<input type="text" class="form-control rounded-0" ng-model="address1" id="address" placeholder="Address"  />
 				                           <p ng-show="updatesubmit && address1 == ''" class="text-danger">Address is required.</p>
 				 												</div>

																<div class="form-group">

																	<label for="position" class="m-0">Skype*</label>

																	<input type="text" class="form-control rounded-0" ng-model="skype1" id="skype" placeholder="Skype"  />
																	 <p ng-show="updatesubmit && skype1 == ''" class="text-danger">Skype is required.</p>
																</div>

 				 												<div class="form-group ">

 				 													<label for="name" class="m-0">Skill*</label>

 				 													<select  class="form-control rounded-0" ng-model="skill1" id="skill"  >
 				 													<option value="">Select skill</option>
 				 													<option ng-repeat="(key,x) in services" ng-init="services = key" value="{{ x.id }}">{{ x.name }}</option>

 				 													</select>
 				 													 <p ng-show="updatesubmit && skill1 == ''" class="text-danger">please select skill.</p>
 				 												</div>


																	<div class="form-group">
																 <label for="state">Currency<span class="red-text">*</span></label>
																 <select  id="currency" class="form-control" ng-model="currency1">
																	 <option value="">Select Currency</option>
																	 <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
																 </select>
																 <p ng-cloak ng-show="submitteam && currency1 == ''" class="text-danger">Currency is required.</p>

															 </div>


																<div class="form-group">
									                   	<label for="position" class="m-0">Salary*</label>

																	<input type="text" class="form-control rounded-0" ng-model="salary1" id="salary1" placeholder="Salary"  />
																	 <p ng-show="updatesubmit && salary1 == ''" class="text-danger">Salary is required.</p>
																</div>

																<div class="form-group">

																	<label for="position" class="m-0">Per day*</label>

																	<input readonly type="text" class="form-control rounded-0" ng-model="perday1" id="perday1" placeholder="Per day"  />
																	 <p ng-show="updatesubmit && perday1 == ''" class="text-danger">Per day is required.</p>
																</div>

																<div class="form-group">

 				 													<label for="position" class="m-0">Per hour*</label>

 				 													<input  type="text" class="form-control rounded-0" ng-model="perhour1" id="perhour" placeholder="Per hour"  />
 				                           <p ng-show="updatesubmit && perhour1 == ''" class="text-danger">Per hour is required.</p>
 				 												</div>

 				 												 <div class="form-group">

 				 													<label for="name" class="m-0">Access*</label>

 				 													<select  class="form-control rounded-0" ng-model="access1" id="access"  >
 				 													<option value="">Select access</option>
																	<option value="6">Project manager</option>
																	<option value="5">HR</option>
																	<option value="2">Full access</option>
																	<option value="3">Limited access</option>
																	<option value="4">No access</option>
 				 												  </select>
 				                           <p ng-show="updatesubmit && access1 == ''" class="text-danger">please select access.</p>
 				 												</div>


															 <div class="form-group d-inline-block">
																 <label for="name" class="m-0">Department*</label>
																	<select  class="form-control rounded-0" ng-model="department1" id="status">
																 <option value="">Select Department</option>
					                       <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>
																 </select>
																 <p ng-cloak ng-show="submitteam && department1 == ''" class="text-danger">Please select department.</p>
															 </div>


																<div class="form-group">
																	<label for="mobile">About *</label>
																	<textarea id="about" name="about" type="text" class="required is_required validate account_input form-control ckeditor" id="about" ng-model="about"></textarea>
																	<p ng-show="submitprofile && about == ''" class="text-danger">about is required.</p>
																</div>


																<div class="col-md-12" style="margin: 10px 0">
																	<a hand="" id="plusicon">Add Work history <i ng-click="experienceAdd(this)" class="fa fa-fw fa-plus-square"></i></a>
																</div>
																<!-- <div class="row"> -->
																<div ng-if="experience.length != 0" ng-repeat="(key,x) in experience">
																	<a hand id="plusicon" class="pull-right">  <i ng-click="deleteexperience(key)" class="fas fa-trash-alt"></i></a>

																	<div class="form-group">

																		<label for="mobile">Designation *</label>
																		<input id="d" name="ds" type="text" class="form-control required is_required validate account_input" id="about" ng-model="x.designation" ng-value="x.designation">
																		<p ng-show="submitprofile && x.designation == ''" class="text-danger">designation is required.</p>
																	</div>


																		<div class="form-inline">
																			<div class="form-group">
																				<label for="mobile"> Month *</label>
																				<select   class="form-control required is_required validate account_input" id="year" ng-model="x.MonthStart">
																					<option>Select Month</option>
																					<option value="{{ month[key] }}" ng-repeat="(key,x) in month">{{ month[key] }}</option>
																				</select>
																			</div>

																			<div class="form-group">
																				<label for="mobile">Year </label>
																				<select class="form-control"   id="year" ng-model="x.YearStart">
																					<option value="{{ years[key] }}" ng-repeat="(key,x) in years">{{ years[key] }}</option>
																				</select>

																				<p ng-show="submitprofile && x.experienceYear == ''" class="text-danger">year is required.</p>
																			</div>
																		</div>
																		 <div class="form-group">Through</div>
									                 <div class="form-inline">


																		<div class="form-group">

																			<label for="mobile"> Month *</label>
																			<select   class="form-control required is_required validate account_input" id="year" ng-model="x.MonthEnd">
																				<option>Select Month</option>
																				<option value="{{ month[key] }}" ng-repeat="(key,x) in month">{{ month[key] }}</option>
																			</select>

																			<p ng-show="submitprofile && x.experienceYear == ''" class="text-danger">Month is required.</p>
																		</div>
																		<div class="form-group">
																			<label for="mobile">Year *</label>
																			<select   class="form-control required is_required validate account_input" id="year" ng-model="x.YearEnd">
																				<option value="{{ years[key] }}" ng-repeat="(key,x) in years">{{ years[key] }}</option>
																			</select>
																			<p ng-show="submitprofile && x.experienceYear == ''" class="text-danger">year is required.</p>
																		</div>
																	</div>
																		<div class="form-group">
																			<label for="mobile">Description *</label>
																			<textarea  id="description" name="description" type="text" class="form-control required is_required validate account_input" id="description" ng-model="x.description" ng-value="x.description"></textarea>
																			<p ng-show="submitprofile && x.description == ''" class="text-danger">description is required.</p>

																		  </div>
																			<div class="form-group">
																				<label>Company Name</label>
											                <input type="text" id="company" class="form-control" ng-model="x.company">
																			</div>
																		<div class="form-group">
																			<input value="1" type="radio" name="currently" value="">I currently working here
																		</div>
																	</div>




 				 												<div class="form-group">

 				 													<p class="m-0">Choose Profile Image</p>

 				 													<div class="custom-file w-100">

 				 													  <input onchange="angular.element(this).scope().imageupload(this)" type="file"  name="empPic" id="empPic">

 				 													  <img src="" height="80" width="100"  id="teamviewimg" >

 				 													</div>
																</div>

																<div class="form-group">

																 <label for="name" class="m-0">Status*</label>

																 <select  class="form-control rounded-0" ng-value="" ng-model="status1" id="status1" >
																 <option value="">Select Status</option>
																 <option value="1">Active</option>
																 <option value="0">Inactive</option>
																 </select>
																	<p ng-show="updatesubmit && status1 == ''" class="text-danger">Please select status.</p>
															 </div>

													      </div>
													      <div class="modal-footer">
													        <button type="button" ng-click="updateteam(editTeam.id)" class="btn btn-success" >Submit</button>
													      </div>
													    </div>

													  </div>
													</div>
													<!-- edit team -->
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
	         <button type="button" ng-click="delete_team(dkey,did)" class="btn btn-danger" id="confirm">Delete</button>
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





</section>


</div>
<!--end-main-container-part-->
