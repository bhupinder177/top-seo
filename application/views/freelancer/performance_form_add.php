<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Add Performance Form</li>
      </ol>
   </section>
   <section class="content">
      <div ng-cloak  ng-app="myApp95" ng-controller="myCtrt95">
         <div id="content">

<div class="team-pro Performance_form_add">
   <div  class="p-3 bg-white">

      <div class="row">
               <div class="col-md-5">
                  <div class="form-group">
                     <label for="name">Department<span class="red-text">*</span></label>
                     <select   class="form-control" ng-model="departmentId" id="exampleFormControlSelect1">
                       <option  value="" >Select Department</option>
                       <option   ng-repeat="(key,x) in alldepartment" value="{{ x.id }}" >{{ x.department }}</option>
                     </select>
                     <p ng-show="forms && departmentId == ''" class="text-danger">Please select department.</p>
                  </div>
               </div>
               <div class="col-md-7 text-right">
                 <a ng-click="formadd(key)" hand id="plusicon">Add Primary Title <i  class="fa fa-plus-square"></i></a>
               </div>
             </div>

                <!-- <div  class="row">

               </div> -->

               <div class="form_main"  ng-repeat="(key,x) in form" ng-class="{ 'performanceformm' : key != 0 }" >
                 <div class="row">
                 <div class="col-md-5">
                   <div class="form-group">
                    <input type="text" placeholder="Enter primary title" ng-model="x.title" ng-value="x.title" class="form-control" >
                    <p ng-show="forms && x.title == ''" class="text-danger">Please select title.</p>
                    <a ng-if="key != 0" hand class="delicon" class="pull-right"> <i ng-click="deleteform(key)" class="fa fa-trash" aria-hidden="true"></i></a>

                 </div>
                 </div>
                 <div class="col-lg-7 col-md-12">
                    <a ng-click="subadd(key)" hand id="plusicon"> Add criteria <i  class="fa fa-plus-square"></i> </a>
                 </div>
              </div>


              <div class="milestone-form">
           <div class="row bg-clr" ng-repeat="(key2,x2) in x.sub">
               <div class="col-md-5">
                   <div class="form-group">
                       <input type="text" id="title" placeholder="Enter criteria name" ng-model="x2.title" ng-value="x2.title" class="form-control title required">
                       <p ng-show="forms && x2.title == ''" class="text-danger">Title is required.</p>

                   </div>
               </div>
                 <div class="col-md-5">
                   <div class="form-group" >

                       <input type="text"    id="title" placeholder="Describe criteria" ng-model="x2.description" ng-value="x2.description" class="form-control ">
                       <p ng-show="forms && x2.description == ''" class="text-danger">Description is required.</p>
                   </div>
               </div>
               <div class="col-lg-2 text-center">
                 <a ng-if="key2 != 0" hand class="delicon" class="pull-right"> <i ng-click="deletesub(key,key2)" class="fa fa-trash" aria-hidden="true"></i></a>

               </div>
          </div>
       </div>
        </div>


<div class="col-sm-12">
<div class="form-group d-inline-block mb-0">
 <input ng-click="saveform()" type="button" id="submit" value="Submit" name="addEmp" class="btn btn-success">
</div>
</div>
      </div>
   </div>

 </div>
</div>
</div>
</section>
</div>
