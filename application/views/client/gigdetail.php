<?php include('sidebar.php'); ?>
    <div id="wrapper" class="content-wrapper">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
                <li class="active">Gig Details</li>
            </ol>
        </section>
        <section class="content cstm_job buggigdetail">
                    <div ng-cloak class="box box-success p-3" ng-app="myApp17" ng-controller="myCtrt17">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="box-title mb-0">Gig Details</h3></div>
                                <div class="col-md-6 text-right"> <button ng-if="gig.status	!= 2"  ng-click="endcontract(gig.user_gig_buyId,gig.clientId)" class="btn btn-success mr-2">End Contract</button> <a href="<?php echo base_url(); ?>client-gig" class="btn btn-success">Back to Gigs</a></div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-7">
                            <div class="givereview" ng-if="gig.status == 2 && !gig.clientEnd && gig.todaydate < gig.reviewlastdate" >
        											 <div>
        											 Freelancer waiting for review   <a ng-click="endcontract(gig.user_gig_buyId,gig.clientId)" class="btn btn-info">review</a>
        											 </div>
        									 </div>

                        <div ng-if="gig" class="box-body job-offer-full p-3">
                          <div><b>Title:</b> {{ gig.title }}</div>
                            <div><b>Plan:</b> <span ng-if="gig.milestone[0].plan == 1">Basic</span><span ng-if="gig.milestone[0].plan == 2">Standard</span><span ng-if="gig.milestone[0].plan == 3">Premium</span></div>

                            <div ng-if="gig.description"><b>Description:</b><p class="gigdesc" ng-bind-html="gig.description|trustAsHtml"></p></div>
                            <div><b>Company:</b> {{ gig.company }}</div>
                            <div><b>Date:</b> {{ gig.date | date }}</div>
                            <div ><b>Price:</b>{{ gig.symbol }} {{ gig.codes }} {{ gig.milestone[0].amount }}</div>
                        </div>
                      </div>

                      <!-- activity -->

                      <!-- <div class="col-md-5">
                           <div class="activ">
                        <h4>Activity</h4>
                        <div scroll-glue-bottom="glued"  class="activitytask mb-3">
                          <div ng-if="activity.length != 0" ng-repeat="(key,x) in activity" ng-class="{ 'activity-right' : userId == x.userId ,'activity-left' : userId != x.userId }" class="Activity">
                             <div class="taskmessage">
                            <b>{{ x.name  }}</b>
                            <h6><span ng-bind-html="x.logText|trustAsHtml"></span><a ng-click="comment(x.logId)"><i class="fa fa-fw fa-commenting-o"></i></a></h6>
                            <p ng-if="x.logFile"><a target="_blank" href="<?php echo base_url(); ?>assets/task/{{ x.logFile }}"><i class="fa fa-download" aria-hidden="true"></i></a></p>
                            <p class="task-time mb-0">{{ x.logDate | date  }} {{ x.logDate | time }}</p>

                            <p class="commentdisplay" ng-if="x.comment.length != 0" ng-repeat="(key1,x2) in x.comment">
                              <span>{{ x2.logText | htmlToPlaintext }}</span><br>
                              <em class="comment-time">from :{{ x2.name }} {{ x2.logDate | date }} {{ x.logDate | time }}</em>
                            </p>
                          </div>
                              <div class="form-group">
                            <div style="display:none;height:50px;" class="form-control comment comment{{ x.logId }}" ></div>
                              </div>
                            <div style="display:none" class="mb-2 cbt cbtn{{ x.logId }}">
                              <button ng-click="submitcomment(x.logId)" class="btn btn-success">submit</button>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                        <textarea placeholder="Please enter message" ng-enter="submitMessage(task.taskId)" class="message form-control"></textarea>
                        <input class="form-control mt-2" type="file" onchange="angular.element(this).scope().Attachment(this)" name="file" id="taskfile">
                        </div>
                        <div class="form-group clearfix">
                        <input type="button" ng-click="submitMessage(gig.user_gig_buyId)" class="pull-right btn btn-success" name="send" value="Send">
                       </div>
                      </div>
                            </div> -->
                      <!-- activity -->


                    </div>

                    <!-- milestone table -->
                    <div ng-if="gig.milestone.length != 0" class="box-body">
                        <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead>
                        <tr>
                          <th>Plan</th>
                          <th>Task Name</th>
                          <th>Client Status</th>
                          <th width="300px">Paid Amount</th>


                        </tr>
                      </thead>
                        <tbody ng-repeat="(key,x) in gig.milestone" >
                          <tr  ng-repeat="(key2,x2) in x.task">
                            <td><span ng-if="$index == 0"> {{ x.name }}</span></td>
                            <td>{{ x2.name  }}</td>
                            <td>
                              <div class=" form-group">
                              <select onchange="angular.element(this).scope().changeclientStatus(this)" ng-model="x2.clientStatus" class="form-control">
                                <option  value="">Select Client Status</option>
                                <option data-id="{{ key }}" data-id1="{{ key2 }}"  value="1">Completed</option>
                                <option data-id="{{ key }}" data-id1="{{ key2 }}" value="2">Pending</option>
                              </select>
                            </div>
                            </td>
                            <td>
                              <div  ng-if="$index == 0"  class="form-group">
                              <input type="text" numbers-only="numbers-only" ng-keyup="receivedkeyup($event.target.value,x.id,gig.user_gig_buyId)" ng-value="x.receivedAmount" ng-model="x.receivedAmount" placeholder="Please enter paid amount" class="form-control">
                            </div>
                            </td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                    <!-- milestone table -->


                    <!-- contract end modal -->
                    <div id="contractend" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">End Contract</h4>

                    </div>
                    <div class="modal-body">
                      <h6>Gig Title : <span>{{ gig.title  }}</span></h6>

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
                     <textarea type="text"  ng-model="review"  class="form-control" id="review" name="message"></textarea>
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
                    </div>
        </section>
    </div>
