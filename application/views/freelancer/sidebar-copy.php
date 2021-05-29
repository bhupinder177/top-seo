<div id="sidebar">
    <ul>
     <!-- ****************company and freelancer menu********************************** -->
     <?php
      if($this->session->userdata['clientloggedin']['type'] == 2 || $this->session->userdata['clientloggedin']['type'] == 3 && $this->session->userdata['clientloggedin']['access'] == 0)
		{
							?>
     <li class="<?php if($this->uri->segment(2) == "dashboard"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>freelancer/dashboard">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
     </li>
     <li class="<?php if($this->uri->segment(2) == "profile"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>freelancer/profile">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
     </li>
     <?php
				if($this->session->userdata['clientloggedin']['type'] == '2')
				{
          ?>
    <li class="<?php if($this->uri->segment(2) == "todo"){ echo "active"; }  ?>">
      <a href="<?php echo base_url(); ?>freelancer/todo">
        <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Task</a>
    </li>
  <?php } ?>
    <!-- project managment -->
  <li class="nav-item submenu ">
        <a class="nav-link" href="#sub-menu" data-toggle="collapse" data-target="#sub-menu">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Project Managment<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
        <ul class="list-unstyled flex-column collapse" id="sub-menu" aria-expanded="false">
            <li class="nav-item ">
                <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>find-work">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Find Work</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "job"){ echo "active"; }  ?> ">
                <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/job">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Job Offer</a>
            </li>
            <li class="nav-item ">
                <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/contract">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Contract</a>
            </li>
            <li class="nav-item ">
                <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/proposal">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Proposal</a>
            </li>

        </ul>
    </li>
    <!-- project managment -->
        <!-- other info -->
    <li class="nav-item submenu1">
          <a class="nav-link" href="#sub-menu1" data-toggle="collapse" data-target="#sub-menu1">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Other Info<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
          <ul class="list-unstyled flex-column collapse" id="sub-menu1" aria-expanded="false">
              <li class="nav-item ">
                  <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>services">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Add Services</a>
              </li>
              <li class="nav-item ">
                  <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/service_briefing">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Service Briefing</a>
              </li>
              <li class="nav-item ">
                  <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/service_pricing">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Add Packages</a>
              </li>
              <li class="nav-item ">
                  <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/testimonial">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Testimonials</a>
              </li>
              <li class="nav-item ">
                  <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/portfolio">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Portfolios</a>
              </li>
              <li class="nav-item ">
                  <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/casestudy">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Case Studies</a>
              </li>

          </ul>
      </li>
      <!-- other info -->
      <?php
				if($this->session->userdata['clientloggedin']['type'] == '2')
				{
					?>
        <li class="<?php if($this->uri->segment(2) == "team"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>freelancer/team">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Add Team Members</a>
        </li>
      <?php } ?>

      <!-- chat -->
      <li class="nav-item submenu2">
            <a class="nav-link" href="#sub-menu2" data-toggle="collapse" data-target="#sub-menu2">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
            <ul class="list-unstyled flex-column collapse" id="sub-menu2" aria-expanded="false">
                <li class="nav-item ">
                    <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>chat">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Chat Messages</a>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/support-chat">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Support Chat</a>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/request">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Form Request</a>
                </li>
                </ul>
        </li>
      <!-- chat -->

       <!-- account -->
       <li class="nav-item submenu3">
             <a class="nav-link" href="#sub-menu3" data-toggle="collapse" data-target="#sub-menu3">
                 <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Account<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
             <ul class="list-unstyled flex-column collapse" id="sub-menu3" aria-expanded="false">
               <?php
						if($this->session->userdata['clientloggedin']['type'] == '2')
						{
							?>
                 <li class="nav-item ">
                     <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>expense">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Expense</a>
                 </li>
          <?php } ?>
                 <li class="nav-item ">
                     <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/invoice">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Invoice</a>
                 </li>
                 <li class="nav-item ">
                     <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/income">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Income</a>
                 </li>
                 </ul>
         </li>
       <!-- account -->
            <li class="<?php if($this->uri->segment(2) == "membership"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>freelancer/membership">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid"> Membership</a>
            </li>

            <!-- return on investment -->
            <li class="nav-item submenu4">
                  <a class="nav-link" href="#sub-menu4" data-toggle="collapse" data-target="#sub-menu4">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Return On Investment<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                  <ul class="list-unstyled flex-column collapse" id="sub-menu4" aria-expanded="false">

                      <li class="nav-item ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/roi">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">ROI</a>
                      </li>
                      <li class="nav-item ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/company-roi">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Company ROI</a>
                      </li>
                      <li class="nav-item ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/employee-roi">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Employee ROI</a>
                      </li>
                      </ul>
              </li>
            <!-- return on investment -->
            <!-- setting -->
            <li class="nav-item submenu5">
                  <a class="nav-link" href="#sub-menu5" data-toggle="collapse" data-target="#sub-menu5">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                  <ul class="list-unstyled flex-column collapse" id="sub-menu5" aria-expanded="false">

                      <li class="nav-item ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/basicinform">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Change Password</a>
                      </li>
                      <?php
	                  if ($this->session->userdata['clientloggedin']['type'] == '3' && $this->session->userdata['clientloggedin']['parent'] == 0)
                    {
		                    ?>
                      <li class="nav-item ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/upgrade">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Profile upgrade</a>
                      </li>
                    <?php } ?>
                      </ul>
              </li>
            <!-- setting -->
            <!-- logout -->
            <li class="">
              <a href="<?php echo base_url(); ?>logout">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Logout</a>
            </li>
            <!-- logout -->

 <?php } ?>
  <!-- ****************company and freelancer menu********************************** -->

  <!-- ****************Hr menu********************************** -->
  <?php
	if ($this->session->userdata['clientloggedin']['access'] == '5')
  {
		?>
  <li class="<?php if($this->uri->segment(2) == "dashboard"){ echo "active"; }  ?>">
      <a href="<?php echo base_url(); ?>freelancer/dashboard">
          <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
  </li>
  <li class="<?php if($this->uri->segment(2) == "team_profile"){ echo "active"; }  ?>">
      <a href="<?php echo base_url(); ?>freelancer/team_profile">
          <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
  </li>

 <li class="<?php if($this->uri->segment(2) == "todo"){ echo "active"; }  ?>">
   <a href="<?php echo base_url(); ?>freelancer/todo">
     <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Task</a>
 </li>



   <!-- chat -->
   <li class="nav-item submenu6">
         <a class="nav-link" href="#sub-menu6" data-toggle="collapse" data-target="#sub-menu6">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat<i class="fa fa-angle-down pull-right" aria-hidden="false"></i></a>
         <ul class="list-unstyled flex-column collapse" id="sub-menu6" aria-expanded="false">
             <li class="nav-item ">
                 <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>chat">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Chat Messages</a>
             </li>
             <li class="nav-item ">
                 <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/support-chat">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Support Chat</a>
             </li>

             </ul>
     </li>
   <!-- chat -->
   <!-- employee -->
   <li class="nav-item submenu7">
         <a class="nav-link" href="#sub-menu7" data-toggle="collapse" data-target="#sub-menu7">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Employees<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
         <ul class="list-unstyled flex-column collapse" id="sub-menu7" aria-expanded="false">
             <li class="nav-item ">
                 <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>team">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/req-tem.png" class="img-fluid">All Employees</a>
             </li>
             <li class="nav-item ">
                 <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/resignation-list">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/resign-employe.png" class="img-fluid">Resignations List</a>
             </li>
             <li class="nav-item ">
                 <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/employee-salary">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Salary Calculation</a>
             </li>
             <li class="nav-item ">
                 <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/attendance">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Attendance</a>
             </li>
             <li class="nav-item ">
                 <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/announcement">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Announcement</a>
             </li>
             <li class="nav-item ">
                 <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/performance">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Performance</a>
             </li>
             </ul>
        </li>
   <!-- employee -->


      <!-- recuitment -->
      <li class="nav-item submenu8">
            <a class="nav-link" href="#sub-menu8" data-toggle="collapse" data-target="#sub-menu8">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/req-tem.png" class="img-fluid">Recruitment<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
            <ul class="list-unstyled flex-column collapse" id="sub-menu8" aria-expanded="false">
                <li class="nav-item ">
                    <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>freelancer/job-opening">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Job Opening</a>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/recruitment">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Candidates</a>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/interview">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Interview</a>
                </li>
                </ul>
        </li>
      <!-- recuitment -->

      <!-- leave Status -->
      <li class="nav-item submenu9">
            <a class="nav-link" href="#sub-menu9" data-toggle="collapse" data-target="#sub-menu9">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/leave-icon.png" class="img-fluid">Leave Status<i class="fa fa-angle-down pull-right" aria-hidden="false"></i></a>
            <ul class="list-unstyled flex-column collapse" id="sub-menu9" aria-expanded="false">
                <li class="nav-item ">
                    <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>freelancer/leavetype">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Leave type</a>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/leavetype">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Leave Requests</a>
                </li>

                </ul>
        </li>
      <!-- Leave Status -->

    <!-- account -->
    <li class="nav-item submenu10">
          <a class="nav-link" href="#sub-menu10" data-toggle="collapse" data-target="#sub-menu10">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/account-icon.png" class="img-fluid">Account<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
          <ul class="list-unstyled flex-column collapse" id="sub-menu10" aria-expanded="false">

              <li class="nav-item ">
                  <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>expense">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Expense</a>
              </li>
         <li class="nav-item ">
                  <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/invoice">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Invoice</a>
              </li>

              </ul>
      </li>
    <!-- account -->
         <li class="<?php if($this->uri->segment(2) == "work-scheduling"){ echo "active"; }  ?>">
             <a href="<?php echo base_url(); ?>freelancer/work-scheduling">
                 <img src="<?php echo base_url(); ?>assets/dashboard/images/work-schedule.png" class="img-fluid"> Work Scheduling</a>
         </li>
         <li class="<?php if($this->uri->segment(2) == "holiday"){ echo "active"; }  ?>">
             <a href="<?php echo base_url(); ?>freelancer/holiday">
                 <img src="<?php echo base_url(); ?>assets/dashboard/images/holiday-icon.png" class="img-fluid"> Holiday</a>
         </li>

         <!-- daily status report -->
         <li class="nav-item submenu11">
               <a class="nav-link" href="#sub-menu11" data-toggle="collapse" data-target="#sub-menu11">
                   <img src="<?php echo base_url(); ?>assets/dashboard/images/Dsr.png" class="img-fluid">Daily Status Report<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
               <ul class="list-unstyled flex-column collapse" id="sub-menu11" aria-expanded="false">

                   <li class="nav-item ">
                       <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/employee-dsr">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">My DSR</a>
                   </li>
                   <li class="nav-item ">
                       <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/manager-dsr">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Timesheet</a>
                   </li>

                   </ul>
           </li>
         <!-- daily status report -->
          <!-- submit leave -->
          <li class="<?php if($this->uri->segment(2) == "employee_leave"){ echo "active"; }  ?>">
              <a href="<?php echo base_url(); ?>freelancer/employee_leave">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/submit-leave.png" class="img-fluid">Submit Leave</a>
          </li>
          <li class="<?php if($this->uri->segment(2) == "resignation"){ echo "active"; }  ?>">
              <a href="<?php echo base_url(); ?>freelancer/resignation">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/resign-icon.png" class="img-fluid"> Resignation</a>
          </li>
          <!-- submit leave -->
         <!-- setting -->
         <li class="nav-item submenu12">
               <a class="nav-link" href="#sub-menu12" data-toggle="collapse" data-target="#sub-menu12">
                   <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
               <ul class="list-unstyled flex-column collapse" id="sub-menu12" aria-expanded="false">

                   <li class="nav-item ">
                       <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/basicinform">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Change Password</a>
                   </li>
                   </ul>
           </li>
         <!-- setting -->
         <!-- logout -->
         <li class="">
           <a href="<?php echo base_url(); ?>logout">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/log-out.png" class="img-fluid">Logout</a>
         </li>
         <!-- logout -->
       <?php } ?>
  <!-- ****************Hr menu********************************** -->

    <!-- *********************project manager menus************************* -->
    <?php
   if ($this->session->userdata['clientloggedin']['access'] == '6')
    {
     ?>
    <li class="<?php if($this->uri->segment(2) == "dashboard"){ echo "active"; }  ?>">
        <a href="<?php echo base_url(); ?>freelancer/dashboard">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "team_profile"){ echo "active"; }  ?>">
        <a href="<?php echo base_url(); ?>freelancer/team_profile">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
    </li>

   <li class="<?php if($this->uri->segment(2) == "todo"){ echo "active"; }  ?>">
     <a href="<?php echo base_url(); ?>freelancer/todo">
       <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Task</a>
   </li>



     <!-- chat -->
     <li class="nav-item submenu13">
           <a class="nav-link" href="#sub-menu13" data-toggle="collapse" data-target="#sub-menu13">
               <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
           <ul class="list-unstyled flex-column collapse" id="sub-menu13" aria-expanded="false">
               <li class="nav-item ">
                   <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>chat">
                       <img src="<?php echo base_url(); ?>assets/dashboard/images/chat-message.png" class="img-fluid">Chat Messages</a>
               </li>
               <li class="nav-item ">
                   <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/support-chat">
                       <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Support Chat</a>
               </li>

               </ul>
       </li>
     <!-- chat -->


        <li class="<?php if($this->uri->segment(2) == "interviewfeedback"){ echo "active"; }  ?>">
          <a href="<?php echo base_url(); ?>freelancer/interviewfeedback">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Interview Feedback</a>
        </li>



      <!-- account -->
      <li class="nav-item submenu14">
            <a class="nav-link" href="#sub-menu14" data-toggle="collapse" data-target="#sub-menu14">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Account<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
            <ul class="list-unstyled flex-column collapse" id="sub-menu14" aria-expanded="false">
           <li class="nav-item ">
                    <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/invoice">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Invoice</a>
                </li>

                </ul>
        </li>
      <!-- account -->

           <!-- daily status report -->
           <li class="nav-item submenu15">
                 <a class="nav-link" href="#sub-menu15" data-toggle="collapse" data-target="#sub-menu15">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Daily Status Report<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                 <ul class="list-unstyled flex-column collapse" id="sub-menu15" aria-expanded="false">

                     <li class="nav-item ">
                         <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/employee-dsr">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">My DSR</a>
                     </li>
                     <li class="nav-item ">
                         <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/manager-dsr">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Timesheet</a>
                     </li>

                     </ul>
             </li>
           <!-- daily status report -->
           <li class="<?php if($this->uri->segment(2) == "project-assign"){ echo "active"; }  ?>">
               <a href="<?php echo base_url(); ?>freelancer/project-assign">
                   <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Project</a>
           </li>
            <!-- submit leave -->
            <li class="<?php if($this->uri->segment(2) == "employee_leave"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>freelancer/employee_leave">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Submit Leave</a>
            </li>
            <li class="<?php if($this->uri->segment(2) == "resignation"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>freelancer/resignation">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid"> Resignation</a>
            </li>
            <li class="<?php if($this->uri->segment(2) == "emp-announcement"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>freelancer/emp-announcement">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid"> Announcement</a>
            </li>
            <!-- submit leave -->
           <!-- setting -->
           <li class="nav-item submenuM">
                 <a class="nav-link" href="#sub-menuM" data-toggle="collapse" data-target="#sub-menu">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                 <ul class="list-unstyled flex-column collapse" id="sub-menuM" aria-expanded="false">

                     <li class="nav-item ">
                         <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/basicinform">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Change Password</a>
                     </li>

                     </ul>
             </li>
           <!-- setting -->
           <!-- logout -->
           <li class="">
             <a href="<?php echo base_url(); ?>logout">
               <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Logout</a>
           </li>
           <!-- logout -->
         <?php } ?>
    <!--**********************project manager menus ************************-->

     <!-- ********************sales team menus *****************************-->
     <?php
    if ($this->session->userdata['clientloggedin']['access'] == '2')
     {
      ?>
     <li class="<?php if($this->uri->segment(2) == "dashboard"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>freelancer/dashboard">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
     </li>
     <li class="<?php if($this->uri->segment(2) == "team_profile"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>freelancer/team_profile">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
     </li>

    <li class="<?php if($this->uri->segment(2) == "todo"){ echo "active"; }  ?>">
      <a href="<?php echo base_url(); ?>freelancer/todo">
        <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Task</a>
    </li>

    <!-- project managment -->
  <li class="nav-item submenu16">
        <a class="nav-link" href="#sub-menu16" data-toggle="collapse" data-target="#sub-menu16">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Project Managment<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
        <ul class="list-unstyled flex-column collapse" id="sub-menu16" aria-expanded="false">
            <li class="nav-item ">
                <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>find-work">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Find Work</a>
            </li>
            <li class="nav-item ">
                <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/job">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Job Offer</a>
            </li>
            <li class="nav-item ">
                <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/contract">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Contract</a>
            </li>
            <li class="nav-item ">
                <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/proposal">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Proposal</a>
            </li>

        </ul>
    </li>
    <!-- project managment -->

    <!-- other info -->
<li class="nav-item submenu17">
      <a class="nav-link" href="#sub-menu17" data-toggle="collapse" data-target="#sub-menu17">
          <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Other Info<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
      <ul class="list-unstyled flex-column collapse" id="sub-menu17" aria-expanded="false">
          <li class="nav-item ">
              <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>services">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Add Services</a>
          </li>
          <li class="nav-item ">
              <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/service_briefing">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Service Briefing</a>
          </li>
          <li class="nav-item ">
              <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/service_pricing">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Add Packages</a>
          </li>
          <li class="nav-item ">
              <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/testimonial">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Testimonials</a>
          </li>
          <li class="nav-item ">
              <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/portfolio">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Portfolios</a>
          </li>
          <li class="nav-item ">
              <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/casestudy">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Case Studies</a>
          </li>

      </ul>
  </li>
  <!-- other info -->




      <!-- chat -->
      <li class="nav-item submenu18">
            <a class="nav-link" href="#sub-menu18" data-toggle="collapse" data-target="#sub-menu18">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
            <ul class="list-unstyled flex-column collapse" id="sub-menu18" aria-expanded="false">
                <li class="nav-item ">
                    <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>chat">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Chat Messages</a>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/support-chat">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Support Chat</a>
                </li>

                </ul>
        </li>
      <!-- chat -->

      <li class="<?php if($this->uri->segment(2) == "project"){ echo "active"; }  ?>">
          <a href="<?php echo base_url(); ?>freelancer/project">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Project</a>
      </li>


         <li class="<?php if($this->uri->segment(2) == "interviewfeedback"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>freelancer/interviewfeedback">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Interview Feedback</a>
         </li>



       <!-- account -->
       <li class="nav-item submenu19">
             <a class="nav-link" href="#sub-menu19" data-toggle="collapse" data-target="#sub-menu19">
                 <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Account<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
             <ul class="list-unstyled flex-column collapse" id="sub-menu19" aria-expanded="false">
            <li class="nav-item ">
                     <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/invoice">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Invoice</a>
                 </li>

                 </ul>
         </li>
       <!-- account -->

            <!-- daily status report -->

            <li class="<?php if($this->uri->segment(2) == "employee-dsr"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>freelancer/employee-dsr">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">My DSR</a>
            </li>

             <!-- submit leave -->
             <li class="<?php if($this->uri->segment(2) == "employee_leave"){ echo "active"; }  ?>">
                 <a href="<?php echo base_url(); ?>freelancer/employee_leave">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Submit Leave</a>
             </li>
             <li class="<?php if($this->uri->segment(2) == "resignation"){ echo "active"; }  ?>">
                 <a href="<?php echo base_url(); ?>freelancer/resignation">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid"> Resignation</a>
             </li>
             <li class="<?php if($this->uri->segment(2) == "emp-announcement"){ echo "active"; }  ?>">
                 <a href="<?php echo base_url(); ?>freelancer/emp-announcement">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid"> Announcement</a>
             </li>
             <!-- submit leave -->
            <!-- setting -->
            <li class="nav-item submenu20">
                  <a class="nav-link" href="#sub-menu20" data-toggle="collapse20" data-target="#sub-menu20">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                  <ul class="list-unstyled flex-column collapse" id="sub-menu" aria-expanded="false">

                      <li class="nav-item ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/basicinform">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Change Password</a>
                      </li>

                      </ul>
              </li>
            <!-- setting -->
            <!-- logout -->
            <li class="">
              <a href="<?php echo base_url(); ?>logout">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Logout</a>
            </li>
            <!-- logout -->
          <?php } ?>
          <!-- ********************sales team menus *****************************-->

          <!-- *********************employee menus****************************** -->
          <?php
         if ($this->session->userdata['clientloggedin']['access'] == '3')
          {
           ?>
          <li class="<?php if($this->uri->segment(2) == "dashboard"){ echo "active"; }  ?>">
              <a href="<?php echo base_url(); ?>freelancer/dashboard">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
          </li>
          <li class="<?php if($this->uri->segment(2) == "team_profile"){ echo "active"; }  ?>">
              <a href="<?php echo base_url(); ?>freelancer/team_profile">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
          </li>

         <li class="<?php if($this->uri->segment(2) == "todo"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>freelancer/todo">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Task</a>
         </li>

           <!-- chat -->
           <li class="nav-item submenu21">
                 <a class="nav-link" href="#sub-menu21" data-toggle="collapse" data-target="#sub-menu21">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                 <ul class="list-unstyled flex-column collapse" id="sub-menu21" aria-expanded="false">
                     <li class="nav-item ">
                         <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>chat">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Chat Messages</a>
                     </li>
                     <li class="nav-item ">
                         <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/support-chat">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Support Chat</a>
                     </li>

                     </ul>
             </li>
           <!-- chat -->

              <li class="<?php if($this->uri->segment(2) == "interviewfeedback"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>freelancer/interviewfeedback">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Interview Feedback</a>
              </li>

              <li class="<?php if($this->uri->segment(2) == "my-projects"){ echo "active"; }  ?>">
                  <a href="<?php echo base_url(); ?>freelancer/my-projects">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Project</a>
              </li>

                 <!-- daily status report -->

                 <li class="<?php if($this->uri->segment(2) == "employee-dsr"){ echo "active"; }  ?>">
                     <a href="<?php echo base_url(); ?>freelancer/employee-dsr">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">My DSR</a>
                 </li>

                  <!-- submit leave -->
                  <li class="<?php if($this->uri->segment(2) == "employee_leave"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>freelancer/employee_leave">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Submit Leave</a>
                  </li>
                  <li class="<?php if($this->uri->segment(2) == "resignation"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>freelancer/resignation">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid"> Resignation</a>
                  </li>
                  <li class="<?php if($this->uri->segment(2) == "emp-announcement"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>freelancer/emp-announcement">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid"> Announcement</a>
                  </li>
                  <!-- submit leave -->
                 <!-- setting -->
                 <li class="nav-item submenu22">
                       <a class="nav-link" href="#sub-menu22" data-toggle="collapse" data-target="#sub-menu22">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                       <ul class="list-unstyled flex-column collapse" id="sub-menu22" aria-expanded="false">

                           <li class="nav-item ">
                               <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/basicinform">
                                   <img src="<?php echo base_url(); ?>assets/dashboard/images/email.svg" class="img-fluid">Change Password</a>
                           </li>

                           </ul>
                   </li>
                 <!-- setting -->
                 <!-- logout -->
                 <li class="">
                   <a href="<?php echo base_url(); ?>logout">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Logout</a>
                 </li>
                 <!-- logout -->
               <?php } ?>
          <!-- *********************employee menus****************************** -->


    </ul>
</div>
