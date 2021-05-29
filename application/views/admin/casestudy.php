
<?php

include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">Case Studies</li>
      </ol>
    </section>
<!--main-container-part-->

<section ng-app="myApp20" ng-controller="myCtrt20" class="content"> 
  <!-- get sidebar -->  
										<div class="box"> 
                <div class="content-header p-3"> 
										<h4 class="mb-0">Case Studies</h4> 
									</div>  
											<div class="box-success">
                                                 <div class="box-body">
                                                     <div class="table-responsive">
													<table id="pricingTable" class="table"> 
														<thead> 
															<tr> 
																<th>Industry</th> 
																<th width="10%">Service</th> 
                                                                <th width="15%">Title</th>
																<th width="30%">Case Info</th> 
																<th>Document</th>  
															</tr> 
														</thead> 
														<tbody>
                                                        <tr ng-if="casestudys.length != 0" ng-repeat="(key,x) in casestudys" ng-init="casestudys = key">
                                                        <td>{{ x.industry }}</td>
														<td>{{ x.service }}</td>
														<td>{{ x.casestudyTitle }}</td>
														<td>{{ x.casestudyInfo }}</td>
														<td><a target="_blank" class="btn bg-yellow" href="<?php echo base_url(); ?>assets/case_study/{{ x.casestudyDocument }}">Download</a></td> 
														</tr>
														<tr ng-if="casestudys.length == 0"><td>No record</td></tr> 
														</tbody> 
													</table>
                                                     </div>
													<div id="pagination"></div>

													<!-- delete confirm modal -->
														<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
														<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title">Delete</h4>
														</div>
														<div class="modal-body">
														<p>Are you sure you want to delete this ?</p>
														</div>
														<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
														<button type="button" ng-click="delete_casestudy(dkey,did)" class="btn btn-danger" id="confirm">Delete</button>
														</div>
														</div>
														</div>
														</div>
													<!-- delete confirm modal --> 
												</div> 
											</div> 
										</div>    
</section>
</div>
