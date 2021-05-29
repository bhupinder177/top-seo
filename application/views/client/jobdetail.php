<?php include('sidebar.php'); ?>
    <div id="wrapper" class="content-wrapper">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
                <li class="active">Job Details</li>
            </ol>
        </section>
        <section class="content cstm_job">
                    <div ng-cloak class="box-success" ng-app="myApp8" ng-controller="myCtrt8">
                        <div class="bg-white box-header with-border p-3">
                            <div class="row">
                                <div class="col-md-6">
                                  </div>
                                <div class="col-md-6 text-right"> <a href="<?php echo base_url(); ?>client-job" class="btn btn-success">Back to Jobs</a></div>
                            </div>
                        </div>
                        <div ng-if="job.length != 0" class="box-body job-offer-full p-3 bg-white mt-3">
                            <h3 class="title-job">{{ job.jobTitle }}</h3>
                            <p ng-bind-html="job.jobDescription|trustAsHtml"></p>
                            <p ng-if="job.jobAttchment && job.jobAttchment != ''">Attachment :
                                <a target="_blank" href="<?php echo base_url(); ?>assets/jobAttachment/{{ job.jobAttchment}}"> <i class="fa fa-download" aria-hidden="true"></i> Download attachment</a>
                            </p>
                            <div class="jobdetail">
                              <table class="table table-striped">
								<thead>
								<tr class="fnt">
								<th class="head">Industries</th>
								<th class="head">Services</th>
								<th class="head">Skills & Expertise</th>
								</tr>
								</thead>
								<tr class="item">
								  <td><span ng-repeat="(key,x2) in job.industry"> {{ x2.industry }}<span ng-if="key != (job.industry.length -1)">, </span></span></td>
								  <td> {{ job.services }}</td>
								  <td><span ng-repeat="(key,x) in job.skills"> {{ x.service }}<span ng-if="key != (job.skills.length -1)">, </span></span></td>
								</tr>
								<tr class="fnt">
								  <td>Freelancers Required</td>
								  <td>Estimated Hours</td>
								  <td>Hourly Price</td>
								</tr>
								<tr>
								  <td>{{ job.jobRequiredFreelancer }}</td>
								  <td>{{ job.jobEstimateHours }}</td>
								  <td>{{ job.jobEstimateHourlyPrice }}</td>
								</tr>
								<tr class="fnt">
								  <td>Amount</td>
								  <td>Created On</td>
								  <td>Expired On</td>
								</tr>
								<tr class="item">
								  <td> {{ job.currencycode }} {{ job.currencysymbol }} {{ job.jobBudget }} </td>
								  <td>{{ job.jobDate | date }} </td>
								  <td>{{ job.jobExpire | date }}</td>
								</tr>
							   </table>
								</div>
                            <h6 ng-if="job.milestone.length != 0">Milestone</h6>
                            <div ng-repeat="(key,x) in job['milestone']" ng-init="job = key">
                                <p># {{ x.milestoneTitle }}</p>
                                <p><b>Amount :- {{ x.milestoneAmount }}</b></p>
                                <h6><b>Task</b></h6>
                                <div ng-repeat="(key2,x2) in x.task">
                                    <p>#{{ x2.taskTitle }}</p>
                                    <p>Task Hours : {{ x2.taskHours }}</p>
                                    <p>Task hourly price : {{ x2.taskHourlyPrice }}</p>
                                    <p>Task Amount : {{ x2.taskPrice }}</p>
                                </div>
                                <hr>
                            </div>
                            <div id="accept" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title jtitle"></h4></div>
                                        <div class="modal-body">
                                            <div>
                                                <input type="hidden" name="jobId" value="" class="jobId">
                                                <input type="hidden" name="offerId" value="" class="offerId">
                                                <input type="hidden" name="userId" value="" class="userId">
                                                <input type="hidden" name="from" value="" class="from">
                                                <input type="hidden" name="status" value="" class="status">
                                                <label for="mobile">Message*</label>
                                                <textarea type="text" ng-model="message1" class="message" class="form-control" id="message" name="message"></textarea>
                                                <p ng-show="msgSubmit && message1 == ''" class="text-danger">message is required.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" ng-click="offermessage1()" class="btn btn-success">submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
