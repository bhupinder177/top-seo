<?php
include('sidebar.php');

?>


<div id="wrapper" class="content-wrapper">
  <section class="content-header">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Attendance</li>
    </ol>

    </section>
  <section  class="content portfolio-cont expence-cstm">
    <div class=" no-margin user-dashboard-container atand">
      <div ng-cloak  ng-app="myApp61" ng-controller="myCtrt61">
        <div id="content">
          <div class="no-border-radius">

            <div class="row">
              <div class="col-md-12">
                <div  class="box c-pass-sec">
               <div class="row">
               <div class="col-lg-4 d--sm-none"></div>
              <div class="col-lg-3 col-md-12">
               <div class="form-group">
                 <input  ng-model="date"  type="text" class="form-control attdate first" placeholder="Start Date" >
               </div>
             </div>

             <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input  ng-model="date1" type="text" class="form-control attdate last" placeholder="End Date" >
              </div>
            </div>

            <div class="col">
             <div class="form-group sea-cstm">
               <input type="button" value="Search" class="btn w-100 btn-info attclick" >
             </div>
           </div>
            </div>
                  <div  class="box-body action-cstm Table-s">
                    <div class="table-responsive">
                    <table class="table attendance">
                      <thead>
                        <tr>
                        <th>S. No.</th>
                        <th style="min-width: 100px;">Date</th>
                        <th>Day</th>
                        <?php if(!empty($result))
                        {
                          foreach($result as $res )
                          {
                          ?>
                        <th><?php echo $res->name; ?></th>
                      <?php } } ?>
                      <th>Company Attendance</th>

                      </tr>
                      </thead>
                      <tbody>

                        <?php
                        $i = 1;
                       for($first; $first <= $last;$first++)
                       {
                        ?>
                        <tr>

                            <td><?php echo $i++; ?></td>
                            <td><?php echo $newDate = date("d-m-Y", strtotime($first));   ?></td>
                            <td><?php echo $dayOfWeek = date("l", strtotime($first)); ?></td>
                          <?php if(!empty($result))
                          {
                            foreach($result as $res )
                            {

                            ?>
                          <td>
                          <?php
                          if(in_array($first, $holidaydate))
                          {
                            ?>

                            <span class="holiday btn bg-orange"><?php echo ucwords($holidays[$first]); ?></span>
                          <?php
                          }
                          else if(!empty($leaves) && !empty($leaves[$res->u_id][$first]) == $first)
                          {
                            ?>
                            <span class="leave btn bg-blue"><?php echo ucwords($leaves[$res->u_id][$first]['leave']); ?></span>
                        <?php
                           }
                          else if(!empty($dsr) && !empty($dsr[$res->u_id][$first]) == $first)
                          {
                            ?>
                            <span class="time-cstm btn bg-green"><?php echo $dsr[$res->u_id][$first]['time'] .' '.'hours'; ?></span>
                            <?php
                          }

                          ?>
                          </td>
                        <?php  } } ?>
                        <td><?php
                        if($dayOfWeek != "Sunday" && $dayOfWeek !="Saturday")
                        {
                          $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
                          $cur =  $nowUtc->format('Y-m-d');
                             if($first <= $cur)
                             {
                               if(!empty($company[$first]['total']))
                               {
                               $cc = $totalemployee - $company[$first]['total'];
                                  $cc = $cc /$totalemployee * 100;
                                    echo round($cc).'%';
                                }
                            }
                        }

                        ?></td>

                        </tr>

                      <?php } ?>
                      <?php if(!empty($result))
                      {
                      ?>
                      <tr>
                        <td></td>
                        <td></td>
                        <td>Total Days</td>
                        <?php
                        foreach($result as $res )
                        {
                          ?>
                  <td><?php echo $newDate = date("d", strtotime($last));   ?></td>
                    <?php } ?>
                      </tr>
                    <?php  } ?>

                      <?php if(!empty($result))
                      {

                        ?>
                      <tr>
                        <td></td>
                        <td></td>
                        <td>Total leave</td>
                        <?php
                        foreach($result as $res )
                        {
                          ?>
                        <td><?php if(!empty($totall[$res->u_id]))
                        {
                          foreach($totall[$res->u_id] as $k=> $l)
                          {
                            echo ucwords($k).': '. $l['leavecount']."<br>";
                          }

                        }
                        else
                        {
                          echo "0";
                        }
                        ?>
                        </td>
                    <?php } ?>
                      </tr>
                    <?php  } ?>
                    <!-- attdence percent -->
                    <?php if(!empty($result))
                    {

                      ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Emp. Attendance</td>
                      <?php
                      foreach($result as $res )
                      {
                        ?>
                      <td>
                    <?php
                    $totaldays = date("d", strtotime($last));
                      if(!empty($countleave[$res->u_id]['countleave']))
                      {
                        $aa = $totaldays - $countleave[$res->u_id]['countleave'];
                        $aa = $aa / $totaldays * 100;
                         echo round($aa).'%';
                      }
                       else if(empty($countleave[$res->u_id]['countleave']))
                       {
                         $aa = $totaldays - 0;
                          $aa = $aa /$totaldays * 100;
                         echo round($aa).'%';
                       }
                      ?>
                      </td>
                  <?php } ?>
                    </tr>
                  <?php  } ?>
                    <!-- attdence percent -->
                      </tbody>

                    </table>
                  </div>
                  </div>
                     </div>
                </div>
                  </div>
                </div>
              </div>
              <!-- previous month -->
            </div>
          </div>
  </section>
    </div>
