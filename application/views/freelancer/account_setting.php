

<!--main-container-part-->
<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
			<li class="active">Account Settings</li>
		</ol>
	</section>
<section class="light-bg user-dashboard no-padding">

	<!-- get sidebar -->
		<div class="account-setting no-margin user-dashboard-container tasksetting">
				<div id="content">

					     <div class="box rounded bg-white c-pass-sec">
					<div class="content-box no-border-radius">
							<div class="change-password-area">
								<form action="<?php echo base_url(); ?>freelancer/AccessUpdate" id="incomeaccessUpdate" method="Post">
                                <div class="row">
                <div class="col-md-12">
               <div class="col-md-6">
                   <div class="form-group row">

												 <label>Income Access</label>
                     <select name="access[]" multiple="multiple" id="incomeAcess2" type="text" class="form-control">
											 <option <?php if(in_array(5,$result)) echo "selected"; ?> value="5">HR</option>
											 <option <?php if(in_array(6,$result)) echo "selected"; ?> value="6">PM(General)</option>
											 <option <?php if(in_array(2,$result)) echo "selected"; ?> value="2">PM(Sales) </option>
										 </select>
                       </div>

                   </div>
								 </div>

            <div class="col-md-12">
										<div class="form-group">
											<button  type="submit" class="btn btn-primary button-disabled">Update</button>
										</div>
										</div>
									</div>
								</form>
              </div>
							</div>

						</div>

              </div>
				</div>
    </section>
		</div>
