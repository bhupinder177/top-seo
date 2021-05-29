
  <?php include('sidebar.php');?>

    <div id="wrapper" class="content-wrapper">
      <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
          <li class="active">Manage Work Hours</li>
        </ol>
      </section>
  <section class="content work-sc">
      <div class="no-margin user-dashboard-container">
          <div ng-cloak  ng-app="myApp25" ng-controller="myCtrt25">
          	<div id="content">
                <div class="c-pass-sec bg-white">
                    <div class="row">

                       <!-- break -->
                    <div class="col-md-6">
                      <div class="scheduling-work">
                        <div>
                          <a  hand="" id="plusicon" class="d-block ng-scope">Add Additional Task <i ng-click="addbreak(key)" class="fa fa-fw fa-plus-square"></i></a>
                        </div>
                     <div class="row" ng-repeat="(key,x) in breaks">
                       <div class="include-salary"> Task {{ key + 1 }} (include in salary <input id="{{ key }}"  ng-click="changesalaryoption($event)" ng-checked="x.includeSalary == 1" ng-model="x.includeSalary" ng-value="x.includeSalary" type="checkbox" name="include"> )</div>

                       <div class="col-md-4 form">
                      <div class="form-group ">
                      <input   placeholder="Please enter additional task name"  ng-model="x.name" ng-value="x.name" type="text" class="form-control hrs ">
                      <p ng-show="submitb && x.name == ''" class="text-danger">Please enter name.</p>
                      </div>
                    </div>
                       <div class="col-md-3 form">
                      <div class="form-group ">
                      <input   placeholder="HH" numbers-only="numbers-only" ng-keyup="checkhours()" ng-model="x.hh" ng-value="x.hh" type="text" class="form-control hrs ">
                      <!-- <p ng-show="submitb && x.hh" class="text-danger">Please enter name.</p> -->
                      </div>
                    </div>
                       <div class="col-md-3 form">
                      <div class="form-group">
                      <input  placeholder="MM" numbers-only="numbers-only" ng-keyup="checkminut()"  ng-model="x.mm" ng-value="x.mm" type="text" class="numberonly form-control hrs">
                      <p ng-show="submitb && x.mm == '' && x.hh == ''" class="text-danger">This is required.</p>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <a ng-if="key != 0" hand="" id="plusicon" class="pull-right ng-scope">  <i ng-click="deletebreak(key,key2)" class="fa fa-fw fa-trash"></i></a>

                    </div>

                  </div>





                   <div class="col-md-8 col-sm-12 cst-btn">
                                <div class="form-group">
                          <label class="blank-label"></label>
                        <input ng-click="saveBreak()" type="button" name="save" value="Save" class="btn btn-success">
                      </div>
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
                          <input ng-keyup="totalHours()" placeholder="00:00" ng-model="workinghours" ng-value="workinghours" type="text" class="form-control">
                          <p ng-show="submitw && workinghours == ''" class="text-danger">Working Hour is required.</p>
                          <p ng-show="submitw && workinghours != '' && workinghourserror == 1 " class="text-danger">Please enter valid time format.</p>


                          </div>
                          <div class="form-group">
                           <label>Working Days(Per Month)</label>
                           <input placeholder="Please enter working days" ng-keyup="totalHours()" numbers-only="numbers-only" ng-model="workingdays" ng-value="workingdays" type="text" class="form-control">
                           <p ng-show="submitw && workingdays == ''" class="text-danger">Working Days are required.</p>

                           </div>
                           <div class="form-group">
                            <label>Total Working Hrs(Per Month)</label>
                            <input placeholder="total hours" readonly numbers-only="numbers-only" ng-model="total" ng-value="total" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                              <input type="button" ng-click="saveworking()" name="save" value="Save" class="btn btn-success">
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
                              <p ng-show="submitr && days == ''" class="text-danger">Days are required.</p>

                            </div>
                   <div  class="form-group">
                    <input  ng-click="saveResignation()" type="button" name="save" value="Save" class="btn btn-success">
                    </div>
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
