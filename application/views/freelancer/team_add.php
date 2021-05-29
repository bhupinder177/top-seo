<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Add Employee</li>
      </ol>
   </section>
   <section class="content">
      <div ng-cloak  ng-app="myApp88" ng-controller="myCtrt88">
         <div id="content">

<div class="team-pro">
   <div  class="social-links-area p-3 bg-white">
      <!-- <p class="text-info">
         Add Employee -->
         <!--button type="button" id="addEmp" class="d-block mt-3 rounded-0 pointer btn btn-sm btn-warning text-dark"><i class="fa fa-plus mr-1"></i>Add More Employee</button-->
      <!-- </p> -->
      <div class="top-rated-emp-container">
         <form method="post" >
            <div class="row">
               <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <label for="name">Employee Name<span class="red-text">*</span></label>
                     <input type="text" class="form-control rounded-0 characteronly" ng-model="name" id="name" placeholder="Please enter employee name"  />
                     <p ng-cloak ng-show="submitteam && name == ''" class="text-danger">Name is required.</p>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <label for="name">Employee Email<span class="red-text">*</span></label>
                     <input onkeyup="angular.element(this).scope().ctrl(this)" type="text" class="form-control rounded-0" ng-model="email" id="email" placeholder="Please enter employee Email"  />
                     <p ng-cloak ng-show="submitteam && email == ''" class="text-danger">Email is required.</p>
                     <p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <label for="position">Phone Number<span class="red-text">*</span></label>
                     <input numbers-only="numbers-only" type="text" class="form-control phonenumber" ng-model="phone" id="phone" placeholder="Please enter phone number"  />
                     <p ng-cloak ng-show="submitteam && phone == ''" class="text-danger">Phone is required.</p>
                     <p ng-cloak ng-show="phone != '' && phone.length < 10 || phone.length > 11" class="text-danger">Please enter valid phone number.</p>
                     <!-- <span id="valid-msg" class="hide">✓ Valid</span>
                     <span id="error-msg" class="hide"></span> -->
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <label for="position"  >Skype ID<span class="red-text">*</span></label>
                     <input type="text" class="form-control rounded-0" ng-model="skype" id="skype" placeholder="Please enter skype id"  />
                     <p ng-cloak ng-show="submitteam && skype == ''" class="text-danger">Skype id is required.</p>
                  </div>
               </div>
               <!-- <div class="col-sm-6">
                  <div class="form-group d-inline-block mr-5">
                    <label for="position"  >Address*</label>
                     <input type="text" class="form-control rounded-0" ng-model="address" id="address" placeholder="Address"  />
                       <p ng-cloak ng-show="submitteam && address == ''" class="text-danger">Address is required.</p>
                  </div>
                  </div> -->
               <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <label for="position"  >Designation<span class="red-text">*</span></label>
                     <input type="text" class="form-control rounded-0" ng-model="designation" id="designation" placeholder="Please enter designation" />
                     <p ng-cloak ng-show="submitteam && designation == ''" class="text-danger">Designation is required.</p>
                  </div>
               </div>
               <!-- <div class="form-group d-inline-block mr-2">
                  <label for="position"  >Hourly Price*</label>

                  <input type="text" class="form-control rounded-0" ng-model="hourly" id="hourly" placeholder="Hourly Price"  />
                  <p ng-cloak ng-show="submitteam && hourly == ''" class="text-danger">Hourly price is required.</p>
                  </div> -->
               <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <label for="name"  >Skill<span class="red-text">*</span></label>
                     <select  class="form-control rounded-0" ng-model="skill" id="skill">
                        <option value="">Select Skill</option>
                        <option ng-repeat="(key,x) in services" ng-init="services = key" value="{{ x.id }}">{{ x.name }}</option>
                     </select>
                     <p ng-cloak ng-show="submitteam && skill == ''" class="text-danger">Please select Skill.</p>
                     <!-- <p ng-cloak ng-show="services.length == 0" class="text-danger"><a href="<?php echo base_url(); ?>services/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">Firstly, please add skills from services page</a> </p> -->
                  </div>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                     <label for="state">Currency<span class="red-text">*</span></label>
                     <select disabled=""  id="currency" class="form-control" ng-model="currency">
                        <option value="">Select Currency</option>
                        <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                     </select>
                     <p ng-cloak ng-show="submitteam && currency == ''" class="text-danger">Currency is required.</p>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                     <label for="position"  >Salary<span class="red-text">*</span></label>
                     <input numbers-only="numbers-only" type="text" onkeyup="angular.element(this).scope().salaryCount(this)" class="form-control rounded-0" ng-model="salary" id="salary" placeholder="Please enter per month salary" />
                     <p ng-cloak ng-show="submitteam && salary == ''" class="text-danger">Salary is required.</p>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                     <label for="position"  >Per Day<span class="red-text">*</span></label>
                     <input numbers-only="numbers-only" readonly  type="text" class="form-control rounded-0" ng-model="perday" id="perday" placeholder="Per day salary"  />
                     <!-- <a ng-cloak ng-show="salary != '' && perday == ''" target="_blank" href="<?php echo base_url(); ?>work-scheduling/<?php echo $this->session->userdata['clientloggedin']['url']; ?>"  >Firstly add working hours from Manage work hours. </a> -->

                  </div>
               </div>

               <div class="col-lg-6 col-md-6">
                  <div class="form-group ">
                     <label for="position">Per Hour Salary<span class="red-text">*</span></label>
                     <input readonly numbers-only="numbers-only" type="text"  class="form-control rounded-0" ng-model="perhour" id="perhour" placeholder="Per Hour"  />
                     <!-- <p ng-cloak ng-show="submitteam && perhour == ''" class="text-danger">Per hour is required.</p> -->
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="form-group ">
                     <label for="name"  >Access<span class="red-text">*</span></label>
                     <select onchange="angular.element(this).scope().accesschange(this)"  class="form-control rounded-0" ng-model="access" id="access"   >
                        <option value="">Select Access</option>
                        <option value="5">HR</option>
                        <option value="6">Project Manager (General)</option>
                        <option value="2">Project Manager (Sales) </option>
                        <option value="7">Employee (Sales)</option>
                        <option value="3">Employee (General)</option>
                        <!-- <option value="4">No access</option> -->
                     </select>
                     <p ng-cloak ng-show="submitteam && access == ''" class="text-danger">Please select access.</p>
                  </div>
               </div>
               <div ng-if="access == 3" class="col-lg-6 col-md-12">
                  <div ng-if="access == 3"  class="form-group ">
                     <label for="name"  >Project</label>
                     <select  class="form-control rounded-0" ng-model="project" id="project"   >
                        <option value="">Select project</option>
                        <option  ng-repeat="(key,x) in allproject" ng-init="allproject = key" value="{{ x.contractId }}">{{ x.jobTitle }}</option>
                     </select>
                  </div>
               </div>

               <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <label for="name"  >Department<span class="red-text">*</span></label>
                     <select  class="form-control rounded-0" ng-model="department" id="department">
                        <option value="">Select Department</option>
                        <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>
                     </select>
                     <p ng-cloak ng-show="submitteam && department == ''" class="text-danger">Please select department.</p>
                     <!-- <p ng-cloak ng-show="alldepartment.length == 0" class="text-danger"><a target="_blank" href="<?php echo base_url(); ?>departments/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">Firstly, please add department from department page</a> </p> -->
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <p  >Choose Profile Image<span class="red-text">*</span></p>
                     <!-- onchange="angular.element(this).scope().imageupload(this)" -->
                     <input  type="file" class="form-control" name="empPic" id="logocroped">
                     <img id="imageview2" style="display:none" src="" height="100" width="100" >
                     <p ng-cloak ng-show="submitteam && !companylogoerror &&  image == ''" class="text-danger">Image is required.</p>
                     <p ng-cloak ng-show="companylogoerror" class="text-danger">Invalid Image format</p>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <p  >Joining Date<span class="red-text">*</span></p>
                     <input  type="text" placeholder="Please select joining date" mydatepicker="" class="form-control" ng-model="joiningdate" ng-value="joiningdate" name="joiningdate" id="joiningdate">
                     <p ng-cloak ng-show="submitteam && joiningdate == ''" class="text-danger">Joining date is required.</p>
                  </div>
               </div>
               <!-- <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <label for="name"  >Status<span class="red-text">*</span></label>
                     <select  class="form-control rounded-0" ng-model="status" id="status">
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                     </select>
                     <p ng-cloak ng-show="submitteam && status == ''" class="text-danger">Please select status.</p>
                  </div>
               </div> -->
               <div class="col-sm-12">
                  <div class="form-group d-inline-block mb-0">
                     <!-- form-control bg-primary border border-primary text-white pointer rounded-0 -->
                     <input ng-click="saveteam()" type="button" id="submit" value="Add Employee" name="addEmp" class="btn btn-success">
                  </div>
               </div>

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
                        <div ng-if="plan.employee != total && plan.employee >= total" class="modal-footer">
                           <button  type="button" ng-click="imageupload11()" class="btn btn-success" >Submit</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- logo crop -->

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
           <!-- info -->
           <div class="modal fade" id="companyinfoupdate" role="dialog">
   <div class="modal-dialog">

     <!-- Modal content-->
      <div class="modal-wrapper">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title"></h4>
       </div>
       <div class="modal-body pd">
         <div class="popup-bd">
           <div class="ct-img flt">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/cat-img.png">
           </div>
           <div class="ct-content flt">
             <h3>Alert</h3>
             <h2>Meow User!!</h2>
<p> Make sure you have data in <a target="_blank" href="<?php echo base_url(); ?>services/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">Skills</a>, <a href="<?php echo base_url(); ?>departments/<?php echo $this->session->userdata['clientloggedin']['url']; ?>" target="_blank" >Department</a> and <a target="_blank" href="<?php echo base_url(); ?>work-scheduling/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">Working hours</a></p>
           </div>

         </div>
       </div>
       <div class="modal-footer pd">

       </div>
     </div>
 </div>

   </div>
 </div>
           <!-- info -->

            </div>
         </form>
      </div>
   </div>

 </div>
</div>
</div>
</section>
</div>
