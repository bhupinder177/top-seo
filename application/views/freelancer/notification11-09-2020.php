<!--main-container-part-->
<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a> ></li>
            <li class="active">Notifications</li>
        </ol>
    </section>

    <!--main-container-part-->

    <section class="content">

        <!-- get sidebar -->

        <div class=" no-margin user-dashboard-container">
            <div ng-cloak ng-app="myApp8" ng-controller="myCtrt8">
                <div id="content">
                    <div class="no-border-radius">
                        <div class="box box-success">
                            <div class="box-header p-3">
                                    <div class="row">
                                    <div class="col-md-2 form-group">
                                    <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    </select>
                                    </div>
                              </div>
                                <!-- <h3 class="box-title mb-0">All Notifications</h3>   -->
                            </div>
                            <div class="box-body table-responsive">
                                <table id="rankingTable" class="table  table-bordered notification">
                                    <thead>
                                        <tr>
                                            <th>Notification From</th>
                                            <th>Notification</th>
                                            <th>Notification Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-class="{ 'bold' : x.notificationStatus == 0  }" ng-if="notify.length != 0" ng-repeat="(key,x) in notify" ng-init="notify = key">
                                            <td>{{ x.name }}</td>
                                            <td><span ng-bind-html="x.notificationMessage|trustAsHtml"></span></td>
                                            <td>{{ x.notificationDate | date  }} </td>
                                        </tr>
                                        <tr ng-if="notify.length == 0">
                                            <td colspan="2">No Record Found.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="pagination"></div>

                                <!-- notification modal -->

                                <div id="notification" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title jtitle">Notification</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <div>From : {{ noti.name }}</div>
                                                    <div>Notification : {{ noti.notificationMessage }}</div>
                                                    <div>Date : {{ noti.notificationDate | date }}</div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <!-- <button type="button"  class="btn btn-success">submit</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- content-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
