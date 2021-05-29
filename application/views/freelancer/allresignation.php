<?php
   include('sidebar.php');
   ?>
<div id="wrapper" class="content-wrapper">
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
         <li class="active">Employee Resignation List</li>
      </ol>
   </section>
   <section class="content">
      <div class=" no-margin user-dashboard-container">
         <div ng-cloak  ng-app="myApp39" ng-controller="myCtrt39">
            <div id="content">
               <div class="no-border-radius">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="box">
							<div class="p-3">
                           <div class="row">
                              <div class="col-md-2 form-group mb-0">
                                 <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                 </select>
                              </div>
                              </div>
                           </div>
                           <div class="box-body resign-cstm">
                              <div class="table-responsive">
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th>S. No.</th>
                                          <th>Employee Name</th>
                                          <th style="min-width:100px;">Applied On</th>
                                          <th style="min-width:100px;">Effective from</th>
                                          <th style="min-width:100px;">Effective to</th>
                                          <th style="width:140px;">Status</th>
                                          <th class="text-right">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr ng-if="resignation.length != 0" ng-repeat="(key,x) in resignation">
                                          <td>{{ start + key }}</td>
                                          <td>{{ x.name }}</td>

                                          <td>{{ x.date | date }}</td>
                                          <td>{{ x.date | date }}</td>
                                          <td ><span ng-if="x.leaveDate">{{ x.leaveDate | date }}</span></td>
                                          <td class="form-group">
                                             <select  onchange="angular.element(this).scope().statusUpdate(this)" ng-model="x.status" class="form-control">
                                                <option data-id="{{ x.id }}" data-user="{{ x.employeeId }}" ng-if="x.status == 0" value="0">Pending</option>
                                                <option data-id="{{ x.id }}" data-user="{{ x.employeeId }}" ng-if="x.status == 0" value="1">Accept</option>
                                                <option data-id="{{ x.id }}" data-user="{{ x.employeeId }}" ng-if="x.status == 1" value="1">Accepted</option>
                                                <option data-id="{{ x.id }}" data-user="{{ x.employeeId }}" ng-if="x.status == 0" value="2">Reject</option>
                                                <option data-id="{{ x.id }}" data-user="{{ x.employeeId }}" ng-if="x.status == 2" value="2">Rejected</option>
                                                <option data-id="{{ x.id }}" data-user="{{ x.employeeId }}" ng-if="x.status == 1" value="3">Cancel</option>
                                                <option data-id="{{ x.id }}" data-user="{{ x.employeeId }}" ng-if="x.status == 3" value="3">Cancelled</option>
                                             </select>
                                          </td>
                                          <td>
                                             <div class="dropdown ac-cstm text-right">
                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                                </a>
                                                <div class="dropdown-menu fadeIn">
                                                  <a  ng-click="resignationreason(x.id)" class="dropdown-item openDialog" ><i class="fa fa-eye"></i>View</a>

                                                   <a target="_blank" class="dropdown-item openDialog" href="<?php echo base_url(); ?>freelancer/resignationDownload/{{ x.id }}"><i class="fa fa-download" aria-hidden="true"></i>Download</a>
                                                   <a ng-if="x.status == 1" ng-click="edit(x.id)" class="dropdown-item openDialog" title="Edit"  ><i class="fa fa-pencil-square-o"></i>Effective Date</a>
                                                   <a  ng-if="x.reason" ng-click="rejectionreason(x.id)" class="dropdown-item openDialog" ><i class="fa fa-eye"></i>Rejection Reason</a>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr ng-if="resignation.length == 0">
                                          <td colspan="6" class="text-center">No Record Found.</td>
                                       </tr>
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
                                          <h4 class="modal-title">Delete</h4>
                                       </div>
                                       <div class="modal-body">
                                          <p ng-if="status == 1">Are you sure you want to Accept this resignation ?</p>
                                          <p ng-if="status == 2">Are you sure you want to Reject this resignation ?</p>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" ng-click="statusUpdate()" class="btn btn-success" id="confirm">Confirm</button>
                                          <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- delete confirm modal -->
                              <!-- change leave date -->
                              <div class="modal fade" id="edit" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title">Change Relieving Date</h4>
                                       </div>
                                       <div class="modal-body">
                                          <div class="form-group">
                                             <label>Relieving date<span class="red-text">*</span></label>
                                             <input id="relievingdate" type="text" name="date" mydatepicker="" placeholder="Please select relieving date" ng-model="relievingdate" ng-value="relievingdate" class="form-control">
                                             <p ng-show="submit && relievingdate == ''" class="text-danger">Relieving date is required.</p>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" ng-click="update()" class="btn btn-success" id="confirm">Update</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- change leave date -->
                              <!-- reason  modal -->
                              <div class="modal fade" id="reasonbox" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 ng-if="status == 2" class="modal-title">Resignation Rejected Reason</h4>
                                          <h4 ng-if="status == 3" class="modal-title">Resignation Cancelled Reason</h4>
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
                              <!-- rejection modal -->
                              <div class="modal fade" id="rejection" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title">Rejection Reason</h4>
                                       </div>
                                       <div class="modal-body">
                                          <div class="form-group">
                                             <p> {{ leavedata.reason  }}</p>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- rejection modal -->

                              <!-- resignation reason -->
                              <div class="modal fade" id="resignationReason" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title">Resignation Reason</h4>
                                       </div>
                                       <div class="modal-body">
                                          <div class="form-group">
                                              <p ng-bind-html="leavedata.remarks | trustAsHtml" class="dat-p"></p>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- resignation reason -->
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
