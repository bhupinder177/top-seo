<?php include('sidebar.php'); ?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a>></li>
      <li class="active">Invoice</li>
    </ol>
  </section>
  <section class="content portfolio-cont">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp14" ng-controller="myCtrt14">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-body">
                      <div class="table-responsive">
                    <table  id="rankingTable" class="table">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>invoice#</th>
                          <th>Freelancer</th>
                          <th>Payment Mode</th>
                          <th>Paid Amount</th>
                          <th>Status</th>
                          <th>Amount</th>
                          <th>Payable Amount</th>
                          <th>Edit</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="allinvoice.length != 0" ng-repeat="(key,x) in allinvoice">
                          <td>{{ x.date | date  }}</td>
                          <td>{{ x.reference }}</td>
                          <td>{{ x.name }}</td>
                          <td>
                            <span ng-if="x.paymentReceived ==1">Bank</span>
                            <span ng-if="x.paymentReceived ==2">Cash</span>
                            <span ng-if="x.paymentReceived ==3">Paypal</span>
                          </td>
                          <td>{{ x.receivedAmount }}</td>
                          <td>
                            <span ng-if="x.status == 1">Paid</span>
                            <span ng-if="x.status == 0">Unpaid</span>
                            <span ng-if="x.status == 2">Rejected</span>
                          </td>

                          <td>{{ x.code }} {{ x.symbol }} {{ x.amount }}</td>
                          <td>{{ x.code }} {{ x.symbol }} {{ x.payable }}</td>
                          <td>
                                <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a class="dropdown-item" title="Edit invoice" href="<?php echo base_url(); ?>client-invoiceedit/{{ x.invoiceId }}"  ><i class="fa fa-edit"></i> Edit</a>

                                     <a target="_blank" class="dropdown-item"  href="<?php echo base_url(); ?>freelancerinvoicedownload/{{ x.invoiceId }}"><i class="fa fa-download" aria-hidden="true"></i>Download(pdf)</a>
                                  </div>
                              </div>
                          </td>

                        </tr>
                        <tr ng-if="allinvoice.length == 0"><td colspan="7" class="text-center">No Record Found.</td></tr>
                      </tbody>
                    </table>
                      </div>
                    <div  id="pagination"></div>

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
                            <div class="form-group ">
                              <label for="name" class="m-0">Task Title*</label>
                              <input ng-readonly="checked" id="name" class="form-control" name="name" ng-model="name1" ng-value="name1" placeholder="Please enter todo name">
                              <p ng-show="submitl && name1 == ''" class="text-danger">Please enter todo name.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Priority*</label>
                              <select ng-disabled="checked" id="priority1" class="form-control" name="prority" ng-model="priority1" >
                                <option value="">Select Priority</option>
                                <option value="1">High</option>
                                <option value="2">Medium</option>
                                <option value="3">Low</option>
                              </select>
                              <p ng-show="submitl && priority1 == ''" class="text-danger">Please enter priority.</p>
                            </div>
                            <div class="form-group d-inline-block">
                              <label for="name" class="m-0">Department*</label>
                               <select ng-disabled="checked" onchange="angular.element(this).scope().getteam(this)"  class="form-control rounded-0" ng-model="department1" id="department">
                              <option value="">Select Department</option>
                              <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>
                              </select>
                              <p ng-cloak ng-show="submitl && department1 == ''" class="text-danger">Please select department.</p>
                            </div>

                            <div class="form-group d-inline-block">
                              <label for="name" class="m-0">Team*</label>
                               <select ng-disabled="checked" class="form-control rounded-0" ng-model="team1" id="team">
                              <option value="">Select Employee</option>
                              <option ng-repeat="(key,x) in allteam" value="{{ x.id }}">{{ x.name }}</option>
                              </select>
                              <p ng-cloak ng-show="submitl && team1 == ''" class="text-danger">Please select team.</p>
                            </div>
                            <div class="form-group d-inline-block">
                              <label for="name" class="m-0">Task detail*</label>
                               <textarea ng-readonly="checked"  class="form-control rounded-0" ng-model="description1" ng-value="description1" ></textarea>
                              <p ng-cloak ng-show="submitl && description1 == ''" class="text-danger">Please enter description.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Status*</label>
                              <select id="status1" class="form-control" name="status1" ng-model="status1" >
                                <option value="">Select Status</option>
                                <option value="1">Done</option>
                                <option value="2">Pending</option>
                              </select>
                              <p ng-show="submitl && status1 == ''" class="text-danger">Please select status.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Due date*</label>
                              <input ng-disabled="checked" id="date1" mydatepicker class="form-control" name="date" ng-model="date1" ng-value="date1" >
                              <p ng-show="submitl && date1 == ''" class="text-danger">Please select date.</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="updatetodo()" class="btn btn-success" >Submit</button>
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
                            <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>
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
