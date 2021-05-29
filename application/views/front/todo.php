<?php
   include('sidebar.php');
   ?>
<div ng-cloak ng-app="myApp45" ng-controller="myCtrt45" id="wrapper" class="content-wrapper task-manage">
   <!-- <h4>Active Task : {{ activetask }}</h4>
      <h4>Pending Task : {{ pendingtask }}</h4> -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a> > </li>
         <li class="active">Task Management</li>
      </ol>
   </section>
   <section class="content dep-cstm">
      <div class=" no-margin user-dashboard-container">
         <div >
            <div id="content">
               <div class="row">
                  <div class="col-md-12">
                     <div class="group-chat">
                        <div class="">
                           <ul class="nav nav-pills">
                              <li>
                                 <a data-toggle="tab" class="active show" href="#current">Current Tasks <span ng-if="currenttasktotal != 0">({{ currenttasktotal}})</span> <span ng-if="duetask != 0">Over Due ({{ duetask }})</span></a>
                              </li>
                              <li >
                                 <a data-toggle="tab" href="#alltask">All Tasks <span ng-if="alltasktotal != 0">({{ alltasktotal}})</span></a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div id="current" class="tab-pane fade in active show membership-table">
                                 <div class="box bg-white c-pass-sec">
                                    <div class="box-header p-3">
                                       <!-- row -->
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-2 form-group mb-0">
                                                   <select ng-model="cperpage | number" onchange="angular.element(this).scope().cchangePerPage(this)" class="form-control">
                                                      <option value="10">10</option>
                                                      <option value="20">20</option>
                                                      <option value="50">50</option>
                                                      <option value="100">100</option>
                                                   </select>
                                                </div>
                                                <!-- <div class="col-md col-sm-12 form-group">
                                                   <select ng-model="cspriority" id="spriority" class="form-control w-100">
                                                     <option value="">Select Priority</option>
                                                     <option value="1">High</option>
                                                     <option value="2">Medium</option>
                                                     <option value="3">Low</option>
                                                   </select >
                                                   </div> -->
                                                <div class="col-md-3  form-group mb-0">
                                                   <select id="st" class="form-control" name="st" ng-model="csstatus" >
                                                      <option  value="">Select Status</option>
                                                      <option  value="2">Yet to Start</option>
                                                      <option  value="7">Paused</option>
                                                      <option  value="5">Started</option>
                                                      <option  value="6">Completed</option>
                                                      <option  value="4">Request to PostPone</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-2  form-group mb-0">
                                                   <input type="button" ng-click="csearch()" class="btn btn-success w-100" value="Search" >
                                                </div>
                                                <div class="col-md-3 form-group mb-0">
                                                   <div class="add-task">
                                                      <select onchange="angular.element(this).scope().assignSearch(this)" ng-model="assign" class="form-control" >
                                                         <option value="">All</option>
                                                         <option value="1">Assigned to me</option>
                                                         <option value="2">Assigned by me</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-2 form-group mb-0">
                                                   <div class="add-task">
                                                      <a ng-click="todoopen()" class="btn btn-success">Add Task</a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- row -->
                                    </div>
                                    <div class="box-body">
                                       <div class="table-responsive">
                                          <table id="rankingTable" class="table table-condensed">
                                             <thead>
                                                <tr>
                                                   <th>S. No</th>
                                                   <th>Task ID</th>
                                                   <th>Type</th>
                                                   <th style="min-width: 100px;">Task Title</th>
                                                   <th>Assigned at</th>
                                                   <th style="min-width: 120px;">Start Date</th>
                                                   <th style="min-width: 120px;">Due Date</th>
                                                   <!--                                       <th>File</th>-->
                                                   <th style="min-width: 120px;">Assignment</th>
                                                   <!-- <th style="min-width: 120px;">Assigned By</th> -->
                                                   <th>Time Spent</th>
                                                   <th>Status</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr  ng-if="currenttodo.length != 0 && cloader == 1" ng-repeat="(key,x) in currenttodo"   >
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">{{ cstart + $index }}</td>
                                                   <td ng-class="{ 'duetask' : 1 == x.duetask }" ng-click="showhistory(x.id,x.assignedBy)">{{ x.taskId }}</td>
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">
                                                      <span ng-if="x.type == 1">Task</span>
                                                      <span ng-if="x.type == 2">Project</span>
                                                      <span ng-if="x.type == 3">Contract</span>
                                                      <span ng-if="x.type == 4">Gig</span>
                                                   </td>
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">{{ x.name }}</td>
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">
                                                      <span ng-if="x.date">{{ x.date | date }}</span> <span ng-if="x.date">at</span> <span ng-if="x.date">{{ x.date | time1 }}</span>
                                                   </td>
                                                   <!-- <td>
                                                      <span class="btn bg-green" ng-if="x.priority == 1">High</span>
                                                       <span class="btn bg-orange" ng-if="x.priority == 2">Medium</span>
                                                       <span class="btn bg-yellow" ng-if="x.priority == 3">Low</span>
                                                      </td> -->
                                                   <!-- <td>{{ x.department }}</td> -->
                                                   <td ng-click="showhistory(x.id,x.assignedBy)"><span ng-if="x.startDate && x.startDate != ''">{{ x.startDate | date }}</span></td>
                                                   <td ng-click="showhistory(x.id,x.assignedBy)"><span ng-if="x.dueDate && x.dueDate != ''">{{ x.dueDate | date }}</span></td>
                                                   <!--                                       <td><a target="_blank" href="<?php echo base_url(); ?>assets/todo/{{ x.file }}"><i class="fa fa-download" aria-hidden="true"></i></a></td>-->
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">
                                                      <span ng-if="x.assignedBy == userId">Assigned to {{ x.assignedto }}</span>
                                                      <span ng-if="x.assignedTo == userId"> Assigned by {{ x.assignedby }}</span>
                                                   </td>
                                                   <!-- <td>{{ x.assignedby }}</td> -->
                                                   <td ng-click="showhistory(x.id,x.assignedby)">
                                                      <span ng-if="x.hours">({{ x.hours }})</span>
                                                      <!-- <span ng-if="x.assignedBy == userId">{{ x.totaltime }}</span> -->
                                                      <span >{{ x.time }}</span>
                                                   </td>
                                                   <!-- <td>
                                                      <button ng-show="x.showbutton == 1 && !x.startTime || x.endTime  && x.tstatus != 3" ng-disabled="x.disabled"  ng-click="confirmstart(x.id,1)" class="btn btn-info">Start</button>
                                                      <button ng-show="x.showbutton == 1 && x.startTime && !x.endTime && x.tstatus != 3" ng-disabled="x.disabled"  ng-click="confirmstart(x.id,2)" class="btn btn-danger">End</button>
                                                      <button ng-show="x.showbutton == 1 && x.startTime && x.endTime && x.tstatus == 3"   class="btn btn-success">Completed</button>
                                                      </td> -->
                                                   <td class="form-group mb-0">
                                                      <select class="form-control" ng-model="x.status" ng-disabled="x.showreadonly || x.disabled " onchange="angular.element(this).scope().startTime(this)" >
                                                         <option ng-if="x.started == 0" data-task="{{ x.taskId }}" data-id="{{ x.id }}" value="2">Yet to Start</option>
                                                         <option ng-if="x.ended == 0" data-id="{{ x.id }}" data-task="{{ x.taskId }}" value="5">Started</option>
                                                         <option ng-if="x.ended == 1" data-id="{{ x.id }}" data-task="{{ x.taskId }}" value="5">Resumed</option>
                                                         <option ng-if="x.started == 1" data-task="{{ x.taskId }}" data-id="{{ x.id }}" value="7">Paused</option>
                                                         <option ng-if="x.started == 1" data-task="{{ x.taskId }}" data-id="{{ x.id }}" value="6">Completed</option>
                                                         <option ng-if="x.started == 0" data-task="{{ x.taskId }}" data-id="{{ x.id }}" value="4">Request to PostPone</option>
                                                      </select>
                                                   </td>
                                                   <td>
                                                      <div  class="dropdown ac-cstm text-right">
                                                         <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                         <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                                         </a>
                                                         <div class="dropdown-menu fadeIn">
                                                            <a ng-if="x.showdelete == 0 && x.started == 0 " class="dropdown-item" title="Edit todo" ng-click="edittodo(x.id)"><i class="fa fa-edit"></i> Edit</a>
                                                            <a ng-if="x.showdelete == 0 && x.started == 0" class="dropdown-item"  ng-click="confirm(x.id)" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                            <a ng-if="x.showdelete == 0 && x.file && x.file != '' "  class="dropdown-item" target="_blank" href="<?php echo base_url(); ?>assets/todo/{{ x.file }}"><i class="fa fa-download" aria-hidden="true"></i>File</a>
                                                            <a  class="dropdown-item" ng-click="viewtask(key,'2')"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                                            <a ng-if="x.status != 4 && x.status != 2 &&  x.status != 5 &&  x.assignedBy == userId"  class="dropdown-item" ng-click="reassign(x.id)"><i class="fa fa-eye" aria-hidden="true"></i>Reassign</a>
                                                         </div>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr ng-if="currenttodo.length == 0">
                                                   <td colspan="12" class="text-center">No Record Found.</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                       <div id="cpagination"></div>
                                    </div>
                                 </div>
                              </div>
                              <!-- current end -->
                              <!-- all task -->
                              <div id="alltask" class="tab-pane fade in  membership-table">
                                 <div class="box bg-white c-pass-sec">
                                    <div class="box-header p-3">
                                       <!-- row --> 
                                             <div class="row">
                                                <div class="col-md col-sm-12 form-group mb-0">
                                                   <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                                                      <option value="10">10</option>
                                                      <option value="20">20</option>
                                                      <option value="50">50</option>
                                                      <option value="100">100</option>
                                                   </select>
                                                </div>
                                                <!-- <div class="col-md col-sm-12 form-group">
                                                   <select ng-model="spriority" id="spriority" class="form-control w-100">
                                                     <option value="">Select Priority</option>
                                                     <option value="1">High</option>
                                                     <option value="2">Medium</option>
                                                     <option value="3">Low</option>
                                                   </select >
                                                   </div> -->
                                                <div class="col-md col-sm-12 form-group mb-0">
                                                   <select id="st" class="form-control" name="st" ng-model="sstatus" >
                                                      <option  value="">Select Status</option>
                                                      <option  value="2">Yet to Start</option>
                                                      <option  value="7">Paused</option>
                                                      <option  value="5">Started</option>
                                                      <option  value="6">Completed</option>
                                                      <option  value="4">Request to PostPone</option>
                                                   </select>
                                                </div>
												 <div class="col-md-3 form-group mb-0">
                                                   <div class="add-task">
                                                      <select onchange="angular.element(this).scope().allassignSearch(this)" ng-model="aassign" class="form-control" >
                                                         <option value="">All</option>
                                                         <option value="1">Assigned to me</option>
                                                         <option value="2">Assigned by me</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-2 col-sm-12 form-group mb-0">
                                                   <input type="button" ng-click="search()" class="btn btn-success w-100" value="Search" >
                                                </div> 
                                             </div> 
                                       <!-- row -->
                                    </div>
                                    <div class="box-body">
                                       <div class="table-responsive">
                                          <table id="rankingTable" class="table table-condensed">
                                             <thead>
                                                <tr>
                                                   <th>S. No.</th>
                                                   <th>Task ID</th>
                                                   <th>Type</th>
                                                   <th style="min-width: 190px;">Task Title</th>
                                                   <!-- <th>Priority</th> -->
                                                   <!-- <th>Dept</th> -->
                                                   <th style="min-width: 120px;">Start Date</th>
                                                   <th style="min-width: 120px;">Due Date</th>
                                                   <!--                                       <th>File</th>-->
                                                   <th style="min-width: 120px;">Assignment</th>
                                                   <!-- <th style="min-width: 120px;">Assigned By</th> -->
                                                   <th>Time Spent</th>
                                                   <th>Status</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr ng-if="alltodo.length != 0 && loader == 1" ng-repeat="(key,x) in alltodo" >
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">{{ start + $index }}</td>
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">{{ x.taskId }}</td>
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">
                                                      <span ng-if="x.type == 1">Task</span>
                                                      <span ng-if="x.type == 2">Project</span>
                                                      <span ng-if="x.type == 3">Contract</span>
                                                      <span ng-if="x.type == 4">Gig</span>
                                                   </td>
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">{{ x.name }}</td>
                                                   <!-- <td><span class="btn bg-green" ng-if="x.priority == 1">High</span>
                                                      <span class="btn bg-orange" ng-if="x.priority == 2">Medium</span>
                                                      <span class="btn bg-yellow" ng-if="x.priority == 3">Low</span>
                                                      </td> -->
                                                   <!-- <td>{{ x.department }}</td> -->
                                                   <td ng-click="showhistory(x.id,x.assignedBy)"><span ng-if="x.startDate && x.startDate != ''">{{ x.startDate | date }}</span></td>
                                                   <td ng-click="showhistory(x.id,x.assignedBy)"><span ng-if="x.dueDate && x.dueDate != ''">{{ x.dueDate | date }}</span></td>
                                                   <!--                                       <td><a target="_blank" href="<?php echo base_url(); ?>assets/todo/{{ x.file }}"><i class="fa fa-download" aria-hidden="true"></i></a></td>-->
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">
                                                      <span ng-if="x.assignedBy == userId">Assigned to {{ x.assignedto }}</span>
                                                      <span ng-if="x.assignedTo == userId"> Assigned by {{ x.assignedby }}</span>
                                                   </td>
                                                   <!-- <td>{{ x.assignedby }}</td> -->
                                                   <td ng-click="showhistory(x.id,x.assignedBy)">
                                                      <span ng-if="x.hours">({{ x.hours }})</span>
                                                      <span >{{ x.time }}</span>
                                                      <!-- <span ng-if="x.assignedBy != userId">{{ x.time }}</span> -->
                                                   </td>
                                                   <td>
                                                      <span class="btn bg-green" ng-if="x.status == 1">Done</span>
                                                      <span class="btn bg-yellow" ng-if="x.status == 2">Pending</span>
                                                      <span class="btn bg-blue" ng-if="x.status == 3">Confirmed</span>
                                                      <span class="btn bg-blue" ng-if="x.status == 4">Request to PostPone</span>
                                                      <span class="btn bg-blue" ng-if="x.status == 5">Started</span>
                                                      <span class="btn bg-red" ng-if="x.status == 6">Completed</span>
                                                      <span class="btn bg-red" ng-if="x.status == 7">Paused</span>
                                                   </td>
                                                   <td>
                                                      <div  class="dropdown ac-cstm text-right">
                                                         <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                         <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                                         </a>
                                                         <div class="dropdown-menu fadeIn">
                                                            <a ng-if="x.showdelete == 0 && x.started == 0 "  class="dropdown-item" title="Edit todo" ng-click="edittodo(x.id)"><i class="fa fa-edit"></i> Edit</a>
                                                            <a ng-if="x.showdelete == 0 && x.started == 0"  class="dropdown-item"  ng-click="confirm(x.id)" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                            <a ng-if="x.file && x.file != ''" class="dropdown-item" target="_blank" href="<?php echo base_url(); ?>assets/todo/{{ x.file }}"><i class="fa fa-download" aria-hidden="true"></i>File</a>
                                                            <a  class="dropdown-item" ng-click="viewtask(key,'1')"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                                         </div>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr ng-if="alltodo.length == 0">
                                                   <td colspan="12" class="text-center">No Record Found.</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                       <div id="pagination"></div>
                                    </div>
                                 </div>
                              </div>
                              <!-- all task -->
                           </div>
                           <!-- end content -->
                           <!--*************** add task modal***************** -->
                           <div id="addtodo" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h4 class="modal-title">Add Task</h4>
                                    </div>
                                    <div class="modal-body">
                                       <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Task Title<span class="red-text">*</span></label>
                                                <input id="name" class="form-control" name="name" ng-model="name" ng-value="name" placeholder="Please enter task">
                                                <p ng-show="submitl && name == ''" class="text-danger">Please enter task title.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Priority<span class="red-text">*</span></label>
                                                <select id="priority" class="form-control" name="prority" ng-model="priority">
                                                   <option value="">Select Priority</option>
                                                   <option value="1">High</option>
                                                   <option value="2">Medium</option>
                                                   <option value="3">Low</option>
                                                </select>
                                                <p ng-show="submitl && priority == ''" class="text-danger">Please enter priority.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Department<span class="red-text">*</span></label>
                                                <select onchange="angular.element(this).scope().getteam(this)" class="form-control rounded-0" ng-model="department" id="status">
                                                   <option value="">Select Department</option>
                                                   <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>
                                                </select>
                                                <p ng-cloak ng-show="submitl && department == ''" class="text-danger">Please select department.</p>
                                                <p ng-cloak ng-show="alldepartment.length == 0 " class="text-danger"><a class="text-danger" target="_blank" href="<?php echo base_url(); ?>freelancer/departments">Data is incomplete. Please click here to complete the information.</a></p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Employee<span class="red-text">*</span></label>
                                                <select class="form-control rounded-0" ng-model="team" id="status">
                                                   <option value="">Select Employee</option>
                                                   <option ng-repeat="(key,x) in allteam" value="{{ x.id }}">{{ x.name }}</option>
                                                </select>
                                                <p ng-cloak ng-show="submitl && team == ''" class="text-danger">Please select employee.</p>
                                                <p ng-cloak ng-show="submitl && allteam.length == 0 " class="text-danger"><a class="text-danger" target="_blank" href="<?php echo base_url(); ?>freelancer/team">Data is incomplete. Please click here to complete the information.</a></p>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Task Details<span class="red-text">*</span></label>
                                                <textarea placeholder="Please select task details" class="form-control rounded-0" ng-model="description" ng-value="description" id="status"></textarea>
                                                <p ng-cloak ng-show="submitl && description == ''" class="text-danger">Please enter task detail.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">File</label>
                                                <input onchange="angular.element(this).scope().Attachment(this)" type="file" id="file" class="form-control" name="date">
                                                <!-- <p ng-show="submitl && file == ''" class="text-danger">Please select file.</p> -->
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Start Date<span class="red-text">*</span></label>
                                                <input readonly id="date" placeholder="Please select start date"  class="form-control taskstartdate" name="date" ng-model="date" ng-value="date">
                                                <p ng-show="submitl && date == ''" class="text-danger">Please select start date.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Due Date<span class="red-text">*</span></label>
                                                <input readonly id="duedate" placeholder="Please select due date"  class="form-control taskenddate" name="date" ng-model="duedate" ng-value="duedate">
                                                <p ng-show="submitl && date == ''" class="text-danger">Please select due date.</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" ng-click="submittodo()" class="btn btn-success">Submit</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--*************** add task modal***************** -->
                           <!-- edit task -->
                           <!-- Edit leave -->
                           <div id="edittodo" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h4 class="modal-title">Edit Task</h4>
                                    </div>
                                    <div class="modal-body">
                                       <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Task Title<span class="red-text">*</span></label>
                                                <input ng-readonly="checked" id="name" class="form-control" name="name" ng-model="name1" ng-value="name1" placeholder="Please enter todo name">
                                                <p ng-show="submitl && name1 == ''" class="text-danger">Please enter task title.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Priority<span class="red-text">*</span></label>
                                                <select ng-disabled="checked" id="priority1" class="form-control" name="prority" ng-model="priority1">
                                                   <option value="">Select Priority</option>
                                                   <option value="1">High</option>
                                                   <option value="2">Medium</option>
                                                   <option value="3">Low</option>
                                                </select>
                                                <p ng-show="submitl && priority1 == ''" class="text-danger">Please enter priority.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Department<span class="red-text">*</span></label>
                                                <select ng-disabled="checked" onchange="angular.element(this).scope().getteam(this)" class="form-control" ng-model="department1" id="department">
                                                   <option value="">Select Department</option>
                                                   <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>
                                                </select>
                                                <p ng-cloak ng-show="submitl && department1 == ''" class="text-danger">Please select department.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Employee<span class="red-text">*</span></label>
                                                <select ng-disabled="checked" class="form-control rounded-0" ng-model="team1" id="team">
                                                   <option value="">Select Employee</option>
                                                   <option ng-repeat="(key,x) in allteam" value="{{ x.id }}">{{ x.name }}</option>
                                                </select>
                                                <p ng-cloak ng-show="submitl && team1 == ''" class="text-danger">Please select employee.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label for="name" class="m-0">Task Details<span class="red-text">*</span></label>
                                                <textarea ng-readonly="checked" placeholder="Please enter task details" class="form-control rounded-0" ng-model="description1" ng-value="description1"></textarea>
                                                <p ng-cloak ng-show="submitl && description1 == ''" class="text-danger">Please enter description.</p>
                                             </div>
                                          </div>
                                          <!-- <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Status<span class="red-text">*</span></label>
                                                <select id="status1" class="form-control" name="status1" ng-model="status1">
                                                   <option ng-if="started == 0"  value="2">Yet to Start</option>
                                                   <option ng-if="ended == 0"  value="5">Started</span>
                                                   <option ng-if="ended == 1"  value="5">Resumed</span>
                                                   <option ng-if="started == 1"  value="7">Paused</span>
                                                   <option ng-if="started == 1"  value="6">Completed</span>
                                                   <option ng-if="started == 0"  value="4">Request to PostPone</span>
                                             
                                                </select>
                                                <p ng-show="submitl && status1 == ''" class="text-danger">Please select status.</p>
                                             </div>
                                             </div> -->
                                          <div class="col-md-12">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">File</label>
                                                <input ng-disabled="checked" onchange="angular.element(this).scope().Attachment(this)" type="file" id="file" class="form-control" name="date">
                                                <p ng-if="file && file !=''"><a ng-if="file && file !=''" target="_blank" href="<?php echo base_url(); ?>assets/todo/{{ file }}"><i class="fa fa-download" aria-hidden="true"></i></a></p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Start Date<span class="red-text">*</span></label>
                                                <input readonly ng-disabled="checked" id="date1" placeholder="Please select start date"  class="form-control taskstartdate1" name="date1" ng-model="date1" ng-value="date1">
                                                <p ng-show="submitl && date1 == ''" class="text-danger">Please select start date.</p>
                                                <p ng-show="submitl && date1 != '' && date1 < currentdate" class="text-danger">Please change date.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Due Date<span class="red-text">*</span></label>
                                                <input readonly ng-disabled="checked" id="duedate1" placeholder="Please select due date"  class="form-control taskenddate1" name="date" ng-model="duedate1" ng-value="duedate1">
                                                <p ng-show="submitl && duedate1 == ''" class="text-danger">Please select due date.</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" ng-click="updatetodo()" class="btn btn-primary">Submit</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Edit leave -->
                           <!-- edit task -->
                           <!-- delete task -->
                           <!-- delete confirm modal -->
                           <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                       <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                       <p>Are you sure you want to delete this record ?</p>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>
                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- delete confirm modal -->
                           <!-- delete task -->
                           <!-- confirm start -->
                           <div class="modal fade" id="startconfirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                       <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                       <p ng-if="type == 1">Are you sure you want to Start this task ?</p>
                                       <p ng-if="type == 2">Are you sure you want to End this task ?</p>
                                    </div>
                                    <div class="modal-footer">
                                       <button ng-if="type == 1" type="button"  ng-click="startTime()" class="btn btn-success" id="confirm">Start</button>
                                       <button ng-if="type == 2" type="button" ng-click="stoptimer()"  class="btn btn-success" id="confirm">End</button>
                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- confirm start -->
                           <!-- view task -->
                           <div id="view" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h4 class="modal-title">View Task</h4>
                                    </div>
                                    <div class="modal-body">
                                       <div class="mb-1">
                                          <b>Task Title :</b> {{ viewdata.name }} 
                                       </div>
                                       <div ng-if="viewdata.startDate" class="mb-1">
                                          <b>Start Date  :</b> {{ viewdata.startDate | date  }}
                                       </div>
                                       <div ng-if="viewdata.dueDate" class="mb-1">
                                          <b>Due Date:</b> {{ viewdata.dueDate | date  }}
                                       </div>
                                       <div ng-if="viewdata.description && viewdata.description != '' " class="mb-1">
                                          <b>Task Description :</b> {{ viewdata.description }}
                                       </div>
                                       <!-- <div  class="mb-1">
                                          <b>Status :</b> <span  ng-if="viewdata.status == 1">Done</span>
                                          <span  ng-if="viewdata.status == 2">Pending</span>
                                          <span  ng-if="viewdata.status == 3">Confirmed</span>
                                          <span  ng-if="viewdata.status == 4">PostPone</span>
                                          <span  ng-if="viewdata.status == 5">Start</span>
                                          <span  ng-if="viewdata.status == 6">End</span>
                                          </div> -->
                                    </div>
                                    <div class="modal-footer">
                                       <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- view task -->
                           <!-- completed confirm -->
                           <div class="modal fade" id="completeconfirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                       <h4 class="modal-title">Complete</h4>
                                    </div>
                                    <div class="modal-body">
                                       <p >Are you sure ? Action can't be Modified</p>
                                    </div>
                                    <div class="modal-footer">
                                       <button  type="button"  ng-click="taskCompleted()" class="btn btn-success" id="confirm">Yes</button>
                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- completed confirm -->
                           <!-- reassign  -->
                           <div id="reassign" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h4 class="modal-title">Reassign</h4>
                                    </div>
                                    <div class="modal-body">
                                       <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Task Title<span class="red-text">*</span></label>
                                                <input ng-readonly="checked" id="name" class="form-control" name="name" ng-model="name1" ng-value="name1" placeholder="Please enter todo name">
                                                <p ng-show="submitl && name1 == ''" class="text-danger">Please enter task title.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">File</label>
                                                <input ng-disabled="checked" onchange="angular.element(this).scope().Attachment(this)" type="file" id="file" class="form-control" name="date">
                                                <p ng-if="file && file !=''"><a ng-if="file && file !=''" target="_blank" href="<?php echo base_url(); ?>assets/todo/{{ file }}"><i class="fa fa-download" aria-hidden="true"></i></a></p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Department<span class="red-text">*</span></label>
                                                <select ng-disabled="checked" onchange="angular.element(this).scope().getteam(this)" class="form-control" ng-model="department1" id="department">
                                                   <option value="">Select Department</option>
                                                   <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>
                                                </select>
                                                <p ng-cloak ng-show="submitl && department1 == ''" class="text-danger">Please select department.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Employee<span class="red-text">*</span></label>
                                                <select ng-disabled="checked" class="form-control rounded-0" ng-model="team1" id="team">
                                                   <option value="">Select Employee</option>
                                                   <option ng-repeat="(key,x) in allteam" value="{{ x.id }}">{{ x.name }}</option>
                                                </select>
                                                <p ng-cloak ng-show="submitl && team1 == ''" class="text-danger">Please select employee.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label for="name" class="m-0">Task Details<span class="red-text">*</span></label>
                                                <textarea ng-readonly="checked" placeholder="Please enter task details" class="form-control rounded-0" ng-model="description1" ng-value="description1"></textarea>
                                                <p ng-cloak ng-show="submitl && description1 == ''" class="text-danger">Please enter description.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Start Date<span class="red-text">*</span></label>
                                                <input readonly ng-disabled="checked" id="date3" placeholder="Please select start date"  class="form-control taskstartdate3" name="date1" ng-model="date1" ng-value="date1">
                                                <p ng-show="submitl && date1 == ''" class="text-danger">Please select start date.</p>
                                                <p ng-show="submitl && date1 != '' && date1 < currentdate" class="text-danger">Please change date.</p>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group ">
                                                <label for="name" class="m-0">Due Date<span class="red-text">*</span></label>
                                                <input readonly ng-disabled="checked" id="duedate3" placeholder="Please select due date"  class="form-control taskenddate3" name="date" ng-model="duedate1" ng-value="duedate1">
                                                <p ng-show="submitl && duedate1 == ''" class="text-danger">Please select due date.</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" ng-click="reassignsubmit()" class="btn btn-success">Submit</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- reassign  -->
                        </div>
                     </div>
                     <!-- history -->
                     <div ng-if="history.length != 0" class="box-body bg-white">
                        <div class="table-responsive">
                           <table id="rankingTable" class="table table-condensed">
                              <thead>
                                 <tr>
                                    <th>S. No.</th>
                                    <th>Task ID</th>
                                    <th>Type</th>
                                    <th style="min-width: 100px;">Task Title</th>
                                    <th>Assigned at</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status On</th>
                                    <th>Assignment</th>
                                    <th>Time Spent </th>
                                    <th>Task Status</th>
                                    <th>Timesheet Status</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr ng-if="history.length != 0" ng-repeat="(key,x) in history">
                                    <td ng-click="showhistoryBilling(key,x.assignedBy)">{{ $index + 1}}</td>
                                    <td ng-click="showhistoryBilling(key,x.assignedBy)">{{ x.taskId }}</td>
                                    <td ng-click="showhistoryBilling(key,x.assignedBy)">
                                       <span ng-if="x.type == 1">Task</span>
                                       <span ng-if="x.type == 2">Project</span>
                                       <span ng-if="x.type == 3">Contract</span>
                                    </td>
                                    <td ng-click="showhistoryBilling(key,x.assignedBy)">{{ x.name }}</td>
                                    <td ng-click="showhistoryBilling(key,x.assignedBy)">
                                       <span ng-if="x.date">{{ x.date | date }}</span> <span ng-if="x.date">at</span> <span ng-if="x.date">{{ x.date | time1 }}</span>
                                    </td>
                                    <td ng-click="showhistoryBilling(key,x.assignedBy)">{{ x.startDate | date }}</td>
                                    <td ng-click="showhistoryBilling(key,x.assignedBy)">{{ x.dueDate | date }}</td>
                                    <td ng-click="showhistoryBilling(key,x.assignedBy)"><span ng-if="x.completeDate">{{ x.completeDate | date }}</span></td>
                                    <td ng-click="showhistoryBilling(key,x.assignedBy)">{{ x.assignedto }}</td>
                                    <td>{{ x.time }}</td>
                                    <td>
                                       <span  ng-if="x.status == 1">Done</span>
                                       <span  ng-if="x.status == 2">Yet To start</span>
                                       <span  ng-if="x.status == 3">Confirmed</span>
                                       <span  ng-if="x.status == 4">PostPone</span>
                                       <span  ng-if="x.ended == 0 && x.status == 5">Started</span>
                                       <span  ng-if="x.ended == 1 && x.status == 5">Resumed</span>
                                       <span  ng-if="x.status == 6">Completed</span>
                                       <span  ng-if="x.status == 7">Paused</span>
                                    </td>
                                    <td>
                                       <select ng-if="!x.approved" ng-model="x.approved" onchange="angular.element(this).scope().confirmApprovedDsr(this)">
                                          <option value="" ng-if="x.approved == 0" >Select Status</option>
                                          <option data-key="{{ key }}"  data-id="{{ x.dsrId }}" ng-if="x.approved == 0 " value="1">Approve</option>
                                          <option data-key="{{ key }}" data-id="{{ x.dsrId }}"  ng-if="x.approved == 0 "  value="2">Reject</option>
                                          <option ng-if="x.approved == 1 && x.approved" value="1">Approved</option>
                                          <option ng-if="x.approved == 2 && x.approved" value="2">Rejected</option>
                                       </select>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="10"></td> 
                                    <td>Total hrs :</td>
                                    <td>{{ totaltime }}</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- history -->
                     <!-- Approved modal -->
                     <div class="modal fade" id="approvedconfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 ng-if="ttype == 1" class="modal-title" id="myModalLabel">Are you sure you want to Approve this dsr ?</h4>
                                 <h4 ng-if="ttype == 2" class="modal-title" id="myModalLabel">Are you sure you want to Reject this dsr ?</h4>
                              </div>
                              <div class="modal-body">
                                 <div ng-if="ttype == 2" class="form-group">
                                    <label>Remark<span class="text-danger">*</span></label>
                                    <textarea id="remark" placeholder="Please enter remark" ng-model="remark" ng-value="remark" class="form-control"  name="name" rows="2" cols="10"></textarea>
                                    <span class="text-danger" ng-show="submitl && remark == ''">Please enter remark.</span>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <a ng-if="ttype == 1" ng-click="action()" class="btn btn-success mb-0" id="yes">Approve</a>
                                 <a ng-if="ttype == 2" ng-click="action()" class="btn btn-success mb-0" id="yes">Reject</a>
                                 <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Approved modal -->
                     <!-- history billing -->
                     <div id="historyBilling" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                           <!-- Modal content-->
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">Hours History</h4>
                              </div>
                              <div class="modal-body">
                                 <div class="table-responsive">
                                    <table id="rankingTable" class="table table-condensed">
                                       <tr>
                                          <th>S. No</th>
                                          <th>Start Time</th>
                                          <th>End Time</th>
                                          <th>Time</th>
                                          <th>Date</th>
                                       </tr>
                                       <tr ng-repeat="(key,x) in historybilling">
                                          <td>{{ key + 1 }}</td>
                                          <td><span ng-if="x.startTime">{{ x.startTime }}</span></td>
                                          <td><span ng-if="x.endTime">{{ x.endTime }}</span></td>
                                          <td>{{ x.time }}</td>
                                          <td>{{ x.date | date }}</td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- history billing -->
                  </div>
               </div>
               <!-- chat -->
            </div>
         </div>
      </div> 
</section>
</div> 