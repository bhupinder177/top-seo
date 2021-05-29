<?php

include('sidebar.php');
?>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>Project Edit</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Project Edit</li>
      </ol>
    </section>


<section class="content portfolio-cont">
  <div class=" no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp48" ng-controller="myCtrt48">
          <div id="content">

  <!-- Main content -->

                <div class="row">
                  <div class="col-md-12">
                    <div class="box content-box clearfix">
                        <div class="col-sm-6">
                  <div class="form-group">
                    <label>Project Name</label>
                    <input type="text" ng-model="projectname" ng-value="projectname" class="form-control">
                    <p ng-show="submitp && projectname == ''" class="text-danger">Project name is required.</p>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="state">Currency<span class="red-text">*</span></label>
                    <select  id="currency" class="form-control" ng-model="currency">
                      <option value="">Select Currency</option>
                      <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                    </select>
                    <p ng-cloak ng-show="submitp && currency == ''" class="text-danger">Please select currency.</p>
                  </div>
                </div>

                 <div class="col-sm-3">
                  <div class="form-group">
                    <label>Hourly Price</label>
                    <input ng-keyup="totalbuget()" numbers-only="numbers-only" type="text" ng-model="hourlyprice" ng-value="hourlyprice" class="form-control">
                    <p ng-show="submitp && hourlyprice == ''" class="text-danger">Hourly price is required.</p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>No of Hours</label>
                    <input ng-keyup="totalbuget()" numbers-only="numbers-only" type="text" ng-model="totalhour" ng-value="totalhour" class="form-control">
                    <p ng-show="submitp && totalhour == ''" class="text-danger">No of hours is required.</p>
                 </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Budget</label>
                    <input readonly numbers-only="numbers-only" id="budget" type="text" ng-model="budget" ng-value="budget" class="form-control">
                    <p ng-show="submitp && budget == ''" class="text-danger">Buget is required.</p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Project Csv</label>
                    <input onchange="angular.element(this).scope().csvdataexport(this)" type="file"  id="csv" ng-model="csv" ng-value="csv" class="form-control">
                    <p ng-show="submitp && csv == ''" class="text-danger">Csv is required.</p>
                    <a href="<?php echo base_url(); ?>assets/workhourcsv/sample_mileston_format.csv">Download Milestone Format (CSV)</a>
                    </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group assigntag ">
                    <label>Project Document</label>
                    <input type="file" onchange="angular.element(this).scope().documentUpload(this)" id="document"  class="form-control">
                     <ul  if-ng="document.length != 0" >
                       <li hand ng-repeat="(keyu,x) in document" value="{{ u.id }}">{{ x }}</li>

                    </ul>
                  </div>
                </div>
                        <div class="col-md-12 text-center"> <input ng-click="addDocument()" class="btn btn-success" type="button" name="add" value="Add"></div>
                      </div> </div>



                <div class="col-sm-12">
                      <div class="box content-box clearfix">
                  <div class="form-group">
                    <label>Client Detail</label>
                  </div>


                <div class="col-sm-6">
                   <div class="form-group">
                    <label>Project Source</label>
                    <input type="text" ng-model="projectsource" ng-value="projectsource" class="form-control">
                    <p ng-show="submitp && projectsource == ''" class="text-danger">Project sourec is required.</p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Client Name</label>
                    <input type="text" ng-model="clientname" ng-value="clientname" class="form-control">
                    <p ng-show="submitp && clientname == ''" class="text-danger">Client name is required.</p>
                  </div>
                </div>


                <div class="col-sm-6">
               <div class="form-group">
                    <label>Email</label>
                    <input onkeyup="angular.element(this).scope().ctrl(this)" id="email" type="text" ng-model="email" ng-value="email" class="form-control">
                    <p ng-show="submitp && email == ''" class="text-danger">Email is required.</p>
                    <p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>
                   </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label>Phone</label>
                    <input numbers-only="numbers-only" type="text" ng-model="phone" ng-value="phone" class="form-control">
                    <!-- <p ng-show="submitp && phone == ''" class="text-danger">Phone is required.</p> -->
                    </div>
                </div>

                <div class="col-sm-6">
               <div class="form-group">
                    <label>Skype</label>
                    <input type="text" ng-model="skype" ng-value="skype" class="form-control">
                    <p ng-show="submitp && skype == ''" class="text-danger">Skype is required.</p>
                 </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                  <label>Contact Person</label>
                  <input type="text" ng-model="contactperson" ng-value="contactperson" class="form-control">
                  <p ng-show="submitp && contactperson == ''" class="text-danger">Contact person is required.</p>
                   </div>
              </div>
</div>    </div>


                <div class="col-sm-12">
                     <div class="box content-box clearfix">
                        <div class="form-group">
                          <label>Project Detail</label>
                        </div>

              <div class="col-sm-6">
               <div class="form-group">
                  <label>Project Manager</label>
                  <select  ng-model="projectmanager" class="form-control">
                    <option value="" >Select Project Manager</option>
                    <option ng-repeat="(key,x) in allprojectmanager" value="{{ x.u_id }}" >{{ x.name }}</option>
                  </select>
                  <p ng-show="submitp && projectmanager == ''" class="text-danger">Project manager is required.</p>
               </div>
              </div>


                  <!-- milestone -->

                  <div class="col-md-12" style="margin: 10px 0">
                   <div class="mile-sec"> <a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                <div  style="margin-bottom:5px;" class="form-inline milestone" ng-repeat="(key,x) in milestones">
                  <div  class="form-group">
                    <label>M{{ key + 1  }}</label>
                    <input type="text" name='title{{$index}}' ng-required='true' class="form-control" ng-model="x.title" ng-value="x.title"  id="email" placeholder="Please enter milestone title" name="title">
                    <p ng-show="submitp && x.title == ''" class="text-danger">Title is required.</p>
                  </div>
                  <div  class="form-group">
                    <input type="text"   readonly  numbers-only="numbers-only" ng-model="x.hours" ng-value="x.hours" class="numberonly form-control" id="pwd" placeholder="Please enter hour" name="hour">
                    <p ng-show="submitp && x.hours == ''" class="text-danger">Hours is required.</p>
                    <a  ng-if="key != 0" hand id="plusicon" class="">  <i ng-click="deletemilestone(key)" class="fa fa-fw fa-trash"></i></a>

                  </div>



                       </div>
                    <div class="col-md-12" style="margin: 10px 0">
                      <a hand id="plusicon">Sub Tasks  <i ng-click="taskadd(key)" class="fa fa-fw fa-plus-square"></i> </a>
                    </div>

                  <div  ng-repeat="(key2,x2) in x.task"> 
                    <div class="col-md-12">
                      <div class="form-group" style="margin-bottom: 10px">
                        <label>S.T {{ key2+1 }}</label>
                        <input type="text"  id="title" placeholder="task" ng-model="x2.task" ng-value="x2.task"   class="form-control title required"  >
                        <p ng-show="submitp && x2.task == ''" class="text-danger">Task is required.</p>
                        <!-- &nbsp; <a hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a> -->
                      </div>
                      <div class="form-group" style="margin-bottom: 10px">
                        <input ng-keyup="counttotalhour()"  type="text" numbers-only="numbers-only"  id="title" placeholder="Please enter hours" ng-model="x2.hours" ng-value="x2.hours"   class="form-control title required"  >
                        <p ng-show="submitp && x2.hours == ''" class="text-danger">Hours is required.</p>
                        &nbsp; <a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fa fa-fw fa-trash"></i></a>

                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group" style="margin-bottom: 10px">
                        <label></label>
                        <textarea  id="title" placeholder="Please enter description" ng-model="x2.description" ng-value="x2.description"   class="form-control title required"  ></textarea>
                        <p ng-show="submitp && x2.description == ''" class="text-danger">Description is required.</p>
                        <!-- &nbsp; <a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fa fa-fw fa-trash"></i></a>  -->

                      </div>
                    </div>



                  </div>

                </div>

                <!-- milestone -->

                <div class="clearfix text-center">
                  <input class="btn btn-success" type="button" ng-click="updateproject()" value="submit" name="submit">
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
