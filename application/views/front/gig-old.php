<div class="custom-gig giglisting" ng-cloak ng-app="myApp17" ng-controller="myCtrt17">
<!-- Gig section -->
  <div class="blog-section">
    <div class="container">
      <h5 class="text-center">Gigs</h5>
      <div class="row">
        <div class="col-md-12">
          <div class="blog-m-bx">
            <div class="row">

              <div class="col-md-4" ng-if="gig.length != 0" class="jobmain" ng-repeat="(key,x) in gig">
                  <div class="blog-bx">
              <a target="_blank" href="<?php echo base_url() ?>gig/{{ x.title | replace | lowercase | underscoreless }}-{{ x.gigId }}"> <img height="200" width="350" src="<?php echo base_url(); ?>assets/gig/{{ x.image }}"></a>
              <h1><a target="_blank" href="<?php echo base_url() ?>gig/{{ x.title | replace | lowercase | underscoreless }}-{{ x.gigId }}">{{ x.title }}</a></h1>
              <span>{{ x.industry }}</span>
              <p ng-bind-html="x.description | limitTo:300 | trustAsHtml "></p>
                <a target="_blank" href="<?php echo base_url() ?>gig/{{ x.title | replace | lowercase | underscoreless }}-{{ x.gigId }}" class="read-more">Read more</a>
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
