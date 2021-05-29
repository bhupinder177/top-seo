<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">Employe roi</li>
      </ol>
    </section>

<section class="content">
  <div ng-cloak  ng-app="myApp35" ng-controller="myCtrt35">
                    <div class="box bg-white mb-3" ng-if="data.length != 0" ng-repeat="(key1,x) in data">
                      <div class="box-header with-border pt-2 pl-2">
             					 <h3 class="box-title"><b>{{ x.month }}, {{ x.y }}</b></h3>
             				 </div>
             				 <div class="box-body table-responsive">
                       <table  id="rankingTable" class="table">
                           <thead>
                        <tr>
                          <th>S.No</th>
                          <th class="text-left">Emp.Name</th>
                          <th class="text-center">Emp. Hrly Rate</th>
                          <th class="text-center">View</th>
                        </tr>
                        </thead>
                             <tbody>
      	   <tr ng-if="x.employee.length != 0" ng-repeat="(key,x2) in x.employee" >
                <td>#</td>
								 <td class="text-left">{{ x2.name }}</td>

								  <td class="text-center">{{ x2.perHour }}</td>
								  <!-- <td class="text-center">{{ (((+x2.salary) + (x.total / +x.employee.length)) /(+working.workingDays * +working.workingHour	)) | number }}</td> -->
                   <td class="text-center">
                   <a class="btn btn-success" ng-click="getdetail(x2.id,x.m,x.y)">View</a>
                    </td>
							 </tr>
							 <tr ng-if="x.employee.length == 0"><td colspan="4" class="text-center">No Record Found.</td></tr>
					 </tbody>
				 </table>

         <!-- detail -->
         <div id="detail" class="modal fade" role="dialog">
           <div class="modal-dialog riodetail">
             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Month Wise ROI</h4>
               </div>
               <div class="modal-body">

                 {{ project }}
                 <div class="box" >

                  <div class="box-body">
                    <table  id="rankingTable" class="projecttask table  table-bordered">
                      <thead>
                      <tr>
                      <th>S. No.</th>
                      <th>Task</th>
                      <th>Type</th>
                      <th>Earned</th>
                      <th>Task Done</th>

                      <th>ROI</th>
                      </tr>
                    </thead>
                  <tbody>
               <tr ng-if="detail.length != 0" ng-repeat="(key,x2) in detail" >
             <td>#</td>
              <td>{{ x2.name }}</td>
              <td>
                <span ng-if="x2.type == 1">Task</span>
                <span ng-if="x2.type == 2">Project</span>
                <span ng-if="x2.type == 3">Contract</span>
                <span ng-if="x2.type == 4">Gig</span>
              </td>
              <td><span ng-if="x2.type != 1">{{ x2.hours * x2.hourlyPrice | number : 2 }}</span></td>
              <td><span ng-if="x2.type != 1">{{ x2.htime * x2.employeeHourly | number : 2	 }}</span></td>
              <td ng-style="{ 'color': ((x2.hours * x2.hourlyPrice) - (x2.htime * x2.employeeHourly)) > 0 ? 'green': 'red' } "><span ng-if="x2.type != 1">{{ ((x2.hours * x2.hourlyPrice) - ( x2.htime * x2.employeeHourly)) | number : 2 }}</span></td>
              </tr>
        </tbody>

      </table>
    </div>
  </div>
               </div>
               <div class="modal-footer">
               </div>
             </div>
           </div>
         </div>
         <!-- detail -->

         <!-- <div id="detail" class="modal fade" role="dialog">
           <div class="modal-dialog riodetail">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Month Wise ROI</h4>
               </div>
               <div class="modal-body">
                 <div class="box">
                 <table class="roiemplyee" width="100%">
                   <thead>
                   <tr>
                   <th>S. No.</th>
                   <th>Task</th>
                   <th>Earned</th>
                   <th>Task Done</th>

                   <th>ROI</th>
                   </tr>
                 </thead>
                 </table>
                 </div>

                 <div class="box" ng-if="projects.length != 0" ng-repeat="(key1,x) in projects">
                   <div class="box-header with-border">

                    <h3 class="box-title"><b>{{ x.projectName }}</b></h3>

                  </div>

                  <div class="box-body">
                    <table  id="rankingTable" class="projecttask table  table-bordered">
                  <tbody>
               <tr ng-if="x.task.length != 0" ng-repeat="(key,x2) in x.task" >
             <td>#</td>
              <td>{{ x2.task }}</td>
              <td>{{ x2.hours * x.hourlyPrice }}</td>
              <td>{{ x2.time * x.employeeHourly	 }}</td>
              <td ng-style="{ 'color': ((x2.hours * x.hourlyPrice) - (x2.time * x.employeeHourly)) > 0 ? 'green': 'red' } ">{{ ((x2.hours * x.hourlyPrice) - (x2.time * x.employeeHourly)) }}</td>
              </tr>
        </tbody>

      </table>
    </div>
  </div>
               </div>
               <div class="modal-footer">
               </div>
             </div>
           </div>
         </div> -->


       </div>
                      </div>
                      <div ng-if="data.length == 0">No record found</div>
                </div>
     </section>
 </div>
