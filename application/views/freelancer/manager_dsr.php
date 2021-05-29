<?php include('sidebar.php'); ?>

<div id="wrapper" class="content-wrapper">
  <section class="content-header">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Timesheet</li>
    </ol>
  </section>

  <section class="content portfolio-cont manage-dsr">
    <div class="no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp51" ng-controller="myCtrt51">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header with-border">
                    <div class="row ">
                           <div class="col-md-1.5 pl-3">
                             <div class="form-group">
                               <select  ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                                 <option  value="1000">1000</option>
                                 <option value="1200">1200</option>
                                 <option value="1500">1500</option>
                                 <option value="2000">2000</option>
                               </select>
                             </div>
                           </div>
                           
						   <div class="col-md-2">
                               <div class="form-group">
                                 <select  ng-model="employee"  class="form-control">
                                   <option   value="">Select Employee</option>
                                   <option  ng-repeat="(key,x) in allemployee"  value="{{ x.u_id }}">{{ x.name }}</option>
                                 </select>
                               </div>
                           </div>

                           <div class="col-md-2">
                               <div class="form-group">
                                 <select  ng-model="status"  class="form-control">
                                   <option   value="">Select Status</option>
                                   <option value="0">Pending</option>
                                   <option value="1">Appproved</option>
                                   <option value="2">Rejected</option>
                                 </select>
                               </div>
                           </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <input readonly  id="dsrstartdate" ng-model="startdate"  type="text" class="form-control dsrstartdate" placeholder="Please select start date" >
                                </div>
                            </div>
                           
						   <div class="col-md-2">
                                <div class="form-group">
                                    <input readonly  id="dsrenddate" ng_model="enddate" type="text" class="form-control dsrenddate" placeholder="Please select end date" >
                                </div>
                            </div>
                        
						<div class="col-md-1.5 pl-1 pr-3">
							   <div class="form-group sea-cstm">
						   <input  type="button" ng-click="search()" value="Search" class="btn btn-info w-100" >
						 </div>
                </div>
                        
						<div class="col-md-1.5">
							   <div class="form-group sea-cstm">
						   <input  type="button" ng-click="reset()" value="Reset" class="btn btn-info w-100" >
						 </div>
						</div>
                  
				  </div>
                  </div>
                  <div class="box-body">
                      <div class="table-responsive">
                        <div ng-if="alldsr.length != 0" ng-repeat="(key2,x1) in alldsr" class="row" >

                        <div  class="col-md-4 no-padding"  >
                          <div class="col-lg-12 tble_hed_prmtg">
                              <h3 class="box-title p-2 "> {{ x1.date | date }} ,Overall Status : <span ng-if="x1.overallStatus == 0">Pending</span><span ng-if="x1.overallStatus == 1">Approved</span><span ng-if="x1.overallStatus == 2">Rejected</span></h3>
                          </div>
                            <div class="table_data table_hwr">
                    <table class="table timesheettable">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Employee</th>
                          <th>Time</th>
                          <th>Adjusted Time</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="alldsr.length != 0" ng-repeat="(key,x) in x1.dsr">
                          <td >{{ $index + 1 }}</td>
                          <td ng-click="dsrhistory(x.employeeId,x.date,key)">{{ x.name }}</td>


                          <td ng-style="{ 'background-color': x.totaltime > working.workingHour  ? 'red':'white' } " >{{ x.time }}</td>
                          <td >{{ x.adjusted }}</td>
                          <td >
                            <span  ng-if="x.approved == 0">Pending</span>
                            <span   ng-if="x.approved == 1">Approved</span>
                            <span   ng-if="x.approved == 2">Rejected</span>
                          </td>
                        </tr>
                        <tr ng-if="alldsr.length == 0"><td colspan="7" style="text-align: center;">No Record Found.</td></tr>
                      </tbody>
                    </table>
                  </div>
                  </div>


                  <div  class="col-md-8 taskdetailtable no-padding">
                    <div class="col-lg-12 tble_hed_prmtg">
                        <h3 class="box-title p-2 "> {{ x1.taskdetail[0].name }}</h3>
                    </div>
                    <div ng-if="x1.taskdetail.length != 0" class="table_data">
                    <table class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>S. No</th>
                          <th>Task Title</th>
                          <th>Task</th>
                          <th>Time</th>
                          <th width="100px;">Adjusted Time</th>
                          <th>Approved By</th>
                          <th>Approval Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="alldsr.length != 0" ng-repeat="(key1,x2) in x1.taskdetail">
                          <td><i ng-click="viewdescription(x2.dsrId)" class="fa fa-eye" aria-hidden="true"></i></td>
                          <td >{{ $index + 1 }}</td>
                          <td>
                            {{ x2.project |limitTo:15 }}
                            <!-- <span ng-if="x2.type == 1">General Task</span>
                            <span ng-if="x2.type == 2">Project</span>
                            <span ng-if="x2.type == 3">Contract </span>
                            <span ng-if="x2.type == 4">Gig</span>
                            <span ng-if="x2.type == 5">Additional Task</span>
                            <span ng-if="x2.type == 6">Break</span> -->
                          </td>
                          <td >{{ x2.task }}</td>
                          <td >{{ x2.time }}</td>
                          <td >
                            <div class="form-group">
                              <input ng-readonly="x2.readonly || x2.approved == 2 || x2.approved == 1" type="text" class="form-control" ng-keyup="adjustmentTimekeyup($event.target.value,x2.dsrId,key2,key1)" ng-value="x2.adjustedTime" ng-model="x2.adjustedTime" >
                              <p class="red-text" ng-show="x2.error == 1 && timeerror">Please enter valid time format</p>
                            </div>
                          </td>
                          <td >
                            <span ng-if="x2.approvedby">{{ x2.approvedby }}</span>
                            <span ng-if="!x2.approvedby">N/A</span>
                          </td>
                          <td >
                           <div class="form-group">
                             <select ng-disabled="x2.readonly" ng-model="x2.approved" convert-to-number onchange="angular.element(this).scope().changeStatus(this)" class="form-control">
                            <option data-id="{{ x2.dsrId }}" data-key="{{ key2 }}" data-key2="{{ key }}" data-key1="{{ key1 }}"  ng-selected="x2.approved == 0" value="0">Pending</option>
                            <option data-id="{{ x2.dsrId }}" data-key="{{ key2 }}" data-key2="{{ key }}" data-key1="{{ key1 }}" ng-selected="x2.approved == 1" value="1" >Approved</option>
                            <option data-id="{{ x2.dsrId }}" data-key="{{ key2 }}" data-key2="{{ key }}" data-key1="{{ key1 }}" ng-selected="x2.approved == 2" value="2">Rejected</option>
                          </select>
                           </div>
                          </td>
                        </tr>
                        <tr ng-if="alldsr.length == 0"><td colspan="7" style="text-align: center;">No Record Found.</td></tr>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>

                <!-- no record -->
                <div class="row" ng-if="alldsr.length == 0" >
                  <div class="col-lg-12 tble_hed_prmtg">

                  </div>
                <div class="col-md-4 no-padding"  >
                    <div class="table_data table_hwr">
            <table class="table timesheettable">
              <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Employe Name</th>
                  <th>Time</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-if="alldsr.length == 0"><td colspan="7" style="text-align: center;">No Record Found.</td></tr>
              </tbody>
            </table>
          </div>
          </div>
        </div>
                <!-- no record -->

                      </div>
                    <div id="pagination"></div>




                    <!-- view -->

                    <div id="viewmanagerdsrview" class=" modal fade" role="dialog">
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
                            <p><ul><li><b>Status:</b> {{ x.message }},</li> <li ng-if="x.remarks"><b>Reason:</b> {{ x.remarks }},</li>  <li><b>Date:</b> {{ x.date | date }} at {{ x.date | time }}</li></ul> </p>
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

                  <!-- reason  modal -->
                  <div class="modal fade" id="reasonbox" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h4 class="modal-title">Dsr Rejection Reason</h4>
                        </div>
                        <div class="modal-body">
                         <div class="form-group">
                           <label>Reason<span class="red-text">*</span></label>
                           <textarea class="form-control" id="reason" ng-model="reason" placeholder="Please enter reason"></textarea>
                           <p ng-show="submitl && reason == ''" class="text-danger">Please enter reason.</p>

                         </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" ng-click="reasonUpdate()" class="btn btn-success" id="confirm">Submit</button>

                        </div>
                      </div>
                    </div>
                  </div>
                 <!-- Reason modal -->




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
