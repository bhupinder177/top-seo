<?php

include('sidebar.php');
?>

<div id="wrapper" class="content-wrapper">
  <section class="content-header">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Performance</li>
    </ol>
  </section>
  <section class="content portfolio-cont">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp77" ng-controller="myCtrt77">
        <div id="content">
          <div id="content-header">
          </div>
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box">

                  <div class="box-header text-right p-2">
                <div class="row">
                  <div class="col-lg-2 col-md-3 col-sm-12">
                               <div class="form-group">
                                 <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                                   <option value="10">10</option>
                                   <option value="20">20</option>
                                   <option value="50">50</option>
                                   <option value="100">100</option>
                                 </select>
                               </div>
                               </div>
                 <div class="col-md-3">
                   <div class="form-group">
                    <input ng-model="semployee" ng-keyup="search()" type="text" class="form-control name ng-pristine ng-valid ng-empty ng-touched" placeholder="Please enter employee name">
                  </div>
                </div>
            <!-- <div class="col-lg-2 col-md-3 col-sm-12">
              <div class="form-group sea-cstm">
                 <input type="button" ng-click="search()" value="Search" class="btn btn-info w-100">
               </div>
              </div> -->
              <!-- <div class="col-lg-3 col-sm-12 col-md-3">
               <a href="<?php echo base_url(); ?>freelancer/performance-add"  class="btn btn-success mb-0">Emp. Performance Form</a>
             </div> -->
            </div>
                  </div>

                  <div class="box-body">
                      <div class="table-responsive">
                    <table class="table  table-condensed">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Employee Name</th>
                          <th>Last Review On</th>
                          <th>Duration</th>
                          <th>Review Status</th>
                          <th>Review Rating</th>
                          <th>Add Performance</th>
                          <th>View</th>
                          <!-- <th>Review Period End</th>
                           <th>Overall</th>
                           <th>Action</th>  -->
                        </tr>
                      </thead>
                      <tbody>

                        <tr ng-if="all.length != 0" ng-repeat="(key,x) in all">
                          <td>{{ start + $index }}</td>
                          <td>{{ x.name }}</td>
                          <td>
                            <span ng-if="x.lastreviewdate">{{ x.lastreviewdate }}</span>
                            <span ng-if="!x.lastreviewdate">N-A</span>
                          </td>
                         <td>

                             <div class="form-group">
                           <select  onchange="angular.element(this).scope().performanceUpdate(this)" ng-model="x.duration" class="form-control">
                             <option data-id="{{ x.u_id }}"  value="">Select Duration</option>
                             <option data-id="{{ x.u_id }}" value="1">1 Month</option>
                             <option data-id="{{ x.u_id }}" value="2">3 Month</option>
                             <option data-id="{{ x.u_id }}" value="3">6 Month</option>
                             <option data-id="{{ x.u_id }}" value="4">12 Month</option>
                           </select>
                         </div>

                         </td>
                         <td>
                           <span ng-if="x.status == 1">Active</span>
                           <span ng-if="x.status == 0">Inactive</span>
                         </td>
                         <td>
                           <span ng-if="x.rating">{{  x.rating }}</span>
                           <span ng-if="!x.rating">N-A</span>
                         </td>

                          <td>
                            <a ng-if="x.performance == 1"  href="<?php echo base_url(); ?>freelancer/performance-add/{{ x.u_id }}"  class="btn btn-success mb-0">Add Performance</a>
                            <a ng-if="x.performance == 0"   class="btn btn-danger  mb-0">Add Performance</a>
                          </td>
                          <td>
                            <a ng-if="x.perId" class="btn btn-success" href="<?php echo base_url(); ?>freelancer/performance-view/{{ x.perId }}">View</a>
                          </td>

                        </tr>
                        <tr ng-if="all.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
                      </tbody>
                    </table>
                      </div>
                    <div  id="pagination"></div>





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

                           <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</button>

                         </div>

                       </div>

                     </div>

                    </div>
                    <!-- Delete modal -->

                    <!-- view -->
                    <div id="view" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Employee Performance</h4>
                          </div>
                          <div class="modal-body">
                            <div class="repeat">
                            <div class="form-group ">
                               <b>Employee Name :</b>
                                 {{ viewdata.name }}
                            </div>
                            <div class="form-group ">
                              <b>Reviwer :</b> {{ viewdata.reviwer }}
                            </div>
                            <div class="form-group ">
                              <b>Job Title :</b> {{ viewdata.perJobTitle  }}
                            </div>
                            <div class="form-group ">
                              <b>Project :</b> {{ viewdata.perProject   }}
                            </div>
                            <div class="form-group ">
                              <b>Overall :</b> {{ viewdata.perOverall    }}
                            </div>
                            <div ng-if="viewdata.perQualityComment" class="form-group ">
                              <b>Qualite Comment :</b> {{ viewdata.perQualityComment    }}
                            </div>
                            <div ng-if="viewdata.perAttendanceComment" class="form-group ">
                              <b>Attendance Comment :</b> {{ viewdata.perAttendanceComment  }}
                            </div>
                            <div ng-if="viewdata.perReliabilityComment" class="form-group ">
                              <b>Reliability Comment :</b> {{ viewdata.perReliabilityComment }}
                            </div>
                            <div ng-if="viewdata.perCommunicationComment" class="form-group ">
                              <b>Communication Comment :</b> {{ viewdata.perCommunicationComment }}
                            </div>
                            <div ng-if="viewdata.perJudgementComment" class="form-group ">
                              <b>Judgement Comment :</b> {{ viewdata.perJudgementComment  }}
                            </div>
                            <div ng-if="viewdata.perInitiativeComment" class="form-group ">
                              <b>Initiative Comment :</b> {{ viewdata.perInitiativeComment  }}
                            </div>
                            <div ng-if="viewdata.perLeadershipComment" class="form-group ">
                              <b>Leadership Comment  :</b> {{ viewdata.perLeadershipComment   }}
                            </div>
                            <div ng-if="viewdata.perCooperationComment" class="form-group ">
                              <b>Cooperation Comment   :</b> {{ viewdata.perCooperationComment    }}
                            </div>
                            <div ng-if="viewdata.perKnowledgeComment" class="form-group ">
                              <b>Knowledge Comment   :</b> {{ viewdata.perKnowledgeComment    }}
                            </div>
                            <div ng-if="viewdata.perEmployeeGoalComment" class="form-group ">
                              <b>Employee Goal Comment  :</b> {{ viewdata.perEmployeeGoalComment   }}
                            </div>
                            <div ng-if="viewdata.perEmployeeComment" class="form-group ">
                              <b>Employee Comment   :</b> {{ viewdata.perEmployeeComment    }}
                            </div>
                            <div ng-if="viewdata.perAreaFocus" class="form-group ">
                              <b>Area Focus:</b> {{ viewdata.perAreaFocus    }}
                            </div>
                            <div ng-if="viewdata.perPlanObjective" class="form-group ">
                              <b>Plan Objective:</b> {{ viewdata.perPlanObjective    }}
                            </div>
                            <div ng-if="viewdata.perExpectedOutcome" class="form-group ">
                              <b>Expected Outcome :</b> {{ viewdata.perExpectedOutcome     }}
                            </div>
                            <div ng-if="viewdata.perreviewerSignature" class="form-group ">
                              <b>Reviewer Signature :</b> {{ viewdata.perreviewerSignature    }}
                            </div>

                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn bg-grey" data-dismiss="modal" aria-hidden="true" >Cancel</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- view -->



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
