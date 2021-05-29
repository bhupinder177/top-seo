<?php include('sidebar.php'); ?>

<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Holiday</li>
    </ol>
  </section>

  <section class="content portfolio-cont dep-cstm">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp44" ng-controller="myCtrt44">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box bg-white c-pass-sec">
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
                    <div class="col-md-10">
                    <a data-toggle="modal" data-target="#addholiday" class="btn btn-success pull-right">Add Holiday</a>
                   </div>
                </div>
                    <!-- addleave -->
                    <div id="addholiday" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Holiday</h4>
                          </div>
                          <div class="modal-body">

                            <div class="form-group ">
                              <label for="name" class="m-0">Holiday Name<span class="red-text">*</span></label>
                              <input id="title" class="form-control" name="title" ng-model="title" placeholder="Please enter holiday name">
                              <p ng-show="submitl && title == ''" class="text-danger">Please enter holiday name.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Holiday Type<span class="red-text">*</span></label>
                              <select id="type" class="form-control type" name="type" ng-model="type" >
                                <option value="">Select Type</option>
                                <option value="1">Fixed</option>
                                <option value="2">Floating</option>
                              </select>
                              <p ng-show="submitl && type == ''" class="text-danger">Please select holiday type.</p>
                            </div>
                            <div class="form-group">
                              <label for="name" class="m-0">Date<span class="red-text">*</span></label>
                              <input id="date" readonly mydatepicker="" class="form-control" name="date" ng-model="date" placeholder="Please enter date">
                              <p ng-show="submitl && date == ''" class="text-danger">Please enter date.</p>
                            </div>
                        </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="submitholiday()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>
                    </div>
                    </div>

                    <!-- add hloiday -->

                  </div>

                  <div class="box-body">

                      <div class="table-responsive">
                    <table class="table  table-condensed">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Holiday name</th>
                          <th>Holiday Type</th>
                          <th class="text-center" style="min-width:100px;">Date</th>
                          <!-- <th>Time</th> -->
                          <th class="text-right">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                          <tr ng-if="holiday.length != 0" ng-repeat="(key,x) in holiday">
                          <td>{{ start + $index }}</td>
                          <td>{{ x.title }}</td>
                          <td>
                            <span ng-if="x.type == 1" class="p-0">Fixed</span>
                            <span ng-if="x.type == 2" class="p-0">Floating</span>
                          </td>
                          <td class="text-center">{{ x.date | date }}</td>
                          <!-- <td>{{ x.time | date1 }} {{ x.time | time }}</td> -->
                          <td>
                              <div class="dropdown ac-cstm text-right">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                    </a>
                                    <div class="dropdown-menu fadeIn">
                                       <a class="dropdown-item" title="Edit" ng-click="editholiday(x.id)"><i class="fa fa-edit"></i> Edit</a>
                                       <a class="dropdown-item" ng-click="confirm(x.id)"><i class="fa fa-trash"></i>Delete</a>
                                    </div>
                                 </div>
                          </td>

                        </tr>
                        <tr ng-if="holiday.length == 0"><td colspan="4" class="text-center">No Record Found.</td></tr>

                      </tbody>

                    </table>
                      </div>
                    <div  id="pagination"></div>


                    <!-- Edit leave -->
                        <div id="editholiday" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit holiday</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="m-0">Holiday Name<span class="red-text">*</span></label>
                              <input id="title1" class="form-control" name="title1" ng-model="title1" ng-value="title1" placeholder="Please enter holiday name">
                              <p ng-show="submitl && title1 == ''" class="text-danger">Please enter holiday name.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Holiday Type<span class="red-text">*</span></label>
                              <select id="type1" class="form-control type" name="type1" ng-model="type1" >
                                <option value="">Select Type</option>
                                <option value="1">Fixed</option>
                                <option value="2">Floating</option>
                              </select>
                              <p ng-show="submitl && type1 == ''" class="text-danger">Please select holiday type.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Date<span class="red-text">*</span></label>
                              <input id="date1" readonly mydatepicker="" class="form-control" name="date" ng-model="date1" placeholder="Please enter date">
                              <p ng-show="submitl && date1 == ''" class="text-danger">Please enter date.</p>

                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="updateholiday()" class="btn btn-success" >Submit</button>
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
