<?php

include('sidebar.php');
?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>Income</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Income</li>
    </ol>

  </section>


  <section class="content portfolio-cont">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp53" ng-controller="myCtrt53">
        <div id="content">
          <!-- <div id="content-header">



          </div> -->
          <div class="no-border-radius">
            <div class="row">

              <div class="col-md-12">
                <div class="box">
                <center><h4><b>Income Current month</b></h4></center>

                  <div class="box-header with-border">
                    <div class="row">
                    <div class="col-md-8">
                      <div class="col-md-5">
                       <div class="form-group">
                         <input mydatepicker ng-model="startdate" type="text" class="form-control date" placeholder="Start Date" >
                       </div>
                     </div>
                     <div class="col-md-5">
                      <div class="form-group">
                        <input mydatepicker ng-model="enddate" type="text" class="form-control date1" placeholder="End Date" >
                      </div>
                    </div>
                    <div class="col-md-2">
                     <div class="form-group sea-cstm">
                       <input  ng-click="searchdate()" type="button" value="search" class="btn btn-info" >
                     </div>
                   </div>
                    </div>

                  <div class="col-md-4"><a data-toggle="modal" data-target="#addincome" class="btn btn-success pull-right">Add Income</a></div>
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
                              <select onchange="angular.element(this).scope().getproject(this)"  id="client" class="form-control" ng-model="client">
                                <option value="">Select client</option>
                                <option ng-if="allclient.length != 0"  ng-repeat="(key,x) in allclient" data-id="{{ x.projectId }}"  value="{{ x.u_id }}">{{ x.name }}</option>
                              </select>
                              <p ng-cloak ng-show="submitl && client == ''" class="text-danger">Please select currency.</p>
                            </div>

                            <div class="form-group">
                              <label for="state">Project Name<span class="red-text">*</span></label>
                              <select onchange="angular.element(this).scope().getmilestone(this)" ng-if="projecttype == 1"  id="project" class="project form-control" ng-model="project">
                                <option value="">Select Project</option>
                                <option ng-if="allcontract.length != 0" ng-repeat="(key,x) in allcontract"   value="{{ x.jobId }}">{{ x.jobTitle }}</option>
                              </select>
                              <select onchange="angular.element(this).scope().getmilestone(this)" ng-if="projecttype == 2"  id="project" class="project form-control" ng-model="project">
                                <option value="">Select Project</option>
                                <option ng-if="ownercontract.length != 0" ng-repeat="(key,x) in ownercontract"   value="{{ x.projectId }}">{{ x.projectName }}</option>
                              </select>
                              <p ng-cloak ng-show="submitl && project == ''" class="text-danger">Please select project.</p>
                            </div>

                            <div class="form-group">
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
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Currency*</label>
                              <select  id="currency" class="form-control" ng-model="currency">
                                <option value="">Select Currency</option>
                                <option ng-if="allclient.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                              </select>
                          <p ng-show="submitl && currency == ''" class="text-danger">Please select currency.</p>
                            </div>


                            <div class="form-group ">
                              <label for="name" class="m-0">Amount*</label>
                              <input id="amount" class="form-control numberdecimalonly" name="amount" ng-model="amount" ng-value="amount" placeholder="Please enter amount">
                              <p ng-show="submitl && amount == ''" class="text-danger">Please enter amount.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Date*</label>
                              <input mydatepicker="" readonly id="date" class="form-control" name="date" ng-model="date"  placeholder="Please enter date">
                              <p ng-show="submitl && date == ''" class="text-danger">Please enter date.</p>
                            </div>



                            <div class="form-group">

                              <label for="position" class="m-0">Status*</label>

                              <select type="text"  class="form-control rounded-0" ng-model="status"  id="status"  />
                              <option value="">Select Status</option>
                              <option value="1">Complete</option>
                              <option value="2">In progress</option>
                            </select>
                              <p ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
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

                  <div ng-if="show == 0" class="box-body">


                    <table ng-if="currentEx.length != 0"  id="rankingTable" class="table  table-condensed">

                      <thead>

                        <tr>
                        <th>Client Name</th>
                        <th>Project Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>

                      </thead>

                      <tbody>


                        <tr ng-if="currentIn.length != 0" ng-repeat="(key,x) in currentIn" >
                          <td>{{ x.client }}</td>
                          <td>{{ x.project }}</td>
                            <td>{{ x.date | date2 }}</td>
                            <td>{{ x.code }} {{ x.symbol }} {{ x.amount }}</td>
                          <td>
                            <span style="background: #3a3adf;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x.status == 1">Complete</span>
                            <span style="background: #ff0000;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x.status == 2">In progress</span>
                          </td>

                          <td>
                            <span title="Edit Expense"><button class="btn btn-sm" ng-click="editincome(x.incomeId)"><i class="fa fa-edit"></i></button></span>

                            <button ng-click="confirm(x.incomeId)" class="btn btn-link p-0 pointer btn-sm delme"><i class="fa fa-trash"></i></button>

                          </td>
                        </tr>
                      </tbody>

                    </table>
                    <h4 ng-if="currentTotal != 0">Amount Total: {{ currentTotal }}</h4>


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





              <div ng-if="show == 0" class="box">



                  <table id="rankingTable" class="projecttask table  table-bordered">
                      <thead>
                        <tr>
                        <th>Client Name</th>
                        <th>Project Name</th>
                        <th>Date</th>
                        <th>Amount</th>

                        <th>Status</th>
                      </tr>
                      </thead>
                  </table>
              </div>
              <div ng-if="show == 0" class="box" ng-if="allex.length != 0" ng-repeat="(key1,x) in allex">
                  <div class="box-header with-border">

                      <h3 class="box-title"><b> {{ x.month }}</b></h3>

                  </div>

                  <div class="box-body">
                      <table id="rankingTable" class="projecttask table  table-bordered">



                          <tbody>
                            <tr  ng-repeat="(key1,x2) in x.income" >
                              <td>{{ x2.client }}</td>
                              <td>{{ x2.project }}</td>
                              <td>{{ x2.date | date2 }}</td>
                              <td>

                              </td>
                              <td>{{ x2.code }} {{ x2.symbol }} {{ x2.amount | number }}</td>

                              <td>
                                <span style="background: #3a3adf;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 1">Complete</span>
                                <span style="background: #ff0000;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 2">In Progress</span>

                              </td>
                            </tr>
                              <!-- <tr ng-if="allex.length == 0">
                                  <td colspan="2">No Record Found.</td>
                              </tr> -->

                          </tbody>

                      </table>

                      <h4 ng-if="x.total != 0">Amount Total: {{ x.total }}</h4>

                  </div>
              </div>
              <div ng-if="show == 0" id="pagination"></div>


              <!-- search record -->

              <div ng-if="show == 1" class="box">



                  <table id="rankingTable" class="projecttask table  table-bordered">
                      <thead>
                        <tr>
                        <th>Client Name</th>
                        <th>Project Name</th>
                        <th>Date</th>
                        <th>Amount</th>

                        <th>Status</th>
                      </tr>
                      </thead>
                  </table>
              </div>
              <div ng-if="show == 1" class="box">

                  <div class="box-body">
                      <table id="rankingTable" class="projecttask table  table-bordered">



                          <tbody>
                            <tr  ng-repeat="(key1,x2) in datewisedata" >
                              <td>{{ x2.client }}</td>
                              <td>{{ x2.project }}</td>
                              <td>{{ x2.date | date2 }}</td>
                              <td>

                              </td>
                              <td>{{ x2.code }} {{ x2.symbol }} {{ x2.amount | number }}</td>

                              <td>
                                <span style="background: #3a3adf;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 1">Complete</span>
                                <span style="background: #ff0000;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 2">In Progress</span>

                              </td>
                            </tr>
                               <tr ng-if="datewisedata.length == 0">
                                  <td colspan="2">No Record Found.</td>
                              </tr>

                          </tbody>

                      </table>

                      <h4 ng-if="x.total != 0">Amount Total: {{ searchtotal }}</h4>

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
                              <select onchange="angular.element(this).scope().getproject3(this)"  id="client" class="form-control" ng-model="client1">
                                <option value="">Select client</option>
                                <option ng-if="allclient.length != 0"  ng-repeat="(key,x) in allclient" data-id="{{ x.projectId }}"  value="{{ x.u_id }}">{{ x.name }}</option>
                              </select>
                              <p ng-cloak ng-show="submitl && client1 == ''" class="text-danger">Please select currency.</p>
                            </div>

                            <div class="form-group">
                              <label for="state">Project Name<span class="red-text">*</span></label>
                              <select onchange="angular.element(this).scope().getmilestone(this)" ng-if="projecttype1 == 1"  id="project" class="project3 form-control" ng-model="project1">
                                <option value="">Select Project</option>
                                <option ng-if="allcontract.length != 0" ng-repeat="(key,x) in allcontract"   value="{{ x.jobId }}">{{ x.jobTitle }}</option>
                              </select>
                              <select onchange="angular.element(this).scope().getmilestone(this)" ng-if="projecttype1 == 2"  id="project" class="project3 form-control" ng-model="project2">
                                <option value="">Select Project</option>
                                <option ng-if="ownercontract.length != 0" ng-repeat="(key,x) in ownercontract"   value="{{ x.projectId }}">{{ x.projectName }}</option>
                              </select>
                              <p ng-cloak ng-show="submitl && project1 == ''" class="text-danger">Please select project.</p>
                            </div>

                            <div class="form-group">
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
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Currency*</label>
                              <select  id="currency" class="form-control" ng-model="currency1">
                                <option value="">Select Currency</option>
                                <option ng-if="allclient.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                              </select>
                          <p ng-show="submitl && currency1 == ''" class="text-danger">Please select currency.</p>
                            </div>


                            <div class="form-group ">
                              <label for="name" class="m-0">Amount*</label>
                              <input id="amount" class="form-control numberdecimalonly" name="amount" ng-model="amount1" ng-value="amount1" placeholder="Please enter amount">
                              <p ng-show="submitl && amount1 == ''" class="text-danger">Please enter amount.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Date*</label>
                              <input mydatepicker="" readonly id="date1" class="form-control" name="date1" ng-model="date1" ng-value="date1"  placeholder="Please enter date">
                              <p ng-show="submitl && date1 == ''" class="text-danger">Please enter date.</p>
                            </div>



                            <div class="form-group">

                              <label for="position" class="m-0">Status*</label>

                              <select type="text"  class="form-control rounded-0" ng-model="status1"  id="status"  />
                              <option value="">Select Status</option>
                              <option value="1">Complete</option>
                              <option value="2">In progress</option>
                            </select>
                              <p ng-show="submitl && status1 == ''" class="text-danger">Please select status.</p>
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
      </div>
    </div>

  </section>
</div>
