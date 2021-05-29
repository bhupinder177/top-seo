<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">Project - P & L</li>
      </ol>
    </section>

<section class="content">
  <div class="container1">
    <div class=" no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp33" ng-controller="myCtrt33">
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
                                     <th>Project Name</th>
                                     <th>Project Hours</th>
                                     <th>Hourly Rate</th>
                                     <th>Time Spent</th>
                                     <th>P & L</th>
                      							 </tr>
                      						 </thead>
                      						 <tbody>

                      								 <tr ng-if="project.length != 0" ng-repeat="(key,x) in project">
                                                            <td>#</td>
                      									 <td><a  href="<?php echo base_url(); ?>roi-detail/{{ x.projectId }}/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">{{ x.projectName }}</a></td>
                      									  <td><a  href="<?php echo base_url(); ?>roi-detail/{{ x.projectId }}/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">{{ x.totalHour }}</a></td>
                                        	<td><a  href="<?php echo base_url(); ?>roi-detail/{{ x.projectId }}/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">{{ x.hourlyPrice }}</a></td>
                                          <td><a  href="<?php echo base_url(); ?>roi-detail/{{ x.projectId }}/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">{{ x.spenttime }}</a></td>
                                          <td ng-style="{ 'color': (x.hourlyPrice * (x.totalHour - x.spenttime)) > 0 ? 'green': 'red' } ">{{ x.hourlyPrice * (x.totalHour - x.spenttime) | number : 2 }}</td>

                      									</tr>
                      								 <tr ng-if="project.length == 0"><td colspan="8" class="text-center">No Record Found.</td></tr>
                      						 </tbody>
                      					 </table>
                                 </div>
                      					 <div  id="pagination"></div>

                                 <!-- detail -->
                                 <div id="Projectdetail" class="modal fade" role="dialog">
                                   <div class="modal-dialog riodetail">
                                     <!-- Modal content-->
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <h4 class="modal-title">Employee Wise ROI</h4>
                                       </div>
                                       <div class="modal-body">
                                         <table class="roiemplyee" width="100%">
                                           <tr>
                                           <th>Name</th>
                                           <th>Emp. Hrly Rate</th>
                                           <th>Proj. Hrly Rate</th>
                                           <th>Man Hrs</th>
                                           <th>Emp Expense</th>
                                           <th>Emp. Earned</th>
                                           <th>ROI</th>
                                           </tr>
                                           <tr ng-repeat="(key,x) in employee">
                                             <td>{{ x.name }}</td>
                                             <td>{{ x.maxPrice }}</td>
                                             <td>{{ hourly }}</td>
                                             <td>{{ x.time }}</td>
                                             <td>{{ x.time * x.maxPrice }}</td>
                                             <td>{{ x.time * hourly }}</td>
                                            <td ng-style="{ 'color': ((hourly * x.time) - (x.maxPrice * x.time)) > 0 ? 'green': 'red' } "> {{ (hourly * x.time) - (x.maxPrice * x.time) | number }}</td>
                                          </tr>
                                         </table>
                                       </div>
                                       <div class="modal-footer">
                                       </div>
                                     </div>

                                   </div>
                                 </div>
                               </div>
                                 <!-- detail -->
                                </div>
                                </div>
                              </div>
                             </div>
                           </div>
                          </div>
                       </section>
                      </div>
