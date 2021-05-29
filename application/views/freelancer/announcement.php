
<?php include('sidebar.php'); ?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Announcement</li>
    </ol>
  </section>

  <section class="content portfolio-cont dep-cstm">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp60" ng-controller="myCtrt60">

        <div id="content">

        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box">



                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-2 form-group">

      <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="100">100</option>
      </select>

    </div>
                      <div class="col-md-10 text-right"><a  ng-click="addannouncementopen()" class="btn mb-0 btn-success">Add Announcement</a></div>
                    </div>
                    <!-- addleave -->
                    <div id="addannouncement" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Announcement</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                              <label for="name" class="m-0">Subject<span class="red-text">*</span></label>
                              <input id="title" class="form-control" name="subject" ng-value="subject" ng-model="subject" placeholder="Please enter subject">
                              <p ng-show="submitl && subject == ''" class="text-danger">Please enter subject.</p>
                            </div>
                            <div class="form-group ">
                              <label for="name" class="m-0">Date<span class="red-text">*</span></label>
                              <input id="date" mydatepicker class="form-control" name="date" ng-model="date" placeholder="Please enter date">
                              <p ng-show="submitl && date == ''" class="text-danger">Please enter date.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Message<span class="red-text">*</span></label>
                              <textarea id="message"  class="form-control"  ng-value="message" ng-model="message" placeholder="Please enter message"></textarea>
                              <p ng-show="submitl && message == ''" class="text-danger">Please enter message.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Send To All</label>
                              <input type="checkbox" class="sendtoall" ng-disabled="disabled1" ng-click="checksendtoall()" id="sendtoall"  class="" name="sendtoall" ng-value="sendtoall" ng-model="sendtoall">
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Send To</label>
                              <input placeholder="Please enter employee name" ng-readonly="disabled" type="text" id="sendto" onkeyup="angular.element(this).scope().employeekeyup(this)"  class="form-control sendto" name="sendto" ng-value="sendto" ng-model="sendto">
                              <div class="chosen-drop11">
                            <ul ng-if="allemployee.length != 0" class="chosen-results1" id="chosenresults11">
                            <li  ng-click="selectemployee(key)" ng-repeat="(key,x) in allemployee"  class="active-result" style="" data-id="{{ x.id }}">{{ x.name }}</li>
                             </ul>
                             </div>
                              <div class="chosen-choices tags">


                              <div class="chosen-choices tags">
                              <a ng-if="selectedemployee.length != 0" ng-repeat="(key,x) in selectedemployee"  class="search-choice">{{ x.name }}
                              <span class="search-choice-close" ng-click="removeEmployee(key)" >×</span></a>
                            </div>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="save()" class="btn btn-success" >Submit</button>
                          </div>

                      </div>
                    </div>
                  </div>
                </div>

                    <!-- add leave -->

                  </div>




                  <div class="box-body">
                      <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Subject</th>
                          <th style="min-width:250px;">Message</th>
                          <th>Sent To</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>


                        <tr ng-if="all.length != 0" ng-repeat="(key,x) in all">
                          <td>{{ start + $index  }}</td>
                          <td>{{ x.annSubject }}</td>
                          <td>{{ x.annMessage | limitTo:80 }}</td>
                          <td>
                          <span ng-if="x.annSendAll == 1">Sent All</span>

                          <span ng-if="x.annSendAll == 0"> <a ng-repeat="(key,x2) in x.users">{{ x2.name }}<span ng-if="key != (x.users.length -1)">, </span></a></span>

                          </td>
                          <td>{{ x.annDate | date }}</td>
                          <td>
                            <div class="dropdown ac-cstm text-center">
                           <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                           <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                           </a>
                           <div class="dropdown-menu fadeIn">
                           <a class="dropdown-item" title="Edit todo" ng-click="edit(x.annId)"><i class="fa fa-edit"></i> Edit</a>
                           <a class="dropdown-item"  ng-click="confirm(x.annId)" href="#"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                           </div>
                            <!-- <span title="Edit Announcement"><button class="btn btn-sm" ng-click="edit(x.annId)"><i class="fa fa-edit"></i></button></span>

                            <button ng-click="confirm(x.annId)" class="btn btn-link p-0 pointer btn-sm delme"><i class="fa fa-trash"></i></button> -->

                          </td>

                        </tr>
                        <tr ng-if="all.length == 0"><td colspan="2">No Record Found.</td></tr>

                      </tbody>

                    </table>

                    <div  id="pagination"></div>




                    <!-- Edit leave -->
                    <div id="edit" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Announcement</h4>
                          </div>
                          <div class="modal-body">

                            <div class="form-group ">
                              <label for="name" class="m-0">Subject<span class="red-text">*</span></label>
                              <input id="title" class="form-control" name="subject" ng-value="subject1" ng-model="subject1" placeholder="Please enter subject">
                              <p ng-show="submitl && subject1 == ''" class="text-danger">Please enter subject.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Date<span class="red-text">*</span></label>
                              <input id="date1" mydatepicker class="form-control" name="date" ng-model="date1" placeholder="Please enter date">
                              <p ng-show="submitl && date1 == ''" class="text-danger">Please enter date.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Message<span class="red-text">*</span></label>
                              <textarea id="date"  class="form-control" name="date" ng-value="message1" ng-model="message1" placeholder="Please enter message"></textarea>
                              <p ng-show="submitl && message1 == ''" class="text-danger">Please enter message.</p>
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Send All</label>
                              <input ng-click="checksendtoall()" class="sendtoall" ng-disabled="disabled2" type="checkbox" ng-checked="sendtoall1" id="sendtoall1"  class="" name="sendtoall1" ng-value="sendtoall1" value="1" ng-model="sendtoall1">
                            </div>

                            <div class="form-group ">
                              <label for="name" class="m-0">Send To</label>
                              <input   placeholder="Please enter employee name" ng-readonly="sendtoall1" type="text" id="sendto" onkeyup="angular.element(this).scope().employeekeyup(this)"  class="form-control sendto" name="sendto" ng-value="sendto" ng-model="sendto">
                              <div class="chosen-drop11">
                            <ul ng-if="allemployee.length != 0" class="chosen-results1" id="chosenresults11">
                            <li  ng-click="selectemployee(key)" ng-repeat="(key,x) in allemployee"  class="active-result" style="" data-id="{{ x.id }}">{{ x.name }}</li>
                             </ul>
                             </div>
                              <div class="chosen-choices tags">

                              <a ng-if="selectedemployee.length != 0" ng-repeat="(key,x) in selectedemployee"  class="search-choice">{{ x.name }}
                              <span class="search-choice-close" ng-click="removeEmployee1(key)" >×</span></a>
                            </div>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="update()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- Edit leave -->
                    <!-- delete confirm modal -->
                    <div class="modal fade" id="Delete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Delete</h4>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure you want to delete this record ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>

                            <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- delete confirm modal -->

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
