<?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">Package</li>
      </ol>
    </section>
<!--main-container-part-->

<section class="content">
    <div ng-cloak class="box box-success" ng-app="myApp23" ng-controller="myCtrt23">
				 <div class="box-header p-3">
					<div class="row">
                        <div class="col-md-4"><h3 class="box-title mb-0">Package</h3> </div>
                        <!-- data-toggle="modal" data-target="#addpackage" -->
                        <div class="col-md-8"><a href="<?php echo base_url(); ?>admin/package-add" class="pull-right btn btn-success" >Add New</a></div>
                     </div>

    </div>
				 <div class="box-body">
                     <div class="table-responsive">
					 <table id="rankingTable" class="table">
						 <thead>
							 <tr>
                            <th>Package Name</th>
							              <th class="text-center">Price</th>
							              <th class="text-center">Count</th>
				            <th class="text-right">Action</th>
                            </tr>
						 </thead>
						 <tbody>
                             <tr ng-if="package.length != 0" ng-repeat="(key,x) in package">
              <td>{{ x.packageName }} </td>
							<td class="text-center">{{ x.packagePrice }}</td>
							<td class="text-center">{{ x.count }}</td>
							<td>
                                <div class="d-flex pull-right">
                                  <!-- ng-click="editpackage(x.packageId)" -->
                            <a title="Edit" href="<?php echo base_url(); ?>admin/package-edit/{{ x.packageId }}" class="btn bg-blue mr-2" ><i class="fa fa-edit"></i></a>
                            <a ng-click="deletemodal(key,x.packageId)" class="delme btn bg-default" title="Delete"><i class="fa fa-trash"></i></a>
                                </div>
                             </td>
	                   </tr>
                             <tr ng-if="package.length == 0"><td colspan="3" class="text-center">No Record Found.</td></tr>
						 </tbody>
					 </table>
                     </div>
					 <div id="pagination"></div>
        </div>
            <!-- content -->
        <div class="p-3">
            <div class="form-group">
              <label>Content</label>
              <textarea type="text" name="content" id="content" ng-model="content" ng-value="content" class="form-control content ckeditor"  value=""></textarea>
              <p class="text-danger" ng-show="submit && content == '' ">content is required</p>
            </div>
            <div class="form-group">
              <button ng-click="submitcontent()" class="btn btn-success">Submit</button>
            </div>
            <!-- content -->

							 <!-- content-->

							 <!-- edit -->
							 <div id="editpackage" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Package</h4>
					</div>
					<div class="modal-body">

					 <div class="form-group">
						 <label>Package name<span class="red-text">*</span></label>
						 <input placeholder="Please enter package" type="text"  id="name" ng-model="name" ng-value="name"  class="form-control title required"  >
							<p ng-show="submitc && name == ''" class="text-danger">Package name is required.</p>
					 </div>

					 <div class="form-group">
							<label>Package price<span class="red-text">*</span></label>
							<input placeholder="Please enter price" type="text"  id="price" ng-model="price" ng-value="price"  class="form-control title required"  >
							 <p ng-show="submitc && price == ''" class="text-danger">Package price is required.</p>
						</div>

						<div class="form-group">
						 <label>Company profile<span class="red-text">*</span></label>
						 <select  ng-model="company"  id="company" class="form-control category" >
						<option value="">Select company profile</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
						 </select>
						 <p ng-show="submitc && company == ''" class="text-danger">Please select company profile</p>
					 </div>


						<div class="form-group">
						 <label>Number of industries<span class="red-text">*</span></label>
							<input placeholder="Please enter number industries" type="text"  id="industry" ng-model="industry" ng-value="industry"  class="form-control title required"  >
							<p ng-show="submitc && industry == ''" class="text-danger">industry is required.</p>
						</div>

						<div class="form-group">
						 <label>Services<span class="red-text">*</span></label>
							<input placeholder="Please enter number of services" type="text"  id="price" ng-model="services" ng-value="services"  class="form-control title required"  >
							<p ng-show="submitc && services == ''" class="text-danger">services is required.</p>
						</div>

						<div class="form-group">
						 <label>Removal of negative reviews<span class="red-text">*</span></label>
							<input placeholder="Please enter number of services" type="text"  id="price" ng-model="review" ng-value="review"  class="form-control title required"  >
							<p ng-show="submitc && review == ''" class="text-danger">Negative review is required.</p>
						</div>

						<div class="form-group">
						 <label>Chat <span class="red-text">*</span></label>
						 <select  ng-model="chat"  id="chat" class="form-control" >
						<option value="">Select status</option>
						 <option  value="1">Yes</option>
						<option  value="0">No</option>
						 </select>
						 <p ng-show="submitc && chat == ''" class="text-danger">Please select chat option</p>
					 </div>

					 <div class="form-group">
						<label>Request a quote option <span class="red-text">*</span></label>
						<select  ng-model="request"  id="chat" class="form-control" >
					 <option value="">Select request a quote</option>
						<option  value="1">Yes</option>
					 <option  value="0">No</option>
						</select>
						<p ng-show="submitc && request == ''" class="text-danger">Please select request quote</p>
					</div>

					<div class="form-group">
					 <label>Consideration for ranking <span class="red-text">*</span></label>
					 <select  ng-model="ranking"  id="ranking" class="form-control" >
					<option value="">Select option</option>
					 <option  value="1">Yes</option>
					<option  value="0">No</option>
					 </select>
					 <p ng-show="submitc && ranking == ''" class="text-danger">Please select Consideration for ranking</p>
				 </div>

				 <div class="form-group">
					<label>Preferred location<span class="red-text">*</span></label>
					 <input placeholder="Please enter number of preferred location" type="text"  id="location" ng-model="location" ng-value="location"  class="form-control title required"  >
					 <p ng-show="submitc && location == ''" class="text-danger">Preferred location is required.</p>
				 </div>

				 <div class="form-group">
		 			<label>Key People<span class="red-text">*</span></label>
		 			 <input  placeholder="Please enter number of Key People" type="text"  id="keypeople" ng-model="keypeople" ng-value="keypeople"  class="form-control title required"  >
		 			 <p ng-show="submitc && keypeople == ''" class="text-danger">key people is required.</p>
		 		 </div>
				 		 <div class="form-group">
				 			<label>Group chat<span class="red-text">*</span></label>
				 			 <input  placeholder="Please enter number of group chat" type="text"  id="groupchat" ng-model="groupchat" ng-value="groupchat"  class="form-control title required"  >
				 			 <p ng-show="submitc && groupchat == ''" class="text-danger">Group chat is required.</p>
				 		 </div>

				 		 <div class="form-group">
				 			<label>Testimonial <span class="red-text">*</span></label>
				 			 <input  placeholder="Please enter number of testimonial" type="text"  id="testimonial" ng-model="testimonial" ng-value="testimonial"  class="form-control title required"  >
				 			 <p ng-show="submitc && testimonial == ''" class="text-danger">Testimonial is required.</p>
				 		 </div>

						 <div class="form-group">
				 			<label>Case studies <span class="red-text">*</span></label>
				 			 <input  placeholder="Please enter number of Case studies" type="text"  id="casestudies" ng-model="casestudies" ng-value="casestudies"  class="form-control title required"  >
				 			 <p ng-show="submitc && casestudies == ''" class="text-danger">Case studies is required.</p>
				 		 </div>
					</div>
					<div class="modal-footer">
						<button type="button" ng-click="updatepackage()" class="btn btn-success" >Submit</button>
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
							 				<a ng-click="deletepackage()" class="btn btn-danger" id="yes">Yes</a>
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
