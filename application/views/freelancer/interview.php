<?php

include('sidebar.php');
?>
<div id="wrapper" class="content-wrapper">
  <section class="content-header">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Job Interview</li>
    </ol>
  </section>

  <section class="content portfolio-cont recuit-csmt">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp57" ng-controller="myCtrt57">

        <div id="content">

          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header with-border">


                   <!-- row -->

                    <div class="row px-3 pt-3">
                      <div class="col-md-10">
                        <div class="row">
                          <div class="col-md-2 form-group">

     <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
       <option value="10">10</option>
       <option value="20">20</option>
       <option value="50">50</option>
       <option value="100">100</option>
     </select>

   </div>
                        <div class="col-md-2 form-group">
                          <select ng-model="sposition" id="sposition" class="form-control">
                            <option value="">Select Position</option>
                            <option ng-repeat="(key,x) in allopening" value="{{ x.vacancyId }}">{{ x.vacancyPosition }}</option>
                          </select >
                        </div>
                        <div class="col-md-2 form-group ">
                            <select id="st" class="form-control" name="st" ng-model="sstatus">
                               <option value="">Select Status</option>
                               <option value="0">Interview Pending</option>
                               <option value="1">Interview Taken</option>
                               <option value="2">Re-schedule Interview</option>
                               <option value="3">Not Interested</option>
                               <option value="4">Shortlisted</option>
                               <option value="5">Hired</option>
                               <option value="6">Rejected</option>
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <input  readonly type="text" class="interviewsearchdate form-control" id="searchdate" placeholder="Please select date">
                        </div>

                        <div class="col-md-2 form-group">
                          <input type="button" ng-click="search()" class="btn btn-success" value="Search" >
                        </div>
                      </div>
                    </div>
                     <!-- <div class="col-md-2">
                    <a data-toggle="modal" data-target="#addinterview" class="btn btn-success pull-right">Schedule Interview</a>
                  </div> -->
                  </div>

                    <!-- add  -->
                    <div id="addinterview" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> Schedule An Interview</h4>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                              <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Candidate<span class="red-text">*</span></label>
                              <select  id="candidate" class="form-control" name="candidate" ng-value="candidate" ng-model="candidate">
                                <option value="">Select Candidate</option>
                                <option ng-repeat="(key,x) in allcandidate" value="{{ x.candidateId }}">{{ x.candidateName }}</option>
                              </select>
                              <p ng-show="submitl && candidate == ''" class="text-danger">Please select candidate.</p>
                            </div>
                                  </div>
                              <div class="col-md-6">
                                <div class="form-group ">
                                  <label for="name" class="m-0">Position<span class="red-text">*</span></label>
                                  <select id="position" class="form-control" name="position" ng-value="position" ng-model="position">
                                    <option value="">Select Position</option>
                                    <option ng-repeat="(key,x) in allopening" value="{{ x.vacancyId }}">{{ x.vacancyPosition }}</option>
                                  </select>
                                  <p ng-show="submitl && position == ''" class="text-danger">Please select position.</p>
                                </div>
                                  </div>
                              </div>
                              <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                              <label for="name" class="m-0">Time<span class="red-text">*</span></label>
                              <input placeholder="Please enter time" ng-focus="gettime()" ng-blur="gettime()"  type="text"  id="interviewTime" class="form-control" name="time" ng-value="time" ng-model="time">
                              <p ng-show="submitl && time == ''" class="text-danger">Please enter time.</p>
                              <p ng-show="submitl && time != '' && timeerror" class="text-danger">invaild time format.</p>

                            </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                              <label for="name" class="m-0">Date<span class="red-text">*</span></label>
                              <input readonly placeholder="Please select date" type="text" mydatepicker="" id="date" class="form-control" name="date" ng-value="date" ng-model="date">
                              <p ng-show="submitl && date == ''" class="text-danger">Please select date.</p>
                            </div>
                                   </div>

                              </div>
                               <div class="row">

                                 <div class="col-md-6">
                                   <div class="form-group ">
                                     <label for="name" class="m-0">Interviewer<span class="red-text">*</span></label>
                                     <input type="text" class="form-control interviewer" ng-keyup="employeekeyup()" placeholder="Please search and select interviewer(s)">
                                     <ul if-ng="allteam.length != 0">
                                         <li ng-repeat="(key,x) in allteam" ng-click="addinterviewer(x.name,x.id)" >{{ x.name }}</li>
                                     </ul>

                                     <div ng-if="selectedinterviewer.length != 0" id="tags"><a ng-repeat="(key,x) in selectedinterviewer"> {{ x.name }}<span hand ng-click="deleteinterviewer(key)" > &times; </span></a></div>
                                     <!-- <select id="Interviewer" class="form-control" name="Interviewer" ng-value="Interviewer" ng-model="Interviewer">
                                       <option value="">Select Interviewer</option>


                                       <option ng-repeat="(key,x) in allteam" value="{{ x.u_id }}">{{ x.name }}</option>

                                     </select> -->
                                     <p ng-show="submitl && selectedinterviewer.length == 0" class="text-danger">Please select interviewer.</p>
                                   </div>
                               </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="saveinterview()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- add -->

                  <div class="box-body" style="clear:both">
                      <div class="table-responsive">
                    <table id="rankingTable" class="table  table-condensed">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Interviewer</th>
                          <th>Time</th>

                          <th class="intstatus">Status</th>
                            <th>joining on</th>
                          <th class="intstatus">View</th>
                          <th>Action</th>

                        </tr>

                      </thead>

                      <tbody>

                        <tr ng-if="allinterview.length != 0" ng-repeat="(key,x) in allinterview">
                          <td>{{ start + $index }}</td>
                          <td>{{ x.candidateName  }}</td>
                          <td>{{ x.vacancyPosition  }}</td>
                          <td>
                          <a ng-repeat="(key,x2) in x.interviewer">{{ x2.name }}<span ng-if="key != (x.interviewer.length -1)">, </span></a>
                          </td>
                          <td>{{ x.interviewTime  }}</td>

                          <td>
                              <div class="form-group">
                                <select onchange="angular.element(this).scope().statuschange(this)" id="st" class="form-control" name="st" ng-model="x.interviewStatus">
                                   <option data-id="{{ x.interviewId }}" value="">Select Status</option>
                                   <option data-id="{{ x.interviewId }}" value="0">Interview Pending</option>
                                   <option data-id="{{ x.interviewId }}" value="1">Interview Taken</option>
                                   <option data-id="{{ x.interviewId }}" value="2">Re-schedule Interview</option>
                                   <option data-id="{{ x.interviewId }}" value="3">Not Interested</option>
                                   <option data-id="{{ x.interviewId }}" value="4">Shortlisted</option>
                                   <option data-id="{{ x.interviewId }}" value="5">Hired</option>
                                   <option data-id="{{ x.interviewId }}" value="6">Rejected</option>
                                </select>
                              </div>

                          </td>
                          <td>
                            <div class="form-group">
                            <input ng-disabled="x.interviewStatus != 5" data-id="{{ x.candidateId }}" mydatepicker2="" type="text" ng-value="x.joiningDate" class="form-control" ng-model="x.joiningDate" placeholder="Please select joining date">
                          </div>
                          </td>
                          <td>

                            <a class="btn bg-yellow" ng-click="viewinterview(x.interviewId)">View</a>
                          </td>
                          <td>
                                <div class="dropdown ac-cstm text-center">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a ng-if="x.interviewStatus == 5" class="dropdown-item" title="Convert Employee" ng-click="convertEmploee(x.interviewId)" ><i class="fa fa-exchange"></i> Convert Employee</a>
                                     <a class="dropdown-item" title="Edit" ng-click="editInterview(x.interviewId)" ><i class="fa fa-edit"></i> Edit</a>
                                     <a class="dropdown-item" ng-click="confirm(x.interviewId)" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i>Delete</a>
                               </div>
                              </div>
                          </td>
                        </tr>
                        <tr ng-if="allinterview.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
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
                            <h4 class="modal-title">View Interview Status</h4>
                          </div>
                          {{ viewinterviewer }}
                          <div class="modal-body">
                            <div ng-if="view.candidateName" class="form-group "><b>Name :</b> {{ view.candidateName }}</div>
                            <div ng-if="view.vacancyPosition" class="form-group ">
                              <b>Position :</b> {{ view.vacancyPosition   }}
                            </div>

                            <div ng-if="view.interviewer.length != 0" class="form-group" >
                            <b>interviewer :</b> <a ng-repeat="(key1,x2) in view.interviewer">{{ x2.name }}<span ng-if="key1 != (view.interviewer.length -1)">, </span></a>
                            </div>

                            <div ng-if="view.interviewTime" class="form-group ">
                              <b>Time :</b> {{ view.interviewTime }}
                            </div>
                            <div ng-if="view.interviewDate" class="form-group ">
                              <b>Date :</b> {{ view.interviewDate | date }}
                            </div>
                            <div ng-if="view.interviewFeedback" class="form-group ">
                              <b>Notes From HR :</b> {{ view.interviewFeedback  }}
                            </div>
                            <div ng-if="view.interviewer" ng-repeat="(key1,x2) in view.interviewer" class="form-group ">
                              <div ng-if="x2.feedBack"><b >{{ x2.name   }} Feedback :</b> {{ x2.feedBack  }}</div>
                            </div>
                            <div ng-if="view.interviewStatus" class="form-group ">
                              <b>Status :</b>
                              <span ng-if="view.interviewStatus == 0">Interview Pending</span>
                              <span ng-if="view.interviewStatus == 1">Interview Taken</span>
                              <span ng-if="view.interviewStatus == 2">Re-schedule Interview</span>
                              <span ng-if="view.interviewStatus == 3">Not Interested</span>
                              <span ng-if="view.interviewStatus == 4">Shortlisted</span>
                              <span ng-if="view.interviewStatus == 5">Hired</span>
                              <span ng-if="view.interviewStatus == 6">Rejected</span>

                            </div>
                            <div ng-if="view.joiningDate" class="form-group ">
                              <b>Joining Date :</b> {{ view.joiningDate | date }}

                            </div>

                          </div>
                          <div class="modal-footer">

                            <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Close</button>
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
                           <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</button>


                         </div>

                       </div>

                     </div>

                    </div>
                    <!-- Delete modal -->

                    <!-- edit -->
                    <div id="Edit" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Interview Status</h4>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                              <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Candidate<span class="red-text">*</span></label>
                              <select disabled="disabled" id="candidate" class="form-control" name="candidate1" ng-value="candidate1" ng-model="candidate1">
                                <option value="">Select Candidate</option>
                                <option ng-repeat="(key,x) in allcandidate1" value="{{ x.candidateId }}">{{ x.candidateName }}</option>
                              </select>
                              <p ng-show="submitl && candidate1 == ''" class="text-danger">Please select candidate.</p>
                            </div>
                                  </div>
                              <div class="col-md-6">
                                <div class="form-group ">
                                  <label for="name" class="m-0">Position<span class="red-text">*</span></label>
                                  <select disabled="disabled" id="position1" class="form-control" name="position1" ng-value="position1" ng-model="position1">
                                    <option value="">Select Position</option>
                                    <option ng-repeat="(key,x) in allopening" value="{{ x.vacancyId }}">{{ x.vacancyPosition }}</option>

                                  </select>
                                  <p ng-show="submitl && position1 == ''" class="text-danger">Please select position.</p>
                                </div>
                                  </div>
                              </div>
                              <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                              <label for="name" class="m-0">Time<span class="red-text">*</span></label>
                              <input type="text" placeholder="Please select time"  id="interviewTime1" class="form-control" name="time1" ng-value="time1" ng-model="time1">
                              <p ng-show="submitl && time1 == ''" class="text-danger">Please enter time.</p>
                              <p ng-show="submitl && time1 != '' && timeerror1" class="text-danger">invaild time format.</p>

                            </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                              <label for="name" class="m-0">Date*</label>
                              <input type="text" placeholder="Please select date" mydatepicker1="" id="date1" class="form-control" name="date1" ng-value="date1" ng-model="date1">
                              <p ng-show="submitl && date1 == ''" class="text-danger">Please select date.</p>
                                </div>
                             </div>

                              </div>
                               <div class="row">
                                 <div class="col-md-6">
                                   <div class="form-group ">
                                     <label for="name" class="m-0">Interviewer<span class="red-text">*</span></label>
                                     <input type="text" class="form-control interviewer1" ng-keyup="employeekeyup1()" placeholder="Please search and select interviewer(s)">
                                     <ul if-ng="allteam.length != 0">
                                         <li ng-repeat="(key,x) in allteam1" ng-click="addinterviewer1(x.name,x.id)" >{{ x.name }}</li>
                                     </ul>
                                     <div ng-if="selectedinterviewer1.length != 0" id="tags"><a ng-repeat="(key,x) in selectedinterviewer1"> {{ x.name }}<span hand ng-click="deleteinterviewer1(key)" > &times; </span></a></div>
                                     <!-- <select id="Interviewer" class="form-control" name="Interviewer" ng-value="Interviewer" ng-model="Interviewer">
                                       <option value="">Select Interviewer</option>
                                       <option ng-repeat="(key,x) in allteam" value="{{ x.u_id }}">{{ x.name }}</option>
                                     </select> -->
                                       <p ng-show="submitl && selectedinterviewer1.length == 0" class="text-danger">Please select interviewer.</p>
                                      </div>
                                     </div>

                             <div class="col-md-6">
                               <div class="form-group ">
                                 <label for="name" class="m-0">Status<span class="red-text">*</span></label>
                                 <select id="status" class="form-control" name="status" ng-value="status" ng-model="status">
                                   <option value="">Select Status</option>
                                   <option value="0" >Interview Pending</span>
                                   <option value="1" >Interview Taken</span>
                                   <option value="2" >Re-schedule Interview</span>
                                   <option value="3" >Not Interested</span>
                                   <option value="4" >Shortlisted</span>
                                   <option value="5" >Hired</span>
                                   <option value="6" >Rejected</span>


                                 </select>
                                 <p ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
                               </div>
                           </div>
                          </div>
                          <div class="row">
                          <div class="col-md-12">
                            <div class="form-group ">
                              <label for="name" class="m-0">Notes From HR</label>
                              <textarea placeholder="Please enter notes" type="text" id="feedback" class="form-control ng-pristine ng-valid ng-empty ng-touched" name="feedback" ng-value="feedback" ng-model="feedback" ></textarea>
                              <!-- <p ng-show="submitl && feedback == ''" class="text-danger ng-hide">Please enter feedback.</p> -->
                            </div>
                          </div>
                        </div>

                          <div class="modal-footer">
                            <button type="button" ng-click="update()" class="btn btn-success" >Update</button>
                          </div>
                        </div>

                      </div>
                    </div>

                  </div>
                </div>
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
