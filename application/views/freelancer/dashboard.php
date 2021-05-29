<?php include ('sidebar.php');?>
<div id="wrapper" ng-cloak  ng-app="myApp86" ng-controller="myCtrt86">
   <?php if($this->session->userdata['clientloggedin']['type'] == 2 || $this->session->userdata['clientloggedin']['type'] == 3 && $this->session->userdata['clientloggedin']['access'] == 0 )
      {
        ?>
   <!-- ************************admin dashboard*******************************-->
   <div class="dash-board" >
      <div class="full-container">
        <div class="employer-section">
              <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <h4 class="h4-win PageHeading">Dashboard</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                <div class="DashboardSearch">
                  <div class="form-group">
                    <input readonly ng-model="startdate" placeholder="Please enter start date" type="text" name="start" class="form-control dashboardstartdate" >
                  </div>
                  <div class="form-group">
                    <input readonly ng-model="enddate" placeholder="Please enter end date" type="text" name="start" class="form-control dashboardenddate" >
                  </div>
                  <div class="form-group">
                    <input  type="button" ng-click="getdatewise()" name="submit" value="submit" class="btn btn-success" >
                  </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
         <div class="col-md-12">

            <!-- add -->
            <div class="full-container">
				<div class="employer-section">
					<div class="container">
						<div class="row">
							<div class="col-xl-12 float-left">
							   <div class="dashbord-wrapper">
								  <div class="dashbord-inner-wrap">
									 <div class="row">
										<div ng-click="clicktab('1')" class="col-md-6">
										   <div class="dashboard-wrap pt">
											  <div class="employer-box">
												 <div class="employer-img">
													<div class="inner-box">
													   <img src="<?php echo base_url(); ?>assets/dashboard/images/expensed.png">
													</div>
												 </div>
												 <div class="employer-num">
                         <h2>Expense</h2>
													<h1><span>{{ expense }}</span></h1>
												 </div>
											  </div>
										   </div>
										</div>
										<div ng-click="clicktab('2')" class="col-md-6">
										   <div class="attendance-wrap pt">
											  <div class="employer-box">
												 <div class="employer-img">
													<div class="inner-box">
													   <img src="<?php echo base_url(); ?>assets/dashboard/images/invoiced.png">
													</div>
												 </div>
												 <div class="employer-num">
                         <h2>Invoice</h2>
													<h1><span>{{ invoice }}</span></h1>
												 </div>
											  </div>
										   </div>
										</div>
									 </div>
								  </div>
								  <div class="increment-wrapper">
									 <div class="row">
										<div ng-click="clicktab('3')" class="col-md-6">
										   <div class="encrement-box pt">
											  <div class="employer-box">
												 <div class="employer-img">
													<div class="inner-box">
													   <img src="<?php echo base_url(); ?>assets/dashboard/images/incomed.png">
													</div>
												 </div>
												 <div class="employer-num">
                           <h2>Income</h2>
													<h1><span>{{ income }}</span></h1>
												 </div>
											  </div>
										   </div>
										</div>
										<div ng-click="clicktab('7')" class="col-md-6">
										   <div class="timesheet-box pt">
											  <div class="employer-box">
												 <div class="employer-img">
													<div class="inner-box">
													   <img src="<?php echo base_url(); ?>assets/dashboard/images/company-pl.png">
													</div>
												 </div>
												 <div class="employer-num">
                         <h2>Company P/L</h2>
													<h1><span>{{ totalpl }}</span></h1>
												 </div>
											  </div>
										   </div>
										</div>
									 </div>
									 <!-- <div ng-click="clicktab('4')" class="col-md-6">
										<div class="interview-box pt">
										   <div class="employer-heading">
										<h4>ROI</h4>
										</div>
										<div class="employer-box">
										<div class="employer-img">
										 <div class="inner-box">

											</div>
										</div>
										<div class="employer-num">
										  <h1><span>0</span></h1>
										</div>
										</div>
										</div>

										</div> -->
								  </div>
							   </div>
							   <!-- leaves html -->
							   <!-- <div class="leaves-wrapper">
								  <div class="row">
									<div ng-click="clicktab('5')" class="col-md-6">
									  <div class="leaves-box pt">
										<div class="employer-heading">
									  <h4>Employees</h4>
									</div>
									<div class="employer-box">
									<div class="employer-img">
										<div class="inner-box">

										  </div>
									  </div>
									  <div class="employer-num">
										<h1><span>0</span></h1>
									  </div>
									  </div>
									  </div>
									</div>
									 <div ng-click="clicktab('6')" class="col-md-6">
									  <div class="timesheet-box pt">
										<div class="employer-heading">
									  <h4>Employees</h4>
									</div>
									<div class="employer-box">
									<div class="employer-img">
									   <div class="inner-box">

										  </div>
									  </div>
									  <div class="employer-num">
										<h1><span>0</span></h1>
									  </div>
									  </div>
									  </div>
									</div>

								  </div>

								  </div> -->
							</div>
							<div class="col-xl-12 float-left">
                           <div class="graph-wrap">
                              <div style="display:none" class="dashboard-grap expensegrpah">
                                 <div id="chartContainerexpense" style="width: 100%;"></div>
                              </div>
                              <div class="dashboard-grap dashboardnograph">
                                 <div class="nograph">
                                    <div>No Data found. Please choose date & Click on any entity to see the complete record.</div>
                                 </div>
                              </div>
                              <div style="display:none" class="dashboard-grap invoicegrpah">
                                 <div id="chartContainerinvoice" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap incomegrpah">
                                 <div id="chartContainerincome" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap plgrpah">
                                 <div id="chartContainerpl" style="height:100%;width: 100%;"></div>
                              </div>
                           </div>
                        </div>
                        </div>

						<div class="row">
							<!-- latest review section -->
							<div class="col-lg-6 col-md-12">
							   <div class="Latest common-l bg-white wow bounceInRight  animated">
								  <div class="heading">
									 <div class="row">
										<div class="col-md-12">
										   <h4 class="h4-head">Latest Reviews</h4>
										</div>
									 </div>
								  </div>
								  <div class="latest-content p-3">
									 <?php
										if(!empty($reviewlatest))
										{

										  foreach($reviewlatest as $r)
										  {
											?>
									 <div class="lead-review mb-2 border-bottom pb-3">
										<div class="review">
										   <p>“
											  <?php echo $r->reviewOverall; ?>”
										   </p>
										</div>
										<div class="client-name d-flex"><span>
										   <?php if($r->name){ echo ucwords($r->name); }  ?></span>
										   <span class="d-flex ml-2">
										   </span>
										</div>
									 </div>
									 <?php } }
										else
										{
										 ?>
									 <p>No Review</p>
									 <?php } ?>
								  </div>
								  <?php
									 if(!empty($reviewlatest))
									  {
										?>
								  <div class="border-top text-right p-3">
									 <a target="_blank" href="<?php echo base_url(); ?>freelancer/reviews">View All</a>
								  </div>
								  <?php } ?>
							   </div>
							</div>
							<!-- latest review section -->
							<!-- task section -->
							<div class="col-lg-6 col-md-12">
							   <div class="Leaves common-l mt bg-white wow bounceInLeft animated" data-wow-delay=".1s" style="visibility:hidden">
								  <div class="heading">
									 <div class="row">
										<div class="col-md-12">
										   <h4 class="h4-head">Task</h4>
										</div>
									 </div>
								  </div>
								  <div class="table-responsive">
									 <table class="table">
										<thead>
										   <tr>
											  <th>Task Title</th>
											  <th style="">Assigned To</th>
											  <th style="">Start Date</th>
											  <th>End Date</th>
										   </tr>
										</thead>
										<tbody>
										   <?php if(!empty($task))
											  {
												foreach($task as $t)
												{
												?>
										   <tr class="<?php if($t->status == 1){ echo "taskdone"; } else if($t->status == 2){ echo "taskpending"; }  ?>">
											  <td>
												 <?php echo $t->name; ?>
											  </td>
											  <td>
												 <?php echo $t->assignedto; ?>
											  </td>
											  <td>
												 <?php echo $d = date("d M, Y",strtotime($t->startDate)); ?>
											  </td>
											  <td>
												 <?php echo $d = date("d M, Y",strtotime($t->dueDate)); ?>
											  </td>
										   </tr>
										   <?php } } else{ ?>
										   <tr>
											  <td colspan="4">No Task</td>
										   </tr>
										   <?php } ?>
										</tbody>
									 </table>
								  </div>
								  <?php if(!empty($task))
									 { ?>
								  <div class="border-top text-right p-3">
									 <a target="_blank" href="<?php echo base_url(); ?>freelancer/todo">View All</a>
								  </div>
								  <?php } ?>
							   </div>
							</div>
							<!-- task section -->
						</div>

						<div class="row">
							<!-- notification section -->
							<div class="col-lg-6 col-md-12">
							   <div class="Leaves common-l bg-white wow bounceInLeft animated" data-wow-delay=".1s" style="visibility:hidden">
								  <div class="heading mb-2">
									 <div class="row">
										<div class="col-md-12">
										   <h4 class="h4-head">Notifications</h4>
										</div>
									 </div>
								  </div>
								  <?php
									 if(!empty($notification))
									 {
									   foreach($notification as $n)
									   {
										?>
								  <div class="notification-content mx-2">
									 <ul class="un-style mb-0 list-unstyled d-flex">
										<!-- <li class="">
										   <div class="john-img">
											   <?php if($n->logo != '')
											  {
												?>
											   <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $n->logo; ?>">
											   <?php }
											  else
											  {
											  ?>
											   <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg">
											   <?php
											  }
											  ?>
										   </div>
										   </li> -->
										<li class="pl-2">
										   <div class="not-content">
											  <span>
											  <?php echo $newDate = date("d-m-Y", strtotime($n->notificationDate));  ?></span>
											  <p>
												 <?php echo $n->notificationMessage; ?>
											  </p>
										   </div>
										</li>
									 </ul>
								  </div>
								  <?php }
									 }
									 else
									 {
									 ?>
								  <div class="notification-content mx-2">
									 <p>No Notification  </p>
								  </div>
								  <?php
									 }
									 if(!empty($notification))
									 {
									 ?>
								  <div class="border-top text-right p-3">
									 <a target="_blank" href="<?php echo base_url(); ?>freelancer/notification">View All</a>
								  </div>
								  <?php } ?>
							   </div>
							</div>
							<!-- notification section -->
							<!-- latest members -->
							<?php
							   if($this->session->userdata['clientloggedin']['type'] == 2)
							   {
								 ?>
							<!-- team member -->
							<div class="col-lg-6 col-md-12">
							   <div class="box common-l scrollLatestEmployees wow bounceInRight  animated" >
								  <div class="heading">
									 <h3 class="h4-head">Latest Employees
									 </h3>
								  </div>
								  <div class="box-body no-padding">
									 <ul class="users-list clearfix">
										<?php if(!empty($team2))
										   {
											 foreach($team2 as $t)
											 {
										   ?>
										<li>
										   <?php if($t->logo != '')
											  {
												?>
										   <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $t->logo; ?>" class="user-image john-img" alt="">
										   <?php }
											  else{
												?>
										   <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg" class="user-image" alt="test">
										   <?php
											  }
											  ?>
										   <a class="users-list-name" href="#"><?php echo $t->name; ?></a>
										</li>
										<?php } }
										   else
										   {
											 echo "No Team member";
										   }
										   ?>
									 </ul>
								  </div>
							   </div>
							</div>
							<?php } ?>
							<!-- latest members -->
						</div>

					</div>
				</div>
            </div>
            <!-- add -->
         </div>
      </div>
   </div>
   <!-- ************************admin dashboard end*******************************-->
   <!-- ************************Hr dashboard Start*******************************-->
   <?php }
      else if($this->session->userdata['clientloggedin']['access'] == 5)
       {

      ?>
   <div class="dash-board projectmanagerdashboard HrDashboard">
		<div class="full-container">
			<div class="employer-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="h4-win PageHeading">Dashboard</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="DashboardSearch">
								<div class="form-group">
									<input readonly ng-model="hrstartdate" placeholder="Please enter start date" type="text" name="start" class="form-control dashboardstartdate" >
								</div>
								<div class="form-group">
									<input  type="button" ng-click="gethrdatewise()" name="submit" value="submit" class="btn btn-success" >
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
         <div class="col-md-12">

            <!-- add -->
            <div class="full-container">
				<div class="employer-section">
					<div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="dashbord-wrapper">
                     <div class="dashbord-inner-wrap">
                        <div class="row">
                           <div ng-click="clicktabhr('1')" class="col-md-3">
                              <div class="dashboard-wrap pt AquaColor">
                                 <div class="employer-box">
                                    <div class="employer-num">
										<h2>Employee</h2>
                                       <h1><span>{{ employee }}</span></h1>
									   <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m151 120c0-33.084-26.916-60-60-60s-60 26.916-60 60 26.916 60 60 60 60-26.916 60-60zm-60 30c-16.542 0-30-13.458-30-30s13.458-30 30-30 30 13.458 30 30-13.458 30-30 30z"></path><path d="m481 120c0-33.084-26.916-60-60-60s-60 26.916-60 60 26.916 60 60 60 60-26.916 60-60zm-60 30c-16.542 0-30-13.458-30-30s13.458-30 30-30 30 13.458 30 30-13.458 30-30 30z"></path><path d="m421 180c-27.713 0-52.536 12.594-69.059 32.355-16.379-36.706-53.219-62.355-95.941-62.355s-79.562 25.649-95.941 62.355c-16.523-19.761-41.346-32.355-69.059-32.355-49.915 0-91 40.422-91 90v75c0 8.284 6.716 15 15 15h16.407l13.666 138.473c.757 7.676 7.213 13.527 14.927 13.527h61c7.714 0 14.17-5.851 14.927-13.527l13.666-138.473h50.09l11.368 138.229c.639 7.782 7.141 13.771 14.949 13.771h60c7.808 0 14.31-5.989 14.949-13.771l11.369-138.229h50.089l13.665 138.473c.758 7.676 7.214 13.527 14.928 13.527h61c7.714 0 14.17-5.851 14.928-13.527l13.665-138.473h16.407c8.284 0 15-6.716 15-15v-75c0-49.519-41.033-90-91-90zm-285 150c-7.714 0-14.17 5.851-14.927 13.527l-13.666 138.473h-33.814l-13.666-138.473c-.757-7.676-7.213-13.527-14.927-13.527h-15v-60c0-33.084 27.364-60 61-60 33.084 0 60 26.916 60 60v60zm162.501 0c-7.808 0-14.31 5.989-14.949 13.771l-11.369 138.229h-32.366l-11.368-138.229c-.64-7.781-7.142-13.771-14.95-13.771h-32.499v-75c0-36.219 25.808-66.522 60-73.491v73.491c0 8.284 6.716 15 15 15s15-6.716 15-15v-73.491c34.192 6.968 60 37.271 60 73.491v75zm183.499 0h-15c-7.714 0-14.17 5.851-14.928 13.527l-13.665 138.473h-33.814l-13.665-138.473c-.758-7.676-7.214-13.527-14.928-13.527h-15v-60c0-33.084 26.916-60 60-60 33.636 0 61 26.916 61 60z"></path><path d="m331 75c0-41.355-33.645-75-75-75s-75 33.645-75 75 33.645 75 75 75 75-33.645 75-75zm-75 45c-24.813 0-45-20.187-45-45s20.187-45 45-45 45 20.187 45 45-20.187 45-45 45z"></path></g></svg>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div ng-click="clicktabhr('2')" class="col-md-3">
                              <div class="attendance-wrap pt VioletRedColor">
                                 <div class="employer-box">
                                    <div class="employer-num">
										<h2>Leaves</h2>
                                       <h1><span>{{ leaves }}</span></h1>
									   <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512.003 512.003" style="enable-background:new 0 0 512.003 512.003;" xml:space="preserve">
<g>
	<g>
		<g>
			<path d="M96.003,106.668c29.419,0,53.333-23.936,53.333-53.333S125.422,0.002,96.003,0.002
				c-29.419,0-53.333,23.936-53.333,53.333S66.585,106.668,96.003,106.668z M96.003,21.335c17.643,0,32,14.357,32,32
				c0,17.643-14.357,32-32,32c-17.643,0-32-14.357-32-32C64.003,35.692,78.361,21.335,96.003,21.335z"/>
			<path d="M177.646,179.82c-3.349-29.547-26.752-51.819-54.4-51.819H68.782c-27.648,0-51.051,22.272-54.4,51.819L0.238,303.724
				c-1.173,10.368,2.027,20.672,8.768,28.224c5.803,6.507,13.525,10.304,21.909,10.773l11.776,159.403
				c0.427,5.568,5.056,9.877,10.645,9.877h85.333c5.589,0,10.219-4.309,10.667-9.877l11.776-159.403
				c8.363-0.469,16.107-4.245,21.909-10.773c6.741-7.573,9.941-17.856,8.768-28.224L177.646,179.82z M167.086,317.74
				c-1.216,1.365-3.883,3.691-7.808,3.691h-8.107c-5.589,0-10.219,4.309-10.645,9.877l-11.776,159.36H63.257l-11.797-159.36
				c-0.427-5.568-5.056-9.877-10.645-9.877h-8.107c-3.904,0-6.571-2.325-7.808-3.691c-2.709-3.051-3.968-7.275-3.477-11.605
				l14.144-123.904c2.133-18.752,16.405-32.896,33.195-32.896h54.464c16.789,0,31.061,14.144,33.195,32.896l14.144,123.904
				C171.076,310.466,169.795,314.69,167.086,317.74z"/>
			<path d="M352.003,234.668c-5.888,0-10.667,4.779-10.667,10.667v42.667c0,5.888,4.779,10.667,10.667,10.667
				c5.888,0,10.667-4.779,10.667-10.667v-42.667C362.67,239.447,357.891,234.668,352.003,234.668z"/>
			<path d="M465.945,0.002H245.337c-17.643,0-32,14.357-32,32v384c0,17.643,14.357,32,32,32h53.333v17.941
				c0,25.387,20.672,46.059,46.059,46.059c6.293,0,12.395-1.259,18.155-3.712l121.195-51.947
				c16.96-7.275,27.925-23.893,27.925-42.347V46.06C512.003,20.674,491.331,0.002,465.945,0.002z M298.67,98.007v328.661h-53.333
				c-5.867,0-10.667-4.779-10.667-10.667v-384c0-5.888,4.8-10.667,10.667-10.667h161.344L326.595,55.66
				C309.635,62.935,298.67,79.554,298.67,98.007z M490.67,413.996c0,9.899-5.888,18.837-14.997,22.72l-121.195,51.947
				c-3.072,1.323-6.379,2.005-9.749,2.005c-13.632,0-24.725-11.093-24.725-24.725V98.007c0-9.899,5.888-18.837,14.997-22.72
				L456.195,23.34c3.072-1.323,6.379-2.005,9.749-2.005c13.632,0,24.725,11.093,24.725,24.725V413.996z"/>
		</g>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                                    </div>
                                 </div>
                              </div>
                           </div>

						    <div ng-click="clicktabhr('')" class="col-md-3">
                              <div class="attendance-wrap pt JupiterColor">
                                 <div class="employer-box">
                                    <div class="employer-num">
										<h2>Increment</h2>
                                       <h1><span>{{ Increment }}</span></h1>
									   <svg id="Layer_5" enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m40.866 15.423c-.526-.747-1.117-1.459-1.756-2.116l-1.435 1.394c.566.583 1.089 1.213 1.556 1.875z"/><path d="m9.202 23.323-.335 2.677h2.329l-3.196 5.113-3.196-5.113h2.101l.245-2.444c1-10.009 9.34-17.556 19.398-17.556 5.204 0 10.099 2.027 13.784 5.708l1.413-1.415c-4.062-4.058-9.459-6.293-15.197-6.293-11.09 0-20.285 8.322-21.389 19.357l-.064.643h-3.899l6.804 10.887 6.804-10.887h-3.671l.053-.429c.967-7.737 7.577-13.571 15.374-13.571 3.211 0 6.294.976 8.916 2.822l1.151-1.635c-2.96-2.085-6.441-3.187-10.067-3.187-8.804 0-16.267 6.587-17.358 15.323z"/><path d="m6 61h2v2h-2z"/><path d="m6 57h2v2h-2z"/><path d="m2.234 49h3.766v6h2v-8h-2.234l4.234-7.057 4.234 7.057h-2.234v12h2v-10h3.766l-7.766-12.943z"/><path d="m19.234 32h3.766v23h2v-25h-2.234l4.234-7.056 4.234 7.056h-2.234v21h2v-19h3.766l-7.766-12.944z"/><path d="m29 53h2v2h-2z"/><path d="m29 57h2v2h-2z"/><path d="m55.223 15.782c2.263-1.415 3.777-3.922 3.777-6.782 0-4.411-3.589-8-8-8s-8 3.589-8 8c0 2.86 1.514 5.367 3.777 6.782-4.536 1.714-7.777 6.089-7.777 11.218v8c0 2.206 1.794 4 4 4h1v20c0 2.206 1.794 4 4 4 1.2 0 2.266-.542 3-1.382.734.84 1.8 1.382 3 1.382 2.206 0 4-1.794 4-4v-20h1c2.206 0 4-1.794 4-4v-8c0-5.129-3.241-9.504-7.777-11.218zm-10.223-6.782c0-3.309 2.691-6 6-6s6 2.691 6 6-2.691 6-6 6-6-2.691-6-6zm8.966 8.449c-.17 1.992-1.427 3.551-2.966 3.551-1.534 0-2.789-1.55-2.961-3.552.936-.291 1.93-.448 2.961-.448 1.032 0 2.028.157 2.966.449zm7.034 17.551c0 1.103-.897 2-2 2h-1v-14h-2v36c0 1.103-.897 2-2 2s-2-.897-2-2v-25h-2v25c0 1.103-.897 2-2 2s-2-.897-2-2v-36h-2v14h-1c-1.103 0-2-.897-2-2v-8c0-3.741 2.068-7.004 5.118-8.719.49 2.695 2.492 4.719 4.882 4.719s4.392-2.024 4.882-4.719c3.05 1.715 5.118 4.978 5.118 8.719z"/><path d="m50 25h2v2h-2z"/></svg>
                                    </div>
                                 </div>
                              </div>
                           </div>

						    <div ng-click="clicktabhr('')" class="col-md-3">
                              <div class="attendance-wrap pt AnwarColor">
                                 <div class="employer-box">
                                    <div class="employer-num">
										<h2>Tasks</h2>
                                       <h1><span>{{ Tasks }}</span></h1>
									   <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.891 438.891" style="enable-background:new 0 0 438.891 438.891;" xml:space="preserve">
	<g>
		<g>
			<g>
				<path d="M347.968,57.503h-39.706V39.74c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347
					c-20.668-0.777-39.467,11.896-46.498,31.347h-30.302c-5.747,0-11.494,2.612-11.494,8.359v17.763H90.923
					c-23.53,0.251-42.78,18.813-43.886,42.318v299.363c0,22.988,20.898,39.706,43.886,39.706h257.045
					c22.988,0,43.886-16.718,43.886-39.706V99.822C390.748,76.316,371.498,57.754,347.968,57.503z M151.527,52.279h28.735
					c5.016-0.612,9.045-4.428,9.927-9.404c3.094-13.474,14.915-23.146,28.735-23.51c13.692,0.415,25.335,10.117,28.212,23.51
					c0.937,5.148,5.232,9.013,10.449,9.404h29.78v41.796H151.527V52.279z M370.956,399.185c0,11.494-11.494,18.808-22.988,18.808
					H90.923c-11.494,0-22.988-7.314-22.988-18.808V99.822c1.066-11.964,10.978-21.201,22.988-21.42h39.706v26.645
					c0.552,5.854,5.622,10.233,11.494,9.927h154.122c5.98,0.327,11.209-3.992,12.016-9.927V78.401h39.706
					c12.009,0.22,21.922,9.456,22.988,21.42V399.185z"></path>
				<path d="M164.588,233.046l-33.437,31.869l-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522
					c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135c2.756-0.039,5.385-1.166,7.314-3.135
					l40.751-38.661c0.21-0.192,0.411-0.394,0.603-0.603c3.706-4.04,3.436-10.319-0.603-14.025
					C175.298,229.437,168.792,229.205,164.588,233.046z"></path>
				<path d="M329.16,256.034H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,256.034,329.16,256.034z"></path>
				<path d="M329.16,172.442H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,172.442,329.16,172.442z"></path>
				<path d="M164.588,316.638l-33.437,31.869l-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522
					c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135c2.756-0.039,5.385-1.166,7.314-3.135
					l40.751-38.661c0.21-0.192,0.411-0.394,0.603-0.603c3.706-4.04,3.436-10.319-0.603-14.025
					C175.298,313.029,168.792,312.797,164.588,316.638z"></path>
				<path d="M329.16,339.626H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,339.626,329.16,339.626z"></path>
				<path d="M107.641,220.507h62.171c0.358,0.019,0.716,0.019,1.074,0c5.474-0.297,9.672-4.975,9.375-10.449v-56.424
					c0-5.771-4.678-10.449-10.449-10.449h-62.171c-5.771,0-10.449,4.678-10.449,10.449v56.424c-0.019,0.358-0.019,0.716,0,1.074
					C97.489,216.607,102.167,220.804,107.641,220.507z M118.09,164.083h41.273v35.526H118.09V164.083z"></path>
			</g>
		</g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	</svg>
                                    </div>
                                 </div>
                              </div>
                           </div>

						   <div ng-click="clicktabhr('4')" class="col-md-3">
                              <div class="interview-box pt RedColor">
                                 <div class="employer-box">
                                    <div class="employer-num">
										<h2>Job Openings</h2>
                                       <h1><span>{{ opening }}</span></h1>
									   <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 512 512" width="512" height="512"><path d="M489.534,390H456V282.04a54.957,54.957,0,0,0-3.858-19.947c-.243-.606-.6-1.207-.861-1.805a54.1,54.1,0,0,0-31.966-28.848l-7.07-2.493A277.273,277.273,0,0,0,363,217.1V198.911a71.05,71.05,0,0,0,34.992-57.082,22.467,22.467,0,0,0,13.145-26.3,18.578,18.578,0,0,0-10.745-12.645l1.2-17.533A74.245,74.245,0,0,0,381.584,29.02a75.773,75.773,0,0,0-110.692,0,74.24,74.24,0,0,0-20.008,56.335l1.213,17.513a18.535,18.535,0,0,0-10.764,12.663,22.6,22.6,0,0,0,13.388,26.313A71.346,71.346,0,0,0,290,198.933v18.154a260.575,260.575,0,0,0-49.547,11.86l-7.26,2.494A56.8,56.8,0,0,0,223.259,236H81.362C70.493,236,62,245.292,62,256.161V361.526c-3,.373-6,2.891-6,5.948V378.6A21.847,21.847,0,0,0,59.474,390H22.466C19.153,390,16,392.762,16,396.075v33.1c0,3.313,3.153,5.821,6.466,5.821H39v66a5.873,5.873,0,0,0,5.849,6h422.3A5.873,5.873,0,0,0,473,501V435h16.534c3.313,0,6.466-2.508,6.466-5.821v-33.1C496,392.762,492.847,390,489.534,390ZM374.9,281.533l6.3-48.874a250.927,250.927,0,0,1,26.921,7.63l7.219,2.493A41.977,41.977,0,0,1,440.2,265.134c.206.467.607.937.775,1.356a42.705,42.705,0,0,1,3.024,15.5V390H410V323.914a6,6,0,0,0-12,0V390H357.184l-10.071-95.464,4.51-15.045,14.851,6.738a6,6,0,0,0,8.43-4.7Zm-5.491-51.242-5.372,41.657-27.273-12.374,15.973-15.287a32.209,32.209,0,0,0,8.9-15.218C364.233,229.439,366.827,229.838,369.413,230.291Zm-28.819,44.2-4,13.346-18.849-.3-3.452-14.168,11.918-5.407Zm-32.442-38.874A20.118,20.118,0,0,1,302,221.138V204.569a69.624,69.624,0,0,0,24.483,4.262A73.856,73.856,0,0,0,351,204.556v16.558a20.321,20.321,0,0,1-6.38,14.5L326.3,253.062Zm10.119,63.932,17.333.274L345.117,390H306.084ZM279.664,37.206a63.771,63.771,0,0,1,93.141,0,62.359,62.359,0,0,1,16.809,47.319l-1.524,21.991,0,.038-3.081,1.434L383.545,102a83.342,83.342,0,0,0-34.4-49.39,6,6,0,0,0-8.234,1.478,56.318,56.318,0,0,1-51.73,23.154l-5.234-.559-.211-.021a8.7,8.7,0,0,0-9.384,7.959l-1.817,22.626c-2.442-.477-5.422-1.112-8.232-1.752l-1.453-20.97A62.362,62.362,0,0,1,279.664,37.206ZM266.51,137.334a6,6,0,0,0-4.975-5.912,10.643,10.643,0,0,1-8.55-13.026,6.572,6.572,0,0,1,2.914-4.017,11.285,11.285,0,0,0,2.678,1.927,6.072,6.072,0,0,0,1.36.5c18.423,4.306,19.347,3.634,21.575,2.01a6.181,6.181,0,0,0,2.493-4.437l2.04-25.4,1.86.2a68.369,68.369,0,0,0,59.016-23.33,71.346,71.346,0,0,1,24.966,39l3.192,13.09a6,6,0,0,0,8.361,4.018l11.043-5.141a5.944,5.944,0,0,0,1.547-1.04,12.686,12.686,0,0,0,.988-1.036,6.55,6.55,0,0,1,2.422,3.66,10.644,10.644,0,0,1-8.5,13.022,5.98,5.98,0,0,0-4.94,5.91v.106c0,32.752-26.813,59.4-59.743,59.4A59.669,59.669,0,0,1,266.51,137.334Zm24.347,91.723a32.2,32.2,0,0,0,8.87,15.218l15.938,15.294-27.284,12.379-5.371-41.655Q286.924,229.609,290.857,229.057ZM275,262l2.519,19.532a6,6,0,0,0,8.429,4.7l17.223-7.814,3.76,15.433L293.976,390H277.652A21.77,21.77,0,0,0,281,378.6V367.474c0-3.057-3-5.575-6-5.948Zm-3.784-29.343,1.925,14.923a19.232,19.232,0,0,0-15.5-11.481Q264.378,234.192,271.216,232.658ZM74,256.161c0-4.252,3.11-8.161,7.362-8.161h174.4c4.253,0,7.236,3.909,7.236,8.161V361H74ZM68,373H269v5.6A11.612,11.612,0,0,1,257.643,390H79.484A11.723,11.723,0,0,1,68,378.6ZM461,495H51V435H461Zm23-72H28V402H403.1a5.474,5.474,0,0,0,1.806,0H484Z"/><path d="M168.563,285.824a17.656,17.656,0,1,0,17.656,17.655A17.675,17.675,0,0,0,168.563,285.824Zm0,23.311a5.656,5.656,0,1,1,5.656-5.656A5.662,5.662,0,0,1,168.563,309.135Z"/><path d="M94,263.476a6,6,0,0,0-6,6v4.712a6,6,0,0,0,12,0v-4.712A6,6,0,0,0,94,263.476Z"/><path d="M94,290.714a6,6,0,0,0-6,6v44.178a6,6,0,0,0,12,0V296.714A6,6,0,0,0,94,290.714Z"/></svg>

                                    </div>
                                 </div>
                              </div>
                           </div>
						   <div ng-click="clicktabhr('3')" class="col-md-3">
                              <div class="encrement-box pt LightBlueColor">
                                 <div class="employer-box">
                                    <div class="employer-num">
										<h2>Interview</h2>
                                       <h1><span>{{ interview }}</span></h1>
									   <svg xmlns="http://www.w3.org/2000/svg" id="Layer_3" data-name="Layer 3" viewBox="0 0 64 64" width="512" height="512"><path d="M62,41H61V35.2a7.021,7.021,0,0,0-4.608-6.578L50,26.3V25.05A9.039,9.039,0,0,0,54.05,21H55a2.991,2.991,0,0,0,2.044-5.183l.435-2.611A10.481,10.481,0,0,0,47.139,1H44.861a10.481,10.481,0,0,0-10.34,12.206l.435,2.611A2.991,2.991,0,0,0,37,21h.95A9.039,9.039,0,0,0,42,25.05V26.3l-6.392,2.324A7.021,7.021,0,0,0,31,35.2V41H26v2H61v4H31.959a5.992,5.992,0,0,0-2.73-2.186L23,42.323v-.477a4.02,4.02,0,0,0,2.673-2.409h0L25.841,39H27a2.995,2.995,0,0,0,1.069-5.794l.527-1.37A9.444,9.444,0,0,0,19.781,19H16.219A9.444,9.444,0,0,0,7.4,31.836l.527,1.37A2.995,2.995,0,0,0,9,39h1.159l.168.437A4.02,4.02,0,0,0,13,41.846v.477L6.772,44.814A6,6,0,0,0,4.041,47H3V43h7V41H2a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1H3.176A6.053,6.053,0,0,0,3,50.385V62a1,1,0,0,0,1,1H32a1,1,0,0,0,1-1V50.385A6.053,6.053,0,0,0,32.824,49H59V63h2V49h1a1,1,0,0,0,1-1V42A1,1,0,0,0,62,41ZM15,42h6v.586l-.293.293a3.923,3.923,0,0,1-5.414,0L15,42.586Zm13-6a1,1,0,0,1-1,1h-.39l.742-1.929A1,1,0,0,1,28,36ZM9,37a1,1,0,0,1-.352-1.929L9.39,37Zm3.194,1.718L10,33.014V33H9.995l-.724-1.883A7.445,7.445,0,0,1,16.219,21h3.562a7.445,7.445,0,0,1,6.948,10.117L26.005,33h0v.013l-2.193,5.705A2.016,2.016,0,0,1,21.939,40H14.061A2.013,2.013,0,0,1,12.194,38.718ZM31,61H27V54H25v7H11V54H9v7H5V50.385a3.978,3.978,0,0,1,2.515-3.713l6.245-2.5.119.119a5.828,5.828,0,0,0,8.242,0l.119-.119,6.246,2.5A3.978,3.978,0,0,1,31,50.385ZM59,35.2V41H56V36H54v5H48.867l-.823-5.763,1.09-1.637.266.2a1,1,0,0,0,1.58-.6l.823-4.113,3.905,1.42A5.016,5.016,0,0,1,59,35.2ZM42.743,28.157l1.735,1.735-1.809,1.356L42.1,28.392Zm6.514,0,.645.235-.571,2.856-1.809-1.356ZM46,31.25,47.532,32.4,46.465,34h-.93l-1.068-1.6ZM45.867,36h.266l.714,5H45.153ZM55,19h-.232A8.971,8.971,0,0,0,55,17a1,1,0,0,1,0,2ZM37,19a1,1,0,0,1,0-2,8.971,8.971,0,0,0,.232,2Zm0-6v2c-.052,0-.1.013-.151.015l-.356-2.137A8.483,8.483,0,0,1,44.861,3h2.278a8.483,8.483,0,0,1,8.368,9.878l-.356,2.137c-.051,0-.1-.015-.151-.015V13a1,1,0,0,0-1-1H52.472A6.2,6.2,0,0,1,46.9,8.553a1.042,1.042,0,0,0-1.79,0A6.2,6.2,0,0,1,39.528,12H38A1,1,0,0,0,37,13Zm2,4V14h.528A8.185,8.185,0,0,0,46,10.862,8.185,8.185,0,0,0,52.472,14H53v3a7,7,0,0,1-14,0Zm7,9a8.971,8.971,0,0,0,2-.232v.818l-2,2-2-2v-.818A8.971,8.971,0,0,0,46,26ZM33,35.2a5.016,5.016,0,0,1,3.292-4.7l3.905-1.42L41.02,33.2a1,1,0,0,0,1.58.6l.265-.2,1.091,1.636L43.133,41H38V36H36v5H33Z"/><path d="M2,16H28a1,1,0,0,0,1-1V12.618l3.447-1.724a1,1,0,0,0,0-1.79L29,7.382V5a1,1,0,0,0-1-1H2A1,1,0,0,0,1,5V15A1,1,0,0,0,2,16ZM3,6H27V8a1,1,0,0,0,.553.895L29.764,10l-2.211,1.106A1,1,0,0,0,27,12v2H3Z"/><rect x="5" y="9" width="16" height="2"/><rect x="23" y="9" width="2" height="2"/></svg>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div ng-click="clicktabhr('')" class="col-md-3">
                              <div class="encrement-box pt YellowColor">
                                 <div class="employer-box">
                                    <div class="employer-num">
										<h2>Followups</h2>
                                       <h1><span>{{ Followups }}</span></h1>
									   <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M392.963,199.597c24.96-20.702,40.886-51.937,40.886-86.823C433.848,50.592,383.258,0.002,321.075,0.002
			s-112.772,50.59-112.772,112.772c0,8.128,0.872,16.055,2.514,23.7c-6.422-1.14-13.028-1.737-19.772-1.737
			c-62.183,0-112.772,50.59-112.772,112.772c0,34.883,15.923,66.115,40.879,86.818C49.339,362.789,0,431.394,0,511.317h40.009
			c0-83.282,67.754-151.035,151.035-151.035c62.183,0,112.772-50.59,112.772-112.772c0-8.128-0.872-16.056-2.514-23.701
			c6.422,1.14,13.028,1.737,19.772,1.737c49.078,0,92.746,23.544,120.35,59.916l27.111-30.186
			C448.497,230.958,422.569,211.672,392.963,199.597z M191.045,320.272c-40.121,0-72.763-32.641-72.763-72.763
			c0-40.122,32.642-72.763,72.763-72.763s72.763,32.642,72.763,72.763S231.166,320.272,191.045,320.272z M321.075,185.536
			c-40.121,0-72.763-32.641-72.763-72.763c0-40.122,32.642-72.762,72.763-72.762s72.763,32.641,72.763,72.763
			C393.838,152.897,361.197,185.536,321.075,185.536z"/>
	</g>
</g>
<g>
	<g>
		<polygon points="482.233,299.903 343.271,454.623 264.851,379.974 237.267,408.954 345.519,511.998 512,326.638 		"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                                    </div>
                                 </div>
                              </div>
                           </div>
						   <div ng-click="clicktabhr('5')" class="col-md-3">
                              <div class="leaves-box pt GreenColor">
                                 <div class="employer-box">
                                    <div class="employer-num">
										<h2>Joining</h2>
                                       <h1><span>0</span></h1>
									   <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M512,174.37c-0.012-7.773-2.298-15.656-7.353-22.154l-40.568-51.908c-6.795-8.628-17.134-13.021-27.466-13.038
			c-6.149,0-12.41,1.576-17.942,5.026l-39.556,24.61c-4.16,2.653-11.292,4.474-18.181,4.427c-5.352,0.023-10.524-1.048-13.939-2.735
			l-38.736-18.763c-6.248-3.008-13.213-4.241-20.217-4.253c-10.059,0.047-20.246,2.519-28.432,8.192l-4.52,3.171
			c-3.613-1.803-9.134-4.55-15.388-7.662c-7.5-3.677-16.319-5.16-25.227-5.189c-8.047,0.023-16.092,1.263-23.156,4.247
			l-26.384,11.258c-4.294,1.862-11.124,3.078-17.908,3.048c-6.784,0.029-13.602-1.187-17.896-3.048l-26.408-11.264
			c-4.817-2.054-9.966-2.932-15.069-2.938c-5.876,0.006-11.717,1.164-17.146,3.363c-5.422,2.211-10.455,5.475-14.463,9.954
			L7.965,162.56C2.636,168.511-0.011,176.005,0,183.382c-0.011,8.797,3.753,17.622,11.013,23.807l44.85,38.264l-21.276,22.195
			c-5.865,6.121-8.785,14.057-8.785,21.904c-0.011,8.349,3.305,16.779,9.873,22.986l4.316,4.101
			c4.067,3.858,8.954,6.312,14.068,7.621c-2.565,4.718-3.967,9.891-3.956,15.074c-0.011,8.355,3.305,16.779,9.861,22.993
			l-0.011-0.006l4.329,4.119c6.162,5.841,14.15,8.75,22.02,8.745c4.23,0.006,8.465-0.844,12.445-2.508
			c1.397,5.667,4.282,11.054,8.82,15.359l4.329,4.119c6.162,5.841,14.137,8.75,22.02,8.745c6.162,0.006,12.352-1.81,17.681-5.335
			c1.559,5.015,4.23,9.768,8.296,13.631l4.329,4.119c6.149,5.841,14.137,8.75,22.009,8.745c8.383,0.006,16.849-3.287,23.102-9.815
			l18.804-19.636l25.547,23.644c6.115,5.672,13.964,8.494,21.712,8.477c8.512,0.018,17.099-3.392,23.365-10.1l4.078-4.369
			c3.52-3.781,5.818-8.256,7.151-12.927l9.896,9.134c6.126,5.649,13.964,8.459,21.701,8.453c8.523,0.006,17.134-3.404,23.406-10.117
			l4.055-4.364c4.683-5.003,7.319-11.2,8.133-17.529c2.612,0.669,5.259,1.123,7.929,1.123c8.523,0,17.11-3.404,23.388-10.111
			l4.067-4.364c5.684-6.092,8.512-13.905,8.5-21.608c0-2.391-0.343-4.77-0.873-7.121c7.069-0.937,13.923-4.09,19.135-9.687
			l4.078-4.369c5.684-6.092,8.5-13.905,8.5-21.614c0.011-8.482-3.409-17.041-10.158-23.277l-7.627-7.045l68.838-76.11
			C509.138,191.876,511.989,183.056,512,174.37z M62.014,308.065c-3.647-0.011-7.214-1.315-10.001-3.956l-4.323-4.101
			c-2.991-2.828-4.468-6.591-4.48-10.455c0.012-3.624,1.309-7.162,3.98-9.949l43.576-45.473c2.839-2.962,6.627-4.445,10.513-4.45
			c3.636,0.006,7.191,1.315,10.001,3.962l4.305,4.107c0,0,4.457,6.591,4.468,10.46c-0.011,2.897-0.884,5.719-2.577,8.163
			c-0.145,0.145-47.032,49.01-47.032,49.01C67.954,307.145,65.01,308.052,62.014,308.065z M96.816,353.422
			c-2.833,2.95-6.615,4.427-10.501,4.439c-3.647-0.006-7.203-1.315-10.001-3.956l-4.329-4.114l-0.011-0.006
			c-2.967-2.816-4.457-6.591-4.457-10.455c0-3.624,1.309-7.162,3.967-9.949c0,0,58.086-60.465,58.575-61.048
			c2.776-2.67,6.353-4.049,10.047-4.055c3.647,0.006,7.203,1.309,10.001,3.956l4.329,4.119c2.978,2.816,4.457,6.586,4.468,10.455
			c-0.012,3.624-1.32,7.167-3.98,9.954L96.816,353.422z M144.423,379.13c-2.827,2.957-6.608,4.436-10.495,4.447
			c-3.647-0.006-7.203-1.315-10.001-3.962l-4.341-4.114c-2.978-2.822-4.468-6.591-4.468-10.455c0-3.234,1.1-6.371,3.205-8.983
			l40.452-42.221c2.729-2.461,6.149-3.758,9.693-3.758c3.647,0.006,7.203,1.309,10.001,3.956l4.341,4.119
			c2.967,2.816,4.457,6.586,4.468,10.449c-0.012,3.631-1.332,7.174-3.98,9.954L144.423,379.13z M221.285,374.674l-24.546,25.618
			c-2.828,2.955-6.615,4.434-10.501,4.445c-3.647-0.006-7.203-1.315-10.001-3.962l-4.329-4.114
			c-2.967-2.816-4.457-6.591-4.468-10.455c0.011-3.631,1.32-7.174,3.98-9.949l24.535-25.617c2.839-2.955,6.627-4.439,10.513-4.445
			c3.636,0.006,7.203,1.309,10.001,3.962l4.341,4.114c2.967,2.816,4.445,6.586,4.457,10.449
			C225.253,368.35,223.944,371.893,221.285,374.674z M434.523,305.183c-0.005,3.558-1.28,7.043-3.863,9.812l-4.067,4.364
			c-2.839,3.037-6.691,4.573-10.635,4.579c-3.578-0.006-7.081-1.263-9.861-3.833l-68.535-63.381l-11.851,12.689l73.358,67.959
			c3.055,2.828,4.59,6.668,4.613,10.589c-0.023,3.572-1.286,7.051-3.863,9.821l-4.055,4.364c-2.839,3.037-6.691,4.567-10.635,4.579
			c-3.578-0.011-7.092-1.274-9.85-3.828l-68.553-63.38l-11.839,12.689l60.838,56.26c2.932,2.81,4.434,6.551,4.434,10.39
			c0,3.561-1.263,7.045-3.84,9.809l-4.067,4.364c-2.828,3.037-6.691,4.573-10.646,4.584c-3.59-0.011-7.092-1.274-9.861-3.828
			l-60.716-56.056h-0.011l-0.011-0.011l-11.816,12.712l0.012,0.011l0.227,0.215l30.41,28.066c2.694,2.769,4.09,6.318,4.101,9.989
			c-0.011,3.543-1.263,7.01-3.84,9.775l-4.067,4.369c-2.839,3.037-6.679,4.561-10.612,4.573c-3.578-0.011-7.081-1.268-9.85-3.833
			l-26.477-24.517c2.304-4.52,3.59-9.425,3.59-14.347c0.011-8.349-3.305-16.767-9.861-22.986l-4.341-4.119
			c-6.149-5.836-14.126-8.75-21.997-8.739c-0.611,0-1.227,0.14-1.826,0.175c0-0.145,0.034-0.297,0.034-0.442
			c0.011-8.349-9.861-22.998-9.861-22.998l-4.329-4.107c-4.602-4.364-10.217-7.086-16.057-8.18
			c1.204-3.409,1.885-6.958,1.885-10.513c0-8.349-3.305-16.774-9.861-22.986l-4.329-4.119c-6.162-5.841-14.137-8.756-22.009-8.75
			c-0.919,0-1.826,0.186-2.74,0.268c-0.25-8.017-3.479-16.028-9.762-21.997v-0.006l-4.317-4.101
			c-6.162-5.847-14.137-8.762-22.009-8.756c-8.396-0.006-16.849,3.287-23.102,9.815l-10.286,10.734l-45.566-38.864
			c-3.275-2.804-4.91-6.679-4.922-10.658c0.011-3.334,1.146-6.598,3.566-9.308l48.079-53.845c1.908-2.141,4.73-4.078,8.035-5.423
			c3.305-1.344,7.057-2.082,10.565-2.077c3.055,0,5.922,0.553,8.215,1.542l26.396,11.263c7.441,3.136,16.08,4.422,24.762,4.45
			c8.692-0.029,17.32-1.315,24.762-4.45l26.384-11.258c4.067-1.774,10.204-2.874,16.307-2.851c6.749-0.041,13.509,1.356,17.43,3.357
			c2.49,1.239,4.852,2.415,7.045,3.514l-26.908,18.915c-8.646,6.08-13.306,15.749-13.294,25.506
			c-0.011,6.458,2.036,13.032,6.202,18.611l-0.011-0.012l3.554,4.776c6.749,8.972,17.273,13.585,27.792,13.608
			c5.94,0,11.991-1.501,17.384-4.736l16.092-9.664c3.282-2.007,8.238-3.275,13.363-3.252c6.022-0.035,12.09,1.746,15.738,4.427
			l44.519,31.917c9.908,7.098,26.046,20.264,34.989,28.549l51.529,47.643C432.975,297.433,434.511,301.256,434.523,305.183z
			 M490.038,187.146l-68.646,75.906l-31.167-28.81c-9.762-9.012-25.86-22.154-36.658-29.91l-44.507-31.917
			c-7.546-5.346-16.785-7.657-25.919-7.691c-7.773,0.023-15.604,1.717-22.364,5.742l-16.08,9.664
			c-2.467,1.483-5.375,2.24-8.396,2.246c-5.4,0.018-10.804-2.502-13.817-6.604l-3.543-4.77l-0.012-0.012
			c-1.885-2.542-2.763-5.393-2.776-8.279c0.023-4.364,2.036-8.599,5.935-11.351l47.579-33.43c4.114-2.978,11.433-5.067,18.385-5.015
			c4.829-0.023,9.442,0.948,12.601,2.508l38.735,18.763c6.604,3.171,14.057,4.468,21.555,4.486
			c9.634-0.047,19.373-2.141,27.397-7.069l39.568-24.615c2.525-1.576,5.556-2.391,8.716-2.391
			c5.341-0.011,10.693,2.409,13.724,6.359l40.568,51.908c2.339,2.973,3.694,7.167,3.694,11.514
			C494.617,179.239,492.9,184.022,490.038,187.146z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
					<div class="graph-wrap">
					  <div class="dashboard-grap dashboardnograph">
						 <div class="nograph">
							<p>No Data found. Please choose date & Click on any entity to see the complete record.</p>
						 </div>
					  </div>
					  <div style="display:none"  class="dashboard-grap employeegrpah">
						 <div id="chartContaineremployee" style="height:100%;width: 100%;"></div>
					  </div>
					  <div style="display:none" class="dashboard-grap leavegrpah">
						 <div id="chartContainerleave" style="height:100%;width: 100%;"></div>
					  </div>
					  <div style="display:none" class="dashboard-grap interviewgrpah">
						 <div id="chartContainerinterview" style="height:100%;width: 100%;"></div>
					  </div>
					  <div style="display:none" class="dashboard-grap openinggrpah">
						 <div id="chartContaineropening" style="height:100%;width: 100%;"></div>
					  </div>
					  <div style="display:none" class="dashboard-grap dsrgraph">
						 <div id="chartContainerdsr" style="height:100%;width: 100%;"></div>
					  </div>
				   </div>
               </div>
               </div>

			   <div class="row">
				 <div class="col-md-6">
                  <div class="Leaves common-l bg-white wow bounceInLeft animated" data-wow-delay=".1s" style="visibility:hidden">
                     <div class="heading">
                        <div class="row">
                           <div class="col-md-12">
                              <h4 class="h4-head">Today Leaves</h4>
                           </div>
                        </div>
                     </div>
                     <div class="table-responsive">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>Employee Name</th>
                                 <th style="">Type</th>
                                 <th style="">Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 if(!empty($allleave))
                                 {
                                 foreach($allleave as $l)
                                 {
                                 ?>
                              <tr>
                                 <td>
                                    <?php if($l->name){ echo ucwords($l->name); }  ?>
                                 </td>
                                 <td>
                                    <?php echo $l->type; ?>
                                 </td>
                                 <td>
                                    <?php if($l->status == 1)
                                       {
                                         ?>
                                    <a href="javascript:void();" class="btn btn-cstm bg-green bg-yellow">Approved</a>
                                    <?php }
                                       else if($l->status == 2)
                                        {
                                          ?>
                                    <a href="javascript:void();" class="btn btn-cstm bg-yellow">Rejected</a>
                                    <?php }
                                       else if($l->status == 3)
                                        {
                                          ?>
                                    <a href="javascript:void();" class="btn btn-cstm bg-red">Cancelled</a>
                                    <?php } ?>
                                 </td>
                              </tr>
                              <?php }
                                 }
                                 else
                                 {
                                   ?>
                              <tr>
                                 <td colspan="4" class="text-center">No Leave</td>
                              </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="Latest common-l bg-white wow bounceInLeft animated" data-wow-delay=".1s" style="visibility:hidden;">
                     <div class="heading">
                        <div class="row">
                           <div class="col-md-12">
                              <h4 class="h4-head">Latest Reviews</h4>
                           </div>
                        </div>
                     </div>
                     <div class="latest-content p-3">
                        <?php
                           if(!empty($reviewlatest))
                           {

                             foreach($reviewlatest as $r)
                             {
                               ?>
                        <div class="lead-review mb-2 border-bottom pb-3">
                           <!-- <span class="lead-date">23/01/2020</span> -->
                           <div class="review">
                              <p>“
                                 <?php echo $r->reviewOverall; ?>”
                              </p>
                           </div>
                           <div class="client-name d-flex"><span>
                              <?php if($r->name){ echo ucwords($r->name); }  ?></span>
                              <span class="d-flex ml-2">
                              <i class="fa <?php if($r->star >= 1){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                              <i class="fa <?php if($r->star >= 2){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                              <i class="fa <?php if($r->star >= 3){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                              <i class="fa <?php if($r->star >= 4){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                              <i class="fa <?php if($r->star >= 5){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                              </span>
                           </div>
                        </div>
                        <?php } }
                           else
                           {
                            ?>
                        <p>No Review</p>
                        <?php } ?>
                     </div>
                     <?php
                        if(!empty($reviewlatest))
                        {
                          ?>
                     <div class="border-top text-right p-3">
                        <a href="javascript:void(0);">View All</a>
                     </div>
                     <?php } ?>
                  </div>
               </div>

			   </div>


               <div class="holiday-box">
                  <div class="row">
                     <div class="col-lg-6 col-sm-12">
                        <div class="Leaves common-l bg-white wow bounceInLeft animated mt-3" data-wow-delay=".1s" style="visibility:hidden;">
                           <div class="heading">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h4 class="h4-head">Holidays</h4>
                                 </div>
                              </div>
                           </div>
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>Holiday</th>
                                       <th style="">Day</th>
                                       <th style="min-width:110px;">Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       if(!empty($allholidays))
                                       {
                                         foreach($allholidays as $h)
                                         {
                                         ?>
                                    <tr>
                                       <td>
                                          <?php echo $h->title; ?>
                                       </td>
                                       <td>
                                          <?php echo $dayOfWeek = date("l", strtotime($h->date)); ?>
                                       </td>
                                       <td>
                                          <?php echo $newDate = date("d-m-Y", strtotime($h->date));  ?>
                                       </td>
                                    </tr>
                                    <?php } }
                                       else
                                        {
                                          ?>
                                    <tr>
                                       <td colspan="3">No Holidays</td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                           <?php
                              if(!empty($allholidays))
                              {
                                ?>
                           <div class="border-top text-right p-3">
                              <a href="<?php echo base_url(); ?>freelancer/holiday">View All</a>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-12">
                        <div class="Leaves common-l bg-white wow bounceInLeft animated mt-3" data-wow-delay=".3s" style="visibility: hidden;">
                           <div class="heading">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h4 class="h4-head">Task</h4>
                                 </div>
                              </div>
                           </div>
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>Task Name</th>
                                       <th>Assign to</th>
                                       <th>Start Date</th>
                                       <th>Description</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(!empty($task))
                                       {
                                         foreach($task as $t)
                                         {
                                         ?>
                                    <tr class="<?php if($t->status == 1){ echo "taskdone"; } else if($t->status == 2){ echo "taskpending"; }  ?>">
                                       <td>
                                          <?php echo $t->name; ?>
                                       </td>
                                       <td>
                                          <?php echo $t->assignedto; ?>
                                       </td>
                                       <td>
                                          <?php echo $d = date("d M, Y",strtotime($t->startDate)); ?>
                                       </td>
                                       <td>
                                          <?php echo substr($t->description, 0, 70);  ?>
                                       </td>
                                    </tr>
                                    <?php } } else{ ?>
                                    <tr>
                                       <td colspan="4">No Task</td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                           <?php if(!empty($task))
                              { ?>
                           <div class="border-top text-right p-3">
                              <a href="<?php echo base_url(); ?>freelancer/todo">View All</a>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="notification-box">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="Leaves common-l mt-3 bg-white wow bounceInLeft animated"  data-wow-delay=".1s" style="visibility:hidden;">
                           <div class="heading mb-2">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h4 class="h4-head">Notifications</h4>
                                 </div>
                              </div>
                           </div>
                           <?php
                              if(!empty($notification))
                              {
                                foreach($notification as $n)
                                {
                                 ?>
                           <div class="notification-content mx-2">
                              <ul class="un-style mb-0 list-unstyled d-flex">
                                 <!-- <li class="">
                                    <div class="john-img">
                                        <?php if($n->logo != '')
                                       {
                                         ?>
                                        <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $n->logo; ?>">
                                        <?php }
                                       else
                                       {
                                       ?>
                                        <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg">
                                        <?php
                                       }
                                       ?>
                                    </div>
                                    </li> -->
                                 <li class="pl-2">
                                    <div class="not-content">
                                       <span>
                                       <?php echo $newDate = date("d-m-Y", strtotime($n->notificationDate));  ?></span>
                                       <p>
                                          <?php echo $n->notificationMessage; ?>
                                       </p>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                           <?php }
                              }
                              else
                              {
                              ?>
                           <div class="notification-content mx-2">
                              <p>No Notification</p>
                           </div>
                           <?php
                              }
                              if(!empty($notification))
                              {
                              ?>
                           <div class="border-top text-right p-3">
                              <a href="<?php echo base_url(); ?>freelancer/notification">View All</a>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </div>
            </div>
            </div>
            </div>
   </div>
   <!-- ************************end hr dashboard*******************************-->
   <?php }
      else if($this->session->userdata['clientloggedin']['access'] == 2)
      {
        ?>
   <!--******************* sales Manager dashboard ************************-->
   <div class="dash-board projectmanagerdashboard salesManagerdashboard" >

		<div class="full-container">
			<div class="employer-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="h4-win PageHeading">Dashboard</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="DashboardSearch">
								<div class="form-group">
									 <input readonly ng-model="managerstartdate" placeholder="Please enter start date" type="text" name="start" class="form-control dashboardstartdate" >
								  </div>
								<div class="form-group">
								 <input  type="button" ng-click="getmanagerdatewise()" name="submit" value="submit" class="btn btn-success" >
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


      <div class="row">
         <div class="col-md-12">
            <!-- add -->
            <div class="full-container">
               <div class="employer-section">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="dashbord-wrapper">
                              <div class="dashbord-inner-wrap">
                                 <div class="row">
                                    <div ng-click="managerclicktab('1')" class="col-md-6">
                                       <div class="dashboard-wrap pt AquaColor">
                                          <div class="employer-box">
                                             <div class="employer-num">
												<h2>Total Tasks Assigned To Me</h2>
                                                <h1><span>{{ mtotaltask }}</span></h1>
												<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.891 438.891" style="enable-background:new 0 0 438.891 438.891;" xml:space="preserve">
	<g>
		<g>
			<g>
				<path d="M347.968,57.503h-39.706V39.74c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347
					c-20.668-0.777-39.467,11.896-46.498,31.347h-30.302c-5.747,0-11.494,2.612-11.494,8.359v17.763H90.923
					c-23.53,0.251-42.78,18.813-43.886,42.318v299.363c0,22.988,20.898,39.706,43.886,39.706h257.045
					c22.988,0,43.886-16.718,43.886-39.706V99.822C390.748,76.316,371.498,57.754,347.968,57.503z M151.527,52.279h28.735
					c5.016-0.612,9.045-4.428,9.927-9.404c3.094-13.474,14.915-23.146,28.735-23.51c13.692,0.415,25.335,10.117,28.212,23.51
					c0.937,5.148,5.232,9.013,10.449,9.404h29.78v41.796H151.527V52.279z M370.956,399.185c0,11.494-11.494,18.808-22.988,18.808
					H90.923c-11.494,0-22.988-7.314-22.988-18.808V99.822c1.066-11.964,10.978-21.201,22.988-21.42h39.706v26.645
					c0.552,5.854,5.622,10.233,11.494,9.927h154.122c5.98,0.327,11.209-3.992,12.016-9.927V78.401h39.706
					c12.009,0.22,21.922,9.456,22.988,21.42V399.185z"></path>
				<path d="M164.588,233.046l-33.437,31.869l-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522
					c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135c2.756-0.039,5.385-1.166,7.314-3.135
					l40.751-38.661c0.21-0.192,0.411-0.394,0.603-0.603c3.706-4.04,3.436-10.319-0.603-14.025
					C175.298,229.437,168.792,229.205,164.588,233.046z"></path>
				<path d="M329.16,256.034H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,256.034,329.16,256.034z"></path>
				<path d="M329.16,172.442H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,172.442,329.16,172.442z"></path>
				<path d="M164.588,316.638l-33.437,31.869l-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522
					c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135c2.756-0.039,5.385-1.166,7.314-3.135
					l40.751-38.661c0.21-0.192,0.411-0.394,0.603-0.603c3.706-4.04,3.436-10.319-0.603-14.025
					C175.298,313.029,168.792,312.797,164.588,316.638z"></path>
				<path d="M329.16,339.626H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,339.626,329.16,339.626z"></path>
				<path d="M107.641,220.507h62.171c0.358,0.019,0.716,0.019,1.074,0c5.474-0.297,9.672-4.975,9.375-10.449v-56.424
					c0-5.771-4.678-10.449-10.449-10.449h-62.171c-5.771,0-10.449,4.678-10.449,10.449v56.424c-0.019,0.358-0.019,0.716,0,1.074
					C97.489,216.607,102.167,220.804,107.641,220.507z M118.09,164.083h41.273v35.526H118.09V164.083z"></path>
			</g>
		</g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	</svg>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div ng-click="managerclicktab('2')" class="col-md-6">
                                       <div class="attendance-wrap pt VioletRedColor">
                                          <div class="employer-box">
                                             <div class="employer-num">
												<h2>Total Tasks Assigned By me</h2>
                                                <h1><span>{{ mtotaltaskbyme }}</span></h1>
												<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 438.891 438.891" style="enable-background:new 0 0 438.891 438.891;" xml:space="preserve">
<g>
	<g>
		<g>
			<path d="M347.968,57.503h-39.706V39.74c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347
				c-20.668-0.777-39.467,11.896-46.498,31.347h-30.302c-5.747,0-11.494,2.612-11.494,8.359v17.763H90.923
				c-23.53,0.251-42.78,18.813-43.886,42.318v299.363c0,22.988,20.898,39.706,43.886,39.706h257.045
				c22.988,0,43.886-16.718,43.886-39.706V99.822C390.748,76.316,371.498,57.754,347.968,57.503z M151.527,52.279h28.735
				c5.016-0.612,9.045-4.428,9.927-9.404c3.094-13.474,14.915-23.146,28.735-23.51c13.692,0.415,25.335,10.117,28.212,23.51
				c0.937,5.148,5.232,9.013,10.449,9.404h29.78v41.796H151.527V52.279z M370.956,399.185c0,11.494-11.494,18.808-22.988,18.808
				H90.923c-11.494,0-22.988-7.314-22.988-18.808V99.822c1.066-11.964,10.978-21.201,22.988-21.42h39.706v26.645
				c0.552,5.854,5.622,10.233,11.494,9.927h154.122c5.98,0.327,11.209-3.992,12.016-9.927V78.401h39.706
				c12.009,0.22,21.922,9.456,22.988,21.42V399.185z"/>
			<path d="M179.217,233.569c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629
				c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
				c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
				C179.628,233.962,179.427,233.761,179.217,233.569z"/>
			<path d="M329.16,256.034H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
				c5.771,0,10.449-4.678,10.449-10.449S334.931,256.034,329.16,256.034z"/>
			<path d="M179.217,149.977c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629
				c-3.919-4.131-10.425-4.364-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
				c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
				C179.628,150.37,179.427,150.169,179.217,149.977z"/>
			<path d="M329.16,172.442H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
				c5.771,0,10.449-4.678,10.449-10.449S334.931,172.442,329.16,172.442z"/>
			<path d="M179.217,317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437,31.869l-14.106-14.629
				c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
				c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
				C179.628,317.554,179.427,317.353,179.217,317.16z"/>
			<path d="M329.16,339.626H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
				c5.771,0,10.449-4.678,10.449-10.449S334.931,339.626,329.16,339.626z"/>
		</g>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="increment-wrapper">
                                 <div class="row">
                                    <div ng-click="managerclicktab('3')" class="col-md-6">
                                       <div class="encrement-box pt LightBlueColor">
                                          <div class="employer-box">
                                             <div class="employer-num">
											 <h2>DSR</h2>
                                                <h1><span>{{ mdsr }}</span></h1>
												<svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m458.617 54.278h-42.681c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h42.681c21.165 0 38.383 17.263 38.383 38.481v286.441c0 21.219-17.219 38.481-38.383 38.481h-405.234c-21.165.002-38.383-17.261-38.383-38.48v-53.095c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v53.095c0 29.49 23.947 53.481 53.383 53.481h152.263l-15.102 49.318h-33.262c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h197.434c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-33.262l-15.101-49.317h152.262c29.436 0 53.383-23.991 53.383-53.481v-286.442c.002-29.49-23.946-53.482-53.381-53.482zm-252.385 442.722 15.102-49.317h69.333l15.101 49.317z"/><path d="m7.5 313.721c4.142 0 7.5-3.357 7.5-7.5v-198.461c0-21.219 17.218-38.481 38.383-38.481h21.779c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-21.779c-29.436-.001-53.383 23.991-53.383 53.481v198.461c0 4.142 3.358 7.5 7.5 7.5z"/><path d="m482.076 106.516c0-13.095-10.638-23.748-23.714-23.748h-26.693c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h26.693c4.805 0 8.714 3.925 8.714 8.748v147.063c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5z"/><path d="m482.076 364.458v-75.57c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v75.57c0 4.824-3.909 8.749-8.714 8.749h-404.724c-4.805 0-8.714-3.925-8.714-8.749v-257.942c0-4.823 3.909-8.748 8.714-8.748h14.125c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-14.125c-13.076 0-23.714 10.653-23.714 23.748v257.942c0 13.096 10.638 23.749 23.714 23.749h404.724c13.076 0 23.714-10.653 23.714-23.749z"/><path d="m64.055 402.976c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h30.639c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path d="m124.055 402.976c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h30.639c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path d="m256.432 343.845c30.467 0 60.405-8.063 86.579-23.318 25.394-14.8 46.72-35.992 61.673-61.284 2.108-3.566.926-8.165-2.639-10.273-3.567-2.107-8.165-.926-10.273 2.639-9.152 15.48-20.919 29.278-34.666 40.764-6.167-2.775-12.569-5.275-19.174-7.492 16.001-29.374 25.182-66.262 26.222-105.456h49.169c-.691 14.696-3.415 29.119-8.124 42.978-1.333 3.922.766 8.182 4.688 9.515.8.271 1.613.4 2.414.4 3.123 0 6.039-1.967 7.1-5.089 6.038-17.766 9.099-36.373 9.099-55.304-.001-94.801-77.19-171.925-172.068-171.925-27.432 0-53.653 6.26-77.936 18.606-21.355 10.858-40.488 26.33-55.656 44.957-2.368-.746-4.887-1.148-7.499-1.148-13.79 0-25.008 11.212-25.008 24.993 0 6.959 2.861 13.262 7.468 17.798-8.919 21.113-13.437 43.527-13.437 66.716 0 94.799 77.189 171.923 172.068 171.923zm-156.89-164.422h49.168c1.04 39.194 10.221 76.082 26.222 105.456-6.581 2.209-12.96 4.699-19.106 7.462-32.694-27.31-54.141-67.633-56.284-112.918zm70.216 123.31c4.277-1.696 8.664-3.258 13.15-4.683 5.101 7.581 10.595 14.282 16.412 20.058-10.442-4.086-20.342-9.257-29.562-15.375zm79.174 25.597c-18.535-2.55-36.097-14.518-50.69-34.529 16.029-3.821 33.071-6.02 50.69-6.506zm0-56.04c-20.666.541-40.632 3.318-59.273 8.201-15.787-27.625-24.884-63.096-25.943-101.068h85.217v20.563c-10.137 3.191-17.509 12.674-17.509 23.845 0 11.17 7.372 20.653 17.509 23.844v24.615zm15 56.04v-41.035c17.619.486 34.661 2.685 50.69 6.506-14.594 20.011-32.155 31.979-50.69 34.529zm79.245-25.569c-2.524 1.675-5.098 3.278-7.72 4.806-7.045 4.106-14.389 7.641-21.957 10.584 5.833-5.786 11.342-12.502 16.455-20.102 4.511 1.434 8.922 3.006 13.222 4.712zm8.472-174.045c-5.519 0-10.008-4.483-10.008-9.993s4.49-9.993 10.008-9.993c5.519 0 10.009 4.483 10.009 9.993s-4.49 9.993-10.009 9.993zm61.672 35.707h-49.169c-.209-7.803-.744-15.569-1.599-23.21 8.342-4.056 14.105-12.613 14.105-22.49 0-13.465-10.709-24.477-24.063-24.975-3.994-12.562-8.923-24.234-14.66-34.782 6.58-2.209 12.958-4.698 19.103-7.46 32.693 27.308 54.14 67.631 56.283 112.917zm-70.216-123.311c-4.277 1.696-8.663 3.257-13.149 4.683-4.239-6.287-8.808-12.04-13.67-17.192-.936-.992-1.881-1.959-2.834-2.902 10.476 4.091 20.407 9.275 29.653 15.411zm-79.173-25.584c18.638 2.626 36.281 14.944 50.647 34.526-16.017 3.815-33.044 6.01-50.647 6.496zm0 56.027c20.661-.541 40.622-3.317 59.259-8.197 5.807 10.155 10.852 21.68 14.924 34.356-6.899 4.454-11.474 12.207-11.474 21.008 0 12.44 9.142 22.786 21.064 24.682.76 6.922 1.242 13.951 1.442 21.018h-85.215zm0 107.868h85.216c-1.06 37.971-10.156 73.442-25.943 101.068-18.641-4.882-38.607-7.66-59.273-8.201v-24.615c10.137-3.191 17.508-12.674 17.508-23.844 0-11.171-7.372-20.653-17.508-23.845zm-7.5 34.415c5.519 0 10.008 4.483 10.008 9.993s-4.49 9.992-10.008 9.992c-5.519 0-10.009-4.482-10.009-9.992s4.49-9.993 10.009-9.993zm-7.5-198.32v41.032c-17.646-.487-34.712-2.692-50.762-6.523 14.332-19.619 31.966-31.909 50.762-34.509zm-63.638 16.46c4.697-2.388 9.473-4.526 14.324-6.414-5.96 5.855-11.552 12.63-16.693 20.237-4.513-1.433-8.926-3.005-13.227-4.712 5.023-3.338 10.232-6.384 15.596-9.111zm-69.954 45.437c5.519 0 10.009 4.483 10.009 9.993s-4.49 9.993-10.009 9.993-10.008-4.483-10.008-9.993 4.49-9.993 10.008-9.993zm-4.146 34.643c1.349.226 2.734.344 4.146.344 13.79 0 25.009-11.212 25.009-24.993 0-5.723-1.935-11.002-5.185-15.22 6.207-7.515 13.123-14.456 20.608-20.707 6.163 2.773 12.561 5.27 19.161 7.486-7.312 13.422-13.378 28.801-17.864 45.784-1.058 4.005 1.332 8.108 5.336 9.166.642.17 1.286.251 1.92.251 3.322 0 6.358-2.224 7.247-5.587 4.499-17.037 10.642-32.267 18.022-45.243 18.66 4.893 38.647 7.676 59.336 8.217v92.868h-85.215c.221-7.792.784-15.544 1.682-23.134.487-4.113-2.452-7.843-6.566-8.33-4.104-.476-7.842 2.454-8.33 6.566-.968 8.17-1.568 16.516-1.792 24.897h-49.172c.843-18.134 4.752-35.692 11.657-52.365z"/><path d="m109.121 298.688h-32.141c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h32.141c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path d="m69.48 341.188c0 4.143 3.358 7.5 7.5 7.5h52.11c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-52.11c-4.142 0-7.5 3.357-7.5 7.5z"/></g></svg>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div ng-click="managerclicktab('4')" class="col-md-6">
                                       <div class="interview-box pt GreenColor ">
                                          <div class="employer-box">
                                             <div class="employer-num">
												<h2>Total Projects </h2>
                                                <h1><span>{{ mproject }}</span></h1>
												<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 512 512" width="512" height="512"><path d="M455.887,234h-.044a34.013,34.013,0,0,0-34.023,33.916l-.378,172.006a5.939,5.939,0,0,0,.635,2.672l0,0,27.951,56.09A6,6,0,0,0,455.386,502h.008a6,6,0,0,0,5.363-3.31l28.1-56.02,0,0a5.962,5.962,0,0,0,.641-2.675l.374-171.983A34,34,0,0,0,455.887,234Zm-22.141,67.566,16.079.021-.343,132.348-16.026-.021Zm21.665,181.016-18.269-36.663,36.633.048Zm22.093-48.61-16.022-.021.343-132.348,15.967.021Zm.314-144.334-44.046-.065.048-21.633A22,22,0,0,1,455.843,246h.028a21.925,21.925,0,0,1,21.994,21.96Z"/><path d="M360.849,103H360V86.09a6.151,6.151,0,0,0-1.983-4.319l-72.766-70.09A6.183,6.183,0,0,0,281.012,10H59.7A37.727,37.727,0,0,0,22,47.568v380.6A37.954,37.954,0,0,0,59.7,466H72.851a37.456,37.456,0,0,0,37.534,36H360.849A37.258,37.258,0,0,0,398,464.432V140.341A37.063,37.063,0,0,0,360.849,103ZM287,30.12,339.005,80H287ZM59.7,454A25.94,25.94,0,0,1,34,428.167V47.568A25.712,25.712,0,0,1,59.7,22H275V86.253A5.8,5.8,0,0,0,281.012,92H348V428.167A26.08,26.08,0,0,1,322.135,454ZM386,464.432A25.244,25.244,0,0,1,360.849,490H110.385a25.732,25.732,0,0,1-25.534-24H322.135A38.093,38.093,0,0,0,360,428.167V115h.849A25.051,25.051,0,0,1,386,140.341Z"/><path d="M92.66,312a6,6,0,1,0,0,12H217.617a6,6,0,0,0,0-12Z"/><path d="M289.233,350H92.66a6,6,0,1,0,0,12H289.233a6,6,0,0,0,0-12Z"/><path d="M261.023,387H92.66a6,6,0,1,0,0,12H261.023a6,6,0,0,0,0-12Z"/><path d="M176.094,274.8a96.647,96.647,0,1,0-25.15-189.961l-3.227-9.683a6,6,0,0,0-5.693-4.1,74.674,74.674,0,0,0-74.663,74.673,6,6,0,0,0,4.1,5.693l10.793,3.6A96.647,96.647,0,0,0,176.094,274.8Zm0-181.294a84.625,84.625,0,1,1-82.415,65.317l80.785,26.923a6,6,0,0,0,7.589-7.59L154.745,96.242A84.511,84.511,0,0,1,176.094,93.508ZM79.5,141.452A62.691,62.691,0,0,1,137.748,83.2l29.126,87.372Z"/><path d="M54,40.583a6,6,0,0,0-6,6v4.3a6,6,0,0,0,12,0v-4.3A6,6,0,0,0,54,40.583Z"/><path d="M54,65.878a6,6,0,0,0-6,6v72a6,6,0,0,0,12,0v-72A6,6,0,0,0,54,65.878Z"/></svg>

                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- leaves html -->
                              <div class="leaves-wrapper">
                                 <div class="row">
                                    <div ng-click="managerclicktab('5')" class="col-md-6">
                                       <div class="leaves-box pt YellowColor ">
                                          <div class="employer-box">
                                             <div class="employer-num">
												<h2>Leave Requests</h2>
                                                <h1><span>{{ mleave }}</span></h1>
												<svg height="482pt" viewBox="-33 0 482 482.2065" width="482pt" xmlns="http://www.w3.org/2000/svg"><path d="m196.394531 154.207031h-41.25v-55.625c0-4.417969-3.578125-8-8-8-4.417969 0-8 3.582031-8 8v64.105469c0 4.417969 3.992188 7.519531 8.410157 7.519531h48.839843c4.421875 0 8-3.582031 8-8s-3.578125-8-8-8zm0 0"></path><path d="m153.589844 307.050781c20.453125-.035156 40.695312-4.125 59.554687-12.03125v2.1875h33.910157l10.929687 185h114.007813l10.410156-185h33.742187v-106.195312c0-38.851563-31.597656-70.804688-70.453125-70.804688h-42.070312c-.398438-1-.835938-3.472656-1.304688-5.28125 28.910156 6.539063 57.777344-11.105469 65.132813-39.820312 7.359375-28.710938-9.460938-58.066407-37.957031-66.234375-28.492188-8.171875-58.3125 7.8125-67.285157 36.0625-28.738281-28.859375-67.820312-45.039063-108.546875-44.933594-84.652344 0-153.558594 68.875-153.558594 153.527344 0 84.648437 68.835938 153.523437 153.488282 153.523437zm59.554687-70.984375c-17.261719 12.660156-38.144531 19.417969-59.554687 19.277344-52.902344 0-96.992188-40.511719-101.453125-93.226562-4.464844-52.714844 32.1875-100.066407 84.339843-108.957032 52.152344-8.890625 102.421876 23.640625 115.675782 74.855469-23.863282 11.941406-38.957032 36.316406-39.007813 63zm187-45.054687v90.195312h-32.867187l-10.410156 185h-34.722657v-123h-16v123h-33.078125l-10.929687-185h-32.992188v-90.195312c0-30.03125 24.570313-54.804688 54.601563-54.804688h61.945312c30.03125 0 54.453125 24.773438 54.453125 54.804688zm-85.6875-168.242188c21.457031 0 38.851563 17.390625 38.851563 38.847657 0 21.457031-17.394532 38.851562-38.847656 38.851562-21.457032 0-38.851563-17.394531-38.851563-38.851562.027344-21.445313 17.402344-38.824219 38.847656-38.847657zm-160.796875-6.761719c41.113282-.09375 80.089844 18.300782 106.148438 50.097657 1.34375 16.152343 9.804687 30.871093 23.089844 40.15625 1.683593 4.617187 3.121093 9.941406 4.300781 13.941406h-3.453125c-5.535156.0625-11.042969.773437-16.410156 2.121094-14.039063-51.203125-60.582032-86.699219-113.675782-86.699219-64.964844 0-117.816406 52.898438-117.816406 117.859375 0 64.957031 52.78125 117.835937 117.746094 117.835937 20.945312.074219 41.519531-5.507812 59.554687-16.15625v22.3125c-18.566406 8.976563-38.929687 13.617188-59.554687 13.574219-75.828125 0-137.488282-61.691406-137.488282-137.523437 0-75.828125 61.726563-137.519532 137.558594-137.519532zm0 0"></path></svg>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div ng-click="managerclicktab('6')" class="col-md-6">
                                       <div class="leaves-box pt MaldivesColor ">
                                          <div class="employer-box">
                                             <div class="employer-num">
												<h2>My Team</h2>
                                                <h1><span>{{ mteam }}</span></h1>
												<svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m151 120c0-33.084-26.916-60-60-60s-60 26.916-60 60 26.916 60 60 60 60-26.916 60-60zm-60 30c-16.542 0-30-13.458-30-30s13.458-30 30-30 30 13.458 30 30-13.458 30-30 30z"></path><path d="m481 120c0-33.084-26.916-60-60-60s-60 26.916-60 60 26.916 60 60 60 60-26.916 60-60zm-60 30c-16.542 0-30-13.458-30-30s13.458-30 30-30 30 13.458 30 30-13.458 30-30 30z"></path><path d="m421 180c-27.713 0-52.536 12.594-69.059 32.355-16.379-36.706-53.219-62.355-95.941-62.355s-79.562 25.649-95.941 62.355c-16.523-19.761-41.346-32.355-69.059-32.355-49.915 0-91 40.422-91 90v75c0 8.284 6.716 15 15 15h16.407l13.666 138.473c.757 7.676 7.213 13.527 14.927 13.527h61c7.714 0 14.17-5.851 14.927-13.527l13.666-138.473h50.09l11.368 138.229c.639 7.782 7.141 13.771 14.949 13.771h60c7.808 0 14.31-5.989 14.949-13.771l11.369-138.229h50.089l13.665 138.473c.758 7.676 7.214 13.527 14.928 13.527h61c7.714 0 14.17-5.851 14.928-13.527l13.665-138.473h16.407c8.284 0 15-6.716 15-15v-75c0-49.519-41.033-90-91-90zm-285 150c-7.714 0-14.17 5.851-14.927 13.527l-13.666 138.473h-33.814l-13.666-138.473c-.757-7.676-7.213-13.527-14.927-13.527h-15v-60c0-33.084 27.364-60 61-60 33.084 0 60 26.916 60 60v60zm162.501 0c-7.808 0-14.31 5.989-14.949 13.771l-11.369 138.229h-32.366l-11.368-138.229c-.64-7.781-7.142-13.771-14.95-13.771h-32.499v-75c0-36.219 25.808-66.522 60-73.491v73.491c0 8.284 6.716 15 15 15s15-6.716 15-15v-73.491c34.192 6.968 60 37.271 60 73.491v75zm183.499 0h-15c-7.714 0-14.17 5.851-14.928 13.527l-13.665 138.473h-33.814l-13.665-138.473c-.758-7.676-7.214-13.527-14.928-13.527h-15v-60c0-33.084 26.916-60 60-60 33.636 0 61 26.916 61 60z"></path><path d="m331 75c0-41.355-33.645-75-75-75s-75 33.645-75 75 33.645 75 75 75 75-33.645 75-75zm-75 45c-24.813 0-45-20.187-45-45s20.187-45 45-45 45 20.187 45 45-20.187 45-45 45z"></path></g></svg>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="graph-wrap">
                              <div class="dashboard-grap dashboardnograph">
                                 <div class="nograph">
                                    <p>No Data found. Please choose date & Click on any entity to see the complete record.</p>
                                 </div>
                              </div>
                              <div style="display:none" class="dashboard-grap totaltasktome">
                                 <div id="chartContainertotaltasktome" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap totaltaskbyme">
                                 <div id="chartContainertotaltaskbyme" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap dsrgrpah">
                                 <div id="chartContainerdsr" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap projectgrpah">
                                 <div id="chartContainerproject" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap leavereqgrpah">
                                 <div id="chartContainerleaverequest" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap myteamgraph">
                                 <div id="chartContainermyteam" style="height:100%;width: 100%;"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- add -->
         </div>
      </div>
   </div>
   <!-- sales team dashboard -->
   <?php }
      else if($this->session->userdata['clientloggedin']['access'] == 6  )
      {
        ?>
   <!--************************project manager dashboard start*************************-->
   <div class="dash-board projectmanagerdashboard" >
		<div class="full-container">
			<div class="employer-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="h4-win PageHeading">Dashboard</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="DashboardSearch">
								<div class="form-group">
									<input readonly ng-model="managerstartdate" placeholder="Please enter start date" type="text" name="start" class="form-control dashboardstartdate" >
								</div>
								<div class="form-group">
									<input  type="button" ng-click="getmanagerdatewise()" name="submit" value="submit" class="btn btn-success" >
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
         <div class="col-md-12">
           <!-- add -->
            <div class="full-container">
               <div class="employer-section">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="dashbord-wrapper">
								<div class="dashbord-inner-wrap">
									<div class="row">
										<div ng-click="managerclicktab('1')" class="col-md-3">
										   <div class="dashboard-wrap AquaColor pt">
											  <div class="employer-box">
												 <div class="employer-num">
													<h2>Project</h2>
													<h1><span>{{ mtotaltask }}</span></h1>
													<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
	<g>
		<g>
			<g>
				<path d="M45.33,283.02l-39.696,40.92c-7.675,7.913-7.484,20.55,0.429,28.226c3.878,3.763,8.889,5.634,13.897,5.634
					c5.21,0,10.416-2.028,14.329-6.062l39.696-40.92c7.675-7.913,7.484-20.55-0.429-28.226
					C65.643,274.915,53.006,275.107,45.33,283.02z"/>
				<path d="M137.731,295.92c-11.023,0-19.961,8.937-19.961,19.961v175.658c0,11.023,8.937,19.961,19.961,19.961h0.001
					c11.023,0,19.961-8.937,19.961-19.961l-0.002-175.659C157.691,304.857,148.755,295.92,137.731,295.92z"/>
				<path d="M215.579,252.007c-11.023,0-19.961,8.937-19.961,19.961v219.571c0,11.023,8.937,19.961,19.961,19.961
					s19.961-8.937,19.961-19.961V271.967C235.539,260.944,226.603,252.007,215.579,252.007z"/>
				<path d="M452.116,0.498h-59.883c-11.024,0-19.961,8.937-19.961,19.961s8.937,19.961,19.961,19.961h52.61L298.273,186.959
					c-3.932,3.933-9.078,6.17-14.167,6.17c-0.107,0-0.216-0.001-0.323-0.003c-4.901-0.092-9.91-2.339-13.738-6.168l-23.468-23.468
					c-11.489-11.489-26.741-18.149-41.848-18.273c-0.147-0.001-0.293-0.001-0.439-0.001c-15.636,0-31.25,6.835-42.919,18.799
					l-42.776,42.969c-7.778,7.813-7.75,20.451,0.063,28.229c3.894,3.877,8.988,5.815,14.082,5.815c5.123,0,10.246-1.961,14.146-5.879
					l42.854-43.046c0.059-0.058,0.116-0.117,0.174-0.176c4.168-4.293,9.6-6.839,14.488-6.79c4.651,0.038,9.865,2.498,13.948,6.581
					l23.468,23.468c11.226,11.227,25.866,17.568,41.223,17.854c15.969,0.3,31.822-6.209,43.463-17.852L472.077,69.644v49.622
					c0,11.024,8.937,19.961,19.961,19.961s19.961-8.937,19.961-19.961V60.381C511.999,27.362,485.136,0.498,452.116,0.498z"/>
				<path d="M58.952,385.746c-11.05-0.038-20.029,8.91-20.029,19.961v85.832c0,11.023,8.937,19.961,19.961,19.961h0.001
					c11.024,0,19.961-8.937,19.961-19.961v-85.832C78.845,394.709,69.951,385.783,58.952,385.746z"/>
				<path d="M451.118,171.165c-11.024,0-19.961,8.937-19.961,19.961V491.54c0,11.023,8.937,19.961,19.961,19.961h0.001
					c11.023,0,19.961-8.937,19.961-19.961V191.126C471.079,180.101,462.143,171.165,451.118,171.165z"/>
				<path d="M293.426,276.958c-11.024,0-19.961,8.937-19.961,19.961v194.62c0,11.023,8.937,19.961,19.961,19.961h0.001
					c11.023,0,19.961-8.937,19.961-19.961v-194.62C313.387,285.895,304.451,276.958,293.426,276.958z"/>
				<path d="M372.2,239.032c-10.996,0.04-19.888,8.966-19.888,19.961V491.54c0,11.023,8.937,19.961,19.961,19.961h0.001
					c11.023,0,19.961-8.937,19.961-19.961V258.993C392.233,247.94,383.252,238.991,372.2,239.032z"/>
			</g>
		</g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	</svg>
												 </div>
											  </div>
										   </div>
										</div>
										<div ng-click="managerclicktab('2')" class="col-md-3">
										   <div class="attendance-wrap VioletRedColor pt">
											  <div class="employer-box">
												<div class="employer-num">
													<h2>Milestone Due</h2>
													<h1><span>{{ mtotaltaskbyme }}</span></h1>
													<svg id="Layer_5" enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m23 46v-5c2.757 0 5-2.243 5-5v-10c0-5.093-3.484-9.376-8.19-10.623 1.933-1.461 3.19-3.772 3.19-6.377 0-4.411-3.589-8-8-8s-8 3.589-8 8c0 2.498 1.152 4.73 2.951 6.199-5.088.963-8.951 5.436-8.951 10.801v3c0 2.757 2.243 5 5 5h1v4 1 19.5c0 2.481 2.019 4.5 4.5 4.5 1.421 0 2.675-.675 3.5-1.706.825 1.031 2.079 1.706 3.5 1.706 1.953 0 3.602-1.258 4.224-3h28.553l11.667-7-11.667-7zm0 8h27v4h-27zm27-6v4h-27v-4zm-41-39c0-3.309 2.691-6 6-6s6 2.691 6 6-2.691 6-6 6-6-2.691-6-6zm4.5 25c1.93 0 3.5-1.57 3.5-3.5s-1.57-3.5-3.5-3.5h-4.5v-2h8v5.5 6.5h-8v-3zm-2 27c-1.378 0-2.5-1.122-2.5-2.5v-19.5h5v1 18.5c0 1.378-1.122 2.5-2.5 2.5zm9.5-38v35.5c0 1.378-1.122 2.5-2.5 2.5s-2.5-1.122-2.5-2.5v-18.5-1h3v-16h-12v4h-2v2h8.5c.827 0 1.5.673 1.5 1.5s-.673 1.5-1.5 1.5h-7.5c-1.654 0-3-1.346-3-3v-3c0-4.962 4.038-9 9-9h3 2c4.962 0 9 4.038 9 9v10c0 1.654-1.346 3-3 3v-16zm31 34.234v-8.468l7.056 4.234z"/><path d="m49 28h-16v14h16zm-2 12h-12v-10h12z"/><path d="m49 13.414 4.707-4.707-1.414-1.414-3.293 3.293v-.586h-16v14h16zm-14 8.586v-10h12v.586l-6 6-3.293-3.293-1.414 1.414 4.707 4.707 6-6v6.586z"/><path d="m51 28h12v2h-12z"/><path d="m51 22h12v2h-12z"/><path d="m51 18h12v2h-12z"/><path d="m51 14h12v2h-12z"/><path d="m55 10h8v2h-8z"/><path d="m51 32h12v2h-12z"/><path d="m61 36h2v2h-2z"/><path d="m51 36h8v2h-8z"/><path d="m51 40h12v2h-12z"/></svg>
												 </div>
											  </div>
										   </div>
										</div>
										<div ng-click="managerclicktab('3')" class="col-md-3">
										   <div class="encrement-box LightBlueColor pt">
												<div class="employer-box">
													<div class="employer-num">
														<h2>Open Task</h2>
														<h1><span>{{ mdsr }}</span></h1>
														<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 viewBox="0 0 438.891 438.891" style="enable-background:new 0 0 438.891 438.891;" xml:space="preserve">
	<g>
		<g>
			<g>
				<path d="M347.968,57.503h-39.706V39.74c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347
					c-20.668-0.777-39.467,11.896-46.498,31.347h-30.302c-5.747,0-11.494,2.612-11.494,8.359v17.763H90.923
					c-23.53,0.251-42.78,18.813-43.886,42.318v299.363c0,22.988,20.898,39.706,43.886,39.706h257.045
					c22.988,0,43.886-16.718,43.886-39.706V99.822C390.748,76.316,371.498,57.754,347.968,57.503z M151.527,52.279h28.735
					c5.016-0.612,9.045-4.428,9.927-9.404c3.094-13.474,14.915-23.146,28.735-23.51c13.692,0.415,25.335,10.117,28.212,23.51
					c0.937,5.148,5.232,9.013,10.449,9.404h29.78v41.796H151.527V52.279z M370.956,399.185c0,11.494-11.494,18.808-22.988,18.808
					H90.923c-11.494,0-22.988-7.314-22.988-18.808V99.822c1.066-11.964,10.978-21.201,22.988-21.42h39.706v26.645
					c0.552,5.854,5.622,10.233,11.494,9.927h154.122c5.98,0.327,11.209-3.992,12.016-9.927V78.401h39.706
					c12.009,0.22,21.922,9.456,22.988,21.42V399.185z"/>
				<path d="M164.588,233.046l-33.437,31.869l-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522
					c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135c2.756-0.039,5.385-1.166,7.314-3.135
					l40.751-38.661c0.21-0.192,0.411-0.394,0.603-0.603c3.706-4.04,3.436-10.319-0.603-14.025
					C175.298,229.437,168.792,229.205,164.588,233.046z"/>
				<path d="M329.16,256.034H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,256.034,329.16,256.034z"/>
				<path d="M329.16,172.442H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,172.442,329.16,172.442z"/>
				<path d="M164.588,316.638l-33.437,31.869l-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522
					c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135c2.756-0.039,5.385-1.166,7.314-3.135
					l40.751-38.661c0.21-0.192,0.411-0.394,0.603-0.603c3.706-4.04,3.436-10.319-0.603-14.025
					C175.298,313.029,168.792,312.797,164.588,316.638z"/>
				<path d="M329.16,339.626H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,339.626,329.16,339.626z"/>
				<path d="M107.641,220.507h62.171c0.358,0.019,0.716,0.019,1.074,0c5.474-0.297,9.672-4.975,9.375-10.449v-56.424
					c0-5.771-4.678-10.449-10.449-10.449h-62.171c-5.771,0-10.449,4.678-10.449,10.449v56.424c-0.019,0.358-0.019,0.716,0,1.074
					C97.489,216.607,102.167,220.804,107.641,220.507z M118.09,164.083h41.273v35.526H118.09V164.083z"/>
			</g>
		</g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	</svg>
													</div>
												</div>
										   </div>
										</div>
										<div ng-click="managerclicktab('4')" class="col-md-3">
										   <div class="encrement-box RedColor pt">
												<div class="employer-box">
													<div class="employer-num">
														<h2>Bugs</h2>
														<h1><span>{{ mdsr }}</span></h1>
														<svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m500.297 475.702-12.969-34.414c-1.461-3.875-5.786-5.833-9.663-4.373-3.876 1.46-5.834 5.787-4.373 9.663l12.969 34.414c1.39 3.689.901 7.665-1.342 10.907s-5.791 5.101-9.733 5.101c-4.88 0-9.198-2.931-11-7.466l-26.334-66.303c-2.976-7.494-10.109-12.335-18.172-12.335h-20.992c1.215-6.405 1.858-13.009 1.858-19.762v-4.981h29.103c12.483 0 23.827 7.848 28.229 19.528l3.358 8.911c1.461 3.875 5.787 5.834 9.663 4.373 3.876-1.46 5.834-5.787 4.374-9.663l-3.358-8.911c-6.59-17.488-23.576-29.238-42.265-29.238h-29.103v-47.058l25.45-11.914c1.7-.797 3.684-.479 5.051.807l21.255 19.996c5.179 4.872 11.833 7.417 18.599 7.417 3.91 0 7.858-.85 11.58-2.592 8.088-3.786 13.804-11.304 15.292-20.109s-1.442-17.783-7.837-24.016l-27.443-26.749c-13.384-13.044-33.749-16.485-50.675-8.561l-11.27 5.276v-64.186h25.919c18.689 0 35.674-11.75 42.265-29.238l14.961-39.698c3.145-8.345 1.993-17.706-3.081-25.04s-13.427-11.713-22.345-11.713c-11.205 0-21.117 6.729-25.252 17.142l-12.285 30.932c-.693 1.745-2.354 2.873-4.232 2.873l-84.412.005v-19.079c0-20.549-8.432-39.161-22.01-52.575l10.377-6.549c8.756-5.525 13.983-15.005 13.983-25.359v-33.665c0-4.142-3.358-7.5-7.5-7.5-4.143 0-7.5 3.358-7.5 7.5v33.664c0 5.174-2.613 9.912-6.989 12.673l-14.807 9.344c-11.437-7.258-24.981-11.482-39.5-11.482h-4.278c-14.52 0-28.064 4.223-39.501 11.482l-14.807-9.344c-4.376-2.761-6.989-7.499-6.989-12.673v-33.664c0-4.142-3.357-7.5-7.5-7.5-4.142 0-7.5 3.358-7.5 7.5v33.664c0 10.354 5.228 19.833 13.983 25.359l10.377 6.548c-13.578 13.414-22.01 32.026-22.01 52.575v19.074h-84.413c-1.877 0-3.539-1.127-4.232-2.873l-12.285-30.932c-4.136-10.413-14.048-17.142-25.252-17.142-8.918 0-17.271 4.378-22.345 11.713-5.074 7.334-6.226 16.695-3.081 25.041l2.145 5.69c1.46 3.875 5.788 5.834 9.663 4.373 3.876-1.46 5.834-5.787 4.373-9.663l-2.144-5.69c-1.43-3.794-.927-7.883 1.38-11.217s5.955-5.247 10.009-5.247c5.019 0 9.459 3.014 11.312 7.679l12.286 30.932c2.977 7.494 10.109 12.335 18.172 12.335h28.946c-6.33 6.714-10.735 15.255-12.328 24.743h-26.589c-12.482 0-23.826-7.848-28.229-19.528l-1.639-4.351c-1.46-3.876-5.787-5.834-9.663-4.374s-5.834 5.787-4.374 9.663l1.64 4.351c6.591 17.488 23.576 29.238 42.265 29.238h25.92v64.186l-11.271-5.276c-16.927-7.925-37.291-4.484-50.675 8.561l-27.443 26.749c-6.395 6.233-9.325 15.21-7.837 24.016s7.204 16.323 15.292 20.109c3.722 1.743 7.668 2.593 11.58 2.592 6.765 0 13.421-2.545 18.599-7.417l21.255-19.996c1.368-1.286 3.351-1.603 5.05-.808l25.451 11.915v47.058h-29.104c-18.689 0-35.675 11.75-42.265 29.238l-28.381 75.312c-3.106 8.242-1.969 17.487 3.042 24.73 5.01 7.246 13.26 11.57 22.068 11.57 11.066 0 20.855-6.645 24.94-16.929l26.334-66.303c.693-1.745 2.354-2.873 4.231-2.873h25.006c14.414 41.32 53.767 71.05 99.939 71.05h77.471c46.172 0 85.525-29.73 99.939-71.05h25.006c1.877 0 3.539 1.127 4.231 2.873l26.334 66.303c4.086 10.284 13.875 16.929 24.941 16.929 8.808 0 17.058-4.324 22.069-11.568 5.011-7.243 6.148-16.488 3.042-24.73zm-82.12-203.744c11.305-5.292 24.907-2.995 33.846 5.718l27.444 26.749c2.912 2.838 4.194 6.766 3.516 10.775-.677 4.01-3.178 7.299-6.861 9.023-4.56 2.134-9.874 1.284-13.541-2.165l-21.254-19.996c-3.722-3.501-8.504-5.331-13.366-5.331-2.81 0-5.647.611-8.322 1.863l-19.09 8.937v-27.321zm16.492-124.574 12.286-30.932c1.853-4.665 6.292-7.679 11.312-7.679 4.054 0 7.703 1.912 10.009 5.247 2.307 3.334 2.81 7.423 1.38 11.217l-14.96 39.698c-4.402 11.681-15.746 19.528-28.229 19.528h-26.588c-1.593-9.488-5.998-18.029-12.328-24.743h28.946c8.063 0 15.195-4.842 18.172-12.336zm-180.808-80.684h4.278c32.503 0 58.946 26.443 58.946 58.946v19.079h-122.17v-19.079c0-32.503 26.443-58.946 58.946-58.946zm-161.5 231.894c-7.303-3.417-15.815-2.057-21.688 3.468l-21.255 19.996c-3.666 3.449-8.98 4.299-13.54 2.165-3.683-1.724-6.184-5.013-6.861-9.023-.678-4.009.604-7.937 3.517-10.775l27.443-26.749c5.734-5.588 13.386-8.538 21.119-8.538 4.323 0 8.673.922 12.727 2.819l17.63 8.253v27.321zm-.042 112.301c-8.062 0-15.196 4.842-18.172 12.335l-26.333 66.303c-1.802 4.536-6.119 7.466-11 7.466-3.942 0-7.49-1.859-9.733-5.102s-2.732-7.218-1.342-10.907l28.381-75.312c4.402-11.678 15.747-19.526 28.23-19.526h29.104v4.981c0 6.753.643 13.357 1.858 19.762zm293.228-19.762c0 50.074-40.738 90.812-90.812 90.812h-31.235v-65.697c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v65.697h-31.235c-50.074 0-90.812-40.738-90.812-90.812v-198.758c0-18.003 14.646-32.65 32.649-32.65h89.398v35.551c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-35.551h89.397c18.003 0 32.65 14.646 32.65 32.65z"/><path d="m268.591 224.375c-2.564-4.526-7.388-7.338-12.59-7.338-5.202 0-10.026 2.812-12.591 7.338l-81.652 144.16c-2.566 4.53-2.533 9.92.089 14.418s7.295 7.184 12.501 7.184h163.306c5.207 0 9.879-2.686 12.501-7.184s2.655-9.888.089-14.418zm-93.335 150.761 80.744-142.554 80.744 142.555h-161.488z"/><path d="m248.5 285.056v33.785c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-33.785c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5z"/><path d="m256 338.279c-4.142 0-7.5 3.358-7.5 7.5v3.011c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-3.011c0-4.142-3.358-7.5-7.5-7.5z"/></g></g></svg>
													</div>
												</div>
										   </div>
										</div>
										<div ng-click="managerclicktab('7')" class="col-md-3">
                                       <div class="encrement-box GreenColor pt">
											<div class="employer-box">
												<div class="employer-num">
													<h2>Payment</h2>
													<h1><span>{{ mdsr }}</span></h1>
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="512" height="512"><g id="_22-mobile" data-name="22-mobile"><g id="linear_color" data-name="linear color"><path d="M290.043,446.021H239.087a10,10,0,1,0,0,20h50.956a10,10,0,0,0,0-20Z"/><path d="M464,166c-20.163,0-37.592,5.643-50.4,16.317-1.181.985-2.387,2.076-3.6,3.267V32A26.076,26.076,0,0,0,384,6H144a26.076,26.076,0,0,0-26,26V58.6l-1.239-1.239a42,42,0,0,0-59.4,59.4l43.274,43.274a42.017,42.017,0,0,0-17.959,70.035l24.616,24.616a41.993,41.993,0,0,0-24.616,71.384L99.29,342.687a41.993,41.993,0,0,0-24.616,71.384L118,457.4V480a26.029,26.029,0,0,0,26,26H336a10,10,0,0,0,10-10V400a54.26,54.26,0,0,1,21.6-43.2L406,328a10.105,10.105,0,0,0,4-8V240c0-39.827,24.31-50.935,44-53.4V496a10,10,0,0,0,20,0V176A10,10,0,0,0,464,166ZM144,26H384a6.006,6.006,0,0,1,6,6V61.956H138V32A6.006,6.006,0,0,1,144,26ZM65.055,87.06c-.2-19.372,24.011-29.385,37.564-15.559L118,86.883v62.235l-46.5-46.5A21.857,21.857,0,0,1,65.055,87.06Zm31.761,97.756c8.19-8.535,22.924-8.535,31.113,0l45.255,45.255c19.873,21.343-9.852,50.993-31.113,31.113L96.816,215.929A22.027,22.027,0,0,1,96.816,184.816Zm90.51,31.113-10.869-10.87A86.034,86.034,0,1,1,194,266.629,42.072,42.072,0,0,0,187.326,215.929Zm-90.51,64.887c8.19-8.535,22.924-8.535,31.113,0l45.255,45.255c19.873,21.343-9.852,50.993-31.113,31.113L96.816,311.929A22.027,22.027,0,0,1,96.816,280.816Zm-8,88c8.19-8.535,22.924-8.535,31.113,0l45.255,45.255c19.873,21.343-9.852,50.993-31.113,31.113L88.816,399.929A22.027,22.027,0,0,1,88.816,368.816ZM138,480V470a42.155,42.155,0,0,0,11.627,1.633,41.961,41.961,0,0,0,41.82-45.588H326V486H144A6.006,6.006,0,0,1,138,480ZM355.6,340.8A74.353,74.353,0,0,0,326,400v6.04H184.371a41.973,41.973,0,0,0-5.045-6.111L162.71,383.313a41.993,41.993,0,0,0,24.616-71.384L162.71,287.313a41.541,41.541,0,0,0,17.3-6.143,105.966,105.966,0,1,0-20.767-93.326S139.418,168.2,138,167.1V81.956H390V315Z"/><path d="M253,224h17a14.509,14.509,0,0,1,0,29H244.791c-3.493.08-6-3.312-5.488-6.647a10,10,0,0,0-20-.358l-.019,1.036A25.509,25.509,0,0,0,244.791,273H252v6a10,10,0,0,0,20,0v-6.063A34.516,34.516,0,0,0,270,204H253a14,14,0,0,1,0-28h24.811q5.283.441,5.5,5.744a10,10,0,0,0,19.982.86A25.508,25.508,0,0,0,277.811,156H272v-6a10,10,0,0,0-20,0v6.025A33.995,33.995,0,0,0,253,224Z"/></g></g></svg>

												</div>
											</div>
                                       </div>
                                    </div>
										<div ng-click="managerclicktab('5')" class="col-md-3">
											<div class="leaves-box YellowColor pt">
												<div class="employer-box">
													<div class="employer-num">
														<h2>Leave Requests</h2>
														<h1><span>{{ mleave }}</span></h1>
														<svg height="482pt" viewBox="-33 0 482 482.2065" width="482pt" xmlns="http://www.w3.org/2000/svg"><path d="m196.394531 154.207031h-41.25v-55.625c0-4.417969-3.578125-8-8-8-4.417969 0-8 3.582031-8 8v64.105469c0 4.417969 3.992188 7.519531 8.410157 7.519531h48.839843c4.421875 0 8-3.582031 8-8s-3.578125-8-8-8zm0 0"/><path d="m153.589844 307.050781c20.453125-.035156 40.695312-4.125 59.554687-12.03125v2.1875h33.910157l10.929687 185h114.007813l10.410156-185h33.742187v-106.195312c0-38.851563-31.597656-70.804688-70.453125-70.804688h-42.070312c-.398438-1-.835938-3.472656-1.304688-5.28125 28.910156 6.539063 57.777344-11.105469 65.132813-39.820312 7.359375-28.710938-9.460938-58.066407-37.957031-66.234375-28.492188-8.171875-58.3125 7.8125-67.285157 36.0625-28.738281-28.859375-67.820312-45.039063-108.546875-44.933594-84.652344 0-153.558594 68.875-153.558594 153.527344 0 84.648437 68.835938 153.523437 153.488282 153.523437zm59.554687-70.984375c-17.261719 12.660156-38.144531 19.417969-59.554687 19.277344-52.902344 0-96.992188-40.511719-101.453125-93.226562-4.464844-52.714844 32.1875-100.066407 84.339843-108.957032 52.152344-8.890625 102.421876 23.640625 115.675782 74.855469-23.863282 11.941406-38.957032 36.316406-39.007813 63zm187-45.054687v90.195312h-32.867187l-10.410156 185h-34.722657v-123h-16v123h-33.078125l-10.929687-185h-32.992188v-90.195312c0-30.03125 24.570313-54.804688 54.601563-54.804688h61.945312c30.03125 0 54.453125 24.773438 54.453125 54.804688zm-85.6875-168.242188c21.457031 0 38.851563 17.390625 38.851563 38.847657 0 21.457031-17.394532 38.851562-38.847656 38.851562-21.457032 0-38.851563-17.394531-38.851563-38.851562.027344-21.445313 17.402344-38.824219 38.847656-38.847657zm-160.796875-6.761719c41.113282-.09375 80.089844 18.300782 106.148438 50.097657 1.34375 16.152343 9.804687 30.871093 23.089844 40.15625 1.683593 4.617187 3.121093 9.941406 4.300781 13.941406h-3.453125c-5.535156.0625-11.042969.773437-16.410156 2.121094-14.039063-51.203125-60.582032-86.699219-113.675782-86.699219-64.964844 0-117.816406 52.898438-117.816406 117.859375 0 64.957031 52.78125 117.835937 117.746094 117.835937 20.945312.074219 41.519531-5.507812 59.554687-16.15625v22.3125c-18.566406 8.976563-38.929687 13.617188-59.554687 13.574219-75.828125 0-137.488282-61.691406-137.488282-137.523437 0-75.828125 61.726563-137.519532 137.558594-137.519532zm0 0"/></svg>
													</div>
												</div>
											</div>
										</div>
										<div ng-click="managerclicktab('6')" class="col-md-3">
											<div class="leaves-box MaldivesColor pt">
												<div class="employer-box">
													<div class="employer-num">
														<h2>My Team</h2>
														<h1><span>{{ mteam }}</span></h1>
														<svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m151 120c0-33.084-26.916-60-60-60s-60 26.916-60 60 26.916 60 60 60 60-26.916 60-60zm-60 30c-16.542 0-30-13.458-30-30s13.458-30 30-30 30 13.458 30 30-13.458 30-30 30z"/><path d="m481 120c0-33.084-26.916-60-60-60s-60 26.916-60 60 26.916 60 60 60 60-26.916 60-60zm-60 30c-16.542 0-30-13.458-30-30s13.458-30 30-30 30 13.458 30 30-13.458 30-30 30z"/><path d="m421 180c-27.713 0-52.536 12.594-69.059 32.355-16.379-36.706-53.219-62.355-95.941-62.355s-79.562 25.649-95.941 62.355c-16.523-19.761-41.346-32.355-69.059-32.355-49.915 0-91 40.422-91 90v75c0 8.284 6.716 15 15 15h16.407l13.666 138.473c.757 7.676 7.213 13.527 14.927 13.527h61c7.714 0 14.17-5.851 14.927-13.527l13.666-138.473h50.09l11.368 138.229c.639 7.782 7.141 13.771 14.949 13.771h60c7.808 0 14.31-5.989 14.949-13.771l11.369-138.229h50.089l13.665 138.473c.758 7.676 7.214 13.527 14.928 13.527h61c7.714 0 14.17-5.851 14.928-13.527l13.665-138.473h16.407c8.284 0 15-6.716 15-15v-75c0-49.519-41.033-90-91-90zm-285 150c-7.714 0-14.17 5.851-14.927 13.527l-13.666 138.473h-33.814l-13.666-138.473c-.757-7.676-7.213-13.527-14.927-13.527h-15v-60c0-33.084 27.364-60 61-60 33.084 0 60 26.916 60 60v60zm162.501 0c-7.808 0-14.31 5.989-14.949 13.771l-11.369 138.229h-32.366l-11.368-138.229c-.64-7.781-7.142-13.771-14.95-13.771h-32.499v-75c0-36.219 25.808-66.522 60-73.491v73.491c0 8.284 6.716 15 15 15s15-6.716 15-15v-73.491c34.192 6.968 60 37.271 60 73.491v75zm183.499 0h-15c-7.714 0-14.17 5.851-14.928 13.527l-13.665 138.473h-33.814l-13.665-138.473c-.758-7.676-7.214-13.527-14.928-13.527h-15v-60c0-33.084 26.916-60 60-60 33.636 0 61 26.916 61 60z"/><path d="m331 75c0-41.355-33.645-75-75-75s-75 33.645-75 75 33.645 75 75 75 75-33.645 75-75zm-75 45c-24.813 0-45-20.187-45-45s20.187-45 45-45 45 20.187 45 45-20.187 45-45 45z"/></g></svg>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                              <!-- leaves html -->
                              <div class="leaves-wrapper">
                                 <div class="row">

                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="graph-wrap">
                              <div class="dashboard-grap dashboardnograph">
                                 <div class="nograph">
                                    <p>No Data found. Please choose date & Click on any entity to see the complete record.</p>
                                 </div>
                              </div>
                              <div style="display:none" class="dashboard-grap totaltasktome">
                                 <div id="chartContainertotaltasktome" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap totaltaskbyme">
                                 <div id="chartContainertotaltaskbyme" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap dsrgrpah OpenTaskData">
								<h3 class="TaskHead">Task List</h3>
									<div class="table-responsive OpenTaskDataTAble">
										<table class="table">
											<thead>
												<tr>
													<th>Sr.</th>
													<th>Name</th>
													<th>Title</th>
													<th>Description</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td><span class="NameDesign">A</span></td>
													<td>Annabelle Doney</td>
													<td>Chrome fixed the bug several versions ago, thus rendering this...</td>
													<td><a href="javascript:void(0);"><i class="fa fa-eye"></i></a></td>
												</tr>
												<tr>
													<td>2</td>
													<td><span class="NameDesign">A</span></td>
													<td>Annabelle Doney</td>
													<td>Chrome fixed the bug several versions ago, thus rendering this...</td>
													<td><a href="javascript:void(0);"><i class="fa fa-eye"></i></a></td>
												</tr>
												<tr>
													<td>3</td>
													<td><span class="NameDesign">A</span></td>
													<td>Annabelle Doney</td>
													<td>Chrome fixed the bug several versions ago, thus rendering this...</td>
													<td><a href="javascript:void(0);"><i class="fa fa-eye"></i></a></td>
												</tr>
												<tr>
													<td>4</td>
													<td><span class="NameDesign">A</span></td>
													<td>Annabelle Doney</td>
													<td>Chrome fixed the bug several versions ago, thus rendering this...</td>
													<td><a href="javascript:void(0);"><i class="fa fa-eye"></i></a></td>
												</tr>
											</tbody>
										</table>
									</div>
                              </div>
                              <div style="display:none" class="dashboard-grap projectgrpah">
                                 <div id="chartContainerproject" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap leavereqgrpah">
                                 <div id="chartContainerleaverequest" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap myteamgraph">
                                 <div id="chartContainermyteam" style="height:100%;width: 100%;"></div>
                              </div>
							  <!--div style="display:block" class="dashboard-grap payment">
									<div class="paymentSec">
										<div id="chartContainerPayment" style="height: 100%; width: 100%;"></div>
									</div>
									<div class="paymentSec ClientPayment">
										<div id="chartContainermyteam" style="height:100%;width: 100%;"></div>
									</div>
                              </div-->

                           </div>
                        </div>
					</div>

					<div class="row">
						<!-- notification -->
                        <div class="col-lg-12 col-md-12">
                           <div class="mt-3">
                              <div class="Leaves common-l bg-white">
                                 <div class="heading mb-2">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <h4 class="h4-head">Notifications</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                    if(!empty($notification))
                                    {
                                      foreach($notification as $n)
                                      {
                                       ?>
                                 <div class="notification-content mx-2">
                                    <ul class="un-style mb-0 list-unstyled d-flex">
                                       <!-- <li class="">
                                          <div class="john-img">
                                              <?php if($n->logo != '')
                                             {
                                               ?>
                                              <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $n->logo; ?>">
                                              <?php }
                                             else
                                             {
                                             ?>
                                              <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg">
                                              <?php
                                             }
                                             ?>
                                          </div>
                                          </li> -->
                                       <li class="pl-2">
                                          <div class="not-content">
                                             <span>
                                             <?php echo $newDate = date("d-m-Y", strtotime($n->notificationDate));  ?></span>
                                             <p>
                                                <?php echo $n->notificationMessage; ?>
                                             </p>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                                 <?php }
                                    }
                                    else
                                    {
                                    ?>
                                 <div class="notification-content mx-2">
                                    <p>No Notification</p>
                                 </div>
                                 <?php
                                    }
                                    if(!empty($notification))
                                    {
                                    ?>
                                 <div class="border-top text-right p-3">
                                    <a href="javascript:void(0);">View All</a>
                                 </div>
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
                        <!-- notification -->
					</div>

                  </div>
               </div>
            </div>
            <!-- add -->
         </div>
      </div>
   </div>
   <?php }
      else if($this->session->userdata['clientloggedin']['access'] == 3)
      {
      ?>
   <!--************************ manager dashboard *************************-->


   <!--************************ Employee dashboard *************************-->
   <div class="dash-board projectmanagerdashboard  Employeedashboard" >

		<div class="full-container">
			<div class="employer-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="h4-win PageHeading">Dashboard</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="DashboardSearch">
								<div class="form-group">
									<input readonly ng-model="employeestartdate" placeholder="Please enter start date" type="text" name="start" class="form-control dashboardstartdate" >
								</div>
								<div class="form-group">
									<input  type="button" ng-click="getempdatewise()" name="submit" value="submit" class="btn btn-success" >
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

      <div class="row">
         <div class="col-md-12">
            <!-- add -->
            <div class="full-container">
               <div class="employer-section">
                  <div class="container">
						<div class="row">
							<div class="col-md-12">
							   <div class="dashbord-wrapper">
								  <div class="dashbord-inner-wrap">
									 <div class="row">
										<div ng-click="empclicktab('1')" class="col-md-6">
										   <div class="dashboard-wrap pt AquaColor">
											  <div class="employer-box">
												 <div class="employer-num">
													<h2>Today's Tasks 1</h2>
													<h1><span>{{ emptotaltask }}</span></h1>
													<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.891 438.891" style="enable-background:new 0 0 438.891 438.891;" xml:space="preserve">
	<g>
		<g>
			<g>
				<path d="M347.968,57.503h-39.706V39.74c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347
					c-20.668-0.777-39.467,11.896-46.498,31.347h-30.302c-5.747,0-11.494,2.612-11.494,8.359v17.763H90.923
					c-23.53,0.251-42.78,18.813-43.886,42.318v299.363c0,22.988,20.898,39.706,43.886,39.706h257.045
					c22.988,0,43.886-16.718,43.886-39.706V99.822C390.748,76.316,371.498,57.754,347.968,57.503z M151.527,52.279h28.735
					c5.016-0.612,9.045-4.428,9.927-9.404c3.094-13.474,14.915-23.146,28.735-23.51c13.692,0.415,25.335,10.117,28.212,23.51
					c0.937,5.148,5.232,9.013,10.449,9.404h29.78v41.796H151.527V52.279z M370.956,399.185c0,11.494-11.494,18.808-22.988,18.808
					H90.923c-11.494,0-22.988-7.314-22.988-18.808V99.822c1.066-11.964,10.978-21.201,22.988-21.42h39.706v26.645
					c0.552,5.854,5.622,10.233,11.494,9.927h154.122c5.98,0.327,11.209-3.992,12.016-9.927V78.401h39.706
					c12.009,0.22,21.922,9.456,22.988,21.42V399.185z"></path>
				<path d="M164.588,233.046l-33.437,31.869l-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522
					c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135c2.756-0.039,5.385-1.166,7.314-3.135
					l40.751-38.661c0.21-0.192,0.411-0.394,0.603-0.603c3.706-4.04,3.436-10.319-0.603-14.025
					C175.298,229.437,168.792,229.205,164.588,233.046z"></path>
				<path d="M329.16,256.034H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,256.034,329.16,256.034z"></path>
				<path d="M329.16,172.442H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,172.442,329.16,172.442z"></path>
				<path d="M164.588,316.638l-33.437,31.869l-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522
					c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135c2.756-0.039,5.385-1.166,7.314-3.135
					l40.751-38.661c0.21-0.192,0.411-0.394,0.603-0.603c3.706-4.04,3.436-10.319-0.603-14.025
					C175.298,313.029,168.792,312.797,164.588,316.638z"></path>
				<path d="M329.16,339.626H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
					c5.771,0,10.449-4.678,10.449-10.449S334.931,339.626,329.16,339.626z"></path>
				<path d="M107.641,220.507h62.171c0.358,0.019,0.716,0.019,1.074,0c5.474-0.297,9.672-4.975,9.375-10.449v-56.424
					c0-5.771-4.678-10.449-10.449-10.449h-62.171c-5.771,0-10.449,4.678-10.449,10.449v56.424c-0.019,0.358-0.019,0.716,0,1.074
					C97.489,216.607,102.167,220.804,107.641,220.507z M118.09,164.083h41.273v35.526H118.09V164.083z"></path>
			</g>
		</g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	</svg>
												 </div>
											  </div>
										   </div>
										</div>
										<div ng-click="empclicktab('2')" class="col-md-6">
										   <div class="attendance-wrap pt VioletRedColor">
											  <div class="employer-box">
												 <div class="employer-num">
												 <h2>My DSR</h2>
													<h1><span>{{ mtotaltaskbyme }}</span></h1>
													<svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m458.617 54.278h-42.681c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h42.681c21.165 0 38.383 17.263 38.383 38.481v286.441c0 21.219-17.219 38.481-38.383 38.481h-405.234c-21.165.002-38.383-17.261-38.383-38.48v-53.095c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v53.095c0 29.49 23.947 53.481 53.383 53.481h152.263l-15.102 49.318h-33.262c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h197.434c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-33.262l-15.101-49.317h152.262c29.436 0 53.383-23.991 53.383-53.481v-286.442c.002-29.49-23.946-53.482-53.381-53.482zm-252.385 442.722 15.102-49.317h69.333l15.101 49.317z"/><path d="m7.5 313.721c4.142 0 7.5-3.357 7.5-7.5v-198.461c0-21.219 17.218-38.481 38.383-38.481h21.779c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-21.779c-29.436-.001-53.383 23.991-53.383 53.481v198.461c0 4.142 3.358 7.5 7.5 7.5z"/><path d="m482.076 106.516c0-13.095-10.638-23.748-23.714-23.748h-26.693c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h26.693c4.805 0 8.714 3.925 8.714 8.748v147.063c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5z"/><path d="m482.076 364.458v-75.57c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v75.57c0 4.824-3.909 8.749-8.714 8.749h-404.724c-4.805 0-8.714-3.925-8.714-8.749v-257.942c0-4.823 3.909-8.748 8.714-8.748h14.125c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-14.125c-13.076 0-23.714 10.653-23.714 23.748v257.942c0 13.096 10.638 23.749 23.714 23.749h404.724c13.076 0 23.714-10.653 23.714-23.749z"/><path d="m64.055 402.976c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h30.639c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path d="m124.055 402.976c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h30.639c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path d="m256.432 343.845c30.467 0 60.405-8.063 86.579-23.318 25.394-14.8 46.72-35.992 61.673-61.284 2.108-3.566.926-8.165-2.639-10.273-3.567-2.107-8.165-.926-10.273 2.639-9.152 15.48-20.919 29.278-34.666 40.764-6.167-2.775-12.569-5.275-19.174-7.492 16.001-29.374 25.182-66.262 26.222-105.456h49.169c-.691 14.696-3.415 29.119-8.124 42.978-1.333 3.922.766 8.182 4.688 9.515.8.271 1.613.4 2.414.4 3.123 0 6.039-1.967 7.1-5.089 6.038-17.766 9.099-36.373 9.099-55.304-.001-94.801-77.19-171.925-172.068-171.925-27.432 0-53.653 6.26-77.936 18.606-21.355 10.858-40.488 26.33-55.656 44.957-2.368-.746-4.887-1.148-7.499-1.148-13.79 0-25.008 11.212-25.008 24.993 0 6.959 2.861 13.262 7.468 17.798-8.919 21.113-13.437 43.527-13.437 66.716 0 94.799 77.189 171.923 172.068 171.923zm-156.89-164.422h49.168c1.04 39.194 10.221 76.082 26.222 105.456-6.581 2.209-12.96 4.699-19.106 7.462-32.694-27.31-54.141-67.633-56.284-112.918zm70.216 123.31c4.277-1.696 8.664-3.258 13.15-4.683 5.101 7.581 10.595 14.282 16.412 20.058-10.442-4.086-20.342-9.257-29.562-15.375zm79.174 25.597c-18.535-2.55-36.097-14.518-50.69-34.529 16.029-3.821 33.071-6.02 50.69-6.506zm0-56.04c-20.666.541-40.632 3.318-59.273 8.201-15.787-27.625-24.884-63.096-25.943-101.068h85.217v20.563c-10.137 3.191-17.509 12.674-17.509 23.845 0 11.17 7.372 20.653 17.509 23.844v24.615zm15 56.04v-41.035c17.619.486 34.661 2.685 50.69 6.506-14.594 20.011-32.155 31.979-50.69 34.529zm79.245-25.569c-2.524 1.675-5.098 3.278-7.72 4.806-7.045 4.106-14.389 7.641-21.957 10.584 5.833-5.786 11.342-12.502 16.455-20.102 4.511 1.434 8.922 3.006 13.222 4.712zm8.472-174.045c-5.519 0-10.008-4.483-10.008-9.993s4.49-9.993 10.008-9.993c5.519 0 10.009 4.483 10.009 9.993s-4.49 9.993-10.009 9.993zm61.672 35.707h-49.169c-.209-7.803-.744-15.569-1.599-23.21 8.342-4.056 14.105-12.613 14.105-22.49 0-13.465-10.709-24.477-24.063-24.975-3.994-12.562-8.923-24.234-14.66-34.782 6.58-2.209 12.958-4.698 19.103-7.46 32.693 27.308 54.14 67.631 56.283 112.917zm-70.216-123.311c-4.277 1.696-8.663 3.257-13.149 4.683-4.239-6.287-8.808-12.04-13.67-17.192-.936-.992-1.881-1.959-2.834-2.902 10.476 4.091 20.407 9.275 29.653 15.411zm-79.173-25.584c18.638 2.626 36.281 14.944 50.647 34.526-16.017 3.815-33.044 6.01-50.647 6.496zm0 56.027c20.661-.541 40.622-3.317 59.259-8.197 5.807 10.155 10.852 21.68 14.924 34.356-6.899 4.454-11.474 12.207-11.474 21.008 0 12.44 9.142 22.786 21.064 24.682.76 6.922 1.242 13.951 1.442 21.018h-85.215zm0 107.868h85.216c-1.06 37.971-10.156 73.442-25.943 101.068-18.641-4.882-38.607-7.66-59.273-8.201v-24.615c10.137-3.191 17.508-12.674 17.508-23.844 0-11.171-7.372-20.653-17.508-23.845zm-7.5 34.415c5.519 0 10.008 4.483 10.008 9.993s-4.49 9.992-10.008 9.992c-5.519 0-10.009-4.482-10.009-9.992s4.49-9.993 10.009-9.993zm-7.5-198.32v41.032c-17.646-.487-34.712-2.692-50.762-6.523 14.332-19.619 31.966-31.909 50.762-34.509zm-63.638 16.46c4.697-2.388 9.473-4.526 14.324-6.414-5.96 5.855-11.552 12.63-16.693 20.237-4.513-1.433-8.926-3.005-13.227-4.712 5.023-3.338 10.232-6.384 15.596-9.111zm-69.954 45.437c5.519 0 10.009 4.483 10.009 9.993s-4.49 9.993-10.009 9.993-10.008-4.483-10.008-9.993 4.49-9.993 10.008-9.993zm-4.146 34.643c1.349.226 2.734.344 4.146.344 13.79 0 25.009-11.212 25.009-24.993 0-5.723-1.935-11.002-5.185-15.22 6.207-7.515 13.123-14.456 20.608-20.707 6.163 2.773 12.561 5.27 19.161 7.486-7.312 13.422-13.378 28.801-17.864 45.784-1.058 4.005 1.332 8.108 5.336 9.166.642.17 1.286.251 1.92.251 3.322 0 6.358-2.224 7.247-5.587 4.499-17.037 10.642-32.267 18.022-45.243 18.66 4.893 38.647 7.676 59.336 8.217v92.868h-85.215c.221-7.792.784-15.544 1.682-23.134.487-4.113-2.452-7.843-6.566-8.33-4.104-.476-7.842 2.454-8.33 6.566-.968 8.17-1.568 16.516-1.792 24.897h-49.172c.843-18.134 4.752-35.692 11.657-52.365z"/><path d="m109.121 298.688h-32.141c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h32.141c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path d="m69.48 341.188c0 4.143 3.358 7.5 7.5 7.5h52.11c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-52.11c-4.142 0-7.5 3.357-7.5 7.5z"/></g></svg>
												 </div>
											  </div>
										   </div>
										</div>
									 </div>
								  </div>
								  <div class="increment-wrapper">
									 <div class="row">
										<div ng-click="empclicktab('3')" class="col-md-6">
										   <div class="encrement-box pt LightBlueColor">
											  <div class="employer-box">
												 <div class="employer-num">
												 <h2>Announcement</h2>
													<h1><span>{{ mdsr }}</span></h1>
													<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M350.56,73.694c-2.656-1.874-6.057-2.341-9.117-1.251l-216.329,76.94H69.01c-38.053,0-69.01,30.958-69.01,69.01v14.548
			c0,38.053,30.958,69.011,69.01,69.011h47.827v128.182c0,5.524,4.479,10.002,10.002,10.002h69.655c3.58,0,6.886-1.913,8.67-5.016
			c1.784-3.103,1.774-6.923-0.026-10.017l-22.234-38.209v-64.391l158.54,56.387c1.09,0.388,2.223,0.578,3.351,0.578
			c2.038,0,4.059-0.623,5.768-1.83c2.655-1.874,4.235-4.922,4.235-8.171V81.866C354.795,78.616,353.216,75.568,350.56,73.694z
			 M116.838,281.949H98.679v-48.622c0-5.524-4.479-10.002-10.002-10.002c-5.523,0-10.002,4.478-10.002,10.002v48.622H69.01
			c-27.023,0-49.007-21.984-49.007-49.008v-14.548c0-27.023,21.984-49.007,49.007-49.007h47.827V281.949z M136.841,420.133v-114.01
			l26.059,9.268v64.201h-9.659c-5.523,0-10.002,4.478-10.002,10.002c0,5.524,4.479,10.002,10.002,10.002h13.909l11.951,20.538
			H136.841z M286.512,260.86c-5.523,0-10.002,4.478-10.002,10.002v63.707l-139.669-49.676v-118.45l139.668-49.675v82.372
			c0,5.524,4.479,10.002,10.002,10.002c5.523,0,10.002-4.478,10.002-10.002v-89.488l38.279-13.614v259.257l-38.278-13.614v-70.821
			C296.513,265.338,292.034,260.86,286.512,260.86z"/>
	</g>
</g>
<g>
	<g>
		<path d="M463.083,107.379c-3.907-3.906-10.238-3.906-14.145,0c-3.906,3.906-3.906,10.239,0,14.145
			c27.818,27.817,43.138,64.803,43.138,104.143s-15.319,76.326-43.138,104.143c-3.906,3.906-3.906,10.239,0,14.145
			c1.953,1.953,4.513,2.929,7.072,2.929s5.119-0.976,7.072-2.929C528.307,278.731,528.307,172.603,463.083,107.379z"/>
	</g>
</g>
<g>
	<g>
		<path d="M431.306,139.156c-3.906-3.906-10.237-3.906-14.145,0c-3.906,3.906-3.906,10.239,0,14.144
			c39.903,39.904,39.903,104.831,0,144.735c-3.906,3.906-3.906,10.239,0,14.144c1.953,1.953,4.513,2.929,7.072,2.929
			c2.559,0,5.119-0.977,7.072-2.929C479.008,264.476,479.008,186.859,431.306,139.156z"/>
	</g>
</g>
<g>
	<g>
		<path d="M399.531,170.932c-3.906-3.906-10.237-3.906-14.145,0c-3.906,3.906-3.906,10.239,0,14.144
			c22.382,22.382,22.382,58.801,0,81.183c-3.906,3.906-3.906,10.239,0,14.144c1.953,1.953,4.513,2.929,7.072,2.929
			c2.559,0,5.119-0.977,7.072-2.929C429.711,250.221,429.711,201.113,399.531,170.932z"/>
	</g>
</g>
<g>
	<g>
		<path d="M286.513,225.484c-5.523,0-10.002,4.478-10.002,10.002v0.147c0,5.524,4.479,10.002,10.002,10.002
			s10.002-4.478,10.002-10.002v-0.147C296.514,229.962,292.035,225.484,286.513,225.484z"/>
	</g>
</g>
<g>
	<g>
		<path d="M88.677,186.833c-5.523,0-10.002,4.478-10.002,10.002v0.147c0,5.524,4.479,10.002,10.002,10.002
			s10.002-4.478,10.002-10.002v-0.147C98.678,191.31,94.199,186.833,88.677,186.833z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
												 </div>
											  </div>
										   </div>
										</div>
									 </div>
								  </div>
							   </div>
							</div>
							<div class="col-md-12">
							   <div class="graph-wrap">
								  <div class="dashboard-grap dashboardnograph">
									 <div class="nograph">
										<p>No Data found. Please choose date & Click on any entity to see the complete record.</p>
									 </div>
								  </div>
								  <div style="display:none" class="dashboard-grap totaltasktome">
									 <div id="chartContaineremptask" style="height:100%;width: 100%;"></div>
								  </div>
								  <div style="display:none" class="dashboard-grap totaldsr">
									 <div id="chartContainerdsr" style="height:100%;width: 100%;"></div>
								  </div>
								  <div style="display:none" class="dashboard-grap totalannouncment">
									 <div id="chartContainerannouncment" style="height:100%;width: 100%;"></div>
								  </div>
							   </div>
							</div>
						</div>
						<div class="row">
							<!-- task -->
							<div class="col-lg-7 col-md-12">
							   <div class="mt-3">
								  <div class="Leaves common-l bg-white">
									 <div class="heading">
										<div class="row">
										   <div class="col-md-12">
											  <h4 class="h4-head">Task</h4>
										   </div>
										</div>
									 </div>
									 <div class="table-responsive">
										<table class="table">
										   <thead>
											  <tr>
												 <th>Task Name</th>
												 <th style="">Assign to</th>
												 <th style="">Start Date</th>
												 <th>Description</th>
											  </tr>
										   </thead>
										   <tbody>
											  <?php if(!empty($task))
												 {
												   foreach($task as $t)
												   {
												   ?>
											  <tr class="<?php if($t->status == 1){ echo "taskdone"; } else if($t->status == 2){ echo "taskpending"; }  ?>">
												 <td>
													<?php echo $t->name; ?>
												 </td>
												 <td>
													<?php echo $t->assignedto; ?>
												 </td>
												 <td>
													<?php echo $d = date("d M, Y",strtotime($t->startDate)); ?>
												 </td>
												 <td>
													<?php echo substr($t->description, 0, 70);  ?>
												 </td>
											  </tr>
											  <?php } } else{ ?>
											  <tr>
												 <td colspan="4">No Task</td>
											  </tr>
											  <?php } ?>
										   </tbody>
										</table>
									 </div>
									 <?php if(!empty($task))
										{ ?>
									 <div class="border-top text-right p-3">
										<a href="<?php echo base_url(); ?>freelancer/todo">View All</a>
									 </div>
									 <?php } ?>
								  </div>
							   </div>
							</div>
							<!-- task -->
							<!-- notification -->
							<div class="col-lg-5 col-md-12">
							   <div class="mt-3">
								  <div class="Leaves common-l bg-white">
									 <div class="heading mb-2">
										<div class="row">
										   <div class="col-md-12">
											  <h4 class="h4-head">Notifications</h4>
										   </div>
										</div>
									 </div>
									 <?php
										if(!empty($notification))
										{
										  foreach($notification as $n)
										  {
										   ?>
									 <div class="notification-content mx-2">
										<ul class="un-style mb-0 list-unstyled d-flex">
										   <!-- <li class="">
											  <div class="john-img">
												  <?php if($n->logo != '')
												 {
												   ?>
												  <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $n->logo; ?>">
												  <?php }
												 else
												 {
												 ?>
												  <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg">
												  <?php
												 }
												 ?>
											  </div>
											  </li> -->
										   <li class="pl-2">
											  <div class="not-content">
												 <span>
												 <?php echo $newDate = date("d-m-Y", strtotime($n->notificationDate));  ?></span>
												 <p>
													<?php echo $n->notificationMessage; ?>
												 </p>
											  </div>
										   </li>
										</ul>
									 </div>
									 <?php }
										}
										else
										{
										?>
									 <div class="notification-content mx-2">
										<p>No Notification</p>
									 </div>
									 <?php
										}
										if(!empty($notification))
										{
										?>
									 <div class="border-top text-right p-3">
										<a href="javascript:void(0);">View All</a>
									 </div>
									 <?php } ?>
								  </div>
							   </div>
							</div>
							<!-- notification -->
						</div>

                  </div>
               </div>
            </div>
            <!-- add -->
         </div>
      </div>
   </div>
   <!--************************ Employee dashboard *************************-->
   <?php }
      else if($this->session->userdata['clientloggedin']['access'] == 7)
      {
      ?>
   <!--************************ Sales Employee dashboard *************************-->
   <div class="dash-board projectmanagerdashboard  SalesEmployeedashboard" >
      <h4 class="h4-win">Dashboard</h4>
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group">
                     <input readonly ng-model="employeestartdate" placeholder="Please enter start date" type="text" name="start" class="form-control dashboardstartdate" >
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="form-group">
                     <input  type="button" ng-click="getempdatewise()" name="submit" value="submit" class="btn btn-success" >
                  </div>
               </div>
            </div>
            <!-- add -->
            <div class="full-container">
               <div class="employer-section">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="dashbord-wrapper">
                              <div class="dashbord-inner-wrap">
                                 <div class="row">
                                    <div ng-click="empclicktab('1')" class="col-md-6">
                                       <div class="dashboard-wrap pt">
                                          <div class="employer-heading">
                                             <h4>Today's Tasks</h4>
                                          </div>
                                          <div class="employer-box">
                                             <div class="employer-img">
                                                <div class="inner-box">
                                                   <img src="<?php echo base_url(); ?>assets/dashboard/images/expensed.png">
                                                </div>
                                             </div>
                                             <div class="employer-num">
                                                <h1><span>{{ emptotaltask }}</span></h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div ng-click="empclicktab('2')" class="col-md-6">
                                       <div class="attendance-wrap pt">
                                          <div class="employer-heading">
                                             <h4>My DSR</h4>
                                          </div>
                                          <div class="employer-box">
                                             <div class="employer-img">
                                                <div class="inner-box">
                                                   <img src="<?php echo base_url(); ?>assets/dashboard/images/invoiced.png">
                                                </div>
                                             </div>
                                             <div class="employer-num">
                                                <h1><span>{{ mtotaltaskbyme }}</span></h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="increment-wrapper">
                                 <div class="row">
                                    <div ng-click="empclicktab('3')" class="col-md-6">
                                       <div class="encrement-box pt">
                                          <div class="employer-heading">
                                             <h4>Announcement</h4>
                                          </div>
                                          <div class="employer-box">
                                             <div class="employer-img">
                                                <div class="inner-box">
                                                   <img src="<?php echo base_url(); ?>assets/dashboard/images/incomed.png">
                                                </div>
                                             </div>
                                             <div class="employer-num">
                                                <h1><span>{{ mdsr }}</span></h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="graph-wrap">
                              <div class="dashboard-grap dashboardnograph">
                                 <div class="nograph">
                                    <p>No Data found. Please choose date & Click on any entity to see the complete record.</p>
                                 </div>
                              </div>
                              <div style="display:none" class="dashboard-grap totaltasktome">
                                 <div id="chartContaineremptask" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap totaldsr">
                                 <div id="chartContainerdsr" style="height:100%;width: 100%;"></div>
                              </div>
                              <div style="display:none" class="dashboard-grap totalannouncment">
                                 <div id="chartContainerannouncment" style="height:100%;width: 100%;"></div>
                              </div>
                           </div>
                        </div>
                        <!-- task -->
                        <div class="col-lg-7 col-md-12">
                           <div class="mt-3">
                              <div class="Leaves common-l bg-white">
                                 <div class="heading">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <h4 class="h4-head">Task</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="table-responsive">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                             <th>Task Name</th>
                                             <th style="">Assign to</th>
                                             <th style="">Start Date</th>
                                             <th>Description</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php if(!empty($task))
                                             {
                                               foreach($task as $t)
                                               {
                                               ?>
                                          <tr class="<?php if($t->status == 1){ echo "taskdone"; } else if($t->status == 2){ echo "taskpending"; }  ?>">
                                             <td>
                                                <?php echo $t->name; ?>
                                             </td>
                                             <td>
                                                <?php echo $t->assignedto; ?>
                                             </td>
                                             <td>
                                                <?php echo $d = date("d M, Y",strtotime($t->startDate)); ?>
                                             </td>
                                             <td>
                                                <?php echo substr($t->description, 0, 70);  ?>
                                             </td>
                                          </tr>
                                          <?php } } else{ ?>
                                          <tr>
                                             <td colspan="4">No Task</td>
                                          </tr>
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                                 <?php if(!empty($task))
                                    { ?>
                                 <div class="border-top text-right p-3">
                                    <a href="<?php echo base_url(); ?>freelancer/todo">View All</a>
                                 </div>
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
                        <!-- task -->
                        <!-- notification -->
                        <div class="col-lg-5 col-md-12">
                           <div class="mt-3">
                              <div class="Leaves common-l bg-white">
                                 <div class="heading mb-2">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <h4 class="h4-head">Notifications</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                    if(!empty($notification))
                                    {
                                      foreach($notification as $n)
                                      {
                                       ?>
                                 <div class="notification-content mx-2">
                                    <ul class="un-style mb-0 list-unstyled d-flex">
                                       <li class="">
                                          <div class="john-img">
                                             <?php if($n->logo != '')
                                                {
                                                  ?>
                                             <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $n->logo; ?>">
                                             <?php }
                                                else
                                                {
                                                ?>
                                             <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg">
                                             <?php
                                                }
                                                ?>
                                          </div>
                                       </li>
                                       <li class="pl-2">
                                          <div class="not-content">
                                             <span>
                                             <?php echo $newDate = date("d-m-Y", strtotime($n->notificationDate));  ?></span>
                                             <p>
                                                <?php echo $n->notificationMessage; ?>
                                             </p>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                                 <?php }
                                    }
                                    else
                                    {
                                    ?>
                                 <div class="notification-content mx-2">
                                    <p>No Notification</p>
                                 </div>
                                 <?php
                                    }
                                    if(!empty($notification))
                                    {
                                    ?>
                                 <div class="border-top text-right p-3">
                                    <a href="javascript:void(0);">View All</a>
                                 </div>
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
                        <!-- notification -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- add -->
         </div>
      </div>
   </div>
   <!--************************ sales Employee dashboard *************************-->
   <?php } ?>



</div>
