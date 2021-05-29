<?php

include('sidebar.php');
?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Announcement</li>
    </ol>

  </section>


  <section class="content portfolio-cont dep-cstm">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp61" ng-controller="myCtrt61">

        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box rounded bg-white">
                  <div class="box-body">
                      <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Subject</th>
                          <th>Message</th>
                          <th>Date</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="all.length != 0" ng-repeat="(key,x) in all">
                          <td>{{ start + $index  }}</td>
                          <td>{{ x.annSubject }}</td>
                          <td>{{ x.annMessage | limitTo:80 }}</td>

                          <td>{{ x.annDate | date }}</td>
                          <td><a ng-click="view(x.annId)" class="btn btn-success">View</a></td>

                        </tr>
                        <tr ng-if="all.length == 0"><td colspan="2">No Record Found.</td></tr>

                      </tbody>

                    </table>

                      </div>

                    <div  id="pagination"></div>

                    <!-- view -->
                    <div id="view" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Announcement</h4>
                          </div>
                          <div class="modal-body">
                            <div class="repeat"  >

                            <div class="form-group ">
                              <b>Subject :</b> {{ viewdata.annSubject }}
                            </div>
                            <div class="form-group ">
                              <b>Message :</b> {{ viewdata.annMessage }}
                            </div>
                            <div class="form-group ">
                              <b>Date :</b> {{ viewdata.annDate | date }}
                            </div>

                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true" >Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- view -->


                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </section>
</div>
