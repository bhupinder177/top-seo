<div  id="carrier" class="custom-gig giglisting carerrslisting" ng-app="myApp20" ng-controller="myCtrt20">
  <h2 class="text-center">Careers</h2>
  <div  class="gig-wrapp">
       <div class="carerrs_search">
        <ul>
          <li>
          <div class="form-group">
            <input type="text" ng-value="positionSearch" ng-model="positionSearch"  placeholder="Search by position" class="form-control">
           </div>
          </li>
          <li>
          <div class="form-group">
            <input type="text" ng-value="industrySearch" ng-model="industrySearch"  placeholder="Search by industry" class="form-control">
           </div>
          </li>
          <li>
          <div class="form-group">
            <input type="text" ng-value="skillSearch" ng-model="skillSearch"  placeholder="Search by skill" class="form-control">
           </div>
          </li>
          <li>
          <div class="form-group">
            <select type="text" ng-value="experienceSearch" ng-model="experienceSearch"  placeholder="Search by experience" class="form-control">
              <option value="">All</option>
              <option value="1">0-1 yr</option>
              <option value="2">1 yr</option>
              <option value="3">2 yr</option>
              <option value="4">3 yr</option>
              <option value="5">4 yr</option>
              <option value="6">5 yr</option>
              <option value="7">6 yr</option>
              <option value="8">7 yr</option>
              <option value="9">8 yr</option>
              <option value="10">9 yr</option>
              <option value="11">10 yr</option>
            </select>
           </div>
          </li>

          <li>
          <div class="form-group">
            <input type="text" ng-value="locationSearch" ng-model="locationSearch"  placeholder="Search by location" class="form-control">
           </div>
          </li>
          <li>
          <div class="form-group">
            <select type="text" ng-value="companySearch" ng-model="companySearch"  placeholder="Search by experience" class="form-control">
              <option value="">All</option>
              <option ng-repeat="(key,x) in allcompany" value="{{ x.u_id }}">{{ x.c_name }}</option>

            </select>
           </div>
          </li>
          <li>
          <div class="form-group">
            <input type="button" ng-click="search()"  class="btn btn-success" value="Search">
           </div>
          </li>
        </ul>
    </div>
    </div>
 <div class="row">
    <div ng-repeat="(key,x3) in jobopenings" class="jobopenings jobopeningssection col-md-3">
      <div class="jobopenings blog-bx">
        <p class="company_name"><b>{{ x3.c_name }}</b></p>
      <div class="icon">
               <img class="imageThumnail" src="<?php echo base_url(); ?>assets/client_images/{{ x3.company_logo }}">
      </div>
      <p class="role_data">{{ x3.vacancyPosition }}</p>
      <p><b>Openings :</b> {{ x3.vacancyNoOfOpening }}</p>
      <p><b>Experience :</b> {{ x3.vacancyExperience }}- {{ x3.vacancyExperienceMax }}</p>
      <p><b>Job Location :</b> {{ x3.vacancyLocation }}</p>
      <p class="skill_data"><b>Skills :</b> {{ x3.vacancySkill | limitTo:60 }}</p>

      <a target="_blank" href="<?php echo base_url(); ?>job-vacancies/{{ x3.vacancyPosition | replace | lowercase | underscoreless }}-{{ x3.vacancyId }}">Read more</a>


  </div>
</div>

<div class="col-md-12">
<div id="jobopeningpagination"></div>
</div>
</div>
<div ng-if="jobopenings.length == 0" class="norecordfound">
  <p>No record found</p>
</div>
</div>
