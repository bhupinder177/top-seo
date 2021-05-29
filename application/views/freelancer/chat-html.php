<!--main-container-part-->
<?php require('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url(); ?>freelancer/dashboard"><i class="fa fa-dashboard"></i> Home</a> > </li>
         <li class="active">Chat</li>
      </ol>
   </section>
   <section class="content portfolio-cont">
      <div class="box bg-white">
         <div id="content">
            <div class="content-box no-border-radius">
               <div class="profile-preview profile-container chat-cstm">
                  <!-- chat -->
                  <div  id="chatcontroller" class="">
                     <input type="hidden" name="sessionId" value="<?php echo $this->session->userdata['clientloggedin']['id']; ?>" class="sessionId">
                     <!-- chat -->
                     <div  class="chat_container">
                        <div class="group-chat">
                           <div class="">
                              <div class="row chat_free">
								  <div class="col-md-6"></div>
								  <div class="col-md-6 text-right"><a href="javascript:void;" class="btn btn-primary bg-orange my-3"  data-toggle="modal" data-target="#chat-select">New Group</a></div>
                                 <div class="member_list col-lg-4 mt-4">
                                    <!-- Group  -->
                                    <ul  class="list-unstyled">
                                       <li   class=" active left clearfix" >
                                          <div class="chat-body clearfix">
											  <div class="img-group">
												  <span>F G</span>
											  </div>
                                             <div class="header_sec">
                                                <strong class="primary-font">First group</strong>
													  <a class="btn btn-user" href="#"> <i class="fa fa-user-plus"></i></a>
												  <div  class="dropdown drop-sec pull-right">
                                                      <button class="btn bg-yellow btn-primary" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                                      </button>
                                                      <ul class="dropdown-menu">
                                                         <li><a ng-click="messageEdit(key,x._id)">Edit</a></li>
                                                         <li><a ng-click="messageDelete(key,x._id)">Remove</a></li>
                                                      </ul>
                                                   </div>
                                             </div>
                                          </div>
                                       </li>
                                       <li   class="left clearfix" >
                                          <div class="chat-body clearfix">
                                              <div class="img-group">
												  <span>S G</span>
											  </div>
                                             <div class="header_sec">
                                                <strong class="primary-font">Second group</strong>
													  <a class="btn btn-user" href="#"> <i class="fa fa-user-plus"></i></a>
												  <div  class="dropdown drop-sec pull-right">
                                                      <button class="btn bg-yellow btn-primary" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                                      </button>
                                                      <ul class="dropdown-menu">
                                                         <li><a ng-click="messageEdit(key,x._id)">Edit</a></li>
                                                         <li><a ng-click="messageDelete(key,x._id)">Remove</a></li>
                                                      </ul>
                                                   </div>
                                             </div>
                                          </div>
                                       </li>
                                    </ul>
                                    <!-- Group -->
                                 </div>
                                 <!--chat_sidebar-->
                                 <!-- **************************chat person *******************************-->
                                 <div  class="col-sm-12 col-lg-8">
                                    <div class="row" >
                                       <!--new_message_head-->
                                       <div scroll-glue-bottom="glued" schroll-bottom="messages" class="chat_area" onscroll="myFunction()" id="bottom">
                                          <ul offset="100" ng-class="{active : scrollClass}" id="messagemain" class="list-unstyled" schroll-bottom="messages">
<!--
                                             <li  class="left clearfix admin_chat chat-sec"  >
                                                <div class="chat-body1 clearfix">
                                                   <div class="chat-sec">
                                                                                                                                      chat-sec
                                                      <p ng-show="x.MSG_DELETE == 0"><span class="editmsg" ng-bind-html="x.MSG_TEXT|trustAsHtml"></span></p>
                                                   </div>
                                                   <div class="chat-right-sec" >
                                                      <div class="pull-right sender-right">
                                                         <span class="senderName" >dsfsdf</span>
                                                      </div>
													   <span  class="attachement">
                                                      <a target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment">
                                                      img.png</a></span>
                                                   </div>
                                                   <div class="chat-btn-section mb-2">
                                                      <button class="btn savebtn bg-blue" ng-click="messageUpdate('update',x._id)" ng-if="editmsgId == x._id && edit == 1">Save</button>
                                                      <button class="btn cancelbtn" ng-click="messageUpdate('cancel',x._id)" ng-if="editmsgId == x._id && edit == 1">Cancel</button>
                                                   </div>
                                                   <div ng-if="userId == x.MSG_SENTBY && x.MSG_DELETE == 0" class="dropdown drop-sec">
                                                      <button class="btn bg-yellow btn-primary" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                                      </button>
                                                      <ul class="dropdown-menu">
                                                         <li><a >Edit</a></li>
                                                         <li><a >Remove</a></li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </li>
-->
                                             <li  class="left clearfix admin_chat chat-sec"  class="chat-sec-left">
                                                <div class="chat-body1 clearfix">
													<div class="pro-img">
														<span class="img-pro"><img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659652_1280.png" class="img-fluid"></span>
														<p class="user-name">Amandeep</p>
													</div>
													<div class="chat-sec-left">
                                                      <p >dsdasd dsadasda da sadasd adadasda d</p>
                                                   </div>
                                                   <div class="chat-left-sec" class="">
                                                      <div class="pull-left sender-left">
                                                         <span class="senderName" >Tester</span>
														   <span  class="attachement">
                                                      <a target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment">
                                                      test.png</a></span>
                                                      </div>
													    <div ng-class="time" class="chat_time pull-right">TUE 8:11PM</div>
                                                   </div>
<!--
                                                   <div class="chat-btn-section mt-2">
                                                      <button class="btn savebtn bg-blue" ng-click="messageUpdate('update',x._id)" ng-if="editmsgId == x._id && edit == 1">Save</button>
                                                      <button class="btn cancelbtn" ng-click="messageUpdate('cancel',x._id)" ng-if="editmsgId == x._id && edit == 1">Cancel</button>
                                                   <div  class="dropdown drop-sec pull-right">
                                                      <button class="btn bg-yellow btn-primary" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                                      </button>
                                                      <ul class="dropdown-menu">
                                                         <li><a ng-click="messageEdit(key,x._id)">Edit</a></li>
                                                         <li><a ng-click="messageDelete(key,x._id)">Remove</a></li>
                                                      </ul>
                                                   </div>
                                                   </div>
-->
                                                </div>
                                             </li>
											  <li class="right clearfix admin_chat chat-sec"  class="chat-sec-left">
                                                <div class="chat-body1 clearfix">
                                                   <div class="pro-img">
														<span class="img-pro"><img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659652_1280.png" class="img-fluid"></span>
														<p class="user-name">Amandeep</p>
													</div>
													<div class="chat-sec-left">
                                                      <p >dsdasd dsadasda da sadasd adadasda d</p>
                                                   </div>
                                                   <div class="chat-left-sec" class="">
                                                      <div class="pull-left sender-left">
                                                         <span class="senderName" >Tester</span>
														   <span  class="attachement">
                                                      <a target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment">
                                                      test.png</a></span>
                                                      </div>
													    <div ng-class="time" class="chat_time pull-right">TUE 8:11PM</div>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                       <!--chat_area-->
                                       <div ng-show="messages[0]['receiverId'] != userId || person[selectedContact]['status'] == 1 " class="message_write w-100 px-2 form-group">
                                          <div class="row">
											  <div class="col-md-10">
											  <textarea ng-keyup="updateTyping()" ng-model="msg" ng-show="person[selectedContact]['cid'] != userId" ng-enter="sendmessage(person[selectedContact]['cid'],person[selectedContract]['cname'],person[selectedContact]['friendId'])" name="msgtext" class="msgtext form-control" placeholder="type a message"></textarea>
											  </div>
											  <div class="col-md-2">
												 <button ng-show="person[selectedContact]['cid'] != userId" ng-click="sendmessage(person[selectedContact]['cid'],person[selectedContact]['cname'],person[selectedContact]['friendId'])" scroll-bottom="bottom" class="pull-right btn btn-success msg my-3">Send <i class="fa fa-send-o"></i></button>
											</div>
										   </div>
                                          <div class="clearfix"></div>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="chat_bottom form-group">
                                                   <input onchange="angular.element(this).scope().chatAttachment(this)" type="file" name="attchment" class="form-control">
													<p ng-if="attachment != ''"><span class="attachment">{{ attachment }}</span> <span ng-if="attachment != ''" ng-click="deleteAttachment()">&times;</span> </p>
                                                   <p ng-if="attch"> Uploading... </p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- no chat -->
                                    <div class="nochat" ng-if="person.length == 0 && chattype == 2">No chat Yet</div>
                                    <!-- no chat yet -->
                                 </div>
                              </div>
                              <!-- ******************************chat person end***************** -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- chat -->
         </div>
      </div>
   </section>
</div>



<div class="modal" tabindex="-1" role="dialog" id="chat-select">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	 <div class="create_group form-group mb-0">
			 <input class="form-control" placeholder="Enter group name"/>
		  	<div class="row">
			 	<div class="col-md-6">
					<a href="#" class="mt-2">Add New Member +</a>
				</div>
				<div class="col-md-6">
					<select class="form-control mt-2">
					<option style="background-image:url(https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659652_1280.png);">male</option>
					<option style="background-image:url(https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659652_1280.png);">female</option>
					<option style="background-image:url(https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659652_1280.png);">others</option>
					</select>
				</div>
			 </div>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
