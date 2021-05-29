<?php include('sidebar.php');?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Dsr</li>
    </ol>
  </section>
  <section class="content portfolio-cont dsr">
    <div class="no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp50" ng-controller="myCtrt50">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box bg-white rounded c-pass-sec">
                  <div class="box-header with-border">
                      <div class="p-3 text-right"><a data-toggle="modal" data-target="#adddsr" class="btn btn-success">Add DSR</a></div>
                    <!-- add dsr -->
                    <div id="adddsr" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add DSR</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="m-0">Task<spam class="red-text">*</span></label>
                              <select id="type" class="form-control" name="remark" ng-model="task">
                                <option value="">Select Task</option>
                                <option value="1">Interview</option>
                                <option value="2">Meeting</option>
                                <option value="3">Learning</option>
                                <option value="6" >Bids</option>
                                <option value="7">Proposal</option>
                                <option value="8">Calls</option>
                                <option value="4">Others</option>

                              </select>
                              <p ng-show="submitl && task == ''" class="text-danger">Please select task.</p>
                            </div>


                            <div ng-if="task == 6 || task == 7" class="form-group ">
                              <label for="name" class="m-0">Job Title and Description<spam class="red-text">*</span></label>
                              <textarea id="jobtitle" class="form-control" name="jobtitle" ng-model="jobtitle" ng-value="jobtitle" placeholder="Please enter job title and description"></textarea>
                              <p ng-show="submitl && jobtitle == ''" class="text-danger">Please enter job title and description</p>
                            </div>
                            <div ng-if="task == 7 || task == 8" class="form-group ">
                              <label for="name" class="m-0">Client Name<spam class="red-text">*</span></label>
                              <input id="client" class="form-control" name="client" ng-model="client" ng-value="client" placeholder="Please enter client name">
                              <p ng-show="submitl && client == ''" class="text-danger">Please enter client name.</p>
                            </div>
                            <div ng-if="task == 7 || task == 8" class="form-group ">
                              <label for="name" class="m-0">Skype Id<spam class="red-text">*</span></label>
                              <input id="skype" class="form-control" name="skype" ng-model="skype" ng-value="skype" placeholder="Please enter skype id">
                              <p ng-show="submitl && skype == ''" class="text-danger">Please enter skype id.</p>
                            </div>
                            <div ng-if="task == 6 || task == 7" class="form-group ">
                              <label for="name" class="m-0">Url<spam class="red-text">*</span></label>
                              <input id="url" class="form-control" name="url" ng-model="url" ng-value="url" placeholder="Please enter url">
                              <p ng-show="submitl && url == ''" class="text-danger">Please enter url.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Task Details<spam class="red-text">*</span></label>
                              <textarea id="detail" class="form-control" name="detail" ng-model="detail" placeholder="Please enter task detail"></textarea>
                              <p ng-show="submitl && detail == ''" class="text-danger">Please enter task detail.</p>
                            </div>
                            <div ng-if="task == 7" class="form-group ">
                              <label for="name" class="m-0">Upload<spam class="red-text">*</span></label>
                              <input type="file" onchange="angular.element(this).scope().documentUpload(this)" id="upload" class="form-control" name="" >
                              <p ng-show="submitl && upload == ''" class="text-danger">Please select file.</p>
                            </div>

                            <div class="form-group">
                              <label for="position" class="m-0">Time Spend<spam class="red-text">*</span></label>
                              <input   type="text" ng-keyup="timeformat($event.target.value)"   class="form-control rounded-0 without_ampm" ng-model="time" ng-value="time" id="time" placeholder="00:00"  />
                              <p ng-show="submitl && time == ''" class="text-danger">Please enter time.</p>
                              <p ng-show="submitl && timeerror" class="text-danger">invaild time format.</p>
                            </div>
                            <div class="form-group">

                              <label for="position" class="m-0">Status<spam class="red-text">*</span></label>
                              <select id="type" class="form-control" name="status" ng-model="status">
                                <option value="">Select Status</option>
                                <option value="1">Completed</option>
                                <option value="0">Pending</option>
                               </select>
                              <p ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="savedsr()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- add dsr -->
                  </div>
                  <div class="box-body">
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Project Name</th>
                          <th style="min-width: 150px;">Task Details</th>
                          <th>Time(mins)</th>
                          <th style="min-width: 100px;">Date</th>
                          <th class="text-center">Status</th>
                          <th>Remarks</th>
                          <th class="text-center">View</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="alldsr.length != 0" ng-repeat="(key,x) in alldsr">
                          <td>{{ start + $index }}</td>
                          <td>
                            <span ng-if="x.task == 1">Interview</span>
                            <span ng-if="x.task == 2">Meeting</span>
                            <span ng-if="x.task == 3">Learning</span>
                            <span ng-if="x.task == 4">Others</span>
                            <span ng-if="x.task == 5">General Task</span>
                            <span ng-if="x.task == 6">Bidding</span>
                            <span ng-if="x.task == 7">Proposal</span>
                            <span ng-if="x.task == 8">Calling</span>
                            <span ng-if="x.task == 9">Project</span>
                            <span ng-if="x.task == 10">Contract</span>
                            <span ng-if="x.task == 11">Gig</span>
                            <span ng-if="x.task != 5 && x.task != 4 && x.task != 3 && x.task != 2 && x.task != 1 && x.task != 6 && x.task != 7 && x.task != 8 && x.task != 9 && x.task != 10 && x.task != 11 "> {{ x.task }}</span>
                          </td>
                          <td>
                            {{ x.taskDetail }}
                            </td>
                            <td>{{ x.time }} mins</td>
                            <td>{{ x.date | date }}</td>
                            <td>
                              <span ng-if="x.status == 1">Completed</span>
                              <span ng-if="x.status == 0">Pending</span>
                            </td>
                          <td>{{ x.remarks }}</td>
                          <td>
                            <button ng-click="viewdsr(x.employeeId,x.date)" class="btn bg-blue" type="button">View</button>
                          </td>
                          <td ng-if="x.status == 0">
                            <a ng-if="x.task == 1 || x.task == 2 || x.task == 3 ||  x.task == 4 || x.task == 6 || x.task == 7 || x.task == 8 " ng-click="Edit(x.dsrId)" class="openDialog no-border-radius" title="Edit"  ><i class="fa fa-pencil-square-o"></i></a>
                            <a ng-if="x.task == 1 || x.task == 2 || x.task == 3 ||  x.task == 4 || x.task == 6 || x.task == 7 || x.task == 8 " ng-click="confirm(x.dsrId)" class="trigger-btn" data-toggle="modal" class="pointer delme_case" title="Delete" ><i class="fa fa-times mr-0"></i></a>
                          </td>
                          <td ng-if="x.status == 1"></td>
                        </tr>
                        <tr ng-if="alldsr.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
                      </tbody>
                    </table>
                      </div>
                    <div  id="pagination"></div>

                    <!-- view -->
                    <div id="view" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Task</h4>
                          </div>
                          <div class="modal-body">
                            <div class="mb-1">
                               <b>Task :</b>
                              <span ng-if="view.task == 1">Interview</span>
                              <span ng-if="view.task == 2">Meeting</span>
                              <span ng-if="view.task == 3">Learning</span>
                              <span ng-if="view.task == 4">Others</span>
                              <span ng-if="view.task == 5">General Task</span>
                              <span ng-if="view.task == 6">Bidding</span>
                              <span ng-if="view.task == 7">Proposal</span>
                              <span ng-if="view.task == 8">Calling</span>
                              <span ng-if="view.task == 9">Project</span>
                              <span ng-if="view.task == 10">Contract</span>
                              <span ng-if="view.task == 11">Gig</span>
                              <span ng-if="view.task != 5 && view.task != 4 && view.task != 3 && view.task != 2 && view.task != 1 && view.task != 6 && view.task != 7 && view.task != 8 && view.task != 9 && view.task != 10 && view.task != 11 "> {{ view.task }}</span>
                            <div ng-if="x.task == 6 || x.task == 7" class="mb-1">
                              <b>Job Title :</b> {{ view.jobTitle }}
                            </div>
                            <div ng-if="view.task == 7 || view.task == 8" class="mb-1">
                              <b>Client Name :</b> {{ view.client }}
                            </div>
                            <div ng-if="view.task == 7 || view.task == 8" class="mb-1">
                              <b>Skype Id:</b> {{ view.skype }}
                            </div>
                            <div ng-if="view.task == 6 || view.task == 7" class="mb-1">
                              <b>Url :</b> {{ view.url }}
                            </div>
                            <div ng-if="view.task == 6 || view.task == 7" class="mb-1">
                              <b>Upload :</b> <a target="_blank" href="<?php echo base_url(); ?>assets/dsr/{{view.upload}} ">{{ x.upload }}</a>
                            </div>
                            <div class="mb-1">
                              <b>Task Detail :</b> {{ view.taskDetail }}
                            </div>
                            <div class="mb-1">
                              <b>Time Spend :</b> {{ view.time }}
                            </div>
                            <div class="mb-1">
                              <b>Date :</b> {{ view.date | date }}
                            </div>
                            <div class="mb-1">
                              <b>Status :</b>
                                <span ng-if="view.status == 1">Completed</span>
                                <span ng-if="view.status == 0">Pending</span>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Close</button>
                          </div>
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

                    <!-- edit dsr -->
                    <div id="Edit" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Dsr</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="m-0">Task<spam class="red-text">*</span></label>
                              <select id="type" class="form-control" name="remark" ng-model="task1">
                                <option value="">Select task</option>
                                <option value="1">Interview</option>
                                <option value="2">Meeting</option>
                                <option value="3">Learning</option>
                                <option value="6" >Bids</option>
                                <option value="7">Proposal</option>
                                <option value="8">Calls</option>
                                <option value="4">Others</option>

                              </select>
                              <p ng-show="submitl && task1 == ''" class="text-danger">Please select task.</p>
                            </div>
                            <div ng-if="task1 == 6 || task1 == 7" class="form-group ">
                              <label for="name" class="m-0">Job Title and Description*</label>
                              <textarea id="jobtitle" class="form-control" name="jobtitle" ng-model="jobtitle1" ng-value="jobtitle1" placeholder="Please enter job title and description"></textarea>
                              <p ng-show="submitl && jobtitle1 == ''" class="text-danger">Please enter job title and description.</p>
                            </div>
                            <div ng-if="task == 7 || task == 8" class="form-group ">
                              <label for="name" class="m-0">Client Name<spam class="red-text">*</span></label>
                              <input id="client1" class="form-control" name="client" ng-model="client" ng-value="client" placeholder="Please enter client name">
                              <p ng-show="submitl && client1 == ''" class="text-danger">Please enter client name.</p>
                            </div>
                            <div ng-if="task == 7 || task == 8" class="form-group ">
                              <label for="name" class="m-0">Skype Id<spam class="red-text">*</span></label>
                              <input id="skype1" class="form-control" name="skype" ng-model="skype1" ng-value="skype1" placeholder="Please enter skype id">
                              <p ng-show="submitl && skype == ''" class="text-danger">Please enter skype Id.</p>
                            </div>
                            <div ng-if="task1 == 6 || task1 == 7" class="form-group ">
                              <label for="name" class="m-0">Url<spam class="red-text">*</span></label>
                              <input id="url" class="form-control" name="url" ng-model="url1" ng-value="url1" placeholder="Please enter url">
                              <p ng-show="submitl && url1 == ''" class="text-danger">Please enter url.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Task detail<spam class="red-text">*</span></label>
                              <textarea id="detail" class="form-control" name="detail" ng-model="detail1"  placeholder="Please enter task detail">{{ detail1 }}</textarea>
                              <p ng-show="submitl && detail1 == ''" class="text-danger">Please enter task detail.</p>
                            </div>
                            <div ng-if="task1 == 7" class="form-group ">
                              <label for="name" class="m-0">Upload<spam class="red-text">*</span></label>
                              <input type="file" onchange="angular.element(this).scope().documentUpload(this)" id="upload1" class="form-control" name="upload" >
                              <p ng-show="submitl && upload == ''" class="text-danger">Please select file.</p>
                            </div>

                            <div class="form-group">

                              <label for="position" class="m-0">Time Spend<spam class="red-text">*</span></label>

                              <input   type="text" ng-keyup="timeformat($event.target.value)"   class="form-control rounded-0 without_ampm" ng-model="time1" ng-value="time1" id="time" placeholder="00:00"  />
                              <p ng-show="submitl && time1 == ''" class="text-danger">Please enter time.</p>
                              <p ng-show="submitl && timeerror" class="text-danger">invaild time format.</p>
                            </div>
                            <div class="form-group">

                              <label for="position" class="m-0">Status<spam class="red-text">*</span></label>
                              <select id="type" class="form-control" name="status" ng-model="status1">
                                <option value="">Select status</option>
                                <option value="1">Completed</option>
                                <option value="0">Pending</option>
                               </select>
                              <p ng-show="submitl && status1 == ''" class="text-danger">Please select status.</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="update()" class="btn btn-success" >Update</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- edit dsr -->

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
