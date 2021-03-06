<?php include('sidebar.php'); ?>
    <div id="wrapper" class="content-wrapper">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
                <li class="active">Profile</li>
            </ol>
        </section>

        <!--main-container-part-->

        <section class="content userprofile team-profile">
            <div ng-cloak ng-app="myApp89" ng-controller="myCtrt89" class="p-3 bg-white rounded">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="name">Full Name <span class="red-text">*</span></label>
                            <input ng-value="profile.name" ng-model="profile.name" type="text" class="characteronly is_required validate account_input form-control" id="name">
                            <p ng-show="infoSubmit && profile.name == ''" class="text-danger">Name is required.</p>
                        </div>

                        <div class="form-group mb-0">
                            <label for="name">Profile Image <span class="red-text">*</span></label>
                            <input type="file" accept="image/*"/ class="is_required validate account_input form-control" id="logocroped" name="image">
                            <img src="<?php echo base_url(); ?>assets/client_images/{{ profile.logo }}" id="logoview" width="100" height="100" alt="" />
                            <p ng-show="infoSubmit && profile.logo == '' && !companylogoerror " class="text-danger">Profile image is required.</p>
                            <p ng-cloak ng-show="companylogoerror" class="text-danger">Invalid Image format</p>

                        </div>

                        <div class="form-group">
                           <label>Skype<span class="red-text">*</span></label>
                           <input type="text" class="form-control rounded-0" ng-model="profile.skype" ng-value="profile.skype" id="skype" placeholder="Skype"  />
                           <p ng-show="updatesubmit && profile.skype == ''" class="text-danger">Skype is required.</p>
                        </div>

                        <div class="form-group">
                           <label>Joining Date<span class="red-text">*</span></label>
                           <input readonly  type="text" mydatepicker1="" class="form-control" ng-model="profile.joiningdate" ng-value="profile.joiningdate" name="joiningdate1" id="joiningdate1">
                           <p ng-cloak ng-show="submitteam && profile.joiningdate == ''" class="text-danger">Joining date is required.</p>
                        </div>

                        <div class="form-group">
                            <label for="desig">Date Of Birth <span class="red-text">*</span></label>
                            <input readonly type="text" mydatepicker="" class="required is_required validate account_input form-control" id="dateofbirth" ng-model="profile.dateofbirth" ng-value="{{ profile.dateofbirth }}">
                            <p ng-show="infoSubmit && profile.dateofbirth == ''" class="text-danger">Date of birth is required.</p>
                        </div>

                        <div class="form-group">
                            <label for="desig">Marital Status <span class="red-text">*</span></label>
                            <select class="required is_required validate account_input form-control" id="maritalStatus" ng-model="profile.maritalStatus">
                                <option value="">Select Marital Status</option>
                                <option value="1">Single</option>
                                <option value="2">Married</option>
                            </select>
                            <p ng-show="infoSubmit && !profile.maritalStatus" class="text-danger">Marital status is required.</p>
                        </div>

                        <div ng-if="profile.maritalStatus == 2" class="form-group">
                            <label for="desig">Marriage Anniversary <span class="red-text">*</span></label>
                            <input type="text" mydatepicker="" class="required is_required validate account_input form-control" id="marriageAnniversary" ng-model="profile.marriageAnniversary" ng-value="{{ profile.marriageAnniversary }}">
                            <p ng-show="infoSubmit && profile.marriageAnniversary == ''" class="text-danger">Marriage anniversary is required.</p>
                        </div>

                        <div class="form-group">
                            <label for="desig">Designation <span class="red-text">*</span></label>
                            <input type="text" class="required is_required validate account_input form-control" id="designation" ng-model="profile.desig" ng-value="profile.desig">
                            <p ng-show="infoSubmit && profile.desig == ''" class="text-danger">Designation is required.</p>
                        </div>

                        <div class="form-group">
                            <label for="mobile">Phone Number <span class="red-text">*</span></label>
                            <input type="text" class="numberonly form-control" id="phone" ng-model="profile.rep_ph_num " ng-value="{{ profile.rep_ph_num   }}">
                            <p ng-show="infoSubmit && profile.rep_ph_num == ''" class="text-danger">Phone number is required.</p>
                            <p ng-cloak ng-show="profile.rep_ph_num != '' && profile.rep_ph_num.length < 10 || profile.rep_ph_num.length > 11" class="text-danger">Please enter valid phone number.</p>

                            <!-- <span id="valid-msg" class="hide">??? Valid</span>
                            <span id="error-msg" class="hide"></span> -->
                        </div>

                        <div class="form-group">
                            <label for="mobile">Address <span class="red-text">*</span></label>
                            <textarea type="text" class="required is_required validate account_input form-control" id="address" ng-model="profile.address1">{{ profile.address1 }}</textarea>
                            <p ng-show="infoSubmit && profile.address1 == ''" class="text-danger">address is required.</p>
                        </div>
                        <div class="form-group">
                           <label for="state">Local Currency<span class="red-text">*</span></label>
                           <select disabled=""  id="currency" class="form-control" ng-model="profile.salaryCurrencyId">
                              <option value="">Select Currency</option>
                              <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                           </select>
                           <p ng-cloak ng-show="infoSubmit && proifle.salaryCurrencyId == ''" class="text-danger">Local currency is required.</p>
                        </div>
                        <div class="form-group">
                           <label for="position"  >Salary<span class="red-text">*</span></label>
                           <input numbers-only="numbers-only" type="text" onkeyup="angular.element(this).scope().salaryCount1(this)" class="form-control rounded-0" ng-model="profile.salary" ng-value="profile.salary" id="salary1" placeholder="Salary"  />
                           <p ng-show="infoSubmit && profile.salary == ''" class="text-danger">Salary is required.</p>
                        </div>
                        <div class="form-group">
                           <label for="position">Per day<span class="red-text">*</span></label>
                           <input numbers-only="numbers-only" readonly type="text" class="form-control rounded-0" ng-model="profile.perday" ng-value="profile.perday" id="perday1" placeholder="Per day"  />
                        </div>
                        <div class="form-group">
                           <label for="position"  >Per hour<span class="red-text">*</span></label>
                           <input numbers-only="numbers-only" readonly type="text" class="form-control rounded-0" ng-model="profile.perHour" ng-value="profile.perHour" id="perhour" placeholder="Per hour"  />

                        </div>
                        <div class="form-group">
                           <label for="state">Currency<span class="red-text">*</span></label>
                           <select  id="currency" class="form-control" ng-model="profile.currencyId">
                              <option value="">Select Currency</option>
                              <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency"   value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                           </select>
                           <p ng-cloak ng-show="infoSubmit && !profile.currencyId " class="text-danger">Currency is required.</p>
                        </div>

                        <div class="form-group">
                           <label for="position"  >Hourly Rate<span class="red-text">*</span></label>
                           <input numbers-only="numbers-only"  type="text" class="form-control rounded-0" ng-model="profile.maxPrice" ng-value="profile.maxPrice" id="maxPrice" placeholder="Please enter hourly price"  />
                           <p ng-show="infoSubmit && profile.maxPrice == ''" class="text-danger">Hourly price is required.</p>
                           <p ng-show="infoSubmit && profile.maxPrice != '' && profile.maxPrice == 0" class="text-danger">Please enter valid hourly price.</p>
                        </div>
                        <div class="form-group">
                           <label for="name"  >Access<span class="red-text">*</span></label>
                           <select  class="form-control rounded-0" ng-model="profile.access" id="access"  >
                              <option value="">Select access</option>
                              <option value="5">HR</option>
                              <option value="6">Project Manager (General)</option>
                              <option value="2">Project Manager (Sales) </option>
                              <option value="7">Employee (Sales)</option>
                              <option value="3">Employee (General)</option>
                           </select>
                           <p ng-show="infoSubmit && profile.access == ''" class="text-danger">please select access.</p>
                        </div>
                        <div class="form-group mb-0">
                           <label for="name"  >Department<span class="red-text">*</span></label>
                           <select  class="form-control rounded-0" ng-model="profile.department" id="status">
                              <option value="">Select Department</option>
                              <option ng-repeat="(key,x) in alldepartment" value="{{ x.id }}">{{ x.department }}</option>
                           </select>
                           <p ng-cloak ng-show="infoSubmit && profile.department == ''" class="text-danger">Please select department.</p>
                        </div>

                        <div class="form-group">
                            <label for="mobile">About <span class="red-text">*</span></label>
                            <textarea id="about" name="about" type="text" class="required is_required validate account_input form-control ckeditor" id="about" ></textarea>
                            <p ng-show="infoSubmit && profile.about == ''" class="text-danger">about is required.</p>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12">
                      <div class="workhistory">

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#WorkHistory" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          Work History
        </a>
      </h4>
      </div>
      <div id="WorkHistory" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <div class="form-group">
                            <a hand="" id="plusicon" class="add-work">Add Work History <i ng-click="experienceAdd(this)" class="fa fa-plus-square"></i></a>
                        </div>
                        <div class="cstm-pro">
                            <div ng-class="{ 'experienceborder' : key != 0  }" class="" ng-if="experience.length != 0" ng-repeat="(key,x) in experience">
                              <div class="row">
                              <div class="col-lg-12">
                                <h3 class="worknumber">{{ key + 1 }}) Work Experience <a hand="" id="plusicon" class="pull-right trash-btn"> <i ng-click="deleteexperience(key)" class="fa fa-trash"></i></a></h3>
                              </div>
                                  <div class="col-lg-6 float-left">
                                    <p class="frm_to">From</p>
                                    <div class="form-group col-sm-7 float-left">
                                        <label for="mobile"> Month <span class="red-text">*</span></label>
                                        <select class="form-control required is_required validate account_input" id="year" ng-model="x.MonthStart">
                                            <option value="">Select Month</option>
                                            <option value="{{ month[key] }}" ng-repeat="(key,x) in month">{{ month[key] }}</option>
                                        </select>
                                        <p ng-show="infoSubmit && x.MonthStart == ''" class="text-danger">Month is required.</p>
                                    </div>

                                    <div class="form-group col-sm-5 float-left">
                                        <label for="mobile">Year <span class="red-text">*</span></label>
                                        <select class="form-control" id="year" ng-model="x.YearStart">
                                            <option value="">Select Year</option>
                                            <option value="{{ years[key] }}" ng-repeat="(key,x) in years">{{ years[key] }}</option>
                                        </select>
                                        <p ng-show="infoSubmit && x.YearStart == ''" class="text-danger">Year is required.</p>
                                    </div>
                                  </div>


                                  <div class="col-lg-6 float-left">
                                      <p class="frm_to">To</p>
                                      <div class="form-group col-sm-7  float-left">
                                          <label for="mobile"> Month <span class="red-text">*</span></label>
                                          <select ng-disabled="x.working" class="form-control required is_required validate account_input" id="year" ng-model="x.MonthEnd">
                                              <option value="">Select Month</option>
                                              <option value="{{ month[key] }}" ng-repeat="(key,x) in month">{{ month[key] }}</option>
                                          </select>

                                          <p ng-show="infoSubmit && !x.working  && x.MonthEnd == ''" class="text-danger">Month is required.</p>
                                      </div>

                                      <div class="form-group col-sm-5  float-left">
                                          <label for="mobile">Year <span class="red-text">*</span></label>
                                          <select ng-disabled="x.working" class="form-control required is_required validate account_input" id="year" ng-model="x.YearEnd">
                                              <option value="">Select Year</option>
                                              <option value="{{ years[key] }}" ng-repeat="(key,x) in years">{{ years[key] }}</option>
                                          </select>
                                          <p ng-show="infoSubmit && !x.working && x.YearEnd == ''" class="text-danger">Year is required.</p>
                                      </div>
                                    </div>
                                </div>
                                <div  ng-if="x.selectedworking == 0 || x.working"  class="form-group radio-bx">
                                    <input  ng-click="selectworking($event,key)"   ng-model="x.working" value="1" type="checkbox" ng-checked="x.working == 1" name="currently" >  Select if currently working
                                </div>

                                <div class="form-group">
                                  <label for="mobile">Designation <span class="red-text">*</span></label>
                                    <input id="d" placeholder="Please enter designation" name="ds" type="text" class="form-control required is_required validate account_input" id="about" ng-model="x.designation" ng-value="x.designation">
                                    <p ng-show="infoSubmit && x.designation == ''" class="text-danger">Designation is required.</p>
                                </div>

                                <div class="form-group">
                                    <label>Company Name <span class="red-text">*</span></label>
                                    <input type="text" placeholder="Please enter company name" id="company" class="form-control" ng-model="x.company">
                                    <p ng-show="infoSubmit && x.company == ''" class="text-danger">Company name is required.</p>
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Job Resposibilities <span class="red-text">*</span></label>
                                    <textarea id="description" placeholder="Please enter job resposibilities" name="description" type="text" class="form-control required is_required validate account_input" id="description" ng-model="x.description" ng-value="x.description"></textarea>
                                    <p ng-show="infoSubmit && x.description == ''" class="text-danger">Job resposibilities is required.</p>
                                </div>

                            </div>

                        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Activities" aria-expanded="false" class="collapsed" aria-controls="collapseOne">
            Other Activities
          </a>
        </h4>
        </div>
        <div id="Activities" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <div class="form-group">
            <a hand="" id="plusicon" class="add-work">Other Activities <i ng-click="activityAdd(this)" class="fa fa-plus-square"></i></a>
            </div>
            <div ng-repeat="(key,x) in activities">
            <div class="form-group">
                <label for="mobile">Select Activity Type <span class="red-text">*</span></label>
                <select ng-model="x.type" class="form-control">
                    <option value="">Select Activity Type</option>
                    <option value="1">Certification</option>
                    <option value="2">Achievement</option>
                </select>
                <p ng-show="infoSubmit && x.type == ''" class="text-danger">Please select activities type.</p>

                <a hand="" id="plusicon" class="pull-right trash-btn"> <i ng-click="deleteactivities(key)" class="fa fa-trash"></i></a>
            </div>
            <div ng-if="x.type" class="form-group">
                <div class="col-lg-12">
                  <div class="col-lg-6 upld_lbl float-left">
                    <label ng-if="x.type == 1">Certificate</label>
                    <label ng-if="x.type == 2">Achievement</label>
                    <input type="text" id="achivment" placeholder="Please enter name" class="form-control" ng-value="x.name" ng-model="x.name">
                    <p ng-show="infoSubmit && x.name == '' " class="text-danger">This is required.</p>
                  </div>
                  <div class="col-lg-6 upld_lbl float-left">
                    <label ng-if="x.type == 1">Upload Certificate</label>
                    <label ng-if="x.type == 2">Upload Achievement</label>
                  <input type="file" data-id="{{ key }}" onchange="angular.element(this).scope().uploadcertificate(this)">
                  <p ng-show="infoSubmit && x.upload == '' && x.error == 0 " class="text-danger">This is required.</p>
                  <p ng-show="x.error == 1" class="text-left text-danger">Invalid Image format.</p>

                  <a ng-if="x.upload" target="_blank" href="<?php echo base_url(); ?>assets/certificate/{{ x.upload }}">{{ x.upload }}</a>
                </div>
                </div>
            </div>
          </div>


          </div>
        </div>
      </div>
    </div>
                      </div>



                        <div class="form-group skill">
                            <label>Skills</label>
                            <input id="skills" placeholder="Search and select skill" onkeyup="angular.element(this).scope().skills(this)" class="form-control" type="text" ng-model="profile.skill">
                            <ul id="chosenresults11" ng-if="refservices.length != 0">
                                <li ng-repeat="(key,x) in refservices" ng-click="addservices(x.name,x.id)" value="{{ x.id }}">{{ x.name }}</li>
                            </ul>

                            <div ng-if="services.length != 0" id="tags"><a ng-repeat="(key,x) in services"> {{ x.name }}<span hand ng-click="deleteservice(key)" > &times; </span></a></div>
                        </div>
                        <!-- logo crop -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Image Crop</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="cropArea">
                                            <img-crop image="myImage" result-image="myCroppedImage"></img-crop>
                                        </div>
                                        <div>Cropped Image:</div>
                                        <div><img ng-src="{{myCroppedImage}}" /></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" ng-click="uploadImage()" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- logo crop -->
                    </div>
                </div>
                <div class="row mt-3 text-center">
                    <div class="col-sm-12">
                        <input type="button" ng-click="profileupdate()" value="Update" class="btn btn-primary user-register">
                    </div>
                </div>
            </div>
        </section>
    </div>
