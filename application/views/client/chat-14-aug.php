<!--main-container-part-->
<?php

include('sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Chat</li>
    </ol>
  </section>
  <input type="hidden" name="sessionId" value="<?php echo $this->session->userdata['clientloggedin']['id']; ?>" class="sessionId">
      <div class="bg-white profile-preview profile-container">
        <!-- chat -->
        <div ng-cloak ng-app="myApp1" ng-controller="myCtrt1" id="chatcontroller">
          <div class="chat_container group-chat">
            <div class="row">
              <div class="col-sm-12">
                <div class="chat_sidebar">
                  <ul class="nav nav-pills">
                    <li ng-class="{ 'active' : 1 == chattype }" ng-click="chatchange('1')">
                      <a>Chat</a>
                    </li>
                    <li ng-class="{ 'active' : 2 == chattype }" ng-click="chatchange('2')">
                      <a>Group chat</a>
                    </li>
                  </ul>
                    <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-4">
                      <div class="dropdown all_conversation form-group">
                        <select ng-change="personFilter()" ng-model="filterValue" class="form-control dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <option value="1">All Conversation</option>
                          <option value="2">Active Contract</option>
                          <option value="3">Ended Contract</option>
                          <option value="4">Follow up </option>
                        </select>
                      </div>
                        <div class="member_list">
                    <!-- chat person -->
                    <ul ng-if="chattype == 1" class="list-unstyled mb-0 border-bottom-0" id="messagemain">

                      <!-- <li ng-class="{ 'active' : key == selectedContact }" ng-if="x.cid != userId" ng-click="selectchat(key,x.cid,'all',x.friendId)" ng-if="person.length != 0" ng-repeat="(key,x) in person" ng-init="person = key" class="left clearfix">
                      <span class="chat-img pull-left">
                      <img ng-if="x.fid != userId" src="<?php echo base_url(); ?>assets/client_images/{{ x.flogo }}"  class="img-circle">

                    </span>
                    <div class="chat-body clearfix">
                    <div class="header_sec">
                    <strong ng-if="x.fid != userId" class="primary-font">{{ x.fname }} <span ng-if="x.fonline == 1" class="odot"></span><span class="fdot" ng-if="x.fonline == 0"></span> </strong>
                    <strong ng-if="x.cid != userId" class="primary-font">{{ x.cname }} <span ng-if="x.conline == 1" class="odot"></span><span class="fdot" ng-if="x.conline == 0"></span> </strong>
                    <p ng-if="x.jobtitle">{{ x.jobtitle }} </p>
                  </div>
                </div>
              </li> -->

              <li ng-class="{ 'active' : key == selectedContact }" ng-if="x.fid != userId && x.cid == userId " ng-click="selectchat(key,x.fid,'all',x.friendId)" ng-if="person.length != 0" ng-repeat="(key,x) in person" ng-init="person = key" class="left clearfix ">
                <span class="chat-img pull-left">
                  <img ng-if="x.fid != userId" src="<?php echo base_url(); ?>assets/client_images/{{ x.flogo }}" alt="" class="img-circle img-fluid">

                </span>
                <div class="chat-body clearfix">
                  <div class="header_sec">
                    <strong ng-if="x.fid != userId && x.cid == userId " class="primary-font">{{ x.fname }} <span ng-if="x.fonline == 1" class="odot"></span><span ng-if="x.fonline == 0" class="fdot"></span></strong>
                    <strong ng-if="x.cid != userId && x.fid == userId" class="primary-font">{{ x.cname }} <span ng-if="x.conline == 1" class="odot"></span><span ng-if="x.conline == 0" class="fdot"></span></strong>
                    <p ng-if="x.jobtitle != ''">{{ x.jobtitle }} </p>
                    <p ng-if="x.unread.length != 0">({{ x.unread.length }})</p>

                  </div>
                </div>
              </li>


            </ul>
            <!-- chat person -->


            <!--********************** Group Chat********************** -->
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
          <!--*************************** Group chat***********************-->
        </div>
                  </div>
                        <div class="col-md-8">
                            <!--********************** person chat messages ******************-->
    <div ng-if="chattype == 1">
      <div class="" ng-if="person.length != 0">
        <div class="new_message_head">
          <div ng-if="jobtitle != ''" class="jobtitle">{{ jobtitle }}</div>
          <div class="mt-2">
            <a href="<?php echo base_url(); ?>client-event/{{ selectedContactid }}" class="btn bg-orange">Add event</a>
            <!-- job Offer modal -->
            <a data-toggle="modal" data-target="#joboffer" class="btn bg-yellow">Job Offer</a>
          </div>

          <!-- job offer -->

          <div class="modal fade" id="joboffer" role="dialog">
            <div class="modal-dialog">

              <div class="modal-content">
                <form id="jobform" novalidate>
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Job Offer</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Select job</label>
                      <select onchange="angular.element(this).scope().getjobdata(this)" ng-model="jobId" id="jobId" class="form-control jobId">
                        <option value="">Select job</option>
                        <option ng-repeat="(key,x) in jobs" ng-init="jobs = key" value="{{ x.jobId }}">{{ x.jobTitle }}</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Title <span class="red-text">*</span></label>
                      <input type="text" ng-value="offerTitle" id="jobtitle" ng-model="offerTitle" placeholder="Please enter title" class="form-control title required">
                      <p ng-show="jobSubmit && offerTitle == ''" class="text-danger">Title is required.</p>
                    </div>

                    <div class="form-group">
                      <label>Description <span class="red-text">*</span></label>
                      <!-- ckeditor -->
                      <textarea type="text" name="description" id="description" class="form-control jobdescription1  required"></textarea>
                      <p ng-show="jobSubmit && jobdescription == ''" class="text-danger">Description is required.</p>
                    </div>

                    <div class="form-group">
                      <label>Industries <span class="red-text">*</span></label>

                      <input placeholder="Please enter industry" ng-enter="addrefindustry()" id="industrys" onkeyup="angular.element(this).scope().industrys(this)" class="form-control" type="text">
                      <ul>
                        <li hand ng-repeat="(key,x) in refindustry" ng-click="addindustry(x.name,x.id)" value="{{ x.id }}">{{ x.name }}</li>
                      </ul>
                      <p ng-show="jobSubmit  && jobindustries.length == 0" class="text-danger">industry is required.</p>

                    </div>

                    <div ng-if="jobindustries.length != 0" id="tags">
                      <a ng-repeat="(key,x) in jobindustries"> {{ x.name }}<span hand ng-click="deleteindustry(key)"> &times; </span></a>
                    </div>

                    <div class="form-group">
                      <label>Services <span class="red-text">*</span></label>
                      <select id="services" ng-model="jobservices" class="form-control">
                        <option value="">Select service</option>
                        <option value="{{ x.id }}" ng-repeat="(key,x) in services">{{ x.name }}</option>
                      </select>
                      <p ng-show="jobSubmit && jobservices == ''" class="text-danger">Service is required.</p>
                    </div>

                    <div class="form-group">
                      <label>Skills and Expertise <span class="red-text">*</span></label>
                      <input ng-enter="addrefskill()" id="skills" onkeyup="angular.element(this).scope().skills(this)" class="form-control" type="text" ng-model="profile.skill">
                      <ul>
                        <li hand ng-repeat="(key,x) in refservices" ng-click="addskill(x.name,x.id)" value="{{ x.id }}">{{ x.name }}</li>
                      </ul>
                      <p ng-show="jobSubmit  && jobskill.length == 0" class="text-danger">Skill is required.</p>
                    </div>

                    <div ng-if="jobskill.length != 0" id="tags">
                      <a ng-repeat="(key,x) in jobskill"> {{ x.name }}<span hand ng-click="deleteskill(key)"> &times; </span></a>
                    </div>


                    <div class="form-group">
                      <label>Attachment</label>
                      <input onchange="angular.element(this).scope().uploadImage(this)" type="file" id="attchment" name="file" class="form-control attchment required">
                      <!-- <p ng-show="jobSubmit && image == ''" class="text-danger">attchment is required.</p> -->

                      <a ng-if="image" target="_blank" id="image" href="<?php echo base_url(); ?>assets/jobAttachment/{{ image }}"><i class="fa fa-download" aria-hidden="true"> {{ image }} </i></a>
                    </div>

                    <div class="form-group">
                      <label>No of freelancer Required <span class="red-text">*</span></label>
                      <input type="text" numbers-only="numbers-only" id="jobrequiredf" ng-model="jobrequiredf" ng-value="jobrequiredf" placeholder="Please enter required freelancer" class="form-control title required">
                      <p ng-show="jobSubmit && jobrequiredf == ''" class="text-danger">This field is required.</p>
                    </div>

                    <div class="form-group">
                      <label>Currency</label>
                      <select id="jobcurrency" ng-model="currency" class="form-control">
                        <option value="">Select currency</option>
                        <option value="{{ x.id }}" ng-repeat="(key,x) in allcurrency">{{ x.code }} {{ x.symbol }}</option>
                      </select>
                      <p ng-show="jobSubmit && currency == ''" class="text-danger">Please select currency.</p>

                    </div>

                    <div class="form-group">
                      <label>Project Type</label>
                      <input type="radio" name="type" ng-click="changetype(1)" checked value="1">Estimated budget
                      <input type="radio" name="type" ng-click="changetype(2)" value="2">Create milestone
                    </div>


                    <div ng-if="type == 2" class="row">
                      <div class="col-md-12" style="margin: 10px 0">
                        <a hand id="plusicon">Milestone <i ng-click="milestoneadd(key)" class="far fa-plus-square"></i></a>
                      </div>

                    </div>

                    <div ng-if="type == 2" style="margin-bottom:5px;" class="milestone" ng-repeat="(key,x) in milestones">
                      <div class="row">
                        <div class="col-sm-6">

                          <div class="form-group">

                            <input type="text" name='title{{$index}}' ng-required='true' class="form-control" ng-model="x.title" ng-value="x.title" id="email" placeholder="Please enter title" name="title">
                            <p ng-show="jobSubmit && x.title == ''" class="text-danger">Title is required.</p>

                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="text" readonly numbers-only="numbers-only" ng-model="x.price" ng-value="x.price" class="numberonly form-control" id="pwd" placeholder="Please enter amount" name="price">
                            <p ng-show="jobSubmit && x.title == ''" class="text-danger">Price is required.</p>
                            <a ng-if="key != 0" hand class="delicon" class="pull-right"> <i ng-click="deletemilestone(key)" class="fas fa-trash-alt"></i></a>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-12" style="margin: 10px 0">
                          <a hand id="plusicon">Sub Tasks <i ng-click="taskadd(key)" class="far fa-plus-square"></i> </a>
                        </div>

                      </div>
                      <div class="row" ng-repeat="(key2,x2) in x.task">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="form-group col-sm-6" style="margin-bottom: 10px">
                              <input type="text" id="title" placeholder="Please enter task" ng-model="x2.task" ng-value="x2.task" class="form-control title required">
                              <p ng-show="jobSubmit && x2.task == ''" class="text-danger">Task is required.</p>
                            </div>
                            <div class="form-group col-sm-6" style="margin-bottom: 10px">
                              <input numbers-only="numbers-only" ng-keyup="totalmilestone()" type="text" id="title" placeholder="Please enter hours" ng-model="x2.hours" ng-value="x2.hours" class="form-control title required">
                              <p ng-show="jobSubmit && x2.hours == ''" class="text-danger">Hours is required.</p>

                            </div>
                            <div class="form-group col-sm-6" style="margin-bottom: 10px">
                              <input numbers-only="numbers-only" ng-keyup="totalmilestone()" type="text" id="title" placeholder="Please enter hourly price" ng-model="x2.hourlyPrice" ng-value="x2.hourlyPrice" class="form-control title required">
                              <p ng-show="jobSubmit && x2.hourlyPrice == ''" class="text-danger">Hourly price is required.</p>

                            </div>
                            <div class="form-group col-sm-6" style="margin-bottom: 10px">
                              <input readonly numbers-only="numbers-only" ng-keyup="totalmilestone()" type="text" id="title" placeholder="Please enter price" ng-model="x2.amount" ng-value="x2.amount" class="form-control title required">
                              <p ng-show="jobSubmit && x2.amount == ''" class="text-danger">Total amount is required.</p>

                            </div>
                            &nbsp; <a ng-if="key2 != 0" hand class="delicon" class="pull-right"> <i ng-click="deletetask(key,key2)" class="fas fa-trash-alt"></i></a>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div ng-if="type == 2" class="form-group">
                      <label>Budget</label>
                      <input type="text" readonly id="amount" value="{{ budget }}" ng-model="budget" placeholder="Total Amount" name="totalamount" class="form-control amount required">
                    </div>

                    <div ng-if="type == 1" class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Estimate hours <span class="red-text">*</span></label>
                          <input type="text" id="hours" ng-keyup="fixedtotalbudget()" numbers-only="numbers-only" id="amount" ng-value="estimationHours" ng-model="estimationHours" placeholder="Please enter hours" name="hours" class="form-control amount required">
                          <p ng-show="jobSubmit  && estimationHours == ''" class="text-danger">Estimate hours is required.</p>

                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Hourly rate <span class="red-text">*</span></label>
                          <input type="text" id="hourlyrate" ng-keyup="fixedtotalbudget()" id="amount" numbers-only="numbers-only" ng-value="estimationHourlyPrice" ng-model="estimationHourlyPrice" placeholder="Please enter hourly price" name="budget" class="form-control amount required">
                          <p ng-show="jobSubmit  && estimationHours == ''" class="text-danger">Hourly rate is required.</p>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Budget <span class="red-text">*</span></label>
                          <input type="text" readonly ng-value="budget" ng-model="budget" id="amount" ng-value="{{ budget }}" numbers-only="numbers-only" ng-model="budget" placeholder="Please enter budget" name="budget" class="form-control amount required">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div class="btn-panel text-right">
                        <input type="button" ng-click="submitjob()" name="save" value="Submit" class="submitjob btn btn-primary">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <!-- job offer -->
          <!-- <div class="pull-left">
          <button><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Message</button></div> -->

        </div>
        <!--new_message_head-->

        <div class="chat_area" scroll-glue-bottom="glued" onscroll="myFunction()" id="bottom">
          <ul offset="100" ng-class="{active : scrollClass}" id="messagemain" class="list-unstyled" schroll-bottom="messages">
            <li ng-repeat="(key,x) in messages[roomId]" ng-class="{ 'chat-sec rightchat' : userId == x.MSG_SENTBY ,' leftchat chat-sec-left' : userId != x.MSG_SENTBY }" class="left clearfix admin_chat">
              <div class="chat-body1 clearfix">
                <div>
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
                    <div class="chat-btn-section">
                      <button class="btn savebtn" ng-click="messageUpdate('update',x._id)" ng-if="editmsgId == x._id && edit == 1">Save</button>
                      <button class="btn cancelbtn" ng-click="messageUpdate('cancel',x._id)" ng-if="editmsgId == x._id && edit == 1">Cancel</button>
                    </div>
                    <div ng-if="userId == x.MSG_SENTBY && x.MSG_DELETE == 0" class="dropdown drop-sec">
                      <button class="btn btn-primary" type="button" data-toggle="dropdown"><i class="fas fa-cog"></i>
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
            <div class="typing" ng-cloak ng-show="t == 1">{{ typinguser }} is typing.....</div>
            <!--chat_area-->
            <div ng-show="messages[0]['receiverId'] != userId || person[selectedContact]['status'] == 1 " class="message_write form-group mt-3">
              <!-- <div class="upload"> -->
              <textarea ng-keyup="updateTyping()" ng-show="person[selectedContact]['fid'] != userId" ng-enter="sendmessage(person[selectedContact]['fid'],person[selectedContact]['friendId'])" name="msgtext" class="msgtext form-control" placeholder="type a message"></textarea>
              <!-- <textarea ng-show="person[selectedContact]['cid'] != userId" ng-enter="sendmessage(person[selectedContact]['cid'],person[selectedContact]['friendId'])" name="msgtext" class="msgtext form-control" placeholder="type a message"></textarea> -->
              <!-- </div> -->
              <div class="clearfix"></div>
              <div class="chat_bottom form-group row">
                <!-- <a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                Add Files</a> -->
               <div class="col-md-8"> <input onchange="angular.element(this).scope().chatAttachment(this)" type="file" name="attchment" class="form-control">
                <p ng-if="attachment != ''">{{ attachment }} &nbsp; <span ng-if="attachment != ''" ng-click="deleteAttachment()">&times;</span> </p>
                <p ng-if="attch"> Uploading... </p>
                   <!-- ng-disabled="person[selectedContact]['status'] == 0  || person[selectedContact]['status'] == 2 " --></div>
                <div class="col-md-4"><button ng-show="person[selectedContact]['fid'] != userId" ng-click="sendmessage(person[selectedContact]['fid'],person[selectedContact]['fname'],person[selectedContact]['friendId'])" scroll-bottom="bottom" class="pull-right btn btn-success">
                    Send</button></div>
                </div>
                  <!-- <button ng-show="person[selectedContact]['cid'] != userId" ng-click="sendmessage(person[selectedContact]['cid'],person[selectedContact]['friendId'])" scroll-bottom="bottom" class="pull-right btn btn-success" ng-disabled="person[selectedContact]['status'] == 0  || person[selectedContact]['status'] == 2 ">
                  Send</button> -->
                </div>
              </div>
            </div>
                             <!-- *******************group chat messages *************************-->
          <div ng-if="chattype == 2" class="col-sm-12">
            <div ng-if="person.length != 0">
              <div class="new_message_head">
                <div class="mb-3"><a data-toggle="modal" data-target="#group" class="btn bg-blue">New Group</a> <a data-toggle="modal" data-target="#addmember" class="btn bg-orange">Add Member</a></div>
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
                              <span class="chat-img pull-left">
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
                            <span class="chat-img pull-left">
                              <img height="100" width="100" src="<?php echo base_url(); ?>assets/client_images/{{ x.flogo }}" class="img-circle">
                            </span>
                            {{ x.fname }}
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
                          <div ng-class="{ 'timepull-right' : userId == x.senderId ,'timepull-left' : userId != x.senderId }" class="chat_time">{{ x.createdAt | date }} {{ x.createdAt | time }}</div>
                        </div>

                      </div>

                      <p>
                        <span ng-if="x.MSG_ATTACHMENT && x.MSG_ATTACHMENT != '' && x.MSG_DELETE == 0" class="attachement">
                          <a target="_blank" href="<?php echo base_url(); ?>assets/chatAttachment/{{ x.MSG_ATTACHMENT }}">
                            {{ x.MSG_ATTACHMENT }}</a></span>
                          </p>



                          <p ng-if="x.MSG_EDIT == 1 && x.MSG_DELETE == 0">Message has been edited</p>
                          <p ng-if="x.MSG_DELETE == 1">Message has been deleted</p>
                          <div class="chat-btn-section">
                            <button class="btn savebtn" ng-click="messageUpdate('update',x._id)" ng-if="editmsgId == x._id && edit == 1">Save</button>
                            <button class="btn cancelbtn" ng-click="messageUpdate('cancel',x._id)" ng-if="editmsgId == x._id && edit == 1">Cancel</button>
                          </div>
                          <div ng-if="userId == x.MSG_SENTBY && x.MSG_DELETE == 0" class="dropdown drop-sec">
                            <button class="btn btn-primary" type="button" data-toggle="dropdown"><i class="fas fa-cog"></i>
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
                  <div class="message_write form-group px-3">
                      <div class="row">
                    <textarea ng-keyup="groupupdateTyping()" ng-model="msg" ng-enter="groupMessageSend(roomId)" name="msgtext" class="msgtext form-control fr" placeholder="type a message"></textarea>
                    <div class="clearfix"></div>
                    <div class="chat_bottom w-100">
                        <div class="row">
                         <div class="col-md-8 form-group">
                      <input onchange="angular.element(this).scope().chatAttachment(this)" type="file" name="attchment" class="form-control">
                      <p ng-if="attachment != ''">{{ attachment }} &nbsp; <span ng-if="attachment != ''" ng-click="deleteAttachment()">&times;</span> </p>
                      <p ng-if="attch"> Uploading... </p>
                             </div>
                             <div class="col-md-4">
                      <button ng-click="groupMessageSend(roomId)" scroll-bottom="bottom" class="pull-right btn btn-success msg">
                        Send</button>
                            </div>
                      </div>
                          </div>
                    </div>
                    </div>
                  </div>
                </div>
                <!-- *****************group chat message ***************************-->
            <!-- no chat -->
            <div class="nochat" ng-if="person.length == 0">No chat Yet</div>
            <!-- no chat -->
          </div>
          <!--***********************person chat messages**************************-->
                        </div>
                    </div>
                    </div>
      </div>
    </div>

    <!--chat_sidebar-->
              </div>
            </div>

            <!-- chat -->

          </div>
        </div>
