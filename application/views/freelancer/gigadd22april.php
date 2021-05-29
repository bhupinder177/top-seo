<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Gig Add</li>
      </ol>
   </section>
   <section class="content">
      <div ng-cloak  ng-app="myApp72" ng-controller="myCtrt72">
         <div id="content">
            <div class="gig-pro">
               <div class="social-links-area p-3 bg-white">

                  <div class="top-rated-emp-container">
                        <div class="row">
                           <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                 <label for="name">Title<span class="text-danger">*</span></label>
                                 <input type="text" class="form-control rounded-0" ng-model="title" id="title" placeholder="Please enter title"  />
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
                                 <p ng-cloak ng-show="submitr && services == ''" class="text-danger">Service is required.</p>
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
                                 <label for="name" class="m-0">Image*</label>
                                 <input onchange="angular.element(this).scope().imageupload(this)" type="file" id="file" class="form-control" name="file">
                                 <img ng-if="image" src="<?php echo base_url(); ?>assets/gig/{{ image }}" height="100" width="100">

                                 <p ng-cloak ng-show="submitr && image == ''" class="text-danger">Please select image.</p>

                              </div>
                           </div>


                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="position"  >Description<span class="text-danger">*</span></label>
                                 <textarea type="text" class="ckeditor form-control rounded-0" ng-model="description" name="description" id="description" placeholder="Description" /></textarea>
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
		        <a data-toggle="tab" class="active show" href="#basic">Basic</a>
		        </li>
						<li>
					 <a data-toggle="tab" href="#standard" class="">Standard</a>
					 </li>
					 <li>
					  <a data-toggle="tab" href="#premium" class="">Premium</a>
					 </li>

		        </ul>
          </div>
            <div class="tab-content">

                            <!-- basic plan -->
                          <div id="basic" class="tab-pane fade in active show ">
                           <div class="col-md-12">
                                <div class="row">

                                  <div class="col-md-6">
                                     <div class="form-group">
                                        <label>Explain Your Basic Plan</label>
                                        <textarea placeholder="Please explain your plan"  type="text" ng-model="basicexplain" ng-value="basicexplain" class="form-control"></textarea>
                                        <p ng-show="submitr && basicexplain == ''" class="text-danger">Explain is required.</p>
                                     </div>
                                  </div>
                                  <div class="col-md-12">
                               <a hand id="plusicon">Basic Plan task <i ng-click="basicadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                                  </div>

                                  <div ng-repeat="(key,x) in basic" class="col-md-12">
                                        <hr>

                                     <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                              <label>Task {{ key +1 }}</label>
                                              <input placeholder="Please enter task" type="text" ng-model="x.task"  class="form-control">
                                              <p ng-show="submitr && x.task == ''" class="text-danger">Task name is required.</p>
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
                                        <input numbers-only="numbers-only" placeholder="Please enter price" numbers-only="numbers-only" type="text" ng-model="basicprice" ng-value="basicprice"  class="form-control">
                                        <p ng-show="submitr && basicprice == ''" class="text-danger">Price  is required.</p>
                                     </div>
                                  </div>

                                  <div class="col-md-6">
                                     <div class="form-group">
                                        <label>Work Duration (In Days)</label>
                                        <input numbers-only="numbers-only" placeholder="Please enter duration"   id="price" type="text" ng-model="basicduration" ng-value="basicduration" class="form-control">
                                        <p ng-show="submitr && basicduration == ''" class="text-danger">Duration is required.</p>
                                     </div>
                                  </div>

                                  <div class="col-md-6">
                                     <div class="form-group">
                                        <label>Additional Information</label>
                                        <textarea placeholder="Please enter description"  type="text" ng-model="basicdescription" ng-value="basicdescription" class="form-control"></textarea>
                                        <!-- <p ng-show="submitr && basicdescription == ''" class="text-danger">Description is required.</p> -->
                                     </div>
                                  </div>



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
                                        <p ng-show="submitr && standardexplain == ''" class="text-danger">Explain is required.</p>
                                     </div>
                                  </div>
                                  <div class="col-md-12">
                               <a hand id="plusicon">Standard Plan task <i ng-click="standardadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                                  </div>

                                  <div ng-repeat="(key,x) in standard" class="col-md-12">
                                        <hr>

                                     <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                              <label>Task {{ key +1 }}</label>
                                              <input placeholder="Please enter task" type="text" ng-model="x.task"  class="form-control">
                                              <p ng-show="submitr && x.task == ''" class="text-danger">Task name is required.</p>
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
                                        <p ng-show="submitr && standardprice == ''" class="text-danger">Price  is required.</p>
                                     </div>
                                  </div>

                                  <div class="col-md-6">
                                     <div class="form-group">
                                        <label>Work Duration (In Days)</label>
                                        <input numbers-only="numbers-only" placeholder="Please enter duration"   id="price" type="text" ng-model="standardduration" ng-value="standardduration" class="form-control">
                                        <p ng-show="submitr && standardduration == ''" class="text-danger">Duration is required.</p>
                                     </div>
                                  </div>

                                  <div class="col-md-6">
                                     <div class="form-group">
                                        <label>Additional Information</label>
                                        <textarea placeholder="Please enter description"  type="text" ng-model="standarddescription" ng-value="standarddescription" class="form-control"></textarea>
                                        <!-- <p ng-show="submitr && standarddescription == ''" class="text-danger">Additional information is required.</p> -->
                                     </div>
                                  </div>
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
                                       <p ng-show="submitr && premiumexplain == ''" class="text-danger">Explain is required.</p>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                              <a hand id="plusicon">Premium Plan task <i ng-click="premiumadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                                 </div>

                                 <div ng-repeat="(key,x) in premium" class="col-md-12">
                                       <hr>

                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Task {{ key +1 }}</label>
                                             <input placeholder="Please enter task" type="text" ng-model="x.task"  class="form-control">
                                             <p ng-show="submitr && x.task == ''" class="text-danger">Task name is required.</p>
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
                                       <p ng-show="submitr && premiumprice == ''" class="text-danger">Price  is required.</p>
                                    </div>
                                 </div>

                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Work Duration (In Days)</label>
                                       <input numbers-only="numbers-only" placeholder="Please enter duration"   id="price" type="text" ng-model="premiumduration" ng-value="premiumduration" class="form-control">
                                       <p ng-show="submitr && premiumduration == ''" class="text-danger">Duration is required.</p>
                                    </div>
                                 </div>

                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Additional Information</label>
                                       <textarea placeholder="Please enter description"  type="text" ng-model="premiumdescription" ng-value="premiumdescription" class="form-control"></textarea>
                                       <!-- <p ng-show="submitr && premiumdescription == ''" class="text-danger">Additional information is required.</p> -->
                                    </div>
                                 </div>
                              </div></div>

                       </div>
                         <!-- premium plan -->

                         </div>

                         <div class="col-md-12">
                      <a hand id="plusicon">Additional Task Add <i ng-click="taskadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                         </div>

                         <div ng-repeat="(key,x) in task" class="col-md-12">
                               <hr>

                            <div class="row">
                               <div class="col-md-5">
                                  <div class="form-group">
                                     <label>Task {{ key +1 }}</label>
                                     <input placeholder="Please enter task" type="text" ng-model="x.task" ng-value="x.task"  class="form-control">
                                     <!-- <p ng-show="submitr && x.task == ''" class="text-danger">Task name is required.</p> -->
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Duration</label>
                                     <input numbers-only="numbers-only" placeholder="Please enter duration" type="text" ng-model="x.duration" ng-value="x.duration"  class="form-control">
                                     <!-- <p ng-show="submitr && x.duration == ''" class="text-danger">Duration is required.</p> -->
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Price</label>
                                     <input numbers-only="numbers-only" placeholder="Please enter price" type="text" ng-model="x.price" ng-value="x.price"  class="form-control">
                                     <!-- <p ng-show="submitr && x.price == ''" class="text-danger">Price is required.</p> -->
                                  </div>
                               </div>

                            <div class="col-md-1">
                          <a  ng-if="key != 0" hand id="plusicon" class="">  <i ng-click="deletetask(key)" class="fa fa-fw fa-trash"></i></a>
                         </div>


                            </div>
                         </div>

                           <div class="col-sm-12">
                              <div class="form-group d-inline-block mb-0">
                                 <input ng-click="save()" type="button" id="submit" value="Submit" name="addEmp" class="btn btn-success">
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
