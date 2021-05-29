

<!--main-container-part-->

<!--main-container-part-->
<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Payment
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Payment</li>
		</ol>
	</section>
<section class="content">

	<div class="container1">

	<!-- get sidebar -->

		<div class=" no-margin user-dashboard-container">




				<div id="content">
                    	<?php require('sidebar.php'); ?>


							<div class="row">
               <!-- content -->

							 <div class="col-md-12 no-padding-right">

			 <div class="box box-success" >


				 <div class="box-body job-offer-full">
            <?php if(empty($payment))
						        { ?>

           <a class="btn btn-success" href="<?php echo base_url(); ?>freelancer/paypal">Paypal linked</a>
					 <a class="btn btn-success"  href="<?php echo base_url(); ?>freelancer/authorize">Authroize linked</a>

				 <?php      }
									else{
										?>
                   <h6>Paypal Email :  <?php echo $payment->accountEmail; ?>   <i title="verified" class="fa fa-check"></i> <a href="<?php echo base_url(); ?>freelancer/payment-delete"><i  class="fas fa-trash-alt"></i></a></h6>

									<?php } ?>


         	</div>

						</div>

					</div>

				</div>





	</div>
</div>
        </div>
</section>
</div>
