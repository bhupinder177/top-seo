<?php include('sidebar.php');?>

<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Contracts</li>
    </ol>
  </section>

  <!--main-container-part-->

  <section class="content">
    <!-- get sidebar -->

    <div ng-cloak class="row clientcontractdetail" ng-app="myApp7" ng-controller="myCtrt7">
      <div class="col-md-12">
        <div class="box box-success p-3">
          <div class="box-header with-border  contract-detail">
            <h3 class="box-title">Contract details</h3>
            <button ng-if="contracts.contractStatus == 1" data-toggle="modal" data-target="#milestone" class="btn btn-success addmil pull-right">Create Milestone</button>

            <!-- milestone -->

            <div id="milestone" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create New Milestone</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12" style="margin: 10px 0">
                        <a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="fa fa-plus-square"></i></a>
                      </div>
                    </div>

                    <div class="milestone-main" ng-repeat="(key,x) in milestones" ng-init="proposal = key">
                      <a ng-if="key != 0" hand id="plusicon" class="pull-right"> <i ng-click="deletemilestone(key)" class="fas fa-trash-alt"></i></a>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Milestone Title<span class="red-text">*</span></label>
                            <input type="text" id="amount" ng-value="x.title" ng-model="x.title" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
                            <p ng-show="mSubmit && x.title == ''" class="text-danger ng-hide">Milestone Title is required.</p>

                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Milestone Amount</label>
                            <input type="text" readonly="" ng-value="x.price" ng-model="x.price" id="amount" numbers-only="numbers-only" placeholder="Please enter budget" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
                          </div>
                        </div>
                         <div class="col-sm-12">
                           <a ng-if="key != 0" hand id="plusicon" ng-click="deletemilestone(key)" class="pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </div>
                      </div>
                      <!-- =====task -->
                      <div class="row" ng-repeat="(key2,x2) in x.task">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Task<span class="red-text">*</span></label>
                            <input type="text" id="amount" ng-value="x2.task" ng-model="x2.task" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
                            <p ng-show="mSubmit && x2.task == ''" class="text-danger ng-hide">Task is required.</p>

                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Hours <span class="red-text">*</span></label>
                            <input type="text" ng-keyup="totalmilestone()" ng-value="x2.hours" ng-model="x2.hours" id="amount" numbers-only="numbers-only" placeholder="Please enter hours" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
                            <p ng-show="mSubmit && x2.hours == ''" class="text-danger ng-hide">Hours is required.</p>


                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Hourly price <span class="red-text">*</span></label>
                            <input type="text" ng-keyup="totalmilestone()" ng-value="x2.hourlyPrice" ng-model="x2.hourlyPrice" id="amount" numbers-only="numbers-only" placeholder="Please enter hourly price" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
                            <p ng-show="mSubmit && x2.hourlyPrice == ''" class="text-danger ng-hide">Hourly price is required.</p>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Task amount <span class="red-text">*</span></label>
                            <input type="text" readonly ng-value="x2.amount" ng-model="x2.amount" id="amount" numbers-only="numbers-only" placeholder="Please enter amount" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
                            <p ng-show="mSubmit && x2.amount == ''" class="text-danger ng-hide">Task amount is required.</p>

                          </div>
                        </div>

                        <div class="col-sm-12">
                          <!-- <a hand id="plusicon">Sub Tasks  <i ng-click="taskadd(key)" class="far fa-plus-square"></i> </a> -->

                          <a ng-if="key2 != 0" hand id="plusicon" ng-click="deletetask(key,key2)" class="pull-right"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </div>
                      </div>
                      <div class="">
                        <a hand id="plusicon">Sub Tasks  <i ng-click="taskadd(key)" class="fa fa-plus-square"></i> </a>

                       <!-- <a hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a>  -->
                      </div>
                    </div>
                    <!-- task -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" ng-click="submitMilestone()" class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>
            </div>
            <!-- milestone -->
          </div>

          <div  class="box-body job-offer-full">

            <!-- {{ job }} -->

            <div class="cntrct_dtls">
              <div class="givereview" ng-if="contracts.contractStatus == 2 &&  !contracts.clientEnd && contracts.todaydate < contracts.reviewlastdate">
                <div>
                  Freelancer waiting for review <a ng-click="endcontract(contracts.contractId,contracts.freelancerId)" class="btn btn-info">review</a>
                </div>
              </div>
 						 <h2>{{ contracts.jobTitle }}  <a ng-if="contracts.contractStatus == 1"  ng-click="endcontract(contracts.contractId,contracts.clientId)" class="btn btn-info">End Contract</a> </h2>
 						 <p ng-bind-html="contracts.jobDescription |trustAsHtml"></p>
 						 <p ng-if="contracts.jobAttchment && contracts.jobAttchment != ''">Attachment :<a target="_blank" href="<?php echo base_url(); ?>assets/jobAttachment/{{ contracts.jobAttchment}}">
 		 				<i class="fa fa-download" aria-hidden="true"></i></a></p>
 		 				<b><span>Amount :-<span> {{  contracts.code  }} {{  contracts.symbol  }} {{  contracts.contractAmount  }} </b><br>
 					 </div>

              <div class="box-body">
                     <div class="table-responsive">
                   <table class="table table-bordered">
                       <thead>
                     <tr>
                       <th>Milestone</th>
                       <th>Task Name</th>
                       <th ng-if="contracts['milestone'][0].task[0].hours">Hours</th>
                       <th ng-if="contracts['milestone'][0].task[0].hourlyPrice">Hourly Price</th>
                       <th>Amount</th>
                       <th>Status</th>
                       <th>Paid Amount</th>
                       </tr>
                   </thead>
                     <tbody ng-repeat="(key,x) in contracts['milestone']" >
                       <tr  ng-if="x.task.length != 0" ng-repeat="(key2,x2) in x.task">
                         <td><span ng-if="$index == 0">{{ x.name }}</span></td>
                         <td>{{ x2.name  }}</td>
                         <td ng-if="x2.hours">{{ x2.hours  }} </td>
                         <td ng-if="x2.hourlyPrice">{{ x2.hourlyPrice }}  </td>
                         <td >{{  contracts.code  }} {{ contracts.symbol }} {{ x2.amount }}  </td>
                         <td>
                           <div class=" form-group">
                           <select onchange="angular.element(this).scope().changeclientStatus(this)" ng-model="x2.clientStatus" class="form-control">
                             <option  value="">Select Client Status</option>
                             <option data-id="{{ x2.id }}"  value="1">Completed</option>
                             <option data-id="{{ x2.id }}" value="2">Pending</option>
                           </select>
                         </div>
                         </td>
                         <!-- <td>
                           <div ng-if="$index == 0" class=" form-group">
                           <select ng-model="x.paymentStatus" onchange="angular.element(this).scope().changepaymentStatus(this)" ng-model="x2.paymentStatus" class="form-control">
                             <option  value="">Select Pyament Status</option>
                             <option data-project="{{ contracts.contractId }}" data-id="{{ x.id }}"  value="1">Completed</option>
                             <option data-project="{{ contracts.contractId }}" data-id="{{ x.id }}" value="2">Pending</option>
                           </select>
                         </div>
                         </td> -->
                         <td>
                           <div ng-if="$index == 0" class="form-group">
                           <input type="text" numbers-only="numbers-only" ng-keyup="receivedkeyup($event.target.value,x.id,contracts.contractId)" ng-value="x.receivedAmount" ng-model="x.receivedAmount" placeholder="Please enter paid amount" class="form-control">
                         </div>
                         </td>


                       </tr>
                     </tbody>
                   </table>

                 </div>
               </div>



              <!-- modal accept -->
              <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 ng-if="status == 3" class="modal-title">Accept</h4>
                      <h4 ng-if="status == 1" class="modal-title">Reject</h4>
                    </div>
                    <div class="modal-body">
                      <p ng-if="status == 3">Are you sure you want to accept this request ?</p>
                      <p ng-if="status == 1">Are you sure you want to reject this request ?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button ng-if="status == 3" type="button" ng-click="requestsend()" class="btn btn-success" id="">Accept</button>
                      <button ng-if="status == 1" type="button" ng-click="requestsend()" class="btn btn-danger" id="confirm">Reject</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- modal accept -->

              <!-- contract strat -->

              <div id="contractstart" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Start Milestone</h4>
                    </div>
                    <div class="modal-body">
                      <div>
                        <label for="mobile">Message*</label>
                        <textarea type="text" ng-model="message" class="form-control" id="message" name="message"></textarea>
                        <p ng-show="msgSubmit && message == ''" class="text-danger">message is required.</p>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" ng-click="contractstart()" class="btn btn-success">submit</button>
                    </div>
                  </div>

                </div>
              </div>

              <!-- contract start -->

              <!-- contract end modal -->
              <!-- contract end modal -->
              <div id="contractend" class="modal fade" role="dialog">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">End Contract</h4>

              </div>
              <div class="modal-body">
                <h6>Contract Title : <span>{{ contracts.jobTitle  }}</span></h6>

              <div>
                <h2>Private Feedback</h2>
                <span>This feedback will be kept anonymous and never shared directly with the client.</span>
              <p>Reason For Ending Contract <span class="text-danger">*</span></p>
              <select class="form-control" id="reason" ng-model="reason">
              <option value="">Select a reason</option>
              <option value="1">Job completed successfully</option>
              <option value="1">Client not responsive</option>
              <option value="1">Job was completed unsuccessfully</option>
              <option value="1">Another Reason</option>

              </select>
               <p ng-show="msgSubmit && reason == ''" class="text-danger">Reason is required.</p>
              </div>



              <div class="contractend_slect_data" ng-if="reason == 1">
              <h2>How likely are you to recommend this company to a friend or a colleague?</h2>
              <label for="mobile"><b>Private Rating<span class="red-text">*</span></b></label>
              <p class="rating-number">

              <span><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="0" ><em>0</em></span>
                <span><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="1" ><em>1</em></span>
                <span><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="2" ><em>2</em></span>
                <span><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="3" ><em>3</em></span>
                <span><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="4" ><em>4</em></span>
                <span><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="5" ><em>5</em></span>
                <span><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="6" ><em>6</em></span>
                <span><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="7" ><em>7</em></span>
                <span><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="8" ><em>8</em></span>
                <span><input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="9" ><em>9</em></span>
              <span>	<input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="10" ><em>10</em></p></span>
              <p ng-show="msgSubmit && rating == ''" class="text-danger">Rating is required.</p>
              </div>
              <div class="contractend_slect_data" ng-if="reason == 1">
               <h2>Public Feedback</h2>
               <p><b>This feedback will be shared on your company's profile only after they've left feedback for you.</b></p>
               <div class="star-rating">
              <label class="reviewlabel">Skill</label>
              <span ng-class="{ 'fa-star' :  skill >= 1 , 'fa-star-o' : skill < 1 }" ng-click="starrating('skill','1')" class="fa" ></span>
              <span ng-class="{ 'fa-star' :  skill >= 2 , 'fa-star-o' : skill < 2 }" ng-click="starrating('skill','2')" class="fa" ></span>
              <span ng-class="{ 'fa-star' :  skill >= 3 , 'fa-star-o' : skill < 3 }" ng-click="starrating('skill','3')" class="fa" ></span>
              <span ng-class="{ 'fa-star' :  skill >= 4 , 'fa-star-o' : skill < 4 }" ng-click="starrating('skill','4')" class="fa" ></span>
              <span ng-class="{ 'fa-star' :  skill >= 5 , 'fa-star-o' : skill < 5 }" ng-click="starrating('skill','5')" class="fa" ></span>
              </div>

              <div class="star-rating">
              <label class="reviewlabel">Quality</label>
              <span ng-class="{ 'fa-star' :  quality >= 1 , 'fa-star-o' : quality < 1 }" ng-click="starrating('quality','1')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  quality >= 2 , 'fa-star-o' : quality < 2 }" ng-click="starrating('quality','2')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  quality >= 3 , 'fa-star-o' : quality < 3 }" ng-click="starrating('quality','3')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  quality >= 4 , 'fa-star-o' : quality < 4 }" ng-click="starrating('quality','4')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  quality >= 5 , 'fa-star-o' : quality < 5 }" ng-click="starrating('quality','5')" class="fa"></span>

              </div>

              <div class="star-rating">
              <label class="reviewlabel">willing to rehire</label>
              <span ng-class="{ 'fa-star' :  rehire >= 1 , 'fa-star-o' : rehire < 1 }" ng-click="starrating('rehire','1')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  rehire >= 2 , 'fa-star-o' : rehire < 2 }" ng-click="starrating('rehire','2')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  rehire >= 3 , 'fa-star-o' : rehire < 3 }" ng-click="starrating('rehire','3')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  rehire >= 4 , 'fa-star-o' : rehire < 4 }" ng-click="starrating('rehire','4')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  rehire >= 5 , 'fa-star-o' : rehire < 5 }" ng-click="starrating('rehire','5')" class="fa"></span>

              </div>

              <div class="star-rating">
              <label class="reviewlabel">Availability</label>
              <span ng-class="{ 'fa-star' :  availability >= 1 , 'fa-star-o' : availability < 1 }" ng-click="starrating('availability','1')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  availability >= 2 , 'fa-star-o' : availability < 2 }" ng-click="starrating('availability','2')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  availability >= 3 , 'fa-star-o' : availability < 3 }" ng-click="starrating('availability','3')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  availability >= 4 , 'fa-star-o' : availability < 4 }" ng-click="starrating('availability','4')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  availability >= 5 , 'fa-star-o' : availability < 5 }" ng-click="starrating('availability','5')" class="fa"></span>

              </div>

              <div class="star-rating">
              <label class="reviewlabel">Deadlines</label>
              <span ng-class="{ 'fa-star' :  deadline >= 1 , 'fa-star-o' : deadline < 1 }" ng-click="starrating('deadline','1')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  deadline >= 2 , 'fa-star-o' : deadline < 2 }" ng-click="starrating('deadline','2')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  deadline >= 3 , 'fa-star-o' : deadline < 3 }" ng-click="starrating('deadline','3')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  deadline >= 4 , 'fa-star-o' : deadline < 4 }" ng-click="starrating('deadline','4')" class="fa"></span>
              <span ng-class="{ 'fa-star' :  deadline >= 5 , 'fa-star-o' : deadline < 5 }" ng-click="starrating('deadline','5')" class="fa"></span>

              </div>


               <div class="star-rating">
               <label class="reviewlabel">Communication</label>
               <span ng-class="{ 'fa-star' :  communication >= 1 , 'fa-star-o' :  communication < 1}" ng-click="starrating('comm','1')" class="fa" ></span>
               <span ng-class="{ 'fa-star' :  communication >= 2 , 'fa-star-o' :  communication < 2}" ng-click="starrating('comm','2')" class="fa" ></span>
               <span ng-class="{ 'fa-star' :  communication >= 3 , 'fa-star-o' :  communication < 3}" ng-click="starrating('comm','3')" class="fa" ></span>
               <span ng-class="{ 'fa-star' :  communication >= 4 , 'fa-star-o' :  communication < 4}" ng-click="starrating('comm','4')" class="fa" ></span>
               <span ng-class="{ 'fa-star' :  communication >= 5 , 'fa-star-o' :  communication < 5}" ng-click="starrating('comm','5')" class="fa" ></span>

               </div>



               <div class="star-rating">
               <label class="reviewlabel">Cooperation</label>
               <span ng-class="{ 'fa-star' :  cooperation >= 1 , 'fa-star-o' : cooperation < 1 }" ng-click="starrating('cooperation','1')" class="fa"></span>
               <span ng-class="{ 'fa-star' :  cooperation >= 2 , 'fa-star-o' : cooperation < 2 }" ng-click="starrating('cooperation','2')" class="fa"></span>
               <span ng-class="{ 'fa-star' :  cooperation >= 3 , 'fa-star-o' : cooperation < 3 }" ng-click="starrating('cooperation','3')" class="fa"></span>
               <span ng-class="{ 'fa-star' :  cooperation >= 4 , 'fa-star-o' : cooperation < 4 }" ng-click="starrating('cooperation','4')" class="fa"></span>
               <span ng-class="{ 'fa-star' :  cooperation >= 5 , 'fa-star-o' : cooperation < 5 }" ng-click="starrating('cooperation','5')" class="fa"></span>

               </div>

               <div class="star-rating">
               <label class="reviewlabel">Cost</label>
               <span ng-class="{ 'fa-star' :  cost >= 1 , 'fa-star-o' : cost < 1 }" ng-click="starrating('cost','1')" class="fa"></span>
               <span ng-class="{ 'fa-star' :  cost >= 2 , 'fa-star-o' : cost < 2 }" ng-click="starrating('cost','2')" class="fa"></span>
               <span ng-class="{ 'fa-star' :  cost >= 3 , 'fa-star-o' : cost < 3 }" ng-click="starrating('cost','3')" class="fa"></span>
               <span ng-class="{ 'fa-star' :  cost >= 4 , 'fa-star-o' : cost < 4 }" ng-click="starrating('cost','4')" class="fa"></span>
               <span ng-class="{ 'fa-star' :  cost >= 5 , 'fa-star-o' : cost < 5 }" ng-click="starrating('cost','5')" class="fa"></span>

               </div>


               <div ng-if="reason == 1">
                 <div class="star-rating">
              <label >Overall : {{ overall | number : 2 }}</label>
              <span ng-class="{ 'fa-star' :  overall >= 2 ,'fa-star-half-o' :  overall > 1 && overall < 2 , 'fa-star-o' : overall < 2 }"  class="fa"></span>
              <span ng-class="{ 'fa-star' :  overall >= 4 ,'fa-star-half-o' :  overall > 3 && overall < 4 , 'fa-star-o' : overall < 4 }"  class="fa"></span>
              <span ng-class="{ 'fa-star' :  overall >= 6 ,'fa-star-half-o' :  overall > 5 && overall < 6 , 'fa-star-o' : overall < 6 }"  class="fa"></span>
              <span ng-class="{ 'fa-star' :  overall >= 8 ,'fa-star-half-o' :  overall > 7 && overall < 8 , 'fa-star-o' : overall < 8 }"  class="fa"></span>
              <span ng-class="{ 'fa-star' :  overall >= 10 ,'fa-star-half-o' :  overall > 9 && overall < 10 , 'fa-star-o' : overall < 10 }"  class="fa"></span>
               </div>
               </div>


               <div ng-if="reason == 1">
               <p><b>Share your experience with this company on this Portal</b> <span class="text-danger">*</span></p>
               <textarea type="text"  ng-model="review"  class="form-control" id="review2" name="message"></textarea>
                  <p ng-show="msgSubmit && review == ''" class="text-danger">Feedback is required.</p>
               </div>

              </div>


              </div>
              <div class="modal-footer">
              <button type="button" ng-click="submitContractReview()" class="btn btn-success">End Contract</button>
              </div>
              </div>
              </div>
              </div>
                <!-- contract end modal-->

          <!-- milestone review -->
          <div id="milestonereview" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Milestone Review</h4>
                </div>
                <div class="modal-body">
                  <div>
                    <label for="mobile">Reason *</label>
                    <select class="form-control" id="reason" ng-model="reason">
                      <option value="">Select reason</option>
                      <option value="1">Successfully completed</option>

                    </select>
                    <p ng-show="msgSubmit && reason == ''" class="text-danger">reason is required.</p>
                  </div>

                  <div ng-if="reason == 1">
                    <label for="mobile">Rating *</label>
                    <p>
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="0">0
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="1">1
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="2">2
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="3">3
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="4">4
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="5">5
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="6">6
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="7">7
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="8">8
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="9">9
                      <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="rating" value="10">10</p>
                      <p ng-show="msgSubmit && rating == ''" class="text-danger">rating is required.</p>
                    </div>

                    <div ng-if="reason == 1">

                      <div class="star-rating">
                        <label class="reviewlabel">Skill</label>
                        <span ng-class="{ 'fa-star' :  skill >= 1 , 'fa-star-o' : skill < 1 }" ng-click="starrating('skill','1')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  skill >= 2 , 'fa-star-o' : skill < 2 }" ng-click="starrating('skill','2')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  skill >= 3 , 'fa-star-o' : skill < 3 }" ng-click="starrating('skill','3')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  skill >= 4 , 'fa-star-o' : skill < 4 }" ng-click="starrating('skill','4')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  skill >= 5 , 'fa-star-o' : skill < 5 }" ng-click="starrating('skill','5')" class="fa"></span>
                      </div>

                      <div class="star-rating">
                        <label class="reviewlabel">Quality</label>
                        <span ng-class="{ 'fa-star' :  quality >= 1 , 'fa-star-o' : quality < 1 }" ng-click="starrating('quality','1')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  quality >= 2 , 'fa-star-o' : quality < 2 }" ng-click="starrating('quality','2')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  quality >= 3 , 'fa-star-o' : quality < 3 }" ng-click="starrating('quality','3')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  quality >= 4 , 'fa-star-o' : quality < 4 }" ng-click="starrating('quality','4')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  quality >= 5 , 'fa-star-o' : quality < 5 }" ng-click="starrating('quality','5')" class="fa"></span>

                      </div>

                      <div class="star-rating">
                        <label class="reviewlabel">willing to rehire</label>
                        <span ng-class="{ 'fa-star' :  rehire >= 1 , 'fa-star-o' : rehire < 1 }" ng-click="starrating('rehire','1')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  rehire >= 2 , 'fa-star-o' : rehire < 2 }" ng-click="starrating('rehire','2')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  rehire >= 3 , 'fa-star-o' : rehire < 3 }" ng-click="starrating('rehire','3')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  rehire >= 4 , 'fa-star-o' : rehire < 4 }" ng-click="starrating('rehire','4')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  rehire >= 5 , 'fa-star-o' : rehire < 5 }" ng-click="starrating('rehire','5')" class="fa"></span>

                      </div>

                      <div class="star-rating">
                        <label class="reviewlabel">Availability</label>
                        <span ng-class="{ 'fa-star' :  availability >= 1 , 'fa-star-o' : availability < 1 }" ng-click="starrating('availability','1')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  availability >= 2 , 'fa-star-o' : availability < 2 }" ng-click="starrating('availability','2')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  availability >= 3 , 'fa-star-o' : availability < 3 }" ng-click="starrating('availability','3')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  availability >= 4 , 'fa-star-o' : availability < 4 }" ng-click="starrating('availability','4')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  availability >= 5 , 'fa-star-o' : availability < 5 }" ng-click="starrating('availability','5')" class="fa"></span>

                      </div>

                      <div class="star-rating">
                        <label class="reviewlabel">Deadlines</label>
                        <span ng-class="{ 'fa-star' :  deadline >= 1 , 'fa-star-o' : deadline < 1 }" ng-click="starrating('deadline','1')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  deadline >= 2 , 'fa-star-o' : deadline < 2 }" ng-click="starrating('deadline','2')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  deadline >= 3 , 'fa-star-o' : deadline < 3 }" ng-click="starrating('deadline','3')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  deadline >= 4 , 'fa-star-o' : deadline < 4 }" ng-click="starrating('deadline','4')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  deadline >= 5 , 'fa-star-o' : deadline < 5 }" ng-click="starrating('deadline','5')" class="fa"></span>

                      </div>

                      <div class="star-rating">
                        <label class="reviewlabel">Communication</label>
                        <span ng-class="{ 'fa-star' :  communication >= 1 , 'fa-star-o' :  communication < 1}" ng-click="starrating('comm','1')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  communication >= 2 , 'fa-star-o' :  communication < 2}" ng-click="starrating('comm','2')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  communication >= 3 , 'fa-star-o' :  communication < 3}" ng-click="starrating('comm','3')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  communication >= 4 , 'fa-star-o' :  communication < 4}" ng-click="starrating('comm','4')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  communication >= 5 , 'fa-star-o' :  communication < 5}" ng-click="starrating('comm','5')" class="fa"></span>

                      </div>

                      <div class="star-rating">
                        <label class="reviewlabel">Cooperation</label>
                        <span ng-class="{ 'fa-star' :  cooperation >= 1 , 'fa-star-o' : cooperation < 1 }" ng-click="starrating('cooperation','1')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  cooperation >= 2 , 'fa-star-o' : cooperation < 2 }" ng-click="starrating('cooperation','2')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  cooperation >= 3 , 'fa-star-o' : cooperation < 3 }" ng-click="starrating('cooperation','3')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  cooperation >= 4 , 'fa-star-o' : cooperation < 4 }" ng-click="starrating('cooperation','4')" class="fa"></span>
                        <span ng-class="{ 'fa-star' :  cooperation >= 5 , 'fa-star-o' : cooperation < 5 }" ng-click="starrating('cooperation','5')" class="fa"></span>

                      </div>

                      <!-- <div class="star-rating">
                      <label class="reviewlabel">Schedule</label>
                      <span ng-class="{ 'fa-star' :  schedule >= 1 , 'fa-star-o' : schedule < 1 }" ng-click="starrating('schedule','1')" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  schedule >= 2 , 'fa-star-o' : schedule < 2 }" ng-click="starrating('schedule','2')" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  schedule >= 3 , 'fa-star-o' : schedule < 3 }" ng-click="starrating('schedule','3')" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  schedule >= 4 , 'fa-star-o' : schedule < 4 }" ng-click="starrating('schedule','4')" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  schedule >= 5 , 'fa-star-o' : schedule < 5 }" ng-click="starrating('schedule','5')" class="fa"></span>

                    </div> -->

                    <div class="star-rating">
                      <label class="reviewlabel">Cost</label>
                      <span ng-class="{ 'fa-star' :  cost >= 1 , 'fa-star-o' : cost < 1 }" ng-click="starrating('cost','1')" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  cost >= 2 , 'fa-star-o' : cost < 2 }" ng-click="starrating('cost','2')" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  cost >= 3 , 'fa-star-o' : cost < 3 }" ng-click="starrating('cost','3')" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  cost >= 4 , 'fa-star-o' : cost < 4 }" ng-click="starrating('cost','4')" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  cost >= 5 , 'fa-star-o' : cost < 5 }" ng-click="starrating('cost','5')" class="fa"></span>

                    </div>

                    <div ng-if="reason == 1">
                      <label>Overall : {{ overall | number : 2 }}</label>
                      <span ng-class="{ 'fa-star' :  overall >= 2 ,'fa-star-half-o' :  overall > 1 && overall < 2 , 'fa-star-o' : overall < 2 }" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  overall >= 4 ,'fa-star-half-o' :  overall > 3 && overall < 4 , 'fa-star-o' : overall < 4 }" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  overall >= 6 ,'fa-star-half-o' :  overall > 5 && overall < 6 , 'fa-star-o' : overall < 6 }" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  overall >= 8 ,'fa-star-half-o' :  overall > 7 && overall < 8 , 'fa-star-o' : overall < 8 }" class="fa"></span>
                      <span ng-class="{ 'fa-star' :  overall >= 10 ,'fa-star-half-o' :  overall > 9 && overall < 10 , 'fa-star-o' : overall < 10 }" class="fa"></span>
                    </div>

                    <div ng-if="reason == 1">
                      <label for="mobile">Review</label>
                      <textarea type="text" ng-model="review" class="form-control" id="review1" name="message"></textarea>

                    </div>

                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" ng-click="submitMilestoneReview()" class="btn btn-success">submit</button>
                </div>
              </div>

            </div>
          </div>
          <!-- milestone review -->

          <!-- content-->

          <!-- <div class="row">
            <div class="col-md-4">
              <h4>Activity Board</h4>
              <div scroll-glue-bottom="glued" class="activitytask">
                <div ng-repeat="(key,x) in activity" class="Activity">
                  <b>{{ x.name  }}</b>
                  <p>
                    <h6 ng-bind-html="x.logText|trustAsHtml">{{ x.logText }}</h6> <a ng-click="comment(x.logId)"><i class="far fa-comment"></i></a></p>
                    <p>{{ x.logDate | date }} {{ x.logDate | time }}</p>
                    <p class="commentdisplay" ng-repeat="(key,x2) in x['comment']">
                      <span>{{ x2.logText | htmlToPlaintext }}</span>
                      <br/>
                      <em class="comment-time">from :{{ x2.name }} {{ x2.logDate | date }} {{ x.logDate | time }}</em>
                    </p>
                    <hr>

                    <div style="display:none;height:50px;" class="comment comment{{ x.logId }}"></div>
                    <div style="display:none" class="cbt cbtn{{ x.logId }}">
                      <button ng-click="submitcomment(x.logId,x.logReference)" class="btn btn-success">submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
          <hr>

        </section>
      </div>
