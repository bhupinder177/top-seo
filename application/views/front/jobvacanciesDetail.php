

<div class="jobvacanciesDetail" ng-app="myApp19" ng-controller="myCtrt19" >
        <div class="container">
            <div class="row">
              <?php if(!empty($result))
              { ?>
                <div class="col-sm-12">

                    <div class="job-title">
                        <h2 style="text-align:center;"><?php echo $result->vacancyPosition; ?></h2>
                    </div>
                    <div class="job-description">
                        <h1>Description:<span><?php echo $result->vacancyResponsibilities; ?></span></h1>

                        <div class="budget-sec">
                            <h1>Profile :   <span><?php echo  $result->vacancyProfile; ?> </span></h1>
                            <h1>Industry :   <span><?php echo  $result->vacancyIndustry; ?> </span></h1>
                        </div>
                        <div class="budget-sec">
                            <h1>Openings :   <span><?php echo  $result->vacancyNoOfOpening; ?> </span></h1>
                            <h1>Skills :  <span> <?php echo $result->vacancySkill; ?> </span></h1>
                        </div>
                        <div class="budget-sec">
                            <h1>Experience : <span> <?php echo $result->vacancyExperience; ?>-<?php echo $result->vacancyExperienceMax; ?> </span></h1>
                            <h1>Job Location : <span> <?php echo $result->vacancyLocation; ?> </span></h1>
                        </div>
                        <div class="budget-sec">
                            <h1>CTC : <span> <?php echo $result->vacancyCtc; ?> </span></h1>
                            <h1>Company  : <span> <?php echo $company->c_name; ?> </span></h1>
                        </div>
          <a ng-if="loginuserParentId != '<?php echo $result->userId; ?>' && loginuserParentId != 0 && alreadyApplied == 0" data-toggle="modal" data-target="#addcandidate">Apply Now</a>
          <a ng-if="!loginuserParentId && alreadyApplied == 0" data-toggle="modal" data-target="#addcandidate">Apply Now</a>
          <a ng-if="alreadyApplied == 1" >Applied</a>


                    </div>
                </div>

                <!-- add  -->
                <div id="addcandidate" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Apply</h4>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                          <div class="col-md-6">
                        <div class="form-group ">
                          <label for="name" class="m-0">Name <span class="red-text">*</span></label>
                          <input type="text" placeholder="Please enter name" id="name" class="form-control characteronly" name="name" ng-value="name" ng-model="name">
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
                          <label for="name" class="m-0">Phone No <span class="red-text">*</span></label>
                          <input type="text" numbers-only placeholder="Please enter phone" id="phone1" class="form-control" name="phone" ng-value="phone" ng-model="phone">
                          <p ng-show="submitl && phone == ''" class="text-danger">Please enter phone no.</p>
                          <p ng-show="phone != '' && phone.length < 10 || phone.length > 12" class="text-danger">Please enter valid phone no.</p>
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
                          <input type="text" placeholder="Please enter experience" id="experience" class="form-control specialcharacter" name="experience" ng-value="experience" ng-model="experience">
                          <p ng-show="submitl && experience == ''" class="text-danger">Please enter experience.</p>
                        </div>
                               </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                        <div class="form-group ">
                          <label for="name" class="m-0">Current Salary <span class="red-text">*</span></label>
                          <input numbers-only type="text" placeholder="Please enter current salary" id="current" class="form-control numberonly" name="current" ng-value="current" ng-model="current">
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
                                  <input numbers-only placeholder="Please enter expected salary" type="text" id="expected" class="form-control numberonly" name="expected" ng-value="expected" ng-model="expected">
                                  <p ng-show="submitl && expected == ''" class="text-danger">Please enter expected salary.</p>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group ">
                                  <label for="name" class="m-0">Skills <span class="red-text">*</span></label>
                                  <input type="text" id="skill" placeholder="Please enter skill" class="form-control" name="skill" ng-value="skill" ng-model="skill">
                                  <p ng-show="submitl && skill == ''" class="text-danger">Please enter skills.</p>
                                </div>
                              </div>

                               <div class="col-md-6">
                             <div class="form-group ">
                               <label for="name" class="m-0">CV <span class="red-text">*</span></label>
                               <input type="file" onchange="angular.element(this).scope().cvupload(this)" id="cv" class="form-control" name="cv" ng-value="cv" ng-model="cv">
                               <p class="cvmsg">CV should be in doc, docx, pdf only </p>
                               <a class="jobattachment" target="_blank" href="<?php echo base_url(); ?>assets/candidateCv/{{ cv }}">{{ cv }}</a>
                               <p ng-show="submitl && !cverror && cv == ''" class="text-danger">Please select cv.</p>
                               <p ng-cloak ng-show="cverror " class="text-danger">Invalid format</p>

                             </div>
                           </div>

                           <div class="col-md-6">
                             <div class="form-group ">
                               <label for="name" class="m-0">Notice Period <span class="red-text">*</span></label>
                               <input numbers-only type="text" id="noticeperiod" placeholder="Please enter notice period" class="form-control" name="noticeperiod" ng-value="noticeperiod" ng-model="noticeperiod">
                               <p ng-show="submitl && noticeperiod == ''" class="text-danger">Please enter notice period.</p>
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
              <?php }
              else {
                ?>
                <div class="col-sm-12">
                  <div  class="norecordfound">
                    <p style="color:red;">Job is Expired</p>
                  </div>
                 </div>
              <?php } ?>
            </div>
    </div>
</div>
