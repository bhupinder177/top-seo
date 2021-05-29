<?php
   include('sidebar.php');
   ?>
<div ng-cloak ng-app="myApp45" ng-controller="myCtrt45" id="wrapper" class="content-wrapper task-manage">
  <h4>Active Task : {{ activetask }}</h4>
  <h4>Pending Task : {{ pendingtask }}</h4>
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> > </li>
         <li class="active">Task Management</li>
      </ol>
   </section>
   <section class="content dep-cstm">
      <div class=" no-margin user-dashboard-container">
         <div >
            <div id="content">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="box bg-white c-pass-sec">
                           <div class="box-header">
                             <!-- row -->
                             <div class="row">
                               <div class="col-lg-8 col-md-12">
                                 <div class="row">
                                   <div class="col-md col-sm-12 form-group">

                        <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                        </select>

                      </div>
                                 <div class="col-md col-sm-12 form-group">
                                   <select ng-model="spriority" id="spriority" class="form-control w-100">
                                     <option value="">Select Priority</option>
                                     <option value="1">High</option>
                                     <option value="2">Medium</option>
                                     <option value="3">Low</option>
                                   </select >
                                 </div>
                                 <div class="col-md col-sm-12 form-group">
                                     <select id="st" class="form-control" name="st" ng-model="sstatus">
                                        <option value="">Select Status</option>
                                        <option value="1">Done</option>
                                        <option value="2">Pending</option>
                                        <option value="3">Confirm</option>
                                     </select>
                                 </div>
                                 <div class="col-md-3 col-sm-12 form-group">
                                   <input type="button" ng-click="search()" class="btn btn-success w-100" value="Search" >
                                 </div>

                               </div>
                             </div>
                               <div class="col-lg-3 col-md-12">
                             <div class="add-task text-right p-2">
                               <a ng-click="todoopen()" class="btn btn-success">Add Task</a>
                               </div>
                              </div>
                            </div>
                            <!-- row -->
                          </div>
                              <!-- addleave -->
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
                                                   <input id="date" placeholder="Please select start date"  class="form-control taskstartdate" name="date" ng-model="date" ng-value="date">
                                                   <p ng-show="submitl && date == ''" class="text-danger">Please select start date.</p>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group ">
                                                   <label for="name" class="m-0">Due Date<span class="red-text">*</span></label>
                                                   <input id="duedate" placeholder="Please select due date"  class="form-control taskenddate" name="date" ng-model="duedate" ng-value="duedate">
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
                              <!-- add leave -->

                           <div class="box-body">
                               <div class="table-responsive">
                              <table id="rankingTable" class="table table-condensed">
                                 <thead>
                                    <tr>
                                       <th>S. No.</th>
                                       <th>Task ID</th>
                                       <th style="min-width: 190px;">Task Title</th>
                                       <th>Priority</th>
                                       <th>Dept</th>
                                        <th style="min-width: 120px;">Start Date</th>
                                        <th style="min-width: 120px;">Due Date</th>
<!--                                       <th>File</th>-->
                                       <th style="min-width: 120px;">Assigned To</th>
                                       <th style="min-width: 120px;">Assigned By</th>
                                       <th>Time Spend</th>
                                       <th>Timer</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr ng-if="alltodo.length != 0 && loader == 1" ng-repeat="(key,x) in alltodo">
                                       <td>{{ start + $index }}</td>
                                       <td>{{ x.taskId }}</td>
                                       <td>{{ x.name }}</td>
                                       <td><span class="btn bg-green" ng-if="x.priority == 1">High</span>
                                          <span class="btn bg-orange" ng-if="x.priority == 2">Medium</span>
                                          <span class="btn bg-yellow" ng-if="x.priority == 3">Low</span>
                                       </td>
                                       <td>{{ x.department }}</td>
                                        <td>{{ x.startDate | date }}</td>
                                        <td>{{ x.dueDate | date }}</td>
<!--                                       <td><a target="_blank" href="<?php echo base_url(); ?>assets/todo/{{ x.file }}"><i class="fa fa-download" aria-hidden="true"></i></a></td>-->
                                       <td>{{ x.assignedto }}</td>
                                       <td>{{ x.assignedby }}</td>
                                       <td>{{ x.time }}</td>
                                       <td>
                                          <button ng-show="x.showbutton == 1" ng-disabled="x.disabled == 0 || x.status == 1" ng-click="startTime(key,x.id)" class="btn btn-info">Start Timer</button>
                                          <button ng-if="x.showbutton == 2">{{ minutes }}:{{ seconds }}</button>
                                          <button ng-show="x.showbutton == 2" ng-disabled="x.status == 0" ng-click="stoptimer(key,x.id)" class="btn btn-danger">Stop Timer</button>
                                       </td>
                                       <td>
                                          <span class="btn bg-green" ng-if="x.status == 1">Done</span>
                                          <span class="btn bg-yellow" ng-if="x.status == 2">Pending</span>
                                          <span class="btn bg-blue" ng-if="x.status == 3">Confirmed</span>
                                       </td>
                                       <td>
                                           <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a class="dropdown-item" title="Edit todo" ng-click="edittodo(x.id)"><i class="fa fa-edit"></i> Edit</a>
                                     <a class="dropdown-item" ng-if="x.showdelete == 0" ng-click="confirm(x.id)" href="#"><i class="fa fa-trash"></i> Delete</a>
                                      <a ng-if="x.file" class="dropdown-item" target="_blank" href="<?php echo base_url(); ?>assets/todo/{{ x.file }}"><i class="fa fa-download" aria-hidden="true"></i>File</a>
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
                                             <div class="col-md-6">
                                                <div class="form-group ">
                                                   <label for="name" class="m-0">Status<span class="red-text">*</span></label>
                                                   <select id="status1" class="form-control" name="status1" ng-model="status1">
                                                      <option value="">Select Status</option>
                                                      <option value="1">Done</option>
                                                      <option value="2">Pending</option>
                                                      <option ng-if="!checked" value="3">Confirm</option>
                                                   </select>
                                                   <p ng-show="submitl && status1 == ''" class="text-danger">Please select status.</p>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group ">
                                                   <label for="name" class="m-0">File</label>
                                                   <input ng-disabled="checked" onchange="angular.element(this).scope().Attachment(this)" type="file" id="file" class="form-control" name="date">

                                                   <p ng-if="file !=''"><a ng-if="file !=''" target="_blank" href="<?php echo base_url(); ?>assets/todo/{{ file }}"><i class="fa fa-download" aria-hidden="true"></i></a></p>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group ">
                                                   <label for="name" class="m-0">Start Date<span class="red-text">*</span></label>
                                                   <input id="date1" placeholder="Please select start date"  class="form-control taskstartdate" name="date1" ng-model="date1" ng-value="date1">
                                                   <p ng-show="submitl && date1 == ''" class="text-danger">Please select start date.</p>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group ">
                                                   <label for="name" class="m-0">Due Date<span class="red-text">*</span></label>
                                                   <input id="duedate1" placeholder="Please select due date"  class="form-control taskenddate" name="date" ng-model="duedate1" ng-value="duedate1">
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
                           </div>
                                </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </section>
</div>
