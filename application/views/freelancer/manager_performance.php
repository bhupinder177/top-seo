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
      <div ng-cloak  ng-app="myApp90" ng-controller="myCtrt90">
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
                                 <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                                   <option value="10">10</option>
                                   <option value="20">20</option>
                                   <option value="50">50</option>
                                   <option value="100">100</option>
                                 </select>
                               </div>
                               </div>

            </div>
                  </div>

                  <div class="box-body">
                      <div class="table-responsive">
                    <table class="table  table-condensed">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Employee Name</th>

                          <th>View Performance</th>

                        </tr>
                      </thead>
                      <tbody>

                        <tr ng-if="all.length != 0" ng-repeat="(key,x) in all">
                          <td>{{ start + $index }}</td>
                          <td>{{ x.name }}</td>
                          <td>
                            <a href="<?php echo base_url(); ?>freelancer/edit-performance/{{ x.performance_reviewerid }}" class="btn btn-success mb-0">View Performance</a>


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