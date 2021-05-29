<?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
        <li class="active">Support External</li>
      </ol>
    </section>
<section class="content p-3 bg-white">
<div  ng-cloak ng-app="myApp33" ng-controller="myCtrt33" id="chatcontroller" class="">
<div class="chat_container">
<div class="row">
  <div class="col-lg-3 col-md-12">
    <div class="member_list">
      <!-- chat person -->
      <ul  class="list-unstyled" id="messagemain">
        <li ng-repeat="(key,x) in person" ng-init="person = key" ng-class="{ 'active' : key == selectedContact }" ng-click="selectchat(key)" ng-if="person.length != 0"   class="left clearfix ">
          <span class="chat-img pull-left">
            <!-- <img ng-if="x.fid != userId" src="<?php echo base_url(); ?>assets/client_images/{{ x.logo }}" alt="User Avatar" class="img-circle"> -->
            <!-- <img ng-if="x.cid != userId" src="<?php echo base_url(); ?>assets/client_images/{{ {{ x.clogo }} }}" alt="User Avatar" class="img-circle"> -->

          </span>
          <div class="chat-body clearfix">
            <div class="header_sec">
              <strong  class="primary-font">{{ x.name }} <span ng-if="x.fonline == 1" class="odot"></span><span ng-if="x.fonline == 0" class="fdot"></span><span ng-if="x.unread.length != 0">({{ x.unread.length }})</span></strong>
              <p ng-if="x.type == 2">company </p>
              <p ng-if="x.type == 3">freelancer</p>
              <p ng-if="x.type == 4">client</p>
              <p ng-if="x.type == 5">Support</p>
            </div>
          </div>
        </li>
        </ul>
      <!-- chat person -->
    </div>
     <div id="pagination"></div>
  </div>

  <!--chat_sidebar-->


    <!--********************** person chat messages ******************-->
<div  class="col-lg-9 col-md-12">
    <div class="message_section">
      <div class="chat_area" scroll-glue-bottom="glued" onscroll="myFunction()" id="bottom">
        <ul offset="100" ng-class="{active : scrollClass}" id="messagemain" class="list-unstyled" schroll-bottom="messages">
            <li ng-repeat="(key,x) in messages[roomId]" class="left clearfix admin_chat">
                <div ng-class="{ 'mainsupport-chat-sec' : userId == x.MSG_SENTBY ,'mainchat-sec-left' : userId != x.MSG_SENTBY }" class="chat-body1 clearfix">

                    <div ng-class="{ ' support-chat-sec' : userId == x.MSG_SENTBY ,'chat-sec-left' : userId != x.MSG_SENTBY }">
                        <!--                                                                                chat-sec-->
                        <p ng-show="x.MSG_DELETE == 0"><span class="d-block editmsg{{ x._id }} msg{{ x._id}}" ng-bind-html="x.MSG_TEXT|trustAsHtml"></span></p>
                    </div>
                    <div ng-class="{ 'chat-right-sec' : userId == x.MSG_SENTBY ,'chat-left-sec' : userId != x.MSG_SENTBY }" class="">
                        <span ng-class="{ 'pull-right' : userId == x.MSG_SENTBY ,'pull-left receive-img' : userId != x.MSG_SENTBY }" class="chat-img1 pull-right">
                            <!-- <img ng-show="userId == x.MSG_SENTBY " src="<?php echo base_url(); ?>assets/client_images/{{ x.MSG_SENTBYIMAGE }}" class="img-circle"> -->
                            <!-- <img ng-show="userId != x.MSG_SENTBY " src="<?php echo base_url(); ?>assets/client_images/{{ x.MSG_SENTBYIMAGE }}" class="img-circle"> -->
                       </span>
                        <div ng-class="{ 'pull-right sender-right' : adminId == x.MSG_SENTBY ,'pull-left sender-left' : adminId != x.MSG_SENTBY }">
                            <span class="senderName" ng-show="adminId == x.MSG_SENTBY ">{{ x.MSG_SENTBYNAME }}</span>
                            <span class="senderName" ng-show="adminId != x.MSG_SENTBY ">{{ x.MSG_SENTBYNAME }}</span>
                            <div ng-class="{ 'timepull-right' : userId == x.senderId ,'timepull-left' : userId != x.senderId }" class="chat_time">{{ x.createdAt | date }}--{{ x.createdAt | time}}</div>
                        </div>
                    </div>
                    <p>
                        <span ng-if="x.MSG_ATTACHMENT && x.MSG_ATTACHMENT != '' && x.MSG_DELETE == 0" class="attachement">
                            <a target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment/{{ x.MSG_ATTACHMENT }}">
                                {{ x.MSG_ATTACHMENT }}</a></span>
                    </p>

                    <p ng-if="x.MSG_EDIT == 1 && x.MSG_DELETE == 0" class="edit-msg"><i class="fa fa-pencil-alt"></i>
<!--                        Message has been edited-->
                    </p>
                    <p ng-if="x.MSG_DELETE == 1">Message has been deleted</p>
                    <div class="chat-btn-section">
                        <button class="btn savebtn" ng-click="messageUpdate('update',x._id)" ng-if="editmsgId == x._id && edit == 1">Save</button>
                        <button class="btn cancelbtn" ng-click="messageUpdate('cancel',x._id)" ng-if="editmsgId == x._id && edit == 1">Cancel</button>
                    </div>
                    <div ng-if="adminId == x.MSG_SENTBY && x.MSG_DELETE == 0 && 1 >= dateDifference(x.createdAt)" class="dropdown drop-sec">
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
        <div  class="message_write form-group">
          <textarea ng-keyup="updateTyping()"  ng-enter="sendmessage(selectedContact,selectedContactId)" name="msgtext" class="msgtext form-control" placeholder="Type a message"></textarea>

          <div class="clearfix"></div>
          <div class="chat_bottom row">
              <div class="col-md-8">
          <input onchange="angular.element(this).scope().chatAttachment(this)" type="file" name="attchment" class="form-control">
            <p ng-if="attachment != ''">{{ attachment }} &nbsp; <span ng-if="attachment != ''" ng-click="deleteAttachment()">&times;</span> </p>
            <p ng-if="attch"> Uploading... </p>
              <!-- ng-disabled="person[selectedContact]['status'] == 0  || person[selectedContact]['status'] == 2 " -->
              </div>
              <div class="col-md-4">
            <button type="button"  ng-click="sendmessage(selectedContact,selectedContactId)" scroll-bottom="bottom" class="pull-right btn btn-success" >
              <i class="fa fa-send-o"></i> Send</button>
              </div>
            </div>
              </div>
          </div>
          <!-- no chat -->
          <div class="nochat" ng-if="person.length == 0">No chat Yet</div>
          <!-- no chat -->
        </div>
      </div>
    </div>
  </div>
  <!-- chat -->

</section>
</div>
