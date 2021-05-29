<?php

include('sidebar.php');
?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Task detail</li>
    </ol>

  </section>


  <section class="content portfolio-cont">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp37" ng-controller="myCtrt37">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box task-details">
                  <div class="col-md-7">
                      <h2>Task : {{ task.task }}</h2>
                      <p>Description : {{ task.description }}</p>
                      <h2>Hours : {{ task.hours }}</h2>
                      <p>Status : <span ng-if="task.status == 0">Active</span>
                        <span ng-if="task.status == 1">In progress</span>
                        <span ng-if="task.status == 2">Hold</span>
                        <span ng-if="task.status == 3">Completed</span>

                      </p>


                  </div>
                  <div class="col-md-5">
                    <h4>Activity</h4>
                    <div scroll-glue-bottom="glued"  class="activitytask">
                      <div ng-if="activity.length != 0" ng-repeat="(key,x) in activity" class="Activity">
                         <div class="taskmessage">
                        <b>{{ x.name  }}</b>
                        <h6><span ng-bind-html="x.logText|trustAsHtml"></span><a ng-click="comment(x.logId)"><i class="fa fa-fw fa-commenting-o"></i></a></h6>
                        <p ng-if="x.logFile"><a target="_blank" href="<?php echo base_url(); ?>assets/task/{{ x.logFile }}"><i class="fa fa-download" aria-hidden="true"></i></a></p>
                        <p class="task-time">{{ x.logDate | date  }} {{ x.logDate | time }}</p>
                       <!-- </div> -->

                         <!-- <div class="taskmessage"> -->
                        <p class="commentdisplay" ng-repeat="(key1,x2) in x.comment">

                          <span>{{ x2.logText | htmlToPlaintext }}</span><br>
                          <em class="comment-time">from :{{ x2.name }} {{ x2.logDate | date }} {{ x.logDate | time }}</em>

                        </p>
                      </div>
                        <div style="display:none;height:50px;" class="comment comment{{ x.logId }}" ></div>
                        <div style="display:none" class="cbt cbtn{{ x.logId }}">
                          <button ng-click="submitcomment(x.logId,x.logReference)" class="btn btn-success">submit</button>
                        </div>

                      </div>

                    </div>
                    <div class="form-group">
                    <textarea placeholder="Please enter message" ng-enter="submitMessage(task.taskId)" class="message form-control"></textarea>
                    <input type="file" onchange="angular.element(this).scope().Attachment(this)" name="file" id="taskfile">
                    </div>
                    <div class="form-group clearfix">
                    <input type="button" ng-click="submitMessage(task.taskId)" class="pull-right btn btn-success" name="send" value="Send">
                   </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </section>
</div>
