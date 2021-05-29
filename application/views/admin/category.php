<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Category</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content">
      <div ng-cloak class="box box-success" ng-app="myApp12" ng-controller="myCtrt12">
         <div class="box-header p-3">
            <div class="row">
               <div class="col-md-4">
                  <h3 class="box-title">Category</h3>
               </div>
               <div class="col-md-8">
                  <a class="pull-right btn btn-success" data-toggle="modal" data-target="#addcategory">Add New Category</a>
               </div>
            </div>
            <div id="addcategory" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Category</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Category <span class="red-text">*</span></label>
                           <input placeholder="Please enter  title" type="text"  id="title" ng-model="category" ng-value="category"  class="form-control title required"  >
                           <p ng-show="submitc && category == ''" class="text-danger">Category is required.</p>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" ng-click="submitcategory()" class="btn btn-success" >Submit</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="rankingTable" class="table">
                  <thead>
                     <tr>
                        <th>Category</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr ng-if="acategory.length != 0" ng-repeat="(key,x) in acategory">
                        <td>{{ x.category }} </td>
                        <td class="text-center">
                           <a title="Edit" class="btn bg-yellow mr-2" ng-click="editblog(x.categoryId)"><i class="fa fa-edit"></i></a>
                           <a ng-click="deletemodal(key,x.categoryId)" class="btn btn-default" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                     </tr>
                     <tr ng-if="content.length == 0">
                        <td colspan="2" class="text-center">No Record Found.</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div id="pagination"></div>
            <!-- content-->
            <!-- edit -->
            <div id="editcategory" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Category</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Title <span class="red-text">*</span></label>
                           <input placeholder="Please enter category" type="text"  id="category" ng-model="category" ng-value="category"  class="form-control title required"  >
                           <p ng-show="submitc && category == ''" class="text-danger">category is required.</p>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" ng-click="updatecategory()" class="btn btn-success" >Submit</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- edit -->
            <!-- delete modal-->
            <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete it?</h4>
                     </div>
                     <div class="modal-footer">
                        <a ng-click="deletecategory()" class="btn btn-danger" id="yes">Yes</a>
                        <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- delete modal -->
         </div>
      </div>
   </section>
</div>
