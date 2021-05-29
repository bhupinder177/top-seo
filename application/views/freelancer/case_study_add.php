<!--main-container-part-->
<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section id="wrapper1" class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
         <li class="active">Case Studies</li>
      </ol>
   </section>
   <section class="bg-white case-study p-3">
      <div ng-cloak  ng-app="myApp12" ng-controller="myCtrt12">
         <div id="content">
               <div  class="content-header">
                  <h4 id="toggleForm" class="pointer d-inline-block">Add Case Study</h4>
               </div>
               <!-- <hr class="mt-0"/> -->
               <div  class="form-div" id="form-div">
                  <span class="text-info small mb-2 d-block">Note: All fields are compulsory</span>
                  <form class="row"  method="post">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="parea" class="mb-0">Choose Industry <span class="red-text">*</span></label>
                           <select ng-model="ind" class="custom-select w-100 rounded-0 form-control" id="industry" >
                              <option value="">Select Industry</option>
                              <option ng-repeat="(key,x) in industry" ng-init="industry = key" value="{{ x.id }}">{{ x.name }} </option>
                           </select>
                           <p ng-show="submitcasestudy && ind == ''" class="text-danger">Industry is required.</p>
                        </div>
                        <div class="form-group">
                           <label for="service" class="mb-0">Choose Service <span class="red-text">*</span></label>
                           <select ng-model="ser" class="custom-select w-100 rounded-0 form-control" id="service" >
                              <option value="">Select Service</option>
                              <option ng-repeat="(key,x) in services" ng-init="services = key" value="{{ x.id }}">{{ x.name }} </option>
                           </select>
                           <p ng-show="submitcasestudy && ser == ''" class="text-danger">Service is required.</p>
                        </div>
                        <div class="form-group">
                           <label for="case_title" class="mb-0">Case Study Title <span class="red-text">*</span></label>
                           <input type="text" ng-model="case_title" class="form-control rounded-0" id="case_title" placeholder="Please enter title"  />
                           <p ng-show="submitcasestudy && case_title == ''" class="text-danger">Case study title is required.</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="case_info" class="mb-0">Case study Info <span class="red-text">*</span></label>
                           <textarea placeholder="Please enter case info" class="form-control form-control-sm rounded-0" ng-model="case_info" id="case_info"  ></textarea>
                           <p ng-show="submitcasestudy && case_info == ''" class="text-danger">Case info is required.</p>
                        </div>
                        <div class="form-group">
                           <p class="">Upload Case Study <span class="red-text">*</span></p>
                           <div class="custom-file form-group">
                              <input class=" form-control" onchange="angular.element(this).scope().documentupload(this)" type="file" class="custom-file-input customUpload" name="caseStudyFile" id="caseStudyFile" />
                              <label class="document custom-file-label customUploadLabel m-0" for="caseStudyFile" id="customUploadLabel">Choose file</label>
                              <p ng-show="submitcasestudy && case_document == ''" class="text-danger">Document is required.</p>
                              <a ng-if="case_document" target="_blank" href="<?php echo base_url(); ?>assets/case_study/{{ case_document }}" id="casestudyimage" class="casestudiesimage" >{{ case_document }}</a>
                           </div>
                           <!-- <span class="small form-text">Note : Only PDF with maximum size 2MB</span> -->
                        </div>
                     </div>
                     <div class="col-md-12">
                        <input ng-click="savecasestudy()" class="btn btn-primary rounded-0 pointer" name="submit" type="button" value="Add Case Study" id="submit" />
                     </div>
                     <!-- <a href="add-services.php" title="Add Services" class="ml-2 btn btn-primary rounded-0">Add Services</a> -->
                  </form>
                  <div class="clearfix"></div>
               </div>
               <!-- <div class="content-header">
                  <h4>List of Case Studies</h4>
               </div> -->
               <div class="box">
                  <div class="box box-success">
                      <div class="table-responsive">
                     <table id="pricingTable" class="table">
                        <thead>
                           <tr>
                              <th>S. No.</th>
                              <th>Industry</th>
                              <th>Service</th>
                              <th>Title</th>
                              <th width="40%">Case study info</th>
                              <!--												<th>Document</th>-->
                              <th class="text-right">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr ng-repeat="(key,x) in casestudys" ng-init="casestudys = key">
                              <td>{{ start + key }}</td>
                              <td>{{ x.industry }}</td>
                              <td>{{ x.service }}</td>
                              <td>{{ x.casestudyTitle }}</td>
                              <td>{{ x.casestudyInfo }}</td>
                              <!--												<td></td>-->
                              <td>
                                 <div class="dropdown ac-cstm text-right">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                    </a>
                                    <div class="dropdown-menu fadeIn">
                                       <a ng-if="x.deleted == 0" class="dropdown-item" title="Edit Case study" ng-click="casestudy_edit(x.casestudyId)" ><i class="fa fa-edit"></i> Edit</a>
                                       <a ng-if="x.deleted == 0" class="dropdown-item" title="Delete Case study" ng-click="delete_confirm(key,x.casestudyId)"><i class="fa fa-trash"></i>Delete</a>
                                       <a ng-if="x.deleted == 0" ng-click="download(x.casestudyDocument,'<?php echo base_url(); ?>assets/case_study/'+x.casestudyDocument)"  class="dropdown-item" data-id="{{ x.casestudyDocument }}" data-value="<?php echo base_url(); ?>assets/case_study/{{ x.casestudyDocument }}" ><i class="fa fa-download"></i>Download file</a>
                                       <a ng-if="x.deleted == 1" class="dropdown-item" title="Deleted Portfolio" ><i class="fa fa-trash"></i>Deleted</a>

                                    </div>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                      </div>
                     <div id="pagination"></div>
                     <!-- delete confirm modal -->
                     <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
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
                                <button type="button" ng-click="delete_casestudy(dkey,did)" class="btn btn-danger" id="confirm">Delete</button>

                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- delete confirm modal -->
                     <!-- edit case study -->
                     <div id="editcasestudy" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                           <!-- Modal content-->
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">Edit Case Study</h4>
                              </div>
                              <div class="modal-body">
                                 <div class="form-group">
                                    <label for="parea" class="mb-0">Choose Industry <span class="red-text">*</span></label>
                                    <select ng-model="editcasestudy.industryId" class="custom-select w-100 rounded-0 form-control" id="industry" >
                                       <option value="">Select Industry</option>
                                       <option ng-repeat="(key,x) in industry" ng-init="industry = key" value="{{ x.id }}">{{ x.name }} </option>
                                    </select>
                                    <p ng-show="submitcasestudy1 && editcasestudy.industryId == ''" class="text-danger">Industry is required.</p>
                                 </div>
                                 <div class="form-group">
                                    <label for="service" class="mb-0">Choose Service <span class="red-text">*</span></label>
                                    <select ng-model="editcasestudy.ServiceId	" class="custom-select w-100 rounded-0 form-control" id="service" >
                                       <option value="">Select Service</option>
                                       <option ng-repeat="(key,x) in services" ng-init="services = key" value="{{ x.id }}">{{ x.name }} </option>
                                    </select>
                                    <p ng-show="submitcasestudy1 && editcasestudy.ServiceId == ''" class="text-danger">Service is required.</p>
                                 </div>
                                 <div class="form-group">
                                    <label for="name" class="m-0">Case Study Title <span class="red-text">*</span></label>
                                    <input type="text"  class="form-control form-control-sm rounded-0" ng-model="editcasestudy.casestudyTitle" ng-value="editcasestudy.casestudyTitle" id="title" placeholder="Title"  />
                                    <p ng-show="submitcasestudy1 && editcasestudy.casestudyTitle == ''" class="text-danger">Title is required.</p>
                                 </div>
                                 <div class="form-group">
                                    <label for="case_info" class="mb-0">Case study Info<span class="red-text">*</span></label>
                                    <textarea placeholder="Please enter case info" class="form-control form-control-sm rounded-0" ng-model="editcasestudy.casestudyInfo" id="case_info"  >{{ editcasestudy.casestudyInfo	 }}</textarea>
                                    <p ng-show="submitcasestudy1 && editcasestudy.casestudyInfo	 == ''" class="text-danger">Case info is required.</p>
                                 </div>
                                 <div class="form-group">
                                    <p class="m-0">Upload Case Study <span class="red-text">*</span></p>
                                    <div class="custom-file w-100">
                                       <input onchange="angular.element(this).scope().documentupload1(this)" type="file" class="" name="caseStudyFile" id="caseStudyFile" />
                                       <!-- custom-file-input customUpload -->
                                       <!-- <label class="document custom-file-label customUploadLabel m-0" for="caseStudyFile" id="customUploadLabel">Choose file</label> -->
                                       <p ng-show="submitcasestudy1 && editcasestudy.casestudyDocument	 == ''" class="text-danger">Document is required.</p>
                                     </br>
                                       <a target="_blank" href="<?php echo base_url(); ?>assets/case_study/{{ editcasestudy.casestudyDocument }}"  class="">{{ editcasestudy.casestudyDocument  }}</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" ng-click="casestudy_update()" class="btn btn-success" >Submit</button>
                              </div>
                           </div>
                        </div>
                       </div>
                        <!-- edit Case study -->

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
               </div>
         </div>
      </div>
   </section>
</div>
