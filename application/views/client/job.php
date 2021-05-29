<?php include('sidebar.php');?>

<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Job Post</li>
    </ol>
  </section>
  <!--main-container-part-->

  <section class="content portfolio-cont">

    <div ng-cloak class="box box-success" ng-app="myApp3" ng-controller="myCtrt3">
      <div class="box-header with-border p-3">
        <div class="row">
          <div class="col-md-6"> <h3 class="box-title mb-0">All Post Jobs</h3></div>
          <div class="col-md-6">	<a ng-click="showcreate()"   class="createjob btn btn-primary pull-right">Post New Job</a> </div>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="rankingTable" class="table">
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Budget</th>
                <!-- <th>Offer</th> -->
                 <th class="center">Proposals</th>
                <!-- <th>View Job</th>
                <th>Detail</th> -->
                <th class="center">Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-if="jobs.length != 0" ng-repeat="(key,x) in jobs" >
                <td>{{ x.jobTitle }}</td>
                <td><p ng-bind-html="x.jobDescription | limitTo:200 |trustAsHtml"></p>...</td>
                <td>{{ x.code }} {{ x.symbol }} {{  x.jobBudget }} </td>
                <!-- <td>{{ x.name }}</td> -->
                 <td class="center">{{ x.proposal }}</td>
                <!-- <td><a target="_blank" href="<?php echo base_url(); ?>job/{{ x.jobTitle | lowercase | underscoreless }}-{{ x.jobId }}" class="btn btn-primary">View Job</a></td>
                <td><a target="_blank" class="btn btn-primary" href="<?php echo base_url(); ?>client-job-detail/{{ x.jobId }}">Detail</a></td> -->
                <td class="center">
                  <a ng-if="x.offStatus == 0" class="btn bg-yellow">Pending </a>
                  <a ng-if="x.offStatus == 1" class="btn bg-green">Accepted</a>
                  <a ng-if="x.offStatus == 2" class="btn btn-danger">Rejected</a>
                  <a ng-if="x.offStatus == 3" class="btn btn-danger">Job Closed</a>
                </td>
                <td>
                  <div class="dropdown ac-cstm">
               <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
               </a>
               <div class="dropdown-menu fadeIn">
                 <a class="dropdown-item"  ng-if="!x.name && x.proposal == 0 && x.jobClose == 0" ng-click="editjob(x.jobId)" ><i class="fa fa-edit"></i>Edit</a>
                 <a class="dropdown-item" href="<?php echo base_url(); ?>client-job-detail/{{ x.jobId }}"><i class="fa fa-info-circle" aria-hidden="true"></i>Details</a>
                 <a class="dropdown-item" ng-if="x.jobClose == 0" target="_blank" href="<?php echo base_url(); ?>job/{{ x.jobTitle | lowercase | underscoreless }}-{{ x.jobId }}"><i class="fa fa-eye" aria-hidden="true"></i>View my job</a>
                 <a class="dropdown-item" ng-if="x.proposal != 0 && x.jobClose == 0"  href="<?php echo base_url(); ?>client-job-proposal/{{ x.jobId }}"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>Proposals</a>
                 <a class="dropdown-item"  ng-if="!x.name && x.proposal == 0 && x.jobClose == 0" ng-click="confirm(x.jobId)"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                 <a class="dropdown-item"   ng-click="repost(x.jobId)"><i class="fa fa-retweet" aria-hidden="true"></i>Repost</a>
                 <a class="dropdown-item" ng-if="x.jobClose == 0 && x.offStatus == 0"  ng-click="jobcloseconfirm(x.jobId)"><i class="fa fa-times-circle"></i>Close Job Post</a>

             </div>
            </div>
                </td>
              </tr>
              <tr ng-if="jobs.length == 0"><td colspan="9" class="text-center">No Record Found.</td></tr>
            </tbody>
          </table>
        </div>
        <div id="pagination"></div>
        <!-- content-->
        <!-- job Offer modal -->
        <div class="createjobform modal fade" id="myJob" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Job Details</h4>
            </div>
            <form  id="jobform" novalidate >
              <div class="modal-content">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Title <span class="red-text">*</span></label>
                    <input type="text"  id="title" ng-model="jobtitle" ng-value="jobtitle" placeholder="Please enter title" class="form-control title required"  >
                    <p ng-show="jobSubmit && jobtitle == ''" class="text-danger">Title is required.</p>
                  </div>
                  <div class="form-group">
                    <label>Description <span class="red-text">*</span></label>
                    <!-- ckeditor -->
                    <textarea placeholder="Please enter description" type="text" id="description" name="description" ng-model="description" ng-value="description" class="form-control description ckeditor required" ></textarea>
                    <p ng-show="jobSubmit && description == ''" class="text-danger">Description is required.</p>
                  </div>

                  <div class="form-group">
                    <label>Industries<span class="red-text">*</span>(Hit enter to create tags of the word entered)</label>

                    <input placeholder="Please search or enter industry" ng-enter="addrefindustry()" id="industrys" onkeyup="angular.element(this).scope().industrys(this)" class="form-control" type="text"    >

                    <ul  ng-if="refindustry.length != 0 " id="chosenresults11" >
                      <li hand ng-repeat="(key,x) in refindustry" ng-click="addindustry(x.name,x.id)" value="{{ x.id }}">{{ x.name }} </li>
                    </ul>
                    <p ng-show="jobSubmit  && jobindustries.length == 0" class="text-danger">Industry is required.</p>
                    <div ng-if="jobindustries.length != 0" id="tags">
                      <a ng-repeat="(key,x) in jobindustries"  > {{ x.name }}<span hand ng-click="deleteindustry(key)" > &times; </span></a>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Services <span class="red-text">*</span></label>
                    <select  id="services" ng-model="jobservices"  class="form-control" >
                      <option value="">Select service</option>
                      <option value="{{ x.id }}" ng-repeat="(key,x) in services">{{ x.name }}</option>
                    </select>
                    <p ng-show="jobSubmit && jobservices == ''" class="text-danger">Service is required.</p>
                  </div>

                  <div class="form-group">
                    <label>Skills and Expertise <span class="red-text">*</span>(Hit enter to create tags of the word entered) </label>
                    <input placeholder="Please search or enter skill" ng-enter="addrefskill()" id="skills" onkeyup="angular.element(this).scope().skills(this)" class="form-control skills" type="text"    >
                    <ul  ng-if="refservices.length != 0" id="chosenresults11" >
                      <li hand ng-repeat="(key,x) in refservices" ng-click="addskill(x.name,x.id)" value="{{ x.id }}">{{ x.name }} </li>
                    </ul>
                    <p ng-show="jobSubmit  && jobskill.length == 0" class="text-danger">Skill is required.</p>
                    <div ng-if="jobskill.length != 0" id="tags">
                      <a ng-repeat="(key,x) in jobskill"  > {{ x.name }}<span hand ng-click="deleteskill(key)" > &times; </span></a>
                    </div>
                  </div>



                  <div class="form-group">
                    <label>Attachment</label>
                    <input onchange="angular.element(this).scope().uploadImage(this)" type="file" id="attchment" name="file" class="form-control attchment required" >
                    <!--<p ng-show="jobSubmit && image == ''" class="text-danger">Attachment is required.</p>-->
                  </div>

                  <div class="form-group">
                    <label>No. of Freelancers Required <span class="red-text">*</span></label>
                    <input type="text" numbers-only="numbers-only"  id="jobrequiredf" ng-model="jobrequiredf" ng-value="jobrequiredf" placeholder="Please enter required freelancers" class="form-control title required"  >
                    <p ng-show="jobSubmit && jobrequiredf == ''" class="text-danger">This field is required.</p>
                    <p ng-show="jobSubmit && jobrequiredf != '' && jobrequiredf == 0" class="text-danger">Please enter valid number.</p>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Currency<span class="red-text">*</span></label>
                        <select  id="location" ng-model="currency"  class="form-control" >
                          <option value="">Select currency</option>
                          <option value="{{ x.id }}" ng-repeat="(key,x) in allcurrency">{{ x.code }} {{ x.symbol }} </option>
                        </select>
                        <p ng-show="jobSubmit && currency == ''" class="text-danger">Please select currency.</p>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Project Type</label>
                        <input type="radio" name="type" ng-click="changetype(1)" checked="" value="1">Fixed
                        <input type="radio" name="type" ng-click="changetype(2)" value="2">Hourly
                      </div>
                    </div>
                    <div ng-if="type == 1" class="col-sm-6">
                      <div class="form-group">
                        <label>Budget <span class="red-text">*</span></label>
                        <input type="text" ng-keyup="totalbudget($event.target.value,'1')"  ng-value="budget"  ng-model="budget"  id="amount" ng-value="budget" numbers-only="numbers-only" ng-model="estimationAmount" placeholder="Please enter budget"  name="budget" class="form-control amount required" >
                        <p ng-show="jobSubmit  && type == 1 && budget == ''" class="text-danger">Budget is required.</p>
                        <p ng-show="jobSubmit  && type == 1 && budget != '' && budget == 0" class="text-danger">Please enter valid number.</p>

                      </div>
                    </div>
                    <div ng-if="type == 2" class="col-sm-4">
                      <div class="form-group">
                        <label>Budget <span class="red-text">*</span></label>
                        <input type="text" ng-keyup="totalbudget($event.target.value,'1')" ng-value="budget"  ng-model="budget"  id="amount" ng-value="budget" numbers-only="numbers-only" ng-model="estimationAmount" placeholder="Please enter budget"  name="budget" class="form-control amount required" >
                        <p ng-show="jobSubmit  && type == 2 && budget == ''" class="text-danger">Budget is required.</p>

                      </div>
                    </div>
                    <div ng-if="type == 2" class="col-sm-4">
                      <div class="form-group">
                        <label>Hourly rate <span class="red-text">*</span></label>
                        <input type="text" ng-keyup="totalbudget($event.target.value,'2')" ng-keyup="totalbudget()"  id="amount" numbers-only="numbers-only" ng-value="estimationHourlyPrice" ng-model="estimationHourlyPrice" placeholder="Please enter hourly price"  name="budget" class="form-control amount required" >
                        <p ng-show="jobSubmit  && type == 2 && estimationHours == ''" class="text-danger">Hourly rate is required.</p>

                      </div>
                    </div>
                    <div ng-if="type == 2" class="col-sm-4">
                      <div class="form-group">
                        <label>Estimated Hours <span class="red-text">*</span></label>
                        <input readonly type="text"   numbers-only="numbers-only" id="amount" ng-value="estimationHours" ng-model="estimationHours" placeholder="Please enter hours"  name="hours" class="form-control amount required" >
                        <p ng-show="jobSubmit  && type == 2 && estimationHours == ''" class="text-danger">Estimate hours is required.</p>
                      </div>
                    </div>


                  </div>

                </div>

                  <div class="modal-footer">
                    <div class="btn-panel text-right">

                      <input type="button" ng-disabled="disabled" ng-click="submitjob()" name="save" value="Submit" class="submitjob btn btn-primary" >
                    </div>

                  </div>
              </div>
            </form>
            <!-- job offer Modal -->

          </div>
        </div>
        <!-- job Offer modal end -->
        <!-- job edit -->
        <div class="editjobform modal fade" id="editJob" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Job Details</h4>
            </div>

            <div class="modal-content">
              <!-- <form  id="jobform" novalidate > -->
              <div class="modal-body">
                <div class="form-group">
                  <label>Title <span class="red-text">*</span></label>
                  <input type="text"  id="title" ng-model="jobtitle1" ng-value="jobtitle1" placeholder="Please enter title" class="form-control title required"  >
                  <p ng-show="jobSubmit && jobtitle1 == ''" class="text-danger">Title is required.</p>

                </div>
                <div class="form-group">
                  <label>Description <span class="red-text">*</span></label>
                  <!-- ckeditor -->
                  <textarea placeholder="Please enter description" type="text" id="description1" name="description1" ng-model="description" ng-value="description" class="form-control description1 ckeditor required" ></textarea>
                  <p ng-show="jobSubmit && description1 == ''" class="text-danger">Description is required.</p>
                </div>

                <div class="form-group">
                  <label>Industries <span class="red-text">*</span>(Hit enter to create tags of the word entered)</label>
<!--  -->
                  <input placeholder="Please search or enter industry" ng-enter="addrefindustry11()" onkeyup="angular.element(this).scope().industrys(this)" id="editindustrys"  class="form-control" type="text"    >
                  <ul  ng-if="refservices.length != 0" id="chosenresults11" >
                    <li hand ng-repeat="(key,x) in refindustry" ng-click="addindustry11(x.name,x.id)" value="{{ x.id }}">{{ x.name }}
                    </li></ul>
                    <p ng-show="jobSubmit  && jobindustry.length == 0" class="text-danger">Industry is required.</p>
                    <div ng-if="jobindustries.length != 0" id="tags">
                      <a ng-repeat="(key,x) in jobindustries"  > {{ x.name }}<span hand ng-click="deleteindustry(key)" > &times; </span></a>
                    </div>
                  </div>



                  <div class="form-group">
                    <label>Services <span class="red-text">*</span></label>
                    <select  id="services" ng-model="jobservices1"  class="form-control" >
                      <option>Select Service</option>
                      <option value="{{ x.id }}" ng-repeat="(key,x) in services">{{ x.name }}</option>
                    </select>
                    <p ng-show="jobSubmit && jobservices1 == ''" class="text-danger">Service is required.</p>
                  </div>

                  <div class="form-group">
                    <label>Skills and Expertise <span class="red-text">*</span>(Hit enter to create tags of the word entered)</label>
                    <!--  -->
                    <input id="skillsedit11"  class="form-control skills1" placeholder="Please search or enter skill" ng-enter="addrefskill11()" onkeyup="angular.element(this).scope().skills(this)"  type="text"   >
                    <ul  ng-if="refservices.length != 0" id="chosenresults11" >
                      <li hand ng-repeat="(key,x) in refservices" ng-click="addskill11(x.name,x.id)" value="{{ x.id }}">{{ x.name }}</li>
                    </ul>
                    <p ng-show="jobSubmit  && jobskill.length == 0" class="text-danger">Skill is required.</p>
                    <div ng-if="jobskill.length != 0" id="tags">
                      <a ng-repeat="(key,x) in jobskill"  > {{ x.name }}<span hand ng-click="deleteskill(key)" > &times; </span></a>
                    </div>
                  </div>



                  <div class="form-group">
                    <label>Attachment</label>
                    <input onchange="angular.element(this).scope().uploadImage(this)" type="file" id="attchment" name="file" class="form-control attchment required" >
                    <!-- <p ng-show="jobSubmit && image == ''" class="text-danger">Attachment is required.</p> -->
                    <p ng-if="image1"><a target="_blank" href="<?php echo base_url(); ?>assets/jobAttachment/{{ image }}">{{ image }}</a></p>
                  </div>

                  <div class="form-group">
                    <label>No of freelancer Required <span class="red-text">*</span></label>
                    <input type="text" numbers-only="numbers-only"  id="jobrequiredf" ng-model="jobrequiredf1" ng-value="jobrequiredf1" placeholder="Please enter required freelancers" class="form-control title required"  >
                    <p ng-show="jobSubmit && jobrequiredf1 == ''" class="text-danger">This field is required.</p>
                    <p ng-show="jobSubmit && jobrequiredf1 != '' && jobrequiredf1 == 0" class="text-danger">Please enter valid number.</p>
                  </div>
                  <div class="form-group">
                    <label>Currency<span class="red-text">*</span></label>
                    <select  id="location" ng-model="currency1"  class="form-control" >
                      <option value="">Select currency</option>
                      <option value="{{ x.id }}" ng-repeat="(key,x) in allcurrency">{{ x.code }} {{ x.symbol }} </option>

                    </select>
                    <p ng-show="jobSubmit && currency1 == ''" class="text-danger">Please select currency.</p>

                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Project Type</label>
                      <input type="radio" name="type" ng-click="changetype(1)" ng-model="type" ng-checked="type1 == 1"  value="1">Fixed
                      <input type="radio" name="type" ng-click="changetype(2)" ng-model="type" ng-checked="type1 == 2" value="2">Hourly
                    </div>
                  </div>
                  <div ng-if="type == 1" class="col-sm-6">
                    <div class="form-group">
                      <label>Budget <span class="red-text">*</span></label>
                      <input type="text" ng-keyup="totalbudget($event.target.value,'1')"  ng-value="budget1"  ng-model="budget1"  id="amount" ng-value="budget" numbers-only="numbers-only" ng-model="estimationAmount" placeholder="Please enter budget"  name="budget" class="form-control amount required" >
                      <p ng-show="jobSubmit  && type1 == 1 && budget1 == ''" class="text-danger">Budget is required.</p>
                      <p ng-show="jobSubmit  && type1 == 1 && budget1 != '' && budget1 == 0" class="text-danger">Please enter valid number.</p>

                    </div>
                  </div>
                  <div ng-if="type1 == 2" class="row">
                  <div  class="col-sm-4">
                    <div class="form-group">
                      <label>Budget <span class="red-text">*</span></label>
                      <input type="text" ng-keyup="totalbudget1($event.target.value,'1')" ng-value="budget1"  ng-model="budget1"  id="amount" numbers-only="numbers-only" ng-model="estimationAmount" placeholder="Please enter budget"  name="budget" class="form-control amount required" >
                      <p ng-show="jobSubmit  && type1 == 2 && budget1 == ''" class="text-danger">Budget is required.</p>

                    </div>
                  </div>
                  <div ng-if="type1 == 2" class="col-sm-4">
                    <div class="form-group">
                      <label>Hourly rate <span class="red-text">*</span></label>
                      <input type="text" ng-keyup="totalbudget($event.target.value,'2')"   id="amount" numbers-only="numbers-only" ng-value="estimationHourlyPrice1" ng-model="estimationHourlyPrice1" placeholder="Please enter hourly price"  name="budget" class="form-control amount required" >
                      <p ng-show="jobSubmit  && type1 == 2 && estimationHours1 == ''" class="text-danger">Hourly rate is required.</p>

                    </div>
                  </div>
                  <div ng-if="type == 2" class="col-sm-4">
                    <div class="form-group">
                      <label>Estimated Hours <span class="red-text">*</span></label>
                      <input readonly type="text"   numbers-only="numbers-only" id="amount" ng-value="estimationHours1" ng-model="estimationHours1" placeholder="Please enter hours"  name="hours" class="form-control amount required" >
                      <p ng-show="jobSubmit  && type1 == 2 && estimationHours1 == ''" class="text-danger">Estimate hours is required.</p>
                    </div>
                  </div>
                </div>


                </div>
                <!-- </form> -->

                <div class="modal-footer">
                  <div class="btn-panel text-right">
                    <input type="button" ng-click="UpdateJob()" name="save" value="Submit" class="submitjob btn btn-primary" >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- job edit end-->
          <!-- delete confirm modal -->
          <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
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
          <!-- close job confirm modal -->
          <div class="modal fade" id="closejobconfirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Job Post Close</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to Close this job post ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" ng-click="jobclose()" class="btn btn-danger" id="confirm">Confirm</button>
                  <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
          <!-- close job confirm modal -->
          <!-- package upgrade modal -->
                                <div class="modal fade" id="packageUpgrade" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Package </h4>
                                         </div>
                                         <div class="modal-body">

                                            <p>Sorry!! you seems to be out of your current package limit, please upgrade your package at <a ng-click="clickUpgrade()"  class="btn btn-success" id="confirm">Membership</a>  page.  </p>
                                         </div>
                                         <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <!-- package upgrade modal -->
        </div>
      </div>
    </section>
  </div>
