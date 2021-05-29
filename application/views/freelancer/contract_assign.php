<?php

include('sidebar.php');
?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">

      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
        <li class="active">Assign Contract</li>
      </ol>
    </section>


<section class="content project-assign portfolio-cont">
 <div class=" no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp82" ng-controller="myCtrt82">
          <div id="content">
  <div class="no-border-radius">
            <div class="row">

                  <div class="col-md-12">
                    <div class="box">


             				 <div class="box-body">


                      					 <table  id="rankingTable" class="table  table-condensed">

                      						 <thead>

                      							 <tr>
                      								 <th>Project Name</th>
                      								 <th>Client Name</th>
                                        <th>Contract Amount</th>
                                        <th class="text-right">Action</th>

                      							 </tr>

                      						 </thead>

                      						 <tbody>


                      								 <tr ng-if="contracts.length != 0" ng-repeat="(key,x) in contracts">

                      									 <td>{{ x.jobTitle }}</td>

                      									  <td>{{ x.name }}</td>


                                          <td >{{ x.code }} {{ x.symbol }} {{ x.contractAmount }}</td>

                                      <td>
                                        <div class="dropdown ac-cstm text-right">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                 </a>
                                 <div class="dropdown-menu fadeIn">
                                     <a class="dropdown-item" href="<?php echo base_url(); ?>freelancer/assign-contract-detail/{{ x.contractId }}"><i class="fa fa-tasks" aria-hidden="true"></i>Assignment</a>
                               </div>
                              </div>


                      								 </tr>
                      								 <tr ng-if="contracts.length == 0"><td colspan="2">No Record Found.</td></tr>

                      						 </tbody>

                      					 </table>
                      					 <div  id="pagination"></div>



            </div>
                  </div>
                    </div>


              </div>
             </div>
           </div>

    </div>
       </section>
  </div>
