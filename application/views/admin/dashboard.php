<?php include ('sidebar.php');?>
    <div id="wrapper">
        <div class="dash-board">
            <h4 class="h4-win">Dashboard</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="left-container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="emp mt-3">
                                    <ul class="ul-list unstyle mb-0">
                                        <li>
                                            <div class="bg-blue">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="image-fluid">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <p>User Registrations</p>
                                                <span><?php echo $user; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="emp mt-3">
                                    <ul class="ul-list unstyle mb-0">
                                        <li>
                                            <div class="bg-blue">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/dep.png" class="image-fluid">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <p>Jobs</p>
                                                <span><?php echo $job; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="emp mt-3">
                                    <ul class="ul-list unstyle mb-0">
                                        <li>
                                            <div class="bg-blue">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/can.png" class="image-fluid">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <p>Hired</p>
                                                <span><?php echo $hired; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="emp mt-3">
                                    <ul class="ul-list unstyle mb-0">
                                        <li>
                                            <div class="bg-blue">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="img-fluid">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <p>Contact</p>
                                                <span><?php echo $contact; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="emp mt-3">
                                    <ul class="ul-list unstyle mb-0">
                                        <li>
                                            <div class="bg-blue">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="img-fluid">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <p>industry</p>
                                                <span><?php echo $industry; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="emp mt-3">
                                    <ul class="ul-list unstyle mb-0">
                                        <li>
                                            <div class="bg-blue">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="img-fluid">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <p>Services</p>
                                                <span><?php echo $services; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- new member -->
                        <div class="row">
                        <div class="col-md-6 mt-3">
                           <div class="box common-l">
                             <div class="heading">
                               <h3 class="h4-head">Latest Members

                                 </h3>
                             </div>

                           <div class="box-body no-padding">
                               <ul class="users-list clearfix">

                                 <?php if(!empty($members))
                             {
                               foreach($members as $t)
                               {
                             ?>
                                  
                                 <li>
                                   <?php if($t->logo != '')
                                         {
                                           ?>
                                   <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $t->logo; ?>" class="user-image john-img" alt="">
                                 <?php }
                                 else{
                                   ?>
                                   <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg" class="user-image" alt="test">


                                   <?php
                                      }
                                      ?>
                                   <a class="users-list-name" href="#"><?php echo $t->name; ?></a>
                                 </li>
                               <?php } }
                                 else
                                 {
                                   echo "No Team member";
                                 }
                                 ?>
                               </ul>
                            </div>
                           </div>
                         </div>
                            <div class="col-md-6 mt-3">
                            </div>
                         </div>
                        <!-- new member -->
                    </div>
                </div>
            </div>
        </div>
    </div>
