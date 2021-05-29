<?php

include('sidebar.php');
?>


<div id="wrapper" class="content-wrapper">
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Project Assignment</li>
  </ol>
</section>


<section class="content portfolio-cont project projectassigndetail">

  <div class="container1">

    <div class="no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp28" ng-controller="myCtrt28">
        <div id="content">
          <div id="content-header">



          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <p><b>Project Name :</b> {{ project.projectName }}</p>
                      <p><b>Hourly Price :</b>{{ project.code }} {{ project.symbol }} {{ project.hourlyPrice  }}</p>
                      <p><b>Total Hours :</b> {{ project.totalHour   }}</p>
                    </div>
                    <div class="col-sm-4">
                      <p><b>Budget :</b>{{ project.code }} {{ project.symbol }} {{ project.budget     }}</p>
                      <p><b>Client Name :</b> {{ project.clientName      }}</p>
                      <p><b>Email :</b> {{ project.email }} </p>
                    </div>
                    <div class="col-sm-4">
                      <p><b>Phone :</b> {{ project.countrycode }}{{ project.phone }} </p>
                      <p><b>Skype :</b> {{ project.skype }} </p>
                      <p><b>Contact Person :</b> {{ project.contactPerson  }} </p>
                    </div>
                  </div>


                </div>
              </div>


              --------------

<div class="container">
    <div class="row">
        <div class="col-md-12" id="main">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Why is it better
                    </a>
                  </h4>
                </di  v>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <div class="box-body ">
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

                        </tr>
                      </thead>
                        <tbody ng-repeat="(key,x) in project.milestone"  >
                          <tr  ng-repeat="(key2,x2) in x.task">
                            <td><input name="check" value="1" ng-click="taskChecked(key,key2,$event)" ng-checked="x2.checked" type="checkbox"> <span ng-if="$index == 0">{{ x.name }}</span></td>
                            <td><span >{{ x2.name  }} <i ng-click="viewtask(key,key2)" class="fa fa-eye" aria-hidden="true"></i></span></td>
                            <td>({{ x2.hours  }}) {{ x2.time }} </td>
                            <td >
                              <span  ng-if="x2.status == 1">Done</span>
                              <span  ng-if="x2.status == 2">Pending</span>
                              <span  ng-if="x2.status == 3">Confirmed</span>
                              <span  ng-if="x2.status == 4">PostPone</span>
                              <span  ng-if="x2.status == 5">Started</span>
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
                              <input readonly="" mydatepicker data-key="{{ key }}" data-key1="{{ key2 }}" ng-model="x2.startDate" ng-value="x2.startDate"  type="text" name="startdate" class="form-control startdate{{ x2.id }}" >
                              <p ng-if="x2.startDate == '' && x2.checked == 1" class="red-text">Start date is required.</p>
                            </td>
                            <td width="140px"><input readonly="" data-key="{{ key }}" data-key1="{{ key2 }}" mydatepicker1 ng-model="x2.dueDate" ng-value="x2.dueDate" type="text" name="enddate" class="form-control enddate{{ x2.id }}" >
                              <p ng-if="x2.dueDate == ''  && x2.checked == 1" class="red-text">Due date is required.</p>
                              <p ng-if="x2.dueDate != '' && x2.startDate > x2.dueDate  && x2.checked == 1" class="red-text">Please select valid date.</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="form-group">
                        <input ng-click="addmilestone()" type="button" value="Add Milestone" class="btn btn-success" >
                        <input ng-click="addsubtask()" type="button" value="Add Subtask" class="btn btn-success" >
                        <input ng-click="AssignMilestone()" type="button" value="Assign" class="btn btn-success" >
                        <input ng-click="edittask()" type="button" value="Edit" class="btn btn-success" >
                        <input ng-click="SaveMilestone()" type="button" value="Save" class="btn btn-success" >
                       </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Collapsible Group Item #2
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Collapsible Group Item #3
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
<div>



                <
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
                          <h4 class="modal-title">Edit Subtask</h4>
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
                                   <input placeholder="Please enter hours" class="form-control rounded-0" ng-model="hours1" ng-value="hours1" id="status">
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
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- view task -->



              </div>
            </div>



          </div>
        </section>
      </div>
    </div>
