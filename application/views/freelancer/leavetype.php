<?php

include('sidebar.php');
?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Leave Configuration</li>
    </ol>
  </section>


  <section class="content leave-type">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp43" ng-controller="myCtrt43">
        <div id="content">
            <div class="row">
              <div class="col-md-12">
                <div class="box bg-white">
                  <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-2 form-group">

                        <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        </select>

                        </div>
                        <div class="col-md-10">
                         <div class="text-right p-2"> <a data-toggle="modal" data-target="#addleavetype" class="btn btn-success">Add Leave Configuration</a></div>
                       </div>
                    </div>
                    <!-- addleave -->
                    <div id="addleavetype" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Leave Configuration</h4>
                          </div>
                          <div class="modal-body">

                            <div class="form-group">
                              <!-- <a data-toggle="modal" data-target="#addinterview" class="btn btn-success pull-right">Assign Interviewer</a> -->
                              <label for="name" class="m-0">Leave Type<span class="red-text">*</span></label>
                              <input id="title" class="form-control" name="title" ng-model="title" placeholder="Please enter leave type">
                              <p ng-show="submitl && title == ''" class="text-danger">Please enter leave type.</p>
                            </div>


                            <div class="form-group">
                              <label for="name" class="m-0">Duration<span class="red-text">*</span></label>
                              <input  id="duration" class="form-control numberdecimalonly" name="duration" ng-model="duration" placeholder="Please enter duration">
                              <p ng-show="submitl && duration == ''" class="text-danger">Please enter duration.</p>

                            </div>
                            <div class="form-group">
                              <label for="name" class="m-0">Duration Type<span class="red-text">*</span></label>
                              <select id="durationType" class="form-control" name="duration" ng-model="durationType" >
                                <option value="">Select duration Type</option>
                                <option value="Hour">Hour</option>
                                <option value="Day">Day</option>
                              </select>
                              <p ng-show="submitl && durationType == ''" class="text-danger">Please select duration Type.</p>

                          </div>

                          <div class="form-group">
                            <label for="name" class="m-0">Reoccuring<span class="red-text">*</span></label>
                            <input id="reoccuring" class="form-control numberonly" placeholder="Please enter reoccuring" name="reoccuring" ng-model="reoccuring" >
                            <p ng-show="submitl && reoccuring == ''" class="text-danger">Please enter reoccuring.</p>
                         </div>

                         <div class="form-group">
                           <label for="name" class="m-0">Reoccuring Type<span class="red-text">*</span></label>
                           <select id="reoccuringType" class="form-control"  name="recurringType" ng-model="reoccuringType" >
                             <option value="">Select Reoccuring Type</option>
                             <option value="1">Day</option>
                             <option value="2">Month</option>
                             <option value="3">Year</option>
                             <option value="4">Once</option>
                           </select>
                           <p ng-show="submitl && reoccuringType == ''" class="text-danger">Please select reoccuring type.</p>
                        </div>

                        </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="submitleavetype()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- add leave -->

                  </div>



                  <div class="box-body">
                      <div class="table-responsive">
                       <h6>Carry Forward Leave</h6>
                        <!-- carry forward leave -->
                        <table  id="rankingTable" class="table  table-condensed">
                          <thead>
                            <tr>
                              <th>S. No.</th>
                              <th>Leave Type</th>
                              <th>Start Date</th>
                              <th>Carry Forward Upto(Month)</th>
                              <th class="text-right">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr  ng-if="carryforward.length != 0">
                              <td>1</td>
                              <td>{{ carryforward.type }}</td>

                             <td>{{ carryforward.startDate  }}</td>
                             <td>{{ carryforward.carryUpto }}</td>
                              <td>
                                  <div class="dropdown ac-cstm text-right">
                                     <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                     </a>
                                     <div class="dropdown-menu fadeIn">
                                         <a class="dropdown-item" title="Edit leave type" ng-click="editcarryforward()"><i class="fa fa-edit"></i> Edit</a>
                                         <a ng-if="carryforward.startDate  && carryforward.status == 0" class="dropdown-item" ng-click="statusconfirm(carryforward.id,'1')"><i class="fa fa-bell"></i> Activate</a>
                                         <a ng-if="carryforward.startDate  && carryforward.status == 1" class="dropdown-item" ng-click="statusconfirm(carryforward.id,'0')"><i class="fa fa-bell"></i>Deactivate</a>
                                                   </div>
                                  </div>
                              </td>
                            </tr>
                            <tr ng-if="carryforward.length == 0"><td colspan="4" class="text-center">No Record Found.</td></tr>

                          </tbody>
                        </table>
                        <!-- carry forward leave -->
                 <h6>Normal Leave</h6>
                    <table  id="rankingTable" class="table  table-condensed">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Leave Type</th>
                          <th>Duration</th>
                          <th>No. of Reoccuring</th>
                          <th>Reoccuring Type</th>
                          <th class="text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="leavetype.length != 0" ng-repeat="(key,x) in leavetype">
                          <td>{{ start + $index }}</td>
                          <td>{{ x.type }}</td>
                         <td>{{ x.duration }} {{ x.durationType }}</td>
                         <td>{{ x.reoccuring }}</td>
                         <td>
                           <span ng-if="x.reoccuringType == 1">Day</span>
                           <span ng-if="x.reoccuringType == 2">Month</span>
                           <span ng-if="x.reoccuringType == 3">Year</span>
                           <span ng-if="x.reoccuringType == 4">Once</span>
                         </td>
                          <td>
                              <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a class="dropdown-item" title="Edit leave type" ng-click="editleavetype(x.id)"><i class="fa fa-edit"></i> Edit</a>
                                     <a ng-if="x.delete == 0" class="dropdown-item" ng-click="confirm(x.id)"><i class="fa fa-trash"></i> Delete</a>
                                               </div>
                              </div>
                          </td>
                        </tr>
                        <tr ng-if="leavetype.length == 0"><td colspan="4" class="text-center">No Record Found.</td></tr>
                      </tbody>
                    </table>
                      </div>
                    <div  id="pagination"></div>


                    <!-- Edit leave -->
                    <div id="editleavetype" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Leave Configuration</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="m-0">Leave Type<span class="red-text">*</span></label>
                              <input id="title1" class="form-control" name="title1" ng-model="title1" ng-value="title1" placeholder="Please enter leave type">
                              <p ng-show="submitl && title1 == ''" class="text-danger">Please enter leave type.</p>
                            </div>
                            <div class="form-group">
                              <label for="name" class="m-0">Duration<span class="red-text">*</span></label>
                              <input  id="duration1" class="form-control numberdecimalonly" name="duration" ng-model="duration1" placeholder="Please enter duration">
                              <p ng-show="submitl && duration1 == ''" class="text-danger">Please enter duration.</p>

                            </div>
                            <div class="form-group">
                              <label for="name" class="m-0">Duration Type<span class="red-text">*</span></label>
                              <select id="durationType1" class="form-control" name="duration" ng-model="durationType1" >
                                <option value="">Select duration Type</option>
                                <option value="Hour">Hour</option>
                                <option value="Day">Day</option>
                              </select>
                              <p ng-show="submitl && durationType1 == ''" class="text-danger">Please select duration Type.</p>

                          </div>
                          <div class="form-group">
                            <label for="name" class="m-0">Reoccuring<span class="red-text">*</span></label>
                            <input id="reoccuring1" class="form-control numberonly" placeholder="Please enter reoccuring" name="reoccuring" ng-model="reoccuring1" >
                            <p ng-show="submitl && reoccuring1 == ''" class="text-danger">Please enter reoccuring.</p>
                         </div>

                         <div class="form-group">
                           <label for="name" class="m-0">Reoccuring Type<span class="red-text">*</span></label>
                           <select id="recurringType1" class="form-control"  name="recurringType" ng-model="reoccuringType1" >
                             <option value="">Select Reoccuring Type</option>
                             <option value="1">Day</option>
                             <option value="2">Month</option>
                             <option value="3">Year</option>
                             <option value="4">Once</option>
                           </select>
                           <p ng-show="submitl && recurringType1 == ''" class="text-danger">Please select reoccuring type.</p>
                        </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="updateleavetype()" class="btn btn-success" >Update</button>
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

                            <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- delete confirm modal -->

                    <!-- carryforward edit -->

                    <div id="editcarryforward" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Carry Forward Leave</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="m-0">Leave Type<span class="red-text">*</span></label>
                              <input  id="title1" class="form-control" name="title1" ng-model="ctitle" ng-value="ctitle" placeholder="Please enter leave type">
                              <p ng-show="submitl && ctitle == ''" class="text-danger">Please enter leave type.</p>
                            </div>

                          <div class="form-group">
                            <label for="name" class="m-0">Effective Date<span class="red-text">*</span></label>
                            <input readonly mydatepicker="" id="cstartdate" class="form-control numberonly" placeholder="Please enter reoccuring" name="reoccuring" ng-model="cstartdate" >
                            <p ng-show="submitl && cstartdate == ''" class="text-danger">Please enter startdate.</p>
                         </div>

                         <div class="form-group">
                           <label for="name" class="m-0">Carry Forward Upto (Month)<span class="red-text">*</span></label>
                           <input type="text" id="carryupto" class="form-control numberdecimalonly"  name="carryupto" ng-model="cupto" >
                           <p ng-show="submitl && cupto == ''" class="text-danger">Please enter carry upto.</p>
                        </div>
                        <div class="form-group">
                          <label for="name" class="m-0">Leaves Carry Forward</label>
                          <input type="checkbox" class="leavescarryforwardcheck" id="leavescarryforward" class=""  name="leavescarryforward" ng-checked="leavescarryforward == 1"   >
                       </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="updatecarryforward()" class="btn btn-success" >Update</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- carryforward edit -->

                    <!-- Status confirm modal -->
                    <div class="modal fade" id="statusconfirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Status</h4>
                          </div>
                          <div class="modal-body">
                            <p ng-if="status == 1">Are you sure you want to Activate this record ?</p>
                            <p ng-if="status == 0">Are you sure you want to Deactivate  this record ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="changeStatus()" class="btn btn-success" id="confirm">Confirm</button>

                            <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Status confirm modal -->


                  </div>
                </div>
              </div>
            </div>


        </div>
      </div>
    </div>

  </section>
</div>
