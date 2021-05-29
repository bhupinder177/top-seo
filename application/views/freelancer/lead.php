<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
        <li class="active">Lead</li>
      </ol>
    </section>


<section class="content portfolio-cont Project-sect">
   <div class=" no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp66" ng-controller="myCtrt66">
          <div id="content">
      <div class="no-border-radius">
            <div class="row">
                  <div class="col-md-12">

                    <div class="box bg-white rounded c-pass-sec">


                      <div class="box-header with-border">
                        <div class="row">
                          <div class="col-md-1">
                          <div class="form-group mb-0">

                        <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select>
                    </div>
                    </div>

                    <div class="col-md-2 form-group">
                      <input ng-model="sclient" ng-value="sclient" id="sclient" placeholder="Please Enter Client Name" class="form-control w-100 ng-pristine ng-untouched ng-valid ng-empty">
                    </div>
                    <div class="col-md-2 form-group">
                      <select ng-model="sstatus" id="sstatus" class="form-control w-100 ng-pristine ng-untouched ng-valid ng-empty">
                        <option value="" >Select Status</option>
                        <option value="0">New Lead</option>
                        <option value="1">In progress</option>
                        <option value="2">Not Engaged </option>
                        <option value="3">Contact Made</option>
                        <option value="4">Waiting For Details </option>
                        <option value="5">Queries</option>
                        <option value="6"> Needs Defined </option>
                        <option value="7">Proposal Sent </option>
                        <option value="8">In Negotiation</option>
                        <option value="9">Presenting </option>
                        <option value="10">Hired </option>
                        <option value="11">Follow Up </option>
                        <option value="12">Dead Leads </option>
                      </select>
                    </div>
                    <div class="col-md-2 form-group">
                      <input ng-model="sdate" id="sdate" placeholder="Please select date" class="form-control expensedate w-100 ng-pristine ng-untouched ng-valid ng-empty">
                    </div>
                    <div class="col-md-2 col-sm-12 form-group">
                      <input type="button" ng-click="search()" class="btn btn-success w-100" value="Search">
                    </div>
                    <div class="col-md-3">
                           <a href="<?php echo base_url(); ?>freelancer/add-lead" class="btn btn-success pull-right">Add New Lead</a>
                    </div>

                         </div>
             				 </div>
             				 <div class="box-body">
                                 <div class="table-responsive leadtable">
                      					 <table class="table">
                      						 <thead>
                      							 <tr>
                                    <th>S. No.</th>
                                    <th>Client Name</th>
                                   <th>Lead Source</th>
                                    <th>Job Title</th>
                                    <th>Date</th>
                                    <th>Skill</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                      						 </thead>
                      						 <tbody>
                                        <tr ng-if="alllead.length != 0" ng-repeat="(key,x) in alllead">
                                        <td>{{ start + $index }}</td>
                                         <td> {{ x.clientName }}</td>
                                         <td> {{ x.leadsource }}</td>
                      									 <td>
                                           <span ng-if="x.jobTitle != ''">{{ x.jobTitle }}</span>
                                           <span ng-if="!x.jobTitle">N/A</span>
                                         </td>
                      									 <td><span ng-if="x.date">{{ x.date | date }} </span></td>
                                         <td><span ng-repeat="(key,x2) in x.skill">{{ x2.skill }}, </span></td>


                                         <td>
                                          <span class="btn color1" ng-if="x.status == 0">New Lead</span>
                                          <span class="btn color2" ng-if="x.status == 1">In progress</span>
                                          <span class="btn color3" ng-if="x.status == 2">Not Engaged </span>
                                          <span class="btn color4" ng-if="x.status == 3">Contact Made</span>
                                          <span class="btn color5" ng-if="x.status == 4">Waiting For Details </span>
                                          <span class="btn color6" ng-if="x.status == 5">Queries</span>
                                          <span class="btn color7" ng-if="x.status == 6"> Needs Defined </span>
                                          <span class="btn color8" ng-if="x.status == 7">Proposal Sent </span>
                                          <span class="btn color9" ng-if="x.status == 8">In Negotiation</span>
                                          <span class="btn color10" ng-if="x.status == 9">Presenting </span>
                                          <span class="btn color11" ng-if="x.status == 10">Hired </span>
                                          <span class="btn color12" ng-if="x.status == 11">Follow Up </span>
                                          <span class="btn color13" ng-if="x.status == 12">Dead Lead </span>
                                          <span class="btn color14" ng-if="x.status == 13">Converted to Project</span>
                                         </td>
                                         <td class="project-action">
                                             <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                      <a class="dropdown-item" ng-click="view(x.leadId)" ><i class="fa fa-eye"></i>View</a>
                                     <a class="dropdown-item" href="<?php echo base_url(); ?>freelancer/lead-edit/{{ x.leadId }}" ><i class="fa fa-edit"></i> Edit</a>
                                     <?php
                                   	if ($this->session->userdata['clientloggedin']['access'] == '2')
                                     {
                                   		?>
                                     <a class="dropdown-item" ng-click="confirm(x.leadId)"><i class="fa fa-trash"></i>Delete</a>
                                   <?php } ?>
                                     <a ng-if="x.status != 13" ng-click="convertproject(x.leadId)" class="dropdown-item"   href="#"><i class="fa fa-bullhorn"></i>Convert to Project</a>

                               </div>
                              </div>
                                             </td>
                                                 </tr>
                      								 <tr ng-if="alllead.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
                      						 </tbody>
                      					 </table>
                                 </div>
                      					 <div  id="pagination"></div>

                                 <!-- delete confirm modal -->
                      					 <div class="modal fade" id="Delete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
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
                        <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>

                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                      </div>
                      </div>
                      </div>
                      					 <!-- delete confirm modal -->

                                 <!-- view -->
                                 <div id="view" class="modal fade" role="dialog">
                                   <div class="modal-dialog">

                                     <!-- Modal content-->
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <h4 class="modal-title">View Lead</h4>
                                       </div>
                                       <div class="modal-body">
                                         <div class="repeat"  >

                                         <div  class="mb-1">
                                           <b>Client Name :</b> {{ viewdata.clientName }}
                                         </div>
                                         <div  class="mb-1">
                                           <b>Phone :</b> {{ viewdata.countryCode }}{{ viewdata.phone }}
                                         </div>
                                         <div ng-if="viewdata.email" class="mb-1">
                                           <b>Email :</b> {{ viewdata.email }}
                                         </div>
                                         <div ng-if="viewdata.skype" class="mb-1">
                                           <b>Skype :</b> {{ viewdata.skype }}
                                         </div>
                                         <div ng-if="viewdata.website" class="mb-1">
                                           <b>Website :</b> <a target="_blank" href="{{ viewdata.website }}">{{ viewdata.website }}</a>
                                         </div>
                                         <div ng-if="viewdata.jobTitle"  class="mb-1">
                                           <b>Job Title :</b> {{ viewdata.jobTitle }}
                                         </div>
                                         <div ng-if="viewdata.jobDescription" class="mb-1">
                                           <b>Job Description :</b> {{ viewdata.jobDescription }}
                                         </div>
                                         <div ng-if="viewdata.projectType" class="mb-1">
                                           <b>Project Type :</b> <span ng-if="viewdata.projectType == 1">Fixed</span><span ng-if="viewdata.projectType == 2">Hourly</span>
                                         </div>
                                         <div ng-if="viewdata.timezone" class="mb-1">
                                           <b>Time Zone :</b> {{ viewdata.timezone }}
                                         </div>

                                         <div ng-if="viewdata.upload"  class="mb-1">
                                           <b>Upload :</b> <a target="_blank" href="<?php echo base_url(); ?>assets/lead/{{viewdata.upload}} ">{{ viewdata.upload }}</a>
                                         </div>
                                         <hr>
                                         <div class="repeat" ng-repeat="(key,x2) in viewdata.info" >
                                           <div class="mb-1">
                                             <b>Emp.Name :</b> {{ x2.name }}
                                           </div>
                                           <div class="mb-1">
                                             <b>Budget :</b> {{ x2.code }} {{ x2.symbol }} {{ x2.budget }}
                                           </div>
                                         <div ng-if="x2.remark" class="mb-1">
                                           <b>Remark :</b> {{ x2.remark }}
                                         </div>

                                         <div ng-if="x2.date" class="mb-1">
                                           <b>Date :</b> {{ x2.date | date }}
                                         </div>

                                         <div class="mb-1">
                                           <b>Status :</b>
                                           <span  ng-if="x2.status == 0">New Lead</span>
                                           <span  ng-if="x2.status == 1">In progress</span>
                                           <span  ng-if="x2.status == 2">Not Engaged </span>
                                           <span  ng-if="x2.status == 3">Contact Made</span>
                                           <span  ng-if="x2.status == 4">Waiting For Details </span>
                                           <span  ng-if="x2.status == 5">Queries</span>
                                           <span  ng-if="x2.status == 6"> Needs Defined </span>
                                           <span  ng-if="x2.status == 7">Proposal Sent </span>
                                           <span  ng-if="x2.status == 8">In Negotiation</span>
                                           <span  ng-if="x2.status == 9">Presenting </span>
                                           <span  ng-if="x2.status == 10">Hired </span>
                                           <span  ng-if="x2.status == 11">Follow Up </span>
                                           <span  ng-if="x2.status == 12">Dead Lead </span>
                                           <span  ng-if="x2.status == 13">Converted to Project </span>
                                         </div>
                                         <hr>
                                            </div>
                                         </div>
                                       </div>
                                       <div class="modal-footer">
                                         <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Close</button>
                                       </div>
                                     </div>

                                   </div>
                                 </div>
                                 <!-- view -->

                                 <!-- confirm -->
                                 <div class="modal fade" id="confirmproject" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true" style="display: none;">
                                                  <div class="modal-dialog">
                                                     <div class="modal-content">
                                                        <div class="modal-header">
                                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                           <h4 class="modal-title">Confirmation</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                           <p>Are you sure you want to convert this record to Project ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" ng-click="convertleadToProject()" class="btn btn-success" id="confirm">Confirm</button>

                                                           <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                     </div>
                                                  </div>
                                               </div>
                                 <!-- confirm -->
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
