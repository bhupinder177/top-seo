<?php
if (!isset($this->session->userdata['adminloggedin']))
{
echo "<script> window.location.href='" . base_url() . "admin/logout'</script>";
}
else
{
if ($this->session->userdata['adminloggedin']['role'] != 'admin') {
echo "<script> window.location.href='" . base_url() . "admin/logout'</script>";
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
    <link rel="icon" href="<?php echo base_url(); ?>assets/dashboard/images/fav.png" type="image/png" sizes="16x16" />
    <?php
 if($this->uri->segment(2) != "employee_leave" && $this->uri->segment(2) != "attendance" && $this->uri->segment(2) != "performance-add" && $this->uri->segment(2) !="employee-salary" && $this->uri->segment(2) !="income" )
 {
   ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/prism.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/demo.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/intlTelInput.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/isValidNumber.css">
  <!-- country code -->
<?php } ?>
  <!-- timepicker -->
   <link href="<?php echo base_url(); ?>assets/dashboard/timepicker/timepicki.css" rel="stylesheet">
  <!-- timepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/css/simplePagination.css">
   <!-- chart -->
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <!-- chart -->

  <title><?php if(!empty($title)){ echo $title; } else{ ?>Top SEO Companies<?php } ?></title>
</head>

<body>
  <div class="preloader" style="display: none;">
    <img src="<?php echo base_url(); ?>assets/images/preloader.gif">
  </div>
  <input type="hidden" class="base_url" value="<?php echo base_url(); ?>">
    <div class="main_wrapper">
        <header id="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-3">
                        <div class="logo-sec">
                            <a class="logo animated fadeIn" href="<?php echo base_url(); ?>admin/dashboard"><img src="<?php echo base_url(); ?>assets/dashboard/images/logo.png">
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
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4">
                                <div class="header_actions h-100">
                                    <ul class="mb-0 d-flex">
                                        <!-- <li>
                                            <a href="#" class="d-inline-block noti-bell">
                                                <embed src="<?php echo base_url(); ?>assets/dashboard/images/notification.svg"><span class="noti"></span></a>
                                        </li> -->
                                        <!-- <li>
                                            <a href="#">
                                                <embed src="<?php echo base_url(); ?>assets/dashboard/images/emil-notification.svg">
                                            </a>
                                        </li> -->
                                        <li>
                                            <div class="dropdown ac-cstm show">
                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/profile.png">
                                                </a>
                                                <div class="dropdown-menu fadeIn">
                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-user"></i>Admin</a>
                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-sign-out"></i>Log Out</a>
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
