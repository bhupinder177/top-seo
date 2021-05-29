<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Question</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content">
      <div ng-cloak class="box box-success" ng-app="myApp16" ng-controller="myCtrt16">
         <div class="box-header p-3">
            <div class="row">
               <div class="col-md-4">
                  <h3 class="box-title">Question</h3>
               </div>
               <div class="col-md-8">
                  <a class="pull-right btn btn-success" data-toggle="modal" data-target="#addquestion">Add New</a>
               </div>
            </div>
            <div id="addquestion" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Question</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Question<span class="red-text">*</span></label>
                           <input placeholder="Please enter category" type="text"  id="question" ng-model="question" ng-value="question"  class="form-control title required"  >
                           <p ng-show="submitc && question == ''" class="text-danger">Question is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Question Type <span class="red-text">*</span></label>
                           <select  ng-model="questionType"  id="questionType" class="form-control jobId" >
                              <option value="">Select Type</option>
                              <option ng-repeat="(key,x) in allquestionType" value="{{ x.id }}" >{{ x.name }}</option>
                           </select>
                           <p ng-show="submitc && questionType == ''" class="text-danger">Please select question type</p>
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
                        <button type="button" ng-click="submitquestion()" class="btn btn-success" >Submit</button>
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
                     <th>Question</th>
                     <th>Question Type</th>
                     <th>Status</th>
                     <th class="text-center">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr ng-if="aquestion.length != 0" ng-repeat="(key,x) in aquestion">
                     <td>{{ x.question }} </td>
                     <td>{{ x.name }} </td>
                     <td ng-if="x.status == 1">Active</td>
                     <td ng-if="x.status == 0">Inactive</td>
                     <td class="d-flex">
                        <a title="Edit" class="btn bg-blue mr-1" ng-click="editquestion(x.id)"><i class="fa fa-edit"></i></a>
                        <a ng-click="deletemodal(key,x.id)" class="btn btn-default" title="Delete"><i class="fa fa-trash"></i></a>
                     </td> 
                  </tr>
                  <tr ng-if="aquestion.length == 0">
                     <td colspan="4" class="text-center">No Record Found.</td>
                  </tr> 
               </tbody>
            </table>
             </div>
            <div id="pagination"></div>
            <!-- content-->
            <!-- edit -->
            <div id="editquestion" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Question</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Question<span class="red-text">*</span></label>
                           <input placeholder="Please enter question" type="text"  id="question" ng-model="question" ng-value="question"  class="form-control title required"  >
                           <p ng-show="submitc && question == ''" class="text-danger">Question is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Question Type <span class="red-text">*</span></label>
                           <select  ng-model="questionType"  id="questionType" class="form-control jobId" >
                              <option value="">Select Type</option>
                              <option ng-repeat="(key,x) in allquestionType" value="{{ x.id }}" >{{ x.name }}</option>
                           </select>
                           <p ng-show="submitc && questionType == ''" class="text-danger">Please select question type</p>
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
                        <button type="button" ng-click="updatequestion()" class="btn btn-success" >Submit</button>
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
                        <a ng-click="deletequestion()" class="btn btn-danger" id="yes">Yes</a>
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

