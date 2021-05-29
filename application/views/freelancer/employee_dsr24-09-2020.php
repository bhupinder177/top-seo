<?php include('sidebar.php');?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Dsr</li>
    </ol>
  </section>
  <section class="content portfolio-cont dsr">
    <div class="no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp50" ng-controller="myCtrt50">

        <!-- add dsr -->
        <div id="adddsr" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content dsrcontent">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">DSR</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <input readonly placeholder="Dsr Date" type="text" name="date" value="" ng-model="dsrdate" class="form-control dsrdate" ng-value="dsrdate">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <input  type="button" name="date" ng-click="getdatewisedsr()" value="Search" class="btn btn-success mb-0" >
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="text-right">
                    <a ng-click="dsradd()"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
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
                 <tbody>
                   <tr ng-repeat="(key,x) in dsr">
                     <td>

                      <div class="form-group">
                       <select onchange="angular.element(this).scope().changeProject(this)" ng-disabled="x.already"  class="form-control">
                       <option value="">Select Project</option>
                       <option ng-repeat="(key1,x1) in allproject" data-key="{{ key }}" data-id="{{ x1.type }}" ng-selected="x1.selected"   value="{{ x1.id }}">{{ x1.project }}{{ x1.selected }}</option>
                        <!-- <option ng-selected="s"  value="0">Additional</option> -->
                     </select>
                    <p ng-show="submitl && x.projectId == ''" class="text-danger">Please select project.</p>
                   </div>
                   </td>
                   <td>
                      <div class="form-group">
                      <input ng-disabled="x.already" placeholder="Please enter task" ng-model="x.task" ng-value="x.task" type="text" class="form-control" name="task" >
                      <p ng-show="submitted && x.task == ''" class="text-danger">Please enter task.</p>
                    </div>
                   </td>
                   <td>
                     <div class="form-group">
                     <input ng-disabled="x.already" placeholder="Please enter description" ng-model="x.taskDetail" ng-value="x.taskDetail" type="text" class="form-control" name="description" >
                     <p ng-show="submitted && x.taskDetail == '' " class="text-danger">Please enter description.</p>
                   </div>
                   </td>
                   <td>
                     <div class="form-group">
                     <select ng-disabled="x.already" ng-model="x.status" name="status" class="form-control">
                     <option value="">Select Status</option>
                     <option   value="1">Complete</option>
                     <option   value="0">Pending</option>
                    </select>
                    <p ng-show="submitted && x.status == ''" class="text-danger">Please select status.</p>
                  </div>
                 </td>
                 <td>
                 <div class="form-group">
                 <input ng-disabled="x.already" ng-keyup="keyupcounthour()" type="text" placeholder="00:00" ng-model="x.time" x.value="x.time" class="form-control time-spend" name="time" >
                 <p ng-show="submitted && x.time == '' " class="text-danger">Please enter time.</p>
                 <p ng-show="submitted && x.time != '' && x.timeerror == 1 " class="text-danger">Please enter valid time.</p>
                 </div>
               </td>
               <td>
                <div class="form-group last-td">

                 <select disabled="disabled" class="form-control" ng-model="x.approved">
                   <option value="0">No Action Taken</option>
                   <option value="1">Approved</option>
                   <option value="2">Rejected</option>
                 </select>
                 <a class="removedsricon" ng-if="x.already == 0 && key != 0" ng-click="removedsr(key)"><i class="fa fa-trash" aria-hidden="true"></i></a>

                </div>
                   </tr>
                 </tbody>
               </table>
               <p class="red-text" ng-if="workingerror">Please fill minimum {{ working.workingHour }} hours a day</p>
               <div class="col-md-3 pl-0">
                 <div class="form-group">
                   <label>Total hours</label>
                   <input type="text" readonly ng-value="totalhours" ng-model="totalhours" name="totalhours" class="form-control">
                 </div>
               </div>

             </div>
              </div>
              <div class="modal-footer">
                <button type="button" ng-click="savedsr()" class="btn btn-success" >Submit</button>
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
                <ul class="nav nav-pills">
                  <?php
                  if ($this->session->userdata['clientloggedin']['access'] == 6)
                  {
                    ?>
                <li>
                <a data-toggle="tab" class="active show" href="#mydsr">My Dsr </a>
                </li>
                <?php
                 }
                if ($this->session->userdata['clientloggedin']['access'] == 6)
                {
                  ?>
                <li >
               <a data-toggle="tab" href="#alldsr">All Dsr</a>
               </li>
               <?php } ?>
                </ul>
                <!-- tabs -->
                <div class="tab-content">
                  <!-- *******************MY DSR Start*********************************** -->
                  <div id="mydsr" class="tab-pane fade in active show membership-table">
                <div class="box bg-white rounded c-pass-sec">
                  <div class="box-header with-border p-3">

                  <div class="row">
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
                      <div class="text-right"><a ng-click="getbilling()" class="btn btn-success mb-0">Add DSR</a></div>
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
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="alldsr.length != 0" ng-repeat="(key,x) in alldsr">
                          <td>{{ start + $index }}</td>
                          <td>{{ x.name }}</td>

                            <td>{{ x.time }}</td>
                            <td>{{ x.approvedby }}</td>
                            <td>
                              <span ng-if="x.approved == 1">Approved</span>
                              <span ng-if="x.approved == 2">Rejected</span>
                              <span ng-if="x.approved == 0">No Action Taken</span>
                            </td>
                            <td>{{ x.date | date }}</td>

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
                        <tr ng-if="alldsr.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
                      </tbody>
                    </table>
                      </div>
                    <div  id="pagination"></div>


                  </div>
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
