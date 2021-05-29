<?php include('sidebar.php');?>
    <div id="wrapper" class="content-wrapper" id="wrapper">
        <section class="content-header">
            <!-- <h2>Employee Salary</h2> -->
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
                <li class="active">Employee Salary</li>
            </ol>
        </section>

        <section class="content">
            <div class="container1">
                <div class="no-margin user-dashboard-container">
                    <div ng-cloak ng-app="myApp36" ng-controller="myCtrt36">
                        <div id="content">
                            <div class="box c-pass-sec">

                                <div id="content-header">
                                  <div class="row">
                                  <!-- <div class="col-md-2 form-group">

                       <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                         <option value="10">10</option>
                         <option value="20">20</option>
                         <option value="50">50</option>
                         <option value="100">100</option>
                       </select>

                     </div> -->

                     <div class="col-md-2 form-group">
                      <input type="text" placeholder="Search by employee" name="employee" ng-model="searchemployee"  class="form-control">
                     </div>
                     <div  class="col-md-2">
                       <select convert-to-number onchange="angular.element(this).scope().changeyear(this)" ng-model="year" type="text" class="year form-control" >
                         <option value="">Select Year</option>
                         <option ng-repeat="(key,x) in years" value="{{ x }}">{{ x }}</option>
                       </select>
                     </div>
                     <div ng-if="showmonthselect == 1" class="col-md-2">
                       <select convert-to-number ng-if="currentyear == year" ng-model="month" type="text" class="month form-control" >
                         <option ng-repeat="(key,x) in monthNames" ng-if="currentyear == year && key + 1 <= currentmonth"  value="{{ key + 1 }}">{{ x }}</option>
                       </select>
                       <select convert-to-number ng-if="currentyear != year" ng-model="month" type="text" class="month form-control" >
                         <option ng-repeat="(key,x) in monthNames"   value="{{ key + 1 }}">{{ x }}</option>
                       </select>
                     </div>
                     <div class="col-md-2 form-group">
                       <a  ng-click="search()"  class="btn btn-success mb-0">Search</a>

                     </div>

                                </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <h4 class="text-left">Current Month Salary</h4> </div>
                                        <!-- <div class="col-sm-12 col-md-8 col-lg-4">
                                            <div class="form-group">
                                                <input mydatepicker ng-model="startdate" type="text" class="form-control saldates" placeholder="Start Date">
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-sm-12 col-md-4 col-lg-2">
                                            <div class="form-group sea-cstm">
                                                <input ng-click="searchdate()" type="button" value="Search" class="btn btn-primary w-100">
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="container1">
                                    <div class="content-box no-border-radius">
                                            <div ng-if="show == 0">
                                                <div class="box-body">
                                                    <div class="table-responsive">
                                                        <table id="rankingTable" class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S. No.</th>
                                                                    <th>Emp.Name</th>
                                                                    <th>Gross Salary</th>
                                                                    <th>Leave</th>
                                                                    <th>Net Salary</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr ng-if="allemployee.length != 0 && load == 1" ng-repeat="(key,x) in allemployee">
                                                                    <td>{{ start + $index }}</td>
                                                                    <td>{{ x.name }}</td>
                                                                    <td>{{ x.salary }}</td>
                                                                    <td>
                                                                        <span ng-if="x.leave.length != 0" ng-repeat="(key,x2) in x.leave">{{ x2.leavecount }} {{ key }}/</span>
                                                                        <span ng-if="x.leave.length == 0">0</span>
                                                                    </td>
                                                                    <td>
                                                                        <span ng-if="x.customSalary != ''">{{ x.customSalary }}</span>
                                                                        <span ng-if="x.customSalary == ''">{{ x.netsalary }}</span>
                                                                    </td>
                                                                    <td><a ng-click="addSalary(x.u_id,x.date,x.customSalary,x.netsalary)" class="btn btn-info">Add Salary</a></td>
                                                                </tr>
                                                                <tr ng-if="grosstotal != 0 || netsalary != 0" class="bg-lightgray">
                                                                    <td></td>
                                                                    <td><b>Gross Salary Total:</b></td>
                                                                    <td><b>{{ grosstotal | number }}</b></td>
                                                                    <td><b>Net Salary Total:</b></td>
                                                                    <td><b>{{ netsalarytotal | number }}</b></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr ng-if="allemployee.length == 0">
                                                                    <td colspan="5">No Record Found.</td>
                                                                </tr>

                                                            </tbody>

                                                        </table>
                                                    </div>
                                                    <!-- <div class="pagination"></div> -->


                                                    <!-- detail -->
                                                    <!-- Modal -->
                                                    <!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="event-calendar"></div>

    </div>
  </div> -->
                                                    <!-- detail -->
                                                    <!-- add Salary -->
                                                    <div id="addSalary" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Add Net Salary</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group ">
                                                                        <label for="name">Net Salary<span class="red-text">*</span></label>
                                                                        <input id="amount" class="form-control numberdecimalonly" name="netsalary" ng-model="netsalary" ng-value="netsalary" placeholder="Please enter amount">
                                                                        <p ng-show="submitl && netsalary == ''" class="text-danger">Please enter net salary.</p>
                                                                        <p ng-show="submitl && netsalary != '' && netsalary == 0" class="text-danger">Please enter valid salary.</p>
                                                                    </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" ng-click="SaveSalary()" class="btn btn-success">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- add salary -->

                                                </div>
                                            </div>

                                            <!--*************************** box*****************************-->

                                            <div ng-if="show == 0 && allmonth.length != 0 && load1 == 1" class="box mt-3"  ng-repeat="(key1,x) in allmonth">

                                                <div class="box-body">
                                                  <div class="box-header with-border">
                                                      <h3 class="box-title"><b> {{ x.month }}</b></h3>
                                                  </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                          <thead>
                                                              <tr>
                                                                  <th>S.No</th>
                                                                  <th>Emp.Name</th>
                                                                  <th>Gross Salary</th>

                                                                  <th>Leave</th>
                                                                  <th>Net Salary</th>
                                                                  <th>Action</th>

                                                              </tr>
                                                          </thead>
                                                            <tbody>
                                                                <tr ng-repeat="(key1,x2) in x.data">
                                                                    <td>{{ $index + 1 }}</td>
                                                                    <td>{{ x2.name }}</td>
                                                                    <td>{{ x2.salary }}</td>
                                                                    <td>
                                                                        <span ng-if="x2.leave.length != 0" ng-repeat="(key,x3) in x2.leave">{{ x3.leavecount }} {{ key }}/</span>
                                                                        <span ng-if="x2.leave.length == 0">0</span>
                                                                    </td>
                                                                    <td>
                                                                        <span ng-if="x2.customSalary != ''">{{ x2.customSalary }}</span>
                                                                        <span ng-if="x2.customSalary == ''">{{ x2.netsalary }}</span>
                                                                    </td>
                                                                    <td><a ng-click="addSalary(x2.u_id,x2.start,x2.customSalary,x2.netsalary)" class="btn btn-info">Add Salary</a></td>
                                                                </tr>
                                                                <tr class="bg-lightgray">
                                                                    <td></td>
                                                                    <td><b>Gross Salary Total:</b></td>
                                                                    <td><b>{{ x.totalgross | number }}</b></td>
                                                                    <td><b>Net salary Total:</b></td>
                                                                    <td><b>{{ x.netsalarytotal | number }}</b></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- <div ng-if="show == 0" id="pagination"></div> -->

                                            <!-- search record -->

                                            <div ng-if="show == 1" class="box">
                                                <center>
                                                    <h4><b>Search Month Salary</b></h4></center>

                                                <div class="box-body">
                                                  <div class="table-responsive">
                                                    <table id="rankingTable" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Emp.Name</th>
                                                                <th>Gross Salary</th>
                                                                <th>Leave</th>
                                                                <th>Net Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr ng-if="x.datewisedata.length != 0" ng-repeat="(key,x) in datewisedata">
                                                                <td>{{ start + $index }}</td>
                                                                <td>{{ x.name }}</td>
                                                                <td>{{ x.salary }}</td>
                                                                <td>
                                                                    <span ng-if="x.leave.length != 0" ng-repeat="(key,x2) in x.leave">{{ x2.leavecount }} {{ key }}/</span>
                                                                    <span ng-if="x.leave.length == 0">0</span>
                                                                </td>
                                                                <td>
                                                                    <span ng-if="x.customSalary != ''">{{ x.customSalary }}</span>
                                                                    <span ng-if="x.customSalary == ''">{{ x.netsalary }}</span>
                                                                </td>
                                                            </tr>

                                                            <tr ng-if="datewisedata.length == 0 && show == 1">
                                                                <td colspan="5">No Record Found.</td>
                                                            </tr>

                                                        </tbody>

                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- search record -->

                                            <!--****************************box*******************************-->


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
