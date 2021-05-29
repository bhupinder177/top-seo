<?php

include('sidebar.php');
?>





<div ng-cloak  ng-app="myApp28" ng-controller="myCtrt28" id="wrapper" class="content-wrapper">
<ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Project Assignment</li>
</ul>
<section class="content-header milesoneHeader">
  <p>{{ project.projectName }}</p>
  <a hand ng-click="addmilestone()" class="addm" >Add Milesone <i class="fa fa-plus" aria-hidden="true"></i></a>
</section>


<section class="content portfolio-cont project projectassigndetail">

  <div class="container1">

    <div class="no-margin user-dashboard-container projectAssignDetails">
      <div >
        <div id="content">
          <div id="content-header">
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-4">

                        <div class="form-group">
                          <div class="fgroup">
                          <p><b><i class="fa fa-tasks" aria-hidden="true"></i>Project Name :</b>  </p>
                          <input class="form-control projectname" type="text" ng-model="project.projectName" ng-value="project.projectName">
                          <p ng-show="submitclient && project.projectName == ''" class="text-danger ng-hide">Project name is required.</p>
                      </div>
                      </div>

                      <div class="form-group">
                        <div class="fgroup">
                        <p><b><i class="fa fa-phone" aria-hidden="true"></i> Phone :</b></p>
                        <input class="form-control phone" type="text" ng-model="project.phone" ng-value="project.phone">
                      </div>
                      </div>

                      <div class="form-group">
                          <div class="fgroup">
                          <p><b><i class="fa fa-skype" aria-hidden="true"></i> Skype :</b> </p>
                        <input class="form-control skype" type="text" ng-model="project.skype" ng-value="project.skype">
                      </div>
                      </div>

                      <div class="form-group">
                          <div class="fgroup fgroupFileUpload">
                          <p><b><i class="fa fa-file" aria-hidden="true"></i> File :</b> </p>
                        <input class="form-control" onchange="angular.element(this).scope().documentUpload(this)" multiple type="file" >
                        <ul  ng-if="document.length != 0" >
                         <li ng-repeat="(keyu,x) in document"><a hand  target="_blank" href="<?php echo base_url(); ?>assets/project_doc/{{ x }}" value="{{ u.id }}">{{ x }}</a><span ng-click="removedocument(keyu)"><i class="fa fa-times"></i></span></li>
                       </ul>
                      </div>
                      </div>



                    </div>
                    <div class="col-sm-4">

                     <div class="form-group">
                       <div class="fgroup">
                         <p><b><i class="fa fa-user" aria-hidden="true"></i> Client Name :</b></p>
                        <input class="form-control clientname" type="text" ng-model="project.clientName" ng-value="project.clientName">
                        <p ng-show="submitclient && project.clientName == '' " class="text-danger ng-hide">Please enter client name.</p>

                      </div>
                      </div>

                        <div class="form-group">
                          <div class="fgroup">
                            <p><b><i class="fa fa-envelope" aria-hidden="true"></i>Email :</b></p>
                          <input onkeyup="angular.element(this).scope().ctrl(this)" class="form-control email" type="text" ng-model="project.email" ng-value="project.email">
                          <p ng-show="emailvalide && project.email != '' " class="text-danger ng-hide">Please enter valid email address.</p>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="fgroup">
                          <p><b><i class="fa fa-user" aria-hidden="true"></i> Contact Person :</b> </p>
                        <input class="form-control contactname" type="text" ng-model="project.contactPerson" ng-value="project.contactPerson">
                      </div>
                      </div>

                    </div>
                    <div class="col-sm-4">
                      <p><b><i class="fa fa-usd" aria-hidden="true"></i>Hourly Price :</b> {{ project.code }} {{ project.symbol }} {{ project.hourlyPrice  }}</p>
                      <p><b><i class="fa fa-clock-o" aria-hidden="true"></i>Total Hours :</b> {{ project.totalHour   }}</p>
                      <p><b><i class="fa fa-money" aria-hidden="true"></i>Signoff Amount :</b> {{ project.code }} {{ project.symbol }} {{ project.fixedBudget }}</p>
                      <p ng-if="project.budget - project.fixedBudget != 0"><b><i class="fa fa-money" aria-hidden="true"></i>Additional Amount :</b> {{ project.code }} {{ project.symbol }} {{ project.budget - project.fixedBudget  }}</p>
                      <p><b><i class="fa fa-money" aria-hidden="true"></i>Total Amount :</b> {{ project.code }} {{ project.symbol }} {{ project.budget     }}</p>
                  </div>

                  <div class="col-md-12">
                  <input type="button" ng-click="clientupdate()" class="btn btn-success" value="update">
                   </div>
                </div>
              </div>



<div class="container-fluid">
    <div class="row">
        <div class="milesoneTable" id="main">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

              <div class="panel panel-default" ng-repeat="(key,x) in project.milestone">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{ key }}" aria-expanded="true" aria-controls="collapseOne{{ key }}">
                      <span>Milestone {{ key + 1 }}</span> <label> {{  x.name  }}</label>
                    </a>
                    <span>
                    <a ng-click="editmilestone(key)"><i class="fa fa-edit"></i></a>
                    <a ng-click="confirmmilestone(x.id)"><i class="fa fa-trash"></i></a>
                  </span>
                  </h4>
                </div>
                <div id="collapseOne{{ key }}" ng-class="{ 'collapse show in ' : key == 0,'in fade collapse':key != 0 }"  class="panel-collapse  " role="tabpanel" aria-labelledby="headingOne{{ key }}">
                  <div class="panel-body">
                    <div class="taskAssign">
                      <!-- <p>There is no taks assigned yet.</p> -->
                      <div ng-click="addsubtask(x.id)" class="task_btn">Add Task <i class="fa fa-plus" aria-hidden="true"></i></div>
                   </div>
                    <div class="box-body ">
                        <div class="table-responsive">
                      <table ng-if="x.task.length != 0" class="table table-bordered">
                          <thead>
                        <tr>
                          <th><input ng-click="milestoneChecked($event,key)" type="checkbox"></th>
                          <th>Task Name</th>
                          <th>Hours</th>
                          <th>Status</th>
                          <th>Assignment</th>
                          <th>Start Date</th>
                          <th>Due Date</th>

                        </tr>
                      </thead>
                        <tbody   >
                          <tr  ng-repeat="(key2,x2) in x.task">
                            <td><input name="check" value="1" ng-click="taskChecked(key,key2,$event)" ng-checked="x2.checked" type="checkbox"> </td>
                            <td><span> <i ng-click="viewtask(key,key2)" class="fa fa-eye" aria-hidden="true"></i> {{ x2.name  }} </span></td>
                            <td>({{ x2.hours  }}) {{ x2.time }} </td>
                            <td >
                              <select class="form-control" onchange="angular.element(this).scope().statusChnage(this)" ng-model="x2.status">
                                <option data-id="{{ x2.id }}" value="1">Done</option>
                                <option data-id="{{ x2.id }}" value="2">Pending</option>
                                <option data-id="{{ x2.id }}"  value="3">Confirmed</option>
                                <option data-id="{{ x2.id }}"  value="4">PostPone</option>
                                <option data-id="{{ x2.id }}" value="5">Started</option>
                                <option data-id="{{ x2.id }}" value="6">Completed</option>
                                <option data-id="{{ x2.id }}" value="7">Paused</option>

                              </select>
                            </td>
                            <td>
                              <div class=" form-group">
                              <select ng-model="x2.assignedTo" class="form-control">
                                <option  value="">Select Assigned To</option>
                                <option ng-repeat="(key,x) in allteam" value="{{ x.u_id }}">{{ x.name }}</option>
                              </select>
                            </div>
                            </td>
                            <td class="datepickerInput">
                              <input readonly="" mydatepicker data-key="{{ key }}" data-key1="{{ key2 }}" ng-model="x2.startDate" ng-value="x2.startDate"  type="text" name="startdate" class="form-control startdate{{ x2.id }}" >
                              <p ng-if="x2.startDate == '' && x2.checked == 1" class="red-text">Start date is required.</p>
                            </td>
                            <td class="datepickerInput"><input readonly="" data-key="{{ key }}" data-key1="{{ key2 }}" mydatepicker1 ng-model="x2.dueDate" ng-value="x2.dueDate" type="text" name="enddate" class="form-control enddate{{ x2.id }}" >
                              <p ng-if="x2.dueDate == ''  && x2.checked == 1" class="red-text">Due date is required.</p>
                              <p ng-if="x2.dueDate != '' && x2.startDate > x2.dueDate  && x2.checked == 1" class="red-text">Please select valid date.</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
                </div>
              </div>
              <div class="projectassignbutton">
              <div class="form-group">
                <!-- <input ng-click="addmilestone()" type="button" value="Add Milestone" class="btn btn-success" > -->
                <!-- <input ng-click="addsubtask()" type="button" value="Add Subtask" class="btn btn-success" > -->
                <input ng-click="AssignMilestone()" type="button" value="Assign" class="btn btn-success" >
                <input ng-click="edittask()" type="button" value="Edit" class="btn btn-success" >
                <input ng-click="SaveMilestone()" type="button" value="Save" class="btn btn-success" >
                <input ng-click="delete()" type="button" value="Delete" class="btn btn-success" >
               </div>
             </div>

            </div>

        </div>
    </div>
<div>




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
                                   <input placeholder="Please enter hours" class="form-control rounded-0" numbers-only="numbers-only" ng-model="hours" ng-value="hours" id="status">
                                   <p ng-cloak ng-show="submitl && hours == ''" class="text-danger">Please enter hours.</p>

                                </div>
                             </div>

                             <div class="col-sm-12">
                               <div class="form-group">
                                 <label>File </label>
                                 <input type="file" onchange="angular.element(this).scope().Attachment(this)" ng-keyup="totalmilestone()"  ng-value="x2.hours" ng-model="x2.hours" id="amount" numbers-only="numbers-only" placeholder="Please enter hours" name="hours" class="form-control amount " >

                               </div>
                             </div>

                             <div class="col-md-12">
                                <div class="form-group ">
                                   <label for="name" class="m-0">Task Details<span class="red-text">*</span></label>
                                   <textarea placeholder="Please select task details" class="form-control rounded-0" ng-model="description" ng-value="description" id="status"></textarea>
                                   <p ng-cloak ng-show="submitl && description == ''" class="text-danger">Please enter task details.</p>
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

              <!-- **********************edit task******************** -->
              <div id="edittodo" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                       <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">{{ milesonename1 }}</h4>
                       </div>
                       <div class="modal-body">
                          <div class="row">
                             <div class="col-md-12">
                                <div class="form-group ">
                                   <label for="name" class="m-0">Task<span class="red-text">*</span></label>
                                   <input id="name" class="form-control" name="name" ng-model="name1" ng-value="name1" placeholder="Please enter task">
                                   <p ng-show="submitl && name1 == ''" class="text-danger">Please enter task.</p>
                                </div>
                             </div>

                             <div class="col-md-12">
                                <div class="form-group ">
                                   <label for="name" class="m-0">Hours<span class="red-text">*</span></label>
                                   <input placeholder="Please enter hours" numbers-only="numbers-only" class="form-control rounded-0" ng-model="hours1" ng-value="hours1" id="status">
                                   <p ng-cloak ng-show="submitl && hours1 == ''" class="text-danger">Please enter hours.</p>

                                </div>
                             </div>

                             <div class="col-sm-12">
                               <div class="form-group">
                                 <label>File </label>
                                 <input type="file" onchange="angular.element(this).scope().Attachment1(this)"  id="file"  placeholder="Please enter hours" name="hours" class="form-control amount " >

                               </div>
                             </div>

                             <div class="col-md-12">
                                <div class="form-group ">
                                   <label for="name" class="m-0">Task Details<span class="red-text">*</span></label>
                                   <textarea placeholder="Please select task details" class="form-control rounded-0" ng-model="description1" ng-value="description1" id="status"></textarea>
                                   <p ng-cloak ng-show="submitl && description1 == ''" class="text-danger">Please enter task details.</p>
                                </div>
                             </div>

                          </div>
                       </div>
                       <div class="modal-footer">
                          <button type="button" ng-click="taskUpdate1()" class="btn btn-success">Update</button>
                       </div>
                    </div>
                 </div>
              </div>
              <!-- **********************edit task******************** -->

              <!-- add milesone -->
              <div id="addmilestone" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Add Milestones</h4>
                     </div>
                     <div class="modal-body">



                       <div  class="milestone-main" ng-repeat="(key,x) in milestones" ng-init="proposal = key">
                         <a ng-if="key != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletemilestone(key)" class="fas fa-trash-alt"></i></a>

                         <div class="row">
                           <div class="col-sm-6">
                             <div class="form-group">
                               <label>Milestone Title<span class="red-text">*</span></label>
                               <input type="text"  id="amount"  ng-value="x.title" ng-model="x.title" placeholder="Please enter milestone title" name="budget" class="form-control amount required" >
                               <p ng-show="subm && x.title == ''" class="text-danger ng-hide">Milestone Title is required.</p>

                             </div>
                           </div>
                           <div class="col-sm-6">
                             <div class="form-group">
                               <label>Milestone hours</label>
                               <input type="text" readonly="" ng-value="x.hours" ng-model="x.hours" id="amount" numbers-only="numbers-only" placeholder="" name="budget" class="form-control amount" >
                             </div>
                           </div>
                         </div>
                         <!-- =====task -->
                         <div class="row" ng-repeat="(key2,x2) in x.task" >
                           <div class="col-sm-6">
                             <div class="form-group">
                               <label>Task<span class="red-text">*</span></label>
                               <input type="text"  id="amount"  ng-value="x2.task" ng-model="x2.task" placeholder="Please enter milestone title" name="budget" class="form-control amount">
                               <p ng-show="subm && x2.task == ''" class="text-danger ng-hide">Task is required.</p>

                             </div>
                           </div>
                           <div class="col-sm-6">
                             <div class="form-group">
                               <label>Task hours <span class="red-text">*</span></label>
                               <input type="text" ng-keyup="totalmilestone()"  ng-value="x2.hours" ng-model="x2.hours" id="amount" numbers-only="numbers-only" placeholder="Please enter hours" name="hours" class="form-control amount " >
                               <p ng-show="subm && x2.hours == ''" class="text-danger ng-hide">Hours is required.</p>

                             </div>
                           </div>
                           <!-- <div class="col-sm-12">
                             <div class="form-group">
                               <label>File </label>
                               <input type="file" onchange="angular.element(this).scope().Attachment(this)" ng-keyup="totalmilestone()"  ng-value="x2.hours" ng-model="x2.hours" id="amount" numbers-only="numbers-only" placeholder="Please enter hours" name="hours" class="form-control amount " >

                             </div>
                           </div> -->
                           <div class="col-sm-12">
                             <div class="form-group">
                               <label>Task Description <span class="red-text">*</span></label>
                               <textarea    ng-value="x2.description" ng-model="x2.description" id="amount"  placeholder="Please enter description" name="budget" class="form-control " ></textarea>

                             </div>
                           </div>
                           <div class="col-sm-12">
                             <a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fa fa-trash"></i></a>
                           </div>
                         </div>
                         <div class="col-sm-12">
                           <a hand id="plusicon">Add Tasks  <i ng-click="taskadd(key)" class="fa fa-plus-square"></i> </a>
                         </div>
                       </div>
                       <!-- task -->

                     </div>
                     <div class="modal-footer">
                       <button type="button" ng-click="SaveNewMilestone()" class="btn btn-success">Submit</button>
                     </div>
                   </div>

                 </div>
               </div>
              <!-- add milesone -->

              <!-- view task -->
              <div id="view" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">View Task</h4>
                    </div>
                    <div class="modal-body">
                      <div class="mb-1">
                         <b>Task Title :</b> {{ viewdata.name }} </div>
                      <div ng-if="viewdata.description && viewdata.description != '' " class="mb-1">
                        <b>Task Description :</b> {{ viewdata.description }}
                      </div>
                      <div ng-if="viewdata.file && viewdata.file != '' " class="mb-1">
                        <b>File :</b> <a target="_blank" href="<?php echo base_url(); ?>assets/todo/{{ viewdata.file }}">{{ viewdata.file }}</a>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- view task -->

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
     <button type="button" ng-click="milesonedelete()" class="btn btn-danger" id="confirm">Delete</button>

   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
   </div>
   </div>
   </div>
   </div>
              <!-- delete confirm modal -->

              <!-- edit milesone -->
              <div id="editmilestone" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                       <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Milesone</h4>
                       </div>
                       <div class="modal-body">
                          <div class="row">
                             <div class="col-md-12">
                                <div class="form-group ">
                                   <label for="name" class="m-0">Milesone<span class="red-text">*</span></label>
                                   <input id="name" class="form-control" name="name" ng-model="milestonename" ng-value="milestonename" placeholder="Please enter milestone">
                                   <p ng-show="submitl && milestonename == ''" class="text-danger">Please enter milestone.</p>
                                </div>
                             </div>





                          </div>
                       </div>
                       <div class="modal-footer">
                          <button type="button" ng-click="milestoneUpdate1()" class="btn btn-success">Update</button>
                       </div>
                    </div>
                 </div>
              </div>
              <!-- edit milesone -->



              </div>
            </div>



          </div>
        </section>
      </div>
