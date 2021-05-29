
<?php include('sidebar.php');?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a>  </li>
      <li class="active">Add Candidates </li>
    </ol>
  </section>

  <section class="content portfolio-cont recuit-csmt">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp56" ng-controller="myCtrt56">
        <div id="content">

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


                    <div class="col-md-6">
                        <div class="row">
                      <div class="col-md-5 col-sm-12 ">
                       <div class="form-group">
                         <input ng-value="searchname" ng-keyup="search()" ng-model="searchname" type="text" class="form-control " placeholder="Search Name" >
                       </div>
                     </div>
                     </div>
                    </div>
                    <div class="col-md-4 "><a data-toggle="modal" data-target="#addcandidate" class="btn btn-success pull-right">Add Candidate </a></div>
                  </div>

                  <!-- add  -->
                  <div id="addcandidate" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Add Candidate Details</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                            <div class="col-md-6">
                          <div class="form-group ">
                            <label for="name" class="m-0">Name <span class="red-text">*</span></label>
                            <input type="text" placeholder="Please enter name" id="name" class="form-control" name="name" ng-value="name" ng-model="name">
                            <p ng-show="submitl && name == ''" class="text-danger">Please enter name.</p>
                          </div>
                                </div>
                            <div class="col-md-6">
                          <div class="form-group ">
                            <label for="name" class="m-0">Email <span class="red-text">*</span></label>
                            <input type="text" onkeyup="angular.element(this).scope().loginctrl(this)" placeholder="Please enter email" id="email" class="form-control" name="opening" ng-value="email" ng-model="email">
                            <p ng-show="submitl && email == ''" class="text-danger">Please enter email.</p>
                            <p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>

                          </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                          <div class="form-group">
                            <label for="name" class="m-0">Phone <span class="red-text">*</span></label>
                            <input type="text" placeholder="Please enter phone" id="phone1" class="form-control numberonly" name="phone" ng-value="phone" ng-model="phone">
                            <p ng-show="submitl && phone == ''" class="text-danger">Please enter phone.</p>
                            <p ng-show="submitl && phone != '' && phone.length < 9" class="text-danger">Please enter valid phone.</p>
                          </div>
                          </div>

                          <div class="col-md-6">
                              <div class="form-group">
                            <label for="name" class="m-0">Date of Birth <span class="red-text">*</span></label>
                            <input readonly type="text" placeholder="Please select date of birth" mydatepicker="" id="birth" class="form-control" name="birth" ng-value="birth" ng-model="birth">
                            <p ng-show="submitl && birth == ''" class="text-danger">Please enter date of birth.</p>
                          </div>
                            </div>
                            </div>
                             <div class="row">
                            <div class="col-md-6">
                        <div class="form-group ">
                          <label for="name" class="m-0">Gender <span class="red-text">*</span></label>
                          <select type="text" id="gender" class="form-control" name="gender"  ng-model="gender">
                            <option value="">Select Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                          </select>
                          <p ng-show="submitl && gender == ''" class="text-danger">Please select gender.</p>
                        </div>
                                 </div>
                                   <div class="col-md-6">
                          <div class="form-group ">
                            <label for="name" class="m-0">Experience <span class="red-text">*</span></label>
                            <input type="text" placeholder="Please enter experience" id="experience" class="form-control" name="experience" ng-value="experience" ng-model="experience">
                            <p ng-show="submitl && experience == ''" class="text-danger">Please enter experience.</p>
                          </div>
                                 </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                          <div class="form-group ">
                            <label for="name" class="m-0">Current Salary <span class="red-text">*</span></label>
                            <input type="text" placeholder="Please enter current salary" id="current" class="form-control numberonly" name="current" ng-value="current" ng-model="current">
                            <p ng-show="submitl && current == ''" class="text-danger">Please enter current salary.</p>
                          </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                  <label for="name" class="m-0">Currency <span class="red-text">*</span></label>
                                  <select type="text" id="currency" class="form-control" name="currency"  ng-model="currency">
                                    <option value="">Select Currency</option>
                                    <option ng-repeat="(key,x) in allcurrency" value="{{ x.id }}" >{{ x.code }} {{ x.symbol }} </option>
                                  </select>
                                  <p ng-show="submitl && currency == ''" class="text-danger">Please select currency.</p>
                                </div>
                                 </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label for="name" class="m-0">Expected Salary <span class="red-text">*</span></label>
                                    <input placeholder="Please enter expected salary" type="text" id="expected" class="form-control numberonly" name="expected" ng-value="expected" ng-model="expected">
                                    <p ng-show="submitl && expected == ''" class="text-danger">Please enter expected salary.</p>
                                  </div>
                                </div>
                                <!-- <div class="col-md-6">
                          <div class="form-group ">
                            <label for="name" class="m-0">Status <span class="red-text">*</span></label>
                            <select type="text" id="status" class="form-control" name="status"  ng-model="status">
                              <option value="">Select Status</option>
                              <option value="1">Approved</option>
                              <option value="0">Rejected</option>


                            </select>
                            <p ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
                          </div>
                                 </div> -->
                                 <div class="col-md-6">
                               <div class="form-group ">
                                 <label for="name" class="m-0">Notice Period <span class="red-text">*</span></label>
                                 <input type="text" id="period" placeholder="Please enter notice period" class="form-control" name="period" ng-value="period" ng-model="period">
                                 <p ng-show="submitl && period == ''" class="text-danger">Please enter notice period.</p>
                               </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group ">
                                    <label for="name" class="m-0">Skills <span class="red-text">*</span></label>
                                    <input type="text" id="skill" placeholder="Please enter skill" class="form-control" name="skill" ng-value="skill" ng-model="skill">
                                    <p ng-show="submitl && skill == ''" class="text-danger">Please enter skill.</p>
                                  </div>
                                </div>





                                 <div class="col-md-12">
                               <div class="form-group ">
                                 <label for="name" class="m-0">CV <span class="red-text">*</span></label>
                                 <input type="file" onchange="angular.element(this).scope().cvupload(this)" id="cv" class="form-control" name="cv" ng-value="cv" ng-model="cv">
                                 <p class="cvmsg">CV should be in doc, docx, pdf only </p>
                                 <a target="_blank" href="<?php echo base_url(); ?>assets/candidateCv/{{ cv }}">{{ cv }}</a>
                                 <p ng-show="submitl && !cverror && cv == ''" class="text-danger">Please upload cv.</p>
                                 <p ng-cloak ng-show="cverror " class="text-danger">Invalid format</p>

                               </div>
                             </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" ng-click="saverecruitment()" class="btn btn-success" >Submit</button>
                        </div>
                      </div>

                    </div>
                  </div>

                  <!-- add  -->


                  </div>

                  <div class="box-body">
                  <div class="box-body">
                        <div class="table-responsive">
                      <table id="rankingTable" class="table">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Experience</th>
                          <th>Current salary <br>( Expected Salary)</th>
                          <th>CV</th>
                          <th>Status</th>

                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="allrecruitment.length != 0" ng-repeat="(key,x) in allrecruitment">
                          <td>{{ start + $index }}</td>
                          <td>{{ x.candidateName  }}</td>
                          <td>{{ x.candidateEmail  }}</td>
                          <td>{{ x.candidatePhone   }}</td>
                          <td>{{ x.candidateExperience  }}</td>
                          <td>{{ x.code }} {{ x.symbol }} {{ x.candidateCurrentSalary }}<br>  (   {{ x.candidateExpectedSalary   }})</td>
                          <td><a target="_blank" href="<?php echo base_url(); ?>assets/candidateCv/{{ x.candidateCv }}">{{ x.candidateCv}}</a></td>
                          <td>
                          <span ng-if="x.candidateStatus == 1">Approved</span>
                          <span ng-if="x.candidateStatus == 0">Rejected</span>
                          <span ng-if="x.candidateStatus == 2">Submitted</span>
                          </td>

                          <td>
                            <div class="dropdown ac-cstm text-right">
                               <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                  <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                               </a>
                               <div class="dropdown-menu fadeIn">
                                 <a ng-click="viewOpening(x.candidateId)" ><i class="fa fa-eye"></i>View</a>
                                   <a class="dropdown-item" title="Edit" ng-click="editRecruitment(x.candidateId)"><i class="fa fa-edit"></i> Edit</a>
                                   <a class="dropdown-item" title="Delete" data-toggle="modal" ng-click="confirm(x.candidateId)"><i class="fa fa-trash"></i>Delete</a>
                             </div>
                            </div>
                          </td>
                        </tr>
                        <tr ng-if="allrecruitment.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>

                      </tbody>

                    </table>
                    <div  id="pagination"></div>




                    <!-- view -->
                    <div id="view" class="modal fade" role="dialog">
                      <div class="modal-dialog">


                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Candidate Details</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group "><b>Name :</b> {{ view.candidateName }}</div>
                            <div class="form-group ">
                              <b>Email :</b> {{ view.candidateEmail  }}
                            </div>
                            <div class="form-group ">
                              <b>Phone :</b> {{ view.candidatePhone   }}
                            </div>
                            <div class="form-group ">
                              <b>Date Of Birth :</b> {{ view.candidateDateOfBirth   }}
                            </div>
                            <div class="form-group ">
                              <b>Gender :</b>
                              <span ng-if="view.candidateGender == 1">Male</span>
                              <span ng-if="view.candidateGender == 2">Female</span>
                          </div>
                            <div class="form-group ">

                              <b>Experience :</b> {{ view.candidateExperience }}
                            </div>
                            <div class="form-group ">
                              <b>Cv :</b> <a target="_blank" href="<?php echo base_url(); ?>assets/candidateCv/{{ view.candidateCv }}">{{ view.candidateCv}}</a>
                            </div>
                            <div class="form-group ">
                              <b>Current Salary(Expected Salary) :</b> {{ view.code }} {{ view.symbol }} {{ view.candidateCurrentSalary  }}({{ view.candidateExpectedSalary  }})
                           </div>
                          <div class="form-group ">
                            <b>Skills :</b> {{ view.candidateSkill   }}
                         </div>
                          <div class="form-group ">
                            <b>Notice Period :</b> {{ view.candidateNoticePeriod }}
                         </div>
                            <div class="form-group ">
                              <b>Status :</b>
                              <span ng-if="view.candidateStatus  == 1">Approved</span>
                              <span ng-if="view.candidateStatus  == 0">Rejected</span>
                              <span ng-if="view.candidateStatus  == 2">Submitted</span>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true" >Close</button>
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

                    <!-- edit -->
                    <div id="Edit" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Candidate Details</h4>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                              <div class="col-md-6">


                                <div class="form-group ">
                                  <label for="name" class="m-0">Name <span class="red-text">*</span></label>
                                  <input type="text1" id="name1" class="form-control" name="name1" ng-value="name1" ng-model="name1">
                                  <p ng-show="submitl && name1 == ''" class="text-danger">Please enter name.</p>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group ">
                                  <label for="name" class="m-0">Email <span class="red-text">*</span></label>
                                  <input type="text" onkeyup="angular.element(this).scope().loginctrl(this)" id="email1" class="form-control" name="email1" ng-value="email1" ng-model="email1">
                                  <p ng-show="submitl && email1 == ''" class="text-danger">Please enter email.</p>
                                  <p ng-cloak ng-show="email1 != '' && emailvalide" class="text-danger">Please enter valid email address.</p>

                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group ">
                                  <label for="name" class="m-0">Phone <span class="red-text">*</span></label>
                                  <input type="text" id="phone2" class="form-control numberonly" name="phone1" ng-value="phone1" ng-model="phone1">
                                  <p ng-show="submitl && phone1 == ''" class="text-danger">Please enter phone.</p>
                                  <p ng-show="submitl && phone1 != '' && phone1.length < 9" class="text-danger">Please enter valid phone.</p>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="name" class="m-0">Date of Birth <span class="red-text">*</span></label>
                                  <input type="text" mydatepicker1="" id="birth1" class="form-control" name="birth1" ng-value="birth1" ng-model="birth1">
                                  <p ng-show="submitl && birth1 == ''" class="text-danger">Please enter date of birth.</p>
                                </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name" class="m-0">Gender <span class="red-text">*</span></label>
                                    <select type="text" id="gender1" class="form-control" name="gender1"  ng-model="gender1">
                                      <option value="">Select Gender</option>
                                      <option value="1">Male</option>
                                      <option value="2">Female</option>
                                    </select>
                                    <p ng-show="submitl && gender1 == ''" class="text-danger">Please select gender.</p>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name" class="m-0">Currency <span class="red-text">*</span></label>
                                    <select type="text" id="currency1" class="form-control" name="currency1"  ng-model="currency1">
                                      <option value="">Select Currency</option>
                                      <option ng-repeat="(key,x) in allcurrency" value="{{ x.id }}" >{{ x.code }} {{ x.symbol }} </option>
                                    </select>
                                    <p ng-show="submitl && currency1 == ''" class="text-danger">Please select currency.</p>
                                  </div>
                               </div>
                              <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Experience <span class="red-text">*</span></label>
                              <input type="text" id="experience1" class="form-control " name="experience1" ng-value="experience1" ng-model="experience1">
                              <p ng-show="submitl && experience1 == ''" class="text-danger">Please enter experience.</p>
                            </div>
                                  </div>
                              <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Current Salary <span class="red-text">*</span></label>
                              <input type="text" id="current1" class="form-control numberonly" name="current1" ng-value="current1" ng-model="current1">
                              <p ng-show="submitl && current1 == ''" class="text-danger">Please enter current salary.</p>
                            </div>
                                  </div>
                              <div class="col-md-6">

                                <div class="form-group ">
                                  <label for="name" class="m-0">Expected Salary <span class="red-text">*</span></label>
                                  <input type="text" id="expected1" class="form-control numberonly" name="expected1" ng-value="expected1" ng-model="expected1">
                                  <p ng-show="submitl && expected1 == ''" class="text-danger">Please enter expected salary.</p>
                                </div>
                              </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                      <label for="name" class="m-0">Skills <span class="red-text">*</span></label>
                                      <input type="text" id="skill" class="form-control" name="skill" ng-value="skill1" ng-model="skill1">
                                      <p ng-show="submitl && skill1 == ''" class="text-danger">Please enter skill.</p>
                                    </div>
                                  </div>
                                      <div class="col-md-12">
                                    <div class="form-group ">
                                      <label for="name" class="m-0">CV <span class="red-text">*</span></label>
                                      <input type="file" onchange="angular.element(this).scope().cvupload1(this)" id="cv" class="form-control" name="cv" ng-value="cv" ng-model="cv">
                                      <p class="cvmsg">CV should be in doc, docx, pdf only </p>
                                      <a target="_blank" href="<?php echo base_url(); ?>assets/candidateCv/{{ cv1 }}">{{ cv1 }}</a>
                                      <p ng-show="submitl && !cverror1 && cv1 == ''" class="text-danger">Please upload cv.</p>
                                      <p ng-cloak ng-show="cverror1" class="text-danger">Invalid format</p>
                                    </div>
                                  </div>

                              <div class="col-md-6">
                            <div class="form-group ">
                              <label for="name" class="m-0">Notice Period <span class="red-text">*</span></label>
                              <input type="text" id="period1" placeholder="Please enter notice period" class="form-control" name="period1" ng-value="period1" ng-model="period1">
                              <p ng-show="submitl && period1 == ''" class="text-danger">Please enter notice period.</p>
                            </div>
                                      </div>
                              <div class="col-md-6">

                                    <div class="form-group ">
                                      <label for="name" class="m-0">Status <span class="red-text">*</span></label>
                                      <select type="text" id="status1" class="form-control" name="status1"  ng-model="status1">
                                        <option value="">Select Status</option>
                                        <option value="1">Approved</option>
                                        <option value="0">Rejected</option>
                                        <option ng-if="x.status1 == 2" value="2">Submitted</option>
                                      </select>
                                      <p ng-show="submitl && status1 == ''" class="text-danger">Please select status.</p>
                                    </div>
                              </div>
                          </div>
                        </div>
                          <div class="modal-footer">
                            <button type="button" ng-click="update()" class="btn btn-success" >Submit</button>
                          </div>
                    </div>
                    </div>
                    <!-- edit-->

                  </div>
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
