<?php

include('sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
            <li class="active">Contracts</li>
        </ol>
    </section>

    <!--main-container-part-->
    <section class="content portfolio-cont">
        <div ng-cloak class="box box-success" ng-app="myApp6" ng-controller="myCtrt6">
            <div class="box-body">
                <div class="table-responsive">
                <table id="rankingTable" class="table class-table">
                    <thead>
                        <tr>
                            <th>Title</th>

                            <th>Amount</th>
                            <th>Freelancer</th>
                            <!-- <th>Progress</th> -->
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-if="contracts.length != 0" ng-repeat="(key,x) in contracts" ng-init="contracts = key">
                            <td>{{ x.jobTitle }}<br>
                            Hired Date: {{ x.contractDate | date }}</td>

                            <td>{{ x.code }} {{ x.symbol }} {{ x.contractAmount  }} </td>
                            <td>{{ x.freelancername }}</td>
                            <!-- <td>
                          <div class="progress progress-xs">
                          <div class="progress-bar l-slategray" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;"></div>
                          </div>
                            <small>Completion with: 29%</small>

                          </td> -->
                             <td><a ng-if="x.contractStatus == 1" class="btn btn-success" >Active</a>
                                 <a ng-if="x.contractStatus == 2" class="btn btn-danger" >End</a>
                             </td>

                            <td><a class="btn btn-primary" href="<?php echo base_url(); ?>client-contract/{{ x.contractId }}">Details</a></td>
                        </tr>
                        <tr ng-if="contracts.length == 0">
                            <td colspan="7" class="text-center">No Record Found.</td>
                        </tr>
                    </tbody>
                </table>
        </div>
                <div id="pagination"></div>
            </div>
        </div>
    </section>
</div>
