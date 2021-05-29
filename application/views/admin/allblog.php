<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Dashboard</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content">
      <div ng-cloak class="box box-success" ng-app="myApp10" ng-controller="myCtrt10">
         <div class="box-header p-3">
            <div class="row">
               <div class="col-md-4">
                  <h3 class="box-title">Blog</h3>
               </div>
               <div class="col-md-8">
                  <a class="pull-right btn btn-success" data-toggle="modal" data-target="#addblog">Add New Blog</a>
               </div>
            </div>
            <div id="addblog" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Blog</h4>
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
                           <label>Author <span class="red-text">*</span></label>
                           <input placeholder="Please enter author" type="text"  id="author" ng-model="author" ng-value="author"  class="form-control title required"  >
                           <p ng-show="submitc && author == ''" class="text-danger">Author is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Category <span class="red-text">*</span></label>
                           <select  ng-model="category"  id="category" class="form-control category" >
                              <option value="">Select Category</option>
                              <option ng-repeat="(key,x) in allcategory"  value="{{ x.categoryId }}">{{ x.category }}</option>
                           </select>
                           <p ng-show="submitc && category == ''" class="text-danger">Please select category</p>
                        </div>
                        <div class="form-group">
                           <label>Tags<span class="red-text">*</span></label>
                           <input  type="text" ng-enter="tagadd()" ng-value="tagname" ng-model="tagname" id="tagsnew"   class="form-control"  >
                           <div id="tags"><a ng-repeat="x in tags"  > {{ x }}<span hand ng-click="deletetag($index)" > &times; </span></a></div>
                           <p ng-show="submitc && tags.length == 0" class="text-danger">Tags is required.</p>
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
                        <div class="form-group">
                           <label>Custom url <span class="red-text">*</span></label>
                           <input placeholder="Please enter Custom url" type="text"  id="url" ng-model="url" ng-value="url"  class="form-control title required"  >
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" ng-click="submitblog()" class="btn btn-success" >Submit</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="rankingTable" class="table blog-table">
                  <thead>
                     <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th style="min-width: 100px;">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr ng-if="blog.length != 0" ng-repeat="(key,x) in blog">
                        <td>{{ x.title }} </td>
                        <td>{{ x.author }}</td>
                        <td>{{ x.category }}</td>
                        <td>
                           <p ng-bind-html="x.description | limitTo:50 |trustAsHtml"></p>
                        </td>
                        <td><img class="img-fluid" src="<?php echo base_url(); ?>assets/blog/{{ x.image }}"></td>
                        <td class="">
                           <a ng-click="statusmodal(x.blogId,'1')" class="btn btn-danger" ng-if="x.status == 0">Inactive</a>
                           <a ng-click="statusmodal(x.blogId,'0')" class="btn bg-green" ng-if="x.status == 1">Active</a>
                        </td>
                        <td>
                           <div class="dropdown ac-cstm text-right">
                              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                              </a>
                              <div class="dropdown-menu fadeIn">  
                                 <a class="dropdown-item" title="Edit" ng-click="editblog(x.blogId)"><i class="fa fa-edit"></i>Edit</a>  
                                 <a class="dropdown-item" ng-click="deletemodal(key,x.blogId)"  title="Delete"><i class="fa fa-trash"></i> Delete</a> 
                              </div>
                           </div>
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
            <div id="editblog" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Blog</h4>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Title <span class="red-text">*</span></label>
                                 <input placeholder="Please enter  title" type="text"  id="title" ng-model="title" ng-value="title"  class="form-control title required"  >
                                 <p ng-show="submitc && title == ''" class="text-danger">Title is required.</p>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Image <span class="red-text">*</span></label>
                                 <input onchange="angular.element(this).scope().uploadImage(this)"  type="file"  id="title"   class="form-control title required"  >
                                 <img id="logoview" src="<?php echo base_url(); ?>assets/blog/{{ editdata.image }}" width="80" height="80" >
                                 <p ng-show="submitc && image == ''" class="text-danger">Image is required.</p>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Description <span class="red-text">*</span></label>
                           <!-- ckeditor -->
                           <textarea placeholder="Please enter description" type="text" name="description1" id="description1" ng-model="description" ng-value="description" class="form-control description ckeditor required" ></textarea>
                           <p ng-show="submitc && description == ''" class="text-danger">Body Content is required.</p>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Author <span class="red-text">*</span></label>
                                 <input placeholder="Please enter author" type="text"  id="author" ng-model="author" ng-value="author"  class="form-control title required"  >
                                 <p ng-show="submitc && author == ''" class="text-danger">Author is required.</p>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Category <span class="red-text">*</span></label>
                                 <select  ng-model="category"  id="category" class="form-control category" >
                                    <option value="">Select Category</option>
                                    <option ng-repeat="(key,x) in allcategory"  value="{{ x.categoryId }}">{{ x.category }}</option>
                                 </select>
                                 <p ng-show="submitc && category == ''" class="text-danger">Please select category</p>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Tags<span class="red-text">*</span></label>
                                 <input  type="text" ng-enter="tagadd()" ng-value="tagname" ng-model="tagname"  id="tagsnew"   class="form-control"  >
                                 <div id="tags"><a ng-repeat="x in tags"  > {{ x }}<span hand ng-click="deletetag($index)" > &times; </span></a></div>
                                 <p ng-show="submitc && tags.length == 0" class="text-danger">Tags is required.</p>
                              </div>
                           </div>
                           <div class="col-md-6">
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
                        </div>
                        <div class="form-group">
                           <label>Custom url <span class="red-text">*</span></label>
                           <input placeholder="Please enter Custom url" type="text"  id="url" ng-model="url" ng-value="url"  class="form-control title required"  >
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" ng-click="updateblog()" class="btn btn-success" >Submit</button>
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
                        <a ng-click="deleteblog()" class="btn btn-danger" id="yes">Yes</a>
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
                        <a ng-click="blogStatus()" class="btn btn-danger" id="yes">Yes</a>
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

