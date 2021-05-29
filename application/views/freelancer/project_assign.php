<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">

      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
        <li class="active">Projects</li>
      </ol>
    </section>


<section class="content project-assign portfolio-cont">
 <div class=" no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp27" ng-controller="myCtrt27">
          <div id="content">
  <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12 addbutton">
              <!-- Add amount -->
              <div id="AddAmount" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Add Project Amount</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group ">
                      <label for="name" class="m-0">Project*</label>
                      <select onchange="angular.element(this).scope().getmilestone(this)" class="form-control rounded-0" ng-model="pro" id="pro"  >
                      <option value="">Select Project</option>
                      <option ng-repeat="(key,x) in project"  value="{{ x.projectId }}">{{ x.projectName }}</option>
                      </select>
                       <p ng-show="updatesubmit && pro == ''" class="text-danger">Please select project.</p>
                    </div>

                    <div class="form-group ">
                    <label for="name" class="m-0">Milestone*</label>
                    <!-- onchange="angular.element(this).scope().getamount(this)" -->
                    <select   class="form-control rounded-0" ng-model="mil" id="milestone"  >
                    <option value="">Select Milestone</option>
                    <option ng-repeat="(key,x) in milestone" data-id="{{ key }}"  value="{{ x.projectMilestoneId }}">{{ x.title }}</option>
                    </select>
                     <p ng-show="updatesubmit && mil == ''" class="text-danger">Please select milestone.</p>
                  </div>

                    <div class="form-group">

                      <label for="position" class="m-0">Amount*</label>

                      <input type="text" class="form-control rounded-0" ng-model="amount" ng-value="amount" id="amount" placeholder="Please enter amount"  />
                       <p ng-show="updatesubmit && amount == ''" class="text-danger">Amount is required.</p>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" ng-click="updateAmount()" class="btn btn-success" >Submit</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
              <!-- Add amount -->
                  <div class="col-md-12">
                    <div class="box">
                      <!-- <div class="box-header with-border">

             			    <a data-toggle="modal" data-target="#AddAmount" class="pull-right btn btn-success">Payment Request</a>
             				 </div> -->

             				 <div class="box-body">


                      					 <table  id="rankingTable" class="table  table-condensed">

                      						 <thead>

                      							 <tr>
                                       <th>S. No.</th>
                      								 <th>Project Name</th>
                      								 <th>Client Name</th>
                                        <!-- <th>Email/Skype/Phone</th> -->
                                        <th>Payment Received</th>
                                        <th>Budget</th>
                                         <th>Status</th>
                                        <th class="text-right">Action</th>

                      							 </tr>

                      						 </thead>

                      						 <tbody>


                      								 <tr ng-if="allproject.length != 0" ng-repeat="(key,x) in allproject">
                                        <td>{{ start + $index }}</td>
                      									 <td>{{ x.projectName }}</td>

                      									  <td>{{ x.clientName }}</td>
                      										<!-- <td>
                                        <a ng-if="x.email" class="btn btn-link btn-sm" title="Email - {{ x.email }}">
                                        <i class="fa fa-envelope m-0"></i></a>
                                        <a ng-if="x.skype" class="btn btn-link btn-sm" title="Skype - {{ x.skype }}">
                                        <i class="fa fa-skype m-0"></i></a>
                                        <a ng-if="x.phone" class="btn btn-link btn-sm" href="tel:{{ x.phone  }}" title="Phone - {{ x.rep_ph_num }}">
                                            <i class="fa fa-phone m-0"></i></a>
                                          </td> -->
                                          <td ng-if="x.paid">{{ x.code }} {{ x.symbol }} {{  x.paid  }}</td>
                                          <td ng-if="!x.paid"></td>
                                          <td ng-if="">{{ x.code }} {{ x.symbol }} {{  x.paid  }}</td>
                      										<td>{{ x.code }} {{ x.symbol }} {{  x.budget  }} </td>
                                           <td>
                                             <div class="form-group">
                                            <select class="form-control" id="projectStatus" onchange="angular.element(this).scope().statusChange(this)"  ng-model="x.status">
                                              <option data-id="{{ x.projectId }}" value="0">Yet to Start</option>
                                              <option data-id="{{ x.projectId }}" value="1">In progress</option>
                                              <!-- <option data-id="{{ x.projectId }}" value="2">Hold</option> -->
                                              <option data-id="{{ x.projectId }}" value="3">Completed</option>
                                            </select>
                                           </div>
                                          </td>
                                      <td>
                                        <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a class="dropdown-item" title="Edit Expense" href="<?php echo base_url(); ?>freelancer/project-payment-detail/{{ x.projectId }}"><i class="fa fa-money" aria-hidden="true"></i>Payment Details</a>
                                     <a class="dropdown-item" href="<?php echo base_url(); ?>freelancer/assign-project-detail/{{ x.projectId }}"><i class="fa fa-tasks" aria-hidden="true"></i>Assignment</a>
                               </div>
                              </div>


                      								 </tr>
                      								 <tr ng-if="allproject.length == 0"><td colspan="2">No Record Found.</td></tr>

                      						 </tbody>

                      					 </table>
                      					 <div  id="pagination"></div>

                                 <!-- delete confirm modal -->
                      					 <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Delete</h4>
                      </div>
                      <div class="modal-body">
                      <p>Are you sure you want to delete this ?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" ng-click="delete_project(key,id)" class="btn btn-danger" id="confirm">Delete</button>

                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
