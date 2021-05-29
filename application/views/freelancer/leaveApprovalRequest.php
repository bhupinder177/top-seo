<?php include('sidebar.php'); ?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active"> Leave Approval Request </li>
      </ol>
    </section>
<section class="content portfolio-cont leave-list">
   <div class=" no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp78" ng-controller="myCtrt78">
          <div id="content">
      <div class="no-border-radius">
            <div class="row">
                  <div class="col-md-12">
               <div class="row">
                   <div class="col-md-2">
                      <div class="form-group">
                        <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                        </select>
                      </div>
                      </div>
                      </div>
                    <div class="box">
             				 <div class="box-body bg-white">
                                 <div class="table-responsive">
                      					 <table id="rankingTable" class="table">
                                     <thead>
                                        <tr>
                                       <th>S. No.</th>
                                       <th>Image</th>
                                       <th>Emp.Name</th>
                                       <th>Type</th>
                                       <th style="min-width: 100px;">Date</th>
                                       <th>Reason</th>
                                       <th>Leave Status</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                         <tr ng-if="leave.length != 0" ng-repeat="(key,x) in leave">
                                        <td>{{ start + $index }}</td>
                                        <td>
                                          <img ng-if="x.image" height="50" width="50" src="<?php echo base_url(); ?>assets/client_images/{{ x.image }}">
                                          <img ng-if="!x.image" height="50" width="50" src="<?php echo base_url(); ?>assets/client_images/noimage.jpg"></td>
                      					<td>{{ x.name }}</td>
                                         <td>{{ x.type }}</td>
                                          <td>
                                            <span ng-if="x.date != x.date1">{{ x.date | date }} to {{ x.date1 | date }}</span>
                                            <span ng-if="x.date == x.date1">{{ x.date | date }}</span>
                                          </td>
                                          <td><a ng-click="viewreason(key)"><i class="fa fa-eye" aria-hidden="true"></i></a></td>



                                         <td class="btn-list">
                                         <a style="width:" ng-if="x.status == 0" ng-click="confirm(1,x.id,x.employeeId)" class="btn bg-green">Approve</a>
                                         <a  ng-if="x.status == 0" ng-click="confirm(2,x.id,x.employeeId)" class="btn btn-danger" >Decline</a>
                                         <a  ng-if="x.status == 1" class="btn bg-green">Approved</a>
                                         <a ng-click="confirm(3,x.id,x.employeeId)" ng-if="x.status == 1" class="btn bg-gray">Cancel</a>
                                         <a  ng-if="x.status == 3" class="btn bg-ligh-gray">Cancelled</a>
                                         <a  ng-if="x.status == 2" class="btn btn-danger">Declined</a>
                                         </td>
                                         </tr>
                                         <tr ng-if="leave.length == 0"><td colspan="7" class="text-center">No Record Found.</td></tr>
                                         </tbody>
                      					 </table>
                                 </div>
                      					 <div  id="pagination"></div>

                                 <!-- delete confirm modal -->
                                 <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                         <h4 class="modal-title">Status</h4>
                                       </div>
                                       <div class="modal-body">
                                         <p ng-if="status == 1">Are you sure you want to Approve this Leave ?</p>
                                         <p ng-if="status == 2">Are you sure you want to Decline this leave ?</p>
                                         <p ng-if="status == 3">Are you sure you want to Cancel this leave ?</p>
                                       </div>
                                       <div class="modal-footer">
                                         <button type="button" ng-click="statusUpdate()" class="btn btn-success" id="confirm">Confirm</button>

                                         <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                      					 <!-- delete confirm modal -->

                                 <!-- reason  modal -->
                                 <div class="modal fade" id="reasonbox" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                         <h4 class="modal-title">Leave Rejection Reason</h4>
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

                                <!-- remark modal -->
                                <div class="modal fade" id="remarksv" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Remarks</h4>
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
