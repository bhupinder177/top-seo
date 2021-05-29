<?php

include('sidebar.php');
?>


<div id="wrapper" class="content-wrapper project-payment-detail">
  <section class="content-header">
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Project Payment Details</li>
    </ol>
  </section>
  <section class="content">
    <div ng-cloak ng-app="myApp62" ng-controller="myCtrt62">
      <div id="content">
          <div class="box">
            <div class="box-header p-2">
              <h3 class="box-title"><b>Project Name</b> : {{ all.projectName }}</h3>
              <h3 class="box-title"><b>Client Name</b> : {{ all.clientName }}</h3>
              <h3 class="box-title"><b>Hourly Rate</b> : {{ all.code }} {{ all.symbol }} {{ all.hourlyPrice }}</h3>
              <h3 ng-if="all.upfrontAmount > 0" class="box-title"><b>Upfront Amount</b> : {{ all.code }} {{ all.symbol }} {{ all.upfrontAmount }}</h3>
            </div>

            <div class="box-body">
                <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Milestone</th>
                  <th>Rcv'd Amount</th>
                  <th>Task Name</th>
                  <th>Actual Hrs</th>
                  <th class="text-center">Status</th>

                </tr>
              </thead>
                <tbody ng-repeat="(key,x) in all.milestone" ng-class="{'firstm': $index + 1 / 2 == 0 ,'secondm' : $index + 1 / 2 != 0 }" >
                  <tr  ng-repeat="(key1,x2) in x.task">
                    <td ><span ng-if="$index == 0"  >{{ key + 1   }}</span></td>
                    <td><span ng-if="$index == 0">{{ x.name }}</span></td>
                    <td>
                      <div class="form-group">
                      <label ng-if="$index == 0">({{ all.code }} {{ all.symbol }} {{  x.totalm }})</label>
                      <input class="form-control" ng-if="$index == 0"  type="text" ng-value="x.received" ng-keyup="receivedkeyup($event.target.value,x.id,x.projectId)">
                    </div>
                    </td>
                    <td>{{ x2.name  }}</td>
                    <td>({{ x2.hours  }}) {{ x2.time }}</td>
                    <td class="text-center">
                      <span class="btn bg-green" ng-if="x2.status == 1">Done</span>
                      <span class="btn bg-yellow" ng-if="x2.status == 2">Pending</span>
                      <span class="btn bg-blue" ng-if="x2.status == 3">Confirmed</span>
                      <span class="btn bg-blue" ng-if="x2.status == 4">PostPone</span>
                      <span class="btn bg-blue" ng-if="x2.status == 5">Start</span>
                      <span class="btn bg-red" ng-if="x2.status == 6">End</span>
                    </td>

                  </tr>
                </tbody>
                <tr class="bg-lightgray">
                  <td></td>
                  <td>Total</td>
                  <td>({{ all.code }} {{ all.symbol }} {{ estamount }}) {{received }}</td>
                  <td></td>
                  <td>({{ all.totalHour }}){{ all.totaltime }}</td>
                  <td></td>
                  <td class="text-center"></td>
                </tr>
              </table>
            </div>
          </div>
          <div id="pagination"></div>
        </div>
        </div>
      </div>

    </section>

  </div>
