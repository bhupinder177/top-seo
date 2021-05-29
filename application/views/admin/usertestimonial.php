<?php include('sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
        <li class="active">User Testimonial</li>
      </ol>
    </section>

<!--main-container-part-->

<section class="content"> 
	<div class="container1"> 
	<!-- get sidebar --> 
		<div class="no-margin user-dashboard-container"> 
				<div id="content">  
						<div class="content-box no-border-radius"> 
               <!-- content --> 
			 <div ng-cloak class="box box-success" ng-app="myApp26" ng-controller="myCtrt26"> 
				 <div class="box-header p-3"> 
					 <h3 class="box-title mb-0">All user</h3> 
				 </div> 
				 <div class="box-body">
                     <div class="table-responsive">
					 <table id="rankingTable" class="table"> 
						 <thead> 
							 <tr>
                            <th>Name</th>
							<th>Company Name</th>
                            <th>Type</th>
						    <th>Testimonial Count</th>
							<th class="text-center">View</th> 
                             </tr> 
						 </thead> 
						 <tbody>
                             <tr ng-if="user.length != 0" ng-repeat="(key,x) in user" ng-init="user = key">
                             <td>{{ x.name }} </td>
                             <td>{{ x.c_name }} </td>
							 <td ng-if="x.type == 3">Freelancer</td>
							 <td ng-if="x.type == 2">Company</td>
                             <td>{{ x.tcount }} </td> 
                             <td class="text-center"><a href="<?php echo base_url(); ?>admin/freelancer-testimonial/{{ x.u_id }}"   class="btn bg-yellow">View</a></td> 
                             </tr>
                             <tr ng-if="freelancers.length == 0"><td colspan="6" class="text-center">No Record Found.</td></tr> 
						 </tbody> 
					 </table>
                     </div>
					 <div id="pagination"></div> 
							 <!-- content--> 
							</div> 
						</div> 
					</div> 
				</div> 
			</div> 
		</div>  
</section>
</div>
