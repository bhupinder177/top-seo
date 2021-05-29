<?php

include('sidebar.php');
?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Department</li>
    </ol>
  </section>
  <section class="content portfolio-cont dep-cstm">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp42" ng-controller="myCtrt42">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box">
				 <div class="box-header with-border">
                  <div class="row">
                  <div class="col-md-2 form-group">

					   <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
						 <option value="10">10</option>
						 <option value="20">20</option>
						 <option value="50">50</option>
						 <option value="100">100</option>
					   </select>

					 </div>
					  <div class="col-md-10 text-right">
						<a data-toggle="modal" data-target="#adddepartment" class="btn btn-success mb-0">Add Department</a>
					  </div>
					</div>
                </div>
                    <!-- add department -->
                    <div id="adddepartment" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Department</h4>
                          </div>
                          <div class="modal-body">

                            <div class="form-group ">
                              <label for="name" class="">Department<span class="red-text">*</span></label>
                              <input id="title" class="form-control" name="title" ng-model="title" placeholder="Please enter department">
                              <p ng-show="submitl && title == ''" class="text-danger">Please enter department.</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="submitdepartment()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- add department -->


                  <div class="box-body">
                      <div class="table-responsive">
                    <table  id="rankingTable" class="table">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Department</th>
                          <th>No of Employees</th>
                          <th class="text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="department.length != 0" ng-repeat="(key,x) in department">
                          <td>{{ start + $index  }}</td>
                          <td>{{ x.department }}</td>
                          <td>{{ x.employee }}</td>
                          <td  class="text-center">
                            <div class="dropdown ac-cstm text-right">
                           <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                           </a>
                           <div class="dropdown-menu fadeIn">
                           <a class="dropdown-item" title="Edit Department" ng-click="editdepartment(x.id)"><i class="fa fa-edit"></i> Edit</a>
                           <a ng-if="x.employee == 0" class="dropdown-item"  ng-click="confirm(x.id)" href="#"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                           </div>

                          </td>
                        </tr>
                        <tr ng-if="department.length == 0"><td colspan="4" class="text-center">No Record Found.</td></tr>
                      </tbody>
                    </table>
                          <div ng-if="totalemp != 0" class="col-md-12 text-right with-border"><h3>Total Employees : {{ totalemp }}</h3></div>
                      </div>
                    <div  id="pagination"></div>


                    <!-- Edit leave -->
                    <div id="editdepartment" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Department</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="">Department<span class="red-text">*</span></label>

                              <input id="title1" class="form-control" name="title1" ng-model="title1" ng-value="title1" placeholder="Please enter department">
                              <p ng-show="submitl && title1 == ''" class="text-danger">Please enter department.</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="updatedepartment()" class="btn btn-success" >Update</button>
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
                            <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>

                            <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
