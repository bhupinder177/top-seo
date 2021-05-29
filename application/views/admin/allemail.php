<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Email</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section ng-cloak class="content" ng-app="myApp34" ng-controller="myCtrt34">
      <div class="row">
         <!-- content -->
         <div class="col-md-12 col-lg-8 no-padding-right">
            <div class="box box-success" >
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="rankingTable" class="table">
                        <thead>
                           <tr>
                              <th>Email</th>
                              <!-- <th>Status</th> -->
                               <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr ng-if="emails.length != 0" ng-repeat="(key,x) in emails" >
                              <td>{{ x.email }} </td>
                              <td class="action-btns">
                                 <div class="dropdown ac-cstm text-right">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                    </a>
                                    <div class="dropdown-menu fadeIn">
                                      <a  class="dropdown-item" ng-click="edit(x.id)"><i class="fa fa-edit"></i>Edit</a>
                                      <a  class="dropdown-item" ng-click="confirm(x.id)"><i class="fa fa-trash"></i>Delete</a>
                                    </div>
                                 </div>
                              </td>
                              <!-- <td>
                                <a  class="dropdown-item" ng-click="edit(x.id)"><i class="fa fa-edit"></i></a>
                                <a  class="dropdown-item" ng-click="confirm(x.id)"><i class="fa fa-trash"></i></a>
                              </td> -->
                           </tr>
                           <tr ng-if="emails.length == 0">
                              <td colspan="2" class="text-center">No Record Found.</td>

                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div  id="pagination"></div>
                  <!-- modal -->
                  <!-- delete confirm modal -->
                    <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
         <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h4 class="modal-title">Delete</h4>
         </div>
         <div class="modal-body">
         <p>Are you sure you want to delete this ?</p>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>
         </div>
         </div>
         </div>
         </div>
                    <!-- delete confirm modal -->
                  <!-- content-->
               </div>
            </div>
         </div>
         <!-- add industry -->
         <div ng-if="update == 0" class="col-md-12 col-lg-4">
            <div class="box box-success p-3">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Email</h3>
               </div>
               <form method="post"  class="form-horizontal">
                  <div class="box-body">
                     <div class="form-group">
                           <label>Email <span class="red-text">*</span></label>
                           <input ng-change="change()" ng-blur="blur()" type="text" ng-model="email" id="email"  class="form-control " placeholder=" "  >
                           <p ng-show="submitind && email == ''" class="text-danger">Email is required.</p>
                           <p  ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>
                     </div>
                  </div>
                  <div class="box-footer">
                     <button type="button" ng-click="saveemail()" name="add_P_area" value="true" class="btn btn-primary submit">Add</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- add industry -->
         <!-- edit industry -->
         <div ng-if="update == 1" class="col-md-4">
            <div class="box box-success">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Email</h3>
               </div>
               <form method="post"  class="form-horizontal">
                  <div class="box-body">
                     <div class="form-group">
                           <label>Email <span class="red-text">*</span></label>
                           <input ng-change="change()" ng-blur="blur()" type="text" ng-model="email" id="email"  class="form-control email" placeholder=" "  >
                           <p ng-show="submitind && email == ''" class="text-danger">Email is required.</p>
                           <p  ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>
                     </div>
                  </div>
                  <div class="box-footer">
                     <button type="button" ng-click="updateemail()" name="add_P_area" value="true" class="btn btn-primary submit">Add</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- edit industry -->
         <!-- delete modal-->
         <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete it?</h4>
                  </div>
                  <div class="modal-footer">
                     <a ng-click="deleteIndustries()" class="btn btn-danger" id="yes">Yes</a>
                     <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- delete modal -->
      </div>
   </section>
</div>
