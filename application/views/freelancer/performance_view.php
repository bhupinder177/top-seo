<?php

include('sidebar.php');
?>
<div id="wrapper" ng-cloak class="content-wrapper" ng-app="myApp96" ng-controller="myCtrt96">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Performance View</li>
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
                    <div class="col-md-3"><b>Employee: </b><span> {{ userdetail.name }}</span></div>
                    <div class="col-md-3"><b>Joining date</b>: <span> {{ userdetail.joiningdate }}</span></div>
                    <div class="col-md-3"><b>Review date</b>: {{ userdetail.date }}</span></div>
                  </div>

                  </div>
                  <div class="mainhrreview">
                    <div class="main-wrapper px-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="main-employee">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Department<span class="red-text">*</span></label>
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
                          <div class="main-employee">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Designation<span class="red-text">*</span></label>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <input disabled placeholder="Please enter designation" ng-model="jobTitle" ng-value="jobTitle" type="text" name="text" class="form-control">
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
                            <label>Review Period Start<span class="red-text">*</span></label>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="review-input">
                            <div class="form-group">
                              <input disabled placeholder="Please select review period start" readonly ng-model="reviewperiodstart" ng-value="reviewperiod" name="text" class="form-control reviewerstartdate">
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
                            <label>Review Period End<span class="red-text">*</span></label>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="review-input">
                            <div class="form-group">
                              <input disabled placeholder="Please select review period end" readonly ng-model="reviewperiodend" ng-value="reviewperiodend" name="text" class="form-control reviewerenddate">
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
          <div ng-if="reviewer.length != 0" ng-repeat="(key,x) in reviewer" class="reviewermain reviewermain_btm">
          <div class="main-wrapper px-3">
            <div class="row">
              <div class="col-md-12">
                <div class="review-period">
                  <label class="client_name" >{{ x.name }} Review</label>
                </div>
              </div>
              <!-- <div class="col-md-8">
                <div class="review-input">
                  <div class="form-group">
                    <input placeholder="Please enter reviewer name" readonly  ng-value="x.name" name="text" class="form-control">
                  </div>
                </div>
              </div> -->
                 <div ng-if="x.project" class="col-md-12">
                     <div class="row">
              <div class="col-md-2">
                <div class="review-period">
                  <label>Project</label>
                </div>
              </div>
              <div class="col-md-10">
                <div class="review-input">
                  <div class="form-group">
                    <input readonly placeholder="Please enter project"  ng-model="x.project" ng-value="x.project" name="text" class="form-control">
                  </div>
                </div>
              </div>
    </div>
    </div>
  </div>
  </div>

  <!-- comment -->
  <div class="main-wrapper px-3">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
      <div class="col-md-2">
        <div class="review-period">
          <label>Reviewer comment</label>
        </div>
      </div>
      <div class="col-md-10">
        <div class="review-input">
          <div class="form-group">
            <textarea readonly placeholder="Please enter comment" ng-model="x.review"  name="text" class="form-control"></textarea>
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
        <label>Reviewer form</label>
      </div>
    </div>
    <div class="col-md-8">
      <div class="review-input">
        <div class="form-group">
          <a target="_blank" href="<?php echo base_url(); ?>freelancer/performancePdf/{{ x.performance_reviewerid }}">Click here <i class="fa fa-download" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
    </div>
    </div>
</div>
</div>
</div>
  <!-- comment -->
          <!-- reviewer form -->

  <!-- body -->
</div>
</div>
</div>
  </div>
  <!-- body -->
</div>
</section>
</div>
