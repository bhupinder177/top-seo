<?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">Contact</li>
      </ol>
    </section>

<!--main-container-part-->

<section class="content"> 
			 <div ng-cloak class="box box-success" ng-app="myApp17" ng-controller="myCtrt17"> 
				 <div class="box-header p-3"> 
					 <h3 class="box-title mb-0">Contact</h3>  
				 </div>

				 <div class="box-body">
                     <div class="table-responsive">
					 <table id="rankingTable" class="table"> 
						 <thead> 
							 <tr> 
                            <th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Skype</th>
							<th>Subject</th>
							<th>Message</th>
							<th>Action</th>
                            </tr> 
						 </thead>

						 <tbody> 
								 <tr ng-if="contact.length != 0" ng-repeat="(key,x) in contact">
                                  <td>{{ x.name }} </td>
                                  <td>{{ x.code }}{{ x.phone }} </td>
                                  <td>{{ x.email }} </td>
                                  <td>{{ x.skype }} </td>
                                  <td>{{ x.subject }} </td>
                                  <td>{{ x.message }} </td> 
								<td> 
                                <a ng-click="deletemodal(key,x.id)" class="btn btn-default" title="Delete"><i class="fa fa-trash"></i></a>
										 </td>  
	                   </tr>
								 <tr ng-if="contact.length == 0">
									 <td colspan="6" class="text-center">No Record Found.</td>
								 </tr>

						 </tbody>

					 </table>
					 <div id="pagination"></div>

							 <!-- content-->

							 <!-- edit -->
							 <div id="editquestion" class="modal fade" role="dialog">
			           <div class="modal-dialog">

							 <!-- Modal content-->
							 <div class="modal-content">
							 	<div class="modal-header">
							 		<button type="button" class="close" data-dismiss="modal">&times;</button>
							 		<h4 class="modal-title">Question</h4>
							 	</div>
							 	<div class="modal-body">

									<div class="form-group">
 					 				 <label>Question<span class="red-text">*</span></label>
 					 				 <input placeholder="Please enter question" type="text"  id="question" ng-model="question" ng-value="question"  class="form-control title required"  >
 					 					<p ng-show="submitc && question == ''" class="text-danger">Question is required.</p>
 					 			 </div>

								 <div class="form-group">
								 <label>Question Type <span class="red-text">*</span></label>
								 <select  ng-model="questionType"  id="questionType" class="form-control jobId" >
								<option value="">Select Type</option>
								 <option ng-repeat="(key,x) in allquestionType" value="{{ x.id }}" >{{ x.name }}</option>

								 </select>
								 <p ng-show="submitc && questionType == ''" class="text-danger">Please select question type</p>
							 </div>


 								 <div class="form-group">
 									<label>Status <span class="red-text">*</span></label>
 									<select  ng-model="status"  id="jobs" class="form-control jobId" >
 								 <option value="">Select status</option>
 					       <option  value="1">Active</option>
 								 <option  value="0">InActive</option>
 									</select>
 									<p ng-show="submitc && status == ''" class="text-danger">Please select status</p>
 								</div>
							</div>

							 	<div class="modal-footer">
							 		<button type="button" ng-click="updatequestion()" class="btn btn-success" >Submit</button>
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

							 				<a ng-click="deletequestion()" class="btn btn-danger" id="yes">Yes</a>

							 				<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>

							 			</div>

							 		</div>

							 	</div>

							 </div>
							 <!-- delete modal -->

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>
</div>
