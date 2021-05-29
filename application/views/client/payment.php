<?php

include('sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
            <li class="active">Payment</li>
        </ol>
    </section> 
    <!--main-container-part-->

    <section class="light-bg user-dashboard no-padding"> 
        <div class="content-box">
            <div class="box box-success">
                <div class="box-body job-offer-full p-3">
                    <div>
                        <?php if(isset($message)){ echo $message; } ?>
                    </div>
                    <?php if(empty($payment))
						        { ?>
                    <!-- <p>click on image verified paypal</p> -->
                    <a class="btn btn-success" target="_blank" href="<?php echo base_url(); ?>client-paypal">Paypal linked</a>
                    <a class="btn btn-success" href="<?php echo base_url(); ?>client-authorize">Authroize linked</a>
                    <?php      }
									else{
										?>
                    <h6>Email :
                        <?php echo $payment->accountEmail; ?> <i title="verified" class="fa fa-check"></i> <a href="<?php echo base_url(); ?>client-payment-delete"><i class="fas fa-trash-alt"></i></a></h6>

                    <?php } ?> 
                </div> 
            </div> 
        </div> 
    </section>
</div>
