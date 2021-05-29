<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a> ></li>
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
                           <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                 <label for="name">Gig Title<span class="text-danger">*</span></label>
                                 <input type="text" class="form-control rounded-0" ng-model="title" id="title" placeholder="Please enter gig title"  />
                                 <p ng-cloak ng-show="submitr && title == ''" class="text-danger">Gig title is required.</p>
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
                                 <label for="name" class="m-0">Image*</label>
                                 <input onchange="angular.element(this).scope().imageupload(this)" type="file" id="file" class="form-control" name="file">
                                 <img src="<?php echo base_url(); ?>assets/gig/{{ image }}" height="100" width="100">
                                 <p ng-cloak ng-show="submitr && image == ''" class="text-danger">Please select image.</p>

                              </div>
                           </div>


                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="position"  >Briefly Describe Your Gig<span class="text-danger">*</span></label>
                                 <textarea type="text" class="ckeditor form-control rounded-0" ng-model="description" name="description" id="description" placeholder="Description" /></textarea>
                                 <p ng-cloak ng-show="submitr && description == ''" class="text-danger">Description is required.</p>
                              </div>
                           </div>




                           <div class="tab-content">

                                           <!-- plan -->
                                         <div id="basic" >
                                           <div ng-if="plans.length != 3" class="col-md-12">
                                        <a hand id="plusicon">Add Plan <i ng-click="plansadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                                           </div>

                                          <div class="col-md-12" ng-repeat="(key,x) in plans">
                                               <div class="row">

                                                 <div class="col-md-5">
                                                    <div class="form-group">
                                                       <label>Plan</label>
                                                       <select  ng-model="x.plan"  class="form-control">
                                                         <option value="">Select Plan</option>
                                                         <option value="1">Basic</option>
                                                         <option value="2">Standard</option>
                                                         <option value="3">Premium</option>
                                                       </select>
                                                       <p ng-show="submitr && x.plan == ''" class="text-danger">Plain is required.</p>
                                                    </div>
                                                 </div>

                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label>Explain Your Basic Plan</label>
                                                       <textarea placeholder="Please explain your plan"  type="text" ng-model="x.explain" ng-value="x.explain" class="form-control"></textarea>
                                                       <p ng-show="submitr && x.explain == ''" class="text-danger">Explain is required.</p>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-1">
                                               <a  ng-if="key != 0" hand id="plusicon" class="">  <i ng-click="deleteplan(key)" class="fa fa-fw fa-trash"></i></a>
                                              </div>
                                                 <div class="col-md-12">
                                              <a hand id="plusicon">Plan task <i ng-click="taskadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                                                 </div>

                                                 <div ng-repeat="(key1,x2) in x.task" class="col-md-12">
                                                       <hr>

                                                    <div class="row">
                                                       <div class="col-md-6">
                                                          <div class="form-group">
                                                             <label>Task {{ key1 +1 }}</label>
                                                             <input placeholder="Please enter task" type="text" ng-model="x2.task" ng-value="x2.task"  class="form-control">
                                                             <p ng-show="submitr && x2.task == ''" class="text-danger">Task name is required.</p>
                                                          </div>
                                                       </div>

                                                    <div class="col-md-1">
                                                  <a  ng-if="key1 != 0" hand id="plusicon" class="">  <i ng-click="deletetask(key,key1)" class="fa fa-fw fa-trash"></i></a>
                                                 </div>
                                                    </div>
                                                 </div>



                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label>Price</label>
                                                       <input numbers-only="numbers-only" placeholder="Please enter price" numbers-only="numbers-only" type="text" ng-model="x.price" ng-value="x.price"  class="form-control">
                                                       <p ng-show="submitr && x.price == ''" class="text-danger">Price  is required.</p>
                                                    </div>
                                                 </div>

                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label>Work Duration (In Days)</label>
                                                       <input numbers-only="numbers-only" placeholder="Please enter duration"   id="price" type="text" ng-model="x.duration" ng-value="x.duration" class="form-control">
                                                       <p ng-show="submitr && x.duration == ''" class="text-danger">Duration is required.</p>
                                                    </div>
                                                 </div>

                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label>Additional Information</label>
                                                       <textarea placeholder="Please enter description"  type="text" ng-model="x.description" ng-value="x.description" class="form-control"></textarea>
                                                       <!-- <p ng-show="submitr && basicdescription == ''" class="text-danger">Description is required.</p> -->
                                                    </div>
                                                 </div>
                                                 <hr>
                                               </div>
                                             </div>
                                        </div>
                                        </div>
                                        <!-- plan -->

                         <div class="col-md-12">
                      <a hand id="plusicon">Add Additional Tasks <i ng-click="ataskadd(key)" class="fa fa-fw fa-plus-square"></i></a>
                         </div>

                         <div ng-repeat="(key,x) in atask" class="col-md-12">
                               <hr>

                            <div class="row">
                               <div class="col-md-5">
                                  <div class="form-group">
                                     <label>Task {{ key +1 }} <span class="text-danger">*</span></label>
                                     <input placeholder="Please enter task" type="text" ng-model="x.task" ng-value="x.task"  class="form-control">
                                     <!-- <p ng-show="submitr && x.task == ''" class="text-danger">Task name is required.</p> -->
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Duration (In Days)<span class="text-danger">*</span></label>
                                     <input numbers-only="numbers-only" placeholder="Please enter duration" type="text" ng-model="x.duration" ng-value="x.duration"  class="form-control">
                                     <!-- <p ng-show="submitr && x.duration == ''" class="text-danger">Duration is required.</p> -->
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Price<span class="text-danger">*</span></label>
                                     <input numbers-only="numbers-only" placeholder="Please enter price" type="text" ng-model="x.price" ng-value="x.price"  class="form-control">
                                     <!-- <p ng-show="submitr && x.price == ''" class="text-danger">Price is required.</p> -->
                                  </div>
                               </div>

                            <div class="col-md-1">
                          <a  ng-if="key != 0" hand id="plusicon" class="">  <i ng-click="adeletetask(key)" class="fa fa-fw fa-trash"></i></a>
                         </div>


                            </div>
                         </div>

                           <div class="col-sm-12">
                              <div class="form-group d-inline-block mb-0">
                                 <input ng-click="update()" type="button" id="submit" value="Submit" name="addEmp" class="btn btn-success">
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
