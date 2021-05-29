

<!--main-container-part-->
<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Upgrade Profile
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Upgrade profile</li>
		</ol>
	</section>
<section class="light-bg user-dashboard no-padding">

	<!-- get sidebar -->
		<div class=" no-margin user-dashboard-container">

			<div ng-cloak  ng-app="myApp52" ng-controller="myCtrt52">
				<div id="content">
                    	<?php require('sidebar.php'); ?>
                    <div class="container-fluid">
					     <div class="box c-pass-sec">
					<div class="content-box no-border-radius">
							<div class="change-password-area">

								<div class="col-md-6">


										<div class="form-group">

											<button ng-if="userType == 3" ng-click="upgrade()" type="button" class="btn btn-primary rounded-0 pointer">Freelancer to Company</button>
											<p ng-if="userType == 2">Your Account upgrade freelancer to company</p>

										</div>



							</div>



							</div>

							</div>
						</div>
				</div>
                        </div>
				</div>
			</div>
		</div>

</section>
</div>
