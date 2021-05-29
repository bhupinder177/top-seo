<!--main-container-part-->
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
            <div  id="chatcontroller" ng-app="myApp24" ng-controller="myCtrt24" >
              <!-- chat -->
              <div  class="chat_container">
                <div class="group-chat">
                  <div class="">
                    <div class="row chat_free">
                      <div class="col-md-6"></div>
                      <!-- <div class="col-md-2"><h4><b>{{ selectedgroupName }}</b></h4></div> -->
                      <div class="col-md-4 text-right">
                        <!-- <a  class="btn btn-primary bg-orange my-3"  data-toggle="modal" data-target="#groupcreate">New Chat</a> -->
                      </div>
                      <div class="member_list col-lg-4 mt-4">
                        <!-- Group  -->
                        <ul  class="list-unstyled">

                          <li ng-if="group.length != 0 " ng-repeat="(key,x) in group" ng-click="selectgroup(x._id,key)"  ng-class="{ 'active' : x._id == roomId }"  class="left clearfix" >
                            <div class="chat-body clearfix">
                              <div class="img-group">
                                <span>{{ x.CName | profile }}</span>
                              </div>
                              <div class="header_sec">
                                <strong class="primary-font">{{ x.CName }}</strong>
                                <a ng-if="x.Type == 0" class="btn btn-user" ng-click="addmembers(x._id)"> <i  class="fa fa-user-plus"></i></a>
                                <div ng-if="x.UserId == userId && x.Type == 0"  class="dropdown drop-sec pull-right">
                                  <button class="btn bg-yellow btn-primary" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a ng-click="groupEdit(key,x._id)">Edit Chat</a></li>
                                    <li><a ng-click="groupconfirm(key,x._id)">Remove Chat</a></li>
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
                          <div ng-if="group[groupkey].CName" class="col-md-12"><h4 class="chat_hed"><b>{{ group[groupkey].CName }}</b></h4></div>
                          <!--new_message_head-->
                          <div scroll-glue-bottom="glued" schroll-bottom="messages" class="chat_area" onscroll="myFunction()" id="bottom" >
                            <ul offset="100" ng-class="{active : scrollClass}" id="messagemain" class="list-unstyled"  schroll-bottom="messages">
                            <li ng-repeat="(key,x) in messages[roomId]" ng-class="{ 'right' : userId == x.MSG_SENTBY ,'left' : userId != x.MSG_SENTBY }"  class=" clearfix admin_chat chat-sec ">
                              <div class="chat-body1 clearfix">
                                <div class="pro-img">
                                  <div ng-if="userId != x.MSG_SENTBY" class="img-group">
                                    <span>{{ x.MSG_SENTBYNAME | profile }}</span>
                                  </div>

                                  <p ng-if="userId != x.MSG_SENTBY" class="user-name">{{ x.MSG_SENTBYNAME }}</p>
                                </div>
                                <div class="chat-sec-left">
                                  <div class="chat-left-sec" class="">
                                    <div class="pull-left sender-left">

                                      <div ng-class="time" class="chat_time ng-binding text-right">{{ x.createdAt | date }} at {{ x.createdAt | time }}</div>

                                      </div>
                                      <span ng-if="x.MSG_ATTACHMENT"  class="attachement">
                                        <a target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment/{{ x.MSG_ATTACHMENT }}">
                                          {{ x.MSG_ATTACHMENT }}</a>
                                        </span>
                                    </div>
                                  <p >{{ x.MSG_TEXT }}</p>
                                </div>

                              </div>
                            </li>
                            <!-- no chat -->
                            <div class="nochat" ng-if="group.length == 0">No chats found.</div>
                            <!-- no chat yet -->

              </ul>
            </div>
            <!--chat_area-->
            <div ng-show="messages[0]['receiverId'] != userId || person[selectedContact]['status'] == 1 " class="message_write w-100 px-2 form-group">
              <div class="row">
                <div class="col-md-9">
                  <textarea ng-keyup="updateTyping()" ng-model="msg"  ng-enter="groupMessageSend(roomId)" name="msgtext" class="msgtext form-control" placeholder="type a message"></textarea>
                </div>
                <div class="col-md-3">
          <div class="d-flex">
           <button ng-disabled="submitdisabled" ng-click="groupMessageSend(roomId)" scroll-bottom="bottom" class="btn btn-success msg mb-2"><i class="fa fa-send-o"></i></button>
          <div class="chat_bottom form-group">
                    <div class="uniform-uploader">
                                        <input onchange="angular.element(this).scope().chatAttachment(this)" type="file" class="form-control-uniform chatimageupload" id="img_chf_upl" data-fouc="">
                                        <span class="file_upld_btn bg-pink-400" style="user-select: none;" for="img_chf_upl"><i class="fa fa-upload" aria-hidden="true"></i> </span>
                                      </div>
          </div>
          </div>

              </div>
              <div class="clearfix"></div>
                    <p ng-if="attachment != ''"><span class="attachment">{{ attachment }}</span> <span ng-if="attachment != ''" ng-click="deleteAttachment()">&times;</span> </p>
                    <p ng-if="attch"> Uploading... </p>


            </div>
            <div class="">
          </div>

        </div>
      </div>
          <!-- no chat -->
          <div class="nochat" ng-if="person.length == 0 && chattype == 2">No chat Yet</div>
          <!-- no chat yet -->
        </div>
      </div>
      <!-- ******************************chat person end***************** -->

      <!-- group create modal -->

      <div class="modal" tabindex="-1" role="dialog" id="groupcreate">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Create New Chat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="create_group form-group mb-0">
                <input class="form-control" id="groupname" ng-model="groupname" ng-value="groupname" placeholder="Enter chat name"/>
                <p ng-show="gSubmit && groupname == ''" class="text-danger ng-hide">Chat name is required.</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" ng-click="submitgroup()" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- group create modal -->
      <!-- group Edit modal -->

      <div class="modal" tabindex="-1" role="dialog" id="groupedit">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit  Chat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="create_group form-group mb-0">
                <input class="form-control" id="groupname1" ng-model="groupname1" ng-value="groupname1" placeholder="Enter chat name"/>
                <p ng-show="gSubmit && groupname1 == ''" class="text-danger ng-hide">Chat name is required.</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" ng-click="updateGroup()" class="btn btn-primary">Update</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- group Edit modal -->
      <!-- group delete modal -->

      <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this chat ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" ng-click="deleteGroup()" class="btn btn-danger" id="confirm">Delete</button>

              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- delete group  -->

      <!-- add members -->
      <div class="modal" tabindex="-1" role="dialog" id="addmember">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add members</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- display selected member -->

            <div class="col-md-12">
            <div class="selectedperson_maindiv">
              <div class="row">
            <div class="px-1" ng-if="selectmember.length != 0" class="selectedperson-main" ng-repeat="(key,x) in selectmember">
            <div class="member memb-tag">
            <span class="selectperson_name">{{ x.MemberName }}</span>
            <span ng-click="memberRemove(key)"><i class="fa fa-times" aria-hidden="true"></i></span>
           </div>
            </div>
          </div>
            </div>
          </div>

            <!-- display selected member -->
            <h3 class="su-mem">Suggested</h3>

            <div  class="member-main " ng-repeat="(key,x) in person" ng-if="x.select == 0" ng-click="memberAddGroup(key)">
            <div class="member">
            <span class="chat-img">
            <img height="100" width="100" src="<?php echo base_url(); ?>assets/client_images/{{ x.logo }}" class="img-circle">
            </span>
            {{ x.name }}
            <!-- <span ng-if="x.select == 1"><i class="fa fa-check" aria-hidden="true"></i></span> -->
            </div>
            </div>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" ng-click="submitmember()" class="btn btn-primary">Submit</button> -->
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!-- add members -->
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
