<?php
$u = getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
$team = getrow('user_top_rated_emp',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
$plan = getfreelancerPlan(array("m.userId"=>$this->session->userdata['clientloggedin']['id'],"m.membershipStatus"=>1));

$d = getrow('user_meta',array('u_id'=>$this->session->userdata['clientloggedin']['id']));

if(!empty($d))
{
 $name = $d->name;
}
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if(isset($d->logo))
                {
                  ?>
          <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $d->logo; ?>" class="img-circle" alt="profile">
        <?php }
        else{
          ?>
          <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg" class="img-circle" alt="profile">
        <?php
             }
             ?>
        </div>
        <div class="pull-left info">
          <p><?php  echo $name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="<?php if($this->uri->segment(1) == "client-dashboard"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>client-dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a> </li>
        <li class="<?php if($this->uri->segment(1) == "client-profile"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>client-profile"><i class="fa fa-user"></i> <span>Profile</span></a> </li>
        <li class="<?php if($this->uri->segment(1) == "client-job"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>client-job"><i class="fa fa-briefcase"></i> <span>Job</span></a> </li>
        <li class="<?php if($this->uri->segment(1) == "client-contract"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>client-contract"><i class="fa fa-file-text"></i> <span>Contract</span></a> </li>
        <li class="<?php if($this->uri->segment(1) == "client-chat"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>client-chat"><i class="fa fa-comments"></i> <span>Messages</span></a> </li>
        <!-- <span ng-if="unread != 0"><i class="fas fa-comment"></i>({{ unread }})</span> -->
        <li class="<?php if($this->uri->segment(1) == "client-notification"){ echo "active"; }  ?>" ><a href="<?php echo base_url(); ?>client-notification"><i class="fa fa-bell"></i><span>Notification </span></a> </li>
        <li class="<?php if($this->uri->segment(1) == "client-payment"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>client-payment"><i class="fa fa-credit-card"></i> <span>Payment Method</span></a> </li>
        <li class="<?php if($this->uri->segment(1) == "client-support"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>client-support-chat"><i class="fa fa-comments"></i> <span class="support">Support Chat</span></a> </li>
        <li class="<?php if($this->uri->segment(1) == "client-invoice"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>client-invoice"><i class="fa fa-comments"></i> <span class="support">Invoice</span></a> </li>

        <li class="treeview <?php if($this->uri->segment(1) == "client-password"){ echo "active"; }  ?> "> <a href="#"><i class="fa fa-cogs"></i> <span>Settings</span><span class="caret"></span></a>
        <ul class="treeview-menu">
        <li class="<?php if($this->uri->segment(2) == "password"){ echo "active"; }  ?>"><a href="<?php echo base_url(); ?>client-password"><i class="fa fa-unlock-alt"></i> <span>Change Password</span></a> </li>
        </ul>
        </li>
        <li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out"></i> <span>Log Out</span></a> </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
