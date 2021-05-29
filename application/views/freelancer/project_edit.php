<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
     <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
        <li class="active">Edit Project Details</li>
      </ol>
    </section>


<section class="content portfolio-cont check">
  <div class="container-fluid">
        <div ng-cloak  ng-app="myApp48" ng-controller="myCtrt48">
          <div id="content">

  <!-- Main content -->

                    <div class="row box content-box clearfix">
                         <div class="col-md-12">
                    <h3>Details</h3>
                  </div>
                        <div class="col-sm-6">
                  <div class="form-group">
                    <label>Project Name<span class="red-text">*</span></label>
                    <input type="text" placeholder="Please enter project name" ng-model="projectname" ng-value="projectname" class="form-control">
                    <p ng-show="submitp && !projectname" class="text-danger">Project name is required.</p>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="state">Currency<span class="red-text">*</span></label>
                    <select  id="currency" class="form-control" ng-model="currency">
                      <option value="">Select Currency</option>
                      <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                    </select>
                    <p ng-cloak ng-show="submitp && currency == ''" class="text-danger">Please select currency.</p>
                  </div>
                </div>

                 <div class="col-sm-3">
                  <div class="form-group">
                    <label>Hourly Price<span class="red-text">*</span></label>
                    <input placeholder="Please enter hourly price"  ng-keyup="totalbuget()"  type="text" ng-model="hourlyprice" ng-value="hourlyprice" class="numberdecimalonly form-control">
                    <p ng-show="submitp && !hourlyprice" class="text-danger">Hourly price is required.</p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>No. of Hours</label>
                    <input readonly placeholder="Please enter no of hours" numbers-only="numbers-only" type="text" ng-model="totalhour" ng-value="totalhour" class="form-control">
                    <p ng-show="submitp && totalhour == ''" class="text-danger">No of hours is required.</p>
                 </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Budget</label>
                    <input readonly numbers-only="numbers-only" id="budget" type="text" ng-model="budget" ng-value="budget" class="form-control">
                    <p ng-show="submitp && budget == ''" class="text-danger">Buget is required.</p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Project Csv</label>
                    <input onchange="angular.element(this).scope().csvdataexport(this)" type="file"  id="csv" ng-model="csv" ng-value="csv" class="form-control">
                    <p ng-show="submitp && csv == ''" class="text-danger">Csv is required.</p>
                    <a href="<?php echo base_url(); ?>assets/workhourcsv/sample_mileston_format.csv">Download Milestone Format (CSV)</a>
                    </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group assigntag ">
                    <label>Project Document</label>
                    <input type="file" onchange="angular.element(this).scope().documentUpload(this)" multiple id="document"  class="form-control">
                    <ul  ng-if="document.length != 0" >
                     <li ng-repeat="(keyu,x) in document"><a hand  target="_blank" href="<?php echo base_url(); ?>assets/project_doc/{{ x }}" value="{{ u.id }}">{{ x }}</a><span ng-click="removedocument(keyu)"><i class="fa fa-times"></i></span></li>
                   </ul>
                  </div>
                </div>
                        <!-- <div class="col-md-12 text-center"> <input ng-click="addDocument()" class="btn btn-success" type="button" name="add" value="Add"></div> -->
                      </div>

                      <div class="row box content-box clearfix">
                  <div class="col-md-12">
                    <h3>Client Details</h3>
                  </div>

                <div class="col-sm-6">
                   <div class="form-group">
                    <label>Project Source<span class="red-text">*</span></label>
                    <select   id="leadcapture" ng-model="projectsource"  class="form-control">
                      <option value="">Select Source</option>
                      <option ng-repeat="(key,x) in allsource" value="{{ x.lead_sourceId }}">{{ x.source }}</option>

                    </select>
                    <p ng-show="submitp && projectsource == ''" class="text-danger">Project sourec is required.</p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Client Name<span class="red-text">*</span></label>
                    <input type="text" ng-model="clientname" ng-value="clientname" class="form-control">
                    <p ng-show="submitp && clientname == ''" class="text-danger">Client name is required.</p>
                  </div>
                </div>


                <div class="col-sm-6">
               <div class="form-group">
                    <label>Email<span class="red-text">*</span></label>
                    <input onkeyup="angular.element(this).scope().ctrl(this)" id="email" type="text" ng-model="email" ng-value="email" class="form-control">
                    <p ng-show="submitp && email == ''" class="text-danger">Email is required.</p>
                    <p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>
                   </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label>Phone<span class="red-text">*</span></label>
                    <input numbers-only="numbers-only" id="phone" type="text" ng-model="phone" ng-value="phone" class="form-control phonenumber">
                    <p ng-show="submitp && phone == ''" class="text-danger">Phone is required.</p>
                    <p ng-cloak ng-show="phone != '' && phone.length < 10 || phone.length > 11" class="text-danger">Please enter valid number.</p>
                    <!-- <span id="valid-msg" class="hide">✓ Valid</span>
                    <span id="error-msg" class="hide"></span> -->
                    </div>
                </div>

                <div class="col-sm-6">
               <div class="form-group">
                    <label>Skype</label>
                    <input type="text" ng-model="skype" ng-value="skype" class="form-control">
                    <!-- <p ng-show="submitp && skype == ''" class="text-danger">Skype is required.</p> -->
                 </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                  <label>Contact Person<span class="red-text">*</span></label>
                  <input placeholder="Please enter contact person" type="text" ng-model="contactperson" ng-value="contactperson" class="form-control">
                  <p ng-show="submitp && !contactperson" class="text-danger">Contact person is required.</p>
                   </div>
              </div>
</div>



                     <div class="row box content-box clearfix">
<div class="col-md-12">
                    <h3>Project Details</h3>
                  </div>

              <div class="col-sm-6">
               <div class="form-group">
                  <label>Project Manager<span class="red-text">*</span></label>
                  <select  ng-model="projectmanager" class="form-control">
                    <option value="" >Select Project Manager</option>
                    <option ng-repeat="(key,x) in allprojectmanager" value="{{ x.u_id }}" >{{ x.name }}</option>
                  </select>
                  <p ng-show="submitp && !projectmanager " class="text-danger">Project manager is required.</p>
               </div>
              </div>

              <div class="col-sm-6">
               <div class="form-group">
                  <label>Upfront Amount</label>
                  <input  placeholder="Please enter upfront amount"  ng-value="upfront" ng-model="upfront" class="form-control numberonly">
               </div>
              </div>



                           <div class="col-sm-6">
                         </div>
                         <div class="clearfix"></div>

                  <!-- milestone -->
                  <div class="col-md-12" style="margin: 10px 0">
                   <div class="mile-sec">
                <!-- <a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="fa fa-fw fa-plus-square"></i></a> -->

                <div class="cstm-mile" style="margin-bottom:5px;" class="form-inline milestone" ng-repeat="(key,x) in milestones">
                  <a ng-if="milestones.length - 1 == key" hand id="plusicon" class="d-block">Milestone <i ng-click="milestoneadd(key)" class="fa fa-fw fa-plus-square"></i></a>

                    <div class="milestonemain px-3">
                  <div  class="form-group">
                    <label>M{{ key + 1  }} <span class="red-text">*</span><a  ng-if="key != 0" hand id="plusicon" class="">  <i ng-click="deletemilestone(key)" class="fa fa-fw fa-trash"></i></a>
</label>
                    <input type="text" name='title{{$index}}' ng-required='true' class="form-control" ng-model="x.title" ng-value="x.title"  id="email" placeholder="Please enter milestone title" name="title">
                    <p ng-show="submitp && x.title == ''" class="text-danger">Title is required.</p>
                  </div>

                  <div  class="form-group">
                    <input type="text"   readonly  numbers-only="numbers-only" ng-model="x.hours" ng-value="x.hours" class="numberonly form-control" id="pwd" placeholder="Please enter hour" name="hour">
                    <p ng-show="submitp && x.hours == ''" class="text-danger">Hours is required.</p>
                  </div>
                        </div>

                    <div class="col-md-12">
                      <a hand id="plusicon">Sub Tasks  <i ng-click="taskadd(key)" class="fa fa-fw fa-plus-square"></i> </a>
                    </div>

                    <div class="row">
                  <div class="col-md-6"  ng-repeat="(key2,x2) in x.task">
                     <div class="subtask">
                    <div class="col-md-12">
                         <a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fa fa-fw fa-trash"></i></a>
                      <div class="form-group">
                        <label>S.T {{ key2+1 }} <span class="red-text">*</span></label>
                        <input type="text"  id="title" placeholder="task" ng-model="x2.task" ng-value="x2.task"   class="form-control title required"  >
                        <p ng-show="submitp && x2.task == ''" class="text-danger">Task is required.</p>
                        <!-- &nbsp; <a hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a> -->
                      </div>
                      <div class="form-group">
                        <input ng-keyup="counttotalhour()"  type="text" numbers-only="numbers-only"  id="title" placeholder="Please enter hours" ng-model="x2.hours" ng-value="x2.hours"   class="form-control title required"  >
                        <p ng-show="submitp && x2.hours == ''" class="text-danger">Hours is required.</p>
                        <p ng-show="submitp && x2.hours && x2.hours == 0" class="text-danger">Enter valid hours.</p>

                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea  id="title" placeholder="Please enter description" ng-model="x2.description" ng-value="x2.description"   class="form-control title required"  ></textarea>
                        <p ng-show="submitp && x2.description == ''" class="text-danger">Description is required.</p>
                        <!-- &nbsp; <a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fa fa-fw fa-trash"></i></a>  -->

                      </div>
                    </div>



                  </div>
                      </div>
                    </div>
                </div>



                </div>

                <!-- milestone -->

                <div class="clearfix text-center">
                  <input class="btn btn-success" type="button" ng-click="updateproject()" value="submit" name="submit">
                </div>
        </div>


              </div>
             </div>

            </div>
      </div>
       </section>
</div>
