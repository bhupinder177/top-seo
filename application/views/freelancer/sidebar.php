<div id="sidebar">
    <ul>
     <!-- ****************company and freelancer menu********************************** -->
     <?php

      $loginuser = getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
      if($loginuser->parent != 0)
      {
       $loginuserId = $loginuser->parent;
      }
      else
      {
        $loginuserId = $this->session->userdata['clientloggedin']['id'];
      }
      $incomeaccess = getrow('income_access',array("userId"=>$loginuserId,"access"=>$this->session->userdata['clientloggedin']['access']));
      if($this->session->userdata['clientloggedin']['type'] == 2 || $this->session->userdata['clientloggedin']['type'] == 3 )
		  {
        if($this->session->userdata['clientloggedin']['parent'] == 0)
        {

							?>
     <li class="<?php if($this->uri->segment(1) == "dashboard"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
     </li>
     <li class="<?php if($this->uri->segment(1) == "cprofile"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>cprofile/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
     </li>
     <li class="<?php if($this->uri->segment(1) == "chat"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat</a>
     </li>

     <?php
				if($this->session->userdata['clientloggedin']['type'] == '2')
				{
          ?>
    <li class="<?php if($this->uri->segment(1) == "task"){ echo "active"; }  ?>">
      <a href="<?php echo base_url(); ?>task/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
        <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Tasks</a>
    </li>
  <?php } ?>

   <li class="<?php if($this->uri->segment(1) == "giglist"){ echo "active"; }  ?>">
     <a href="<?php echo base_url(); ?>giglist/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
        <img src="<?php echo base_url(); ?>assets/dashboard/images/gig.png" class="img-fluid">Gigs </a>
  </li>



  <li class="<?php if($this->uri->segment(1) == "askquestion"){ echo "active"; }  ?>">
     <a href="<?php echo base_url(); ?>askquestion/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
        <img src="<?php echo base_url(); ?>assets/dashboard/images/ask-q.png" class="img-fluid">Ask A Question</a>
  </li>



  <!-- account -->
  <li class="nav-item submenu3">
        <a class="nav-link" href="#sub-menu3" data-toggle="collapse" data-target="#sub-menu3">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/ACCOUNT.png" class="img-fluid">Account<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
        <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "expense" || $this->uri->segment(1) == "invoice" || $this->uri->segment(1) == "income" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu3" aria-expanded="false">
          <?php
       if($this->session->userdata['clientloggedin']['type'] == '2')
       {
         ?>
            <li class="nav-item <?php if($this->uri->segment(1) == "expense"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>expense/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/expense.png" class="img-fluid">Expense</a>
            </li>
     <?php } ?>
            <li class="nav-item <?php if($this->uri->segment(1) == "invoice"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>invoice/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/invoice.png" class="img-fluid">Invoice</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == "income"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>income/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/salary-icon.png" class="img-fluid">Income</a>
            </li>
            </ul>
    </li>
  <!-- account -->
  <!-- return on investment -->
  <li class="nav-item submenu4">
        <a class="nav-link" href="#sub-menu4" data-toggle="collapse" data-target="#sub-menu4">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/investment-icon.png" class="img-fluid">Profilt & Loss<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
        <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "roi" || $this->uri->segment(1) == "company-roi" || $this->uri->segment(1) == "employee-roi"  ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu4" aria-expanded="false">

            <li class="nav-item <?php if($this->uri->segment(1) == "roi"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>roi/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/roi.png" class="img-fluid">Project P&L</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == "company-roi"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>company-roi/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/compa-roi.png" class="img-fluid">Company P&L</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == "employee-roi"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>employee-roi/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/employees.png" class="img-fluid">Employee P&L</a>
            </li>
            </ul>
    </li>
  <!-- return on investment -->

    <li class="<?php if($this->uri->segment(1) == "membership"){ echo "active"; }  ?>">
        <a href="<?php echo base_url(); ?>membership/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid"> Membership</a>
    </li>
<?php
    if($this->session->userdata['clientloggedin']['type'] == 2)
    {
      ?>
    <!-- Hr department -->
    <li class="nav-item submenu7">
          <a class="nav-link" href="#sub-menu7" data-toggle="collapse" data-target="#sub-menu7">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/hr.png" class="img-fluid">HR Department<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
          <ul class="list-unstyled flex-column collapse <?php if($this->uri->segment(1) == "team" || $this->uri->segment(1) == "work-scheduling" || $this->uri->segment(1) == "resignation-list" || $this->uri->segment(1) == "employee-salary" || $this->uri->segment(1) == "attendance" || $this->uri->segment(1) == "performance" || $this->uri->segment(1) == "employee-increment" || $this->uri->segment(1) == "announcement" || $this->uri->segment(1) == "employee-increment" || $this->uri->segment(1) == "interview" || $this->uri->segment(1) == "leavetype" ||  $this->uri->segment(1) == "holiday" || $this->uri->segment(1) == "manager-dsr" || $this->uri->segment(1) == "departments" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu7" aria-expanded="false">
            <li class="nav-item <?php if($this->uri->segment(1) == "departments"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>departments/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/req-tem.png" class="img-fluid">Department</a>
            </li>

            <li class="nav-item <?php if($this->uri->segment(1) == "work-scheduling"){ echo "active"; }  ?>">
             <a class="nav-link" href="<?php echo base_url(); ?>work-scheduling/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                 <img src="<?php echo base_url(); ?>assets/dashboard/images/work-schedule.png" class="img-fluid">Manage Work Hours</a>
           </li>

              <li class="nav-item <?php if($this->uri->segment(1) == "team"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>team/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/req-tem.png" class="img-fluid">All Employees</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == "resignation-list"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>resignation-list/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/resign-employe.png" class="img-fluid">Resignations List</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == "employee-salary"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>employee-salary/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/salary-icon.png" class="img-fluid">Salary Calculation</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == "attendance"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>attendance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/attandance.png" class="img-fluid">Attendance</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == "announcement"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>announcement/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid">Announcement</a>
              </li>
              <!-- <li class="nav-item <?php //if($this->uri->segment(1) == "performance"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php //echo base_url(); ?>performance/<?php //echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/performance.png" class="img-fluid">Performance</a>
              </li> -->
              <li class="nav-item <?php if($this->uri->segment(1) == "employee-increment"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>employee-increment/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/performance.png" class="img-fluid">Increment</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == "interview"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>interview/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/interview.png" class="img-fluid">Interview</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == "leavetype"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>leavetype/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/leave.png" class="img-fluid">Leave Configuration</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == "leave-list"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>leave-list/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/leave-req.png" class="img-fluid">Leave Requests</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == "holiday"){ echo "active"; }  ?>">
                  <a class="nav-link" href="<?php echo base_url(); ?>holiday/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/holiday-icon.png" class="img-fluid"> Holidays</a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(1) == "manager-dsr"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>manager-dsr/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/timeline.png" class="img-fluid">Timesheet</a>
              </li>
              </ul>
         </li>

    <!-- Hr department -->
  <?php } ?>
  <!-- project managment -->
<li class="nav-item submenu">
<a class="nav-link" href="#sub-menu" data-toggle="collapse" data-target="#sub-menu">
<img src="<?php echo base_url(); ?>assets/dashboard/images/interview.png" class="img-fluid">Sales Department<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
<ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "jobs" || $this->uri->segment(1) == "request" || $this->uri->segment(1) == "project" || $this->uri->segment(1) == "contract" || $this->uri->segment(1) == "proposal" || $this->uri->segment(1) == "services" || $this->uri->segment(1) == "service_briefing" || $this->uri->segment(1) == "service_pricing" || $this->uri->segment(1) == "testimonial" || $this->uri->segment(1) == "portfolio" || $this->uri->segment(1) == "casestudy" || $this->uri->segment(1) == "lead-source" || $this->uri->segment(1) == "lead" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu" aria-expanded="false">
<li class="nav-item <?php if($this->uri->segment(2) == "find-work"){ echo "active"; } ?> ">
<a target="_blank" class="nav-link" href="<?php echo base_url(); ?>find-work">
<img src="<?php echo base_url(); ?>assets/dashboard/images/req-tem.png" class="img-fluid">Find Work</a>
</li>
<li class="nav-item <?php if($this->uri->segment(1) == "jobs"){ echo "active"; } ?>">
<a class="nav-link " href="<?php echo base_url(); ?>jobs/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/job-ofer.png" class="img-fluid">Job Offers</a>
</li>
<li class="nav-item <?php if($this->uri->segment(1) == "contract"){ echo "active"; } ?> ">
<a class="nav-link" href="<?php echo base_url(); ?>contract/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/contract.png" class="img-fluid">Contracts</a>
</li>
<li class="nav-item <?php if($this->uri->segment(1) == "proposal"){ echo "active"; } ?>">
<a class="nav-link" href="<?php echo base_url(); ?>proposal/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/proposal.png" class="img-fluid">Proposals</a>
</li>
<?php
if ($this->session->userdata['clientloggedin']['type'] == '2')
{
?>
<li class="nav-item <?php if($this->uri->segment(1) == "project"){ echo "active"; } ?>">
<a class="nav-link" href="<?php echo base_url(); ?>project/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/proposal.png" class="img-fluid">Project</a>
</li>
<?php } ?>
<li class="nav-item <?php if($this->uri->segment(1) == "request"){ echo "active"; }  ?>">
    <a  class="nav-link" href="<?php echo base_url(); ?>request/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
        <img src="<?php echo base_url(); ?>assets/dashboard/images/form-req.png" class="img-fluid">Form Request</a>
</li>
<li class="nav-item <?php if($this->uri->segment(1) == "lead-source"){ echo "active"; } ?>">
<a class="nav-link" href="<?php echo base_url(); ?>lead-source/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/add-service.png" class="img-fluid">Lead Source</a>
</li>

<li class="nav-item <?php if($this->uri->segment(1) == "lead"){ echo "active"; } ?>">
<a class="nav-link" href="<?php echo base_url(); ?>lead/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/add-service.png" class="img-fluid">Lead</a>
</li>

<li class="nav-item <?php if($this->uri->segment(1) == "services"){ echo "active"; } ?>">
<a class="nav-link" href="<?php echo base_url(); ?>services/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/add-service.png" class="img-fluid">Add Services</a>
</li>
<li class="nav-item <?php if($this->uri->segment(1) == "service_briefing"){ echo "active"; } ?> ">
<a class="nav-link" href="<?php echo base_url(); ?>service_briefing/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/service-br.png" class="img-fluid">Service Briefing</a>
</li>
<li class="nav-item <?php if($this->uri->segment(1) == "service_pricing"){ echo "active"; } ?>">
<a class="nav-link" href="<?php echo base_url(); ?>service_pricing/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/add-pack.png" class="img-fluid">Add Packages</a>
</li>
<li class="nav-item <?php if($this->uri->segment(1) == "testimonial"){ echo "active"; } ?>">
<a class="nav-link" href="<?php echo base_url(); ?>testimonial/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/testi.png" class="img-fluid">Testimonials</a>
</li>
<li class="nav-item <?php if($this->uri->segment(1) == "portfolio"){ echo "active"; } ?>">
<a class="nav-link" href="<?php echo base_url(); ?>portfolio/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid">Portfolios</a>
</li>
<li class="nav-item <?php if($this->uri->segment(1) == "casestudy"){ echo "active"; } ?>">
<a class="nav-link" href="<?php echo base_url(); ?>casestudy/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
<img src="<?php echo base_url(); ?>assets/dashboard/images/case-s.png" class="img-fluid">Case Studies</a>
</li>

</ul>
</li>
<!-- project managment -->



      <li class="<?php if($this->uri->segment(1) == "reviews"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>reviews/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/testi.png" class="img-fluid">Reviews</a>
      </li>

      <li class="<?php if($this->uri->segment(1) == "notification"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>notification/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/notification.png" class="img-fluid">Notifications</a>
      </li>



      <!-- <li class="<?php //if($this->uri->segment(2) == "paid-ranking"){ echo "active"; }  ?>">
         <a href="<?php //echo base_url(); ?>freelancer/paid-ranking">
            <img src="<?php //echo base_url(); ?>assets/dashboard/images/notification.png" class="img-fluid">Paid ranking</a>
      </li> -->
            <!-- setting -->
            <li class="nav-item submenu5">
                  <a class="nav-link" href="#sub-menu5" data-toggle="collapse" data-target="#sub-menu5">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                  <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "basicinform" || $this->uri->segment(1) == "upgrade" || $this->uri->segment(1) == "account-setting" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu5" aria-expanded="false">

                      <li class="nav-item <?php if($this->uri->segment(2) == "basicinform"){ echo "active"; }  ?>">
                          <a  class="nav-link" href="<?php echo base_url(); ?>basicinform/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Basic Information</a>
                      </li>

                      <li class="nav-item <?php if($this->uri->segment(1) == "task-setting"){ echo "active"; }  ?>">
                          <a  class="nav-link" href="<?php echo base_url(); ?>task-setting/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Task Settings</a>
                      </li>
                      <li class="nav-item <?php if($this->uri->segment(1) == "account-setting"){ echo "active"; }  ?>">
                          <a  class="nav-link" href="<?php echo base_url(); ?>account-setting/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Account Settings</a>
                      </li>

                      <?php
	                  if ($this->session->userdata['clientloggedin']['type'] == '3' && $this->session->userdata['clientloggedin']['parent'] == 0)
                    {
		                    ?>
                      <li class="nav-item <?php if($this->uri->segment(2) == "upgrade"){ echo "active"; }  ?>">
                          <a  class="nav-link" href="<?php echo base_url(); ?>freelancer/upgrade">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Profile upgrade</a>
                      </li>
                    <?php } ?>
                      </ul>
              </li>
            <!-- setting -->
            <!-- logout -->


            <li class="">
              <a href="<?php echo base_url(); ?>logout">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/log-out.png" class="img-fluid">Logout</a>
            </li>
            <!-- logout -->

 <?php } } ?>
  <!-- ****************company and freelancer menu********************************** -->

  <!-- ****************Hr menu********************************** -->
  <?php
	if ($this->session->userdata['clientloggedin']['access'] == '5')
  {
		?>
  <li class="<?php if($this->uri->segment(1) == "dashboard"){ echo "active"; }  ?>">
      <a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
          <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
  </li>
  <li class="<?php if($this->uri->segment(1) == "team_profile"){ echo "active"; }  ?>">
      <a href="<?php echo base_url(); ?>team_profile/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
          <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
  </li>

 <li class="<?php if($this->uri->segment(1) == "task"){ echo "active"; }  ?>">
   <a href="<?php echo base_url(); ?>task/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
     <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Tasks</a>
 </li>



   <!-- chat -->
   <li class="<?php if($this->uri->segment(1) == "chat"){ echo "active"; }  ?>">
       <a href="<?php echo base_url(); ?>chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
           <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat</a>
   </li>
   <!-- <li class="nav-item submenu6">
         <a class="nav-link" href="#sub-menu6" data-toggle="collapse" data-target="#sub-menu6">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat<i class="fa fa-angle-down pull-right" aria-hidden="false"></i></a>
         <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "chat" || $this->uri->segment(1) == "support-chat" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu6" aria-expanded="false">
             <li class="nav-item <?php if($this->uri->segment(1) == "chat"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/chat-message.png" class="img-fluid">Chat Messages</a>
             </li>
             <li class="nav-item <?php if($this->uri->segment(1) == "support-chat"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>support-chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/chat-support.png" class="img-fluid">Support Chat</a>
             </li>

             </ul>
     </li> -->
   <!-- chat -->
   <!-- employee -->
   <li class="nav-item submenu7">
         <a class="nav-link" href="#sub-menu7" data-toggle="collapse" data-target="#sub-menu7">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Employees<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
         <ul class="list-unstyled flex-column collapse <?php if($this->uri->segment(1) == "team" || $this->uri->segment(1) == "departments" || $this->uri->segment(1) == "resignation-list" || $this->uri->segment(1) == "employee-salary" || $this->uri->segment(1) == "attendance" || $this->uri->segment(1) == "performance" || $this->uri->segment(1) == "employee-increment" || $this->uri->segment(1) == "announcement" || $this->uri->segment(1) == "employee-increment" || $this->uri->segment(1) == "performance-form" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu7" aria-expanded="false">
             <li class="nav-item <?php if($this->uri->segment(1) == "team"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>team/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/req-tem.png" class="img-fluid">All Employees</a>
             </li>
             <li class="nav-item <?php if($this->uri->segment(1) == "departments"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>departments/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/req-tem.png" class="img-fluid">Department</a>
             </li>
             <li class="nav-item <?php if($this->uri->segment(1) == "resignation-list"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>resignation-list/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/resign-employe.png" class="img-fluid">Resignations List</a>
             </li>
             <li class="nav-item <?php if($this->uri->segment(1) == "employee-salary"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>employee-salary/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/salary-icon.png" class="img-fluid">Salary Calculation</a>
             </li>
             <li class="nav-item <?php if($this->uri->segment(1) == "attendance"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>attendance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/attandance.png" class="img-fluid">Attendance</a>
             </li>
             <li class="nav-item <?php if($this->uri->segment(1) == "announcement"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>announcement/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid">Announcement</a>
             </li>
             <li class="nav-item <?php if($this->uri->segment(1) == "performance-form"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>performance-form/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/performance.png" class="img-fluid">Performance form</a>
             </li>
             <li class="nav-item <?php if($this->uri->segment(1) == "performance"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>performance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/performance.png" class="img-fluid">Performance</a>
             </li>

             <li class="nav-item <?php if($this->uri->segment(1) == "employee-increment"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>employee-increment/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/performance.png" class="img-fluid">Increment</a>
             </li>
             </ul>
        </li>
   <!-- employee -->


      <!-- recuitment -->
      <li class="nav-item submenu8">
            <a class="nav-link" href="#sub-menu8" data-toggle="collapse" data-target="#sub-menu8">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/req-tem.png" class="img-fluid">Recruitment<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
            <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "job-opening" || $this->uri->segment(1) == "recruitment" || $this->uri->segment(1) == "interview" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu8" aria-expanded="false">
                <li class="nav-item <?php if($this->uri->segment(1) == "job-opening"){ echo "active"; }  ?>">
                    <a  class="nav-link" href="<?php echo base_url(); ?>job-opening/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/job-open.png" class="img-fluid">Job Openings</a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1) == "recruitment"){ echo "active"; }  ?>">
                    <a  class="nav-link" href="<?php echo base_url(); ?>recruitment/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/candidate.png" class="img-fluid">Candidates</a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1) == "interview"){ echo "active"; }  ?>">
                    <a  class="nav-link" href="<?php echo base_url(); ?>interview/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/interview.png" class="img-fluid">Interviews</a>
                </li>
                </ul>
        </li>
      <!-- recuitment -->

      <!-- leave Status -->
      <li class="nav-item submenu9">
            <a class="nav-link" href="#sub-menu9" data-toggle="collapse" data-target="#sub-menu9">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/leave-icon.png" class="img-fluid">Leave Status<i class="fa fa-angle-down pull-right" aria-hidden="false"></i></a>
            <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "leavetype" || $this->uri->segment(1) == "leave-list" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu9" aria-expanded="false">
                <li class="nav-item <?php if($this->uri->segment(1) == "leavetype"){ echo "active"; }  ?>">
                    <a  class="nav-link" href="<?php echo base_url(); ?>leavetype/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/leave.png" class="img-fluid">Leave Configuration</a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1) == "leave-list"){ echo "active"; }  ?>">
                    <a  class="nav-link" href="<?php echo base_url(); ?>leave-list/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/leave-req.png" class="img-fluid">Leave Requests</a>
                </li>

                </ul>
        </li>
      <!-- Leave Status -->

    <!-- account -->
    <li class="nav-item submenu10">
          <a class="nav-link" href="#sub-menu10" data-toggle="collapse" data-target="#sub-menu10">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/ACCOUNT.png" class="img-fluid">Account<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
          <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "expense" || $this->uri->segment(1) == "invoice" || $this->uri->segment(1) == "income" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu10" aria-expanded="false">

              <li class="nav-item <?php if($this->uri->segment(1) == "expense"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>expense/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/expense.png" class="img-fluid">Expense</a>
              </li>

         <li class="nav-item <?php if($this->uri->segment(1) == "invoice"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>invoice/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/invoice.png" class="img-fluid">Invoice</a>
          </li>
          <?php
          if(!empty($incomeaccess))
          {
            ?>
              <li class="nav-item <?php if($this->uri->segment(1) == "income"){ echo "active"; }  ?>">
                  <a  class="nav-link" href="<?php echo base_url(); ?>income/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/salary-icon.png" class="img-fluid">Income</a>
              </li>
            <?php } ?>
              </ul>
      </li>
    <!-- account -->
         <li class="<?php if($this->uri->segment(1) == "work-scheduling"){ echo "active"; }  ?>">
             <a href="<?php echo base_url(); ?>work-scheduling/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                 <img src="<?php echo base_url(); ?>assets/dashboard/images/work-schedule.png" class="img-fluid">Manage Work Hours</a>
         </li>
         <li class="<?php if($this->uri->segment(1) == "holiday"){ echo "active"; }  ?>">
             <a href="<?php echo base_url(); ?>holiday/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                 <img src="<?php echo base_url(); ?>assets/dashboard/images/holiday-icon.png" class="img-fluid">Holidays</a>
         </li>

         <!-- daily status report -->
         <li class="nav-item submenu11">
               <a class="nav-link" href="#sub-menu11" data-toggle="collapse" data-target="#sub-menu11">
                   <img src="<?php echo base_url(); ?>assets/dashboard/images/Dsr.png" class="img-fluid">Daily Status Report<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
               <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "employee-dsr" || $this->uri->segment(1) == "manager-dsr" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu11" aria-expanded="false">

                   <li class="nav-item <?php if($this->uri->segment(1) == "employee-dsr"){ echo "active"; }  ?>">
                       <a  class="nav-link" href="<?php echo base_url(); ?>employee-dsr/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/my_dsr.png" class="img-fluid">My DSR</a>
                   </li>
                   <li class="nav-item <?php if($this->uri->segment(1) == "manager-dsr"){ echo "active"; }  ?>">
                       <a  class="nav-link" href="<?php echo base_url(); ?>manager-dsr/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/timeline.png" class="img-fluid">Timesheet</a>
                   </li>

                   </ul>
           </li>
         <!-- daily status report -->
          <!-- submit leave -->
          <li class="<?php if($this->uri->segment(1) == "employee-leave"){ echo "active"; }  ?>">
              <a href="<?php echo base_url(); ?>employee-leave/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/submit-leave.png" class="img-fluid">My Leaves</a>
          </li>
          <li class="<?php if($this->uri->segment(1) == "resignation"){ echo "active"; }  ?>">
              <a href="<?php echo base_url(); ?>resignation/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/resign-icon.png" class="img-fluid"> Resignation</a>
          </li>
          <!-- submit leave -->

          <li class="<?php if($this->uri->segment(1) == "notification"){ echo "active"; }  ?>">
             <a href="<?php echo base_url(); ?>notification/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/notification.png" class="img-fluid">Notifications</a>
          </li>

         <!-- setting -->
         <li class="nav-item submenu12">
               <a class="nav-link" href="#sub-menu12" data-toggle="collapse" data-target="#sub-menu12">
                   <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
               <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "basicinform" || $this->uri->segment(1) == "performance-setting" || $this->uri->segment(1) == "task-setting" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu12" aria-expanded="false">

                   <li class="nav-item <?php if($this->uri->segment(1) == "basicinform"){ echo "active"; }  ?>">
                       <a  class="nav-link" href="<?php echo base_url(); ?>basicinform/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Change Password</a>
                   </li>

                   <!-- <li class="nav-item ">
                       <a  class="nav-link" href="<?php //echo base_url(); ?>performance-setting/<?php //echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                           <img src="<?php //echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Performance settings</a>
                   </li> -->

                   <li class="nav-item <?php if($this->uri->segment(1) == "task-setting"){ echo "active"; }  ?>">
                       <a  class="nav-link" href="<?php echo base_url(); ?>task-setting/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Task Settings</a>
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
    <li class="<?php if($this->uri->segment(1) == "dashboard"){ echo "active"; }  ?>">
        <a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
    </li>
    <li class="<?php if($this->uri->segment(1) == "team_profile"){ echo "active"; }  ?>">
        <a href="<?php echo base_url(); ?>team_profile/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
    </li>

   <!-- <li class="<?php if($this->uri->segment(2) == "todo"){ echo "active"; }  ?>">
     <a href="<?php echo base_url(); ?>freelancer/todo">
       <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Task</a>
   </li> -->



     <!-- chat -->
     <li class="<?php if($this->uri->segment(1) == "chat"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat</a>
     </li>
     <!-- <li class="nav-item submenu13">
           <a class="nav-link" href="#sub-menu13" data-toggle="collapse" data-target="#sub-menu13">
               <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
           <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "chat" || $this->uri->segment(1) == "support-chat" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu13" aria-expanded="false">
               <li class="nav-item <?php if($this->uri->segment(1) == "chat"){ echo "active"; }  ?>">
                   <a  class="nav-link" href="<?php echo base_url(); ?>chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                       <img src="<?php echo base_url(); ?>assets/dashboard/images/chat-message.png" class="img-fluid">Chat Messages</a>
               </li>
               <li class="nav-item <?php if($this->uri->segment(1) == "support-chat"){ echo "active"; }  ?>">
                   <a  class="nav-link" href="<?php echo base_url(); ?>support-chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                       <img src="<?php echo base_url(); ?>assets/dashboard/images/chat-support.png" class="img-fluid">Support Chat</a>
               </li>
               </ul>
       </li> -->
     <!-- chat -->
        <li class="<?php if($this->uri->segment(1) == "interviewfeedback"){ echo "active"; }  ?>">
          <a href="<?php echo base_url(); ?>interviewfeedback/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Interview Feedback</a>
        </li>
      <!-- account -->
      <li class="nav-item submenu14">
            <a class="nav-link" href="#sub-menu14" data-toggle="collapse" data-target="#sub-menu14">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/ACCOUNT.png" class="img-fluid">Account<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
            <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "invoice" || $this->uri->segment(1) == "income" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu14" aria-expanded="false">
           <li class="nav-item <?php if($this->uri->segment(2) == "invoice"){ echo "active"; }  ?>">
                    <a  class="nav-link" href="<?php echo base_url(); ?>invoice/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/invoice.png" class="img-fluid">Invoice</a>
          </li>

          <?php
         if(!empty($incomeaccess))
         {
           ?>
             <li class="nav-item <?php if($this->uri->segment(1) == "income"){ echo "active"; }  ?>">
                 <a  class="nav-link" href="<?php echo base_url(); ?>income/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/salary-icon.png" class="img-fluid">Income</a>
             </li>
           <?php } ?>



                </ul>
        </li>
      <!-- account -->

           <!-- daily status report -->
           <li class="nav-item submenu15">
                 <a class="nav-link" href="#sub-menu15" data-toggle="collapse" data-target="#sub-menu15">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Daily Status Report<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                 <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "employee-dsr" || $this->uri->segment(1) == "manager-dsr" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu15" aria-expanded="false">

                     <li class="nav-item <?php if($this->uri->segment(1) == "employee-dsr"){ echo "active"; }  ?>">
                         <a  class="nav-link" href="<?php echo base_url(); ?>employee-dsr/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/my_dsr.png" class="img-fluid">My DSR</a>
                     </li>
                     <li class="nav-item <?php if($this->uri->segment(1) == "manager-dsr"){ echo "active"; }  ?>">
                         <a  class="nav-link" href="<?php echo base_url(); ?>manager-dsr/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/timeline.png" class="img-fluid">Timesheet</a>
                     </li>

                     </ul>
             </li>
           <!-- daily status report -->

           <li class="nav-item submenu333">
                 <a class="nav-link" href="#sub-menu333" data-toggle="collapse" data-target="#sub-menu333">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Work<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                 <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "project-assign" || $this->uri->segment(1) == "contract-assign" || $this->uri->segment(1) == "task"  || $this->uri->segment(1) == "gig-assign" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu333" aria-expanded="false">
                   <li class="nav-item <?php if($this->uri->segment(1) == "task"){ echo "active"; }  ?>">
                       <a  class="nav-link" href="<?php echo base_url(); ?>task/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Tasks</a>
                   </li>
                      <li class="nav-item <?php if($this->uri->segment(1) == "project-assign"){ echo "active"; }  ?>">
                         <a  class="nav-link" href="<?php echo base_url(); ?>project-assign/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Projects</a>
                     </li>

                   <li class="nav-item <?php if($this->uri->segment(1) == "contract-assign"){ echo "active"; }  ?>">
                         <a  class="nav-link" href="<?php echo base_url(); ?>contract-assign/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Contracts</a>
                     </li>
                     <li class="nav-item <?php if($this->uri->segment(1) == "gig-assign"){ echo "active"; }  ?>">
                         <a  class="nav-link" href="<?php echo base_url(); ?>gig-assign/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Gigs</a>
                     </li>

                     </ul>
             </li>


            <!-- submit leave -->
            <li class="<?php if($this->uri->segment(1) == "leave-approval"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>leave-approval/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/submit-leave.png" class="img-fluid">Leave Approval Request</a>
            </li>
            <li class="<?php if($this->uri->segment(1) == "employee-leave"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>employee-leave/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/submit-leave.png" class="img-fluid">My Leaves</a>
            </li>
            <li class="<?php if($this->uri->segment(1) == "resignation"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>resignation/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/resign-icon.png" class="img-fluid"> Resignation</a>
            </li>
            <li class="<?php if($this->uri->segment(1) == "my-performance"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>my-performance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid">My Performance</a>
            </li>
            <li class="<?php if($this->uri->segment(1) == "manager-performance"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>manager-performance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid">Performance Review</a>
            </li>
            <li class="<?php if($this->uri->segment(1) == "emp-announcement"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>emp-announcement/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid"> Announcement</a>
            </li>
            <!-- submit leave -->

            <li class="<?php if($this->uri->segment(1) == "notification"){ echo "active"; }  ?>">
               <a href="<?php echo base_url(); ?>notification/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/notification.png" class="img-fluid">Notifications</a>
            </li>

           <!-- setting -->
           <li class="nav-item submenuM">
                 <a class="nav-link" href="#sub-menu" data-toggle="collapse" data-target="#sub-menu">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                 <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "basicinform" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu" aria-expanded="false">

                     <li class="nav-item <?php if($this->uri->segment(1) == "basicinform" ){ ?>active <?php } ?>">
                         <a  class="nav-link" href="<?php echo base_url(); ?>basicinform/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Change Password</a>
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
    <!--**********************project manager menus ************************-->

     <!-- ********************sales team menus *****************************-->
     <?php
    if ($this->session->userdata['clientloggedin']['access'] == '2')
     {
      ?>
     <li class="<?php if($this->uri->segment(1) == "dashboard"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
     </li>
     <li class="<?php if($this->uri->segment(1) == "team_profile"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>team_profile/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
     </li>

    <li class="<?php if($this->uri->segment(1) == "task"){ echo "active"; }  ?>">
      <a href="<?php echo base_url(); ?>task/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
        <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Tasks</a>
    </li>

    <!-- project managment -->
  <li class="nav-item submenu16">
        <a class="nav-link" href="#sub-menu161" data-toggle="collapse" data-target="#sub-menu161">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/interview.png" class="img-fluid">Project Managment<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
        <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "jobs" || $this->uri->segment(1) == "contract" || $this->uri->segment(1) == "proposal" || $this->uri->segment(1) == "giglist" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu161" aria-expanded="false">
             <li class="nav-item">
                <a target="_blank" class="nav-link" href="<?php echo base_url(); ?>find-work">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/req-tem.png" class="img-fluid">Find Work</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == "jobs"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>jobs/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/job-ofer.png" class="img-fluid">Job Offer</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == "contract"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>contract/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/contract.png" class="img-fluid">Contracts</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == "proposal"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>proposal/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/proposal.png" class="img-fluid">Proposal</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == "giglist"){ echo "active"; }  ?>">
                <a  class="nav-link" href="<?php echo base_url(); ?>giglist/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/gig.png" class="img-fluid">Gig</a>
            </li>

        </ul>
    </li>
    <!-- project managment -->

    <!-- other info -->
<li class="nav-item submenu17">
      <a class="nav-link" href="#sub-menu17" data-toggle="collapse" data-target="#sub-menu17">
          <img src="<?php echo base_url(); ?>assets/dashboard/images/Dsr.png" class="img-fluid">Other Info<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
      <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "services" || $this->uri->segment(1) == "service_briefing" || $this->uri->segment(1) == "service_pricing" || $this->uri->segment(1) == "testimonial" || $this->uri->segment(1) == "portfolio" || $this->uri->segment(1) == "casestudy" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu17" aria-expanded="false">
          <li class="nav-item <?php if($this->uri->segment(1) == "services"){ echo "active"; }  ?>">
              <a  class="nav-link" href="<?php echo base_url(); ?>services/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/add-service.png" class="img-fluid">Add Services</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1) == "service_briefing"){ echo "active"; }  ?>">
              <a  class="nav-link" href="<?php echo base_url(); ?>service_briefing/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/service-br.png" class="img-fluid">Service Briefing</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1) == "service_pricing"){ echo "active"; }  ?>">
              <a  class="nav-link" href="<?php echo base_url(); ?>service_pricing/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/add-pack.png" class="img-fluid">Add Packages</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1) == "testimonial"){ echo "active"; }  ?>">
              <a  class="nav-link" href="<?php echo base_url(); ?>testimonial/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/testi.png" class="img-fluid">Testimonials</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1) == "portfolio"){ echo "active"; }  ?>">
              <a  class="nav-link" href="<?php echo base_url(); ?>portfolio/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid">Portfolios</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1) == "casestudy"){ echo "active"; }  ?>">
              <a  class="nav-link" href="<?php echo base_url(); ?>casestudy/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/case-s.png" class="img-fluid">Case Studies</a>
          </li>

      </ul>
  </li>
  <!-- other info -->




      <!-- chat -->
      <li class="<?php if($this->uri->segment(1) == "chat"){ echo "active"; }  ?>">
          <a href="<?php echo base_url(); ?>chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat</a>
      </li>
      <!-- chat -->
      <li class="nav-item <?php if($this->uri->segment(1) == "lead-source"){ echo "active"; }  ?>">
          <a  class="nav-link" href="<?php echo base_url(); ?>lead-source/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/add-service.png" class="img-fluid">Lead Source</a>
      </li>

      <li class="<?php if($this->uri->segment(1) == "project"){ echo "active"; }  ?>">
          <a href="<?php echo base_url(); ?>project/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Project</a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1) == "request"){ echo "active"; }  ?>">
          <a  class="nav-link" href="<?php echo base_url(); ?>request/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/form-req.png" class="img-fluid">Form Request</a>
      </li>

      <li class="<?php if($this->uri->segment(1) == "lead"){ echo "active"; }  ?>">
          <a href="<?php echo base_url(); ?>lead/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Lead</a>
      </li>


         <li class="<?php if($this->uri->segment(1) == "interviewfeedback"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>interviewfeedback/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Interview Feedback</a>
         </li>



       <!-- account -->
       <li class="nav-item submenu19">
             <a class="nav-link" href="#sub-menu19" data-toggle="collapse" data-target="#sub-menu19">
                 <img src="<?php echo base_url(); ?>assets/dashboard/images/ACCOUNT.png" class="img-fluid">Account<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
             <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "invoice" || $this->uri->segment(1) == "income" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu19" aria-expanded="false">
            <li class="nav-item <?php if($this->uri->segment(1) == "invoice"){ echo "active"; }  ?>">
                     <a  class="nav-link" href="<?php echo base_url(); ?>invoice/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/invoice.png" class="img-fluid">Invoice</a>
                 </li>

                 <?php
                if(!empty($incomeaccess))
                {
                  ?>
                    <li class="nav-item <?php if($this->uri->segment(1) == "income"){ echo "active"; }  ?>">
                        <a  class="nav-link" href="<?php echo base_url(); ?>income/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                            <img src="<?php echo base_url(); ?>assets/dashboard/images/salary-icon.png" class="img-fluid">Income</a>
                    </li>
                  <?php } ?>

                 </ul>
         </li>
       <!-- account -->

            <!-- daily status report -->
            <li class="nav-item submenu11">
                  <a class="nav-link" href="#sub-menu11" data-toggle="collapse" data-target="#sub-menu11">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/Dsr.png" class="img-fluid">Daily Status Report<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                  <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "employee-dsr" || $this->uri->segment(1) == "manager-dsr" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu11" aria-expanded="false">

                      <li class="nav-item <?php if($this->uri->segment(1) == "employee-dsr"){ echo "active"; }  ?>">
                          <a  class="nav-link" href="<?php echo base_url(); ?>employee-dsr/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/my_dsr.png" class="img-fluid">My DSR</a>
                      </li>
                      <li class="nav-item <?php if($this->uri->segment(1) == "manager-dsr"){ echo "active"; }  ?>">
                          <a  class="nav-link" href="<?php echo base_url(); ?>manager-dsr/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/timeline.png" class="img-fluid">Timesheet</a>
                      </li>

                      </ul>
              </li>
            <!-- daily status report -->

             <!-- submit leave -->
             <li class="<?php if($this->uri->segment(1) == "leave-approval"){ echo "active"; }  ?>">
                 <a href="<?php echo base_url(); ?>leave-approval/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/submit-leave.png" class="img-fluid">Leave Approval Request</a>
             </li>
             <li class="<?php if($this->uri->segment(1) == "employee-leave"){ echo "active"; }  ?>">
                 <a href="<?php echo base_url(); ?>employee-leave/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/submit-leave.png" class="img-fluid">My Leaves</a>
             </li>
             <li class="<?php if($this->uri->segment(1) == "resignation"){ echo "active"; }  ?>">
                 <a href="<?php echo base_url(); ?>resignation/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/resign-icon.png" class="img-fluid"> Resignation</a>
             </li>
             <li class="<?php if($this->uri->segment(1) == "my-performance"){ echo "active"; }  ?>">
                 <a href="<?php echo base_url(); ?>my-performance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid">My Performance</a>
             </li>


             <li class="<?php if($this->uri->segment(1) == "manager-performance"){ echo "active"; }  ?>">
                 <a href="<?php echo base_url(); ?>manager-performance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid">Performance Review</a>
             </li>

             <li class="<?php if($this->uri->segment(1) == "emp-announcement"){ echo "active"; }  ?>">
                 <a href="<?php echo base_url(); ?>emp-announcement/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid"> Announcement</a>
             </li>
             <!-- submit leave -->

             <li class="<?php if($this->uri->segment(1) == "notification"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>notification/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                   <img src="<?php echo base_url(); ?>assets/dashboard/images/notification.png" class="img-fluid">Notifications</a>
             </li>

            <!-- setting -->
            <li class="nav-item submenu20">
                  <a class="nav-link" href="#sub-menu20" data-toggle="collapse" data-target="#sub-menu20">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                  <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "basicinform" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu20" aria-expanded="false">

                      <li class="nav-item <?php if($this->uri->segment(1) == "basicinform"){ echo "active"; }  ?>">
                          <a  class="nav-link" href="<?php echo base_url(); ?>basicinform/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Change Password</a>
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
          <!-- ********************sales team menus *****************************-->

          <!-- *********************employee menus****************************** -->
          <?php
         if ($this->session->userdata['clientloggedin']['access'] == '3')
          {
           ?>
          <li class="<?php if($this->uri->segment(1) == "dashboard"){ echo "active"; }  ?>">
              <a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
          </li>
          <li class="<?php if($this->uri->segment(1) == "team_profile"){ echo "active"; }  ?>">
              <a href="<?php echo base_url(); ?>team_profile/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
          </li>

         <li class="<?php if($this->uri->segment(1) == "task"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>task/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Tasks</a>
         </li>

           <!-- chat -->
           <li class="<?php if($this->uri->segment(1) == "chat"){ echo "active"; }  ?>">
               <a href="<?php echo base_url(); ?>chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                   <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat</a>
           </li>
           <!-- <li class="nav-item submenu21">
                 <a class="nav-link" href="#sub-menu21" data-toggle="collapse" data-target="#sub-menu21">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                 <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "chat" || $this->uri->segment(1) == "support-chat" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu21" aria-expanded="false">
                     <li class="nav-item <?php if($this->uri->segment(1) == "chat"){ echo "active"; }  ?>">
                         <a  class="nav-link" href="<?php echo base_url(); ?>chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/chat-message.png" class="img-fluid">Chat Messages</a>
                     </li>
                     <li class="nav-item <?php if($this->uri->segment(1) == "support-chat"){ echo "active"; }  ?>">
                         <a  class="nav-link" href="<?php echo base_url(); ?>support-chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/chat-support.png" class="img-fluid">Support Chat</a>
                     </li>

                     </ul>
             </li> -->
           <!-- chat -->

              <li class="<?php if($this->uri->segment(1) == "interviewfeedback"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>interviewfeedback/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Interview Feedback</a>
              </li>

              <!-- <li class="<?php if($this->uri->segment(1) == "my-projects"){ echo "active"; }  ?>">
                  <a href="<?php echo base_url(); ?>my-projects/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Project</a>
              </li> -->

                 <!-- daily status report -->

                 <li class="<?php if($this->uri->segment(1) == "employee-dsr"){ echo "active"; }  ?>">
                     <a href="<?php echo base_url(); ?>employee-dsr/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/my_dsr.png" class="img-fluid">My DSR</a>
                 </li>

                  <!-- submit leave -->
                  <li class="<?php if($this->uri->segment(1) == "leave-approval"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>leave-approval/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/submit-leave.png" class="img-fluid">Leave Approval Request</a>
                  </li>
                  <li class="<?php if($this->uri->segment(1) == "employee-leave"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>employee-leave/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/submit-leave.png" class="img-fluid">My Leaves</a>
                  </li>
                  <li class="<?php if($this->uri->segment(1) == "resignation"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>resignation/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/resign-icon.png" class="img-fluid"> Resignation</a>
                  </li>
                  <li class="<?php if($this->uri->segment(1) == "emp-announcement"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>emp-announcement/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid"> Announcement</a>
                  </li>
                  <!-- submit leave -->
                  <li class="<?php if($this->uri->segment(1) == "my-performance"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>my-performance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid">My Performance</a>
                  </li>

                  <li class="<?php if($this->uri->segment(1) == "manager-performance"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>manager-performance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid">Performance Review</a>
                  </li>

                  <li class="<?php if($this->uri->segment(1) == "notification"){ echo "active"; }  ?>">
                     <a href="<?php echo base_url(); ?>notification/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/notification.png" class="img-fluid">Notifications</a>
                  </li>

                 <!-- setting -->
                 <li class="nav-item submenu22">
                       <a class="nav-link" href="#sub-menu22" data-toggle="collapse" data-target="#sub-menu22">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                       <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "basicinform" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu22" aria-expanded="false">

                           <li class="nav-item <?php if($this->uri->segment(1) == "basicinform"){ echo "active"; }  ?>">
                               <a  class="nav-link" href="<?php echo base_url(); ?>basicinform/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                                   <img src="<?php echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Change Password</a>
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
          <!-- *********************employee menus****************************** -->



          <!-- *********************sales Employee ****************************** -->
          <?php
         if ($this->session->userdata['clientloggedin']['access'] == '7')
          {
           ?>
          <li class="<?php if($this->uri->segment(1) == "dashboard"){ echo "active"; }  ?>">
              <a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
          </li>
          <li class="<?php if($this->uri->segment(1) == "team_profile"){ echo "active"; }  ?>">
              <a href="<?php echo base_url(); ?>team_profile/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
          </li>

         <li class="<?php if($this->uri->segment(1) == "task"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>task/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid"> Tasks</a>
         </li>

           <!-- chat -->
           <li class="<?php if($this->uri->segment(1) == "chat"){ echo "active"; }  ?>">
               <a href="<?php echo base_url(); ?>chat/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                   <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat</a>
           </li>
           <!-- chat -->

              <li class="<?php if($this->uri->segment(1) == "interviewfeedback"){ echo "active"; }  ?>">
                <a href="<?php echo base_url(); ?>interviewfeedback/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/task.png" class="img-fluid">Interview Feedback</a>
              </li>

              <!-- <li class="<?php if($this->uri->segment(1) == "my-projects"){ echo "active"; }  ?>">
                  <a href="<?php echo base_url(); ?>my-projects/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Project</a>
              </li> -->

                 <!-- daily status report -->

                 <li class="<?php if($this->uri->segment(1) == "employee-dsr"){ echo "active"; }  ?>">
                     <a href="<?php echo base_url(); ?>employee-dsr/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/my_dsr.png" class="img-fluid">My DSR</a>
                 </li>
                 <li class="nav-item <?php if($this->uri->segment(1) == "lead-source"){ echo "active"; }  ?>">
                     <a  class="nav-link" href="<?php echo base_url(); ?>lead-source/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/add-service.png" class="img-fluid">Lead Source</a>
                 </li>

                 <li class="nav-item <?php if($this->uri->segment(1) == "request"){ echo "active"; }  ?>">
                     <a  class="nav-link" href="<?php echo base_url(); ?>request/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/form-req.png" class="img-fluid">Form Request</a>
                 </li>

                 <li class="<?php if($this->uri->segment(1) == "lead"){ echo "active"; }  ?>">
                     <a href="<?php echo base_url(); ?>lead/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                         <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Lead</a>
                 </li>
                  <!-- submit leave -->
                  <li class="<?php if($this->uri->segment(1) == "leave-approval"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>leave-approval/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/submit-leave.png" class="img-fluid">Leave Approval Request</a>
                  </li>
                  <li class="<?php if($this->uri->segment(1) == "employee-leave"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>employee-leave/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/submit-leave.png" class="img-fluid">My Leaves</a>
                  </li>
                  <li class="<?php if($this->uri->segment(1) == "resignation"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>resignation/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/resign-icon.png" class="img-fluid"> Resignation</a>
                  </li>
                  <li class="<?php if($this->uri->segment(1) == "emp-announcement"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>emp-announcement/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid"> Announcement</a>
                  </li>
                  <!-- submit leave -->
                  <li class="<?php if($this->uri->segment(1) == "my-performance"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>my-performance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid">My Performance</a>
                  </li>

                  <li class="<?php if($this->uri->segment(1) == "manager-performance"){ echo "active"; }  ?>">
                      <a href="<?php echo base_url(); ?>manager-performance/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/announcement.png" class="img-fluid">Performance Review</a>
                  </li>

                  <li class="<?php if($this->uri->segment(1) == "notification"){ echo "active"; }  ?>">
                     <a href="<?php echo base_url(); ?>notification/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/notification.png" class="img-fluid">Notifications</a>
                  </li>

                 <!-- setting -->
                 <li class="nav-item submenu22">
                       <a class="nav-link" href="#sub-menu22" data-toggle="collapse" data-target="#sub-menu22">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                       <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "basicinform" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu22" aria-expanded="false">

                           <li class="nav-item <?php if($this->uri->segment(1) == "basicinform"){ echo "active"; }  ?>">
                               <a  class="nav-link" href="<?php echo base_url(); ?>basicinform/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
                                   <img src="<?php echo base_url(); ?>assets/dashboard/images/change-pass.png" class="img-fluid">Change Password</a>
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
          <!-- *********************Sales employee ****************************** -->



    </ul>
</div>
