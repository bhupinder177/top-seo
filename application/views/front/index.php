<div ng-cloak ng-app="myApp" ng-controller="myCtrt">
<div class="banner-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="banner-left-cont">
                    <div class="nav nav-bar">
                        <ul class="list inline">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Men
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Page 1-1</a></li>
                                    <li><a href="#">Page 1-2</a></li>
                                    <li><a href="#">Page 1-3</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Women
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Page 1-1</a></li>
                                    <li><a href="#">Page 1-2</a></li>
                                    <li><a href="#">Page 1-3</a></li>
                                </ul>
                            </li>

                        </ul>

                    </div>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="banner-right-cont">
                    <ul>
                        <li>
                            <div class="form-group">
                                <span class="addon"> <i class="fas fa-angle-down"></i></span>
                                <select class="form-control">

                                    <option>Select Industries </option>
                                    <option>Select Industries</option>
                                    <option>Select Industries</option>
                                </select>
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <span class="addon"> <i class="fas fa-angle-down"></i></span>
                                <select class="form-control">
                                    <option>Select Services <i class="fa fa-angle-down"></i></option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <span class="addon"> <i class="fas fa-angle-down"></i></span>
                                <select class="form-control">
                                    <option>Select Country <i class="fa fa-angle-down"></i></option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <input class="form-control search-btn" type="button" name="search" value="search" />
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="banner-btm">
    <div class="container"> -->

        <!-- <a class="btn want-hire-btn" href="#freelancer-list"><i class="fa fa-briefcase"></i> I want to hire</a>
        <a class="btn work-btn" href="<?php echo base_url(); ?>find-work"><i class="fa fa-user"></i> I want to work </a>
        <a class="btn support-btn" href="#"><i class="fa fa-comment"></i> Support Chat</a> -->


    <!-- </div>
</div> -->
<div class="freelace-search-sec banner-btm-search">
    <div class="container">
  <h1>Explore the world's leading local and global companies to find the one that suits your business needs</h1>
    <ul>
      <!-- <li>
          <div class="form-group">
              <span class="addon"> <i class="fas fa-angle-down"></i></span>
              <select  id="industry" ng-model="industry" class="form-control">
                  <option value="">Select industry</option>
                  <option  ng-repeat="(key,x) in allindustry" ng-init="allindustry = key" value="{{ x.name | underscoreless | lowercase }}">{{ x.name }}</option>

              </select>
          </div>
      </li> -->

        <li>
            <div class="form-group">
                <span class="addon"> <i class="fas fa-angle-down"></i></span>
                <select id="service" ng-model="service" class="form-control">

                    <option  value="">Select Service</option>
                    <!-- <option  ng-repeat="(key,x) in allservice" ng-init="allservice = key" value="{{ x.name | underscoreless | lowercase }}">{{ x.name }}</option> -->
                    <option value="{{ x.name | join | lowercase }}" ng-repeat="(key,x) in allservice" ng-init="allservice = key" value="{{ key }}">{{ x.name }}</option>


                </select>
                <p ng-cloak ng-show="searchv && service == ''" class="text-danger homeerrormsg">Please select service.</p>


            </div>
        </li>
        <li>
            <div class="form-group">
                <span class="addon"> <i class="fas fa-angle-down"></i></span>
                <select id="country" ng-model="country" class="form-control">
                    <option value="">Select Country</option>
                    <option value="{{ x.name | lowercase | join }}" ng-repeat="(key,x) in allcountry" ng-init="allcountry = key" value="{{ x.name | underscoreless | lowercase }}">{{ x.name }}</option>

                </select>
            </div>
        </li>
        <!-- <li>
            <div class="form-group">
                <span class="addon"> <i class="fas fa-angle-down"></i></span>
                <select id="country" ng-model="country" class="form-control">
                    <option value="">Select State</option>
                    <option data-name="{{ x.name | underscoreless | lowercase }}" ng-repeat="(key,x) in allcountry" ng-init="allcountry = key" value="{{ x.name | underscoreless | lowercase }}">{{ x.name }}</option>

                </select>
            </div>
        </li>
        <li>
            <div class="form-group">
                <span class="addon"> <i class="fas fa-angle-down"></i></span>
                <select id="country" ng-model="country" class="form-control">
                    <option value="">Select City</option>
                    <option data-name="{{ x.name | underscoreless | lowercase }}" ng-repeat="(key,x) in allcountry" ng-init="allcountry = key" value="{{ x.name | underscoreless | lowercase }}">{{ x.name }}</option>

                </select>
            </div>
        </li> -->

        <li class="freelancer-search">
          <div class="form-group">
            <button ng-click="search()" class="form-control search-btn">Search Latest Rankings</button>
          </div>
        </li>
      </ul>
</div>
</div>
<div class="how-it-work-sec">
    <div class="container-fluid">
        <h2 class="text-center">How it Works</h2>
        <div class="work-circle">
            <ul>
              <?php
              if(!empty($works))
              {
                $i = 1;
                foreach($works as $w)
                {
                   if($i <= 5)
                   {
              ?>
                <li><img src="<?php echo base_url(); ?>assets/howitworks/<?php echo $w->image; ?>" alt="'" />
                    <h2><?php echo $w->title; ?></h2>
                    <p><?php echo $w->description; ?></p>
                </li>
              <?php $i++; } } } ?>
              <!-- section -->
                <!-- <li><img src="<?php echo base_url(); ?>assets/front/images/assign-project-ic.png" alt="'" />
                    <h2>Assign Project<br>
                        &amp; Tasks</h2>
                    <p>Assign Project<br> &amp; Tasks for
                        your project.</p>
                </li>
                <li><img src="<?php echo base_url(); ?>assets/front/images/project-delivery-ic.png" alt="'" />
                    <h2>Project Delivey<br>
                        Managed</h2>
                    <p>Scrum &amp; Project Delivey Managed
                        by Us at no extra cost.</p>
                </li>
                <li><img src="<?php echo base_url(); ?>assets/front/images/design-final-ic.png" alt="'" />
                    <h2>Designs<br>
                        Finalised </h2>
                    <p>Design is polished and tweaked with further
                        feedback until completed.</p>
                </li>
                <li><img src="<?php echo base_url(); ?>assets/front/images/pay-ic.png" alt="'" />
                    <h2>Pay When<br>
                        Satisfied</h2>
                    <p>Pay Only when task is done as
                        Scrum Managed by Us.

                    </p>
                </li> -->
            </ul>
        </div>
    </div>
</div>
<div  id="freelancer-list"  class="freelance-world-sec">
    <div class="container-fluid">
        <h3 class="text-center">HIRE THE TOP TALENT IN Freelance WORLD</h3>
        <div class="freelace-search-sec">
            <ul>
                <li>
                    <div class="form-group">
                        <span class="addon"> <i class="fas fa-angle-down"></i></span>
                        <select onchange="angular.element(this).scope().country1(this)" class="form-control">

                            <option  value='101'>Select Country</option>
                            <option ng-repeat="(key,x) in allcountry" ng-init="allcountry = key" value="{{ x.id }}">{{ x.name }}</option>

                        </select>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <span class="addon"> <i class="fas fa-angle-down"></i></span>
                        <select id="service" onchange="angular.element(this).scope().getservice(this)" class="form-control">

                            <option  value=''>Select Service</option>
                            <option data-name="{{ x.name | underscoreless }}" ng-repeat="(key,x) in allservice" ng-init="allservice = key" value="{{ key }}">{{ x.name }}</option>

                        </select>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <span class="addon"> <i class="fas fa-angle-down"></i></span>
                        <select onchange="angular.element(this).scope().gethours(this)" class="form-control">
                            <option value="">Select Hourly Rate <i class="fa fa-angle-down"></i></option>
                            <option value="1">$10/hr and below</option>
                            <option value="2">$10/hr - $30/hr</option>
                            <option value="3">$30/hr - above</option>
                        </select>
                    </div>
                </li>
                <li>

                    <div class="form-group">
                        <span class="addon"> <i class="fas fa-angle-down"></i></span>
                        <select onchange="angular.element(this).scope().sort(this)" class="form-control">
                            <option value="">Sort By <i class="fa fa-angle-down"></i></option>
                            <option value="1">Hourly rate: Low to High</option>
                            <option value="2">Hourly rate: High to Low</option>
                        </select>
                    </div>
                </li>

            </ul>
        </div>
        <div class="freelancerphp freelance-bx" id="top-freelancer">
            <?php
                           // echo "<pre>";
                           // print_r($result);
                           // die;
                          if(!empty($result))
                          {
                            foreach($result as $res)
                            {
                              ?>
            <div class="free-bx">
                <div class="boxtopbar">
                    <span class="hour">
                        <?php echo $res->code.' '.$res->symbol.' '.$res->maxPrice; ?><em>/hr</em></span>
                    <?php
                                  if(!empty($res->company_logo))
                                  {
                                    ?>
                    <div class="img-right">

                        <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $res->company_logo; ?>" class="freelance-img" >
                    </div>
                    <?php
                                  }
                                  ?>
                </div>


                <div class='freelancerimage'>
                  <?php if(!empty($res->logo))
                  {
                    ?>
                    <img class="freelance-img"  src="<?php echo base_url(); ?>assets/client_images/<?php echo $res->logo ?>" />
              <?php } ?>
                    <?php if($res->online == 1)
                          {
                            ?>
                    <span class="odot"></span>
                    <?php }
                          else if($res->online == 0)
                          {
                          ?>
                    <span class="fdot"></span>
                    <?php } ?>
                </div>

                <?php if($res->score >= 90 && $res->totalearning >= 500 && $res->jobcount >= 3  )
                                {
                                  ?>
                <img src="<?php echo base_url(); ?>assets/front/images/top-rated.png" />
                <span>Top Rated</span>
                <?php } ?>

                <span>
                    <i class="fa fa-star <?php if($res->rating >= 1){ echo "checked"; } ?>" ></i>
                    <i class="fa fa-star <?php if($res->rating >= 2){ echo "checked"; } ?>" ></i>
                    <i class="fa fa-star <?php if($res->rating >= 3){ echo "checked"; } ?>" ></i>
                    <i class="fa fa-star <?php if($res->rating >= 4){ echo "checked"; } ?>" ></i>
                    <i class="fa fa-star <?php if($res->rating >= 5){ echo "checked"; } ?>" ></i>
                </span>
                <strong>
                    <?php echo $res->name; ?></strong>
                <!-- <em>
                    <?php //echo $res->service; ?></em> -->
                <div class="location">
                    <ul>
                        <li>Location</li>


                        <li>
                            <?php echo  $res->country; ?> <i class="flag-icon flag-icon-<?php echo strtolower($res->scountry); ?>"></i>
                        </li>
                        <li>Job Success</li>

                        <li>
                            <?php echo $res->score; ?>%</li>
                    </ul>
                </div>
                <div class="btns" style="margin-top: 8px;">
                    <?php if($res->type == 2 && $res->parent == 0)
                                  {
                                    $clink = str_replace(' ','-',strtolower($res->c_name.'-'.$res->u_id));

                                    ?>
                    <a href="<?php echo base_url(); ?>profile/<?php echo $clink; ?>" class="btn btn-primary">Company Profile</a>
                    <?php
                                  }
                                  else if($res->type == 3 && $res->parent == 0)
                                  {
                                    $flink = str_replace(' ','-',strtolower($res->name.'-'.$res->u_id));

                                    ?>
                    <a href="<?php echo base_url(); ?>profile/<?php echo $flink; ?>" class="btn btn-primary">Company Profile</a>
                    <?php
                                  }
                                  else if($res->type == 3 && $res->parent != 0)
                                  {
                                    $clink = str_replace(' ','-',strtolower($res->company_link.'-'.$res->parent));

                                    ?>
                    <a href="<?php echo base_url(); ?>profile/<?php echo $clink; ?>" class="btn btn-primary">Company Profile</a>
                    <?php
                                  }
                                  ?>
                    <?php

                                  if(isset($this->session->userdata['clientloggedin']))
                                   {

                                    if($this->session->userdata['clientloggedin']['type'] == 4)

                                    {

                                      ?>

                    <a ng-click="checkcontact('<?php echo $res->u_id ?>','<?php echo $res->name; ?>','<?php echo $res->logo; ?>')" class="usercontact btn btn-primary">Contact</a>

                    <?php }

                                  }

                                  else{

                                    ?>

                    <a class="btn btn-primary" href="<?php echo base_url(); ?>client/home">Contact</a>

                    <?php

                                  }

                                  ?>
                </div>
            </div>
            <?php
                                      }
                                         }
                                   ?>




            <div class="clearfix"></div>
            <div class="btn-sec">
                <a class="btn hire-btn" href="<?php echo base_url(); ?>hire/local-seo-experts">View More</a>

            </div>
        </div>

        <!-- angular js -->

        <div style="display:none" class="freelancerangular freelance-bx">
            <div ng-if="results.length != 0" class="free-bx" ng-repeat="(key,x) in results" ng-init="results = key">
                <div class="boxtopbar">
                    <span class="hour">{{ x.code }} {{ x.symbol }} {{ x.maxPrice }}<em>/hr</em></span>
                    <div ng-if="x.company_logo" class="img-right">
                        <img src="<?php echo base_url(); ?>assets/client_images/{{ x.company_logo }}" class="freelance-img" width="50px" height="30px">
                    </div>

                </div>
                <div class='freelancerimage'>
                    <img class="freelance-img" height="100px" width="100px" src="<?php echo base_url(); ?>assets/client_images/{{ x.logo }}" />

                    <span ng-if="x.online == 1" class="odot"></span><span ng-if="x.online == 0" class="fdot"></span>

                </div>



                <img ng-if="successscore.score >= 90 && successscore.totalearning >= 500 && successscore.jobcount >= 3" src="<?php echo base_url(); ?>assets/front/images/top-rated.png" />
                <span ng-if="successscore.score >= 90 && successscore.totalearning >= 500 && successscore.jobcount >= 3">Top Rated</span>


                <span>
                    <i class="fa fa-star " ng-class="{ 'checked' :  x.rating >= 1  }"></i>
                    <i class="fa fa-star " ng-class="{ 'checked' :  x.rating >= 2  }"></i>
                    <i class="fa fa-star " ng-class="{ 'checked' :  x.rating >= 3  }"></i>
                    <i class="fa fa-star" ng-class="{ 'checked' :  x.rating >= 4  }"></i>
                    <i class="fa fa-star" ng-class="{ 'checked' :  x.rating >= 5  }"></i>
                </span>
                <strong>{{ x.name }}</strong>
                <!-- <em>{{ x.service }}</em> -->
                <div class="location">
                    <ul>
                        <li>Location</li>


                        <li>{{ x.country }} <i class="flag-icon flag-icon-{{ x.scountry | lowercase}}"></i>
                        </li>
                        <li>Job Success</li>
                        <li>{{ x.score }}%</li>
                    </ul>
                </div>
                <div class="btns" style="margin-top: 8px;">

                    <a ng-if="x.type == 2 && x.parent == 0" href="<?php echo base_url(); ?>profile/{{ x.c_name | lowercase | underscoreless }}-{{ x.u_id }}" class="btn btn-primary">Company Profile</a>
                    <a ng-if="x.type == 3 && x.parent == 0" href="<?php echo base_url(); ?>profile/{{ x.name | lowercase | underscoreless }}-{{ x.u_id }}" class="btn btn-primary">Company Profile</a>
                    <a ng-if="x.type == 3 && x.parent != 0" href="<?php echo base_url(); ?>profile/{{ x.company_link | lowercase | underscoreless }}-{{ x.parent }}" class="btn btn-primary">Company Profile</a>


                    <?php

                              if(isset($this->session->userdata['clientloggedin']))


                              {

                                if($this->session->userdata['clientloggedin']['type'] == 4)

                                {

                                  ?>



                    <a ng-click="checkcontact(x.u_id,x.name,x.logo)" class="usercontact btn btn-primary">Contact</a>

                    <?php }

                              }

                              else{

                                ?>

                    <a class="btn btn-primary" href="<?php echo base_url(); ?>client/home">Contact</a>

                    <?php

                              }

                              ?>
                </div>
            </div>
            <center ng-if="results.length == 0">
                <h4>No record Found</h4>
            </center>

            <div ng-if="results.length != 0" class="clearfix"></div>
            <div ng-if="results.length != 0" class="btn-sec">
                <a ng-if="url == ''" class="btn hire-btn" href="<?php echo base_url(); ?>hire/local-seo-experts">View More</a>
                <a ng-if="url != ''" class="btn hire-btn" href="<?php echo base_url(); ?>hire/{{ url | underscoreless | lowercase }}">View More</a>
            </div>

        </div>
        <!-- angular js -->

        <!-- comtract modal -->

        <div class="modal fade" id="contactmodal" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                    <form id="contactrequest">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Contact - {{ username }} </h4>
                        </div>
                        <div class="modal-body">
                            <div ng-if="jobs.length != 0" class="form-group">
                                <label>Job <span class="red-text">*</span></label>
                                <select ng-model="jobId" id="jobs" class="form-control jobId">
                                    <option value="">Select job </option>

                                    <option ng-repeat="(key,x) in jobs" ng-init="jobs = key" value="{{ x.jobId }}">{{ x.jobTitle }}</option>
                                </select>
                                <p ng-show="msgSubmit && jobId == ''" class="text-danger">Please select job</p>
                            </div>

                            <div class="form-group">
                                <label>Message <span class="red-text">*</span></label>
                                <textarea ng-model="msgtext" type="text" placeholder="Please enter message" class="form-control message"></textarea>
                                <p ng-show="msgSubmit && msgtext == ''" class="text-danger">Message is required.</p>
                            </div>


                            <div class="modal-footer">

                                <div class="btn-panel text-right">
                                    <input type="button" ng-click="messagesend()" name="save" value="Submit" class="sendmsg btn btn-primary">
                                </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- contract modal -->




    </div>
</div>
<div class="industry-sec">
  <div class="container">
    <h4 class="text-center">Gain Access to a Network of Top Industry Experts</h4>
    <div class="row">

      <div class="col-sm-12">
        <div class="industry-sec-div" style="width: 40%;float:left;">
    	<img class="industry-sec-img" style="width: 440px; height: 520px;" src="<?php echo base_url(); ?>assets/front/images/client-left-img.png">
    </div>
        <div class="industry-m-bx">
          <div class="row">

            <?php if(!empty($topindustry))

            {

              $i =1;

              foreach($topindustry as $top)

              {

                if($i <= 4)
                {

                  ?>

                  <div class="col-sm-6">

                    <a href="<?php echo base_url(); ?><?php echo strtolower($top->url) ?>" class="ssBox">

                      <div class="ssTable-hvr">

                        <div class="ssTableCell-hvr">



                          <p><?php echo $top->description; ?></p>

                        </div>

                      </div>

                      <div class="ssTable">

                        <div class="ssTableCell">

                          <div class="ssIcn">



                            <img src="<?php echo base_url(); ?>assets/top_industry/<?php echo $top->icon; ?>" />

                          </div>

                          <div class="ssName">


                            <h4><?php echo $top->title; ?></h4>

                          </div>

                        </div>

                      </div>


                      <img src="<?php echo base_url(); ?>assets/top_industry/<?php echo $top->image; ?>" class="img-fluid ssImg" alt="hire freelancer Search Engine Optimization">

                    </a>

                  </div>

                  <?php $i++; }

                }

              }

              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


     <div class="Drive text-center">
         <div class="container">
         <h5>Our Company Values Drive Everything We Do</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="main-ad text-center">
                         <span><img src="<?php echo base_url(); ?>assets/front/images/trustworthy.png"></span>
                    <div class="below_ad">
                        <h3>Trustworthy</h3>
                        <p>We strive to be worthy of the trust businesses and service providers place in us to serve their best intrests.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-ad text-center">
                         <span><img src="<?php echo base_url(); ?>assets/front/images/accountable.png"></span>
                    <div class="below_ad">
                        <h3>Accountable</h3>
                        <p>We exhibit a bias-to-action to serve the needs of our partners first and foremost.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-ad text-center">
                         <span><img src="<?php echo base_url(); ?>assets/front/images/Collaborative.png"></span>
                    <div class="below_ad">
                        <h3>Collaborative</h3>
                        <p>We work closely with our partners to understand their challanges and bring solutions to market.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-ad text-center">
                         <span><img src="<?php echo base_url(); ?>assets/front/images/Transparent.png"></span>
                    <div class="below_ad">
                        <h3>Transparent</h3>
                        <p>We are transparent about our processes and services and strive to bring honestly to the market.</p>
                    </div>
                </div>
            </div>
          </div>
      </div>
         <div class="btn-sec">
                <a class="btn hire-btn" href="<?php echo base_url(); ?>membership">Start Now</a>

            </div>
      </div>



<!-- blog section -->
  <div class="blog-section">
    <div class="container-fluid">
      <h5 class="text-center">Blog
         <span>Know everything that your website needs in order to sustain and succeed online. Our blog has some of the best things for entrepreneurs, marketers and web freaks to read on the internet. Here they get useful insights to start and manage a business online.
</span>

        </h5>

      <div class="row">

        <div class="col-md-12">
          <div class="blog-m-bx">
            <div class="row">
              <?php
              if(!empty($blog))
              {
                foreach($blog as $b)
                {
                  if(isset($b->url))
                  {
                   $link = str_replace(' ', '-',strtolower($b->url.'-'.$b->blogId));
                  }
                  else
                  {
                    $link = str_replace(' ', '-',strtolower($b->title.'-'.$b->blogId));
                  }
              ?>
              <div class="col-md-4">
                  <div class="blog-bx">
              <a href="<?php echo base_url().'post/'.$link; ?>">
                <?php
										$img = FCPATH.'assets/blog/'.$b->image;
										if (file_exists($img))
                    { ?>
                <img height="200" width="350" src="<?php echo base_url(); ?>assets/blog/<?php echo $b->image; ?>">
              <?php }
              else
              {
                ?>
                <img height="200" width="350" src="<?php echo base_url(); ?>assets/blog/noimage.jpg">
              <?php } ?>
              </a>
              <h1><a href="<?php echo base_url().'post/'.$link; ?>"><?php echo ucwords($b->title); ?></a></h1>
              <span><?php echo $b->category; ?></span>
              <p><?php $a = substr($b->description, 0, 270);
              echo strip_tags($a);

              ?></p>
                      <a href="<?php echo base_url().'post/'.$link;?>" class="read-more">Read more</a>
              <!-- <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $b->author; ?>   <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $newDate = date("d-M-Y", strtotime($b->date)); ?> </p> -->
</div>
              </div>
            <?php } } ?>


      </div>
     </div>
     </div>
      </div>
     </div>
   </div>
<!-- blog section -->
<div class="testimonial-sec">

    <h6 class="text-center">What Clients Say About us</h6>

    <div class="carousel slide" data-ride="carousel" id="testimonial-carousel">
        <div class="container-fluid">
            <div class="test-img">
                <img class="img-circle" src="<?php echo base_url(); ?>assets/front/images/test-img1.png" alt="">
            </div>
            <!-- Bottom Carousel Indicators -->
            <ol class="carousel-indicators">
                <?php
                if(!empty($testimonial))
                { $i =0;
                  foreach($testimonial as $t)
                  {
                ?>
                <li data-target="#testimonial-carousel" data-slide-to="<?php echo $i; ?>" <?php if($i == 0){ ?> class="active" <?php } ?>></li>
              <?php $i++; } } ?>
                <!-- <li data-target="#testimonial-carousel" data-slide-to="1"></li>
                <li data-target="#testimonial-carousel" data-slide-to="2"></li> -->
            </ol>

            <!-- Carousel Slides / Quotes -->
            <div class="carousel-inner">

                <!-- Quote 1 -->
                 <?php
                 if(!empty($testimonial))
                 {
                   $i =0;
                   foreach($testimonial as $t)
                   {

                  ?>
                <div class="item <?php if($i == 0) { ?>active <?php } ?>">

                    <div class="row">

                        <div class="col-sm-9">
                            <small><?php echo $t->title; ?></small>
                            <span><?php echo $t->designation; ?></span>
                            <p><?php echo $t->description; ?></p>

                        </div>
                    </div>

                </div>
              <?php $i++; } }  ?>
                <!-- <div class="item">

                    <div class="row">

                        <div class="col-sm-9">
                            <small>Smantha Parker</small>
                            <span>1way Manager</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                        </div>
                    </div>
                </div> -->

                <!-- <div class="item">

                    <div class="row">

                        <div class="col-sm-9">
                            <small>Smantha Parker</small>
                            <span>1way Manager</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                        </div>
                    </div>
                </div> -->

            </div>

        </div>
    </div>

</div>


<div class="brand-logo">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="brand-bx">
                    <img src="<?php echo base_url(); ?>assets/front/images/brand1.png" /></div>
            </div>
            <div class="col-sm-3">
                <div class="brand-bx">
                    <img src="<?php echo base_url(); ?>assets/front/images/brand2.png" /></div>
            </div>

            <div class="col-sm-3">
                <div class="brand-bx">
                    <img src="<?php echo base_url(); ?>assets/front/images/brand3.png" /></div>
            </div>
            <div class="col-sm-3">
                <div class="brand-bx">
                    <img src="<?php echo base_url(); ?>assets/front/images/brand4.png" /></div>
            </div>
        </div>
    </div>
</div>

</div>
