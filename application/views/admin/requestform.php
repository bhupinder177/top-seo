<?php include('sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
        <li class="active">Request Form</li>
      </ol>
    </section>
<!--main-container-part-->

<section class="content"> 
	<!-- get sidebar -->    
			 <div ng-cloak class="box box-success" ng-app="myApp22" ng-controller="myCtrt22"> 
				 <div class="box-header p-3"> 
					 <h3 class="box-title mb-0">Request</h3> 
				 </div> 
				 <div class="box-body">
                     <div class="table-responsive">
					 <table class="table"> 
						 <thead> 
							 <tr>
                                 <th>S.No</th>
								 <th>Request Type</th>
                                 <th>Person/Company Detail</th>
								 <th>Detail</th>
								 <th>Date</th> 
							 </tr> 
						 </thead> 
						 <tbody> 
                             <tr ng-if="request.length != 0" ng-repeat="(key,x) in request" ng-init="request = key">
                                     <td>#</td>
									 <td>{{ x.req_type }}</td>
									 <td>{{ x.req_detail.name }}<br>
                                        <div class="d-flex">
										<a class="btn bg-orange mr-1" title="Email - {{ x.req_detail.email }}" href="mailto:{{ x.req_detail.email }}">
										<i class="fa fa-envelope m-0"></i></a>
										<a class="btn bg-yellow mr-1" href="{{ x.req_detail.website }}" title="{{ x.req_detail.website }}">
										<i class="fa fa-external-link m-0"></i></a>
										<a class="btn bg-blue" href="tel:{{ x.req_detail.phone }}" title="Phone - {{ x.req_detail.phone }}">
										<i class="fa fa-phone m-0"></i></a></div>
									 </td>
									  <td> <span ng-if="x.req_detail.contactto">contact to : {{ x.req_detail.contactto}} </span><br>
											company Name : {{ x.req_detail.company }} <br>
									<span ng-if="x.req_type == 'call' || x.req_type == 'quote'" >You have received 'Quote Request' for the project.</span><br>
                      <span ng-if="x.req_detail.service">Service related :{{ x.req_detail.service }}</span><br>
											<span ng-if="x.req_detail.projectinfo">Project info :{{ x.req_detail.projectinfo }}</span>
										</td>
										<td>{{ x.date_created | date }}</td>  
								 </tr>
								 <tr ng-if="request.length == 0"><td colspan="5" class="text-center">No Record Found.</td></tr> 
						 </tbody> 
					 </table>
                     </div>
					 <div  id="pagination"></div> 
							</div> 
						</div>   
</section>
</div>
