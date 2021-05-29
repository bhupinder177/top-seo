<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
        <li class="active">Project details</li>
      </ol>
    </section>


<section class="content portfolio-cont project">

  <div class="container1">

    <div class="no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp30" ng-controller="myCtrt30">
          <div id="content">
          <div id="content-header">



          </div>
      <div class="row">
                  <div class="col-md-12">
                    <div class="box">
        		 <div class="box-body">
                       <div class="row">
                       <div class="col-sm-4">
                       <p><b>Project Name :</b> {{ project.projectName }}</p>
                       <p><b>Hourly Price :</b> {{ project.code }} {{ project.symbol }}{{ project.hourlyPrice  }}</p>
                       <p><b>Total Hours :</b> {{ project.totalHour   }}</p>
                       </div>
                        <div class="col-sm-4">
                       <p><b>Budget :</b> {{ project.code }} {{ project.symbol }} {{ project.budget     }}</p>
                       <p><b>Client Name :</b> {{ project.clientName      }}</p>
                       <p><b>Email :</b> {{ project.email }} </p>
                       </div>
                      <div class="col-sm-4">
                       <p><b>Phone :</b> {{project.countrycode}}{{ project.phone }} </p>
                       <p ng-if="project.skype"><b>Skype :</b> {{ project.skype }} </p>
                       <p ng-if="project.contactPerson"><b>Contact Person :</b> {{ project.contactPerson  }} </p>
                      </div>
                 </div>


                    </div>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead>
                    <tr>
                      <th>Milestone</th>
                      <th>Task Name</th>
                      <th>Hours</th>
                      <th>Status</th>


                    </tr>
                  </thead>
                    <tbody ng-repeat="(key,x) in project.milestone"  >
                      <tr  ng-repeat="(key2,x2) in x.task">
                        <td> <span ng-if="$index == 0">{{ x.name }}</span></td>
                        <td><span ng-if="!x2.edit">{{ x2.name  }}</span>
                          <input ng-if="x2.edit == 1" type="text" ng-value="x2.name" ng-keyup="taskUpdate($event.target.value,x2.id)" ng-model="x2.name">
                        </td>
                        <td>({{ x2.hours  }}) {{ x2.time }} </td>
                        <td >
                          <span  ng-if="x2.status == 1">Done</span>
                          <span  ng-if="x2.status == 2">Pending</span>
                          <span  ng-if="x2.status == 3">Confirmed</span>
                          <span  ng-if="x2.status == 4">PostPone</span>
                          <span  ng-if="x2.status == 5">Started</span>
                          <span  ng-if="x2.status == 6">End</span>
                          <span  ng-if="x2.status == 7">Paused</span>
                        </td>

                      </tr>

                    </tbody>
                    <tr>
                      <td></td>
                      <td>Total:</td>
                      <td>({{ project.totalHour }}) {{ project.tracked }}</td>
                    </tr>
                  </table>

                </div>
              </div>



                </div>

           </div>
          </div>
          </div>
       </section>
      </div>
