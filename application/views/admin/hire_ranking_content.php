<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Hire Ranking Content</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="box">
      <div ng-cloak class="box-success" ng-app="myApp8" ng-controller="myCtrt8">
         <div class="box-header p-3">
            <div class="row">
               <div class="col-xl-4 col-md-12">
                  <h3 class="box-title mb-0">Hire Ranking Content</h3>
               </div>
               <div class="col-xl-8 col-md-12">
                  <a class="pull-right btn btn-success" data-toggle="modal" data-target="#addcontent">Add New Content</a>
               </div>
            </div>
         </div>
         <div id="addcontent" class="modal fade" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Hire Ranking Content</h4>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label>Service <span class="red-text">*</span></label>
                        <select  ng-model="ser"  id="jobs" class="form-control jobId" >
                           <option value="">Select service</option>
                           <option ng-repeat="(key,x) in services"  value="{{ x.id }}">{{ x.name }}</option>
                        </select>
                        <p ng-show="submitc && ser == ''" class="text-danger">Please select service</p>
                     </div>
                     <div class="form-group">
                        <label>Meta Title <span class="red-text">*</span></label>
                        <input placeholder="Please enter meta title" type="text"  id="title" ng-model="title" ng-value="title"  class="form-control title required"  >
                        <p ng-show="submitc && title == ''" class="text-danger">Title is required.</p>
                     </div>
                     <div class="form-group">
                        <label>Meta Description <span class="red-text">*</span></label>
                        <input placeholder="Please enter meta description" type="text"  id="mdescription" ng-model="mdescription" ng-value="mdescription"  class="form-control title required"  >
                        <p ng-show="submitc && mdescription == ''" class="text-danger">Meta description is required.</p>
                     </div>
                     <div class="form-group">
                        <label>Custom url <span class="red-text">*</span></label>
                        <input placeholder="Please enter url" type="text"  id="title" ng-model="url" ng-value="url"  class="form-control title required"  >
                        <p ng-show="submitc && url == ''" class="text-danger">Url is required.</p>
                     </div>
                     <div class="form-group">
                        <label>Body Content <span class="red-text">*</span></label>
                        <!-- ckeditor -->
                        <textarea placeholder="Please enter description" type="text" name="description" id="description" ng-model="description" ng-value="description" class="form-control description ckeditor required" ></textarea>
                        <p ng-show="submitc && description == ''" class="text-danger">Body content is required.</p>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" ng-click="submitcontent()" class="btn btn-success" >Submit</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="box-body">
            <div class="table-responsive">
               <table id="rankingTable" class="table  table-condensed">
                  <thead>
                     <tr>
                        <th>Meta title</th>
                        <th>Meta description</th>
                        <th>Url</th>
                        <th>Service</th>
                        <th class="text-right">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr ng-if="content.length != 0" ng-repeat="(key,x) in content">
                        <td>{{ x.metaTitle }} </td>
                        <td>{{ x.metaDescription | limitTo:30 }} </td>
                        <td>{{ x.url }}</td>
                        <td>{{ x.service }}</td>
                        <td>
                           <div class="dropdown ac-cstm text-right">
                              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                              </a>
                              <div class="dropdown-menu fadeIn">  
                                 <a class="dropdown-item" target="_blank" title="View Ranking Content" class="ng-scope" href="<?php echo base_url(); ?>hire/{{ x.url | lowercase | underscoreless }}"><i class="fa fa-info-circle"></i>Info</a>
                                 <a class="dropdown-item" title="Edit Content" ng-click="editContent(x.id)"><i class="fa fa-info-circle"></i>Info</a> 
                                 <a class="dropdown-item" ng-click="deletemodal(key,x.id)"><i class="fa fa-trash" title="Delete Portfolio"></i> Delete</a> 
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
            <div id="editcontent" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Hire Ranking Content</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Service <span class="red-text">*</span></label>
                           <select  ng-model="ser"  id="jobs" class="form-control jobId" >
                              <option value="">Select service</option>
                              <option ng-repeat="(key,x) in services"  value="{{ x.id }}">{{ x.name }}</option>
                           </select>
                           <p ng-show="submitc && ser == ''" class="text-danger">Please select service</p>
                        </div>
                        <div class="form-group">
                           <label>Meta title <span class="red-text">*</span></label>
                           <input placeholder="Please enter meta title" type="text"  id="title" ng-model="title" ng-value="title"  class="form-control title required"  >
                           <p ng-show="submitc && title == ''" class="text-danger">Meta Title is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Meta Description <span class="red-text">*</span></label>
                           <input placeholder="Please enter meta description" type="text"  id="mdescription" ng-model="mdescription" ng-value="mdescription"  class="form-control title required"  >
                           <p ng-show="submitc && mdescription == ''" class="text-danger">Meta description is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Custom url <span class="red-text">*</span></label>
                           <input placeholder="Please enter url" type="text"  id="title" ng-model="url" ng-value="url"  class="form-control title required"  >
                           <p ng-show="submitc && url == ''" class="text-danger">Url is required.</p>
                        </div>
                        <div class="form-group">
                           <label>Body Content <span class="red-text">*</span></label>
                           <!-- ckeditor -->
                           <textarea placeholder="Please enter description" type="text" name="description1" id="description1" ng-model="description" ng-value="description" class="form-control description ckeditor required" ></textarea>
                           <p ng-show="submitc && description == ''" class="text-danger">Body Content is required.</p>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" ng-click="updatecontent()" class="btn btn-success" >Submit</button>
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

