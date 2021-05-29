<!--main-container-part-->
<input type="hidden" name="sessionId" value="<?php echo $this->session->userdata['clientloggedin']['id']; ?>" class="sessionId">

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

<div class="profile-preview profile-container">
<!-- chat -->

<div ng-cloak ng-app="myApp1" ng-controller="myCtrt1" id="chatcontroller" class="">

<!-- messsage -->
<div ng-if="plan.packageChat == 0">
<p>Hi {{ username }},</p>
<p>You have <b>{{ plan.packageName }}</b> Membership Plan. You have 11 messages.
You need to Upgrade your Membership Plan to view all these messages.
<a href="<?php echo base_url(); ?>freelancer/membership">Please Click Here To Upgrade Your Plan.</a> </p>

<p>Good Luck!</p>
</div>
<!-- message -->

        <!-- chat -->
        <div ng-if="plan.packageChat == 1" class="chat_container">
        <div class="group-chat">
        <div class="">
        <ul class="nav nav-pills">
        <li ng-class="{ 'active' : 1 == chattype }" ng-click="chatchange('1')">
        <a>Chat</a>
        </li>
        <li ng-class="{ 'active' : 2 == chattype }" ng-click="chatchange('2')">
        <a>Group chat</a>
        </li>
        </ul>

    <div class="form-group all_conversation px-2">
    <select ng-change="personFilter()" ng-model="filterValue" class="form-control" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <option value="">Select chat</option>
    <option value="1">All Conversation</option>
    <option value="2">Active Contract</option>
    <option value="3">Ended Contract</option>
    <option value="4">Follow up</option>

    </select>

    </div>

            <div class="row chat_free">
<div class="member_list col-lg-4">
<!-- chat peroson -->
<ul ng-if="chattype == 1" class="list-unstyled">
<li ng-class="{ 'active' : key == selectedContact }" ng-if="x.cid != userId" ng-click="selectchat(key,x.cid,'all',x.friendId)" ng-if="person.length != 0" ng-repeat="(key,x) in person" class="left clearfix">
<span class="chat-img pull-left">
<img src="<?php echo base_url(); ?>assets/client_images/{{ x.clogo }}" class="img-circle">
<!-- <img ng-if="x.cid != userId" src="<?php echo base_url(); ?>assets/client_images/{{ {{ x.clogo }} }}" alt="User Avatar" class="img-circle"> -->
</span>
<div class="chat-body clearfix">
<div class="header_sec">
<strong ng-if="x.fid != userId" class="primary-font">{{ x.fname }} <span ng-if="x.fonline == 1" class="odot"></span><span class="fdot" ng-if="x.fonline == 0"></span></strong>
<strong ng-if="x.cid != userId" class="primary-font">{{ x.cname }} <span ng-if="x.conline == 1" class="odot"></span><span class="fdot" ng-if="x.conline == 0"></span> </strong>
<p ng-if="x.jobtitle != ''">{{ x.jobtitle }} </p>
<p ng-if="x.unread.length != 0">({{ x.unread.length }})</p>

</div>
</div>
</li>
</ul>
<!-- chat peroson -->


<!-- Group Chat -->
<ul ng-if="chattype == 2" class="list-unstyled">

<li ng-click="selectgroup(x._id)" ng-class="{ 'active' : x._id == roomId }" class="left clearfix" ng-repeat="(key,x) in group">
<!-- <span class="chat-img pull-left">
<img src="<?php echo base_url(); ?>assets/client_images/" class="img-circle">
</span> -->
<div class="chat-body clearfix">
<div class="header_sec">
<strong class="primary-font">{{ x.Name }}</strong>
</div>
</div>
</li>
</ul>
<!-- Group chat -->
</div>


<!--chat_sidebar-->

<!-- **************************chat person *******************************-->
<div ng-if="chattype == 1" class="col-sm-12 col-lg-8">
<div class="row" ng-if="person.length != 0">
<div class="new_message_head">
<div ng-if="jobtitle != ''" class="jobtitle">{{ jobtitle }}</div>
<div>
<a ng-if="contractId" target="_blank" href="<?php echo base_url(); ?>freelancer/contract/{{ contractId }}">View Contract</a>
<a ng-if="offerId && milestone == 0" data-toggle="modal" data-target="#milestone">Create Milestone</a>

<!-- milestone -->
<div id="milestone" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Milestones</h4>
</div>
<div class="modal-body">

<div ng-if="milestones.length != 0" class="row">
<div class="col-md-12" style="margin: 10px 0">
<a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="fa fa-plus-square"></i></a>
</div>
</div>

<div class="milestone-main" ng-repeat="(key,x) in milestones">
<a ng-if="key != 0" hand id="plusicon" class="pull-right"> <i ng-click="deletemilestone(key)" class="fas fa-trash-alt"></i></a>

<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Milestone Title<span class="red-text">*</span></label>
<input type="text" id="amount" ng-value="x.title" ng-model="x.title" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
<p ng-show="submitpro && x.title == ''" class="text-danger ng-hide">Milestone Title is required.</p>

</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Milestone Amount</label>
<input type="text" readonly="" ng-value="x.price" ng-model="x.price" id="amount" numbers-only="numbers-only" placeholder="Please enter budget" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
</div>
</div>
</div>
<!-- =====task -->
<div class="row" ng-repeat="(key2,x2) in x.task">
<div class="col-sm-6">
<div class="form-group">
<label>Task<span class="red-text">*</span></label>
<input type="text" id="amount" ng-value="x2.task" ng-model="x2.task" placeholder="Please enter milestone title" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
<p ng-show="submitpro && x2.task == ''" class="text-danger ng-hide">Task is required.</p>

</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Hours <span class="red-text">*</span></label>
<input type="text" ng-keyup="totalmilestone()" ng-value="x2.hours" ng-model="x2.hours" id="amount" numbers-only="numbers-only" placeholder="Please enter hours" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
<p ng-show="submitpro && x2.amount == ''" class="text-danger ng-hide">Hours is required.</p>

</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Hourly price <span class="red-text">*</span></label>
<input type="text" ng-keyup="totalmilestone()" ng-value="x2.hourlyPrice" ng-model="x2.hourlyPrice" id="amount" numbers-only="numbers-only" placeholder="Please enter hourly price" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty">
<p ng-show="submitpro && x2.hourlyprice == ''" class="text-danger ng-hide">Hourly price is required.</p>

</div>
</div>
<div class="col-sm-12">
<a ng-if="key2 != 0" hand id="plusicon" class="pull-right"> <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a>
</div>
</div>
<div class="col-sm-12">
<a hand id="plusicon">Sub Tasks <i ng-click="taskadd(key)" class="fa fa-plus-square"></i> </a>
</div>
</div>
<!-- task -->
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>Total Amount<span class="red-text">*</span></label>
<input type="text" readonly id="amount" ng-value="proposalBid" ng-model="offerTotal" name="budget" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty" value="">
</div>
</div>
</div>
<!-- total -->
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>Message<span class="red-text">*</span></label>
<textarea type="text" ng-model="proposal" id="proposal" ng-value="proposal" name="proposal" class="form-control amount required ng-pristine ng-untouched ng-valid ng-empty"></textarea>
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
</div>
</div>
<!--new_message_head-->

<div scroll-glue-bottom="glued" schroll-bottom="messages" class="chat_area" onscroll="myFunction()" id="bottom">
<ul offset="100" ng-class="{active : scrollClass}" id="messagemain" class="list-unstyled" schroll-bottom="messages">
<li ng-repeat="(key,x) in messages[roomId]" class="left clearfix admin_chat"  ng-class="{ 'chat-sec' : userId == x.MSG_SENTBY ,' chat-sec-left' : userId != x.MSG_SENTBY }">

<div class="chat-body1 clearfix">

<div ng-class="{ 'chat-sec' : userId == x.MSG_SENTBY ,'chat-sec-left' : userId != x.MSG_SENTBY }">
<!--                                                                                chat-sec-->
<p ng-show="x.MSG_DELETE == 0"><span class="editmsg{{ x._id }} msg{{ x._id}}" ng-bind-html="x.MSG_TEXT|trustAsHtml"></span></p>
</div>
<div ng-class="{ 'chat-right-sec' : userId == x.MSG_SENTBY ,'chat-left-sec' : userId != x.MSG_SENTBY }" class="">
<span ng-class="{ 'pull-right' : userId == x.MSG_SENTBY ,'pull-left receive-img' : userId != x.MSG_SENTBY }" class="chat-img1 pull-right">
<img ng-show="userId == x.MSG_SENTBY " src="<?php echo base_url(); ?>assets/client_images/{{ x.MSG_SENTBYIMAGE }}" class="img-circle">
<img ng-show="userId != x.MSG_SENTBY " src="<?php echo base_url(); ?>assets/client_images/{{ x.MSG_SENTBYIMAGE }}" class="img-circle">
</span>

<div ng-class="{ 'pull-right sender-right' : userId == x.MSG_SENTBY ,'pull-left sender-left' : userId != x.MSG_SENTBY }">
<span class="senderName" ng-show="userId == x.MSG_SENTBY ">{{ x.MSG_SENTBYNAME }}</span>
<span class="senderName" ng-show="userId != x.MSG_SENTBY ">{{ x.MSG_SENTBYNAME }}</span>
<div ng-class="{ 'timepull-right' : userId == x.senderId ,'timepull-left' : userId != x.senderId }" class="chat_time">{{ x.createdAt | date }}-{{ x.createdAt | time }}</div>
</div>

</div>

<p>
<span ng-if="x.MSG_ATTACHMENT && x.MSG_ATTACHMENT != '' && x.MSG_DELETE == 0" class="attachement">
<a target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment/{{ x.MSG_ATTACHMENT }}">
{{ x.MSG_ATTACHMENT }}</a></span>
</p>
<p ng-if="x.MSG_EDIT == 1 && x.MSG_DELETE == 0">Message has been edited</p>
<p ng-if="x.MSG_DELETE == 1">Message has been deleted</p>
<div class="chat-btn-section mb-2">
<button class="btn savebtn bg-blue" ng-click="messageUpdate('update',x._id)" ng-if="editmsgId == x._id && edit == 1">Save</button>
<button class="btn cancelbtn" ng-click="messageUpdate('cancel',x._id)" ng-if="editmsgId == x._id && edit == 1">Cancel</button>
</div>
<div ng-if="userId == x.MSG_SENTBY && x.MSG_DELETE == 0" class="dropdown drop-sec">
<button class="btn btn-primary" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i>
</button>
<ul class="dropdown-menu">
<li><a ng-click="messageEdit(key,x._id)">Edit</a></li>
<li><a ng-click="messageDelete(key,x._id)">Remove</a></li>
</ul>
</div>
</div>
</li>
<div class="btnaccept" ng-show="messages[0]['receiverId'] == userId && person[selectedContact]['status'] == 0 ">
<a ng-click="request(selectedContact,1)" class="btn btn-success">Accept</a>
<a ng-click="request(selectedContact,2)" class="btn btn-primary">Reject</a>
</div>
</ul>
</div>
<!--chat_area-->
<div class="typing" ng-cloak ng-show="t == 1">{{ typinguser }} is typing....</div>



<div ng-show="messages[0]['receiverId'] != userId || person[selectedContact]['status'] == 1 " class="message_write w-100 px-2 form-group">
<textarea ng-keyup="updateTyping()" ng-model="msg" ng-show="person[selectedContact]['cid'] != userId" ng-enter="sendmessage(person[selectedContact]['cid'],person[selectedContract]['cname'],person[selectedContact]['friendId'])" name="msgtext" class="msgtext form-control" placeholder="type a message"></textarea>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-8">
<div class="chat_bottom form-group">
<input onchange="angular.element(this).scope().chatAttachment(this)" type="file" name="attchment" class="form-control">
<p ng-if="attachment != ''">{{ attachment }} &nbsp; <span ng-if="attachment != ''" ng-click="deleteAttachment()">&times;</span> </p>
<p ng-if="attch"> Uploading... </p>
</div>
</div>
    <div class="col-md-4">
<button ng-show="person[selectedContact]['cid'] != userId" ng-click="sendmessage(person[selectedContact]['cid'],person[selectedContact]['cname'],person[selectedContact]['friendId'])" scroll-bottom="bottom" class="pull-right btn btn-success msg my-3">Send</button>
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


<!-- **********************Group chat***************************** -->

<div ng-if="chattype == 2" class="col-sm-12">
<div ng-if="person.length != 0">
<div class="new_message_head">
    <div class="row">
<div class="col-md-6"><a data-toggle="modal" data-target="#group" class="btn btn-link bg-orange" href="Javascript:Void(0);">New Group</a> <a data-toggle="modal" data-target="#addmember" href="Javascript:Void(0);" class="btn bg-blue">Add Member</a></div>
    <div class="col-md-6"></div>
    </div>
<!-- <div></div> -->

<!-- create group modal -->
<div id="group" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Create New Group</h4>
</div>
<div class="modal-body">
<div class="form-group">
<input type="text" placeholder="Enter group name" ng-modal="groupname" ng-value="groupname" id="groupname" class="form-control group">
<p ng-show="gSubmit && groupname == ''" class="text-danger ng-hide">Group name is required.</p>

</div>
</div>
<div class="modal-footer">
<input type="button" ng-click="submitgroup()" class="btn btn-success" value="Submit">
</div>
</div>

</div>
</div>
<!-- create group modal -->
<!-- ***********Add member*********  -->
<div id="addmember" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add member</h4>
</div>
<div class="modal-body">
<!-- display selected member -->
<div>
<div ng-if="selectmember.length != 0" class="member-main" ng-repeat="(key,x) in selectmember">
<div class="member">
<span class="chat-img">
<img height="100" width="100" src="<?php echo base_url(); ?>assets/client_images/{{ x.image }}" class="img-circle">
</span>
{{ x.name }}
<span ng-click="memberRemove(key)"><i class="fa fa-window-close" aria-hidden="true"></i></span>
</div>
</div>
</div>
<!-- display selected member -->
<p>Suggested</p>
<div class="member-main" ng-repeat="(key,x) in person" ng-click="memberAddGroup(key)">
<div class="member">
<span class="chat-img">
<img height="100" width="100" src="<?php echo base_url(); ?>assets/client_images/{{ x.clogo }}" class="img-circle">
</span>
{{ x.cname }}
<span ng-if="x.select == 1"><i class="fa fa-check" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="modal-footer">
<input type="button" ng-click="submitmember()" class="btn btn-success" value="Submit">
</div>
</div>

</div>
</div>
<!-- **********Add member **********-->

</div>
<!--new_message_head-->

    <div class="chat-free mt-3">
<div scroll-glue-bottom="glued" schroll-bottom="messages" class="chat_area" id="groupbottom">
<ul offset="100" ng-class="{active : scrollClass}" id="messagemain" class="list-unstyled" schroll-bottom="messages">


<li ng-repeat="(key,x) in messages[roomId]" class="left clearfix admin_chat">

<div class="chat-body1 clearfix">


<div ng-class="{ 'chat-sec' : userId == x.MSG_SENTBY ,'chat-sec-left' : userId != x.MSG_SENTBY }">
<!--                                                                                chat-sec-->
<p ng-show="x.MSG_DELETE == 0"><span class="editmsg{{ x._id }} msg{{ x._id}}" ng-bind-html="x.MSG_TEXT|trustAsHtml"></span></p>
</div>
<div ng-class="{ 'chat-right-sec' : userId == x.MSG_SENTBY ,'chat-left-sec' : userId != x.MSG_SENTBY }" class="">
<span ng-class="{ 'pull-right' : userId == x.MSG_SENTBY ,'pull-left receive-img' : userId != x.MSG_SENTBY }" class="chat-img1 pull-right">
<img ng-show="userId == x.MSG_SENTBY " src="<?php echo base_url(); ?>assets/client_images/{{ x.MSG_SENTBYIMAGE }}" class="img-circle">
<img ng-show="userId != x.MSG_SENTBY " src="<?php echo base_url(); ?>assets/client_images/{{ x.MSG_SENTBYIMAGE }}" class="img-circle">
</span>

<div ng-class="{ 'pull-right sender-right' : userId == x.MSG_SENTBY ,'pull-left sender-left' : userId != x.MSG_SENTBY }">
<span class="senderName" ng-show="userId == x.MSG_SENTBY ">{{ x.MSG_SENTBYNAME }}</span>
<span class="senderName" ng-show="userId != x.MSG_SENTBY ">{{ x.MSG_SENTBYNAME }}</span>
<div ng-class="{ 'timepull-right' : userId == x.senderId ,'timepull-left' : userId != x.senderId }" class="chat_time">{{ x.createdAt }}-{{ x.createdAt | time }}</div>
</div>

</div>

<p>
<span ng-if="x.MSG_ATTACHMENT && x.MSG_ATTACHMENT != ''" class="attachement">
<a target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment/{{ x.MSG_ATTACHMENT }}">
{{ x.MSG_ATTACHMENT }}</a></span>
</p>



<p ng-if="x.MSG_EDIT == 1 && x.MSG_DELETE == 0">Message has been edited</p>
<p ng-if="x.MSG_DELETE == 1">Message has been deleted</p>
<div class="chat-btn-section mb-2">
<button class="btn savebtn bg-blue" ng-click="messageUpdate('update',x._id)" ng-if="editmsgId == x._id && edit == 1">Save</button>
<button class="btn cancelbtn" ng-click="messageUpdate('cancel',x._id)" ng-if="editmsgId == x._id && edit == 1">Cancel</button>
</div>
<div ng-if="userId == x.MSG_SENTBY && x.MSG_DELETE == 0" class="dropdown drop-sec">
<button class="btn btn-primary" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i>
</button>
<ul class="dropdown-menu">
<li><a ng-click="messageEdit(key,x._id)">Edit</a></li>
<li><a ng-click="messageDelete(key,x._id)">Remove</a></li>
</ul>
</div>


</div>

</li>
<div class="btnaccept" ng-show="messages[0]['receiverId'] == userId && person[selectedContact]['status'] == 0 ">
<a ng-click="request(selectedContact,1)" class="btn btn-success">Accept</a>
<a ng-click="request(selectedContact,2)" class="btn btn-primary">Reject</a>
</div>
</ul>
</div>

<!--chat_area-->
<div ng-if="grouptypinguser.length == 1" class="typing" ng-cloak>
{{ grouptypinguser[0] }} is typing....
</div>
<div ng-if="grouptypinguser.length != 1 && grouptypinguser.length != 0 " class="typing" ng-cloak>
<span ng-repeat="(key,x) in grouptypinguser">{{ x }},</span> are typing....
</div>

<div class="message_write px-2 mt-3 form-group w-100">
<textarea ng-keyup="groupupdateTyping()" ng-model="msg" ng-enter="groupMessageSend(roomId)" name="msgtext" class="msgtext form-control fr" placeholder="type a message"></textarea>
<div class="clearfix"></div>
    <div class="row">
    <div class="col-md-8">
<div class="chat_bottom form-group">
<input class="form-control" onchange="angular.element(this).scope().chatAttachment(this)" type="file" name="attchment">
<p ng-if="attachment != ''">{{ attachment }} &nbsp; <span ng-if="attachment != ''" ng-click="deleteAttachment()">&times;</span> </p>
<p ng-if="attch"> Uploading... </p>
        </div>
        </div>
        <div class="col-md-4">
<button ng-click="groupMessageSend(roomId)" class="pull-right btn btn-success msg mt-3">
Send</button>
</div>
</div>
</div>



</div>

 </div>
</div>

<!--********************** Group chat************************* -->


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
