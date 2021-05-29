<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Services</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section ng-cloak class="content" ng-app="myApp6" ng-controller="myCtrt6">
      <div class="content-box no-border-radius">
         <div class="row">
            <!-- content --> 
            <div class="col-xl-8 col-md-12">
               <div class="box-success box">
                  <div class="box-header p-3">
                     <h3 class="box-title">All Services</h3>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-0">
                              <input ng-model="searchtext" ng-model="searchtext" type="text" name="search" ng-keyup="search($event)" placeholder="Search" class="form-control"> 
                           </div>
                        </div>
                        <div class="col-md-6"></div>
                     </div>
                  </div>
                  <div class="box-body">
                     <div class="table-responsive">
                        <table id="rankingTable" class="table">
                           <thead>
                              <tr>
                                 <th>Service</th>
                                 <th>Status</th>
                                 <th class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr ng-if="services.length != 0" ng-repeat="(key,x) in services" ng-init="services = key">
                                 <td>{{ x.name }} </td>
                                 <td ng-if="x.status == 1">Active</td>
                                 <td ng-if="x.status == 0">inactive</td>
                                 <td class="d-flex text-center">
                                    <a title="Edit Services" class="btn bg-blue mr-2" ng-click="editservices(x.id)" ><i class="fa fa-edit"></i></a>
                                    <a ng-click="deletemodal(key,x.id)" class="btn bg-default" title="Delete services"><i class="fa fa-trash"></i></a>
                                 </td>
                              </tr>
                              <tr ng-if="services.length == 0">
                                 <td colspan="3" class="text-center">No Record Found.</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div  id="pagination"></div>
                     <!-- content--> 
                  </div>
               </div>
            </div>
            <div ng-if="update != 1" class="col-xl-4 col-md-12">
               <div class="box box-success p-3">
                  <div class="box-header">
                     <h3 class="box-title">Add Services</h3>
                  </div>
                  <form method="post"  class="">
                     <div class="box-body">
                        <div class="form-group mb-0"> 
                              <label>Service <span class="red-text">*</span></label>
                              <input  type="text" ng-enter="serviceadd()" ng-model="name" id="name"   class="form-control"  >
                              <div id="tags"><a ng-repeat="x in servicetags"  > {{ x }}<span hand ng-click="deleteservice($index)" > &times; </span></a></div>
                              <p ng-show="submitser && name == ''" class="text-danger">Service is required.</p> 
                        </div>
                        <div class="form-group"> 
                              <label>Status <span class="red-text">*</span></label>
                              <select type="text" ng-model="status" id="status"  class="form-control" >
                                 <option value="">Select status</option>
                                 <option value="1">Active</option>
                                 <option value="0">Inactive</option>
                              </select>
                              <p ng-show="submitser && status == ''" class="text-danger">Status is required.</p> 
                        </div>
                     </div>
                     <div class="box-footer">
                        <button type="button" ng-click="servicesSave()" name="add_P_area" value="true" class="btn btn-primary submit">Add</button>
                     </div>
                  </form>
               </div>
            </div>
            <div ng-if="update == 1" class="col-md-4">
               <div class="box box-success">
                  <div class="box-header with-border">
                     <h3 class="box-title">Edit Services</h3>
                  </div>
                  <form method="post"  class="form-horizontal">
                     <div class="box-body">
                        <div class="form-group">
                           <div class="col-sm-12">
                              <label>Service <span class="red-text">*</span></label>
                              <input  type="text" ng-enter="serviceadd()" ng-model="name" id="editname"   class="form-control"  >
                              <p ng-show="submitser && name == ''" class="text-danger">Service is required.</p>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-12">
                              <label>Status <span class="red-text">*</span></label>
                              <select type="text" ng-model="editstatus" id="editstatus"  class="form-control" >
                                 <option value="">Select status</option>
                                 <option value="1">Active</option>
                                 <option value="0">Inactive</option>
                              </select>
                              <p ng-show="submitind && editstatus == ''" class="text-danger">Status is required.</p>
                           </div>
                        </div>
                     </div>
                     <div class="box-footer">
                        <button type="button" ng-click="updateservices()" name="add_P_area" value="true" class="btn btn-primary submit">Add</button>
                     </div>
                  </form>
               </div>
            </div>
            <!-- delete modal-->
            <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete it?</h4>
                     </div>
                     <div class="modal-footer"> 
                        <a ng-click="deleteservices()" class="btn btn-danger" id="yes">Yes</a> 
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

