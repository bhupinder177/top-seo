

<!--main-container-part-->
<input type="hidden" name="sessionId" value="<?php echo $this->session->userdata['clientloggedin']['id']; ?>" class="sessionId">

<section class="container-fluid light-bg user-dashboard no-padding">

	<div class="container1">

		<!-- get sidebar -->

		<div class="row no-margin user-dashboard-container">

			<div class="col-2 no-padding">

				<?php require('sidebar.php'); ?>

			</div>

			<div class="col-10 no-padding">

				<div id="content">

					<div id="content-header">

						<div id="breadcrumb">

							<a href="index.php" class="tip-bottom" data-original-title="Go to Home"><i class="fa fa-home"></i> Home</a>

							<a href="<?php echo base_url(); ?>d" class="current">Profile</a>

						</div>

					</div>

					<div class="container-fluid">

						<div class="content-box no-border-radius">

							<div class="profile-preview profile-container">
								<!-- chat -->

								<div ng-app="myApp1" ng-controller="myCtrt1" class="container">
									<div class="chat_container">
										<div class="row">
											<div class="col-sm-3 chat_sidebar">
												<div class="row">

													<div class="dropdown all_conversation">
														<div class="addon">
															<i class="fas fa-sort-down"></i>
														</div>
														<select  ng-change="personFilter()" ng-model="filterValue"  class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<option value="">Select chat</option>
															<option  value="1">All Conversation</option>
															<option value="2">Active Contract</option>
															<option value="3">Ended Contract</option>
															<option value="4">Follow up</option>

														</select>

													</div>

													<div class="member_list">
														<ul class="list-unstyled">

															<li ng-class="{ 'active' : key == selectedContact }" ng-if="x.cid != userId"  ng-click="selectchat(key,x.cid,'all',x.friendId)" ng-if="person.length != 0" ng-repeat="(key,x) in person" ng-init="person = key" class="left clearfix">
																<span class="chat-img pull-left">
																	 <img  src="<?php echo base_url(); ?>assets/client_images/{{ x.clogo }}"  class="img-circle">
																<!-- <img ng-if="x.cid != userId" src="<?php echo base_url(); ?>assets/client_images/{{ {{ x.clogo }} }}" alt="User Avatar" class="img-circle"> -->
																</span>
																<div class="chat-body clearfix">
																	<div class="header_sec">
																		<strong ng-if="x.fid != userId" class="primary-font">{{ x.fname }} <span ng-if="x.fonline == 1" class="odot"></span><span class="fdot" ng-if="x.fonline == 0"></span></strong>
																		<strong ng-if="x.cid != userId" class="primary-font">{{ x.cname }} <span ng-if="x.conline == 1" class="odot"></span><span class="fdot" ng-if="x.conline == 0"></span> </strong>
																		<p ng-if="x.jobtitle != ''">{{ x.jobtitle }} </p>
																	</div>
																</div>
															</li>

															<li ng-class="{ 'active' : x.fid == selectedContactid }" ng-if="x.fid != userId"  ng-click="selectchat(key,x.fid,'all',x.friendId)" ng-if="person.length != 0" ng-repeat="(key,x) in person" ng-init="person = key" class="left clearfix ">
																<span class="chat-img pull-left">
																	 <img ng-if="x.fid != userId" src="<?php echo base_url(); ?>assets/client_images/{{ x.flogo }}" alt="User Avatar" class="img-circle">
																	<!-- <img ng-if="x.fid != userId" src="<?php echo base_url(); ?>assets/client_images/{{ x.clogo }}" alt="User Avatar" class="img-circle"> -->

																</span>
																<div class="chat-body clearfix">
																	<div class="header_sec">
																		<strong ng-if="x.fid != userId" class="primary-font">{{ x.fname }} <span ng-if="x.fonline == 1" class="odot"></span><span class="fdot" ng-if="x.fonline == 0"></span></strong>
																		<strong ng-if="x.cid != userId" class="primary-font">{{ x.cname }} <span ng-if="x.conline == 1" class="odot"></span><span class="fdot" ng-if="x.conline == 0"></span></strong>
																		<p ng-if="x.jobtitle != ''">{{ x.jobtitle }} </p>
																	</div>
																</div>
															</li>


														</ul>
													</div></div>
												</div>
												<!--chat_sidebar-->


												<div class="col-sm-9 message_section">
													<div class="row" ng-if="person.length != 0">
														<div class="new_message_head">
															<div ng-if="jobtitle != ''" class="jobtitle">{{ jobtitle }}</div>
															<div>
																<a ng-if="contractId" target="_blank" href="<?php echo base_url(); ?>freelancer/contract/{{ contractId }}">View Contract</a>
																<a ng-if="offerId && milestone == 0" data-toggle="modal" data-target="#milestone" >Create Milestone</a>

																<!-- milestone -->
																<!-- milestone -->
																<div id="milestone" class="modal fade" role="dialog">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal">&times;</button>
																				<h4 class="modal-title">Milestones</h4>
																			</div>
																			<div class="modal-body">

																			<!-- {{ milestone }} -->
																			<div ng-if="milestones.length != 0" class="row">
																			 <div class="col-md-12" style="margin: 10px 0">
																				 <a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="far fa-plus-square"></i></a>
																			 </div>
																				 <br>
																		 </div>

																 <div  class="milestone-main" ng-repeat="(key,x) in milestones" >
																	 <a ng-if="key != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletemilestone(key)" class="fas fa-trash-alt"></i></a>

																	 <div class="row">
																			<div class="col-sm-6">
																		<div class="form-group">
																			<label>Milestone Title<span class="red-text">*</span></label>
																			<input type="text"  id="amount"  ng-value="x.title" ng-model="x.title" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
																			<p ng-show="submitpro && x.title == ''" class="text-danger ng-hide">Milestone Title is required.</p>

																		</div>
																	</div>
																	 <div class="col-sm-6">
																		<div class="form-group">
																			<label>Milestone Amount</label>
																			<input type="text" readonly="" ng-value="x.price" ng-model="x.price" id="amount" numbers-only="numbers-only" placeholder="Please enter budget" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
																		</div>
																	</div>
																	</div>
																	<!-- =====task -->
																	<div class="row" ng-repeat="(key2,x2) in x.task" >
																<div class="col-sm-6">
															<div class="form-group">
																<label>Task<span class="red-text">*</span></label>
																<input type="text"  id="amount"  ng-value="x2.task" ng-model="x2.task" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
																<p ng-show="submitpro && x2.task == ''" class="text-danger ng-hide">Task is required.</p>

															</div>
														</div>
														 <div class="col-sm-6">
															<div class="form-group">
																<label>Hours <span class="red-text">*</span></label>
																<input type="text" ng-keyup="totalmilestone()"  ng-value="x2.hours" ng-model="x2.hours" id="amount" numbers-only="numbers-only" placeholder="Please enter hours" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
																<p ng-show="submitpro && x2.amount == ''" class="text-danger ng-hide">Hours is required.</p>

															</div>
																 </div>
															 <div class="col-sm-6">
	  															<div class="form-group">
	  																<label>Hourly price <span class="red-text">*</span></label>
	  																<input type="text" ng-keyup="totalmilestone()"  ng-value="x2.hourlyPrice" ng-model="x2.hourlyPrice" id="amount" numbers-only="numbers-only" placeholder="Please enter hourly price" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" >
	  																<p ng-show="submitpro && x2.hourlyprice == ''" class="text-danger ng-hide">Hourly price is required.</p>

	  														</div>
	  													</div>
																 <div class="col-sm-12">
																 <a ng-if="key2 != 0" hand id="plusicon" class="pull-right">  <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a>
																 </div>
														</div>
														<div class="col-sm-12">
															<a hand id="plusicon">Sub Tasks  <i ng-click="taskadd(key)" class="far fa-plus-square"></i> </a>
														</div>
											 </div>
																	<!-- task -->
																	<div class="row">
														<div class="col-sm-12">
																<div class="form-group">
																	<label>Total Amount<span class="red-text">*</span></label>
																	<input type="text" readonly  id="amount"  ng-value="proposalBid" ng-model="offerTotal"  name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" value="">
																		</div>
																	</div>
																</div>
																	<!-- total -->
																	<div class="row">
														      <div class="col-sm-12">
																<div class="form-group">
																	<label>Message<span class="red-text">*</span></label>
																	<textarea type="text" ng-model="proposal"   id="proposal"  ng-value="proposal"  name="proposal" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" ></textarea>
																	<p ng-show="submitpro && proposal == ''" class="text-danger ng-hide">Message is required.</p>

																		</div>
																	</div>
																</div>
																	<!-- total -->
																			</div>
																			<div class="modal-footer">
																				<button type="button" ng-click="submitproposal()" class="btn btn-success">Submit</button>
																			</div>
																		</div>

																	</div>
																</div>
																<!-- ====offer -->
																<!-- milestone -->

															</div>
															<!-- <div class="pull-left"><button><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Message</button></div> -->

														</div><!--new_message_head-->

														<div class="chat_area" scroll-glue-bottom="glued" schroll-bottom="messages" id="bottom">
															<ul  class="list-unstyled" schroll-bottom="messages">
																<li ng-if="messages.length != 0" ng-repeat="(key,x) in messages" ng-init="messages = key" ng-class="{ 'admin_chat' : userId == x.senderId }"  class="left clearfix admin_chat">

																	<div class="chat-body1 clearfix">
																		<span ng-class="{ 'pull-right' : userId == x.senderId ,'pull-left receive-img' : userId != x.senderId }" class="chat-img1 pull-right">
																			<img ng-show="userId == x.senderId " src="<?php echo base_url(); ?>assets/client_images/{{ x.senderlogo }}"  class="img-circle">
																			<img ng-show="userId != x.senderId " src="<?php echo base_url(); ?>assets/client_images/{{ x.senderlogo }}"  class="img-circle">


																		</span>

																		<div ng-class="{ 'pull-right sender-right' : userId == x.senderId ,'pull-left sender-left' : userId != x.senderId }" >
																			<span class="senderName" ng-show="userId == x.senderId ">{{ x.senderName }}</span>
																			<span class="senderName" ng-show="userId != x.senderId ">{{ x.senderName }}</span></div>
																			<br/>
																			<br/>

																			<p ng-if="x.deleted == 0" class="editmsg{{ x.id }}"   ><span class="msg{{ x.id}}" ng-bind-html="x.message|trustAsHtml"></span>

																				<!-- <a ng-if="x.offer != '0'  && userType == '4'" href="<?php echo base_url(); ?>client-job-detail/{{ x.offer }}" >View detail</a> -->
	                                      <a ng-if="x.offer != '0'" href="<?php echo base_url(); ?>freelancer/job/{{ x.offer }}" >View detail</a>
																				 <br/>
																				<span  ng-if="x.attachment && x.attachment != ''" class="attachement">
																					<a   target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment/{{ x.attachment }}">
																						{{ x.attachment }}</a></span>
																					</p>



																					<p ng-if="x.edited == 1">Message has been edited</p>
																					<p ng-if="x.deleted == 1">Message has been Deleted</p>
																					<button ng-click="messageUpdate(key,'update',x.id)" ng-if="editmsgId == x.id && edit == 1">Save</button>
																					<button ng-click="messageUpdate(key,'cancel',x.id)" ng-if="editmsgId == x.id && edit == 1">Cancel</button>

																					<div  ng-if="userId == x.senderId && x.deleted != 1" class="dropdown drop-sec">
																						<button class="btn btn-primary" type="button" data-toggle="dropdown"><i class="fas fa-cog"></i>
																						</button>
																						<ul class="dropdown-menu">
																							<li><a  ng-click="messageEdit(key,x.id )">Edit</a></li>
																							<li><a ng-click="messageDelete(key,x.id)">Remove</a></li>
																						</ul>
																					</div>

																					<div ng-class="{ 'pull-left' : userId == x.senderId ,'pull-right' : userId != x.senderId }" class="chat_time">{{ x.date | time }}</div>
																				</div>

																			</li>
																			<div class="btnaccept" ng-show="messages[0]['receiverId'] == userId && person[selectedContact]['status'] == 0 ">
																				<a ng-click="request(selectedContact,1)" class="btn btn-success">Accept</a>
																				<a ng-click="request(selectedContact,2)" class="btn btn-primary">Reject</a>
																			</div>
																		</ul>
																	</div><!--chat_area-->


																	<div ng-show="messages[0]['receiverId'] != userId || person[selectedContact]['status'] == 1 "   class="message_write">
																		<textarea ng-model="msg" ng-show="person[selectedContact]['fid'] != userId" ng-enter="sendmessage(person[selectedContact]['fid'],person[selectedContact]['friendId'])"  name="msgtext" class="msgtext form-control cli" placeholder="type a message"></textarea>
																		<textarea ng-model="msg" ng-show="person[selectedContact]['cid'] != userId" ng-enter="sendmessage(person[selectedContact]['cid'],person[selectedContact]['friendId'])"  name="msgtext" class="msgtext form-control fr" placeholder="type a message"></textarea>
																		<div class="clearfix"></div>
																		<div class="chat_bottom">
																			<!-- <a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
																			Add Files</a> -->
																			<i ng-if="attachment == ''" class="fas fa-paperclip"><input onchange="angular.element(this).scope().chatAttachment(this)" type="file"  name="attchment"></i>
																			<p ng-if="attachment != ''">{{ attachment }} &nbsp; <span ng-if="attachment != ''" ng-click="deleteAttachment()">&times;</span> </p>
																			<p ng-if="attch"> Uploading... </p>
																			<!-- <button  ng-show="person[selectedContact]['fid'] != userId" ng-click="sendmessage(person[selectedContact]['fid'],person[selectedContact]['friendId'])" scroll-bottom="bottom" class="pull-right btn btn-success msgfree" ng-disabled="person[selectedContact]['status'] == 0  || person[selectedContact]['status'] == 2 ">
																				Send</button> -->
																			<button  ng-show="person[selectedContact]['cid'] != userId" ng-click="sendmessage(person[selectedContact]['cid'],person[selectedContact]['friendId'])" scroll-bottom="bottom" class="pull-right btn btn-success msg" ng-disabled="person[selectedContact]['status'] == 0  || person[selectedContact]['status'] == 2 ">
																					Send</button>
																				</div>
																			</div>



																		</div>
																		<!-- no chat -->
																		<div class="nochat" ng-if="person.length == 0">No chat Yet</div>
																		<!-- no chat yet -->
																	</div> <!--message_section-->
																</div>
															</div>
														</div>


														<!-- chat -->


													</div>

												</div>

											</div>

										</div>

									</div>

								</div>

							</div>

						</section>




						<!-- style -->
