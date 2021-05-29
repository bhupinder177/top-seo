<?php include('sidebar.php');?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Dsr</li>
    </ol>
  </section>
  <section class="content portfolio-cont dsr">
    <div class="no-margin user-dashboard-container">
      <div ng-cloak id="employeedsr" ng-app="myApp50" ng-controller="myCtrt50">

        <!-- add dsr -->
        <div id="adddsr" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content dsrcontent">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">DSR</h4> -->
                <h4 class="modal-title align-center">DSR ({{ dsrdate }})</h4>
              </div>
              <div class="modal-body">
                <div  class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <input readonly placeholder="Dsr Date" type="text" name="date" value="" ng-model="dsrdate" class="form-control dsrdate" ng-value="dsrdate">
                  </div>
                </div>

              </div>
                  <div class="table-responsive">

               <table>
                 <thead>
                   <tr>
                     <th>Project Name</th>
                     <th>Task Title</th>
                     <th>Description</th>
                     <th>Task Status</th>
                     <th style="width: 105px;">Time Spent</th>
                     <th>Verified Status</th>
                   </tr>
                 </thead>

                 <tbody >

                   <tr ng-class="{ 'dsrredtr' : x.approved == 2  }" ng-repeat="(key,x) in dsr">
                     <td>

                      <div class="form-group">
                       <select ng-disabled="x.approved != 2 && x.already || leave" onchange="angular.element(this).scope().changeProject(this)" ng-disabled="x.already"  class="form-control">
                       <option value="">Select Project</option>
                       <option ng-repeat="(key1,x1) in allproject"  data-key="{{ key }}" data-key1="{{ key1 }}" data-salary="{{ x1.includeSalary }}" data-id="{{ x1.type }}" ng-selected="x1.type == x.type && x1.id == x.projectId"   value="{{ x1.id }}">{{ x1.project }}</option>
                        <!-- <option ng-selected="s"  value="0">Additional</option> -->
                     </select>
                    <p ng-show="submitl && x.projectId == ''" class="text-danger">Please select project.</p>
                   </div>
                   </td>
                   <td>
                      <div class="form-group">
                      <input ng-disabled="x.approved != 2 && x.already || leave" ng-keyup="checktask($event.target.value,key)" placeholder="Please enter task" ng-model="x.task" ng-value="x.task" type="text" class="form-control" name="task" >
                      <p ng-show="submitted && x.task == ''" class="text-danger">Please enter task.</p>
                      <p ng-show="x.task != '' && x.tmin == 1" class="text-danger">maximum 25 character.</p>

                    </div>
                   </td>
                   <td>
                     <div class="form-group">
                     <textarea ng-disabled="x.approved != 2 &&  x.already || leave" placeholder="Please enter description" ng-keyup="checkdescription($event.target.value,key)" ng-model="x.taskDetail" ng-value="x.taskDetail" type="text" class="form-control" name="description" ></textarea>
                     <p ng-show="submitted && x.unique == 0 && x.taskDetail == '' " class="text-danger">Please enter description.</p>
                     <p ng-show="x.taskDetail != '' && x.unique == 1" class="text-danger">Description must be unique.</p>
                     <p ng-show="x.taskDetail != '' && x.min == 1" class="text-danger">minimum 50 character.</p>

                   </div>
                   </td>
                   <td>
                     <div class="form-group">
                     <select ng-disabled="x.approved != 2 && x.already || leave" ng-model="x.status" name="status" class="form-control">
                     <option value="">Select Status</option>
                     <option   value="1">Done</option>
                     <option   value="0">Pending</option>
                    </select>
                    <p ng-show="submitted && x.status == ''" class="text-danger">Please select status.</p>
                  </div>
                 </td>
                 <td>
                 <div class="form-group">
                 <input ng-disabled="x.approved != 2 && x.already || leave " ng-keyup="keyupcounthour($event.target.value,key)" type="text" placeholder="00:00" ng-model="x.time" x.value="x.time" class="form-control time-spend" name="time" >
                 <p ng-show="submitted && x.time == '' " class="text-danger">Please enter time.</p>
                 <p ng-show="submitted && x.time != '' && x.timeerror == 1 " class="text-danger">Please enter valid time format.</p>
                 <p ng-show="x.time != '' && x.timeerror == 0 && x.timemin == 1 && x.timemax == 0 " class="text-danger">Please enter valid time.</p>
                 <p ng-show="x.time != '' && x.timeerror == 0 && x.timemin == 0 && x.timemax == 1" class="text-danger">Please enter hour less than {{ working.workingHour }}.</p>
                 </div>
               </td>
               <td>
                <div class="form-group last-td">

                 <select disabled="disabled" class="form-control" ng-model="x.approved">
                   <option value="0">Pending</option>
                   <option value="1">Approved</option>
                   <option value="2">Rejected</option>
                 </select>
                 <a class="removedsricon" ng-if="x.already == 0 && key != 0" ng-click="removedsr(key)"><i class="fa fa-trash" aria-hidden="true"></i></a>

                </div>
                   </tr>
                 </tbody>
               </table>
               <p class="red-text" ng-if="workingerror">Please fill minimum {{ working.workingHour }} hours a day</p>
               <p class="red-text" ng-if="workingMaxerror">Please enter hour less than 24.</p>
               <div class="row">
               <div class="col-md-4">
                 <div class="form-group dsrtotalhoursfill">
                   <label>Total hours</label>
                   <input type="text" readonly ng-value="totalhours" ng-model="totalhours" name="totalhours" class="form-control">
                 </div>
               </div>
               <div class="col-md-8">
                 <div class="text-right">
                   <a  ng-disabled="leave" ng-click="dsradd()"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                 </div>
               </div>
             </div>

             </div>
              </div>
              <div class="modal-footer">
                <button type="button" ng-disabled="leave" ng-click="savedsr()" class="btn btn-success" >Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- add dsr -->
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">

              <div class="group-chat">
              <div class="">

                <!-- tabs -->
                <div class="tab-content">
                  <!-- *******************MY DSR Start*********************************** -->
                  <div id="mydsr" class="tab-pane fade in active show membership-table">
                <div class="box bg-white rounded c-pass-sec">
                  <div class="box-header with-border p-3">

                  <div class="row">
                    <div class="col-md-2">
                             <div class="form-group">
                               <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control ng-pristine ng-valid ng-not-empty ng-touched">
                                 <option value="10" >10</option>
                                 <option value="20">20</option>
                                 <option value="50">50</option>
                                 <option value="100">100</option>
                               </select>
                             </div>
                           </div>
                           <div class="col-md-2">
                               <div class="form-group">
                                 <select  ng-model="searchStatus"  class="form-control">
                                   <option   value="">Select Status</option>
                                   <option value="0">Pending</option>
                                   <option value="1">Appproved</option>
                                   <option value="2">Rejected</option>
                                 </select>
                               </div>
                           </div>
                    <div class="col-md-2">
                      <div class="form-group mb-0">
                        <input type="text" name="startdate" ng-model="startdate" ng-value="startdate" class="emdsrstartdate form-control" placeholder="Please enter start date">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group mb-0">
                        <input type="text" name="enddate" ng-model="enddate" ng-value="enddate"  class="emdsrenddate form-control" placeholder="Please enter start date">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group mb-0">
                        <input type="button" name="search" ng-click="search()"  class="btn btn-success mb-0" value="Search">
                      </div>
                    </div>
                     <div class="col-md-2">
                      <div class="text-right"><a ng-click="clickadddsr()" data-toggle="modal" data-target="#adddsr" class="btn btn-success mb-0">Add DSR</a></div>
                    </div>
                  </div>

                </div>

                <div  ng-if="alldsr.length != 0" ng-repeat="(key,x1) in alldsr">
                 <div class="box-header with-border bg-white mt-3">
                     <h3 ng-click="clickdatewisedsr(x1.date,1)" class="box-title p-2"> {{ x1.date | date }},  Overall Status : <span ng-if="x1.overallstatus == 0">Pending</span><span ng-if="x1.overallstatus == 1">Approved</span><span ng-if="x1.overallstatus == 2">Rejected</span></h3>
                  <div class="box-body">
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>S. No</th>
                          <th>Task Title</th>
                          <th>Total Work/hrs</th>
                          <th>Approved /hrs</th>
                          <th>Dsr Verified By</th>
                          <th>Task Status</th>
                          <th>Verified Status</th>
                          <!-- <th>Date</th> -->
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>

                      <tbody  >

                        <tr ng-repeat="(key1,x) in x1.dsr">
                          <td><i ng-click="viewdescription(x.dsrId)" class="fa fa-eye" aria-hidden="true"></i></td>
                          <td>{{  $index + 1 }}</td>
                          <td>{{ x.task }}</td>
                          <td>{{ x.time }}</td>
                          <td><span ng-if="x.approved == 1">{{ x.adjustedTime }}</span></td>
                          <td>{{ x.approvedby }}</td>
                          <td><span ng-if="x.status == 1">Done</span><span ng-if="x.status == 0">Pending</span></td>
                          <td>
                              <span class="btn bg-green" ng-if="x.approved == 1">Approved</span>
                              <span class="btn bg-yellow" ng-if="x.approved == 2">Rejected</span>
                              <span class="btn bg-orange" ng-if="x.approved == 0">Pending</span>
                            </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td>Total hrs :</td>
                          <td>{{ x1.totaltime }}</td>
                          <td>{{ x1.adjustedTime }}</td>
                          <td></td>
                          <td></td>
                          <td></td>

                        </tr>
                      </tbody>
                    </table>
                      </div>
                  </div>
                </div>
              </div>

              <div  id="pagination"></div>


              <!-- no record found-->
              <div  ng-if="alldsr.length == 0" >
               <div class="box-header with-border bg-white mt-3">
                <div class="box-body">
                  <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>S. No</th>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Total Work/hrs</th>
                        <th>Approved /hrs</th>
                        <th>Dsr Verified By</th>
                        <th>Task Status</th>
                        <th>Verified Status</th>
                      </tr>
                    </thead>
                      <tr ><td colspan="9" class="text-center">No Record Found.</td></tr>
                    </tbody>
                  </table>
                    </div>
                </div>
              </div>
            </div>
              <!-- no record found-->


                </div>
              </div>
              <!-- *********************************MY DSR Clsoe*********************************** -->

              <!-- *********************************All DSR Start*********************************** -->
              <div id="alldsr" class="tab-pane fade in  membership-table">
            <div class="box bg-white rounded c-pass-sec">
              <div class="box-header with-border">

              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <input type="text" name="startdate1" ng-model="startdate1" ng-value="startdate1" class="emdsrstartdate1 form-control" placeholder="Please enter start date">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <input type="text" name="enddate1" ng-model="enddate1" ng-value="enddate1"  class="emdsrenddate1 form-control" placeholder="Please enter start date">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mb-0">
                    <input type="button" name="search" ng-click="search1()"  class="btn btn-success mb-0" value="Search">
                  </div>
                </div>
              </div>

            </div>
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>S. No</th>
                        <th>Employee Name</th>
                        <th>Total Work/hr</th>
                        <th>Dsr Verified By</th>
                        <th>Timesheet Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-if="allemp.length != 0" ng-repeat="(key,x) in allemp">
                        <td>{{ start1 + $index }}</td>
                        <td>{{ x.name }}</td>

                          <td>{{ x.time }}</td>
                          <td>{{ x.approvedby }}</td>
                          <td>
                            <span ng-if="x.approved == 1">Approved</span>
                            <span ng-if="x.approved == 2">Rejected</span>
                            <span ng-if="x.approved == 0">No Action Taken</span>
                          </td>

                        <td>
                          <!-- action -->
                              <div  class="dropdown ac-cstm text-right">
                              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                              </a>
                              <div class="dropdown-menu fadeIn">
                              <a  class="dropdown-item" ng-click="viewdsr(x.employeeId,x.date)"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                              </div>
                              </div>
                          <!-- action -->
                        </td>


                      </tr>
                      <tr ng-if="allemp.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
                    </tbody>
                  </table>
                  </div>
                <div  id="pagination1"></div>


              </div>
            </div>
          </div>
              <!-- ****************All DSR Close*********************************** -->

              <!-- view dsr -->
              <div id="viewdsr" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <!-- Modal content-->
                  <div class="modal-content dsrcontent">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">DSR</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                     <table>
                       <thead>
                         <tr>
                           <th>Project Name</th>
                           <th>Task Title</th>
                           <th>Description</th>
                           <th>Task Status</th>
                           <th>Time Spent</th>
                           <th>Verified Status</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr ng-repeat="(key,x) in dsrviewdata">
                         <td>
                           <span ng-if="x.project">{{ x.project }}</span>
                           <span ng-if="!x.project">Additional</span>
                         </td>
                         <td>{{ x.task }} </td>
                         <td>{{ x.taskDetail }} </td>
                         <td>
                           <span ng-if="x.status == 1">Completed</span>
                           <span ng-if="x.status == 0">Pending</span>
                         </td>
                          <td>{{ x.time }} </td>
                     <td>
                         <span ng-if="x.approved == 0">No Action Taken</span>
                         <span ng-if="x.approved == 1">Approved</span>
                         <span ng-if="x.approved == 2">Rejected</span>
                         </tr>
                       </tbody>
                     </table>
                   </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button"  class="btn btn-default" data-dismiss="modal" >Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- view dsr -->

              <!-- view -->

                   <div id="view" class="modal fade" role="dialog">
                     <div class="modal-dialog">

                       <!-- Modal content-->
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">Task Details</h4>
                         </div>
                         <div class="modal-body">
                            <div class="mb-1">

                            <b>Task Type : </b>  {{ project }}
                            </div>
                            <div class="mb-1">

                            <b>Task Title : </b>  {{ task }}
                            </div>
                            <div class="mb-1">

                            <b>Task Description : </b>  {{ taskdescription }}
                            </div>
                            <div ng-if="history.length != 0" class="mb-1">
                            <hr>
                            <b>History </b>
                            <div ng-repeat="(key1,x) in history" class="mb-1">
                            <p><b>Status:</b> {{ x.message }}, <span ng-if="x.remarks"><b>Reason:</b> {{ x.remarks }}</span>  <span><b>Date:</b> {{ x.date | date }} at {{ x.date | time }}</span> </p>
                            </hr>
                            </div>
                            </div>

                          <div class="modal-footer">
                            <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Close</button>
                          </div>
                        </div>

                     </div>
                   </div>
                 </div>
                 <!-- view -->


              </div>
            </div>
            </div>
              </div>
              <!-- col -md-12 -->

            </div>
          </div>

        </div>
      </div>
    </div>

  </section>
</div>
