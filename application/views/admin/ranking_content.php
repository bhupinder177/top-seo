<?php include('sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Ranking Content</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section ng-cloak class="content" ng-app="myApp7" ng-controller="myCtrt7"> 
         <!-- get sidebar --> 
         <div class="box box-success" >
            <div class="box-header p-3">
               <h3 class="box-title mb-0">Ranking Content</h3>
            </div>
            <div class="box-body">
               <div class="row">
                  <div class="col-md-6 form-group">
                     <label>Industries</label>
                     <select class="form-control" ng-model="ind">
                        <option value="">Select industry</option>
                        <option value="{{ x.id }}" ng-repeat="(key,x) in industry">{{ x.name }}</option>
                     </select>
                  </div>
                  <div class="col-md-6 form-group">
                     <label>Services</label>
                     <select class="form-control" onchange="angular.element(this).scope().getservice(this)" ng-model="ser">
                        <option value="">Select Services</option>
                        <option value="{{ x.id }}" ng-repeat="(key,x) in services">{{ x.name }}</option>
                     </select>
                     <p class="text-danger" ng-show="submit && ser == '' ">Service is required</p>
                  </div>
                  <div class="col-md-6 form-group">
                     <label>Country</label> 
                     <select onchange="angular.element(this).scope().getstate(this)" class="form-control" ng-model="co">
                        <option value="">Select Country</option>
                        <option value="{{ x.id }}" ng-repeat="(key,x) in country">{{ x.name }}</option>
                     </select>
                  </div>
                  <div class="col-md-6 form-group">
                     <label>State</label> 
                     <select onchange="angular.element(this).scope().getcity(this)" class="form-control" ng-model="state">
                        <option value="">Select State</option>
                        <option value="{{ x.id }}" ng-repeat="(key,x) in st">{{ x.name }}</option>
                     </select>
                  </div>
                  <div class="col-md-6 form-group">
                     <label>City</label> 
                     <select class="form-control" ng-model="city">
                        <option value="">Select City</option>
                        <option value="{{ x.id }}" ng-repeat="(key,x) in ci">{{ x.name }}</option>
                     </select>
                  </div>
                  <div class="col-md-6 form-group"> 
                     <label>Meta title</label> 
                     <input type="text" class="form-control" ng-value="metatitle" ng-model="metatitle" placeholder="Please enter meta title" >
                  </div>
                  <div class="col-md-6 form-group"> 
                     <label>Meta Description</label> 
                     <input type="text" class="form-control" ng-value="metaDescription" ng-model="metaDescription" placeholder="Please enter meta description" >
                  </div>
                  <div class="col-md-6 form-group"> 
                     <label>Heading</label> 
                     <input type="text" class="form-control" ng-value="heading" ng-model="heading" placeholder="Please enter heading" >
                  </div>
               </div>
               <div class="form-group">
                  <label>Content</label>
                  <textarea type="text" name="content" id="content" ng-model="content" ng-value="content" class="form-control content ckeditor"  value=""></textarea>
                  <p class="text-danger" ng-show="submit && content == '' ">content is required</p>
               </div>
               <div class="form-group pull-right">
                  <button ng-click="submitcontent()" class="btn btn-success">Submit</button>
               </div>
               <!-- content-->
            </div>
         </div> 
   </section>
</div>

