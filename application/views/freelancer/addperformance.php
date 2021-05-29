<?php

include('sidebar.php');
?>
<div id="wrapper"  class="content-wrapper" >
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Employee Evaluation</li>
    </ol>
  </section>
  <section class="content main-ratings" ng-cloak id="performanceData" ng-app="myApp63" ng-controller="myCtrt63">
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
                    <div class="col-md-3"><b>Last Review date</b>:<span ng-if="userdetail.lastreviewdate"> {{ userdetail.lastreviewdate }}</span><span ng-if="!userdetail.lastreviewdate">N-A</span></div>
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
                          <div class="row">
                            <div class="col-md-4">
                              <label>Date<span class="red-text">*</span></label>
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
                          <div class="row">
                            <div class="col-md-4">
                              <label>Reviewer<span class="red-text">*</span></label>
                            </div>
                            <div class="col-md-8">
                              <div class="employee-id">
                                <div class="form-group">

                                  <input type="text" placeholder="Please enter reviewer name" ng-keyup="employeekeyup()"  class="form-control reviwer" id="exampleFormControlSelect1">

                                  <div class="chosen-drop11">
               	                <ul ng-if="allreviwer.length != 0" class="chosen-results1" id="chosenresults11">
               			            <li  ng-repeat="(key,x) in allreviwer" ng-click="selectreviwer(key)" class="active-result" >{{ x.name }}</li>
                              </ul>
                              <ul ng-if="allreviwer.length == 0 && allreviwernorecord">
               			            <li  class="active-result" style="" >No record found</li>
                                 </ul>
               	                 </div>

                                  <div ng-if="selectedreviwer.length != 0" id="tags"><a ng-repeat="(key,x) in selectedreviwer"> {{ x.name }}<span hand ng-click="removeReviwer(key)" > &times; </span></a></div>
                                  <p ng-show="ssubmitforms && selectedreviwer.length == 0" class="text-danger">Please select reviewer.</p>

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
                                  <input readonly placeholder="Please enter designation" ng-model="jobTitle" ng-value="jobTitle" type="text" name="text" class="form-control">
                                  <p ng-show="ssubmitforms && jobTitle == ''" class="text-danger">Please enter designation.</p>
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
                              <input placeholder="Please select review period start" readonly ng-model="reviewperiodstart" ng-value="reviewperiod" name="text" class="form-control reviewerstartdate">
                              <p ng-show="ssubmitforms && reviewperiodstart == ''" class="text-danger">Please enter review period.</p>
                              <p ng-show="reviewperiodstart != '' && dateerror" class="text-danger">Please enter valid date.</p>
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
                              <input placeholder="Please select review period end" readonly ng-model="reviewperiodend" ng-value="reviewperiodend" name="text" class="form-control reviewerenddate">
                              <p ng-show="ssubmitforms && reviewperiodend == ''" class="text-danger">Please enter review period.</p>
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
               <label>HR Comment<span class="red-text">*</span></label>
             </div>
           </div>
           <div class="col-md-8">
             <div class="review-input">
               <div class="form-group">
                 <textarea placeholder="Please enter comment" ng-model="comment" ng-value="comment" name="text" class="form-control "></textarea>
                 <p ng-show="ssubmitforms && comment == ''" class="text-danger">Please enter comment.</p>
               </div>
             </div>
           </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="row">
      <div class="col-md-4">
        <div class="review-period">
          <label>HR Reviewer form</label>
        </div>
      </div>
      <div class="col-md-8">
        <div class="review-input">
          <div class="form-group">
            <a ng-click="showpopup()">Click here</a>
          </div>
          <p ng-show="ssubmitforms && overall == 0" class="text-danger">This is required.</p>
        </div>
      </div>
      </div>
      </div>

            </div>
            </div>

        </div>
<!-- score -->
<!-- rating popup -->
<div class="modal fade" id="performanceRating" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Performance Score</h4>
    </div>
    <div class="modal-body">
      <div class="important-ratings">
        <div class="performanceratingtable">
          <div  ng-repeat="(key,x) in forms">
            <div class="primarytitle">
              <span>{{ x.title }}</span>
            </div>
            <div  class="criteria" ng-repeat="(key1,x2) in x.criteria"  ng-class="{ 'criteriaactive' : key1 == 0 }">
              <ul>

              <li>{{ x2.title }}:</li>
                <li class="rating-value">
                  Poor
                  <input type="radio" ng-click="rating()" ng-model="x2.rating" value="1"  name="quality{{ key }}{{ key1 }}"  >
                </li>
                <li class="rating-value">
                  Fair
                  <input type="radio" ng-click="rating()" ng-model="x2.rating" value="2"  name="quality{{ key }}{{ key1 }}"  >
                </li>
                <li class="rating-value">
                  Satisfactory
                  <input type="radio" ng-click="rating()" ng-model="x2.rating" value="3"  name="quality{{ key }}{{ key1 }}"  >
                </li>

                <li class="rating-value">
                  Good
                  <input type="radio" ng-click="rating()" ng-model="x2.rating" value="4"  name="quality{{ key }}{{ key1 }}" >
                </li>
                <li class="rating-value">
                  Excellent
                  <input type="radio" ng-click="rating()" ng-model="x2.rating"   value="5"   name="quality{{ key }}{{ key1 }}">
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
      <button type="button"  ng-click="ratingSubmit()" class="btn btn-success" >Submit</button>
    </div>
  </div>

</div>
</div>
</div>
<!-- score -->

<!--employee ratings-->
  <div class="rating-wrapper p-3">
    <input type="button" ng-click="submit()" value="Submit" class="btn btn-success">
  </div>
  <!-- body -->
</div>
</div>
</div>
  </div>
  <!-- body -->
</div>
</section>
</div>
