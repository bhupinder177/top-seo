<?php

include('sidebar.php');
?>

<div id="wrapper" class="content-wrapper">
  <section class="content-header">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Performance form</li>
    </ol>
  </section>
  <section class="content portfolio-cont">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp94" ng-controller="myCtrt94">
        <div id="content">
          <div id="content-header">
          </div>
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box">

                  <div class="box-header text-right p-2">
                <div class="row">
                  <div class="col-md-2">
                               <div class="form-group">
                                 <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                                   <option value="10">10</option>
                                   <option value="20">20</option>
                                   <option value="50">50</option>
                                   <option value="100">100</option>
                                 </select>
                               </div>
                               </div>
                  <div class="col-md-9">
                    <a href="<?php echo base_url(); ?>performance-form-add/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"  class="btn btn-success pull-right">Add Performance Form</a>
                   </div>

            </div>
                  </div>

                  <div class="box-body">
                      <div class="table-responsive">
                    <table class="table  table-condensed">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Department</th>
                        </tr>
                      </thead>
                      <tbody>

                        <tr ng-if="all.length != 0" ng-repeat="(key,x) in all">
                          <td>{{ start + $index }}</td>
                          <td>{{ x.department }}</td>
                        </tr>
                        <tr ng-if="all.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
                      </tbody>
                    </table>
                      </div>
                    <div  id="pagination"></div>





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
          </div>

        </div>
      </div>
    </div>

  </section>
</div>
