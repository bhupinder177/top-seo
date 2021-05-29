<?php include ('sidebar.php');?>
    <div id="wrapper">
        <div class="dash-board">
            <h4 class="h4-win">Dashboard</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="left-container">
                        <div class="row">
                            <div class="col-md-12 col-lg wow bounceInDown animated">
                                <div class="emp mt-2">
                                    <ul class="ul-list unstyle mb-0">
                                        <li>
                                            <div class="bg-blue">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="image-fluid">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <p>Jobs Posted</p>
                                                <span><?php echo $jobpost; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg wow bounceInDown animated">
                                <div class="emp mt-2">
                                    <ul class="ul-list unstyle mb-0">
                                        <li>
                                            <div class="bg-blue">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/dep.png" class="image-fluid">
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
                            <div class="col-md-12 col-lg wow bounceInDown animated">
                                <div class="emp mt-2">
                                    <ul class="ul-list unstyle mb-0">
                                        <li>
                                            <div class="bg-blue">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/can.png" class="image-fluid">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <p>Reviews</p>
                                                <span><?php echo $review; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-4 wow bounceInDown animated" >
                                <div class="emp mt-2">
                                    <ul class="ul-list unstyle mb-0">
                                        <li>
                                            <div class="bg-blue">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="img-fluid">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <p>Amount Spend</p>
                                                <span>$ <?php echo $spend; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
