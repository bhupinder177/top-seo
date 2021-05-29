<?php include('sidebar.php');?>
<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Expense</li>
    </ol>
  </section>
  <section class="content portfolio-cont expence-cstm">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp24" ng-controller="myCtrt24">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                    <div class="bg-white mt-3">
               <h3 class="py-2 px-3">Current Month Expense</h3>
                  <div class="box-header with-border">
                    <div class="col-md-12">
                      <div class="row">
                    <div class="col-xl-8 col-lg-12">
                      <div class="row">
                     <div class="col-xl-3 col-md-4">
                     <div class="form-group">
                       <select ng-model="sexpense" type="text" class="form-control" >
                         <option value="">Select Expense</option>
                         <option ng-repeat="(key,x2) in expenseName" value="{{ x2.expense }}">{{ x2.expense}}</option>
                       </select>
                     </div>
                   </div>
                  <div class="col-xl-3 col-md-4">
                   <div class="form-group">
                     <input id="expensestartdate" ng-model="startdate" type="text" class="form-control expensedate" placeholder="Start Date" >
                   </div>
                 </div>
                 <div class="col-xl-3 col-md-4">
                  <div class="form-group">
                    <input id="expenseenddate" mydatepicker  ng-model="enddate" type="text" class="form-control date1" placeholder="End Date" >
                  </div>
                </div>

                <div class="col-xl-2 col-md-4">
                 <div class="form-group sea-cstm">
                   <input  ng-click="searchdate()" type="button" value="Search" class="btn btn-success w-100" >
                 </div>
               </div>
               </div>
               </div>
               <div class="col-xl-2 col-lg-12">
                 <a data-toggle="modal" data-target="#addexpense" class="btn btn-success pull-right">Add Expense</a>
               </div>
                <div class="col-xl-2 col-lg-12">
                  <a ng-click="clone()" class="btn btn-success pull-right">Clone</a>
                </div>

                <div class="col-xl-2 col-lg-12">
                  <a ng-click="exportexcel()"  class="btn btn-success pull-right">Export Excel</a>
                </div>
                  </div>
                      </div>

                    <!-- addexpense -->
                    <div id="addexpense" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Expense</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="name" class="m-0">Expense name<span class="red-text">*</span></label>
                              <input id="expense" ng-keyup="getsuggestionName(this)" class="form-control" name="expense" ng-model="expense" ng-value="expense" placeholder="Please enter expense">
                              <ul  if-ng="suggestion.length != 0" >
                                <li hand ng-repeat="(key,x3) in suggestion" ng-click="addsuggestion(x3.expense)" >{{ x3.expense }} </li>
                              </ul>
                              <p ng-show="updatesubmit && expense == ''" class="text-danger">Please enter expense.</p>
                            </div>
                              <div class="form-group">
                                <label for="state">Currency<span class="red-text">*</span></label>
                                <select disabled  id="currency" class="form-control" ng-model="currency">
                                  <option value="">Select Currency</option>
                                  <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                                </select>
                                <p ng-cloak ng-show="updatesubmit && currency == ''" class="text-danger">Please select currency.</p>
                              </div>

                            <div class="form-group">
                              <label for="name" class="m-0">Amount<span class="red-text">*</span></label>
                              <input id="amount" class="form-control numberdecimalonly" name="amount" ng-model="amount" ng-value="amount" placeholder="Please enter amount">
                              <p ng-show="updatesubmit && amount == ''" class="text-danger">Please enter amount.</p>
                              <p ng-show="updatesubmit && amount != '' && amount == 0 " class="text-danger">Please enter valid amount.</p>
                            </div>

                            <div class="form-group">
                              <label for="position" class="m-0">Payment Status<span class="red-text">*</span></label>
                              <select onchange="angular.element(this).scope().paidBycheck(this)" type="text"  class="form-control" ng-model="status"  id="status">
                              <option value="">Select Payment Status</option>
                              <option value="1">Paid</option>
                              <option value="2">Unpaid</option>
                            </select>
                              <p ng-show="updatesubmit && status == ''" class="text-danger">Please select payment status.</p>
                            </div>

                            <div class="form-group">
                              <label for="position" class="m-0">Paid By<span class="red-text">*</span></label>
                              <select ng-disabled="disabled" type="text"  class="form-control" ng-model="paidby"  id="paidby">
                              <option value="">Select Paid by</option>
                              <option value="1">Bank</option>
                              <option value="2">Cash</option>
                              <option value="3">Paypal</option>
                              <option value="4">Credit Card</option>
                              <option value="5">Debit Card</option>
                                </select>
                              <p ng-show="updatesubmit && status == 1 && paidby == ''" class="text-danger">Please select paid by.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Date<span class="red-text">*</span></label>
                              <input mydatepicker="" readonly id="date" class="form-control" name="date" ng-model="date"  placeholder="Please enter date">
                              <p ng-show="updatesubmit && date == ''" class="text-danger">Please enter date.</p>
                            </div>



                            <div class="form-group">

                              <label for="position" class="m-0">Recurring Expense</label>
                            <input type="checkbox" value="0" ng-model="recurring"  id="status"  />
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="submitexpense()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- add expense -->

                  </div>
                  </div>

                  <div ng-cloak ng-if="show == 0" class="box-body action-cstm bg-white mt-3">
                      <div class="table-responsive">
                    <table ng-if="currentEx.length != 0 "  id="rankingTable" class="table">
                      <thead>
                        <tr>
                        <th>Expense Name</th>
                        <th style="min-width: 100px;">Date</th>
                        <th>Paid by</th>
                        <th>Status</th>
                        <th class="text-center">Amount</th>
                        <th class="text-right">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="currentEx.length != 0 && loader == 1" ng-repeat="(key,x) in currentEx" >
                          <td><input ng-if="radioshow == 1" name="radio" type="radio" ng-click="getclone(x.id)"  > {{ x.expense }}</td>
                          <td>{{ x.date | date }}</td>
                          <td>
                            <span ng-if="x.paidBy == 1">Bank</span>
                            <span ng-if="x.paidBy == 2">Cash</span>
                            <span ng-if="x.paidBy == 3">Paypal</span>
                            <span ng-if="x.paidBy == 4">Credit Card</span>
                            <span ng-if="x.paidBy == 5">Debit Card</span>
                          </td>
                          <td>
                            <span class="btn" style="background: #3a3adf;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x.status == 1">Paid</span>
                            <span class="btn" style="background: #ff0000;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x.status == 2">Unpaid</span>
                          </td>
                          <td class="text-center">{{ x.code }} {{ x.symbol }} {{ x.amount | number }}</td>

<!--
                          <td class="btn-action">
                            <span title="Edit Expense"><button class="btn btn-sm" ng-click="editexpense(x.id)"><i class="fa fa-edit"></i></button></span>

                            <button ng-click="confirm(x.id)" class="btn btn-link p-0 pointer btn-sm delme"><i class="fa fa-trash"></i></button>
                          </td>
-->
                            <td>
                                    <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a class="dropdown-item" title="Edit Expense" ng-click="edit(x.id)"><i class="fa fa-edit"></i> Edit</a>
                                     <a class="dropdown-item" ng-click="confirm(x.id)"><i class="fa fa-trash"></i>Delete</a>
                               </div>
                              </div>
                          </td>
                        </tr>
                        <tr ng-if="currentEx.length == 0"><td>No Record Found</td></tr>
                      </tbody>

                    </table>
                      </div ng-if="currentTotal != 0">
                           <h4  class="p-3 text-right w-100">Amount Total: {{ currentEx[0].code }} {{ currentEx[0].symbol }} {{ currentTotal | number }}.00  </h4>
                      </div>

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

                    <div ng-if="show == 0" class="p-3 mt-2"><div class="row">
                            <div ng-if="allex.length != 0" class="col-md-2">
                         <div class="form-group mb-0">
                           <label>Expense Per Page</label>
                        <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                        </select>
                      </div>
                      </div>

                        <div class="col-md-10">
                        </div>
                      </div>
                             </div>
              <div ng-if="show == 0" class=" " ng-if="allex.length != 0" ng-repeat="(key1,x) in allex">
                  <div class="box-header with-border bg-white mt-3">
                      <h3 class="box-title p-2"> {{ x.month }}</h3>
                      <div class="table-responsive">
                      <table id="rankingTable" class="projecttask table  table-bordered">
                           <thead>
                        <tr>
                        <th>Expense Name</th>
                        <th style="min-width: 100px;">Date</th>
                        <th>Paid by</th>
                        <th class="text-center">Amount</th>
                        <th class="text-right">Status</th>
                      </tr>
                      </thead>
                          <tbody>
                            <tr  ng-repeat="(key1,x2) in x.expense" >
                              <td><input ng-if="radioshow == 1" name="radio" type="radio" ng-click="getclone(x2.id)"  > {{ x2.expense }}</td>
                              <td>{{ x2.date | date }}</td>
                              <td>
                                <span ng-if="x2.paidBy == 1">Bank</span>
                                <span ng-if="x2.paidBy == 2">Cash</span>
                                <span ng-if="x2.paidBy == 3">Paypal</span>
                                <span ng-if="x2.paidBy == 4">Credit Card</span>
                                <span ng-if="x2.paidBy == 5">Debit Card</span>
                              </td>
                              <td class="text-center">{{ x2.code }} {{ x2.symbol }} {{ x2.amount | number }}</td>

                              <td class="text-right">
                                <span class="btn" style="background: #3a3adf;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 1">Paid</span>
                                <span class="btn" style="background: #ff0000;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 2">Unpaid</span>

                              </td>
                            </tr>
                              <!-- <tr ng-if="allex.length == 0">
                                  <td colspan="2">No Record Found.</td>
                              </tr> -->

                          </tbody>

                      </table>
                      <h4 ng-if="x.total != 0">Amount Total:{{ expense[0].code }} {{ expense[0].symbol }} {{ x.total | number }}.00 </h4>
                      </div>

                  </div>

              </div>
              <div ng-if="show == 0" id="pagination"></div>


  </div>
              <!-- search result -->
              <div ng-if="show == 1" class="box-body action-cstm bg-white mt-3">

                  <div class="table-responsive">
                <table id="rankingTable" class="table">
                  <thead>
                    <tr>
                    <th>Expense Name</th>
                    <th style="min-width: 100px;">Date</th>
                    <th>Paid by</th>
                    <th class="text-center">Status</th>
                    <th class="text-right">Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr ng-if="datewisedata.length != 0" ng-repeat="(key,x) in datewisedata" >
                      <td><input ng-if="radioshow == 1" name="radio" type="radio" ng-click="getclone(x.id)"  > {{ x.expense }}</td>
                      <td>{{ x.date | date }}</td>
                      <td>
                        <span ng-if="x.paidBy == 1">Bank</span>
                        <span ng-if="x.paidBy == 2">Cash</span>
                        <span ng-if="x.paidBy == 3">Paypal</span>
                        <span ng-if="x.paidBy == 4">Credit Card</span>
                        <span ng-if="x.paidBy == 5">Debit Card</span>
                      </td>
                      <td class="text-center">
                        <span class="btn" style="background: #3a3adf;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x.status == 1">Paid</span>
                        <span class="btn" style="background: #ff0000;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x.status == 2">Unpaid</span>
                      </td>
                      <td class="text-right">{{ x.code }} {{ x.symbol }} {{ x.amount | number }}</td>
                    </tr>
                    <tr ng-if="datewisedata.length == 0">
                      <td>No record found</td>
                    </tr>
                  </tbody>

                </table>
              </div>
            </div>

              <!-- search result -->




              <!-- previous month -->

            <!-- Edit leave -->
            <!-- addleave -->
            <div id="editexpense" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Expense</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group ">
                      <label for="name" class="m-0">Expense name<span class="red-text">*</span></label>
                      <input id="expense1" ng-keyup="getsuggestionName1(this)" class="form-control" name="expense" ng-model="expense1" ng-value="expense1" placeholder="Please enter expense">
                      <ul  if-ng="suggestion1.length != 0" >
                                <li hand ng-repeat="(key,x3) in suggestion1" ng-click="addsuggestion1(x3.expense)" >{{ x3.expense }} </li>
                      </ul>
                      <p ng-show="updatesubmit1 && expense1 == ''" class="text-danger">Please enter expense.</p>
                    </div>
                    <div class="form-group">
                      <label for="state">Currency<span class="red-text">*</span></label>
                      <select disabled id="currency" class="form-control" ng-model="currency1">
                        <option value="">Select Currency</option>
                        <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                      </select>
                      <p ng-cloak ng-show="updatesubmit1 && currency1 == ''" class="text-danger">Please select currency.</p>
                    </div>
                    <div class="form-group ">
                      <label for="name" class="m-0">Amount<span class="red-text">*</span></label>
                      <input id="amount1" class="form-control numberonly" name="amount" ng-model="amount1" ng-value="amount1" placeholder="Please enter amount">
                      <p ng-show="updatesubmit1 && amount1 == ''" class="text-danger">Please enter amount.</p>
                      <p ng-show="updatesubmit1 && amount1 != '' && amount1 == 0 " class="text-danger">Please enter valid amount.</p>

                    </div>

                    <div class="form-group">

                      <label for="position" class="m-0">Date<span class="red-text">*</span></label>

                      <input mydatepicker type="text" readonly class="form-control rounded-0" ng-model="date1" ng-value="date1" id="date1" placeholder="Please enter date"  />
                      <p ng-show="updatesubmit1 && date1 == ''" class="text-danger">Please enter date.</p>
                    </div>


                    <div class="form-group">

                      <label for="position" class="m-0">Status<span class="red-text">*</span></label>

                      <select type="text" onchange="angular.element(this).scope().paidBycheck1(this)"  class="form-control rounded-0" ng-model="status1"  id="status1" >
                      <option value="">Select Status</option>
                      <option value="1">Paid</option>
                      <option value="2">Unpaid</option>
                    </select>
                      <p ng-show="updatesubmit1 && status1 == ''" class="text-danger">Please select status.</p>
                    </div>

                    <div class="form-group">

                      <label for="position" class="m-0">Paid By<span class="red-text">*</span></label>

                      <select type="text" ng-disabled="disabled1"  class="form-control rounded-0" ng-model="paidby1"  id="paidby1">
                      <option value="">Select paidby</option>
                      <option value="1">Bank</option>
                      <option value="2">Cash</option>
                      <option value="3">Paypal</option>
                      <option value="4">Credit card</option>
                      <option value="5">Debit card</option>
                    </select>
                      <p ng-show="updatesubmit1 && status == 1 && paidby1 == ''" class="text-danger">Please select paidby.</p>
                    </div>

                    <div class="form-group">
                      <label for="position" class="m-0">Recurring Expense </label>
                    <input type="checkbox" value="0" ng-checked="recurring1 == 1" value="1" ng-model="recurring1"  id="status"  />
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" ng-click="updateExpense()" class="btn btn-success" >Submit</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Edit Expense -->

          </div>
            </div>
            </div>
            </div>
            </div>
  </section>
</div>
