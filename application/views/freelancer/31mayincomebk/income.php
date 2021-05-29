<?php include('sidebar.php'); ?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home </a> ></li>
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
               <h3 class="p-2">Income Current month</h3>
                  <div class="box-header with-border px-2">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-3">
                           <div class="form-group">
                             <input  ng-model="sclient" type="text" class="form-control sclient" placeholder="Enter Client Name" >
                           </div>
                         </div>
                         <div class="col-md-3">
                          <div class="form-group">
                            <input  ng-model="sproject" type="text" class="form-control sproject" placeholder="Enter Project Name" >
                          </div>
                        </div>
                      <div class="col-md-2">
                       <div class="form-group">
                         <input id="incomestartdate"  ng-model="startdate" type="text" class="form-control first datef" placeholder="Start Date" >
                       </div>
                     </div>
                     <div class="col-md-2">
                      <div class="form-group">
                        <input id="incomeenddate" mydatepicker ng-model="enddate" type="text" class="form-control date1" placeholder="End Date" >
                      </div>
                    </div>
                    <div class="col-md-2">
                     <div class="form-group sea-cstm">
                       <input  ng-click="searchdate()" type="button" value="search" class="btn btn-info" >
                     </div>
                   </div>
                        </div>
                        </div>
                        <div class="col-md-8"></div>
                  <div class="col-md-2">
                    <a data-toggle="modal" data-target="#addincome" class="btn btn-success pull-right">Add Income</a>
                  </div>
                  <div class="col-md-2">
                    <a ng-click="incomeExport()" class="btn btn-success pull-right">Export Excel</a>
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
                              <input type="text" placeholder="Please enter client name" ng-value="client"  id="client" class="form-control" ng-model="client" >
                              <p ng-cloak ng-show="submitl && client == ''" class="text-danger">Please enter client .</p>
                            </div>

                           <div class="form-group">
                              <label for="state">Project Name<span class="red-text">*</span></label>
                              <input type="text" placeholder="Please enter project name" id="project" class="project form-control" ng-value="project" ng-model="project">

                                <p ng-cloak ng-show="submitl && project == ''" class="text-danger">Please enter project.</p>
                              </div>
                              <!--  <select onchange="angular.element(this).scope().getmilestone(this)" ng-if="projecttype == 2"  id="project" class="project form-control" ng-model="project">
                                <option value="">Select Project</option>
                                <option ng-if="ownercontract.length != 0" ng-repeat="(key,x) in ownercontract"   value="{{ x.projectId }}">{{ x.projectName }}</option>
                              </select>
                              <p ng-cloak ng-show="submitl && project == ''" class="text-danger">Please select project.</p>
                            </div> -->

                            <!-- <div class="form-group">
                              <label for="state">Milestone<span class="red-text">*</span></label>
                              <select ng-if="projecttype == 1"  id="milestone" class="form-control milestone" ng-model="milestone">
                                <option value="">Select milestone</option>
                                <option ng-if="allmilestone.length != 0" ng-repeat="(key,x) in allmilestone"   value="{{ x.milestoneId }}">{{ x.milestoneTitle }}</option>
                              </select>
                              <select ng-if="projecttype == 2"  id="milestone" class="form-control milestone" ng-model="milestone">
                                <option value="">Select milestone</option>
                                <option ng-if="allownermilestone.length != 0" ng-repeat="(key,x) in allownermilestone"   value="{{ x.projectMilestoneId }}">{{ x.title }}</option>
                              </select>
                              <p ng-cloak ng-show="submitl && milestone == ''" class="text-danger">Please select milestone.</p>
                            </div> -->

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

                              <select type="text"  class="form-control rounded-0" ng-model="status"  id="status">
                              <option value="">Select Status</option>
                              <option value="1">Received</option>
                              <option value="2">Pending</option>
                            </select>
                              <p ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
                            </div>

                            <div class="form-group">

                              <label for="position" class="m-0">Received From<span class="red-text">*</span></label>
                              <select type="text"  class="form-control rounded-0" ng-model="received"  id="received">
                              <option value="">Select Status</option>
                              <option value="1">Bank</option>
                              <option value="2">PayPal</option>
                              <option value="3">Upwork</option>
                              <option value="4">Other</option>
                            </select>
                              <p ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
                            </div>

                            <div class="form-group">

                              <label for="position" class="m-0">Deposited In <span class="red-text">*</span></label>

                              <select type="text"  class="form-control rounded-0" ng-model="deposited"  id="deposited">
                              <option value="">Select Deposited</option>
                              <option value="1">Bank</option>
                              <option value="2">Cash</option>
                              <option value="3">Other</option>
                            </select>
                              <p ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Received Amount(INR)</label>
                              <input id="receivedamount" class="form-control numberdecimalonly" name="Receivedamount" ng-model="Receivedamount" ng-value="Receivedamount" placeholder="Please enter received amount">
                              <p ng-show="submitl && received1 == ''" class="text-danger">Please select received.</p>
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

                  <div ng-if="show == 0" class="box-body bg-white mt-3 pb-2">
                      <div class="table-responsive">
                    <table ng-if="currentEx.length != 0"  id="rankingTable" class="table">
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
                        <tr ng-if="currentIn.length != 0" ng-repeat="(key,x) in currentIn" >
                          <td>{{ x.client }}</td>
                          <td>{{ x.project }}</td>
                            <td>{{ x.date | date2 }}</td>
                            <td>{{ x.code }} {{ x.symbol }} {{ x.amount }}</td>
                            <td><span ng-if="x.receivedAmount">{{ x.code }} {{ x.symbol }} {{ x.receivedAmount }}</span></td>
                          <td>
                            <select onchange="angular.element(this).scope().changeStatus(this)" type="text"  class="form-control rounded-0" ng-model="x.status"  id="status">
                            <option  value="">Select Status</option>
                            <option data-id="{{ x.incomeId }}" value="1">Received</option>
                            <option data-id="{{ x.incomeId }}" value="2">Pending</option>
                          </select>
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
                      </tbody>

                    </table>
                      </div>
                     <h4 ng-if="currentTotal != 0">Amount Total: {{ currentIn[0].code }} {{ currentIn[0].symbol }} {{ currentTotal | number }}.00</h4>
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
                  </div>
                </div>

              <div ng-if="show == 0" class="box mb-4" ng-if="allex.length != 0" ng-repeat="(key1,x) in allex">
                  <div class="box-header with-border">
                      <h3 class="box-title p-2">{{ x.month }}</h3>
                  </div>

                  <div class="p-3"><div class="row">
                          <div class="col-md-2">
                       <div class="form-group mb-0">
                         <label>Income Per Page</label>
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

                  <div class="box-body">
                      <div class="table-responsive">
                      <table id="rankingTable" class="projecttask table">
                          <thead>
                        <tr>
                        <th>Client Name</th>
                         <th>Project Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Received Amount</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                          <tbody>
                            <tr  ng-repeat="(key1,x2) in x.income" >
                              <td>{{ x2.client }}</td>
                              <td>{{ x2.project }}</td>
                              <td>{{ x2.date | date2 }}</td>

                              <td>{{ x2.code }} {{ x2.symbol }} {{ x2.amount | number }}</td>
                              <td><span ng-if="x2.receivedAmount">{{ x2.code }} {{ x2.symbol }} {{ x2.receivedAmount | number }}</span></td>

                              <td>
                                <span style="background: #3a3adf;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 1">Received</span>
                                <span style="background: #ff0000;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 2">Pending</span>

                              </td>
                            </tr>
                              <!-- <tr ng-if="allex.length == 0">
                                  <td colspan="2">No Record Found.</td>
                              </tr> -->

                          </tbody>

                      </table>

                      </div>
                      <h4 ng-if="x.total != 0">Amount Total: {{ x.income[0].code }} {{ x.income[0].symbol }} {{ x.total | number }}.00</h4>

                  </div>
              </div>
              <div ng-if="show == 0" id="pagination"></div>


              <!-- search record -->
              <div ng-if="show == 1" class="box">
                  <div class="box-body bg-white">
                      <div class="table-responsive">
                      <table id="rankingTable" class="projecttask table  table-bordered">
                            <thead>
                        <tr>
                        <th>Client Name</th>
                        <th>Project Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Received Amount</th>

                        <th>Status</th>
                      </tr>
                      </thead>
                          <tbody>
                            <tr  ng-repeat="(key1,x2) in datewisedata" >
                              <td>{{ x2.client }}</td>
                              <td>{{ x2.project }}</td>
                              <td>{{ x2.date | date2 }}</td>

                              <td>{{ x2.code }} {{ x2.symbol }} {{ x2.amount | number }}</td>
                              <td>{{ x2.receivedAmount | number }}</td>

                              <td>
                                <span style="background: #3a3adf;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 1">Received</span>
                                <span style="background: #ff0000;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 2">Pending</span>

                              </td>
                            </tr>
                               <tr ng-if="datewisedata.length == 0">
                                  <td colspan="2">No Record Found.</td>
                              </tr>

                          </tbody>

                      </table>
                      </div>
                      <h4 ng-if="searchtotal != 0">Amount Total: {{ datewisedata[0].code }} {{ datewisedata[0].symbol }} {{ searchtotal | number }}.00</h4>

                  </div>
              </div>
              <!-- search record -->
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
                              <p ng-cloak ng-show="submitl && project1 == ''" class="text-danger">Please enter project.</p>
                            </div>

                            <!-- <div class="form-group">
                              <label for="state">Milestone<span class="red-text">*</span></label>
                              <select ng-if="projecttype1 == 1"  id="milestone" class="form-control milestone3" ng-model="milestone1">
                                <option value="">Select milestone</option>
                                <option ng-if="allmilestone.length != 0" ng-repeat="(key,x) in allmilestone"   value="{{ x.milestoneId }}">{{ x.milestoneTitle }}</option>
                              </select>
                              <select ng-if="projecttype1 == 2"  id="milestone" class="form-control milestone3" ng-model="milestone2">
                                <option value="">Select milestone</option>
                                <option ng-if="allownermilestone.length != 0" ng-repeat="(key,x) in allownermilestone"   value="{{ x.projectMilestoneId }}">{{ x.title }}</option>
                              </select>
                              <p ng-cloak ng-show="submitl && milestone1 == ''" class="text-danger">Please select milestone.</p>
                            </div> -->

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

                              <select type="text"  class="form-control rounded-0" ng-model="status1"  id="status">
                              <option value="">Select Status</option>
                              <option value="1">Received</option>
                              <option value="2">Pending</option>
                            </select>
                              <p ng-show="submitl && status1 == ''" class="text-danger">Please select status.</p>
                            </div>

                            <div class="form-group">

                              <label for="position" class="m-0">Received From<span class="red-text">*</span></label>
                              <select type="text"  class="form-control rounded-0" ng-model="received1"  id="received">
                              <option value="">Select Status</option>
                              <option value="1">Bank</option>
                              <option value="2">PayPal</option>
                              <option value="3">Upwork</option>
                              <option value="4">Other</option>
                            </select>
                              <p ng-show="submitl && received1 == ''" class="text-danger">Please select received.</p>
                            </div>

                            <div class="form-group">

                              <label for="position" class="m-0">Deposited In <span class="red-text">*</span></label>

                              <select type="text"  class="form-control rounded-0" ng-model="deposited1"  id="deposited1">
                              <option value="">Select Deposited</option>
                              <option value="1">Bank</option>
                              <option value="2">Cash</option>
                              <option value="3">Other</option>
                            </select>
                              <p ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Received Amount(INR)</label>
                              <input id="receivedamount1" class="form-control numberdecimalonly" name="Receivedamount" ng-model="Receivedamount1" ng-value="Receivedamount1" placeholder="Please enter received amount">
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
