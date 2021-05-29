<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
         <li class="active">Top Industry</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content">
      <div class="box box-success" ng-app="myApp9" ng-controller="myCtrt9">
         <div class="box-header p-3">
            <div class="row">
               <div class="col-md-4">
                  <h3 class="box-title">Top Industry</h3>
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
                     <h4 class="modal-title">Top Industry</h4>
                  </div>
                  <div class="modal-body">
                     <div class="container-fluid">
                        <div class="form-group">
                           <label>Title <span class="red-text">*</span></label>
                           <input placeholder="Please enter meta title" type="text"  id="title" ng-model="title" ng-value="title"  class="form-control title required"  >
                           <p ng-show="submitc && title == ''" class="text-danger">Title is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Description <span class="red-text">*</span></label>
                           <textarea placeholder="Please enter meta description" type="text"  id="description" ng-model="description" ng-value="description"  class="form-control title required"  ></textarea>
                           <p ng-show="submitc && description == ''" class="text-danger">Description is required.</p>
                        </div>
                        <div class="form-group">
                           <label>icon <span class="red-text">*</span></label>
                           <input  type="file" onchange="angular.element(this).scope().uploadIcon(this)"  id="icon" ng-model="icon" ng-value="icon"  class="form-control title required"  >
                           <p ng-show="submitc && icon == ''" class="text-danger">Icon is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Image <span class="red-text">*</span></label>
                           <input  type="file" onchange="angular.element(this).scope().uploadImage(this)" id="image" ng-model="image" ng-value="image"  class="form-control title required"  >
                           <p ng-show="submitc && image == ''" class="text-danger">Image is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Url<span class="red-text">*</span></label>
                           <input placeholder="Please enter meta title" type="text"  id="url" ng-model="url" ng-value="url"  class="form-control title required"  >
                           <p ng-show="submitc && url == ''" class="text-danger">Url is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Status<span class="red-text">*</span></label>
                           <select  ng-model="status" id="title"   class="form-control title required"  >
                              <option value="">Select Status</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                           </select>
                           <p ng-show="submitc && status == ''" class="text-danger">Status is required.</p>
                        </div>
                     </div>
                  </div>
                     <div class="modal-footer">
                        <button type="button" ng-click="submitindustry()" class="btn btn-success" >Submit</button>
                     </div>
               </div>
            </div>
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="rankingTable" class="table">
                  <thead>
                     <tr>
                        <th>Title</th>
                        <th style="min-width: 750px;">Description</th>
                        <th>Image</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr ng-if="industry.length != 0" ng-repeat="(key,x) in industry">
                        <td>{{ x.title }} </td>
                        <td>{{ x.description }} </td>
                        <td><img height="60" width="60" src="<?php echo base_url(); ?>assets/top_industry/{{ x.image }}"></td>
                        <td>
                           <div class="dropdown ac-cstm text-right">
                              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                              </a>
                              <div class="dropdown-menu fadeIn">  
                                 <a class="dropdown-item" title="Edit" ng-click="editindustry(x.id)"><i class="fa fa-info-circle"></i>Info</a> 
                                 <a class="dropdown-item" ng-click="deletemodal(key,x.id)" title="Delete Portfolio"><i class="fa fa-trash"></i> Delete</a> 
                              </div>
                           </div>
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
                        <h4 class="modal-title">Top Industry</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Title <span class="red-text">*</span></label>
                           <input placeholder="Please enter meta title" type="text"  id="title" ng-model="title" ng-value="title"  class="form-control title required"  >
                           <p ng-show="submitc && title == ''" class="text-danger">Title is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Description <span class="red-text">*</span></label>
                           <textarea placeholder="Please enter meta description" type="text"  id="description" ng-model="description" ng-value="description"  class="form-control title required"  ></textarea>
                           <p ng-show="submitc && description == ''" class="text-danger">Description is required.</p>
                        </div>
                        <div class="form-group">
                           <label>icon <span class="red-text">*</span></label>
                           <input  type="file" onchange="angular.element(this).scope().uploadIcon(this)"  id="icon" ng-model="icon" ng-value="icon"  class="form-control title required"  >
                           <img class="viewicon" src="<?php echo base_url(); ?>assets/top_industry/{{ edit.icon }}" height="100" width="100">
                        </div>
                        <div class="form-group">
                           <label>Image <span class="red-text">*</span></label>
                           <input  type="file" onchange="angular.element(this).scope().uploadImage(this)" id="image" ng-model="image" ng-value="image"  class="form-control title required"  >
                           <img class="viewimage" src="<?php echo base_url(); ?>assets/top_industry/{{ edit.image }}" height="100" width="100">
                        </div>
                        <div class="form-group">
                           <label>Url<span class="red-text">*</span></label>
                           <input placeholder="Please enter meta title" type="text"  id="url" ng-model="url" ng-value="url"  class="form-control title required"  >
                           <p ng-show="submitc && url == ''" class="text-danger">Url is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Status<span class="red-text">*</span></label>
                           <select  ng-model="status" id="title"   class="form-control title required"  >
                              <option value="">Select Status</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                           </select>
                           <p ng-show="submitc && status == ''" class="text-danger">Status is required.</p>
                        </div>
                     </div>
                     <div class="modal-footer check">
                        <button type="button" ng-click="updateindustry()" class="btn btn-success" >Submit</button>
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
                        <a ng-click="deletecontent()" class="btn btn-danger" id="yes">Yes</a>
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

