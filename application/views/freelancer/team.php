<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Employees</li>
      </ol>
   </section>
   <section class="content">
      <div ng-cloak  ng-app="myApp14" ng-controller="myCtrt14">
         <div id="content">

               <!-- Main content -->
               <div class="employe-list bg-white mt-3">
                  <div class="row">
                     <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-2">
                               <div class="form-group">
                                 <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                                   <option value="10">10</option>
                                   <option value="20">20</option>
                                   <option value="50">50</option>
                                   <option value="100">100</option>
                                 </select>
                               </div>
                               </div>
                            <div class="col-md-2">
                               <div class="form-group">
                                 <input type="text" name="employee" placeholder="Search by employee name" ng-model="searchemployeename" class="form-control">
                               </div>
                            </div>
                            <div class="col-md-2">
                               <div class="form-group">
                                 <input type="text" name="skill" placeholder="Search by skill" ng-model="searchskill" class="form-control">
                               </div>
                            </div>
                            <div class="col-md-2">
                               <div class="form-group">
                                 <a  ng-click="searchEmployee()"  class="btn btn-success mb-0">Search</a>
                               </div>
                               </div>
                               <div   class="col-md-4 text-right">
                                <a  ng-click="clickaddEmployee()"  class="btn btn-success mb-0">Add Employee</a>
                               </div>

                               </div>
                        <div class="box box-success">
                           <div class="table-responsive">
                              <table id="empTable" class="table">
                                 <thead>
                                    <tr>
                                      <th>Emp. ID</th>
                                       <th>Emp. Name</th>
                                       <th>Image</th>
                                       <th>Email</th>
                                       <th>Designation</th>
                                       <th>Hourly Rate</th>
                                       <th>Access</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr ng-if="teams.length != 0" ng-repeat="(key,x) in teams" ng-init="teams = key">
                                      <td>{{ x.employeeCode }}</td>
                                       <td>{{ x.name  }}</td>
                                       <td><img src="<?php echo base_url(); ?>assets/client_images/{{ x.logo }}" class="img-fluid" alt="" height="50px" width="50px" /></td>
                                       <td>{{ x.email }}</td>
                                       <td>{{ x.desig }}</td>
                                       <td>{{ x.code }} {{ x.symbol }} {{ x.maxPrice  }}</td>
                                       <td>
                                       <!-- <span ng-if="x.access == 2">Employee (Sales)</span>
                                       <span ng-if="x.access == 3">Employee (General)</span>
                                       <span ng-if="x.access == 4">No access</span>
                                       <span ng-if="x.access == 5">HR</span>
                                       <span ng-if="x.access == 6">Project Manager (General)</span>
                                       <span ng-if="x.access == 7">Project Manager (Sales)</span> -->

                                       <span ng-if="x.access == 5" >HR</span>
                                       <span ng-if="x.access == 6">Project Manager (General)</span>
                                       <span ng-if="x.access == 2">Project Manager (Sales) </span>
                                       <span ng-if="x.access == 7">Employee (Sales)</span>
                                       <span ng-if="x.access == 3">Employee (General)</span>
                                     </td>
                                       <td>
                                          <a  ng-click="teamStatus(1,key,x.u_id)" ng-if="x.is_active == 0 && x.deleted == 0" class="btn bg-yellow">Inactive</a>
                                          <a ng-if="x.deleted == 1"   class="btn bg-yellow">Inactive</a>
                                          <a  ng-click="teamStatus(0,key,x.u_id)" ng-if="x.is_active == 1 && x.deleted == 0" class="btn bg-green">Active</a>
                                       </td>
                                       <td>
                                          <div class="dropdown ac-cstm text-right">
                                             <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                             <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                             </a>
                                             <div class="dropdown-menu fadeIn">
                                                <a ng-if="x.deleted == 0" ng-click="resendEmail(x.u_id)" class="dropdown-item"><i class="fa fa-envelope" title="This Will Send Login Details" aria-hidden="true"></i>Send Email</a>
                                                <a ng-if="x.deleted == 0" href="<?php echo base_url(); ?>team-edit/{{ x.u_id }}/<?php echo $this->session->userdata['clientloggedin']['url']; ?>" class="dropdown-item openDialog" title="Edit"  ><i class="fa fa-pencil-square-o"></i>Edit</a>
                                                <a ng-if="x.deleted == 0 && '<?php echo $this->session->userdata['clientloggedin']['id'] ?>' != x.u_id" class="dropdown-item trigger-btn" ng-click="delete_confirm(key,x.u_id)" data-toggle="modal" class="pointer delme_case" title="Delete" ><i class="fa fa-trash"></i>Delete</a>
                                                <a ng-if="x.deleted == 1" class="dropdown-item trigger-btn"   class="pointer delme_case" title="Deleted" ><i class="fa fa-trash"></i>Deleted</a>
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr ng-if="teams.length == 0">
                                       <td ng-if="teams.length == 0" colspan="8" class="text-center"> Sorry no record found. </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div id="pagination"></div>
                           <!-- 	 edit team -->
                           <div id="editTeam" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h4 class="modal-title">Edit Employee</h4>
                                    </div>
                                    <div class="modal-body">
                                       <div class="form-group">
                                          <label for="name"  >Employee Name<span class="red-text">*</span></label>
                                          <input type="text"  class="form-control rounded-0" ng-model="name1" id="name" placeholder="Please enter employee name"  />
                                          <p ng-show="updatesubmit && name1 == ''" class="text-danger">name is required.</p>
                                       </div>
                                       <div class="form-group">
                                          <label for="position"  >Designation<span class="red-text">*</span></label>
                                          <input type="text" class="form-control rounded-0" ng-model="designation1" id="designation" placeholder="Please enter designation" />
                                          <p ng-show="updatesubmit && designation1 == ''" class="text-danger">Designation is required.</p>
                                       </div>
                                       <div class="form-group">
                                          <label for="position"  >Phone no<span class="red-text">*</span></label>
                                          <input numbers-only="numbers-only" type="tel" id="phone1" class="form-control phone" ng-model="phone1"  placeholder="Phone no"  />
                                          <p ng-show="updatesubmit && phone1 == ''" class="text-danger">Phone is required.</p>
                                          <span id="valid-msg" class="hide">✓ Valid</span>
                                          <span id="error-msg" class="hide"></span>
                                       </div>
                                       <div class="form-group">
                                          <label for="position"  >Address<span class="red-text">*</span></label>
                                          <input type="text" class="form-control rounded-0" ng-model="address1" id="address" placeholder="Address"  />
                                          <p ng-show="updatesubmit && address1 == ''" class="text-danger">Address is required.</p>
                                       </div>
                                       <div class="form-group">
                                          <label for="position"  >Skype<span class="red-text">*</span></label>
                                          <input type="text" class="form-control rounded-0" ng-model="skype1" id="skype" placeholder="Skype"  />
                                          <p ng-show="updatesubmit && skype1 == ''" class="text-danger">Skype is required.</p>
                                       </div>
                                       <div class="form-group ">
                                          <label for="name"  >Skill<span class="red-text">*</span></label>
                                          <select  class="form-control rounded-0" ng-model="skill1" id="skill"  >
                                             <option value="">Select skill</option>
                                             <option ng-repeat="(key,x) in services" ng-init="services = key" value="{{ x.id }}">{{ x.name }}</option>
                                          </select>
                                          <p ng-show="updatesubmit && skill1 == ''" class="text-danger">please select skill.</p>
                                       </div>
                                       <div class="form-group">
                                          <label for="state">Local Currency<span class="red-text">*</span></label>
                                          <select disabled=""  id="currency" class="form-control" ng-model="salarycurrencyId">
                                             <option value="">Select Currency</option>
                                             <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                                          </select>
                                          <p ng-cloak ng-show="submitteam && currency1 == ''" class="text-danger">Currency is required.</p>
                                       </div>
                                       <div class="form-group">
                                          <label for="position"  >Salary<span class="red-text">*</span></label>
                                          <input numbers-only="numbers-only" type="text" onkeyup="angular.element(this).scope().salaryCount1(this)" class="form-control rounded-0" ng-model="salary1" id="salary1" placeholder="Salary"  />
                                          <p ng-show="updatesubmit && salary1 == ''" class="text-danger">Salary is required.</p>
                                       </div>
                                       <div class="form-group">
                                          <label for="position">Per day<span class="red-text">*</span></label>
                                          <input numbers-only="numbers-only" readonly type="text" class="form-control rounded-0" ng-model="perday1" id="perday1" placeholder="Per day"  />
                                          <p ng-show="updatesubmit && perday1 == ''" class="text-danger">Per day is required.</p>
                                       </div>
                                       <div class="form-group">
                                          <label for="position"  >Per hour<span class="red-text">*</span></label>
                                          <input numbers-only="numbers-only" readonly type="text" class="form-control rounded-0" ng-model="perhour1" id="perhour" placeholder="Per hour"  />
                                          <p ng-show="updatesubmit && perhour1 == ''" class="text-danger">Per hour is required.</p>
                                       </div>
                                       <div class="form-group">
                                          <label for="state">Currency<span class="red-text">*</span></label>
                                          <select  id="currency" class="form-control" ng-model="currency1">
                                             <option value="">Select Currency</option>
                                             <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                                          </select>
                                          <p ng-cloak ng-show="submitteam && currency1 == ''" class="text-danger">Local currency is required.</p>
                                       </div>

                                       <div class="form-group">
                                          <label for="position"  >Hourly Rate<span class="red-text">*</span></label>
                                          <input numbers-only="numbers-only"  type="text" class="form-control rounded-0" ng-model="hourlyprice" id="hourlyprice" placeholder="Please enter hourly price"  />
                                          <p ng-show="updatesubmit && hourlyprice == ''" class="text-danger">Per hour is required.</p>
                                       </div>


                                       <div class="form-group">
                                          <label for="name"  >Access<span class="red-text">*</span></label>
                                          <select  class="form-control rounded-0" ng-model="access1" id="access"  >
                                             <option value="">Select access</option>
                                             <option value="5">HR</option>
                                             <option value="6">Project Manager (General)</option>
                                             <option value="2">Project Manager (Sales) </option>
                                             <option value="7">Employee (Sales)</option>
                                             <option value="3">Employees (General)</option>
                                             <!-- <option value="4">No access</option> -->
                                          </select>
                                          <p ng-show="updatesubmit && access1 == ''" class="text-danger">please select access.</p>
                                       </div>
                                       <div class="form-group mb-0">
                                          <label for="name"  >Department<span class="red-text">*</span></label>
                                          <select  class="form-control rounded-0" ng-model="department1" id="status">
                                             <option value="">Select Department</option>
                                             <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>
                                          </select>
                                          <p ng-cloak ng-show="updatesubmit && department1 == ''" class="text-danger">Please select department.</p>
                                       </div>
                                       <div class="form-group">
                                          <label for="mobile">About <span class="red-text">*</span></label>
                                          <textarea id="about" name="about" type="text" class="required is_required validate account_input form-control ckeditor" id="about" ng-model="about"></textarea>
                                          <p ng-show="updatesubmit && about == ''" class="text-danger">About is required.</p>
                                       </div>

                                       <!-- <div class="form-group">
                                          <p  >Choose Profile Image</p>

                                          <div class="custom-file w-100">

                                            <input onchange="angular.element(this).scope().imageupload(this)" type="file"  name="empPic" id="empPic">

                                            <img src="" height="80" width="100"  id="teamviewimg" >

                                          </div>
                                          </div> -->
                                       <div class="form-group">
                                          <label for="name"  >Status<span class="red-text">*</span></label>
                                          <select  class="form-control rounded-0" ng-value="" ng-model="status1" id="status1" >
                                             <option value="">Select Status</option>
                                             <option value="1">Active</option>
                                             <option value="0">Inactive</option>
                                          </select>
                                          <p ng-show="updatesubmit && status1 == ''" class="text-danger">Please select status.</p>
                                       </div>
                                       <div class="form-group">
                                          <label>Joining Date<span class="red-text">*</span></label>
                                          <input readonly  type="text" mydatepicker="" class="form-control" ng-model="joiningdate1" ng-value="joiningdate1" name="joiningdate1" id="joiningdate1">
                                          <p ng-cloak ng-show="submitteam && joiningdate1 == ''" class="text-danger">Joining date is required.</p>
                                       </div>

                                       <div class="">
                                          <a hand="" id="plusicon">Add Work history <i ng-click="experienceAdd(this)" class="fa fa-fw fa-plus-square"></i></a>
                                       </div>
                                       <!-- <div class="row"> -->
                                       <div ng-class="{ 'experienceborder' : key != 0  }" class="" ng-if="experience.length != 0" ng-repeat="(key,x) in experience">
                                          <div class="row">
                                             <div class="form-group col-sm-6">
                                                <label for="mobile"> Month <span class="red-text">*</span></label>
                                                <select   class="form-control required is_required validate account_input" id="year" ng-model="x.MonthStart">
                                                   <option value="">Select Month</option>
                                                   <option value="{{ month[key] }}" ng-repeat="(key,x) in month">{{ month[key] }}</option>
                                                </select>
                                                <p ng-show="updatesubmit && x.MonthStart == ''" class="text-danger">Month is required.</p>
                                             </div>
                                             <div class="form-group col-sm-6">
                                                <label for="mobile">Year <span class="red-text">*</span></label>
                                                <select class="form-control"   id="year" ng-model="x.YearStart">
                                                   <option value="">Select Year</option>
                                                   <option value="{{ years[key] }}" ng-repeat="(key,x) in years">{{ years[key] }}</option>
                                                </select>
                                                <p ng-show="updatesubmit && x.YearStart == ''" class="text-danger">Year is required.</p>
                                             </div>
                                          </div>
                                          <div class="row" ng-if="x.working == 0 && key != 0">
                                             <div class="form-group col-sm-6">
                                                <label for="mobile"> Month <span class="red-text">*</span></label>
                                                <select   class="form-control required is_required validate account_input" id="year" ng-model="x.MonthEnd">
                                                   <option value="">Select Month</option>
                                                   <option value="{{ month[key] }}" ng-repeat="(key,x) in month">{{ month[key] }}</option>
                                                </select>
                                                <p ng-show="updatesubmit && x.MonthEnd == ''" class="text-danger">Month is required.</p>
                                             </div>
                                             <div class="form-group col-sm-6">
                                                <label for="mobile">Year <span class="red-text">*</span></label>
                                                <select   class="form-control required is_required validate account_input" id="year" ng-model="x.YearEnd">
                                                   <option value="" >Select Year</option>
                                                   <option value="{{ years[key] }}" ng-repeat="(key,x) in years">{{ years[key] }}</option>
                                                </select>
                                                <p ng-show="updatesubmit && x.YearEnd == ''" class="text-danger">year is required.</p>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <a ng-if="key != 0" hand id="plusicon" class="pull-right trash-btn">  <i ng-click="deleteexperience(key)" class="fa fa-trash"></i></a>
                                             <label for="mobile">Designation <span class="red-text">*</span></label>
                                             <input placeholder="Please enter designation" id="d" name="ds" type="text" class="form-control required is_required validate account_input" id="about" ng-model="x.designation" ng-value="x.designation">
                                             <p ng-show="updatesubmit && x.designation == ''" class="text-danger">Designation is required.</p>
                                          </div>
                                          <div class="form-group">
                                             <label>Company Name<span class="red-text">*</span></label>
                                             <input placeholder="Please enter comppany name" type="text" id="company" class="form-control" ng-model="x.company">
                                             <p ng-show="updatesubmit && x.company == ''" class="text-danger">Company is required.</p>
                                          </div>
                                          <div class="form-group">
                                             <label for="mobile">Job resposibilities<span class="red-text">*</span></label>
                                             <textarea placeholder="Please enter job resposibilities"  id="description" name="description" type="text" class="form-control required is_required validate account_input" id="description" ng-model="x.description" ng-value="x.description"></textarea>
                                             <p ng-show="updatesubmit && x.description == ''" class="text-danger">Job resposibilities is required.</p>
                                          </div>
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
                                      <button type="button" ng-click="delete_team(dkey,did)" class="btn btn-danger" id="confirm">Delete</button>

                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- delete confirm modal -->
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
                           <!-- logo crop -->
                           <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h4 class="modal-title">Image Crop</h4>
                                    </div>
                                    <div class="modal-body">
                                       <div class="cropArea">
                                          <img-crop image="myImage" result-image="myCroppedImage"></img-crop>
                                       </div>
                                       <div>Cropped Image:</div>
                                       <div><img ng-src="{{myCroppedImage}}" /></div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" ng-click="imageupload11()" class="btn btn-success" >Submit</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- logo crop -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<!--end-main-container-part-->
