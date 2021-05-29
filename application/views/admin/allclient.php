<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Client</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="client-cstm">
      <!-- get sidebar -->
      <div id="content">
         <div class="box">
            <div class="content-box no-border-radius">
               <!-- content -->
               <div ng-cloak class="" ng-app="myApp2" ng-controller="myCtrt2">
                  <div class="box-header p-3 form-group">
                     <h4 class="box-title">All client</h4>
                     <div class="row">
                        <div class="col-md-12 col-lg-4">
                           <input ng-model="searchtext" type="text" name="search" ng-keyup="search($event)" placeholder="Search" class="form-control">
                        </div>
                        <div class="col-md-12 col-lg-8"></div>
                     </div>
                  </div>
                  <div class="table-responsive">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>Client Name</th>
                              <th>Type</th>
                              <th>Email/Skype/Phone</th>
                                <th>Package</th>
                              <th>Register date</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr ng-if="clients.length != 0" ng-repeat="(key,x) in clients" ng-init="contracts = key">
                              <td>{{ x.name }} </td>
                              <td>
                                <span ng-if="x.lstatus == 0">Regsitered Company</span>
                                <span ng-if="x.lstatus == 1">Lead Company</span>
                              </td>
                              <td>
                                 <div class="d-flex">
                                    <a ng-if="x.email" class="btn bg-orange mr-1" title="Email - {{ x.email }}">
                                    <i class="fa fa-envelope m-0"></i></a>
                                    <a ng-if="x.skype" class="btn bg-yellow mr-1" title="Skype - {{ x.skype }}">
                                    <i class="fa fa-skype m-0"></i></a>
                                    <a ng-if="x.rep_ph_num" class="btn bg-blue" href="tel:{{ x.rep_ph_num  }}" title="Phone - {{ x.rep_ph_num }}">
                                    <i class="fa fa-phone m-0"></i></a>
                                 </div>
                              </td>
                              <td>
                                <span ng-if="x.lstatus == 0 && x.totalamount == 0">Basic</span>
                                <span ng-if="x.lstatus == 0 && x.totalamount > 0">Custom</span>
                              </td>
                              <td>{{ x.date_created | date }}</td>
                              <td>
                                 <a ng-click="userStatus(1,key,x.u_id)" ng-if="x.is_active == 0" class="btn btn-danger">Inactive</a>
                                 <a ng-click="userStatus(0,key,x.u_id)" ng-if="x.is_active == 1" class="btn bg-green">Active</a>
                              </td>
                              <td class="action-btns">
                                 <div class="dropdown ac-cstm text-right">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                    </a>
                                    <div class="dropdown-menu fadeIn">
                                       <a class="dropdown-item" title="View profile" ng-click="Viewprofile(x.u_id)"><i class="fa fa-info-circle"></i>Info</a>
                                       <a class="dropdown-item" title="All Job Post" href="<?php echo base_url(); ?>admin/client/job/{{ x.u_id }}"><i class="fa fa-tags"></i>All Job Post</a>
                                       <a class="dropdown-item" title="Delete" ng-click="confirm(key,x.u_id)" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr ng-if="clients.length == 0">
                              <td colspan="7" class="text-center">No Record Found.</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div  id="pagination"></div>
                  <!-- content-->
                  <!-- profile modal -->
                  <div class="modal fade" id="userModal">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Profile</h4>
                           </div>
                           <div class="modal-body">
                               <div class="table-responsive">
                              <table class="table table-bordered">
                                 <tr>
                                    <th>Name</th>
                                    <td>{{ Viewd.name }}</td>
                                 </tr>
                                 <tr>
                                    <th>Email</th>
                                    <td>{{ Viewd.email }}</td>
                                 </tr>
                                 <tr>
                                    <th>Phone Number</th>
                                    <td>{{ Viewd.countryCode }}{{ Viewd.rep_ph_num }}</td>
                                 </tr>
                                 <tr>
                                    <th>country</th>
                                    <td>{{ Viewd.country }}</td>
                                 </tr>
                                 <tr>
                                    <th>state</th>
                                    <td>{{ Viewd.state }}</td>
                                 </tr>
                                 <tr>
                                    <th>City</th>
                                    <td>{{ Viewd.city }}</td>
                                 </tr>
                                 <tr>
                                    <th>Skype</th>
                                    <td> {{ Viewd.skype }}</td>
                                 </tr>
                                 <tr>
                                    <th>Address </th>
                                    <td> {{ Viewd.address1}}</td>
                                 </tr>
                                 <tr>
                                    <th>Address 2 </th>
                                    <td> {{ Viewd.address2}}</td>
                                 </tr>
                              </table>
                               </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- profile modal -->
                  <!-- Delete modal -->
                  <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this record ?</h4>
                           </div>
                           <div class="modal-footer">
                              <a ng-click="delete()" class="btn btn-danger" id="yes">Delete</a>
                              <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Delete modal -->
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
