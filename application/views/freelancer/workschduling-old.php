
  <?php include('sidebar.php');?>

    <div id="wrapper" class="content-wrapper">
      <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a> > </li>
          <li class="active"> Staff Work Scheduling</li>
        </ol>
      </section>
  <section class="content work-sc">
      <div class="no-margin user-dashboard-container">
          <div ng-cloak  ng-app="myApp25" ng-controller="myCtrt25">
          	<div id="content">
                <div class="c-pass-sec bg-white">
                    <div class="row">

                       <!-- break -->
                    <div class="col-md-6 break">
                      <div class="scheduling-work">
                        <div class="row">

                            <div class="col-md-12">
                              <div class="break">
                        <h4>Break Time </h4>
                        </div>
                      <div class="form">
                        <label>Breakfast</label>

                      <div class="form-group row">
                          <div class="col-md-6">
                         <input numbers-only="numbers-only" ng-keyup="checkbreakhrs()" placeholder="Hrs"  ng-model="breakfasthr" ng-value="breakfasthr" type="text" class="form-control hrs ">
                          </div>
                        <div class="col-md-6">
                        <input numbers-only="numbers-only" ng-keyup="checkbreakmin()" placeholder="Min" ng-model="breakfastmin" ng-value="breakfastmin" type="text" class="form-control hrs ">
                          </div>
                      </div>
                    </div>

                     <div class="form">
                         <label>Lunch</label>
                      <div class="form-group row">
                          <div class="col-md-6">
                        <input numbers-only="numbers-only" ng-keyup="checklunchhr()" placeholder="Hrs" ng-model="lunchhr" ng-value="lunchhr" type="text" class="form-control hrs">
                          </div>
                          <div class="col-md-6">
                        <input numbers-only="numbers-only" ng-keyup="checklunchmin()" placeholder="Min" ng-model="lunchmin" ng-value="lunchmin" type="text" class="form-control hrs">
                      </div>
                      </div>
                    </div>
                         <div class="form">
                           <label>Tea Break</label>
                      <div class="form-group row">
                          <div class="col-md-6">
                        <input numbers-only="numbers-only" ng-keyup="checkteahrs()" placeholder="Hrs" ng-model="teahr" ng-value="teahr" type="text" class="form-control hrs">
                          </div>
                          <div class="col-md-6">
                        <input numbers-only="numbers-only" ng-keyup="checkteamin()" placeholder="Min" ng-model="teamin" ng-value="teamin" type="text" class="form-control hrs">
                      </div>
                      </div>
                    </div>
                        <div class="form">
                          <label>Dinner</label>
                      <div class="form-group row">
                          <div class="col-md-6">
                        <input numbers-only="numbers-only" ng-keyup="checkdinnerhrs()" placeholder="Hrs" ng-model="dinnerhr" ng-value="dinnerhr" type="text" class="form-control hrs">
                          </div>
                          <div class="col-md-6">
                        <input numbers-only="numbers-only" ng-keyup="checkdinnermin()" placeholder="Min" ng-model="dinnermin" ng-value="dinnermin" type="text" class="form-control hrs">
                          </div>
                      </div>
                    </div>
                                <div class="row">
                   <div class="col-md-8 col-sm-12 cst-btn">
                                <div class="form-group">
                          <label class="blank-label"></label>
                        <input ng-click="saveBreak()" type="button" name="save" value="Save" class="btn btn-success">
                      </div>
                                </div>
                                <div class="col-md-4 col-sm-12"></div>
                                    </div>
                        </div>
                            <!-- <div class="col-sm-6">
                           <h4>Leave</h4>
                        <div class="form-inline">
                       <div class="form-group">
                        <label>Full Day</label>
                        <input numbers-only="numbers-only" ng-model="fullhr" ng-value="fullhr" placeholder="Hr" type="text" class="form-control hrs">
                        <input numbers-only="numbers-only" ng-model="fullmin" ng-value="fullmin" placeholder="Min" type="text" class="form-control hrs">
                        </div>
                       </div>

                       <div class="form-inline">
                        <div class="form-group">
                         <label>Half Day</label>
                         <input numbers-only="numbers-only" ng-model="halfhr" ng-value="halfhr" placeholder="Hr" type="text" class="form-control hrs">
                         <input numbers-only="numbers-only" ng-model="halfmin" ng-value="halfmin" placeholder="Min" type="text" class="form-control hrs">
                         </div>
                       </div>

                       <div class="form-inline">
                         <div class="form-group">
                          <label>Short leave</label>
                          <input numbers-only="numbers-only" ng-model="shorthr" ng-value="shorthr" placeholder="Hr" type="text" class="form-control hrs">
                          <input numbers-only="numbers-only" ng-model="shortmin" ng-value="shortmin" placeholder="Min" type="text" class="form-control hrs">
                          </div>
                        </div>

                          <div class="form-group">
                                    <label class="blank-label"></label>
                            <input ng-click="saveleave()" type="button" name="save" value="Save" class="btn btn-success">
                          </div>
                    </div> -->

                            </div>
                            </div>
                        </div>
                  <!-- break -->

                      <!-- leave -->
                    <div class="col-md-6">

                      <div class="schedul-wrapp">
                        <div class="d-inline-block w-100">
                          <div class="break">
                          <h4>Working Hours</h4>
                        </div>
                         <div class="form-group">
                          <label>Working hours(Per Day)</label>
                          <input ng-keyup="totalHours()" placeholder="00:00" ng-model="workinghours" ng-value="workinghours"  ng-model="workinghours" ng-value="workinghours" type="text" class="form-control">
                          <p ng-show="submitw && workinghours == ''" class="text-danger">Working Hour is required.</p>
                          <p ng-show="submitw && workinghours != '' && workinghourserror == 1 " class="text-danger">Please enter valid time format.</p>
                          

                          </div>
                          <div class="form-group">
                           <label>Working Days(Per Month)</label>
                           <input placeholder="Please enter working days" ng-keyup="totalHours()" numbers-only="numbers-only" ng-model="workingdays" ng-value="workingdays" type="text" class="form-control">
                           <p ng-show="submitw && workingdays == ''" class="text-danger">Working Days is required.</p>

                           </div>
                           <div class="form-group">
                            <label>Total Working Hrs(Per Month)</label>
                            <input placeholder="total working hours" readonly numbers-only="numbers-only" ng-model="total" ng-value="total" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                              <input type="button" ng-click="saveworking()" name="save" value="Save" class="btn btn-success">
                            </div>
                        </div>
                        </div>
                        <hr>
                        <div class="d-block">
                          <div class="break">
                        <h4>Notice Period</h4>
                      </div>
                        <div class="form-group ">
                              <label>Days</label>
                              <input placeholder="Please enter notice period days" numbers-only="numbers-only" type="text" ng-model="days" ng-value="days" class="form-control  ">
                              <p ng-show="submitr && days == ''" class="text-danger">Days is required.</p>

                            </div>
                   <div  class="form-group">
                    <input  ng-click="saveResignation()" type="button" name="save" value="Save" class="btn btn-success">
                    </div>
                    </div>
                  </div>

                      <!-- working -->






                    <!-- Holidays -->
                    <!-- <div class="col-md-6">

                    <h4>Holidays <a><i ng-click="addholiday()" class="fa fa-fw fa-plus-square"></i></a></h4>

                        <div ng-if="holidayfields.length != 0" class="row" ng-repeat="(key,x) in holidayfields">
                          <div class="col-md-6">
                            <div class="form-group ">
                              <label>Holiday Title</label>
                              <input type="text" ng-model="x.title" ng-value="x.title" class="form-control  ">
                              <p ng-show="submith && x.title == ''" class="text-danger">Title is required.</p>

                            </div>
                          </div>
                       <div class="col-md-6">
                         <div class="form-group  ">
                           <label>Holiday Date</label>
                           <input data-datepicker="{theme: 'flat'}" type="text" ng-model="x.date" ng-value="x.date" class="form-control">
                           <p ng-show="submith && x.date == ''" class="text-danger">Date is required.</p>

                          </div>
                          <a ng-if="key != 0"  hand id="plusicon" class="pull-right"><i ng-click="deleteholiday(key)" class="fa fa-fw fa-trash"></i></a>

                       </div>
                    </div>

                  <div ng-show="holidayfields.length != 0" class="form-group">
                    <input ng-show="holidayfields.length != 0" ng-click="saveHoliday()" type="button" name="save" value="Save" class="btn btn-success">
                    </div>
                    </div> -->
                    <!-- Holidays -->

                    <!-- Resignation  -->
                    <!-- <div class="col-md-6">

                       <h4>Notice Period</h4>
                        <div class="form-group ">
                              <label>Days</label>
                              <input numbers-only="numbers-only" type="text" ng-model="days" ng-value="days" class="form-control  ">
                              <p ng-show="submitr && days == ''" class="text-danger">Days is required.</p>

                            </div>
                   <div  class="form-group">
                    <input  ng-click="saveResignation()" type="button" name="save" value="Save" class="btn btn-success">
                    </div>
                  </div> -->


          	</div>
                    </div>
                      </div>
                    <!-- Resignation  -->

          	</div>
                    </div>



                </div>
               </div>
             </div>
         </section>
        </div>
