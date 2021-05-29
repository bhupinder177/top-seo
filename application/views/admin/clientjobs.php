
<?php

include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">Client jobs</li>
      </ol>
    </section>

<!--main-container-part-->

<section class="content">
	<!-- get sidebar -->
				<div id="content">
               <!-- content -->
			 <div ng-cloak class="box box-success" ng-app="myApp3" ng-controller="myCtrt3">
				 <div class="box-header p-3">
					 <h4 class="box-title">All Post Jobs</h4>
				   </div>
				 <div class="table-responsive">
					 <table class="table">
						 <thead>
							 <tr>
								  <th>Title</th>
                                  <th>Description</th>
                                  <th>Amount</th>
                                  <th>Hired</th>
								  <th>Status</th>
							 </tr>
						 </thead>
						 <tbody>
								 <tr ng-if="jobs.length != 0" ng-repeat="(key,x) in jobs" ng-init="jobs = key">
                                 <td><a href="<?php echo base_url(); ?>{{ x.jobTitle | lowercase | underscoreless }}-{{ x.jobId }}">{{ x.jobTitle }}</a></td>
                                  <td>{{ x.jobDescription | limitTo:200 }}...</td>
                                 <td>{{  x.jobAmount  }} </td>
                                 <td>{{ x.name }}</td>
                                 <td ng-if="x.offStatus == 0"><a class="btn btn-primary">Pending</a></td>
                                 <td ng-if="x.offStatus == 1"><a class="btn btn-success">Accepted</a></td>
                                 <td ng-if="x.offStatus == 2"><a class="btn btn-danger">Rejected</a></td>
								 </tr>
								 <tr ng-if="jobs.length == 0"><td colspan="7" class="text-center">No Record Found.</td></tr>
						 </tbody>
					 </table>
                 </div>
					 <div id="pagination"></div>
							 <!-- content-->

							 <!-- job Offer modal -->
							 <div class="modal fade" id="myJob" role="dialog">
							   <div class="modal-dialog">
							     <div class="modal-content">
							       <form  id="jobform" novalidate >
							       <div class="modal-header">
							         <button type="button" class="close" data-dismiss="modal">&times;</button>
							         <h4 class="modal-title">Create A Job</h4>
							       </div>
							       <div class="modal-body">
							         <div class="form-group">
							           <label>Title</label>
							           <input type="text"  id="title" ng-model="jobtitle" ng-value="jobtitle" placeholder="Title" class="form-control title required"  >
							            <p ng-show="jobSubmit && jobtitle == ''" class="text-danger">title is required.</p>
							         </div>
							         <div class="form-group">
							           <label>Description</label>
							           <!-- ckeditor -->
							       <textarea type="text" id="description" ng-model="description" ng-value="description" class="form-control description required" ></textarea>
							       <p ng-show="jobSubmit && description == ''" class="text-danger">description is required.</p>
							         </div>
							         <div class="form-group">
							           <label>Attachment</label>
							         <input onchange="angular.element(this).scope().uploadImage(this)" type="file" id="attchment" name="file" class="form-control attchment required" >
							         <p ng-show="jobSubmit && image == ''" class="text-danger">attchment is required.</p>
							         </div>
							         <div class="row">
							           <div class="col-md-12" style="margin: 10px 0">
							             <a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="far fa-plus-square"></i></a>
							           </div>
							           <br>
							         </div>
							     <div style="margin-bottom:5px;" class="form-inline milestone" ng-repeat="(key,x) in milestones">
							       <a hand id="plusicon" class="pull-right">  <i ng-click="deletemilestone(key)" class="fas fa-trash-alt"></i></a>
							     <div class="form-group">
							     <input type="text" name='title{{$index}}' ng-required='true' class="form-control" ng-model="x.title" ng-value="x.title"  id="email" placeholder="Enter Title" name="title">
							       <p ng-show="jobSubmit && x.title == ''" class="text-danger">title is required.</p>

							     </div>
							     <div class="form-group">
							       <input type="text"  ng-keyup="totalmilestone()"  numbers-only="numbers-only" ng-model="x.price" ng-value="x.price" class="numberonly form-control" id="pwd" placeholder="Enter Amount" name="price">
							       <p ng-show="jobSubmit && x.title == ''" class="text-danger">price is required.</p>
							     </div>

							     <div class="row">
							       <div class="col-md-12" style="margin: 10px 0">
							         <a hand id="plusicon">Sub Tasks  <i ng-click="taskadd(key)" class="far fa-plus-square"></i> </a>
							       </div>
							       <br>
							     </div>
							     <div class="row" ng-repeat="(key2,x2) in x.task">
							       <div class="col-md-12">
							         <div class="form-group" style="margin-bottom: 10px">
							           <input type="text"  id="title" placeholder="task" ng-model="x2.task" ng-value="x2.task"   class="form-control title required"  >
							           <p ng-show="jobSubmit && x2.task == ''" class="text-danger">task is required.</p>
							           &nbsp; <a hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a>
							         </div>
							       </div>
							     </div>
							   </div>
							   <div class="form-group">
							     <label>Amount</label>
							     <input type="text" readonly id="amount" value="{{ total }}" ng-model="total" placeholder="Total Amount"  name="totalamount" class="form-control amount required" >
							   </div>
							       <div class="modal-footer">
							         <div class="btn-panel text-right">
							           <input type="button" ng-click="submitjob()" name="save" value="Submit" class="submitjob btn btn-primary" >
							         </div>
							       </div>
							     </div>
							   </form>
							   </div>
							 </div>
							 </div>
							 <!-- job offer Modal -->
							</div>
						</div>
</section>
</div>
