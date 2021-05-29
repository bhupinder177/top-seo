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
//
// }
?>

<div ng-cloak ng-app="myApp10" ng-controller="myCtrt10">

<div class="find-section" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
              <div ng-if="job.length != 0" class="jobmain" ng-repeat="(key,x) in job">
                <h3><a href="<?php echo base_url(); ?>job/{{ x.jobTitle | replace: '/':'' | underscoreless | lowercase }}-{{ x.jobId }}">{{ x.jobTitle }}</a></h3>
                 <div class="budget-freelance">
                <span>Est.Budget :<b>$ {{ x.jobBudget }}</b></span>
                  <span>No of Freelancer Required:<b> {{ x.jobRequiredFreelancer }}</b></span>
                     </div>
                <p> {{ x.currency }}</p>
                <div class="jobdescription" ><span ng-bind-html="x.jobDescription | limitTo:300 |trustAsHtml"></span>
                  <!-- <a target="_blank" href="<?php echo base_url(); ?>job/{{ x.jobTitle | replace: '/':'' | underscoreless | lowercase }}-{{ x.jobId }}">Read more</a> -->
                </div>
                <div class="skills"><b>Skills & Expertise</b><a ng-repeat="(key,x2) in x.skill" href="<?php echo base_url(); ?>search={{ x2.service | lowercase | underscoreless }}"><span class="skill" >{{ x2.service }}</span></a></div>
                <p>Proposals : {{ x.proposal }}</p>

                <ul>
                  <li class="payment_verified" ng-if="x.payment == 1"><i class="fas fa-check-circle"></i> Payment Method: verified</li>
                  <li ng-if="x.payment == 0"><i class="fas fa-check-circle"></i> Payment Method: unverified</li>

                  <li><a href="<?php echo base_url(); ?>country={{ x.country |  replace: '/':'' | underscoreless | lowercase }}"><i class="fas fa-map-marker-alt"></i> Country :{{ x.country }}</a></li>

                  <li>
                  <span ng-class="{ 'fas fa-star' :  x.review >= 1 , 'far fa-star' : x.review < 1 }"  ></span>
                  <span ng-class="{ 'fas fa-star' :  x.review >= 2 , 'far fa-star' : x.review < 2 }"  ></span>
                  <span ng-class="{ 'fas fa-star' :  x.review >= 3 , 'far fa-star' : x.review < 3 }"  ></span>
                  <span ng-class="{ 'fas fa-star' :  x.review >= 4 , 'far fa-star' : x.review < 4 }"  ></span>
                  <span ng-class="{ 'fas fa-star' :  x.review >= 5 , 'far fa-star' : x.review < 5 }"  ></span>

                  </li>
                  <li>Spent : {{ x.spend }}</li>


                </ul>
               <hr>
              </div>
              <div ng-if="job.length == 0">No record found</div>
              <div  id="pagination"></div>

              </div>
         </div>

      </div>
   </div>
</div>
