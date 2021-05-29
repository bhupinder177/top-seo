<?php

include('sidebar.php');
?>


<div id="wrapper" class="content-wrapper">
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Assign Contract Detail</li>
  </ol>
</section>


<section class="content portfolio-cont project contractassigndetail">

  <div class="container1">

    <div class="no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp83" ng-controller="myCtrt83">
        <div id="content">
          <div id="content-header">



          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <p><b>Project Name :</b> {{ project.jobTitle }}</p>
                      <p><b>Contract Amount :</b>{{ project.code }} {{ project.symbol }} {{ project.contractAmount     }}</p>


                    </div>
                    <div class="col-sm-4">
                      <p><b>Client Name :</b> {{ project.name  }}</p>
                      <p><b>Email :</b> {{ project.email }} </p>
                    </div>
                    <div class="col-sm-4">
                      <p><b>Phone :</b> {{ project.countrycode }}{{ project.phone }} </p>
                      <p><b>Skype :</b> {{ project.skype }} </p>
                    </div>
                  </div>


                </div>
              </div>


                <div class="box-body">
                    <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead>
                    <tr>
                      <th><input ng-click="milestoneChecked($event)" type="checkbox"> Milestone</th>
                      <th>Task Name</th>
                      <th>Hours</th>
                      <th>Status</th>
                      <th>Assignment</th>
                      <th>Start Date</th>
                      <th>Due Date</th>
                      <th>Client Status</th>

                    </tr>
                  </thead>

                    <tbody ng-repeat="(key,x) in project.milestone" >
                      <tr  ng-repeat="(key2,x2) in x.task">
                        <td><input name="check" value="1" ng-click="taskChecked(key,key2,$event)" ng-checked="x2.checked" type="checkbox"> <span ng-if="$index == 0">{{ x.name }}</span></td>
                        <td>{{ x2.name  }}</span>

                        </td>
                        <td><span ng-if="x2.hours">({{ x2.hours  }})</span> {{ x2.time }} </td>
                        <td >
                          <span  ng-if="x2.status == 1">Done</span>
                          <span  ng-if="x2.status == 2">Pending</span>
                          <span  ng-if="x2.status == 3">Confirmed</span>
                          <span  ng-if="x2.status == 4">PostPone</span>
                          <span  ng-if="x2.status == 5">Start</span>
                          <span  ng-if="x2.status == 6">End</span>
                          <span  ng-if="x2.status == 7">Paused</span>
                        </td>
                        <td>
                          <div class=" form-group">
                          <select ng-model="x2.assignedTo" class="form-control">
                            <option  value="">Select Assigned To</option>
                            <option ng-repeat="(key,x) in allteam" value="{{ x.u_id }}">{{ x.name }}</option>
                          </select>
                        </div>
                        </td>
                        <td width="140px">
                          <input readonly="" mydatepicker1 data-key="{{ key }}" data-key1="{{ key2 }}"  ng-model="x2.startDate" ng-value="x2.startDate"  type="text" name="startdate" class="form-control cenddate startdate{{ x2.id }}" >
                          <p ng-if="x2.startDate == '' && x2.checked == 1" class="red-text">Start date is required.</p>

                        </td>
                        <td width="140px">
                          <input readonly="" mydatepicker2 data-key="{{ key }}" data-key1="{{ key2 }}" ng-model="x2.dueDate" ng-value="x2.dueDate" type="text" name="enddate" class="form-control cenddate enddate{{ x2.id }}" >
                          <p ng-if="x2.dueDate == ''  && x2.checked == 1" class="red-text">Due date is required.</p>
                          <p ng-if="x2.dueDate != '' && x2.startDate > x2.dueDate && x2.checked == 1" class="red-text">Please select valid date.</p>
                         </td>
                        <td>
                          <div class=" form-group">
                          <select disabled onchange="angular.element(this).scope().changeclientStatus(this)" ng-model="x2.clientStatus" class="form-control">
                            <option  value="">Select Client Status</option>
                            <option data-id="{{ x2.id }}"  value="1">Completed</option>
                            <option data-id="{{ x2.id }}" value="2">Pending</option>
                          </select>
                        </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="form-group">
                    <!-- <input ng-click="SaveMilestone()" type="button" value="Save" class="btn btn-success" > -->
                    <!-- <input ng-click="edittask()" type="button" value="Edit" class="btn btn-success" >
                    <input ng-click="addsubtask()" type="button" value="Add Subtask" class="btn btn-success" > -->
                    <input ng-click="AssignMilestone()" type="button" value="Assign" class="btn btn-success" >
                   </div>
                </div>
              </div>
              <!-- <input type="text" name="name" class="taskassignstartdate" > -->

              <div id="addtodo" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                       <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Add Subtask</h4>
                       </div>
                       <div class="modal-body">
                          <div class="row">
                             <div class="col-md-12">
                                <div class="form-group ">
                                   <label for="name" class="m-0">Task<span class="red-text">*</span></label>
                                   <input id="name" class="form-control" name="name" ng-model="name" ng-value="name" placeholder="Please enter task">
                                   <p ng-show="submitl && name == ''" class="text-danger">Please enter task.</p>
                                </div>
                             </div>

                             <div class="col-md-12">
                                <div class="form-group ">
                                   <label for="name" class="m-0">Hours<span class="red-text">*</span></label>
                                   <input placeholder="Please enter hours" class="form-control rounded-0" ng-model="hours" ng-value="hours" id="status">
                                   <p ng-cloak ng-show="submitl && hours == ''" class="text-danger">Please enter hours.</p>
                                </div>
                             </div>

                             <div class="col-md-12">
                                <div class="form-group ">
                                   <label for="name" class="m-0">Task Details<span class="red-text">*</span></label>
                                   <textarea placeholder="Please select task details" class="form-control rounded-0" ng-model="description" ng-value="description" id="status"></textarea>
                                   <p ng-cloak ng-show="submitl && description == ''" class="text-danger">Please enter task detail.</p>
                                </div>
                             </div>

                          </div>
                       </div>
                       <div class="modal-footer">
                          <button type="button" ng-click="submitsubtask()" class="btn btn-success">Submit</button>
                       </div>
                    </div>
                 </div>
              </div>
              <!--*************** add task modal***************** -->



              </div>
            </div>

            <!-- delete confirm modal -->
            <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to remove  this employee ?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- delete confirm modal -->

          </div>
        </section>
      </div>
    </div>
