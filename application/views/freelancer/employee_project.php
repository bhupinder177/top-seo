<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <h1>Project</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Project</li>
      </ol>
    </section>


<section class="content">

  <div class="container1">

    <div class="no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp31" ng-controller="myCtrt31">
          <div id="content">
          <div id="content-header">



          </div>
        <div class="container-fluid">
      <div class="content-box no-border-radius">
            <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">

             					 <h3 class="box-title">Project</h3>

             				 </div>

             				 <div class="box-body">
                       <table  id="rankingTable" class="table  table-bordered">

            						 <thead>

            							 <tr>
                             <th>S. No.</th>
            								 <th>Project Name</th>
                             <th>Hour</th>
                             <th>No Of Task</th>
                             <th>Status</th>
                             <th>View Detail</th>
                         		 </tr>
                           </thead>

            						 <tbody>
      	   <tr ng-if="project.length != 0" ng-repeat="(key,x) in project" >
                <td>#</td>
								 <td>{{ x.projectName }}</td>

								  <td>{{ x.thours }}</td>
                  <td>{{ x.ctask }}</td>
                  <td>

                    <a class="btn btn-primary" ng-if="x.status == 0">Yet to start</a>
                    <a class="btn btn-primary" ng-if="x.status == 1">In progress</a>
                    <a class="btn btn-primary" ng-if="x.status == 2">Hold</a>
                    <a class="btn btn-success" ng-if="x.status == 3">Completed</a>
                  </td>
                  <td>
                  <a href="<?php echo base_url(); ?>freelancer/employee_task" class="btn btn-success">View Detail</a>
                  </td>

							 </tr>
							 <tr ng-if="project.length == 0"><td colspan="2">No Record Found.</td></tr>

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
