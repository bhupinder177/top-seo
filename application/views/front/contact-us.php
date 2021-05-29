<div ng-cloak class="container" ng-app="myApp11" ng-controller="myCtrt11">
						<!-- <div class="row">
		<div class="col-md-12">
		<div class="auth-heading">
		<h3>Your personal information</h3>
	</div>
</div>
</div> -->
<div class="contact-sec">
		<form action="" id="contact" method="post" >
			<h6 class="login_error_msg"></h6>
            <div class="row">
	<div class="col-md-6">
			<div class="contact-detail">
				<h6>Get in Touch</h6>

				<div class="form-group">
					<label for="name">Full Name *</label>
					<input type="text" class="form-control" placeholder="Please enter first name" id="name-user" name="name" ng-model="name" ng-value="name">
          <p ng-show="csubmit && name == ''" class="text-danger">Full name is required.</p>

				</div>
				<div class="form-group">
					<label for="lname">Email*</label>
					<input type="text" class="form-control" placeholder="Please enter email address"  id="Lname" name="email" ng-model="email" ng-value="email">
          <p ng-show="csubmit && email == ''" class="text-danger">Email is required.</p>

				</div>
				<div class="form-group">
					<label for="lname">Skype</label>
					<input type="text" class="form-control" placeholder="Please enter skype" id="Lname" name="skype" ng-model="skype" ng-value="skype">
          <p ng-show="csubmit && skype == ''" class="text-danger">Skype is required.</p>

				</div>
				<div class="form-group">
					<label for="password">Mobile No*</label>
					<input type="tel" class="form-control" placeholder="Please enter phone number"  name="phone" id="phone" ng-model="mobile" ng-value="mobile">
					<span id="valid-msg" class="hide">✓ Valid</span>
					<span id="error-msg" class="hide"></span>
          <p ng-show="csubmit && mobile == ''" class="text-danger">Mobile is required.</p>

				</div>
				<div class="form-group">
					<label for="password">Subject*</label>
					<input type="text" class="form-control" placeholder="Please enter subject"  name="phone" ng-model="subject" ng-value="subject">
          <p ng-show="csubmit && subject == ''" class="text-danger">Subject is required.</p>

				</div>
				<div class="form-group">
					<label for="email-now">Message*</label>
					<textarea type="text" class="form-control" placeholder="Please enter message" id="message" ng-model="message" ng-value="message" name="message"></textarea>
          <p ng-show="csubmit && message == ''" class="text-danger">Message is required.</p>

				</div>
			<button type="button" ng-click="submitcontact()" class="btn btn-primary user-register">Submit</button>

		</div>
        </div>
                <div class="col-md-6">
                   <div class="map-sec">
                       	<h6>Contact information</h6>
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2887.600402384866!2d-79.72179224924024!3d43.63567527901939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b3ff4e544303b%3A0xe446c7b5cff611!2s7196%20Gagliano%20Dr%2C%20Mississauga%2C%20ON%20L5W%201X5%2C%20Canada!5e0!3m2!1sen!2sin!4v1570076562637!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                     </div>
                 </div>
                </div>
	</form>
</div>





</div>
