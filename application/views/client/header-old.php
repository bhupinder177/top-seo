<?php
if (!isset($this->session->userdata['clientloggedin']))
{
echo "<script> window.location.href='" . base_url() . "logout'</script>";
}
else
{
if ($this->session->userdata['clientloggedin']['role'] != 'client') {
echo "<script> window.location.href='" . base_url() . "logout'</script>";
}

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php if(isset($title)){ echo $title; } else { echo "Top-seo"; } ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="<?php echo base_url(); ?>assets/dashboard/css/style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/css/simplePagination.css">

  <!-- full calendar -->

  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css" rel="stylesheet" />
  <!-- full calendar -->
  <!-- country code -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/prism.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/demo.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/intlTelInput.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/isValidNumber.css">
     <!-- country code -->


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
  $d = getrow('user_meta',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
  $udata = getrow('user',array('id'=>$this->session->userdata['clientloggedin']['id']));
  if(!empty($d))
  {
   $name = $d->name;
  }
  $ncount = getCountNotification(array("notificationTo"=>$this->session->userdata['clientloggedin']['id'],"notificationStatus"=>0));

  $d = getrow('user_meta',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
  $udata = getrow('user',array('id'=>$this->session->userdata['clientloggedin']['id']));
  if(!empty($d))
  {
   $name = $d->name;
  }

?>
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
    <input type="hidden" value="<?php echo base_url(); ?>" class="base_url">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <!-- logo for regular state and mobile devices -->
      <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" data-id="<?php echo $this->session->userdata['clientloggedin']['id']; ?>" class="dropdown-toggle notification" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <?php if($ncount > 0)
               {
                 ?>
                <span class="label label-warning ncount"><?php echo $ncount; ?></span>
              <?php } ?>
            </a>
            <ul class="dropdown-menu">

              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
                   $notification = getNotification(array("notificationTo"=>$this->session->userdata['clientloggedin']['id']));

                   if(!empty($notification))
                   {
                     foreach($notification as $n)
                     {
                   ?>
                  <li>
                    <a href="<?php echo base_url(); ?>freelancer/notification">
                      <i class="fa fa-users text-aqua"></i><?php echo $n->notificationMessage; ?>
                    </a>
                  </li>
                <?php } ?>
                <li class="footer"><a href="<?php echo base_url(); ?>freelancer/notification">View all</a></li>

                <?php
               }
                else{
                  ?>
                    <li>NO Notification</li>
                  <?php
                }
                ?>



                </ul>
              </li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if(isset($d->logo))
                    {
                      ?>
              <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $d->logo; ?>" class="user-image" alt="profile">
            <?php }
            else{
              ?>
              <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg" class="user-image" alt="profile">


              <?php
                 }
                 ?>
              <span class="hidden-xs">  <?php  echo $name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
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

                <p>
                  <?php echo $name; ?>

                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>client-profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
