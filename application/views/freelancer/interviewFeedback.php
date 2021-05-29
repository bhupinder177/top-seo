<?php

include('sidebar.php');
?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>

      <li class="active">Feedback After Interview</li>
    </ol>

  </section>


        <div id="content" ng-cloak ng-app="myApp58" ng-controller="myCtrt58">
          <div class="no-border-radius bg-white">
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header with-border box-body">
                  <div class="table-responsive">
                    <table  id="rankingTable" class="table table-condensed">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Time</th>
                          <th>Date</th>
                          <th>Cv</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <tr ng-if="allinterview.length != 0 && loading == 1" ng-repeat="(key,x) in allinterview">
                          <td>{{ start + $index }}</td>
                          <td>{{ x.candidateName  }}</td>
                          <td>{{ x.vacancyPosition  }}</td>
                          <td>{{ x.interviewTime  }}</td>
                          <td>{{ x.interviewDate | date   }}</td>
                          <td><a target="_blank" href="<?php echo base_url(); ?>assets/candidateCv/{{ x.candidateCv  }}">{{ x.candidateCv }}</a></td>
                          <td>
                            <span ng-if="x.interviewStatus == 0">Interview Pending</span>
                            <span ng-if="x.interviewStatus == 1">Interview Taken</span>
                            <span ng-if="x.interviewStatus == 2">Re-schedule Interview</span>
                            <span ng-if="x.interviewStatus == 3">Not Interested</span>
                            <span ng-if="x.interviewStatus == 4">Shortlisted</span>
                            <span ng-if="x.interviewStatus == 5">Hired</span>
                            <span ng-if="x.interviewStatus == 6">Rejected</span>
                          </td>
                          <td>
                           <a ng-if="!x.interviewerFeedback" ng-click="editInterview(x.interviewId)" class="openDialog no-border-radius" title="Edit"  ><i class="fa fa-pencil-square-o">Add Feedback</i></a>
                           <a ng-if="x.interviewerFeedback" class="btn bg-yellow" ng-click="viewinterview(x.interviewId)">View</a>
                          </td>
                        </tr>

                        <tr ng-if="allinterview.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
                      </tbody>
                    </table>
                      </div>
                    <div  id="pagination"></div>





                    <!-- edit -->
                    <div id="Edit" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Submit Your Feedback</h4>
                          </div>
                          <div class="modal-body">

                              <div class="col-md-12">
                            <div class="form-group ">
                              <label for="name" class="m-0">Feedback<span class="red-text">*</span></label>
                              <textarea placeholder="Please enter feedback" type="text" id="feedback" class="form-control ng-pristine ng-valid ng-empty ng-touched" name="feedback" ng-value="feedback" ng-model="feedback" ></textarea>
                              <p ng-show="submitl && feedback == ''" class="text-danger ng-hide">Please enter feedback.</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="update()" class="btn btn-success" >Update</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- edit -->

                  <!-- view -->
                  <div id="view" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">View Interview Status</h4>
                        </div>
                        {{ viewinterviewer }}
                        <div class="modal-body">
                          <div class="form-group "><b>Name :</b> {{ view.candidateName }}</div>
                          <div class="form-group ">
                            <b>Position :</b> {{ view.vacancyPosition   }}
                          </div>

                          <div class="form-group" >
                          <b>interviewer :</b> <a ng-repeat="(key1,x2) in view.interviewer">{{ x2.name }}<span ng-if="key1 != (view.interviewer.length -1)">, </span></a>
                          </div>

                          <div class="form-group ">
                            <b>Time :</b> {{ view.interviewTime }}
                          </div>
                          <div class="form-group ">
                            <b>Date :</b> {{ view.interviewDate | date }}
                          </div>
                          <div ng-if="view.interviewFeedback != ''" class="form-group ">
                            <b>Notes From HR :</b> {{ view.interviewFeedback  }}
                          </div>
                          <div ng-if="view.interviewer" ng-repeat="(key1,x2) in view.interviewer" class="form-group ">
                            <div ng-if="x2.feedBack"><b >{{ x2.name   }} Feedback :</b> {{ x2.feedBack  }}</div>
                          </div>
                          <div class="form-group ">
                            <b>Status :</b>
                            <span ng-if="view.interviewStatus == 0">Interview Pending</span>
                            <span ng-if="view.interviewStatus == 1">Interview Taken</span>
                            <span ng-if="view.interviewStatus == 2">Re-schedule Interview</span>
                            <span ng-if="view.interviewStatus == 3">Not Interested</span>
                            <span ng-if="view.interviewStatus == 4">Shortlisted</span>
                            <span ng-if="view.interviewStatus == 5">Hired</span>
                            <span ng-if="view.interviewStatus == 6">Rejected</span>

                          </div>

                        </div>
                        <div class="modal-footer">

                          <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Close</button>
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

  </section>
</div>
