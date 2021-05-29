<?php require('sidebar.php'); ?>

<!--main-container-part-->
<div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
            <li class="active">Support Chat</li>
        </ol>
    </section>

    <section class="content chat-support">
                    <!-- chat -->
                    <div ng-cloak ng-app="myApp22" ng-controller="myCtrt22" id="chatcontroller" class="">

                            <!--********************** person chat messages ******************-->
                            <div class="message_section bg-white p-3">
                                <!--new_message_head-->

                                <div class="chat_area" scroll-glue-bottom="glued" onscroll="myFunction()" id="bottom">
                                    <ul offset="100" ng-class="{active : scrollClass}" id="messagemain" class="list-unstyled" schroll-bottom="messages">

                                        <!-- {{ roomId }}
{{ messages[roomId] }} -->
                                        <li ng-class="{ 'adminchatff' : userId == x.MSG_SENTBY ,'adminchatc' : userId != x.MSG_SENTBY }" ng-repeat="(key,x) in messages[roomId]" class="left clearfix admin_chat">

                                            <div class="chat-body1 clearfix">


                                                <div ng-class="{ 'chat-sec' : userId == x.MSG_SENTBY ,'chat-sec-left' : userId != x.MSG_SENTBY }">
                                                    <!--                                                                                chat-sec-->
                                                    <p ng-show="x.MSG_DELETE == 0"><span class="editmsg{{ x._id }} msg{{ x._id}}" ng-bind-html="x.MSG_TEXT|trustAsHtml"></span></p>
                                                </div>
                                                <div ng-class="{ 'chat-right-sec' : userId == x.MSG_SENTBY ,'chat-left-sec' : userId != x.MSG_SENTBY }" class="">
                                                    <span ng-class="{ 'pull-right' : userId == x.MSG_SENTBY ,'pull-left receive-img' : userId != x.MSG_SENTBY }" class="chat-img1 pull-right">
                                                        <img ng-show="userId == x.MSG_SENTBY " src="<?php echo base_url(); ?>assets/client_images/{{ x.MSG_SENTBYIMAGE }}" class="img-circle">
                                                        <img ng-show="userId != x.MSG_SENTBY " src="<?php echo base_url(); ?>assets/client_images/noimage.jpg" class="img-circle">


                                                    </span>

                                                    <div ng-class="{ 'pull-right sender-right' : userId == x.MSG_SENTBY ,'pull-left sender-left' : userId != x.MSG_SENTBY }">
                                                        <span class="senderName" ng-show="userId == x.MSG_SENTBY ">{{ x.MSG_SENTBYNAME }}</span>
                                                        <span class="senderName" ng-show="userId != x.MSG_SENTBY ">{{ x.MSG_SENTBYNAME }}</span>
                                                        <div ng-class="{ 'timepull-right' : userId == x.senderId ,'timepull-left' : userId != x.senderId }" class="chat_time">{{ x.createdAt | date }}-{{ x.createdAt | time}}</div>
                                                    </div>
                                                </div>

                                                <p>
                                                    <span ng-if="x.MSG_ATTACHMENT && x.MSG_ATTACHMENT != '' && x.MSG_DELETE == 0" class="attachement">
                                                        <a target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment/{{ x.MSG_ATTACHMENT }}"></a>
                                                        <a target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment/{{ x.MSG_ATTACHMENT }}">
                                                            {{ x.MSG_ATTACHMENT }}</a></span>
                                                </p>



                                                <p ng-if="x.MSG_EDIT == 1 && x.MSG_DELETE == 0">Message has been edited</p>
                                                <p ng-if="x.MSG_DELETE == 1">Message has been deleted</p>
                                                <div class="chat-btn-section">
                                                    <button class="btn savebtn" ng-click="messageUpdate('update',x._id)" ng-if="editmsgId == x._id && edit == 1">Save</button>
                                                    <button class="btn cancelbtn" ng-click="messageUpdate('cancel',x._id)" ng-if="editmsgId == x._id && edit == 1">Cancel</button>
                                                </div>
                                                <div ng-if="userId == x.MSG_SENTBY && x.MSG_DELETE == 0 && 1 >= dateDifference(x.createdAt)" class="dropdown drop-sec">
                                                    <button class="btn btn-primary" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a ng-click="messageEdit(key,x._id)">Edit</a></li>
                                                        <li><a ng-click="messageDelete(key,x._id)">Remove</a></li>
                                                    </ul>
                                                </div>


                                            </div>

                                        </li>

                                    </ul>
                                </div>

                                <div class="typing" ng-cloak ng-show="t == 1">{{ typinguser }} is typing.....</div>

                                <div class="message_write">
                                    <h4>Customer Support</h4>
                                <div class="form-group">
                                    <textarea ng-keyup="updateTyping()" ng-enter="sendmessage()" name="msgtext" class="msgtext form-control" placeholder="type a message"></textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="chat_bottom row">
                                        <div class="col-md-8">
                                        <div class="form-group">
                                        <input onchange="angular.element(this).scope().chatAttachment(this)" type="file" name="attchment" class="form-control">
                                        <p ng-if="attachment != ''">{{ attachment }} &nbsp; <span ng-if="attachment != ''" ng-click="deleteAttachment()">&times;</span> </p>
                                        <p ng-if="attch"> Uploading... </p>
                                        <!-- ng-disabled="person[selectedContact]['status'] == 0  || person[selectedContact]['status'] == 2 " -->
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <button ng-click="sendmessage()" scroll-bottom="bottom" class="pull-right btn btn-success">
                                            Send</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- no chat -->
                                <div class="nochat" ng-if="person.length == 0">No chat Yet</div>
                                <!-- no chat -->
                            </div>

                    </div>
                    <!-- chat -->



    </section>
</div>
