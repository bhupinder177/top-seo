<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
        <li class="active">Project</li>
      </ol>
    </section>


<section class="content portfolio-cont Project-sect">
   <div class=" no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp26" ng-controller="myCtrt26">
          <div id="content">
      <div class="no-border-radius">
            <div class="row">
                  <div class="col-md-12">

                    <div class="box bg-white rounded c-pass-sec">
                      <div class="row">
                      <div class="col-md-2  form-group">

          <select ng-model="perpage" convert-to-number="" onchange="angular.element(this).scope().changePerPage(this)" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
            <option value="10" selected="selected">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>

        </div>

        <div class="col-md-3  form-group">
       <input placeholder="Search by project title" ng-model="searchprojecttitle" ng-value="searchprojecttitle" type="text" class="form-control" >
       </div>
        <div class="col-md-3  form-group">
       <input placeholder="Search by client name" ng-model="searchclientname" ng-value="searchclientname" type="text" class="form-control" >
       </div>
        <div class="col-md-2  form-group">
          <a ng-click="search()" class="btn btn-success">Search</a>

       </div>
        <div class="col-md-2">
                      <div  class="box-header with-border">
                           <a ng-click="addproject()" class="btn btn-success pull-right">Add Project</a>
             				 </div>
                   </div>
                   </div>
             				 <div class="box-body">
                                 <div class="table-responsive">
                      					 <table class="table">
                      						 <thead>
                      							 <tr>
                                       <th>S. No.</th>
                                     <th>Project Name</th>
                                     <th>Client Name</th>
                                       <!-- <th>Email/Skype/Phone</th> -->
                                       <th>Received Amount</th>
                                       <th>Assigned To</th>
                                       <th>Budget</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                         </tr>
                      						 </thead>
                      						 <tbody>
                                                 <tr ng-if="allproject.length != 0" ng-repeat="(key,x) in allproject">
                                        <td>{{ start + $index }}</td>
                      									 <td>{{ x.projectName }}</td>
                                         <td>{{ x.clientName }}</td>
                      									 <!-- <td class="d-flex">
                                           <a ng-if="x.email" class="btn bg-orange mr-1" title="Email - {{ x.email }}">
                         									<i class="fa fa-envelope m-0"></i></a>
                         								<a ng-if="x.skype" class="btn bg-yellow mr-1" title="Skype - {{ x.skype }}">
                         								<i class="fa fa-skype m-0"></i></a>
                         								<a ng-if="x.phone" class="btn bg-blue" href="tel:{{ x.phone  }}" title="Phone - {{ x.rep_ph_num }}">
                         								<i class="fa fa-phone m-0"></i></a>
                                         </td> -->
                                         <td><span ng-if="x.paid"> {{ x.code }} {{ x.symbol }} {{ x.paid }}</span></td>
                      									 <td>{{ x.assignto }} </td>
                      									 <td>{{ x.code }} {{ x.symbol }} {{ x.budget }} </td>
                                         <td>
                                           <div class="form-group">
                                          <select class="form-control" ng-disabled="x.deleted == 1" id="projectStatus" onchange="angular.element(this).scope().statusChange(this)"  ng-model="x.status">
                                            <option data-id="{{ x.projectId }}" value="0">Yet to Start</option>
                                            <option data-id="{{ x.projectId }}" value="1">In progress</option>
                                             <option data-id="{{ x.projectId }}" value="2">Hold</option>
                                            <option data-id="{{ x.projectId }}" value="3">Completed</option>
                                          </select>
                                         </div>
                                         </td>
                                         <td class="project-action">
                                             <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a ng-if="x.deleted == 0" class="dropdown-item" target="_blank" class="btn btn-success" href="<?php echo base_url(); ?>freelancer/project-payment-detail/{{ x.projectId }}"><i class="fa fa-info"></i> Payment details</a>
                                     <a ng-if="x.deleted == 0" class="dropdown-item" href="<?php echo base_url(); ?>freelancer/project/view/{{ x.projectId }}" ><i class="fa fa-eye"></i> view</a>
                                     <a ng-if="x.deleted == 0" class="dropdown-item" href="<?php echo base_url(); ?>freelancer/project_edit/{{ x.projectId }}" ><i class="fa fa-edit"></i> Edit</a>
                                     <?php
                                     if ($this->session->userdata['clientloggedin']['access'] == '2')
                                     {
                                       ?>
                                     <a ng-if="x.deleted == 0" class="dropdown-item" ng-click="delete_confirm(key,x.projectId)"><i class="fa fa-trash"></i>Delete</a>
                                   <?php } ?>
                                     <a ng-if="x.deleted == 1" class="dropdown-item" ><i class="fa fa-trash"></i>Deleted</a>
                               </div>
                              </div>
                                             </td>
                                                 </tr>
                      								 <tr ng-if="allproject.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
                      						 </tbody>
                      					 </table>
                                 </div>
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

                                 <!-- package upgrade modal -->
                        <div class="modal fade" id="packageUpgrade" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Package </h4>
                                 </div>
                                 <div class="modal-body">

                                    <p>Sorry!! you seems to be out of your current package limit, please upgrade your package at <a ng-click="clickUpgrade()"  class="btn btn-success" id="confirm">Membership</a>  page.  </p>
                                 </div>
                                 <div class="modal-footer">

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- package upgrade modal -->

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
