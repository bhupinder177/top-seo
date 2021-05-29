<?php

include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">Profile</li>
      </ol>
    </section>

<!--main-container-part-->

<section class="user-dashboard">
	<!-- get sidebar -->
		<div class="box p-3">
			<div ng-cloak  ng-app="myApp37" ng-controller="myCtrt37">
				<div id="content">
							<div class="profile-preview profile-container">
                                <div class="row">
                                <div ng-if="profile.type == 2" class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Company Name <span class="red-text">*</span></label>
								<input type="text" placeholder="please enter company name" class="required is_required validate account_input form-control"  id="companyname" ng-model="profile.c_name" ng-value="profile.c_name">
								<p ng-cloak ng-show="submitprofile && profile.c_name == ''" class="text-danger">company name is required.</p>
								</div>
                                </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="name">Full Name <span class="red-text">*</span></label>
                                    <input placeholder="Please enter full name" ng-value="{{ profile.name }}" ng-model="profile.name" type="text" class="characteronly is_required validate account_input form-control"  id="name"  >
                                    <p ng-cloak ng-show="submitprofile && profile.name == ''" class="text-danger">Name is required.</p>
                                    </div>
                                    </div>
                                  <div class="col-sm-6">
								<div class="form-group">
								<label for="name">Image <span class="red-text">*</span></label>
								<input onchange="angular.element(this).scope().logoupload(this)"  type="file" class="is_required validate account_input form-control" data-validate="isEmail" id="name-user" name="image">
								<img ng-if="profile.logo != '' " src ="<?php echo base_url(); ?>assets/client_images/{{ profile.logo }}" id="logoview" width="100" height="100" alt=""/>
                                <p ng-cloak ng-show="submitprofile && profile.logo == ''" class="text-danger">image is required.</p>
								</div>
                                </div>

                    <!-- company logo -->
                    <div class="col-sm-6" ng-if="profile.type == 2">
                    <div class="form-group">
                    <label for="name">Comapny logo <span class="red-text">*</span></label>
                    <input onchange="angular.element(this).scope().companylogoupload(this)"  type="file" class="is_required validate account_input form-control" data-validate="isEmail" id="name-user" name="image" >

                    <img ng-if="profile.logo != '' " src ="<?php echo base_url(); ?>assets/client_images/{{ profile.company_logo }}" id="companylogoview" width="100" height="100" alt=""/>

                    <p ng-cloak ng-show="submitprofile && profile.company_logo == ''" class="text-danger">image is required.</p>
                    </div>
                    </div>
                    <!-- company logo -->
                                <div class="col-sm-6">
								<div class="form-group">
								<label for="desig">Designation <span class="red-text">*</span></label>
                <select   class="required is_required validate account_input form-control" id="desig" ng-model="profile.desig" >
                  <option value="">Select Designation</option>
                  <option value="1">Director</option>
                  <option value="2">Managing Director</option>
                  <option value="3">CEO</option>
                  <option value="4">Owner</option>
                  <option value="5">Chief Operating Officer</option>
                  <option value="6">Co-Founder</option>
                </select>
								<p ng-cloak ng-show="submitprofile && profile.desig == ''" class="text-danger">Designation is required.</p>
								</div>
                             </div>
                                      <div class="col-sm-6">
								<div class="form-group">
								<label for="year">Year Founded <span class="red-text">*</span></label>
								<input  type="text" yearpicker="" placeholder="Please enter year founded" class="required is_required validate account_input form-control"  id="year" ng-model="profile.year" ng-value="{{ profile.year }}">
								<p ng-cloak ng-show="submitprofile && profile.year == ''" class="text-danger">Year founded is required.</p>
								</div>
                                 </div>
                                <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Address <span class="red-text">*</span></label>
								<textarea type="text" placeholder="Please enter address" class="required is_required validate account_input form-control" id="address1" ng-model="profile.address1">{{ profile.address1 }}</textarea>
								<p ng-cloak ng-show="submitprofile && profile.address1 == ''" class="text-danger">address is required.</p>
								</div>
                                 </div>
                                 <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Address 2 <span class="red-text">*</span></label>
								<textarea type="text" placeholder="Please enter address 2" class="required is_required validate account_input form-control" id="address2" ng-model="profile.address2">{{ profile.address2 }}</textarea>
								<p ng-cloak ng-show="submitprofile && profile.address == ''" class="text-danger">address2  is required.</p>
								</div>
                                 </div>
                                       <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Phone Number <span class="red-text">*</span></label>
								<input type="text" numbers-only placeholder="Please enter phone number" class="numberonly required is_required validate account_input form-control" data-validate="isEmail" id="phone" ng-model="profile.rep_ph_num" ng-value="{{ profile.rep_ph_num }}">
								<p ng-cloak ng-show="submitprofile && profile.rep_ph_num == ''" class="text-danger">Phone number is required.</p>
								</div>
                                  </div>
                                  <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Zip Code <span class="red-text">*</span></label>
								<input placeholder="Please enter zip code" type="text" class="numberonly required is_required validate account_input form-control" data-validate="isEmail" id="zip" ng-model="profile.zip" ng-value="{{ profile.zip }}">
								<p ng-cloak ng-show="submitprofile && profile.zip == ''" class="text-danger">zip is required.</p>
								</div>
                                </div>
                                  <div class="col-sm-6">
								<div class="form-group">
								<label for="country">Country <span class="red-text">*</span></label>
								<select onchange="angular.element(this).scope().getstate(this)" id="country" class="country is_required validate account_input form-control" ng-model="profile.country">
								<option value="">Select country</option>
                 <option ng-if="country1.length != 0" ng-repeat="(key,x) in country1" ng-init="country1 = key"   value="{{ x.id }}">{{ x.name }}</option>
								</select>
								<p ng-cloak ng-show="submitprofile && profile.country == ''" class="text-danger">Please select country.</p>
								</div>
                                  </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="state">State <span class="red-text">*</span></label>
                                    <select onchange="angular.element(this).scope().getcity(this)" id="states" class="state is_required validate account_input form-control" ng-model="profile.state">
                                    <option value="">Select state</option>
                                    <option ng-if="st.length != 0" ng-repeat="(key,x) in st" ng-init="st = key"  value="{{ x.id }}">{{ x.name }} </option>
                                    </select>
                                    <p ng-cloak ng-show="submitprofile && profile.state == ''" class="text-danger">please select state.</p>
                                    </div>
                                    </div>
                                     <div class="col-sm-6">
								<div class="form-group">
								<label for="city">City <span class="red-text">*</span></label>
								<select id="city" class="city is_required validate account_input form-control" ng-model="profile.city">
								<option value="">Select city</option>

								<option ng-if="ci.length != 0" ng-repeat="(key,x) in ci" ng-init="ci = key" value="{{ x.id }}">{{ x.name }} </option>

								</select>
								<p ng-cloak ng-show="submitprofile && profile.city == ''" class="text-danger">please select city.</p>
								    </div>
    </div>
                                   <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">SEO Profile Title</label>
								<input type="text" placeholder="Please enter seo title" class="required is_required validate account_input form-control"  id="seotitle" ng-model="profile.seoTitle" ng-value="{{ profile.seoTitle }}">
								</div>
</div>
                                <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">SEO Meta Description</label>
								<input type="text" placeholder="Please enter seo description" class="required is_required validate account_input form-control" data-validate="isEmail" id="seodescription" ng-model="profile.seoDescription" ng-value="{{ profile.seoDescription }}">
								</div>
</div>

                                    <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Website</label>
								<input type="text" placeholder="Please enter website" class="required is_required validate account_input form-control"  id="website" ng-model="profile.website" ng-value="{{ profile.website }}">
							 <p ng-cloak ng-show="submitprofile && websitevalide " class="text-danger">Please enter valide url.</p>
								</div>
                                 </div>

                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label for="state">Currency<span class="red-text">*</span></label>
                                         <select id="currency" class="form-control" ng-model="profile.currencyId">
                                             <option value="">Select Currency</option>
                                             <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency" value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
                                         </select>
                                         <p ng-cloak ng-show="submitprofile && profile.currency == ''" class="text-danger">Please select currency.</p>
                                     </div>
                                 </div>

                                       <div ng-if="profile.type == 2" class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Min Hourly Price <span class="red-text">*</span></label>
								<input numbers-only type="text" placeholder="Please enter min price" class="numberonly required is_required validate account_input form-control" data-validate="isEmail" id="minPrice" ng-model="profile.minPrice" ng-value="{{ profile.minPrice }}">
								<p ng-cloak ng-show="submitprofile && profile.minPrice == ''" class="text-danger">Min hourly price is required.</p>
								</div>
                                             </div>

                            <div class="col-sm-6">
								<div class="form-group">


								<label ng-if="profile.type == 2" for="mobile"> Max Hourly Price <span class="red-text">*</span></label>

								<label ng-if="profile.type == 3" for="mobile">Hourly Price <span class="red-text">*</span></label>

								<input numbers-only type="text"  placeholder="Please enter max price" class="numberonly required is_required validate account_input form-control" data-validate="isEmail" id="maxPrice" ng-model="profile.maxPrice" ng-value="{{ profile.maxPrice }}">

							<p ng-if="profile.type == 2" ng-cloak ng-show="submitprofile && profile.maxPrice == ''" class="text-danger">Max hourly price is required.</p>
							<p ng-if="profile.type == 3" ng-cloak ng-show="submitprofile && profile.maxPrice == ''" class="text-danger">Hourly price is required.</p>


								</div>
                                </div>
                                   <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Skype </label>
								<input type="text" placeholder="Please enter skype" class="required is_required validate account_input form-control" data-validate="isEmail" id="skype" ng-model="profile.skype" ng-value="{{ profile.skype }}">
								</div>
                                 </div>
                                     <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Facebook Link </label>
								<input type="text" placeholder="Please enter facebook link" class="required is_required validate account_input form-control" data-validate="isEmail" id="facebook" ng-model="profile.facebookLink" ng-value="{{ profile.facebookLink }}">
								</div>
                                </div>
                                       <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Twitter Link </label>
								<input type="text" placeholder="Please enter twitter link" class="required is_required validate account_input form-control" data-validate="isEmail" id="twitter" ng-model="profile.twitterLink" ng-value="{{ profile.twitterLink }}">
								</div>
                                  </div>
                                     <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Linkedln Link </label>
								<input type="text" placeholder="Please enter linkedln link" class="required is_required validate account_input form-control" data-validate="isEmail" id="linked" ng-model="profile.linkedlnLink" ng-value="{{ profile.linkedlnLink }}">
								</div>
                                 </div>

                                    <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Instragram Link </label>
								<input type="text" placeholder="Please enter instragram link" class="required is_required validate account_input form-control" data-validate="isEmail" id="instragram" ng-model="profile.instagramLink" ng-value="{{ profile.instagramLink  }}">
								</div>
                                    </div>
                                   <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Pinterest Link </label>
								<input type="text" placeholder="Please enter pinterest link" class="required is_required validate account_input form-control" data-validate="isEmail" id="pinterest" ng-model="profile.pinterestLink" ng-value="{{ profile.pinterestLink }}">
								</div>
                                    </div>
                                     <div class="col-sm-6">
								<div class="form-group">
								<label for="mobile">Youtube Link </label>
								<input type="text" placeholder="Please enter youtube link" class="required is_required validate account_input form-control" data-validate="isEmail" id="youtube" ng-model="profile.youtubeLink" ng-value="{{ profile.youtubeLink }}">
								</div>
                                </div>
                                     <div class="col-sm-12">
								<div class="form-group">
								<label for="mobile">About <span class="red-text">*</span></label>
								<textarea id="about" placeholder="Please enter about" name="about" type="text" class="required is_required validate account_input form-control ckeditor" id="about" ng-model="profile.about"></textarea>
								<p ng-cloak ng-show="submitprofile && profile.about == ''" class="text-danger">about is required.</p>
								</div>
                                    </div>
                                    <div class="col-sm-12">
								<input type="button" ng-click="profileupdate()" value="Update" class="btn btn-primary user-register">
                                    </div>
								</div>
                        </div>
					</div>
                </div>
			</div>
</section>
    </div>
