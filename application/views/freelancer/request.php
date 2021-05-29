<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home ></a></li>
            <li class="active">Requests</li>
        </ol>
    </section>
    <!--main-container-part-->

    <section class="content req bg-white">
        <!-- get sidebar -->
        <div id="content">
            <div ng-cloak class="content-box box" ng-app="myApp17" ng-controller="myCtrt17">
                    <!-- <div ng-if="plan.packageRequestQuote  == 0">
                        <p> Hi {{ username }},</p>
                        <p> You have <b>{{ plan.packageName }}</b> Membership Plan. Visitors liking your profile and filling Request Forms. At the moment forms already been filled. You can view all these Forms only once you upgrade your Plan.
                                To Upgrade your Membership Plan <a href="<?php echo base_url(); ?>freelancer/membership">please Click Here.</a></p>
                        <p>Good Luck!</p>
                    </div> -->
                <div class="table-responsive">
                    <table  id="rankingTable" class="table">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Request Type</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-if="request.length != 0" ng-repeat="(key,x) in request" ng-init="request = key">
                                <td>{{ start + $index + 1 }}</td>
                                <td>{{ x.req_type | capitalize }} <span ng-if="x.req_detail.contactto">({{ x.req_detail.contactto }})</span></td>
                                <td>{{ x.req_detail.name | capitalize }}</td>

                                <td>{{ x.date_created | date }}</td>
                                <td>

                                  <div  class="dropdown ac-cstm text-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                        </a>
                        <div class="dropdown-menu fadeIn">
                            <a class="dropdown-item" ng-click="viewRequest(x.id)" title="View details"><i class="fa fa-edit"></i>View</a>
                            <a ng-click="convertlead(key,x.id)" class="dropdown-item"   href="#"><i class="fa fa-bullhorn"></i>Convert to Lead</a>
                        </div>
                     </div>
                                </td>
                            </tr>
                            <tr ng-if="request.length == 0">
                                <td colspan="5">No Record Found.</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="pagination"></div>
            </div>
            <!-- confirm -->
            <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true" style="display: none;">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title">Confirmation</h4>
                                   </div>
                                   <div class="modal-body">
                                      <p>Are you sure you want to convert this record to lead?</p>
                                   </div>
                                   <div class="modal-footer">
                                     <button type="button" ng-click="convert()" class="btn btn-success" id="confirm">Confirm</button>

                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                   </div>
                                </div>
                             </div>
                          </div>
            <!-- confirm -->

            <!-- view -->
            <div class="modal fade" id="viewrequest" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true" style="display: none;">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title">View Request</h4>
                                   </div>
                                   <div class="modal-body">
                                     <div ng-if="viewdata.info.name" class="form-group">
                                       <p><b>Name :</b> {{ viewdata.info.name }}</p>
                                     </div>
                                     <div ng-if="viewdata.info.email" class="form-group">
                                       <p><b>Email :</b> {{ viewdata.info.email }}</p>
                                     </div>
                                     <div ng-if="viewdata.info.phone" class="form-group">
                                       <p><b>Phone :</b> {{ viewdata.info.phone }}</p>
                                     </div>
                                     <div ng-if="viewdata.info.address" class="form-group">
                                       <p><b>Address :</b> {{ viewdata.info.address }}</p>
                                     </div>
                                     <div ng-if="viewdata.info.company" class="form-group">
                                       <p><b>Company :</b> {{ viewdata.info.company }}</p>
                                     </div>
                                     <div ng-if="viewdata.info.website" class="form-group">
                                       <p><b>Website :</b> {{ viewdata.info.website }}</p>
                                     </div>
                                     <div ng-if="viewdata.info.services" class="form-group">
                                       <p><b>Service :</b> {{ viewdata.info.services }}</p>
                                     </div>
                                     <div ng-if="viewdata.info.date" class="form-group">
                                       <p><b>Date :</b> {{ viewdata.info.date }}</p>
                                     </div>
                                     <div ng-if="viewdata.info.projectinfo" class="form-group">
                                       <p><b>Query :</b> {{ viewdata.info.projectinfo }}</p>
                                     </div>
                                   </div>
                                   <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                   </div>
                                </div>
                             </div>
                          </div>
            <!-- view -->

            </div>
        </div>
    </section>
</div>
