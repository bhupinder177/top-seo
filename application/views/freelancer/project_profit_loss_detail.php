<?php

include('sidebar.php');
?>


  <div ng-cloak  ng-app="myApp87" ng-controller="myCtrt87" id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">{{ project.projectName }}</li>
      </ol>
    </section>

<section class="content">
  <div class="container1">
    <div class=" no-margin user-dashboard-container">
        <div >
          <div id="content">
      <div class="content-box no-border-radius">
                    <div class="box">
                      <div class="box-header pt-2 pl-2">
             				 </div>
             				 <div class="box-body">
                                    <div class="table-responsive">
                      					 <table class="table">
                      						 <thead>
                      							 <tr>
                                       <th>S. No.</th>
                                     <th>Task Title</th>
                                     <th>Task Total Hours</th>
                                     <th>Task Hourly Rate</th>
                                     <th>Employee Name</th>
                                     <th>Time Spent</th>
                                     <th>PL Analysis</th>
                      							 </tr>
                      						 </thead>
                      						 <tbody>

                      								 <tr ng-if="tasks.length != 0" ng-repeat="(key,x) in tasks">
                                          <td>{{ start + key }}</td>
                      									 <td>
                                           <span ng-if="x.task">{{ x.task }}</span>
                                           <span ng-if="x.task1">{{ x.task1 }}</span>
                                           </td>
                      									  <td>
                                            <span ng-if="x.hours">{{ x.hours }}</span>
                                            <span ng-if="x.hours1">{{ x.hours1 }}</span>
                                          </td>
                                        	<td>{{ x.hourlyPrice }}</td>
                                        	<td>
                                            <span ng-if="x.empname">{{ x.empname }}</span>
                                            <span ng-if="x.empname1">{{ x.empname1 }}</span>
                                            </td>
                                          <td>
                                            <span ng-if="x.time">{{ x.time }}</span>
                                            <span ng-if="x.time1">{{ x.time1 }}</span>
                                          </td>
                                          <td>
                                            <span ng-if="x.hours" ng-style="{ 'color': (x.hourlyPrice * (x.hours - x.time)) > 0 ? 'green': 'red' } ">{{ x.hourlyPrice * (x.hours - x.time) | number : 2 }}</span>
                                            <span ng-if="x.hours1" ng-style="{ 'color': (x.hourlyPrice * (x.hours1 - x.time1)) > 0 ? 'green': 'red' } ">{{ x.hourlyPrice * (x.hours1 - x.time1) | number : 2 }}</span>
                                          </td>
                      									</tr>
                      								 <tr ng-if="tasks.length == 0"><td colspan="8" class="text-center">No Record Found.</td></tr>
                      						 </tbody>
                      					 </table>
                                 </div>
                      					 <div  id="pagination"></div>


                                </div>
                                </div>
                              </div>
                             </div>
                           </div>
                          </div>
                       </section>
                      </div>
