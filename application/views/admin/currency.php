<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Currency</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content">
      <div ng-cloak class="box box-success" ng-app="myApp11" ng-controller="myCtrt11">
         <div class="box-header p-3">
            <div class="row">
               <div class="col-md-4">
                  <h3 class="box-title">Currency</h3>
               </div>
               <div class="col-md-8">
                  <a class="pull-right btn btn-success" data-toggle="modal" data-target="#addcontent">Add New</a>
               </div>
            </div>
         </div>
         <div id="addcontent" class="modal fade" role="dialog">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Currency</h4>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label>Currency <span class="red-text">*</span></label>
                        <input placeholder="Please enter currency" type="text"  id="title" ng-model="currency" ng-value="currency"  class="form-control title required"  >
                        <p ng-show="submitc && currency == ''" class="text-danger">Currency is required.</p>
                     </div>
                     <div class="form-group">
                        <label>Code <span class="red-text">*</span></label>
                        <input placeholder="Please enter code" type="text"  id="title" ng-model="code" ng-value="code"  class="form-control title required"  >
                        <p ng-show="submitc && code == ''" class="text-danger">Code is required.</p>
                     </div>
                     <div class="form-group">
                        <label>Symbol <span class="red-text">*</span></label>
                        <input placeholder="Please enter symbol" type="text"  id="symbol" ng-model="symbol" ng-value="symbol"  class="form-control title required"  >
                        <p ng-show="submitc && symbol == ''" class="text-danger">Symbol is required.</p>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" ng-click="submitcurrency()" class="btn btn-success" >Submit</button>
                  </div>
               </div>
            </div>
         </div>
      <div class="box-body">
         <div class="table-responsive">
            <table id="rankingTable" class="table">
               <thead>
                  <tr>
                     <th>Currency</th>
                     <th>Code</th>
                     <th>Symbol</th>
                     <th class="text-center">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency">
                     <td>{{ x.name }} </td>
                     <td>{{ x.code }} </td>
                     <td>{{ x.symbol }} </td>
                     <td class="text-center">
                        <!-- <a title="Edit" class="btn bg-blue mr-2" ng-click="editcurrency(x.currencyId)"><i class="fa fa-edit"></i></a> -->
                        <a ng-click="deletemodal(key,x.id)" class="btn btn-default" title="Delete Currency"><i class="fa fa-trash"></i></a>
                     </td>
                  </tr>
                  <tr ng-if="industry.length == 0">
                     <td colspan="4" class="text-center">No Record Found.</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div id="pagination"></div>
         <!-- content-->
         <!-- edit -->
         <div id="editcontent" class="modal fade" role="dialog">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Edit Currency</h4>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label>Title <span class="red-text">*</span></label>
                        <input placeholder="Please enter currency" type="text"  id="title" ng-model="currency" ng-value="currency"  class="form-control title required"  >
                        <p ng-show="submitc && currency == ''" class="text-danger">Currency is required.</p>
                     </div>
                     <!-- <div class="form-group">
                        <label>Status<span class="red-text">*</span></label>
                        <select  ng-model="status" id="title"   class="form-control title required"  >
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <p ng-show="submitc && status == ''" class="text-danger">Status is required.</p>
                        </div> -->
                  </div>
                  <div class="modal-footer">
                     <button type="button" ng-click="updatecurrency()" class="btn btn-success" >Submit</button>
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
                     <a ng-click="deletecurrency()" class="btn btn-danger" id="yes">Yes</a>
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
