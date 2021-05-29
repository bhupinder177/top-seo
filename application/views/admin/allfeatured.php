<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header"> 
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Features</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content box">
      <div ng-cloak class="box-success" ng-app="myApp36" ng-controller="myCtrt36">
         <div class="box-header p-3 text-right"> 
               <a class="btn btn-success" data-toggle="modal" data-target="#addfeatured">Add New Feature</a>
            </div>
            <div id="addfeatured" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Features</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Title <span class="red-text">*</span></label>
                           <input placeholder="Please enter  title" type="text"  id="title" ng-model="title" ng-value="title"  class="form-control title required"  >
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
                           <textarea placeholder="Please enter description" type="text" name="description" id="description" ng-model="description" ng-value="description" class="form-control description ckeditor required" ></textarea>
                           <p ng-show="submitc && description == ''" class="text-danger">Description is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Page Open <span class="red-text">*</span></label>
                           <select  ng-model="open"  id="open" class="form-control open" >
                              <option value="">Select status</option>
                              <option  value="1">Yes</option>
                              <option  value="0">No</option>
                           </select>
                           <p ng-show="submitc && open == ''" class="text-danger">Please select page open</p>
                        </div>
                        <div class="form-group">
                           <label>Meta Title <span class="red-text">*</span></label>
                           <input placeholder="Please enter meta title" type="text"  id="metatitle" ng-model="metatitle" ng-value="metatitle"  class="form-control metatitle required"  >
                           <p ng-show="submitc && metatitle == ''" class="text-danger">Meta title is required.</p>
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
                        <button type="button" ng-click="submitfeatured()" class="btn btn-success" >Submit</button>
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
                     <th class="text-center">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr ng-if="featured.length != 0" ng-repeat="(key,x) in featured">
                     <td>{{ x.title }}</td>
                     <td>
                        <p ng-bind-html="x.description | limitTo:50 |trustAsHtml"></p>
                     </td>
                     <td><img class="img-fluid test-img" src="<?php echo base_url(); ?>assets/featured/{{ x.image }}"></td>
                     <td>
                        <a ng-click="statusmodal(x.id,'1')" class="btn btn-danger" ng-if="x.status == 0">Inactive</a>
                        <a ng-click="statusmodal(x.id,'0')" class="btn bg-green" ng-if="x.status == 1">Active</a>
                     </td>
                     <td class="text-center"> 
                        <a title="Edit" class="btn bg-blue mr-2" ng-click="editfeatured(x.id)"><i class="fa fa-edit"></i></a>
                        <a ng-click="deletemodal(key,x.id)" class="btn btn-default" title="Delete"><i class="fa fa-trash"></i></a>
                     </td>
                  </tr>
                  <tr ng-if="blog.length == 0">
                     <td colspan="5" class="text-center">No Record Found.</td>
                  </tr>
               </tbody>
            </table>
             </div>
            <div id="pagination"></div>
            <!-- content-->
            <!-- edit -->
            <div id="editfeatured" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Features Edit</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Title <span class="red-text">*</span></label>
                           <input placeholder="Please enter  title" type="text"  id="title" ng-model="title" ng-value="title"  class="form-control title required"  >
                           <p ng-show="submitc && title == ''" class="text-danger">Title is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Image <span class="red-text">*</span></label>
                           <input onchange="angular.element(this).scope().uploadImage(this)"  type="file"  id="title"   class="form-control title required"  >
                           <img id="logoview" src="<?php echo base_url(); ?>assets/featured/{{ editdata.image }}" width="80" height="80">
                           <p ng-show="submitc && image == ''" class="text-danger">Image is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Description <span class="red-text">*</span></label>
                           <!-- ckeditor -->
                           <textarea placeholder="Please enter description" type="text" name="description1" id="description1" ng-model="description" ng-value="description" class="form-control description ckeditor required" ></textarea>
                           <p ng-show="submitc && description == ''" class="text-danger">Body Content is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Page Open <span class="red-text">*</span></label>
                           <select  ng-model="open"  id="open" class="form-control open" >
                              <option value="">Select status</option>
                              <option  value="1">Yes</option>
                              <option  value="0">No</option>
                           </select>
                           <p ng-show="submitc && open == ''" class="text-danger">Please select page open</p>
                        </div>
                        <div class="form-group">
                           <label>Meta Title <span class="red-text">*</span></label>
                           <input placeholder="Please enter meta title" type="text"  id="metatitle" ng-model="metatitle" ng-value="metatitle"  class="form-control metatitle required"  >
                           <p ng-show="submitc && metatitle == ''" class="text-danger">Meta title is required.</p>
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
                        <button type="button" ng-click="updatefeatured()" class="btn btn-success" >Submit</button>
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
                        <a ng-click="deletefeatured()" class="btn btn-danger" id="yes">Yes</a>
                        <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- delete modal -->
            <!-- Status modal-->
            <div class="modal fade" id="Status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Are you sure you want to Change Status ?</h4>
                     </div>
                     <div class="modal-footer">
                        <a ng-click="featuredStatus()" class="btn btn-danger" id="yes">Yes</a>
                        <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Status modal -->  
         </div>
      </div>
   </section>
</div>

