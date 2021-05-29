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
									 <p>No Notification</p>
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
   <div class="dash-board HrDashboard">
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
                              <div class="dashboard-wrap pt">
                                 <div class="employer-box">
                                    <div class="employer-img">
                                       <div class="inner-box">
                                          <img src="<?php echo base_url(); ?>assets/dashboard/images/expensed.png">
                                       </div>
                                    </div>
                                    <div class="employer-num">
										<h2>Employee</h2>
                                       <h1><span>{{ employee }}</span></h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div ng-click="clicktabhr('2')" class="col-md-3">
                              <div class="attendance-wrap pt">
                                 <div class="employer-box">
                                    <div class="employer-img">
                                       <div class="inner-box">
                                          <img src="<?php echo base_url(); ?>assets/dashboard/images/invoiced.png">
                                       </div>
                                    </div>
                                    <div class="employer-num">
										<h2>Leaves</h2>
                                       <h1><span>{{ leaves }}</span></h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
						   <div ng-click="clicktabhr('3')" class="col-md-3">
                              <div class="encrement-box pt">
                                 <div class="employer-box">
                                    <div class="employer-img">
                                       <div class="inner-box">
                                          <img src="<?php echo base_url(); ?>assets/dashboard/images/incomed.png">
                                       </div>
                                    </div>
                                    <div class="employer-num">
										<h2>Interview</h2>
                                       <h1><span>{{ interview }}</span></h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div ng-click="clicktabhr('4')" class="col-md-3">
                              <div class="interview-box pt">
                                 <div class="employer-box">
                                    <div class="employer-img">
                                       <div class="inner-box">
                                       </div>
                                    </div>
                                    <div class="employer-num">
										<h2>Job Openings</h2>
                                       <h1><span>{{ opening }}</span></h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
						   <div ng-click="clicktabhr('5')" class="col-md-3">
                              <div class="leaves-box pt">
                                 <div class="employer-box">
                                    <div class="employer-img">
                                       <div class="inner-box">
                                       </div>
                                    </div>
                                    <div class="employer-num">
										<h2>DSR</h2>
                                       <h1><span>0</span></h1>
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
   <div class="dash-board" >
      <h4 class="h4-win">Dashboard</h4>
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group">
                     <input readonly ng-model="managerstartdate" placeholder="Please enter start date" type="text" name="start" class="form-control dashboardstartdate" >
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="form-group">
                     <input  type="button" ng-click="getmanagerdatewise()" name="submit" value="submit" class="btn btn-success" >
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
                                    <div ng-click="managerclicktab('1')" class="col-md-6">
                                       <div class="dashboard-wrap pt">
                                          <div class="employer-heading">
                                             <h4>Total Tasks Assigned To Me</h4>
                                          </div>
                                          <div class="employer-box">
                                             <div class="employer-img">
                                                <div class="inner-box">
                                                   <img src="<?php echo base_url(); ?>assets/dashboard/images/expensed.png">
                                                </div>
                                             </div>
                                             <div class="employer-num">
                                                <h1><span>{{ mtotaltask }}</span></h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div ng-click="managerclicktab('2')" class="col-md-6">
                                       <div class="attendance-wrap pt">
                                          <div class="employer-heading">
                                             <h4>Total Tasks Assigned By me</h4>
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
                                    <div ng-click="managerclicktab('3')" class="col-md-6">
                                       <div class="encrement-box pt">
                                          <div class="employer-heading">
                                             <h4>DSR</h4>
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
                                    <div ng-click="managerclicktab('4')" class="col-md-6">
                                       <div class="interview-box pt">
                                          <div class="employer-heading">
                                             <h4>Total Projects </h4>
                                          </div>
                                          <div class="employer-box">
                                             <div class="employer-img">
                                                <div class="inner-box">
                                                </div>
                                             </div>
                                             <div class="employer-num">
                                                <h1><span>{{ mproject }}</span></h1>
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
                                       <div class="leaves-box pt">
                                          <div class="employer-heading">
                                             <h4>Leave Requests</h4>
                                          </div>
                                          <div class="employer-box">
                                             <div class="employer-img">
                                                <div class="inner-box">
                                                </div>
                                             </div>
                                             <div class="employer-num">
                                                <h1><span>{{ mleave }}</span></h1>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div ng-click="managerclicktab('6')" class="col-md-6">
                                       <div class="leaves-box pt">
                                          <div class="employer-heading">
                                             <h4>My Team</h4>
                                          </div>
                                          <div class="employer-box">
                                             <div class="employer-img">
                                                <div class="inner-box">
                                                </div>
                                             </div>
                                             <div class="employer-num">
                                                <h1><span>{{ mteam }}</span></h1>
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
										   <div class="dashboard-wrap pt">
											  <div class="employer-heading">
												 <h4>Today's Tasks 1</h4>
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
   <div class="dash-board" >
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
