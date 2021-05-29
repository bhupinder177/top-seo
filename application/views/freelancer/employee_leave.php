<?php include('sidebar.php');?>

<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Submit Leave</li>
    </ol>
  </section>
  <section class="content submit_leave">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp40" ng-controller="myCtrt40">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box bg-white c-pass-sec box-primary">
                  <div class="box-header with-border">

                    <div class="row">

                      <div class="col-md-2">
                         <div class="form-group">
                           <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                             <option value="10">10</option>
                             <option value="20">20</option>
                             <option value="50">50</option>
                             <option value="100">100</option>
                           </select>
                         </div>
                         </div>
                         <div class="col-md-10">
                          <a data-toggle="modal" data-target="#addleave" class="btn btn-success pull-right">Submit Leave</a>
                        </div>
                   </div>
                    <!-- addleave -->
                    <div id="addleave" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Leave Application</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="m-0">Leave Type <span class="red-text">*</span></label>
                              <select onchange="angular.element(this).scope().changeleave(this)" id="type" class="form-control" name="remark" ng-model="type">
                                <option value="">Select Leave Type</option>
                                <option ng-repeat="(key,x) in allleavetype" data-id="{{ x.carryforwardtype }}" value="{{ x.id }}">{{ x.type }}</option>
                              </select>
                              <p ng-show="submitl && type == ''" class="text-danger">Please select leave type.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Reason For Leave <span class="red-text">*</span></label>
                              <textarea id="remark" class="form-control" name="remark" ng-model="remark" placeholder="Please enter reason for leave"></textarea>
                              <p ng-show="submitl && remark == ''" class="text-danger">Please enter remark.</p>
                            </div>

                            <div class="form-group">
                              <label for="position" class="m-0">From Date <span class="red-text">*</span></label>
                              <input readonly  type="text" id="date" readonly class="form-control leavestartdate " ng-model="date"   placeholder="Please enter date"  />
                              <p ng-show="submitl && date == ''" class="text-danger">Please enter date.</p>
                            </div>
                            <div class="form-group">
                              <label for="position" class="m-0">To Date <span class="red-text">*</span></label>
                              <input readonly   type="text" readonly id="date1" class="form-control date1 leaveenddate " ng-model="date1"   placeholder="Please enter date"  />
                              <p ng-show="submitl && date1 == ''" class="text-danger">Please enter date.</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="submitleave()" class="btn btn-success" >Submit</button>
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
                         <table ng-if="carryforward.length != 0" id="rankingTable" class="table  table-condensed">
                           <thead>
                             <tr>
                               <th>S. No.</th>
                               <th>Leave Type</th>
                               <th>No of leave</th>

                             </tr>
                           </thead>
                           <tbody>
                             <tr  ng-if="carryforward.length != 0">
                               <td>1</td>
                               <td>{{ carryforward.type }}</td>

                              <td>{{ carryforward.noofLeave  }}</td>

                             </tr>
                             <tr ng-if="carryforward.length == 0"><td colspan="4" class="text-center">No Record Found.</td></tr>

                           </tbody>
                         </table>

                    <table id="rankingTable" class="table  table-condensed">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th style="min-width: 80px;">Leave Type</th>
                          <th style="min-width: 150px;">Date</th>
                          <th>Reason For Leave</th>
                          <th>Leave Status</th>
                          <th>Action taken by</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="leave.length != 0" ng-repeat="(key,x) in leave">
                          <td>{{ start + $index }}</td>
                          <td>
                            {{ x.type }}
                            </td>
                            <td>
                              <span ng-if="x.date != x.date1">{{ x.date | date }} to {{ x.date1 | date }}</span>
                              <span ng-if="x.date == x.date1">{{ x.date | date }}</span>
                            </td>

                          <td>{{ x.remark }}</td>

                          <td class="d-flex">
                            <button ng-if="x.status == 0" class="btn bg-green" ng-click="editleave(x.id)"><i class="fa fa-edit"></i></button>
                            <button ng-if="x.status == 1" class="btn btn-success">Approved</button>
                            <button ng-if="x.status == 2" class="btn btn-danger">Declined</button>
                            <button ng-if="x.status == 3" class="btn btn-danger">Cancelled</button>
                          </td>
                          <td>
                          <span ng-if="x.actiontaken">{{ x.actiontaken }}</span>
                          <span ng-if="x.status == 2 || x.status == 3"><a ng-click="viewreason(key)"><i class="fa fa-eye" aria-hidden="true"></i></a></span>
                          <span ng-if="!x.actiontaken">N/A</span>
                          </td>
                        </tr>
                        <tr ng-if="leave.length == 0"><td colspan="5" class="text-center">No Record Found.</td></tr>
                      </tbody>
                    </table>
                      </div>
                    <div  id="pagination"></div>


                    <!-- Edit leave -->
                    <div id="editleave" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Leave Application</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="m-0">Select Leave Type <span class="red-text">*</span></label>
                              <select id="type1" class="form-control" name="remark" ng-model="type1">
                                <option value="">Leave Type</option>
                                <option ng-repeat="(key,x) in allleavetype" value="{{ x.id }}">{{ x.type }}</option>

                              </select>
                              <p ng-show="submitl && type1 == ''" class="text-danger">Please enter leave type.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Reason For Leave <span class="red-text">*</span></label>
                              <textarea id="remark1" class="form-control" name="remark" ng-model="remark1" placeholder="Please enter reason for leave"></textarea>
                              <p ng-show="submitl && remark1 == ''" class="text-danger">Please enter remark.</p>
                            </div>

                            <div class="form-group">

                              <label for="position" class="m-0">From Date <span class="red-text">*</span></label>

                              <input  type="text" readonly class="form-control startdateleave1 rounded-0" ng-model="date11" ng-value="date11" id="date11" placeholder="Please enter date"  />
                              <p ng-show="updatesubmit && date11 == ''" class="text-danger">Please enter date.</p>
                            </div>
                            <div class="form-group">

                              <label for="position" class="m-0">To Date <span class="red-text">*</span></label>

                              <input  type="text" readonly class="form-control enddateleave1 rounded-0" ng-model="date12" ng-value="date12" id="date12" placeholder="Please enter date"  />
                              <p ng-show="updatesubmit && date12 == ''" class="text-danger">Please enter to date.</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="updateleave()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- Edit leave -->


                      <!-- remark modal -->
                                                    <div class="modal fade" id="remarksv" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Leave Rejection Reason</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                           <div class="form-group">
                                                             <p> {{ viewremarks  }}</p>
                                                           </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- rejection modal -->
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
