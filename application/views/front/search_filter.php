  <!-- <div class="banner-sec">
  <div class="container">
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
  </div> -->

  <div class="banner-sec"></div>
  <div ng-cloak ng-app="myApp6" ng-controller="myCtrt6" class="freelance-world-sec hire-main-sec">
  <div class="container-fluid">
  <!-- <div  class="content" ><?php //if(isset($content)){ echo $content; } ?></div> -->
  <?php

  ?>
  <h2 class="text-center"><b>CHAT</b> AND <b>HIRE</b> THE <b><?php echo strtoupper(str_replace("-"," ",$this->uri->segment(2)));  ?></b><br> <b>EXPERTS</b> IN <b>FREELANCE</b> WORLD</h2>
  <div class="freelace-search-sec">
  <ul>
  <li>
  <div class="form-group">
  <span class="addon"> <i class="fas fa-angle-down"></i></span>
  <select onchange="angular.element(this).scope().country1(this)"   class="form-control">

  <option value = ''>Any Country</option>
  <option ng-repeat="(key,x) in allcountry" ng-init="allcountry = key" value="{{ x.id }}">{{ x.name }}</option>

  </select>
  </div>
  </li>

  <li>
  <div class="form-group">
  <span class="addon"> <i class="fas fa-angle-down"></i></span>
  <select onchange="angular.element(this).scope().gethours(this)" class="form-control">
  <option value="">Any Hourly Rate <i class="fa fa-angle-down"></i></option>
  <option value="1">$10/hr and below</option>
  <option value="2">$10/hr - $30/hr</option>
  </select>
  </div>
  </li>
  <li>

  <div class="form-group">
  <span class="addon"> <i class="fas fa-angle-down"></i></span>
  <select onchange="angular.element(this).scope().sort(this)" class="form-control">
  <option value="">Sort By <i class="fa fa-angle-down"></i></option>
  <option value="1">Hourly rate: Low to High</option>
  <option  value="2">Hourly rate: High to Low</option>
  </select>

  </div>
  </li>
  <!-- <li>
  <div class="form-group">
  <input class="form-control search-btn" type="button" name="search" value="Get Started" />
  </div>
  </li> -->
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
  if($res->company_logo != '')
  {
  ?>
  <div class="img-right">

  <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $res->company_logo; ?>" class="freelance-img" width="50px" height="30px">
  </div>
  <?php
  }
  ?>
  </div>


  <div class='freelancerimage'>
  <img class="freelance-img" height="100px" width="100px" src="<?php echo base_url(); ?>assets/client_images/<?php echo $res->logo ?>" />
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
  <em>
  <?php echo $res->service; ?></em>
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
  <a href="<?php echo base_url(); ?>profile/<?php echo $clink; ?>" class="btn btn-primary">View Profile</a>
  <?php
  }
  else if($res->type == 3 && $res->parent == 0)
  {
  $flink = str_replace(' ','-',strtolower($res->name.'-'.$res->u_id));

  ?>
  <a href="<?php echo base_url(); ?>profile/<?php echo $flink; ?>" class="btn btn-primary">View Profile</a>
  <?php
  }
  else if($res->type == 3 && $res->parent != 0)
  {
  $clink = str_replace(' ','-',strtolower($res->company_link.'-'.$res->parent));

  ?>
  <a href="<?php echo base_url(); ?>profile/<?php echo $clink; ?>" class="btn btn-primary">View Profile</a>
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

  </div>

  <!-- angular js -->

  <div style="display:none" class="freelancerangular freelance-bx">
  <div ng-if="results.length != 0" class="free-bx" ng-repeat="(key,x) in results" ng-init="results = key">
  <div class="boxtopbar">
  <span class="hour">{{x.code}} {{x.symbol}} {{ x.maxPrice }}<em>/hr</em></span>
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
  <em>{{ x.service }}</em>
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

  <a ng-if="x.type == 2 && x.parent == 0" href="<?php echo base_url(); ?>profile/{{ x.c_name | lowercase | underscoreless }}-{{ x.u_id }}" class="btn btn-primary">View Profile</a>
  <a ng-if="x.type == 3 && x.parent == 0" href="<?php echo base_url(); ?>profile/{{ x.name | lowercase | underscoreless }}-{{ x.u_id }}" class="btn btn-primary">View Profile</a>
  <a ng-if="x.type == 3 && x.parent != 0" href="<?php echo base_url(); ?>profile/{{ x.company_link | lowercase | underscoreless }}-{{ x.parent }}" class="btn btn-primary">View Profile</a>


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




  <div ng-if="results.length != 0"  class="clearfix"></div>
  <div ng-if="results.length != 0" class="btn-sec">
  <!-- <a class="btn hire-btn" href="#">View More</a> -->
  </div>



  <div  class="content" >
  <div class="rank-listing-content">
  <div class="container">
  <?php if(isset($content)){ echo $content; } ?></div></div>
  </div>
  </div>
  </div>
