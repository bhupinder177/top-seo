<?php include('sidebar.php');?>
<div id="wrapper" class="content-wrapper project_Add">
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
         <li class="active">Edit Lead</li>
      </ol>
   </section>
   <section class="content portfolio-cont">
      <div class=" no-margin user-dashboard-container">
         <div ng-cloak  ng-app="myApp67" ng-controller="myCtrt67">
            <div id="content">
               <!-- Main content -->
               <div class="box content-box p-3 pb-0">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Client Name <span class="red-text">*</span></label>
                           <input placeholder="Please enter client name" type="text" ng-model="clientName" ng-value="clientName" class="form-control">
                           <p ng-show="submitp && projectname == ''" class="text-danger">Client name is required.</p>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Phone </label>
                           <input placeholder="Please enter phone"  type="tel" id="phone" ng-model="phone" ng-value="phone" class="form-control">
                           <!-- <p ng-show="submitp && phone == ''" class="text-danger">Phone number is required.</p> -->
                           <!-- <span id="valid-msg" class="hide">✓ Valid</span>
                           <span id="error-msg" class="hide"></span> -->

                      <p ng-cloak ng-show="phone != '' && phone.length < 10 || phone.length > 11" class="text-danger">Please enter valid number.</p>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Email </label>
                           <input id="email" onkeyup="angular.element(this).scope().ctrl(this)" placeholder="Please enter email" type="text" ng-model="email" ng-value="email" class="form-control">
                           <!-- <p ng-show="submitp && email == ''" class="text-danger">Email is required.</p> -->
                           <p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>

                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Skype</label>
                           <input placeholder="Please enter skype" type="text" ng-model="skype" ng-value="skype" class="form-control">
                           <!-- <p ng-show="submitp && skype == ''" class="text-danger">Skype is required.</p> -->
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Url </label>
                           <input placeholder="http://www.example.com" onkeyup="angular.element(this).scope().websitectrl(this)" type="text" ng-model="website" ng-value="website" class="form-control">
                           <!-- <p ng-show="submitp && website == ''" class="text-danger">Website is required.</p> -->
                           <p ng-show="website != '' && websitevalide " class="text-danger">Please enter valid  url.</p>

                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Job title <span class="red-text">*</span></label>
                           <input placeholder="Please enter job title" type="text" ng-model="jobtitle" ng-value="jobtitle" class="form-control">
                           <p ng-show="submitp && jobtitle == ''" class="text-danger">Job title is required.</p>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Skill <span class="red-text">*</span>(Hit enter to create tags of the word entered) </label>
                           <input placeholder="Please enter skill"  type="text" ng-enter="serviceadd()"   class="skill form-control">
                           <div id="tags"><a ng-repeat="x in skill"  > {{ x }}<span hand ng-click="deleteservice($index)" > &times; </span></a></div>
                           <p ng-show="submitp && skill.length == 0" class="text-danger">Skill is required.</p>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Job Description <span class="red-text">*</span></label>
                           <textarea placeholder="Please enter job description"  type="text" ng-model="jobdescription" ng-value="jobdescription" class="form-control"></textarea>
                           <p ng-show="submitp && jobdescription == ''" class="text-danger">Job description is required.</p>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Upload file</label>
                           <input onchange="angular.element(this).scope().documentUpload(this)" type="file"  id="csv"  class="form-control">
                           <a target="_blank" href="<?php echo base_url(); ?>assets/lead/{{ upload }}">{{ upload }}</a>
                           <!-- <p ng-show="submitp && csv == ''" class="text-danger">Csv is required.</p> -->
                           <p ng-show="fileerror " class="text-danger ng-hide">Invalid format</p>
                        </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label>Lead Captured <span class="red-text">*</span></label>
                         <select   id="leadcapture" ng-model="leadcapture"  class="form-control">
                           <option value="">Select Lead Source</option>
                           <option ng-repeat="(key,x) in allsource" value="{{ x.lead_sourceId }}">{{ x.source }}</option>

                         </select>
                         <p ng-show="submitp && leadcapture == ''" class="text-danger">Lead capture is required.</p>
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="form-group">
                         <label>Project Type <span class="red-text">*</span></label>
                         <select  ng-model="projecttype"  class="form-control">
                           <option value="">Select Project Type</option>
                           <option value="1">Fixed</option>
                           <option value="2">Hourly</option>
                         </select>
                         <p ng-show="submitp && projecttype == ''" class="text-danger">Please select project type.</p>
                       </div>
                     </div>

                     <div class="col-md-6">
                         <div class="form-group">
                         <label>Time Zone <span class="red-text">*</span></label>

                         <select  id="timezone" class="form-control" ng-model="timezone">
                           <option value="">Select timezone</option>
                           <option ng-if="alltimezone.length != 0" ng-repeat="(key,x) in alltimezone"   value="{{ x.zone }}{{ x.diff_from_GMT }}">{{ x.zone }} {{ x.diff_from_GMT }} </option>
                         </select>
                         <p ng-show="submitp && timezone == ''" class="text-danger">Please select is time zone.</p>
                       </div>
                     </div>

                     <div ng-repeat="(key,x) in info" class="col-md-12">
                           <hr>
                         <div class="row">
                             <div class="col-md-6">
                                  <div class="row">
                             <div class="col-md-6">
                        <a hand id="plusicon">Add Info <i ng-click="infoadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                             </div>
                                      <div class="col-md-6 text-right">
                                 <a  ng-if="key != 0" hand id="plusicon" class="">  <i ng-click="deleteinfo(key)" class="fa fa-fw fa-trash"></i></a>
                             </div>
                                 </div></div>
                             <div class="col-md-6"></div>
                             </div>
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label>Emp.Name <span class="red-text">*</span></label>
                                 <select ng-disabled="x.type == 1" type="text" ng-model="x.employeeId"  class="form-control">
                                    <option value="">Select Employee</option>
                                    <option ng-repeat="(key,x) in allteam" value="{{ x.u_id }}">{{ x.name }}</option>
                                 </select>
                                 <p ng-show="submitp && x.empName == ''" class="text-danger">Employee name is required.</p>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Currency <span class="red-text">*</span></label>
                                 <select ng-disabled="x.type == 1"  ng-model="x.currencyId"  class="form-control">
                                    <option value="">Select Currency</option>
                                    <option ng-repeat="(key,x) in allcurrency" value="{{ x.id }}">{{ x.code }} {{ x.symbol }}</option>
                                 </select>
                                 <p ng-show="submitp && x.currencyId == ''" class="text-danger">Currency is required.</p>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Budget <span class="red-text">*</span></label>
                                 <input ng-disabled="x.type == 1" placeholder="Please enter budget" numbers-only="numbers-only" id="budget" type="text" ng-model="x.budget" ng-value="x.budget" class="form-control">
                                 <p ng-show="submitp && x.budget == ''" class="text-danger">Budget is required.</p>
                                 <p ng-show="submitp && x.budget  && x.budget == 0" class="text-danger">Budget is required.</p>
                              </div>
                           </div>




                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="d-block">Date <span class="red-text">*</span></label>
                                 <input ng-disabled="x.type == 1" placeholder="Please enter date" data-datepicker="{theme: 'flat'}" id="date" type="text" ng-model="x.date" ng-value="x.date" class="form-control">
                                 <p ng-show="submitp && x.date == ''" class="text-danger">Date is required.</p>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label>Status <span class="red-text">*</span></label>
                                 <select ng-disabled="x.type == 1"   id="leadcapture" ng-model="x.status"  class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="0">New Lead</option>
                                    <option value="1">In progress</option>
                                    <option value="2">Not Engaged </option>
                                    <option value="3">Contact Made</option>
                                    <option value="4">Waiting For Details </option>
                                    <option value="5">Queries</option>
                                    <option value="6"> Needs Defined </option>
                                    <option value="7">Proposal Sent </option>
                                    <option value="8">In Negotiation</option>
                                    <option value="9">Presenting </option>
                                    <option value="10">Hired </option>
                                    <option value="11">Follow Up </option>
                                    <option value="12">Dead Lead</option>
                                    <option value="13">Converted to project</option>
                                 </select>
                                 <p ng-show="submitp && x.status == ''" class="text-danger">Status is required.</p>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label>Remarks <span class="red-text">*</span></label>
                                 <textarea ng-disabled="x.type == 1" placeholder="Please enter remark"  type="text" ng-model="x.remark" ng-value="x.remark" class="form-control"></textarea>
                                 <!-- <p ng-show="submitp && x.remark == ''" class="text-danger">Remark is required.</p> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                   <div class="clearfix">
                  <input class="btn btn-success" type="button" ng-click="save()" value="submit" name="submit">
               </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
