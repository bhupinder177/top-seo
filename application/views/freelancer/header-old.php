<?php
if (!isset($this->session->userdata['clientloggedin']))
{
echo "<script> window.location.href='" . base_url() . "logout'</script>";
}
else
{
if ($this->session->userdata['clientloggedin']['role'] != 'freelancer') {
echo "<script> window.location.href='" . base_url() . "logout'</script>";
}

}
?>
<!DOCTYPE html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php if(isset($title)){ echo $title; } else { echo "Top-seo"; } ?>
    </title>




    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css">


    <link href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-reboot.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url(); ?>assets/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/custom-style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.alertable.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/simplePagination.css">

    <!-- select css-->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prism.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css">



    <script src="<?php echo base_url(); ?>assets/js/jquery-2.2.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.ui.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/chosen.jquery.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.star-rating-svg.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.alertable.min.js"></script>

    <link href="<?php echo base_url(); ?>assets/css/alertify.css" rel="stylesheet" type="text/css">

    <script src="<?php echo base_url(); ?>assets/js/alertify.js"></script>





</head>



<body>
    <input type="hidden" class="base_url" value="<?php echo base_url(); ?>">
    <input type="hidden" class="userId" value="<?php echo $this->session->userdata['clientloggedin']['id']; ?>">
    <div class="preloader" style="display: none;">

        <img src="<?php echo base_url(); ?>assets/images/preloader.gif">

    </div>

    <header id="header" class="navbar-fixed-top ">

        <div class="container-fluid top-bar">
            <div class="row">

                <div class="col-md-7 col-xs-12 col-sm-7">

<!--
                    <ul>

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" aria-hidden="true"></i>Region

                            </a>

                            <ul class="dropdown-menu countries-drop-down">


                                <li><a href="">regi</a>



                            </ul>

                        </li>

                        <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> About</a></li>

                        <li><a href="#"><i class="fa fa-folder-open-o" aria-hidden="true"></i>FAQ</a></li>

                    </ul>
-->

                </div>

                <div class="col-md-5 col-xs-12 col-sm-5">

                    <ul class=" text-right">

 <li class="dropdown">
                            <?php

                    $d = getrow('user_meta',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
                    $udata = getrow('user',array('id'=>$this->session->userdata['clientloggedin']['id']));
                    if(!empty($d))
                    {
                     $name = $d->name;
                    }
                    $ncount = getCountNotification(array("notificationTo"=>$this->session->userdata['clientloggedin']['id'],"notificationStatus"=>0));


                     ?>
                            <a class="notification dropdown-toggle" data-id="<?php echo $this->session->userdata['clientloggedin']['id']; ?>" href="javascript:"  data-toggle="dropdown"><?php if($ncount > 0) { ?><span class="notify odot"></span><?php } ?><i class="fa fa-bell" aria-hidden="true"></i>Notification</a>

                            <ul class="notify dropdown-menu ">
                              <?php
                               $notification = getNotification(array("notificationTo"=>$this->session->userdata['clientloggedin']['id']));

                               if(!empty($notification))
                               {
                                 foreach($notification as $n)
                                 {
                               ?>

                            <li><a href="<?php echo base_url(); ?>freelancer/notification" ><?php echo $n->notificationMessage; ?></a></li>
                        <?php } }
                        else{ ?>
                          <li>NO Notification</li>

                        <?php } ?>




                            </ul>

                        </li>


                        <li class="dropdown">
                            <?php

                    $d = getrow('user_meta',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
                    $udata = getrow('user',array('id'=>$this->session->userdata['clientloggedin']['id']));
                    if(!empty($d))
                    {
                     $name = $d->name;
                    }

                     ?>
                            <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> Welcome
                                <?php echo $name; ?>

                            </a>

                            <ul class="dropdown-menu">
                                <?php
                            if($this->session->userdata['clientloggedin']['type'] == 2 && $udata->access == 1)
                             {
                             $link = str_replace(' ', '-',strtolower($d->c_name.'-'.$d->u_id));
                             }
                             else if($this->session->userdata['clientloggedin']['type'] == 3 && $udata->access == 1)
                             {
                              $link = str_replace(' ', '-',strtolower($name.'-'.$d->u_id));

                             }
                             else if($this->session->userdata['clientloggedin']['type'] == 3 && $udata->access == 2)
                             {
                               $u = $this->common->getrow('user_meta',array("u_id"=>$udata->parent));
                              $link = str_replace(' ', '-',strtolower($u->c_name.'-'.$u->u_id));

                             }
                             else if($this->session->userdata['clientloggedin']['type'] == 3 && $udata->access == 3)
                             {
                               $u = $this->common->getrow('user_meta',array("u_id"=>$udata->parent));
                              $link = str_replace(' ', '-',strtolower($u->c_name.'-'.$u->u_id));

                             }
                      ?>

                                <!-- <li><a href="<?php echo base_url(); ?>dashboard">Dashoard</a></li> -->
                                <!-- <li><a href="<?php echo base_url(); ?>find-work">Find Work</a></li> -->
                                <li><a href="<?php echo base_url(); ?>profile/<?php echo $link; ?>">About</a></li>
                                <li><a href="<?php echo base_url(); ?>freelancer/profile">Edit profile</a></li>
                                <!-- <li><a href="<?php echo base_url(); ?>freelancer/password">Change password</a></li> -->




                                <li class="divider"></li>

                                <li><a href="<?php echo base_url(); ?>logout">Log Out</a></li>

                            </ul>

                        </li>

<!--                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>Contact Us</a></li>-->

                    </ul>

                </div>

            </div>

        </div>

        <div class="container-fluid main-menu sticky">
            <div class="row">

                <div class="col-sm-4  col-md-5 col-xs-12">
                    <div class="logo-sec">
                 

                        <a class="navbar-brand" href="<?php echo base_url(); ?>freelancer/dashboard"><img src="<?php echo base_url(); ?>assets/front/images/top-seo.png" alt="logo"></a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span>

                        </button>

                        <div class="collapse navbar-collapse js-navbar-collapse">

                            <!-- <ul class="nav navbar-nav">

                    <li class="dropdown mega-dropdown">

                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men</a>

                      <ul class="dropdown-menu mega-dropdown-menu">

                        <li class="col-sm-4 col-md-4 col-xs-6">

                          <ul>

                            <li class="dropdown-header">Features</li>

                            <li><a href="#">Carousel Control</a></li>

                            <li><a href="#">Left & Right Navigation</a></li>

                            <li><a href="#">Four Columns Grid</a></li>

                            <li class="divider"></li>

                            <li class="dropdown-header">Fonts</li>

                            <li><a href="#">Glyphicon</a></li>

                            <li><a href="#">Google Fonts</a></li>

                          </ul>

                        </li>

                        <li class="col-sm-4 col-md-4 col-xs-6">

                          <ul>

                            <li class="dropdown-header">Plus</li>

                            <li><a href="#">Navbar Inverse</a></li>

                            <li><a href="#">Pull Right Elements</a></li>

                            <li><a href="#">Coloured Headers</a></li>

                            <li><a href="#">Primary Buttons & Default</a></li>

                          </ul>

                        </li>

                        <li class="col-sm-4 col-md-4 col-xs-6">

                          <ul>

                            <li class="dropdown-header">Much more</li>

                            <li><a href="#">Easy to Customize</a></li>

                            <li><a href="#">Calls to action</a></li>

                            <li><a href="#">Custom Fonts</a></li>

                            <li><a href="#">Slide down on Hover</a></li>

                          </ul>

                        </li>

                      </ul>

                    </li>

                    <li class="dropdown mega-dropdown">

                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Women</a>

                      <ul class="dropdown-menu mega-dropdown-menu">

                        <li class="col-sm-4 col-md-4 col-xs-6">

                          <ul>

                            <li class="dropdown-header">Features</li>

                            <li><a href="#">Carousel Control</a></li>

                            <li><a href="#">Left & Right Navigation</a></li>

                            <li><a href="#">Four Columns Grid</a></li>

                            <li class="divider"></li>

                            <li class="dropdown-header">Fonts</li>

                            <li><a href="#">Glyphicon</a></li>

                            <li><a href="#">Google Fonts</a></li>

                          </ul>

                        </li>

                        <li class="col-sm-4 col-md-4 col-xs-6">

                          <ul>

                            <li class="dropdown-header">Plus</li>

                            <li><a href="#">Navbar Inverse</a></li>

                            <li><a href="#">Pull Right Elements</a></li>

                            <li><a href="#">Coloured Headers</a></li>

                            <li><a href="#">Primary Buttons & Default</a></li>

                          </ul>

                        </li>

                        <li class="col-sm-4 col-md-4 col-xs-6">

                          <ul>

                            <li class="dropdown-header">Much more</li>

                            <li><a href="#">Easy to Customize</a></li>

                            <li><a href="#">Calls to action</a></li>

                            <li><a href="#">Custom Fonts</a></li>

                            <li><a href="#">Slide down on Hover</a></li>

                          </ul>

                        </li>

                      </ul>



                    </li>

                  </ul> -->



                        </div>

                   
</div>

                </div>

                <div class="col-md-3 col-xs-12">
<!--

                    <div class="cust">

                        Call us Now<br>

                        <a href="tel:111 222 333 4444" class="red-text">111 222 333 444</a>

                    </div>
-->

                </div>

            </div>



        </div>

    </header>
