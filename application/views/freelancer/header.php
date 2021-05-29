<?php
if (empty($this->session->userdata['clientloggedin']))
{
echo "<script> window.location.href='" . base_url()."logout'</script>";
}
else
{
if ($this->session->userdata['clientloggedin']['role'] != 'freelancer') {
echo "<script> window.location.href='" . base_url()."logout'</script>";
}

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/css/newstyle.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
    <link rel="icon" href="<?php echo base_url(); ?>assets/dashboard/images/fav.png" type="image/png" sizes="16x16" />
    	<link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet">
    <?php
 if($this->uri->segment(1) != "employee_leave" && $this->uri->segment(1) != "attendance" && $this->uri->segment(1) != "performance-add" && $this->uri->segment(1) != "performance-edit" && $this->uri->segment(1) !="employee-salary" && $this->uri->segment(2) !="income" )
 {
   ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/prism.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/demo.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/intlTelInput.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/isValidNumber.css">
  <!-- country code -->
<?php } ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/multi/bootstrap-multiselect.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/css/simplePagination.css">
<link href='<?php echo base_url(); ?>assets/calendar/main.css' rel='stylesheet' />

<?php
if($this->uri->segment(1) != "notification"  )
{
?>
  <!-- timepicker -->
   <link href="<?php echo base_url(); ?>assets/dashboard/timepicker/timepicki.css" rel="stylesheet">
   <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/css/mobiscroll.angularjs.min.css"> -->
<?php } ?>
  <!-- timepicker -->
  <?php  if($this->uri->segment(2) == "lead-edit")
  {
    ?>
  <!-- multiple datepicker -->
  <link href="<?php echo base_url(); ?>assets/dashboard/css/datepicker.css" rel="stylesheet">
  <!-- multiple datepicker -->
<?php } ?>
  <title><?php if(!empty($title)){ echo $title; } else{ ?>Top SEO Companies<?php } ?></title>
</head>

<body>
  <div class="preloader" style="display: none;">
    <img src="<?php echo base_url(); ?>assets/images/preloader.gif">
  </div>
  <input type="hidden" class="base_url" value="<?php echo base_url(); ?>">
  <input type="hidden" class="currenttitle" value="">
    <div class="main_wrapper">
        <header  id="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-3">
                        <div class="logo-sec">
                            <a class="logo animated fadeIn" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/dashboard/images/logo.png">
                            </a>
                            <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 55.2">
                                    <rect y="0.6" width="72" height="10" rx="5"></rect>
                                    <rect y="24.6" width="72" height="10" rx="5"></rect>
                                    <rect y="48.6" width="72" height="10" rx="5"></rect>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-8 col-xl-9">
                        <div  class="row">
                            <div  class="col-md-8">
                              <?php
                                $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
                        		    $date =  $nowUtc->format('Y-m-d');
                                $active = count_today_ActiveTask('todoList',array("assignedTo"=>$this->session->userdata['clientloggedin']['id'],"status"=>5));
                                $pending = count_today_pendingTask('todoList',array("assignedTo"=>$this->session->userdata['clientloggedin']['id']));
                                $t = getactivetask('todoList',array("assignedTo"=>$this->session->userdata['clientloggedin']['id'],"status"=>5),$date);
                                $duetask = count_duetask(array("assignedTo"=>$this->session->userdata['clientloggedin']['id']),$date);
                              ?>
                              <p>Active Tasks : <span class="headeractivetask"><?php echo $active; ?></span> | Pending Tasks : <span class="headerpendingtask"><?php echo $pending; ?></span> | Over Due: <span class="headerduetask"><?php echo $duetask; ?></span></p>
                              <?php if(!empty($t))
                               {
                                ?>
                              <p>Task: <?php echo $t->name; ?></p>
                            <?php } ?>
                            </div>
                            <div class="col-md-4">
                                <div class="header_actions h-100">
                                    <ul class="mb-0 d-flex">
                                        <li>
                                            <a href="<?php echo base_url(); ?>notification/<?php echo $this->session->userdata['clientloggedin']['url']; ?>" class="d-inline-block noti-bell">
                                                <embed src="<?php echo base_url(); ?>assets/dashboard/images/notification.svg"><span class="noti"></span></a>
                                        </li>
                                        <!-- <li>
                                            <a href="#">
                                                <embed src="<?php echo base_url(); ?>assets/dashboard/images/emil-notification.svg">
                                            </a>
                                        </li> -->
                                        <li>
                                            <div class="dropdown ac-cstm show">
                                              <?php
                                              $d = getrow('user_meta',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
                                              $udata = getrow('user',array('id'=>$this->session->userdata['clientloggedin']['id']));
                                              if(!empty($d))
                                              {
                                               $name = $d->name;
                                               }
                                             ?>
                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                   <?php
                                                   if($udata->type == 2)
                                                    {
                                                      if($d->company_logo)
                                                      {
                                                      ?>
                                                    <img id="headerlogo" src="<?php echo base_url(); ?>assets/client_images/<?php echo $d->company_logo; ?>">
                                                  <?php }
                                                         else
                                                         {
                                                           ?>
                                                           <img id="headerlogo" src="<?php echo base_url(); ?>assets/dashboard/images/profile.png">
                                                           <?php
                                                         }
                                                   }
                                                  else if($udata->type == 3)
                                                  {
                                                    if($d->logo)
                                                  {
                                                  ?>
                                                <img id="headerlogo" src="<?php echo base_url(); ?>assets/client_images/<?php echo $d->logo; ?>">
                                              <?php }
                                                     else
                                                     {
                                                       ?>
                                                       <img id="headerlogo" src="<?php echo base_url(); ?>assets/dashboard/images/profile.png">
                                                       <?php
                                                     }
                                                  } ?>
                                                </a>
                                                <div class="dropdown-menu fadeIn">

                                                 <?php if($udata->parent == 0)
                                                 {
                                                   ?>
                                                  <a class="dropdown-item" href="<?php echo base_url(); ?>cprofile/<?php echo $this->session->userdata['clientloggedin']['url']; ?>"><i class="fa fa-user"></i><?php echo ucwords($name); ?></a>
                                                <?php } else { ?>
                                                  <a class="dropdown-item" href="<?php echo base_url(); ?>team_profile/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-user"></i><?php echo ucwords($name); ?></a>
                                                <?php } ?>
                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out"></i>Log Out</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
