<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Gig Edit</li>
      </ol>
   </section>
   <section class="content">
      <div ng-cloak  ng-app="myApp73" ng-controller="myCtrt73">
         <div id="content">
            <div class="gig-pro">
               <div class="social-links-area p-3 bg-white">

                  <div class="top-rated-emp-container">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="name">Gig Title<span class="text-danger">*</span></label>
                                 <input type="text" class="form-control gigtitle rounded-0" ng-model="title" id="title" placeholder="Please enter title"  />
                                 <p ng-cloak ng-show="submitr && title == ''" class="text-danger">Title is required.</p>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                 <label for="name">Industry<span class="text-danger">*</span></label>
                                 <select type="text" class="form-control rounded-0" ng-model="industry" id="industry"   />
                                 <option value="">Select Industry</option>
                                  <option ng-repeat="(key,x) in allindustry"  value="{{ x.id }}">{{ x.name }}</option>
                                </select>
                                 <p ng-cloak ng-show="submitr && industry == ''" class="text-danger">Industry is required.</p>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                 <label for="name"  >Services<span class="text-danger">*</span></label>
                                 <select  class="form-control rounded-0" ng-model="services" id="services">
                                    <option value="">Select Skill</option>
                                    <option ng-repeat="(key,x) in allservices"  value="{{ x.id }}">{{ x.name }}</option>
                                 </select>
                                 <p ng-cloak ng-show="submitr && services == ''" class="text-danger">Please select Service.</p>
                              </div>
                           </div>

                           <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                 <label for="name"  >Currency<span class="text-danger">*</span></label>
                                 <select  class="form-control rounded-0" ng-model="currency" id="currency">
                                    <option value="">Select Currency</option>
                                    <option ng-repeat="(key,x) in allcurrency"  value="{{ x.id }}">{{ x.code  }} {{ x.symbol }}</option>
                                 </select>
                                 <p ng-cloak ng-show="submitr && currency == ''" class="text-danger">Please select currency.</p>
                              </div>
                           </div>

                           <div class="col-lg-6 col-md-12">
                              <div class="form-group ">
                                 <label for="name" class="m-0">Gig Image<span class="text-danger">*</span></label>
                                 <input accept="image/*"/ onchange="angular.element(this).scope().imageupload(this)" type="file" id="file" class="form-control" name="file">
                                 <div class="col-lg-12">
                                 <div class="gigimg" ng-if="image.length != 0" ng-repeat="(key,x) in image">
                                  <img   src="<?php echo base_url(); ?>assets/gig/{{ x }}" height="80" width="80">
                                  <a ng-click="removeimage(key)"><i class="fa fa-times"></i></a>
                                 </div>
                               </div>
                                 <p ng-cloak ng-show="submitr && image == ''" class="text-danger">Please select image.</p>

                              </div>
                           </div>


                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="position"  >Gig Description<span class="text-danger">*</span></label>
                                 <textarea type="text" class="description ckeditor form-control rounded-0"  name="description" id="description" placeholder="Description" /></textarea>
                                 <p ng-cloak ng-show="submitr && description == ''" class="text-danger">Description is required.</p>
                              </div>
                           </div>



                           <!-- <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                 <p  >Choose Profile Image</p>
                                 <input  type="file" class="form-control" name="empPic" id="logocroped">
                                 <p ng-cloak ng-show="submitteam && image == ''" class="text-danger">Image is required.</p>
                              </div>
                           </div> -->
                           <!-- <div class="group-chat">
                           <div class=""> -->
                           <div class="gigtabs">
            <ul class="nav nav-pills">

            <li>
              <input ng-checked="showbasic == 1" type="checkbox" ng-click="selectedplan($event,'1')" name="basic">
            <a ng-class="{ 'disabled' : 0 == showbasic }"  data-toggle="tab" class="active show" href="#basic">Basic</a>
            </li>
            <li>
              <input ng-checked="showstandard == 2" type="checkbox" ng-click="selectedplan($event,'2')" name="basic">

           <a ng-class="{'disabled': 0 == showstandard}" data-toggle="tab" href="#standard" class="">Standard</a>
           </li>
           <li>
             <input ng-checked="showpremium == 3" type="checkbox" ng-click="selectedplan($event,'3')" name="basic">
            <a ng-class="{'disabled': 0 == showpremium}" data-toggle="tab" href="#premium" class="">Premium</a>
           </li>
            </ul>
            <p ng-show="submitr && showpremium == 0 &&  showbasic == 0 && showstandard == 0" class="text-danger">Please select atleast one plan.</p>
          </div>
          <div class="tab-content">

                          <!-- basic plan -->
                        <div ng-class="{'plandisabled': 0 == showbasic}"  id="basic" class="tab-pane fade in active show ">
                         <div class="col-md-12">
                              <div class="row">

                                <div class="col-md-6">
                                   <div ng-class="{'plandisabled': 0 == showbasic}" class="form-group">
                                      <label>Explain Your Basic Plan</label>
                                      <textarea  ng-disabled="showbasic == 0" placeholder="Please explain your plan"  type="text" ng-model="basicexplain" ng-value="basicexplain" class="form-control"></textarea>
                                      <p ng-show="submitr && showbasic == 1 && basicexplain == ''" class="text-danger">Explanation is required.</p>
                                   </div>
                                </div>
                                <div ng-class="{'plandisabled': 0 == showbasic}" class="col-md-12">
                             <a ng-class="{ 'disabled' : 0 == showbasic }" hand id="plusicon">Basic Plan task <i ng-click="basicadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                                </div>

                                <div ng-repeat="(key,x) in basic" class="col-md-12">
                                      <hr>

                                   <div class="row">
                                      <div class="col-md-6">
                                         <div ng-class="{'plandisabled': 0 == showbasic}" class="form-group">
                                            <label>Task {{ key +1 }}</label>
                                            <input ng-class="{'plandisabled': 0 == showbasic}" ng-disabled="showbasic == 0" placeholder="Please enter task" type="text" ng-model="x.task"  class="form-control">
                                            <p ng-show="submitr && showbasic == 1 && x.task == ''" class="text-danger">Task name is required.</p>
                                         </div>
                                      </div>

                                   <div class="col-md-1">
                                 <a  ng-if="key != 0" hand id="plusicon" class="">  <i ng-click="deletebasic(key)" class="fa fa-fw fa-trash"></i></a>
                                </div>
                                   </div>
                                </div>



                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label>Price</label>
                                      <input ng-class="{'plandisabled': 0 == showbasic}" ng-disabled="showbasic == 0" numbers-only="numbers-only" placeholder="Please enter price" numbers-only="numbers-only" type="text" ng-model="basicprice" ng-value="basicprice"  class="form-control">
                                      <p ng-show="submitr && showbasic == 1 && basicprice == ''" class="text-danger">Price  is required.</p>
                                      <p ng-show="submitr && showbasic == 1 && basicprice != '' && basicprice == 0 " class="text-danger">Please enter valid price.</p>

                                   </div>
                                </div>

                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label>Work Duration (In Days)</label>
                                      <input ng-class="{'plandisabled': 0 == showbasic}" ng-disabled="showbasic == 0" numbers-only="numbers-only" placeholder="Please enter duration"   id="price" type="text" ng-model="basicduration" ng-value="basicduration" class="form-control">
                                      <p ng-show="submitr && showbasic == 1 && basicduration == ''" class="text-danger">Duration is required.</p>
                                      <p ng-show="submitr && showbasic == 1 && basicduration != '' && basicduration == 0 " class="text-danger">Please enter valid duration.</p>

                                   </div>
                                </div>

                                <!-- <div class="col-md-6">
                                   <div class="form-group">
                                      <label>Additional Information</label>
                                      <textarea ng-disabled="showbasic == 0" placeholder="Please enter description"  type="text" ng-model="basicdescription" ng-value="basicdescription" class="form-control"></textarea>
                                   </div>
                                </div> -->



                             </div></div>
                         <!-- add task -->

                       </div>
                         <!-- add task -->

                         <!-- standard plan -->
                       <div id="standard" class="tab-pane fade in ">
                         <div class="col-md-12">
                              <div class="row">

                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label>Explain Your Standard Plan</label>
                                      <textarea placeholder="Please explain your plan"  type="text" ng-model="standardexplain" ng-value="standardexplain" class="form-control"></textarea>
                                      <p ng-show="submitr &&  showstandard == 2 && standardexplain == ''" class="text-danger">Explanation is required.</p>
                                   </div>
                                </div>
                                <div class="col-md-12">
                             <a ng-class="{ 'disabled' : 0 == showstandard }" hand id="plusicon">Standard Plan task <i ng-click="standardadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                                </div>

                                <div ng-repeat="(key,x) in standard" class="col-md-12">
                                      <hr>

                                   <div class="row">
                                      <div class="col-md-6">
                                         <div class="form-group">
                                            <label>Task {{ key +1 }}</label>
                                            <input placeholder="Please enter task" type="text" ng-model="x.task"  class="form-control">
                                            <p ng-show="submitr && showstandard == 2 && x.task == ''" class="text-danger">Task name is required.</p>
                                         </div>
                                      </div>

                                   <div class="col-md-1">
                                 <a  ng-if="key != 0" hand id="plusicon" class="">  <i ng-click="deletestandard(key)" class="fa fa-fw fa-trash"></i></a>
                                </div>


                                   </div>
                                </div>



                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label>Price</label>
                                      <input numbers-only="numbers-only" placeholder="Please enter price" numbers-only="numbers-only" type="text" ng-model="standardprice" ng-value="standardprice"  class="form-control">
                                      <p ng-show="submitr && showstandard == 2 && standardprice == ''" class="text-danger">Price  is required.</p>
                                      <p ng-show="submitr && showstandard == 2 && standardprice != '' && standardprice == 0 " class="text-danger">Please enter valid duration.</p>
                                   </div>
                                </div>

                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label>Work Duration (In Days)</label>
                                      <input numbers-only="numbers-only" placeholder="Please enter duration"   id="price" type="text" ng-model="standardduration" ng-value="standardduration" class="form-control">
                                      <p ng-show="submitr && showstandard == 2 && standardduration == ''" class="text-danger">Duration is required.</p>
                                      <p ng-show="submitr && showstandard == 2 && standardduration != '' && standardduration == 0 " class="text-danger">Please enter valid duration.</p>

                                   </div>
                                </div>

                                <!-- <div class="col-md-6">
                                   <div class="form-group">
                                      <label>Additional Information</label>
                                      <textarea placeholder="Please enter description"  type="text" ng-model="standarddescription" ng-value="standarddescription" class="form-control"></textarea>
                                   </div>
                                </div> -->
                             </div></div>
                      </div>
                        <!-- standard plan -->

                        <!-- premium plan -->
                      <div id="premium" class="tab-pane fade in ">
                        <div class="col-md-12">
                             <div class="row">

                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label>Explain Your Premium Plan</label>
                                     <textarea placeholder="Please explain your plan"  type="text" ng-model="premiumexplain" ng-value="premiumexplain" class="form-control"></textarea>
                                     <p ng-show="submitr && showpremium == 3 && premiumexplain == ''" class="text-danger">Explanation is required.</p>
                                  </div>
                               </div>
                               <div class="col-md-12">
                            <a ng-class="{ 'disabled' : 0 == showpremium }" hand id="plusicon">Premium Plan task <i ng-click="premiumadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                               </div>

                               <div ng-repeat="(key,x) in premium" class="col-md-12">
                                     <hr>

                                  <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                           <label>Task {{ key +1 }}</label>
                                           <input placeholder="Please enter task" type="text" ng-model="x.task"  class="form-control">
                                           <p ng-show="submitr && showpremium == 3 && x.task == ''" class="text-danger">Task name is required.</p>
                                        </div>
                                     </div>

                                  <div class="col-md-1">
                                <a  ng-if="key != 0" hand id="plusicon" class="">  <i ng-click="deletepremium(key)" class="fa fa-fw fa-trash"></i></a>
                               </div>


                                  </div>
                               </div>



                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label>Price</label>
                                     <input placeholder="Please enter price" numbers-only="numbers-only" type="text" ng-model="premiumprice" ng-value="premiumprice"  class="form-control">
                                     <p ng-show="submitr && showpremium == 3 && premiumprice == ''" class="text-danger">Price  is required.</p>
                                     <p ng-show="submitr && showpremium == 3 && premiumprice != '' && premiumprice == 0 " class="text-danger">Please enter valid price.</p>
                                  </div>
                               </div>

                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label>Work Duration (In Days)</label>
                                     <input numbers-only="numbers-only" placeholder="Please enter duration"   id="price" type="text" ng-model="premiumduration" ng-value="premiumduration" class="form-control">
                                     <p ng-show="submitr && showpremium == 3 && premiumduration == ''" class="text-danger">Duration is required.</p>
                                     <p ng-show="submitr && showpremium == 3 && premiumduration != '' && premiumduration == 0 " class="text-danger">Please enter valid duration.</p>

                                  </div>
                               </div>

                               <!-- <div class="col-md-6">
                                  <div class="form-group">
                                     <label>Additional Information</label>
                                     <textarea placeholder="Please enter description"  type="text" ng-model="premiumdescription" ng-value="premiumdescription" class="form-control"></textarea>
                                  </div>
                               </div> -->
                            </div></div>

                     </div>
                       <!-- premium plan -->

                       </div>

                         <!-- <div class="col-md-12">
                          <a hand id="plusicon">Additional Task Add <i ng-click="taskadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                         </div> -->

                         <!-- <div ng-repeat="(key,x) in task" class="col-md-12">
                               <hr>

                            <div class="row">
                               <div class="col-md-5">
                                  <div class="form-group">
                                     <label>Task {{ key +1 }} <span class="text-danger">*</span></label>
                                     <input placeholder="Please enter task" type="text" ng-model="x.task" ng-value="x.task"  class="form-control">
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Duration<span class="text-danger">*</span></label>
                                     <input numbers-only="numbers-only" placeholder="Please enter duration" type="text" ng-model="x.duration" ng-value="x.duration"  class="form-control">
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Price<span class="text-danger">*</span></label>
                                     <input numbers-only="numbers-only" placeholder="Please enter price" type="text" ng-model="x.price" ng-value="x.price"  class="form-control">
                                  </div>
                               </div>

                            <div class="col-md-1">
                          <a  ng-if="key != 0" hand id="plusicon" class="">  <i ng-click="deletetask(key)" class="fa fa-fw fa-trash"></i></a>
                         </div>


                            </div>
                         </div> -->

                           <div class="col-sm-12">
                              <div class="form-group d-inline-block mb-0">
                                 <input ng-click="update()" type="button" id="submit" value="Update" name="addEmp" class="btn btn-success">
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
<!--end-main-container-part-->
<style>
ul.nav.nav-pills li {
    margin-left: 20px;
}

.gigtabs ul.nav.nav-pills li a.active.show {
    background: #03B2FB;
    color: #fff;
}
</style>
