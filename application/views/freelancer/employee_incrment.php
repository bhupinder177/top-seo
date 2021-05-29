<?php

include('sidebar.php');
?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Updated Salary</li>
    </ol>

  </section>


  <section class="content portfolio-cont dsr">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp64" ng-controller="myCtrt64">
        <div id="content">
          <div id="content-header">
          </div>
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header">
                    <div class="row">
                    <div class="col-md-2 form-group">

                    <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    </select>

                    </div>
                    <div class="col-md-10">
                      <div class="text-right p-2"><a data-toggle="modal" data-target="#addincrement" class="btn btn-success mb-0">Add Increment</a></div>
                    </div>
                    </div>

                    <!-- add incrment -->
                    <div id="addincrement" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Salary Increment</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="m-0">Employee<span class="red-text">*</span></label>
                              <select onchange="angular.element(this).scope().changeemployee(this)" id="type" class="form-control" name="employeeId" ng-model="employeeId">
                                <option value="">Select Employee</option>
                                <option ng-repeat="(key,x) in allteam" data-id="{{ key }}" value="{{ x.u_id }}">{{ x.name }}</option>

                              </select>
                              <p ng-show="submitl && employeeId == ''" class="text-danger">Please select employee.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Current Salary<span class="red-text">*</span></label>
                              <input readonly type="text" placeholder="Please enter current salary" id="detail" class="form-control" name="detail" ng-value="startingsalary" ng-model="startingsalary" >
                            </div>

                            <div class="form-group">
                              <label for="position" class="m-0">Increment Date<span class="red-text">*</span></label>
                              <input readonly mydatepicker="" placeholder="Please select date"  type="text"    class="form-control" ng-model="date" ng-value="date" id="date"   />
                              <p ng-show="submitl && date == ''" class="text-danger">Please select date.</p>

                            </div>
                            <div class="form-group">
                              <label for="position" class="m-0">Increment Amount<span class="red-text">*</span></label>
                              <input   type="text" placeholder="Please enter increment amount"   class="form-control numberonly" ng-model="hike" ng-value="hike" id="hike"   />
                              <p ng-show="submitl && hike == ''" class="text-danger">Please enter incrment amount.</p>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="save()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- add incrment -->


                  </div>

                  <div class="box-body">

                      <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Emp.Name</th>
                          <th>D.O.J</th>
                          <th>Increment Date</th>
                          <th>Increment Amount</th>
                          <th class="text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="alldata.length != 0" ng-repeat="(key,x) in alldata">
                          <td>{{ start + $index }}</td>
                          <td>
                            {{ x.name }}
                            </td>
                            <td>{{ x.joiningdate | date }}</td>
                            <td>{{ x.date | date }}</td>
                            <td>{{ x.increment }}</td>
                          <td>
                              <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                   <a ng-click="edit(x.incrementId)" class="dropdown-item" title="Edit performance" ng-click="edit(x.annId)"><i class="fa fa-edit"></i> Edit</a>
                                     <a class="dropdown-item" ng-click="view(x.incrementId)" ><i class="fa fa-eye"></i> view</a>
                                     <a class="dropdown-item" ng-click="confirm(x.incrementId)" class="trigger-btn" data-toggle="modal" title="Delete" href="#"><i class="fa fa-trash"></i> Delete</a>
                                               </div>
                              </div>
                          </td>
                        </tr>
                        <tr ng-if="alldata.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>

                      </tbody>

                    </table>
                    <div  id="pagination"></div>




                    <!-- view -->
                    <div id="view" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Employee Increment</h4>
                          </div>
                          <div class="modal-body">
                            <div class="repeat">
                            <div class="form-group ">
                               <b>Employee Name :</b>
                                 {{ viewdata.name }}
                            </div>
                            <div class="form-group ">
                              <b>Joining Date :</b> {{ viewdata.joiningdate | date }}
                            </div>
                            <div class="form-group ">
                              <b>Previous Salary :</b> {{ viewdata.currentSalary }}({{ viewdata.joiningdate | date }} )
                            </div>
                            <div class="form-group ">
                              <b>Current Salary :</b> {{ viewdata.salary }} ({{ viewdata.date | date }} )
                            </div>
                            <div class="form-group ">
                              <b>Increment Amount :</b> {{ viewdata.increment  }} ({{ viewdata.date | date }} )
                            </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn bg-grey" data-dismiss="modal" aria-hidden="true" >Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- view -->

                    <!-- Delete modal -->
                    <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                     <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">

                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                           <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this record ?</h4>

                         </div>

                         <div class="modal-footer">

                           <a ng-click="delete()" class="btn btn-danger" id="yes">Delete</a>

                           <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Cancel</button>

                         </div>

                       </div>

                     </div>

                    </div>
                    <!-- Delete modal -->

                    <!-- Edit incrment -->
                    <div id="editincrement" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Salary Increment</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="m-0">Employee<span class="red-text">*</span></label>
                              <select disabled id="type" class="form-control" name="employeeId" ng-model="employeeId1">
                                <option value="">Select Employee</option>
                                <option ng-repeat="(key,x) in allteam" data-id="{{ key }}" value="{{ x.u_id }}">{{ x.name }}</option>

                              </select>
                              <p ng-show="submitl && employeeId1 == ''" class="text-danger">Please select employee.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Current Salary<span class="red-text">*</span></label>
                              <input readonly type="text" id="detail" class="form-control" name="detail" ng-value="startingsalary1" ng-model="startingsalary1" >
                            </div>

                            <div class="form-group">
                              <label for="position" class="m-0">Increment Date<span class="red-text">*</span></label>
                              <input mydatepicker=""  type="text"    class="form-control" ng-model="date1" ng-value="date1" id="date1"   />
                            </div>
                            <div class="form-group">
                              <label for="position" class="m-0">Increment Amount<span class="red-text">*</span></label>
                              <input   type="text"    class="form-control numberonly" ng-model="hike1" ng-value="hike1" id="hike"   />
                                  <p ng-show="submitl && hike1 == ''" class="text-danger">Please enter revised salary.</p>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="update()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- Edit incrment -->


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
