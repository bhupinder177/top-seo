

<!--main-container-part-->

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

							<a href="<?php echo base_url(); ?>profile" class="current">Profile</a>

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
<div id="custom-search-input">
<div class="input-group col-md-12">
<input type="text" class="  search-query form-control" placeholder="Conversation" />
<button class="btn btn-danger" type="button">
<span class=" glyphicon glyphicon-search"></span>
</button>
</div>
</div>
<div class="dropdown all_conversation">
<button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-weixin" aria-hidden="true"></i>
All Conversations
<span class="caret pull-right"></span>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
<li><a href="#"> All Conversation </a>  <ul class="sub_menu_ list-unstyled">
<li><a href="#"> All Conversation </a> </li>
<li><a href="#">Another action</a></li>
<li><a href="#">Something else here</a></li>
<li><a href="#">Separated link</a></li>
</ul>
</li>
<li><a href="#">Another action</a></li>
<li><a href="#">Something else here</a></li>
<li><a href="#">Separated link</a></li>
</ul>
</div>
<div class="member_list">
<ul class="list-unstyled">

<li ng-class="{ 'active' : x.cid == selectedContactid }" ng-if="x.cid != userId"  ng-click="selectchat(key,x.cid,'all',userId)" ng-if="person.length != 0" ng-repeat="(key,x) in person" ng-init="person = key" class="left clearfix">
<span class="chat-img pull-left">
<img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
</span>
<div class="chat-body clearfix">
<div class="header_sec">
  <strong ng-if="x.fid != userId" class="primary-font">{{ x.fname }}</strong>
  <strong ng-if="x.cid != userId" class="primary-font">{{ x.cname }}</strong>
</div>
</div>
</li>

  <li ng-class="{ 'active' : x.fid == selectedContactid }" ng-if="x.fid != userId"  ng-click="selectchat(key,x.fid,'all',userId)" ng-if="person.length != 0" ng-repeat="(key,x) in person" ng-init="person = key" class="left clearfix ">
<span class="chat-img pull-left">
<img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
</span>
<div class="chat-body clearfix">
<div class="header_sec">
  <strong ng-if="x.fid != userId" class="primary-font">{{ x.fname }}</strong>
  <strong ng-if="x.cid != userId" class="primary-font">{{ x.cname }}</strong>
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
<div class="pull-left">
<button><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Message</button></div>

</div><!--new_message_head-->

<div class="chat_area" schroll-bottom="messages" id="bottom">
<ul  class="list-unstyled" schroll-bottom="messages">
<li ng-if="messages.length != 0" ng-repeat="(key,x) in messages" ng-init="messages = key" ng-class="{ 'admin_chat' : userId == x.senderId }"  class="left clearfix admin_chat">

<div class="chat-body1 clearfix">
    <span ng-class="{ 'pull-right' : userId == x.senderId ,'pull-left' : userId != x.senderId }" class="chat-img1 pull-right">
<img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">

</span>

    <div ng-class="{ 'pull-right sender-right' : userId == x.senderId ,'pull-left sender-left' : userId != x.senderId }" >
  <p class="senderName" ng-show="userId == x.senderId ">{{ x.senderName }}</p>
  <p class="senderName" ng-show="userId != x.senderId ">{{ x.senderName }}</p></div>
<p>{{ x.message }}</p>
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
<textarea  name="msgtext" class="msgtext form-control" placeholder="type a message"></textarea>
<div class="clearfix"></div>
<div class="chat_bottom">
<!-- <a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
Add Files</a> -->
<button  ng-show="person[selectedContact]['fid'] != userId" ng-click="sendmessage(person[selectedContact]['fid'])" scroll-bottom="bottom" class="pull-right btn btn-success" ng-disabled="person[selectedContact]['status'] == 0  || person[selectedContact]['status'] == 2 ">
Send</button>
<button  ng-show="person[selectedContact]['cid'] != userId" ng-click="sendmessage(person[selectedContact]['cid'])" scroll-bottom="bottom" class="pull-right btn btn-success" ng-disabled="person[selectedContact]['status'] == 0  || person[selectedContact]['status'] == 2 ">
Send</button>
</div>
</div>



</div>
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
