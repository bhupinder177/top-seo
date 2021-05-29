
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel -->
<div class="user-panel">
<!-- company logo -->
<div id="dashboardlogo" class="img dashboardlogo"  >

		<form id="uploadForm" method="post" >

			<div class="profileImg">
				<?php
				$u = getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
				$team = getrow('user_top_rated_emp',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
				$plan = getfreelancerPlan(array("m.userId"=>$this->session->userdata['clientloggedin']['id'],"m.membershipStatus"=>1));

				if($this->session->userdata['clientloggedin']['type'] == 3)
				{
					if(!empty($u->logo))
					{
						?>
						<img id="myImagelogo"  class="img-responsive userlogo" src="<?php echo base_url(); ?>assets/client_images/<?php echo $u->logo; ?>" />
						<?php
					}
					else if(!empty($team->employeeImage))
					{
						?>
						<img id="myImagelogo"  class="img-responsive userlogo" src="<?php echo base_url(); ?>assets/team/<?php echo $team->employeeImage; ?>" />

						<?php
					}
				}
				else if($this->session->userdata['clientloggedin']['type'] == 2)
				{
					if(!empty($u->company_logo))
					{
						?>
						<img height="60" id="myImagelogo"  class="img-responsive userlogo" src="<?php echo base_url(); ?>assets/client_images/<?php echo $u->company_logo; ?>" />
					<?php }
					else{
						?>
						<img height="60" width="200" id="myImagelogo"  class="img-responsive userlogo" src="<?php echo base_url(); ?>assets/client_images/noimage.jpg" />

						<?php
					}
				}



				if($this->session->userdata['clientloggedin']['type'] == 2 || $this->session->userdata['clientloggedin']['type'] == 3)
				{
					?>
					<label for="profileImg" class="pointer edit" style="margin-right: 21px;" title="Upload Logo">

						<a ><i  class="fa fa-pencil"></i></a>

					</label>
				<?php } ?>
				<!-- <label for="deleteimg" class="pointer edit"  title="Delete Logo">

				<a href="<?php echo base_url(); ?>"><i id="deleteimg" class="fa fa-times"></i></a>

			</label> -->

			<input  type="file" name="profileImg" id="profileImg" class="d-none" />
			<?php  if($this->session->userdata['clientloggedin']['type'] == '2')
			{
				?>
				<input type="hidden" value="company" id="ctype" >
				<?php
			}
			else if($this->session->userdata['clientloggedin']['type'] == '3')
			{
				?>
				<input type="hidden" value="freelancer" id="ctype" >
				<?php
			}
			?>
			<input type="hidden" name="del_log_id" id="del_log_id" class="d-none" />

			<input type="hidden" name="del_log_id" id="del_log_id" class="d-none" value="" />

		</div>

	</form>

</div>
<!-- company logo -->
</div>

<ul class="sidebar-menu" data-widget="tree">

<li class="active treeview">
<li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
</li>
<?php
if($this->session->userdata['clientloggedin']['access'] == '2' || $this->session->userdata['clientloggedin']['access'] == '3' || $this->session->userdata['clientloggedin']['access'] == '4' ||  $this->session->userdata['clientloggedin']['access'] == '5' ||  $this->session->userdata['clientloggedin']['access'] == '6' )
{
?>
<li class="<?php if($this->uri->segment(2) == "team_profile"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/team_profile"><i class="fa fa-th-list"></i> <span>Profile</span></a> </li>
<?php
}
if($this->session->userdata['clientloggedin']['access'] == '1'  )
{
?>
<li class="<?php if($this->uri->segment(2) == "profile"){ echo "active"; }  ?>"> <a href="<?php echo base_url(); ?>freelancer/profile"><i class="fa fa-user"></i> <span>Profile</span></a></li>
<?php }
?>
<li class="<?php if($this->uri->segment(2) == "todo"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/todo"><i class="fa fa-cogs"></i>Tasks</a></li>
<?php
if($this->session->userdata['clientloggedin']['access'] == '1' || $this->session->userdata['clientloggedin']['access'] == '2'  )
{
?>
<li class="treeview <?php if($this->uri->segment(2) == "job" || $this->uri->segment(2) == "contract" || $this->uri->segment(2) == "proposal" ){ echo "active"; }  ?>"> <a href="#"><i class="fa fa-cog"></i> <span>Project Managment</span><span class="caret"></span></a>
<ul class="treeview-menu">
<li><a target="_blank" href="<?php echo base_url(); ?>find-work"><span>Find Work</span></a> </li>
<li class="<?php if($this->uri->segment(2) == "job"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/job"><span>Job Offer</span></a> </li>
<li class="<?php if($this->uri->segment(2) == "contract"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/contract"> <span>Contract</span></a> </li>
<li class="<?php if($this->uri->segment(2) == "proposal"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/proposal"> <span>Proposal</span></a> </li>
</ul>

</li>
<?php } ?>

<?php
if($this->session->userdata['clientloggedin']['access'] == '1' || $this->session->userdata['clientloggedin']['access'] == '2' )
{
?>
<li class="treeview <?php if($this->uri->segment(2) == "casestudy" || $this->uri->segment(2) == "portfolio" || $this->uri->segment(2) == "testimonial" || $this->uri->segment(2) == "services" || $this->uri->segment(2) == "service_briefing"){ echo "active"; }  ?> "> <a href="#"><i class="fa fa-cog"></i> <span>Other Info</span><span class="caret"></span></a>
<ul class="treeview-menu">
	<?php
	if($this->session->userdata['clientloggedin']['access'] == '1')
	{
		?>
<li class="<?php if($this->uri->segment(2) == "services"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/services"><i class="fa fa-cog"></i>Add Services</a></li>
<li class="<?php if($this->uri->segment(2) == "service_pricing"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/service_pricing"><i class="fa fa-money"></i> <span>Add Packages</span></a> </li>
<?php
}
if($this->session->userdata['clientloggedin']['access'] == '1' || $this->session->userdata['clientloggedin']['access'] == '2'  )
{
?>
<li class="<?php if($this->uri->segment(2) == "service_briefing"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/service_briefing"><i class="fa fa-cog"></i>Service Briefing</a></li>
<li class="<?php if($this->uri->segment(2) == "testimonial"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/testimonial"><i class="fa fa-plus-circle"></i> <span>Testimonials</span></a> </li>
<li class="<?php if($this->uri->segment(2) == "portfolio"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/portfolio"><i class="fa fa-picture-o"></i> <span>Portfolios</span></a> </li>
<li class="<?php if($this->uri->segment(2) == "casestudy"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/casestudy"><i class="fa fa-newspaper-o"></i> <span>Case Studies
</span></a> </li>

<?php } ?>

</ul>

</li>
<?php }
?>
<li class="treeview "> <a href="#"><i class="fa fa-cog"></i> <span>Chat</span><span class="caret"></span></a>
<ul class="treeview-menu">
<li class="<?php if($this->uri->segment(2) == "chat"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/chat"><i class="fa fa-comments"></i> <span>Chat Messages</span></a> </li>
<li class="<?php if($this->uri->segment(2) == "support-chat"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/support-chat"><i class="fa fa-comments"></i> <span class="support">Support Chat </span></a> </li>

<?php
if($this->session->userdata['clientloggedin']['access'] == '1'  )
{
?>
<li class="<?php if($this->uri->segment(2) == "request"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/request"><i class="fa fa-comment"></i> <span>Form Request</span></a> </li>
<?php } ?>
</ul>
</li>
<?php
if($this->session->userdata['clientloggedin']['access'] == '2')
{
?>
<li class="<?php if($this->uri->segment(2) == "service_briefing"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/service_briefing"><i class="fa fa-cog"></i><span>Service Briefing</span></a></li>
<?php
}
?>

<?php
if($this->session->userdata['clientloggedin']['type'] == '2')
{
?>
<li class="<?php if($this->uri->segment(2) == "team"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/team"><i class="fa fa-users"></i> <span>Add Team Members</span></a> </li>
<?php } ?>









<?php
if($this->session->userdata['clientloggedin']['access'] == '1'  )
{
?>
<!-- <li class="<?php if($this->uri->segment(2) == "payment"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/payment"><i class="fa fa-money"></i> <span>Payment Method</span></a> </li> -->
<li class="<?php if($this->uri->segment(2) == "membership"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/membership"><i class="fa fa-file-text"></i> <span>Membership</span></a> </li>
<?php
}
?>

<!-- ========================== -->
<?php

if($this->session->userdata['clientloggedin']['access'] == '5')
{
?>
<li class="treeview <?php if($this->uri->segment(2) == "expenses" ||  $this->uri->segment(2) == "employee-salary" || $this->uri->segment(2) == "resignation-list" || $this->uri->segment(2) == "leave-list" || $this->uri->segment(2) == "roi" || $this->uri->segment(2) == "company-roi" || $this->uri->segment(2) == "employee-roi" ){ echo "active"; }  ?>"> <a href="#"><i class="fa fa-cog"></i> <span>Employees</span><span class="caret"></span></a>
<ul class="treeview-menu">
	<li class="<?php if($this->uri->segment(2) == "team"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/team"><span>All Employees</span></a> </li>
	<li class="<?php if($this->uri->segment(2) == "departments"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/departments">Departments</a></li>
	<li class="<?php if($this->uri->segment(2) == "resignation-list"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/resignation-list">Resignations List</a></li>
	<li class="<?php if($this->uri->segment(2) == "employee-salary"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/employee-salary">Salary Calculation</a></li>

<li class="<?php if($this->uri->segment(2) == "expenses"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/expense">expense</a></li>
</ul>
</li>
<li class="treeview <?php  if($this->uri->segment(2) == "leavetype" ||  $this->uri->segment(2) == "leave-list"  ){ echo "active"; }  ?>"> <a href="#"><i class="fa fa-cog"></i> <span>Leave Status</span><span class="caret"></span></a>
<ul class="treeview-menu">
<li class="<?php if($this->uri->segment(2) == "leavetype"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/leavetype">Leave type</a></li>
<li class="<?php if($this->uri->segment(2) == "leave-list"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/leave-list">Leave Requests</a></li>
</ul>
</li>
<li class="treeview <?php  if($this->uri->segment(2) == "expense" ){ echo "active"; }  ?>"> <a href="#"><i class="fa fa-cog"></i> <span>Accounts</span><span class="caret"></span></a>
<ul class="treeview-menu">
<li class="<?php if($this->uri->segment(2) == "expense"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/expense">Expense</a></li>
<li ><a href="#">invoice</a></li>
</ul>
</li>
<li class="<?php if($this->uri->segment(2) == "leave"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/leave"><i class="fa fa-cog"></i>Work Timing</a></li>
<li class="<?php if($this->uri->segment(2) == "holiday"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/holiday"><i class="fa fa-cog"></i>Holiday</a></li>

<?php } ?>
<!-- =========================== -->


<?php

if( $this->session->userdata['clientloggedin']['access'] == '2' || $this->session->userdata['clientloggedin']['access'] == '1')
{
?>
<li class="treeview <?php if($this->uri->segment(2) == "expenses" || $this->uri->segment(2) == "leave" || $this->uri->segment(2) == "employee-salary" || $this->uri->segment(2) == "resignation-list" || $this->uri->segment(2) == "leave-list" || $this->uri->segment(2) == "roi" || $this->uri->segment(2) == "company-roi" || $this->uri->segment(2) == "employee-roi" ){ echo "active"; }  ?>"> <a href="#"><i class="fa fa-cog"></i> <span>Project</span><span class="caret"></span></a>
<ul class="treeview-menu">


<?php

if($this->session->userdata['clientloggedin']['access'] == '5'  )
{
?>
<li class="<?php if($this->uri->segment(2) == "leave"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/leave">Leave Apply</a></li>
<li class="<?php if($this->uri->segment(2) == "employee-salary"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/employee-salary">Salary Calculation</a></li>
<li class="<?php if($this->uri->segment(2) == "resignation-list"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/resignation-list">Resignations List</a></li>
<li class="<?php if($this->uri->segment(2) == "leavetype"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/leavetype">Leave type</a></li>
<li class="<?php if($this->uri->segment(2) == "leave-list"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/leave-list">Leave Requests</a></li>
<li class="<?php if($this->uri->segment(2) == "departments"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/departments">Departments</a></li>
<?php }
if($this->session->userdata['clientloggedin']['access'] == '2'  )
{
?>
<li class="<?php if($this->uri->segment(2) == "project"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/project">Project</a></li>
<?php }
if($this->session->userdata['clientloggedin']['access'] == '1'  )
{
?>
<li class="<?php if($this->uri->segment(2) == "roi"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/roi">ROI</a></li>
<li class="<?php if($this->uri->segment(2) == "company-roi"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/company-roi">Company ROI</a></li>
<li class="<?php if($this->uri->segment(2) == "employee-roi"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/employee-roi">Employee ROI</a></li>
<?php } ?>
</ul>
</li>
<?php
}
?>
<?php
if($this->session->userdata['clientloggedin']['access'] != '1')
{
?>
<li class="<?php if($this->uri->segment(2) == "employee_leave"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/employee_leave"><i class="fa fa-cogs"></i>Leave</a></li>
<li class="<?php if($this->uri->segment(2) == "resignation"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/resignation"><i class="fa fa-cogs"></i>Resignation</a></li>
<?php
}
if($this->session->userdata['clientloggedin']['access'] == '6'  )
{
?>
<li class="<?php if($this->uri->segment(2) == "project-assign"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/project-assign"><i class="fa fa-cog"></i>Project</a></li>
<?php
}
if($this->session->userdata['clientloggedin']['access'] == '3'  )
{
?>
<li class="<?php if($this->uri->segment(2) == "employee-project"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/my-projects"><i class="fa fa-cog"></i>Project</a></li>
<?php
}
?>

<li class="treeview <?php if($this->uri->segment(2) == "password"){ echo "active"; }  ?> "> <a href="#"><i class="fa fa-cogs"></i> <span>Settings</span><span class="caret"></span></a>
<ul class="treeview-menu">
<li class="<?php if($this->uri->segment(2) == "password"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>freelancer/password"><i class="fa fa-unlock-alt"></i> <span>Change Password</span></a> </li>
</ul>
</li>
<?php
if($this->session->userdata['clientloggedin']['access'] == '1'  )
{
?>
<li class="<?php if($this->uri->segment(2) == "notification"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/notification"><i class="fa fa-bell"></i> <span>Notification</span></a> </li>
<li class="<?php if($this->uri->segment(2) == "invoice"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>freelancer/invoice"><i class="fa fa-bell"></i> <span>Invoice</span></a> </li>
<?php
}
?>
<li ><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out"></i> <span>Log Out</span></a> </li>

</ul>
</section>
<!-- /.sidebar -->
</aside>
