<?php
// if (!isset($this->session->userdata['clientloggedin']))
// {
// echo "<script> window.location.href='" . base_url() . "login'</script>";
// }
// else
// {
// if ($this->session->userdata['clientloggedin']['role'] != 'freelancer')
// {
// echo "<script> window.location.href='" . base_url() . "login'</script>";
// }
// if($this->session->userdata['clientloggedin']['access'] != 3 &&  $this->session->userdata['clientloggedin']['access'] != 4 && $this->session->userdata['clientloggedin']['access'] == 5 || $this->session->userdata['clientloggedin']['access'] == 6)
// {
//   echo "<script> window.location.href='" . base_url() . "freelancer/dashboard'</script>";

// }

// }
?>

<div class="findwork joblisting" ng-cloak ng-app="myApp9" ng-controller="myCtrt9">
<style>
.sidebarSection {
    background: #fff;
    padding: 15px 0;
    box-shadow: 0px 0px 30px #d6d6d6;
    border-radius: 10px;
    width: 100%;
    float: left;
}
.sidebarSection h3 {
    margin: 5px 0 15px;
    font-size: 17px;
    padding: 0 15px;
    color: #03b2fb;
}
.sidebarSection .panel.panel-default {
    border: none;
    box-shadow: none;
    border-radius: 0px;
    width: 100%;
    float: left;
}
.sidebarSection .panel.panel-default .panel-heading {
    background: no-repeat;
    border: none;
    border-radius: 0px;
    padding: 0;
	width: 100%;
    float: left;
}
.sidebarSection .panel.panel-default .panel-collapse {
    width: 100%;
    float: left;
    padding: 10px 15px;
}
.sidebarSection .panel.panel-default .panel-collapse .form-group {
    width: 100%;
    float: left;
    margin: 0;
}
.sidebarSection .panel-group {
    margin-bottom: 0px;
    width: 100%;
    float: left;
}
.searchWithicon {
    width: 100%;
    float: left;
    position: relative;
}
.searchWithicon i {
    position: absolute;
    top: 11px;
    left: 9px;
    font-size: 12px;
    color: #d8d5d5;
}
.searchWithicon input.form-control {
    padding-left: 30px;
    font-size: 12px;
}
.searchWithicon select.form-control {
    padding-left: 20px;
}
.sidebarSection .panel.panel-default .panel-heading h4.panel-title a {
    width: 100%;
    float: left;
    display: flex;
    justify-content: space-between;
    font-size: 15px;
    padding: 10px 15px;
    border-bottom: 1px solid #dadada;
}
.checkbox_design {
    display: flex;
    margin: 0;
    flex-direction: column;
}
.checkbox_design .custom-control {
    width: 100%;
    float: left;
    margin: 0;
    font-weight: 600;
    letter-spacing: 1px;
    color: #515151;
    padding-left: 25px;
}
.custom-control-input {
    position: absolute;
    left: 0;
    z-index: -1;
    width: 1rem;
    height: 1.25rem;
    opacity: 0;
}
.checkbox_design .custom-control label.custom-control-label {
    font-size: 13px;
    font-weight: 400;
    width: 100%;
    margin: 0 0 2px;
    position: relative;
}
.custom-control-label::before {
    position: absolute;
    top: .1rem;
    left: -2.5rem;
    display: block;
    width: 1.5rem;
    height: 1.5rem;
    pointer-events: none;
    content: "";
    background-color: #fff;
    border: #03b2fb solid 1px;
}
.custom-control-label::after {
    position: absolute;
    top: .1rem;
    left: -2.5rem;
    display: block;
    width: 1.5rem;
    height: 1.5rem;
    content: "";
    background: #fafafa;
    border: 1px solid #03b2fb;
    border-radius: 2px;
}
.custom-checkbox .custom-control-input:checked~.custom-control-label::after {
    background: #03b2fb;
    background-image: none;
}
.custom-control.custom-checkbox.HourlyDeatils {
    display: flex;
    flex-direction: row;
    width: 90%;
    margin: 10px auto;
    justify-content: space-evenly;
}
.HourlySubSecInput {
    position: relative;
    display: flex;
    align-items: center;
    padding: 0 5px;
}
.HourlySubSecInput i {
    position: absolute;
    left: 10px;
    font-size: 12px;
    color: #cccbcb;
}
.HourlySubSecInput input.form-control {
    padding-left: 15px;
    font-size: 12px;
}
.HourlySubSecInput label {
    margin: 0 0 0 4px;
    font-size: 12px;
}
.checkbox_design .custom-control .HourlySubSec label.custom-control-label {
    top: -10px;
}
.sidebarSection .panel.panel-default .panel-heading h4.panel-title a[aria-expanded="false"] i.fa.fa-angle-up {
    transform: rotate(180deg);
}
.sidebarSection .panel.panel-default:last-child .panel-heading h4.panel-title a.collapsed {
    border-bottom: 0px;
}
.sidebarSection .panel.panel-default:last-child .panel-heading h4.panel-title a{
    border-bottom: 1px solid #dadada;
}
</style>
<div class="find-section" >
    <div class="container">
        <div class="row">
			<div class="col-lg-3 FindWorksidebar">
				<div class="sidebarSection">
					<h3>Filter By</h3>
					<div class="panel-group" id="accordion">

						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" data-parent="#accordion" href="#Category">Category <i class="fa fa-angle-up"></i></a>
							</h4>
						  </div>
						  <div id="Category" class="panel-collapse collapse in">
							<div class=" form-group">
								<div class="searchWithicon">
									<i class="fa fa-search"></i>
									<select class="form-control" placeholder="Select Category" >
										<optgroup label="Accounting & Consulting">
											<option value="">All - Accounting & Consulting</option>
											<option value="">Accounting</option>
											<option value="">Financial Planning</option>
											<option value="">Human Resources</option>
											<option value="">Management Consulting</option>
											<option value="">Other - Accounting & Consulting</option>
										</optgroup>
										<optgroup label="Admin Support">
											<option value="">All - Admin Support</option>
										</optgroup>
									</select>
								</div>
							</div>
						  </div>
						</div>

						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" data-parent="#accordion" href="#Freelancersneeded">Freelancers needed <i class="fa fa-angle-up"></i></a>
							</h4>
						  </div>
						  <div id="Freelancersneeded" class="panel-collapse collapse in">
							<div class="form-group">
								<div class="checkbox_design">
									<div class="custom-control custom-checkbox mb-3">
									  <input type="checkbox" class="custom-control-input" id="Freelancersneeded1" name="Freelancersneeded1">
									  <label class="custom-control-label" for="Freelancersneeded1">1</label>
									</div>
									<div class="custom-control custom-checkbox">
									  <input type="checkbox" class="custom-control-input" id="Freelancersneeded2" name="Freelancersneeded2">
									  <label class="custom-control-label" for="Freelancersneeded2">2 to 5</label>
									</div>
									<div class="custom-control custom-checkbox">
									  <input type="checkbox" class="custom-control-input" id="Freelancersneeded3" name="Freelancersneeded3">
									  <label class="custom-control-label" for="Freelancersneeded3">More than 5</label>
									</div>
								</div>
							</div>
						  </div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#ExperienceLevel">Experience Level <i class="fa fa-angle-up"></i></a>
								</h4>
							</div>
							<div id="ExperienceLevel" class="panel-collapse collapse in">
								<div class="form-group">
									<div class="checkbox_design">
										<div class="custom-control custom-checkbox mb-3">
										  <input type="checkbox" class="custom-control-input" id="EntryLevel" name="Freelancersneeded1">
										  <label class="custom-control-label" for="EntryLevel">Entry Level - $</label>
										</div>
										<div class="custom-control custom-checkbox">
										  <input type="checkbox" class="custom-control-input" id="Intermediate" name="Freelancersneeded2">
										  <label class="custom-control-label" for="Intermediate">Intermediate - $</label>
										</div>
										<div class="custom-control custom-checkbox">
										  <input type="checkbox" class="custom-control-input" id="Expert" name="Freelancersneeded3">
										  <label class="custom-control-label" for="Expert">Expert - $</label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#JobType">Job Type <i class="fa fa-angle-up"></i></a>
								</h4>
							</div>
							<div id="JobType" class="panel-collapse collapse in">
								<div class="form-group">
									<div class="checkbox_design">
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="Hourly" name="Freelancersneeded1">
											<label class="custom-control-label" for="Hourly">Hourly</label>
										</div>
										<div class="custom-control custom-checkbox HourlyDeatils">
											<div class="HourlySubSec">
												<input type="checkbox" class="custom-control-input" id="HourlyMinMAx" name="Freelancersneeded2">
												<label class="custom-control-label" for="HourlyMinMAx"></label>
											</div>
											<div class="HourlySubSecInput">
												<i class="fa fa-dollar"></i>
												<input type="text" class="form-control" placeholder="Min" />
												<label class="" for="">/hr</label>
											</div>
											<div class="HourlySubSecInput">
												<i class="fa fa-dollar"></i>
												<input type="text" class="form-control" placeholder="Max" />
												<label class="" for="">/hr</label>
											</div>
										</div>
									</div>

									<div class="checkbox_design">
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="Fixed-Price" name="Freelancersneeded1">
											<label class="custom-control-label" for="Fixed-Price">Fixed-Price</label>
										</div>
										<div class="custom-control custom-checkbox">
											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="Lessthan" name="Freelancersneeded1">
												<label class="custom-control-label" for="Lessthan">Less than $100</label>
											</div>
											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="Lessthan" name="Freelancersneeded1">
												<label class="custom-control-label" for="Lessthan">$100 - $500</label>
											</div>
											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="Lessthan" name="Freelancersneeded1">
												<label class="custom-control-label" for="Lessthan">$500 - $1K</label>
											</div>
											<div class="custom-control custom-checkbox mb-3 HourlyDeatils HourlyDeatilsSub">
												<div class="HourlySubSec">
													<input type="checkbox" class="custom-control-input" id="HourlyMinMAx" name="Freelancersneeded2">
													<label class="custom-control-label" for="HourlyMinMAx"></label>
												</div>
												<div class="HourlySubSecInput">
													<i class="fa fa-dollar"></i>
													<input type="text" class="form-control" placeholder="Min" />
												</div>
												<div class="HourlySubSecInput">
													<i class="fa fa-dollar"></i>
													<input type="text" class="form-control" placeholder="Max" />
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#NumberOfProposals">Number Of Proposals <i class="fa fa-angle-up"></i></a>
								</h4>
							</div>
							<div id="NumberOfProposals" class="panel-collapse collapse in">
								<div class="form-group">
									<div class="checkbox_design">
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="Lessthan" name="Freelancersneeded1">
											<label class="custom-control-label" for="Lessthan">Less than 5</label>
										</div>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="Lessthan" name="Freelancersneeded1">
											<label class="custom-control-label" for="Lessthan">5 - 10</label>
										</div>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="Lessthan" name="Freelancersneeded1">
											<label class="custom-control-label" for="Lessthan">10 - 15</label>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#COVID-19RelatedJobs">COVID-19 Related Jobs <i class="fa fa-angle-up"></i></a>
								</h4>
							</div>
							<div id="COVID-19RelatedJobs" class="panel-collapse collapse in">
								<div class="form-group">
									<div class="checkbox_design">
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="COVID-19" name="Freelancersneeded1">
											<label class="custom-control-label" for="COVID-19">COVID-19</label>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#ClientInfo">Client Info <i class="fa fa-angle-up"></i></a>
								</h4>
							</div>
							<div id="ClientInfo" class="panel-collapse collapse in">
								<div class="form-group">
									<div class="checkbox_design">
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="MyPreviousClient" name="Freelancersneeded1">
											<label class="custom-control-label" for="MyPreviousClient">My Previous Client</label>
										</div>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="PaymentVerified" name="Freelancersneeded1">
											<label class="custom-control-label" for="PaymentVerified">Payment Verified</label>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#ClientHistory">Client History <i class="fa fa-angle-up"></i></a>
								</h4>
							</div>
							<div id="ClientHistory" class="panel-collapse collapse in">
								<div class="form-group">
									<div class="checkbox_design">
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="Nohires" name="Freelancersneeded1">
											<label class="custom-control-label" for="Nohires">No hires</label>
										</div>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="1to8hires" name="Freelancersneeded1">
											<label class="custom-control-label" for="1to8hires">1 to 8 hires</label>
										</div>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="10+hires" name="Freelancersneeded1">
											<label class="custom-control-label" for="10+hires">10+ hires</label>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								  <a data-toggle="collapse" data-parent="#accordion" href="#ClientLocation">Client Location <i class="fa fa-angle-up"></i></a>
								</h4>
							</div>
							<div id="ClientLocation" class="panel-collapse collapse in">
								<div class=" form-group">
									<div class="searchWithicon">
										<i class="fa fa-search"></i>
										<input type="text" class="form-control" placeholder="Select Client Location" />
									</div>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#ProjectLength">Project Length <i class="fa fa-angle-up"></i></a>
								</h4>
							</div>
							<div id="ProjectLength" class="panel-collapse collapse in">
								<div class="form-group">
									<div class="checkbox_design">
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="Lessthan1month" name="Freelancersneeded1">
											<label class="custom-control-label" for="Lessthan1month">Less than 1 month</label>
										</div>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="1to8hires" name="Freelancersneeded1">
											<label class="custom-control-label" for="1to8hires">1 to 8 hires</label>
										</div>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="10+hires" name="Freelancersneeded1">
											<label class="custom-control-label" for="10+hires">10+ hires</label>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#HourPerWeek">Hour Per Week <i class="fa fa-angle-up"></i></a>
								</h4>
							</div>
							<div id="HourPerWeek" class="panel-collapse collapse in">
								<div class="form-group">
									<div class="checkbox_design">
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="Lessthan30week" name="Freelancersneeded1">
											<label class="custom-control-label" for="Lessthan30week">Less than 30hrs/week</label>
										</div>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="morethan30week" name="Freelancersneeded1">
											<label class="custom-control-label" for="morethan30week">More than 30hrs/week</label>
										</div>
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
            <div class="col-lg-9">
              <div ng-if="job.length != 0" class="jobmain" ng-repeat="(key,x) in job">
                <h3><a href="<?php echo base_url(); ?>job/{{ x.jobTitle | replace: '/':'' | underscoreless | lowercase }}-{{ x.jobId }}">{{ x.jobTitle }}</a></h3>
                 <div class="budget-freelance">
                <span>Est.Budget :<b>{{ x.currencycode }} {{ x.currencysymbol }} {{ x.jobBudget }}</b></span>
                  <span>No of Freelancers Required:<b> {{ x.jobRequiredFreelancer }}</b></span>
                     </div>

                <div class="jobdescription" ><span ng-bind-html="x.jobDescription | limitTo:300 |trustAsHtml"></span>
                  <a target="_blank" href="<?php echo base_url(); ?>job/{{ x.jobTitle | replace: '/':'' | underscoreless | lowercase }}-{{ x.jobId }}">Read more</a>
                </div>
                <div class="skills"><b>Skills & Expertise</b><a ng-repeat="(key,x2) in x.skill" href="<?php echo base_url(); ?>search={{ x2.service | lowercase | underscoreless }}"><span class="skill" >{{ x2.service }}</span></a></div>
                <p>Proposals : {{ x.proposal }}</p>

                <ul>
                  <li class="payment_verified" ng-if="x.payment == 1"><i class="fas fa-check-circle"></i> Payment Method: verified</li>
                  <li ng-if="x.payment == 0"><i class="fas fa-check-circle"></i> Payment Method: unverified</li>

                  <li><a href="<?php echo base_url(); ?>country={{ x.country | replace: '/':'' | underscoreless | lowercase }}"><i class="fas fa-map-marker-alt"></i> Country :{{ x.country }}</a></li>
                  <li>
                  <span ng-class="{ 'fas fa-star' :  x.review >= 1 , 'far fa-star' : x.review < 1 }"  ></span>
                  <span ng-class="{ 'fas fa-star' :  x.review >= 2 , 'far fa-star' : x.review < 2 }"  ></span>
                  <span ng-class="{ 'fas fa-star' :  x.review >= 3 , 'far fa-star' : x.review < 3 }"  ></span>
                  <span ng-class="{ 'fas fa-star' :  x.review >= 4 , 'far fa-star' : x.review < 4 }"  ></span>
                  <span ng-class="{ 'fas fa-star' :  x.review >= 5 , 'far fa-star' : x.review < 5 }"  ></span>

                  </li>
                  <li>Spent : {{ x.spend }}</li>


                </ul>
               <hr>
              </div>
              <div ng-cloak class="norecordfound" ng-if="job.length == 0 && shownojob == 1 ">
                <div>No record Found</div>
                <!-- <div class="page-not-found">
                    <div class="error-sec">
                        <img  src="<?php echo base_url(); ?>assets/front/images/coming-soon.png" alt="">
                       <a class="btn search-btn" href="<?php echo base_url(); ?>freelancer/dashboard">Go to Dashboard</a>
                        </div>
                 </div> -->
                  </div>
              <div  id="pagination"></div>

              </div>
         </div>

      </div>
   </div>
</div>
