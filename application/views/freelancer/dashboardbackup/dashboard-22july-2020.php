<?php include ('sidebar.php');?>

<div id="wrapper">
    <?php if($this->session->userdata['clientloggedin']['type'] == 2 || $this->session->userdata['clientloggedin']['type'] == 3 || $this->session->userdata['clientloggedin']['access'] == 0 )
      {
        ?>
    <!-- ************************admin dashboard*******************************-->
    <div class="dash-board">
        <h4 class="h4-win">Dashboard</h4>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="left-container">
                    <div class="row mb-3">
                        <div class="col-xl-4 col-md-6 wow bounceInDown animated" data-wow-delay=".1s" style="visibility:hidden">
                            <div class="emp mt-3">
                                <ul class="ul-list unstyle mb-0">
                                    <li>
                                        <div class="bg-blue">
                                            <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="image-fluid">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">
                                            <p>Job Applied</p>
                                            <span>
                                                <?php echo $applied; ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      <div class="col-xl-4 col-md-6 wow bounceInDown animated" data-wow-delay=".3s" style="visibility:hidden">
                            <div class="emp mt-3">
                                <ul class="ul-list unstyle mb-0">
                                    <li>
                                        <div class="bg-blue">
                                            <img src="<?php echo base_url(); ?>assets/dashboard/images/dep.png" class="image-fluid">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">
                                            <p>Won</p>
                                            <span>
                                                <?php echo $won; ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 wow bounceInDown animated" data-wow-delay=".6s" style="visibility:hidden">
                            <div class="emp mt-3">
                                <ul class="ul-list unstyle mb-0">
                                    <li>
                                        <div class="bg-blue">
                                            <img src="<?php echo base_url(); ?>assets/dashboard/images/can.png" class="image-fluid">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">
                                            <p>Review</p>
                                            <span>
                                                <?php echo $review; ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                      <div class="col-xl-4 col-md-6 wow bounceInDown animated" data-wow-delay=".1s" style="visibility:hidden">
                            <div class="emp mt-3">
                                <ul class="ul-list unstyle mb-0">
                                    <li>
                                        <div class="bg-blue">
                                            <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="img-fluid">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">
                                            <p>Total Earning</p>
                                            <span>
                                                <?php if($totalearning->total != 0){ echo $totalearning->total; } else{ echo "0"; } ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       <div class="col-xl-4 col-md-6 wow bounceInDown animated" data-wow-delay=".3s" style="visibility:hidden">
                            <div class="emp mt-3">
                                <ul class="ul-list unstyle mb-0">
                                    <li>
                                        <div class="bg-blue">
                                            <img src="<?php echo base_url(); ?>assets/dashboard/images/leaves.png" class="image-fluid">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">
                                            <p>Industry</p>
                                            <span>
                                                <?php echo $industry; ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 wow bounceInDown animated" data-wow-delay=".6s" style="visibility:hidden">
                            <div class="emp mt-3">
                                <ul class="ul-list unstyle mb-0">
                                    <li>
                                        <div class="bg-blue">
                                            <img src="<?php echo base_url(); ?>assets/dashboard/images/jobs.png" class="image-fluid">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="content">
                                            <p>Services</p>
                                            <span>
                                                <?php echo $services; ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="Latest common-l bg-white">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="h4-head">Latest Reviews</h4>
                                </div>
                            </div>
                        </div>
                        <div class="latest-content p-3">

                            <?php
                                 if(!empty($reviewlatest))
                                 {

                                   foreach($reviewlatest as $r)
                                   {
                                     ?>
                            <div class="lead-review mb-2 border-bottom pb-3">
                                <!-- <span class="lead-date">23/01/2020</span> -->
                                <div class="review">
                                    <p>“
                                        <?php echo $r->reviewOverall; ?>”</p>
                                </div>
                                <div class="client-name d-flex"><span>
                                        <?php if($r->name){ echo ucwords($r->name); }  ?></span>
                                    <span class="d-flex ml-2">
                                        <i class="fa <?php if($r->star >= 1){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                        <i class="fa <?php if($r->star >= 2){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                        <i class="fa <?php if($r->star >= 3){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                        <i class="fa <?php if($r->star >= 4){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                        <i class="fa <?php if($r->star >= 5){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>

                                    </span></div>
                            </div>
                            <?php } }
                                   else
                                  {
                                    ?>
                            <p>No Review</p>
                            <?php } ?>

                        </div>
                        <?php
                               if(!empty($reviewlatest))
                               {
                                 ?>
                        <div class="border-top text-right p-3">
                            <a href="<?php echo base_url(); ?>freelancer/reviews">View All</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="calender mt-3 wow bounceInRight animated" data-wow-delay=".1s" style="visibility:hidden"><img src="<?php echo base_url(); ?>assets/dashboard/images/calender.png" class="img-fluid"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12">
                <div class="mt-3">
                    <div class="Leaves common-l bg-white wow bounceInLeft animated" data-wow-delay=".1s" style="visibility:hidden">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="h4-head">Task</h4>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Task Name</th>
                                        <th style="">Assign to</th>
                                        <th style="">Start Date</th>
                                        <th>Description</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if(!empty($task))
                                         {
                                           foreach($task as $t)
                                           {
                                           ?>
                                    <tr class="<?php if($t->status == 1){ echo "taskdone"; } else if($t->status == 2){ echo "taskpending"; }  ?>">
                                        <td>
                                            <?php echo $t->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $t->assignedto; ?>
                                        </td>
                                        <td>
                                            <?php echo $d = date("d M, Y",strtotime($t->startDate)); ?>
                                        </td>
                                        <td>
                                            <?php echo substr($t->description, 0, 70);  ?>
                                        </td>
                                    </tr>
                                    <?php } } else{ ?>

                                    <tr>
                                        <td colspan="4">No Task</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if(!empty($task))
                                { ?>
                        <div class="border-top text-right p-3">
                            <a href="<?php echo base_url(); ?>freelancer/todo">View All</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- <div class="notification-box mt-3">
                        <div class="row"> -->
            <div class="col-xl-5 col-lg-5 col-md-12">
                <div class="mt-3">
                    <div class="Leaves common-l bg-white wow bounceInLeft animated" data-wow-delay=".1s" style="visibility:hidden">
                        <div class="heading mb-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="h4-head">Notifications</h4>
                                </div>
                            </div>
                        </div>
                        <?php
                                        if(!empty($notification))
                                        {
                                          foreach($notification as $n)
                                          {
                                           ?>
                        <div class="notification-content mx-2">
                            <ul class="un-style mb-0 list-unstyled d-flex">
                                <li class="">
                                    <div class="john-img">
                                        <?php if($n->logo != '')
                                                         {
                                                           ?>
                                        <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $n->logo; ?>">
                                        <?php }
                                                              else
                                                            {
                                                              ?>
                                        <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg">
                                        <?php
                                                              }
                                                            ?>
                                    </div>
                                </li>
                                <li class="pl-2">
                                    <div class="not-content">
                                        <span>
                                            <?php echo $newDate = date("d-m-Y", strtotime($n->notificationDate));  ?></span>
                                        <p><b>
                                                <?php echo ucwords($n->name); ?></b>
                                            <?php echo $n->notificationMessage; ?>
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <?php }
                                              }
                                              else
                                              {
                                              ?>
                        <div class="notification-content mx-2">
                            <p>No Notification</p>
                        </div>
                        <?php
                                              }
                                              if(!empty($notification))
                                              {
                                              ?>
                        <div class="border-top text-right p-3">
                            <a href="<?php echo base_url(); ?>freelancer/notification">View All</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- </div>


                        </div> -->
            </div>

      <?php
      if($this->session->userdata['clientloggedin']['type'] == 2)
      {
        ?>
            <!-- team member -->
       <div class="col-md-6 mt-3">
          <div class="box common-l">
            <div class="heading">
              <h3 class="h4-head">Latest Members

                </h3>
            </div>

          <div class="box-body no-padding">
              <ul class="users-list clearfix">

               <?php if(!empty($team2))
                 {
                   foreach($team2 as $t)
                   {
                 ?>
                <li>
                  <?php if($t->logo != '')
                        {
                          ?>
                  <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $t->logo; ?>" class="user-image john-img" alt="">
                <?php }
                else{
                  ?>
                  <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg" class="user-image" alt="test">


                  <?php
                     }
                     ?>
                  <a class="users-list-name" href="#"><?php echo $t->name; ?></a>
                </li>
              <?php } }
                else
                {
                  echo "No Team member";
                }
                ?>
              </ul>
           </div>
          </div>
        </div>

      <?php } ?>
        <!-- team mem -->

        <!-- profile view chart -->
         <div class="col-md-6 mt-3">
           <div id="profileviewchart1" style="height: 300px; width: 100%;"></div>

         </div>
        <!-- profile view chart -->





        </div>
    </div>
<!-- ************************admin dashboard end*******************************-->

<!-- ************************Hr dashboard Start*******************************-->

<?php }

      else if($this->session->userdata['clientloggedin']['access'] == 5)
       {

         $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
         $date =  $nowUtc->format('Y-m-d');
         $parent = getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
         $emp = getcount('user',array("parent"=>$parent->parent));
         $dep = getcount('department',array("userId"=>$parent->parent));
         $resignation = getcount('resignation',array("userId"=>$parent->parent,"date<="=>$date));
         $leave = getcount('user_leave',array("userId"=>$parent->parent,"MONTH(date)"=>$nowUtc->format('m'),"status"=>1));
         $jobopening = getcount('vacancy',array("userId"=>$parent->parent,"vacancyStatus"=>1));
         $interview = getcount('interview',array("userId"=>$parent->parent,"interviewDate"=>$date));
         $ann = getcount('announcement',array("userId"=>$parent->parent,"annDate"=>$date));
         $candidate = getcount('candidate',array("userId"=>$parent->parent,"candidateStatus"=>1));
         $anntoday = getrow('announcement',array("userId"=>$parent->parent,"annDate"=>$date));
         $allannouncment = get('announcement',array("userId"=>$parent->parent,"annDate"=>$date));
         $allleave = getleave(array("l.userId"=>$parent->parent,"l.date<="=>$date,"l.date1>="=>$date));
         $allinterview = getTodayinterview(array("i.userId"=>$parent->parent,"i.interviewDate<="=>$date));
         $allholidays = get('holiday',array("userId"=>$parent->parent));
      ?>
<div class="dash-board">
    <h4 class="h4-win">Dashboard</h4>
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="left-container">
                <div class="row mb-3">
                    <div class="col-lg col-sm-12 wow bounceInDown animated" data-wow-delay=".1s" style="visibility:hidden">
                        <div class="emp mt-lg-3">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Employees</p>
                                        <span>
                                            <?php echo $emp; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg col-sm-12 wow bounceInDown animated" data-wow-delay=".2s" style="visibility:hidden">
                        <div class="emp mt-3">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/dep.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Departments</p>
                                        <span>
                                            <?php echo $dep; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg col-sm-12 wow bounceInDown animated" data-wow-delay=".4s" style="visibility:hidden">
                        <div class="emp mt-3">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/can.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Candidates</p>
                                        <span>
                                            <?php echo $candidate; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg col-sm-12 wow bounceInDown animated" data-wow-delay=".1s" style="visibility:hidden">
                        <div class="emp mt-3">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="img-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Present employees</p>
                                        <span>
                                            <?php echo $emp - $leave; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg col-sm-12 wow bounceInDown animated" data-wow-delay=".2s" style="visibility:hidden">
                        <div class="emp mt-3">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/leaves.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Number on leaves</p>
                                        <span>
                                            <?php echo $leave; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg col-sm-12 wow bounceInDown animated" data-wow-delay=".4s" style="visibility:hidden">
                        <div class="emp mt-3">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/jobs.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Job opening</p>
                                        <span>
                                            <?php echo $jobopening ?>
                                              </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div class="Leaves common-l bg-white wow bounceInLeft animated" data-wow-delay=".1s" style="visibility:hidden">
                    <div class="heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="h4-head">Today Leaves</h4>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th style="">Type</th>
                                    <th style="">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                          if(!empty($allleave))
                          {
                          foreach($allleave as $l)
                          {
                         ?>
                                <tr>
                                    <td>
                                        <?php if($l->name){ echo ucwords($l->name); }  ?>
                                    </td>
                                    <td>
                                        <?php echo $l->type; ?>
                                    </td>
                                    <td>
                                        <?php if($l->status == 1)
                                {
                                  ?>
                                        <a href="javascript:void();" class="btn btn-cstm bg-green bg-yellow">Approved</a>
                                        <?php }
                                else if($l->status == 2)
                                 {
                                   ?>
                                        <a href="javascript:void();" class="btn btn-cstm bg-yellow">Rejected</a>

                                        <?php }
                                else if($l->status == 3)
                                 {
                                   ?>
                                        <a href="javascript:void();" class="btn btn-cstm bg-red">Cancelled</a>

                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php }
                                            }
                                            else
                                            {
                                              ?>
                                <tr>
                                    <td colspan="4" class="text-center">No Leave</td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div class="Latest common-l bg-white wow bounceInLeft animated" data-wow-delay=".1s" style="visibility:hidden;">
                    <div class="heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="h4-head">Latest Reviews</h4>
                            </div>
                        </div>
                    </div>
                    <div class="latest-content p-3">
                        <?php
                           if(!empty($reviewlatest))
                           {

                             foreach($reviewlatest as $r)
                             {
                               ?>
                        <div class="lead-review mb-2 border-bottom pb-3">
                            <!-- <span class="lead-date">23/01/2020</span> -->
                            <div class="review">
                                <p>“
                                    <?php echo $r->reviewOverall; ?>”</p>
                            </div>
                            <div class="client-name d-flex"><span>
                                    <?php if($r->name){ echo ucwords($r->name); }  ?></span>
                                <span class="d-flex ml-2">
                                    <i class="fa <?php if($r->star >= 1){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                    <i class="fa <?php if($r->star >= 2){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                    <i class="fa <?php if($r->star >= 3){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                    <i class="fa <?php if($r->star >= 4){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                    <i class="fa <?php if($r->star >= 5){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>

                                </span></div>
                        </div>
                        <?php } }
                             else
                            {
                              ?>
                        <p>No Review</p>
                        <?php } ?>

                    </div>
                    <?php
                           if(!empty($reviewlatest))
                           {
                             ?>
                    <div class="border-top text-right p-3">
                        <a href="javascript:void(0);">View All</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="calender mt-3 mb-2 bounceInRight wow animated" data-wow-delay=".2s" style="visibility:hidden;"><img src="<?php echo base_url(); ?>assets/dashboard/images/calender.png" class="img-fluid"></div>

            <div class="Latest common-l mt-3 bg-white wow bounceInLeft animated" data-wow-delay=".3s" style="visibility:hidden;">
                <div class="heading">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="h4-head">Today Annoncement</h4>
                        </div>
                    </div>
                </div>
                <div class="anno-content py-3 pl-3">
                    <div class="row">
                        <div class="col-xl-8 col-md-12">
                            <p>Make an announcement to you coworkers</p>
                        </div>
                        <div class="col-xl-4 col-md-12 pl-lg-0">
                            <img src="<?php echo base_url(); ?>assets/dashboard/images/loud.png" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="btn-g">
                    <div class="row">
                        <div class="col-xl-8 col-md-12"><a href="<?php echo base_url(); ?>freelancer/announcement" class="btn btn-cstm">Create Announcement</a></div>
                        <div class="col-xl-4 col-md-12 text-right"><a href="<?php echo base_url(); ?>freelancer/announcement" class="btn-under">See history</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="holiday-box">
        <div class="row">
            <div class="col-lg-5 col-sm-12">
                    <div class="Leaves common-l bg-white wow bounceInLeft animated mt-3" data-wow-delay=".1s" style="visibility:hidden;">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="h4-head">Holidays</h4>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Holiday</th>
                                        <th style="">Day</th>
                                        <th style="min-width:110px;">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($allholidays))
                                        {
                                          foreach($allholidays as $h)
                                          {
                                          ?>
                                    <tr>
                                        <td>
                                            <?php echo $h->title; ?>
                                        </td>
                                        <td>
                                            <?php echo $dayOfWeek = date("l", strtotime($h->date)); ?>
                                        </td>
                                        <td>
                                            <?php echo $newDate = date("d-m-Y", strtotime($h->date));  ?>
                                        </td>
                                    </tr>
                                    <?php } }
                                            else
                                             {
                                               ?>
                                    <tr>
                                        <td colspan="3">No Holidays</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                              if(!empty($allholidays))
                              {
                                ?>
                        <div class="border-top text-right p-3">
                            <a href="<?php echo base_url(); ?>freelancer/holiday">View All</a>
                        </div>
                        <?php } ?>
                    </div>
            </div>
            <div class="col-lg-7 col-sm-12">
                    <div class="Leaves common-l bg-white wow bounceInLeft animated mt-3" data-wow-delay=".3s" style="visibility: hidden;">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="h4-head">Task</h4>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="min-width:200px;">Task Name</th>
                                        <th style="">Assign to</th>
                                        <th style="min-width:120px;">Start Date</th>
                                        <th style="min-width:200px;">Description</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if(!empty($task))
                                       {
                                         foreach($task as $t)
                                         {
                                         ?>
                                    <tr class="<?php if($t->status == 1){ echo "taskdone"; } else if($t->status == 2){ echo "taskpending"; }  ?>">
                                        <td>
                                            <?php echo $t->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $t->assignedto; ?>
                                        </td>
                                        <td>
                                            <?php echo $d = date("d M, Y",strtotime($t->startDate)); ?>
                                        </td>
                                        <td>
                                            <?php echo substr($t->description, 0, 70);  ?>
                                        </td>
                                    </tr>
                                    <?php } } else{ ?>

                                    <tr>
                                        <td colspan="4">No Task</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if(!empty($task))
                              { ?>
                        <div class="border-top text-right p-3">
                            <a href="<?php echo base_url(); ?>freelancer/todo">View All</a>
                        </div>
                        <?php } ?>
                    </div>
            </div>
        </div>
    </div>
    <div class="notification-box">
        <div class="row">
            <div class="col-xl-5 col-md-12">
                    <div class="Leaves common-l mt-3 bg-white wow bounceInLeft animated"  data-wow-delay=".1s" style="visibility:hidden;">
                        <div class="heading mb-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="h4-head">Notifications</h4>
                                </div>
                            </div>
                        </div>
                        <?php
                              if(!empty($notification))
                              {
                                foreach($notification as $n)
                                {
                                 ?>
                        <div class="notification-content mx-2">
                            <ul class="un-style mb-0 list-unstyled d-flex">
                                <li class="">
                                    <div class="john-img">
                                        <?php if($n->logo != '')
                                               {
                                                 ?>
                                        <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $n->logo; ?>">
                                        <?php }
                                                    else
                                                  {
                                                    ?>
                                        <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg">
                                        <?php
                                                    }
                                                  ?>
                                    </div>
                                </li>
                                <li class="pl-2">
                                    <div class="not-content">
                                        <span>
                                            <?php echo $newDate = date("d-m-Y", strtotime($n->notificationDate));  ?></span>
                                        <p><b>
                                                <?php echo ucwords($n->name); ?></b>
                                            <?php echo $n->notificationMessage; ?>
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <?php }
                                    }
                                    else
                                    {
                                    ?>
                        <div class="notification-content mx-2">
                            <p>No Notification</p>
                        </div>
                        <?php
                                    }
                              if(!empty($notification))
                              {
                                ?>
                        <div class="border-top text-right p-3">
                            <a href="<?php echo base_url(); ?>freelancer/notification">View All</a>
                        </div>
                        <?php } ?>
                    </div>
            </div>
            <div class="col-xl-7 col-md-12">
                <div class="Performance-wrapper mt-3">
                    <div class="common-l bg-white wow bounceInLeft animated" data-wow-delay=".3s" style="visibility: hidden;">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="h4-head">Employee Performance</h4>
                                </div>
                            </div>
                        </div>
                        <div class="Performance-head">
                            <div class="dropdown ac-cstm">
                                <button class="btn btn-secondary dropdown-toggle bg-blue" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Employee
                                </button>
                                <div class="dropdown-menu fadeIn">
                                    <a class="dropdown-item" href="#"><img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Munish</a>
                                    <a class="dropdown-item" href="#"><img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Sunil</a>
                                </div>
                            </div>
                        </div>

                        <div class="progress-wrapper">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="Leaves">
                                        <div class="select-employees">
                                            <h4>Quality of Work</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="ty">
                                        <h4>80%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-wrapper">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="Leaves">
                                        <div class="select-employees">
                                            <h4>Communitication</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="ty">
                                        <h4>80%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-wrapper">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="Leaves common-l">
                                        <div class="select-employees">
                                            <h4>Creativity</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="ty">
                                        <h4>80%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-wrapper">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="Leaves common-l">
                                        <div class="select-employees">
                                            <h4>Attendance</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="ty">
                                        <h4>10%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-3 px-4 emplos">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4>80%</h4>
                                        </div>
                                        <div class="col text-center">
                                            <h4>80%</h4>
                                        </div>
                                        <div class="col text-right">
                                            <h4>80%</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- ************************end hr dashboard*******************************-->

<?php }
      else if($this->session->userdata['clientloggedin']['access'] == 2)
      {
        ?>
<!-- sales team dashboard -->
<div class="dash-board">
    <h4 class="h4-win">Sales</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="left-container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="emp mt-2">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Job Applied</p>
                                        <span>
                                            <?php echo $applied; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="emp mt-2">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/dep.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Won</p>
                                        <span>
                                            <?php echo $won; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="emp mt-2">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/can.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Review</p>
                                        <span>
                                            <?php echo $review; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="emp mt-2">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Total Earning</p>
                                        <span>
                                            <?php if($totalearning->total != 0){ echo $totalearning->total; } else{ echo "0"; } ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="emp mt-2">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/dep.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Industry</p>
                                        <span>
                                            <?php echo $industry; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="emp mt-2">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/can.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Services</p>
                                        <span>
                                            <?php echo $services; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="emp mt-2">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/can.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Request Message</p>
                                        <span>
                                            <?php echo $request; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="common-l">
        <div class="row">
            <div class="col-md-7 mt-3">
                <div class="heading bg-white">
                    <h4 class="h4-head">Total</h4>
                </div>
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>

                <!-- <div class="graph">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/graph.jpg" class="img-fluid">
                </div> -->
            </div>
            <div class="col-md-5">
                    <div class="Leaves common-l bg-white mt-3">
                        <div class="heading mb-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="h4-head">Notifications</h4>
                                </div>
                            </div>
                        </div>
                        <?php
                                   if(!empty($notification))
                                   {
                                     foreach($notification as $n)
                                     {
                                      ?>
                        <div class="notification-content mx-2">
                            <ul class="un-style mb-0 list-unstyled d-flex">
                                <li class="">
                                    <div class="john-img">
                                        <?php if($n->logo != '')
                                                    {
                                                      ?>
                                        <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $n->logo; ?>">
                                        <?php }
                                                         else
                                                       {
                                                         ?>
                                        <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg">
                                        <?php
                                                         }
                                                       ?>
                                    </div>
                                </li>
                                <li class="pl-2">
                                    <div class="not-content">
                                        <span>
                                            <?php echo $newDate = date("d-m-Y", strtotime($n->notificationDate));  ?></span>
                                        <p><b>
                                                <?php echo ucwords($n->name); ?></b>
                                            <?php echo $n->notificationMessage; ?>
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <?php }
                                         }
                                         else
                                         {
                                         ?>
                        <div class="notification-content mx-2">
                            <p>No Notification</p>
                        </div>
                        <?php
                                         }
                                   if(!empty($notification))
                                   {
                                     ?>
                        <div class="border-top text-right p-3">
                            <a href="<?php echo base_url(); ?>freelancer/notification">View All</a>
                        </div>
                        <?php } ?>
                    </div>

            </div>
        </div>
    </div>

    <div class="common-l">
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="Latest common-l bg-white">
                    <div class="heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="h4-head">Latest Reviews</h4>
                            </div>
                        </div>
                    </div>
                    <div class="latest-content p-3">
                        <?php
                                    if(!empty($reviewlatest))
                                    {

                                      foreach($reviewlatest as $r)
                                      {
                                        ?>
                        <div class="lead-review mb-2 border-bottom pb-3">
                            <!-- <span class="lead-date">23/01/2020</span> -->
                            <div class="review">
                                <p>“
                                    <?php echo $r->reviewOverall; ?>”</p>
                            </div>
                            <div class="client-name d-flex"><span>
                                    <?php if($r->name){ echo ucwords($r->name); }  ?></span>
                                <span class="d-flex ml-2">
                                    <i class="fa <?php if($r->star >= 1){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                    <i class="fa <?php if($r->star >= 2){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                    <i class="fa <?php if($r->star >= 3){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                    <i class="fa <?php if($r->star >= 4){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>
                                    <i class="fa <?php if($r->star >= 5){ ?> fa-star<?php } else{?>fa-star-o<?php } ?>" aria-hidden="true"></i>

                                </span></div>
                        </div>
                        <?php } }
                                      else
                                     {
                                       ?>
                        <p>No Review</p>
                        <?php } ?>
                    </div>
                    <?php
                                if(!empty($reviewlatest))
                                {
                                  ?>
                    <div class="border-top text-right p-3">
                        <a href="javascript:void(0);">View All</a>
                    </div>
                    <?php } ?>
                </div>

            </div>
            <div class="col-md-7 mt-3">
                <div class="heading bg-white">
                    <h4 class="h4-head">Customers</h4>
                </div>
                <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
                <!-- <div class="graph">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/graph-2.jpg" class="img-fluid">
                </div> -->

            </div>
        </div>
    </div>
    <div class="mt-3 common-l bg-white">
        <div class="heading">
            <h4 class="h4-head"> Projects</h4>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Start Date</th>
                        <th>Status</th>
                        <th class="text-right">Total Amount</th>
                        <th class="text-right">Received Amount</th>
                        <th class="text-right">Pending Amount</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if(!empty($salesProject))
                        {
                          foreach($salesProject as $p)
                          {
                          ?>
                    <tr>
                        <td><?php echo $p->projectName;  ?></td>
                        <td><?php echo $d = date("d-m-Y",strtotime($p->date)); ?></td>
                        <td>
                          <?php
                          if($p->status == 0)
                          {
                            ?>
                          <a class="btn btn-cstm bg-yellow"><span>Pending</span></a>
                        <?php }
                          else if($p->status == 1)
                          {
                            ?>
                          <a class="btn btn-cstm bg-blue"><span>In-Progress</span></a>
                        <?php }
                        else if($p->status == 2)
                        {
                          ?>
                          <a class="btn btn-cstm bg-blue"><span>hold</span></a>

                        <?php }
                        else if($p->status == 3)
                        {
                          ?>
                          <a class="btn btn-cstm bg-green"><span>Completed</span></a>

                      <?php } ?>
                        </td>
                        <td class="text-right"><?php echo $p->budget; ?></td>
                        <td class="text-right"><?php if(!empty($p->receivedAmount != '')){ echo $p->receivedAmount; } else{ echo "0"; } ?></td>
                        <td class="text-right"><?php echo $p->budget - $p->receivedAmount;  ?></td>
                    </tr>
                  <?php } } ?>

                </tbody>
            </table>
        </div>
        <div class="border-top text-right p-3">
            <a href="javascript:void(0);">View All</a>
        </div>
    </div>
</div>
<!-- sales team dashboard -->
<?php }
      else if($this->session->userdata['clientloggedin']['access'] == 6  )
      {
        ?>
<!--************************project manager dashboard start*************************-->
<div class="dash-board">
    <h4 class="h4-win">Dashboard</h4>
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <div class="project-bx">
                <h1>Total Projects</h1>
                <span><?php echo $totalprojects; ?></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="project-bx blue">
                <h1>Projects In Progress</h1>
                <span><?php echo $inProgressProject; ?></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="project-bx green">
                <h1>Projects On Hold</h1>
                <span><?php echo $holdProject; ?></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="project-bx">
                <h1>Projects Completed</h1>
                <span><?php echo $completedProject; ?></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="project-bx blue">
                <h1>Total Earning</h1>
                <span><?php if($totalearning->total != ''){ echo $totalearning->total; } else{ echo "0"; } ?></span>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="project-bx green">
                <h1>Pending Amount</h1>
                <span><?php if($pendingearning->total != ''){ echo $pendingearning->total; } else{ echo "0"; } ?></span>
            </div>
        </div>


    </div>
    <div class="project-section bg-white">
        <div class="row">
            <div class="col-sm-5 col-md-5">
                <h2>Project</h2>
            </div>
            <div class="col-sm-7 col-md-7">
                <div class="calendar-sec">
                    <ul>
                        <li><a href="#">Start Date <i class="fa fa-calendar" aria-hidden="true"></i></a></li>
                        <li><a href="#">End Date <i class="fa fa-calendar" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="dropdown chooseDepart">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Choose Department <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Seo</a>
                        <a class="dropdown-item" href="#">Web design</a>
                        <a class="dropdown-item" href="#">PHP</a>
                    </div>
                </div>
                <div class="dropdown chooseProject">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Choose Project <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Seo</a>
                        <a class="dropdown-item" href="#">Web design</a>
                        <a class="dropdown-item" href="#">PHP</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table project-table">
                <tr>
                    <th>Milestone</th>
                    <!-- <th>Start Date</th> -->
                    <!-- <th>Status</th> -->
                    <th>Total Amount</th>
                    <th>Recieved Amount</th>
                    <th>Pending Amount</th>
                </tr>
                <?php
                   if(!empty($milestones))
                   {
                     foreach($milestones as $m)
                     {
                   ?>
                <tr>
                    <td><?php echo $m->title; ?></td>
                    <!-- <td>10-Feb-2020</td> -->
                    <!-- <td><a class="btn btn-info" href="#">In Progress</a></td> -->
                    <td><?php echo $m->amount; ?></td>
                    <td><?php if($m->receivedAmount != ''){ echo $m->receivedAmount; }else{ echo "0"; } ?></td>
                    <td><?php echo $m->amount - $m->receivedAmount; ?></td>

                </tr>
              <?php } } ?>



            </table>
        </div>
    </div>
        <div class="task-deadline-section">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="task-sec bg-white">
                        <h3>Task Completion <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Last Week <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                </div>
                            </div>
                        </h3>
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                        <!-- <img src="<?php echo base_url(); ?>assets/dashboard/images/task-img.jpg" class="img-fluid"> -->
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="deadline-sec bg-white">
                        <h3>Upcoming Deadlines</h3>
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/project-calendar-img.jpg" class="img-fluid">

                    </div>
                </div>
            </div>
    </div>
</div>


<?php }
        else if($this->session->userdata['clientloggedin']['access'] == 3)
        {
        ?>
<!--************************ manager dashboard *************************-->


<!--************************ Employee dashboard *************************-->
<div class="dash-board">
    <h4 class="h4-win">Dashboard</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="left-container">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <div class="emp wow bounceInDown animated">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Total Project</p>
                                        <span>
                                            <?php echo $employeeProject; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                     <div class="col-sm-2">
                        <div class="emp">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/dep.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>In progress</p>
                                        <span>
                                            <?php echo $employeeProjectInProgress; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                     <div class="col-sm-2">
                        <div class="emp">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/can.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Paused</p>
                                        <span>
                                            <?php echo $employeeProjectPaused; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                     <div class="col-sm-2">
                        <div class="emp">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/u-em.png" class="img-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Completed</p>
                                        <span>
                                            <?php echo $employeeProjectcompleted; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                     <div class="col-sm-3">
                        <div class="emp">
                            <ul class="ul-list unstyle mb-0">
                                <li>
                                    <div class="bg-blue">
                                        <img src="<?php echo base_url(); ?>assets/dashboard/images/leaves.png" class="image-fluid">
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Total Hours</p>
                                        <span>
                                            <?php echo $industry; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="col-lg-7 col-md-12">
            <div class="mt-3">
                <div class="Leaves common-l bg-white">
                    <div class="heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="h4-head">Task</h4>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Task Name</th>
                                    <th style="">Assign to</th>
                                    <th style="">Start Date</th>
                                    <th>Description</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php if(!empty($task))
                                     {
                                       foreach($task as $t)
                                       {
                                       ?>
                                <tr class="<?php if($t->status == 1){ echo "taskdone"; } else if($t->status == 2){ echo "taskpending"; }  ?>">
                                    <td>
                                        <?php echo $t->name; ?>
                                    </td>
                                    <td>
                                        <?php echo $t->assignedto; ?>
                                    </td>
                                    <td>
                                        <?php echo $d = date("d M, Y",strtotime($t->startDate)); ?>
                                    </td>
                                    <td>
                                        <?php echo substr($t->description, 0, 70);  ?>
                                    </td>
                                </tr>
                                <?php } } else{ ?>

                                <tr>
                                    <td colspan="4">No Task</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if(!empty($task))
                            { ?>
                    <div class="border-top text-right p-3">
                        <a href="<?php echo base_url(); ?>freelancer/todo">View All</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- <div class="notification-box mt-3">
                    <div class="row"> -->
        <div class="col-lg-5 col-md-12">
            <div class="mt-3">
                <div class="Leaves common-l bg-white">
                    <div class="heading mb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="h4-head">Notifications</h4>
                            </div>
                        </div>
                    </div>


                    <?php
                                    if(!empty($notification))
                                    {
                                      foreach($notification as $n)
                                      {
                                       ?>
                    <div class="notification-content mx-2">
                        <ul class="un-style mb-0 list-unstyled d-flex">
                            <li class="">
                                <div class="john-img">
                                    <?php if($n->logo != '')
                                                     {
                                                       ?>
                                    <img src="<?php echo base_url(); ?>assets/client_images/<?php echo $n->logo; ?>">
                                    <?php }
                                                          else
                                                        {
                                                          ?>
                                    <img src="<?php echo base_url(); ?>assets/client_images/noimage.jpg">
                                    <?php
                                                          }
                                                        ?>
                                </div>
                            </li>
                            <li class="pl-2">
                                <div class="not-content">
                                    <span>
                                        <?php echo $newDate = date("d-m-Y", strtotime($n->notificationDate));  ?></span>
                                    <p><b>
                                            <?php echo ucwords($n->name); ?></b>
                                        <?php echo $n->notificationMessage; ?>
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <?php }
                                          }
                                          else
                                          {
                                          ?>
                    <div class="notification-content mx-2">
                        <p>No Notification</p>
                    </div>
                    <?php
                                          }
                                          if(!empty($notification))
                                          {
                                          ?>
                    <div class="border-top text-right p-3">
                        <a href="javascript:void(0);">View All</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- </div>


                    </div> -->
        </div>
        <div class="col-md-4">
        <div class="Latest common-l mt-3 bg-white wow bounceInLeft  animated" style="visibility: Hidden;">
                <div class="heading">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="h4-head">Today Annoncement</h4>
                        </div>
                    </div>
                </div>
                <div class="anno-content py-3 pl-3">
                    <div class="row">
                        <div class="col-md-8">
                            <p>Make an announcement to you coworkers</p>
                        </div>
                        <div class="col-md-4 pl-0">
                            <img src="<?php echo base_url(); ?>assets/dashboard/images/loud.png" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="btn-g">
                    <div class="row">
                        <div class="col-md-8"><a href="<?php echo base_url(); ?>freelancer/emp-announcement" class="btn btn-cstm">Create Announcement</a></div>
                        <div class="col-md-4 text-right"><a href="<?php echo base_url(); ?>freelancer/emp-announcement" class="btn-under">See history</a></div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
<!--************************ Employee dashboard *************************-->
<?php } ?>

</div>
