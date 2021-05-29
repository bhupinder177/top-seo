<?php
// if (!isset($this->session->userdata['clientloggedin']))
// {
// echo "<script> window.location.href='" . base_url() . "logout'</script>";
// }
// else
// {
// if ($this->session->userdata['clientloggedin']['role'] != 'freelancer') {
// echo "<script> window.location.href='" . base_url() . "logout'</script>";
// }

// }
?>

<div ng-cloak ng-app="myApp8" ng-controller="myCtrt8">

    <div class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                    <div class="job-title">
                        <h2>Job details</h2>
                    </div>
                    <div class="job-description">
                        <h1 ng-cloak><?php echo $result->jobTitle; ?></h1>
                        <div><?php echo $result->jobDescription; ?></div>
                        <hr>
                        <div ng-cloak ng-if="job.skill.length != 0" id="tags">
                            skills :-
                            <a href="<?php echo base_url(); ?>search={{ x.service | lowercase | underscoreless }}" ng-cloak ng-repeat="(key,x) in job.skill"> {{ x.service }}<span ng-if="key != (job.skill.length -1)">, </span></a>
                        </div>
                        <div class="budget-sec">
                            <span>Budget :  <?php echo  $result->currencycode.' '.$result->currencysymbol.' '.$result->jobBudget; ?></span>
                            <span>Proposals : <?php echo $result->proposal; ?></span>
                            <?php if(!empty($result->jobAttchment))
                            {
                              ?>
                            <span>Attachment : <a target="_blank" href="<?php echo base_url(); ?>assets/jobAttachment/<?php echo $result->jobAttchment; ?>"><?php echo $result->jobAttchment; ?></a></span>
                          <?php } ?>
                            <span>No. of Freelancers Required: <?php echo $result->jobRequiredFreelancer; ?></span>
                            <span ng-cloak>Hired : <?php echo $result->hirefreelancer; ?></span>
                        </div>
                        <?php
                     if(isset($this->session->userdata['clientloggedin']))
                     {
                  if($this->session->userdata['clientloggedin']['type'] == 2 || $this->session->userdata['clientloggedin']['type'] == 3)
                        {
                          ?>

                        <div ng-cloak ng-if="job.jobRequiredFreelancer != job.hirefreelancer && proposalCount == 0 && job.expired == 0"><a data-toggle="modal" data-target="#myModal" class="btn btn-success">Submit Proposal</a></div>
                        <div ng-cloak ng-if="job.expired == 1 && job.jobRequiredFreelancer == job.hirefreelancer" class="red-text">Job Expired</div>
                        <?php }
                           }  ?>
                           <div ng-if="proposalCount == 1 && job.expired == 0"><a class="btn btn-success">Proposal Submitted</a></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="right-detail">
                        <h3>Client details</h3>
                        <div class="right-side-info">

                            <p ng-cloak><span>Name :</span> <b><?php echo $client->name; ?></b></p>
                            <p ng-cloak><span>Country :</span> <b><?php echo $client->country; ?></b></p>
                            <p ng-cloak><span>Hired Projects:</span> <b><?php echo $client->project; ?></b></p>
                            <p ng-cloak><span>Review Score : </span><b ng-if="client.review">{{ client.review }} %</b><b ng-if="!client.review">N-A</b></p>
                            <p ng-cloak><span>Hire Rate : </span><b>{{ hiredRate }}%</b></p>
                            <p ng-cloak><span>Spent :</span> <b>$ <?php echo $client->spend; ?></b></p>
                            <?php if($client->payment == 1)
                                { ?>
                            <p class="payment_verified" >Payment Verified <i title="payment method verified" class="fa fa-check"></i></p>
                          <?php } else{ ?>
                            <p class="payment_unverified" >Payment Unverified <i title="payment method verified" class="fa fa-check"></i></p>
                          <?php } ?>
                            <p ng-cloak>Member Since : {{ client.date_created | date1 }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- review section -->
            <!-- proposal modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 ng-cloak class="modal-title">{{ job.jobTitle }}</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Est. Duration <span class="red-text">*</span></label>
                                <select type="text" id="title" ng-model="time" class="form-control time">
                                    <option value="">Select Time</option>
                                    <option value="1">Less than 1 week</option>
                                    <option value="2">Less than 1 month</option>
                                    <option value="3">1 to 3 month</option>
                                    <option value="4">4 to 6 Month</option>
                                </select>
                                <p ng-cloak ng-show="submitpro && time == ''" class="text-danger ng-hide">Duration is required.</p>
                            </div>

                            <div class="form-group">
                              <label>Project Type</label>
                              <input type="radio" name="type" ng-click="changetype(1)" checked value="1">Estimated Budget
                              <input type="radio" name="type" ng-click="changetype(2)" value="2">Create Milestone
                            </div>

                            <div class="form-group">
                              <label>Currency </label>
                              <input class="form-control" type="text" readonly  ng-model="currency" ng-value="currencycode">
                            </div>

                            <div ng-if="type == 2" class="form-group">
                              <label>Hourly Price <span class="red-text">*</span></label>
                              <input class="form-control"  numbers-only="numbers-only" ng-keyup="keyuphourly($event.target.value)" type="text" placeholder="Please enter hourly price"  ng-model="hourlyprice" ng-value="hourlyprice">
                              <p ng-show="submitpro && hourlyprice == ''" class="text-danger">Hourly price is required.</p>

                            </div>

                            <div ng-if="type == 1" class="form-group">
                                <label>Your Bid <span class="red-text">*</span></label>
                                <input  type="text" numbers-only="numbers-only" placeholder="Please enter your bid" id="bid" ng-model="bid" ng-value="bid" class="form-control title required ng-pristine ng-untouched ng-valid ng-empty" value="">
                                <p ng-show="submitpro && bid == ''" class="text-danger ng-hide">Your bid is required.</p>
                            </div>



                            <!-- <div class="form-group">
        <label>By Project</label>
        <input type="radio" name="" ng-model="project" >
      </div> -->
                            <div ng-if="type == 2" class="row">
                                <div class="col-md-12" style="margin: 10px 0">
                                    <a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="far fa-plus-square"></i></a>
                                </div>
                                <br>
                            </div>

                            <div ng-if="type == 2" style="margin-bottom:20px;" class=" milestone bdr-clr" ng-repeat="(key,x) in milestones">
                              <div class="milestone-form">


                                <div class="row bg-clr bg-nn">
                                        <div class="col-md-6">
                                            <div class="milnum">
                                                <p>{{ key + 1 }}</p>

                                            </div>
                                <div class="form-group">
                                    <input type="text" name='title{{$index}}' ng-required='true' class="form-control" ng-model="x.title" ng-value="x.title" id="email" placeholder="Please enter milestone title" name="title">
                                    <p ng-show="submitpro && x.title == ''" class="text-danger">Title is required.</p>

                                </div></div>
                                      <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" readonly numbers-only="numbers-only" ng-model="x.price" ng-value="x.price" class="numberonly form-control" id="pwd" placeholder="Please enter Amount" name="price">
                                    <!-- <p ng-show="submitpro && x.price == ''" class="text-danger">Amount is required.</p> -->
                                </div>

</div>
                                      <a ng-if="key != 0" hand class="delicon" class="pull-right"> <i ng-click="deletemilestone(key)" class="fa fa-times" aria-hidden="true"></i></a>
                                       </div>
                                  </div>

                                <div class="row bg-clr">
                                    <div class="col-md-12" style="margin: 10px 0">
                                        <a hand id="plusicon">Sub Tasks <i ng-click="taskadd(key)" class="far fa-plus-square"></i> </a>
                                    </div>
                                    <br>
                                </div>

                                   <div class="milestone-form">


                                <div class="row bg-clr" ng-repeat="(key2,x2) in x.task">
                                    <div class="col-md-6">
                                         <div class="milnum">
                                                <p>{{ key + 1 }}.{{ key2 + 1}}</p>
                                            </div>

                                        <div class="form-group">
                                            <input type="text" id="title" placeholder="Please enter task" ng-model="x2.task" ng-value="x2.task" class="form-control title required">
                                            <p ng-show="submitpro && x2.task == ''" class="text-danger">Task is required.</p>

                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group" >
                                            <input type="text"   numbers-only="numbers-only" ng-keyup="totalmilestone()"  id="title" placeholder="Please enter hours" ng-model="x2.hours" ng-value="x2.hours" class="form-control title required">
                                            <p ng-show="submitpro && x2.hours == ''" class="text-danger">Hours is required.</p>

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group" >
                                          <input type="text" readonly numbers-only="numbers-only" ng-keyup="totalmilestone()" id="title" placeholder="Please enter hourly price" ng-model="x2.hourlyPrice" ng-value="x2.hourlyPrice" class="form-control title required">
                                          <!-- <p ng-show="submitpro && x2.hourlyPrice == ''" class="text-danger">Hourly price is required.</p> -->
                                       </div>
                                     </div>
                                     <div class="col-md-6">
                                       <div class="form-group" >
                                           <input readonly type="text"   id="title" placeholder="Please enter price" ng-model="x2.amount" ng-value="x2.amount" class="form-control title required">
                                           <p ng-show="submitpro && x2.amount == ''" class="text-danger">Total amount is required.</p>
                                        </div>
                                      </div>
                                    <a ng-if="key2 != 0" hand class="delicon" class="pull-right"> <i ng-click="deletetask(key,key2)" class="fa fa-times" aria-hidden="true"></i></a>


                                </div>
                          </div>
                            </div>
                            <div ng-if="type == 2" class="form-group">
                                <label>Your Bid <span class="red-text">*</span></label>
                                <input readonly type="text" numbers-only="numbers-only" id="bid" ng-model="bid" ng-value="" class="form-control title required ng-pristine ng-untouched ng-valid ng-empty" value="">
                                <p ng-show="submitpro && cost == ''" class="text-danger ng-hide">Amount is required.</p>
                            </div>

                            <div class="form-group">
                                <label>Attachment</label>
                                <input type="file" id="file" onchange="angular.element(this).scope().uploadAttachment(this)" class="form-control title required ng-pristine ng-untouched ng-valid ng-empty" value="">
                                <a class="jobattachment" ng-if="attachment != ''" target="_blank" href="<?php echo base_url(); ?>assets/proposal/{{ attachment }}">{{ attachment }}</a>
                            </div>

                            <div class="form-group">
                                <label>Proposal <span class="red-text">*</span></label>
                                <textarea placeholder="Please enter proposal" type="text" id="proposal" name="proposal" ng-model="proposal" ng-value="proposal" placeholder="Proposal" class="form-control ckeditor title required ng-pristine ng-untouched ng-valid ng-empty" value=""></textarea>
                                <p  ng-cloak ng-show="submitpro &&  proposal == ''" class="text-danger ng-hide">proposal is required.</p>
                            </div>





                        </div>
                        <div class="modal-footer">
                            <button ng-click="submitproposal()" type="button" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </div>
            </div>


            <!-- proposal modal -->

            <div class="company-info-tab">
                <ul class="nav nav-tabs">

                    <li><a data-toggle="tab" href="#myjobs">Job History</a></li>
                </ul>
                <div class="tab-content">





                    <div id="myjobs" class="tab-pane fade in active">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li ng-class="{ 'active' : currents.length != 0 }" ng-if="currents.length != 0"><a data-toggle="tab" href="#current">Current Jobs</a></li>
                                <li ng-class="{ 'active' : currents.length == 0 && ended.length != 0 }" ng-if="ended.length != 0"><a data-toggle="tab" href="#ended">Completed Jobs</a></li>
                                <li ng-class="{ 'active' : currents.length == 0 && ended.length == 0  }" ng-if="openprojects.length != 0"><a data-toggle="tab" href="#open"> Open Jobs</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="current" ng-class="{ 'active' : currents.length != 0 }" ng-if="currents.length != 0" class="tab-pane fade-in ">

                                    <div ng-cloak ng-if="currents.length != 0" ng-repeat="(key,x) in currents" ng-init="currents = key" class="col-md-4 currentjobs">
                                        <div class="job-bx">
                                        <div class="jobtitle"><a href="<?php echo base_url(); ?>job/{{ x.jobTitle | replace: '/':'' | underscoreless | lowercase }}-{{ x.jobId }}">{{ x.jobTitle }} </a> - <span>Paid Amount {{ x.code }} {{ x.symbol }} {{ x.contractAmount }}</span></div>
                                        <div ng-cloak class="date">{{ x.contractDate | date1 }}</div>
                                        <div>Job in Progress</div>
                                    </div>
                                        </div>
                                    <div ng-if="currents.length == 0">
                                        <h3>No Record</h3>
                                    </div>
                                    <div ng-if="currents.length != 0" id="pagination"></div>

                                </div>
                                <div ng-class="{ 'active' : currents.length == 0 && ended.length != 0 }" id="ended" class="tab-pane fade-in">
                                    <div ng-if="ended.length != 0" ng-cloak ng-repeat="(key,x) in ended" ng-init="ended = key" class="col-md-4 endedjobs">
                                        <div class="jobtitle"><a href="<?php echo base_url(); ?>job/{{ x.jobTitle | replace: '/':'' | underscoreless | lowercase }}-{{ x.jobId }}">{{ x.jobTitle }}</a> - <span>Total Amount {{ x.code }} {{ x.symbol }} {{ x.contractAmount }}</span></div>
                                        <div ng-cloak class="rating">
                                            <span ng-class="{ 'fa-star' :  x.rating >= 2 ,'fa-star-half-o' :  x.rating >= 1 && x.rating < 2 , 'fa-star-o' : x.rating < 2 }" class="fa"></span>
                                            <span ng-class="{ 'fa-star' :  x.rating >= 4 ,'fa-star-half-o' :  x.rating >= 3 && x.rating < 4 , 'fa-star-o' : x.rating < 4 }" class="fa"></span>
                                            <span ng-class="{ 'fa-star' :  x.rating >= 6 ,'fa-star-half-o' :  x.rating >= 5 && x.rating < 6 , 'fa-star-o' : x.rating < 6 }" class="fa"></span>
                                            <span ng-class="{ 'fa-star' :  x.rating >= 8 ,'fa-star-half-o' :  x.rating >= 7 && x.rating < 9 , 'fa-star-o' : x.rating < 8 }" class="fa"></span>
                                            <span ng-class="{ 'fa-star' :  x.rating >= 10 ,'fa-star-half-o' :  x.rating >= 9 && x.rating < 10 , 'fa-star-o' : x.rating < 10 }" class="fa"></span>
                                            {{ x.rating / 2 }}
                                        </div>
                                        <div ng-cloak class="feedback">{{ x.feedback }}</div>
                                        <div ng-cloak class="date">{{ x.contractDate | date1 }} - {{ x.contractEndDate | date1 }}</div>
                                    </div>
                                    <div ng-if="ended.length == 0">No record</div>
                                    <div ng-if="ended.length != 0" id="endedpagination"></div>
                                </div>
                                <!-- open jobs -->
                                <div ng-class="{ 'active' : currents.length == 0 && ended.length == 0 && openprojects.length != 0 }" id="open" class="tab-pane fade-in">

                                    <div ng-cloak ng-if="openprojects.length != 0" ng-repeat="(key,x) in openprojects" ng-init="currents = key" class="col-md-4 currentjobs">
                                            <div class="job-bx">
                                        <?php if (isset($this->session->userdata['clientloggedin']))
                           {
                             ?>
                                        <div class="jobtitle"><a href="<?php echo base_url(); ?>job/{{ x.jobTitle | replace: '/':'' | underscoreless | lowercase }}-{{ x.jobId }}">{{ x.jobTitle }} </a> - <span>Amount {{ x.jobBudget }}</span></div>
                                        <?php }
                             else
                                {
                                    ?>

                                        <div class="jobtitle">{{ x.jobTitle }} - <span>Amount :{{ x.code }} {{ x.symbol }} {{ x.jobBudget }}</span></div>

                                        <?php } ?>

                                        <div class="date">{{ x.jobDate | date1 }}</div>

                                    </div>
                                    <div ng-if="openprojects.length == 0">
                                        <h3>No Record</h3>
                                    </div>
                                    <div ng-if="currents.length != 0" id="pagination"></div>

                                </div>
                                <!-- open jobs -->
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- review section -->



    </div>
</div>









<!--
////////////////////////// -->
