<?php

include('sidebar.php');
?>
<div id="wrapper" ng-cloak class="content-wrapper" ng-app="myApp93" ng-controller="myCtrt93">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">My Performance</li>
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
                    <div class="row">
                      <div class="col-md-3"><b>Employee: </b><span>{{ userdetail.name }}</span></div>
                      <div class="col-md-3"><b>Joining date</b>: <span>{{ userdetail.joiningdate }}</span></div>
                      <div class="col-md-3"><b>Last Review date</b>: <span ng-if="userdetail.lastreviewdate"> {{ userdetail.lastreviewdate }}</span><span ng-if="!userdetail.lastreviewdate">N-A</span></div>
                  </div>

                  </div>
                  <div class="mainhrreview">
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
                                  <select disabled onchange="angular.element(this).scope().selectdepartment(this)" class="form-control" ng-model="department" id="exampleFormControlSelect1">
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
                              <label>Date</label>
                            </div>
                            <div class="col-md-8">
                              <div class="employee-id">
                                <div class="form-group">
                                  <input disabled placeholder="Please select date"  mydatepicker id="date" ng-model="date" name="text" class="form-control">
                                  <p ng-show="forms && date == ''" class="text-danger">Please enter date.</p>

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
                          <div class="main-employee">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Designation</label>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <input readonly placeholder="Please enter designation" ng-model="jobTitle" ng-value="jobTitle" type="text" name="text" class="form-control">
                                  <p ng-show="forms && jobTitle == ''" class="text-danger">Please enter designation.</p>
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
                        <div class="col-md-8">
                          <div class="review-input">
                            <div class="form-group">
                              <input placeholder="Please select review period start" disabled ng-model="reviewperiodstart" ng-value="reviewperiod" name="text" class="form-control reviewerstartdate">
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
                        <div class="col-md-8">
                          <div class="review-input">
                            <div class="form-group">
                              <input placeholder="Please select review period end" disabled ng-model="reviewperiodend" ng-value="reviewperiodend" name="text" class="form-control reviewerenddate">
                              <p ng-show="forms && reviewperiodend == ''" class="text-danger">Please enter review period.</p>
                            </div>
                          </div>
                        </div>
              </div>
              </div>
          </div>
          </div>
        </div>

          <!-- reviewer form -->
          <div   class="reviewermain">



<div class="main-wrapper px-3">
  <div class="row">
      <div class="col-md-6">
          <div class="row">
    <div class="col-md-4">
      <div class="review-period">
        <label>Reviewer form</label>
      </div>
    </div>
    <div class="col-md-8">
      <div class="review-input">
        <div class="form-group">
          <a ng-click="showpopup()">Click here</a>
        </div>
        <p ng-show="forms && overall == 0" class="text-danger">This is required.</p>

      </div>
    </div>
    </div>
    </div>

</div>
</div>
</div>
  <!-- comment -->
          <!-- reviewer form -->

          <!--employee ratings-->
          <div class="rating-wrapper p-3">



    <input type="button" ng-if="status == 0" ng-click="submit()" value="Submit" class="btn btn-success">
  </div>
  <!-- body -->

  <!-- rating popup -->
  <!-- Modal -->
  <div class="modal fade" id="performanceRating" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Performance Score</h4>
        </div>
        <div class="modal-body">
          <div class="important-ratings">
            <!-- {{ form }} -->
            <div class="performanceratingtable">
              <div  ng-repeat="(key,x) in form">
                <div class="primarytitle">
                  <span>{{ x.title }}</span>
                </div>
                <div  class="criteria" ng-repeat="(key1,x2) in x.criteria" ng-class="{ 'criteriaactive' : key1 == 0 }">
                  <ul>

                  <li>{{ x2.title }}:</li>
                  <li class="rating-value">
                    Poor
                    <input ng-if="status == 0" type="radio" ng-click="rating()" ng-model="x2.rating" value="1" ng-checked="x2.rating == 1" name="quality{{ key }}{{ key1 }}"  >
                    <img ng-if="status == 1 && x2.rating == 1" style="width:100%; max-width:20px; " src="<?php echo base_url(); ?>assets/dashboard/images/black-checkmark-png-4.png">

                  </li>
                  <li class="rating-value">
                    Fair
                    <input ng-if="status == 0" type="radio" ng-click="rating()" ng-model="x2.rating" value="2" ng-checked="x2.rating == 2" name="quality{{ key }}{{ key1 }}"  >
                    <img ng-if="status == 1 && x2.rating == 2" style="width:100%; max-width:20px; " src="<?php echo base_url(); ?>assets/dashboard/images/black-checkmark-png-4.png">

                  </li>
                  <li class="rating-value">
                    Satisfactory
                    <input ng-if="status == 0" type="radio" ng-click="rating()" ng-model="x2.rating" value="3" ng-checked="x2.rating == 3" name="quality{{ key }}{{ key1 }}"  >
                    <img ng-if="status == 1 && x2.rating == 3" style="width:100%; max-width:20px; " src="<?php echo base_url(); ?>assets/dashboard/images/black-checkmark-png-4.png">

                  </li>

                  <li class="rating-value">
                    Good
                    <input ng-if="status == 0" type="radio" ng-click="rating()" ng-model="x2.rating" value="4" ng-checked="x2.rating == 4" name="quality{{ key }}{{ key1 }}" >
                    <img ng-if="status == 1 && x2.rating == 4" style="width:100%; max-width:20px; " src="<?php echo base_url(); ?>assets/dashboard/images/black-checkmark-png-4.png">
                  </li>
                  <li class="rating-value">
                    Excellent
                    <input ng-if="status == 0" type="radio" ng-click="rating()" ng-model="x2.rating"   value="5" ng-checked="x2.rating == 5"  name="quality{{ key }}{{ key1 }}">
                    <img ng-if="status == 1 && x2.rating == 5" style="width:100%; max-width:20px; " src="<?php echo base_url(); ?>assets/dashboard/images/black-checkmark-png-4.png">

                  </li>
                  </ul>
                  <p ng-show="formrating && x2.rating == ''" class="text-danger">Please select rating.</p>

                <div class="criteria_desc">
                <p>{{ x2.description }}</p>
                </div>
                <div class="criteriaComment">
                    <label>Comment</label>
                    <textarea  ng-model="x2.comment" ng-value="x2.comment" class="form-control"></textarea>
                    <p ng-show="formrating && x2.comment == ''" class="text-danger">Please enter comment.</p>
                  </div>

      </div>
    </div>
  </div>

        </div>

        <div class="modal-footer">
          <button type="button" ng-if="status == 0" ng-click="ratingSubmit()" class="btn btn-success" >Submit</button>
        </div>
      </div>

    </div>
  <!-- rating popup -->
</div>
</div>
</div>
  </div>
  <!-- body -->
</div>
</section>
</div>
