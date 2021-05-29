<?php include('sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">Pricing</li>
      </ol>
    </section>
<!--main-container-part-->

<section ng-cloak ng-app="myApp21" ng-controller="myCtrt21" class="box">  
                        <div id="content">          
                                <div class="content-header p-3"> 
										<h4 class="mb-0">Service Pricing</h4> 
									</div>  
										<div class="box"> 
                                                <div class="box-body">
                                                    <div class="table-responsive">
													<table id="pricingTable" class="table"> 
														<thead> 
                                                            <tr> 
																<th>Service</th> 
																<th>Price</th> 
																<th>Key Points</th> 
															</tr> 
														</thead> 
														<tbody>  
                                                            <tr ng-if="pricings.length != 0" ng-repeat="(key,x) in pricings" ng-init="pricings = key" > 
															<td>{{ x.service }}</td> 
															<td>$ {{ x.pricingPrice }}</td> 
															<td class="lh-1 smal_list_scroll"><span class="small" ng-bind-html="x.pricingKeyPoint|trustAsHtml"> </span></td>  
														</tr> 
														<tr ng-if="pricings.length == 0">
															<td colspan="3" class="text-center">No record found</td>
														</tr>
                     			                        </tbody> 
													</table>
                                                    </div>
														<div id="pagination"></div> 
												</div> 
											</div> 
										</div> 

</section>

</div>
