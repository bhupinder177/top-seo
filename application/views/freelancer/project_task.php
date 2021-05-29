<?php

include('sidebar.php');
?>


<div id="wrapper" class="content-wrapper project-video">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Project</li>
    </ol>
  </section>


  <section class="content">
    <div ng-cloak ng-app="myApp32" ng-controller="myCtrt32">
      <div id="content">
        <div class="btn-group">
          <button type="button" class="btn btn-primary break-toggle dropdown-toggle" data-toggle="dropdown">
            Break <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
              <li><a ng-click="startBreak(2)">Breakfast</a></li>
              <li><a ng-click="stopBreak(2,'breakfast break')">Breakfast End's</a></li>
              <li><a ng-click="startBreak(3)">Tea</a></li>
              <li><a ng-click="stopBreak(3,'Tea break')">Tea End's</a></li>
              <li><a ng-click="startBreak(4)">Lunch</a></li>
              <li><a ng-click="stopBreak(4,'Lunch break')">Lunch End's</a></li>
              <li><a ng-click="startBreak(5)">Dinner</a></li>
              <li><a ng-click="stopBreak(5,'Dinner break')">Dinner End's</a></li>
              <!-- <li><a ng-click="startBreak()">Break</a></li>
              <li><a ng-click="stopBreak()">Break End's</a></li> -->
            </ul>
          </div>

          <div class="box" ng-if="project.length != 0" ng-repeat="(key1,proj) in project">
            <div class="box-header with-border">

              <h3 class="box-title"><b> {{ proj.projectName }}</b></h3>

            </div>

            <div class="box-body">
              <table id="rankingTable" class="projecttask table  table-bordered">
                  <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Task Name</th>
                  <th>Hour</th>
                  <th>Task Time</th>
                  <th>Timer</th>
                  <th>Status</th>
                  <th>View</th>
                </tr>
              </thead>
                <tbody>
                  <tr ng-if="proj.task.length != 0" ng-repeat="(key,x) in proj.task">
                    <td>{{ start + $index }}</td>
                    <td>{{ x.task }}</td>
                    <td>{{ x.hours }}</td>
                    <td>{{ x.time }}</td>
                    <td>
                      <button ng-show="x.showbutton == 1" ng-disabled="x.disable == 0 || proj.status != 1 || x.status != 1" ng-click="startTime(key1,key,proj.projectId,x.taskId)" class="btn btn-success">Start Timer</button>
                      <button ng-if="x.showbutton == 2">{{ minutes }}:{{ seconds }}</button>
                      <button ng-show="x.showbutton == 2" ng-disabled="x.disable == 0" ng-click="stoptimer(key1,key,proj.projectId,x.taskId)" class="btn btn-danger">Stop Timer</button>
                    </td>

                    <td>
                      <p ng-if="proj.status == 0">Yet To Start</p>
                      <select onchange="angular.element(this).scope().taskStatusChange(this)" ng-model="x.status" ng-if="proj.status == 1">
                        <option value="0">Select Status</option>
                        <option data-id="{{ x.taskId }}" value="1">In progress</option>
                        <option data-id="{{ x.taskId }}" value="2">Hold</option>
                        <option data-id="{{ x.taskId }}" value="3">Completed</option>

                      </select>

                    </td>

                    <td>
                      <a target="_blank" href="<?php echo base_url(); ?>freelancer/my-projects/detail/{{ x.taskId }}" class="btn btn-success">View</a>
                    </td>


                  </tr>
                  <tr ng-if="project.length == 0">
                    <td colspan="2">No Record Found.</td>
                  </tr>

                </tbody>

              </table>


            </div>
          </div>
          <div id="pagination"></div>



        </div>
      </div>

    </section>

  </div>
