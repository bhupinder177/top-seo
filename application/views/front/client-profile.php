<div ng-cloak ng-app="myApp7" ng-controller="myCtrt7">

<div class="profile-section" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-4">
                <div class="left-side-info">
                    <ul>
                        <li>
                        <a href="" ng-if="profile.logo">
                         <img width="100" height="100" src="<?php echo base_url(); ?>assets/client_images/{{ profile.company_logo }}"/>
                         </a>
                      </li>
                        <li>{{ profile.c_name }}<a href="#"></a> </li>
                         <li>{{ profile.name }}<b>{{ profile.desig }}</b> </li>
                         <li>{{ profile.address1 }}</li>
                         <li>{{ profile.address2 }},{{ profile.zip }} </li>
                         <li class="payment-verified"><p ng-if="profile.payment" >Payment verified <i title="payment method verified" class="fa fa-check"></i></p></li>
                         <li class="payment-unverified"><p ng-if="!profile.payment" >Payment unverified <i title="payment method verified" class="fa fa-check"></i></p></li>
                     </ul>

                </div>
            </div>
            <div class="col-lg-9 col-sm-8">
                <div class="right-side-info">
                    <ul>
                        <li>
                            <div class="user-bx">
                                <h1>Hired Freelancer</h1>
                                <p><a ng-if="x.type == 3" href="<?php echo base_url(); ?>{{ x.name | underscoreless | lowercase }}-{{ x.u_id }}" ng-repeat="(key,x) in freelancer">{{ x.name }}<span ng-if="key != (freelancer.length -1)">, </span></a>
                                  <a ng-if="x.type == 2" href="<?php echo base_url(); ?>{{ x.c_name | underscoreless | lowercase }}-{{ x.u_id }}" ng-repeat="(key,x) in freelancer">{{ x.name }}<span ng-if="key != (freelancer.length -1)">, </span></a>
                                 </p>
                            </div>
                        </li>
                        <li>
                            <div class="user-bx">
                                <h1>No of Projects</h1>
                                <p>{{ activeproject.length }} </p>
                            </div>
                        </li>
                        <li>
                            <div class="user-bx">
                                <h1>Review Score</h1>
                                <p>{{ successscore.score }} %</p>


                            </div>
                        </li>
                        <li>
                            <div class="user-bx">
                                <h1>Industries</h1>
                                <p><a ng-repeat="(key,x) in industry" >{{ x.industry }}<span ng-if="key != (industry.length -1)">, </span></a> </p>
                            </div>
                        </li>
                        <li>
                            <div class="user-bx">
                                <h1>Skills</h1>
                                <p> <a href="<?php echo base_url(); ?>best-{{ x.name | lowercase | underscoreless }}-companies" ng-repeat="(key,x) in services" >{{ x.name }}<span ng-if="key != (services.length -1)">, </span></a> </p>
                            </div>
                        </li>
                        <li>
                            <div class="user-bx">
                                <h1>Pricing</h1>
                                <p>$ {{ profile.minPrice }} - {{ profile.maxPrice }} per hour </p>
                            </div>
                        </li>
                        <li>
                            <div class="user-bx">
                                <h1>Year Founded</h1>
                                <p>{{ profile.year }} </p>
                            </div>
                        </li>
                        <li>
                            <div class="user-bx">
                                <h1> Spend</h1>
                                <p>{{ successscore.totalearning }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="user-bx">
                                <h1>Hire Rate </h1>
                                <p> </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="company-info-tab">
            <ul class="nav nav-tabs">

                <li><a data-toggle="tab" href="#myjobs">My Jobs</a></li>
            </ul>
            <div class="tab-content">





                <div id="myjobs" class="tab-pane fade in active">

                      <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#current">Current Jobs</a></li>
                          <li><a data-toggle="tab" href="#ended">Completed Jobs</a></li>
                          <li><a data-toggle="tab" href="#open">Open Jobs</a></li>

                      </ul>
                        <div class="tab-content">
                      <div id="current" class="tab-pane fade-in active">

                         <div ng-if="currents.length != 0" ng-repeat="(key,x) in currents" ng-init="currents = key" class="col-md-3 currentjobs">
                             <div class="job-bx">
                           <?php if (isset($this->session->userdata['clientloggedin']))
                           {
                             ?>
                        <div class="jobtitle"><a href="<?php echo base_url(); ?>job/{{ x.jobTitle | underscoreless | lowercase }}-{{ x.jobId }}">{{ x.jobTitle }} </a>  <span>Paid Amount {{ x.jobAmount }}</span></div>
                      <?php }
                              else { ?>
                                <div class="jobtitle">{{ x.jobTitle }}- <span>Paid Amount {{ x.jobAmount }}</span></div>

                              <?php } ?>
                        <div class="date">{{ x.contractDate | date }}</div>
                        <span class="job-progress">Job in progress</span>
                         </div>
                         <div ng-if="currents.length == 0">
                           <h3>No Record</h3>
                         </div>
                         <div ng-if="currents.length != 0"  id="pagination"></div>
</div>
                      </div>
                      <div id="ended" class="tab-pane fade-in">
                        <div ng-repeat="(key,x) in ended" ng-init="ended = key" class="col-md-3 endedjobs">
                          <?php if (isset($this->session->userdata['clientloggedin']))
                          {
                            ?>
                       <div class="jobtitle"><a href="<?php echo base_url(); ?>job/{{ x.jobTitle | underscoreless | lowercase }}-{{ x.jobId }}">{{ x.jobTitle }}</a>   <span>Total Amount {{ x.jobAmount }}</span></div>

                     <?php }
                            else
                            {
                             ?>
                             <div class="jobtitle">{{ x.jobTitle }}  - <span>Total Amount {{ x.jobAmount }}</span></div>

                       <?php
                             }
                             ?>
                       <div class="rating">
          <span ng-class="{ 'fa-star' :  x.rating >= 2 ,'fa-star-half-o' :  x.rating > 1 && x.rating < 1 , 'fa-star-o' : x.rating < 2 }"  class="fa"></span>
          <span ng-class="{ 'fa-star' :  x.rating >= 4 ,'fa-star-half-o' :  x.rating > 3 && x.rating < 3 , 'fa-star-o' : x.rating < 4 }"  class="fa"></span>
          <span ng-class="{ 'fa-star' :  x.rating >= 6 ,'fa-star-half-o' :  x.rating > 5 && x.rating < 5 , 'fa-star-o' : x.rating < 6 }"  class="fa"></span>
          <span ng-class="{ 'fa-star' :  x.rating >= 8 ,'fa-star-half-o' :  x.rating > 7 && x.rating < 7 , 'fa-star-o' : x.rating < 8 }"  class="fa"></span>
          <span ng-class="{ 'fa-star' :  x.rating >= 10 ,'fa-star-half-o' :  x.rating > 9 && x.rating < 9 , 'fa-star-o' : x.rating < 10 }"  class="fa"></span>
                      {{ x.rating }}
                      </div>
                       <div class="feedback">{{ x.feedback }}</div>
                       <div class="date">{{ x.contractDate | date }} - {{ x.contractEndDate | date }}</div>

                        </div>
                        <div ng-if="ended.length != 0" id="endedpagination"></div>
                      </div>

                      <div id="open" class="tab-pane fade-in">

                         <div ng-if="openprojects.length != 0" ng-repeat="(key,x) in openprojects" ng-init="currents = key" class="col-md-3 currentjobs">
                                <div class="job-bx">
                           <?php if (isset($this->session->userdata['clientloggedin']))
                           {
                             ?>
                        <div class="jobtitle"><a href="<?php echo base_url(); ?>job/{{ x.jobTitle | underscoreless | lowercase }}-{{ x.jobId }}">{{ x.jobTitle }} </a> <span>Amount {{ x.jobAmount }}</span></div>
                      <?php }
                             else
                                {
                                    ?>
                      <div class="jobtitle">{{ x.jobTitle }}   <span>Amount {{ x.jobAmount }}</span></div>

                                  <?php } ?>

                        <div class="date">{{ x.jobDate | date }}</div>

                         </div>
                         <div ng-if="openprojects.length == 0">
                           <h3>No Record</h3>
                         </div>
                         <div ng-if="currents.length != 0"  id="pagination"></div>
  </div>
                      </div>



                    </div>


              </div>

            </div>
        </div>

    </div>
</div>









</div>

<!--
////////////////////////// -->
