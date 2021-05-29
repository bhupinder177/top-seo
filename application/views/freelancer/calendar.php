<?php include('sidebar.php');?>
<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Attendance</li>
    </ol>
  </section>
  <section class="content portfolio-cont expence-cstm">
    <div class=" no-margin user-dashboard-container">

        <div id='calendar'></div>

     </div>

     <!-- view task -->
     <div id="attdancedetail" class="modal fade" role="dialog">
     <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
     <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title attendancedate "></h4>
     </div>
     <div class="modal-body attendancedetailcontent">

     <div class="mb-1">
     <b>Task Title :</b> {{ viewdata.name }}
     </div>
     <div ng-if="viewdata.startDate" class="mb-1">
     <b>Start Date  :</b> {{ viewdata.startDate | date  }}
     </div>
     <div ng-if="viewdata.dueDate" class="mb-1">
     <b>Due Date:</b> {{ viewdata.dueDate | date  }}
     </div>

     <div ng-if="viewdata.description && viewdata.description != '' " class="mb-1">
     <b>Task Description :</b> {{ viewdata.description }}
     </div>
     </div>
     <div class="modal-footer">
     <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Close</button>
     </div>
     </div>

     </div>
     </div>
     <!-- view task -->

</section>
</div>
