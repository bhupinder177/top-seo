<div class="custom-gig giglisting" ng-cloak ng-app="myApp17" ng-controller="myCtrt17">
<!-- Gig section -->
  <div class="blog-section">
    <div class="container-fluid">
      <h5 class="text-center">GIGS</h5>
      <div  class="gig-wrapp">
           <div class="indus">
            <ul>
              <li>
                  <div class="form-group">
             <select onchange="angular.element(this).scope().selectindustry(this)" class="form-control">
      <option value="">Select Industry</option>
      <option  ng-repeat="(key,x) in allindustry" value="{{ x.id }}" >{{ x.name }}</option>

    </select>
          </div>
              </li>
              <li>
                <div class="form-group">
             <select onchange="angular.element(this).scope().selectservices(this)" class="form-control">
      <option value="">Select Service</option>
      <option  ng-repeat="(key,x) in allservices" value="{{ x.id }}" >{{ x.name }}</option>
    </select>
          </div>
              </li>
              <!-- <li> <div class="form-group">
             <select class="form-control">
      <option>Reviews</option>
    </select>
          </div>
        </li> -->

              <li> <div class="form-group">
             <select onchange="angular.element(this).scope().selectcountry(this)" class="form-control">
      <option value="">Select Location</option>
      <option  ng-repeat="(key,x) in allcountry" value="{{ x.id }}" >{{ x.name }}</option>

    </select>
          </div>
        </li>
          <li>
        <div class="form-group">
       <select onchange="angular.element(this).scope().selectduration(this)" class="form-control">
 <option value="">Select Delivery Time</option>
 <option  ng-repeat="(key,x) in allduration" value="{{ x.hours }}" >{{ x.duration }} days</option>

</select>
    </div>
  </li>

  <!-- <li>
<div class="form-group">
<select onchange="angular.element(this).scope().selectrating(this)" class="form-control">
<option value="">Select Rating</option>
<option  value="1" >1</option>
<option  value="2" >2</option>
<option  value="3" >3</option>
<option  value="4" >4</option>
<option  value="5" >5</option>
</select>
</div>
</li> -->

            </ul>
        </div>
        </div>

      <div class="row">
        <div class="col-md-12">
          <div class="blog-m-bx">
            <div class="row">

              <div class="col-md-4" ng-if="gig.length != 0" class="jobmain" ng-repeat="(key,x) in gig">
                  <div class="blog-bx">
              <a target="_blank" href="<?php echo base_url() ?>gig/{{ x.title | replace  }}-{{ x.gigId }}"> <img height="200" width="350" src="<?php echo base_url(); ?>assets/gig/{{ x.image }}"></a>
              <h1><a target="_blank" href="<?php echo base_url() ?>gig/{{ x.title | replace  }}-{{ x.gigId }}">{{ x.title }}</a></h1>
              <span>{{ x.industry }}</span> <span>{{ x.services }}</span>
              <p ng-bind-html="x.description | limitTo:300 | trustAsHtml "></p>
                <a target="_blank" href="<?php echo base_url() ?>gig/{{ x.title | replace  }}-{{ x.gigId }}" class="read-more">Read more</a>
               </div>
              </div>
              <div ng-if="gig.length == 0" class="norecordfound">
                <p>No record found</p>
              </div>


      </div>
     </div>
     <div id="pagination"></div>
     </div>
      </div>
     </div>
   </div>
<!-- GIg section -->


</div>
