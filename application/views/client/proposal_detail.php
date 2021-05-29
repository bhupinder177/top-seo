<?php

include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Proposal Detail</li>
      </ol>
    </section>


<!--main-container-part-->

<section class="content">
	<!-- get sidebar -->

			 <div ng-cloak class="box box-success" ng-app="myApp11" ng-controller="myCtrt11">
				 <div class="box-header with-border">
					 <h3 class="box-title"><?php echo $title; ?></h3>
				 </div>

				 <div  class="box-body job-offer-full">
          <div class="freelancer">
            <div class="row">
            <div class="col-md-6">

					   <img ng-if="proposal.type == 2" ng-cloak width="80px" height="80" src="<?php echo base_url(); ?>assets/client_images/{{ proposal.company_logo }}">
					   <img ng-if="proposal.type == 3" ng-cloak width="80px" height="80" src="<?php echo base_url(); ?>assets/client_images/{{ proposal.logo }}">
              <h6 ng-cloak>
								<b>
							<a ng-if="proposal.type == 2 && proposal.parent == 0" href="<?php echo base_url(); ?>profile/{{ proposal.c_name | lowercase | underscoreless }}-{{ proposal.u_id }}" target="_blank">{{ proposal.name }}</a>
							<a ng-if="proposal.type == 3 && proposal.parent == 0" href="<?php echo base_url(); ?>profile/{{ proposal.name | lowercase | underscoreless }}-{{ proposal.u_id }}" >{{ proposal.name }}</a>
							<a ng-if="proposal.type == 3 && proposal.parent != 0" href="<?php echo base_url(); ?>profile/{{ proposal.c_name | lowercase | underscoreless }}-{{ proposal.parent }}" >{{ proposal.name }}</a>
						  </b>
								<div class="rightside">
                  <!-- && !proposal.proposalType -->
							    <a ng-cloak ng-if="proposal.proposalStatus == 0 " data-toggle="modal" data-target="#hire" class="btn btn-success">Hire</a>
			<!-- -->
                 <a ng-cloak ng-if="proposal.proposalStatus == 0 && proposal.proposalType == 1 " data-toggle="modal" data-target="#milestoneActive" class="btn btn-success">Active Milestone</a>
									<a ng-cloak ng-if="proposal.proposalStatus == 1"  class="btn btn-success">Offered</a>
                  <a ng-if="proposal.proposalStatus == 2" class="btn btn-success">Hired</a>
                  <a ng-if="proposal.proposalStatus == 3" class="btn btn-danger">Rejected</a>
                  <a ng-cloak ng-if="proposal.proposalStatus == 3" data-toggle="modal" data-target="#hire" class="btn btn-success">Re-offer</a>


									<!-- <a ng-cloak data-toggle="modal" data-target="#message" class="btn btn-success">Message</a> -->




								</div>
						</h6>

							<p>Proposal :- <span ng-bind-html="proposal.proposalDescription |trustAsHtml ">{{ proposal.proposalDescription  }}</span></p>
              <p ng-if="proposal.proposalAttachment && proposal.proposalAttachment != ''">Attachment :<a target="_blank" href="<?php echo base_url(); ?>assets/proposal/{{ proposal.proposalAttachment}}">
                <i class="fa fa-download" aria-hidden="true"></i></a></p>
              <b>Total Amount :- {{ proposal.code }} {{ proposal.symbol }} {{  proposal.proposalBid   }} </b>

              <div ng-if="proposal.milestone" class="box-body">
                     <div class="table-responsive">
                   <table class="table table-bordered">
                       <thead>
                     <tr>
                       <th>Milestone</th>
                       <th>Task Name</th>
                       <th>Hours</th>
                       <th>Hourly Price</th>
                       <th>Amount</th>
                       </tr>
                   </thead>
                     <tbody ng-repeat="(key,x) in proposal.milestone" >
                       <tr  ng-if="x.task.length != 0" ng-repeat="(key2,x2) in x.task">
                         <td><span ng-if="$index == 0">{{ x.title }}</span></td>
                         <td>{{ x2.task  }}</td>
                         <td>{{ x2.hours  }} </td>
                         <td >{{ x2.hourlyPrice }}  </td>
                         <td >{{ proposal.code }} {{ proposal.symbol }} {{ x2.amount }}  </td>



                       </tr>
                     </tbody>
                   </table>

                 </div>
               </div>

				    </div>

            <!-- chat window -->
            <!-- activity -->
            <div ng-if="proposal.proposalStatus == 1" class="col-md-6">
                 <div class="activ-propsalchat">
                   <h4>Chat</h4>


              <div  scroll-glue-bottom="glued" class="activitytask1 mb-3">
                <div  ng-repeat="(key,x) in activitys"  class="Activity1">
                   <div class="taskmessage1">

                  <div><span class="pro-clientname">{{ x.name  }}</span> <span class=" pro-clientname task-time ">: {{ x.logDate | date  }} {{ x.logDate | time }}</span> </div>
                  <div>{{ x.logText }}</div>
                </div>
                </div>
              </div>
              <div class="form-group">
              <textarea placeholder="Please enter message" ng-enter="submitMessage(proposal.proposalId)" class="message form-control"></textarea>
              </div>
              <div class="form-group clearfix">
              <input type="button" ng-click="submitMessage(proposal.proposalId)" class="pull-right btn btn-success" name="send" value="Send">
             </div>
            </div>
                  </div>
            <!-- activity -->
            <!-- chat window -->
          </div>

				 </div>






             <div ng-repeat="proposal['milestone'].length != 0" class="box-body">
                    <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead>
                    <tr>
                      <th>Milestone</th>
                      <th>Task Name</th>
                      <th>Hours</th>
                      <th>Hourly Price</th>
                      <th>Amount</th>
                      </tr>
                  </thead>
                    <tbody ng-repeat="(key,x) in proposal['milestone']" >
                      <tr  ng-repeat="(key2,x2) in x.task">
                        <td>{{ x.title }}</td>
                        <td>{{ x2.task  }}</td>
                        <td>{{ x2.hours  }} </td>
                        <td >{{ x2.hourlyPrice }}  </td>
                        <td >{{ x2.amount }}  </td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>


				<!-- message -->
			 <div id="message" class="modal fade" role="dialog">
				 <div class="modal-dialog">
					 <div class="modal-content">
						 <div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal">&times;</button>
							 <h4 class="modal-title">Message</h4>
						 </div>
						 <div class="modal-body">
							 <div class="col-md-12">
								 <div class="form-group">
								 <label> Message </label>
								 <textarea class="form-control" placeholder="Please enter Message" ng-model="message"></textarea>
								 <p ng-show="submitm && message == ''" class="text-danger ng-hide">Message is required.</p>
							    </div>
							 </div>
						 </div>
						 <div class="modal-footer">
							 <button ng-click="freelancerContact()" type="button" class="btn btn-success">Submit</button>
						 </div>
					 </div>

				 </div>
			 </div>
				<!-- message -->

        <!-- milestone Active -->

       <div class="modal fade" id="milestoneActive" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title">Active Milestone</h4>
</div>
<div class="modal-body">
<p>Are you sure you want to Active Milestone ?</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button type="button" ng-click="ActiveMilestone(proposal.jobId,proposal.proposalId)" class="btn btn-success" id="confirm">Active</button>
</div>
</div>
</div>
</div>

        <!-- milestone Active -->
         <!-- offer modal -->
         <div id="hire" class="modal fade" role="dialog">
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
                 <input type="text"  id="amount"  ng-value="offerTotal" ng-model="offerTotal"  name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" value="">
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
            <!-- <a ng-if="key != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletemilestone(key)" class="fa fa-trash-alt"></i></a> -->

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
          <input readonly type="text" ng-keyup="totalmilestone()"  ng-value="x2.hourlyPrice" ng-model="x2.hourlyPrice" id="amount" numbers-only="numbers-only" placeholder="Please enter hourly price" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
          <p ng-show="offer && x2.hourlyPrice == ''" class="text-danger ng-hide">Hourly Price is required.</p>

        </div>
         </div>
      <div class="col-sm-6">
       <div class="form-group">
         <label>Task amount <span class="red-text">*</span></label>
         <input readonly type="text" ng-keyup="totalmilestone()"  ng-value="x2.amount" ng-model="x2.amount" id="amount" numbers-only="numbers-only" placeholder="Please enter amount" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
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


            <!-- modal accept -->
							<div id="accept" class="modal fade" role="dialog">
							<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title jtitle"></h4>
							</div>
							<div class="modal-body">
							<div>
							<input type="hidden" name="jobId" value="" class="jobId" >
							<input type="hidden" name="offerId" value="" class="offerId" >
							<input type="hidden" name="userId" value="" class="userId" >
							<input type="hidden" name="from" value="" class="from" >
							<input type="hidden" name="status" value="" class="status" >
							<label for="mobile">Message*</label>
							<textarea type="text"  ng-model="message1" class="message" class="form-control" id="message" name="message"></textarea>
							 <p ng-show="msgSubmit && message1 == ''" class="text-danger">message is required.</p>
							</div>

							</div>
							<div class="modal-footer">
							<button type="button" ng-click="offermessage1()" class="btn btn-success">submit</button>
							</div>
							</div>

							</div>
							</div>
						<!-- modal accept -->




							</div>

						</div>


</section>
</div>
