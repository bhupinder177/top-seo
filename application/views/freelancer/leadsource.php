<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
        <li class="active">Lead Source</li>
      </ol>
    </section>


<section class="content portfolio-cont Project-sect">
   <div class=" no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp74" ng-controller="myCtrt74">
          <div id="content">
      <div class="no-border-radius">
            <div class="row">
                  <div class="col-md-12">
                    <div class="box bg-white rounded c-pass-sec">
                      <div class="box-header with-border">
                           <a data-toggle="modal" data-target="#addsource"  class="btn btn-success pull-right">Add New Lead Source</a>
             				 </div>

                     <!-- add source -->
                     <div id="addsource" class="modal fade" role="dialog">
                       <div class="modal-dialog">

                         <!-- Modal content-->
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                             <h4 class="modal-title">Add Lead Source</h4>
                           </div>
                           <div class="modal-body">

                             <div class="form-group ">
                               <label for="name" class="m-0">Source <span class="red-text">*</span></label>
                               <input id="title" class="form-control" name="title" ng-model="title" placeholder="Please enter lead source">
                               <p ng-show="submitl && title == ''" class="text-danger">Please enter source.</p>
                             </div>
                           </div>
                           <div class="modal-footer">
                             <button type="button" ng-click="submit()" class="btn btn-success" >Submit</button>
                           </div>
                         </div>
                       </div>
                     </div>
                     <!-- add source -->

             				 <div class="box-body">
                                 <div class="table-responsive">
                      					 <table class="table">
                      						 <thead>
                      							 <tr>
                                    <th>S. No.</th>
                                    <th>Source</th>
                                    <th class="text-right">Action</th>
                                    </tr>
                      						 </thead>
                      						 <tbody>
                                                 <tr ng-if="allsource.length != 0" ng-repeat="(key,x) in allsource">
                                        <td>{{ start + $index }}</td>

                                         <td>{{ x.source }}</td>



                                         <td ng-if="x.byDefault == 0" class="project-action">
                                    <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a class="dropdown-item" ng-click="edit(x.lead_sourceId)"  ><i class="fa fa-edit"></i> Edit</a>
                                     <a class="dropdown-item" ng-click="confirm(x.lead_sourceId)"><i class="fa fa-trash"></i>Delete</a>
                               </div>
                              </div>
                                             </td>
                                                 </tr>
                      								 <tr ng-if="alllead.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
                      						 </tbody>
                      					 </table>
                                 </div>
                      					 <div  id="pagination"></div>

                                 <!-- delete confirm modal -->
                      					 <div class="modal fade" id="Delete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
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
                        <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>

                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                      </div>
                      </div>
                      </div>
                      					 <!-- delete confirm modal -->

                                 <!-- edit source -->
                                 <div id="editsource" class="modal fade" role="dialog">
                                   <div class="modal-dialog">

                                     <!-- Modal content-->
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <h4 class="modal-title">Edit Lead Source</h4>
                                       </div>
                                       <div class="modal-body">

                                         <div class="form-group ">
                                           <label for="name" class="m-0">Source <span class="red-text">*</span></label>
                                           <input id="title1" class="form-control" name="title" ng-model="title1" ng-value="title1" placeholder="Please enter lead source">
                                           <p ng-show="submitl && title1 == ''" class="text-danger">Please enter source.</p>
                                         </div>
                                       </div>
                                       <div class="modal-footer">
                                         <button type="button" ng-click="update()" class="btn btn-success" >Submit</button>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 <!-- edit source -->
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
