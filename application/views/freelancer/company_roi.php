<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i>Home</a> ></li>
        <li class="active">Company - ROI</li>
      </ol>
    </section>


<section class="content">
  <div ng-cloak  ng-app="myApp34" ng-controller="myCtrt34">
                    <div class="box box-body bg-white">


             				 <div class="table-responsive">
                      					 <table  id="rankingTable" class="table table-condensed">
                      						 <thead>
                      							 <tr>
                                       <th>S. No.</th>
                                         <th>Month </th>
                                         <th>Earning</th>
                                       <th class="text-center">Expense</th>
                                       <th class="text-center">Salary</th>
                                       <th class="text-right">ROI</th>
                                       <!-- <th>Detail</th> -->
                      							 </tr>
                      						 </thead>

                      						 <tbody>

                      								 <tr ng-if="data.length != 0" ng-repeat="(key,x) in data">
                                        <td>{{ key + 1 }}</td>
                      									 <td>{{ x.month }}, {{ x.y }}</td>

                      									  <td>{{ x.earning }}</td>

                                        	<td class="text-center">{{  x.expense  }} </td>
                                        	<td class="text-center">{{  x.salary  }} </td>
                                        	<td class="text-right" ng-style="{ 'color': (+x.earning - ( +x.expense + +x.salary)) > 0 ? 'green': 'red' } ">{{ (+x.earning - ( +x.expense + +x.salary)) | number : 2  }} </td>

                      										<!-- <td>
                                            <a class="btn btn-success" ng-click="getprojectDetail(key,x.projectId)">Detail</a>
                                          </td> -->


                      								 </tr>
                      								 <tr ng-if="data.length == 0"><td colspan="2">No Record Found.</td></tr>

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
                                            <td></td>
                                            <td ng-style="{ 'color': ((hourly * x.time) - (x.maxPrice * x.time)) > 0 ? 'green': 'red' } "> {{ (hourly * x.time) - (x.maxPrice * x.time) }}</td>
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
</section>
</div>
