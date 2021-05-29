<?php

include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content portfolio-cont client-das">
      <!-- Small boxes (Stat box) -->
        <div class="container-fluid">
      <div class="row">

        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jobpost; ?></h3>
             <p>Job Posted</p>
            </div>
            <div class="icon">
              <i class="fa fa-briefcase"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>


        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $hired; ?></h3>
              <p>Hired</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $review; ?></h3>
              <p>Reviews</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $spend; ?></h3>
             <p>Spend</p>
            </div>
            <div class="icon">
            <i class="fa fa-money" aria-hidden="true"></i>
            </div>
          </div>
        </div>


        <?php if($users->successScore != 0)
        { ?>
        <div class="col-lg-3 col-xs-12">
          <div class="clearfix">
                    <span class="pull-left">Jss</span>
                    <small class="pull-right"><?php echo $users->successScore; ?>%</small>
          </div>
          <div class="progress xs">
          <div class="progress-bar progress-bar-green" style="width: <?php echo $users->successScore; ?>%;"></div>
          </div>
        </div>
      <?php } ?>






      </div>
            </div>
        <div class="container-fluid">
      <div class="row">

          <!-- Notification -->
          <div class="col-md-6">
          <div class="box box-primary cstrm-not">
             <div class="box-header with-border">
               <h3 class="box-title">Notification</h3>

               <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                 </button>
               </div>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
               <ul class="products-list product-list-in-box">

                   <?php
                    if(!empty($notification))
                    {

                      foreach($notification as $n)
                      {
                    ?>
                    <li class="item">
                     <div class="product-img">
                       <?php if($n->logo != '')
                             {
                               ?>
                       <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $n->logo; ?>" class="user-image" alt="">
                     <?php }
                     else{
                       ?>
                       <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg" class="user-image" alt="test">


                       <?php
                          }
                          ?>
                     </div>
                     <div class="product-info">
                       <a href="javascript:void(0)" class="product-title"><?php echo ucwords($n->name); ?></a>
                       <span class="product-description">
                             <?php echo $n->notificationMessage; ?>
                           </span>
                     </div>
                   </li>
               <?php } }
                    else{ ?>
                      <li class="item">
                        <div class="product-info">
                         <span class="product-description">
                         No Notification
                         </span>
                        </div>
                      </li>
                    <?php } ?>
               </ul>
             </div>
             <?php
              if(!empty($notification))
              {
                ?>
             <div class="box-footer text-center">
               <a href="<?php echo base_url(); ?>client-notification" class="uppercase">View All Notification</a>
             </div>
           <?php } ?>
           </div>
         </div>
          <!-- Notification -->
          <!-- Review -->
          <div class="col-md-6">
          <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title">Latest Review</h3>

               <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                 </button>
               </div>
             </div>
             <div class="box-body">
               <ul class="products-list product-list-in-box">

                   <?php
                    if(!empty($reviewlatest))
                    {

                      foreach($reviewlatest as $r)
                      {
                    ?>
                    <li class="item">
                     <div class="product-img">
                       <?php if($r->logo != '')
                             {
                               ?>
                       <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $r->logo; ?>" class="user-image" alt="">
                     <?php }
                     else{
                       ?>
                       <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg" class="user-image" alt="test">


                       <?php
                          }
                          ?>
                     </div>
                     <div class="product-info">
                       <a href="javascript:void(0)" class="product-title"><?php if($r->name){ echo ucwords($r->name); }  ?></a>
                       <span class="product-description">
                             <?php echo $r->reviewOverall; ?>
                       </span>
                       <div class="star-rating">
                         <span class="fa fas-star <?php if($r->star >= 1){ ?>fa fa-star<?php } else{ ?>fa-star-o<?php } ?> "></span>
                         <span class="fa fas-star <?php if($r->star >= 2){ ?>fa fa-star<?php } else{ ?>fa-star-o<?php } ?> "></span>
                         <span class="fa fas-star <?php if($r->star >= 3){ ?>fa fa-star<?php } else{ ?>fa-star-o<?php } ?> "></span>
                         <span class="fa fas-star <?php if($r->star >= 4){ ?>fa fa-star<?php } else{ ?>fa-star-o<?php } ?> "></span>
                         <span class="fa fas-star <?php if($r->star >= 5){ ?>fa fa-star<?php } else{ ?>fa-star-o<?php } ?> "></span>
                         <?php echo $r->star; ?>
                       </div>

                     </div>
                   </li>
               <?php } }
                    else{ ?>
                      <li class="item">
                        <div class="product-info">
                         <span class="product-description">
                         No Review
                         </span>
                        </div>
                      </li>
                    <?php } ?>
               </ul>
             </div>
           </div>
          </div>
          <!-- Review -->
  </div>
        </div>

    </section>
  </div>
