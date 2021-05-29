<?php include('sidebar.php'); ?>

  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
        <li class="active">Resignation</li>
      </ol>
    </section>

<section class="content portfolio-cont regn">
  <div class=" no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp38" ng-controller="myCtrt38">
          <div id="content">
  <!-- Main content -->
                <div ng-cloak class="row">
                  <div class="col-md-12">
                    <!-- ng-if="resignation.status == 2 || resignation.length == 0" -->
                    <div  class="box bg-white rounded c-pass-sec content-box clearfix">
                  <div class="form-group">
                    <label> Resignation Reason </label>
                    <textarea name="remarks" type="text" ng-cloak ckeditor  id="remarks" ng-model="remarks" data-ck-editor ng-value="remarks" class="form-control remarks"></textarea>
                    <p ng-show="submitp && remarks == ''" class="text-danger">Reason is required.</p>
                  </div>
                    <div class="form-group radio-st">
                        <input ng-click="checkedterm($event)" name="term" class="term" type="checkbox" value="1"  id="term">I agree with notice period days i.e <b>{{ time.days }} Days</b> after acceptance of my resignation
                    <p ng-show="submitp && term == ''" class="text-danger">Term & policy is required.</p>
                  </div>
                <div class="clearfix">
                  <input class="btn btn-success" ng-disabled="disabled" type="button" ng-click="submitResignation()" value="submit" name="submit">
                </div>
              </div>
             <!-- show listing -->
             <div class="box-body">
                 <div class="table-responsive">
               <table  id="rankingTable" class="table  table-condensed">
                 <thead>
                   <tr>
                     <th>S. No.</th>
                     <th>Reason</th>
                     <th>Applied On</th>
                     <th>Effective from</th>
                     <th>Effective to</th>
                     <th>Status</th>
                     <th class="text-right">Action</th>
                   </tr>
                 </thead>
                 <tbody>
                   <tr ng-if="resignation.length != 0" ng-repeat="(key,x) in resignation">
                     <td>{{ start + $index }}</td>
                     <td><p ng-bind-html="x.remarks | limitTo:50 | trustAsHtml"></p></td>
                    <td>{{ x.date | date }}</td>
                    <td>{{ x.date | date }}</td>
                    <td ><span ng-if="x.leaveDate">{{ x.leaveDate | date }}</span></td>

                    <td>
                      <a  ng-if="x.reason" ng-click="rejectionreason(x.id)" class="btn btn-success" >Rejection Reason</a>

                      <span ng-if="x.status == 0" class="p-0">Pending</span>
                      <span ng-if="x.status == 1" class="p-0">Accepted</span>
                      <span ng-if="x.status == 2" class="p-0">Rejected</span>
                      <span ng-if="x.status == 3" class="p-0">Cancelled</span>
                    </td>
                    <td>
                       <div class="dropdown ac-cstm text-right">
                          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                          </a>
                          <div class="dropdown-menu fadeIn">
                            <a  ng-click="resignationreason(x.id)" class="dropdown-item openDialog" ><i class="fa fa-eye"></i>Resignation Reason</a>
                          </div>
                       </div>
                    </td>

                   </tr>
                   <tr ng-if="resignation.length == 0"><td colspan="4" class="text-center">No Record Found.</td></tr>
                 </tbody>
               </table>
                 </div>
               <div  id="pagination"></div>
             </div>
            <!-- show listing -->

            <!-- rejection modal -->
            <div class="modal fade" id="rejection" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Rejection Reason</h4>
                  </div>
                  <div class="modal-body">
                   <div class="form-group">
                     <p> {{ leavedata.reason  }}</p>
                   </div>
                  </div>
                  <div class="modal-footer">
                    <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- rejection modal -->
            <!-- resignation reason -->
                              <div class="modal fade" id="resignationReason" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title">Resignation Reason</h4>
                                       </div>
                                       <div class="modal-body">
                                          <div class="form-group">
                                              <p ng-bind-html="leavedata.remarks | trustAsHtml" class="dat-p"></p>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- resignation reason -->
            </div>
                  </div>
                    </div>
              </div>
             </div>
   </section>
      </div>
