<?php
// echo "<pre>";
// print_r($profile);
// die;
?>
<div ng-cloak ng-app="myApp3" ng-controller="myCtrt3">

  <div class="profile-section" >
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-side-info">
            <ul>
              <li>
                <?php
                if($profile->type == 2 )
                {
                  if($profile->company_logo != '')
                  {

                    ?>
                    <!-- <a href="" > -->
                      <img    src="<?php echo base_url(); ?>assets/client_images/<?php echo $profile->company_logo; ?>"/>
                    <!-- </a> -->
                  <?php }
                  else {
                    ?>
                    <!-- <a href="" > -->
                      <img   src="<?php echo base_url(); ?>assets/client_images/noimage.jpg"/>
                    <!-- </a> -->
                    <?php
                  }
                }
                else if($profile->type == 3)
                {
                  if($profile->logo != '')
                  {
                    ?>
                    <a href="" >
                      <img     src="<?php echo base_url(); ?>assets/client_images/<?php echo $profile->logo; ?>"/>
                    </a>
                  <?php }
                  else {
                    ?>
                    <a href="" >
                      <img    src="<?php echo base_url(); ?>assets/client_images/noimage.jpg"/>
                    </a>
                  <?php }
                }
                ?>
              </li>
              <li><?php echo $profile->c_name; ?> <a href="#">
                <b><?php echo $profile->website; ?> </b></a></li>
                <li ><?php echo $profile->name; ?><b><?php echo $profile->desig; ?></b> </li>

                <li >
                  <?php echo $profile->address1; ?>
                  <?php echo $profile->address2; ?>, <?php echo $profile->zip; ?> </li>
                  <li class="hire-sec">
                    <span >
                      <?php if($profile->online == 1)
                      {
                        ?>
                        <i  class="online fas fa-circle"></i>
                      <?php }
                      else if($profile->online == 0)
                      {
                        ?>
                        <i  class="offline fas fa-circle"></i>
                        <?php
                      }
                      if (isset($this->session->userdata['clientloggedin']))
                      {
                        if($this->session->userdata['clientloggedin']['type'] == 4)
                        {
                          ?>
                          <a  ng-click="checkcontact('<?php echo $profile->u_id; ?>','<?php echo $profile->name; ?>','<?php echo $profile->logo; ?>')">Chat</a>
                          <?php
                        }

                      }
                      else
                      {
                        ?>
                        <a  href="<?php echo base_url(); ?>login">Chat</a>
                        <?php
                      }
                      ?>

                    </span>
                    <span >
                      <?php
                      if (isset($this->session->userdata['clientloggedin']))
                      {
                        if($this->session->userdata['clientloggedin']['type'] == 4)
                        {
                          ?>
                          <a  data-toggle="modal" data-target="#myJob" >Hire me</a>
                        <?php } }
                        else {
                          ?>
                          <a  href="<?php echo base_url(); ?>login" >Hire me</a>
                          <?php
                        }
                        ?>
                      </span>
                    </li>

                    <li class="social-icon">
                      <div class="socials">

                        <?php
                        if($profile->facebookLink != '')
                        {
                          ?>
                          <a  target="_blank" href="<?php echo  $profile->facebookLink;  ?>" ><i class="fab fa-facebook-square"></i></a>
                        <?php }
                        if($profile->linkedlnLink != '')
                        {
                          ?>
                          <a  target="_blank" href="<?php echo $profile->linkedlnLink; ?>" ><i class="fab fa-linkedin"></i></a>
                        <?php }
                        if($profile->instagramLink  != '')
                        {
                          ?>
                          <a  target="_blank" href="<?php echo $profile->instagramLink; ?>" ><i class="fab fa-instagram"></i></a>
                        <?php }
                        if($profile->pinterestLink != '')
                        {
                          ?>
                          <a  target="_blank" href="<?php echo $profile->pinterestLink; ?>" ><i class="fab fa-pinterest"></i></a>
                        <?php }
                        if($profile->twitterLink  != '')
                        {
                          ?>
                          <a  target="_blank" href="<?php echo $profile->twitterLink; ?>" ><i class="fab fa-twitter"></i></a>
                        <?php  }
                        if($profile->youtubeLink   != '')
                        {
                          ?>
                          <a  target="_blank" href="<?php echo $profile->youtubeLink; ?>" ><i class="fab fa-youtube"></i></a>
                        <?php } ?>

                        <!-- <a target="_blank" href="{{ profile.facebookLink  }}" ><i class="fab fa-twitter"></i></a> -->

                      </div>
                    </li>
                  </ul>

                </div>
              </div>
              <div class="col-sm-9">
                <div class="right-side-info">
                  <ul>
                    <li>
                      <div class="user-bx">
                        <h1>Major Clients</h1>
                        <p ng-cloak ng-if="client.length != 0"><a href="<?php echo base_url(); ?>clientprofile/{{  x.c_name | underscoreless | lowercase }}-{{ x.u_id }}" ng-repeat="(key,x) in client">{{ x.name }}<span ng-if="key != (client.length -1)">, </span></a>  </p>
                        <p ng-cloak ng-if="client.length == 0">N-A</p>

                      </div>
                    </li>
                    <li>
                      <div class="user-bx">
                        <h1>Active Clients</h1>
                        <p ng-cloak>{{ client.length }} </p>
                      </div>
                    </li>
                    <li>
                      <div class="user-bx">
                        <h1>Job Success Score</h1>
                        <p ng-cloak ng-if="successscore.score">{{ successscore.score }}%</p>
                        <p ng-cloak ng-if="!successscore.score">N-A</p>

                        <p ng-cloak ng-if="successscore.score >= 90 && successscore.totalearning >= 500 && successscore.jobcount >= 3">
                          <img ng-cloak src="<?php echo base_url(); ?>assets/front/images/top-rated.png">
                          <span>Top Rated</span>
                        </p>

                      </div>
                    </li>
                    <li>
                      <div class="user-bx">
                        <h1>Industries</h1>
                        <p> <?php
                        if(!empty($profile->industry))
                        {
                          foreach($profile->industry as $key=>$ind)
                          {
                            ?>
                            <a ><?php echo  $ind->industry; ?><?php if($key != (count($profile->industry) - 1)) { ?><span>,</span><?php } ?></a>
                          <?php } } ?>
                        </p>
                      </div>
                    </li>
                    <li>
                      <div class="user-bx">
                        <h1>Services</h1>
                        <p> <?php
                        if(!empty($profile->services))
                        {
                          foreach($profile->services as $key=>$ser)
                          {
                            if($ser->link != '')
                            {
                              ?>
                              <a href="<?php echo base_url(); ?>hire/<?php echo str_replace(' ', '-',strtolower($ser->link)); ?>" ><?php echo  $ser->name; ?><?php if($key != (count($profile->services) - 1)) { ?><span>,</span><?php } ?></a>
                            <?php }
                            else{
                              ?>
                              <a href="<?php echo base_url(); ?>hire/<?php echo str_replace(' ', '-',strtolower($ser->name)); ?>" ><?php echo  $ser->name; ?><?php if($key != (count($profile->services) - 1)) { ?><span>,</span><?php } ?></a>

                              <?php
                            }
                          }
                        }
                        ?>
                      </p>

                    </div>
                  </li>
                  <li>
                    <div class="user-bx">
                      <h1>Pricing</h1>
                      <?php if($profile->type == 2)
                      {
                        ?>
                        <p  ><?php if(!empty($currency)){ echo $currency->code.' '.$currency->symbol; } ?>  <?php echo $profile->minPrice; ?> - <?php echo $profile->maxPrice; ?>  per hour </p>
                      <?php }
                      else if($profile->type == 3)
                      {
                        ?>
                        <p ><?php if(!empty($currency)){ echo $currency->code.' '.$currency->symbol; } ?> <?php  echo $profile->maxPrice; ?> per hour </p>
                      <?php } ?>
                    </div>
                  </li>
                  <li>
                    <div class="user-bx">
                      <h1>Year Founded</h1>
                      <p><?php echo $profile->year; ?></p>
                    </div>
                  </li>
                  <li>
                    <div class="user-bx">
                      <h1> Employees</h1>
                      <p ng-cloak>{{ team.length }}</p>
                    </div>
                  </li>
                  <li>
                    <div class="user-bx">
                      <h1>Total Earning </h1>
                      <p ng-cloak ng-if="earning"> {{ earning }}</p>
                      <p ng-cloak ng-if="!earning">0</p>

                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="contact-info-sec">
            <ul>
              <li class="talk">
                <?php if(!empty($profile->countryCode)){ $code =  explode(":",$profile->countryCode); } ?>
                  <a href="tel:<?php if(!empty($code[1])){ echo $code[1]; }?><?php echo $profile->rep_ph_num; ?>">
                    Talk to representative
                    <span><?php if(!empty($code)){ echo $code[1]; }?><?php echo $profile->rep_ph_num; ?></span>
                  </a>
                </li>
                <li>
                  <a  data-toggle="modal" data-target="#Requestquote" href="#"><i class="far fa-newspaper"></i> Request a Quote</a>
                </li>
                <li>
                  <a  data-toggle="modal" data-target="#Schedule" href="#"><i class="far fa-calendar-alt"></i> Schedule a Visit</a>
                </li>
                <li>
                  <a data-toggle="modal" data-target="#RequestCall" href="#"><i class="fas fa-phone"></i> Request a Call</a>
                </li>
              </ul>
            </div>
            <div class="company-info-tab">
              <ul class="nav nav-tabs">
                <li ng-cloak class="active"><a data-toggle="tab" href="#Company">Company Info</a></li>
                <li ng-cloak ng-if="services.length != 0"><a data-toggle="tab" href="#Services">Services </a></li>
                <li  ng-cloak ng-if="pricing.length != 0"><a data-toggle="tab" href="#Pricing">Pricing</a></li>
                <li ng-cloak ng-if="team.length != 0" ><a  data-toggle="tab" href="#Team">Team</a></li>
                <li ng-cloak ng-if="portfolio.length != 0"><a data-toggle="tab" href="#Portfolio">Portfolio</a></li>
                <li ng-cloak ng-if="testimonial.length != 0"><a data-toggle="tab" href="#Testimonials">Testimonials</a></li>
                <li ng-cloak ng-if="case.length != 0"><a data-toggle="tab" href="#Case">Case Studies</a></li>
                <li ng-cloak><a data-toggle="tab" href="#myjobs">My Jobs</a></li>

                <li ng-cloak ><a data-toggle="tab" href="#Reviews">Reviews</a></li>
                <li ng-if="plan.packageRanking == 1 " ng-cloak><a data-toggle="tab" href="#Rank">Rank</a></li>

                <li ng-cloak ng-if="competitors.length != 0"><a data-toggle="tab" href="#Competitors">Competitors &amp; Ratings</a></li>
                <!-- dd -->


              </ul>
              <div class="tab-content">
                <div id="Company" class="tab-pane fade in active">
                  <!-- <h3>Lorem Ipsum is simply dummy text of the printing </h3> -->
                  <h2>About us:</h2>
                  <div class="clearfix"></div>
                  <p ><?php echo $profile->about; ?> </p>
                  <h2 ng-cloak ng-if="keypeople.length != 0">Key People</h2>
                  <div class="clearfix"></div>


                  <!-- <div ng-cloak ng-if="keypeople.length != 0" ng-repeat="(key,x) in keypeople" ng-init="keypeople = key" class="box-1 col-md-4">
                    <div class="pic-box">
                      <img height="100" width="100" src="<?php echo base_url(); ?>assets/client_images/{{ x.logo }}" class="lazyloading" data-was-processed="true"></div>
                      <div class="pic-info"> <span class="name-title">{{ x.name  }}</span>
                        <span class="sub-name">{{ x.service }}</span>
                        <a ng-if="x.online == 1"  class="mod-contact-exec cboxElement"  >Message</a>
                        <a ng-if="x.online == 0" ng-click="contactEmployee(x.name)" class="mod-contact-exec cboxElement"  > Contact This Executive </a>
                        <?php
                        if (isset($this->session->userdata['clientloggedin']))
                        {
                          if($this->session->userdata['clientloggedin']['type'] == 4)
                          {
                            ?>
                            <a class="hireme" data-toggle="modal" data-target="#myJob">Hire me </a>
                            <?php
                          }
                        }
                        else
                        {
                          ?>
                          <a class="hireme" href="<?php echo base_url(); ?>login">Hire me </a>

                          <?php
                        }
                        ?>
                      </div>
                      <div class="clear">&nbsp;</div>
                    </div> -->

                    <div  class="col-md-4" ng-cloak ng-if="keypeople.length != 0" ng-repeat="(key,x) in keypeople"  class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                      <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                          {{ x.desig }}
                        </div>
                        <div class="card-body pt-0">
                          <div class="row">
                            <div class="col-md-7">
                              <h2 class="lead"><a ng-click="teamProfile(x.u_id)"><b>{{ x.name }}</b></a></h2>
                              <div class="text-muted text-sm"><b>About: </b>
                                <span>
                                {{ x.service }}
                            </span>
                              </div>
                              <!-- <ul class="ml-4 mb-0 fa-ul text-muted">
                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                            </ul> -->
                          </div>
                          <div class="col-md-5 text-center">
                            <img width="100" height="100" src="<?php echo base_url(); ?>assets/client_images/{{ x.logo }}" alt="profile" class="img-circle img-fluid">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="text-right">
                          <a ng-click="contactEmployee(x.name)" class="btn btn-sm bg-teal">
                            <i class="fas fa-comments"></i>
                          </a>
                          <a ng-click="teamProfile(x.u_id)" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> View Profile
                          </a>
                        </div>
                      </div>
                    </div>
                    </div>




                  </div>

                  <div id="Reviews" class="tab-pane fade in">

                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Addreview">Add Review</button>
                    <!-- add review modal -->

                    <div id="Addreview" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <!-- fields -->

                            <div class="review-form">

                              <form id="reviewForm" >




                                <fieldset ng-if="step == 1">
                                  <div class="popup-title">
                                    <h1>Client Details</h1>
                                  </div>


                                  <div class="row">

                                    <div class="form-group col-sm-6">

                                      <label for="rev_title">Full Name</label>

                                      <input type="text"  id="fullname" ng-model="reviewform.fullname" ng-value="reviewform.fullname" class="form-control rounded-0" placeholder="Please enter full name"  />
                                      <p ng-show="submitr && reviewform.fullname == ''" class="text-danger">Full name is required.</p>

                                    </div>

                                    <div class="form-group col-sm-6">

                                      <label for="rev_web">Company name</label>

                                      <input type="text" ng-model="reviewform.company" ng-value="reviewform.company" name="company" id="company" class="form-control rounded-0" placeholder="Please enter company name"  />
                                      <p ng-show="submitr && reviewform.company == ''" class="text-danger">Company is required.</p>

                                    </div>



                                  </div>

                                </fieldset>

                                <fieldset ng-if="step == 1">

                                  <div class="row">
                                    <div class="form-group col-sm-6">

                                      <label for="rev_name">Email</label>

                                      <input type="test" ng-model="reviewform.email" ng-value="reviewform.email" name="email" id="email" class="form-control rounded-0" placeholder="Please enter email address"  />
                                      <p ng-show="submitr && reviewform.email == ''" class="text-danger">Email is required.</p>

                                    </div>
                                    <div class="form-group col-sm-6">

                                      <label for="rev_title">Skype</label>

                                      <input type="text" ng-model="reviewform.skype" ng-value="reviewform.skype" name="skype" id="skype" class="form-control rounded-0" placeholder="Please enter skype"  />
                                      <p ng-show="submitr && reviewform.skype == ''" class="text-danger">Skype is required.</p>


                                    </div>

                                    <div class="form-group col-sm-6">

                                      <label for="rev_web">Phone</label>

                                      <input numbers-only="numbers-only" type="text" name="phone" ng-model="reviewform.phone" ng-value="reviewform.phone" id="phone" class="form-control rounded-0" placeholder="Please enter phone"  />
                                      <p ng-show="submitr && reviewform.phone == ''" class="text-danger">Phone is required.</p>

                                    </div>

                                    <div class="form-group col-sm-6">

                                      <label for="rev_name">Website</label>

                                      <input type="test" ng-value="reviewform.website" ng-model="reviewform.website" name="website" id="website" class="form-control rounded-0" placeholder="Please enter website"  />
                                      <p ng-show="submitr && reviewform.website == ''" class="text-danger">Website is required.</p>

                                    </div>

                                  </div>


                                </fieldset>

                                <fieldset ng-if="step == 1">

                                  <div class="row">

                                    <div class="form-group col-sm-4">

                                      <label for="rev_loc">Country</label>

                                      <select onchange="angular.element(this).scope().getstate(this)" ng-model="reviewform.country" class="form-control custom-select review_country rounded-0 w-100" name="rev_loc" id="rev_loc" >

                                        <option value="">Select Country</option>
                                        <option ng-if="country1.length != 0" ng-repeat="(key,x) in country1"  value="{{ x.id }}">{{ x.name }}</option>

                                      </select>
                                      <p ng-show="submitr && reviewform.country == ''" class="text-danger">Country is required.</p>

                                    </div>

                                    <div class="form-group col-sm-4">

                                      <label for="rev_loc">State</label>

                                      <select onchange="angular.element(this).scope().getcity(this)" ng-model="reviewform.state" class="custom-select review_state form-control rounded-0 w-100" name="rev_loc" id="rev_loc"  >

                                        <option value="">Select State</option>
                                        <option ng-if="st.length != 0" ng-repeat="(key,x) in st" ng-init="st = key"  value="{{ x.id }}">{{ x.name }} </option>


                                      </select>
                                      <p ng-show="submitr && reviewform.state == ''" class="text-danger">State is required.</p>


                                    </div>

                                    <div class="form-group col-sm-4">

                                      <label for="rev_loc">City</label>

                                      <select ng-model="reviewform.city" class="review_city form-control custom-select rounded-0 w-100" name="rev_loc" id="rev_loc"  >

                                        <option value="">Select City</option>
                                        <option ng-if="ci.length != 0" ng-repeat="(key,x) in ci" ng-init="ci = key" value="{{ x.id }}">{{ x.name }} </option>



                                      </select>
                                      <p ng-show="submitr && reviewform.city == ''" class="text-danger">City is required.</p>


                                    </div>

                                  </div>
                                </fieldset>

                                <fieldset ng-if="step == 1" >

                                  <div class="row">

                                    <div class="form-group col-sm-12">

                                      <label for="rev_title">Company Address</label>

                                      <textarea type="text" ng-value="reviewform.companyaddress" ng-model="reviewform.companyaddress" name="companyaddress" id="companyAddress" class="form-control rounded-0" placeholder="Please enter company address"></textarea>

                                      <p ng-show="submitr && reviewform.companyaddress == ''" class="text-danger">Company address is required.</p>

                                    </div>



                                  </div>


                                </fieldset>

                                <fieldset ng-if="step == 2">

                                  <div class="popup-title">
                                    <h1>Project Details</h1>
                                  </div>

                                  <div class="row">

                                    <div class="form-group col-sm-6">

                                      <label for="rev_title">Project Title</label>

                                      <input type="text" ng-value="reviewform.projecttitle" ng-model="reviewform.projecttitle" name="project title" id="projecttitle" class="form-control rounded-0" placeholder="Please enter project title"  />
                                      <p ng-show="submitr && reviewform.projecttitle == ''" class="text-danger">Project title is required.</p>


                                    </div>

                                    <div class="form-group col-sm-6">

                                      <label for="rev_web">Project Amount</label>

                                      <input numbers-only="numbers-only" type="text" ng-value="reviewform.projectamount" ng-model="reviewform.projectamount" name="rev_web" id="rev_web" class="form-control rounded-0" placeholder="Please enter amount"  />
                                      <p ng-show="submitr && reviewform.projectamount == ''" class="text-danger">Amount is required.</p>


                                    </div>

                                    <div class="form-group col-sm-6">

                                      <label for="rev_name">Project Start Date</label>

                                      <input mydatepicker  type="test" ng-value="reviewform.startdate" ng-model="reviewform.startdate" name="rev_name" id="startdate" class="form-control rounded-0" placeholder="Please enter project start date"  />
                                      <p ng-show="submitr && reviewform.startdate == ''" class="text-danger">Start date is required.</p>

                                    </div>
                                    <div class="form-group col-sm-6">
                                      <label for="rev_title">Project End date</label>
                                      <!-- ng-value="reviewform.enddate" -->
                                      <input mydatepicker   ng-value="reviewform.enddate" type="text" ng-model="reviewform.enddate" name="enddate" id="enddate" class="form-control rounded-0" placeholder="Please enter project end date"  />
                                      <p ng-show="submitr && reviewform.enddate == ''" class="text-danger">End date is required.</p>
                                    </div>
                                  </div>
                                </fieldset>
                                <fieldset ng-if="step == 2">

                                  <div class="row">

                                    <div class="form-group col-sm-6">

                                      <label for="rev_ser">Industries</label>

                                      <select ng-model="reviewform.rindustry" class="custom-select form-control rounded-0 w-100" name="rev_ser" id="rev_ser"  >

                                        <option value="">Select Industry</option>

                                        <option  ng-repeat="(key,x3) in industry"  value="{{ x3.id }}">{{ x3.industry }}</option>

                                      </select>
                                      <p ng-show="submitr && reviewform.rindustry == ''" class="text-danger">Industry is required.</p>
                                    </div>

                                    <div class="form-group col-sm-6">
                                      <label for="rev_ser">Service</label>
                                      <!-- {{ services }} -->
                                      <select ng-model="reviewform.rservice" class="custom-select form-control rounded-0 w-100" name="rev_ser" id="rev_ser"  >
                                        <option value="">Select Service</option>
                                        <option ng-repeat="(key,x1) in services"  value="{{ x1.sid }}">{{ x1.name  }}</option>

                                      </select>
                                      <p ng-show="submitr && reviewform.rservice == ''" class="text-danger">Services is required.</p>
                                    </div>

                                    <div class="form-group col-sm-12">
                                      <label for="rev_quoted_pr">Target Location</label>
                                      <input ng-value="reviewform.targetlocation" ng-model="reviewform.targetlocation" placeholder="Please enter target location" type="text" class="form-control rounded-0" name="rev_quoted_pr" id="targetlocation" >
                                      <p ng-show="submitr && reviewform.targetlocation == ''" class="text-danger">Company is required.</p>
                                    </div>
                                  </div>

                                </fieldset>
                                <fieldset ng-if="step == 2">

                                  <div class="row">
                                    <div class="form-group col-sm-12">

                                      <label for="rev_web">Project summary</label>

                                      <textarea ng-value="reviewform.projectsummary" type="text" ng-model="reviewform.projectsummary" name="projectsummary" id="projectsummary" class="form-control rounded-0" placeholder="Please enter project summary"></textarea>
                                      <p ng-show="submitr && reviewform.projectsummary == ''" class="text-danger">Project summary is required.</p>


                                    </div>
                                  </div>
                                </fieldset>

                                <fieldset ng-if="step == 3">
                                  <div class="popup-title">
                                    <h1>Company Feedback</h1>
                                  </div>

                                  <div class="row">

                                    <div class="form-group col-md-6">

                                      <label for="change">Review Title</label>

                                      <textarea ng-model="reviewform.reviewtitle" ng-value="reviewform.reviewtitle" class="form-control rounded-0" name="reviewtitle" id="reviewtitle" ></textarea>
                                      <p ng-show="submitr && reviewform.reviewtitle == ''" class="text-danger">Review title is required.</p>

                                    </div>

                                    <div class="form-group col-md-6">

                                      <label for="proj_desc">Feedback Summary</label>

                                      <textarea class="form-control rounded-0" ng-model="reviewform.feedbacksummary" ng-value="reviewform.feedbacksummary" name="feedback" id="feedbacksummary" ></textarea>
                                      <p ng-show="submitr && reviewform.feedbacksummary == ''" class="text-danger">Feedback summary is required.</p>


                                    </div>

                                  </div>

                                </fieldset>

                                <fieldset ng-if="step == 3">

                                  <div class="row">

                                    <div class="form-group col-sm-12">

                                      <p>Rate Your Experience</p>

                                      <div class="det-rating">

                                        <div class="row">

                                          <div class="col-sm-12 hiddenRate">
                                            <!-- start -->
                                            <div>
                                              <label for="mobile">Private Rating*</label>

                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>0</b></span>
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>1</b></span>
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>2</b></span>
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>3</b></span>
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>4</b></span>
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>5</b></span>
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>6</b></span>
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>7</b></span>
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>8</b></span>
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>9</b></span>
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <label>
                                                  <input type="radio" id="rating1" ng-click="overallrating($event)" ng-model="reviewform.rating" value="0" ><span class="label-text"><b>10</b></span>
                                                </label>
                                              </div>


                                              <p ng-show="submitr && reviewform.rating == ''" class="text-danger">Private rating is required.</p>
                                            </div>



                                            <h2>Public Feedback</h2><br>

                                            <div class="star-rating">
                                              <label class="reviewlabel">Skill</label>

                                              <span ng-class="{ 'fas fa-star' :  reviewform.skill >= 1 , 'far fa-star' : reviewform.skill < 1 }" ng-click="starrating('skill','1')"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.skill >= 2 , 'far fa-star' : reviewform.skill < 2 }" ng-click="starrating('skill','2')"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.skill >= 3 , 'far fa-star' : reviewform.skill < 3 }" ng-click="starrating('skill','3')"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.skill >= 4 , 'far fa-star' : reviewform.skill < 4 }" ng-click="starrating('skill','4')"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.skill >= 5 , 'far fa-star' : reviewform.skill < 5 }" ng-click="starrating('skill','5')" ></span>
                                            </div>

                                            <div class="star-rating">
                                              <label class="reviewlabel">Quality</label>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.quality >= 1 , 'far fa-star' : reviewform.quality < 1 }" ng-click="starrating('quality','1')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.quality >= 2 , 'far fa-star' : reviewform.quality < 2 }" ng-click="starrating('quality','2')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.quality >= 3 , 'far fa-star' : reviewform.quality < 3 }" ng-click="starrating('quality','3')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.quality >= 4 , 'far fa-star' : reviewform.quality < 4 }" ng-click="starrating('quality','4')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.quality >= 5 , 'far fa-star' : reviewform.quality < 5 }" ng-click="starrating('quality','5')" ></span>

                                            </div>

                                            <div class="star-rating">
                                              <label class="reviewlabel">willing to rehire</label>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.rehire >= 1 , 'far fa-star' : reviewform.rehire < 1 }" ng-click="starrating('rehire','1')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.rehire >= 2 , 'far fa-star' : reviewform.rehire < 2 }" ng-click="starrating('rehire','2')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.rehire >= 3 , 'far fa-star' : reviewform.rehire < 3 }" ng-click="starrating('rehire','3')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.rehire >= 4 , 'far fa-star' : reviewform.rehire < 4 }" ng-click="starrating('rehire','4')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.rehire >= 5 , 'far fa-star' : reviewform.rehire < 5 }" ng-click="starrating('rehire','5')" ></span>

                                            </div>

                                            <div class="star-rating">
                                              <label class="reviewlabel">Availability</label>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.availability >= 1 , 'far fa-star' : reviewform.availability < 1 }" ng-click="starrating('availability','1')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.availability >= 2 , 'far fa-star' : reviewform.availability < 2 }" ng-click="starrating('availability','2')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.availability >= 3 , 'far fa-star' : reviewform.availability < 3 }" ng-click="starrating('availability','3')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.availability >= 4 , 'far fa-star' : reviewform.availability < 4 }" ng-click="starrating('availability','4')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.availability >= 5 , 'far fa-star' : reviewform.availability < 5 }" ng-click="starrating('availability','5')" ></span>

                                            </div>

                                            <div class="star-rating">
                                              <label class="reviewlabel">Deadlines</label>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.deadline >= 1 , 'far fa-star' : reviewform.deadline < 1 }" ng-click="starrating('deadline','1')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.deadline >= 2 , 'far fa-star' : reviewform.deadline < 2 }" ng-click="starrating('deadline','2')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.deadline >= 3 , 'far fa-star' : reviewform.deadline < 3 }" ng-click="starrating('deadline','3')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.deadline >= 4 , 'far fa-star' : reviewform.deadline < 4 }" ng-click="starrating('deadline','4')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.deadline >= 5 , 'far fa-star' : reviewform.deadline < 5 }" ng-click="starrating('deadline','5')" ></span>

                                            </div>


                                            <div class="star-rating">
                                              <label class="reviewlabel">communication</label>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.communication >= 1 , 'far fa-star' :  reviewform.communication < 1}" ng-click="starrating('comm','1')"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.communication >= 2 , 'far fa-star' :  reviewform.communication < 2}" ng-click="starrating('comm','2')"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.communication >= 3 , 'far fa-star' :  reviewform.communication < 3}" ng-click="starrating('comm','3')"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.communication >= 4 , 'far fa-star' :  reviewform.communication < 4}" ng-click="starrating('comm','4')"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.communication >= 5 , 'far fa-star' :  reviewform.communication < 5}" ng-click="starrating('comm','5')"  ></span>

                                            </div>



                                            <div class="star-rating">
                                              <label class="reviewlabel">cooperation</label>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.cooperation >= 1 , 'far fa-star' : reviewform.cooperation < 1 }" ng-click="starrating('cooperation','1')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.cooperation >= 2 , 'far fa-star' : reviewform.cooperation < 2 }" ng-click="starrating('cooperation','2')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.cooperation >= 3 , 'far fa-star' : reviewform.cooperation < 3 }" ng-click="starrating('cooperation','3')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.cooperation >= 4 , 'far fa-star' : reviewform.cooperation < 4 }" ng-click="starrating('cooperation','4')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.cooperation >= 5 , 'far fa-star' : reviewform.cooperation < 5 }" ng-click="starrating('cooperation','5')" ></span>

                                            </div>

                                            <div class="star-rating">
                                              <label class="reviewlabel">reviewform.cost</label>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.cost >= 1 , 'far fa-star' : reviewform.cost < 1 }" ng-click="starrating('cost','1')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.cost >= 2 , 'far fa-star' : reviewform.cost < 2 }" ng-click="starrating('cost','2')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.cost >= 3 , 'far fa-star' : reviewform.cost < 3 }" ng-click="starrating('cost','3')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.cost >= 4 , 'far fa-star' : reviewform.cost < 4 }" ng-click="starrating('cost','4')" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.cost >= 5 , 'far fa-star' : reviewform.cost < 5 }" ng-click="starrating('cost','5')" ></span>

                                            </div>


                                            <div>
                                              <label >overall : {{ reviewform.overall | number : 2 }}</label>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.overall >= 2 ,'fa fa-star-half-o' :  reviewform.overall > 1 && reviewform.overall < 2 , 'far fa-star' : reviewform.overall < 2 }"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.overall >= 4 ,'fa fa-star-half-o' :  reviewform.overall > 3 && reviewform.overall < 4 , 'far fa-star' : reviewform.overall < 4 }"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.overall >= 6 ,'fa fa-star-half-o' :  reviewform.overall > 5 && reviewform.overall < 6 , 'far fa-star' : reviewform.overall < 6 }"  ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.overall >= 8 ,'fa fa-star-half-o' :  reviewform.overall > 7 && reviewform.overall < 8 , 'far fa-star' : reviewform.overall < 8 }" ></span>
                                              <span ng-class="{ 'fas fa-star' :  reviewform.overall >= 10 ,'fa fa-star-half-o' :  reviewform.overall > 9 && reviewform.overall < 10 , 'far fa-star' : reviewform.overall < 10 }"  ></span>
                                            </div>




                                          </div>

                                          <!-- start -->
                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                </fieldset>

                                <fieldset ng-if="step == 4">
                                  <div class="popup-title">
                                    <h1>Tell us more about One Way it</h1>
                                  </div>



                                  <div class="tabpanel vertical-tab-sec">
                                    <div class="row">
                                      <div class="col-sm-3">

                                        <div class="vertical-panel-left">

                                          <ul class="nav nav-pills brand-pills nav-stacked" role="tablist">


                                            <li ng-repeat="(key,x) in questionType" ng-class="{ 'active' : $index == 0  }" role="presentation"  class="brand-nav "><a href="#tab{{ x.id }}" aria-controls="tab{{ x.id }}" role="tab" data-toggle="tab">{{ x.name }}</a></li>

                                            <!-- <li role="presentation" class="brand-nav"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Opportunities</a></li>
                                            <li role="presentation" class="brand-nav"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Solutions</a></li>
                                            <li role="presentation" class="brand-nav"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Results</a></li> -->
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="col-sm-9">

                                        <div class="vertical-panel-right">

                                          <div class="tab-content">

                                            <div ng-repeat="(key,x) in question" ng-class="{ 'active' : $index == 0  }" role="tabpanel" class="tab-pane" id="tab{{ x.id }}">
                                              <ul>

                                                <li ng-repeat="(key1,x2) in x.question">
                                                  <span>{{ $index + 1 }}) {{  x2.question }}</span>
                                                  <textarea  class="form-control answer" ng-model="x2.answer" ng-value="x2.answer"   placeholder="Please write your answer here"></textarea>
                                                </li>

                                              </ul>
                                              <span class="text-danger" ng-show="submitr && x.required > x.filled ">{{ x.required }} question is required</span>
                                            </div>


      </div>

    </div>
  </div>
</fieldset>



</form>

</div>
<!-- fields -->
</div>
<div class="modal-footer">
  <button ng-if="step == 1" class="btn btn-success" ng-click="firststep()">Next</button>

  <button ng-if="step == 2" class="btn btn-success" ng-click="secondstep()">Next</button>
  <button ng-if="step == 3" class="btn btn-success" ng-click="thirdstep()">Next</button>

  <button ng-if="step == 4" type="submit" ng-click="submitReview()" id="makeReview" class="btn btn-info rounded-0 pointer d-none">Leave A Review</button>
</div>
</div>

</div>
</div>
<!-- add review modal -->
<div class="serv-bx col-md-12" ng-repeat="(key,x) in linkedinreview">

  <div class="col-md-4">
    <h4>Client Details</h4>
    <p><span>Company Name: </span>{{ x.companyName }}</p>
    <p><span>Client Name: </span>{{ x.fullName }}</p>
    <p><span>Country: </span>{{ x.country }}</p>
  </div>
  <div class="col-md-4">
    <h4>Project Details</h4>
      <p><span>Project Name: </span> {{ x.projectTitle }}</p>
    <p><span>Service Name: </span> {{ x.service }}</p>
    <p><span>Amount: </span> {{ x.projectAmount }}</p>
    <p><span>Date: </span>{{ x.projectStartDate | date  }} - {{ x.projectEndDate | date }}</p>
      <p><span>Description: </span> {{ x.projectSummary  }}
      <a class="read-button" ng-click="reviewQuestion(x.linkedInId)" >Read More</a>
    </p>
  </div>
  <div class="col-md-4">
    <h4>Feedback</h4>
    <p><span>Tittle: </span>{{ x.reviewTitle }}</p>
      <p><span>Feedback: </span>{{ x.feedback }}</p>
      <p><span>Client Rating: </span>{{ x.rating }}
      <span ng-class="{ 'fas fa-star' :  x.rating >= 1 ,'fa fa-star-half-o' :  x.rating > 1 && x.rating < 2 , 'far fa-star' : x.rating < 1 }"  ></span>
      <span ng-class="{ 'fas fa-star' :  x.rating >= 2 ,'fa fa-star-half-o' :  x.rating > 2 && x.rating < 3 , 'far fa-star' : x.rating < 2 }"  ></span>
      <span ng-class="{ 'fas fa-star' :  x.rating >= 3 ,'fa fa-star-half-o' :  x.rating > 3 && x.rating < 4 , 'far fa-star' : x.rating < 3 }"  ></span>
      <span ng-class="{ 'fas fa-star' :  x.rating >= 4 ,'fa fa-star-half-o' :  x.rating > 4 && x.rating < 5 , 'far fa-star' : x.rating < 4 }" ></span>
      <span ng-class="{ 'fas fa-star' :  x.rating >= 5 ,'fa fa-star-half-o' :  x.rating > 5 && x.rating < 5 , 'far fa-star' : x.rating < 5 }"  ></span>
    </p>
  </div>
</div>
<div id="reviewpagination"></div>

</div>


<div id="Pricing" class="tab-pane fade in">
  <div ng-if="pricing.length != 0" class="col-md-4" ng-repeat="(key,x) in pricing" ng-init="pricing = key">
    <div class="price-bx">
      <h3>{{ x.name }}</h3>
      <p ng-bind-html="x.pricingKeyPoint|trustAsHtml"></p>
      <a class="price-btn" href="#">{{ x.code }} {{ x.symbol }} {{ x.pricingPrice }}</a>
    </div>
  </div>
</div>
<div id="Testimonials" class="tab-pane fade in ">
  <div class="col-md-12">
    <div ng-if="testimonial.length != 0" class="col-md-4" ng-repeat="(key,x) in testimonial" ng-init="testimonial = key">
      <div class="case-bx test-bx">
        <div class="client-test-img">
          <img ng-if="x.testimonialLogo"  src="<?php echo base_url(); ?>assets/testimonial_logo/{{ x.testimonialLogo }}">
          <img ng-if="!x.testimonialLogo" height="100" width="200" src="<?php echo base_url(); ?>assets/testimonial_logo/noimage.jpg">
        </div>
        <h3>{{ x.testimonialTitle }}</h3>
        <p>{{ x.testimonialDescription | limitTo:300 }}</p>
        <p>{{ x.testimonialClientName }}</p>
        <p>{{ x.testimonialWebsite }}</p>
      </div>
    </div>
  </div>
</div>
<div id="Competitors" class="tab-pane fade in ">
  <h3>Lorem Ipsum is simply dummy text of the printing </h3>
  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
</div>
<div id="Team" class="tab-pane fade in ">
  <div class="row">



<div ng-if="team.length != 0" class="col-md-4" ng-repeat="(key,x) in team"  class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
  <div class="card bg-light">
    <div class="card-header text-muted border-bottom-0">
      <p class="left-side">
      {{ x.desig }}
    </p>
      <p class="right-side" ng-if="x.experience">
        {{ x.experience }} Year
      </p>
    </div>

    <div class="card-body pt-0">
      <div class="row">
        <div class="col-md-7">
          <h2 class="lead"><a ng-click="teamProfile(x.u_id)"><b>{{ x.name }}</b></a></h2>
          <div class="text-muted text-sm"><b>Skills: </b>
            <span ng-if="key1 <= 1 " ng-repeat="(key1,x2) in x.services">

            {{ x2.service }} {{$last ? '' : ($index==x.services.length-2) ? ' / ' : '/ '}}
          </span>
          <span ng-if="x.services.length > 2">...</span>
          <p class="text-muted text-sm" ng-if="x.about">About: <span ng-bind-html="x.about | limitTo:100 |trustAsHtml"></span>...</p>


          </div>

      </div>
      <div class="col-md-5 text-center">
        <img width="100" height="100" src="<?php echo base_url(); ?>assets/client_images/{{ x.logo }}" alt="profile" class="img-circle img-fluid">
      </div>
    </div>
  </div>
  <div class="card-footer">
    <div class="text-right">
      <a ng-if="x.maxPrice" class="btn btn-sm bg-teal" >{{ x.code }} {{ x.symbol}} {{ x.maxPrice }} per hour</a>
      <a ng-click="contactEmployee(x.name)" class="btn btn-sm bg-teal">
        <i class="fas fa-comments"></i>
      </a>
      <a ng-click="teamProfile(x.u_id)" class="btn btn-sm btn-primary">
        <i class="fas fa-user"></i> View Profile
      </a>
    </div>
  </div>
</div>
</div>



<!-- /.card-body -->

<!-- /.card-footer -->

</div>
</div>
<div id="Portfolio" class="tab-pane fade in ">
  <div ng-if="portfolio.length != 0" class="col-md-4" ng-repeat="(key,x) in portfolio" ng-init="case = key">
    <div class="case-bx port-bx">
      <img src="<?php echo base_url(); ?>assets/portfolio/{{ x.portfolioImage }}">
      <a ng-click="oneportfolio(x.portfolioId)"><p>{{ x.portfolioTitle  }}</p></a>
      <p>{{ x.portfolioWebsite }}</p>
      <p><span ng-repeat="(key,x2) in x.services">{{ x2.service }}<span ng-if="key != (x.services.length -1)">, </span> </span>  </p>
    </div>
  </div></div>
  <div id="Case" class="tab-pane fade in">
    <div class="col-md-12">
      <div ng-if="case.length != 0" class="col-md-4" ng-repeat="(key,x) in case" ng-init="case = key">
        <div class="case-bx case-study-bx">
          <p>{{ x.casestudyTitle  }}</p>
          <p>{{ x.casestudyInfo }}</p>
          <p>{{ x.service }}</p>
          <p><a class="download-btn" target="_blank" href="<?php echo base_urL(); ?>assets/case_study/{{ x.casestudyDocument }}">Download <i class="fas fa-arrow-alt-circle-down"></i></a></p>
        </div>
      </div>
    </div>
  </div>
  <div id="Services" class="tab-pane fade in">

    <div class="col-md-12" ng-repeat="(key,x) in services" ng-init="services = key">
      <div class="serv-bx">
        <h3>{{ x.name }}</h3>
        <p ng-bind-html="x.description|trustAsHtml"></p>
      </div>
    </div>

  </div>

  <div id="myjobs" class="tab-pane fade in">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#current">Current Jobs</a></li>
      <li><a data-toggle="tab" href="#ended">Completed Jobs</a></li>
    </ul>
    <div class="tab-content">
      <div id="current" class="tab-pane fade-in active">

        <div ng-if="currents.length != 0" ng-repeat="(key,x) in currents" ng-init="currents = key" class="col-md-3 currentjobs">
          <div class="job-bx">
            <?php if (isset($this->session->userdata['clientloggedin']))
            {
              ?>
              <div class="jobtitle"><a href="<?php echo base_url(); ?>job/{{ x.jobTitle | underscoreless | lowercase }}-{{ x.jobId }}">{{ x.jobTitle }}</a> - <span>Paid Amount {{ x.jobAmount }}</span></div>
            <?php }
            else
            {
              ?>
              <div class="jobtitle">{{ x.jobTitle }}- <span>Paid Amount {{ x.jobAmount }}</span></div>

            <?php } ?>
            <div class="date">{{ x.contractDate | date }}</div>
            <div>Job in progress</div>
          </div>
        </div>
        <div ng-if="currents.length == 0">
          <h3>No Record</h3>
        </div>
        <div ng-if="currents.length != 0"  id="pagination"></div>

      </div>
      <div id="ended" class="tab-pane fade-in">
        <div ng-repeat="(key,x) in ended" ng-init="ended = key" class="col-md-3 endedjobs">
          <div class="job-bx">
            <?php if (isset($this->session->userdata['clientloggedin']))
            {
              ?>
              <div class="jobtitle"><a href="<?php echo base_url(); ?>job/{{ x.jobTitle | underscoreless | lowercase }}-{{ x.jobId }}">{{ x.jobTitle }}</a>  - <span>Total Amount {{ x.jobAmount }}</span></div>
            <?php }
            else {
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
        </div>
        <div ng-if="ended.length != 0" id="endedpagination"></div>
      </div>
    </div>


  </div>

  <!-- rank -->
  <div id="Rank" class="tab-pane fade in">
    <h2 class="text-center maps">Rankings & Rating <?php echo date("M"); ?>-<?php echo date("Y"); ?></h2>
    <div class="clearfix"></div>
    <!-- services -->
    <?php
    if(!empty($profile->services))
    {
      ?>
      <div class="col-md-3">
        <div class="rank-bx-details-sec">
          <h2>Skills</h2>
          <ul>
            <?php
            foreach($profile->services as $s)
            {
              $country = str_replace(' ', '_',strtolower($profile->country));

              ?>
              <li><a href="<?php echo base_url(); ?>best-<?php echo str_replace(' ', '_',strtolower($s->name)); ?>-companies"># Best <?php echo $s->name; ?> Company </a></li>
            <?php }

            ?>
          </ul>
        </div>
      </div>
    <?php } ?>
    <!-- services -->

    <!-- industry and services -->
    <?php
    if(!empty($profile->services))
    {
      if(!empty($profile->industry))
      {
        ?>
        <div class="col-md-3">
          <div class="rank-bx-details-sec">
            <h2>Industry &amp; Skills</h2>
            <ul>
              <?php

              foreach($profile->industry as $i)
              {
                foreach($profile->services as $s)
                {


                  ?>
                  <li><a href="<?php echo base_url(); ?>best-<?php echo str_replace(' ', '_',strtolower($i->industry.'-'.$s->name)); ?>-companies"># Best <?php echo $i->industry.' '.$s->name; ?> Company </a></li>
                  <?php
                }
              }

              ?>
            </ul>
          </div>
        </div>
      <?php } } ?>
      <div class="col-md-3">
        <div class="rank-bx-details-sec">
          <h2>Skills & Location</h2>
          <ul>
            <?php if(!empty($profile->services))
            {
              foreach($profile->services as $s)
              {
                $country = str_replace(' ', '_',strtolower($profile->country));
                $state = str_replace(' ', '_',strtolower($profile->state));

                ?>
                <li><a href="<?php echo base_url(); ?>best-<?php echo str_replace(' ', '_',strtolower($s->name)); ?>-companies-in-<?php echo $country; ?>"># Best <?php echo $s->name; ?> Company in <?php echo $profile->country; ?></a></li>
              <?php }
            }
            ?>
          </ul>
        </div>
      </div>
      <?php

      if(!empty($profile->services))
      {
        if(!empty($profile->industry))
        {
          ?>
          <div class="col-md-3">
            <div class="rank-bx-details-sec">
              <h2>Industry Skills Location</h2>
              <ul>
                <?php
                foreach($profile->industry as $i)
                {
                  foreach($profile->services as $s)
                  {
                    $country = str_replace(' ', '_',strtolower($profile->country));
                    $state = str_replace(' ', '_',strtolower($profile->state));
                    $city = str_replace(' ', '_',strtolower($profile->city));



                    ?>
                    <li><a href="<?php echo base_url(); ?>best-<?php echo str_replace(' ', '_',strtolower($i->industry.'-'.$s->name)); ?>-companies-in-<?php echo $state; ?>-<?php echo $country; ?>"># Best <?php echo $i->industry; ?> <?php echo $s->name; ?> Company in <?php echo $profile->state; ?>, <?php echo $profile->country; ?></a></li>
                    <?php if($profile->state != $profile->city )
                    {
                      ?>
                      <li><a href="<?php echo base_url(); ?>best-<?php echo str_replace(' ', '_',strtolower($i->industry.'-'.$s->name)); ?>-companies-in-<?php echo $city; ?>-<?php echo $state; ?>-<?php echo $country; ?>"># Best <?php echo $i->industry; ?> <?php echo $s->name; ?> Company in <?php echo $profile->city; ?>, <?php echo $profile->country; ?></a></li>
                    <?php } ?>
                    <li><a href="<?php echo base_url(); ?>best-<?php echo str_replace(' ', '_',strtolower($i->industry.'-'.$s->name)); ?>-companies-in-<?php echo $country; ?>"># Best <?php echo $i->industry; ?> <?php echo $s->name; ?> Company in <?php echo $profile->country; ?></a></li>
                  <?php     }
                }

                ?>
              </ul>
            </div>
          </div>
          <?php
        }
      }
      ?>

    </div>
    <!-- rank -->

  </div>
</div>






<!-- Modal -->
<div id="Requestquote" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request A Quote</h4>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-sm-12">
            <div class="top-info">
              <img src="<?php echo base_url(); ?>assets/front/images/top-seo.png"/>
              <span>{{ profile.name }}</span>
              <a href="#">{{ profile.website}}</a>
            </div>

          </div>
          <div class="col-sm-6">
            <div class="request-address">
              <p>{{ profile.address1 }}
                {{ profile.address2 }}
                In,{{ profile.zip }}</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="request-btn">
                Talk to a representative
                <a href="tel:{{ profile.rep_ph_num }}">


                  <span>{{ profile.countryCode }}{{ profile.rep_ph_num }}</span>
                </a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Contact Name <span class="red-text">*</span> </label> -->
                <input placeholder="Please enter name" name="text" id="name" ng-model="name" type="text" class="form-control" />
                <p ng-show="submitrequest && name == ''" class="text-danger">Contract name is required.</p>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Phone <span class="red-text">*</span> </label> -->
                <input type="tel" id="phone" placeholder="Please enter phone number"  ng-model="phone" name="phone"  class="phone form-control" />
                <p ng-show="submitrequest && phone == ''" class="text-danger">Phone is required.</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Company Name <span class="red-text">*</span></label> -->
                <input placeholder="Please enter company name" name="text" id="companyname" ng-model="companyname" type="text" class="form-control" />
                <p ng-show="submitrequest && name == ''" class="text-danger">Company name is required.</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Email Address <span class="red-text">*</span> </label> -->
                <input placeholder="Please enter email address" name="email" id="email" ng-model="email" type="email" class="form-control" />
                <p ng-show="submitrequest && email == ''" class="text-danger">Email Address is required.</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Website <span class="red-text">*</span></label> -->
                <input placeholder="Please enter website" name="website" id="website" ng-model="website" type="text" class="form-control" />
                <p ng-show="submitrequest && website == ''" class="text-danger">Website is required.</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Service <span class="red-text">*</span> </label> -->

                <select id="service" ng-model="service" class="form-control">
                  <option value="">Select Services </option>
                  <option value="{{ x.sid }}" ng-repeat="(key,x) in services" >{{ x.name }}</option>

                </select>
                <p ng-show="submitrequest && service == ''" class="text-danger">Service is required.</p>
              </div>
            </div>
            <div class="col-sm-12">
              <!-- <labe>Brief Porject Info <span class="red-text">*</span></labe> -->
              <textarea placeholder="Please enter project info" id="projectinfo" ng-model="projectinfo" class="form-control"></textarea>
              <p ng-show="submitrequest && projectinfo == ''" class="text-danger">Project info is required.</p>
            </div>

          </div>
        </div>
        <div class="modal-footer">

          <button type="button" ng-click="requestaquote()" class="btn btn-default" >Request a Quote</button>
        </div>
      </div>

    </div>
  </div>


  <!-- Schedule A Visit -->
  <div id="Schedule" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Schedule a Visit</h4>
        </div>
        <div class="modal-body">
          <div class="row">

            <div class="col-sm-12">
              <div class="top-info">
                <img src="<?php echo base_url(); ?>assets/front/images/top-seo.png"/>
                <span>{{ profile.name }}</span>
                <a target="_blank" href="{{ profile.website }}">{{ profile.website }}</a>
              </div>

            </div>
            <div class="col-sm-6">
              <div class="request-address">
                <p>{{ profile.address1 }}
                  {{ profile.address2 }}
                  In,{{ profile.zip }}</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="request-btn">
                  Talk to a representative
                  <a href="tel:{{ profile.rep_ph_num }}">


                    <span>{{ profile.countryCode }}{{ profile.rep_ph_num }}</span>
                  </a>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Contact Name <span class="red-text">*</span></label> -->
                  <input placeholder="Please enter name" name="text" id="name" ng-model="name" type="text" class="form-control" />
                  <p ng-show="submitrequest && name == ''" class="text-danger">Contract Name is required.</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Phone <span class="red-text">*</span></label> -->
                  <input type="tel" id="phone" placeholder="Please enter phone number"  ng-model="phone" name="phone"  class="form-control" />
                  <p ng-show="submitrequest && phone == ''" class="text-danger">Phone is required.</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Company Name <span class="red-text">*</span> </label> -->
                  <input placeholder="Please enter company name" name="text" id="companyname" ng-model="companyname" type="text" class="form-control" />
                  <p ng-show="submitrequest && name == ''" class="text-danger">Company Name is required.</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Email Address <span class="red-text">*</span> </label> -->
                  <input placeholder="Please enter email Address" name="email" id="email" ng-model="email" type="email" class="form-control" />
                  <p ng-show="submitrequest && email == ''" class="text-danger">Email Address is required.</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Date You'd Like To Visit <span class="red-text">*</span> </label> -->
                  <input mydatepicker readonly="readonly" placeholder="Please select date"  ng-model="date" id="date" type="text" class="form-control" />
                  <p ng-show="submitrequest && date == ''" class="text-danger">Date is required.</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Website <span class="red-text">*</span> </label> -->
                  <input placeholder="Please enter website" ng-model="website" name="website" type="text" class="form-control" />
                  <p ng-show="submitrequest && website == ''" class="text-danger">Website is required.</p>
                </div>
              </div>


            </div>
          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-default" ng-click="ScheduleAVisit()">Schedule a Visit</button>
          </div>
        </div>

      </div>
    </div>


    <!-- Modal -->
    <div id="RequestCall" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Request a Call</h4>
          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-sm-12">
                <div class="top-info">
                  <img src="<?php echo base_url(); ?>assets/front/images/top-seo.png"/>
                  <span>{{ profile.name }}</span>
                  <a target="_blank" href="{{ profile.website }}">{{ profile.website }}</a>
                </div>

              </div>
              <div class="col-sm-6">
                <div class="request-address">
                  <p>{{ profile.address1 }}
                    {{ profile.address2 }}
                    In,{{ profile.zip }}</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="request-btn">
                    Talk to a representative
                    <a href="tel:{{ profile.rep_ph_num }}">


                      <span>{{ profile.countryCode }}{{ profile.rep_ph_num }}</span>
                    </a>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Contact Name <span class="red-text">*</span> </label> -->
                    <input placeholder="Please enter name" name="text" id="name" ng-model="name" type="text" class="form-control" />
                    <p ng-show="submitrequest && name == ''" class="text-danger">Contract name is required.</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Phone <span class="red-text">*</span></label> -->
                    <input type="tel" id="phone" placeholder="Please enter phone number"  ng-model="phone" name="phone"  class="form-control" />
                    <p ng-show="submitrequest && phone == ''" class="text-danger">Phone is required.</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Company Name <span class="red-text">*</span> </label> -->
                    <input placeholder="Please enter company name" name="text" id="companyname" ng-model="companyname" type="text" class="form-control" />
                    <p ng-show="submitrequest && name == ''" class="text-danger">Company name is required.</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Email Address <span class="red-text">*</span> </label> -->
                    <input placeholder="Please enter email address" name="email" id="email" ng-model="email" type="email" class="form-control" />
                    <p ng-show="submitrequest && email == ''" class="text-danger">Email address is required.</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Website <span class="red-text">*</span></label> -->
                    <input placeholder="Please enter website" name="website" id="website" ng-model="website" type="text" class="form-control" />
                    <p ng-show="submitrequest && website == ''" class="text-danger">Website is required.</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Service <span class="red-text">*</span></label> -->
                    <select id="service" ng-model="service" class="form-control">
                      <option value="">Select Services</option>
                      <option  value="{{ x.id }}" ng-repeat="(key,x) in services" ng-init="services = key">{{ x.name }}</option>

                    </select>
                    <p ng-show="submitrequest && service == ''" class="text-danger">Service is required.</p>
                  </div>
                </div>


              </div>
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-default" ng-click="requestacall()">Request a Call</button>
            </div>
          </div>

        </div>
      </div>



      <!-- job offer -->

      <!-- job Offer modal -->
      <div class="modal fade" id="myJob" role="dialog">
        <div class="modal-dialog">

          <div class="modal-content">
            <form  id="jobform" novalidate >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Job Offer</h4>
              </div>
              <div class="modal-body">
                <div ng-if="jobs.length != 0" class="form-group">
                  <label>Job</label>
                  <select onchange="angular.element(this).scope().getjobdata(this)" ng-model="jobId"  id="jobs" class="form-control jobId" >
                    <option value="">Select job</option>

                    <option ng-repeat="(key,x) in jobs" ng-init="jobs = key" value="{{ x.jobId }}">{{ x.jobTitle }}</option>
                  </select>
                  <p ng-show="msgSubmit && jobId == ''" class="text-danger">Please select job</p>
                </div>
                <div class="form-group">
                  <label>Title <span class="red-text">*</span></label>
                  <input placeholder="Please enter title" type="text"  id="title" ng-model="jobtitle" ng-value="jobtitle"  class="form-control title required"  >
                  <p ng-show="jobSubmit && jobtitle == ''" class="text-danger">Title is required.</p>
                  <input type="hidden"  class="offerto" value="{{ profile.u_id }}"   >
                </div>
                <div class="form-group">
                  <label>Description <span class="red-text">*</span></label>
                  <!-- ckeditor -->
                  <textarea placeholder="Please enter description" type="text" name="description" id="description" ng-model="description" ng-value="description" class="form-control description ckeditor required" ></textarea>
                  <p ng-show="jobSubmit && description == ''" class="text-danger">Description is required.</p>
                </div>
                <div class="form-group">
                  <label>Attachment</label>
                  <input onchange="angular.element(this).scope().uploadImage(this)" type="file" id="attchment" name="file" class="form-control attchment required" >
                  <a ng-if="image" target="_blank" id="image" href="<?php echo base_url(); ?>assets/jobAttachment/{{ image }}"><i class="fa fa-download" aria-hidden="true"> {{ image }} </i></a>
                </div>

                <div class="form-group">
                  <label>No of freelancer Required <span class="red-text">*</span></label>
                  <input placeholder="Please enter required freelancer" type="text" numbers-only="numbers-only"  id="jobrequiredf" ng-model="jobrequiredf" ng-value="jobrequiredf" class="form-control title required"  >
                  <p ng-show="jobSubmit && jobrequiredf == ''" class="text-danger">This field is required.</p>
                </div>

                <div class="form-group">
                  <label>Industries <span class="red-text">*</span></label>

                  <input placeholder="Please enter industry" ng-enter="addrefindustry()" id="industrys" onkeyup="angular.element(this).scope().industrys(this)" class="form-control" type="text"    >
                  <ul  if-ng="refservices.length != 0" >
                    <li hand ng-repeat="(key,x) in refindustry" ng-click="addindustry(x.name,x.id)" value="{{ x.id }}">{{ x.name }}</li>
                  </ul>
                  <p ng-show="jobSubmit  && jobindustry.length == 0" class="text-danger">Skill is required.</p>

                </div>

                <div ng-if="jobindustries.length != 0" id="tags">
                  <a ng-repeat="(key,x) in jobindustries"  > {{ x.name }}<span hand ng-click="deleteindustry(key)" > &times; </span></a>
                </div>

                <div class="form-group">
                  <label>Services <span class="red-text">*</span></label>
                  <select  id="service" ng-model="jobservices"  class="form-control" >
                    <option value="">Select service</option>
                    <option value="{{ x.id }}" ng-repeat="(key,x) in allservices">{{ x.name }}</option>
                  </select>
                  <p ng-show="jobSubmit && jobservices == ''" class="text-danger">Service is required.</p>
                </div>
                <div class="form-group">
                  <label>Skill <span class="red-text">*</span></label>
                  <input placeholder="Please enter skill" ng-enter="addrefskill()" id="skills" onkeyup="angular.element(this).scope().skills(this)" class="form-control" type="text" ng-model="profile.skill"   >
                  <ul  if-ng="refservices.length != 0" >
                    <li hand ng-repeat="(key,x) in refservices" ng-click="addskill(x.name,x.id)" value="{{ x.id }}">{{ x.name }}</li>
                  </ul>
                  <p ng-show="jobSubmit  && jobskill.length == 0" class="text-danger">Skill is required.</p>
                </div>

                <div ng-if="services.length != 0" id="tags">
                  <a ng-repeat="(key,x) in jobskill"  > {{ x.name }}<span hand ng-click="deleteskill(key)" > &times; </span></a>
                </div>

                <div class="form-group">
                  <label>Pref location</label>
                  <select  id="location" ng-model="location"  class="form-control" >
                    <option value="">Select country</option>
                    <option ng-repeat="(key,x) in allcountry">{{ x.name }}</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Currency</label>
                  <select  id="location" ng-model="currency"  class="form-control" >
                    <option value="">Select currency</option>
                    <option value="{{ x.id }}" ng-repeat="(key,x) in allcurrency">{{ x.code }} {{ x.symbol }}</option>
                  </select>
                  <p ng-show="jobSubmit && currency == ''" class="text-danger">Please select currency.</p>

                </div>


                <div class="form-group">
                  <label>Project Type</label>
                  <input type="radio" name="type" ng-click="changetype(1)" checked value="1">Estimated budget
                  <input type="radio" name="type" ng-click="changetype(2)" value="2">Create milestone
                </div>


                <div ng-if="type == 2" class="form-group">
                  <label>Csv</label>
                  <input  type="file" id="csv" name="file" class="form-control attchment required" >
                  <a href="<?php echo base_url(); ?>assets/milestonecsv/milestone.csv"><i class="fa fa-download" aria-hidden="true"></i></a>
                </div>



                <div ng-if="type == 2" class="row">
                  <div class="col-md-12" style="margin: 10px 0">
                    <a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="far fa-plus-square"></i></a>
                  </div>
                  <br>
                </div>

                <div ng-if="type == 2" style="margin-bottom:5px;" class="form-inline milestone" ng-repeat="(key,x) in milestones">
                  <a  ng-if="key != 0 && type == 2" hand id="plusicon" class="pull-right">  <i ng-click="deletemilestone(key)" class="fas fa-trash-alt"></i></a>
                  <div ng-if="type == 2" class="form-group">
                    <input type="text" name='title{{$index}}' ng-required='true' class="form-control" ng-model="x.title" ng-value="x.title"  id="email" placeholder="Please enter milestone title" name="title">
                    <p ng-show="mSubmit && x.title == ''" class="text-danger">Title is required.</p>

                  </div>

                  <div ng-if="type == 2" class="form-group">
                    <input type="text"   readonly  numbers-only="numbers-only" ng-model="x.price" ng-value="x.price" class="numberonly form-control" id="pwd" placeholder="Please enter Amount" name="price">
                    <p ng-show="mSubmit && x.title == ''" class="text-danger">Amount is required.</p>
                  </div>

                  <div ng-if="type == 2" class="row">
                    <div class="col-md-12" style="margin: 10px 0">
                      <a hand id="plusicon">Sub Tasks  <i ng-click="taskadd(key)" class="far fa-plus-square"></i> </a>
                    </div>
                    <br>
                  </div>
                  <div ng-if="type == 2" class="row" ng-repeat="(key2,x2) in x.task">
                    <div class="col-md-12">
                      <div class="form-group" style="margin-bottom: 10px">
                        <input type="text"  id="title" placeholder="task" ng-model="x2.task" ng-value="x2.task"   class="form-control title required"  >
                        <p ng-show="mSubmit && x2.task == ''" class="text-danger">Task is required.</p>
                        <!-- &nbsp; <a hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a> -->
                      </div>
                      <div class="form-group" style="margin-bottom: 10px">
                        <input ng-keyup="totalmilestone()"  type="text" numbers-only="numbers-only"  id="title" placeholder="Please enter hours" ng-model="x2.hours" ng-value="x2.hours"   class="form-control title required"  >
                        <p ng-show="mSubmit && x2.hours == ''" class="text-danger">Hours is required.</p>

                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group" style="margin-bottom: 10px">
                        <input ng-keyup="totalmilestone()" type="text"  id="title" placeholder="Please enter hourly price" ng-model="x2.hourlyPrice" ng-value="x2.hourlyPrice"   class="form-control title required"  >
                        <p ng-show="mSubmit && x2.hourlyPrice == ''" class="text-danger">Hourly price is required.</p>
                        <!-- &nbsp; <a hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a> -->
                      </div>
                      <div class="form-group" style="margin-bottom: 10px">
                        <input readonly  type="text" numbers-only="numbers-only"  id="title" placeholder="Total amount" ng-model="x2.amount" ng-value="x2.amount"   class="form-control title required"  >
                        <p ng-show="mSubmit && x2.amount == ''" class="text-danger">Total Price is required.</p>
                        &nbsp; <a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>

                  </div>

                </div>
                <div ng-if="type == 2" class="row">
                  <div  class="col-sm-12">
                    <div class="form-group">
                      <label>Budget <span class="red-text">*</span></label>
                      <input type="text" readonly ng-value="budget"  ng-model="budget"  id="amount" ng-value="{{ budget }}" numbers-only="numbers-only" ng-model="estimationAmount" placeholder="Please enter budget"  name="budget" class="form-control amount required" >
                    </div>
                  </div>
                </div>

                <div ng-if="type == 1" class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Estimate hours <span class="red-text">*</span></label>
                      <input type="text" id="hours"  numbers-only="numbers-only" id="amount" ng-value="estimationHours" ng-model="estimationHours" placeholder="Please enter hours"  name="hours" class="form-control amount required" >
                      <p ng-show="jobSubmit  && estimationHours == ''" class="text-danger">Estimate hours is required.</p>

                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Hourly rate <span class="red-text">*</span></label>
                      <input type="text" id="hourlyrate" ng-keyup="fixedtotalbudget()"  id="amount" numbers-only="numbers-only" ng-value="estimationHourlyPrice" ng-model="estimationHourlyPrice" placeholder="Please enter hourly price"  name="budget" class="form-control amount required" >
                      <p ng-show="jobSubmit  && estimationHours == ''" class="text-danger">Hourly rate is required.</p>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Budget <span class="red-text">*</span></label>
                      <input type="text" readonly ng-value="budget"  ng-model="budget"  id="amount" ng-value="{{ budget }}" numbers-only="numbers-only" ng-model="estimationAmount" placeholder="Please enter budget"  name="budget" class="form-control amount required" >
                    </div>
                  </div>
                </div>
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

      <!-- job offer Modal -->


      <!-- team profile -->
      <div id="teamProfile"  class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">{{ teamprofiledata.name }} Profile</h4>
            </div>
            <div class="modal-body">
              <div class="row" >
                <div class="col-sm-12">
                  <div class="team-profile">
                      <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/client_images/{{ teamprofiledata.logo }}" class="img-responsive mr-2">
                        </div>
                        <div class="col-md-10">
                      <div class="right-content"><h4><b>Name :-</b> {{ teamprofiledata.name }} </h4>
                      <h4><b>Designation :</b> {{ teamprofiledata.desig  }}</h4>
                          <h4><p ng-if="teamprofiledata.experience != 0" class="exper"><b>Exp. :</b> <span>{{ teamprofiledata.experience }} years</span></p></h4>
                           </div>
                      </div>
                    </div>
                      </div>
                      <div class="content"><p><b>Skill :</b> <span ng-repeat="(key,x2) in teamprofiledata.services">{{ x2.service }}<span ng-if="key != (teamprofiledata.services.length -1)">, </span></span></p>
                      <p><b>About :</b> <span ng-bind-html="teamprofiledata.about|trustAsHtml"></span></p>
                    <p ng-if="teamprofiledata.experiencedetail" ng-repeat="(key,x3) in teamprofiledata.experiencedetail">
                        <span><b>company Name :</b> {{ x3.experienceCompany }}</span><br>
                        <span><b>Designation :</b> {{ x3.experienceDesignation  }}</span><br>
                        <span><b>Experience :</b> {{ x3.experienceMonthStart  }}, {{ x3.experienceYearStart }}</span> To <span ng-if="x3.experienceCurrentlyWorking == 0">{{ x3.experienceMonthEnd }}, {{ x3.experienceYearEnd }} </span><span ng-if="x3.experienceCurrentlyWorking == 1">Present</span> <span ng-if="x3.experienceYear != 0">{{ x3.experienceYear }} Years ,</span><span ng-if="x3.experienceMonth != 0">{{ x3.experienceMonth  }} Month</span>
                    </p>
                      </div>
                          <hr>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">

              <button type="button" data-dismiss="modal"  class="btn btn-default" >Close</button>
            </div>
          </div>

        </div>
      </div>
      <!-- team Profile -->



      <!-- portfolio -->
      <div id="portfolioShow"  class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">{{ portfoliodata.portfolioTitle }} </h4>
            </div>
            <div class="modal-body">
              <div class="row" >

                <div class="col-sm-12">
                  <div class="team-profile">
                    <img width="100" height="100" src="<?php echo base_url(); ?>assets/portfolio/{{ portfoliodata.portfolioImage }}">
                    <h4>Website :- {{ portfoliodata.portfolioWebsite }} </h4>

                    <p>Skill : <span ng-repeat="(key,x2) in portfoliodata.services">{{ x2.service }}, </span></p>

                    <p ng-bind-html="portfoliodata.portfolioDescription|trustAsHtml"></p>


                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">

              <button type="button" data-dismiss="modal"  class="btn btn-default" >Close</button>
            </div>
          </div>

        </div>
      </div>
      <!-- portfolio -->

      <!-- contact modal -->

      <div class="modal fade" id="contactmodal" role="dialog">
        <div class="modal-dialog">

          <div class="modal-content">
            <form id="contactrequest" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">contact - {{ profile.name }}</h4>
              </div>
              <div class="modal-body">
                <div ng-if="jobs.length != 0" class="form-group">
                  <label>Job <span class="red-text">*</span></label>
                  <select ng-model="jobId"  id="jobs" class="form-control jobId" >
                    <option value="">Select job</option>

                    <option ng-repeat="(key,x) in jobs" ng-init="jobs = key" value="{{ x.jobId }}">{{ x.jobTitle }}</option>
                  </select>
                  <p ng-show="msgSubmit && jobId == ''" class="text-danger">Please select job</p>
                </div>

                <div class="form-group">
                  <label>Message <span class="red-text">*</span></label>
                  <textarea placeholder="Please enter message" ng-model="msgtext" type="text" placeholder="Message"  class="form-control message" ></textarea>
                  <p ng-show="msgSubmit && msgtext == ''" class="text-danger">Message is required.</p>
                </div>


                <div class="modal-footer">

                  <div class="btn-panel text-right">
                    <input type="button" ng-click="messagesend()" name="save" value="Submit" class="sendmsg btn btn-primary" >
                  </div>
                </div>
                <!-- <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button> -->
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- contact modal -->

      <!-- employee contact form -->
      <!-- Modal -->
      <div id="employeeContact" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Contact</h4>
            </div>
            <div class="modal-body">
              <div class="row">

                <div class="col-sm-12">
                  <div class="top-info">
                    <img src="<?php echo base_url(); ?>assets/front/images/top-seo.png"/>
                    <span>{{ emname }}</span>
                    <a href="#">{{ profile.website}}</a>
                  </div>

                </div>
                <div class="col-sm-6">
                  <div class="request-address">
                    <p>{{ profile.address1 }}
                      {{ profile.address2 }}
                      In,{{ profile.zip }}</p>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="request-btn">
                      Talk to a representative
                      <a href="tel:{{ profile.rep_ph_num }}">


                        <span>{{ profile.rep_ph_num }}</span>
                      </a>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input placeholder="Please enter name" name="text" id="name" ng-model="name" type="text" class="form-control" />
                      <p ng-show="submitrequest && name == ''" class="text-danger">Contract name is required.</p>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input placeholder="Please enter phone number" type="tel" id="phone" ng-model="phone" name="phone" type="text" class="form-control" />
                      <p ng-show="submitrequest && phone == ''" class="text-danger">Phone is required.</p>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input placeholder="Please enter company name" name="text" id="companyname" ng-model="companyname" type="text" class="form-control" />
                      <p ng-show="submitrequest && name == ''" class="text-danger">Company name is required.</p>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input placeholder="Please enter email address" name="email" id="email" ng-model="email" type="email" class="form-control" />
                      <p ng-show="submitrequest && email == ''" class="text-danger">Email Address is required.</p>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input placeholder="Please enter website" name="website" id="website" ng-model="website" type="text" class="form-control" />
                      <p ng-show="submitrequest && website == ''" class="text-danger">Website is required.</p>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">

                      <select id="service" ng-model="service" class="form-control">
                        <option value="">Select Services </option>
                        <option value="{{ x.sid }}" ng-repeat="(key,x) in services" >{{ x.name }}</option>

                      </select>
                      <p ng-show="submitrequest && service == ''" class="text-danger">Service is required.</p>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <textarea placeholder="Please enter project info" id="projectinfo" ng-model="projectinfo" class="form-control"></textarea>
                    <p ng-show="submitrequest && projectinfo == ''" class="text-danger">Project info is required.</p>
                  </div>

                </div>
              </div>
              <div class="modal-footer">

                <button type="button" ng-click="contactEmployeeSubmit()" class="btn btn-default" >Request a Quote</button>
              </div>
            </div>

          </div>
        </div>
        <!-- employee contact form -->

        <!-- review-modal -->
        <div id="review" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reviews</h4>
              </div>
              <div class="modal-body">
                <div class="tabpanel vertical-tab-sec">
                  <div class="row">
                    <div class="col-sm-3">

                      <div class="vertical-panel-left">

                        <ul class="nav nav-pills brand-pills nav-stacked" role="tablist">


                          <li ng-repeat="(key,x) in questionType" ng-class="{ 'active' : $index == 0  }" role="presentation"  class="brand-nav "><a href="#tab{{ x.id }}" aria-controls="tab{{ x.id }}" role="tab" data-toggle="tab">{{ x.name }}</a></li>
                          <!-- <li role="presentation" class="brand-nav active"><a href="#tab1" aria-controls="tab2" role="tab" data-toggle="tab">Company Background</a></li> -->

                          <!-- <li role="presentation" class="brand-nav"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Opportunities</a></li>
                          <li role="presentation" class="brand-nav"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Solutions</a></li>
                          <li role="presentation" class="brand-nav"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Results</a></li> -->
                        </ul>
                      </div>
                    </div>
                    <div class="col-sm-9">

                      <div class="vertical-panel-right">

                        <div class="tab-content">


                          <div ng-repeat="(key,x1) in reviewquestion" ng-class="{ 'active' : $index == 0  }"  role="tabpanel" class="tab-pane" id="tab{{ x1.id }}">

                            <ul>
                              <li ng-repeat="(key1,x2) in x1.question" ><span><b>Question</b>-:{{ x2.question }} </span>
                                <span><b>Answer</b>-: {{ x2.answer }} </span>
                              </li>


                            </ul>
                          </div>
                          <!-- <div role="tabpanel" class="tab-pane" id="tab2">
                          <ul>
                          <li> <span><b>Ans</b> For what projects/services did your company hire {Company / Freelancer Name}?</span>

                        </li>

                        <li><span><b>Ans</b> What were your goals for this project?</span>
                      </li>

                      <li><span><b>Ans</b> What challenge were you trying to address with {Company / Freelancer Name}?</span>


                    </li>

                  </ul>
                </div>
                <div role="tabpanel" class="tab-pane" id="tab3">
                <ul>
                <li>
                <span><b>Ans</b> How did you select this vendor?</span>

              </li>


              <li><span><b>Ans</b> Please describe the scope of the work and their involvement in greater detail.</span>


            </li>


            <li><span> <b>Ans</b> What is the team composition?  </span>

          </li>

          <li><span><b>Ans</b> What is the status of this engagement?</span>


        </li>

        <li><span><b>Ans</b> Could you provide a sense of the size of this initiative in financial terms? </span>


      </li>

      <li><span><b>Ans</b> Was the {Company / Freelancer Name} team involved in the process from planning to implementation or for just a stage?</span>

    </li>

    <li><span><b>Ans</b> What business challenge were you trying to address with {Company / Freelancer Name}?</span>

  </ul>
</div>
<div role="tabpanel" class="tab-pane" id="tab4">
<ul>
<li>
<span><b>Ans</b> What are the results of the project, and are there any statistics or metrics you can share? </span>


</li>

<li><span><b>Ans</b> How was project management arranged and how effective was it?</span>


</li>

<li><span><b>Ans</b> What distinguishes {company name / freelancer name} from other providers? </span>

</li>

<li><span><b>Ans</b>  Are there any areas they could improve?</span>


</li>

<li><span><b>Ans</b> Any advice for potential customers?</span>


</li>

</ul>

</div> -->






</div>
<!-- fields -->
</div>
</div>

</div>

</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<h2 class="maps" >Location on Google Maps </h2>
<?php
if(isset($profile->address1))
{
  //$address = $post->address; /* Insert address Here */
  $a = $profile->address1.' , '.$profile->address2.' , '.$profile->country;
  // echo '<iframe width="100%" height="450" frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $post->address)) . '&z=14&output=embed"></iframe>';
  echo '<iframe width="100%" height="250" frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+",$a)) . '&z=14&output=embed"></iframe>';
  }
  ?>




</div>

<!--
////////////////////////// -->
