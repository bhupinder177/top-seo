<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
         <li class="active">Suggestion</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content">
      <div ng-cloak class="box box-success" ng-app="myApp32" ng-controller="myCtrt32">
         <div class="box-header p-3">
            <h3 class="box-title mb-0">All Suggestion</h3>
         </div>
         <div class="box-body">
             <div class="table-responsive">
            <table id="rankingTable" class="table">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Type</th>
                     <th>suggestion</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr ng-if="user.length != 0" ng-repeat="(key,x) in user" ng-init="user = key">
                     <td>{{ x.username }} </td>
                     <td>{{ x.logSubType }} </td>
                     <td>{{ x.name }} </td>
                     <td ng-if="x.logStatus == 1"><a ng-click="status(x.logReference,x.logId,0,x.logSubType)" class="btn bg-green">Active</a></td>
                     <td ng-if="x.logStatus == 0"><a ng-click="status(x.logReference,x.logId,1,x.logSubType)" class="btn bg-gray">inactive</a></td>
                     <td><a ng-click="deletemodal(x.logId,x.logReference,x.logSubType)" class="btn btn-danger">Delete</a></td>
                  </tr>
                  <tr ng-if="freelancers.length == 0">
                     <td colspan="5" class="text-center">No Record Found.</td>
                  </tr>
               </tbody>
            </table>
             </div>
            <div id="pagination"></div>
            <!-- content-->
            <!-- delete -->
            <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete it?</h4>
                     </div>
                     <div class="modal-footer">
                        <a ng-click="deletesuggestion()" class="btn btn-danger" id="yes">Yes</a>
                        <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- delete -->
         </div>
      </div>  
</section>
</div>

