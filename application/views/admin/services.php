

<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a> > </li>
         <li class="active">Services</li>
      </ol>
   </section>
   <section class="content">
      <!-- get sidebar --> 
      <div class="no-margin user-dashboard-container">
         <div ng-cloak  ng-app="myApp38" ng-controller="myCtrt38">
            <div class="box">
               <div class="services-area p-3">
                  <form method="post" action="">
                     <div class="select-container">
                        <div class="form-group">
                           <label for="prac_areas block">Select Industry</label> 
                           <div>
                              <!-- chosen-with-drop chosen-container-active -->
                              <div ng-click="industryclick(this)" onkeyup="angular.element(this).scope().industrykeyup(this)"   class="chosen-container chosen-container-multi "   title="" id="prac_areas_chosen" >
                                 <!-- <li class="search-field"> --> 
                                 <input id="unn industrykeyup"  onkeyup="angular.element(this).scope().industrykeyup(this)"   class="chosen-search-input industry form-control"  type="text" autocomplete="off" placeholder="Industry...">
                                 <!-- </li>
                                    </ul> -->
                                 <div class="chosen-drop11">
                                    <ul  class="chosen-results1" id="chosenresults11">
                                       <li ng-if="industry.length != 0" ng-click="selectIndustry(key)" ng-repeat="(key,x) in industry" ng-init="industry = key" class="active-result" style="" data-id="{{ x.id }}">{{ x.name }}</li>
                                       <!-- <li ng-if="industry.length != 0"  class="active-result" style="" data-id="{{ x.id }}">{{ x.name }}</li> -->
                                    </ul>
                                 </div>
                                 <div class="chosen-choices tags"> 
                                    <a ng-repeat="(key,x) in selectedIndustry" ng-init="selectedIndustry = key" class="search-choice">{{ x.name }}
                                    <span class="search-choice-close" ng-click="removeIndustry(key)" >×</span></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group seconday">
                           <label for="ser block">Choose Technology Services</label> 
                              <div id="ser_chosen" ng-click="serviceclick(this)" class="chosen-container chosen-container-multi" title="" >
                                 <input id="unns" onkeyup="angular.element(this).scope().servicekeyup(this)" class="form-control chosen-search-input services"  type="text" autocomplete="off" placeholder="Service...">
                                 <div class="chosen-drop">
                                    <ul class="chosen-results" id="chosenresults1">
                                       <li ng-click="selectService(key)" ng-repeat="(key,x) in services" ng-init="services = key" class="active-result" >{{ x.name }}</li>
                                    </ul>
                                 </div>
                                 <div class="tags"> 
                                    <a ng-repeat="(key,x) in selectedService" ng-init="selectedService = key" class="search-choice">
                                    {{ x.name }}<span class="search-choice-close" ng-click="removeService(key)" >×</span></a>
                                 </div>
                              </div> 
                        </div>
                        <button ng-click="saveIndustryService()" type="button" class="btn btn-primary rounded-0">Add Service</button> 
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

