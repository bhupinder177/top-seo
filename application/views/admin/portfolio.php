
<?php

include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Portfolio</li>
      </ol>
    </section>

<!--main-container-part-->

<section class="content">

	<div class="container1">

	<!-- get sidebar -->

		<div class=" no-margin user-dashboard-container">


				<div id="content">

					<div id="content-header">

						<div id="breadcrumb">

							<a href="<?php echo base_url(); ?>freelancer/dashboard" class="tip-bottom" data-original-title="Go to Home"><i class="fa fa-home"></i> Home</a>

							<a href="<?php echo base_url(); ?>freelancer/portfolio" class="current">Portfolio</a>

						</div>

					</div>

					<div class="container-fluid">

						<div class="content-box no-border-radius">

							<div class="row">
               <!-- content -->

							 <div class="col-md-12 no-padding-right">

			 <div ng-cloak class="box box-success" ng-app="myApp18" ng-controller="myCtrt18">

				 <div class="box-header with-border">

					 <h3 class="box-title">Portfolio</h3>



				 </div>

				 <div class="box-body">

					 <table  id="rankingTable" class="table  table-condensed">

						 <thead>

							 <tr>
                 <th>S.No</th>
								 <th>Title</th>
                 <th>Image</th>
								 <th>Website</th>
								 <th>Description</th>



							 </tr>

						 </thead>

						 <tbody>


								 <tr ng-if="portfolio.length != 0" ng-repeat="(key,x) in portfolio" ng-init="portfolio = key">
                  <td>{{ $index + 1 }}</td>
									 <td>{{ x.portfolioTitle }}</td>

									  <td><img height="70" width="70" src="<?php echo base_url(); ?>assets/portfolio/{{ x.portfolioImage }}"></td>
										<td>{{ x.portfolioWebsite }}</td>

                     <td ng-bind-html="x.portfolioDescription|trustAsHtml" >{{ x.portfolioDescription }}</td>

								 </tr>
								 <tr ng-if="portfolio.length == 0"><td colspan="2">No Record Found.</td></tr>

						 </tbody>

					 </table>
					 <div  id="pagination"></div>



							 <!-- content-->


							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

</section>
</div>
