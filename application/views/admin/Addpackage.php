<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
      <li class="active">Add Package</li>
    </ol>
  </section>

  <section ng-cloak  ng-app="myApp40" ng-controller="myCtrt40"  class="content">
    <div class="container1">
      <!-- get sidebar -->
      <div id="content">
        <div class="box content-box">
          <div class="content-header p-3">
            <h4 class="mb-0">Add Package</h4>
          </div>
          <div class="box-success">
            <div class="box-body">
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
        				 <label>Package name<span class="red-text">*</span></label>
        				 <input placeholder="Please enter package" type="text"  id="name" ng-model="name" ng-value="name"  class="form-control title required"  >
        					<p ng-show="submitc && name == ''" class="text-danger">Package name is required.</p>
        			 </div>
             </div>

             <div class="col-md-6">
             <div class="form-group">
                <label>Duration<span class="red-text">*</span></label>
                <select  id="name" ng-model="duration" ng-value="duration"  class="form-control title required"  >
                  <option value="">Select Duration</option>
                  <option value="1">Monthly</option>
                  <option value="2">Yearly</option>
                </select>
                 <p ng-show="submitc && duration == ''" class="text-danger">Please select package duration.</p>
              </div>
            </div>

             <div class="col-md-6">
       			 <div class="form-group">
       					<label>Package price<span class="red-text">*</span></label>
       					<input placeholder="Please enter price" type="text"  id="price" ng-model="price" ng-value="price"  class="form-control title required"  >
       					 <p ng-show="submitc && price == ''" class="text-danger">Package price is required.</p>
       				</div>
            </div>
            <div class="col-md-6">
       				<div class="form-group">
       				 <label>Company profile<span class="red-text">*</span></label>
       				 <select  ng-model="company"  id="company" class="form-control category" >
       				<option value="">Select company profile</option>
       				<option value="1">Yes</option>
       				<option value="0">No</option>
       				 </select>
       				 <p ng-show="submitc && company == ''" class="text-danger">Please select company profile</p>
       			 </div>
           </div>
           <div class="col-md-6">

       			  <div class="form-group">
       				 <label>Number of industries<span class="red-text">*</span></label>
       					<input placeholder="Please enter number industries" type="text"  id="industry" ng-model="industry" ng-value="industry"  class="form-control title required"  >
       					<p ng-show="submitc && industry == ''" class="text-danger">industry is required.</p>
       				</div>
            </div>
            <div class="col-md-6">
       				<div class="form-group">
       				 <label>Services<span class="red-text">*</span></label>
       					<input placeholder="Please enter number of services" type="text"  id="price" ng-model="services" ng-value="services"  class="form-control title required"  >
       					<p ng-show="submitc && services == ''" class="text-danger">services is required.</p>
       				</div>
            </div>
            <div class="col-md-6">
       				<div class="form-group">
       				 <label>Removal of negative reviews<span class="red-text">*</span></label>
       					<input placeholder="Please enter number of services" type="text"  id="price" ng-model="review" ng-value="review"  class="form-control title required"  >
       					<p ng-show="submitc && review == ''" class="text-danger">Negative review is required.</p>
       				</div>
            </div>
            <div class="col-md-6">

       				<div class="form-group">
       				 <label>Chat <span class="red-text">*</span></label>
       				 <select  ng-model="chat"  id="chat" class="form-control" >
       				<option value="">Select status</option>
       				 <option  value="1">Yes</option>
       				<option  value="0">No</option>
       				 </select>
       				 <p ng-show="submitc && chat == ''" class="text-danger">Please select chat option</p>
       			 </div>
           </div>
           <div class="col-md-6">

       			 <div class="form-group">
       				<label>Request a quote option <span class="red-text">*</span></label>
       				<select  ng-model="request"  id="chat" class="form-control" >
       			 <option value="">Select request a quote</option>
       				<option  value="1">Yes</option>
       			 <option  value="0">No</option>
       				</select>
       				<p ng-show="submitc && request == ''" class="text-danger">Please select request quote</p>
       			</div>
          </div>
          <div class="col-md-6">

       			<div class="form-group">
       			 <label>Consideration for ranking <span class="red-text">*</span></label>
       			 <select  ng-model="ranking"  id="ranking" class="form-control" >
       			<option value="">Select option</option>
       			 <option  value="1">Yes</option>
       			<option  value="0">No</option>
       			 </select>
       			 <p ng-show="submitc && ranking == ''" class="text-danger">Please select Consideration for ranking</p>
       		 </div>
         </div>
         <div class="col-md-6">

       		 <div class="form-group">
       			<label>Preferred location<span class="red-text">*</span></label>
       			 <!-- <input  placeholder="Please enter number of preferred location" type="text"  id="location" ng-model="location" ng-value="location"  class="form-control title required"  > -->
             <select  ng-model="location"  id="location" class="form-control" >
             <option value="">Select option</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
              </select>
       			 <p ng-show="submitc && location == ''" class="text-danger">Preferred location is required.</p>
       		 </div>
         </div>
         <div class="col-md-6">

       		 		 <div class="form-group">
       		 			<label>Key People<span class="red-text">*</span></label>
       		 			 <input  placeholder="Please enter number of Key People" type="text"  id="keypeople" ng-model="keypeople" ng-value="keypeople"  class="form-control title required"  >
       		 			 <p ng-show="submitc && keypeople == ''" class="text-danger">key people is required.</p>
       		 		 </div>
             </div>
             <div class="col-md-6">

       				 		 <div class="form-group">
       				 			<label>Group chat<span class="red-text">*</span></label>
       				 			 <input  placeholder="Please enter number of group chat" type="text"  id="groupchat" ng-model="groupchat" ng-value="groupchat"  class="form-control title required"  >
       				 			 <p ng-show="submitc && groupchat == ''" class="text-danger">Group chat is required.</p>
       				 		 </div>
                 </div>
                 <div class="col-md-6">

       				 		 <div class="form-group">
       				 			<label>Testimonial <span class="red-text">*</span></label>
       				 			 <input  placeholder="Please enter number of testimonial" type="text"  id="testimonial" ng-model="testimonial" ng-value="testimonial"  class="form-control title required"  >
       				 			 <p ng-show="submitc && testimonial == ''" class="text-danger">Testimonial is required.</p>
       				 		 </div>
                 </div>
                 <div class="col-md-6">

                    <div class="form-group">
                     <label>Service Pricing <span class="red-text">*</span></label>
                      <input  placeholder="Please enter number of service pricing" type="text"  id="servicepricing" ng-model="servicepricing" ng-value="servicepricing"  class="form-control title required"  >
                      <p ng-show="submitc && servicepricing == ''" class="text-danger">Service pricing is required.</p>
                    </div>
                 </div>
                 <div class="col-md-6">

       				 		 <div class="form-group">
       				 			<label>Portfolio <span class="red-text">*</span></label>
       				 			 <input  placeholder="Please enter number of portfolio" type="text"  id="portfoilo" ng-model="portfolio" ng-value="portfolio"  class="form-control title required"  >
       				 			 <p ng-show="submitc && testimonial == ''" class="text-danger">Portfoilo is required.</p>
       				 		 </div>
                 </div>
                 <div class="col-md-6">

       						 <div class="form-group">
       				 			<label>Case studies <span class="red-text">*</span></label>
       				 			 <input  placeholder="Please enter number of Case studies" type="text"  id="casestudies" ng-model="casestudies" ng-value="casestudies"  class="form-control title required"  >
       				 			 <p ng-show="submitc && casestudies == ''" class="text-danger">Case studies is required.</p>
       				 		 </div>
                 </div>

                 <div class="col-md-6">

       						 <div class="form-group">
       				 			<label>Hourly <span class="red-text">*</span></label>
                    <select  ng-model="hourly"  id="hourly" class="form-control" >
              			<option value="">Select option</option>
              			 <option value="1">Yes</option>
              			 <option value="0">No</option>
              			 </select>
       				 			 <p ng-show="submitc && hourly == ''" class="text-danger">Hourly is required.</p>
       				 		 </div>
                 </div>

                 <div class="col-md-6">

       						 <div class="form-group">
       				 			<label>Profile custom title & description  <span class="red-text">*</span></label>
                    <select  ng-model="customtitle"  id="customtitle" class="form-control" >
              			<option value="">Select option</option>
              			 <option value="1">Yes</option>
              			 <option value="0">No</option>
              			 </select>
       				 			 <p ng-show="submitc && customtitle == ''" class="text-danger">Custom title is required.</p>
       				 		 </div>
                 </div>

                 <div class="col-md-6">

       						 <div class="form-group">
       				 			<label>custom your service briefing <span class="red-text">*</span></label>
                    <input  ng-model="service_briefing"  id="service_briefing" class="form-control" >

       				 			 <p ng-show="submitc && service_briefing == ''" class="text-danger">Service briefing is required.</p>
       				 		 </div>
                 </div>

                 <div class="col-md-6">

                    <div class="form-group">
                     <label>Choose a currency <span class="red-text">*</span></label>
                    <select  ng-model="currency"  id="currency" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && currency == ''" class="text-danger">Currency is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">

                    <div class="form-group">
                     <label>Review Submission <span class="red-text">*</span></label>
                    <select  ng-model="review"  id="review" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && review == ''" class="text-danger">Review is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">

                    <div class="form-group">
                     <label>Submit Guest Post<span class="red-text">*</span></label>
                    <select  ng-model="guestpost"  id="guestpost" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && guestpost == ''" class="text-danger">Guest posting is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">

                    <div class="form-group">
                     <label>Submit A Conference<span class="red-text">*</span></label>
                    <select  ng-model="conference"  id="conference" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && conference == ''" class="text-danger">Conference is required.</p>
                    </div>
                 </div>

                 <!-- hr -->
                 <div class="col-md-6">

       						 <div class="form-group">
       				 			<label>Team Member <span class="red-text">*</span></label>
                    <input  ng-model="team"  id="team" class="form-control" >

       				 			 <p ng-show="submitc && team == ''" class="text-danger">Team member is required.</p>
       				 		 </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Create A Employee Profile<span class="red-text">*</span></label>
                    <select  ng-model="employeeprofile"  id="employeeprofile" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && employeeprofile == ''" class="text-danger">Employee profile is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Department<span class="red-text">*</span></label>
                    <select  ng-model="department"  id="department" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && department == ''" class="text-danger">Department is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Salary Calculation<span class="red-text">*</span></label>
                    <select  ng-model="salary"  id="salary" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && salary == ''" class="text-danger">Salary calculation is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Attdendance<span class="red-text">*</span></label>
                    <select  ng-model="attdendance"  id="attdendance" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && attdendance == ''" class="text-danger">Attdendance is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Announcement<span class="red-text">*</span></label>
                    <select  ng-model="announcement"  id="announcement" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && announcement == ''" class="text-danger">Announcement is required.</p>
                    </div>
                 </div>


                 <div class="col-md-6">
              <div class="form-group">
                     <label>Performance<span class="red-text">*</span></label>
                    <select  ng-model="performance"  id="performance" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && performance == ''" class="text-danger">Performance is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Increment<span class="red-text">*</span></label>
                    <select  ng-model="increment"  id="increment" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && increment == ''" class="text-danger">Increment is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Annual holiday list<span class="red-text">*</span></label>
                    <select  ng-model="holiday"  id="holiday" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && holiday == ''" class="text-danger">Holiday is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Create leave type<span class="red-text">*</span></label>
                    <select  ng-model="leavetype"  id="leavetype" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && leavetype == ''" class="text-danger">Leave type is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Applying for leave <span class="red-text">*</span></label>
                    <select  ng-model="leave"  id="leave" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && leave == ''" class="text-danger">Leave is required.</p>
                    </div>
                 </div>


                 <div class="col-md-6">
              <div class="form-group">
                     <label>Applying for resignation <span class="red-text">*</span></label>
                    <select  ng-model="resignation"  id="resignation" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && resignation == ''" class="text-danger">Resignation is required.</p>
                    </div>
                 </div>

                 <!-- hr -->

                 <!-- recruitment -->
                 <div class="col-md-6">
              <div class="form-group">
                     <label>Job opening<span class="red-text">*</span></label>
                    <select  ng-model="jobopening"  id="jobopening" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && jobopening == ''" class="text-danger">Job opening is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Add Candidate<span class="red-text">*</span></label>
                    <select  ng-model="candidate"  id="candidate" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && candidate == ''" class="text-danger">Candidate is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Setup for interview<span class="red-text">*</span></label>
                    <select  ng-model="interview"  id="interview" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && interview == ''" class="text-danger">Setup interview  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Interview feedback<span class="red-text">*</span></label>
                    <select  ng-model="interviewfeedback"  id="interviewfeedback" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && interviewfeedback == ''" class="text-danger">Interview feedback  is required.</p>
                    </div>
                 </div>
                 <!-- recruitment -->

                 <!-- account -->
                 <div class="col-md-6">
              <div class="form-group">
                     <label>Expense<span class="red-text">*</span></label>
                    <select  ng-model="expense"  id="expense" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && expense == ''" class="text-danger">Expense  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Invoice<span class="red-text">*</span></label>
                    <select  ng-model="invoice"  id="invoice" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && invoice == ''" class="text-danger">Invoice  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Income<span class="red-text">*</span></label>
                    <select  ng-model="income"  id="income" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && income == ''" class="text-danger">Income  is required.</p>
                    </div>
                 </div>
                 <!-- account -->
                 <!-- daily status report -->
                 <div class="col-md-6">
              <div class="form-group">
                     <label>Manage Employee Dsr<span class="red-text">*</span></label>
                    <select  ng-model="dsr"  id="dsr" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && dsr == ''" class="text-danger">Dsr  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Timesheet<span class="red-text">*</span></label>
                    <select  ng-model="timesheet"  id="timesheet" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && timesheet == ''" class="text-danger">Timesheet  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Dsr Approval or Disapproval remark<span class="red-text">*</span></label>
                    <select  ng-model="dsrremark"  id="dsrremark" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && dsrremark == ''" class="text-danger">Dsr remark  is required.</p>
                    </div>
                 </div>
                 <!-- daily status report -->

                 <!-- sales -->
                 <div class="col-md-6">
              <div class="form-group">
                     <label>Lead Managment<span class="red-text">*</span></label>
                    <select  ng-model="lead"  id="lead" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && lead == ''" class="text-danger">Lead  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Lead History<span class="red-text">*</span></label>
                    <select  ng-model="leadhistory"  id="leadhistory" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && leadhistory == ''" class="text-danger">Lead history  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Create A Project<span class="red-text">*</span></label>
                    <select  ng-model="createproject"  id="createproject" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && createproject == ''" class="text-danger">Create project  is required.</p>
                    </div>
                 </div>



                 <div class="col-md-6">
              <div class="form-group">
                     <label>Assign Project to Project Manager<span class="red-text">*</span></label>
                    <select  ng-model="assignproject"  id="assignproject" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && assignproject == ''" class="text-danger">Assign project  is required.</p>
                    </div>
                 </div>
                 <!-- sales -->

                 <!-- project Managment -->

                <div class="col-md-6">
             <div class="form-group">
                    <label>Project Management<span class="red-text">*</span></label>
                   <select  ng-model="projectmanagment"  id="projectmanagment" class="form-control" >
                  <option value="">Select option</option>
                   <option value="1">Yes</option>
                   <option value="0">No</option>
                   </select>
                     <p ng-show="submitc && assignproject == ''" class="text-danger">Assign project  is required.</p>
                   </div>
                </div>

                <div class="col-md-6">
             <div class="form-group">
                    <label>Assign project to team<span class="red-text">*</span></label>
                   <select  ng-model="assignteam"  id="assignteam" class="form-control" >
                  <option value="">Select option</option>
                   <option value="1">Yes</option>
                   <option value="0">No</option>
                   </select>
                     <p ng-show="submitc && assignteam == ''" class="text-danger">Assign project  is required.</p>
                   </div>
                </div>

                <div class="col-md-6">
             <div class="form-group">
                    <label>Manage team task hrs<span class="red-text">*</span></label>
                   <select  ng-model="manageteamtask"  id="manageteamtask" class="form-control" >
                  <option value="">Select option</option>
                   <option value="1">Yes</option>
                   <option value="0">No</option>
                   </select>
                     <p ng-show="submitc && manageteamtask == ''" class="text-danger">Assign project  is required.</p>
                   </div>
                </div>

                <div class="col-md-6">
             <div class="form-group">
                    <label>Manage funds accountding to project<span class="red-text">*</span></label>
                   <select  ng-model="managefund"  id="manageteamtask" class="form-control" >
                  <option value="">Select option</option>
                   <option value="1">Yes</option>
                   <option value="0">No</option>
                   </select>
                     <p ng-show="submitc && manageteamtask == ''" class="text-danger">Assign project  is required.</p>
                   </div>
                </div>

                <div class="col-md-6">
             <div class="form-group">
                    <label>Task Managment<span class="red-text">*</span></label>
                   <select  ng-model="taskmanagement"  id="taskmanagement" class="form-control" >
                  <option value="">Select option</option>
                   <option value="1">Yes</option>
                   <option value="0">No</option>
                   </select>
                     <p ng-show="submitc && taskmanagement == ''" class="text-danger">Task Managment  is required.</p>
                   </div>
                </div>
                 <!-- project Managment -->

                 <!-- roi -->
                 <div class="col-md-6">
              <div class="form-group">
                     <label>Roi<span class="red-text">*</span></label>
                    <select  ng-model="roi"  id="roi" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && roi == ''" class="text-danger">Roi  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Company Roi<span class="red-text">*</span></label>
                    <select  ng-model="companyroi"  id="companyroi" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && companyroi == ''" class="text-danger">Company roi  is required.</p>
                    </div>
                 </div>


                                  <div class="col-md-6">
                               <div class="form-group">
                                      <label>Employee Roi<span class="red-text">*</span></label>
                                     <select  ng-model="employeeroi"  id="employeeroi" class="form-control" >
                                    <option value="">Select option</option>
                                     <option value="1">Yes</option>
                                     <option value="0">No</option>
                                     </select>
                                       <p ng-show="submitc && employeeroi == ''" class="text-danger">Employee roi  is required.</p>
                                     </div>
                                  </div>
                 <!-- roi -->

                 <!-- bank detail -->
                 <div class="col-md-6">
              <div class="form-group">
                     <label>Paypal detail<span class="red-text">*</span></label>
                    <select  ng-model="paypal"  id="paypal" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && paypal == ''" class="text-danger">Paypal detail  is required.</p>
                    </div>
                 </div>


                 <div class="col-md-6">
              <div class="form-group">
                     <label>Bank detail<span class="red-text">*</span></label>
                    <select  ng-model="bank"  id="bank" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && bank == ''" class="text-danger">Bank detail  is required.</p>
                    </div>
                 </div>
                 <!-- bank detail -->

                 <!-- communication -->


                 <div class="col-md-6">
              <div class="form-group">
                     <label>Email<span class="red-text">*</span></label>
                    <select  ng-model="email"  id="email" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && email == ''" class="text-danger">Email  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Phone<span class="red-text">*</span></label>
                    <select  ng-model="phone"  id="phone3" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && phone == ''" class="text-danger">Phone  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Skype<span class="red-text">*</span></label>
                    <select  ng-model="skype"  id="skype" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && skype == ''" class="text-danger">Skype  is required.</p>
                    </div>
                 </div>

                 <div class="col-md-6">
              <div class="form-group">
                     <label>Support on Email and Live chat<span class="red-text">*</span></label>
                    <select  ng-model="support"  id="support" class="form-control" >
                   <option value="">Select option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                      <p ng-show="submitc && support == ''" class="text-danger">Support  is required.</p>
                    </div>
                 </div>
                 <!-- communication -->


                 <!-- row -->
               </div>
               <button type="button" ng-click="submitpackage()" class="btn btn-success" >Submit</button>




            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
