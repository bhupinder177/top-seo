<?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ranking Content List</li>
      </ol>
    </section>

<!--main-container-part-->

<section class="content"> 

			 <div ng-cloak class="box box-success" ng-app="myApp7" ng-controller="myCtrt7"> 
				 <div class="box-header p-3"> 
                     <div class="row">
					   <div class="col-md-4">
                         <h3 class="box-title mb-0">Ranking Content</h3>
                         </div>
                         <div class="col-md-8">
                             <a class="pull-right btn btn-success" href="<?php echo base_url(); ?>admin/ranking-content-add">Add New Content</a>
                         </div>
                     </div> 
				 </div> 
				 <div class="box-body">
                     <div class="table-responsive">
					 <table id="rankingTable" class="table"> 
						 <thead> 
							 <tr> 
                             <th>Service</th>
							 <th>Industry</th>
							 <th>Country</th>
							 <th>Description</th>
							 <th>Action</th>
                            </tr> 
						 </thead> 
						 <tbody> 
								 <tr ng-if="ranking.length != 0" ng-repeat="(key,x) in ranking">
                                <td>{{ x.service }} </td>
							 <td>{{ x.industry }}</td>
							 <td>{{ x.country }}</td>
							 <td ng-bind-html="x.content| limitTo:100 | trustAsHtml  ">{{  x.content }} </td> 
								<td>
									<span ng-if="x.country && x.service && x.industry && !x.state && !x.city " title="View Ranking Content"><a target="_blank" class="btn btn-sm btn-info" href="<?php echo base_url(); ?>best-{{ x.industry | lowercase | underscoreles }}_{{ x.service | lowercase | underscoreless }}-companies-in-{{ x.country | lowercase | underscoreless}}" ><i class="fa fa-info-circle"></i></a></span>
									<span ng-if="!x.country && !x.industry && x.service && !x.state && !x.city" title="View Ranking Content"><a target="_blank" class="btn btn-sm btn-info" href="<?php echo base_url(); ?>best{{x.industry | lowercase | underscoreless }}_{{ x.service | lowercase | underscoreless }}-companies" ><i class="fa fa-info-circle"></i></a></span>
									<span ng-if="x.country && !x.industry && x.service && !x.state && !x.city" title="View Ranking Content"><a target="_blank" class="btn btn-sm btn-info" href="<?php echo base_url(); ?>best{{ x.service | lowercase | underscoreless }}-companies-in-{{ x.country | lowercase | underscoreless}}" ><i class="fa fa-info-circle"></i></a></span>
									<span ng-if="x.country && !x.industry && x.service && !x.state && !x.city" title="View Ranking Content"><a target="_blank" class="btn btn-sm btn-info" href="<?php echo base_url(); ?>best{{ x.service | lowercase | underscoreless }}-companies-in-{{ x.country | lowercase | underscoreless}}" ><i class="fa fa-info-circle"></i></a></span>
									<span ng-if="x.country && !x.industry && x.service && x.state && x.city" title="View Ranking Content"><a target="_blank" class="btn btn-sm btn-info" href="<?php echo base_url(); ?>best{{ x.service | lowercase | underscoreless }}-companies-in-{{ x.city | lowercase | underscoreless}}-{{ x.state | lowercase | underscoreless}}-{{ x.country | lowercase | underscoreless}}" ><i class="fa fa-info-circle"></i></a></span>
                  <span ng-if="x.country && x.service && x.industry && x.state && x.city " title="View Ranking Content"><a target="_blank" class="btn btn-sm btn-info" href="<?php echo base_url(); ?>best-{{ x.industry | lowercase | underscoreless }}-{{ x.service | lowercase | underscoreless }}-companies-in-{{ x.city | lowercase | underscoreless}}-{{ x.state | lowercase | underscoreless}}-{{ x.country | lowercase | underscoreless}}" ><i class="fa fa-info-circle"></i></a></span>

<!-- best-dental-amazon_seo-companies-in-mohali-punjab-india -->
		<span title="Edit Content"><button class="btn btn-sm btn-warning" ng-click="editContent(x.id)"><i class="fa fa-edit"></i></button></span>
    <a ng-click="deletemodal(key,x.id)" class="delme btn btn-danger btn-sm" title="Delete Portfolio"><i class="fa fa-times"></i></a>
                                 </td> 
	                           </tr>
								 <tr ng-if="ranking.length == 0"><td colspan="2">No Record Found.</td></tr>

						 </tbody>

					 </table>
                     </div>
					 <div id="pagination"></div>

							 <!-- content-->

							 <!-- edit -->
							 <div id="editcontent" class="modal fade" role="dialog">
			           <div class="modal-dialog">

							 <!-- Modal content-->
							 <div class="modal-content">
							 	<div class="modal-header">
							 		<button type="button" class="close" data-dismiss="modal">&times;</button>
							 		<h4 class="modal-title">Hire Ranking Content</h4>
							 	</div>
							 	<div class="modal-body">
							 		<div class="form-group">
							 		 <label>Service <span class="red-text">*</span></label>
							 		 <select  ng-model="ser"  id="jobs" class="form-control jobId" >
							 		<option value=" ">Select service</option>

							 		<option ng-repeat="(key,x) in services"  value="{{ x.id }}">{{ x.name }}</option>
							 		 </select>
							 		 <p ng-show="submitc && ser == ''" class="text-danger">Please select service</p>
							 	 </div>
							 	 <div class="form-group">
									 <label>Industries</label>
									 <select ng-model="ind" class="form-control">
										 <option value=" ">Select industry</option>
										 <option value="{{ x.id }}" ng-repeat="(key,x) in industry">{{ x.name }}</option>

									 </select>

							 	 </div>

                 <div class="form-group">
									 <label>Country</label>
									 <select onchange="angular.element(this).scope().getstate(this)" ng-model="co" class="form-control">
										 <option>Select City</option>
										 <option value="{{ x4.id }}" ng-repeat="(key,x4) in country">{{ x4.name }}</option>
                   </select>
                 </div>

							 	 <div class="form-group">
									 <label>State</label>
									 <select onchange="angular.element(this).scope().getcity(this)" ng-model="state" class="form-control">
										 <option>Select State</option>
										 <option value="{{ x2.id }}" ng-repeat="(key,x2) in st">{{ x2.name }}</option>
                   </select>
                 </div>

  						 	 <div class="form-group">
									 <label>City</label>
									 <select ng-model="city" class="form-control">
										 <option>Select City</option>
										 <option value="{{ x3.id }}" ng-repeat="(key,x3) in ci">{{ x3.name }}</option>
                   </select>
                 </div>

                 <div class="form-group">

                   <label>Meta title</label>

                  <input type="text" class="form-control" ng-model="metaTitle" placeholder="Please enter meta title" >
                 </div>
                 <div class="form-group">

                   <label>Meta Description</label>

                  <input type="text" class="form-control" ng-model="metaDescription" placeholder="Please enter meta description" >
                 </div>

                 <div class="form-group">

                   <label>Heading</label>

                  <input type="text" class="form-control" ng-model="heading" placeholder="Please enter heading" >
                 </div>


							 	 <div class="form-group">
							 		 <label>Description <span class="red-text">*</span></label>
							 		 <!-- ckeditor -->
							  <textarea placeholder="Please enter description" type="text" name="description1" id="description1" ng-model="description" ng-value="description" class="form-control description ckeditor required" ></textarea>
							  <p ng-show="submitc && description == ''" class="text-danger">Description is required.</p>
							 	</div>
              </div>
							 	<div class="modal-footer">
							 		<button type="button" ng-click="updatecontent()" class="btn btn-success" >Submit</button>
							 	</div>
							 </div>

							 </div>
							 </div>
							 <!-- edit -->

							 <!-- delete modal-->
							 <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							 	<div class="modal-dialog" role="document">
							 		<div class="modal-content">
							 			<div class="modal-header">

							 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

							 				<h4 class="modal-title" id="myModalLabel">Are you sure you want to delete it?</h4>

							 			</div>

							 			<div class="modal-footer">

							 				<a ng-click="deletecontent()" class="btn btn-danger" id="yes">Yes</a>

							 				<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>

							 			</div>

							 		</div>

							 	</div>

							 </div>
							 <!-- delete modal -->

							</div>

						</div> 

</section>
</div>
