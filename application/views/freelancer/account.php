

<!--main-container-part-->

<section id="wrapper" class="container-fluid light-bg user-dashboard no-padding">

	<div class="container1">

	<!-- get sidebar -->

		<div class="row no-margin user-dashboard-container">

			<div class="col-2 no-padding">

				<?php require('sidebar.php'); ?>

			</div>

			<div ng-cloak class="col-10 no-padding" ng-app="myApp20" ng-controller="myCtrt20">

				<div id="content">

					<div id="content-header">

						<div id="breadcrumb">

							<a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>" class="tip-bottom" data-original-title="Go to Home"><i class="fa fa-home"></i> Home</a>

							<a href="<?php echo base_url(); ?>account" class="current">Account</a>

						</div>

					</div>

					<div class="container-fluid">

						<div class="content-box no-border-radius">

							<div class="profile-preview profile-container">

            	<div class="form-group">
								<label for="name">Paypal Email *</label>
								<input  ng-model="email" type="text" class="characteronly is_required validate account_input form-control"  id="email"  >
								<p ng-show="submitacc && email == ''" class="text-danger">email is required.</p>
								</div>

								<input type="button" ng-click="Accountupdate()" value="Update" class="btn btn-primary user-register">

								</div>
								</form>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>
