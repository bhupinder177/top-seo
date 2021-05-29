<?php

include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">Proposal</li>
      </ol>
    </section>


<!--main-container-part-->

<section  class="content">
               <!-- content -->
	 <div ng-cloak class="box proposal-bx box-success" ng-app="myApp10" ng-controller="myCtrt10">

				 <div class="box-header with-border">

					 <h3  ng-cloak class="box-title">{{ job.jobTitle }} - Proposal</h3>

				 </div>

				 <div  class="box-body">

           <div style="overflow-x:auto;">
               <div class="table-responsive">
					 <table  id="rankingTable" class="table  table-condensed">
						 <thead>
							 <tr>
								  <th>Freelancer Name</th>
								  <th>Received Date</th>
								  <th>Attachment</th>
                  <th>Proposal</th>
                  <th>Amount</th>
									<th>Detail</th>
									<th>Action</th>
							 </tr>
						 </thead>

						 <tbody>
								 <tr  ng-if="proposal.length != 0 " ng-repeat="(key,x) in proposal" >

									 <td>
										 <img ng-if="x.type == 2 && x.company_logo" ng-cloak width="80px" height="80" src="<?php echo base_url(); ?>assets/client_images/{{ x.company_logo }}">

										 <img ng-if="x.logo && x.type == 3" height="50" width="50" src="<?php echo base_url(); ?>assets/client_images/{{ x.logo }}">
                     <img ng-if="!x.logo && x.company_logo" height="50" width="50" src="<?php echo base_url(); ?>assets/client_images/noimage.jpg"><br> {{ x.name }} </td>
                    <td>{{ x.proposalDate | date }}</td>
                    <td><a target="_blank" href="<?php echo base_url(); ?>assets/proposal/{{ x.proposalAttachment }}">{{ x.proposalAttachment }}</a></td>
										<td><span ng-bind-html="x.proposalDescription | limitTo: 100 | trustAsHtml"></span>...</td>
										<td>{{ job.currencycode }} {{ job.currencysymbol }} {{ x.proposalBid }} </td>
										<td><a target="_blank" href="<?php echo base_url(); ?>client-proposal-detail/{{ x.proposalId }}">Details</a></td>
                    <td>
                      <a ng-click="hired(x.proposalId)" ng-if="x.proposalStatus == 0 " class="btn btn-success">Hire</a>
                      <a ng-if="x.proposalStatus == 1" class="btn btn-success">Offered</a>
                      <a ng-if="x.proposalStatus == 2" class="btn btn-success">Hired</a>
                      <a ng-if="x.proposalStatus == 3" class="btn btn-danger">Rejected</a>
										 </td>

								 </tr>
								 <tr ng-cloak ng-if="proposal.length == 0"><td colspan="7" class="text-center">No Record Found.</td></tr>

								 <!-- offer modal -->
								 <div ng-cloak id="hire" class="modal fade" role="dialog">
									 <div class="modal-dialog">
										 <div class="modal-content">
											 <div class="modal-header">
												 <button type="button" class="close" data-dismiss="modal">&times;</button>
												 <h4 class="modal-title">Job Offer</h4>
											 </div>
											 <div class="modal-body">
												 <div class="row">
									 <div class="col-sm-12">
											 <div class="form-group">
												 <label>Total Amount<span class="red-text">*</span></label>
												 <input type="text"   id="amount"   ng-model="offerTotal"  name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" value="">
													 </div>
												 </div>
											 </div>
											 <!-- {{ milestone }} -->
											 <!-- <div ng-if="milestones.length != 0" class="row">
												<div class="col-md-12" style="margin: 10px 0">
													<a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="fa fa-plus-square"></i></a>
												</div>
													<br>
											</div> -->

									<div  class="milestone-main" ng-repeat="(key,x) in milestones" ng-init="proposal = key">
										<a ng-if="key != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletemilestone(key)" class="fa fa-trash-alt"></i></a>

										<div class="row">
											 <div class="col-sm-6">
										 <div class="form-group">
											 <label>Milestone Title<span class="red-text">*</span></label>
											 <input readonly type="text"  id="amount"  ng-value="x.title" ng-model="x.title" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
											 <p ng-show="offer && x.title == ''" class="text-danger ng-hide">Milestone Title is required.</p>

										 </div>
									 </div>
										<div class="col-sm-6">
										 <div class="form-group">
											 <label>Milestone Amount</label>
											 <input readonly type="text" readonly="" ng-value="x.price" ng-model="x.price" id="amount" numbers-only="numbers-only" placeholder="Please enter budget" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
										 </div>
									 </div>
									 </div>
									 <!-- =====task -->
									 <div class="row" ng-repeat="(key2,x2) in x.task" >
								 <div class="col-sm-6">
							 <div class="form-group">
								 <label>Task<span class="red-text">*</span></label>
								 <input readonly type="text"  id="amount"  ng-value="x2.task" ng-model="x2.task" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
								 <p ng-show="offer && x2.task == ''" class="text-danger ng-hide">Task is required.</p>

							 </div>
						 </div>
							<div class="col-sm-6">
							 <div class="form-group">
								 <label>Hours <span class="red-text">*</span></label>
								 <input readonly type="text" ng-keyup="totalmilestone()"  ng-value="x2.hours" ng-model="x2.hours" id="amount" numbers-only="numbers-only" placeholder="Please enter hours" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
								 <p ng-show="offer && x2.hours == ''" class="text-danger ng-hide">hours is required.</p>

							 </div>
								</div>

								<div class="col-sm-6">
								 <div class="form-group">
									 <label>Hourly price<span class="red-text">*</span></label>
									 <input readonly type="text" ng-keyup="totalmilestone()"  ng-value="x2.hourlyPrice" ng-model="x2.hourlyPrice" id="amount" numbers-only="numbers-only" placeholder="Please enter hours" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
									 <p ng-show="offer && x2.hourlyPrice == ''" class="text-danger ng-hide">Hourly Price is required.</p>

								 </div>
									</div>

									<div class="col-sm-6">
									 <div class="form-group">
										 <label>Task amount <span class="red-text">*</span></label>
										 <input readonly type="text" readonly ng-keyup="totalmilestone()"  ng-value="x2.amount" ng-model="x2.amount" id="amount" numbers-only="numbers-only" placeholder="Please enter amount" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
										 <p ng-show="offer && x2.amount == ''" class="text-danger ng-hide">Amount is required.</p>

									 </div>
										</div>

									<!-- <div class="col-sm-12">
									<a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fa fa-trash-alt"></i></a>
									</div> -->
						 </div>
						 <!-- <div class="col-sm-12">
							 <a hand id="plusicon">Sub Tasks  <i ng-click="taskadd(key)" class="fa fa-plus-square"></i> </a>
						 </div> -->
				</div>
									 <!-- task -->
											 </div>
											 <div class="modal-footer">
												 <button type="button" ng-click="offersend()" class="btn btn-success">Submit</button>
											 </div>
										 </div>

									 </div>
								 </div>
								 <!-- ====offer -->

						 </tbody>

					 </table>
                   </div>
         </div>
					 <div  id="pagination"></div>


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
							       <textarea type="text" id="description" name="description" ng-model="description" ng-value="description" class="form-control description ckeditor required" ></textarea>
							       <p ng-show="jobSubmit && description == ''" class="text-danger">description is required.</p>
							         </div>

											 <div class="form-group">
												 <label>Industries</label>
											 <select onchange="angular.element(this).scope().changeindustry(this)" id="industry" ng-model="jobindustries"  class="form-control" >
												<option>select industry</option>
													<option value="{{ x.id }}"  ng-repeat="(key,x) in industry">{{ x.name }}</option>
											 </select>
											 </div>

											 <div class="form-group">
												 <label>Services</label>
											 <select  id="services" ng-model="jobservices"  class="form-control" >
												<option>select service</option>
													<option value="{{ x.id }}" ng-repeat="(key,x) in services">{{ x.name }}</option>
											 </select>
											 <p ng-show="jobSubmit && jobservices == ''" class="text-danger">service is required.</p>
											 </div>

											 <div class="form-group">
												<label>Skill</label>
												<input id="skills" onkeyup="angular.element(this).scope().skills(this)" class="form-control" type="text" ng-model="profile.skill"   >
												<ul  if-ng="refservices.length != 0" >
													<li ng-repeat="(key,x) in refservices" ng-click="addskill(x.name,x.id)" value="{{ x.id }}">{{ x.name }}</li>
                                                 </ul>
														 <p ng-show="jobSubmit  && jobskill.length == 0" class="text-danger">skill is required.</p>
												</div>

												 <div ng-if="services.length != 0" id="tags">
													 <a ng-repeat="(key,x) in jobskill"  > {{ x.name }}<span hand ng-click="deleteskill(key)" > &times; </span></a>
													</div>

							         <div class="form-group">
							           <label>Attachment</label>
							         <input onchange="angular.element(this).scope().uploadImage(this)" type="file" id="attchment" name="file" class="form-control attchment required" >
							         <p ng-show="jobSubmit && image == ''" class="text-danger">attchment is required.</p>
							         </div>

											 <div class="form-group">
							           <label>No of freelancer Required</label>
							           <input type="text" numbers-only="numbers-only"  id="jobrequiredf" ng-model="jobrequiredf" ng-value="jobrequiredf" placeholder="required freelancer" class="form-control title required"  >
							            <p ng-show="jobSubmit && jobrequiredf == ''" class="text-danger">this field is required.</p>
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
