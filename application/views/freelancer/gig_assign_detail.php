<?php include('sidebar.php'); ?>
    <div id="wrapper" class="content-wrapper">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
                <li class="active">Gig Details</li>
            </ol>
        </section>
        <section class="content cstm_job gigassigndetail">
                    <div ng-cloak class="box box-success" ng-app="myApp85" ng-controller="myCtrt85">
                        <div class="box-header with-border p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="box-title mb-0">Gig Details</h3></div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-7">



                        <div ng-if="gig" class="box-body job-offer-full p-3">
                          <div><b>Title:</b> <a target="_blank" href="<?php echo base_url(); ?>gig/{{ gig.title | lowercase | underscoreless }}-{{ gig.gigId }}">{{ gig.title }}</a></div>
                            <div><b>Description:</b> <span ng-bind-html="gig.description | trustAsHtml"></span> </div>

                        </div>
                      </div>




                    </div>

                    <!-- milestone table -->
                    <div ng-if="gig.milestone.length != 0" class="box-body">
                        <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead>
                        <tr>
                          <th><input ng-click="milestoneChecked($event)" type="checkbox"> Plan</th>
                          <th>Task Name</th>
                          <th>Days</th>
                          <th>Assignment</th>
                          <th>Start Date</th>
                          <th>Due Date</th>
                          <th>Work Status</th>
                          <th>Client's Status</th>


                        </tr>
                      </thead>
                        <tbody ng-repeat="(key,x) in gig.milestone" >
                          <tr  ng-repeat="(key2,x2) in x.task">
                            <td><input name="check" value="1" ng-click="taskChecked(key,key2,$event)" ng-checked="x2.checked" type="checkbox"> <span ng-if="$index == 0">{{ x.name }}</span></td>
                            <td>{{ x2.name  }}</span>

                            </td>
                            <td><span ng-if="x.hours">({{ x.hours  }} Days)</span> {{ x2.time }} </td>

                            <td>
                              <div class=" form-group">
                              <select ng-model="x2.assignedTo" class="form-control">
                                <option  value="">Select Assigned To</option>
                                <option ng-repeat="(key,x) in allteam" value="{{ x.u_id }}">{{ x.name }}</option>
                              </select>
                            </div>
                            </td>
                            <td width="140px">
                              <input readonly="" mydatepicker1 data-key="{{ key }}" data-key1="{{ key2 }}"  ng-model="x2.startDate" ng-value="x2.startDate"  type="text" name="startdate" class="form-control cenddate startdate{{ x2.id }}" >
                              <p ng-if="x2.startDate == ''  && x2.checked == 1" class="red-text">Start date is required.</p>

                            </td>
                            <td width="140px">
                              <input readonly="" mydatepicker2 data-key="{{ key }}" data-key1="{{ key2 }}" ng-model="x2.dueDate" ng-value="x2.dueDate" type="text" name="enddate" class="form-control cenddate enddate{{ x2.id }}" >
                              <p ng-if="x2.dueDate == ''  && x2.checked == 1" class="red-text">Due date is required.</p>
                              <p ng-if="x2.dueDate != '' && x2.startDate > x2.dueDate  && x2.checked == 1" class="red-text">Please select valid date.</p>
                            </td>
                            <td>
                              <div class="form-group">
                              <select disabled="" id="st" class="form-control" name="st" ng-model="x2.status" >
                               <option  value="2">Yet to Start</option>
                               <option  value="7">Paused</span>
                               <option  value="5">Started</span>
                               <option  value="6">Completed</span>
                               <option  value="4">Request to PostPone</span>
                              </select>
                              </div>
                            </td>
                            <td>
                              <div class=" form-group">
                              <select disabled="" onchange="angular.element(this).scope().changeclientStatus(this)" ng-model="x2.clientStatus" class="form-control">
                                <option  value="">Select Client Status</option>
                                <option data-id="{{ x2.id }}"  value="1">Completed</option>
                                <option data-id="{{ x2.id }}" value="2">Pending</option>
                              </select>
                            </div>
                            </td>

                          </tr>
                        </tbody>
                      </table>
                      <div class="form-group">
                        <input ng-click="AssignMilestone()" type="button" value="Assign" class="btn btn-success" >
                       </div>
                    </div>
                  </div>
                    <!-- milestone table -->



                  </div>
        </section>
    </div>
