<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Question Type</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content">
      <div class="box box-success" ng-app="myApp15" ng-controller="myCtrt15">
         <div class="box-header p-3">
            <div class="row">
               <div class="col-md-4">
                  <h3 class="box-title">Question Type</h3>
               </div>
               <div class="col-md-8">
                  <a class="pull-right btn btn-success" data-toggle="modal" data-target="#addquestionType">Add New</a>
               </div>
            </div>
            <div id="addquestionType" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Question Type</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Category<span class="red-text">*</span></label>
                           <input placeholder="Please enter category" type="text"  id="category" ng-model="category" ng-value="category"  class="form-control title required"  >
                           <p ng-show="submitc && category == ''" class="text-danger">Category is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Status <span class="red-text">*</span></label>
                           <select  ng-model="status"  id="jobs" class="form-control jobId" >
                              <option value="">Select status</option>
                              <option  value="1">Active</option>
                              <option  value="0">InActive</option>
                           </select>
                           <p ng-show="submitc && status == ''" class="text-danger">Please select status</p>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" ng-click="submitquestionType()" class="btn btn-success" >Submit</button>
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
                        <th>Status</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr ng-if="questiontype.length != 0" ng-repeat="(key,x) in questiontype">
                        <td>{{ x.name }} </td>
                        <td ng-if="x.status == 1">Active</td>
                        <td ng-if="x.status == 0">Inactive</td>
                        <td class="text-center"> 
                           <a title="Edit" class="btn bg-blue" ng-click="editquestionType(x.id)"><i class="fa fa-edit"></i></a>
                           <a ng-click="deletemodal(key,x.id)" class="btn btn-default" title="Delete"><i class="fa fa-trash"></i></a>
                        </td> 
                     </tr>
                     <tr ng-if="questiontype.length == 0">
                        <td colspan="3" class="text-center">No Record Found.</td>
                     </tr>
                  </tbody>
               </table>
               <div id="pagination"></div>
               <!-- content-->
               <!-- edit -->
               <div id="editquestionType" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                     <!-- Modal content-->
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">Question type</h4>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <label>category<span class="red-text">*</span></label>
                              <input placeholder="Please enter title" type="text"  id="category" ng-model="category" ng-value="category"  class="form-control title required"  >
                              <p ng-show="submitc && category == ''" class="text-danger">Category is required.</p>
                           </div>
                           <div class="form-group">
                              <label>Status <span class="red-text">*</span></label>
                              <select  ng-model="status"  id="jobs" class="form-control jobId" >
                                 <option value="">Select status</option>
                                 <option  value="1">Active</option>
                                 <option  value="0">InActive</option>
                              </select>
                              <p ng-show="submitc && status == ''" class="text-danger">Please select status</p>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" ng-click="updatequestionType()" class="btn btn-success" >Submit</button>
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
                           <a ng-click="deletequestionType()" class="btn btn-danger" id="yes">Yes</a>
                           <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- delete modal -->
            </div>
         </div>
      </div>   
</section>
</div>

