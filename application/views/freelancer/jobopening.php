
<?php include('sidebar.php');?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active"> Job Openings</li>
    </ol>
  </section>


  <section class="content portfolio-cont recuit-csmt">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp55" ng-controller="myCtrt55">
        <div id="content">
          <div id="content-header">
          </div>

          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box">

                  <div class="box-header with-border">
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

                    <div class="col-md-10">
                      <div class="p-2 text-right"><a data-toggle="modal" data-target="#addopening" class="btn btn-success mb-0">Create A Job</a></div>
                    </div>
                    </div>
                    <!-- add dsr -->
                    <div id="addopening" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Create A Job</h4>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Position / Title<span class="red-text">*</span></label>
                              <input placeholder="Please enter position" type="text" id="position" class="form-control" name="position" ng-value="position" ng-model="position">
                              <p ng-show="submitl && position == ''" class="text-danger">Please enter position.</p>
                                </div>
                                </div>
                                   <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">No. Of Openings <span class="red-text">*</span></label>
                              <input placeholder="Please enter no. of openings" type="text" id="opening" numbers-only="numbers-only" class="form-control" name="opening" ng-value="opening" ng-model="opening">
                              <p ng-show="submitl && opening == ''" class="text-danger">Please enter no. of opening.</p>
                            </div>
                                  </div>
                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Department <span class="red-text">*</span></label>
                              <select  id="department" class="form-control" name="department" ng-value="departmentId" ng-model="departmentId">
                                <option value="">Select department</option>
                                <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>

                              </select>
                              <p ng-show="submitl && departmentId == ''" class="text-danger">Please select department.</p>
                            </div> </div>
                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Desired Candidate Profile <span class="red-text">*</span></label>
                              <input placeholder="Please enter profile" type="text" id="profile" class="form-control" name="profile" ng-value="profile" ng-model="profile">
                              <p ng-show="submitl && profile == ''" class="text-danger">Please enter profile.</p>
                            </div> </div>

                            <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0"> Job Location <span class="red-text">*</span></label>
                              <input placeholder="Please enter location" type="text" id="location" class="form-control" name="location" ng-value="location" ng-model="location">
                              <p ng-show="submitl && location == ''" class="text-danger">Please enter location.</p>
                              </div>
                            </div>

                            <div class="col-md-6">
                      <div class="form-group ">
                        <label for="name" class="m-0">Industry Type <span class="red-text">*</span></label>
                        <input placeholder="Please enter industry type" type="text" id="industry" class="form-control" name="industry" ng-value="industry" ng-model="industry">
                        <p ng-show="submitl && industry == ''" class="text-danger">Please enter industry type.</p>
                      </div>
                            </div>

                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Experience(Min) <span class="red-text">*</span></label>
                              <input numbers-only="numbers-only" placeholder="Please enter experience min" type="text" id="experience" class="form-control numberonly" name="experience" ng-value="experience" ng-model="experience">
                              <p ng-show="submitl && experience == ''" class="text-danger">Please enter experience min.</p>
                            </div>
                                  </div>
                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Experience(Max) <span class="red-text">*</span></label>
                              <input numbers-only="numbers-only" placeholder="Please enter experience max" type="text" id="experiencemax" class="form-control numberonly" name="experiencemax" ng-value="experienceMax" ng-model="experienceMax">
                              <p ng-show="submitl && experienceMax == ''" class="text-danger">Please enter experience max.</p>
                            </div>
                                  </div>
                                  <div class="col-md-12">
                            <div class="form-group ">
                              <label for="name" class="m-0">CTC <span class="red-text">*</span></label>
                              <input placeholder="Please enter ctc" type="text" id="profile" class="form-control" name="ctc" ng-value="ctc" ng-model="ctc">
                              <p ng-show="submitl && ctc == ''" class="text-danger">Please enter ctc.</p>
                            </div> </div>

                                  <div class="col-md-12">
                                  <div class="form-group ">
                                    <label for="name" class="m-0">Essential Skills <span class="red-text">*</span></label>
                                    <input placeholder="Please enter skill" type="text" id="skill" class="form-control" name="skill" ng-value="skill" ng-model="skill">
                                    <p ng-show="submitl && skill == ''" class="text-danger">Please enter skill.</p>
                                    </div>
                                  </div>
                                  <!-- <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Status <span class="red-text">*</span></label>
                              <select type="text" id="status" class="form-control" name="status"  ng-model="status">
                                <option value="">Select Status</option>
                                <option value="1">Open</option>
                                <option value="0">Closed</option>
                              </select>
                              <p ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
                            </div>
                                  </div> -->
                                  <div class="col-md-12">
                            <div class="form-group ">
                              <label for="name" class="m-0">Job Responsibilities <span class="red-text">*</span></label>
                              <textarea placeholder="Please enter job responsibilities" type="text" id="responsibility" class="form-control ckeditor" name="responsibility" ng-value="responsibility" ng-model="responsibility"></textarea>
                              <p ng-show="submitl && responsibility == ''" class="text-danger">Please enter job responsibilities.</p>
                            </div>
                                  </div>

                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="saveopening()" class="btn btn-success" >Submit</button>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- add dsr -->

                  </div>


                  <div class="box-body">
                      <div class="table-responsive">
                    <table id="rankingTable" class="table">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Position</th>
                          <th>No. Of Openings</th>
                          <th>Desired Candidate Profile</th>
                          <th>Skills</th>
                          <th>Experience</th>
                          <th>Industry</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="allopening.length != 0" ng-repeat="(key,x) in allopening">
                          <td>{{ start + $index }}</td>
                          <td>
                           {{ x.vacancyPosition }}
                          </td>
                          <td>
                            {{ x.vacancyNoOfOpening }}
                            </td>
                            <td>{{ x.vacancyProfile  }}</td>
                            <td>{{ x.vacancySkill }}</td>
                            <td>{{ x.vacancyExperience  }}-{{ x.vacancyExperienceMax  }}</td>


                            </td>
                          <td>{{ x.vacancyIndustry  }}</td>
                          <td>

                        <span ng-if="x.vacancyStatus == 1">Open</span>
                        <span ng-if="x.vacancyStatus == 0">Closed</span>
                          </td>


                          <td>
                              <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                   <a ng-click="viewOpening(x.vacancyId)" ><i class="fa fa-eye"></i>View</a>
                                     <a class="dropdown-item" title="Edit" ng-click="editOpening(x.vacancyId)"><i class="fa fa-edit"></i> Edit</a>
                                     <a class="dropdown-item" title="Delete" data-toggle="modal" ng-click="confirm(x.vacancyId)"><i class="fa fa-trash"></i>Delete</a>
                               </div>
                              </div>
                          </td>
                        </tr>
                        <tr ng-if="allopening.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>

                      </tbody>

                    </table>

                      </div>
                    <div  id="pagination"></div>
                      <!-- view -->
                    <div id="view" class="jobopeningview modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Job Details</h4>
                          </div>
                          <div class="modal-body">

                            <div class="form-group "><b>Position :</b> {{ view.vacancyPosition }}</div>
                            <div class="form-group ">
                              <b>No. Of Openings :</b> {{ view.vacancyNoOfOpening  }}
                            </div>
                            <div class="form-group ">
                              <b>Desired Candidate Profile :</b> {{ view.vacancyProfile  }}
                            </div>
                            <div class="form-group ">
                              <b>CTC :</b> {{ view.vacancyCtc  }}
                            </div>
                            <div class="form-group ">
                              <b>Skills :</b> {{ view.vacancySkill  }}
                            </div>
                            <div class="form-group ">
                              <b>Experience :</b> {{ view.vacancyExperience  }} - {{ view.vacancyExperienceMax  }}

                            </div>
                            <div class="form-group ">
                              <b>Industry Type :</b> {{ view.vacancyIndustry  }}

                            </div>
                            <div class="form-group ">
                              <b> Job Location :</b> {{ view.vacancyLocation  }}

                            </div>
                            <div class="form-group ">
                              <b>Job Responsibilities :</b><span ng-bind-html="view.vacancyResponsibilities |trustAsHtml"></span>
                            </div>
                            <div class="form-group ">
                              <b>Status :</b>

                              <span ng-if="view.vacancyStatus == 1">Open</span>
                              <span ng-if="view.vacancyStatus == 0">Closed</span>

                            </div>
                            <div class="form-group ">
                              <b>Added On :</b> {{ view.date | date  }}

                            </div>


                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true" >Close</button>
                          </div>

                        </div>

                        </div>
                      </div>
                    </div>
                    <!-- view -->

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

                    <!-- edit dsr -->
                    <div id="Edit" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Job Details</h4>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Position <span class="red-text">*</span></label>
                              <input type="text" id="position1" class="form-control" name="position1" ng-value="position1" ng-model="position1">
                              <p ng-show="submitl && position1 == ''" class="text-danger">Position is required.</p>
                            </div>
                                  </div>
                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">No. Of Openings <span class="red-text">*</span></label>
                              <input type="text" id="opening1" numbers-only="numbers-only" class="form-control" name="opening1" ng-value="opening1" ng-model="opening1">
                              <p ng-show="submitl && opening1 == ''" class="text-danger">Please enter no of opening.</p>
                            </div>
                                    </div>
                                    <div class="col-md-6">
                              <div class="form-group ">
                                <label for="name" class="m-0">Department <span class="red-text">*</span></label>
                                <select  id="department" class="form-control" name="department" ng-value="departmentId1" ng-model="departmentId1">
                                  <option value="">Select department</option>
                                  <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>

                                </select>
                                <p ng-show="submitl && departmentId1 == ''" class="text-danger">Please select department.</p>
                              </div> </div>
                                <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Desired Candidate Profile <span class="red-text">*</span></label>
                              <input type="text" id="profile1" class="form-control" name="profile1" ng-value="profile1" ng-model="profile1">
                              <p ng-show="submitl && profile1 == ''" class="text-danger">Please enter profile.</p>
                            </div>
                                  </div>


                                  <div class="col-md-6">
                                  <div class="form-group ">
                                    <label for="name" class="m-0"> Job Location <span class="red-text">*</span></label>
                                    <input placeholder="Please enter location" type="text" id="location" class="form-control" name="location" ng-value="location1" ng-model="location1">
                                    <p ng-show="submitl && location1 == ''" class="text-danger">Please enter location.</p>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Industry Type <span class="red-text">*</span></label>
                              <input type="text" id="industry1" class="form-control" name="industry1" ng-value="industry1" ng-model="industry1">
                              <p ng-show="submitl && industry1 == ''" class="text-danger">Please enter industry type.</p>
                            </div>
                                  </div>

                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Experience <span class="red-text">*</span></label>
                              <input numbers-only="numbers-only" type="text" id="experience1" class="form-control numberonly" name="experience1" ng-value="experience1" ng-model="experience1">
                              <p ng-show="submitl && experience1 == ''" class="text-danger">Please enter experience min.</p>
                            </div>
                                  </div>
                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Experience(Max) <span class="red-text">*</span></label>
                              <input numbers-only="numbers-only" placeholder="Please enter experience max" type="text" id="experiencemax1" class="form-control numberonly" name="experiencemax1" ng-value="experienceMax1" ng-model="experienceMax1">
                              <p ng-show="submitl && experienceMax1 == ''" class="text-danger">Please enter experience max.</p>
                            </div>
                                  </div>

                                  <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">CTC <span class="red-text">*</span></label>
                              <input  placeholder="Please enter ctc" type="text" id="profile" class="form-control" name="ctc" ng-value="ctc1" ng-model="ctc1">
                              <p ng-show="submitl && ctc1 == ''" class="text-danger">Please enter ctc.</p>
                            </div> </div>
                            <div class="col-md-6">
                          <div class="form-group ">
                          <label for="name" class="m-0">Status <span class="red-text">*</span></label>
                          <select type="text" id="status1" class="form-control" name="status1"  ng-model="status1">
                          <option value="">Select Status</option>
                          <option value="1">Open</option>
                          <option value="0">Closed</option>
                          </select>
                          <p ng-show="submitl && status1 == ''" class="text-danger">Please select status.</p>
                          </div>
                            </div>
                                    <div class="col-md-12">
                            <div class="form-group ">
                              <label for="name" class="m-0">Essential Skills <span class="red-text">*</span></label>
                              <input type="text" id="skill1" class="form-control" name="skill" ng-value="skill1" ng-model="skill1">
                              <p ng-show="submitl && skill1 == ''" class="text-danger">Please enter skill.</p>
                            </div>
                                  </div>


                                  <div class="col-md-12">
                            <div class="form-group ">
                              <label for="name" class="m-0">Job Responsibilities <span class="red-text">*</span></label>
                              <textarea type="text" id="responsibility1" class="form-control ckeditor" name="responsibility1"  ng-model="responsibility1"></textarea>
                              <p ng-show="submitl && responsibility1 == ''" class="text-danger">Please enter job responsibilities.</p>
                            </div>
                                  </div>


                          </div>

                        </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="update()" class="btn btn-success" >Update</button>
                          </div>

                      </div>
                    </div>
                    <!-- edit dsr -->

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
