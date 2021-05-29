<?php include('sidebar.php'); ?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home </a> ></li>
      <li class="active">Income</li>
    </ol>
  </section>


  <section class="content income">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp53" ng-controller="myCtrt53">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box mb-4">
                <div class="bg-white">
               <!-- <h3 class="p-2">Income Current month</h3> -->
                  <div class="box-header with-border">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-2">
                          <div class="form-group mb-0">
                          <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                          </select>
                          </div>
                          </div>
                          <div class="col-md-2">
                           <div class="form-group">
                             <select onchange="angular.element(this).scope().changeclient(this)"   ng-model="sclient" type="text" class="form-control sclient" placeholder="Enter Client Name" >
                               <option value="">Select Client</option>
                               <option ng-repeat="(key,x3) in suggestionclient" value="{{ x3.client }}">{{ x3.client }}</option>
                             </select>

                           </div>
                         </div>
                         <div class="col-md-2">
                          <div class="form-group">
                            <select ng-model="sproject" type="text" class="form-control sproject" >
                              <option value="">Select Project</option>
                              <option ng-repeat="(key,x3) in suggestionproject" value="{{ x3.project }}">{{ x3.project }}</option>
                            </select>
                          </div>
                        </div>
                      <div class="col-md-2">
                       <div class="form-group">
                         <input readonly id="incomestartdate"  ng-model="startdate" type="text" class="form-control" placeholder="Start Date" >
                       </div>
                     </div>
                     <div class="col-md-2">
                      <div class="form-group">
                        <input readonly id="incomeenddate"  ng-model="enddate" type="text" class="form-control" placeholder="End Date" >
                      </div>
                    </div>
                    <div class="col-md-2">
                     <div class="form-group sea-cstm">
                       <input  ng-click="searchdate()" type="button" value="search" class="btn btn-info w-100" >
                     </div>
                   </div>


                            <div  class="col-md-2">
                              <div class="form-group sea-cstm">
                                <a class="advancesearch btn btn-info" ng-click="clickadvanceSearch()"   >Advance Search</a>
                              </div>
                              </div>


							 <div class="col-md-2">
                    <a data-toggle="modal" data-target="#addincome" class="btn btn-info w-100">Add Income</a>
                  </div>
                  <div ng-if="currentIn.length != 0" class="col-md-2">
                    <a ng-click="incomeExport()" class="btn btn-info w-100">Export Excel</a>
                  </div>
                              </div>
                            </div>
						<div class="col-md-12 mt-3">
								<div class="row">
                            <div ng-if="advanceSearchshow == 1" class="col-md-2">
								<div class="form-group">
                              <select onchange="angular.element(this).scope().changeyear(this)" ng-model="year" type="text" class="year form-control" >
                                <option value="">Select Year</option>
                                <option ng-repeat="(key,x) in years" value="{{ x }}">{{ x }}</option>
                              </select>
                            </div>
                            </div>
                            <div ng-if="advanceSearchshow == 1 && showmonthselect == 1" class="col-md-2">
								<div class="form-group">
                              <select ng-if="currentyear == year" ng-model="month" type="text" class="month form-control" >
                                <option value="">Select Month</option>
                                <option ng-repeat="(key,x) in monthNames" ng-if="currentyear == year && key + 1 <= currentmonth"  value="{{ key + 1 }}">{{ x }}</option>
                              </select>
                              <select ng-if="currentyear != year" ng-model="month" type="text" class="month form-control" >
                                <option value="">Select Month</option>
                                <option ng-repeat="(key,x) in monthNames"   value="{{ key + 1 }}">{{ x }}</option>
                              </select>
                            </div>
                            </div>
                            <div ng-if="advanceSearchshow == 1" class="col-md-2">
                              <div class="form-group sea-cstm">
                                <input  ng-click="getMonthIncome()" type="button" value="Search" class="btn btn-info w-100" >
                              </div>
                            </div>
                        </div>
                        </div>
                        </div>

                    <!-- addleave -->
                    <div id="addincome" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Income</h4>
                          </div>
                          <div class="modal-body">

                            <div class="form-group">
                              <label for="state">Client Name<span class="red-text">*</span></label>
                              <input type="text" ng-keyup="getClientSuggestion()" placeholder="Please enter client name" ng-value="client"  id="client" class="form-control" ng-model="client" >
                              <ul  if-ng="allclientsuggestion.length != 0" >
                                <li hand ng-repeat="(key,x3) in allclientsuggestion" ng-click="addclient(x3.client)" >{{ x3.client }} </li>
                              </ul>
                              <p ng-cloak ng-show="submitl && client == ''" class="text-danger">Please enter client name.</p>
                            </div>

                           <div class="form-group">
                              <label for="state">Project Name<span class="red-text">*</span></label>
                              <input type="text" ng-keyup="getProjectSuggestion()" placeholder="Please enter project name" id="project" class="project form-control" ng-value="project" ng-model="project">
                              <ul  if-ng="allprojectsuggestion.length != 0" >
                                <li hand ng-repeat="(key,x3) in allprojectsuggestion" ng-click="addproject(x3.project)" >{{ x3.project }} </li>
                              </ul>
                                <p ng-cloak ng-show="submitl && project == ''" class="text-danger">Please enter project name.</p>
                              </div>


                            <div class="form-group ">
                              <label for="name" class="m-0">Currency<span class="red-text">*</span></label>
                              <select  id="currency" class="form-control" ng-model="currency">
                                <option value="">Select Currency</option>
                                <option ng-if="allclient.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                              </select>
                          <p ng-show="submitl && currency == ''" class="text-danger">Please select currency.</p>
                            </div>


                            <div class="form-group ">
                              <label for="name" class="m-0">Amount<span class="red-text">*</span></label>
                              <input id="amount" class="form-control numberdecimalonly" name="amount" ng-model="amount" ng-value="amount" placeholder="Please enter amount">
                              <p ng-show="submitl && amount == ''" class="text-danger">Please enter amount.</p>
                               <p ng-show="submitl && amount != '' && amount == 0" class="text-danger">Please enter valid amount.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Date<span class="red-text">*</span></label>
                              <input mydatepicker="" readonly id="date" class="form-control" name="date" ng-model="date"  placeholder="Please enter date">
                              <p ng-show="submitl && date == ''" class="text-danger">Please enter date.</p>
                            </div>



                            <div class="form-group">

                              <label for="position" class="m-0">Status<span class="red-text">*</span></label>

                              <select type="text" onchange="angular.element(this).scope().changedStatus(this)"  class="form-control rounded-0" ng-model="status"  id="status">
                              <option value="">Select Status</option>
                              <option value="1">Received</option>
                              <option value="2">Pending</option>
                            </select>
                              <p ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
                            </div>

                            <div class="form-group">
                              <label for="position" class="m-0">Received From<span class="red-text">*</span></label>
                              <select ng-disabled="disabled" type="text"  class="form-control rounded-0" ng-model="received"  id="received">
                              <option value="">Select Received from</option>
                              <option value="1">Bank</option>
                              <option value="2">PayPal</option>
                              <option value="3">Upwork</option>
                              <option value="4">Other</option>
                            </select>
                              <p ng-show="submitl && status == 1 && received == ''" class="text-danger">Please select received from.</p>

                            </div>

                            <div class="form-group">
                              <label for="position" class="m-0">Deposited In <span class="red-text">*</span></label>
                              <select ng-disabled="disabled"  type="text"  class="form-control rounded-0" ng-model="deposited"  id="deposited">
                              <option value="">Select Deposited In</option>
                              <option value="1">Bank</option>
                              <option value="2">Cash</option>
                              <option value="3">Other</option>
                            </select>
                              <p ng-show="submitl && status == 1 && deposited == ''" class="text-danger">Please select deposited in.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Received Amount( {{ getuserlocalcurrency.code }} {{ getuserlocalcurrency.symbol  }})</label>
                              <input ng-disabled="disabled" id="receivedamount" class="form-control numberdecimalonly" name="Receivedamount" ng-model="Receivedamount" ng-value="Receivedamount" placeholder="Please enter received amount">
                              <p ng-show="submitl && Receivedamount != '' && Receivedamount == 0" class="text-danger">Please enter valid received amount.</p>
                            </div>



                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="submitincome()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- add leave -->

                  </div>
                  </div>

                  <div ng-if="show == 0" class="box-body bg-white pb-2">
                      <div class="table-responsive">
                    <table   id="rankingTable" class="table">
                      <thead>
                        <tr>
                        <th>S.No</th>
                        <?php if($this->session->userdata['clientloggedin']['access'] == 1)
                         { ?>
                        <th>Employee</th>
                      <?php } ?>
                        <th>Client Name</th>
                         <th>Project Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Received Amount<span ng-if="getuserlocalcurrency.code">({{ getuserlocalcurrency.code }} {{ getuserlocalcurrency.symbol  }})</span></th>
                        <th class="text-right">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="currentIn.length != 0" ng-repeat="(key,x) in currentIn" >
                          <td>{{ start + key }}</td>
                          <?php if($this->session->userdata['clientloggedin']['access'] == 1)
                           { ?>
                          <td>{{ x.name }}</td>
                        <?php } ?>
                          <td>{{ x.client }}</td>
                          <td>{{ x.project }}</td>
                            <td>{{ x.date | date2 }}</td>
                            <td>{{ x.code }} {{ x.symbol }} {{ x.amount | number }}</td>
                          <td class="mb-0 ">
                            <div class="form-group">
                            <select onchange="angular.element(this).scope().changeStatus(this)" type="text"  class="form-control rounded-0" ng-model="x.status"  id="status">
                            <option data-id="0"  value=" ">Select Status</option>
                            <option  data-id="{{ x.incomeId }}" value="1">Received</option>
                            <option   data-id="{{ x.incomeId }}" value="2">Pending</option>
                          </select>
                        </div>
                          </td>
                          <td class="form-group mb-0">
                            <input ng-disabled="x.disabled"  ng-keyup="receivedkeyup($event.target.value,x.incomeId)" class="form-control col-md-6" ng-model="x.receivedAmount" ng-value="x.receivedAmount" >
                          </td>

                          <td>
                              <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a class="dropdown-item" title="Edit Expense" ng-click="editincome(x.incomeId)"><i class="fa fa-edit"></i> Edit</a>
                                     <a class="dropdown-item" ng-click="confirm(x.incomeId)"><i class="fa fa-trash"></i> Delete</a>
                               </div>
                              </div>
                          </td>
                        </tr>
                        <tr ng-if="currentIn.length == 0"><td colspan="7" class="text-center">No Record found</td></tr>
                      </tbody>

                    </table>
                      </div>

                     <h4 ng-if="Totalreceived != 0" class="d-block text-right">Total Received Amount: {{ getuserlocalcurrency.code }} {{ getuserlocalcurrency.symbol  }} {{ Totalreceived  }}</h4>
					  <div ng-if="show == 0" id="pagination"></div>
                    <!-- delete confirm modal -->

                    <!-- month wise -->
                    <div ng-if="moonthwiseshow == 1" class="col-md-12">

                    <div ng-cloak class="box-body action-cstm bg-white mt-3">

                        <div class="table-responsive">
                            <h4>{{ monthNameshow }}, {{ yearNameshow }}</h4>
                      <table   id="rankingTable" class="table">
                        <thead>
                          <tr>
                            <th>Client Name</th>
                             <th>Project Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Received Amount</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr ng-if="monthEx.length != 0 " ng-repeat="(key,x) in monthEx" >
                            <td>{{ x.client }}</td>
                            <td>{{ x.project }}</td>
                              <td>{{ x.date | date2 }}</td>
                              <td>{{ x.code }} {{ x.symbol }} {{ x.amount | number }}</td>
                              <td class="mb-0 ">
                                <div class="form-group">
                                <select onchange="angular.element(this).scope().changeStatus(this)" type="text"  class="form-control rounded-0" ng-model="x.status"  id="status">
                                <option data-id="0"  value=" ">Select Status</option>
                                <option  data-id="{{ x.incomeId }}" value="1">Received</option>
                                <option   data-id="{{ x.incomeId }}" value="2">Pending</option>
                              </select>
                            </div>
                              </td>
                              <td class="form-group mb-0">
                                <input ng-disabled="x.disabled" ng-if="x.receivedAmount" ng-keyup="receivedkeyup($event.target.value,x.incomeId)" class="form-control col-md-6" ng-model="x.receivedAmount" ng-value="x.receivedAmount" >
                              </td>
                            <td>
                                <div class="dropdown ac-cstm text-right">
                                   <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                      <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                   </a>
                                   <div class="dropdown-menu fadeIn">
                                       <a class="dropdown-item" title="Edit Expense" ng-click="editincome(x.incomeId)"><i class="fa fa-edit"></i> Edit</a>
                                       <a class="dropdown-item" ng-click="confirm(x.incomeId)"><i class="fa fa-trash"></i> Delete</a>
                                 </div>
                                </div>
                            </td>
                          </tr>
                          <tr ng-if="monthEx.length == 0"><td>No Record Found</td></tr>
                        </tbody>

                      </table>
                      <h4 class="d-block text-right" ng-if="monthreceived != 0">Total Received Amount: {{ getuserlocalcurrency.code }} {{ getuserlocalcurrency.symbol  }} {{ monthreceived  }}</h4>
                      </div>
                        <div  id="apagination"></div>
              </div>
             </div>
                    <!-- month wise -->



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
                  </div>
                </div>


                    <!-- Edit leave -->
                    <!-- addleave -->
                    <div id="editincome" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Income</h4>
                          </div>
                          <div class="modal-body">

                            <div class="form-group">
                              <label for="state">Client Name<span class="red-text">*</span></label>
                              <input type="text"  ng-value="client1" id="client" class="form-control" ng-model="client1">

                              <p ng-cloak ng-show="submitl && client1 == ''" class="text-danger">Please enter client name.</p>
                            </div>

                             <div class="form-group">
                              <label for="state">Project Name<span class="red-text">*</span></label>
                              <input  id="project" class="project3 form-control" ng-value="project1" ng-model="project1">
                              <p ng-cloak ng-show="submitl && project1 == ''" class="text-danger">Please enter project name.</p>
                            </div>


                            <div class="form-group ">
                              <label for="name" class="m-0">Currency<span class="red-text">*</span></label>
                              <select   id="currency" class="form-control" ng-model="currency1">
                                <option value="">Select Currency</option>
                                <option ng-if="allclient.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                              </select>
                          <p ng-show="submitl && currency1 == ''" class="text-danger">Please select currency.</p>
                            </div>


                            <div class="form-group ">
                              <label for="name" class="m-0">Amount<span class="red-text">*</span></label>
                              <input id="amount" class="form-control numberdecimalonly" name="amount" ng-model="amount1" ng-value="amount1" placeholder="Please enter amount">
                              <p ng-show="submitl && amount1 == ''" class="text-danger">Please enter amount.</p>
                              <p ng-show="submitl && amount1 != '' && amount1 == 0" class="text-danger">Please enter valid amount.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Date<span class="red-text">*</span></label>
                              <input mydatepicker="" readonly id="date1" class="form-control" name="date1" ng-model="date1" ng-value="date1"  placeholder="Please enter date">
                              <p ng-show="submitl && date1 == ''" class="text-danger">Please enter date.</p>
                            </div>



                            <div class="form-group">

                              <label for="position" class="m-0">Status<span class="red-text">*</span></label>

                              <select type="text"  class="form-control rounded-0" onchange="angular.element(this).scope().changedStatus1(this)" ng-model="status1"  id="status">
                              <option value="">Select Status</option>
                              <option value="1">Received</option>
                              <option value="2">Pending</option>
                            </select>
                              <p ng-show="submitl && status1 == ''" class="text-danger">Please select status.</p>
                            </div>

                            <div class="form-group">

                              <label for="position" class="m-0">Received From<span class="red-text">*</span></label>
                              <select ng-disabled="disabled1" type="text"  class="form-control rounded-0" ng-model="received1"  id="received">
                              <option value="">Select Received from</option>
                              <option value="1">Bank</option>
                              <option value="2">PayPal</option>
                              <option value="3">Upwork</option>
                              <option value="4">Other</option>
                            </select>
                              <p ng-show="submitl && status1 == 1 && received1 == ''" class="text-danger">Please select received from.</p>
                            </div>

                            <div class="form-group">

                              <label for="position" class="m-0">Deposited In <span class="red-text">*</span></label>

                              <select ng-disabled="disabled1" type="text"  class="form-control rounded-0" ng-model="deposited1"  id="deposited1">
                              <option value="">Select Deposited in</option>
                              <option value="1">Bank</option>
                              <option value="2">Cash</option>
                              <option value="3">Other</option>
                            </select>
                              <p ng-show="submitl && status1 == 1 && deposited1 == ''" class="text-danger">Please select deposited in.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Received Amount(INR)</label>
                              <input ng-disabled="disabled1" id="receivedamount1" class="form-control numberdecimalonly" name="Receivedamount" ng-model="Receivedamount1" ng-value="Receivedamount1" placeholder="Please enter received amount">
                              <p ng-show="submitl && Receivedamount1 != '' && Receivedamount1 == 0" class="text-danger">Please enter valid received amount.</p>
                            </div>

                         </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="updateincome()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Edit Expense -->

                  </div>
                </div>
              </div>
              <!-- previous month -->
            </div>
          </div>

        </div>

  </section>
</div>
