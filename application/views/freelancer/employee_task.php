<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <h1>Task</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Task</li>
      </ol>
    </section>


<section class="content">

  <div class="container1">

    <div class="no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp29" ng-controller="myCtrt29">
          <div id="content">
          <div id="content-header">



          </div>
        <div class="container-fluid">
      <div class="content-box no-border-radius">
            <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">

             					 <h3 class="box-title">Task</h3>

             				 </div>

             				 <div class="box-body">
                       <table  id="rankingTable" class="table  table-bordered">

            						 <thead>

            							 <tr>
                             <th>S. No.</th>
            								 <th>Task</th>
                             <th>Hour</th>
                             <th>Status</th>



            							 </tr>

            						 </thead>

            						 <tbody>


            								 <tr ng-if="task.length != 0" ng-repeat="(key,x) in task" >
                              <td>#</td>
            									 <td>{{ x.task }}</td>

            									  <td>{{ x.hours }}</td>
                                <td>
                                  <select id="taskstatus" onchange="angular.element(this).scope().taskStatusChange(this)"  ng-model="x.status">
                                    <option data-id="{{ x.taskId }}" value="0">Yet to Start</option>
                                    <option data-id="{{ x.taskId }}" value="1">In progress</option>
                                    <option data-id="{{ x.taskId }}" value="2">Hold</option>
                                    <option data-id="{{ x.taskId }}" value="3">Completed</option>
                                  </select>
                                </td>

            								 </tr>
            								 <tr ng-if="task.length == 0"><td colspan="2">No Record Found.</td></tr>

            						 </tbody>

            					 </table>
            					 <div  id="pagination"></div>


                      </div>
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
