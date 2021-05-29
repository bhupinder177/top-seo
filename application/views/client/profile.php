<?php

include('sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper" ng-cloak  ng-app="myApp13" ng-controller="myCtrt13">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Profile</li>
    </ol>
  </section>
    <div class="content-box box box-default color-palette-box no-border-radius client-profile p-3">
      <div class="profile-preview profile-container row">
        <div class="col-sm-6">
      <div class="form-group">
      <label for="mobile">Company Name <span class="red-text">*</span></label>
      <input type="text" placeholder="please enter company name" class="required is_required validate account_input form-control"  id="companyname" ng-model="profile.c_name" ng-value="{{ profile.c_name }}">
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
<label for="name">Company logo <span class="red-text">*</span></label>
<input onchange="angular.element(this).scope().companylogoupload(this)"  type="file" class="form-control" data-validate="isEmail" id="name-user" name="image" >
<img ng-if="profile.logo != '' " src ="<?php echo base_url(); ?>assets/client_images/{{ profile.company_logo }}" id="logoview1" width="100" height="100" alt=""/>
<p ng-cloak ng-show="submitprofile && profile.company_logo == ''" class="text-danger">Company logo is required.</p>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label for="name">Profile Image <span class="red-text">*</span></label>
<input onchange="angular.element(this).scope().logoupload(this)"  type="file" class="form-control" data-validate="isEmail" id="name-user" name="image" >

<img ng-if="profile.logo != '' " src ="<?php echo base_url(); ?>assets/client_images/{{ profile.logo }}" id="logoview" width="100" height="100" alt=""/>

<p ng-cloak ng-show="submitprofile && profile.logo == ''" class="text-danger">image is required.</p>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label for="desig">Designation <span class="red-text">*</span></label>
<input placeholder="Please enter designation" type="text" class="required is_required validate account_input form-control"  id="desig" ng-model="profile.desig" ng-value="{{ profile.desig }}">
<p ng-cloak ng-show="submitprofile && profile.desig == ''" class="text-danger">Designation is required.</p>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label for="mobile">Phone Number <span class="red-text">*</span></label>
<input type="tel" numbers-only placeholder="Please enter phone number" class="form-control phonenumber"  id="phone" ng-model="profile.rep_ph_num" ng-value="profile.rep_ph_num ">
<p ng-cloak ng-show="submitprofile && profile.rep_ph_num == ''" class="text-danger">Phone number is required.</p>
<p ng-cloak ng-show="profile.rep_ph_num != '' && profile.rep_ph_num.length < 10 || profile.rep_ph_num.length > 11" class="text-danger">Please enter valid number.</p>

<!-- <span id="valid-msg" class="hide">✓ Valid</span>
<span id="error-msg" class="hide"></span> -->
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
<label for="mobile">Additional Address Details</label>
<textarea type="text" placeholder="Please enter additional dddress details" class="required is_required validate account_input form-control" id="address2" ng-model="profile.address2">{{ profile.address2 }}</textarea>
<p ng-cloak ng-show="submitprofile && profile.address == ''" class="text-danger">Additional address details  is required.</p>
</div>
       </div>

          <div class="col-sm-6">
  <div class="form-group">
  <label for="mobile">Zip Code <span class="red-text">*</span></label>
  <input placeholder="Please enter zip code" type="text" class="numberonly required is_required validate account_input form-control" data-validate="isEmail" id="zip" ng-model="profile.zip" ng-value="{{ profile.zip }}">
  <p ng-cloak ng-show="submitprofile && profile.zip == ''" class="text-danger">Zip code is required.</p>
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
<label for="mobile">Website Link</label>
<input type="text" placeholder="Please enter website link" class="required is_required validate account_input form-control"  id="website" ng-model="profile.website" ng-value="{{ profile.website }}">
<p ng-cloak ng-show="submitprofile && websitevalide " class="text-danger">Please enter valide url.</p>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label for="mobile">Skype Id </label>
<input type="text" placeholder="Please enter skype id" class="required is_required validate account_input form-control" data-validate="isEmail" id="skype" ng-model="profile.skype" ng-value="{{ profile.skype }}">
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
<label for="mobile">Linkedln Link </label>
<input type="text" placeholder="Please enter linkedln link" class="required is_required validate account_input form-control" data-validate="isEmail" id="linked" ng-model="profile.linkedlnLink" ng-value="{{ profile.linkedlnLink }}">
</div>
</div>

<div class="col-sm-12">
<div class="form-group">
<label for="mobile">About Your Profile <span class="red-text">*</span></label>
<textarea id="about" placeholder="Please enter about" name="about" type="text" class="required is_required validate account_input form-control ckeditor" id="about" ng-model="profile.about"></textarea>
<p ng-cloak ng-show="submitprofile && profile.about == ''" class="text-danger">About your profile is required.</p>
</div>
</div>
        <div class="col-sm-12">
          <input type="button" ng-click="profileupdate()" value="Update" class="btn btn-primary user-register">
        </div>
    </div>
  </div>
</div>
