<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">How it works</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content">
      <div ng-cloak class="box box-success" ng-app="myApp14" ng-controller="myCtrt14">
         <div class="box-header p-3">
            <div class="row">
               <div class="col-md-4">
                  <h3 class="box-title">How it works</h3>
               </div>
               <div class="col-md-8">
                  <a class="pull-right btn btn-success" data-toggle="modal" data-target="#addwork">Add New</a>
               </div>
            </div>
            <div id="addwork" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">How it works</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Title <span class="red-text">*</span></label>
                           <input placeholder="Please enter name" type="text"  id="title" ng-model="title" ng-value="title"  class="form-control title required"  >
                           <p ng-show="submitc && title == ''" class="text-danger">Title is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Image <span class="red-text">*</span></label>
                           <input onchange="angular.element(this).scope().uploadImage(this)"  type="file"  id="title"   class="form-control title required"  >
                           <p ng-show="submitc && image == ''" class="text-danger">Image is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Description <span class="red-text">*</span></label>
                           <!-- ckeditor -->
                           <textarea placeholder="Please enter description" type="text" name="description" id="description" ng-model="description" ng-value="description" class="form-control description required" ></textarea>
                           <p ng-show="submitc && description == ''" class="text-danger">Description is required.</p>
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
                        <button type="button" ng-click="submitworks()" class="btn btn-success" >Submit</button>
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
                     <th>Title</th>
                     <th>Description</th>
                     <th>Image</th>
                     <th>Status</th>
                     <th class="text-right">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr ng-if="works.length != 0" ng-repeat="(key,x) in works">
                     <td>{{ x.title }} </td>
                     <td>
                        <p ng-bind-html="x.description | limitTo:50 |trustAsHtml"></p>
                     </td>
                     <td><img class="img-work" src="<?php echo base_url(); ?>assets/howitworks/{{ x.image }}"></td>
                     <td ng-if="x.status == 1">Active</td>
                     <td ng-if="x.status == 0">Inactive</td>
                     <td>
                         <div class="dropdown ac-cstm text-right">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                    </a>
                                    <div class="dropdown-menu fadeIn">  
                                       <a class="dropdown-item" title="Edit" ng-click="editworks(x.id)"><i class="fa fa-edit"></i>Edit</a>  
                                       <a class="dropdown-item" ng-click="deletemodal(key,x.id)" title="Delete"><i class="fa fa-trash"></i> Delete</a> 
                                    </div>
                         </div>  
                     </td> 
                  </tr>
                  <tr ng-if="content.length == 0">
                     <td colspan="5" class="text-center">No Record Found.</td>
                  </tr>
               </tbody>
            </table>
             </div> 
            <div id="pagination"></div>
            <!-- content-->
            <!-- edit -->
            <div id="editworks" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">How it works </h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Title<span class="red-text">*</span></label>
                           <input placeholder="Please enter title" type="text"  id="title" ng-model="title" ng-value="title"  class="form-control title required"  >
                           <p ng-show="submitc && title == ''" class="text-danger">Title is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Image <span class="red-text">*</span></label>
                           <input onchange="angular.element(this).scope().uploadImage(this)"  type="file"  id="title"   class="form-control title required"  >
                           <img id="logoview" src="<?php echo base_url(); ?>assets/howitworks/{{ editdata.image }}"  class="img-work">
                           <p ng-show="submitc && image == ''" class="text-danger">Image is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Description <span class="red-text">*</span></label>
                           <!-- ckeditor -->
                           <textarea placeholder="Please enter description" type="text" name="description1" id="description1" ng-model="description" ng-value="description" class="form-control description  required" ></textarea>
                           <p ng-show="submitc && description == ''" class="text-danger">Description is required.</p>
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
                        <button type="button" ng-click="updateworks()" class="btn btn-success" >Submit</button>
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
                        <a ng-click="deleteworks()" class="btn btn-danger" id="yes">Yes</a>
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

