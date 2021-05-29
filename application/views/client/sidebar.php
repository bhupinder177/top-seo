<div id="sidebar">
    <ul>

     <li class="<?php if($this->uri->segment(1) == "client-dashboard"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>client-dashboard">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
     </li>
     <li class="<?php if($this->uri->segment(1) == "client-profile"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>client-profile">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid"> Profile</a>
     </li>

     <li class="<?php if($this->uri->segment(1) == "client-job"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>client-job">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/job-ofer.png" class="img-fluid">Job</a>
     </li>


        <li class="<?php if($this->uri->segment(1) == "client-contract"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>client-contract">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/contract.png" class="img-fluid">Contracts</a>
        </li>

        <li class="<?php if($this->uri->segment(1) == "client-gig"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>client-gig">
            <img src="<?php echo base_url(); ?>assets/dashboard/images/gig.png" class="img-fluid">Gigs</a>
        </li>


        <li class="<?php if($this->uri->segment(1) == "client-chat"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>client-chat">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Chat</a>
        </li>

        <li class="<?php if($this->uri->segment(1) == "client-membership"){ echo "active"; }  ?>">
            <a href="<?php echo base_url(); ?>client-membership">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid"> Membership</a>
        </li>

        <li class="<?php if($this->uri->segment(1) == "client-payment"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>client-payment">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/salary-icon.png" class="img-fluid">Payment Method</a>
        </li>


          <!-- account -->
          <li class="nav-item submenu3">
                <a class="nav-link" href="#sub-menu3" data-toggle="collapse" data-target="#sub-menu3">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/ACCOUNT.png" class="img-fluid">Account<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "client-expense" || $this->uri->segment(2) == "client-income" || $this->uri->segment(2) == "client-invoice" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu3" aria-expanded="false">

                    <li class="nav-item <?php if($this->uri->segment(1) == "client-expense"){ echo "active"; }  ?>">
                        <a  class="nav-link" href="<?php echo base_url(); ?>client-expense">
                            <img src="<?php echo base_url(); ?>assets/dashboard/images/expense.png" class="img-fluid">Expense</a>
                    </li>
                    <li class="nav-item <?php if($this->uri->segment(1) == "client-invoice"){ echo "active"; }  ?>">
                        <a  class="nav-link" href="<?php echo base_url(); ?>client-invoice">
                            <img src="<?php echo base_url(); ?>assets/dashboard/images/invoice.png" class="img-fluid">Invoice</a>
                    </li>
                    <li class="nav-item <?php if($this->uri->segment(1) == "client-income"){ echo "active"; }  ?>">
                        <a  class="nav-link" href="<?php echo base_url(); ?>client-income">
                            <img src="<?php echo base_url(); ?>assets/dashboard/images/salary-icon.png" class="img-fluid">Income</a>
                    </li>
                    </ul>
            </li>
          <!-- account -->

        <!-- <li class="<?php if($this->uri->segment(1) == "client-invoice"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>client-invoice">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/invoice.png" class="img-fluid">Invoice</a>
        </li> -->


        <!-- <li class="<?php if($this->uri->segment(1) == "client-support-chat"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>client-support-chat">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/chat-support.png" class="img-fluid">Support Chat</a>
        </li> -->


        <li class="<?php if($this->uri->segment(1) == "client-notification"){ echo "active"; }  ?>">
           <a href="<?php echo base_url(); ?>client-notification">
              <img src="<?php echo base_url(); ?>assets/dashboard/images/notification.png" class="img-fluid">Notification</a>
        </li>

            <!-- setting -->
            <li class="nav-item submenu">
                  <a class="nav-link" href="#sub-menu1" data-toggle="collapse" data-target="#sub-menu1">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Settings<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                  <ul class="list-unstyled flex-column <?php if($this->uri->segment(1) == "client-password"  ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu1" aria-expanded="false">

                      <li class="nav-item <?php if($this->uri->segment(1) == "client-password"){ echo "active"; }  ?>">
                          <a  class="nav-link" href="<?php echo base_url(); ?>client-password">
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

  <!-- ****************company and freelancer menu********************************** -->


    </ul>
</div>
