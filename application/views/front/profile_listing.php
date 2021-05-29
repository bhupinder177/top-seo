<div ng-cloak ng-app="myApp5" ng-controller="myCtrt5">
 <div class="banner-sec"></div>
<div class="container-fluid">

    <div class="profile-listing-sec ranking-page-sec">


        <?php if(!empty($content->heading))
        {
          ?>
        <h1><span><?php echo $content->heading; ?></span> </h1>
      <?php }
      else
      {
        ?>
        <h1><span><?php if(count($result) > 0) echo count($result); ?> Best <?php if(isset($industry)) { echo $industry; } ?> <?php if(isset($service)) {   echo $service; } ?> companies <?php if(isset($country)){ ?>in <?php if(!empty($city)  && $city != 'city'){ echo $city.', '; } ?><?php if(!empty($state)  && $state != 'state'){ echo $state.','; } ?> <?php echo $country; } ?> (<?php echo date("M"); ?>-<?php echo date("Y"); ?>)</span> </h1>
      <?php } ?>    <!-- <div class="content" ><?php //if(!empty($content)){ echo $content->content; } ?></div> -->

            <div class="freelace-search-sec">
                <ul>
                  <li>
                      <div class="form-group">
                          <span class="addon"> <i class="fas fa-angle-down"></i></span>
                          <select  id="industry"  class="form-control">
                              <option value="">Select Industry</option>
                              <option  ng-repeat="(key,x) in allindustry" ng-selected="{{ x.id }} == <?php echo $industryId; ?>" value="{{ x.name | underscoreless | lowercase }}">{{ x.name }}</option>

                          </select>
                      </div>
                  </li>

                    <li>
                        <div class="form-group">
                            <span class="addon"> <i class="fas fa-angle-down"></i></span>
                            <select id="service"  class="form-control">

                                <option  value="">Select Service</option>
                                <option  ng-repeat="(key,x) in allservice" ng-selected="{{ x.id }} == <?php echo $serviceId; ?>" value="{{ x.name | underscoreless | lowercase }}">{{ x.name }}</option>

                            </select>
                            <p ng-cloak ng-show="searchv && service == ''" class="text-danger homeerrormsg1">Please select service.</p>


                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <span class="addon"> <i class="fas fa-angle-down"></i></span>
                            <select id="country"  class="form-control">
                                <option value="">Select Country</option>
                                <option data-name="{{ x.name | underscoreless | lowercase }}"  ng-repeat="(key,x) in allcountry" ng-selected="{{ x.id }} == <?php echo $countryId; ?>"  value="{{ x.name | underscoreless | lowercase }}">{{ x.name }}</option>

                            </select>
                        </div>
                    </li>

                    <li class="freelancer-search">
                      <div class="form-group">
                        <button ng-click="search()" class="form-control search-btn">Search</button>
                      </div>
                    </li>
                  </ul>
            </div>
        <div class="rank-main-info">
<div class="rank-info">
        <div class="bg-blue-theme desktop-view">
            <!-- <div class="col-sm-1">Rank</div>
            <div class="col-sm-2">Company Name</div>
            <div class="col-sm-1">Year Founded</div>
            <div class="col-sm-1">Active Clients</div>
            <div class="col-sm-1">Industry</div>
            <div class="col-sm-1">Pricing</div>
            <div class="col-sm-1">Major Clients</div>
            <div class="col-sm-2">Core Services</div>
            <div class="col-sm-1 ">Reviews</div>
            <div class="col-sm-1 rating">Rating</div> -->
            <div class="col-sm-1 col-md-1 col-xs-1 rank-bx first">Rank</div>
           <div class="col-sm-2 col-md-2 col-xs-2 rank-bx second">Company Name</div>
           <div class="col-sm-1 col-md-1 col-xs-1 year-bx">Year Founded</div>
           <div class="col-sm-1 col-md-1 col-xs-1 year-bx">Active Clients</div>
           <div class="col-sm-1 col-md-1 col-xs-1 year-bx">Industry</div>
           <div class="col-sm-1 col-md-1 col-xs-1">Pricing</div>
           <div class="col-sm-1 col-md-1 col-xs-1 year-bx">Major Clients</div>
           <div class="col-sm-1 col-md-1 col-xs-1">Core Services</div>
             <div class="col-sm-2 col-md-2 col-xs-2 review year-bx">Reviews</div>
           <div class="col-sm-1 col-md-1 col-xs-1 rating year-bx">Rating</div>

        </div>
        <?php  if(!empty($result))
              {
                $i = 1;
                foreach($result as $res)
                {

                ?>

        <div class="rank-details desktop-view" >
            <div class="col-sm-1 col-md-1 col-xs-1 rank-bx first">#<?php echo $i++; ?></div>
            <div class="col-sm-2 col-md-2 col-xs-2 rank-bx second">
                <div class="address-sec">
                  <?php if($res->type == 3)
                  {
                    ?>
                  <span><b><?php echo $res->name; ?> </b><a href="tel:<?php echo $res->rep_ph_num; ?>"><i class="fa fa-phone"></i> <?php echo $res->rep_ph_num; ?></a></span>
                <?php } ?>
                <a href="#" target="_blank"><b><?php echo $res->c_name; ?></b></a>
                <span><?php echo $res->address1; ?></span>
                <span><?php echo $res->city; ?>, <?php echo $res->state; ?>, <?php echo $res->country; ?></span>




<!-- {{ x.name | lowercase | underscoreless }}-{{ x.u_id }} -->
<!-- test -->
<div class="address-btn">
  <?php if($res->type == 2)
  {
    ?>
     <span><b><?php echo $res->name; ?> </b><a href="tel:<?php echo $res->rep_ph_num; ?>"><i class="fa fa-phone"></i> <?php echo $res->rep_ph_num; ?></a></span>
     <?php
   }
   if($res->type == 2)
                        {
                          ?>
                <a class="visit-web" href="<?php echo base_url(); ?>profile/<?php echo $name = str_replace(' ','-',strtolower($res->c_name.'-'.$res->u_id)); ?>" target="_blank">visit profile</a>
              <?php
                    }
                    else if($res->type == 3)
                     {
                      ?>
                <a class="visit-web" href="<?php echo base_url(); ?>profile/<?php echo $name = str_replace(' ','-',strtolower($res->name.'-'.$res->u_id)); ?>" target="_blank">visit profile</a>
              <?php } ?>
                <a class="visit-web" href="<?php echo $res->website; ?>" target="_blank">Visit Website</a>
              </div>
            </div>
                </div>
            <div class="col-sm-1 col-md-1 col-xs-1 rank-bx year-bx"><?php echo date("d-m-Y", strtotime($res->year)); ?></div>
            <div class="col-sm-1 col-md-1 col-xs-1 rank-bx year-bx"><?php echo count($res->client); ?></div>
          <div class="col-sm-1 col-md-1 col-xs-1  rank-bx year-bx">
            <?php if(!empty($res->industry))
                  {
                    foreach($res->industry as $s)
                    {
                    ?>
            <a ><?php echo $s->industry; ?></a>
          <?php
                   }
                 }
                      ?>
          </div>
            <div class="col-sm-1 col-md-1 col-xs-1 rank-bx">
              <?php if($res->type == 2)
              {
                ?>
                <?php  echo $res->code .' '. $res->symbol.' '. $res->minPrice; ?>- <?php echo $res->code .' '. $res->symbol .' '. $res->maxPrice; ?> per hour
          <?php }
                  else if($res->type == 3)
                  {
                  ?>
                  <?php  echo $res->code .' '. $res->symbol .' '.$res->maxPrice; ?> per hour
                  <?php
                  }
                  ?>
              </div>
            <div class="col-sm-1 col-md-1 col-xs-1 rank-bx year-bx">
               <p>
                 <?php
                        if(!empty($res->client))
                       {
                         foreach($res->client as $c)
                         {
                      ?>
                <a><?php echo $c->name; ?></a>
                    <?php }
                            }
                            else
                            {
                              echo "N-A";
                            }
                             ?>
               </p>
              </div>
            <div class="col-sm-1 col-md-1 col-xs-1 rank-bx">
                <p>
                  <?php if(!empty($res->services))
                        {

                          foreach($res->services as $s)
                          {

                            $name = str_replace(' ','_',strtolower($s->service));

                          ?>
                  <a href="<?php echo base_url(); ?>best-<?php echo $name; ?>-companies"><?php echo $s->service; ?></a>
                <?php
                         }
                       }
                            ?>
                </p>
            </div>
            <div class="col-sm-2 col-md-2 col-xs-2 rank-bx review year-bx">
              <?php
                  if(isset($res->star))
                  {
                   ?>
                   <span class="fa <?php if($res->star >= 1) { ?> fa-star checked <?php } ?>" ></span>
                   <span class="fa <?php if($res->star >= 2) { ?> fa-star checked <?php } ?>" ></span>
                   <span class="fa <?php if($res->star >= 3){ ?> fa-star checked <?php } ?>" ></span>
                   <span class="fa <?php if($res->star >= 4){ ?> fa-star checked <?php } ?>" ></span>
                   <span class="fa <?php if($res->star >= 5){ ?> fa-star checked <?php } ?>" ></span>

                   <?php
                  }
                     if(isset($res->review))
                     {
                       echo "<div class='review'>".substr($res->review, 0,250)." ...</div>";
                     }
                  ?>

            </div>
            <div class="col-sm-1 col-md-1 col-xs-1 rank-bx rating year-bx"><?php echo $res->score; ?>%</div>
            <div class="col-sm-9  col-sm-offset-3 popup-bx">
                <div class="popup">

                    <!-- <div class="col-sm-3"><a hand ng-click="snapshot(<?php echo $res->u_id;  ?>)"><i class="fa fa-eye"></i> View Snapshot</a></div> -->
                    <div class="col-sm-4"><a hand ng-click="request('quote',<?php echo $res->u_id; ?>)" ><i class="far fa-newspaper"></i> Request A Quote</a></div>
                    <div class="col-sm-4"><a hand ng-click="request('visit',<?php echo $res->u_id; ?>)"><i class="far fa-calendar-alt"></i> Schedule A Visit</a></div>
                    <div class="col-sm-4"><a hand ng-click="request('call',<?php echo $res->u_id; ?>)"><i class="fas fa-phone"></i> Request A Call</a></div>

                </div>
            </div>



          </div>

          <!-- end listining -->



          <!-- snapshot start -->
          <div style="display:none"  class="snapshot-sec snap<?php echo $res->u_id;  ?>">
              <div class="row">
                  <div class="col-sm-4">
                      <div class="snap-bx-left">

                          <span><?php echo $res->name; ?> </span>
                          <a class="web" href="#"><?php echo $res->website; ?></a>
                          <p><?php echo $res->address1; ?>
                              <?php echo $res->address2; ?>
                                In,<?php echo $res->zip; ?></p>
                          <small>Talk to representative</small>
                          <a class="phn" href="tel:<?php echo $res->rep_ph_num; ?>"><?php echo $res->rep_ph_num; ?></a>
                          <div class="btn-section">
                              <a class="visit-web" href="#">Contact info</a>
                              <a class="visit-web" href="#">More info</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="snap-bx-mid">
                          <h2>Key Facts For <?php echo $res->name; ?></h2>

                          <ul>
                              <li>
                                  Major Clients <?php echo count($res->client); ?></li>
                              <li>
                                <?php
                                       if(!empty($res->client))
                                      {
                                        foreach($res->client as $c)
                                        {
                                     ?>
                               <a><?php echo $c->name; ?></a>
                                   <?php }
                                           }
                                            ?>
                              </li>
                              <li> Year Founded </li>
                              <li><?php echo $res->year;  ?></li>
                              <li> Active Clients </li>
                              <li>+</li>
                              <li> Revenue 100 millions</li>
                              <!-- <li> Client Retention Rate </li>
                              <li> 99%</li> -->
                              <li> Pricing</li>
                              <li>
                                <?php if($res->type == 2)
                                {
                                  ?>
                                  $<?php  echo $res->minPrice; ?>- $<?php echo $res->maxPrice; ?> per hour
                            <?php }
                                    else if($res->type == 3)
                                    {
                                    ?>
                                    $<?php echo $res->maxPrice; ?> per hour
                                    <?php
                                    }
                                    ?>
                              </li>


                          </ul>
                          <button type="button" ng-click="request('quote',<?php echo $res->u_id; ?>)" class="btn btn-default" >Request a Quote</button>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="snap-bx-right">
                         <img src="<?php echo base_url(); ?>assets/front/images/graph.png" />
                       </div>
                   </div>
              </div>
          </div>
          <!-- snapshot end -->
          <?php
                  }
                       }
                       else{

                         ?>
                      <div>No record found.</div>
                         <?php
                       }
                    ?>
     </div>
          </div>

              <!-- content start -->
              <div class="content" >
                  <div class="rank-listing-content">
                          <div class="container">
                  <?php if(!empty($content)){ echo $content->content; } ?>
  </div>
                  </div>

                  </div>

              <!-- end content -->




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
              <span>{{ profiles.name }}</span>
              <a href="#">{{ profiles.website}}</a>
            </div>

          </div>
          <div class="col-sm-6">
            <div class="request-address">
              <p>{{ profiles.address1 }}
                {{ profiles.address2 }}
                In,{{ profiles.zip }}</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="request-btn">
                Talk to a representative
                <a href="tel:{{ profile.rep_ph_num }}">


                  <span>{{ profiles.countryCode }}{{ profiles.rep_ph_num }}</span>
                </a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Contact Name <span class="red-text">*</span> </label> -->
                <input placeholder="Please enter name" name="text" id="rename" ng-model="rename" type="text" class="form-control" />
                <p ng-show="submitrequest1 && rename == ''" class="text-danger">Name is required.</p>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Phone <span class="red-text">*</span> </label> -->
                <input numbers-only="numbers-only" type="text" id="rephone1" placeholder="Please enter phone number"  ng-model="rephone" name="phone"  class="phone form-control" />
                <p ng-show="submitrequest1 && rephone == ''" class="text-danger">Phone is required.</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Company Name <span class="red-text">*</span></label> -->
                <input placeholder="Please enter company name" name="text" id="recompanyname" ng-model="recompanyname" type="text" class="form-control" />
                <!-- <p ng-show="submitrequest1 && name == ''" class="text-danger">Company name is required.</p> -->
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Email Address <span class="red-text">*</span> </label> -->
                <input onkeyup="angular.element(this).scope().checkrequestAQuote(this)" placeholder="Please enter email address" name="email" id="requestquoteemail1" ng-value="reemail" ng-model="reemail" type="text" class="form-control" />
                <p ng-show="submitrequest1 && reemail == ''" class="text-danger">Email Address is required.</p>
                <p ng-cloak ng-show="reemail != '' && reqemailerror" class="text-danger">Please enter valid email address.</p>

              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Website <span class="red-text">*</span></label> -->
                <input placeholder="Please enter website" name="website" id="rewebsite" ng-model="rewebsite" type="text" class="form-control" />
                <!-- <p ng-show="submitrequest1 && website == ''" class="text-danger">Website is required.</p> -->
                <p ng-show="submitrequest1 && rewebsite != '' && websitevalide " class="text-danger">Please enter valide website url.</p>

              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <!-- <label>Service <span class="red-text">*</span> </label> -->

                <select id="service" ng-model="reservice" class="form-control">
                  <option value="">Select Services </option>
                  <option value="{{ x.id }}" ng-repeat="(key,x) in profiles.services" >{{ x.service }}</option>

                </select>
                <!-- <p ng-show="submitrequest1 && service == ''" class="text-danger">Service is required.</p> -->
              </div>
            </div>
            <div class="col-sm-12">
              <!-- <labe>Brief Porject Info <span class="red-text">*</span></labe> -->
              <textarea placeholder="Please Explain Your Query" id="reprojectinfo" ng-model="reprojectinfo" class="form-control"></textarea>
              <p ng-show="submitrequest1 && reprojectinfo == ''" class="text-danger">Quote info is required.</p>
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
                <span>{{ profiles.name }}</span>
                <a target="_blank" href="{{ profile.website }}">{{ profiles.website }}</a>
              </div>

            </div>
            <div class="col-sm-6">
              <div class="request-address">
                <p>{{ profiles.address1 }}
                  {{ profiles.address2 }}
                  In,{{ profiles.zip }}</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="request-btn">
                  Talk to a representative
                  <a href="tel:{{ profiles.rep_ph_num }}">


                    <span>{{ profiles.countryCode }}{{ profiles.rep_ph_num }}</span>
                  </a>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Contact Name <span class="red-text">*</span></label> -->
                  <input placeholder="Please enter name" name="text" id="scname" ng-model="scname" type="text" class="form-control" />
                  <p ng-show="submitrequest && scname == ''" class="text-danger">Name is required.</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Phone <span class="red-text">*</span></label> -->
                  <input numbers-only="numbers-only" type="text" id="scphone4" placeholder="Please enter phone number"  ng-model="scphone" name="phone"  class="form-control" />
                  <p ng-show="submitrequest && scphone == ''" class="text-danger">Phone is required.</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Company Name <span class="red-text">*</span> </label> -->
                  <input placeholder="Please enter company name" name="text" id="sccompanyname" ng-model="sccompanyname" type="text" class="form-control" />
                  <!-- <p ng-show="submitrequest && name == ''" class="text-danger">Company Name is required.</p> -->
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Email Address <span class="red-text">*</span> </label> -->
                  <input onkeyup="angular.element(this).scope().checkschdule(this)" placeholder="Please enter email Address" name="email" id="scemail" ng-model="scemail" type="email" class="form-control" />
                  <p ng-show="submitrequest && scemail == ''" class="text-danger">Email Address is required.</p>
                  <p ng-cloak ng-show="scemail != '' && schemailerror" class="text-danger">Please enter valid email address.</p>


                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Date You'd Like To Visit <span class="red-text">*</span> </label> -->
                  <input mydatepicker readonly="readonly" placeholder="Please select date"  ng-model="scdate" id="scdate" type="text" class="form-control" />
                  <p ng-show="submitrequest && scdate == ''" class="text-danger">Date of visit is required.</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- <label>Website <span class="red-text">*</span> </label> -->
                  <input placeholder="Please enter website" ng-model="scwebsite" name="website" type="text" class="form-control" />
                  <!-- <p ng-show="submitrequest && website == ''" class="text-danger">Website is required.</p> -->
                  <p ng-show="submitrequest && scwebsite != '' && websitevalide " class="text-danger">Please enter valide website url.</p>

                </div>
              </div>

              <div class="col-sm-12">
                <textarea placeholder="Your address" id="scaddress" ng-model="scaddress" class="form-control"></textarea>
                <p ng-show="submitrequest && scaddress == ''" class="text-danger">Address is required.</p>
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
                  <span>{{ profiles.name }}</span>
                  <a target="_blank" href="{{ profiles.website }}">{{ profiles.website }}</a>
                </div>

              </div>
              <div class="col-sm-6">
                <div class="request-address">
                  <p>{{ profiles.address1 }}
                    {{ profiles.address2 }}
                    In,{{ profiles.zip }}</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="request-btn">
                    Talk to a representative
                    <a href="tel:{{ profiles.rep_ph_num }}">


                      <span>{{ profiles.countryCode }}{{ profiles.rep_ph_num }}</span>
                    </a>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Contact Name <span class="red-text">*</span> </label> -->
                    <input placeholder="Please enter name" name="text" id="name" ng-model="name" type="text" class="form-control" />
                    <p ng-show="submitrequest && name == ''" class="text-danger">Name is required.</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Phone <span class="red-text">*</span></label> -->
                    <input numbers-only="numbers-only" type="text" id="phone2" placeholder="Please enter phone number"  ng-model="phone" name="phone"  class="form-control" />
                    <p ng-show="submitrequest && phone == ''" class="text-danger">Phone is required.</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Company Name <span class="red-text">*</span> </label> -->
                    <input placeholder="Please enter company name" name="text" id="companyname" ng-model="companyname" type="text" class="form-control" />
                    <!-- <p ng-show="submitrequest && name == ''" class="text-danger">Company name is required.</p> -->
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Email Address <span class="red-text">*</span> </label> -->
                    <input onkeyup="angular.element(this).scope().chechcall(this)" placeholder="Please enter email address" name="email" id="email" ng-model="email" type="email" class="form-control" />
                    <p ng-show="submitrequest && email == ''" class="text-danger">Email address is required.</p>
                      <p ng-cloak ng-show="email != '' && callemailerror" class="text-danger">Please enter valid email address.</p>

                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Website <span class="red-text">*</span></label> -->
                    <input placeholder="Please enter website" name="website" id="website" ng-model="website" type="text" class="form-control" />
                    <!-- <p ng-show="submitrequest && website == ''" class="text-danger">Website is required.</p> -->
                    <p ng-show="submitrequest && website != '' && websitevalide " class="text-danger">Please enter valide website url.</p>

                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label>Service <span class="red-text">*</span></label> -->
                    <select id="service" ng-model="callservice" class="form-control">
                      <option value="">Select Services</option>
                      <option   value="{{ x.id }}" ng-repeat="(key,x) in profiles.services" >{{ x.service }}</option>

                    </select>
                    <!-- <p ng-show="submitrequest && service == ''" class="text-danger">Service is required.</p> -->
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






</div>

<!--
////////////////////////// -->
