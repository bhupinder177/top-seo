<?php

include('sidebar.php');
?>
<div id="wrapper" class="content-wrapper" ng-app="myApp63" ng-controller="myCtrt63">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>

      <li class="active">Employee Evaluation</li>
    </ol>
  </section>
  <section class="content main-ratings">
    <div class="no-margin">
      <div class="no-border-radius">

            <div class="box">
              <div class="box-body">
                <!-- body  -->
                <div class="employee-review-wrapper">
                  <div class="employee-Information p-3">
                    <h3>Employee Information</h3>
                  </div>
                    <div class="main-wrapper px-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="main-employee">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Department</label>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <select onchange="angular.element(this).scope().selectdepartment(this)" class="form-control" ng-model="department" id="exampleFormControlSelect1">
                                    <option  value="" >Select Department</option>
                                    <option   ng-repeat="(key,x) in alldepartment" value="{{ x.id }}" >{{ x.department }}</option>

                                  </select>
                                  <p ng-show="forms && department == ''" class="text-danger">Please select department.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">

                          <div class="row">
                            <div class="col-md-4">
                              <label>Date </label>
                            </div>
                            <div class="col-md-8">
                              <div class="employee-id">
                                <div class="form-group">
                                  <input readonly mydatepicker id="date" ng-model="date" name="text" class="form-control">
                                  <p ng-show="forms && date == ''" class="text-danger">Please enter date.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="main-wrapper">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="main-employee">
                            <div class="row">
                              <div class="col-md-3">

                    <div class="main-wrapper px-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="main-employee">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Employee Name</label>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <select ng-model="employee" class="form-control" id="exampleFormControlSelect1">
                                    <option  value="" >Select Employee</option>
                                    <option  ng-repeat="(key,x) in allteam" value="{{ x.id }}" >{{ x.name }}</option>
                                  </select>
                                  <p ng-show="forms && employee == ''" class="text-danger">Please select employee.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">

                          <div class="row">
                            <div class="col-md-4">
                              <label>Reviewer</label>
                            </div>
                            <div class="col-md-8">
                              <div class="employee-id">
                                <div class="form-group">
                                  <input type="text" ng-keyup="employeekeyup()"  class="form-control reviwer" id="exampleFormControlSelect1">

                                  <p ng-show="forms && selectedreviwer.length == 0" class="text-danger">Please select reviwer.</p>


                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="main-wrapper">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="main-employee">
                            <div class="row">
                              <div class="col-md-3">
                    <div class="main-wrapper px-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="main-employee">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Job Title</label>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <input ng-model="jobTitle" ng-value="jobTitle" type="text" name="text" class="form-control">
                                  <p ng-show="forms && jobTitle == ''" class="text-danger">Please enter job title.</p>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                      </div>
                    </div>
                    <div class="main-wrapper">
                      <div class="row">
                        <div class="col-md-2">

                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-4">
                              <label>Project</label>
                            </div>
                            <div class="col-md-8">
                              <div class="employee-id">
                                <div class="form-group">
                                  <input type="text" ng-model="project" ng-value="project" class="form-control project" id="exampleFormControlSelect1">
                                  <p ng-show="forms && project == ''" class="text-danger">Please enter project.</p>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="main-wrapper px-3">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                        <div class="col-md-4">

                          <div class="review-period">
                            <label>Review Period Start</label>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="review-input">
                            <div class="form-group">
                              <input readonly ng-model="reviewperiodstart" ng-value="reviewperiod" name="text" class="form-control startdate">
                              <p ng-show="forms && reviewperiodstart == ''" class="text-danger">Please enter review period.</p>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">

                        <div class="col-md-8">
                          <div class="review-input">
                            <div class="form-group">
                              <input readonly ng-model="reviewperiodstart" ng-value="reviewperiod" name="text" class="form-control startdate1">
                              <p ng-show="forms && reviewperiodstart == ''" class="text-danger">Please enter review period.</p>
                            </div>
                          </div>
                        </div>
                        </div>
                        </div>
                           <div class="col-md-6">
                               <div class="row">
                        <div class="col-md-4">

                          <div class="review-period">
                            <label>Review Period End</label>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="review-input">
                            <div class="form-group">
                              <input readonly ng-model="reviewperiodend" ng-value="reviewperiodend" name="text" class="form-control enddate">
                              <p ng-show="forms && reviewperiodend == ''" class="text-danger">Please enter review period.</p>

                            </div>
                          </div>
                        </div>
                </div>
              </div>

            </div>

                        <div class="col-md-8">
                          <div class="review-input">
                            <div class="form-group">
                              <input readonly ng-model="reviewperiodend" ng-value="reviewperiodend" name="text" class="form-control enddate1">
                              <p ng-show="forms && reviewperiodend == ''" class="text-danger">Please enter review period.</p>
                            </div>
                          </div>
                        </div>
              </div>
              </div>
          </div>

          </div>

          <!--employee ratings-->
          <div class="rating-wrapper">


            <div class="employee-Information">
              <h4>Core Values and Objectives</h4>

            </div>
            <div class="important-ratings">
              <table class="table">
                <tbody>
                  <tr>
                    <th style="width:30%;">Performance Category</th>
                    <th>1=Poor</th>
                    <th>2=Fair</th>
                    <th>3=Satisfactory</th>
                    <th>4=Good</th>
                    <th>5=Excellent</th>
                  </tr>
                  <tr>
                    <td>Quality of Work:</td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="qualite" value="1" name="quality"  >
                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="qualite" value="2" name="quality"  >
                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="qualite" value="3" name="quality"  >
                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()"  ng-model="qualite" value="4" name="quality" >
                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()"  ng-model="qualite" value="5"  name="quality">
                      </div>
                    </td>

                  </tr>
                  <tr>
                    <td colspan="6"><p class="mb-0">Work is completed accurately (few or no errors), efficiently and within deadlines with minimal supervision</p></td>
                  </tr>
                  <tr class="p-0">
                    <td>Comment</td>
                    <td colspan="6"><textarea ng-value="qualiteComment" ng-model="qualiteComment" class="form-control"></textarea>
                      <p ng-show="forms && qualiteComment == ''" class="text-danger">Please enter comment.</p>


                    </td>
                  </tr>
                  <tr>
                    <td>Attendance & Punctuality:</td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="attendance" value="1"  name="attendance">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="attendance" value="2" name="attendance">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="attendance" value="3"  name="attendance">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="attendance" value="4"  name="attendance">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="attendance" value="5"  name="attendance">

                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6"><p class="mb-0">Reports for work on time, provides advance notice of need for absence</p></td>
                  </tr>
                  <tr class="p-0">
                    <td>Comment</td>
                    <td colspan="6">
                      <textarea ng-value="attendanceComment" ng-model="attendanceComment" class="form-control"></textarea>
                      <p ng-show="forms && attendanceComment == ''" class="text-danger">Please enter comment.</p>

                    </td>
                  </tr>
                  <tr>
                    <td>Reliability/Dependability:</td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="reliability" value="1" name="reliability">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="reliability" value="2"  name="reliability">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="reliability" value="3" name="reliability">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="reliability" value="4"  name="reliability">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="reliability" value="5"  name="reliability">

                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6"><p class="mb-0">Consistently performs at a high level; manages time and workload effectively to meet responsibilities.</p></td>
                  </tr>
                  <tr class="p-0">
                    <td>Comment</td>
                    <td colspan="6"> <textarea ng-value="reliabilityComment" ng-model="reliabilityComment" class="form-control"></textarea>
                      <p ng-show="forms && qualiteComment == ''" class="text-danger">Please enter comment.</p>

                    </td>
                  </tr>
                  <tr>
                    <td>Communication Skills:</td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="communication" value="1" name="communication">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="communication" value="2" name="communication">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="communication" value="3"  name="communication">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="communication" value="4" name="communication">

                      </div>
                    </td>
                    <td>
                      <div class="rating-value">
                        <input type="radio" ng-click="rating()" ng-model="communication" value="5"  name="communication">

                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6"><p class="mb-0">Written and Verbal communications are clear, organized and effective; listens and comprehends well.</p></td>
                  </tr>
                  <tr class="p-0">
                    <td><b>Comment</b></td>
                    <td colspan="6">
                      <textarea ng-value="communicationComment" ng-model="communicationComment" class="form-control"></textarea>
                      <p ng-show="forms && communicationComment == ''" class="text-danger">Please enter comment.</p>
                    </td>
                  </tr>
                  <!-- <tr>
                  <td colspan="6"></td>
                </tr> -->
                <tr>
                  <td><b>Judgement & Decision-Making:</b></td>
                  <td>
                    <div class="rating-value">
                      <input type="radio" ng-click="rating()" value="1" ng-model="judgement" name="judgement"  >
                    </div>
                  </td>
                  <td>
                    <div class="rating-value">
                      <input type="radio" ng-click="rating()" value="2" ng-model="judgement" name="judgement"  >

                    </div>
                  </td>
                  <td>
                    <div class="rating-value">
                      <input type="radio" ng-click="rating()" value="3" ng-model="judgement" name="judgement"  >

                    </div>
                  </td>
                  <td>
                    <div class="rating-value">
                      <input type="radio" ng-click="rating()" value="4" ng-model="judgement" name="judgement"  >

                    </div>
                  </td>
                  <td>
                    <div class="rating-value">
                      <input type="radio" ng-click="rating()" value="5" ng-model="judgement" name="judgement"  >

                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="6"><p class="mb-0">Makes thoughtful, well-reasoned decisions; exercises good judgement, resourcefulness and creativity in problem-solving</p></td>
                </tr>
                <tr  class="p-0">
                  <td>Comment</td>
                  <td colspan="6"> <textarea ng-value="judgementComment" ng-model="judgementComment" class="form-control"></textarea>
                    <p ng-show="forms && judgementComment == ''" class="text-danger">Please enter comment.</p>

                  </td>
                </tr>
                <tr>
                  <td colspan="6"></td>
                </tr>
                <tr>
                  <td>Initiative & Flexibility:</td>
                  <td>
                    <div class="rating-value">
                      <input type="radio" ng-click="rating()" value="1" ng-model="initiative" name="initiative"  >

                    </div>
                  </td>
                  <td>
                    <div class="rating-value">
                      <input type="radio" ng-click="rating()" value="2" ng-model="initiative" name="initiative"  >
                    </div>
                  </td>
                  <td>
                    <div class="rating-value">
                      <input type="radio" ng-click="rating()" value="3" ng-model="initiative" name="initiative"  >
                    </div>
                  </td>
                  <td>
                    <div class="rating-value">
                      <input type="radio" ng-click="rating()" value="4" ng-model="initiative" name="initiative"  >
                    </div>
                  </td>
                  <td>
                    <div class="rating-value">
                      <input type="radio" ng-click="rating()" value="5" ng-model="initiative" name="initiative"  >
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="6"><p class="mb-0">Demonstrates initiative, often seeking out additional responsibility; identifies problems and solutions; thrives on new challenges and adjusts to unexpected changes</p></td>
                </tr>
                <tr class="p-0">
                  <td>Comment</td>
                  <td colspan="6"> <textarea ng-value="initiativeComment" ng-model="initiativeComment" class="form-control"></textarea>
                    <p ng-show="forms && initiativeComment == ''" class="text-danger">Please enter comment.</p>

                  </td>
                </tr>
                <!-- <tr>
                <td colspan="6"></td>
              </tr> -->
              <tr>
                <td>Leadership Quality:</td>
                <td>
                  <div class="rating-value">
                    <input type="radio" ng-click="rating()" value="1" ng-model="leadership" name="leadership"  >
                  </div>
                </td>
                <td>
                  <div class="rating-value">
                    <input type="radio" ng-click="rating()" value="2" ng-model="leadership" name="leadership"  >

                  </div>
                </td>
                <td>
                  <div class="rating-value">
                    <input type="radio" ng-click="rating()" value="3" ng-model="leadership" name="leadership"  >

                  </div>
                </td>
                <td>
                  <div class="rating-value">
                    <input type="radio" ng-click="rating()" value="4" ng-model="leadership" name="leadership"  >

                  </div>
                </td>
                <td>
                  <div class="rating-value">
                    <input type="radio" ng-click="rating()" value="5" ng-model="leadership" name="leadership"  >

                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="6"><p class="mb-0">Inspire others, resolve conflicts, Empower team mates and able to handle team of 4-5 employees</p></td>
              </tr>
              <tr class="p-0">
                <td>Comment</td>
                <td colspan="6"> <textarea  ng-value="leadershipComment" ng-model="leadershipComment" class="form-control"></textarea>
                  <p ng-show="forms && leadershipComment == ''" class="text-danger">Please enter comment.</p>

                </td>
              </tr>
              <!-- <tr>
              <td colspan="6"></td>
            </tr> -->
            <tr>
              <td>Cooperation & Teamwork:</td>
              <td>
                <div class="rating-value">
                  <input type="radio" ng-click="rating()" value="1" ng-model="cooperation" name="cooperation"  >

                </div>
              </td>
              <td>
                <div class="rating-value">
                  <input type="radio" ng-click="rating()" value="2" ng-model="cooperation" name="cooperation"  >

                </div>
              </td>
              <td>
                <div class="rating-value">
                  <input type="radio" ng-click="rating()" value="3" ng-model="cooperation" name="cooperation"  >

                </div>
              </td>
              <td>
                <div class="rating-value">
                  <input type="radio" ng-click="rating()" value="4" ng-model="cooperation" name="cooperation"  >

                </div>
              </td>
              <td>
                <div class="rating-value">
                  <input type="radio" ng-click="rating()" value="5" ng-model="cooperation" name="cooperation"  >

                </div>
              </td>
            </tr>
            <tr>
              <td colspan="6"><p class="mb-0">Respectful of colleagues when working with others and makes valuable contributions to help the group achieve its goals
              </p>
            </td>
          </tr>
          <tr class="p-0">
            <td>Comment</td>
            <td colspan="6"> <textarea ng-value="cooperationComment" ng-model="cooperationComment"  class="form-control"></textarea>
              <p ng-show="forms && cooperationComment == ''" class="text-danger">Please enter comment.</p>

            </td>
          </tr>

        </tbody>
      </table>
    </div>
    <div class="job-performance table-responsive">
      <div class="employee-Information">
        <h4>JOB-SPECIFIC PERFORMANCE CRITERIA</h4>
      </div>
      <table class="table">
        <tbody>
          <tr >
            <td>Knowledge of Position:</td>
            <td>
              <div class="rating-value">
                <input type="radio" ng-click="rating()" value="1" ng-model="knowledge" name="knowledge"  >

              </div>
            </td>
            <td>
              <div class="rating-value">
                <input type="radio" ng-click="rating()" value="2" ng-model="knowledge" name="knowledge"  >

              </div>
            </td>
            <td>
              <div class="rating-value">
                <input type="radio" ng-click="rating()" value="3" ng-model="knowledge" name="knowledge"  >

              </div>
            </td>
            <td>
              <div class="rating-value">
                <input type="radio" ng-click="rating()" value="4" ng-model="knowledge" name="knowledge"  >

              </div>
            </td>
            <td>
              <div class="rating-value">
                <input type="radio" ng-click="rating()" value="5" ng-model="knowledge" name="knowledge"  >

              </div>
            </td>
          </tr>
          <tr>
            <td colspan="6"><p class="mb-0">Possesses required skills, knowledge, and abilities to competently perform the job   </p></td>
          </tr>
          <tr class="p-0">
            <td>Comment</td>
            <td colspan="5"> <textarea ng-value="knowledgeComment" ng-model="knowledgeComment" class="form-control"></textarea>
              <p ng-show="forms && knowledgeComment == ''" class="text-danger">Please enter comment.</p>

            </td>
          </tr>
          <tr>
            <td>Training & Development:</td>
            <td>
              <div class="rating-value">
                <input type="radio" ng-click="rating()" value="1" ng-model="training" name="training"  >

              </div>
            </td>
            <td>
              <div class="rating-value">
                <input type="radio" ng-click="rating()" value="2" ng-model="training" name="training"  >

              </div>
            </td>
            <td>
              <div class="rating-value">
                <input type="radio" ng-click="rating()" value="3" ng-model="training" name="training"  >

              </div>
            </td>
            <td>
              <div class="rating-value">
                <input type="radio" ng-click="rating()" value="4" ng-model="training" name="training"  >

              </div>
            </td>
            <td>
              <div class="rating-value">
                <input type="radio" ng-click="rating()" value="5" ng-model="training" name="training"  >

              </div>
            </td>
          </tr>
          <tr>
            <td colspan="6"><p class="mb-0">Continually seeks ways to strengthen performance and regularly monitors new developments in field of work</p></td>
          </tr>
          <tr class="p-0">
            <td>Comment</td>
            <td colspan="6"> <textarea ng-value="trainingComment" ng-model="trainingComment" class="form-control"></textarea>
              <p ng-show="forms && trainingComment == ''" class="text-danger">Please enter comment.</p>

            </td>
          </tr>

        </tbody>
      </table>
    </div>


    <div class="job-performance table-responsive">
      <div class="employee-Information">
        <h4>Employee Goals</h4>
      </div>
      <table class="table">
        <tbody>
          <tr class="p-0">
            <td>Area of Focus</td>
            <td colspan="6"> <textarea ng-value="areafocus" ng-model="areafocus" class="form-control ng-pristine ng-untouched ng-valid ng-empty" value=""></textarea>
              <p ng-show="forms && areafocus == ''" class="text-danger ng-hide">Please enter area focus.</p>

            </td>
          </tr>
          <tr class="p-0">
            <td>Plan Objective</td>
            <td colspan="6"><textarea ng-value="planObjective" ng-model="planObjective" class="form-control ng-pristine ng-untouched ng-valid ng-empty" value=""></textarea>
              <p ng-show="forms && planObjective == ''" class="text-danger ng-hide">Please enter plan objective.</p>

            </td>
          </tr>

          <tr class="p-0">
            <td>Expected Outcome</td>
            <td colspan="6"><textarea ng-value="expectedOutcome" ng-model="expectedOutcome" class="form-control ng-pristine ng-untouched ng-valid ng-empty" value=""></textarea>
              <p ng-show="forms && expectedOutcome == ''" class="text-danger ng-hide">Please enter expected outcome.</p>

            </td>
          </tr>
          <tr class="p-0">
            <td>Plan Start Date</td>
            <td colspan="2">
              <input readonly id="planstart"  name="text" class="form-control planstart">
              <p ng-show="forms && planstart == ''" class="text-danger">Please enter plan start date.</p>
            </td>
            <td>Plan End date</td>
            <td colspan="2">
              <input readonly id="planend"  name="text" class="form-control planend">
              <p ng-show="forms && planend == ''" class="text-danger">Please enter plan end.</p>

            </td>
          </tr>

          <tr class="p-0">
            <td>Additional Comments</td>
            <td colspan="5"> <textarea ng-value="additionalComment" ng-model="additionalComment" class="form-control"></textarea>
              <p ng-show="forms && additionalComment == ''" class="text-danger">Please enter additional comment.</p>

            </td>

          </tr>
          <tr>
            <td colspan="6"><p class="mb-0">Set objectives and outline steps to improve in problem areas or further employee development.</p></td>
          </tr>

        </tbody>
      </table>
    </div>



    <div class="job-performance table-responsive Overall_Rating">
                     <div class="employee-Information">
                        <h4>Overall Rating</h4>
                     </div>
                     <table class="table">
                       <tbody>
    						<tr>

    							<td><input type="radio" ng-click="rating()" value="1" ng-model="expectations" name="training"  ></td>
    							<td><input type="radio" ng-click="rating()" value="2" ng-model="expectations" name="training"  ></td>
    							<td><input type="radio" ng-click="rating()" value="3" ng-model="expectations" name="training"  ></td>
    							<td><input type="radio" ng-click="rating()" value="4" ng-model="expectations" name="training"  ></td>
    						</tr>
    						<tr>
    							<td><strong>Consistently Exceeds Expectations</strong></td>
    							<td><strong>Frequently Exceeds Expectations</strong></td>
    							<td><strong>Fully Meets Expectations</strong></td>
    							<td><strong>Partially Meets Expectations</strong></td>
    						</tr>
                           <tr>
                              <td><p class="mb-0">Employee consistently performs at a high level that Consistently Exceeds Expectations	</p></td>
    						  <td><p class="mb-0">Employee satisfies all essential job requirements; may exceed expectations periodically; demonstrates likelihood of eventually exceeding expectations	</p></td>
    						  <td><p class="mb-0">Employee consistently performs below required standards/expectations for the position; training or other action is necessary to correct performance</p></td>
    						  <td><p class="mb-0">Employee is Performing not good. But we can provide some senior Guidance or we can shuffle the projects.</p></td>
                           </tr>
                           <tr>
                              <td colspan="2" class="text-left">
    							<strong>Overall Rating</strong>
    							<p>Average the rating numbers above</p>
    						  </td>
    						  <td colspan="2">{{ overall | number }}</td>
                           </tr>
                       </tbody>
                     </table>
                   </div>
    <!-- <div class="job-performance table-responsive">
      <div class="employee-Information">
        <h4>Overall Rating</h4>
      </div>
      <table class="table">
        <tbody>
          <tr>
            <td colspan="6"><span><p class="mb-0">Consistently Exceeds Expectations	Frequently Exceeds Expectations	Fully Meets Expectations	Partially Meets Expectations</p></span></td>
          </tr>
          <tr>
            <td colspan="6"><p class="mb-0">Employee consistently performs at a high level that Consistently Exceeds Expectations	Employee satisfies all essential job requirements; may exceed expectations periodically; demonstrates likelihood of eventually exceeding expectations	Employee consistently performs below required standards/expectations for the position; training or other action is necessary to correct performance	Employee is Performing not good. But we can provide some senior Guidance or we can shuffle the projects.</p></td>
          </tr>
          <tr>
            <td colspan="1">Overall Rating</td>
            <td></td>

          </tr>
          <tr>
            <td colspan="6"><p class="mb-0">Continually seeks ways to strengthen performance and regularly monitors new developments in field of work</p></td>
          </tr>
        </tbody>
      </table>
    </div> -->
    <!--Employee Comments (Optional)-->


    <div class="job-performance table-responsive">
      <div class="employee-Information" >
        <h4>Employee Comments (Optional)</h4>
      </div>
      <table class="table">
        <tbody>
          <tr>
            <td colspan="6">
              <textarea ng-model="employeeComment" ng-value="employeeComment" class="form-control"></textarea>
              <p ng-show="forms && employeeComment == ''" class="text-danger">Please enter employee comment.</p>

            </td>
          </tr>
        </tbody>
      </table>
    </div>


    <div class="job-performance table-responsive">
      <div class="employee-Information" >
        <h4>Acknowledgement</h4>
      </div>
      <table class="table">
        <tbody>
          <tr>
            <td colspan="6"><p class="mb-0">I acknowledge that I have had the opportunity to discuss this performance evaluation with my manager and I have received a copy of this evaluation.</p></td>
          </tr>
          <tr>
            <td>Employee Signature</td>
            <td colspan="2">
              <input type="text" ng-value="employeeSignature" ng-model="employeeSignature" name="employeesignature" class="form-control">
            </td>
            <td>Date</td>
            <td colspan="2">
              <input type="text" name="date" ng-value="employeeSignatureDate" ng-model="employeeSignatureDate" class="form-control date" >
            </td>
          </tr>
          <tr>
            <td>Reviewer Signature</td>
            <td colspan="2">
              <input type="text" ng-value="reviewerSignature" ng-model="reviewerSignature" name="reviewersignature" class="form-control" >

            </td>
            <td>Date</td>
            <td colspan="2">
              <input type="text" name="date" ng-value="reviewerSignatureDate" ng-model="reviewerSignatureDate" class="form-control date" >
            </td>
            <!-- <td></td> -->
          </tr>
        </tbody>
      </table>
    </div>


    <input type="button" ng-click="submit()" value="Submit" class="btn btn-success">




  </div>




</div>
</div>


</div>
</div>
</div>
</section>
</div>
